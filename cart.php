<?php

include 'includes/db.php';
session_start();

// TEMPORARY: Test ke liye user_id = 1 set karo
// $_SESSION['user_id'] = 1;  // ← TEST LINE

$user_id = $_SESSION['user_id'] ?? 0;


$cart_items = [];
$subtotal = 0;
$total_items = 0;

if ($user_id > 0) {
    $query = "SELECT c.*, p.product_name, p.price, p.image 
              FROM cart c 
              JOIN products p ON c.product_id = p.id 
              WHERE c.user_id = $user_id";
    $cart_result = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_assoc($cart_result)) {
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
          <li class="active">Shopping Cart</li>
        </ol>
      </nav>
      <span class="tn-eyebrow"><span class="tn-dot"></span> Your Cart</span>
      <h1 class="tn-page-title">Shopping Cart</h1>
      <!-- Dynamic Cart Count -->
    <p class="tn-page-sub">You have <strong><?php echo $total_items; ?> items</strong> in your cart</p>
    </div>
  </section>

  <!-- ========== CART SECTION ========== -->
  <section class="tn-section">
    <div class="container">

      <!-- ===== CART CONTENT (shown when cart has items) ===== -->
      <div class="tn-cart-content" id="tnCartContent">
        <div class="row g-4">

          <!-- ===== CART ITEMS TABLE ===== -->
          <div class="col-lg-8">
            <div class="tn-cart-items-wrap" id="tnCartItems">

              <!-- Dynamic Cart Items -->
              <!-- Example cart item (repeat for each product): -->

            
              <?php if (!empty($cart_items)): ?>
              <?php foreach ($cart_items as $item): ?>
              <div class="tn-cart-item" data-cart-item="<?php echo $item['id']; ?>">
                <div class="tn-cart-item-img">
                  <a href="product-details.php?id=<?php echo $item['product_id']; ?>">
                    <img src="<?php echo $item['image'] ?: 'https://via.placeholder.com/300'; ?>" alt="<?php echo $item['product_name']; ?>" />
                  </a>
                </div>
                <div class="tn-cart-item-info">
                  <h6 class="tn-cart-item-name">
                    <a href="product-details.php?id=<?php echo $item['product_id']; ?>"><?php echo $item['product_name']; ?></a>
                  </h6>
                  <span class="tn-cart-item-price-mobile d-lg-none">$<?php echo number_format($item['price'], 2); ?></span>
                </div>
                <div class="tn-cart-item-price d-none d-lg-flex">
                  <strong>$<?php echo number_format($item['price'], 2); ?></strong>
                </div>
                <div class="tn-cart-item-qty">
                  <div class="tn-pd-qty tn-cart-qty">
                    <button type="button" class="tn-qty-btn" data-action="minus">−</button>
                    <input type="number" class="tn-qty-input" value="<?php echo $item['quantity']; ?>" min="1" max="99" data-cart-qty />
                    <button type="button" class="tn-qty-btn" data-action="plus">+</button>
                  </div>
                </div>
                <div class="tn-cart-item-total d-none d-lg-flex">
                  <strong>$<?php echo number_format($item['total'], 2); ?></strong>
                </div>
                <button class="tn-cart-item-remove" data-action="remove">
                  <i class="bi bi-x-lg"></i>
                </button>
              </div>
              <?php endforeach; ?>
            <?php else: ?>
              <script>document.getElementById('tnCartContent').classList.add('d-none'); document.getElementById('tnCartEmpty').classList.remove('d-none');</script>
            <?php endif; ?>
         </div>

            <!-- Cart Actions Bottom -->
            <div class="tn-cart-actions-bottom">
              <a href="products.php" class="btn tn-btn-ghost">
                <i class="bi bi-arrow-left me-2"></i> Continue Shopping
              </a>
              <button class="btn tn-btn-ghost tn-cart-clear" id="tnCartClear" aria-label="Clear cart">
                <i class="bi bi-trash3 me-2"></i> Clear Cart
              </button>
            </div>
          </div>

          <!-- ===== ORDER SUMMARY SIDEBAR ===== -->
          <div class="col-lg-4">
            <div class="tn-cart-summary" id="tnCartSummary">
              <h5 class="tn-cart-summary-title">Order Summary</h5>

              <!-- Coupon Code -->
              <!-- Dynamic Coupon -->
              <div class="tn-cart-coupon" id="tnCartCoupon">
                <label class="tn-cart-coupon-label" for="tnCouponInput">Have a coupon?</label>
                <div class="tn-cart-coupon-row">
                  <input type="text" class="form-control tn-cart-coupon-input" id="tnCouponInput" placeholder="Enter coupon code" />
                  <button class="btn tn-btn-primary tn-cart-coupon-btn" id="tnCouponApply" type="button">
                    Apply
                  </button>
                </div>
                <!-- Dynamic Coupon Message -->
                <div class="tn-cart-coupon-msg" id="tnCouponMsg"></div>
              </div>

              <div class="tn-cart-summary-divider"></div>

              <!-- Summary Details -->
              <!-- Dynamic Cart Summary -->
              <div class="tn-cart-summary-rows">
                <div class="tn-cart-summary-row">
                  <span>Subtotal (<?php echo $total_items; ?> items)</span>
                  <strong>$<?php echo number_format($subtotal, 2); ?></strong>
                </div>
                <div class="tn-cart-summary-row">
                  <span>Shipping</span>
                  <span class="tn-cart-shipping"><?php echo $shipping == 0 ? 'Free' : '$'.number_format($shipping, 2); ?></span>
                </div>
                <div class="tn-cart-summary-row">
                  <span>Tax (8%)</span>
                  <span>$<?php echo number_format($tax, 2); ?></span>
                </div>
              </div>

              <div class="tn-cart-summary-divider"></div>

              <div class="tn-cart-summary-row tn-cart-total-row">
                <span>Total</span>
                <strong class="tn-cart-total">$<?php echo number_format($grand_total, 2); ?></strong>
              </div>
             
              <!-- Trust Signals -->
              <div class="tn-cart-trust">
                <div class="tn-cart-trust-item">
                  <i class="bi bi-shield-check"></i>
                  <span>Secure Checkout</span>
                </div>
                <div class="tn-cart-trust-item">
                  <i class="bi bi-truck"></i>
                  <span>Free Shipping 99+</span>
                </div>
                <div class="tn-cart-trust-item">
                  <i class="bi bi-arrow-repeat"></i>
                  <span>30-Day Returns</span>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- ===== EMPTY CART STATE ===== -->
      <div class="tn-cart-empty d-none" id="tnCartEmpty">
        <div class="tn-cart-empty-inner">
          <div class="tn-cart-empty-icon">
            <i class="bi bi-bag-x"></i>
          </div>
          <h3>Your cart is empty</h3>
          <p>Looks like you haven't added any items to your cart yet. Browse our collection and find something you love!</p>
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
