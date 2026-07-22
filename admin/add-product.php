<?php
// admin/add-product.php - TechNova Store Admin Add Product
// Backend integration will be added later.
// include '../includes/config.php';
// include '../includes/db.php';
// include 'includes/auth.php';

$pageTitle = 'Add Product';
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
          <li><a href="products.php">Products</a></li>
          <li class="active">Add Product</li>
        </ol>
      </nav>

      <!-- ========== PAGE HEADER ========== -->
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

      <!-- ========== ADD PRODUCT FORM ========== -->
      <form class="tn-admin-form" id="tnAdminAddProductForm" novalidate>
        <div class="row g-4">

          <!-- ===== LEFT COLUMN: MAIN FORM ===== -->
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
                <!-- Dynamic Product Name -->
                <input type="text" class="tn-admin-input" id="tnAdminProductName" name="product_name" placeholder="e.g. MacBook Pro 14-inch" required />
                <span class="tn-admin-form-hint">Enter a clear, descriptive product name.</span>
                <span class="tn-admin-form-error" id="tnAdminProductNameError"></span>
              </div>

              <!-- Slug -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminProductSlug">
                  Slug <span class="tn-admin-required">*</span>
                </label>
                <div class="tn-admin-input-group">
                  <span class="tn-admin-input-prefix"><i class="bi bi-link-45deg"></i></span>
                  <!-- Dynamic Product Slug -->
                  <input type="text" class="tn-admin-input tn-admin-input-with-prefix" id="tnAdminProductSlug" name="slug" placeholder="macbook-pro-14-inch" required />
                </div>
                <span class="tn-admin-form-hint">Auto-generated from product name. Used in URLs.</span>
                <span class="tn-admin-form-error" id="tnAdminProductSlugError"></span>
              </div>

              <!-- SKU -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminProductSKU">
                  SKU <span class="tn-admin-required">*</span>
                </label>
                <div class="tn-admin-input-group">
                  <span class="tn-admin-input-prefix"><i class="bi bi-upc-scan"></i></span>
                  <!-- Dynamic SKU -->
                  <input type="text" class="tn-admin-input tn-admin-input-with-prefix" id="tnAdminProductSKU" name="sku" placeholder="e.g. MBP-14-001" required />
                </div>
                <span class="tn-admin-form-hint">Stock Keeping Unit â€” unique identifier for this product.</span>
                <span class="tn-admin-form-error" id="tnAdminProductSKUError"></span>
              </div>

              <!-- Category & Brand Row -->
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminProductCategory">
                      Category <span class="tn-admin-required">*</span>
                    </label>
                    <!-- Dynamic Category List â€” populated from categories table -->
                    <select class="tn-admin-select" id="tnAdminProductCategory" name="category" required>
                      <option value="">Select Category</option>
                      <option value="laptops">Laptops</option>
                      <option value="smartphones">Smartphones</option>
                      <option value="audio">Audio</option>
                      <option value="wearables">Wearables</option>
                      <option value="gaming">Gaming</option>
                      <option value="accessories">Accessories</option>
                      <option value="desktops">Desktops</option>
                      <option value="monitors">Monitors</option>
                      <option value="networking">Networking</option>
                      <option value="smart-home">Smart Home</option>
                    </select>
                    <span class="tn-admin-form-error" id="tnAdminProductCategoryError"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminProductBrand">
                      Brand
                    </label>
                    <!-- Dynamic Brand List â€” populated from brands table -->
                    <select class="tn-admin-select" id="tnAdminProductBrand" name="brand">
                      <option value="">Select Brand</option>
                      <option value="apple">Apple</option>
                      <option value="samsung">Samsung</option>
                      <option value="sony">Sony</option>
                      <option value="dell">Dell</option>
                      <option value="lenovo">Lenovo</option>
                      <option value="hp">HP</option>
                      <option value="logitech">Logitech</option>
                      <option value="bose">Bose</option>
                      <option value="lg">LG</option>
                      <option value="other">Other</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Product Tags -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label">Product Tags</label>
                <div class="tn-admin-tags-input" id="tnAdminTagsInput">
                  <div class="tn-admin-tags-list" id="tnAdminTagsList">
                    <!-- Dynamic Tags â€” tags added by user appear here -->
                  </div>
                  <input type="text" class="tn-admin-tags-field" id="tnAdminTagField" placeholder="Type a tag and press Enter..." />
                  <input type="hidden" name="tags" id="tnAdminTagsValue" value="" />
                </div>
                <span class="tn-admin-form-hint">Press Enter or comma to add a tag. Click x to remove.</span>
              </div>

              <!-- Short Description -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminProductShortDesc">
                  Short Description
                </label>
                <!-- Dynamic Short Description -->
                <textarea class="tn-admin-textarea" id="tnAdminProductShortDesc" name="short_description" rows="2" placeholder="Brief summary of the product (displayed in listings)"></textarea>
                <span class="tn-admin-form-hint">
                  <span id="tnAdminShortDescCount">0</span>/200 characters
                </span>
              </div>

              <!-- Full Description -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminProductFullDesc">
                  Full Description
                </label>
                <!-- Dynamic Full Description -->
                <textarea class="tn-admin-textarea tn-admin-textarea-lg" id="tnAdminProductFullDesc" name="full_description" rows="6" placeholder="Detailed product description with features and specifications"></textarea>
                <span class="tn-admin-form-hint">Supports basic formatting. This will be displayed on the product page.</span>
              </div>
            </div>

            <!-- Pricing Card -->
            <div class="tn-admin-card tn-admin-form-card">
              <div class="tn-admin-form-card-header">
                <h3><i class="bi bi-currency-dollar"></i> Pricing</h3>
                <p>Set the product pricing and discounts.</p>
              </div>

              <div class="row g-3">
                <div class="col-md-4">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminRegularPrice">
                      Regular Price <span class="tn-admin-required">*</span>
                    </label>
                    <div class="tn-admin-input-group">
                      <span class="tn-admin-input-prefix">$</span>
                      <!-- Dynamic Regular Price -->
                      <input type="number" class="tn-admin-input tn-admin-input-with-prefix" id="tnAdminRegularPrice" name="regular_price" placeholder="0.00" min="0" step="0.01" required />
                    </div>
                    <span class="tn-admin-form-error" id="tnAdminRegularPriceError"></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminSalePrice">
                      Sale Price
                    </label>
                    <div class="tn-admin-input-group">
                      <span class="tn-admin-input-prefix">$</span>
                      <!-- Dynamic Sale Price â€” leave empty if not on sale -->
                      <input type="number" class="tn-admin-input tn-admin-input-with-prefix" id="tnAdminSalePrice" name="sale_price" placeholder="0.00" min="0" step="0.01" />
                    </div>
                    <span class="tn-admin-form-hint">Leave empty if not on sale.</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminDiscountPercent">
                      Discount %
                    </label>
                    <div class="tn-admin-input-group">
                      <span class="tn-admin-input-prefix"><i class="bi bi-percent"></i></span>
                      <input type="number" class="tn-admin-input tn-admin-input-with-prefix" id="tnAdminDiscountPercent" name="discount_percent" placeholder="0" min="0" max="100" readonly />
                    </div>
                    <span class="tn-admin-form-hint">Auto-calculated from prices.</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Inventory Card -->
            <div class="tn-admin-card tn-admin-form-card">
              <div class="tn-admin-form-card-header">
                <h3><i class="bi bi-box-seam"></i> Inventory</h3>
                <p>Manage stock levels and availability.</p>
              </div>

              <div class="row g-3">
                <div class="col-md-6">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminStockQuantity">
                      Stock Quantity <span class="tn-admin-required">*</span>
                    </label>
                    <!-- Dynamic Stock Quantity -->
                    <input type="number" class="tn-admin-input" id="tnAdminStockQuantity" name="stock_quantity" placeholder="0" min="0" required />
                    <span class="tn-admin-form-error" id="tnAdminStockQuantityError"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminStockStatus">
                      Stock Status
                    </label>
                    <!-- Dynamic Stock Status -->
                    <select class="tn-admin-select" id="tnAdminStockStatus" name="stock_status">
                      <option value="in-stock">In Stock</option>
                      <option value="low-stock">Low Stock</option>
                      <option value="out-of-stock">Out of Stock</option>
                      <option value="pre-order">Pre-Order</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Low Stock Alert Threshold -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminLowStockAlert">Low Stock Alert Threshold</label>
                <input type="number" class="tn-admin-input" id="tnAdminLowStockAlert" name="low_stock_threshold" value="10" min="0" max="9999" />
                <span class="tn-admin-form-hint">Get notified when stock drops below this number.</span>
              </div>
            </div>

            <!-- Images Card -->
            <div class="tn-admin-card tn-admin-form-card">
              <div class="tn-admin-form-card-header">
                <h3><i class="bi bi-images"></i> Product Images</h3>
                <p>Upload images for this product.</p>
              </div>

              <!-- Featured Image -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label">Featured Image <span class="tn-admin-required">*</span></label>
                <div class="tn-admin-upload-zone" id="tnAdminFeaturedUpload">
                  <input type="file" class="tn-admin-upload-input" id="tnAdminFeaturedFile" accept="image/*" hidden />
                  <div class="tn-admin-upload-placeholder" id="tnAdminFeaturedPlaceholder">
                    <div class="tn-admin-upload-icon">
                      <i class="bi bi-cloud-arrow-up"></i>
                    </div>
                    <p class="tn-admin-upload-text"><strong>Click to upload</strong> or drag and drop</p>
                    <p class="tn-admin-upload-hint">SVG, PNG, JPG or WEBP (max 2MB)</p>
                  </div>
                  <div class="tn-admin-upload-preview" id="tnAdminFeaturedPreview" style="display:none;">
                    <img id="tnAdminFeaturedPreviewImg" src="" alt="Featured Preview" />
                    <button type="button" class="tn-admin-upload-remove" id="tnAdminRemoveFeatured" title="Remove image">
                      <i class="bi bi-x-lg"></i>
                    </button>
                  </div>
                </div>
              </div>

              <!-- Multiple Product Images -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label">Additional Images</label>
                <div class="tn-admin-multi-upload" id="tnAdminMultiUpload">
                  <input type="file" class="tn-admin-upload-input" id="tnAdminMultiFile" accept="image/*" multiple hidden />
                  <div class="tn-admin-multi-grid" id="tnAdminMultiGrid">
                    <!-- Dynamic Product Images â€” uploaded images appear here -->
                  </div>
                  <button type="button" class="tn-admin-multi-add-btn" id="tnAdminMultiAdd">
                    <i class="bi bi-plus-lg"></i>
                    <span>Add Images</span>
                  </button>
                </div>
                <span class="tn-admin-form-hint">You can upload up to 8 additional images. First image is used as gallery thumbnail.</span>
              </div>
            </div>

            <!-- SEO Card -->
            <div class="tn-admin-card tn-admin-form-card">
              <div class="tn-admin-form-card-header">
                <h3><i class="bi bi-search"></i> SEO Settings</h3>
                <p>Optimize this product for search engines.</p>
              </div>

              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminSEOTitle">SEO Title</label>
                <!-- Dynamic SEO Title -->
                <input type="text" class="tn-admin-input" id="tnAdminSEOTitle" name="seo_title" placeholder="e.g. Buy MacBook Pro 14-inch - Best Price" />
                <span class="tn-admin-form-hint">
                  <span id="tnAdminSEOTitleCount">0</span>/60 characters. Leave blank to use product name.
                </span>
              </div>

              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminSEOKeywords">SEO Keywords</label>
                <!-- Dynamic SEO Keywords -->
                <input type="text" class="tn-admin-input" id="tnAdminSEOKeywords" name="seo_keywords" placeholder="e.g. macbook pro, laptop, apple, 14 inch" />
                <span class="tn-admin-form-hint">Comma-separated keywords for search engines.</span>
              </div>

              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminSEODescription">SEO Description</label>
                <!-- Dynamic SEO Description -->
                <textarea class="tn-admin-textarea" id="tnAdminSEODescription" name="seo_description" rows="3" placeholder="Brief description for search engine results"></textarea>
                <span class="tn-admin-form-hint">
                  <span id="tnAdminSEODescCount">0</span>/160 characters.
                </span>
              </div>
            </div>

            <!-- Form Actions (Bottom) -->
            <div class="tn-admin-form-actions tn-admin-form-actions-bottom">
              <a href="products.php" class="btn tn-admin-btn-outline">
                <i class="bi bi-x-lg me-2"></i> Cancel
              </a>
              <div class="tn-admin-form-actions-right">
                <button type="reset" class="btn tn-admin-btn-outline" id="tnAdminFormReset">
                  <i class="bi bi-arrow-counterclockwise me-2"></i> Reset
                </button>
                <button type="button" class="btn tn-admin-btn-outline" id="tnAdminSaveAndAdd">
                  <i class="bi bi-plus-lg me-2"></i> Save &amp; Add Another
                </button>
                <button type="submit" class="btn tn-admin-btn-primary" id="tnAdminSaveProduct">
                  <i class="bi bi-check-lg me-2"></i> Save Product
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
                    <span class="tn-admin-toggle-desc">Product will be visible on the storefront.</span>
                  </div>
                  <label class="tn-admin-toggle" for="tnAdminProductStatusToggle">
                    <!-- Dynamic Product Status â€” checked if active -->
                    <input type="checkbox" id="tnAdminProductStatusToggle" name="status" checked />
                    <span class="tn-admin-toggle-track"></span>
                  </label>
                </div>
              </div>
            </div>

            <!-- Product Settings Panel -->
            <div class="tn-admin-card tn-admin-form-card">
              <div class="tn-admin-form-card-header">
                <h3><i class="bi bi-gear"></i> Product Settings</h3>
              </div>

              <!-- Featured Toggle -->
              <div class="tn-admin-form-group">
                <div class="tn-admin-toggle-row">
                  <div class="tn-admin-toggle-info">
                    <span class="tn-admin-toggle-label">Featured Product</span>
                    <span class="tn-admin-toggle-desc">Show on homepage and featured sections.</span>
                  </div>
                  <label class="tn-admin-toggle" for="tnAdminFeaturedProductToggle">
                    <input type="checkbox" id="tnAdminFeaturedProductToggle" name="featured" />
                    <span class="tn-admin-toggle-track"></span>
                  </label>
                </div>
              </div>

              <!-- Display Order -->
              <div class="tn-admin-form-group tn-admin-form-group-no-mb">
                <label class="tn-admin-label" for="tnAdminProductDisplayOrder">Display Order</label>
                <input type="number" class="tn-admin-input" id="tnAdminProductDisplayOrder" name="display_order" value="0" min="0" max="9999" />
                <span class="tn-admin-form-hint">Lower numbers appear first.</span>
              </div>
            </div>

          </div>

        </div>
      </form>

    </main>

    <?php include 'includes/footer.php'; ?>
