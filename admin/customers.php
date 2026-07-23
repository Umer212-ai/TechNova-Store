<?php
// admin/customers.php
include 'includes/auth.php';
include 'includes/db.php';

$pageTitle = 'Customers';

// Stats (without status column)
$totalCustomers = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM users"))[0];
$activeCustomers = $totalCustomers;  // sabko active maan lo
$newThisMonth = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE MONTH(created_at) = MONTH(NOW()) AND YEAR(created_at) = YEAR(NOW())"))[0];

// Fetch customers
$query = "SELECT u.*, 
          COUNT(o.id) as total_orders, 
          COALESCE(SUM(o.total_amount), 0) as total_spent,
          MAX(o.created_at) as last_order_date
          FROM users u 
          LEFT JOIN orders o ON u.id = o.user_id 
          GROUP BY u.id 
          ORDER BY u.created_at DESC 
          LIMIT 10";
$customersResult = mysqli_query($conn, $query);
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="tn-admin-wrapper">
  <?php include 'includes/topbar.php'; ?>

  <main class="tn-admin-main">

    <!-- Breadcrumb -->
    <nav class="tn-admin-breadcrumb" aria-label="Breadcrumb">
      <ol>
        <li><a href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
        <li class="active">Customers</li>
      </ol>
    </nav>

    <!-- Page Header -->
    <div class="tn-admin-page-header">
      <div class="tn-admin-page-header-left">
        <h1 class="tn-admin-page-title">Customers</h1>
        <p class="tn-admin-page-sub">Manage your customer accounts and view purchase history.</p>
      </div>
      <div class="tn-admin-page-header-actions">
        <button type="button" class="btn tn-admin-btn-outline" id="tnAdminCustomersExportBtn">
          <i class="bi bi-download me-2"></i> Export
        </button>
      </div>
    </div>

    <!-- Summary Stats -->
    <div class="row g-3 mb-4">
      <div class="col-sm-6 col-xl-3">
        <div class="tn-admin-mini-stat">
          <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-primary">
            <i class="bi bi-people"></i>
          </div>
          <div class="tn-admin-mini-stat-info">
            <span class="tn-admin-mini-stat-value"><?php echo number_format($totalCustomers); ?></span>
            <span class="tn-admin-mini-stat-label">Total Customers</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="tn-admin-mini-stat">
          <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-accent">
            <i class="bi bi-person-check"></i>
          </div>
          <div class="tn-admin-mini-stat-info">
            <span class="tn-admin-mini-stat-value"><?php echo number_format($activeCustomers); ?></span>
            <span class="tn-admin-mini-stat-label">Active</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="tn-admin-mini-stat">
          <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-purple">
            <i class="bi bi-person-plus"></i>
          </div>
          <div class="tn-admin-mini-stat-info">
            <span class="tn-admin-mini-stat-value"><?php echo number_format($newThisMonth); ?></span>
            <span class="tn-admin-mini-stat-label">New This Month</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="tn-admin-mini-stat">
          <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-danger">
            <i class="bi bi-gem"></i>
          </div>
          <div class="tn-admin-mini-stat-info">
          <span class="tn-admin-mini-stat-value">0</span>
            <span class="tn-admin-mini-stat-label">VIP Customers</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Customers Table Card -->
    <div class="tn-admin-card tn-admin-form-card" id="tnAdminCustomersCard">

      <!-- Toolbar -->
      <div class="tn-admin-toolbar">
        <div class="tn-admin-toolbar-left">
          <div class="tn-admin-search tn-admin-search-sm">
            <i class="bi bi-search"></i>
            <input type="text" class="tn-admin-search-input" id="tnAdminCustomerSearch" placeholder="Search customers..." />
          </div>
          <div class="tn-admin-filter-group">
            <select class="tn-admin-select" id="tnAdminCustomerStatusFilter">
              <option value="all">All Status</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
              <option value="vip">VIP</option>
            </select>
          </div>
        </div>
        <div class="tn-admin-toolbar-right">
          <span class="tn-admin-toolbar-count">Showing <strong>1-<?php echo min(10, $totalCustomers); ?></strong> of <strong><?php echo number_format($totalCustomers); ?></strong> customers</span>
        </div>
      </div>

      <!-- Customers Table -->
      <div class="tn-admin-table-wrap">
        <table class="tn-admin-table tn-admin-table-customers" id="tnAdminCustomersTable">
          <thead>
            <tr>
              <th class="tn-admin-th-check">
                <label class="tn-admin-checkbox">
                  <input type="checkbox" id="tnAdminCustomerSelectAll" />
                  <span class="tn-admin-checkbox-mark"></span>
                </label>
              </th>
              <th>Customer</th>
              <th>Phone</th>
              <th>Orders</th>
              <th>Total Spent</th>
              <th>Last Order</th>
              <th>Status</th>
              <th>Joined</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (mysqli_num_rows($customersResult) > 0): ?>
           <?php while ($customer = mysqli_fetch_assoc($customersResult)): ?>
  <?php
    $initials = 'GU';
    $fullName = $customer['full_name'] ?? 'Guest User';
    if (!empty($fullName)) {
        $parts = explode(' ', $fullName);
        $initials = strtoupper(substr($parts[0], 0, 1) . (isset($parts[1]) ? substr($parts[1], 0, 1) : ''));
    }
    
    $totalOrders = $customer['total_orders'] ?? 0;
    $totalSpent = $customer['total_spent'] ?? 0;
    $lastOrder = $customer['last_order_date'] ? date('M d, Y', strtotime($customer['last_order_date'])) : 'Never';
    $joined = date('M d, Y', strtotime($customer['created_at']));
    
    if ($totalSpent > 5000) {
        $statusClass = 'tn-admin-badge-purple';
        $statusLabel = 'VIP';
        $status = 'vip';
    } elseif ($totalOrders > 0) {
        $statusClass = 'tn-admin-badge-success';
        $statusLabel = 'Active';
        $status = 'active';
    } else {
        $statusClass = 'tn-admin-badge-warning';
        $statusLabel = 'Inactive';
        $status = 'inactive';
    }
  ?>
  <tr data-status="<?php echo $status; ?>" data-joined="<?php echo date('Y-m-d', strtotime($customer['created_at'])); ?>" data-spent="<?php echo $totalSpent; ?>" data-orders="<?php echo $totalOrders; ?>">
    <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
    <td>
      <div class="tn-admin-order-customer">
        <div class="tn-admin-order-avatar"><?php echo $initials; ?></div>
        <div class="tn-admin-order-customer-info">
          <strong><?php echo htmlspecialchars($fullName); ?></strong>
          <span><?php echo htmlspecialchars($customer['email'] ?? 'N/A'); ?></span>
        </div>
      </div>
    </td>
    <td><?php echo htmlspecialchars($customer['phone'] ?? '—'); ?></td>
    <td><span class="tn-admin-customer-orders"><?php echo $totalOrders; ?></span></td>
    <td><span class="tn-admin-order-amount">$<?php echo number_format($totalSpent, 2); ?></span></td>
    <td><?php echo $lastOrder; ?></td>
    <td><span class="tn-admin-badge <?php echo $statusClass; ?>"><?php echo $statusLabel; ?></span></td>
    <td><?php echo $joined; ?></td>
    <td>
      <div class="tn-admin-table-actions">
        <a href="order-details.php?user_id=<?php echo $customer['id']; ?>" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Orders"><i class="bi bi-eye"></i></a>
        <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
        <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="customer"><i class="bi bi-trash3"></i></button>
      </div>
    </td>
  </tr>
<?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="9" style="text-align:center;padding:40px;">
                  <div class="tn-admin-empty-state" style="display:block;">
                    <div class="tn-admin-empty-icon"><i class="bi bi-people"></i></div>
                    <h3>No customers found</h3>
                    <p>No customer accounts have been created yet.</p>
                  </div>
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="tn-admin-pagination-wrap">
        <div class="tn-admin-pagination-info">
          <span>Showing <?php echo min(10, $totalCustomers); ?> of <?php echo number_format($totalCustomers); ?> customers</span>
        </div>
      </div>
    </div>

    <!-- Empty State for Filters -->
    <div class="tn-admin-empty-state" id="tnAdminCustomersEmptyState" style="display: none;">
      <div class="tn-admin-empty-icon"><i class="bi bi-people"></i></div>
      <h3>No customers found</h3>
      <p>We couldn't find any customers matching your search or filters.</p>
      <div class="tn-admin-empty-actions">
        <button class="btn tn-admin-btn-outline" id="tnAdminCustomersClearFilters">
          <i class="bi bi-x-lg me-2"></i> Clear Filters
        </button>
      </div>
    </div>

    <!-- Bulk Actions Bar -->
    <div class="tn-admin-bulk-bar" id="tnAdminCustomersBulkBar">
      <div class="tn-admin-bulk-bar-left">
        <span class="tn-admin-bulk-count" id="tnAdminCustomersBulkCount">0 selected</span>
      </div>
      <div class="tn-admin-bulk-bar-right">
        <button class="btn tn-admin-btn-outline tn-admin-btn-sm" id="tnAdminCustomersBulkEmail">
          <i class="bi bi-envelope me-1"></i> Send Email
        </button>
        <button class="btn tn-admin-btn-outline tn-admin-btn-sm" id="tnAdminCustomersBulkDeactivate">
          <i class="bi bi-eye-slash me-1"></i> Deactivate
        </button>
        <button class="btn tn-admin-btn-outline tn-admin-btn-sm" id="tnAdminCustomersBulkActivate">
          <i class="bi bi-check-circle me-1"></i> Activate
        </button>
        <button class="btn tn-admin-btn-outline tn-admin-btn-sm tn-admin-btn-danger-outline" id="tnAdminCustomersBulkDelete">
          <i class="bi bi-trash3 me-1"></i> Delete
        </button>
        <button class="tn-admin-btn-text" id="tnAdminCustomersBulkCancel">Cancel</button>
      </div>
    </div>

    <!-- Delete Modal -->
    <div class="tn-admin-modal-overlay" id="tnAdminCustomerDeleteModal">
      <div class="tn-admin-modal">
        <div class="tn-admin-modal-icon tn-admin-modal-icon-danger">
          <i class="bi bi-exclamation-triangle"></i>
        </div>
        <h3 class="tn-admin-modal-title">Delete Customer</h3>
        <p class="tn-admin-modal-text">Are you sure you want to delete this customer? This action cannot be undone.</p>
        <div class="tn-admin-modal-actions">
          <button class="btn tn-admin-btn-outline" id="tnAdminCustomerModalCancel">Cancel</button>
          <button class="btn tn-admin-btn-danger" id="tnAdminCustomerModalConfirm">Delete Customer</button>
        </div>
      </div>
    </div>

  </main>

  <?php include 'includes/footer.php'; ?>
</div>