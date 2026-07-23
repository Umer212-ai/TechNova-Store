<?php
// admin/add-product.php
include 'includes/auth.php';
include "includes/db.php";

$pageTitle = 'Add Product';

// ========== Backend Logic ==========
$errors = [];
$success = false;

// Fetch categories from database for the dropdown
$catQuery = "SELECT id, category_name FROM categories ORDER BY category_name ASC";
$catResult = mysqli_query($conn, $catQuery);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form fields (mapping to products table columns)
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

    // Image upload
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $fileExt = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExt, $allowed)) {
            $errors['image'] = 'Invalid image format. Allowed: jpg, jpeg, png, gif, webp.';
        } elseif ($_FILES['image']['size'] > 2 * 1024 * 1024) { // 2MB
            $errors['image'] = 'Image size must be less than 2MB.';
        } else {
            $uploadDir = '../uploads/products/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $newName = uniqid('product_') . '.' . $fileExt;
            $destination = $uploadDir . $newName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                $image = 'uploads/products/' . $newName;
            } else {
                $errors['image'] = 'Failed to upload image.';
            }
        }
    } else {
        $errors['image'] = 'Product image is required.';
    }

    // If no errors, insert into database
    if (empty($errors)) {
        $stmt = mysqli_prepare($conn, "INSERT INTO products (category_id, product_name, description, price, stock, image, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
        mysqli_stmt_bind_param($stmt, "issdis", $category_id, $product_name, $description, $price, $stock, $image);
        if (mysqli_stmt_execute($stmt)) {
            $success = true;
            // Reset form fields (optional)
            $_POST = [];
        } else {
            $errors['database'] = 'Failed to add product. Please try again.';
        }
    }
}
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="tn-admin-wrapper">
  <?php include 'includes/topbar.php'; ?>

  <main class="tn-admin-main">
    <!-- ... Breadcrumb & Header (unchanged) ... -->
    <nav class="tn-admin-breadcrumb" aria-label="Breadcrumb">
      <ol>
        <li><a href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
        <li><a href="#">Catalog</a></li>
        <li><a href="products.php">Products</a></li>
        <li class="active">Add Product</li>
      </ol>
    </nav>

    <div class="tn-admin-page-header">
      <div class="tn-admin-page-header-left">
        <h1 class="tn-admin-page-title">Add New Product</h1>
        <p class="tn-admin-page-sub">Create a new product listing for your store.</p>
      </div>
      <div class="tn-admin-page-header-actions">
        <a href="products.php" class="btn tn-admin-btn-outline">
          <i class="bi bi-arrow-left me-2"></i> Back to Products
        </a>
      </div>
    </div>

    <!-- Success/Error Messages -->
    <?php if ($success): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> Product added successfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php elseif (!empty($errors)): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> Please fix the errors below.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <!-- Add Product Form -->
    <form method="POST" enctype="multipart/form-data" id="tnAdminAddProductForm" novalidate>
      <!-- We use the same HTML structure, only adapt field names to match our processing -->
      <div class="row g-4">
        <!-- LEFT COLUMN: MAIN FORM -->
        <div class="col-lg-8">
          <!-- Product Information Card -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-info-circle"></i> Product Information</h3>
              <p>Basic details about the product.</p>
            </div>

            <!-- Product Name -->
            <div class="tn-admin-form-group">
              <label class="tn-admin-label" for="tnAdminProductName">
                Product Name <span class="tn-admin-required">*</span>
              </label>   
              <input type="text" class="tn-admin-input" id="tnAdminProductName" name="product_name" 
                     value="<?php echo htmlspecialchars($_POST['product_name'] ?? ''); ?>" required />
              <?php if (isset($errors['product_name'])): ?>
                <span class="tn-admin-form-error"><?php echo $errors['product_name']; ?></span>
              <?php endif; ?>
            </div>

            <!-- Category (dynamic from DB) -->
            <div class="tn-admin-form-group">
              <label class="tn-admin-label" for="tnAdminProductCategory">
                Category <span class="tn-admin-required">*</span>
              </label>
              <select class="tn-admin-select" id="tnAdminProductCategory" name="category_id" required>
                <option value="">Select Category</option>
                <?php
                // Reset cat result pointer if needed
                mysqli_data_seek($catResult, 0);
                while ($cat = mysqli_fetch_assoc($catResult)): ?>
                  <option value="<?php echo $cat['id']; ?>"
                    <?php if (isset($_POST['category_id']) && $_POST['category_id'] == $cat['id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($cat['category_name']); ?>
                  </option>
                <?php endwhile; ?>
              </select>
              <?php if (isset($errors['category_id'])): ?>
                <span class="tn-admin-form-error"><?php echo $errors['category_id']; ?></span>
              <?php endif; ?>
            </div>

            <!-- Description (Full) -->
            <div class="tn-admin-form-group">
              <label class="tn-admin-label" for="tnAdminProductFullDesc">Description</label>
              <textarea class="tn-admin-textarea" id="tnAdminProductFullDesc" name="description" rows="5"><?php echo htmlspecialchars($_POST['description'] ?? ''); ?></textarea>
            </div>

            <!-- We'll ignore Slug, SKU, Short Description, Tags, Brand for now as they are not in the products table. -->
          </div>

          <!-- Pricing Card -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-currency-dollar"></i> Pricing</h3>
            </div>
            <div class="tn-admin-form-group">
              <label class="tn-admin-label" for="tnAdminRegularPrice">Price ($) <span class="tn-admin-required">*</span></label>
              <input type="number" class="tn-admin-input" id="tnAdminRegularPrice" name="price" 
                     step="0.01" min="0" value="<?php echo htmlspecialchars($_POST['price'] ?? ''); ?>" required />
              <?php if (isset($errors['price'])): ?>
                <span class="tn-admin-form-error"><?php echo $errors['price']; ?></span>
              <?php endif; ?>
            </div>
          </div>

          <!-- Inventory Card -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-box-seam"></i> Inventory</h3>
            </div>
            <div class="tn-admin-form-group">
              <label class="tn-admin-label" for="tnAdminStockQuantity">Stock Quantity <span class="tn-admin-required">*</span></label>
              <input type="number" class="tn-admin-input" id="tnAdminStockQuantity" name="stock" 
                     min="0" value="<?php echo htmlspecialchars($_POST['stock'] ?? ''); ?>" required />
              <?php if (isset($errors['stock'])): ?>
                <span class="tn-admin-form-error"><?php echo $errors['stock']; ?></span>
              <?php endif; ?>
            </div>
          </div>

          <!-- Image Upload (Featured) -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-image"></i> Product Image <span class="tn-admin-required">*</span></h3>
            </div>
            <div class="tn-admin-form-group">
              <input type="file" class="form-control" name="image" accept="image/*" required />
              <?php if (isset($errors['image'])): ?>
                <span class="tn-admin-form-error"><?php echo $errors['image']; ?></span>
              <?php endif; ?>
              <small class="text-muted">Allowed: JPG, PNG, GIF, WEBP (max 2MB)</small>
            </div>
          </div>

          <!-- Submit Buttons -->
          <div class="tn-admin-form-actions">
            <a href="products.php" class="btn tn-admin-btn-outline">Cancel</a>
            <button type="submit" class="btn tn-admin-btn-primary"><i class="bi bi-check-lg me-2"></i> Save Product</button>
          </div>
        </div>

        
      </div>
    </form>
  </main>

  <?php include 'includes/footer.php'; ?>