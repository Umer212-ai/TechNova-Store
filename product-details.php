<?php
include 'includes/db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Fetch product from database
$query = "SELECT p.*, c.category_name 
          FROM products p 
          LEFT JOIN categories c ON p.category_id = c.id 
          WHERE p.id = $id";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);

if (!$product) {
    header('Location: products.php');
    exit;
}

// Related products
$related_query = "SELECT * FROM products WHERE category_id = {$product['category_id']} AND id != $id LIMIT 4";
$related_result = mysqli_query($conn, $related_query);
?>
<?php include 'includes/header.php'; ?>
<body>

  <?php include 'includes/navbar.php'; ?>

  <section class="tn-page-header">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="tn-breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li><a href="products.php">Shop</a></li>
          <li class="active"><?php echo htmlspecialchars($product['product_name']); ?></li>
        </ol>
      </nav>
    </div>
  </section>

  <section class="tn-section tn-pd">
    <div class="container">
      <div class="row g-5">

        <!-- Gallery -->
        <div class="col-lg-6" data-tn-animate="fade-up">
          <div class="tn-pd-gallery">
            <div class="tn-pd-main" id="tnPdMain">
              <img src="<?php echo !empty($product['image']) ? $product['image'] : 'https://via.placeholder.com/600'; ?>" 
                   alt="<?php echo htmlspecialchars($product['product_name']); ?>" id="tnPdMainImg" class="tn-pd-main-img" />
            </div>
          </div>
        </div>

        <!-- Product Info -->
        <div class="col-lg-6" data-tn-animate="fade-up">
          <div class="tn-pd-info" style="background:white; padding:20px; border-radius:10px";>
            <span class="tn-product-cat"><?php echo htmlspecialchars($product['category_name'] ?? 'General'); ?></span>
            <h1 class="tn-pd-title"><?php echo htmlspecialchars($product['product_name']); ?></h1>
            
            <div class="tn-pd-price-wrap mt-3">
              <span class="tn-pd-price">$<?php echo number_format($product['price'], 2); ?></span>
            </div>

            <p class="tn-pd-desc mt-3"><?php echo htmlspecialchars($product['description'] ?? 'No description available.'); ?></p>

            <div class="mt-3">
              <strong>Stock:</strong> <?php echo $product['stock']; ?> available
            </div>

            <!-- Quantity + Add to Cart -->
            <div class="tn-pd-actions mt-4">
              <div class="tn-pd-qty">
                <button class="tn-pd-qty-btn" id="tnQtyMinus">−</button>
                <input type="number" class="tn-pd-qty-input" id="tnQtyInput" value="1" min="1" max="<?php echo $product['stock']; ?>" />
                <button class="tn-pd-qty-btn" id="tnQtyPlus">+</button>
              </div>
              <form method="POST" action="add-to-cart.php" style="display:inline;" id="addToCartForm">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <input type="hidden" name="quantity" value="1" id="hiddenQty">
                <button type="submit" class="btn tn-btn-primary tn-pd-btn-cart">
                  <i class="bi bi-bag-plus me-2"></i> Add to Cart
                </button>
              </form>
            </div>

            <div class="tn-pd-trust mt-4">
              <div class="tn-pd-trust-item"><i class="bi bi-truck"></i><div><strong>Free Shipping</strong><span>Orders over $99</span></div></div>
              <div class="tn-pd-trust-item"><i class="bi bi-shield-check"></i><div><strong>2-Year Warranty</strong><span>Official guarantee</span></div></div>
              <div class="tn-pd-trust-item"><i class="bi bi-arrow-repeat"></i><div><strong>30-Day Returns</strong><span>No questions asked</span></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Related Products -->
  <?php if (mysqli_num_rows($related_result) > 0): ?>
  <section class="tn-section">
    <div class="container">
      <div class="tn-section-head" data-tn-animate="fade-up">
        <h2>Related Products</h2>
        <span class="tn-section-line"></span>
      </div>
      <div class="row g-4">
        <?php while ($related = mysqli_fetch_assoc($related_result)): ?>
          <div class="col-sm-6 col-lg-3">
            <div class="tn-product-card" data-tn-animate="fade-up">
              <a href="product-details.php?id=<?php echo $related['id']; ?>" class="tn-card-link"></a>
              <div class="tn-product-media">
               <!-- Naya (Sahi) -->
<img src="<?php echo !empty($related['image']) ? $related['image'] : 'https://placehold.co/300x200?text=No+Image'; ?>" 
                     alt="<?php echo htmlspecialchars($related['product_name']); ?>" />
              </div>
              <div class="tn-product-body">
                <h5 class="tn-product-title">
                  <a href="product-details.php?id=<?php echo $related['id']; ?>"><?php echo htmlspecialchars($related['product_name']); ?></a>
                </h5>
                <div class="tn-product-price">
                  <strong>$<?php echo number_format($related['price'], 2); ?></strong>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php include 'includes/footer.php'; ?>

  <script>
    var qtyInput = document.getElementById('tnQtyInput');
    var hiddenQty = document.getElementById('hiddenQty');
    
    document.getElementById('tnQtyMinus').addEventListener('click', function() {
      var v = parseInt(qtyInput.value) || 1;
      if (v > 1) { qtyInput.value = v - 1; hiddenQty.value = v - 1; }
    });
    document.getElementById('tnQtyPlus').addEventListener('click', function() {
      var v = parseInt(qtyInput.value) || 1;
      if (v < <?php echo $product['stock']; ?>) { qtyInput.value = v + 1; hiddenQty.value = v + 1; }
    });
    qtyInput.addEventListener('input', function() {
      hiddenQty.value = qtyInput.value;
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src = "js/script.js"></script>
</body>
</html>