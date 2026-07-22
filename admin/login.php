<?php
session_start();

// Initialize error variable
$error = '';

// Process login form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include __DIR__ . '/../includes/db.php';

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {

        $error = "Please enter both email and password.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error = "Please enter a valid email address.";

    } else {

        $stmt = mysqli_prepare($conn, "SELECT id, full_name, email, password FROM admins WHERE email = ? LIMIT 1");

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $admin = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);

        // Temporary plain password check
        if ($admin && $password === $admin['password']) {

            session_regenerate_id(true);

            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['full_name'];
            $_SESSION['admin_email'] = $admin['email'];

            header("Location: dashboard.php");
            exit;

        } else {

            $error = "Invalid email or password.";

        }
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="TechNova Store Admin Panel - Sign in to manage your store." />
  <title>TechNova Admin | Login</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Admin stylesheet -->
  <link rel="stylesheet" href="style/admin.css" />
</head>
<body class="tn-admin-login-body">

  <div class="tn-admin-login-wrapper">

    <!-- ===== LEFT PANEL — Branding ===== -->
    <div class="tn-admin-login-brand">
      <div class="tn-admin-login-brand-glow"></div>
      <div class="tn-admin-login-brand-content">

        <div class="tn-admin-login-brand-logo">
          <div class="tn-admin-login-brand-icon">
            <i class="bi bi-shield-lock"></i>
          </div>
          <span class="tn-admin-login-brand-text">TechNova <strong>Admin</strong></span>
        </div>

        <h1 class="tn-admin-login-brand-title">Manage Your Store with Confidence</h1>
        <p class="tn-admin-login-brand-desc">
          Access your dashboard to manage products, orders, customers, and more — all from one powerful panel.
        </p>

        <div class="tn-admin-login-brand-features">
          <div class="tn-admin-login-brand-feature">
            <div class="tn-admin-login-brand-feature-icon">
              <i class="bi bi-box-seam"></i>
            </div>
            <div>
              <strong>Product Management</strong>
              <span>Add, edit, and organize your catalog</span>
            </div>
          </div>
          <div class="tn-admin-login-brand-feature">
            <div class="tn-admin-login-brand-feature-icon">
              <i class="bi bi-graph-up-arrow"></i>
            </div>
            <div>
              <strong>Real-time Analytics</strong>
              <span>Track sales, revenue, and trends</span>
            </div>
          </div>
          <div class="tn-admin-login-brand-feature">
            <div class="tn-admin-login-brand-feature-icon">
              <i class="bi bi-truck"></i>
            </div>
            <div>
              <strong>Order Fulfillment</strong>
              <span>Process and ship orders efficiently</span>
            </div>
          </div>
        </div>
      </div>

      <div class="tn-admin-login-brand-footer">
        <span>&copy; 2026 TechNova Store. All rights reserved.</span>
      </div>
    </div>

    <!-- ===== RIGHT PANEL — Login Form ===== -->
    <div class="tn-admin-login-form-col">
      <div class="tn-admin-login-form-wrap">

        <div class="tn-admin-login-header">
          <div class="tn-admin-login-header-icon">
            <i class="bi bi-person-gear"></i>
          </div>
          <h2 class="tn-admin-login-title">Admin Login</h2>
          <p class="tn-admin-login-subtitle">Sign in to access the admin panel</p>
        </div>

        <?php if ($error !== ''): ?>
        <div class="tn-admin-login-alert tn-admin-login-alert-error">
          <i class="bi bi-exclamation-circle me-2"></i>
          <?php echo htmlspecialchars($error); ?>
        </div>
        <?php endif; ?>

        <form class="tn-admin-login-form" id="tnAdminLoginForm" method="POST" action="login.php" novalidate>

          <!-- Email -->
          <div class="tn-admin-form-group">
            <label for="tnAdminLoginEmail" class="tn-admin-label">Email Address <span class="tn-required">*</span></label>
            <div class="tn-admin-login-input-wrap">
              <i class="bi bi-envelope"></i>
              <input
                type="email"
                id="tnAdminLoginEmail"
                name="email"
                class="tn-admin-input tn-admin-login-input"
                placeholder="admin@technova.com"
                required
                autocomplete="email"
                value="<?php echo htmlspecialchars($email ?? ''); ?>"
              />
            </div>
          </div>

          <!-- Password -->
          <div class="tn-admin-form-group">
            <label for="tnAdminLoginPassword" class="tn-admin-label">Password <span class="tn-required">*</span></label>
            <div class="tn-admin-login-input-wrap">
              <i class="bi bi-lock"></i>
              <input
                type="password"
                id="tnAdminLoginPassword"
                name="password"
                class="tn-admin-input tn-admin-login-input"
                placeholder="Enter your password"
                required
                autocomplete="current-password"
              />
              <button type="button" class="tn-admin-login-eye" id="tnAdminTogglePassword" aria-label="Show password">
                <i class="bi bi-eye"></i>
              </button>
            </div>
          </div>

          <!-- Remember Me -->
          <div class="tn-admin-login-options">
            <div class="tn-admin-form-check">
              <input type="checkbox" id="tnAdminRememberMe" class="tn-admin-form-checkbox" name="remember" />
              <label for="tnAdminRememberMe">Remember me</label>
            </div>
          </div>

          <!-- Submit -->
          <button type="submit" class="tn-admin-btn-primary tn-admin-login-btn" id="tnAdminLoginBtn">
            <span class="tn-admin-login-btn-text">Sign In</span>
            <i class="bi bi-arrow-right ms-2"></i>
          </button>

          <!-- Back to Store -->
          <div class="tn-admin-login-back">
            <a href="../index.php">
              <i class="bi bi-arrow-left me-1"></i> Back to Store
            </a>
          </div>

        </form>
      </div>
    </div>

  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Admin Script -->
  <script src="js/admin.js"></script>
</body>
</html>
