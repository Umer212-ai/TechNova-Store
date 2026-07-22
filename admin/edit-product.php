<?php
// admin/edit-product.php - TechNova Store Admin Edit Product
// Backend integration will be added later.
// include '../includes/config.php';
// include '../includes/db.php';
// include 'includes/auth.php';
// $productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
// $product = /* fetch product by $productId */;

$pageTitle = 'Edit Product';
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
          <li class="active">Edit Product</li>
        </ol>
      </nav>

      <!-- ========== PAGE HEADER ========== -->
      <div class="tn-admin-page-header">
        <div class="tn-admin-page-header-left">
          <h1 class="tn-admin-page-title">
            <!-- Dynamic Product Name — e.g. <?php echo htmlspecialchars($product['name'] ?? ''); ?> -->
            MacBook Pro 14-inch M4
          </h1>
          <p class="tn-admin-page-sub">Edit product details, pricing, inventory, and SEO settings.</p>
        </div>
        <div class="tn-admin-page-header-actions">
          <a href="products.php" class="btn tn-admin-btn-outline">
            <i class="bi bi-arrow-left me-2"></i> Back to Products
          </a>
        </div>
      </div>

      <!-- Dynamic Success Message — shown after successful update -->
      <!--
      <div class="tn-admin-alert tn-admin-alert-success" id="tnAdminEditProductSuccess">
        <i class="bi bi-check-circle"></i>
        <span>Product updated successfully!</span>
        <button type="button" class="tn-admin-alert-close" onclick="this.parentElement.remove()"><i class="bi bi-x-lg"></i></button>
      </div>
      -->

      <!-- ========== EDIT PRODUCT FORM ========== -->
      <form class="tn-admin-form" id="tnAdminEditProductForm" novalidate>
        <!-- Dynamic Product ID — hidden input for backend -->
        <input type="hidden" name="product_id" value="1" />

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
                <label class="tn-admin-label" for="tnAdminEditProductName">
                  Product Name <span class="tn-admin-required">*</span>
                </label>
                <!-- Dynamic Product Name — value from DB -->
                <input type="text" class="tn-admin-input" id="tnAdminEditProductName" name="product_name" value="MacBook Pro 14-inch M4" required />
                <span class="tn-admin-form-hint">Enter a clear, descriptive product name.</span>
                <span class="tn-admin-form-error" id="tnAdminEditProductNameError"></span>
              </div>

              <!-- Slug -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminEditProductSlug">
                  Slug <span class="tn-admin-required">*</span>
                </label>
                <div class="tn-admin-input-group">
                  <span class="tn-admin-input-prefix"><i class="bi bi-link-45deg"></i></span>
                  <!-- Dynamic Product Slug — value from DB -->
                  <input type="text" class="tn-admin-input tn-admin-input-with-prefix" id="tnAdminEditProductSlug" name="slug" value="macbook-pro-14-inch-m4" required />
                </div>
                <span class="tn-admin-form-hint">Auto-generated from product name. Used in URLs.</span>
                <span class="tn-admin-form-error" id="tnAdminEditProductSlugError"></span>
              </div>

              <!-- SKU -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminEditProductSKU">
                  SKU <span class="tn-admin-required">*</span>
                </label>
                <div class="tn-admin-input-group">
                  <span class="tn-admin-input-prefix"><i class="bi bi-upc-scan"></i></span>
                  <!-- Dynamic SKU — value from DB -->
                  <input type="text" class="tn-admin-input tn-admin-input-with-prefix" id="tnAdminEditProductSKU" name="sku" value="MBP-14-M4-001" required />
                </div>
                <span class="tn-admin-form-hint">Stock Keeping Unit — unique identifier for this product.</span>
                <span class="tn-admin-form-error" id="tnAdminEditProductSKUError"></span>
              </div>

              <!-- Category & Brand Row -->
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminEditProductCategory">
                      Category <span class="tn-admin-required">*</span>
                    </label>
                    <!-- Dynamic Category — selected option from DB -->
                    <select class="tn-admin-select" id="tnAdminEditProductCategory" name="category" required>
                      <option value="">Select Category</option>
                      <option value="laptops" selected>Laptops</option>
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
                    <span class="tn-admin-form-error" id="tnAdminEditProductCategoryError"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminEditProductBrand">
                      Brand
                    </label>
                    <!-- Dynamic Brand — selected option from DB -->
                    <select class="tn-admin-select" id="tnAdminEditProductBrand" name="brand">
                      <option value="">Select Brand</option>
                      <option value="apple" selected>Apple</option>
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
                <div class="tn-admin-tags-input" id="tnAdminEditTagsInput">
                  <div class="tn-admin-tags-list" id="tnAdminEditTagsList">
                    <!-- Dynamic Tags — existing tags loaded from DB -->
                    <span class="tn-admin-tag">laptop<button type="button" class="tn-admin-tag-remove" data-index="0">&times;</button></span>
                    <span class="tn-admin-tag">apple<button type="button" class="tn-admin-tag-remove" data-index="1">&times;</button></span>
                    <span class="tn-admin-tag">macbook<button type="button" class="tn-admin-tag-remove" data-index="2">&times;</button></span>
                    <span class="tn-admin-tag">pro<button type="button" class="tn-admin-tag-remove" data-index="3">&times;</button></span>
                    <span class="tn-admin-tag">m4<button type="button" class="tn-admin-tag-remove" data-index="4">&times;</button></span>
                  </div>
                  <input type="text" class="tn-admin-tags-field" id="tnAdminEditTagField" placeholder="Type a tag and press Enter..." />
                  <input type="hidden" name="tags" id="tnAdminEditTagsValue" value="laptop,apple,macbook,pro,m4" />
                </div>
                <span class="tn-admin-form-hint">Press Enter or comma to add a tag. Click x to remove.</span>
              </div>

              <!-- Short Description -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminEditProductShortDesc">
                  Short Description
                </label>
                <!-- Dynamic Short Description — value from DB -->
                <textarea class="tn-admin-textarea" id="tnAdminEditProductShortDesc" name="short_description" rows="2">The most advanced MacBook Pro ever with the M4 chip, stunning Liquid Retina XDR display, and all-day battery life.</textarea>
                <span class="tn-admin-form-hint">
                  <span id="tnAdminEditShortDescCount">103</span>/200 characters
                </span>
              </div>

              <!-- Full Description -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminEditProductFullDesc">
                  Full Description
                </label>
                <!-- Dynamic Full Description — value from DB -->
                <textarea class="tn-admin-textarea tn-admin-textarea-lg" id="tnAdminEditProductFullDesc" name="full_description" rows="6">The MacBook Pro 14-inch with M4 chip delivers exceptional performance for demanding professional workflows. Features a stunning Liquid Retina XDR display with ProMotion technology, up to 24GB unified memory, and up to 22 hours of battery life. Built with Apple silicon for industry-leading power efficiency. Includes three Thunderbolt 5 ports, HDMI port, SDXC card slot, and MagSafe charging. Perfect for developers, designers, and creative professionals who need uncompromising performance in a portable form factor.</textarea>
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
                    <label class="tn-admin-label" for="tnAdminEditRegularPrice">
                      Regular Price <span class="tn-admin-required">*</span>
                    </label>
                    <div class="tn-admin-input-group">
                      <span class="tn-admin-input-prefix">$</span>
                      <!-- Dynamic Regular Price — value from DB -->
                      <input type="number" class="tn-admin-input tn-admin-input-with-prefix" id="tnAdminEditRegularPrice" name="regular_price" value="1999.00" min="0" step="0.01" required />
                    </div>
                    <span class="tn-admin-form-error" id="tnAdminEditRegularPriceError"></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminEditSalePrice">
                      Sale Price
                    </label>
                    <div class="tn-admin-input-group">
                      <span class="tn-admin-input-prefix">$</span>
                      <!-- Dynamic Sale Price — value from DB; empty if not on sale -->
                      <input type="number" class="tn-admin-input tn-admin-input-with-prefix" id="tnAdminEditSalePrice" name="sale_price" value="1849.00" min="0" step="0.01" />
                    </div>
                    <span class="tn-admin-form-hint">Leave empty if not on sale.</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminEditDiscountPercent">
                      Discount %
                    </label>
                    <div class="tn-admin-input-group">
                      <span class="tn-admin-input-prefix"><i class="bi bi-percent"></i></span>
                      <input type="number" class="tn-admin-input tn-admin-input-with-prefix" id="tnAdminEditDiscountPercent" name="discount_percent" placeholder="0" min="0" max="100" readonly />
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
                    <label class="tn-admin-label" for="tnAdminEditStockQuantity">
                      Stock Quantity <span class="tn-admin-required">*</span>
                    </label>
                    <!-- Dynamic Stock Quantity — value from DB -->
                    <input type="number" class="tn-admin-input" id="tnAdminEditStockQuantity" name="stock_quantity" value="47" min="0" required />
                    <span class="tn-admin-form-error" id="tnAdminEditStockQuantityError"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminEditStockStatus">
                      Stock Status
                    </label>
                    <!-- Dynamic Stock Status — selected option from DB -->
                    <select class="tn-admin-select" id="tnAdminEditStockStatus" name="stock_status">
                      <option value="in-stock" selected>In Stock</option>
                      <option value="low-stock">Low Stock</option>
                      <option value="out-of-stock">Out of Stock</option>
                      <option value="pre-order">Pre-Order</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Low Stock Alert Threshold -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminEditLowStockAlert">Low Stock Alert Threshold</label>
                <!-- Dynamic Low Stock Threshold — value from DB -->
                <input type="number" class="tn-admin-input" id="tnAdminEditLowStockAlert" name="low_stock_threshold" value="10" min="0" max="9999" />
                <span class="tn-admin-form-hint">Get notified when stock drops below this number.</span>
              </div>
            </div>

            <!-- Images Card -->
            <div class="tn-admin-card tn-admin-form-card">
              <div class="tn-admin-form-card-header">
                <h3><i class="bi bi-images"></i> Product Images</h3>
                <p>Manage images for this product.</p>
              </div>

              <!-- Featured Image — Existing Preview (shown when product has an image) -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label">Featured Image <span class="tn-admin-required">*</span></label>

                <!-- Existing Image Preview -->
                <div class="tn-admin-edit-image-wrap" id="tnAdminEditFeaturedWrap">
                  <div class="tn-admin-edit-image-box">
                    <!-- Dynamic Featured Image — src from DB -->
                    <img id="tnAdminEditFeaturedPreviewImg" src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=600&q=80" alt="MacBook Pro 14-inch M4" />
                  </div>
                  <div class="tn-admin-edit-image-actions">
                    <button type="button" class="btn tn-admin-btn-outline tn-admin-btn-sm" id="tnAdminEditChangeFeatured">
                      <i class="bi bi-pencil-square me-2"></i> Change Image
                    </button>
                    <button type="button" class="btn tn-admin-btn-outline tn-admin-btn-sm tn-admin-btn-danger-outline" id="tnAdminEditRemoveFeatured">
                      <i class="bi bi-trash3 me-2"></i> Remove
                    </button>
                  </div>
                  <span class="tn-admin-form-hint">Recommended: 800x800px. Max file size: 2MB.</span>
                </div>

                <!-- Upload Zone (hidden by default, shown when changing image) -->
                <div class="tn-admin-upload-zone" id="tnAdminEditFeaturedUpload" style="display:none;">
                  <input type="file" class="tn-admin-upload-input" id="tnAdminEditFeaturedFile" accept="image/*" hidden />
                  <div class="tn-admin-upload-placeholder" id="tnAdminEditFeaturedPlaceholder">
                    <div class="tn-admin-upload-icon">
                      <i class="bi bi-cloud-arrow-up"></i>
                    </div>
                    <p class="tn-admin-upload-text"><strong>Click to upload</strong> or drag and drop</p>
                    <p class="tn-admin-upload-hint">SVG, PNG, JPG or WEBP (max 2MB)</p>
                  </div>
                  <div class="tn-admin-upload-preview" id="tnAdminEditFeaturedUploadPreview" style="display:none;">
                    <img id="tnAdminEditFeaturedUploadImg" src="" alt="Preview" />
                    <button type="button" class="tn-admin-upload-remove" id="tnAdminEditFeaturedRemoveNew" title="Remove image">
                      <i class="bi bi-x-lg"></i>
                    </button>
                  </div>
                </div>
              </div>

              <!-- Multiple Product Images — Gallery Preview -->
              <div class="tn-admin-form-group">
                <label class="tn-admin-label">Product Gallery</label>
                <div class="tn-admin-multi-upload" id="tnAdminEditMultiUpload">
                  <input type="file" class="tn-admin-upload-input" id="tnAdminEditMultiFile" accept="image/*" multiple hidden />
                  <div class="tn-admin-multi-grid" id="tnAdminEditMultiGrid">
                    <!-- Dynamic Gallery Images — existing images loaded from DB -->
                    <div class="tn-admin-multi-item">
                      <img src="https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?auto=format&fit=crop&w=300&q=80" alt="Gallery 1" />
                      <div class="tn-admin-multi-item-overlay">
                        <button type="button" class="tn-admin-multi-item-remove" data-index="0"><i class="bi bi-trash"></i></button>
                      </div>
                      <span class="tn-admin-multi-item-badge">Main</span>
                    </div>
                    <div class="tn-admin-multi-item">
                      <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=300&q=80" alt="Gallery 2" />
                      <div class="tn-admin-multi-item-overlay">
                        <button type="button" class="tn-admin-multi-item-remove" data-index="1"><i class="bi bi-trash"></i></button>
                      </div>
                    </div>
                    <div class="tn-admin-multi-item">
                      <img src="https://images.unsplash.com/photo-1541807084-5c52b6b3adef?auto=format&fit=crop&w=300&q=80" alt="Gallery 3" />
                      <div class="tn-admin-multi-item-overlay">
                        <button type="button" class="tn-admin-multi-item-remove" data-index="2"><i class="bi bi-trash"></i></button>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="tn-admin-multi-add-btn" id="tnAdminEditMultiAdd">
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
                <label class="tn-admin-label" for="tnAdminEditSEOTitle">SEO Title</label>
                <!-- Dynamic SEO Title — value from DB -->
                <input type="text" class="tn-admin-input" id="tnAdminEditSEOTitle" name="seo_title" value="Buy MacBook Pro 14-inch M4 - Best Price | TechNova" />
                <span class="tn-admin-form-hint">
                  <span id="tnAdminEditSEOTitleCount">51</span>/60 characters. Leave blank to use product name.
                </span>
              </div>

              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminEditSEOKeywords">SEO Keywords</label>
                <!-- Dynamic SEO Keywords — value from DB -->
                <input type="text" class="tn-admin-input" id="tnAdminEditSEOKeywords" name="seo_keywords" value="macbook pro, macbook pro 14 inch, apple laptop, m4 chip, macbook m4, professional laptop" />
                <span class="tn-admin-form-hint">Comma-separated keywords for search engines.</span>
              </div>

              <div class="tn-admin-form-group">
                <label class="tn-admin-label" for="tnAdminEditSEODescription">SEO Description</label>
                <!-- Dynamic SEO Description — value from DB -->
                <textarea class="tn-admin-textarea" id="tnAdminEditSEODescription" name="seo_description" rows="3">Buy the MacBook Pro 14-inch M4 at TechNova. Experience unmatched performance with Apple M4 chip, Liquid Retina XDR display, and all-day battery life.</textarea>
                <span class="tn-admin-form-hint">
                  <span id="tnAdminEditSEODescCount">156</span>/160 characters.
                </span>
              </div>
            </div>

            <!-- Form Actions (Bottom) -->
            <div class="tn-admin-form-actions tn-admin-form-actions-bottom">
              <a href="products.php" class="btn tn-admin-btn-outline">
                <i class="bi bi-x-lg me-2"></i> Cancel
              </a>
              <div class="tn-admin-form-actions-right">
                <button type="reset" class="btn tn-admin-btn-outline" id="tnAdminEditFormReset">
                  <i class="bi bi-arrow-counterclockwise me-2"></i> Reset
                </button>
                <button type="submit" class="btn tn-admin-btn-primary" id="tnAdminUpdateProduct">
                  <i class="bi bi-check-lg me-2"></i> Update Product
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
                  <label class="tn-admin-toggle" for="tnAdminEditProductStatusToggle">
                    <!-- Dynamic Product Status — checked if active -->
                    <input type="checkbox" id="tnAdminEditProductStatusToggle" name="status" checked />
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
                  <label class="tn-admin-toggle" for="tnAdminEditFeaturedProductToggle">
                    <!-- Dynamic Featured Status — checked if featured -->
                    <input type="checkbox" id="tnAdminEditFeaturedProductToggle" name="featured" checked />
                    <span class="tn-admin-toggle-track"></span>
                  </label>
                </div>
              </div>

              <!-- Display Order -->
              <div class="tn-admin-form-group tn-admin-form-group-no-mb">
                <label class="tn-admin-label" for="tnAdminEditProductDisplayOrder">Display Order</label>
                <!-- Dynamic Display Order — value from DB -->
                <input type="number" class="tn-admin-input" id="tnAdminEditProductDisplayOrder" name="display_order" value="1" min="0" max="9999" />
                <span class="tn-admin-form-hint">Lower numbers appear first.</span>
              </div>
            </div>

            <!-- Product Info Panel -->
            <div class="tn-admin-card tn-admin-form-card">
              <div class="tn-admin-form-card-header">
                <h3><i class="bi bi-clock-history"></i> Product Info</h3>
              </div>
              <div class="tn-admin-meta-list">
                <div class="tn-admin-meta-item">
                  <span class="tn-admin-meta-label">Product ID</span>
                  <span class="tn-admin-meta-value">
                    <!-- Dynamic Product ID — from DB -->
                    #1001
                  </span>
                </div>
                <div class="tn-admin-meta-item">
                  <span class="tn-admin-meta-label">Orders</span>
                  <span class="tn-admin-meta-value">
                    <!-- Dynamic Order Count — from DB -->
                    342
                  </span>
                </div>
                <div class="tn-admin-meta-item">
                  <span class="tn-admin-meta-label">Views</span>
                  <span class="tn-admin-meta-value">
                    <!-- Dynamic View Count — from DB -->
                    12,847
                  </span>
                </div>
                <div class="tn-admin-meta-item">
                  <span class="tn-admin-meta-label">Created</span>
                  <span class="tn-admin-meta-value">
                    <!-- Dynamic Created Date — from DB -->
                    Jan 10, 2026
                  </span>
                </div>
                <div class="tn-admin-meta-item">
                  <span class="tn-admin-meta-label">Last Updated</span>
                  <span class="tn-admin-meta-value">
                    <!-- Dynamic Updated Date — from DB -->
                    Jul 21, 2026
                  </span>
                </div>
              </div>
            </div>

          </div>

        </div>
      </form>

    </main>

    <?php include 'includes/footer.php'; ?>
