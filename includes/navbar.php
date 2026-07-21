  <nav class="navbar navbar-expand-lg tn-navbar sticky-top">
    <div class="container">
      <a class="navbar-brand tn-brand" href="index.php">
        <span class="tn-brand-mark"><i class="bi bi-lightning-charge-fill"></i></span>
        Tech<span class="tn-brand-accent">Nova</span>
      </a>

      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#tnNav"
        aria-controls="tnNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="tnNav">
        <ul class="navbar-nav mx-auto tn-nav-links">
          <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="products.php">Shop</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        </ul>

        <div class="d-flex align-items-center gap-2 tn-nav-actions">
          <!-- Search toggle -->
          <button class="tn-icon-btn" type="button" id="tnSearchToggle" aria-label="Search">
            <i class="bi bi-search"></i>
          </button>

          <!-- Account -->
          <!-- Dynamic User Information: swap between login/profile based on session -->
          <a href="login.php" class="tn-icon-btn" aria-label="Account">
            <i class="bi bi-person"></i>
          </a>

          <!-- Wishlist -->
          <a href="#" class="tn-icon-btn" aria-label="Wishlist">
            <i class="bi bi-heart"></i>
          </a>

          <!-- Cart -->
          <a href="cart.php" class="tn-icon-btn tn-cart-btn" aria-label="Cart">
            <i class="bi bi-bag"></i>
            <!-- Dynamic Cart Count -->
            <span class="tn-cart-count">3</span>
          </a>
        </div>
      </div>
    </div>

    <!-- Slide-down search -->
    <div class="tn-search-panel" id="tnSearchPanel">
      <div class="container py-3">
        <form class="d-flex" role="search" action="products.php" method="get">
          <input
            class="form-control tn-search-input"
            type="search"
            name="q"
            placeholder="Search for smartphones, laptops, headphones..."
            aria-label="Search"
          />
          <button class="btn tn-btn-primary ms-2" type="submit">
            <i class="bi bi-search me-1"></i> Search
          </button>
        </form>
      </div>
    </div>
  </nav>