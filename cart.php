<?php
// cart.php - TechNova Store Shopping Cart Page
// Backend integration will be added later.
// include 'includes/config.php';
// include 'includes/db.php';
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
      <p class="tn-page-sub">You have <strong>3 items</strong> in your cart</p>
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

              <!-- Cart Item 1 -->
              <div class="tn-cart-item" data-cart-item="1">
                <div class="tn-cart-item-img">
                  <a href="product-details.php?id=1">
                    <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=300&q=80" alt="Nova Phone 15 Pro" />
                  </a>
                </div>
                <div class="tn-cart-item-info">
                  <span class="tn-product-cat">Smartphones</span>
                  <h6 class="tn-cart-item-name">
                    <a href="product-details.php?id=1">Nova Phone 15 Pro</a>
                  </h6>
                  <span class="tn-cart-item-variant">Color: Space Black</span>
                  <span class="tn-cart-item-price-mobile d-lg-none">$1,099</span>
                </div>
                <div class="tn-cart-item-price d-none d-lg-flex">
                  <strong>$1,099</strong>
                </div>
                <div class="tn-cart-item-qty">
                  <div class="tn-pd-qty tn-cart-qty">
                    <button type="button" class="tn-qty-btn" data-action="minus" aria-label="Decrease quantity">
                      <i class="bi bi-dash"></i>
                    </button>
                    <input type="number" class="tn-qty-input" value="1" min="1" max="99" data-cart-qty aria-label="Quantity" />
                    <button type="button" class="tn-qty-btn" data-action="plus" aria-label="Increase quantity">
                      <i class="bi bi-plus"></i>
                    </button>
                  </div>
                  <button class="tn-cart-update-btn" data-action="update" aria-label="Update quantity">
                    <i class="bi bi-arrow-repeat"></i>
                  </button>
                </div>
                <div class="tn-cart-item-total d-none d-lg-flex">
                  <strong>$1,099</strong>
                </div>
                <button class="tn-cart-item-remove" data-action="remove" aria-label="Remove item">
                  <i class="bi bi-x-lg"></i>
                </button>
              </div>

              <!-- Cart Item 2 -->
              <div class="tn-cart-item" data-cart-item="2">
                <div class="tn-cart-item-img">
                  <a href="product-details.php?id=2">
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=300&q=80" alt="Nova Buds Ultra" />
                  </a>
                </div>
                <div class="tn-cart-item-info">
                  <span class="tn-product-cat">Audio</span>
                  <h6 class="tn-cart-item-name">
                    <a href="product-details.php?id=2">Nova Buds Ultra</a>
                  </h6>
                  <span class="tn-cart-item-variant">Color: Silver</span>
                  <span class="tn-cart-item-price-mobile d-lg-none">$249</span>
                </div>
                <div class="tn-cart-item-price d-none d-lg-flex">
                  <strong>$249</strong>
                </div>
                <div class="tn-cart-item-qty">
                  <div class="tn-pd-qty tn-cart-qty">
                    <button type="button" class="tn-qty-btn" data-action="minus" aria-label="Decrease quantity">
                      <i class="bi bi-dash"></i>
                    </button>
                    <input type="number" class="tn-qty-input" value="2" min="1" max="99" data-cart-qty aria-label="Quantity" />
                    <button type="button" class="tn-qty-btn" data-action="plus" aria-label="Increase quantity">
                      <i class="bi bi-plus"></i>
                    </button>
                  </div>
                  <button class="tn-cart-update-btn" data-action="update" aria-label="Update quantity">
                    <i class="bi bi-arrow-repeat"></i>
                  </button>
                </div>
                <div class="tn-cart-item-total d-none d-lg-flex">
                  <strong>$498</strong>
                </div>
                <button class="tn-cart-item-remove" data-action="remove" aria-label="Remove item">
                  <i class="bi bi-x-lg"></i>
                </button>
              </div>

              <!-- Cart Item 3 -->
              <div class="tn-cart-item" data-cart-item="3">
                <div class="tn-cart-item-img">
                  <a href="product-details.php?id=3">
                    <img src="https://images.unsplash.com/photo-1546868871-af0de0ae72be?auto=format&fit=crop&w=300&q=80" alt="Nova Watch Series 5" />
                  </a>
                </div>
                <div class="tn-cart-item-info">
                  <span class="tn-product-cat">Wearables</span>
                  <h6 class="tn-cart-item-name">
                    <a href="product-details.php?id=3">Nova Watch Series 5</a>
                  </h6>
                  <span class="tn-cart-item-variant">Size: 45mm</span>
                  <span class="tn-cart-item-price-mobile d-lg-none">$399</span>
                </div>
                <div class="tn-cart-item-price d-none d-lg-flex">
                  <strong>$399</strong>
                </div>
                <div class="tn-cart-item-qty">
                  <div class="tn-pd-qty tn-cart-qty">
                    <button type="button" class="tn-qty-btn" data-action="minus" aria-label="Decrease quantity">
                      <i class="bi bi-dash"></i>
                    </button>
                    <input type="number" class="tn-qty-input" value="1" min="1" max="99" data-cart-qty aria-label="Quantity" />
                    <button type="button" class="tn-qty-btn" data-action="plus" aria-label="Increase quantity">
                      <i class="bi bi-plus"></i>
                    </button>
                  </div>
                  <button class="tn-cart-update-btn" data-action="update" aria-label="Update quantity">
                    <i class="bi bi-arrow-repeat"></i>
                  </button>
                </div>
                <div class="tn-cart-item-total d-none d-lg-flex">
                  <strong>$399</strong>
                </div>
                <button class="tn-cart-item-remove" data-action="remove" aria-label="Remove item">
                  <i class="bi bi-x-lg"></i>
                </button>
              </div>

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
                  <span>Subtotal (4 items)</span>
                  <strong>$1,746</strong>
                </div>
                <div class="tn-cart-summary-row">
                  <span>Shipping</span>
                  <span class="tn-cart-shipping">Free</span>
                </div>
                <div class="tn-cart-summary-row">
                  <span>Tax (8%)</span>
                  <span>$139.68</span>
                </div>
                <!-- Dynamic Discount Row (shown when coupon applied) -->
                <div class="tn-cart-summary-row tn-cart-discount d-none" id="tnDiscountRow">
                  <span>Discount</span>
                  <span class="tn-cart-discount-amount" id="tnDiscountAmount">-$0</span>
                </div>
              </div>

              <div class="tn-cart-summary-divider"></div>

              <!-- Total -->
              <!-- Dynamic Totals -->
              <div class="tn-cart-summary-row tn-cart-total-row">
                <span>Total</span>
                <strong class="tn-cart-total" id="tnCartTotal">$1,885.68</strong>
              </div>

              <!-- Checkout Button -->
              <button class="btn tn-btn-primary tn-cart-checkout" type="button">
                Proceed to Checkout <i class="bi bi-arrow-right ms-2"></i>
              </button>

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
