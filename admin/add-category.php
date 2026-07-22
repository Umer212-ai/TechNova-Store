<?php
// admin/add-category.php - TechNova Store Admin Add Category
session_start();
include __DIR__ . '/../includes/db.php';

// Protect page
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

$message = '';
$messageType = '';

// Handle "Save & Add Another" redirect
if (isset($_GET['msg']) && $_GET['msg'] === 'added') {
    $message = 'Category added successfully! Add another one.';
    $messageType = 'success';
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = trim($_POST['category_name'] ?? '');
    $description   = trim($_POST['short_description'] ?? '');
    $status        = isset($_POST['status']) ? 'Active' : 'Inactive';

    // Validate
    if (empty($category_name)) {
        $message     = 'Category name is required.';
        $messageType = 'error';
    } else {
        // Handle image upload
        $imagePath = null;
        if (isset($_FILES['category_image']) && $_FILES['category_image']['error'] === UPLOAD_ERR_OK) {
            $allowed  = ['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'];
            $fileType = $_FILES['category_image']['type'];
            $fileSize = $_FILES['category_image']['size'];

            if (in_array($fileType, $allowed) && $fileSize <= 2 * 1024 * 1024) {
                $ext      = pathinfo($_FILES['category_image']['name'], PATHINFO_EXTENSION);
                $filename = 'cat_' . time() . '_' . rand(1000, 9999) . '.' . $ext;
                $uploadDir = __DIR__ . '/uploads/categories/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                if (move_uploaded_file($_FILES['category_image']['tmp_name'], $uploadDir . $filename)) {
                    $imagePath = 'uploads/categories/' . $filename;
                }
            }
        }

        // Insert into database
        $stmt = mysqli_prepare($conn, "INSERT INTO categories (category_name, image, description, status) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssss", $category_name, $imagePath, $description, $status);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);

            // If "Save & Add Another" was clicked, redirect back to this page
            if (isset($_POST['save_and_add'])) {
                header('Location: add-category.php?msg=added');
                exit;
            }

            header('Location: categories.php?msg=added');
            exit;
        } else {
            $message     = 'Failed to add category. Please try again.';
            $messageType = 'error';
        }
        mysqli_stmt_close($stmt);
    }
}

$pageTitle = 'Add Category';
?>
<?php include 'includes/header.php'; ?>

  <?php include 'includes/sidebar.php'; ?>

  <div class="tn-admin-wrapper">
    <?php include 'includes/topbar.php'; ?>

    <!-- ========== MAIN CONTENT ========== -->
    <main class="tn-admin-main">

      <!-- ========== BREADCRUMB ========== -->
      <nav class="tn-admin-breadcrumb" aria-label="Breadcrumb">
        <ol>
          <li><a href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
          <li><a href="#">Catalog</a></li>
          <li><a href="categories.php">Categories</a></li>
          <li class="active">Add Category</li>
        </ol>
      </nav>

      <?php if ($message): ?>
      <div class="tn-admin-alert tn-admin-alert-<?php echo $messageType === 'error' ? 'danger' : 'success'; ?>" id="tnAdminSuccessAlert">
        <i class="bi bi-<?php echo $messageType === 'error' ? 'exclamation-circle' : 'check-circle'; ?>"></i>
        <span><?php echo htmlspecialchars($message); ?></span>
        <button type="button" class="tn-admin-alert-close" onclick="this.parentElement.remove()"><i class="bi bi-x-lg"></i></button>
      </div>
      <?php endif; ?>

      <!-- ========== PAGE HEADER ========== -->
      <div class="tn-admin-page-header">
        <div class="tn-admin-page-header-left">
          <h1 class="tn-admin-page-title">Add New Category</h1>
          <p class="tn-admin-page-sub">Create a new category to organize your products.</p>
        </div>
        <div class="tn-admin-page-header-actions">
          <a href="categories.php" class="btn tn-admin-btn-outline">
            <i class="bi bi-arrow-left me-2"></i> Back to Categories
          </a>
        </div>
      </div>

      <!-- ========== ADD CATEGORY FORM ========== -->
      <form class="tn-admin-form" id="tnAdminAddCategoryForm" method="post" enctype="multipart/form-data">
        <div class="row g-4">

          <!-- ===== LEFT COLUMN: MAIN FORM ===== -->
          <div class="col-lg-8">

            <!-- Category Details Card -->
            <div class="tn-admin-card tn-admin-form-card">
              <div class="tn-admin-form-card-header">
                <h3><i class="bi bi-info-circle"></i> Category Details</h3>
                <p>Basic information about the category.</p>
              </div>

              <!-- Category Name -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminCategoryName">
                  Category Name <span class="tn-admin-required">*</span>
                </label>
                <input type="text" class="tn-admin-input" id="tnAdminCategoryName" name="category_name" placeholder="e.g. Laptops" required />
                <span class="tn-admin-form-hint">Enter a clear, descriptive name for the category.</span>
                <span class="tn-admin-form-error" id="tnAdminCategoryNameError"></span>
              </div>

              <!-- Slug -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminCategorySlug">
                  Slug <span class="tn-admin-required">*</span>
                </label>
                <div class="tn-admin-input-group">
                  <span class="tn-admin-input-prefix"><i class="bi bi-link-45deg"></i></span>
                  <input type="text" class="tn-admin-input tn-admin-input-with-prefix" id="tnAdminCategorySlug" name="slug" placeholder="laptops" required />
                </div>
                <span class="tn-admin-form-hint">Auto-generated from category name. Used in URLs.</span>
                <span class="tn-admin-form-error" id="tnAdminCategorySlugError"></span>
              </div>

              <!-- Short Description -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminCategoryDesc">
                  Short Description
                </label>
                <textarea class="tn-admin-textarea" id="tnAdminCategoryDesc" name="short_description" rows="3" placeholder="Brief description of this category (optional)"></textarea>
                <span class="tn-admin-form-hint">
                  <span id="tnAdminDescCharCount">0</span>/200 characters
                </span>
              </div>

              <!-- Category Image Upload -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label">Category Image</label>
                <div class="tn-admin-upload-zone" id="tnAdminImageUpload">
                  <input type="file" class="tn-admin-upload-input" id="tnAdminImageFile" name="category_image" accept="image/*" hidden />
                  <div class="tn-admin-upload-placeholder" id="tnAdminUploadPlaceholder">
                    <div class="tn-admin-upload-icon">
                      <i class="bi bi-cloud-arrow-up"></i>
                    </div>
                    <p class="tn-admin-upload-text"><strong>Click to upload</strong> or drag and drop</p>
                    <p class="tn-admin-upload-hint">SVG, PNG, JPG or WEBP (max 2MB)</p>
                  </div>
                  <div class="tn-admin-upload-preview" id="tnAdminUploadPreview" style="display:none;">
                    <img id="tnAdminPreviewImg" src="" alt="Preview" />
                    <button type="button" class="tn-admin-upload-remove" id="tnAdminRemoveImage" title="Remove image">
                      <i class="bi bi-x-lg"></i>
                    </button>
                  </div>
                </div>
              </div>

              <!-- Icon Picker -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label">Category Icon</label>
                <div class="tn-admin-icon-picker" id="tnAdminIconPicker">
                  <input type="hidden" name="icon" id="tnAdminSelectedIcon" value="" />
                  <div class="tn-admin-icon-grid">
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-laptop" title="Laptop"><i class="bi bi-laptop"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-phone" title="Phone"><i class="bi bi-phone"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-headphones" title="Headphones"><i class="bi bi-headphones"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-smartwatch" title="Smartwatch"><i class="bi bi-smartwatch"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-camera" title="Camera"><i class="bi bi-camera"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-controller" title="Gaming"><i class="bi bi-controller"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-printer" title="Printer"><i class="bi bi-printer"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-keyboard" title="Keyboard"><i class="bi bi-keyboard"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-mouse" title="Mouse"><i class="bi bi-mouse"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-usb-plug" title="USB"><i class="bi bi-usb-plug"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-hdd-network" title="Storage"><i class="bi bi-hdd-network"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-cpu" title="CPU"><i class="bi bi-cpu"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-memory" title="Memory"><i class="bi bi-memory"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-router" title="Router"><i class="bi bi-router"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-speaker" title="Speaker"><i class="bi bi-speaker"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-tv" title="TV"><i class="bi bi-tv"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-tablet" title="Tablet"><i class="bi bi-tablet"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-earbuds" title="Earbuds"><i class="bi bi-earbuds"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-webcam" title="Webcam"><i class="bi bi-webcam"></i></button>
                    <button type="button" class="tn-admin-icon-btn" data-icon="bi-joystick" title="Joystick"><i class="bi bi-joystick"></i></button>
                  </div>
                  <span class="tn-admin-form-hint">Select an icon to represent this category.</span>
                </div>
              </div>
            </div>

            <!-- SEO Card -->
            <div class="tn-admin-card tn-admin-form-card">
              <div class="tn-admin-form-card-header">
                <h3><i class="bi bi-search"></i> SEO Settings</h3>
                <p>Optimize this category for search engines.</p>
              </div>

              <!-- Meta Title -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminMetaTitle">Meta Title</label>
                <input type="text" class="tn-admin-input" id="tnAdminMetaTitle" name="meta_title" placeholder="e.g. Buy Laptops Online - Best Deals" />
                <span class="tn-admin-form-hint">
                  <span id="tnAdminMetaTitleCount">0</span>/60 characters. Leave blank to use category name.
                </span>
              </div>

              <!-- Meta Description -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminMetaDesc">Meta Description</label>
                <textarea class="tn-admin-textarea" id="tnAdminMetaDesc" name="meta_description" rows="3" placeholder="Brief description for search engine results"></textarea>
                <span class="tn-admin-form-hint">
                  <span id="tnAdminMetaDescCount">0</span>/160 characters.
                </span>
              </div>
            </div>

            <!-- Form Actions (Bottom) -->
            <div class="tn-admin-form-actions tn-admin-form-actions-bottom">
              <a href="categories.php" class="btn tn-admin-btn-outline">
                <i class="bi bi-x-lg me-2"></i> Cancel
              </a>
              <div class="tn-admin-form-actions-right">
                <button type="reset" class="btn tn-admin-btn-outline" id="tnAdminFormReset">
                  <i class="bi bi-arrow-counterclockwise me-2"></i> Reset
                </button>
                <button type="button" class="btn tn-admin-btn-outline" id="tnAdminSaveAndAdd">
                  <i class="bi bi-plus-lg me-2"></i> Save &amp; Add Another
                </button>
                <button type="submit" class="btn tn-admin-btn-primary" id="tnAdminSaveCategory">
                  <i class="bi bi-check-lg me-2"></i> Save Category
                </button>
              </div>
            </div>
          </div>

          <!-- ===== RIGHT COLUMN: SIDEBAR PANELS ===== -->
          <div class="col-lg-4">

            <!-- Status Panel -->
            <div class="tn-admin-card tn-admin-form-card">
              <div class="tn-admin-form-card-header">
                <h3><i class="bi bi-toggle2-on"></i> Status</h3>
              </div>
              <div class="tn-admin-form-group tn-admin-form-group-no-mb">
                <div class="tn-admin-toggle-row">
                  <div class="tn-admin-toggle-info">
                    <span class="tn-admin-toggle-label">Active</span>
                    <span class="tn-admin-toggle-desc">Category will be visible on the storefront.</span>
                  </div>
                  <label class="tn-admin-toggle" for="tnAdminStatusToggle">
                    <input type="checkbox" id="tnAdminStatusToggle" name="status" checked />
                    <span class="tn-admin-toggle-track"></span>
                  </label>
                </div>
              </div>
            </div>

            <!-- Display Settings Panel -->
            <div class="tn-admin-card tn-admin-form-card">
              <div class="tn-admin-form-card-header">
                <h3><i class="bi bi-gear"></i> Display Settings</h3>
              </div>

              <!-- Featured Toggle -->
              <div class="tn-admin-form-group">
                <div class="tn-admin-toggle-row">
                  <div class="tn-admin-toggle-info">
                    <span class="tn-admin-toggle-label">Featured Category</span>
                    <span class="tn-admin-toggle-desc">Show on homepage and featured sections.</span>
                  </div>
                  <label class="tn-admin-toggle" for="tnAdminFeaturedToggle">
                    <input type="checkbox" id="tnAdminFeaturedToggle" name="featured" />
                    <span class="tn-admin-toggle-track"></span>
                  </label>
                </div>
              </div>

              <!-- Display Order -->
              <div class="tn-admin-form-group tn-admin-form-group-no-mb">
                <label class="tn-admin-label" for="tnAdminDisplayOrder">Display Order</label>
                <input type="number" class="tn-admin-input" id="tnAdminDisplayOrder" name="display_order" value="0" min="0" max="9999" />
                <span class="tn-admin-form-hint">Lower numbers appear first.</span>
              </div>
            </div>

            <!-- Parent Category Panel -->
            <div class="tn-admin-card tn-admin-form-card">
              <div class="tn-admin-form-card-header">
                <h3><i class="bi bi-diagram-3"></i> Parent Category</h3>
              </div>
              <div class="tn-admin-form-group tn-admin-form-group-no-mb">
                <label class="tn-admin-label" for="tnAdminParentCategory">Parent</label>
                <select class="tn-admin-select" id="tnAdminParentCategory" name="parent_category">
                  <option value="0">None (Top Level)</option>
                  <optgroup label="Electronics">
                    <option value="1">Laptops</option>
                    <option value="2">Smartphones</option>
                    <option value="3">Audio</option>
                    <option value="4">Wearables</option>
                    <option value="5">Accessories</option>
                  </optgroup>
                  <optgroup label="Computing">
                    <option value="6">Desktops</option>
                    <option value="7">Monitors</option>
                    <option value="8">Networking</option>
                  </optgroup>
                  <optgroup label="Gaming">
                    <option value="9">Consoles</option>
                    <option value="10">PC Gaming</option>
                    <option value="11">Gaming Accessories</option>
                  </optgroup>
                  <optgroup label="Smart Home">
                    <option value="12">Smart Speakers</option>
                    <option value="13">Smart Lighting</option>
                    <option value="14">Security Cameras</option>
                  </optgroup>
                </select>
                <span class="tn-admin-form-hint">Leave as "None" for top-level categories.</span>
              </div>
            </div>

          </div>

        </div>
        <input type="hidden" name="save_and_add" id="tnAdminSaveAndAddFlag" value="0" />
      </form>

    </main>

    <?php include 'includes/footer.php'; ?>
