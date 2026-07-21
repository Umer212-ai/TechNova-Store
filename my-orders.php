<?php
// my-orders.php - TechNova Store My Orders Page
// Backend integration will be added later.
// include 'includes/config.php';
// include 'includes/db.php';

// Dynamic User Orders: Redirect if not logged in
// if (!isset($_SESSION['user_id'])) {
//     header('Location: login.php');
//     exit;
// }
?>
<?php include 'includes/header.php'; ?>
<body>

  <!-- ========== TOP ANNOUNCEMENT BAR ========== -->
  <div class="tn-topbar">
    <div class="container d-flex justify-content-between align-items-center">
      <span><i class="bi bi-truck me-2"></i>Free shipping on orders over $99</span>
      <span class="d-none d-md-inline">
        <i class="bi bi-headset me-2"></i>24/7 Support: +1 (800) 123-4567
      </span>
    </div>
  </div>

  <!-- ========== NAVBAR ========== -->
  <?php include 'includes/navbar.php'; ?>

  <!-- ========== PAGE HEADER ========== -->
  <section class="tn-page-header">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="tn-breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li class="active">My Orders</li>
        </ol>
      </nav>
      <span class="tn-eyebrow"><span class="tn-dot"></span> Order History</span>
      <h1 class="tn-page-title">My Orders</h1>
      <!-- Dynamic Order Count -->
      <p class="tn-page-sub">Track and manage your <strong>5 orders</strong></p>
    </div>
  </section>

  <!-- ========== ORDERS SECTION ========== -->
  <section class="tn-section tn-orders-section">
    <div class="container">

      <!-- ===== ORDERS CONTENT (shown when orders exist) ===== -->
      <div class="tn-orders-content" id="tnOrdersContent">

        <!-- Filters + Search Row -->
        <div class="tn-orders-toolbar" data-tn-animate="fade-up">
          <div class="tn-orders-filters" id="tnOrderFilters">
            <button class="tn-orders-filter-btn active" data-filter="all">
              All <span class="tn-orders-filter-count">5</span>
            </button>
            <button class="tn-orders-filter-btn" data-filter="pending">
              Pending <span class="tn-orders-filter-count">1</span>
            </button>
            <button class="tn-orders-filter-btn" data-filter="processing">
              Processing <span class="tn-orders-filter-count">1</span>
            </button>
            <button class="tn-orders-filter-btn" data-filter="shipped">
              Shipped <span class="tn-orders-filter-count">1</span>
            </button>
            <button class="tn-orders-filter-btn" data-filter="delivered">
              Delivered <span class="tn-orders-filter-count">1</span>
            </button>
            <button class="tn-orders-filter-btn" data-filter="cancelled">
              Cancelled <span class="tn-orders-filter-count">1</span>
            </button>
          </div>
          <div class="tn-orders-search">
            <i class="bi bi-search"></i>
            <input type="text" class="form-control" id="tnOrderSearch" placeholder="Search orders..." />
          </div>
        </div>

        <!-- ===== ORDER CARDS ===== -->
        <div class="tn-orders-list" id="tnOrdersList">

          <!-- Dynamic Orders List -->

          <!-- ===== ORDER 1 — Delivered ===== -->
          <div class="tn-order-card" data-order-status="delivered" data-tn-animate="fade-up">
            <!-- Order Header -->
            <div class="tn-order-header">
              <div class="tn-order-header-left">
                <span class="tn-order-id">#TN-20240156</span>
                <span class="tn-order-date"><i class="bi bi-calendar3 me-1"></i> Jan 15, 2024</span>
              </div>
              <div class="tn-order-header-right">
                <span class="tn-order-status tn-order-status-delivered">
                  <i class="bi bi-check-circle-fill me-1"></i> Delivered
                </span>
                <span class="tn-order-payment tn-order-payment-paid">
                  <i class="bi bi-shield-check me-1"></i> Paid
                </span>
              </div>
            </div>

            <!-- Order Items -->
            <div class="tn-order-items">
              <!-- Item 1 -->
              <div class="tn-order-item">
                <div class="tn-order-item-img">
                  <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=300&q=80" alt="Nova Phone 15 Pro" />
                </div>
                <div class="tn-order-item-info">
                  <span class="tn-order-item-cat">Smartphones</span>
                  <h6 class="tn-order-item-name">
                    <a href="product-details.php?id=1">Nova Phone 15 Pro</a>
                  </h6>
                  <span class="tn-order-item-variant">Color: Space Black</span>
                </div>
                <div class="tn-order-item-meta">
                  <span class="tn-order-item-qty">Qty: 1</span>
                  <span class="tn-order-item-price">$1,099.00</span>
                </div>
              </div>
              <!-- Item 2 -->
              <div class="tn-order-item">
                <div class="tn-order-item-img">
                  <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=300&q=80" alt="Nova Buds Ultra" />
                </div>
                <div class="tn-order-item-info">
                  <span class="tn-order-item-cat">Audio</span>
                  <h6 class="tn-order-item-name">
                    <a href="product-details.php?id=2">Nova Buds Ultra</a>
                  </h6>
                  <span class="tn-order-item-variant">Color: Silver</span>
                </div>
                <div class="tn-order-item-meta">
                  <span class="tn-order-item-qty">Qty: 2</span>
                  <span class="tn-order-item-price">$498.00</span>
                </div>
              </div>
            </div>

            <!-- Order Footer -->
            <div class="tn-order-footer">
              <div class="tn-order-total">
                <span>Total:</span>
                <strong>$1,885.68</strong>
              </div>
              <div class="tn-order-actions">
                <a href="#" class="btn tn-btn-ghost btn-sm tn-order-btn-view">
                  <i class="bi bi-eye me-1"></i> View Details
                </a>
                <a href="#" class="btn tn-btn-ghost btn-sm tn-order-btn-track" data-action="track">
                  <i class="bi bi-geo-alt me-1"></i> Track Order
                </a>
                <a href="#" class="btn tn-btn-ghost btn-sm tn-order-btn-invoice" data-action="invoice">
                  <i class="bi bi-download me-1"></i> Invoice
                </a>
              </div>
            </div>
          </div>

          <!-- ===== ORDER 2 — Shipped ===== -->
          <div class="tn-order-card" data-order-status="shipped" data-tn-animate="fade-up">
            <div class="tn-order-header">
              <div class="tn-order-header-left">
                <span class="tn-order-id">#TN-20240142</span>
                <span class="tn-order-date"><i class="bi bi-calendar3 me-1"></i> Jan 8, 2024</span>
              </div>
              <div class="tn-order-header-right">
                <span class="tn-order-status tn-order-status-shipped">
                  <i class="bi bi-truck me-1"></i> Shipped
                </span>
                <span class="tn-order-payment tn-order-payment-paid">
                  <i class="bi bi-shield-check me-1"></i> Paid
                </span>
              </div>
            </div>
            <div class="tn-order-items">
              <div class="tn-order-item">
                <div class="tn-order-item-img">
                  <img src="https://images.unsplash.com/photo-1546868871-af0de0ae72be?auto=format&fit=crop&w=300&q=80" alt="Nova Watch Series 5" />
                </div>
                <div class="tn-order-item-info">
                  <span class="tn-order-item-cat">Wearables</span>
                  <h6 class="tn-order-item-name">
                    <a href="product-details.php?id=3">Nova Watch Series 5</a>
                  </h6>
                  <span class="tn-order-item-variant">Size: 45mm</span>
                </div>
                <div class="tn-order-item-meta">
                  <span class="tn-order-item-qty">Qty: 1</span>
                  <span class="tn-order-item-price">$1,099.00</span>
                </div>
              </div>
            </div>
            <div class="tn-order-footer">
              <div class="tn-order-total">
                <span>Total:</span>
                <strong>$1,099.00</strong>
              </div>
              <div class="tn-order-actions">
                <a href="#" class="btn tn-btn-ghost btn-sm tn-order-btn-view">
                  <i class="bi bi-eye me-1"></i> View Details
                </a>
                <a href="#" class="btn tn-btn-ghost btn-sm tn-order-btn-track" data-action="track">
                  <i class="bi bi-geo-alt me-1"></i> Track Order
                </a>
                <a href="#" class="btn tn-btn-ghost btn-sm tn-order-btn-invoice" data-action="invoice">
                  <i class="bi bi-download me-1"></i> Invoice
                </a>
              </div>
            </div>
          </div>

          <!-- ===== ORDER 3 — Processing ===== -->
          <div class="tn-order-card" data-order-status="processing" data-tn-animate="fade-up">
            <div class="tn-order-header">
              <div class="tn-order-header-left">
                <span class="tn-order-id">#TN-20240128</span>
                <span class="tn-order-date"><i class="bi bi-calendar3 me-1"></i> Dec 28, 2023</span>
              </div>
              <div class="tn-order-header-right">
                <span class="tn-order-status tn-order-status-processing">
                  <i class="bi bi-arrow-repeat me-1"></i> Processing
                </span>
                <span class="tn-order-payment tn-order-payment-paid">
                  <i class="bi bi-shield-check me-1"></i> Paid
                </span>
              </div>
            </div>
            <div class="tn-order-items">
              <div class="tn-order-item">
                <div class="tn-order-item-img">
                  <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=300&q=80" alt="Nova Headphones Max" />
                </div>
                <div class="tn-order-item-info">
                  <span class="tn-order-item-cat">Audio</span>
                  <h6 class="tn-order-item-name">
                    <a href="product-details.php?id=4">Nova Headphones Max</a>
                  </h6>
                  <span class="tn-order-item-variant">Color: Midnight Black</span>
                </div>
                <div class="tn-order-item-meta">
                  <span class="tn-order-item-qty">Qty: 1</span>
                  <span class="tn-order-item-price">$449.00</span>
                </div>
              </div>
              <div class="tn-order-item">
                <div class="tn-order-item-img">
                  <img src="https://images.unsplash.com/photo-1585792180666-f7347c490ee2?auto=format&fit=crop&w=300&q=80" alt="Nova Wireless Charger Pro" />
                </div>
                <div class="tn-order-item-info">
                  <span class="tn-order-item-cat">Accessories</span>
                  <h6 class="tn-order-item-name">
                    <a href="product-details.php?id=5">Nova Wireless Charger Pro</a>
                  </h6>
                  <span class="tn-order-item-variant">Color: White</span>
                </div>
                <div class="tn-order-item-meta">
                  <span class="tn-order-item-qty">Qty: 1</span>
                  <span class="tn-order-item-price">$198.00</span>
                </div>
              </div>
            </div>
            <div class="tn-order-footer">
              <div class="tn-order-total">
                <span>Total:</span>
                <strong>$647.00</strong>
              </div>
              <div class="tn-order-actions">
                <a href="#" class="btn tn-btn-ghost btn-sm tn-order-btn-view">
                  <i class="bi bi-eye me-1"></i> View Details
                </a>
                <a href="#" class="btn tn-btn-ghost btn-sm tn-order-btn-cancel" data-action="cancel">
                  <i class="bi bi-x-circle me-1"></i> Cancel Order
                </a>
                <a href="#" class="btn tn-btn-ghost btn-sm tn-order-btn-invoice" data-action="invoice">
                  <i class="bi bi-download me-1"></i> Invoice
                </a>
              </div>
            </div>
          </div>

          <!-- ===== ORDER 4 — Delivered ===== -->
          <div class="tn-order-card" data-order-status="delivered" data-tn-animate="fade-up">
            <div class="tn-order-header">
              <div class="tn-order-header-left">
                <span class="tn-order-id">#TN-20240115</span>
                <span class="tn-order-date"><i class="bi bi-calendar3 me-1"></i> Dec 15, 2023</span>
              </div>
              <div class="tn-order-header-right">
                <span class="tn-order-status tn-order-status-delivered">
                  <i class="bi bi-check-circle-fill me-1"></i> Delivered
                </span>
                <span class="tn-order-payment tn-order-payment-paid">
                  <i class="bi bi-shield-check me-1"></i> Paid
                </span>
              </div>
            </div>
            <div class="tn-order-items">
              <div class="tn-order-item">
                <div class="tn-order-item-img">
                  <img src="https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?auto=format&fit=crop&w=300&q=80" alt="Nova Laptop Pro 16" />
                </div>
                <div class="tn-order-item-info">
                  <span class="tn-order-item-cat">Laptops</span>
                  <h6 class="tn-order-item-name">
                    <a href="product-details.php?id=6">Nova Laptop Pro 16</a>
                  </h6>
                  <span class="tn-order-item-variant">M3 Max / 32GB / 1TB</span>
                </div>
                <div class="tn-order-item-meta">
                  <span class="tn-order-item-qty">Qty: 1</span>
                  <span class="tn-order-item-price">$2,340.00</span>
                </div>
              </div>
            </div>
            <div class="tn-order-footer">
              <div class="tn-order-total">
                <span>Total:</span>
                <strong>$2,340.00</strong>
              </div>
              <div class="tn-order-actions">
                <a href="#" class="btn tn-btn-ghost btn-sm tn-order-btn-view">
                  <i class="bi bi-eye me-1"></i> View Details
                </a>
                <a href="#" class="btn tn-btn-ghost btn-sm tn-order-btn-track" data-action="track">
                  <i class="bi bi-geo-alt me-1"></i> Track Order
                </a>
                <a href="#" class="btn tn-btn-ghost btn-sm tn-order-btn-invoice" data-action="invoice">
                  <i class="bi bi-download me-1"></i> Invoice
                </a>
              </div>
            </div>
          </div>

          <!-- ===== ORDER 5 — Cancelled ===== -->
          <div class="tn-order-card" data-order-status="cancelled" data-tn-animate="fade-up">
            <div class="tn-order-header">
              <div class="tn-order-header-left">
                <span class="tn-order-id">#TN-20240098</span>
                <span class="tn-order-date"><i class="bi bi-calendar3 me-1"></i> Dec 2, 2023</span>
              </div>
              <div class="tn-order-header-right">
                <span class="tn-order-status tn-order-status-cancelled">
                  <i class="bi bi-x-circle-fill me-1"></i> Cancelled
                </span>
                <span class="tn-order-payment tn-order-payment-refunded">
                  <i class="bi bi-arrow-return-left me-1"></i> Refunded
                </span>
              </div>
            </div>
            <div class="tn-order-items">
              <div class="tn-order-item">
                <div class="tn-order-item-img">
                  <img src="https://images.unsplash.com/photo-1612178991541-b48cc8e92a4d?auto=format&fit=crop&w=300&q=80" alt="Nova Tablet Air" />
                </div>
                <div class="tn-order-item-info">
                  <span class="tn-order-item-cat">Tablets</span>
                  <h6 class="tn-order-item-name">
                    <a href="product-details.php?id=7">Nova Tablet Air</a>
                  </h6>
                  <span class="tn-order-item-variant">Storage: 256GB</span>
                </div>
                <div class="tn-order-item-meta">
                  <span class="tn-order-item-qty">Qty: 1</span>
                  <span class="tn-order-item-price">$249.00</span>
                </div>
              </div>
            </div>
            <div class="tn-order-footer">
              <div class="tn-order-total">
                <span>Total:</span>
                <strong>$249.00</strong>
              </div>
              <div class="tn-order-actions">
                <a href="#" class="btn tn-btn-ghost btn-sm tn-order-btn-view">
                  <i class="bi bi-eye me-1"></i> View Details
                </a>
                <a href="#" class="btn tn-btn-ghost btn-sm tn-order-btn-reorder" data-action="reorder">
                  <i class="bi bi-bag me-1"></i> Reorder
                </a>
                <a href="#" class="btn tn-btn-ghost btn-sm tn-order-btn-invoice" data-action="invoice">
                  <i class="bi bi-download me-1"></i> Invoice
                </a>
              </div>
            </div>
          </div>

        </div>

        <!-- No Search Results -->
        <div class="tn-orders-no-results d-none" id="tnOrdersNoResults">
          <div class="tn-orders-no-results-inner">
            <div class="tn-orders-no-results-icon">
              <i class="bi bi-search"></i>
            </div>
            <h4>No orders found</h4>
            <p>No orders match your search. Try different keywords or clear the search.</p>
            <button class="btn tn-btn-ghost" id="tnClearSearch">
              <i class="bi bi-x-lg me-1"></i> Clear Search
            </button>
          </div>
        </div>

      </div>

      <!-- ===== EMPTY ORDERS STATE ===== -->
      <div class="tn-orders-empty d-none" id="tnOrdersEmpty">
        <div class="tn-orders-empty-inner">
          <div class="tn-orders-empty-icon">
            <i class="bi bi-bag-x"></i>
          </div>
          <h3>No orders yet</h3>
          <p>You haven't placed any orders yet. Start shopping and your order history will appear here.</p>
          <a href="products.php" class="btn tn-btn-primary btn-lg">
            <i class="bi bi-bag me-2"></i> Start Shopping
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- ========== NEWSLETTER ========== -->
  <section class="tn-section tn-newsletter">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-7">
          <span class="tn-eyebrow"><span class="tn-dot"></span> Stay Connected</span>
          <h2 class="tn-section-title">Get Exclusive Tech Deals</h2>
          <p class="tn-section-sub">
            Subscribe to our newsletter and be the first to know about new
            arrivals, exclusive offers, and tech insights.
          </p>
          <form class="tn-newsletter-form" id="tnNewsletterForm">
            <input type="email" class="form-control" placeholder="Enter your email address" required />
            <button class="btn tn-btn-primary" type="submit">
              Subscribe <i class="bi bi-arrow-right ms-2"></i>
            </button>
          </form>
          <small class="tn-newsletter-note">
            We respect your privacy. Unsubscribe anytime.
          </small>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== FOOTER ========== -->
  <?php include "includes/footer.php"; ?>

  <!-- Back to top -->
  <button class="tn-back-top" id="tnBackTop" aria-label="Back to top">
    <i class="bi bi-arrow-up"></i>
  </button>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Project Script -->
  <script src="js/script.js"></script>
</body>
</html>
