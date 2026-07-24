<?php
session_start();
include 'includes/db.php';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    if (empty($full_name) || empty($email) || empty($password)) {
        $error = 'Please fill all required fields.';
    } elseif ($password !== $confirm) {
        $error = 'Passwords do not match.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters.';
    } else {
        $check = mysqli_query($conn, "SELECT id FROM users WHERE email = '$email'");
        if (mysqli_num_rows($check) > 0) {
            $error = 'Email already registered.';
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (full_name, email, phone, address, password) 
                    VALUES ('$full_name', '$email', '$phone', '$address', '$hashed')";
            
            if (mysqli_query($conn, $sql)) {
                $_SESSION['user_id'] = mysqli_insert_id($conn);
                $_SESSION['user_name'] = $full_name;
                header('Location: index.php');
                exit;
            } else {
                $error = 'Registration failed: ' . mysqli_error($conn);
            }
        }
    }
}
?>
<?php include 'includes/header.php'; ?>
<body>

  <div class="tn-topbar">
    <div class="container d-flex justify-content-between align-items-center">
      <span><i class="bi bi-truck me-2"></i>Free shipping on orders over $99</span>
      <span class="d-none d-md-inline"><i class="bi bi-headset me-2"></i>24/7 Support: +1 (800) 123-4567</span>
    </div>
  </div>

  <?php include 'includes/navbar.php'; ?>

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

  <section class="tn-section tn-login-section">
    <div class="container">
      <div class="row align-items-center g-0 tn-login-row">

        <div class="col-lg-6 tn-login-banner-col" data-tn-animate="fade-up">
          <div class="tn-login-banner tn-register-banner">
            <div class="tn-login-banner-glow"></div>
            <div class="tn-login-banner-content">
              <span class="tn-eyebrow-light"><span class="tn-dot tn-dot-light"></span> Join TechNova</span>
              <h2 class="tn-login-banner-title">Start Your Tech Journey Today</h2>
              <p class="tn-login-banner-text">Create an account to unlock exclusive benefits.</p>
              <div class="tn-login-banner-features">
                <div class="tn-login-banner-feature">
                  <div class="tn-login-banner-feature-icon"><i class="bi bi-shield-check"></i></div>
                  <div><strong>Secure Account</strong><span>Your data is always protected</span></div>
                </div>
                <div class="tn-login-banner-feature">
                  <div class="tn-login-banner-feature-icon"><i class="bi bi-lightning-charge"></i></div>
                  <div><strong>Fast Checkout</strong><span>Save addresses for quick ordering</span></div>
                </div>
                <div class="tn-login-banner-feature">
                  <div class="tn-login-banner-feature-icon"><i class="bi bi-gift"></i></div>
                  <div><strong>Welcome Bonus</strong><span>10% off your first order</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 tn-login-form-col" data-tn-animate="fade-up">
          <div class="tn-login-form-wrap">
            <div class="tn-login-header">
              <div class="tn-login-icon"><i class="bi bi-person-plus"></i></div>
              <h2 class="tn-login-title">Create Account</h2>
              <p class="tn-login-subtitle">Join TechNova and discover premium electronics</p>
            </div>

            <?php if ($error): ?>
              <div style="background:#fee2e2; color:#dc2626; padding:15px; border-radius:10px; margin-bottom:15px;">
                <?php echo $error; ?>
              </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
              <div style="background:#d1fae5; color:#065f46; padding:15px; border-radius:10px; margin-bottom:15px;">
                <?php echo $success; ?>
              </div>
            <?php endif; ?>

            <form method="POST" action="">
              <div class="tn-form-group">
                <label class="tn-form-label">Full Name *</label>
                <input type="text" name="full_name" class="form-control tn-form-input tn-login-input" required />
              </div>
              <div class="tn-form-group">
                <label class="tn-form-label">Email *</label>
                <input type="email" name="email" class="form-control tn-form-input tn-login-input" required />
              </div>
              <div class="tn-form-group">
                <label class="tn-form-label">Phone</label>
                <input type="text" name="phone" class="form-control tn-form-input tn-login-input" />
              </div>
              <div class="tn-form-group">
                <label class="tn-form-label">Address</label>
                <textarea name="address" class="form-control tn-form-input tn-login-input" rows="2"></textarea>
              </div>
              <div class="tn-form-group">
                <label class="tn-form-label">Password *</label>
                <input type="password" name="password" class="form-control tn-form-input tn-login-input" required />
              </div>
              <div class="tn-form-group">
                <label class="tn-form-label">Confirm Password *</label>
                <input type="password" name="confirm_password" class="form-control tn-form-input tn-login-input" required />
              </div>
              <button type="submit" class="btn tn-btn-primary tn-login-btn w-100">Create Account</button>
              <p class="text-center mt-3">Already have an account? <a href="login.php">Sign in</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include "includes/footer.php"; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src = "js/script.js"></script>
</body>
</html>