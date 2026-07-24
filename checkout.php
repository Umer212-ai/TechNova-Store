<?php
session_start();
include 'includes/db.php';

$user_id = $_SESSION['user_id'] ?? 0;

// Redirect if not logged in
if ($user_id == 0) {
    header('Location: login.php?redirect=checkout.php');
    exit;
}

// Fetch cart items
$cart_items = [];
$subtotal = 0;
$total_items = 0;

$query = "SELECT c.*, p.product_name, p.price, p.image 
          FROM cart c 
          LEFT JOIN products p ON c.product_id = p.id 
          WHERE c.user_id = $user_id";
$cart_result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($cart_result)) {
    $row['product_name'] = $row['product_name'] ?? 'Product #'.$row['product_id'];
    $row['price'] = $row['price'] ?? 0;
    $row['total'] = $row['price'] * $row['quantity'];
    $subtotal += $row['total'];
    $total_items += $row['quantity'];
    $cart_items[] = $row;
}

if (empty($cart_items)) {
    header('Location: cart.php');
    exit;
}

$shipping = $subtotal > 99 ? 0 : 9.99;
$tax = round($subtotal * 0.08, 2);
$grand_total = $subtotal + $shipping + $tax;

// PLACE ORDER
$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $city = $_POST['city'] ?? '';
    $state = $_POST['state'] ?? '';
    $zip = $_POST['zip'] ?? '';
    
    $sql = "INSERT INTO orders (user_id, first_name, last_name, email, phone, address, city, state, zip, total_amount, order_status, payment_status, created_at) 
            VALUES ($user_id, '$first_name', '$last_name', '$email', '$phone', '$address', '$city', '$state', '$zip', $grand_total, 'Pending', 'Pending', NOW())";
    
    if (mysqli_query($conn, $sql)) {
        $order_id = mysqli_insert_id($conn);
        
        foreach ($cart_items as $item) {
            $pid = $item['product_id'];
            $pprice = $item['price'];
            $pqty = $item['quantity'];
            mysqli_query($conn, "INSERT INTO order_items (order_id, product_id, quantity, price) 
                VALUES ($order_id, $pid, $pqty, $pprice)");
        }
        
        mysqli_query($conn, "DELETE FROM cart WHERE user_id = $user_id");
        
        $success = true;
        $success_order_id = $order_id;
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
        <li><a href="cart.php">Cart</a></li>
        <li class="active">Checkout</li>
      </ol>
    </nav>
    <h1 class="tn-page-title">Checkout</h1>
    <p class="tn-page-sub">Complete your order</p>
  </div>
</section>

<?php if ($success): ?>
<section class="tn-section">
  <div class="container">
    <div class="text-center py-5">
      <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
      <h2 class="mt-3">Order Placed Successfully!</h2>
      <p>Order ID: <strong>#<?php echo str_pad($success_order_id, 5, '0', STR_PAD_LEFT); ?></strong></p>
      <p>Total: <strong>$<?php echo number_format($grand_total, 2); ?></strong></p>
      <a href="index.php" class="btn tn-btn-primary btn-lg mt-3">Continue Shopping</a>
    </div>
  </div>
</section>
<?php else: ?>

<section class="tn-section">
  <div class="container">
    <div class="row g-4">
      
      <!-- Checkout Form -->
      <div class="col-lg-7">
        <form method="POST" action="">
          
          <div class="tn-checkout-card" data-tn-animate="fade-up">
            <div class="tn-checkout-card-header">
              <h5><i class="bi bi-person me-2"></i> Billing Details</h5>
            </div>
            <div class="tn-checkout-card-body">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="tn-form-label">First Name *</label>
                  <input type="text" name="first_name" class="form-control tn-form-input" placeholder="John" required>
                </div>
                <div class="col-md-6">
                  <label class="tn-form-label">Last Name *</label>
                  <input type="text" name="last_name" class="form-control tn-form-input" placeholder="Doe" required>
                </div>
                <div class="col-md-6">
                  <label class="tn-form-label">Email Address *</label>
                  <input type="email" name="email" class="form-control tn-form-input" placeholder="john@example.com" required>
                </div>
                <div class="col-md-6">
                  <label class="tn-form-label">Phone Number *</label>
                  <input type="tel" name="phone" class="form-control tn-form-input" placeholder="+1 (555) 000-0000" required>
                </div>
                <div class="col-12">
                  <label class="tn-form-label">Street Address *</label>
                  <input type="text" name="address" class="form-control tn-form-input" placeholder="123 Main Street, Apt 4B" required>
                </div>
                <div class="col-md-4">
                  <label class="tn-form-label">City *</label>
                  <input type="text" name="city" class="form-control tn-form-input" placeholder="New York" required>
                </div>
                <div class="col-md-4">
                  <label class="tn-form-label">State *</label>
                  <input type="text" name="state" class="form-control tn-form-input" placeholder="NY" required>
                </div>
                <div class="col-md-4">
                  <label class="tn-form-label">ZIP Code *</label>
                  <input type="text" name="zip" class="form-control tn-form-input" placeholder="10001" required>
                </div>
              </div>
            </div>
          </div>
          
          <div class="text-end mt-4">
            <a href="cart.php" class="btn tn-btn-ghost me-2"><i class="bi bi-arrow-left me-2"></i> Back to Cart</a>
            <button type="submit" class="btn tn-btn-primary btn-lg">
              <i class="bi bi-lock me-2"></i> Place Order — $<?php echo number_format($grand_total, 2); ?>
            </button>
          </div>
        </form>
      </div>
      
      <!-- Order Summary -->
      <div class="col-lg-5">
        <div class="tn-checkout-summary">
          <div class="tn-checkout-summary-header">
            <h5>Order Summary</h5>
            <span class="tn-checkout-summary-count"><?php echo $total_items; ?> items</span>
          </div>
          
          <div class="tn-checkout-items">
            <?php foreach ($cart_items as $item): ?>
            <div class="tn-checkout-item">
              <div class="tn-checkout-item-img">
                <span class="tn-checkout-item-qty"><?php echo $item['quantity']; ?>x</span>
              </div>
              <div class="tn-checkout-item-info">
                <span class="tn-checkout-item-name"><?php echo htmlspecialchars($item['product_name']); ?></span>
              </div>
              <span class="tn-checkout-item-price">$<?php echo number_format($item['total'], 2); ?></span>
            </div>
            <?php endforeach; ?>
          </div>
          
          <div class="tn-checkout-summary-divider"></div>
          
          <div class="tn-checkout-summary-rows">
            <div class="tn-checkout-summary-row">
              <span>Subtotal</span>
              <strong>$<?php echo number_format($subtotal, 2); ?></strong>
            </div>
            <div class="tn-checkout-summary-row">
              <span>Shipping</span>
              <span><?php echo $shipping == 0 ? 'Free' : '$'.number_format($shipping, 2); ?></span>
            </div>
            <div class="tn-checkout-summary-row">
              <span>Tax (8%)</span>
              <span>$<?php echo number_format($tax, 2); ?></span>
            </div>
          </div>
          
          <div class="tn-checkout-summary-divider"></div>
          
          <div class="tn-checkout-summary-row tn-co-total-row">
            <span>Total</span>
            <strong>$<?php echo number_format($grand_total, 2); ?></strong>
          </div>
          
          <div class="tn-checkout-trust mt-3">
            <div class="tn-checkout-trust-item"><i class="bi bi-shield-check"></i><span>SSL Encrypted</span></div>
            <div class="tn-checkout-trust-item"><i class="bi bi-arrow-repeat"></i><span>30-Day Returns</span></div>
            <div class="tn-checkout-trust-item"><i class="bi bi-truck"></i><span>Insured Shipping</span></div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>
<?php endif; ?>

<?php include "includes/footer.php"; ?>

<button class="tn-back-top" id="tnBackTop"><i class="bi bi-arrow-up"></i></button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>