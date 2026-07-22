<?php
// admin/dashboard.php - TechNova Store Admin Dashboard
// Backend integration will be added later.
// include '../includes/config.php';
// include '../includes/db.php';
// include 'includes/auth.php';

$pageTitle = 'Dashboard';
?>
<?php include 'includes/header.php'; ?>

  <?php include 'includes/sidebar.php'; ?>

  <div class="tn-admin-wrapper">
    <?php include 'includes/topbar.php'; ?>

    <!-- ========== MAIN CONTENT ========== -->
    <main class="tn-admin-main">

      <!-- ========== WELCOME SECTION ========== -->
      <section class="tn-admin-welcome">
        <div class="tn-admin-welcome-content">
          <h1 class="tn-admin-welcome-title">Good Morning, <span class="tn-admin-gradient-text">Admin</span></h1>
          <p class="tn-admin-welcome-sub">Here's what's happening with your store today. You have <strong>12 new orders</strong> and <strong>3 low stock alerts</strong> that need your attention.</p>
        </div>
        <div class="tn-admin-welcome-actions">
          <a href="#" class="btn tn-admin-btn-primary">
            <i class="bi bi-plus-lg me-2"></i> Add Product
          </a>
          <a href="#" class="btn tn-admin-btn-outline">
            <i class="bi bi-download me-2"></i> Export Report
          </a>
        </div>
      </section>

      <!-- ========== STATISTICS CARDS ========== -->
      <div class="row g-4 mb-4">
        <!-- Dynamic Dashboard Statistics -->
        <div class="col-sm-6 col-xl-3">
          <div class="tn-admin-stat-card">
            <div class="tn-admin-stat-icon tn-admin-stat-icon-primary">
              <i class="bi bi-box-seam"></i>
            </div>
            <div class="tn-admin-stat-info">
              <span class="tn-admin-stat-label">Total Products</span>
              <span class="tn-admin-stat-value">1,247</span>
              <span class="tn-admin-stat-change tn-admin-stat-up">
                <i class="bi bi-arrow-up"></i> 12.5% from last month
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="tn-admin-stat-card">
            <div class="tn-admin-stat-icon tn-admin-stat-icon-accent">
              <i class="bi bi-grid-3x3-gap"></i>
            </div>
            <div class="tn-admin-stat-info">
              <span class="tn-admin-stat-label">Total Categories</span>
              <span class="tn-admin-stat-value">24</span>
              <span class="tn-admin-stat-change tn-admin-stat-up">
                <i class="bi bi-arrow-up"></i> 2 new this month
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="tn-admin-stat-card">
            <div class="tn-admin-stat-icon tn-admin-stat-icon-purple">
              <i class="bi bi-cart3"></i>
            </div>
            <div class="tn-admin-stat-info">
              <span class="tn-admin-stat-label">Total Orders</span>
              <span class="tn-admin-stat-value">3,842</span>
              <span class="tn-admin-stat-change tn-admin-stat-up">
                <i class="bi bi-arrow-up"></i> 8.2% from last month
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="tn-admin-stat-card">
            <div class="tn-admin-stat-icon tn-admin-stat-icon-rose">
              <i class="bi bi-people"></i>
            </div>
            <div class="tn-admin-stat-info">
              <span class="tn-admin-stat-label">Total Customers</span>
              <span class="tn-admin-stat-value">12,563</span>
              <span class="tn-admin-stat-change tn-admin-stat-up">
                <i class="bi bi-arrow-up"></i> 248 new this month
              </span>
            </div>
          </div>
        </div>
      </div>

      <!-- ========== REVENUE CARD ========== -->
      <div class="row g-4 mb-4">
        <div class="col-12">
          <div class="tn-admin-revenue-card">
            <div class="tn-admin-revenue-left">
              <span class="tn-admin-revenue-label">Total Revenue</span>
              <span class="tn-admin-revenue-value">$847,293.45</span>
              <span class="tn-admin-stat-change tn-admin-stat-up">
                <i class="bi bi-arrow-up"></i> 18.7% increase from last month
              </span>
            </div>
            <div class="tn-admin-revenue-breakdown">
              <div class="tn-admin-revenue-item">
                <span class="tn-admin-revenue-item-dot" style="background: var(--admin-primary);"></span>
                <span>This Month: <strong>$124,563</strong></span>
              </div>
              <div class="tn-admin-revenue-item">
                <span class="tn-admin-revenue-item-dot" style="background: var(--admin-accent);"></span>
                <span>Last Month: <strong>$104,928</strong></span>
              </div>
              <div class="tn-admin-revenue-item">
                <span class="tn-admin-revenue-item-dot" style="background: #8b5cf6;"></span>
                <span>This Year: <strong>$847,293</strong></span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ========== SALES CHART + QUICK ACTIONS ========== -->
      <div class="row g-4 mb-4">
        <!-- Sales Overview Chart -->
        <div class="col-lg-8">
          <div class="tn-admin-card">
            <div class="tn-admin-card-header">
              <h5 class="tn-admin-card-title">
                <i class="bi bi-graph-up me-2"></i> Sales Overview
              </h5>
              <div class="tn-admin-chart-filters">
                <button class="tn-admin-chart-filter active" data-range="week">Week</button>
                <button class="tn-admin-chart-filter" data-range="month">Month</button>
                <button class="tn-admin-chart-filter" data-range="year">Year</button>
              </div>
            </div>
            <div class="tn-admin-card-body">
              <!-- Dynamic Charts -->
              <div class="tn-admin-chart-placeholder">
                <div class="tn-admin-chart-bars">
                  <div class="tn-admin-chart-bar" style="height: 45%;"><span class="tn-admin-chart-bar-tooltip">$8.2k</span></div>
                  <div class="tn-admin-chart-bar" style="height: 65%;"><span class="tn-admin-chart-bar-tooltip">$12.1k</span></div>
                  <div class="tn-admin-chart-bar" style="height: 55%;"><span class="tn-admin-chart-bar-tooltip">$10.3k</span></div>
                  <div class="tn-admin-chart-bar" style="height: 80%;"><span class="tn-admin-chart-bar-tooltip">$15.8k</span></div>
                  <div class="tn-admin-chart-bar" style="height: 70%;"><span class="tn-admin-chart-bar-tooltip">$13.2k</span></div>
                  <div class="tn-admin-chart-bar active" style="height: 90%;"><span class="tn-admin-chart-bar-tooltip">$18.4k</span></div>
                  <div class="tn-admin-chart-bar" style="height: 85%;"><span class="tn-admin-chart-bar-tooltip">$16.9k</span></div>
                </div>
                <div class="tn-admin-chart-labels">
                  <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4">
          <div class="tn-admin-card tn-admin-card-full">
            <div class="tn-admin-card-header">
              <h5 class="tn-admin-card-title">
                <i class="bi bi-lightning-charge me-2"></i> Quick Actions
              </h5>
            </div>
            <div class="tn-admin-card-body">
              <div class="tn-admin-quick-actions">
                <a href="add-product.php" class="tn-admin-quick-action">
                  <div class="tn-admin-quick-action-icon tn-admin-quick-action-primary">
                    <i class="bi bi-plus-circle"></i>
                  </div>
                  <span>Add New Product</span>
                </a>
                <a href="add-category.php" class="tn-admin-quick-action">
                  <div class="tn-admin-quick-action-icon tn-admin-quick-action-accent">
                    <i class="bi bi-folder-plus"></i>
                  </div>
                  <span>Create Category</span>
                </a>
                <a href="#" class="tn-admin-quick-action">
                  <div class="tn-admin-quick-action-icon tn-admin-quick-action-purple">
                    <i class="bi bi-megaphone"></i>
                  </div>
                  <span>Add Banner</span>
                </a>
                <a href="orders.php" class="tn-admin-quick-action">
                  <div class="tn-admin-quick-action-icon tn-admin-quick-action-rose">
                    <i class="bi bi-truck"></i>
                  </div>
                  <span>Manage Orders</span>
                </a>
                <a href="customers.php" class="tn-admin-quick-action">
                  <div class="tn-admin-quick-action-icon tn-admin-quick-action-orange">
                    <i class="bi bi-people"></i>
                  </div>
                  <span>View Customers</span>
                </a>
                <a href="#" class="tn-admin-quick-action">
                  <div class="tn-admin-quick-action-icon tn-admin-quick-action-teal">
                    <i class="bi bi-newspaper"></i>
                  </div>
                  <span>Write Blog Post</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ========== RECENT ORDERS TABLE ========== -->
      <div class="row g-4 mb-4">
        <div class="col-xl-8">
          <div class="tn-admin-card">
            <div class="tn-admin-card-header">
              <h5 class="tn-admin-card-title">
                <i class="bi bi-receipt me-2"></i> Recent Orders
              </h5>
              <a href="orders.php" class="tn-admin-card-link">View All <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="tn-admin-card-body p-0">
              <div class="tn-admin-table-wrap">
                <table class="tn-admin-table">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Customer</th>
                      <th>Products</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Dynamic Recent Orders -->
                    <tr>
                      <td><span class="tn-admin-order-id">#TN-2847</span></td>
                      <td>
                        <div class="tn-admin-customer-cell">
                          <div class="tn-admin-customer-avatar">SC</div>
                          <div>
                            <strong>Sarah Chen</strong>
                            <span>sarah@example.com</span>
                          </div>
                        </div>
                      </td>
                      <td>3 items</td>
                      <td class="tn-admin-table-price">$1,299.00</td>
                      <td><span class="tn-admin-badge tn-admin-badge-success">Delivered</span></td>
                      <td>Jul 22, 2026</td>
                      <td>
                        <div class="tn-admin-table-actions">
                          <a href="order-details.php" class="tn-admin-table-btn" title="View"><i class="bi bi-eye"></i></a>
                          <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><span class="tn-admin-order-id">#TN-2846</span></td>
                      <td>
                        <div class="tn-admin-customer-cell">
                          <div class="tn-admin-customer-avatar tn-admin-avatar-accent">JW</div>
                          <div>
                            <strong>James Wilson</strong>
                            <span>james@example.com</span>
                          </div>
                        </div>
                      </td>
                      <td>1 item</td>
                      <td class="tn-admin-table-price">$749.99</td>
                      <td><span class="tn-admin-badge tn-admin-badge-warning">Processing</span></td>
                      <td>Jul 22, 2026</td>
                      <td>
                        <div class="tn-admin-table-actions">
                          <a href="order-details.php" class="tn-admin-table-btn" title="View"><i class="bi bi-eye"></i></a>
                          <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><span class="tn-admin-order-id">#TN-2845</span></td>
                      <td>
                        <div class="tn-admin-customer-cell">
                          <div class="tn-admin-customer-avatar tn-admin-avatar-purple">EP</div>
                          <div>
                            <strong>Emily Park</strong>
                            <span>emily@example.com</span>
                          </div>
                        </div>
                      </td>
                      <td>2 items</td>
                      <td class="tn-admin-table-price">$2,148.50</td>
                      <td><span class="tn-admin-badge tn-admin-badge-info">Shipped</span></td>
                      <td>Jul 21, 2026</td>
                      <td>
                        <div class="tn-admin-table-actions">
                          <a href="order-details.php" class="tn-admin-table-btn" title="View"><i class="bi bi-eye"></i></a>
                          <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><span class="tn-admin-order-id">#TN-2844</span></td>
                      <td>
                        <div class="tn-admin-customer-cell">
                          <div class="tn-admin-customer-avatar tn-admin-avatar-rose">MR</div>
                          <div>
                            <strong>Michael Roberts</strong>
                            <span>michael@example.com</span>
                          </div>
                        </div>
                      </td>
                      <td>5 items</td>
                      <td class="tn-admin-table-price">$3,892.00</td>
                      <td><span class="tn-admin-badge tn-admin-badge-warning">Processing</span></td>
                      <td>Jul 21, 2026</td>
                      <td>
                        <div class="tn-admin-table-actions">
                          <a href="order-details.php" class="tn-admin-table-btn" title="View"><i class="bi bi-eye"></i></a>
                          <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><span class="tn-admin-order-id">#TN-2843</span></td>
                      <td>
                        <div class="tn-admin-customer-cell">
                          <div class="tn-admin-customer-avatar">LP</div>
                          <div>
                            <strong>Lisa Patel</strong>
                            <span>lisa@example.com</span>
                          </div>
                        </div>
                      </td>
                      <td>1 item</td>
                      <td class="tn-admin-table-price">$599.00</td>
                      <td><span class="tn-admin-badge tn-admin-badge-success">Delivered</span></td>
                      <td>Jul 20, 2026</td>
                      <td>
                        <div class="tn-admin-table-actions">
                          <a href="order-details.php" class="tn-admin-table-btn" title="View"><i class="bi bi-eye"></i></a>
                          <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- ========== LOW STOCK PRODUCTS ========== -->
        <div class="col-xl-4">
          <div class="tn-admin-card">
            <div class="tn-admin-card-header">
              <h5 class="tn-admin-card-title">
                <i class="bi bi-exclamation-triangle me-2"></i> Low Stock
              </h5>
              <a href="products.php" class="tn-admin-card-link">View All <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="tn-admin-card-body">
              <div class="tn-admin-low-stock-list">
                <!-- Dynamic Low Stock Products -->
                <div class="tn-admin-low-stock-item">
                  <div class="tn-admin-low-stock-img">
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=100&q=80" alt="Wireless Earbuds Pro" />
                  </div>
                  <div class="tn-admin-low-stock-info">
                    <strong>Wireless Earbuds Pro</strong>
                    <span class="tn-admin-low-stock-count tn-admin-low-stock-critical">3 left</span>
                  </div>
                  <a href="products.php" class="tn-admin-low-stock-action" title="Restock"><i class="bi bi-plus-circle"></i></a>
                </div>
                <div class="tn-admin-low-stock-item">
                  <div class="tn-admin-low-stock-img">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=100&q=80" alt="Smart Watch Ultra" />
                  </div>
                  <div class="tn-admin-low-stock-info">
                    <strong>Smart Watch Ultra</strong>
                    <span class="tn-admin-low-stock-count tn-admin-low-stock-warning">7 left</span>
                  </div>
                  <a href="products.php" class="tn-admin-low-stock-action" title="Restock"><i class="bi bi-plus-circle"></i></a>
                </div>
                <div class="tn-admin-low-stock-item">
                  <div class="tn-admin-low-stock-img">
                    <img src="https://images.unsplash.com/photo-1585386959984-a4155224a1ad?auto=format&fit=crop&w=100&q=80" alt="4K Webcam Pro" />
                  </div>
                  <div class="tn-admin-low-stock-info">
                    <strong>4K Webcam Pro</strong>
                    <span class="tn-admin-low-stock-count tn-admin-low-stock-warning">5 left</span>
                  </div>
                  <a href="products.php" class="tn-admin-low-stock-action" title="Restock"><i class="bi bi-plus-circle"></i></a>
                </div>
                <div class="tn-admin-low-stock-item">
                  <div class="tn-admin-low-stock-img">
                    <img src="https://images.unsplash.com/photo-1546868871-af0de0ae72be?auto=format&fit=crop&w=100&q=80" alt="Bluetooth Speaker Mini" />
                  </div>
                  <div class="tn-admin-low-stock-info">
                    <strong>Bluetooth Speaker Mini</strong>
                    <span class="tn-admin-low-stock-count tn-admin-low-stock-critical">2 left</span>
                  </div>
                  <a href="products.php" class="tn-admin-low-stock-action" title="Restock"><i class="bi bi-plus-circle"></i></a>
                </div>
                <div class="tn-admin-low-stock-item">
                  <div class="tn-admin-low-stock-img">
                    <img src="https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?auto=format&fit=crop&w=100&q=80" alt="USB-C Hub Adapter" />
                  </div>
                  <div class="tn-admin-low-stock-info">
                    <strong>USB-C Hub Adapter</strong>
                    <span class="tn-admin-low-stock-count tn-admin-low-stock-warning">8 left</span>
                  </div>
                  <a href="products.php" class="tn-admin-low-stock-action" title="Restock"><i class="bi bi-plus-circle"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ========== CUSTOMERS + ACTIVITY ========== -->
      <div class="row g-4 mb-4">
        <!-- Latest Customers -->
        <div class="col-lg-6">
          <div class="tn-admin-card">
            <div class="tn-admin-card-header">
              <h5 class="tn-admin-card-title">
                <i class="bi bi-people me-2"></i> Latest Customers
              </h5>
              <a href="customers.php" class="tn-admin-card-link">View All <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="tn-admin-card-body">
              <div class="tn-admin-customer-list">
                <!-- Dynamic Customers -->
                <div class="tn-admin-customer-row">
                  <div class="tn-admin-customer-avatar tn-admin-avatar-primary">SC</div>
                  <div class="tn-admin-customer-details">
                    <strong>Sarah Chen</strong>
                    <span>sarah@example.com</span>
                  </div>
                  <div class="tn-admin-customer-meta">
                    <span class="tn-admin-customer-orders">8 orders</span>
                    <span class="tn-admin-customer-spent">$4,230</span>
                  </div>
                </div>
                <div class="tn-admin-customer-row">
                  <div class="tn-admin-customer-avatar tn-admin-avatar-accent">JW</div>
                  <div class="tn-admin-customer-details">
                    <strong>James Wilson</strong>
                    <span>james@example.com</span>
                  </div>
                  <div class="tn-admin-customer-meta">
                    <span class="tn-admin-customer-orders">3 orders</span>
                    <span class="tn-admin-customer-spent">$1,899</span>
                  </div>
                </div>
                <div class="tn-admin-customer-row">
                  <div class="tn-admin-customer-avatar tn-admin-avatar-purple">EP</div>
                  <div class="tn-admin-customer-details">
                    <strong>Emily Park</strong>
                    <span>emily@example.com</span>
                  </div>
                  <div class="tn-admin-customer-meta">
                    <span class="tn-admin-customer-orders">12 orders</span>
                    <span class="tn-admin-customer-spent">$8,120</span>
                  </div>
                </div>
                <div class="tn-admin-customer-row">
                  <div class="tn-admin-customer-avatar tn-admin-avatar-rose">MR</div>
                  <div class="tn-admin-customer-details">
                    <strong>Michael Roberts</strong>
                    <span>michael@example.com</span>
                  </div>
                  <div class="tn-admin-customer-meta">
                    <span class="tn-admin-customer-orders">5 orders</span>
                    <span class="tn-admin-customer-spent">$3,892</span>
                  </div>
                </div>
                <div class="tn-admin-customer-row">
                  <div class="tn-admin-customer-avatar">LP</div>
                  <div class="tn-admin-customer-details">
                    <strong>Lisa Patel</strong>
                    <span>lisa@example.com</span>
                  </div>
                  <div class="tn-admin-customer-meta">
                    <span class="tn-admin-customer-orders">2 orders</span>
                    <span class="tn-admin-customer-spent">$599</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Recent Activity Timeline -->
        <div class="col-lg-6">
          <div class="tn-admin-card">
            <div class="tn-admin-card-header">
              <h5 class="tn-admin-card-title">
                <i class="bi bi-clock-history me-2"></i> Recent Activity
              </h5>
              <a href="#" class="tn-admin-card-link">View All <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="tn-admin-card-body">
              <div class="tn-admin-timeline">
                <!-- Dynamic Activity Timeline -->
                <div class="tn-admin-timeline-item">
                  <div class="tn-admin-timeline-dot tn-admin-timeline-dot-success"></div>
                  <div class="tn-admin-timeline-content">
                    <p><strong>Order #TN-2847 delivered</strong></p>
                    <span>Successfully delivered to Sarah Chen in San Francisco, CA</span>
                    <time>2 minutes ago</time>
                  </div>
                </div>
                <div class="tn-admin-timeline-item">
                  <div class="tn-admin-timeline-dot tn-admin-timeline-dot-warning"></div>
                  <div class="tn-admin-timeline-content">
                    <p><strong>Low stock alert triggered</strong></p>
                    <span>Wireless Earbuds Pro dropped below minimum threshold (3 units)</span>
                    <time>15 minutes ago</time>
                  </div>
                </div>
                <div class="tn-admin-timeline-item">
                  <div class="tn-admin-timeline-dot tn-admin-timeline-dot-primary"></div>
                  <div class="tn-admin-timeline-content">
                    <p><strong>New order received</strong></p>
                    <span>James Wilson placed order #TN-2846 for $749.99</span>
                    <time>42 minutes ago</time>
                  </div>
                </div>
                <div class="tn-admin-timeline-item">
                  <div class="tn-admin-timeline-dot tn-admin-timeline-dot-info"></div>
                  <div class="tn-admin-timeline-content">
                    <p><strong>Product updated</strong></p>
                    <span>MacBook Air M3 price updated to $1,099.00</span>
                    <time>1 hour ago</time>
                  </div>
                </div>
                <div class="tn-admin-timeline-item">
                  <div class="tn-admin-timeline-dot tn-admin-timeline-dot-accent"></div>
                  <div class="tn-admin-timeline-content">
                    <p><strong>New customer registered</strong></p>
                    <span>Emily Park created a new account</span>
                    <time>3 hours ago</time>
                  </div>
                </div>
                <div class="tn-admin-timeline-item">
                  <div class="tn-admin-timeline-dot tn-admin-timeline-dot-primary"></div>
                  <div class="tn-admin-timeline-content">
                    <p><strong>New order received</strong></p>
                    <span>Lisa Patel placed order #TN-2843 for $599.00</span>
                    <time>5 hours ago</time>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>

    <?php include 'includes/footer.php'; ?>
