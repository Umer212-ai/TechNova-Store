<?php
// admin/edit-category.php
include 'includes/auth.php';
include 'includes/db.php';

$pageTitle = 'Edit Category';

// Get ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header('Location: categories.php');
    exit;
          }

$categoryId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Fetch category
$stmt = mysqli_prepare($conn, "SELECT * FROM categories WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$category = mysqli_fetch_assoc($result);

    
if (!$category) {
    header('Location: categories.php');
    exit;
          }

$error = '';
$success = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = trim($_POST['category_name'] ?? '');
    $description   = trim($_POST['description'] ?? '');
    $status        = isset($_POST['status']) ? 'Active' : 'Inactive';
    $featured      = isset($_POST['featured']) ? 1 : 0;
    $display_order = (int)($_POST['display_order'] ?? 0);

    // Validation
    if (empty($category_name)) {
        $error = 'Category name is required.';
    } else {
        // Image handling
        $imagePath = $category['image'] ?? '';
        
        if (isset($_FILES['category_image']) && $_FILES['category_image']['error'] === UPLOAD_ERR_OK) {
            $allowed  = ['image/jpeg', 'image/png', 'image/webp'];
            $fileType = $_FILES['category_image']['type'];
            $fileSize = $_FILES['category_image']['size'];

            if (in_array($fileType, $allowed) && $fileSize <= 2 * 1024 * 1024) {
                $ext       = pathinfo($_FILES['category_image']['name'], PATHINFO_EXTENSION);
                $filename  = 'cat_' . time() . '.' . $ext;
                $uploadDir = __DIR__ . '/uploads/categories/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Delete old image
                if (!empty($category['image']) && file_exists(__DIR__ . '/' . $category['image'])) {
                    unlink(__DIR__ . '/' . $category['image']);
                }

                if (move_uploaded_file($_FILES['category_image']['tmp_name'], $uploadDir . $filename)) {
                    $imagePath = 'uploads/categories/' . $filename;
                }
            }
        }

        // Update database
        $updateStmt = mysqli_prepare($conn, 
            "UPDATE categories SET category_name = ?, description = ?, image = ?, status = ?, featured = ?, display_order = ? WHERE id = ?");
        mysqli_stmt_bind_param($updateStmt, "ssssiii", $category_name, $description, $imagePath, $status, $featured, $display_order, $id);
        
        if (mysqli_stmt_execute($updateStmt)) {
            header('Location: categories.php?msg=updated');
            exit;
        } else {
            $error = 'Update failed.';
        }
        mysqli_stmt_close($stmt);
    }
  }
?>
                <?php include 'includes/header.php'; ?>
  <?php include 'includes/sidebar.php'; ?>

<div class="tn-admin-wrapper">  <?php include 'includes/topbar.php'; ?>

  <main class="tn-admin-main">
    <nav class="tn-admin-breadcrumb">
      <ol>
        <li><a href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
        <li><a href="categories.php">Categories</a></li>
        <li class="active">Edit Category</li>
      </ol>
    </nav>

    <div class="tn-admin-page-header">
      <div class="tn-admin-page-header-left">
        <h1 class="tn-admin-page-title">Edit Category</h1>
        <p class="tn-admin-page-sub">Update category details, image, and settings.</p>
      </div>
      <div class="tn-admin-page-header-actions">
        <a href="categories.php" class="btn tn-admin-btn-outline">
          <i class="bi bi-arrow-left me-2"></i> Back
        </a>
      </div>
    </div>

    <?php if ($error): ?>
      <div class="alert alert-danger"><i class="bi bi-exclamation-circle me-2"></i> <?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
      <div class="row g-4">
        <div class="col-lg-8">
          <!-- Category Details Card -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-info-circle"></i> Category Details</h3>
            </div>

            <div class="tn-admin-form-group">
              <label class="tn-admin-label">Category Name <span class="tn-admin-required">*</span></label>
              <input type="text" class="tn-admin-input" name="category_name" 
                     value="<?php echo htmlspecialchars($category['category_name']); ?>" required>
            </div>

            <div class="tn-admin-form-group">
              <label class="tn-admin-label">Slug</label>
              <input type="text" class="tn-admin-input" name="slug" 
                     value="<?php echo htmlspecialchars($category['slug'] ?? ''); ?>">
            </div>

            <div class="tn-admin-form-group">
              <label class="tn-admin-label">Description</label>
              <textarea class="tn-admin-textarea" name="description" rows="3"><?php echo htmlspecialchars($category['description'] ?? ''); ?></textarea>
            </div>

            <!-- Category Image -->
            <div class="tn-admin-form-group">
              <label class="tn-admin-label">Category Image</label>
              <?php if (!empty($category['image'])): ?>
                <div class="mb-2">
                  <img src="<?php echo htmlspecialchars($category['image']); ?>" width="100" class="rounded">
                </div>
              <?php endif; ?>
              <input type="file" class="form-control" name="category_image" accept="image/*">
              <small class="text-muted">Leave empty to keep current image. Max 2MB.</small>
            </div>

            <!-- Icon -->
            <div class="tn-admin-form-group">
              <label class="tn-admin-label">Icon (Bootstrap Icons)</label>
              <input type="text" class="tn-admin-input" name="icon" 
                     value="<?php echo htmlspecialchars($category['icon'] ?? 'bi-laptop'); ?>" 
                     placeholder="e.g. bi-laptop">
              <small class="text-muted">Enter Bootstrap Icon class (e.g., bi-laptop, bi-phone)</small>
            </div>
          </div>

          <!-- SEO Card -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-search"></i> SEO Settings</h3>
            </div>

            <div class="tn-admin-form-group">
              <label class="tn-admin-label">Meta Title</label>
              <input type="text" class="tn-admin-input" name="meta_title" 
                     value="<?php echo htmlspecialchars($category['meta_title'] ?? ''); ?>">
            </div>

            <div class="tn-admin-form-group">
              <label class="tn-admin-label">Meta Keywords</label>
              <input type="text" class="tn-admin-input" name="meta_keywords" 
                     value="<?php echo htmlspecialchars($category['meta_keywords'] ?? ''); ?>">
            </div>

            <div class="tn-admin-form-group">
              <label class="tn-admin-label">Meta Description</label>
              <textarea class="tn-admin-textarea" name="meta_description" rows="3"><?php echo htmlspecialchars($category['meta_description'] ?? ''); ?></textarea>
            </div>
          </div>

          <!-- Form Actions -->
          <div class="tn-admin-form-actions">
            <a href="categories.php" class="btn tn-admin-btn-outline">Cancel</a>
            <button type="submit" class="btn tn-admin-btn-primary">
              <i class="bi bi-check-lg me-2"></i> Update Category
            </button>
          </div>
        </div>

        <!-- Right Sidebar -->
        <div class="col-lg-4">
          <!-- Status Panel -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-toggle2-on"></i> Status</h3>
            </div>
            <div class="tn-admin-form-group">
              <div class="tn-admin-toggle-row">
                <span>Active</span>
                <label class="tn-admin-toggle">
                  <input type="checkbox" name="status" <?php echo ($category['status'] ?? '') === 'Active' ? 'checked' : ''; ?>>
                  <span class="tn-admin-toggle-track"></span>
                </label>
              </div>
            </div>
          </div>

          <!-- Display Settings -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-gear"></i> Display Settings</h3>
            </div>
            <div class="tn-admin-form-group">
              <div class="tn-admin-toggle-row">
                <span>Featured Category</span>
                <label class="tn-admin-toggle">
                  <input type="checkbox" name="featured" <?php echo ($category['featured'] ?? 0) == 1 ? 'checked' : ''; ?>>
                  <span class="tn-admin-toggle-track"></span>
                </label>
              </div>
            </div>
            <div class="tn-admin-form-group">
              <label class="tn-admin-label">Display Order</label>
              <input type="number" class="tn-admin-input" name="display_order" 
                     value="<?php echo $category['display_order'] ?? 0; ?>" min="0">
            </div>
          </div>

          <!-- Category Info -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-clock-history"></i> Category Info</h3>
            </div>
            <div class="tn-admin-meta-list">
              <div class="tn-admin-meta-item">
                <span class="tn-admin-meta-label">ID</span>
                <span class="tn-admin-meta-value">#<?php echo $category['id']; ?></span>
              </div>
              <div class="tn-admin-meta-item">
                <span class="tn-admin-meta-label">Created</span>
                <span class="tn-admin-meta-value"><?php echo date('M d, Y', strtotime($category['created_at'])); ?></span>
              </div>
            </div>
            </div>
        </div>
      </div>
    </form>
  </main>

  <?php include 'includes/footer.php'; ?>
  </div>