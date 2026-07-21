<?php
// checkout.php - TechNova Store Checkout Page
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
          <li><a href="cart.php">Cart</a></li>
          <li class="active">Checkout</li>
        </ol>
      </nav>
      <span class="tn-eyebrow"><span class="tn-dot"></span> Secure Checkout</span>
      <h1 class="tn-page-title">Checkout</h1>
      <p class="tn-page-sub">Complete your order in a few simple steps</p>
    </div>
  </section>

  <!-- ========== CHECKOUT PROGRESS ========== -->
  <section class="tn-checkout-progress-bar">
    <div class="container">
      <div class="tn-checkout-steps" id="tnCheckoutSteps">
        <div class="tn-checkout-step active" data-step="1">
          <div class="tn-step-icon">
            <i class="bi bi-1-circle-fill"></i>
          </div>
          <span class="tn-step-label">Information</span>
        </div>
        <div class="tn-step-line"></div>
        <div class="tn-checkout-step" data-step="2">
          <div class="tn-step-icon">
            <i class="bi bi-2-circle"></i>
          </div>
          <span class="tn-step-label">Shipping</span>
        </div>
        <div class="tn-step-line"></div>
        <div class="tn-checkout-step" data-step="3">
          <div class="tn-step-icon">
            <i class="bi bi-3-circle"></i>
          </div>
          <span class="tn-step-label">Payment</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== CHECKOUT SECTION ========== -->
  <section class="tn-section tn-checkout-section">
    <div class="container">
      <div class="row g-4">

        <!-- ===== CHECKOUT FORMS (Left Column) ===== -->
        <div class="col-lg-7">

          <!-- ---- Step 1: Contact & Billing ---- -->
          <div class="tn-checkout-step-panel active" id="tnStep1">

            <!-- Contact Information -->
            <div class="tn-checkout-card" data-tn-animate="fade-up">
              <div class="tn-checkout-card-header">
                <h5><i class="bi bi-envelope me-2"></i> Contact Information</h5>
              </div>
              <div class="tn-checkout-card-body">
                <!-- Dynamic User Information -->
                <div class="tn-form-grid tn-form-grid-2">
                  <div class="tn-form-group">
                    <label for="tnCoEmail" class="tn-form-label">Email Address <span class="tn-required">*</span></label>
                    <input type="email" id="tnCoEmail" class="form-control tn-form-input" placeholder="you@example.com" required />
                  </div>
                  <div class="tn-form-group">
                    <label for="tnCoPhone" class="tn-form-label">Phone Number <span class="tn-required">*</span></label>
                    <input type="tel" id="tnCoPhone" class="form-control tn-form-input" placeholder="+1 (555) 000-0000" required />
                  </div>
                </div>
                <div class="tn-form-check tn-co-newsletter-check">
                  <input type="checkbox" id="tnCoNewsletter" class="tn-form-checkbox" checked />
                  <label for="tnCoNewsletter">Send me news and exclusive offers</label>
                </div>
              </div>
            </div>

            <!-- Billing Details -->
            <div class="tn-checkout-card" data-tn-animate="fade-up">
              <div class="tn-checkout-card-header">
                <h5><i class="bi bi-person me-2"></i> Billing Details</h5>
              </div>
              <div class="tn-checkout-card-body">
                <!-- Dynamic Billing Address -->
                <div class="tn-form-grid tn-form-grid-2">
                  <div class="tn-form-group">
                    <label for="tnCoFirstName" class="tn-form-label">First Name <span class="tn-required">*</span></label>
                    <input type="text" id="tnCoFirstName" class="form-control tn-form-input" placeholder="John" required />
                  </div>
                  <div class="tn-form-group">
                    <label for="tnCoLastName" class="tn-form-label">Last Name <span class="tn-required">*</span></label>
                    <input type="text" id="tnCoLastName" class="form-control tn-form-input" placeholder="Doe" required />
                  </div>
                </div>
                <div class="tn-form-group">
                  <label for="tnCoCompany" class="tn-form-label">Company <span class="tn-form-optional">(optional)</span></label>
                  <input type="text" id="tnCoCompany" class="form-control tn-form-input" placeholder="Company name" />
                </div>
                <div class="tn-form-group">
                  <label for="tnCoAddress1" class="tn-form-label">Street Address <span class="tn-required">*</span></label>
                  <input type="text" id="tnCoAddress1" class="form-control tn-form-input" placeholder="House number and street name" required />
                </div>
                <div class="tn-form-group">
                  <label for="tnCoAddress2" class="tn-form-label">Apartment, suite, etc. <span class="tn-form-optional">(optional)</span></label>
                  <input type="text" id="tnCoAddress2" class="form-control tn-form-input" placeholder="Apartment, suite, unit, etc." />
                </div>
                <div class="tn-form-grid tn-form-grid-3">
                  <div class="tn-form-group">
                    <label for="tnCoCity" class="tn-form-label">City <span class="tn-required">*</span></label>
                    <input type="text" id="tnCoCity" class="form-control tn-form-input" placeholder="New York" required />
                  </div>
                  <div class="tn-form-group">
                    <label for="tnCoState" class="tn-form-label">State <span class="tn-required">*</span></label>
                    <select id="tnCoState" class="form-select tn-form-input" required>
                      <option value="">Select state</option>
                      <option>Alabama</option>
                      <option>Alaska</option>
                      <option>Arizona</option>
                      <option>California</option>
                      <option>Colorado</option>
                      <option>Connecticut</option>
                      <option>Florida</option>
                      <option>Georgia</option>
                      <option>Illinois</option>
                      <option>New York</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div>
                  <div class="tn-form-group">
                    <label for="tnCoZip" class="tn-form-label">ZIP Code <span class="tn-required">*</span></label>
                    <input type="text" id="tnCoZip" class="form-control tn-form-input" placeholder="10001" required />
                  </div>
                </div>
                <div class="tn-form-group">
                  <label for="tnCoCountry" class="tn-form-label">Country <span class="tn-required">*</span></label>
                  <select id="tnCoCountry" class="form-select tn-form-input" required>
                    <option value="US" selected>United States</option>
                    <option value="CA">Canada</option>
                    <option value="UK">United Kingdom</option>
                    <option value="AU">Australia</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Shipping Address -->
            <div class="tn-checkout-card" data-tn-animate="fade-up">
              <div class="tn-checkout-card-header">
                <h5><i class="bi bi-truck me-2"></i> Shipping Address</h5>
              </div>
              <div class="tn-checkout-card-body">
                <div class="tn-form-check tn-co-same-address-check">
                  <input type="checkbox" id="tnCoSameAddress" class="tn-form-checkbox" checked />
                  <label for="tnCoSameAddress">Ship to the same address as billing</label>
                </div>

                <div class="tn-co-shipping-fields" id="tnCoShippingFields" style="display: none;">
                  <!-- Dynamic Shipping Address -->
                  <div class="tn-form-grid tn-form-grid-2">
                    <div class="tn-form-group">
                      <label for="tnCoShipFirstName" class="tn-form-label">First Name <span class="tn-required">*</span></label>
                      <input type="text" id="tnCoShipFirstName" class="form-control tn-form-input" placeholder="John" />
                    </div>
                    <div class="tn-form-group">
                      <label for="tnCoShipLastName" class="tn-form-label">Last Name <span class="tn-required">*</span></label>
                      <input type="text" id="tnCoShipLastName" class="form-control tn-form-input" placeholder="Doe" />
                    </div>
                  </div>
                  <div class="tn-form-group">
                    <label for="tnCoShipAddress1" class="tn-form-label">Street Address <span class="tn-required">*</span></label>
                    <input type="text" id="tnCoShipAddress1" class="form-control tn-form-input" placeholder="House number and street name" />
                  </div>
                  <div class="tn-form-group">
                    <label for="tnCoShipAddress2" class="tn-form-label">Apartment, suite, etc. <span class="tn-form-optional">(optional)</span></label>
                    <input type="text" id="tnCoShipAddress2" class="form-control tn-form-input" placeholder="Apartment, suite, unit, etc." />
                  </div>
                  <div class="tn-form-grid tn-form-grid-3">
                    <div class="tn-form-group">
                      <label for="tnCoShipCity" class="tn-form-label">City <span class="tn-required">*</span></label>
                      <input type="text" id="tnCoShipCity" class="form-control tn-form-input" placeholder="New York" />
                    </div>
                    <div class="tn-form-group">
                      <label for="tnCoShipState" class="tn-form-label">State <span class="tn-required">*</span></label>
                      <select id="tnCoShipState" class="form-select tn-form-input">
                        <option value="">Select state</option>
                        <option>Alabama</option>
                        <option>Alaska</option>
                        <option>Arizona</option>
                        <option>California</option>
                        <option>Colorado</option>
                        <option>Connecticut</option>
                        <option>Florida</option>
                        <option>Georgia</option>
                        <option>Illinois</option>
                        <option>New York</option>
                        <option>Texas</option>
                        <option>Washington</option>
                      </select>
                    </div>
                    <div class="tn-form-group">
                      <label for="tnCoShipZip" class="tn-form-label">ZIP Code <span class="tn-required">*</span></label>
                      <input type="text" id="tnCoShipZip" class="form-control tn-form-input" placeholder="10001" />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="tn-checkout-nav">
              <a href="cart.php" class="btn tn-btn-ghost">
                <i class="bi bi-arrow-left me-2"></i> Return to Cart
              </a>
              <button class="btn tn-btn-primary tn-checkout-next" data-goto="2">
                Continue to Shipping <i class="bi bi-arrow-right ms-2"></i>
              </button>
            </div>
          </div>

          <!-- ---- Step 2: Shipping Method ---- -->
          <div class="tn-checkout-step-panel" id="tnStep2">
            <div class="tn-checkout-card" data-tn-animate="fade-up">
              <div class="tn-checkout-card-header">
                <h5><i class="bi bi-truck me-2"></i> Shipping Method</h5>
              </div>
              <div class="tn-checkout-card-body">
                <!-- Dynamic Shipping Methods -->
                <div class="tn-shipping-options" id="tnShippingOptions">
                  <label class="tn-shipping-option active">
                    <input type="radio" name="tnShippingMethod" value="free" checked />
                    <div class="tn-shipping-option-content">
                      <div class="tn-shipping-option-info">
                        <span class="tn-shipping-option-name">Free Shipping</span>
                        <span class="tn-shipping-option-desc">Delivery in 5-7 business days</span>
                      </div>
                      <span class="tn-shipping-option-price tn-shipping-free">Free</span>
                    </div>
                  </label>
                  <label class="tn-shipping-option">
                    <input type="radio" name="tnShippingMethod" value="standard" />
                    <div class="tn-shipping-option-content">
                      <div class="tn-shipping-option-info">
                        <span class="tn-shipping-option-name">Standard Shipping</span>
                        <span class="tn-shipping-option-desc">Delivery in 3-5 business days</span>
                      </div>
                      <span class="tn-shipping-option-price">$9.99</span>
                    </div>
                  </label>
                  <label class="tn-shipping-option">
                    <input type="radio" name="tnShippingMethod" value="express" />
                    <div class="tn-shipping-option-content">
                      <div class="tn-shipping-option-info">
                        <span class="tn-shipping-option-name">Express Shipping</span>
                        <span class="tn-shipping-option-desc">Delivery in 1-2 business days</span>
                      </div>
                      <span class="tn-shipping-option-price">$19.99</span>
                    </div>
                  </label>
                  <label class="tn-shipping-option">
                    <input type="radio" name="tnShippingMethod" value="overnight" />
                    <div class="tn-shipping-option-content">
                      <div class="tn-shipping-option-info">
                        <span class="tn-shipping-option-name">Overnight Shipping</span>
                        <span class="tn-shipping-option-desc">Next business day delivery</span>
                      </div>
                      <span class="tn-shipping-option-price">$34.99</span>
                    </div>
                  </label>
                </div>
              </div>
            </div>

            <div class="tn-checkout-nav">
              <button class="btn tn-btn-ghost tn-checkout-prev" data-goto="1">
                <i class="bi bi-arrow-left me-2"></i> Back
              </button>
              <button class="btn tn-btn-primary tn-checkout-next" data-goto="3">
                Continue to Payment <i class="bi bi-arrow-right ms-2"></i>
              </button>
            </div>
          </div>

          <!-- ---- Step 3: Payment ---- -->
          <div class="tn-checkout-step-panel" id="tnStep3">

            <!-- Payment Method -->
            <div class="tn-checkout-card" data-tn-animate="fade-up">
              <div class="tn-checkout-card-header">
                <h5><i class="bi bi-credit-card me-2"></i> Payment Method</h5>
              </div>
              <div class="tn-checkout-card-body">
                <!-- Dynamic Payment Methods -->
                <div class="tn-payment-methods" id="tnPaymentMethods">
                  <label class="tn-payment-method active">
                    <input type="radio" name="tnPaymentMethod" value="card" checked />
                    <div class="tn-payment-method-content">
                      <div class="tn-payment-method-icon">
                        <i class="bi bi-credit-card-2-front"></i>
                      </div>
                      <div class="tn-payment-method-info">
                        <span class="tn-payment-method-name">Credit / Debit Card</span>
                        <span class="tn-payment-method-desc">Visa, Mastercard, American Express</span>
                      </div>
                      <div class="tn-payment-check">
                        <i class="bi bi-check-circle-fill"></i>
                      </div>
                    </div>
                  </label>
                  <label class="tn-payment-method">
                    <input type="radio" name="tnPaymentMethod" value="paypal" />
                    <div class="tn-payment-method-content">
                      <div class="tn-payment-method-icon">
                        <i class="bi bi-paypal"></i>
                      </div>
                      <div class="tn-payment-method-info">
                        <span class="tn-payment-method-name">PayPal</span>
                        <span class="tn-payment-method-desc">Pay securely with your PayPal account</span>
                      </div>
                      <div class="tn-payment-check">
                        <i class="bi bi-check-circle-fill"></i>
                      </div>
                    </div>
                  </label>
                  <label class="tn-payment-method">
                    <input type="radio" name="tnPaymentMethod" value="apple" />
                    <div class="tn-payment-method-content">
                      <div class="tn-payment-method-icon">
                        <i class="bi bi-apple"></i>
                      </div>
                      <div class="tn-payment-method-info">
                        <span class="tn-payment-method-name">Apple Pay</span>
                        <span class="tn-payment-method-desc">Quick checkout with Apple Pay</span>
                      </div>
                      <div class="tn-payment-check">
                        <i class="bi bi-check-circle-fill"></i>
                      </div>
                    </div>
                  </label>
                  <label class="tn-payment-method">
                    <input type="radio" name="tnPaymentMethod" value="klarna" />
                    <div class="tn-payment-method-content">
                      <div class="tn-payment-method-icon">
                        <i class="bi bi-clock-history"></i>
                      </div>
                      <div class="tn-payment-method-info">
                        <span class="tn-payment-method-name">Klarna - Pay in 4</span>
                        <span class="tn-payment-method-desc">Split into 4 interest-free payments</span>
                      </div>
                      <div class="tn-payment-check">
                        <i class="bi bi-check-circle-fill"></i>
                      </div>
                    </div>
                  </label>
                </div>

                <!-- Card Details (shown when card selected) -->
                <div class="tn-card-details" id="tnCardDetails">
                  <div class="tn-form-group">
                    <label for="tnCoCardNumber" class="tn-form-label">Card Number <span class="tn-required">*</span></label>
                    <div class="tn-card-input-wrap">
                      <input type="text" id="tnCoCardNumber" class="form-control tn-form-input tn-card-number" placeholder="1234 5678 9012 3456" maxlength="19" required />
                      <div class="tn-card-icons">
                        <i class="bi bi-credit-card-2-front"></i>
                      </div>
                    </div>
                  </div>
                  <div class="tn-form-group">
                    <label for="tnCoCardName" class="tn-form-label">Name on Card <span class="tn-required">*</span></label>
                    <input type="text" id="tnCoCardName" class="form-control tn-form-input" placeholder="John Doe" required />
                  </div>
                  <div class="tn-form-grid tn-form-grid-2">
                    <div class="tn-form-group">
                      <label for="tnCoCardExpiry" class="tn-form-label">Expiry Date <span class="tn-required">*</span></label>
                      <input type="text" id="tnCoCardExpiry" class="form-control tn-form-input tn-card-expiry" placeholder="MM / YY" maxlength="7" required />
                    </div>
                    <div class="tn-form-group">
                      <label for="tnCoCardCvv" class="tn-form-label">CVV <span class="tn-required">*</span></label>
                      <div class="tn-card-input-wrap">
                        <input type="text" id="tnCoCardCvv" class="form-control tn-form-input" placeholder="123" maxlength="4" required />
                        <div class="tn-card-input-icon">
                          <i class="bi bi-shield-lock"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Order Notes -->
            <div class="tn-checkout-card" data-tn-animate="fade-up">
              <div class="tn-checkout-card-header">
                <h5><i class="bi bi-chat-left-text me-2"></i> Order Notes <span class="tn-form-optional">(optional)</span></h5>
              </div>
              <div class="tn-checkout-card-body">
                <div class="tn-form-group mb-0">
                  <textarea id="tnCoNotes" class="form-control tn-form-input tn-co-notes" rows="3" placeholder="Notes about your order, e.g. special delivery instructions"></textarea>
                </div>
              </div>
            </div>

            <!-- Terms & Place Order -->
            <div class="tn-checkout-card" data-tn-animate="fade-up">
              <div class="tn-checkout-card-body tn-co-terms-body">
                <div class="tn-form-check tn-co-terms-check">
                  <input type="checkbox" id="tnCoTerms" class="tn-form-checkbox" />
                  <label for="tnCoTerms">I agree to the <a href="#">Terms &amp; Conditions</a> and <a href="#">Privacy Policy</a> <span class="tn-required">*</span></label>
                </div>
                <div class="tn-co-place-order-wrap">
                  <button class="btn tn-btn-primary btn-lg tn-co-place-order" id="tnCoPlaceOrder" disabled>
                    <i class="bi bi-lock me-2"></i> Place Order &mdash; $1,885.68
                  </button>
                  <p class="tn-co-secure-note">
                    <i class="bi bi-shield-check me-1"></i> Your payment information is encrypted and secure
                  </p>
                </div>
              </div>
            </div>

            <div class="tn-checkout-nav">
              <button class="btn tn-btn-ghost tn-checkout-prev" data-goto="2">
                <i class="bi bi-arrow-left me-2"></i> Back
              </button>
            </div>
          </div>

        </div>

        <!-- ===== ORDER SUMMARY (Right Column) ===== -->
        <div class="col-lg-5">
          <div class="tn-checkout-summary" id="tnCheckoutSummary">

            <div class="tn-checkout-summary-header">
              <h5>Order Summary</h5>
              <!-- Dynamic Order Count -->
              <span class="tn-checkout-summary-count">3 items</span>
            </div>

            <!-- Selected Products -->
            <!-- Dynamic Order Items -->
            <div class="tn-checkout-items">
              <div class="tn-checkout-item">
                <div class="tn-checkout-item-img">
                  <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=120&q=80" alt="Nova Phone 15 Pro" />
                  <span class="tn-checkout-item-qty">1</span>
                </div>
                <div class="tn-checkout-item-info">
                  <span class="tn-checkout-item-name">Nova Phone 15 Pro</span>
                  <span class="tn-checkout-item-variant">Space Black, 256GB</span>
                </div>
                <span class="tn-checkout-item-price">$1,099</span>
              </div>
              <div class="tn-checkout-item">
                <div class="tn-checkout-item-img">
                  <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=120&q=80" alt="Nova Buds Ultra" />
                  <span class="tn-checkout-item-qty">2</span>
                </div>
                <div class="tn-checkout-item-info">
                  <span class="tn-checkout-item-name">Nova Buds Ultra</span>
                  <span class="tn-checkout-item-variant">Silver</span>
                </div>
                <span class="tn-checkout-item-price">$498</span>
              </div>
              <div class="tn-checkout-item">
                <div class="tn-checkout-item-img">
                  <img src="https://images.unsplash.com/photo-1546868871-af0de0ae72be?auto=format&fit=crop&w=120&q=80" alt="Nova Watch Series 5" />
                  <span class="tn-checkout-item-qty">1</span>
                </div>
                <div class="tn-checkout-item-info">
                  <span class="tn-checkout-item-name">Nova Watch Series 5</span>
                  <span class="tn-checkout-item-variant">45mm, Midnight</span>
                </div>
                <span class="tn-checkout-item-price">$399</span>
              </div>
            </div>

            <!-- Coupon Summary -->
            <!-- Dynamic Coupon -->
            <div class="tn-checkout-summary-divider"></div>
            <div class="tn-checkout-coupon-row">
              <div class="tn-checkout-coupon-input-wrap">
                <input type="text" class="form-control tn-form-input tn-checkout-coupon-input" placeholder="Coupon code" id="tnCoCouponInput" />
                <button class="btn tn-btn-ghost tn-checkout-coupon-btn" id="tnCoCouponApply" type="button">Apply</button>
              </div>
              <!-- Dynamic Coupon Message -->
              <div class="tn-checkout-coupon-msg" id="tnCoCouponMsg"></div>
            </div>

            <!-- Applied Coupon Tag -->
            <div class="tn-checkout-applied-coupon d-none" id="tnCoAppliedCoupon">
              <i class="bi bi-tag-fill"></i>
              <span>SAVE10 applied</span>
              <button class="tn-checkout-coupon-remove" id="tnCoCouponRemove" aria-label="Remove coupon">
                <i class="bi bi-x"></i>
              </button>
            </div>

            <div class="tn-checkout-summary-divider"></div>

            <!-- Order Summary Rows -->
            <!-- Dynamic Order Summary -->
            <div class="tn-checkout-summary-rows">
              <div class="tn-checkout-summary-row">
                <span>Subtotal</span>
                <strong>$1,746.00</strong>
              </div>
              <div class="tn-checkout-summary-row">
                <span>Shipping</span>
                <span class="tn-shipping-value" id="tnCoShippingCost">Free</span>
              </div>
              <div class="tn-checkout-summary-row">
                <span>Tax (8%)</span>
                <span>$139.68</span>
              </div>
              <!-- Dynamic Discount -->
              <div class="tn-checkout-summary-row tn-co-discount-row d-none" id="tnCoDiscountRow">
                <span>Discount</span>
                <span class="tn-co-discount-amount" id="tnCoDiscountAmount">-$174.60</span>
              </div>
            </div>

            <div class="tn-checkout-summary-divider"></div>

            <!-- Grand Total -->
            <!-- Dynamic Total -->
            <div class="tn-checkout-summary-row tn-co-total-row">
              <span>Total</span>
              <strong class="tn-co-grand-total" id="tnCoGrandTotal">$1,885.68</strong>
            </div>

            <!-- Security Badges -->
            <div class="tn-checkout-trust">
              <div class="tn-checkout-trust-item">
                <i class="bi bi-shield-check"></i>
                <span>SSL Encrypted</span>
              </div>
              <div class="tn-checkout-trust-item">
                <i class="bi bi-arrow-repeat"></i>
                <span>30-Day Returns</span>
              </div>
              <div class="tn-checkout-trust-item">
                <i class="bi bi-truck"></i>
                <span>Insured Shipping</span>
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
