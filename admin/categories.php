<?php
// admin/categories.php - TechNova Store Admin Categories Management
session_start();
include __DIR__ . '/../includes/db.php';

// Protect page
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    if ($id > 0) {
        // Get image path before deleting
        $stmt = mysqli_prepare($conn, "SELECT image FROM categories WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $cat = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        if ($cat) {
            // Delete image file if exists
            if ($cat['image'] && file_exists(__DIR__ . '/' . $cat['image'])) {
                unlink(__DIR__ . '/' . $cat['image']);
            }

            // Delete category
            $stmt = mysqli_prepare($conn, "DELETE FROM categories WHERE id = ?");
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
    header('Location: categories.php?msg=deleted');
    exit;
}

// Fetch all categories
$categories = mysqli_query($conn, "SELECT * FROM categories ORDER BY id DESC");

// Count stats
$total    = mysqli_num_rows($categories);
$active   = 0;
$inactive = 0;
$categoryArr = [];
while ($row = mysqli_fetch_assoc($categories)) {
    $categoryArr[] = $row;
    if ($row['status'] === 'Active') {
        $active++;
    } else {
        $inactive++;
    }
}

// Get total products (placeholder since products table may not exist yet)
$totalProducts = 0;
if (mysqli_query($conn, "SHOW TABLES LIKE 'products'")->num_rows > 0) {
    $r = mysqli_query($conn, "SELECT COUNT(*) as c FROM products");
    $totalProducts = mysqli_fetch_assoc($r)['c'];
}

$msg = $_GET['msg'] ?? '';
$pageTitle = 'Categories';
?>
<?php include 'includes/header.php'; ?>

  <?php include 'includes/sidebar.php'; ?>

  <div class="tn-admin-wrapper">
    <?php include 'includes/topbar.php'; ?>

    <!-- ========== MAIN CONTENT ========== -->
    <main class="tn-admin-main">

      <?php if ($msg === 'added'): ?>
      <div class="tn-admin-alert tn-admin-alert-success" id="tnAdminSuccessAlert">
        <i class="bi bi-check-circle"></i>
        <span>Category added successfully!</span>
        <button type="button" class="tn-admin-alert-close" onclick="this.parentElement.remove()"><i class="bi bi-x-lg"></i></button>
      </div>
      <?php endif; ?>

      <?php if ($msg === 'updated'): ?>
      <div class="tn-admin-alert tn-admin-alert-success" id="tnAdminSuccessAlert">
        <i class="bi bi-check-circle"></i>
        <span>Category updated successfully!</span>
        <button type="button" class="tn-admin-alert-close" onclick="this.parentElement.remove()"><i class="bi bi-x-lg"></i></button>
      </div>
      <?php endif; ?>

      <?php if ($msg === 'deleted'): ?>
      <div class="tn-admin-alert tn-admin-alert-success" id="tnAdminSuccessAlert">
        <i class="bi bi-check-circle"></i>
        <span>Category deleted successfully!</span>
        <button type="button" class="tn-admin-alert-close" onclick="this.parentElement.remove()"><i class="bi bi-x-lg"></i></button>
      </div>
      <?php endif; ?>

      <?php if ($msg === 'error'): ?>
      <div class="tn-admin-alert tn-admin-alert-danger" id="tnAdminSuccessAlert">
        <i class="bi bi-exclamation-circle"></i>
        <span>Something went wrong. Please try again.</span>
        <button type="button" class="tn-admin-alert-close" onclick="this.parentElement.remove()"><i class="bi bi-x-lg"></i></button>
      </div>
      <?php endif; ?>

      <!-- ========== BREADCRUMB ========== -->
      <nav class="tn-admin-breadcrumb" aria-label="Breadcrumb">
        <ol>
          <li><a href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
          <li><a href="#">Catalog</a></li>
          <li class="active">Categories</li>
        </ol>
      </nav>

      <!-- ========== PAGE HEADER ========== -->
      <div class="tn-admin-page-header">
        <div class="tn-admin-page-header-left">
          <h1 class="tn-admin-page-title">Categories</h1>
          <p class="tn-admin-page-sub">Manage your product categories and organize your store catalog.</p>
        </div>
        <div class="tn-admin-page-header-actions">
          <a href="add-category.php" class="btn tn-admin-btn-primary" id="tnAdminAddCategory">
            <i class="bi bi-plus-lg me-2"></i> Add Category
          </a>
        </div>
      </div>

      <!-- ========== STATS ROW ========== -->
      <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
          <div class="tn-admin-mini-stat">
            <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-primary">
              <i class="bi bi-grid-3x3-gap"></i>
            </div>
            <div class="tn-admin-mini-stat-info">
              <span class="tn-admin-mini-stat-value"><?php echo $total; ?></span>
              <span class="tn-admin-mini-stat-label">Total Categories</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="tn-admin-mini-stat">
            <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-accent">
              <i class="bi bi-check-circle"></i>
            </div>
            <div class="tn-admin-mini-stat-info">
              <span class="tn-admin-mini-stat-value"><?php echo $active; ?></span>
              <span class="tn-admin-mini-stat-label">Active</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="tn-admin-mini-stat">
            <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-warning">
              <i class="bi bi-eye-slash"></i>
            </div>
            <div class="tn-admin-mini-stat-info">
              <span class="tn-admin-mini-stat-value"><?php echo $inactive; ?></span>
              <span class="tn-admin-mini-stat-label">Inactive</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="tn-admin-mini-stat">
            <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-purple">
              <i class="bi bi-box-seam"></i>
            </div>
            <div class="tn-admin-mini-stat-info">
              <span class="tn-admin-mini-stat-value"><?php echo number_format($totalProducts); ?></span>
              <span class="tn-admin-mini-stat-label">Total Products</span>
            </div>
          </div>
        </div>
      </div>

      <!-- ========== CATEGORIES TABLE CARD ========== -->
      <div class="tn-admin-card">
        <!-- Toolbar: Search + Filter -->
        <div class="tn-admin-toolbar">
          <div class="tn-admin-toolbar-left">
            <div class="tn-admin-search tn-admin-search-sm">
              <i class="bi bi-search"></i>
              <input type="text" class="tn-admin-search-input" id="tnAdminCategorySearch" placeholder="Search categories..." aria-label="Search categories" />
            </div>
            <div class="tn-admin-filter-group">
              <select class="tn-admin-select" id="tnAdminStatusFilter" aria-label="Filter by status">
                <option value="all">All Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
              </select>
            </div>
          </div>
          <div class="tn-admin-toolbar-right">
            <span class="tn-admin-toolbar-count">Showing <strong id="tnAdminShowingCount"><?php echo $total; ?></strong> of <strong><?php echo $total; ?></strong> categories</span>
          </div>
        </div>

        <!-- Categories Table -->
        <div class="tn-admin-table-wrap">
          <table class="tn-admin-table tn-admin-table-categories" id="tnAdminCategoriesTable">
            <thead>
              <tr>
                <th class="tn-admin-th-check">
                  <label class="tn-admin-checkbox">
                    <input type="checkbox" id="tnAdminSelectAll" />
                    <span class="tn-admin-checkbox-mark"></span>
                  </label>
                </th>
                <th>Image</th>
                <th>Category Name</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($categoryArr)): ?>
              <tr class="tn-admin-no-data">
                <td colspan="6" style="text-align:center; padding:40px; color:var(--admin-muted);">
                  No categories found. <a href="add-category.php">Add your first category</a>.
                </td>
              </tr>
              <?php else: ?>
              <?php foreach ($categoryArr as $cat): ?>
              <tr data-status="<?php echo strtolower($cat['status']); ?>">
                <td>
                  <label class="tn-admin-checkbox">
                    <input type="checkbox" class="tn-admin-row-check" />
                    <span class="tn-admin-checkbox-mark"></span>
                  </label>
                </td>
                <td>
                  <div class="tn-admin-cat-img">
                    <?php if ($cat['image']): ?>
                      <img src="<?php echo htmlspecialchars($cat['image']); ?>" alt="<?php echo htmlspecialchars($cat['category_name']); ?>" />
                    <?php else: ?>
                      <div style="width:48px;height:48px;border-radius:8px;background:var(--admin-gradient-soft);display:flex;align-items:center;justify-content:center;color:var(--admin-primary);font-size:1.2rem;"><i class="bi bi-image"></i></div>
                    <?php endif; ?>
                  </div>
                </td>
                <td>
                  <div class="tn-admin-cat-name">
                    <strong><?php echo htmlspecialchars($cat['category_name']); ?></strong>
                  </div>
                </td>
                <td>
                  <?php if ($cat['status'] === 'Active'): ?>
                    <span class="tn-admin-badge tn-admin-badge-success">Active</span>
                  <?php else: ?>
                    <span class="tn-admin-badge tn-admin-badge-warning">Inactive</span>
                  <?php endif; ?>
                </td>
                <td><?php echo date('M d, Y', strtotime($cat['created_at'])); ?></td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="edit-category.php?id=<?php echo $cat['id']; ?>" class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></a>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="category" data-id="<?php echo $cat['id']; ?>" data-name="<?php echo htmlspecialchars($cat['category_name']); ?>"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

        <!-- Pagination placeholder -->
        <div class="tn-admin-pagination-wrap">
          <div class="tn-admin-pagination-info">
            <span>Showing <?php echo $total; ?> categor<?php echo $total === 1 ? 'y' : 'ies'; ?></span>
          </div>
        </div>
      </div>

      <!-- ========== DELETE CONFIRMATION MODAL ========== -->
      <div class="tn-admin-modal-overlay" id="tnAdminDeleteModal">
        <div class="tn-admin-modal">
          <div class="tn-admin-modal-icon tn-admin-modal-icon-danger">
            <i class="bi bi-exclamation-triangle"></i>
          </div>
          <h3 class="tn-admin-modal-title">Delete Category</h3>
          <p class="tn-admin-modal-text">Are you sure you want to delete <strong id="tnAdminDeleteCatName"></strong>? This action cannot be undone.</p>
          <div class="tn-admin-modal-actions">
            <button class="btn tn-admin-btn-outline" id="tnAdminModalCancel">Cancel</button>
            <a href="#" class="btn tn-admin-btn-danger" id="tnAdminModalConfirm">Delete Category</a>
          </div>
        </div>
      </div>

    </main>

    <?php include 'includes/footer.php'; ?>
