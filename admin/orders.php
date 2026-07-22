<?php
// admin/orders.php - TechNova Store Admin Orders Management
// Backend integration will be added later.
// include '../includes/config.php';
// include '../includes/db.php';
// include 'includes/auth.php';

$pageTitle = 'Orders';
?>
<?php include 'includes/header.php'; ?>

  <?php include 'includes/sidebar.php'; ?>

  <div class="tn-admin-wrapper">
    <?php include 'includes/topbar.php'; ?>

    <!-- ========== MAIN CONTENT ========== -->
    <main class="tn-admin-main">

      <!-- ========== BREADCRUMB ========== -->
      <nav class="tn-admin-breadcrumb" aria-label="Breadcrumb">
        <ol>
          <li><a href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
          <li><a href="#">Sales</a></li>
          <li class="active">Orders</li>
        </ol>
      </nav>

      <!-- ========== PAGE HEADER ========== -->
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

      <!-- ========== SUMMARY STATS ========== -->
      <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
          <div class="tn-admin-mini-stat">
            <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-primary">
              <i class="bi bi-receipt"></i>
            </div>
            <div class="tn-admin-mini-stat-info">
              <span class="tn-admin-mini-stat-value">2,847</span>
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
              <span class="tn-admin-mini-stat-value">2,314</span>
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
              <span class="tn-admin-mini-stat-value">186</span>
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
              <span class="tn-admin-mini-stat-value">47</span>
              <span class="tn-admin-mini-stat-label">Cancelled</span>
            </div>
          </div>
        </div>
      </div>

      <!-- ========== ORDERS TABLE CARD ========== -->
      <div class="tn-admin-card">
        <!-- Toolbar -->
        <div class="tn-admin-toolbar">
          <div class="tn-admin-toolbar-left">
            <div class="tn-admin-search tn-admin-search-sm">
              <i class="bi bi-search"></i>
              <input type="text" class="tn-admin-search-input" id="tnAdminOrderSearch" placeholder="Search orders..." aria-label="Search orders" />
            </div>
            <div class="tn-admin-filter-group">
              <select class="tn-admin-select" id="tnAdminOrderStatusFilter" aria-label="Filter by status">
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
            <span class="tn-admin-toolbar-count">Showing <strong>1-10</strong> of <strong>2,847</strong> orders</span>
          </div>
        </div>

        <!-- Orders Table -->
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
              <tr data-status="delivered" data-date="2026-07-21">
                <td><span class="tn-admin-order-id">#TN-2847</span></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">SC</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Sarah Chen</strong>
                      <span>sarah.chen@email.com</span>
                    </div>
                  </div>
                </td>
                <td><span class="tn-admin-order-items">3 items</span></td>
                <td><span class="tn-admin-order-amount">$1,299.00</span></td>
                <td><span class="tn-admin-badge tn-admin-badge-success">Delivered</span></td>
                <td>Jul 21, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Order"><i class="bi bi-eye"></i></a>
                  </div>
                </td>
              </tr>

              <tr data-status="shipped" data-date="2026-07-20">
                <td><span class="tn-admin-order-id">#TN-2846</span></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">JW</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>James Wilson</strong>
                      <span>james.wilson@email.com</span>
                    </div>
                  </div>
                </td>
                <td><span class="tn-admin-order-items">1 item</span></td>
                <td><span class="tn-admin-order-amount">$749.99</span></td>
                <td><span class="tn-admin-badge tn-admin-badge-purple">Shipped</span></td>
                <td>Jul 20, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Order"><i class="bi bi-eye"></i></a>
                  </div>
                </td>
              </tr>

              <tr data-status="processing" data-date="2026-07-20">
                <td><span class="tn-admin-order-id">#TN-2845</span></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">EM</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Emily Martinez</strong>
                      <span>emily.martinez@email.com</span>
                    </div>
                  </div>
                </td>
                <td><span class="tn-admin-order-items">5 items</span></td>
                <td><span class="tn-admin-order-amount">$2,458.00</span></td>
                <td><span class="tn-admin-badge tn-admin-badge-info">Processing</span></td>
                <td>Jul 20, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Order"><i class="bi bi-eye"></i></a>
                  </div>
                </td>
              </tr>

              <tr data-status="pending" data-date="2026-07-19">
                <td><span class="tn-admin-order-id">#TN-2844</span></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">LP</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Lisa Patel</strong>
                      <span>lisa.patel@email.com</span>
                    </div>
                  </div>
                </td>
                <td><span class="tn-admin-order-items">2 items</span></td>
                <td><span class="tn-admin-order-amount">$599.00</span></td>
                <td><span class="tn-admin-badge tn-admin-badge-warning">Pending</span></td>
                <td>Jul 19, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Order"><i class="bi bi-eye"></i></a>
                  </div>
                </td>
              </tr>

              <tr data-status="delivered" data-date="2026-07-18">
                <td><span class="tn-admin-order-id">#TN-2843</span></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">RK</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Robert Kim</strong>
                      <span>robert.kim@email.com</span>
                    </div>
                  </div>
                </td>
                <td><span class="tn-admin-order-items">1 item</span></td>
                <td><span class="tn-admin-order-amount">$1,999.00</span></td>
                <td><span class="tn-admin-badge tn-admin-badge-success">Delivered</span></td>
                <td>Jul 18, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Order"><i class="bi bi-eye"></i></a>
                  </div>
                </td>
              </tr>

              <tr data-status="cancelled" data-date="2026-07-17">
                <td><span class="tn-admin-order-id">#TN-2842</span></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">AJ</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Amanda Johnson</strong>
                      <span>amanda.j@email.com</span>
                    </div>
                  </div>
                </td>
                <td><span class="tn-admin-order-items">2 items</span></td>
                <td><span class="tn-admin-order-amount">$349.99</span></td>
                <td><span class="tn-admin-badge tn-admin-badge-danger">Cancelled</span></td>
                <td>Jul 17, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Order"><i class="bi bi-eye"></i></a>
                  </div>
                </td>
              </tr>

              <tr data-status="shipped" data-date="2026-07-16">
                <td><span class="tn-admin-order-id">#TN-2841</span></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">DT</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>David Thompson</strong>
                      <span>david.t@email.com</span>
                    </div>
                  </div>
                </td>
                <td><span class="tn-admin-order-items">4 items</span></td>
                <td><span class="tn-admin-order-amount">$3,217.00</span></td>
                <td><span class="tn-admin-badge tn-admin-badge-purple">Shipped</span></td>
                <td>Jul 16, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Order"><i class="bi bi-eye"></i></a>
                  </div>
                </td>
              </tr>

              <tr data-status="delivered" data-date="2026-07-15">
                <td><span class="tn-admin-order-id">#TN-2840</span></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">MB</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Maria Brown</strong>
                      <span>maria.b@email.com</span>
                    </div>
                  </div>
                </td>
                <td><span class="tn-admin-order-items">1 item</span></td>
                <td><span class="tn-admin-order-amount">$89.99</span></td>
                <td><span class="tn-admin-badge tn-admin-badge-success">Delivered</span></td>
                <td>Jul 15, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Order"><i class="bi bi-eye"></i></a>
                  </div>
                </td>
              </tr>

              <tr data-status="processing" data-date="2026-07-14">
                <td><span class="tn-admin-order-id">#TN-2839</span></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">CW</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Chris Walker</strong>
                      <span>chris.w@email.com</span>
                    </div>
                  </div>
                </td>
                <td><span class="tn-admin-order-items">2 items</span></td>
                <td><span class="tn-admin-order-amount">$1,599.00</span></td>
                <td><span class="tn-admin-badge tn-admin-badge-info">Processing</span></td>
                <td>Jul 14, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Order"><i class="bi bi-eye"></i></a>
                  </div>
                </td>
              </tr>

              <tr data-status="pending" data-date="2026-07-13">
                <td><span class="tn-admin-order-id">#TN-2838</span></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">NS</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Nina Schmidt</strong>
                      <span>nina.s@email.com</span>
                    </div>
                  </div>
                </td>
                <td><span class="tn-admin-order-items">3 items</span></td>
                <td><span class="tn-admin-order-amount">$649.00</span></td>
                <td><span class="tn-admin-badge tn-admin-badge-warning">Pending</span></td>
                <td>Jul 13, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Order"><i class="bi bi-eye"></i></a>
                  </div>
                </td>
              </tr>
              <!-- End Dynamic Orders List -->
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="tn-admin-pagination-wrap">
          <div class="tn-admin-pagination-info">
            <span>Showing 1-10 of 2,847 orders</span>
          </div>
          <div class="tn-admin-pagination" id="tnAdminOrdersPagination">
            <button class="tn-admin-page-btn" disabled><i class="bi bi-chevron-left"></i></button>
            <button class="tn-admin-page-btn active">1</button>
            <button class="tn-admin-page-btn">2</button>
            <button class="tn-admin-page-btn">3</button>
            <button class="tn-admin-page-btn">4</button>
            <button class="tn-admin-page-btn">...</button>
            <button class="tn-admin-page-btn">285</button>
            <button class="tn-admin-page-btn"><i class="bi bi-chevron-right"></i></button>
          </div>
        </div>
      </div>

      <!-- ========== EMPTY STATE ========== -->
      <div class="tn-admin-empty-state" id="tnAdminOrdersEmptyState" style="display: none;">
        <div class="tn-admin-empty-icon">
          <i class="bi bi-receipt"></i>
        </div>
        <h3>No orders found</h3>
        <p>We couldn't find any orders matching your search or filters. Try adjusting your criteria.</p>
        <div class="tn-admin-empty-actions">
          <button class="btn tn-admin-btn-outline" id="tnAdminOrdersClearFilters">
            <i class="bi bi-x-lg me-2"></i> Clear Filters
          </button>
        </div>
      </div>

    </main>

    <?php include 'includes/footer.php'; ?>
