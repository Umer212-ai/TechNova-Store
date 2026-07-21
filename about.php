<?php
// about.php - TechNova Store About Page
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
          <li class="active">About Us</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- ========== ABOUT HERO ========== -->
  <section class="tn-section tn-about-hero">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6" data-tn-animate="fade-up">
          <span class="tn-eyebrow"><span class="tn-dot"></span> About TechNova</span>
          <h1 class="tn-section-title tn-about-hero-title">
            Redefining the Way You <span class="tn-gradient-text">Experience Technology</span>
          </h1>
          <p class="tn-about-hero-sub">
            We started with a simple belief: technology should empower, not overwhelm. Since 2018, TechNova Store has been on a mission to bring premium, carefully curated electronics to people who believe in quality over compromise.
          </p>
          <div class="tn-about-hero-actions">
            <a href="products.php" class="btn tn-btn-primary">
              Explore Products <i class="bi bi-arrow-right ms-2"></i>
            </a>
            <a href="#our-story" class="btn tn-btn-ghost">
              Our Story <i class="bi bi-arrow-down ms-2"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-6" data-tn-animate="fade-up">
          <div class="tn-about-hero-visual">
            <img
              src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=800&q=80"
              alt="TechNova Store team working on products"
              class="tn-about-hero-img"
            />
            <div class="tn-about-hero-badge">
              <span class="tn-about-hero-badge-num">8+</span>
              <span class="tn-about-hero-badge-text">Years of<br>Excellence</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== OUR STORY ========== -->
  <section class="tn-section tn-about-story" id="our-story">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6 order-lg-2" data-tn-animate="fade-up">
          <div class="tn-about-story-visual">
            <img
              src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80"
              alt="Our journey started in a small workshop"
              class="tn-about-story-img"
            />
            <div class="tn-about-story-accent"></div>
          </div>
        </div>
        <div class="col-lg-6 order-lg-1" data-tn-animate="fade-up">
          <span class="tn-eyebrow"><span class="tn-dot"></span> Our Story</span>
          <h2 class="tn-section-title">From a Small Idea to a Trusted Brand</h2>
          <p class="tn-about-text">
            TechNova Store was born out of frustration. Our founders were tired of sifting through endless mediocre products just to find one that actually delivered on its promises. They envisioned a store where every product was handpicked, tested, and guaranteed to exceed expectations.
          </p>
          <p class="tn-about-text">
            What started as a small online shop in a shared apartment has grown into a trusted destination for tech enthusiasts worldwide. We've served over 50,000 customers across 30+ countries, and every day we're reminded why we started this journey.
          </p>
          <div class="tn-about-milestones">
            <div class="tn-about-milestone">
              <span class="tn-about-milestone-year">2018</span>
              <span class="tn-about-milestone-text">Founded with a vision for curated tech</span>
            </div>
            <div class="tn-about-milestone">
              <span class="tn-about-milestone-year">2020</span>
              <span class="tn-about-milestone-text">Expanded to 15+ countries worldwide</span>
            </div>
            <div class="tn-about-milestone">
              <span class="tn-about-milestone-year">2023</span>
              <span class="tn-about-milestone-text">Reached 50,000+ happy customers</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== MISSION & VISION ========== -->
  <section class="tn-section tn-about-mission">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-6" data-tn-animate="fade-up">
          <div class="tn-about-mission-card">
            <div class="tn-about-mission-icon">
              <i class="bi bi-bullseye"></i>
            </div>
            <h3>Our Mission</h3>
            <p>
              To make premium technology accessible to everyone by curating the best products, providing expert guidance, and delivering an unmatched shopping experience that puts the customer first.
            </p>
          </div>
        </div>
        <div class="col-md-6" data-tn-animate="fade-up">
          <div class="tn-about-mission-card tn-about-mission-card-vision">
            <div class="tn-about-mission-icon">
              <i class="bi bi-eye"></i>
            </div>
            <h3>Our Vision</h3>
            <p>
              To become the world's most trusted electronics destination — where innovation meets reliability, and every customer interaction builds lasting confidence in the products they love.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== WHY CHOOSE US ========== -->
  <section class="tn-section tn-about-why">
    <div class="container">
      <div class="tn-section-head text-center" data-tn-animate="fade-up">
        <span class="tn-eyebrow"><span class="tn-dot"></span> Why Choose Us</span>
        <h2 class="tn-section-title">The TechNova Difference</h2>
        <p class="tn-section-sub">
          We go beyond just selling products. Here's what sets us apart from the rest.
        </p>
      </div>

      <div class="row g-4 mt-4">
        <div class="col-md-6 col-lg-3" data-tn-animate="fade-up">
          <div class="tn-about-why-card">
            <div class="tn-about-why-icon">
              <i class="bi bi-patch-check"></i>
            </div>
            <h5>Curated Quality</h5>
            <p>Every product is handpicked and tested by our expert team before it reaches our shelves.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-tn-animate="fade-up">
          <div class="tn-about-why-card">
            <div class="tn-about-why-icon tn-about-why-icon-accent">
              <i class="bi bi-truck"></i>
            </div>
            <h5>Fast Delivery</h5>
            <p>Lightning-fast shipping with real-time tracking. Free delivery on orders over $99.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-tn-animate="fade-up">
          <div class="tn-about-why-card">
            <div class="tn-about-why-icon tn-about-why-icon-purple">
              <i class="bi bi-headset"></i>
            </div>
            <h5>24/7 Support</h5>
            <p>Our dedicated support team is always ready to help you with any questions or issues.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-tn-animate="fade-up">
          <div class="tn-about-why-card">
            <div class="tn-about-why-icon tn-about-why-icon-rose">
              <i class="bi bi-arrow-repeat"></i>
            </div>
            <h5>Easy Returns</h5>
            <p>Not satisfied? Return within 30 days for a full refund — no questions asked.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== CORE VALUES ========== -->
  <section class="tn-section tn-about-values">
    <div class="container">
      <div class="tn-section-head text-center" data-tn-animate="fade-up">
        <span class="tn-eyebrow"><span class="tn-dot"></span> Core Values</span>
        <h2 class="tn-section-title">What We Stand For</h2>
        <p class="tn-section-sub">
          Our values guide every decision we make and every product we choose.
        </p>
      </div>

      <div class="row g-4 mt-4">
        <div class="col-md-4" data-tn-animate="fade-up">
          <div class="tn-about-value-card">
            <div class="tn-about-value-num">01</div>
            <h4>Integrity</h4>
            <p>We believe in honest recommendations, transparent pricing, and doing right by our customers — every single time.</p>
          </div>
        </div>
        <div class="col-md-4" data-tn-animate="fade-up">
          <div class="tn-about-value-card">
            <div class="tn-about-value-num">02</div>
            <h4>Innovation</h4>
            <p>We stay ahead of the curve, constantly exploring new technologies and bringing cutting-edge products to your doorstep.</p>
          </div>
        </div>
        <div class="col-md-4" data-tn-animate="fade-up">
          <div class="tn-about-value-card">
            <div class="tn-about-value-num">03</div>
            <h4>Excellence</h4>
            <p>Good enough is never enough. We obsess over quality in everything — from product selection to packaging and support.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== STATISTICS ========== -->
  <section class="tn-section tn-about-stats">
    <div class="container">
      <div class="tn-about-stats-grid" data-tn-animate="fade-up">
        <!-- Dynamic Statistics -->
        <div class="tn-about-stat">
          <div class="tn-about-stat-icon">
            <i class="bi bi-people"></i>
          </div>
          <span class="tn-about-stat-num" data-count="50000">50,000+</span>
          <span class="tn-about-stat-label">Happy Customers</span>
        </div>
        <div class="tn-about-stat">
          <div class="tn-about-stat-icon tn-about-stat-icon-accent">
            <i class="bi bi-box-seam"></i>
          </div>
          <span class="tn-about-stat-num" data-count="1200">1,200+</span>
          <span class="tn-about-stat-label">Products Delivered</span>
        </div>
        <div class="tn-about-stat">
          <div class="tn-about-stat-icon tn-about-stat-icon-purple">
            <i class="bi bi-globe"></i>
          </div>
          <span class="tn-about-stat-num" data-count="30">30+</span>
          <span class="tn-about-stat-label">Countries Served</span>
        </div>
        <div class="tn-about-stat">
          <div class="tn-about-stat-icon tn-about-stat-icon-rose">
            <i class="bi bi-star-fill"></i>
          </div>
          <span class="tn-about-stat-num" data-count="4.9">4.9/5</span>
          <span class="tn-about-stat-label">Average Rating</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== MEET OUR TEAM ========== -->
  <section class="tn-section tn-about-team">
    <div class="container">
      <div class="tn-section-head text-center" data-tn-animate="fade-up">
        <span class="tn-eyebrow"><span class="tn-dot"></span> Our Team</span>
        <h2 class="tn-section-title">Meet the People Behind TechNova</h2>
        <p class="tn-section-sub">
          A passionate team of tech enthusiasts dedicated to bringing you the best.
        </p>
      </div>

      <div class="row g-4 mt-4">
        <!-- Dynamic Team Members -->
        <div class="col-md-6 col-lg-3" data-tn-animate="fade-up">
          <div class="tn-about-team-card">
            <div class="tn-about-team-img">
              <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=400&q=80" alt="Alex Morgan" />
            </div>
            <h5 class="tn-about-team-name">Alex Morgan</h5>
            <span class="tn-about-team-role">Founder & CEO</span>
            <div class="tn-about-team-socials">
              <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
              <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-tn-animate="fade-up">
          <div class="tn-about-team-card">
            <div class="tn-about-team-img">
              <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=400&q=80" alt="Sarah Chen" />
            </div>
            <h5 class="tn-about-team-name">Sarah Chen</h5>
            <span class="tn-about-team-role">Head of Product</span>
            <div class="tn-about-team-socials">
              <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
              <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-tn-animate="fade-up">
          <div class="tn-about-team-card">
            <div class="tn-about-team-img">
              <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=400&q=80" alt="James Wilson" />
            </div>
            <h5 class="tn-about-team-name">James Wilson</h5>
            <span class="tn-about-team-role">CTO</span>
            <div class="tn-about-team-socials">
              <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
              <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-tn-animate="fade-up">
          <div class="tn-about-team-card">
            <div class="tn-about-team-img">
              <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=400&q=80" alt="Emily Park" />
            </div>
            <h5 class="tn-about-team-name">Emily Park</h5>
            <span class="tn-about-team-role">Customer Experience Lead</span>
            <div class="tn-about-team-socials">
              <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
              <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== OUR SERVICES ========== -->
  <section class="tn-section tn-about-services">
    <div class="container">
      <div class="tn-section-head text-center" data-tn-animate="fade-up">
        <span class="tn-eyebrow"><span class="tn-dot"></span> Our Services</span>
        <h2 class="tn-section-title">Everything You Need</h2>
        <p class="tn-section-sub">
          Beyond products, we offer services that complete your tech experience.
        </p>
      </div>

      <div class="row g-4 mt-4">
        <div class="col-md-4" data-tn-animate="fade-up">
          <div class="tn-about-service-card">
            <div class="tn-about-service-icon">
              <i class="bi bi-wrench-adjustable"></i>
            </div>
            <h5>Expert Setup</h5>
            <p>Free device setup and configuration assistance with every purchase. We make sure your new tech works perfectly from day one.</p>
          </div>
        </div>
        <div class="col-md-4" data-tn-animate="fade-up">
          <div class="tn-about-service-card">
            <div class="tn-about-service-icon tn-about-service-icon-accent">
              <i class="bi bi-shield-check"></i>
            </div>
            <h5>Extended Warranty</h5>
            <p>Optional extended warranty plans up to 3 years. Protect your investment and enjoy complete peace of mind.</p>
          </div>
        </div>
        <div class="col-md-4" data-tn-animate="fade-up">
          <div class="tn-about-service-card">
            <div class="tn-about-service-icon tn-about-service-icon-purple">
              <i class="bi bi-arrow-clockwise"></i>
            </div>
            <h5>Trade-In Program</h5>
            <p>Upgrade to the latest tech by trading in your old devices. Get the best value and reduce electronic waste.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== CUSTOMER SATISFACTION ========== -->
  <section class="tn-section tn-about-satisfaction">
    <div class="container">
      <div class="tn-about-satisfaction-inner" data-tn-animate="fade-up">
        <div class="tn-about-satisfaction-visual">
          <div class="tn-about-satisfaction-stars">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
          </div>
          <span class="tn-about-satisfaction-score">4.9</span>
          <span class="tn-about-satisfaction-count">from 2,800+ reviews</span>
        </div>
        <div class="tn-about-satisfaction-content">
          <h2>Customer Satisfaction Is Our Priority</h2>
          <p>
            Every product we sell, every interaction we have, and every policy we create is designed with one goal in mind: making sure our customers are completely satisfied. That's why 98% of our customers rate us 5 stars.
          </p>
          <div class="tn-about-satisfaction-features">
            <div class="tn-about-satisfaction-feat">
              <i class="bi bi-check-circle-fill"></i>
              <span>Verified buyer reviews</span>
            </div>
            <div class="tn-about-satisfaction-feat">
              <i class="bi bi-check-circle-fill"></i>
              <span>30-day money-back guarantee</span>
            </div>
            <div class="tn-about-satisfaction-feat">
              <i class="bi bi-check-circle-fill"></i>
              <span>Dedicated account managers</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== CTA ========== -->
  <section class="tn-section tn-about-cta">
    <div class="container">
      <div class="tn-about-cta-inner" data-tn-animate="fade-up">
        <span class="tn-eyebrow tn-eyebrow-light"><span class="tn-dot"></span> Join TechNova</span>
        <h2 class="tn-about-cta-title">Ready to Experience the <span class="tn-gradient-text">TechNova Difference</span>?</h2>
        <p class="tn-about-cta-sub">
          Join 50,000+ happy customers who trust us for their premium tech needs. Start your journey with TechNova Store today.
        </p>
        <div class="tn-about-cta-actions">
          <a href="products.php" class="btn tn-btn-primary btn-lg">
            Shop Now <i class="bi bi-arrow-right ms-2"></i>
          </a>
          <a href="login.php" class="btn tn-btn-ghost btn-lg tn-about-cta-btn-ghost">
            Create Account
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
