<?php
include 'includes/db.php';

// Fetch categories for sidebar
$cat_query = "SELECT * FROM categories ORDER BY category_name ASC";
$categories = mysqli_query($conn, $cat_query);

// Category filter
$cat_filter = isset($_GET['category']) ? (int)$_GET['category'] : 0;

// Fetch products
if ($cat_filter > 0) {
    $query = "SELECT p.*, c.category_name 
              FROM products p 
              LEFT JOIN categories c ON p.category_id = c.id 
              WHERE p.category_id = $cat_filter
              ORDER BY p.created_at DESC";
} else {
    $query = "SELECT p.*, c.category_name 
              FROM products p 
              LEFT JOIN categories c ON p.category_id = c.id 
              ORDER BY p.created_at DESC";
}
$products = mysqli_query($conn, $query);
$total_products = mysqli_num_rows($products);
?>
<?php include 'includes/header.php'; ?>
<body>

<?php include 'includes/navbar.php'; ?>

<section class="tn-page-header">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="tn-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">All Products</li>
      </ol>
    </nav>
    <h1 class="tn-page-title">All Products</h1>
    <p class="tn-page-sub">Showing <strong><?php echo $total_products; ?></strong> products</p>
  </div>
</section>

<section class="tn-section tn-shop">
  <div class="container">
    <div class="row g-4">

      <!-- Sidebar Categories -->
      <aside class="col-lg-3">
        <div class="tn-sidebar">
          <h6 class="tn-filter-title"><i class="bi bi-grid me-2"></i>Categories</h6>
          <ul class="list-unstyled">
            <li class="mb-2">
              <a href="products.php" class="btn <?php echo $cat_filter == 0 ? 'btn-primary' : 'btn-outline-primary'; ?> btn-sm w-100 text-start">
                All Products (<?php echo $total_products; ?>)
              </a>
            </li>
            <?php 
            mysqli_data_seek($categories, 0);
            while ($cat = mysqli_fetch_assoc($categories)): 
              $count_query = mysqli_query($conn, "SELECT COUNT(*) as c FROM products WHERE category_id = {$cat['id']}");
              $count = mysqli_fetch_assoc($count_query)['c'];
            ?>
            <li class="mb-2">
              <a href="products.php?category=<?php echo $cat['id']; ?>" 
                 class="btn <?php echo $cat_filter == $cat['id'] ? 'btn-primary' : 'btn-outline-primary'; ?> btn-sm w-100 text-start">
                <?php echo htmlspecialchars($cat['category_name']); ?> (<?php echo $count; ?>)
              </a>
            </li>
            <?php endwhile; ?>
          </ul>
        </div>
      </aside>

      <!-- Product Grid -->
      <div class="col-lg-9">
        <div class="row g-4">

          <?php if ($total_products > 0): ?>
            <?php while ($product = mysqli_fetch_assoc($products)): ?>
            <div class="col-sm-6 col-xl-4">
              <article class="tn-product-card">
                <a href="product-details.php?id=<?php echo $product['id']; ?>" class="tn-card-link"></a>
                <div class="tn-product-media">
                  <img src="<?php echo !empty($product['image']) ? $product['image'] : 'https://placehold.co/600x400?text=No+Image'; ?>" 
                       alt="<?php echo htmlspecialchars($product['product_name']); ?>" />
                  <form method="POST" action="add-to-cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="tn-quick-add"><i class="bi bi-bag-plus me-2"></i> Add to Cart</button>
                  </form>
                </div>
                <div class="tn-product-body">
                  <span class="tn-product-cat"><?php echo htmlspecialchars($product['category_name'] ?? 'General'); ?></span>
                  <h5 class="tn-product-title">
                    <a href="product-details.php?id=<?php echo $product['id']; ?>"><?php echo htmlspecialchars($product['product_name']); ?></a>
                  </h5>
                  <div class="tn-product-price">
                    <strong>$<?php echo number_format($product['price'], 2); ?></strong>
                  </div>
                </div>
              </article>
            </div>
            <?php endwhile; ?>
          <?php else: ?>
            <div class="col-12 text-center py-5">
              <h3>No products found</h3>
              <a href="products.php" class="btn tn-btn-primary">View All Products</a>
            </div>
          <?php endif; ?>

        </div>
      </div>

    </div>
  </div>
</section>

<?php include "includes/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
