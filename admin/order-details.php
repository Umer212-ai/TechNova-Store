<?php
// admin/order-details.php - TechNova Store Admin Order Details
// Backend integration will be added later.
// include '../includes/config.php';
// include '../includes/db.php';
// include 'includes/auth.php';
// $orderId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
// $order = /* fetch order by $orderId */;
// $orderItems = /* fetch order items by $orderId */;
// $customer = /* fetch customer by $order['customer_id'] */;

$pageTitle = 'Order Details';
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
          <li><a href="orders.php">Orders</a></li>
          <li class="active">
            <!-- Dynamic Order ID — e.g. <?php echo '#' . htmlspecialchars($order['order_id'] ?? ''); ?> -->
            #TN-2847
          </li>
        </ol>
      </nav>

      <!-- ========== PAGE HEADER ========== -->
      <div class="tn-admin-page-header">
        <div class="tn-admin-page-header-left">
          <h1 class="tn-admin-page-title">
            <!-- Dynamic Order ID — from DB -->
            Order #TN-2847
          </h1>
          <p class="tn-admin-page-sub">
            <!-- Dynamic Order Date — from DB -->
            Placed on July 21, 2026 at 2:34 PM
          </p>
        </div>
        <div class="tn-admin-page-header-actions">
          <a href="orders.php" class="btn tn-admin-btn-outline">
            <i class="bi bi-arrow-left me-2"></i> Back to Orders
          </a>
        </div>
      </div>

      <!-- ========== ORDER STATUS BAR ========== -->
      <div class="tn-admin-order-status-bar">
        <div class="tn-admin-order-status-step completed">
          <div class="tn-admin-order-status-dot"><i class="bi bi-check-lg"></i></div>
          <span>Placed</span>
        </div>
        <div class="tn-admin-order-status-line completed"></div>
        <div class="tn-admin-order-status-step completed">
          <div class="tn-admin-order-status-dot"><i class="bi bi-check-lg"></i></div>
          <span>Confirmed</span>
        </div>
        <div class="tn-admin-order-status-line completed"></div>
        <div class="tn-admin-order-status-step completed">
          <div class="tn-admin-order-status-dot"><i class="bi bi-check-lg"></i></div>
          <span>Shipped</span>
        </div>
        <div class="tn-admin-order-status-line completed"></div>
        <div class="tn-admin-order-status-step active">
          <div class="tn-admin-order-status-dot"><i class="bi bi-truck"></i></div>
          <span>Out for Delivery</span>
        </div>
        <div class="tn-admin-order-status-line"></div>
        <div class="tn-admin-order-status-step">
          <div class="tn-admin-order-status-dot"><i class="bi bi-house-door"></i></div>
          <span>Delivered</span>
        </div>
      </div>

      <!-- ========== ORDER DETAILS LAYOUT ========== -->
      <div class="row g-4">

        <!-- ===== LEFT COLUMN ===== -->
        <div class="col-lg-8">

          <!-- Products Card -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-bag"></i> Order Items</h3>
              <p><!-- Dynamic Items Count --><span class="tn-admin-badge tn-admin-badge-info">3 items</span></p>
            </div>

            <div class="tn-admin-table-wrap">
              <table class="tn-admin-table tn-admin-table-order-items" id="tnAdminOrderItemsTable">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Dynamic Order Items -->
                  <tr>
                    <td>
                      <div class="tn-admin-product-cell">
                        <div class="tn-admin-product-thumb">
                          <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=100&q=80" alt="MacBook Pro 14-inch" />
                        </div>
                        <div class="tn-admin-product-info">
                          <strong class="tn-admin-product-name">MacBook Pro 14-inch M4</strong>
                          <span class="tn-admin-product-sku-mobile">MBP-14-M4-001</span>
                        </div>
                      </div>
                    </td>
                    <td><span class="tn-admin-order-item-price">$1,849.00</span></td>
                    <td><span class="tn-admin-order-item-qty">1</span></td>
                    <td><span class="tn-admin-order-item-total">$1,849.00</span></td>
                  </tr>

                  <tr>
                    <td>
                      <div class="tn-admin-product-cell">
                        <div class="tn-admin-product-thumb">
                          <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=100&q=80" alt="Sony WH-1000XM5" />
                        </div>
                        <div class="tn-admin-product-info">
                          <strong class="tn-admin-product-name">Sony WH-1000XM5</strong>
                          <span class="tn-admin-product-sku-mobile">SWH-1K-003</span>
                        </div>
                      </div>
                    </td>
                    <td><span class="tn-admin-order-item-price">$349.99</span></td>
                    <td><span class="tn-admin-order-item-qty">1</span></td>
                    <td><span class="tn-admin-order-item-total">$349.99</span></td>
                  </tr>

                  <tr>
                    <td>
                      <div class="tn-admin-product-cell">
                        <div class="tn-admin-product-thumb">
                          <img src="https://images.unsplash.com/photo-1527814050087-3793815479db?auto=format&fit=crop&w=100&q=80" alt="Logitech MX Master 3S" />
                        </div>
                        <div class="tn-admin-product-info">
                          <strong class="tn-admin-product-name">Logitech MX Master 3S</strong>
                          <span class="tn-admin-product-sku-mobile">LMX-3S-006</span>
                        </div>
                      </div>
                    </td>
                    <td><span class="tn-admin-order-item-price">$79.99</span></td>
                    <td><span class="tn-admin-order-item-qty">1</span></td>
                    <td><span class="tn-admin-order-item-total">$79.99</span></td>
                  </tr>
                  <!-- End Dynamic Order Items -->
                </tbody>
              </table>
            </div>

            <!-- Order Totals -->
            <div class="tn-admin-order-totals">
              <div class="tn-admin-order-total-row">
                <span>Subtotal</span>
                <!-- Dynamic Subtotal — from DB -->
                <span>$2,278.98</span>
              </div>
              <div class="tn-admin-order-total-row">
                <span>Shipping</span>
                <!-- Dynamic Shipping Cost — from DB -->
                <span>$0.00</span>
              </div>
              <div class="tn-admin-order-total-row">
                <span>Tax</span>
                <!-- Dynamic Tax — from DB -->
                <span>$182.32</span>
              </div>
              <div class="tn-admin-order-total-row">
                <span>Discount</span>
                <!-- Dynamic Discount — from DB -->
                <span class="tn-admin-order-total-discount">-$150.00</span>
              </div>
              <div class="tn-admin-order-total-row tn-admin-order-total-final">
                <span>Total</span>
                <!-- Dynamic Total — from DB -->
                <span>$2,311.30</span>
              </div>
            </div>
          </div>

          <!-- Shipping Address Card -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-geo-alt"></i> Shipping Address</h3>
            </div>
            <div class="tn-admin-order-address">
              <!-- Dynamic Shipping Address — from DB -->
              <p class="tn-admin-order-address-name"><strong>Sarah Chen</strong></p>
              <p>742 Evergreen Terrace, Apt 4B</p>
              <p>San Francisco, CA 94102</p>
              <p>United States</p>
              <p class="tn-admin-order-address-phone"><i class="bi bi-telephone me-2"></i>+1 (415) 555-0198</p>
            </div>
          </div>

        </div>

        <!-- ===== RIGHT COLUMN ===== -->
        <div class="col-lg-4">

          <!-- Order Information Card -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-info-circle"></i> Order Information</h3>
            </div>
            <div class="tn-admin-meta-list">
              <div class="tn-admin-meta-item">
                <span class="tn-admin-meta-label">Order ID</span>
                <span class="tn-admin-meta-value">
                  <!-- Dynamic Order ID — from DB -->
                  #TN-2847
                </span>
              </div>
              <div class="tn-admin-meta-item">
                <span class="tn-admin-meta-label">Date</span>
                <span class="tn-admin-meta-value">
                  <!-- Dynamic Order Date — from DB -->
                  Jul 21, 2026
                </span>
              </div>
              <div class="tn-admin-meta-item">
                <span class="tn-admin-meta-label">Time</span>
                <span class="tn-admin-meta-value">
                  <!-- Dynamic Order Time — from DB -->
                  2:34 PM
                </span>
              </div>
              <div class="tn-admin-meta-item">
                <span class="tn-admin-meta-label">Payment</span>
                <span class="tn-admin-meta-value">
                  <!-- Dynamic Payment Method — from DB -->
                  Credit Card
                </span>
              </div>
              <div class="tn-admin-meta-item">
                <span class="tn-admin-meta-label">Card</span>
                <span class="tn-admin-meta-value">
                  <!-- Dynamic Card Last 4 — from DB -->
                  ****4829
                </span>
              </div>
            </div>
          </div>

          <!-- Customer Card -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-person"></i> Customer</h3>
            </div>
            <div class="tn-admin-order-customer-detail">
              <!-- Dynamic Customer Info — from DB -->
              <div class="tn-admin-customer-cell">
                <div class="tn-admin-customer-avatar">SC</div>
                <div>
                  <strong>Sarah Chen</strong>
                  <span>sarah.chen@email.com</span>
                </div>
              </div>
              <div class="tn-admin-order-customer-meta">
                <div class="tn-admin-order-customer-meta-item">
                  <span>Phone</span>
                  <span>+1 (415) 555-0198</span>
                </div>
                <div class="tn-admin-order-customer-meta-item">
                  <span>Orders</span>
                  <span><!-- Dynamic Order Count -->8 orders</span>
                </div>
                <div class="tn-admin-order-customer-meta-item">
                  <span>Customer Since</span>
                  <span><!-- Dynamic Customer Since -->Jan 10, 2026</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Payment Status Card -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-credit-card"></i> Payment Status</h3>
            </div>
            <div class="tn-admin-order-payment-status">
              <!-- Dynamic Payment Status — from DB -->
              <div class="tn-admin-order-payment-row">
                <span>Status</span>
                <span class="tn-admin-badge tn-admin-badge-success">Paid</span>
              </div>
              <div class="tn-admin-order-payment-row">
                <span>Method</span>
                <span>Credit Card</span>
              </div>
              <div class="tn-admin-order-payment-row">
                <span>Transaction ID</span>
                <span><!-- Dynamic Transaction ID — from DB -->TXN-8927451</span>
              </div>
              <div class="tn-admin-order-payment-row">
                <span>Date</span>
                <span><!-- Dynamic Payment Date — from DB -->Jul 21, 2026</span>
              </div>
            </div>
          </div>

          <!-- Order Status Card -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-truck"></i> Order Status</h3>
            </div>
            <div class="tn-admin-order-status-detail">
              <!-- Dynamic Order Status — from DB -->
              <div class="tn-admin-order-status-current">
                <span class="tn-admin-badge tn-admin-badge-purple">Shipped</span>
              </div>
              <div class="tn-admin-order-status-info">
                <div class="tn-admin-order-status-info-item">
                  <span>Tracking</span>
                  <span><!-- Dynamic Tracking Number — from DB -->1Z999AA10123456784</span>
                </div>
                <div class="tn-admin-order-status-info-item">
                  <span>Carrier</span>
                  <span><!-- Dynamic Carrier — from DB -->UPS</span>
                </div>
                <div class="tn-admin-order-status-info-item">
                  <span>Est. Delivery</span>
                  <span><!-- Dynamic Estimated Delivery — from DB -->Jul 25, 2026</span>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

      <!-- ========== BOTTOM ACTION BAR ========== -->
      <div class="tn-admin-form-actions tn-admin-form-actions-bottom">
        <a href="orders.php" class="btn tn-admin-btn-outline">
          <i class="bi bi-arrow-left me-2"></i> Back to Orders
        </a>
        <div class="tn-admin-form-actions-right">
          <button type="button" class="btn tn-admin-btn-outline" id="tnAdminPrintOrder">
            <i class="bi bi-printer me-2"></i> Print Order
          </button>
          <button type="button" class="btn tn-admin-btn-outline" id="tnAdminEmailInvoice">
            <i class="bi bi-envelope me-2"></i> Email Invoice
          </button>
        </div>
      </div>

    </main>

    <?php include 'includes/footer.php'; ?>