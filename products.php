<?php
// products.php - TechNova Store Products Page
// Backend integration will be added later.
?>
<?php include 'includes/header.php'; ?>
<body>


  <!-- ========== NAVBAR ========== -->
  <?php include 'includes/navbar.php'; ?>

  <!-- ========== PAGE HEADER ========== -->
  <section class="tn-page-header">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="tn-breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li class="active">All Products</li>
        </ol>
      </nav>
      <div class="d-flex flex-wrap justify-content-between align-items-end tn-page-header-row">
        <div>
          <span class="tn-eyebrow"><span class="tn-dot"></span> Our Collection</span>
          <h1 class="tn-page-title">All Products</h1>
          <p class="tn-page-sub">Showing <strong>1–12</strong> of <strong>84</strong> results</p>
        </div>
        <div class="d-flex align-items-center gap-3">
          <div class="tn-view-toggle" id="tnViewToggle">
            <button class="tn-view-btn active" data-view="grid" aria-label="Grid view">
              <i class="bi bi-grid-3x3-gap-fill"></i>
            </button>
            <button class="tn-view-btn" data-view="list" aria-label="List view">
              <i class="bi bi-list-ul"></i>
            </button>
          </div>
          <div class="tn-sort-wrap">
            <label for="tnSort" class="tn-sort-label">Sort by:</label>
            <select id="tnSort" class="tn-sort-select">
              <option value="featured">Featured</option>
              <option value="newest">Newest</option>
              <option value="price-low">Price: Low to High</option>
              <option value="price-high">Price: High to Low</option>
              <option value="rating">Top Rated</option>
            </select>
          </div>
          <button class="btn tn-btn-ghost d-lg-none" id="tnFilterToggle">
            <i class="bi bi-sliders2 me-2"></i> Filters
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== SHOP SECTION ========== -->
  <section class="tn-section tn-shop">
    <div class="container">
      <div class="row g-4">

        <!-- ====== SIDEBAR ====== -->
        <aside class="col-lg-3" id="tnSidebar">
          <div class="tn-sidebar-overlay" id="tnSidebarOverlay"></div>
          <div class="tn-sidebar">
            <div class="tn-sidebar-header d-flex justify-content-between align-items-center d-lg-none">
              <h5 class="mb-0">Filters</h5>
              <button class="tn-icon-btn" id="tnSidebarClose" aria-label="Close filters">
                <i class="bi bi-x-lg"></i>
              </button>
            </div>

            <!-- Categories -->
            <div class="tn-filter-group">
              <h6 class="tn-filter-title">
                <i class="bi bi-grid me-2"></i>Categories
              </h6>
              <ul class="tn-filter-list">
                <li>
                  <label class="tn-filter-check">
                    <input type="checkbox" name="cat" value="all" checked />
                    <span class="tn-check-mark"></span>
                    All Products
                    <span class="tn-filter-count">84</span>
                  </label>
                </li>
                <li>
                  <label class="tn-filter-check">
                    <input type="checkbox" name="cat" value="smartphones" />
                    <span class="tn-check-mark"></span>
                    Smartphones
                    <span class="tn-filter-count">24</span>
                  </label>
                </li>
                <li>
                  <label class="tn-filter-check">
                    <input type="checkbox" name="cat" value="laptops" />
                    <span class="tn-check-mark"></span>
                    Laptops
                    <span class="tn-filter-count">18</span>
                  </label>
                </li>
                <li>
                  <label class="tn-filter-check">
                    <input type="checkbox" name="cat" value="audio" />
                    <span class="tn-check-mark"></span>
                    Audio
                    <span class="tn-filter-count">32</span>
                  </label>
                </li>
                <li>
                  <label class="tn-filter-check">
                    <input type="checkbox" name="cat" value="wearables" />
                    <span class="tn-check-mark"></span>
                    Wearables
                    <span class="tn-filter-count">15</span>
                  </label>
                </li>
                <li>
                  <label class="tn-filter-check">
                    <input type="checkbox" name="cat" value="cameras" />
                    <span class="tn-check-mark"></span>
                    Cameras
                    <span class="tn-filter-count">9</span>
                  </label>
                </li>
                <li>
                  <label class="tn-filter-check">
                    <input type="checkbox" name="cat" value="smart-home" />
                    <span class="tn-check-mark"></span>
                    Smart Home
                    <span class="tn-filter-count">21</span>
                  </label>
                </li>
              </ul>
            </div>

            <!-- Price Range -->
            <div class="tn-filter-group">
              <h6 class="tn-filter-title">
                <i class="bi bi-currency-dollar me-2"></i>Price Range
              </h6>
              <div class="tn-price-range">
                <input
                  type="range"
                  class="tn-range-slider"
                  id="tnPriceRange"
                  min="0"
                  max="2000"
                  value="2000"
                  step="50"
                />
                <div class="d-flex justify-content-between mt-2">
                  <span class="tn-range-val">$0</span>
                  <span class="tn-range-val" id="tnPriceVal">$2,000</span>
                </div>
              </div>
            </div>

            <!-- Brand -->
            <div class="tn-filter-group">
              <h6 class="tn-filter-title">
                <i class="bi bi-bookmark me-2"></i>Brand
              </h6>
              <ul class="tn-filter-list">
                <li>
                  <label class="tn-filter-check">
                    <input type="checkbox" name="brand" value="nova" />
                    <span class="tn-check-mark"></span>
                    TechNova
                  </label>
                </li>
                <li>
                  <label class="tn-filter-check">
                    <input type="checkbox" name="brand" value="apex" />
                    <span class="tn-check-mark"></span>
                    Apex Pro
                  </label>
                </li>
                <li>
                  <label class="tn-filter-check">
                    <input type="checkbox" name="brand" value="pulse" />
                    <span class="tn-check-mark"></span>
                    Pulse Audio
                  </label>
                </li>
                <li>
                  <label class="tn-filter-check">
                    <input type="checkbox" name="brand" value="vision" />
                    <span class="tn-check-mark"></span>
                    VisionX
                  </label>
                </li>
              </ul>
            </div>

            <!-- Rating -->
            <div class="tn-filter-group">
              <h6 class="tn-filter-title">
                <i class="bi bi-star me-2"></i>Rating
              </h6>
              <ul class="tn-filter-list">
                <li>
                  <label class="tn-filter-check">
                    <input type="radio" name="rating" value="4" />
                    <span class="tn-check-mark"></span>
                    <span class="tn-filter-stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                    </span>
                    &amp; Up
                  </label>
                </li>
                <li>
                  <label class="tn-filter-check">
                    <input type="radio" name="rating" value="3" />
                    <span class="tn-check-mark"></span>
                    <span class="tn-filter-stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    </span>
                    &amp; Up
                  </label>
                </li>
                <li>
                  <label class="tn-filter-check">
                    <input type="radio" name="rating" value="2" />
                    <span class="tn-check-mark"></span>
                    <span class="tn-filter-stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    </span>
                    &amp; Up
                  </label>
                </li>
              </ul>
            </div>

            <button class="btn tn-btn-primary w-100 d-lg-none" id="tnApplyFilters">
              Apply Filters
            </button>
          </div>
        </aside>

        <!-- ====== PRODUCT GRID ====== -->
        <div class="col-lg-9">
          <!-- Active filters -->
          <div class="tn-active-filters" id="tnActiveFilters">
            <span class="tn-active-tag" data-clear="all">
              All Products <i class="bi bi-x"></i>
            </span>
          </div>

          <div class="row g-4" id="tnProductGrid">

            <!-- Product 1 -->
            <div class="col-sm-6 col-xl-4" data-tn-animate="fade-up">
              <article class="tn-product-card">
                <a href="product-details.php?id=1" class="tn-card-link"></a>
                <div class="tn-product-media">
                  <span class="tn-badge tn-badge-new">New</span>
                  <button class="tn-wishlist" aria-label="Add to wishlist">
                    <i class="bi bi-heart"></i>
                  </button>
                  <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=600&q=80" alt="Nova Phone 15 Pro" />
                  <button class="tn-quick-add">
                    <i class="bi bi-bag-plus me-2"></i> Add to Cart
                  </button>
                </div>
                <div class="tn-product-body">
                  <span class="tn-product-cat">Smartphones</span>
                  <h5 class="tn-product-title"><a href="product-details.php?id=1">Nova Phone 15 Pro</a></h5>
                  <div class="tn-product-rating">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                    <span>(342)</span>
                  </div>
                  <div class="tn-product-price">
                    <strong>$1,099</strong>
                    <span class="tn-price-old">$1,299</span>
                  </div>
                </div>
              </article>
            </div>

            <!-- Product 2 -->
            <div class="col-sm-6 col-xl-4" data-tn-animate="fade-up">
              <article class="tn-product-card">
                <a href="product-details.php?id=2" class="tn-card-link"></a>
                <div class="tn-product-media">
                  <span class="tn-badge tn-badge-sale">-20%</span>
                  <button class="tn-wishlist" aria-label="Add to wishlist">
                    <i class="bi bi-heart"></i>
                  </button>
                  <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=600&q=80" alt="Nova Book Air" />
                  <button class="tn-quick-add">
                    <i class="bi bi-bag-plus me-2"></i> Add to Cart
                  </button>
                </div>
                <div class="tn-product-body">
                  <span class="tn-product-cat">Laptops</span>
                  <h5 class="tn-product-title"><a href="product-details.php?id=2">Nova Book Air 14"</a></h5>
                  <div class="tn-product-rating">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    <span>(521)</span>
                  </div>
                  <div class="tn-product-price">
                    <strong>$1,499</strong>
                    <span class="tn-price-old">$1,899</span>
                  </div>
                </div>
              </article>
            </div>

            <!-- Product 3 -->
            <div class="col-sm-6 col-xl-4" data-tn-animate="fade-up">
              <article class="tn-product-card">
                <a href="product-details.php?id=3" class="tn-card-link"></a>
                <div class="tn-product-media">
                  <button class="tn-wishlist" aria-label="Add to wishlist">
                    <i class="bi bi-heart"></i>
                  </button>
                  <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=600&q=80" alt="Nova Pods Pro" />
                  <button class="tn-quick-add">
                    <i class="bi bi-bag-plus me-2"></i> Add to Cart
                  </button>
                </div>
                <div class="tn-product-body">
                  <span class="tn-product-cat">Audio</span>
                  <h5 class="tn-product-title"><a href="product-details.php?id=3">Nova Pods Pro</a></h5>
                  <div class="tn-product-rating">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                    <span>(198)</span>
                  </div>
                  <div class="tn-product-price">
                    <strong>$249</strong>
                  </div>
                </div>
              </article>
            </div>

            <!-- Product 4 -->
            <div class="col-sm-6 col-xl-4" data-tn-animate="fade-up">
              <article class="tn-product-card">
                <a href="product-details.php?id=4" class="tn-card-link"></a>
                <div class="tn-product-media">
                  <span class="tn-badge tn-badge-hot">Hot</span>
                  <button class="tn-wishlist" aria-label="Add to wishlist">
                    <i class="bi bi-heart"></i>
                  </button>
                  <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?auto=format&fit=crop&w=600&q=80" alt="Nova Watch Ultra" />
                  <button class="tn-quick-add">
                    <i class="bi bi-bag-plus me-2"></i> Add to Cart
                  </button>
                </div>
                <div class="tn-product-body">
                  <span class="tn-product-cat">Wearables</span>
                  <h5 class="tn-product-title"><a href="product-details.php?id=4">Nova Watch Ultra</a></h5>
                  <div class="tn-product-rating">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                    <span>(276)</span>
                  </div>
                  <div class="tn-product-price">
                    <strong>$599</strong>
                    <span class="tn-price-old">$699</span>
                  </div>
                </div>
              </article>
            </div>

            <!-- Product 5 -->
            <div class="col-sm-6 col-xl-4" data-tn-animate="fade-up">
              <article class="tn-product-card">
                <a href="product-details.php?id=5" class="tn-card-link"></a>
                <div class="tn-product-media">
                  <button class="tn-wishlist" aria-label="Add to wishlist">
                    <i class="bi bi-heart"></i>
                  </button>
                  <img src="https://images.unsplash.com/photo-1558618666-fcd25c85f82e?auto=format&fit=crop&w=600&q=80" alt="Nova Cam 4K" />
                  <button class="tn-quick-add">
                    <i class="bi bi-bag-plus me-2"></i> Add to Cart
                  </button>
                </div>
                <div class="tn-product-body">
                  <span class="tn-product-cat">Cameras</span>
                  <h5 class="tn-product-title"><a href="product-details.php?id=5">Nova Cam 4K Pro</a></h5>
                  <div class="tn-product-rating">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                    <span>(134)</span>
                  </div>
                  <div class="tn-product-price">
                    <strong>$899</strong>
                  </div>
                </div>
              </article>
            </div>

            <!-- Product 6 -->
            <div class="col-sm-6 col-xl-4" data-tn-animate="fade-up">
              <article class="tn-product-card">
                <a href="product-details.php?id=6" class="tn-card-link"></a>
                <div class="tn-product-media">
                  <span class="tn-badge tn-badge-sale">-15%</span>
                  <button class="tn-wishlist" aria-label="Add to wishlist">
                    <i class="bi bi-heart"></i>
                  </button>
                  <img src="https://images.unsplash.com/photo-1558089687-f282ffcbc126?auto=format&fit=crop&w=600&q=80" alt="Nova Hub" />
                  <button class="tn-quick-add">
                    <i class="bi bi-bag-plus me-2"></i> Add to Cart
                  </button>
                </div>
                <div class="tn-product-body">
                  <span class="tn-product-cat">Smart Home</span>
                  <h5 class="tn-product-title"><a href="product-details.php?id=6">Nova Hub Max</a></h5>
                  <div class="tn-product-rating">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    <span>(412)</span>
                  </div>
                  <div class="tn-product-price">
                    <strong>$179</strong>
                    <span class="tn-price-old">$219</span>
                  </div>
                </div>
              </article>
            </div>

            <!-- Product 7 -->
            <div class="col-sm-6 col-xl-4" data-tn-animate="fade-up">
              <article class="tn-product-card">
                <a href="product-details.php?id=7" class="tn-card-link"></a>
                <div class="tn-product-media">
                  <span class="tn-badge tn-badge-new">New</span>
                  <button class="tn-wishlist" aria-label="Add to wishlist">
                    <i class="bi bi-heart"></i>
                  </button>
                  <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=600&q=80" alt="Nova Headphones Max" />
                  <button class="tn-quick-add">
                    <i class="bi bi-bag-plus me-2"></i> Add to Cart
                  </button>
                </div>
                <div class="tn-product-body">
                  <span class="tn-product-cat">Audio</span>
                  <h5 class="tn-product-title"><a href="product-details.php?id=7">Nova Headphones Max</a></h5>
                  <div class="tn-product-rating">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                    <span>(89)</span>
                  </div>
                  <div class="tn-product-price">
                    <strong>$349</strong>
                  </div>
                </div>
              </article>
            </div>

            <!-- Product 8 -->
            <div class="col-sm-6 col-xl-4" data-tn-animate="fade-up">
              <article class="tn-product-card">
                <a href="product-details.php?id=8" class="tn-card-link"></a>
                <div class="tn-product-media">
                  <button class="tn-wishlist" aria-label="Add to wishlist">
                    <i class="bi bi-heart"></i>
                  </button>
                  <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?auto=format&fit=crop&w=600&q=80" alt="Nova Book Pro" />
                  <button class="tn-quick-add">
                    <i class="bi bi-bag-plus me-2"></i> Add to Cart
                  </button>
                </div>
                <div class="tn-product-body">
                  <span class="tn-product-cat">Laptops</span>
                  <h5 class="tn-product-title"><a href="product-details.php?id=8">Nova Book Pro 16"</a></h5>
                  <div class="tn-product-rating">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    <span>(203)</span>
                  </div>
                  <div class="tn-product-price">
                    <strong>$2,199</strong>
                  </div>
                </div>
              </article>
            </div>

            <!-- Product 9 -->
            <div class="col-sm-6 col-xl-4" data-tn-animate="fade-up">
              <article class="tn-product-card">
                <a href="product-details.php?id=9" class="tn-card-link"></a>
                <div class="tn-product-media">
                  <span class="tn-badge tn-badge-hot">Hot</span>
                  <button class="tn-wishlist" aria-label="Add to wishlist">
                    <i class="bi bi-heart"></i>
                  </button>
                  <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=600&q=80" alt="Nova Watch SE" />
                  <button class="tn-quick-add">
                    <i class="bi bi-bag-plus me-2"></i> Add to Cart
                  </button>
                </div>
                <div class="tn-product-body">
                  <span class="tn-product-cat">Wearables</span>
                  <h5 class="tn-product-title"><a href="product-details.php?id=9">Nova Watch SE</a></h5>
                  <div class="tn-product-rating">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                    <span>(167)</span>
                  </div>
                  <div class="tn-product-price">
                    <strong>$299</strong>
                    <span class="tn-price-old">$349</span>
                  </div>
                </div>
              </article>
            </div>

          </div>

          <!-- Pagination -->
          <nav class="tn-pagination" aria-label="Products pagination">
            <a href="#" class="tn-page-btn disabled" aria-label="Previous">
              <i class="bi bi-chevron-left"></i>
            </a>
            <a href="#" class="tn-page-btn active">1</a>
            <a href="#" class="tn-page-btn">2</a>
            <a href="#" class="tn-page-btn">3</a>
            <span class="tn-page-dots">...</span>
            <a href="#" class="tn-page-btn">8</a>
            <a href="#" class="tn-page-btn" aria-label="Next">
              <i class="bi bi-chevron-right"></i>
            </a>
          </nav>
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
