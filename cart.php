<?php
include 'includes/db.php';
session_start();

$user_id = $_SESSION['user_id'] ?? 0;

// REMOVE SINGLE ITEM
if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
    $remove_id = (int)$_GET['remove'];
    mysqli_query($conn, "DELETE FROM cart WHERE id = $remove_id AND user_id = $user_id");
    header('Location: cart.php');
    exit;
}

// CLEAR ALL CART
if (isset($_GET['clear']) && $user_id > 0) {
    mysqli_query($conn, "DELETE FROM cart WHERE user_id = $user_id");
    header('Location: cart.php');
    exit;
}

// UPDATE QUANTITY
if (isset($_GET['update']) && isset($_GET['qty'])) {
    $update_id = (int)$_GET['update'];
    $qty = (int)$_GET['qty'];
    if ($qty > 0) {
        mysqli_query($conn, "UPDATE cart SET quantity = $qty WHERE id = $update_id AND user_id = $user_id");
    }
    header('Location: cart.php');
    exit;
}

$cart_items = [];
$subtotal = 0;
$total_items = 0;

if ($user_id > 0) {
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
}

$shipping = $subtotal > 99 ? 0 : 9.99;
$tax = round($subtotal * 0.08, 2);
$grand_total = $subtotal + $shipping + $tax;
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
          <li class="active">Shopping Cart</li>
        </ol>
      </nav>
      <h1 class="tn-page-title">Shopping Cart</h1>
      <p class="tn-page-sub">You have <strong><?php echo $total_items; ?> items</strong> in your cart</p>
    </div>
  </section>

  <section class="tn-section">
    <div class="container">

      <?php if (!empty($cart_items)): ?>
      <div class="row g-4">
        <div class="col-lg-8">
          
          <?php foreach ($cart_items as $item): ?>
          <div class="tn-cart-item d-flex align-items-center border rounded p-3 mb-3 bg-white">
            <div class="tn-cart-item-img me-3">
              <img src="<?php echo $item['image'] ?: 'https://via.placeholder.com/100'; ?>" width="80" alt="<?php echo $item['product_name']; ?>">
            </div>
            <div class="flex-grow-1">
              <h6 class="mb-1"><?php echo $item['product_name']; ?></h6>
              <span class="text-muted">$<?php echo number_format($item['price'], 2); ?> each</span>
              <div class="mt-2">
                <a href="cart.php?update=<?php echo $item['id']; ?>&qty=<?php echo max(1, $item['quantity'] - 1); ?>" class="btn btn-sm btn-outline-secondary">−</a>
                <span class="mx-2 fw-bold"><?php echo $item['quantity']; ?></span>
                <a href="cart.php?update=<?php echo $item['id']; ?>&qty=<?php echo $item['quantity'] + 1; ?>" class="btn btn-sm btn-outline-secondary">+</a>
              </div>
            </div>
            <div class="text-end">
              <strong>$<?php echo number_format($item['total'], 2); ?></strong>
              <br>
              <a href="cart.php?remove=<?php echo $item['id']; ?>" class="text-danger small" onclick="return confirm('Remove this item?')">Remove</a>
            </div>
          </div>
          <?php endforeach; ?>

          <div class="d-flex justify-content-between mt-3">
            <a href="products.php" class="btn tn-btn-ghost">← Continue Shopping</a>
            <a href="cart.php?clear=1" class="btn tn-btn-ghost text-danger" onclick="return confirm('Clear entire cart?')">Clear Cart</a>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card p-4">
            <h5>Order Summary</h5>
            <hr>
            <div class="d-flex justify-content-between mb-2">
              <span>Subtotal (<?php echo $total_items; ?> items)</span>
              <strong>$<?php echo number_format($subtotal, 2); ?></strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span>Shipping</span>
              <span><?php echo $shipping == 0 ? 'Free' : '$'.number_format($shipping, 2); ?></span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span>Tax (8%)</span>
              <span>$<?php echo number_format($tax, 2); ?></span>
            </div>
            <hr>
            <div class="d-flex justify-content-between mb-3">
              <strong>Total</strong>
              <strong class="fs-5">$<?php echo number_format($grand_total, 2); ?></strong>
            </div>
            <a href="checkout.php" class="btn tn-btn-primary w-100">Proceed to Checkout →</a>
          </div>
        </div>
      </div>
      
      <?php else: ?>
      <div class="text-center py-5">
        <i class="bi bi-bag-x" style="font-size: 4rem; color: #ccc;"></i>
        <h3>Your cart is empty</h3>
        <p>Browse our collection and find something you love!</p>
        <a href="products.php" class="btn tn-btn-primary btn-lg">Start Shopping</a>
      </div>
      <?php endif; ?>

    </div>
  </section>

  <?php include "includes/footer.php"; ?>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src = "js/script.js"></script>
</body>
</html>