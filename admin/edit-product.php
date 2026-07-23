<?php
// admin/edit-product.php
include 'includes/auth.php';
include 'includes/db.php'; // database connection

$pageTitle = 'Edit Product';

// Get product ID from URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header('Location: products.php');
    exit;
}

// Fetch existing product
$stmt = mysqli_prepare($conn, "SELECT * FROM products WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$product = mysqli_fetch_assoc($result);

if (!$product) {
    header('Location: products.php');
    exit;
}

// Fetch categories for dropdown
$catQuery = "SELECT id, category_name FROM categories ORDER BY category_name ASC";
$catResult = mysqli_query($conn, $catQuery);

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = trim($_POST['product_name'] ?? '');
    $category_id  = (int)($_POST['category_id'] ?? 0);
    $description  = trim($_POST['description'] ?? '');
    $price        = floatval($_POST['price'] ?? 0);
    $stock        = (int)($_POST['stock'] ?? 0);

    // Validation
    if (empty($product_name)) {
        $errors['product_name'] = 'Product name is required.';
    }
    if ($category_id <= 0) {
        $errors['category_id'] = 'Please select a category.';
    }
    if ($price <= 0) {
        $errors['price'] = 'Price must be greater than zero.';
    }
    if ($stock < 0) {
        $errors['stock'] = 'Stock cannot be negative.';
    }

    // Image handling (optional)
    $image = $product['image']; // keep existing by default
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $fileExt = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        
        if (!in_array($fileExt, $allowed)) {
            $errors['image'] = 'Invalid image format. Allowed: jpg, jpeg, png, gif, webp.';
        } elseif ($_FILES['image']['size'] > 2 * 1024 * 1024) {
            $errors['image'] = 'Image too large (max 2MB).';
        } else {
            $uploadDir = '../uploads/products/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $newName = uniqid('product_') . '.' . $fileExt;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $newName)) {
                // Delete old image if exists
                if (!empty($product['image']) && file_exists('../' . $product['image'])) {
                    unlink('../' . $product['image']);
                }
                $image = 'uploads/products/' . $newName;
            } else {
                $errors['image'] = 'Failed to upload image.';
            }
        }
    }

    // If no errors, update database
    if (empty($errors)) {
        $updateStmt = mysqli_prepare($conn, 
            "UPDATE products SET category_id=?, product_name=?, description=?, price=?, stock=?, image=? WHERE id=?"
        );
        mysqli_stmt_bind_param($updateStmt, "issdisi", $category_id, $product_name, $description, $price, $stock, $image, $id);
        
        if (mysqli_stmt_execute($updateStmt)) {
            $success = true;
            // Refresh product data
            $product['product_name'] = $product_name;
            $product['category_id'] = $category_id;
            $product['description'] = $description;
            $product['price'] = $price;
            $product['stock'] = $stock;
            $product['image'] = $image;
        } else {
            $errors['database'] = 'Failed to update product.';
        }
    }
}
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="tn-admin-wrapper">
  <?php include 'includes/topbar.php'; ?>

  <main class="tn-admin-main">
  <nav class="tn-admin-breadcrumb">
    <ol>
      <li><a href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
      <li><a href="products.php">Products</a></li>
      <li class="active">Edit Product</li>
    </ol>
  </nav>

  <div class="tn-admin-page-header">
    <h1 class="tn-admin-page-title">Edit Product</h1>
    <a href="products.php" class="btn tn-admin-btn-outline"><i class="bi bi-arrow-left me-2"></i> Back</a>
  </div>

  <?php if ($success): ?>
    <div class="alert alert-success"><i class="bi bi-check-circle-fill me-2"></i> Product updated successfully!</div>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="tn-admin-card tn-admin-form-card">
          <div class="tn-admin-form-card-header">
            <h3><i class="bi bi-info-circle"></i> Product Information</h3>
            <p>Basic details about the product.</p>
          </div>

          <div class="tn-admin-form-group">
            <label class="tn-admin-label">Product Name <span class="tn-admin-required">*</span></label>
            <input type="text" class="tn-admin-input" name="product_name"
                   value="<?php echo htmlspecialchars($product['product_name']); ?>" required>
            <?php if (isset($errors['product_name'])): ?>
              <span class="tn-admin-form-error"><?php echo $errors['product_name']; ?></span>
            <?php endif; ?>
          </div>

          <div class="tn-admin-form-group">
            <label class="tn-admin-label">Category <span class="tn-admin-required">*</span></label>
            <select class="tn-admin-select" name="category_id" required>
              <option value="">Select Category</option>
              <?php while ($cat = mysqli_fetch_assoc($catResult)): ?>
                <option value="<?php echo $cat['id']; ?>"
                  <?php if ($product['category_id'] == $cat['id']) echo 'selected'; ?>>
                  <?php echo htmlspecialchars($cat['category_name']); ?>
                </option>
              <?php endwhile; ?>
            </select>
            <?php if (isset($errors['category_id'])): ?>
              <span class="tn-admin-form-error"><?php echo $errors['category_id']; ?></span>
            <?php endif; ?>
          </div>

          <div class="tn-admin-form-group">
            <label class="tn-admin-label">Description</label>
            <textarea class="tn-admin-textarea" name="description" rows="5"><?php echo htmlspecialchars($product['description']); ?></textarea>
          </div>
        </div>

        <div class="tn-admin-card tn-admin-form-card">
          <div class="tn-admin-form-card-header">
            <h3><i class="bi bi-currency-dollar"></i> Pricing & Inventory</h3>
            <p>Set price and stock quantity.</p>
          </div>

          <div class="tn-admin-form-group">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="tn-admin-label">Price ($) <span class="tn-admin-required">*</span></label>
                <input type="number" class="tn-admin-input" name="price" step="0.01" min="0"
                       value="<?php echo htmlspecialchars($product['price']); ?>" required>
                <?php if (isset($errors['price'])): ?>
                  <span class="tn-admin-form-error"><?php echo $errors['price']; ?></span>
                <?php endif; ?>
              </div>
              <div class="col-md-6">
                <label class="tn-admin-label">Stock <span class="tn-admin-required">*</span></label>
                <input type="number" class="tn-admin-input" name="stock" min="0"
                       value="<?php echo htmlspecialchars($product['stock']); ?>" required>
                <?php if (isset($errors['stock'])): ?>
                  <span class="tn-admin-form-error"><?php echo $errors['stock']; ?></span>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

        <div class="tn-admin-card tn-admin-form-card">
          <div class="tn-admin-form-card-header">
            <h3><i class="bi bi-image"></i> Product Image</h3>
            <p>Upload product image.</p>
          </div>

          <div class="tn-admin-form-group">
            <?php if (!empty($product['image'])): ?>
              <img src="../<?php echo $product['image']; ?>" width="100" class="mb-2 rounded">
            <?php endif; ?>
            <input type="file" class="tn-admin-input" name="image" accept="image/*">
            <small class="tn-admin-form-hint">Leave empty to keep current image. Max 2MB.</small>
            <?php if (isset($errors['image'])): ?>
              <span class="tn-admin-form-error"><?php echo $errors['image']; ?></span>
            <?php endif; ?>
          </div>
        </div>

        <div class="tn-admin-form-actions tn-admin-form-actions-bottom">
          <a href="products.php" class="btn tn-admin-btn-outline">Cancel</a>
          <div class="tn-admin-form-actions-right">
            <button type="submit" class="btn tn-admin-btn-primary"><i class="bi bi-check-lg me-2"></i> Update Product</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  </main>
</div>

<?php include 'includes/footer.php'; ?>