<?php
// index.php - TechNova Store Homepage
// Backend integration will be added later.
// include 'includes/config.php';
// include 'includes/db.php';
?>
<?php include 'includes/header.php'; ?>
<body>
  <!-- ========== TOP ANNOUNCEMENT BAR ========== -->
  <div class="tn-topbar">
    <div class="container d-flex justify-content-between align-items-center">
      <span><i class="bi bi-truck me-2"></i>Freeeeeeeeeeeeeee shipping on orders over $99</span>
      <span class="d-none d-md-inline">
        <i class="bi bi-headset me-2"></i>24/7 Support: +1 (800) 123-4567
      </span>
    </div>
  </div>

  <!-- ========== NAVBAR ========== -->
<?php include 'includes/navbar.php'; ?>

  <!-- ========== HERO ========== -->
  <header class="tn-hero">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6 tn-hero-content" data-tn-animate="fade-up">
          <span class="tn-eyebrow">
            <span class="tn-dot"></span> New Arrivals · 2026 Collection
          </span>
          <h1 class="tn-hero-title">
            The Future of <span class="tn-gradient-text">Technology</span>,
            Delivered.
          </h1>
          <p class="tn-hero-sub">
            Discover premium electronics engineered for performance. From
            flagship smartphones to studio-grade audio — curated for people
            who demand more.
          </p>
          <div class="tn-hero-actions">
            <a href="products.php" class="btn tn-btn-primary btn-lg">
              Shop Now <i class="bi bi-arrow-right ms-2"></i>
            </a>
            <a href="#categories" class="btn tn-btn-ghost btn-lg">
              Browse Categories
            </a>
          </div>

          <div class="tn-hero-stats">
            <div>
              <h3>50K+</h3>
              <p>Happy Customers</p>
            </div>
            <div>
              <h3>1200+</h3>
              <p>Premium Products</p>
            </div>
            <div>
              <h3>4.9★</h3>
              <p>Verified Rating</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6 tn-hero-visual" data-tn-animate="fade-up">
          <div class="tn-hero-card tn-float">
            <div class="tn-hero-glow"></div>
            <img
              src="https://images.unsplash.com/photo-1592286927505-1def25115558?auto=format&fit=crop&w=900&q=80"
              alt="Featured premium headphones"
              class="img-fluid tn-hero-img"
            />
            <div class="tn-hero-tag tn-tag-top">
              <i class="bi bi-stars"></i> Editor's Pick
            </div>
            <div class="tn-hero-tag tn-tag-bottom">
              <span class="tn-tag-label">Nova Pods Pro</span>
              <span class="tn-tag-price">$249</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- ========== TRUST BAR ========== -->
  <section class="tn-trust">
    <div class="container">
      <div class="row g-4 text-center">
        <div class="col-6 col-md-3">
          <i class="bi bi-truck"></i>
          <h6>Free Shipping</h6>
          <p>On orders over $99</p>
        </div>
        <div class="col-6 col-md-3">
          <i class="bi bi-shield-check"></i>
          <h6>2-Year Warranty</h6>
          <p>On all products</p>
        </div>
        <div class="col-6 col-md-3">
          <i class="bi bi-arrow-repeat"></i>
          <h6>30-Day Returns</h6>
          <p>No questions asked</p>
        </div>
        <div class="col-6 col-md-3">
          <i class="bi bi-lock"></i>
          <h6>Secure Checkout</h6>
          <p>256-bit encryption</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== CATEGORIES ========== -->
  <section class="tn-section" id="categories">
    <div class="container">
      <div class="tn-section-head">
        <span class="tn-eyebrow"><span class="tn-dot"></span> Explore</span>
        <h2 class="tn-section-title">Shop by Category</h2>
        <p class="tn-section-sub">
          Curated collections across every corner of consumer technology.
        </p>
      </div>

      <div class="row g-4">
        <!-- Dynamic Categories -->
        <div class="col-6 col-md-4 col-lg-2" data-tn-animate="fade-up">
          <a href="products.php?cat=smartphones" class="tn-cat-card">
            <div class="tn-cat-icon"><i class="bi bi-phone"></i></div>
            <h6>Smartphones</h6>
            <span>240+ items</span>
          </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2" data-tn-animate="fade-up">
          <a href="products.php?cat=laptops" class="tn-cat-card">
            <div class="tn-cat-icon"><i class="bi bi-laptop"></i></div>
            <h6>Laptops</h6>
            <span>180+ items</span>
          </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2" data-tn-animate="fade-up">
          <a href="products.php?cat=audio" class="tn-cat-card">
            <div class="tn-cat-icon"><i class="bi bi-headphones"></i></div>
            <h6>Audio</h6>
            <span>320+ items</span>
          </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2" data-tn-animate="fade-up">
          <a href="products.php?cat=wearables" class="tn-cat-card">
            <div class="tn-cat-icon"><i class="bi bi-smartwatch"></i></div>
            <h6>Wearables</h6>
            <span>150+ items</span>
          </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2" data-tn-animate="fade-up">
          <a href="products.php?cat=cameras" class="tn-cat-card">
            <div class="tn-cat-icon"><i class="bi bi-camera"></i></div>
            <h6>Cameras</h6>
            <span>90+ items</span>
          </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2" data-tn-animate="fade-up">
          <a href="products.php?cat=smart-home" class="tn-cat-card">
            <div class="tn-cat-icon"><i class="bi bi-house-gear"></i></div>
            <h6>Smart Home</h6>
            <span>210+ items</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== FEATURED PRODUCTS ========== -->
  <section class="tn-section tn-section-alt">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-end tn-section-head-row">
        <div>
          <span class="tn-eyebrow"><span class="tn-dot"></span> Best Sellers</span>
          <h2 class="tn-section-title mb-0">Featured Products</h2>
        </div>
        <a href="products.php" class="tn-link-arrow">
          View all <i class="bi bi-arrow-right"></i>
        </a>
      </div>

      <div class="row g-4 mt-1">
        <!-- Dynamic Products -->
        <div class="col-sm-6 col-lg-3" data-tn-animate="fade-up">
          <article class="tn-product-card">
            <div class="tn-product-media">
              <span class="tn-badge tn-badge-new">New</span>
              <button class="tn-wishlist" aria-label="Add to wishlist">
                <i class="bi bi-heart"></i>
              </button>
              <img
                src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=600&q=80"
                alt="Nova Phone 15 Pro"
              />
              <button class="tn-quick-add">
                <i class="bi bi-bag-plus me-2"></i> Add to Cart
              </button>
            </div>
            <div class="tn-product-body">
              <span class="tn-product-cat">Smartphones</span>
              <h5 class="tn-product-title">Nova Phone 15 Pro</h5>
              <div class="tn-product-rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
                <span>(342)</span>
              </div>
              <div class="tn-product-price">
                <strong>$1,099</strong>
                <span class="tn-price-old">$1,299</span>
              </div>
            </div>
          </article>
        </div>

        <div class="col-sm-6 col-lg-3" data-tn-animate="fade-up">
          <article class="tn-product-card">
            <div class="tn-product-media">
              <span class="tn-badge tn-badge-sale">-20%</span>
              <button class="tn-wishlist" aria-label="Add to wishlist">
                <i class="bi bi-heart"></i>
              </button>
              <img
                src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=600&q=80"
                alt="Nova Book Air"
              />
              <button class="tn-quick-add">
                <i class="bi bi-bag-plus me-2"></i> Add to Cart
              </button>
            </div>
            <div class="tn-product-body">
              <span class="tn-product-cat">Laptops</span>
              <h5 class="tn-product-title">Nova Book Air 14"</h5>
              <div class="tn-product-rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <span>(521)</span>
              </div>
              <div class="tn-product-price">
                <strong>$1,499</strong>
                <span class="tn-price-old">$1,899</span>
              </div>
            </div>
          </article>
        </div>

        <div class="col-sm-6 col-lg-3" data-tn-animate="fade-up">
          <article class="tn-product-card">
            <span class="tn-badge tn-badge-hot d-none"></span>
            <div class="tn-product-media">
              <button class="tn-wishlist" aria-label="Add to wishlist">
                <i class="bi bi-heart"></i>
              </button>
              <img
                src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=600&q=80"
                alt="Nova Pods Pro"
              />
              <button class="tn-quick-add">
                <i class="bi bi-bag-plus me-2"></i> Add to Cart
              </button>
            </div>
            <div class="tn-product-body">
              <span class="tn-product-cat">Audio</span>
              <h5 class="tn-product-title">Nova Pods Pro</h5>
              <div class="tn-product-rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star"></i>
                <span>(198)</span>
              </div>
              <div class="tn-product-price">
                <strong>$249</strong>
              </div>
            </div>
          </article>
        </div>

        <div class="col-sm-6 col-lg-3" data-tn-animate="fade-up">
          <article class="tn-product-card">
            <div class="tn-product-media">
              <span class="tn-badge tn-badge-hot">Hot</span>
              <button class="tn-wishlist" aria-label="Add to wishlist">
                <i class="bi bi-heart"></i>
              </button>
              <img
                src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?auto=format&fit=crop&w=600&q=80"
                alt="Nova Watch Ultra"
              />
              <button class="tn-quick-add">
                <i class="bi bi-bag-plus me-2"></i> Add to Cart
              </button>
            </div>
            <div class="tn-product-body">
              <span class="tn-product-cat">Wearables</span>
              <h5 class="tn-product-title">Nova Watch Ultra</h5>
              <div class="tn-product-rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
                <span>(276)</span>
              </div>
              <div class="tn-product-price">
                <strong>$599</strong>
                <span class="tn-price-old">$699</span>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== PROMO BANNER ========== -->
  <section class="tn-section">
    <div class="container">
      <div class="tn-promo" data-tn-animate="fade-up">
        <div class="tn-promo-content">
          <span class="tn-eyebrow tn-eyebrow-light">
            <span class="tn-dot"></span> Limited Time
          </span>
          <h2>
            Mega Tech Sale — <span class="tn-gradient-text">Up to 40% Off</span>
          </h2>
          <p>
            Save big on flagship devices this week only. Premium technology,
            unbeatable prices.
          </p>
          <a href="products.php?sale=1" class="btn tn-btn-primary btn-lg">
            Shop the Sale <i class="bi bi-arrow-right ms-2"></i>
          </a>
        </div>
        <div class="tn-promo-visual">
          <img
            src="https://images.unsplash.com/photo-1526738549149-8e07eca6c147?auto=format&fit=crop&w=800&q=80"
            alt="Sale devices"
          />
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
            <input
              type="email"
              class="form-control"
              placeholder="Enter your email address"
              required
            />
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
  <!-- Dynamic Footer -->
 <?php include "includes/footer.php"?>

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
