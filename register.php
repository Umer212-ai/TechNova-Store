<?php
// register.php - TechNova Store Registration Page
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
          <li class="active">Register</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- ========== REGISTER SECTION ========== -->
  <section class="tn-section tn-login-section">
    <div class="container">
      <div class="row align-items-center g-0 tn-login-row">

        <!-- ===== SIDE BANNER (Left) ===== -->
        <div class="col-lg-6 tn-login-banner-col" data-tn-animate="fade-up">
          <div class="tn-login-banner tn-register-banner">
            <div class="tn-login-banner-glow"></div>
            <div class="tn-login-banner-content">
              <span class="tn-eyebrow-light"><span class="tn-dot tn-dot-light"></span> Join TechNova</span>
              <h2 class="tn-login-banner-title">Start Your Tech Journey Today</h2>
              <p class="tn-login-banner-text">Create an account to unlock exclusive benefits, track your orders, and enjoy a personalized shopping experience.</p>
              <div class="tn-login-banner-features">
                <div class="tn-login-banner-feature">
                  <div class="tn-login-banner-feature-icon">
                    <i class="bi bi-shield-check"></i>
                  </div>
                  <div>
                    <strong>Secure Account</strong>
                    <span>Your data is always protected</span>
                  </div>
                </div>
                <div class="tn-login-banner-feature">
                  <div class="tn-login-banner-feature-icon">
                    <i class="bi bi-lightning-charge"></i>
                  </div>
                  <div>
                    <strong>Fast Checkout</strong>
                    <span>Save addresses for quick ordering</span>
                  </div>
                </div>
                <div class="tn-login-banner-feature">
                  <div class="tn-login-banner-feature-icon">
                    <i class="bi bi-gift"></i>
                  </div>
                  <div>
                    <strong>Welcome Bonus</strong>
                    <span>10% off your first order</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Floating product card -->
            <div class="tn-login-banner-card tn-float">
              <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=400&q=80" alt="Featured Product" />
              <div class="tn-login-banner-card-tag">
                <i class="bi bi-percent me-1"></i> 10% Off
              </div>
            </div>
          </div>
        </div>

        <!-- ===== REGISTER FORM (Right) ===== -->
        <div class="col-lg-6 tn-login-form-col" data-tn-animate="fade-up">
          <div class="tn-login-form-wrap">

            <!-- Welcome Header -->
            <div class="tn-login-header">
              <div class="tn-login-icon">
                <i class="bi bi-person-plus"></i>
              </div>
              <h2 class="tn-login-title">Create Account</h2>
              <p class="tn-login-subtitle">Join TechNova and discover premium electronics</p>
            </div>

            <!-- Dynamic Registration Form -->
            <form class="tn-login-form" id="tnRegisterForm" novalidate>

              <!-- Dynamic Validation Messages -->
              <div class="tn-login-alert d-none" id="tnRegisterAlert">
                <i class="bi bi-exclamation-circle me-2"></i>
                <span id="tnRegisterAlertText"></span>
              </div>

              <!-- Full Name -->
              <div class="tn-form-group">
                <label for="tnRegFullName" class="tn-form-label">Full Name <span class="tn-required">*</span></label>
                <div class="tn-login-input-wrap">
                  <i class="bi bi-person"></i>
                  <input type="text" id="tnRegFullName" class="form-control tn-form-input tn-login-input" placeholder="John Doe" required autocomplete="name" />
                </div>
              </div>

              <!-- Username -->
              <div class="tn-form-group">
                <label for="tnRegUsername" class="tn-form-label">Username <span class="tn-required">*</span></label>
                <div class="tn-login-input-wrap">
                  <i class="bi bi-at"></i>
                  <input type="text" id="tnRegUsername" class="form-control tn-form-input tn-login-input" placeholder="johndoe" required autocomplete="username" />
                </div>
              </div>

              <!-- Email Address -->
              <div class="tn-form-group">
                <label for="tnRegEmail" class="tn-form-label">Email Address <span class="tn-required">*</span></label>
                <div class="tn-login-input-wrap">
                  <i class="bi bi-envelope"></i>
                  <input type="email" id="tnRegEmail" class="form-control tn-form-input tn-login-input" placeholder="you@example.com" required autocomplete="email" />
                </div>
              </div>

              <!-- Phone Number -->
              <div class="tn-form-group">
                <label for="tnRegPhone" class="tn-form-label">Phone Number <span class="tn-required">*</span></label>
                <div class="tn-login-input-wrap">
                  <i class="bi bi-telephone"></i>
                  <input type="tel" id="tnRegPhone" class="form-control tn-form-input tn-login-input" placeholder="+1 (555) 000-0000" required autocomplete="tel" />
                </div>
              </div>

              <!-- Password -->
              <div class="tn-form-group">
                <label for="tnRegPassword" class="tn-form-label">Password <span class="tn-required">*</span></label>
                <div class="tn-login-input-wrap">
                  <i class="bi bi-lock"></i>
                  <input type="password" id="tnRegPassword" class="form-control tn-form-input tn-login-input" placeholder="Create a strong password" required autocomplete="new-password" />
                  <button type="button" class="tn-login-eye" id="tnToggleRegPassword" aria-label="Show password">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
                <!-- Dynamic Validation Messages: password strength indicator -->
                <div class="tn-register-password-hint" id="tnRegPasswordHint">
                  <div class="tn-register-hint-bar">
                    <div class="tn-register-hint-fill" id="tnRegPasswordFill"></div>
                  </div>
                  <span class="tn-register-hint-text" id="tnRegPasswordText"></span>
                </div>
              </div>

              <!-- Confirm Password -->
              <div class="tn-form-group">
                <label for="tnRegConfirmPassword" class="tn-form-label">Confirm Password <span class="tn-required">*</span></label>
                <div class="tn-login-input-wrap">
                  <i class="bi bi-lock-fill"></i>
                  <input type="password" id="tnRegConfirmPassword" class="form-control tn-form-input tn-login-input" placeholder="Re-enter your password" required autocomplete="new-password" />
                  <button type="button" class="tn-login-eye" id="tnToggleRegConfirm" aria-label="Show password">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
              </div>

              <!-- Terms & Conditions -->
              <div class="tn-form-check tn-register-terms">
                <input type="checkbox" id="tnRegTerms" class="tn-form-checkbox" />
                <label for="tnRegTerms">I agree to the <a href="#">Terms &amp; Conditions</a> and <a href="#">Privacy Policy</a> <span class="tn-required">*</span></label>
              </div>

              <!-- Create Account Button -->
              <button type="submit" class="btn tn-btn-primary tn-login-btn" id="tnRegisterBtn">
                <span class="tn-login-btn-text">Create Account</span>
                <i class="bi bi-arrow-right ms-2"></i>
              </button>

              <!-- Divider -->
              <div class="tn-login-divider">
                <span>or sign up with</span>
              </div>

              <!-- Social Registration -->
              <!-- Dynamic Social Login: Wire up OAuth providers later -->
              <div class="tn-login-socials">
                <button type="button" class="tn-login-social-btn" aria-label="Sign up with Google">
                  <i class="bi bi-google"></i>
                  <span>Google</span>
                </button>
                <button type="button" class="tn-login-social-btn" aria-label="Sign up with Facebook">
                  <i class="bi bi-facebook"></i>
                  <span>Facebook</span>
                </button>
                <button type="button" class="tn-login-social-btn" aria-label="Sign up with Apple">
                  <i class="bi bi-apple"></i>
                  <span>Apple</span>
                </button>
              </div>

              <!-- Login Link -->
              <p class="tn-login-register">
                Already have an account? <a href="login.php">Sign in</a>
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
