<?php
// admin/orders.php
include 'includes/auth.php';
include 'includes/db.php';

$pageTitle = 'Orders';

// Handle status update
if (isset($_POST['update_status']) && isset($_POST['order_id']) && isset($_POST['new_status'])) {
    $orderId = (int)$_POST['order_id'];
    $newStatus = $_POST['new_status'];
    mysqli_query($conn, "UPDATE orders SET order_status = '$newStatus' WHERE id = $orderId");
    header('Location: orders.php?msg=updated');
    exit;
}

// Stats
$totalOrders = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM orders"))[0];
$delivered = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM orders WHERE order_status = 'Delivered'"))[0];
$shipped = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM orders WHERE order_status = 'Shipped'"))[0];
$cancelled = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM orders WHERE order_status = 'Cancelled'"))[0];

// Fetch orders
$query = "SELECT o.*, u.full_name as user_name, u.email as user_email 
          FROM orders o 
          LEFT JOIN users u ON o.user_id = u.id 
          ORDER BY o.created_at DESC 
          LIMIT 10";
$ordersResult = mysqli_query($conn, $query);

$msg = $_GET['msg'] ?? '';
$msgText = '';
if ($msg === 'updated') $msgText = 'Order status updated successfully!';
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="tn-admin-wrapper">
  <?php include 'includes/topbar.php'; ?>

  <main class="tn-admin-main">

    <?php if ($msgText): ?>
    <div class="tn-admin-alert tn-admin-alert-success" id="tnAdminSuccessAlert">
      <i class="bi bi-check-circle"></i>
      <span><?php echo $msgText; ?></span>
      <button type="button" class="tn-admin-alert-close" onclick="this.parentElement.remove()"><i class="bi bi-x-lg"></i></button>
    </div>
    <?php endif; ?>

    <!-- Breadcrumb -->
    <nav class="tn-admin-breadcrumb" aria-label="Breadcrumb">
      <ol>
        <li><a href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
        <li><a href="#">Sales</a></li>
        <li class="active">Orders</li>
      </ol>
    </nav>

    <!-- Page Header -->
    <div class="tn-admin-page-header">
      <div class="tn-admin-page-header-left">
        <h1 class="tn-admin-page-title">Orders</h1>
        <p class="tn-admin-page-sub">View and manage all customer orders.</p>
      </div>
      <div class="tn-admin-page-header-actions">
        <button type="button" class="btn tn-admin-btn-outline" id="tnAdminOrdersExportBtn">
          <i class="bi bi-download me-2"></i> Export
        </button>
      </div>
    </div>

    <!-- Summary Stats -->
    <div class="row g-3 mb-4">
      <div class="col-sm-6 col-xl-3">
        <div class="tn-admin-mini-stat">
          <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-primary">
            <i class="bi bi-receipt"></i>
          </div>
          <div class="tn-admin-mini-stat-info">
            <span class="tn-admin-mini-stat-value"><?php echo number_format($totalOrders); ?></span>
            <span class="tn-admin-mini-stat-label">Total Orders</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="tn-admin-mini-stat">
          <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-accent">
            <i class="bi bi-check-circle"></i>
          </div>
          <div class="tn-admin-mini-stat-info">
            <span class="tn-admin-mini-stat-value"><?php echo number_format($delivered); ?></span>
            <span class="tn-admin-mini-stat-label">Delivered</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="tn-admin-mini-stat">
          <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-warning">
            <i class="bi bi-truck"></i>
          </div>
          <div class="tn-admin-mini-stat-info">
            <span class="tn-admin-mini-stat-value"><?php echo number_format($shipped); ?></span>
            <span class="tn-admin-mini-stat-label">Shipped</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="tn-admin-mini-stat">
          <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-danger">
            <i class="bi bi-x-circle"></i>
          </div>
          <div class="tn-admin-mini-stat-info">
            <span class="tn-admin-mini-stat-value"><?php echo number_format($cancelled); ?></span>
            <span class="tn-admin-mini-stat-label">Cancelled</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Orders Table Card -->
    <div class="tn-admin-card">
      <div class="tn-admin-toolbar">
        <div class="tn-admin-toolbar-left">
          <div class="tn-admin-search tn-admin-search-sm">
            <i class="bi bi-search"></i>
            <input type="text" class="tn-admin-search-input" id="tnAdminOrderSearch" placeholder="Search orders..." />
          </div>
          <div class="tn-admin-filter-group">
            <select class="tn-admin-select" id="tnAdminOrderStatusFilter">
              <option value="all">All Status</option>
              <option value="pending">Pending</option>
              <option value="processing">Processing</option>
              <option value="shipped">Shipped</option>
              <option value="delivered">Delivered</option>
              <option value="cancelled">Cancelled</option>
            </select>
          </div>
        </div>
        <div class="tn-admin-toolbar-right">
          <span class="tn-admin-toolbar-count">Showing <strong>1-<?php echo min(10, $totalOrders); ?></strong> of <strong><?php echo number_format($totalOrders); ?></strong> orders</span>
        </div>
      </div>

      <div class="tn-admin-table-wrap">
        <table class="tn-admin-table tn-admin-table-orders" id="tnAdminOrdersTable">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Customer</th>
              <th>Items</th>
              <th>Total</th>
              <th>Status</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Dynamic Orders List -->
            <?php if (mysqli_num_rows($ordersResult) > 0): ?>
              <?php while ($order = mysqli_fetch_assoc($ordersResult)): ?>
                <?php
                  $statusClass = '';
                  switch ($order['order_status']) {
                      case 'Delivered': $statusClass = 'tn-admin-badge-success'; break;
                      case 'Shipped': $statusClass = 'tn-admin-badge-purple'; break;
                      case 'Processing': $statusClass = 'tn-admin-badge-info'; break;
                      case 'Pending': $statusClass = 'tn-admin-badge-warning'; break;
                      case 'Cancelled': $statusClass = 'tn-admin-badge-danger'; break;
                  }
                  
                  $initials = 'GU';
                  $userName = $order['user_name'] ?? 'Guest User';
                  if ($userName !== 'Guest User') {
                      $parts = explode(' ', $userName);
                      $initials = strtoupper(substr($parts[0], 0, 1) . (isset($parts[1]) ? substr($parts[1], 0, 1) : ''));
                  }
                ?>
                <tr data-status="<?php echo strtolower($order['order_status']); ?>" data-date="<?php echo date('Y-m-d', strtotime($order['created_at'])); ?>">
                  <td><span class="tn-admin-order-id">#TN-<?php echo str_pad($order['id'], 4, '0', STR_PAD_LEFT); ?></span></td>
                  <td>
                    <div class="tn-admin-order-customer">
                      <div class="tn-admin-order-avatar"><?php echo $initials; ?></div>
                      <div class="tn-admin-order-customer-info">
                        <strong><?php echo htmlspecialchars($userName); ?></strong>
                        <span><?php echo htmlspecialchars($order['user_email'] ?? 'N/A'); ?></span>
                      </div>
                    </div>
                  </td>
                  <td><span class="tn-admin-order-items">— items</span></td>
                  <td><span class="tn-admin-order-amount">$<?php echo number_format($order['total_amount'] ?? 0, 2); ?></span></td>
                  <td>
                    <select class="tn-admin-select tn-admin-select-sm status-select" data-order-id="<?php echo $order['id']; ?>" style="min-width:130px;">
                      <option value="Pending" <?php echo $order['order_status'] === 'Pending' ? 'selected' : ''; ?>>Pending</option>
                      <option value="Processing" <?php echo $order['order_status'] === 'Processing' ? 'selected' : ''; ?>>Processing</option>
                      <option value="Shipped" <?php echo $order['order_status'] === 'Shipped' ? 'selected' : ''; ?>>Shipped</option>
                      <option value="Delivered" <?php echo $order['order_status'] === 'Delivered' ? 'selected' : ''; ?>>Delivered</option>
                      <option value="Cancelled" <?php echo $order['order_status'] === 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                    </select>
                  </td>
                  <td><?php echo date('M d, Y', strtotime($order['created_at'])); ?></td>
                  <td>
                    <div class="tn-admin-table-actions">
                      <a href="order-details.php?id=<?php echo $order['id']; ?>" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Order"><i class="bi bi-eye"></i></a>
                    </div>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="7" style="text-align:center;padding:40px;">
                  <div class="tn-admin-empty-state" style="display:block;">
                    <div class="tn-admin-empty-icon"><i class="bi bi-receipt"></i></div>
                    <h3>No orders found</h3>
                    <p>No orders have been placed yet.</p>
                  </div>
                </td>
              </tr>
            <?php endif; ?>
            <!-- End Dynamic Orders List -->
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="tn-admin-pagination-wrap">
        <div class="tn-admin-pagination-info">
          <span>Showing <?php echo min(10, $totalOrders); ?> of <?php echo number_format($totalOrders); ?> orders</span>
        </div>
      </div>
    </div>

    <!-- Empty State for Filters -->
    <div class="tn-admin-empty-state" id="tnAdminOrdersEmptyState" style="display: none;">
      <div class="tn-admin-empty-icon"><i class="bi bi-receipt"></i></div>
      <h3>No orders found</h3>
      <p>We couldn't find any orders matching your search or filters.</p>
      <div class="tn-admin-empty-actions">
        <button class="btn tn-admin-btn-outline" id="tnAdminOrdersClearFilters">
          <i class="bi bi-x-lg me-2"></i> Clear Filters
        </button>
      </div>
    </div>

  </main>

  <?php include 'includes/footer.php'; ?>
</div>

<!-- Hidden Form for Status Update -->
<form id="statusUpdateForm" method="POST" style="display:none;">
  <input type="hidden" name="order_id" id="statusOrderId">
  <input type="hidden" name="new_status" id="statusNewStatus">
  <input type="hidden" name="update_status" value="1">
</form>

<script>
document.querySelectorAll('.status-select').forEach(function(select) {
  select.addEventListener('change', function() {
    document.getElementById('statusOrderId').value = this.getAttribute('data-order-id');
    document.getElementById('statusNewStatus').value = this.value;
    document.getElementById('statusUpdateForm').submit();
  });
});
</script>