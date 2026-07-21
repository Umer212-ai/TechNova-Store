<?php
// login.php - TechNova Store Login Page
// Backend integration will be added later.
// include 'includes/config.php';
// include 'includes/db.php';

// Dynamic User Session: Redirect if already logged in
// if (isset($_SESSION['user_id'])) {
//     header('Location: index.php');
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
          <li class="active">Login</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- ========== LOGIN SECTION ========== -->
  <section class="tn-section tn-login-section">
    <div class="container">
      <div class="row align-items-center g-0 tn-login-row">

        <!-- ===== SIDE BANNER (Left) ===== -->
        <div class="col-lg-6 tn-login-banner-col" data-tn-animate="fade-up">
          <div class="tn-login-banner">
            <div class="tn-login-banner-glow"></div>
            <div class="tn-login-banner-content">
              <span class="tn-eyebrow-light"><span class="tn-dot tn-dot-light"></span> Welcome to TechNova</span>
              <h2 class="tn-login-banner-title">Discover the Future of Technology</h2>
              <p class="tn-login-banner-text">Sign in to access your exclusive deals, track orders, and explore our curated collection of premium electronics.</p>
              <div class="tn-login-banner-features">
                <div class="tn-login-banner-feature">
                  <div class="tn-login-banner-feature-icon">
                    <i class="bi bi-bag-check"></i>
                  </div>
                  <div>
                    <strong>Track Orders</strong>
                    <span>Real-time shipping updates</span>
                  </div>
                </div>
                <div class="tn-login-banner-feature">
                  <div class="tn-login-banner-feature-icon">
                    <i class="bi bi-heart"></i>
                  </div>
                  <div>
                    <strong>Wishlist</strong>
                    <span>Save your favorite products</span>
                  </div>
                </div>
                <div class="tn-login-banner-feature">
                  <div class="tn-login-banner-feature-icon">
                    <i class="bi bi-percent"></i>
                  </div>
                  <div>
                    <strong>Exclusive Deals</strong>
                    <span>Member-only discounts</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Floating product card -->
            <div class="tn-login-banner-card tn-float">
              <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=400&q=80" alt="Featured Product" />
              <div class="tn-login-banner-card-tag">
                <i class="bi bi-stars me-1"></i> Best Seller
              </div>
            </div>
          </div>
        </div>

        <!-- ===== LOGIN FORM (Right) ===== -->
        <div class="col-lg-6 tn-login-form-col" data-tn-animate="fade-up">
          <div class="tn-login-form-wrap">

            <!-- Welcome Back -->
            <div class="tn-login-header">
              <div class="tn-login-icon">
                <i class="bi bi-person"></i>
              </div>
              <h2 class="tn-login-title">Welcome Back</h2>
              <p class="tn-login-subtitle">Sign in to your TechNova account to continue</p>
            </div>

            <!-- Dynamic Login Form -->
            <form class="tn-login-form" id="tnLoginForm" novalidate>

              <!-- Dynamic Validation Messages -->
              <div class="tn-login-alert d-none" id="tnLoginAlert">
                <i class="bi bi-exclamation-circle me-2"></i>
                <span id="tnLoginAlertText"></span>
              </div>

              <!-- Email Field -->
              <div class="tn-form-group">
                <label for="tnLoginEmail" class="tn-form-label">Email Address <span class="tn-required">*</span></label>
                <div class="tn-login-input-wrap">
                  <i class="bi bi-envelope"></i>
                  <input type="email" id="tnLoginEmail" class="form-control tn-form-input tn-login-input" placeholder="you@example.com" required autocomplete="email" />
                </div>
              </div>

              <!-- Password Field -->
              <div class="tn-form-group">
                <label for="tnLoginPassword" class="tn-form-label">Password <span class="tn-required">*</span></label>
                <div class="tn-login-input-wrap">
                  <i class="bi bi-lock"></i>
                  <input type="password" id="tnLoginPassword" class="form-control tn-form-input tn-login-input" placeholder="Enter your password" required autocomplete="current-password" />
                  <button type="button" class="tn-login-eye" id="tnTogglePassword" aria-label="Show password">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
              </div>

              <!-- Remember Me & Forgot Password -->
              <div class="tn-login-options">
                <div class="tn-form-check">
                  <input type="checkbox" id="tnRememberMe" class="tn-form-checkbox" />
                  <label for="tnRememberMe">Remember me</label>
                </div>
                <a href="#" class="tn-login-forgot" id="tnForgotPassword">Forgot password?</a>
              </div>

              <!-- Login Button -->
              <button type="submit" class="btn tn-btn-primary tn-login-btn" id="tnLoginBtn">
                <span class="tn-login-btn-text">Sign In</span>
                <i class="bi bi-arrow-right ms-2"></i>
              </button>

              <!-- Divider -->
              <div class="tn-login-divider">
                <span>or continue with</span>
              </div>

              <!-- Social Login -->
              <!-- Dynamic Social Login: Wire up OAuth providers later -->
              <div class="tn-login-socials">
                <button type="button" class="tn-login-social-btn" aria-label="Sign in with Google">
                  <i class="bi bi-google"></i>
                  <span>Google</span>
                </button>
                <button type="button" class="tn-login-social-btn" aria-label="Sign in with Facebook">
                  <i class="bi bi-facebook"></i>
                  <span>Facebook</span>
                </button>
                <button type="button" class="tn-login-social-btn" aria-label="Sign in with Apple">
                  <i class="bi bi-apple"></i>
                  <span>Apple</span>
                </button>
              </div>

              <!-- Register Link -->
              <p class="tn-login-register">
                Don't have an account? <a href="#">Create one now</a>
              </p>

            </form>
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
