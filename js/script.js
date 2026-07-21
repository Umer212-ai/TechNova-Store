/* =========================================================
   TechNova Store — Global Script
   Vanilla JS interactions
   ========================================================= */

(function () {
  "use strict";

  /* ---------- Footer year ---------- */
  const yearEl = document.getElementById("tnYear");
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  /* ---------- Navbar scroll effect ---------- */
  const navbar = document.querySelector(".tn-navbar");
  const backTop = document.getElementById("tnBackTop");

  const handleScroll = () => {
    const y = window.scrollY;
    if (navbar) navbar.classList.toggle("tn-scrolled", y > 20);
    if (backTop) backTop.classList.toggle("show", y > 400);
  };
  window.addEventListener("scroll", handleScroll, { passive: true });
  handleScroll();

  /* ---------- Back to top ---------- */
  if (backTop) {
    backTop.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  /* ---------- Search toggle ---------- */
  const searchToggle = document.getElementById("tnSearchToggle");
  const searchPanel = document.getElementById("tnSearchPanel");
  if (searchToggle && searchPanel) {
    searchToggle.addEventListener("click", () => {
      searchPanel.classList.toggle("open");
      if (searchPanel.classList.contains("open")) {
        const input = searchPanel.querySelector("input");
        if (input) setTimeout(() => input.focus(), 200);
      }
    });

    document.addEventListener("click", (e) => {
      if (
        !searchPanel.contains(e.target) &&
        !searchToggle.contains(e.target) &&
        searchPanel.classList.contains("open")
      ) {
        searchPanel.classList.remove("open");
      }
    });
  }

  /* ---------- Wishlist toggle ---------- */
  document.querySelectorAll(".tn-wishlist").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      const icon = btn.querySelector("i");
      const active = btn.classList.toggle("is-active");
      if (icon) {
        icon.classList.toggle("bi-heart", !active);
        icon.classList.toggle("bi-heart-fill", active);
      }
      // Backend hook: send wishlist add/remove request here later
    });
  });

  /* ---------- Quick add (demo interaction) ---------- */
  document.querySelectorAll(".tn-quick-add").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      const original = btn.innerHTML;
      btn.innerHTML = '<i class="bi bi-check2 me-2"></i> Added';
      btn.style.background = "var(--tn-accent)";
      btn.style.color = "var(--tn-dark)";
      setTimeout(() => {
        btn.innerHTML = original;
        btn.style.background = "";
        btn.style.color = "";
      }, 1400);
      // Backend hook: POST to add-to-cart endpoint later
    });
  });

  /* ---------- Newsletter form ---------- */
  const newsletter = document.getElementById("tnNewsletterForm");
  if (newsletter) {
    newsletter.addEventListener("submit", (e) => {
      e.preventDefault();
      const btn = newsletter.querySelector("button");
      const original = btn.innerHTML;
      btn.innerHTML = '<i class="bi bi-check2 me-2"></i> Subscribed';
      btn.disabled = true;
      setTimeout(() => {
        btn.innerHTML = original;
        btn.disabled = false;
        newsletter.reset();
      }, 2200);
      // Backend hook: POST email to subscribe endpoint later
    });
  }

  /* ---------- Scroll reveal animations ---------- */
  const animatedEls = document.querySelectorAll("[data-tn-animate]");
  if ("IntersectionObserver" in window && animatedEls.length) {
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry, i) => {
          if (entry.isIntersecting) {
            setTimeout(() => entry.target.classList.add("tn-in"), i * 60);
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -40px 0px" }
    );
    animatedEls.forEach((el) => io.observe(el));
  } else {
    animatedEls.forEach((el) => el.classList.add("tn-in"));
  }

  /* =========================================================
     TechNova Store — Products Page Scripts
     ========================================================= */

  /* ---------- Sidebar toggle (mobile) ---------- */
  const filterToggle = document.getElementById("tnFilterToggle");
  const sidebar = document.getElementById("tnSidebar");
  const sidebarOverlay = document.getElementById("tnSidebarOverlay");
  const sidebarClose = document.getElementById("tnSidebarClose");

  function openSidebar() {
    if (sidebar) sidebar.classList.add("open");
    if (sidebarOverlay) sidebarOverlay.classList.add("open");
    document.body.style.overflow = "hidden";
  }
  function closeSidebar() {
    if (sidebar) sidebar.classList.remove("open");
    if (sidebarOverlay) sidebarOverlay.classList.remove("open");
    document.body.style.overflow = "";
  }

  if (filterToggle) filterToggle.addEventListener("click", openSidebar);
  if (sidebarClose) sidebarClose.addEventListener("click", closeSidebar);
  if (sidebarOverlay) sidebarOverlay.addEventListener("click", closeSidebar);

  const applyFilters = document.getElementById("tnApplyFilters");
  if (applyFilters) applyFilters.addEventListener("click", closeSidebar);

  /* ---------- View toggle ---------- */
  const viewBtns = document.querySelectorAll(".tn-view-btn");
  const productGrid = document.getElementById("tnProductGrid");

  viewBtns.forEach(function (btn) {
    btn.addEventListener("click", function () {
      viewBtns.forEach(function (b) { b.classList.remove("active"); });
      btn.classList.add("active");
      if (!productGrid) return;
      var cols = productGrid.querySelectorAll("[class*='col-']");
      if (btn.dataset.view === "list") {
        cols.forEach(function (col) {
          col.className = "col-12";
          var card = col.querySelector(".tn-product-card");
          if (card) card.classList.add("tn-product-card--list");
        });
      } else {
        cols.forEach(function (col) {
          col.className = "col-sm-6 col-xl-4";
          var card = col.querySelector(".tn-product-card");
          if (card) card.classList.remove("tn-product-card--list");
        });
      }
    });
  });

  /* ---------- Price range slider ---------- */
  const priceRange = document.getElementById("tnPriceRange");
  const priceVal = document.getElementById("tnPriceVal");
  if (priceRange && priceVal) {
    priceRange.addEventListener("input", function () {
      priceVal.textContent = "$" + Number(priceRange.value).toLocaleString();
    });
  }

  /* ---------- Active filter tag removal ---------- */
  document.querySelectorAll(".tn-active-tag").forEach(function (tag) {
    tag.addEventListener("click", function () {
      tag.remove();
    });
  });

  /* =========================================================
     TechNova Store — Product Details Page Scripts
     ========================================================= */

  /* ---------- Image gallery thumbnail switcher ---------- */
  var pdMainImg = document.getElementById("tnPdMainImg");
  var pdThumbs = document.querySelectorAll(".tn-pd-thumb");
  if (pdMainImg && pdThumbs.length) {
    pdThumbs.forEach(function (thumb) {
      thumb.addEventListener("click", function () {
        pdThumbs.forEach(function (t) { t.classList.remove("active"); });
        thumb.classList.add("active");
        var newSrc = thumb.getAttribute("data-img");
        if (newSrc) {
          pdMainImg.style.opacity = "0";
          pdMainImg.style.transform = "scale(1.03)";
          setTimeout(function () {
            pdMainImg.src = newSrc;
            pdMainImg.style.opacity = "1";
            pdMainImg.style.transform = "scale(1)";
          }, 200);
        }
      });
    });
  }

  /* ---------- Color selector ---------- */
  var pdColors = document.getElementById("tnPdColors");
  var pdColorVal = document.getElementById("tnPdColorVal");
  if (pdColors) {
    pdColors.querySelectorAll(".tn-pd-color").forEach(function (btn) {
      btn.addEventListener("click", function () {
        pdColors.querySelectorAll(".tn-pd-color").forEach(function (b) { b.classList.remove("active"); });
        btn.classList.add("active");
        if (pdColorVal) pdColorVal.textContent = btn.getAttribute("data-color");
      });
    });
  }

  /* ---------- Storage selector ---------- */
  var pdStorages = document.getElementById("tnPdStorages");
  var pdStorageVal = document.getElementById("tnPdStorageVal");
  if (pdStorages) {
    pdStorages.querySelectorAll(".tn-pd-storage").forEach(function (btn) {
      btn.addEventListener("click", function () {
        pdStorages.querySelectorAll(".tn-pd-storage").forEach(function (b) { b.classList.remove("active"); });
        btn.classList.add("active");
        if (pdStorageVal) pdStorageVal.textContent = btn.getAttribute("data-storage");
      });
    });
  }

  /* ---------- Quantity selector ---------- */
  var qtyMinus = document.getElementById("tnQtyMinus");
  var qtyPlus = document.getElementById("tnQtyPlus");
  var qtyInput = document.getElementById("tnQtyInput");
  if (qtyMinus && qtyPlus && qtyInput) {
    qtyMinus.addEventListener("click", function () {
      var val = parseInt(qtyInput.value, 10) || 1;
      if (val > 1) qtyInput.value = val - 1;
    });
    qtyPlus.addEventListener("click", function () {
      var val = parseInt(qtyInput.value, 10) || 1;
      if (val < 10) qtyInput.value = val + 1;
    });
  }

  /* ---------- Add to Cart animation ---------- */
  var addToCartBtn = document.getElementById("tnAddToCart");
  if (addToCartBtn) {
    addToCartBtn.addEventListener("click", function () {
      var original = addToCartBtn.innerHTML;
      addToCartBtn.innerHTML = '<i class="bi bi-check2 me-2"></i> Added to Cart';
      addToCartBtn.style.background = "var(--tn-accent)";
      addToCartBtn.style.color = "var(--tn-dark)";
      setTimeout(function () {
        addToCartBtn.innerHTML = original;
        addToCartBtn.style.background = "";
        addToCartBtn.style.color = "";
      }, 1800);
    });
  }

  /* ---------- Wishlist toggle (detail page) ---------- */
  var pdWish = document.getElementById("tnPdWishlist");
  if (pdWish) {
    pdWish.addEventListener("click", function () {
      var icon = pdWish.querySelector("i");
      var active = pdWish.classList.toggle("is-active");
      if (icon) {
        icon.classList.toggle("bi-heart", !active);
        icon.classList.toggle("bi-heart-fill", active);
      }
    });
  }

  /* ---------- Tabs ---------- */
  var tabNav = document.getElementById("tnPdTabNav");
  if (tabNav) {
    tabNav.querySelectorAll("button").forEach(function (btn) {
      btn.addEventListener("click", function () {
        tabNav.querySelectorAll("button").forEach(function (b) { b.classList.remove("active"); });
        btn.classList.add("active");
        var target = btn.getAttribute("data-tab");
        document.querySelectorAll(".tn-pd-tab-panel").forEach(function (panel) {
          panel.classList.remove("active");
        });
        var panel = document.getElementById("tnTab-" + target);
        if (panel) panel.classList.add("active");
      });
    });
  }
})();

/* =========================================================
   TechNova Store — Cart Page Script
   ========================================================= */
(function () {
  "use strict";

  var cartContent = document.getElementById("tnCartContent");
  var cartEmpty = document.getElementById("tnCartEmpty");
  var cartItems = document.getElementById("tnCartItems");
  if (!cartItems) return;

  /* ---------- Quantity +/- Controls ---------- */
  cartItems.addEventListener("click", function (e) {
    var btn = e.target.closest("[data-action]");
    if (!btn) return;
    var item = btn.closest(".tn-cart-item");
    if (!item) return;
    var input = item.querySelector("[data-cart-qty]");
    var action = btn.getAttribute("data-action");

    if (action === "minus") {
      var val = parseInt(input.value, 10) || 1;
      if (val > 1) input.value = val - 1;
    } else if (action === "plus") {
      var val2 = parseInt(input.value, 10) || 1;
      if (val2 < 99) input.value = val2 + 1;
    } else if (action === "update") {
      btn.style.color = "var(--tn-accent)";
      setTimeout(function () { btn.style.color = ""; }, 800);
    } else if (action === "remove") {
      item.classList.add("tn-cart-item-removing");
      setTimeout(function () {
        item.remove();
        updateCartState();
      }, 400);
    }
  });

  /* ---------- Clear Cart ---------- */
  var clearBtn = document.getElementById("tnCartClear");
  if (clearBtn) {
    clearBtn.addEventListener("click", function () {
      var items = cartItems.querySelectorAll(".tn-cart-item");
      items.forEach(function (item, i) {
        setTimeout(function () {
          item.classList.add("tn-cart-item-removing");
          setTimeout(function () { item.remove(); }, 400);
        }, i * 80);
      });
      setTimeout(function () { updateCartState(); }, items.length * 80 + 400);
    });
  }

  /* ---------- Coupon Apply ---------- */
  var couponApply = document.getElementById("tnCouponApply");
  var couponMsg = document.getElementById("tnCouponMsg");
  var discountRow = document.getElementById("tnDiscountRow");
  var discountAmount = document.getElementById("tnDiscountAmount");

  if (couponApply) {
    couponApply.addEventListener("click", function () {
      var input = document.getElementById("tnCouponInput");
      var code = input ? input.value.trim() : "";
      if (!code) {
        couponMsg.textContent = "Please enter a coupon code.";
        couponMsg.className = "tn-cart-coupon-msg tn-coupon-error";
        return;
      }
      // Dynamic Coupon: backend validation will replace this
      couponMsg.textContent = "Coupon applied! 10% discount.";
      couponMsg.className = "tn-cart-coupon-msg tn-coupon-success";
      if (discountRow) {
        discountRow.classList.remove("d-none");
        if (discountAmount) discountAmount.textContent = "-$174.60";
      }
    });
  }

  /* ---------- Show/Hide Empty State ---------- */
  function updateCartState() {
    var remaining = cartItems.querySelectorAll(".tn-cart-item").length;
    if (remaining === 0) {
      if (cartContent) cartContent.classList.add("d-none");
      if (cartEmpty) cartEmpty.classList.remove("d-none");
    }
  }
})();

/* =========================================================
   TechNova Store — Checkout Page Script
   ========================================================= */
(function () {
  "use strict";

  var steps = document.querySelectorAll(".tn-checkout-step");
  var panels = document.querySelectorAll(".tn-checkout-step-panel");
  var lines = document.querySelectorAll(".tn-step-line");
  var currentStep = 1;

  if (!steps.length || !panels.length) return;

  /* ---------- Step Navigation ---------- */
  function goToStep(n) {
    if (n < 1 || n > 3) return;
    currentStep = n;

    panels.forEach(function (p) { p.classList.remove("active"); });
    var panel = document.getElementById("tnStep" + n);
    if (panel) panel.classList.add("active");

    steps.forEach(function (s) {
      var sNum = parseInt(s.getAttribute("data-step"), 10);
      s.classList.remove("active", "completed");
      var icon = s.querySelector("i");
      if (sNum === n) {
        s.classList.add("active");
        if (icon) {
          icon.classList.remove("bi-" + sNum + "-circle");
          icon.classList.add("bi-" + sNum + "-circle-fill");
        }
      } else if (sNum < n) {
        s.classList.add("completed");
        if (icon) {
          icon.classList.remove("bi-" + sNum + "-circle");
          icon.classList.remove("bi-" + sNum + "-circle-fill");
          icon.classList.add("bi-check-circle-fill");
        }
      } else {
        if (icon) {
          icon.classList.remove("bi-check-circle-fill");
          icon.classList.remove("bi-" + sNum + "-circle-fill");
          icon.classList.add("bi-" + sNum + "-circle");
        }
      }
    });

    lines.forEach(function (line, i) {
      if (i < n - 1) {
        line.classList.add("active");
      } else {
        line.classList.remove("active");
      }
    });

    window.scrollTo({ top: 200, behavior: "smooth" });
  }

  /* Next buttons */
  document.querySelectorAll(".tn-checkout-next").forEach(function (btn) {
    btn.addEventListener("click", function () {
      var target = parseInt(btn.getAttribute("data-goto"), 10);
      goToStep(target);
    });
  });

  /* Back buttons */
  document.querySelectorAll(".tn-checkout-prev").forEach(function (btn) {
    btn.addEventListener("click", function () {
      var target = parseInt(btn.getAttribute("data-goto"), 10);
      goToStep(target);
    });
  });

  /* ---------- Same Address Toggle ---------- */
  var sameAddr = document.getElementById("tnCoSameAddress");
  var shipFields = document.getElementById("tnCoShippingFields");
  if (sameAddr && shipFields) {
    sameAddr.addEventListener("change", function () {
      shipFields.style.display = sameAddr.checked ? "none" : "block";
    });
  }

  /* ---------- Shipping Method Selection ---------- */
  var shippingOptions = document.querySelectorAll(".tn-shipping-option");
  var shippingCostEl = document.getElementById("tnCoShippingCost");

  shippingOptions.forEach(function (opt) {
    opt.addEventListener("click", function () {
      shippingOptions.forEach(function (o) { o.classList.remove("active"); });
      opt.classList.add("active");
      var radio = opt.querySelector("input[type='radio']");
      if (radio) radio.checked = true;

      var val = radio ? radio.value : "free";
      var prices = { free: "Free", standard: "$9.99", express: "$19.99", overnight: "$34.99" };
      if (shippingCostEl) {
        shippingCostEl.textContent = prices[val] || "Free";
        if (val === "free") {
          shippingCostEl.classList.add("tn-shipping-free");
        } else {
          shippingCostEl.classList.remove("tn-shipping-free");
        }
      }
    });
  });

  /* ---------- Payment Method Selection ---------- */
  var paymentMethods = document.querySelectorAll(".tn-payment-method");
  var cardDetails = document.getElementById("tnCardDetails");

  paymentMethods.forEach(function (pm) {
    pm.addEventListener("click", function () {
      paymentMethods.forEach(function (p) { p.classList.remove("active"); });
      pm.classList.add("active");
      var radio = pm.querySelector("input[type='radio']");
      if (radio) radio.checked = true;

      var val = radio ? radio.value : "card";
      if (cardDetails) {
        cardDetails.style.display = val === "card" ? "block" : "none";
      }
    });
  });

  /* ---------- Card Number Formatting ---------- */
  var cardNum = document.getElementById("tnCoCardNumber");
  if (cardNum) {
    cardNum.addEventListener("input", function () {
      var v = cardNum.value.replace(/\D/g, "").substring(0, 16);
      var formatted = v.replace(/(\d{4})(?=\d)/g, "$1 ");
      cardNum.value = formatted;
    });
  }

  /* ---------- Card Expiry Formatting ---------- */
  var cardExp = document.getElementById("tnCoCardExpiry");
  if (cardExp) {
    cardExp.addEventListener("input", function () {
      var v = cardExp.value.replace(/\D/g, "").substring(0, 4);
      if (v.length >= 2) {
        v = v.substring(0, 2) + " / " + v.substring(2);
      }
      cardExp.value = v;
    });
  }

  /* ---------- Coupon Apply ---------- */
  var couponApply = document.getElementById("tnCoCouponApply");
  var couponMsg = document.getElementById("tnCoCouponMsg");
  var appliedCoupon = document.getElementById("tnCoAppliedCoupon");
  var discountRow = document.getElementById("tnCoDiscountRow");
  var discountAmount = document.getElementById("tnCoDiscountAmount");
  var grandTotal = document.getElementById("tnCoGrandTotal");

  if (couponApply) {
    couponApply.addEventListener("click", function () {
      var input = document.getElementById("tnCoCouponInput");
      var code = input ? input.value.trim() : "";
      if (!code) {
        couponMsg.textContent = "Please enter a coupon code.";
        couponMsg.className = "tn-checkout-coupon-msg tn-co-coupon-error";
        return;
      }
      couponMsg.textContent = "Coupon applied successfully!";
      couponMsg.className = "tn-checkout-coupon-msg tn-co-coupon-success";
      if (appliedCoupon) appliedCoupon.classList.remove("d-none");
      if (discountRow) discountRow.classList.remove("d-none");
      if (discountAmount) discountAmount.textContent = "-$174.60";
      if (grandTotal) grandTotal.textContent = "$1,711.08";
    });
  }

  /* ---------- Coupon Remove ---------- */
  var couponRemove = document.getElementById("tnCoCouponRemove");
  if (couponRemove) {
    couponRemove.addEventListener("click", function () {
      if (appliedCoupon) appliedCoupon.classList.add("d-none");
      if (discountRow) discountRow.classList.add("d-none");
      if (couponMsg) couponMsg.textContent = "";
      if (grandTotal) grandTotal.textContent = "$1,885.68";
      var input = document.getElementById("tnCoCouponInput");
      if (input) input.value = "";
    });
  }

  /* ---------- Terms Checkbox → Enable Place Order ---------- */
  var termsCheck = document.getElementById("tnCoTerms");
  var placeOrder = document.getElementById("tnCoPlaceOrder");
  if (termsCheck && placeOrder) {
    termsCheck.addEventListener("change", function () {
      placeOrder.disabled = !termsCheck.checked;
    });
  }

  /* ---------- Place Order Button ---------- */
  if (placeOrder) {
    placeOrder.addEventListener("click", function () {
      placeOrder.innerHTML = '<i class="bi bi-arrow-repeat me-2"></i> Processing...';
      placeOrder.disabled = true;
      setTimeout(function () {
        placeOrder.innerHTML = '<i class="bi bi-check-lg me-2"></i> Order Placed!';
        placeOrder.style.background = "var(--tn-accent)";
        setTimeout(function () {
          placeOrder.innerHTML = '<i class="bi bi-lock me-2"></i> Place Order — $1,885.68';
          placeOrder.style.background = "";
          placeOrder.disabled = false;
        }, 2200);
      }, 1800);
    });
  }
})();

/* =========================================================
   TechNova Store — Login Page Script
   ========================================================= */
(function () {
  "use strict";

  var loginForm = document.getElementById("tnLoginForm");
  if (!loginForm) return;

  /* ---------- Show/Hide Password ---------- */
  var toggleBtn = document.getElementById("tnTogglePassword");
  var passInput = document.getElementById("tnLoginPassword");

  if (toggleBtn && passInput) {
    toggleBtn.addEventListener("click", function () {
      var isPassword = passInput.type === "password";
      passInput.type = isPassword ? "text" : "password";
      var icon = toggleBtn.querySelector("i");
      if (icon) {
        icon.classList.toggle("bi-eye", !isPassword);
        icon.classList.toggle("bi-eye-slash", isPassword);
      }
    });
  }

  /* ---------- Login Form Submit ---------- */
  var alertBox = document.getElementById("tnLoginAlert");
  var alertText = document.getElementById("tnLoginAlertText");
  var loginBtn = document.getElementById("tnLoginBtn");

  loginForm.addEventListener("submit", function (e) {
    e.preventDefault();

    var email = document.getElementById("tnLoginEmail");
    var password = document.getElementById("tnLoginPassword");
    var emailVal = email ? email.value.trim() : "";
    var passVal = password ? password.value.trim() : "";

    /* Hide previous alert */
    if (alertBox) alertBox.classList.add("d-none");

    /* Simple validation */
    if (!emailVal || !passVal) {
      showAlert("Please fill in all required fields.", "error");
      return;
    }

    if (!isValidEmail(emailVal)) {
      showAlert("Please enter a valid email address.", "error");
      return;
    }

    /* Show loading state */
    loginBtn.classList.add("tn-login-btn-loading");
    loginBtn.disabled = true;

    /* Simulate login delay — Dynamic User Session: replace with real auth */
    setTimeout(function () {
      loginBtn.classList.remove("tn-login-btn-loading");
      loginBtn.disabled = false;

      /* Dynamic Validation Messages: replace with server response handling */
      showAlert("Login successful! Redirecting...", "success");

      setTimeout(function () {
        /* Dynamic User Session: redirect after login */
        /* window.location.href = "index.php"; */
        if (alertBox) alertBox.classList.add("d-none");
      }, 1500);
    }, 1800);
  });

  function showAlert(msg, type) {
    if (!alertBox || !alertText) return;
    alertText.textContent = msg;
    alertBox.className = "tn-login-alert tn-login-alert-" + type;
  }

  function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  /* ---------- Forgot Password (UI Only) ---------- */
  var forgotLink = document.getElementById("tnForgotPassword");
  if (forgotLink) {
    forgotLink.addEventListener("click", function (e) {
      e.preventDefault();
      var email = document.getElementById("tnLoginEmail");
      var emailVal = email ? email.value.trim() : "";

      if (emailVal && isValidEmail(emailVal)) {
        showAlert("Password reset link sent to " + emailVal, "success");
      } else {
        showAlert("Please enter your email address first.", "error");
        if (email) email.focus();
      }
    });
  }

  /* ---------- Social Login Buttons (UI Only) ---------- */
  document.querySelectorAll(".tn-login-social-btn").forEach(function (btn) {
    btn.addEventListener("click", function () {
      var provider = btn.querySelector("span");
      var name = provider ? provider.textContent : "provider";
      showAlert(name + " sign-in is coming soon!", "error");
    });
  });
})();

/* =========================================================
   TechNova Store — Register Page Script
   ========================================================= */
(function () {
  "use strict";

  var registerForm = document.getElementById("tnRegisterForm");
  if (!registerForm) return;

  /* ---------- Show/Hide Password Toggles ---------- */
  function setupToggle(btnId, inputId) {
    var btn = document.getElementById(btnId);
    var input = document.getElementById(inputId);
    if (!btn || !input) return;
    btn.addEventListener("click", function () {
      var isPass = input.type === "password";
      input.type = isPass ? "text" : "password";
      var icon = btn.querySelector("i");
      if (icon) {
        icon.classList.toggle("bi-eye", !isPass);
        icon.classList.toggle("bi-eye-slash", isPass);
      }
    });
  }

  setupToggle("tnToggleRegPassword", "tnRegPassword");
  setupToggle("tnToggleRegConfirm", "tnRegConfirmPassword");

  /* ---------- Password Strength Indicator ---------- */
  var passwordInput = document.getElementById("tnRegPassword");
  var strengthFill = document.getElementById("tnRegPasswordFill");
  var strengthText = document.getElementById("tnRegPasswordText");

  if (passwordInput && strengthFill && strengthText) {
    passwordInput.addEventListener("input", function () {
      var val = passwordInput.value;
      var score = 0;

      if (val.length >= 6) score++;
      if (val.length >= 10) score++;
      if (/[A-Z]/.test(val) && /[a-z]/.test(val)) score++;
      if (/\d/.test(val)) score++;
      if (/[^A-Za-z0-9]/.test(val)) score++;

      strengthFill.className = "tn-register-hint-fill";
      strengthText.className = "tn-register-hint-text";

      if (val.length === 0) {
        strengthText.textContent = "";
        return;
      } else if (score <= 2) {
        strengthFill.classList.add("weak");
        strengthText.classList.add("weak");
        strengthText.textContent = "Weak";
      } else if (score <= 3) {
        strengthFill.classList.add("medium");
        strengthText.classList.add("medium");
        strengthText.textContent = "Medium";
      } else {
        strengthFill.classList.add("strong");
        strengthText.classList.add("strong");
        strengthText.textContent = "Strong";
      }
    });
  }

  /* ---------- Registration Form Submit ---------- */
  var alertBox = document.getElementById("tnRegisterAlert");
  var alertText = document.getElementById("tnRegisterAlertText");
  var registerBtn = document.getElementById("tnRegisterBtn");

  function showRegAlert(msg, type) {
    if (!alertBox || !alertText) return;
    alertText.textContent = msg;
    alertBox.className = "tn-login-alert tn-login-alert-" + type;
  }

  function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  registerForm.addEventListener("submit", function (e) {
    e.preventDefault();

    var fullName = document.getElementById("tnRegFullName");
    var username = document.getElementById("tnRegUsername");
    var email = document.getElementById("tnRegEmail");
    var phone = document.getElementById("tnRegPhone");
    var password = document.getElementById("tnRegPassword");
    var confirm = document.getElementById("tnRegConfirmPassword");
    var terms = document.getElementById("tnRegTerms");

    var fullNameVal = fullName ? fullName.value.trim() : "";
    var usernameVal = username ? username.value.trim() : "";
    var emailVal = email ? email.value.trim() : "";
    var phoneVal = phone ? phone.value.trim() : "";
    var passVal = password ? password.value : "";
    var confirmVal = confirm ? confirm.value : "";
    var termsChecked = terms ? terms.checked : false;

    /* Hide previous alert */
    if (alertBox) alertBox.classList.add("d-none");

    /* Validation */
    if (!fullNameVal || !usernameVal || !emailVal || !phoneVal || !passVal || !confirmVal) {
      showRegAlert("Please fill in all required fields.", "error");
      return;
    }

    if (!isValidEmail(emailVal)) {
      showRegAlert("Please enter a valid email address.", "error");
      return;
    }

    if (passVal.length < 6) {
      showRegAlert("Password must be at least 6 characters long.", "error");
      return;
    }

    if (passVal !== confirmVal) {
      showRegAlert("Passwords do not match.", "error");
      return;
    }

    if (!termsChecked) {
      showRegAlert("Please agree to the Terms & Conditions.", "error");
      return;
    }

    /* Show loading state */
    registerBtn.classList.add("tn-login-btn-loading");
    registerBtn.disabled = true;

    /* Simulate registration delay — Dynamic User Information: replace with real registration */
    setTimeout(function () {
      registerBtn.classList.remove("tn-login-btn-loading");
      registerBtn.disabled = false;

      /* Dynamic Validation Messages: replace with server response handling */
      showRegAlert("Account created successfully! Redirecting...", "success");

      setTimeout(function () {
        /* Dynamic User Session: redirect after registration */
        /* window.location.href = "login.php"; */
        if (alertBox) alertBox.classList.add("d-none");
      }, 1500);
    }, 2000);
  });

  /* ---------- Social Registration Buttons (UI Only) ---------- */
  document.querySelectorAll(".tn-login-social-btn").forEach(function (btn) {
    btn.addEventListener("click", function () {
      var provider = btn.querySelector("span");
      var name = provider ? provider.textContent : "provider";
      showRegAlert(name + " sign-up is coming soon!", "error");
    });
  });
})();

/* =========================================================
   TechNova Store — Profile Page Script
   ========================================================= */
(function () {
  "use strict";

  /* ---------- Edit Profile Button (UI Only) ---------- */
  var editBtn = document.getElementById("tnEditProfile");
  if (editBtn) {
    editBtn.addEventListener("click", function () {
      editBtn.innerHTML = '<i class="bi bi-check-lg me-2"></i> Edit Mode On';
      editBtn.style.background = "var(--tn-accent)";
      setTimeout(function () {
        editBtn.innerHTML = '<i class="bi bi-pencil-square me-2"></i> Edit Profile';
        editBtn.style.background = "";
      }, 2000);
    });
  }

  /* ---------- Change Password Button (UI Only) ---------- */
  var passBtn = document.getElementById("tnChangePassword");
  if (passBtn) {
    passBtn.addEventListener("click", function () {
      passBtn.innerHTML = '<i class="bi bi-arrow-repeat me-2"></i> Coming Soon';
      setTimeout(function () {
        passBtn.innerHTML = '<i class="bi bi-key me-2"></i> Change Password';
      }, 2000);
    });
  }

  /* ---------- Edit Address Button (UI Only) ---------- */
  var addrBtn = document.getElementById("tnEditAddress");
  if (addrBtn) {
    addrBtn.addEventListener("click", function (e) {
      e.preventDefault();
      addrBtn.innerHTML = '<i class="bi bi-check-lg me-1"></i> Saved';
      addrBtn.style.color = "var(--tn-accent)";
      setTimeout(function () {
        addrBtn.innerHTML = '<i class="bi bi-pencil me-1"></i> Edit';
        addrBtn.style.color = "";
      }, 2000);
    });
  }

  /* ---------- Avatar Upload Placeholder ---------- */
  var avatarEdit = document.querySelector(".tn-profile-avatar-edit");
  if (avatarEdit) {
    avatarEdit.addEventListener("click", function () {
      var avatar = document.querySelector(".tn-profile-avatar");
      if (avatar) {
        avatar.style.transform = "scale(1.08)";
        setTimeout(function () {
          avatar.style.transform = "";
        }, 300);
      }
    });
  }
})();

/* =========================================================
   TechNova Store — My Orders Page Script
   ========================================================= */
(function () {
  "use strict";

  var filterBtns = document.querySelectorAll(".tn-orders-filter-btn");
  var orderCards = document.querySelectorAll(".tn-order-card");
  var searchInput = document.getElementById("tnOrderSearch");
  var noResults = document.getElementById("tnOrdersNoResults");
  var clearSearchBtn = document.getElementById("tnClearSearch");

  /* ---------- Filter by Status ---------- */
  function filterOrders(status) {
    var visibleCount = 0;
    orderCards.forEach(function (card) {
      var cardStatus = card.getAttribute("data-order-status");
      if (status === "all" || cardStatus === status) {
        card.style.display = "";
        visibleCount++;
      } else {
        card.style.display = "none";
      }
    });
    applySearch();
  }

  filterBtns.forEach(function (btn) {
    btn.addEventListener("click", function () {
      filterBtns.forEach(function (b) { b.classList.remove("active"); });
      btn.classList.add("active");
      var filter = btn.getAttribute("data-filter");
      filterOrders(filter);
    });
  });

  /* ---------- Search Orders ---------- */
  function applySearch() {
    var query = searchInput ? searchInput.value.toLowerCase().trim() : "";
    var visibleCount = 0;

    orderCards.forEach(function (card) {
      if (card.style.display === "none") return;
      var text = card.textContent.toLowerCase();
      if (query === "" || text.indexOf(query) !== -1) {
        card.style.display = "";
        visibleCount++;
      } else {
        card.style.display = "none";
      }
    });

    if (noResults) {
      noResults.classList.toggle("d-none", visibleCount > 0);
    }
  }

  if (searchInput) {
    searchInput.addEventListener("input", applySearch);
  }

  if (clearSearchBtn) {
    clearSearchBtn.addEventListener("click", function () {
      if (searchInput) searchInput.value = "";
      applySearch();
    });
  }

  /* ---------- Track Order Button (UI Only) ---------- */
  document.querySelectorAll("[data-action='track']").forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      var original = btn.innerHTML;
      btn.innerHTML = '<i class="bi bi-arrow-repeat me-1"></i> Loading...';
      btn.style.pointerEvents = "none";
      setTimeout(function () {
        btn.innerHTML = '<i class="bi bi-check2 me-1"></i> Tracking Sent';
        btn.style.color = "var(--tn-accent)";
        btn.style.borderColor = "var(--tn-accent)";
        setTimeout(function () {
          btn.innerHTML = original;
          btn.style.pointerEvents = "";
          btn.style.color = "";
          btn.style.borderColor = "";
        }, 2000);
      }, 1200);
    });
  });

  /* ---------- Download Invoice Button (UI Only) ---------- */
  document.querySelectorAll("[data-action='invoice']").forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      var original = btn.innerHTML;
      btn.innerHTML = '<i class="bi bi-arrow-repeat me-1"></i> Generating...';
      btn.style.pointerEvents = "none";
      setTimeout(function () {
        btn.innerHTML = '<i class="bi bi-check2 me-1"></i> Downloaded';
        btn.style.color = "var(--tn-accent)";
        btn.style.borderColor = "var(--tn-accent)";
        setTimeout(function () {
          btn.innerHTML = original;
          btn.style.pointerEvents = "";
          btn.style.color = "";
          btn.style.borderColor = "";
        }, 2000);
      }, 1500);
    });
  });

  /* ---------- Cancel Order Button (UI Only) ---------- */
  document.querySelectorAll("[data-action='cancel']").forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      var original = btn.innerHTML;
      btn.innerHTML = '<i class="bi bi-arrow-repeat me-1"></i> Cancelling...';
      btn.style.pointerEvents = "none";
      setTimeout(function () {
        btn.innerHTML = '<i class="bi bi-check2 me-1"></i> Cancelled';
        btn.style.color = "var(--tn-muted)";
        btn.style.borderColor = "var(--tn-muted)";
        var card = btn.closest(".tn-order-card");
        if (card) {
          var statusBadge = card.querySelector(".tn-order-status");
          if (statusBadge) {
            statusBadge.className = "tn-order-status tn-order-status-cancelled";
            statusBadge.innerHTML = '<i class="bi bi-x-circle-fill me-1"></i> Cancelled';
          }
        }
        setTimeout(function () {
          btn.innerHTML = original;
          btn.style.pointerEvents = "";
          btn.style.color = "";
          btn.style.borderColor = "";
        }, 2000);
      }, 1200);
    });
  });

  /* ---------- Reorder Button (UI Only) ---------- */
  document.querySelectorAll("[data-action='reorder']").forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      var original = btn.innerHTML;
      btn.innerHTML = '<i class="bi bi-arrow-repeat me-1"></i> Adding...';
      btn.style.pointerEvents = "none";
      setTimeout(function () {
        btn.innerHTML = '<i class="bi bi-check2 me-1"></i> Added to Cart';
        btn.style.color = "var(--tn-accent)";
        btn.style.borderColor = "var(--tn-accent)";
        setTimeout(function () {
          btn.innerHTML = original;
          btn.style.pointerEvents = "";
          btn.style.color = "";
          btn.style.borderColor = "";
        }, 2000);
      }, 1000);
    });
  });
})();

/* =========================================================
   TechNova Store — About Page Script
   ========================================================= */
(function () {
  "use strict";

  /* ---------- Stat Counter Animation ---------- */
  var statNums = document.querySelectorAll(".tn-about-stat-num");
  var statsAnimated = false;

  function animateStats() {
    if (statsAnimated) return;
    statsAnimated = true;
    statNums.forEach(function (el) {
      var target = el.getAttribute("data-count");
      if (!target) return;
      var text = el.textContent.trim();
      var suffix = text.replace(/[0-9.,]/g, "").trim();
      var isFloat = target.indexOf(".") !== -1;
      var endVal = parseFloat(target);
      var duration = 1800;
      var startTime = null;

      function step(timestamp) {
        if (!startTime) startTime = timestamp;
        var progress = Math.min((timestamp - startTime) / duration, 1);
        var eased = 1 - Math.pow(1 - progress, 3);
        var current = eased * endVal;
        if (isFloat) {
          el.textContent = current.toFixed(1) + (suffix ? " " + suffix : "");
        } else {
          var formatted = Math.floor(current).toLocaleString();
          el.textContent = formatted + "+" + (suffix && suffix !== "+" ? " " + suffix : "");
        }
        if (progress < 1) {
          requestAnimationFrame(step);
        } else {
          el.textContent = text;
        }
      }
      requestAnimationFrame(step);
    });
  }

  /* ---------- Intersection Observer for Stats ---------- */
  var statsSection = document.querySelector(".tn-about-stats");
  if (statsSection && "IntersectionObserver" in window) {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          animateStats();
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 });
    observer.observe(statsSection);
  }

  /* ---------- Team Card Social Hover ---------- */
  document.querySelectorAll(".tn-about-team-card").forEach(function (card) {
    card.addEventListener("mouseenter", function () {
      var socials = card.querySelectorAll(".tn-about-team-socials a");
      socials.forEach(function (link, i) {
        link.style.transitionDelay = (i * 0.05) + "s";
      });
    });
    card.addEventListener("mouseleave", function () {
      var socials = card.querySelectorAll(".tn-about-team-socials a");
      socials.forEach(function (link) {
        link.style.transitionDelay = "";
      });
    });
  });

  /* ---------- Milestone Hover Glow ---------- */
  document.querySelectorAll(".tn-about-milestone").forEach(function (m) {
    m.addEventListener("mouseenter", function () {
      m.style.borderColor = "var(--tn-primary)";
    });
    m.addEventListener("mouseleave", function () {
      m.style.borderColor = "";
    });
  });
})();

