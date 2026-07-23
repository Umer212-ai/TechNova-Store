<?php
// admin/products.php
include 'includes/auth.php';   // session & login check
include 'includes/db.php';     // database connection $conn

// DELETE HANDLING
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $deleteId = (int)$_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id = $deleteId");
    header('Location: products.php?msg=deleted');
    exit;
}

// Summary stats (dynamic)
$totalProducts    = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM products"))[0];
$activeProducts   = $totalProducts;           // abhi sab active maan lo
$lowStockProducts = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM products WHERE stock < 10 AND stock > 0"))[0];
$featuredProducts = 0;                        // featured column baad mein

$pageTitle = 'Products';
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="tn-admin-wrapper">
  <?php include 'includes/topbar.php'; ?>

  <main class="tn-admin-main">

    <!-- Breadcrumb -->
    <nav class="tn-admin-breadcrumb" aria-label="Breadcrumb">
      <ol>
        <li><a href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
        <li><a href="#">Catalog</a></li>
        <li class="active">Products</li>
      </ol>
    </nav>

    <!-- Page Header -->
    <div class="tn-admin-page-header">
      <div class="tn-admin-page-header-left">
        <h1 class="tn-admin-page-title">Products</h1>
        <p class="tn-admin-page-sub">Manage your product inventory, pricing, and stock levels.</p>
      </div>
      <div class="tn-admin-page-header-actions">
        <button type="button" class="btn tn-admin-btn-outline" id="tnAdminImportBtn">
          <i class="bi bi-upload me-2"></i> Import
        </button>
        <button type="button" class="btn tn-admin-btn-outline" id="tnAdminExportBtn">
          <i class="bi bi-download me-2"></i> Export
        </button>
        <a href="add-product.php" class="btn tn-admin-btn-primary">
          <i class="bi bi-plus-lg me-2"></i> Add Product
        </a>
      </div>
    </div>

    <!-- Summary Stats -->
    <div class="row g-3 mb-4">
      <div class="col-sm-6 col-xl-3">
        <div class="tn-admin-mini-stat">
          <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-primary">
            <i class="bi bi-box-seam"></i>
          </div>
          <div class="tn-admin-mini-stat-info">
            <span class="tn-admin-mini-stat-value"><?php echo $totalProducts; ?></span>
            <span class="tn-admin-mini-stat-label">Total Products</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="tn-admin-mini-stat">
          <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-accent">
            <i class="bi bi-check-circle"></i>
          </div>
          <div class="tn-admin-mini-stat-info">
            <span class="tn-admin-mini-stat-value"><?php echo $activeProducts; ?></span>
            <span class="tn-admin-mini-stat-label">Active</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="tn-admin-mini-stat">
          <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-warning">
            <i class="bi bi-exclamation-triangle"></i>
          </div>
          <div class="tn-admin-mini-stat-info">
            <span class="tn-admin-mini-stat-value"><?php echo $lowStockProducts; ?></span>
            <span class="tn-admin-mini-stat-label">Low Stock</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="tn-admin-mini-stat">
          <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-purple">
            <i class="bi bi-star"></i>
          </div>
          <div class="tn-admin-mini-stat-info">
            <span class="tn-admin-mini-stat-value"><?php echo $featuredProducts; ?></span>
            <span class="tn-admin-mini-stat-label">Featured</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Products Table Card -->
    <div class="tn-admin-card">
      <!-- Toolbar -->
      <div class="tn-admin-toolbar">
        <div class="tn-admin-toolbar-left">
          <div class="tn-admin-search tn-admin-search-sm">
            <i class="bi bi-search"></i>
            <input type="text" class="tn-admin-search-input" id="tnAdminProductSearch" placeholder="Search products..." aria-label="Search products" />
          </div>
          <div class="tn-admin-filter-group">
            <select class="tn-admin-select" id="tnAdminCategoryFilter" aria-label="Filter by category">
              <option value="all">All Categories</option>
              <option value="laptops">Laptops</option>
              <option value="smartphones">Smartphones</option>
              <option value="audio">Audio</option>
              <option value="wearables">Wearables</option>
              <option value="gaming">Gaming</option>
              <option value="accessories">Accessories</option>
            </select>
          </div>
          <div class="tn-admin-filter-group">
            <select class="tn-admin-select" id="tnAdminStatusFilter" aria-label="Filter by status">
              <option value="all">All Status</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
              <option value="draft">Draft</option>
            </select>
          </div>
          <div class="tn-admin-filter-group">
            <select class="tn-admin-select" id="tnAdminStockFilter" aria-label="Filter by stock">
              <option value="all">All Stock</option>
              <option value="in-stock">In Stock</option>
              <option value="low-stock">Low Stock</option>
              <option value="out-of-stock">Out of Stock</option>
            </select>
          </div>
        </div>
        <div class="tn-admin-toolbar-right">
          <div class="tn-admin-filter-group">
            <select class="tn-admin-select" id="tnAdminSortFilter" aria-label="Sort products">
              <option value="newest">Newest First</option>
              <option value="oldest">Oldest First</option>
              <option value="name-asc">Name A-Z</option>
              <option value="name-desc">Name Z-A</option>
              <option value="price-asc">Price Low to High</option>
              <option value="price-desc">Price High to Low</option>
              <option value="stock-asc">Stock Low to High</option>
              <option value="stock-desc">Stock High to Low</option>
            </select>
          </div>
          <span class="tn-admin-toolbar-count">Showing <strong>1-8</strong> of <strong>1,247</strong> products</span>
        </div>
      </div>

      <!-- Products Table -->
      <div class="tn-admin-table-wrap">
        <table class="tn-admin-table tn-admin-table-products" id="tnAdminProductsTable">
          <thead>
            <tr>
              <th class="tn-admin-th-check">
                <label class="tn-admin-checkbox">
                  <input type="checkbox" id="tnAdminSelectAll" />
                  <span class="tn-admin-checkbox-mark"></span>
                </label>
              </th>
              <th>Product</th>
              <th>SKU</th>
              <th>Category</th>
              <th>Brand</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Status</th>
              <th>Featured</th>
              <th>Created</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Query to fetch products with category name
            $query = "SELECT p.*, c.category_name 
                      FROM products p 
                      LEFT JOIN categories c ON p.category_id = c.id 
                      ORDER BY p.created_at DESC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0):
              while ($product = mysqli_fetch_assoc($result)):
                // Simple variables
                $id       = $product['id'];
                $name     = htmlspecialchars($product['product_name']);
                $category = $product['category_name'] ?? 'Uncategorized';
                $price    = number_format($product['price'], 2);
                $stock    = (int)$product['stock'];
                $image    = !empty($product['image']) ? '../' . $product['image'] : 'https://via.placeholder.com/100?text=No+Image';
                $created  = date('M d, Y', strtotime($product['created_at']));
                $sku      = 'SKU-' . str_pad($id, 4, '0', STR_PAD_LEFT);

                // Stock level CSS class
                if ($stock == 0) {
                    $stockClass = 'tn-admin-stock-out';
                    $stockBarClass = 'tn-admin-stock-bar-out';
                } elseif ($stock < 10) {
                    $stockClass = 'tn-admin-stock-low';
                    $stockBarClass = 'tn-admin-stock-bar-low';
                } elseif ($stock < 50) {
                    $stockClass = '';
                    $stockBarClass = 'tn-admin-stock-bar-medium';
                } else {
                    $stockClass = '';
                    $stockBarClass = 'tn-admin-stock-bar-high';
                }

                // Stock bar width (assuming max stock 200 for demo)
                $stockPercent = $stock > 200 ? 100 : round(($stock / 200) * 100, 1);
            ?>
            <tr data-status="active" data-stock="<?php echo $stock > 0 ? ($stock < 10 ? 'low-stock' : 'in-stock') : 'out-of-stock'; ?>" data-category="<?php echo strtolower($category); ?>" data-brand="—" data-price="<?php echo $price; ?>" data-stock-count="<?php echo $stock; ?>">
              <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
              <td>
                <div class="tn-admin-product-cell">
                  <div class="tn-admin-product-thumb">
                    <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" onerror="this.src='https://via.placeholder.com/100?text=No+Image';" />
                  </div>
                  <div class="tn-admin-product-info">
                    <strong class="tn-admin-product-name"><?php echo $name; ?></strong>
                    <span class="tn-admin-product-sku-mobile"><?php echo $sku; ?></span>
                  </div>
                </div>
              </td>
              <td><code class="tn-admin-sku"><?php echo $sku; ?></code></td>
              <td><span class="tn-admin-badge tn-admin-badge-info"><?php echo $category; ?></span></td>
              <td>—</td>
              <td>
                <div class="tn-admin-price-cell">
                  <span class="tn-admin-product-price">$<?php echo $price; ?></span>
                </div>
              </td>
              <td>
                <div class="tn-admin-stock-cell">
                  <span class="tn-admin-stock-value <?php echo $stockClass; ?>"><?php echo $stock; ?></span>
                  <div class="tn-admin-stock-bar">
                    <div class="tn-admin-stock-bar-fill <?php echo $stockBarClass; ?>" style="width:<?php echo $stockPercent; ?>%"></div>
                  </div>
                </div>
              </td>
              <td><span class="tn-admin-badge tn-admin-badge-success">Active</span></td>
              <td><span class="tn-admin-featured-badge"><i class="bi bi-star"></i></span></td>
              <td><?php echo $created; ?></td>
              <td>
             <div class="tn-admin-table-actions">
              <button class="tn-admin-table-btn tn-admin-table-btn-view" title="View Product" data-view="product" data-id="<?php echo $id; ?>"><i class="bi bi-eye"></i></button>
               <button class="tn-admin-table-btn" title="Edit" onclick="window.location.href='edit-product.php?id=<?php echo $id; ?>'"><i class="bi bi-pencil"></i></button>
                 <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="product" data-id="<?php echo $id; ?>"><i class="bi bi-trash3"></i></button>
            </div>
              </td>
            </tr>
            <?php endwhile; ?>
            <?php else: ?>
            <tr>
              <td colspan="11">
                <div class="tn-admin-empty-state" style="display: block;">
                  <div class="tn-admin-empty-icon"><i class="bi bi-box-seam"></i></div>
                  <h3>No products found</h3>
                  <p>Add your first product to get started.</p>
                  <a href="add-product.php" class="btn tn-admin-btn-primary"><i class="bi bi-plus-lg me-2"></i> Add Product</a>
                </div>
              </td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="tn-admin-pagination-wrap">
        <div class="tn-admin-pagination-info">
          <span>Showing 1-8 of 1,247 products</span>
        </div>
        <div class="tn-admin-pagination" id="tnAdminPagination">
          <button class="tn-admin-page-btn" disabled><i class="bi bi-chevron-left"></i></button>
          <button class="tn-admin-page-btn active">1</button>
          <button class="tn-admin-page-btn">2</button>
          <button class="tn-admin-page-btn">3</button>
          <button class="tn-admin-page-btn">4</button>
          <button class="tn-admin-page-btn">...</button>
          <button class="tn-admin-page-btn">156</button>
          <button class="tn-admin-page-btn"><i class="bi bi-chevron-right"></i></button>
        </div>
      </div>
    </div>

    <!-- Empty State (for filter no results) -->
    <div class="tn-admin-empty-state" id="tnAdminEmptyState" style="display: none;">
      <div class="tn-admin-empty-icon">
        <i class="bi bi-box-seam"></i>
      </div>
      <h3>No products found</h3>
      <p>We couldn't find any products matching your search or filters. Try adjusting your criteria or add a new product.</p>
      <div class="tn-admin-empty-actions">
        <button class="btn tn-admin-btn-outline" id="tnAdminClearFilters">
          <i class="bi bi-x-lg me-2"></i> Clear Filters
        </button>
        <a href="add-product.php" class="btn tn-admin-btn-primary">
          <i class="bi bi-plus-lg me-2"></i> Add Product
        </a>
      </div>
    </div>

    <!-- Bulk Actions Bar -->
    <div class="tn-admin-bulk-bar" id="tnAdminBulkBar">
      <div class="tn-admin-bulk-bar-left">
        <span class="tn-admin-bulk-count" id="tnAdminBulkCount">0 selected</span>
      </div>
      <div class="tn-admin-bulk-bar-right">
        <button class="btn tn-admin-btn-outline tn-admin-btn-sm" id="tnAdminBulkDeactivate">
          <i class="bi bi-eye-slash me-1"></i> Deactivate
        </button>
        <button class="btn tn-admin-btn-outline tn-admin-btn-sm" id="tnAdminBulkActivate">
          <i class="bi bi-check-circle me-1"></i> Activate
        </button>
        <button class="btn tn-admin-btn-outline tn-admin-btn-sm tn-admin-btn-danger-outline" id="tnAdminBulkDelete">
          <i class="bi bi-trash3 me-1"></i> Delete
        </button>
        <button class="tn-admin-btn-text" id="tnAdminBulkCancel">Cancel</button>
      </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="tn-admin-modal-overlay" id="tnAdminDeleteModal">
      <div class="tn-admin-modal">
        <div class="tn-admin-modal-icon tn-admin-modal-icon-danger">
          <i class="bi bi-exclamation-triangle"></i>
        </div>
        <h3 class="tn-admin-modal-title">Delete Product</h3>
        <p class="tn-admin-modal-text">Are you sure you want to delete this product? This action cannot be undone and the product will be permanently removed from your catalog.</p>
        <div class="tn-admin-modal-actions">
          <button class="btn tn-admin-btn-outline" id="tnAdminModalCancel">Cancel</button>
          <button class="btn tn-admin-btn-danger" id="tnAdminModalConfirm">Delete Product</button>
        </div>
      </div>
    </div>

  </main>

  <?php include 'includes/footer.php'; ?>