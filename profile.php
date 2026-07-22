<?php
// profile.php - TechNova Store User Profile Page
// Backend integration will be added later.
// include 'includes/config.php';
// include 'includes/db.php';

// Dynamic User Profile: Redirect if not logged in
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
          <li class="active">My Account</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- ========== PROFILE SECTION ========== -->
  <section class="tn-section tn-profile-section">
    <div class="container">
      <div class="row g-4">

        <!-- ===== LEFT COLUMN: Profile Card + Stats ===== -->
        <div class="col-lg-4">

          <!-- Profile Card -->
          <div class="tn-profile-card" data-tn-animate="fade-up">
            <!-- Dynamic User Profile -->
            <div class="tn-profile-avatar-wrap">
              <div class="tn-profile-avatar">
                <i class="bi bi-person-fill"></i>
                <!-- Profile picture would replace this icon -->
              </div>
              <button class="tn-profile-avatar-edit" aria-label="Change profile picture">
                <i class="bi bi-camera"></i>
              </button>
            </div>
            <h3 class="tn-profile-name">John Doe</h3>
            <p class="tn-profile-email">john.doe@email.com</p>
            <span class="tn-profile-badge">
              <i class="bi bi-patch-check-fill me-1"></i> Premium Member
            </span>

            <div class="tn-profile-divider"></div>

            <!-- Profile Quick Info -->
            <div class="tn-profile-info-list">
              <div class="tn-profile-info-item">
                <i class="bi bi-telephone"></i>
                <div>
                  <span class="tn-profile-info-label">Phone</span>
                  <span class="tn-profile-info-value">+1 (555) 123-4567</span>
                </div>
              </div>
              <div class="tn-profile-info-item">
                <i class="bi bi-geo-alt"></i>
                <div>
                  <span class="tn-profile-info-label">Location</span>
                  <span class="tn-profile-info-value">New York, NY 10001</span>
                </div>
              </div>
              <div class="tn-profile-info-item">
                <i class="bi bi-calendar3"></i>
                <div>
                  <span class="tn-profile-info-label">Member Since</span>
                  <span class="tn-profile-info-value">January 2024</span>
                </div>
              </div>
            </div>

            <div class="tn-profile-divider"></div>

            <!-- Action Buttons -->
            <div class="tn-profile-actions">
              <button class="btn tn-btn-primary tn-profile-btn" id="tnEditProfile">
                <i class="bi bi-pencil-square me-2"></i> Edit Profile
              </button>
              <button class="btn tn-btn-ghost tn-profile-btn" id="tnChangePassword">
                <i class="bi bi-key me-2"></i> Change Password
              </button>
            </div>
          </div>

          <!-- Account Statistics -->
          <div class="tn-profile-card tn-profile-stats-card" data-tn-animate="fade-up">
            <h5 class="tn-profile-card-title">
              <i class="bi bi-bar-chart-line me-2"></i> Account Overview
            </h5>
            <!-- Dynamic User Statistics -->
            <div class="tn-profile-stats">
              <div class="tn-profile-stat">
                <div class="tn-profile-stat-icon">
                  <i class="bi bi-bag"></i>
                </div>
                <div class="tn-profile-stat-info">
                  <span class="tn-profile-stat-num">24</span>
                  <span class="tn-profile-stat-label">Total Orders</span>
                </div>
              </div>
              <div class="tn-profile-stat">
                <div class="tn-profile-stat-icon tn-profile-stat-icon-wish">
                  <i class="bi bi-heart"></i>
                </div>
                <div class="tn-profile-stat-info">
                  <span class="tn-profile-stat-num">12</span>
                  <span class="tn-profile-stat-label">Wishlist Items</span>
                </div>
              </div>
              <div class="tn-profile-stat">
                <div class="tn-profile-stat-icon tn-profile-stat-icon-cart">
                  <i class="bi bi-cart3"></i>
                </div>
                <div class="tn-profile-stat-info">
                  <span class="tn-profile-stat-num">3</span>
                  <span class="tn-profile-stat-label">Cart Items</span>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- ===== RIGHT COLUMN: Details + Orders ===== -->
        <div class="col-lg-8">

          <!-- Account Information -->
          <div class="tn-profile-card" data-tn-animate="fade-up">
            <h5 class="tn-profile-card-title">
              <i class="bi bi-person-lines-fill me-2"></i> Account Information
            </h5>
            <!-- Dynamic User Profile -->
            <div class="tn-profile-detail-grid">
              <div class="tn-profile-detail">
                <span class="tn-profile-detail-label">Full Name</span>
                <span class="tn-profile-detail-value">John Doe</span>
              </div>
              <div class="tn-profile-detail">
                <span class="tn-profile-detail-label">Username</span>
                <span class="tn-profile-detail-value">@johndoe</span>
              </div>
              <div class="tn-profile-detail">
                <span class="tn-profile-detail-label">Email Address</span>
                <span class="tn-profile-detail-value">john.doe@email.com</span>
              </div>
              <div class="tn-profile-detail">
                <span class="tn-profile-detail-label">Phone Number</span>
                <span class="tn-profile-detail-value">+1 (555) 123-4567</span>
              </div>
            </div>
          </div>

          <!-- Shipping Address -->
          <div class="tn-profile-card" data-tn-animate="fade-up">
            <div class="tn-profile-card-header-row">
              <h5 class="tn-profile-card-title mb-0">
                <i class="bi bi-geo-alt me-2"></i> Shipping Address
              </h5>
              <button class="btn tn-btn-ghost tn-profile-edit-link" id="tnEditAddress">
                <i class="bi bi-pencil me-1"></i> Edit
              </button>
            </div>
            <!-- Dynamic Address -->
            <div class="tn-profile-address">
              <p class="tn-profile-address-line">John Doe</p>
              <p class="tn-profile-address-line">123 Tech Avenue, Apt 4B</p>
              <p class="tn-profile-address-line">New York, NY 10001</p>
              <p class="tn-profile-address-line">United States</p>
            </div>
          </div>

          <!-- Recent Orders -->
          <div class="tn-profile-card" data-tn-animate="fade-up">
            <div class="tn-profile-card-header-row">
              <h5 class="tn-profile-card-title mb-0">
                <i class="bi bi-receipt me-2"></i> Recent Orders
              </h5>
              <a href="my-orders.php" class="tn-link-arrow">View All <i class="bi bi-arrow-right"></i></a>
            </div>
            <!-- Dynamic Recent Orders -->
            <div class="tn-profile-orders-table">
              <div class="tn-profile-order-row tn-profile-order-header">
                <span>Order ID</span>
                <span>Date</span>
                <span>Items</span>
                <span>Total</span>
                <span>Status</span>
              </div>
              <div class="tn-profile-order-row">
                <span class="tn-profile-order-id">#TN-20240156</span>
                <span>Jan 15, 2024</span>
                <span>3 items</span>
                <span class="tn-profile-order-total">$1,885.68</span>
                <span class="tn-profile-order-status tn-profile-status-delivered">
                  <i class="bi bi-check-circle-fill me-1"></i> Delivered
                </span>
              </div>
              <div class="tn-profile-order-row">
                <span class="tn-profile-order-id">#TN-20240142</span>
                <span>Jan 8, 2024</span>
                <span>1 item</span>
                <span class="tn-profile-order-total">$1,099.00</span>
                <span class="tn-profile-order-status tn-profile-status-shipped">
                  <i class="bi bi-truck me-1"></i> Shipped
                </span>
              </div>
              <div class="tn-profile-order-row">
                <span class="tn-profile-order-id">#TN-20240128</span>
                <span>Dec 28, 2023</span>
                <span>2 items</span>
                <span class="tn-profile-order-total">$647.00</span>
                <span class="tn-profile-order-status tn-profile-status-processing">
                  <i class="bi bi-arrow-repeat me-1"></i> Processing
                </span>
              </div>
              <div class="tn-profile-order-row">
                <span class="tn-profile-order-id">#TN-20240115</span>
                <span>Dec 15, 2023</span>
                <span>4 items</span>
                <span class="tn-profile-order-total">$2,340.00</span>
                <span class="tn-profile-order-status tn-profile-status-delivered">
                  <i class="bi bi-check-circle-fill me-1"></i> Delivered
                </span>
              </div>
              <div class="tn-profile-order-row">
                <span class="tn-profile-order-id">#TN-20240098</span>
                <span>Dec 2, 2023</span>
                <span>1 item</span>
                <span class="tn-profile-order-total">$249.00</span>
                <span class="tn-profile-order-status tn-profile-status-cancelled">
                  <i class="bi bi-x-circle-fill me-1"></i> Cancelled
                </span>
              </div>
            </div>
          </div>

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
