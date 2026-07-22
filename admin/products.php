<?php
// admin/products.php - TechNova Store Admin Products Management
// Backend integration will be added later.
// include '../includes/config.php';
// include '../includes/db.php';
// include 'includes/auth.php';

$pageTitle = 'Products';
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
          <li class="active">Products</li>
        </ol>
      </nav>

      <!-- ========== PAGE HEADER ========== -->
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

      <!-- ========== SUMMARY STATS ========== -->
      <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
          <div class="tn-admin-mini-stat">
            <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-primary">
              <i class="bi bi-box-seam"></i>
            </div>
            <div class="tn-admin-mini-stat-info">
              <span class="tn-admin-mini-stat-value">1,247</span>
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
              <span class="tn-admin-mini-stat-value">1,108</span>
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
              <span class="tn-admin-mini-stat-value">34</span>
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
              <span class="tn-admin-mini-stat-value">89</span>
              <span class="tn-admin-mini-stat-label">Featured</span>
            </div>
          </div>
        </div>
      </div>

      <!-- ========== PRODUCTS TABLE CARD ========== -->
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
              <!-- Dynamic Products List -->
              <tr data-status="active" data-stock="in-stock" data-category="laptops" data-brand="apple" data-price="1999" data-stock-count="156">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-product-cell">
                    <div class="tn-admin-product-thumb">
                      <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=100&q=80" alt="MacBook Pro" />
                    </div>
                    <div class="tn-admin-product-info">
                      <strong class="tn-admin-product-name">MacBook Pro 14-inch</strong>
                      <span class="tn-admin-product-sku-mobile">MBP-14-001</span>
                    </div>
                  </div>
                </td>
                <td><code class="tn-admin-sku">MBP-14-001</code></td>
                <td><span class="tn-admin-badge tn-admin-badge-info">Laptops</span></td>
                <td>Apple</td>
                <td>
                  <div class="tn-admin-price-cell">
                    <span class="tn-admin-product-price">$1,999.00</span>
                    <span class="tn-admin-product-sale-price">$1,799.00</span>
                  </div>
                </td>
                <td>
                  <div class="tn-admin-stock-cell">
                    <span class="tn-admin-stock-value">156</span>
                    <div class="tn-admin-stock-bar"><div class="tn-admin-stock-bar-fill tn-admin-stock-bar-high" style="width:78%"></div></div>
                  </div>
                </td>
                <td><span class="tn-admin-badge tn-admin-badge-success">Active</span></td>
                <td><span class="tn-admin-featured-badge is-featured" title="Featured"><i class="bi bi-star-fill"></i></span></td>
                <td>Jan 15, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <button class="tn-admin-table-btn tn-admin-table-btn-view" title="View Product" data-view="product"><i class="bi bi-eye"></i></button>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="product"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="active" data-stock="in-stock" data-category="smartphones" data-brand="samsung" data-price="1299" data-stock-count="324">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-product-cell">
                    <div class="tn-admin-product-thumb">
                      <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=100&q=80" alt="Galaxy S25 Ultra" />
                    </div>
                    <div class="tn-admin-product-info">
                      <strong class="tn-admin-product-name">Samsung Galaxy S25 Ultra</strong>
                      <span class="tn-admin-product-sku-mobile">SGS-25-002</span>
                    </div>
                  </div>
                </td>
                <td><code class="tn-admin-sku">SGS-25-002</code></td>
                <td><span class="tn-admin-badge tn-admin-badge-info">Smartphones</span></td>
                <td>Samsung</td>
                <td><div class="tn-admin-price-cell"><span class="tn-admin-product-price">$1,299.00</span></div></td>
                <td>
                  <div class="tn-admin-stock-cell">
                    <span class="tn-admin-stock-value">324</span>
                    <div class="tn-admin-stock-bar"><div class="tn-admin-stock-bar-fill tn-admin-stock-bar-high" style="width:90%"></div></div>
                  </div>
                </td>
                <td><span class="tn-admin-badge tn-admin-badge-success">Active</span></td>
                <td><span class="tn-admin-featured-badge is-featured" title="Featured"><i class="bi bi-star-fill"></i></span></td>
                <td>Jan 20, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <button class="tn-admin-table-btn tn-admin-table-btn-view" title="View Product" data-view="product"><i class="bi bi-eye"></i></button>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="product"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="active" data-stock="low-stock" data-category="audio" data-brand="sony" data-price="349" data-stock-count="8">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-product-cell">
                    <div class="tn-admin-product-thumb">
                      <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=100&q=80" alt="WH-1000XM5" />
                    </div>
                    <div class="tn-admin-product-info">
                      <strong class="tn-admin-product-name">Sony WH-1000XM5</strong>
                      <span class="tn-admin-product-sku-mobile">SWH-1K-003</span>
                    </div>
                  </div>
                </td>
                <td><code class="tn-admin-sku">SWH-1K-003</code></td>
                <td><span class="tn-admin-badge tn-admin-badge-info">Audio</span></td>
                <td>Sony</td>
                <td>
                  <div class="tn-admin-price-cell">
                    <span class="tn-admin-product-price">$399.99</span>
                    <span class="tn-admin-product-sale-price">$349.99</span>
                  </div>
                </td>
                <td>
                  <div class="tn-admin-stock-cell">
                    <span class="tn-admin-stock-value tn-admin-stock-low">8</span>
                    <div class="tn-admin-stock-bar"><div class="tn-admin-stock-bar-fill tn-admin-stock-bar-low" style="width:8%"></div></div>
                  </div>
                </td>
                <td><span class="tn-admin-badge tn-admin-badge-success">Active</span></td>
                <td><span class="tn-admin-featured-badge"><i class="bi bi-star"></i></span></td>
                <td>Feb 3, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <button class="tn-admin-table-btn tn-admin-table-btn-view" title="View Product" data-view="product"><i class="bi bi-eye"></i></button>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="product"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="active" data-stock="in-stock" data-category="wearables" data-brand="apple" data-price="399" data-stock-count="89">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-product-cell">
                    <div class="tn-admin-product-thumb">
                      <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=100&q=80" alt="Apple Watch" />
                    </div>
                    <div class="tn-admin-product-info">
                      <strong class="tn-admin-product-name">Apple Watch Series 10</strong>
                      <span class="tn-admin-product-sku-mobile">AWS-10-004</span>
                    </div>
                  </div>
                </td>
                <td><code class="tn-admin-sku">AWS-10-004</code></td>
                <td><span class="tn-admin-badge tn-admin-badge-info">Wearables</span></td>
                <td>Apple</td>
                <td>
                  <div class="tn-admin-price-cell">
                    <span class="tn-admin-product-price">$449.00</span>
                    <span class="tn-admin-product-sale-price">$399.00</span>
                  </div>
                </td>
                <td>
                  <div class="tn-admin-stock-cell">
                    <span class="tn-admin-stock-value">89</span>
                    <div class="tn-admin-stock-bar"><div class="tn-admin-stock-bar-fill tn-admin-stock-bar-high" style="width:45%"></div></div>
                  </div>
                </td>
                <td><span class="tn-admin-badge tn-admin-badge-success">Active</span></td>
                <td><span class="tn-admin-featured-badge is-featured" title="Featured"><i class="bi bi-star-fill"></i></span></td>
                <td>Feb 14, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <button class="tn-admin-table-btn tn-admin-table-btn-view" title="View Product" data-view="product"><i class="bi bi-eye"></i></button>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="product"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="inactive" data-stock="out-of-stock" data-category="gaming" data-brand="sony" data-price="699" data-stock-count="0">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-product-cell">
                    <div class="tn-admin-product-thumb">
                      <img src="https://images.unsplash.com/photo-1546868871-af0de0ae72be?auto=format&fit=crop&w=100&q=80" alt="PS5 Pro" />
                    </div>
                    <div class="tn-admin-product-info">
                      <strong class="tn-admin-product-name">PlayStation 5 Pro</strong>
                      <span class="tn-admin-product-sku-mobile">PS5P-PR-005</span>
                    </div>
                  </div>
                </td>
                <td><code class="tn-admin-sku">PS5P-PR-005</code></td>
                <td><span class="tn-admin-badge tn-admin-badge-info">Gaming</span></td>
                <td>Sony</td>
                <td><div class="tn-admin-price-cell"><span class="tn-admin-product-price">$699.99</span></div></td>
                <td>
                  <div class="tn-admin-stock-cell">
                    <span class="tn-admin-stock-value tn-admin-stock-out">0</span>
                    <div class="tn-admin-stock-bar"><div class="tn-admin-stock-bar-fill tn-admin-stock-bar-out" style="width:0%"></div></div>
                  </div>
                </td>
                <td><span class="tn-admin-badge tn-admin-badge-warning">Inactive</span></td>
                <td><span class="tn-admin-featured-badge"><i class="bi bi-star"></i></span></td>
                <td>Mar 1, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <button class="tn-admin-table-btn tn-admin-table-btn-view" title="View Product" data-view="product"><i class="bi bi-eye"></i></button>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="product"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="active" data-stock="low-stock" data-category="accessories" data-brand="logitech" data-price="79" data-stock-count="3">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-product-cell">
                    <div class="tn-admin-product-thumb">
                      <img src="https://images.unsplash.com/photo-1527814050087-3793815479db?auto=format&fit=crop&w=100&q=80" alt="MX Master 3S" />
                    </div>
                    <div class="tn-admin-product-info">
                      <strong class="tn-admin-product-name">Logitech MX Master 3S</strong>
                      <span class="tn-admin-product-sku-mobile">LMX-3S-006</span>
                    </div>
                  </div>
                </td>
                <td><code class="tn-admin-sku">LMX-3S-006</code></td>
                <td><span class="tn-admin-badge tn-admin-badge-info">Accessories</span></td>
                <td>Logitech</td>
                <td>
                  <div class="tn-admin-price-cell">
                    <span class="tn-admin-product-price">$99.99</span>
                    <span class="tn-admin-product-sale-price">$79.99</span>
                  </div>
                </td>
                <td>
                  <div class="tn-admin-stock-cell">
                    <span class="tn-admin-stock-value tn-admin-stock-low">3</span>
                    <div class="tn-admin-stock-bar"><div class="tn-admin-stock-bar-fill tn-admin-stock-bar-low" style="width:3%"></div></div>
                  </div>
                </td>
                <td><span class="tn-admin-badge tn-admin-badge-success">Active</span></td>
                <td><span class="tn-admin-featured-badge"><i class="bi bi-star"></i></span></td>
                <td>Mar 12, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <button class="tn-admin-table-btn tn-admin-table-btn-view" title="View Product" data-view="product"><i class="bi bi-eye"></i></button>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="product"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="draft" data-stock="in-stock" data-category="laptops" data-brand="dell" data-price="1599" data-stock-count="42">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-product-cell">
                    <div class="tn-admin-product-thumb">
                      <img src="https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?auto=format&fit=crop&w=100&q=80" alt="Dell XPS 15" />
                    </div>
                    <div class="tn-admin-product-info">
                      <strong class="tn-admin-product-name">Dell XPS 15 (2026)</strong>
                      <span class="tn-admin-product-sku-mobile">DXS-15-007</span>
                    </div>
                  </div>
                </td>
                <td><code class="tn-admin-sku">DXS-15-007</code></td>
                <td><span class="tn-admin-badge tn-admin-badge-info">Laptops</span></td>
                <td>Dell</td>
                <td><div class="tn-admin-price-cell"><span class="tn-admin-product-price">$1,599.00</span></div></td>
                <td>
                  <div class="tn-admin-stock-cell">
                    <span class="tn-admin-stock-value">42</span>
                    <div class="tn-admin-stock-bar"><div class="tn-admin-stock-bar-fill tn-admin-stock-bar-medium" style="width:21%"></div></div>
                  </div>
                </td>
                <td><span class="tn-admin-badge tn-admin-badge-purple">Draft</span></td>
                <td><span class="tn-admin-featured-badge"><i class="bi bi-star"></i></span></td>
                <td>Apr 5, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <button class="tn-admin-table-btn tn-admin-table-btn-view" title="View Product" data-view="product"><i class="bi bi-eye"></i></button>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="product"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="active" data-stock="in-stock" data-category="smartphones" data-brand="apple" data-price="1199" data-stock-count="210">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-product-cell">
                    <div class="tn-admin-product-thumb">
                      <img src="https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?auto=format&fit=crop&w=100&q=80" alt="iPhone 16 Pro" />
                    </div>
                    <div class="tn-admin-product-info">
                      <strong class="tn-admin-product-name">iPhone 16 Pro Max</strong>
                      <span class="tn-admin-product-sku-mobile">APL-16P-008</span>
                    </div>
                  </div>
                </td>
                <td><code class="tn-admin-sku">APL-16P-008</code></td>
                <td><span class="tn-admin-badge tn-admin-badge-info">Smartphones</span></td>
                <td>Apple</td>
                <td><div class="tn-admin-price-cell"><span class="tn-admin-product-price">$1,199.00</span></div></td>
                <td>
                  <div class="tn-admin-stock-cell">
                    <span class="tn-admin-stock-value">210</span>
                    <div class="tn-admin-stock-bar"><div class="tn-admin-stock-bar-fill tn-admin-stock-bar-high" style="width:85%"></div></div>
                  </div>
                </td>
                <td><span class="tn-admin-badge tn-admin-badge-success">Active</span></td>
                <td><span class="tn-admin-featured-badge is-featured" title="Featured"><i class="bi bi-star-fill"></i></span></td>
                <td>May 20, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <button class="tn-admin-table-btn tn-admin-table-btn-view" title="View Product" data-view="product"><i class="bi bi-eye"></i></button>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="product"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>
              <!-- End Dynamic Products List -->
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

      <!-- Empty State -->
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
