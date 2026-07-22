<?php
// admin/settings.php - TechNova Store Admin Settings
// Backend integration will be added later.
// include '../includes/config.php';
// include '../includes/db.php';
// include 'includes/auth.php';

$pageTitle = 'Settings';
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
          <li class="active">Settings</li>
        </ol>
      </nav>

      <!-- ========== PAGE HEADER ========== -->
      <div class="tn-admin-page-header">
        <div class="tn-admin-page-header-left">
          <h1 class="tn-admin-page-title">Settings</h1>
          <p class="tn-admin-page-sub">Configure your store settings and preferences.</p>
        </div>
      </div>

      <!-- ========== SETTINGS LAYOUT ========== -->
      <div class="row g-4">

        <!-- Settings Tabs Sidebar -->
        <div class="col-lg-3">
          <div class="tn-admin-card tn-admin-settings-nav-card">
            <nav class="tn-admin-settings-tabs" aria-label="Settings tabs">
              <button class="tn-admin-settings-tab active" data-tab="general">
                <i class="bi bi-gear"></i> General
              </button>
              <button class="tn-admin-settings-tab" data-tab="shipping">
                <i class="bi bi-truck"></i> Shipping
              </button>
              <button class="tn-admin-settings-tab" data-tab="payment">
                <i class="bi bi-credit-card"></i> Payment
              </button>
              <button class="tn-admin-settings-tab" data-tab="security">
                <i class="bi bi-shield-lock"></i> Security
              </button>
              <button class="tn-admin-settings-tab" data-tab="notifications">
                <i class="bi bi-bell"></i> Notifications
              </button>
            </nav>
          </div>
        </div>

        <!-- Settings Content -->
        <div class="col-lg-9">

          <!-- ========== GENERAL TAB ========== -->
          <div class="tn-admin-settings-panel active" id="tnAdminSettingsGeneral">
            <form id="tnAdminSettingsGeneralForm">

              <!-- Store Information -->
              <div class="tn-admin-card tn-admin-form-card">
                <div class="tn-admin-form-card-header">
                  <h3><i class="bi bi-shop"></i> Store Information</h3>
                </div>
                <div class="tn-admin-form-card-body">
                  <div class="tn-admin-form-row">
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminStoreName">Store Name <span class="tn-admin-required">*</span></label>
                      <input type="text" class="tn-admin-input" id="tnAdminStoreName" value="TechNova Store" />
                      <div class="tn-admin-form-error" id="tnAdminStoreNameError"></div>
                    </div>
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminStoreTagline">Tagline</label>
                      <input type="text" class="tn-admin-input" id="tnAdminStoreTagline" value="Premium Tech for Modern Life" />
                    </div>
                  </div>
                  <div class="tn-admin-form-row">
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminStoreEmail">Contact Email <span class="tn-admin-required">*</span></label>
                      <input type="email" class="tn-admin-input" id="tnAdminStoreEmail" value="info@technovastore.com" />
                      <div class="tn-admin-form-error" id="tnAdminStoreEmailError"></div>
                    </div>
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminStorePhone">Phone Number</label>
                      <input type="tel" class="tn-admin-input" id="tnAdminStorePhone" value="+1 (555) 987-6543" />
                    </div>
                  </div>
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminStoreDescription">Store Description</label>
                    <textarea class="tn-admin-textarea tn-admin-textarea-lg" id="tnAdminStoreDescription" rows="3">TechNova Store offers premium technology products including laptops, smartphones, audio gear, wearables, gaming accessories, and more. We provide fast shipping, excellent customer service, and competitive pricing.</textarea>
                    <div class="tn-admin-form-hint">A brief description of your store for SEO and branding purposes.</div>
                  </div>
                </div>
              </div>

              <!-- Store Address -->
              <div class="tn-admin-card tn-admin-form-card">
                <div class="tn-admin-form-card-header">
                  <h3><i class="bi bi-geo-alt"></i> Store Address</h3>
                </div>
                <div class="tn-admin-form-card-body">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminStoreAddress1">Address Line 1</label>
                    <input type="text" class="tn-admin-input" id="tnAdminStoreAddress1" value="123 Tech Boulevard" />
                  </div>
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminStoreAddress2">Address Line 2</label>
                    <input type="text" class="tn-admin-input" id="tnAdminStoreAddress2" value="Suite 400" />
                  </div>
                  <div class="tn-admin-form-row">
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminStoreCity">City</label>
                      <input type="text" class="tn-admin-input" id="tnAdminStoreCity" value="San Francisco" />
                    </div>
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminStoreState">State / Province</label>
                      <input type="text" class="tn-admin-input" id="tnAdminStoreState" value="CA" />
                    </div>
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminStoreZip">ZIP / Postal Code</label>
                      <input type="text" class="tn-admin-input" id="tnAdminStoreZip" value="94105" />
                    </div>
                  </div>
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminStoreCountry">Country</label>
                    <select class="tn-admin-select" id="tnAdminStoreCountry">
                      <option value="US" selected>United States</option>
                      <option value="CA">Canada</option>
                      <option value="UK">United Kingdom</option>
                      <option value="AU">Australia</option>
                      <option value="DE">Germany</option>
                      <option value="FR">France</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Store Logo & Currency -->
              <div class="tn-admin-card tn-admin-form-card">
                <div class="tn-admin-form-card-header">
                  <h3><i class="bi bi-image"></i> Branding & Currency</h3>
                </div>
                <div class="tn-admin-form-card-body">
                  <div class="tn-admin-form-row">
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label">Store Logo</label>
                      <div class="tn-admin-settings-logo">
                        <div class="tn-admin-settings-logo-preview">
                          <i class="bi bi-lightning-charge-fill"></i>
                          <span>TechNova</span>
                        </div>
                        <button type="button" class="btn tn-admin-btn-outline tn-admin-btn-sm" id="tnAdminChangeLogoBtn">
                          <i class="bi bi-upload me-1"></i> Change Logo
                        </button>
                      </div>
                    </div>
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminStoreCurrency">Currency</label>
                      <select class="tn-admin-select" id="tnAdminStoreCurrency">
                        <option value="USD" selected>USD — US Dollar</option>
                        <option value="EUR">EUR — Euro</option>
                        <option value="GBP">GBP — British Pound</option>
                        <option value="CAD">CAD — Canadian Dollar</option>
                        <option value="AUD">AUD — Australian Dollar</option>
                        <option value="JPY">JPY — Japanese Yen</option>
                      </select>
                      <div class="tn-admin-form-hint">Currency used for all product prices.</div>
                    </div>
                  </div>
                  <div class="tn-admin-form-row">
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminStoreTimezone">Timezone</label>
                      <select class="tn-admin-select" id="tnAdminStoreTimezone">
                        <option value="America/Los_Angeles" selected>Pacific Time (US & Canada)</option>
                        <option value="America/New_York">Eastern Time (US & Canada)</option>
                        <option value="America/Chicago">Central Time (US & Canada)</option>
                        <option value="Europe/London">London (GMT)</option>
                        <option value="Europe/Berlin">Berlin (CET)</option>
                        <option value="Asia/Tokyo">Tokyo (JST)</option>
                      </select>
                    </div>
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminStoreDateFormat">Date Format</label>
                      <select class="tn-admin-select" id="tnAdminStoreDateFormat">
                        <option value="M d, Y" selected>Jul 21, 2026</option>
                        <option value="d/m/Y">21/07/2026</option>
                        <option value="Y-m-d">2026-07-21</option>
                        <option value="d-M-Y">21-Jul-2026</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Save Button -->
              <div class="tn-admin-form-actions">
                <button type="reset" class="btn tn-admin-btn-outline">
                  <i class="bi bi-arrow-counterclockwise me-2"></i> Reset
                </button>
                <button type="button" class="btn tn-admin-btn-primary" id="tnAdminSettingsGeneralSave">
                  <i class="bi bi-check-lg me-2"></i> Save Changes
                </button>
              </div>

            </form>
          </div>

          <!-- ========== SHIPPING TAB ========== -->
          <div class="tn-admin-settings-panel" id="tnAdminSettingsShipping" style="display:none;">
            <form id="tnAdminSettingsShippingForm">

              <div class="tn-admin-card tn-admin-form-card">
                <div class="tn-admin-form-card-header">
                  <h3><i class="bi bi-truck"></i> Shipping Methods</h3>
                </div>
                <div class="tn-admin-form-card-body">

                  <!-- Free Shipping -->
                  <div class="tn-admin-settings-toggle-row">
                    <div class="tn-admin-settings-toggle-info">
                      <strong>Free Shipping</strong>
                      <span>Offer free shipping on orders above a minimum amount.</span>
                    </div>
                    <div class="tn-admin-toggle-row">
                      <input type="checkbox" id="tnAdminShippingFree" class="tn-admin-toggle-input" checked />
                      <label for="tnAdminShippingFree" class="tn-admin-toggle-track"></label>
                    </div>
                  </div>
                  <div class="tn-admin-settings-sub-options" id="tnAdminShippingFreeOptions">
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminFreeShippingMin">Minimum Order Amount</label>
                      <div class="tn-admin-input-group">
                        <span class="tn-admin-input-group-text">$</span>
                        <input type="number" class="tn-admin-input" id="tnAdminFreeShippingMin" value="75.00" min="0" step="0.01" />
                      </div>
                    </div>
                  </div>

                  <hr class="tn-admin-divider" />

                  <!-- Standard Shipping -->
                  <div class="tn-admin-settings-toggle-row">
                    <div class="tn-admin-settings-toggle-info">
                      <strong>Standard Shipping</strong>
                      <span>Flat-rate standard shipping (5-7 business days).</span>
                    </div>
                    <div class="tn-admin-toggle-row">
                      <input type="checkbox" id="tnAdminShippingStandard" class="tn-admin-toggle-input" checked />
                      <label for="tnAdminShippingStandard" class="tn-admin-toggle-track"></label>
                    </div>
                  </div>
                  <div class="tn-admin-settings-sub-options" id="tnAdminShippingStandardOptions">
                    <div class="tn-admin-form-row">
                      <div class="tn-admin-form-group">
                        <label class="tn-admin-label" for="tnAdminStandardRate">Shipping Rate</label>
                        <div class="tn-admin-input-group">
                          <span class="tn-admin-input-group-text">$</span>
                          <input type="number" class="tn-admin-input" id="tnAdminStandardRate" value="5.99" min="0" step="0.01" />
                        </div>
                      </div>
                      <div class="tn-admin-form-group">
                        <label class="tn-admin-label" for="tnAdminStandardDays">Estimated Days</label>
                        <input type="text" class="tn-admin-input" id="tnAdminStandardDays" value="5-7" />
                      </div>
                    </div>
                  </div>

                  <hr class="tn-admin-divider" />

                  <!-- Express Shipping -->
                  <div class="tn-admin-settings-toggle-row">
                    <div class="tn-admin-settings-toggle-info">
                      <strong>Express Shipping</strong>
                      <span>Fast express shipping (2-3 business days).</span>
                    </div>
                    <div class="tn-admin-toggle-row">
                      <input type="checkbox" id="tnAdminShippingExpress" class="tn-admin-toggle-input" checked />
                      <label for="tnAdminShippingExpress" class="tn-admin-toggle-track"></label>
                    </div>
                  </div>
                  <div class="tn-admin-settings-sub-options" id="tnAdminShippingExpressOptions">
                    <div class="tn-admin-form-row">
                      <div class="tn-admin-form-group">
                        <label class="tn-admin-label" for="tnAdminExpressRate">Shipping Rate</label>
                        <div class="tn-admin-input-group">
                          <span class="tn-admin-input-group-text">$</span>
                          <input type="number" class="tn-admin-input" id="tnAdminExpressRate" value="12.99" min="0" step="0.01" />
                        </div>
                      </div>
                      <div class="tn-admin-form-group">
                        <label class="tn-admin-label" for="tnAdminExpressDays">Estimated Days</label>
                        <input type="text" class="tn-admin-input" id="tnAdminExpressDays" value="2-3" />
                      </div>
                    </div>
                  </div>

                  <hr class="tn-admin-divider" />

                  <!-- Overnight Shipping -->
                  <div class="tn-admin-settings-toggle-row">
                    <div class="tn-admin-settings-toggle-info">
                      <strong>Overnight Shipping</strong>
                      <span>Next-day delivery for urgent orders.</span>
                    </div>
                    <div class="tn-admin-toggle-row">
                      <input type="checkbox" id="tnAdminShippingOvernight" class="tn-admin-toggle-input" />
                      <label for="tnAdminShippingOvernight" class="tn-admin-toggle-track"></label>
                    </div>
                  </div>
                  <div class="tn-admin-settings-sub-options" id="tnAdminShippingOvernightOptions" style="display:none;">
                    <div class="tn-admin-form-row">
                      <div class="tn-admin-form-group">
                        <label class="tn-admin-label" for="tnAdminOvernightRate">Shipping Rate</label>
                        <div class="tn-admin-input-group">
                          <span class="tn-admin-input-group-text">$</span>
                          <input type="number" class="tn-admin-input" id="tnAdminOvernightRate" value="24.99" min="0" step="0.01" />
                        </div>
                      </div>
                      <div class="tn-admin-form-group">
                        <label class="tn-admin-label" for="tnAdminOvernightDays">Estimated Days</label>
                        <input type="text" class="tn-admin-input" id="tnAdminOvernightDays" value="1" />
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="tn-admin-form-actions">
                <button type="reset" class="btn tn-admin-btn-outline">
                  <i class="bi bi-arrow-counterclockwise me-2"></i> Reset
                </button>
                <button type="button" class="btn tn-admin-btn-primary" id="tnAdminSettingsShippingSave">
                  <i class="bi bi-check-lg me-2"></i> Save Changes
                </button>
              </div>

            </form>
          </div>

          <!-- ========== PAYMENT TAB ========== -->
          <div class="tn-admin-settings-panel" id="tnAdminSettingsPayment" style="display:none;">
            <form id="tnAdminSettingsPaymentForm">

              <div class="tn-admin-card tn-admin-form-card">
                <div class="tn-admin-form-card-header">
                  <h3><i class="bi bi-credit-card"></i> Payment Gateways</h3>
                </div>
                <div class="tn-admin-form-card-body">

                  <!-- PayPal -->
                  <div class="tn-admin-settings-toggle-row">
                    <div class="tn-admin-settings-toggle-info">
                      <strong><i class="bi bi-paypal"></i> PayPal</strong>
                      <span>Accept payments via PayPal.</span>
                    </div>
                    <div class="tn-admin-toggle-row">
                      <input type="checkbox" id="tnAdminPaymentPaypal" class="tn-admin-toggle-input" checked />
                      <label for="tnAdminPaymentPaypal" class="tn-admin-toggle-track"></label>
                    </div>
                  </div>
                  <div class="tn-admin-settings-sub-options" id="tnAdminPaymentPaypalOptions">
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminPaypalEmail">PayPal Email</label>
                      <input type="email" class="tn-admin-input" id="tnAdminPaypalEmail" value="payments@technovastore.com" />
                    </div>
                  </div>

                  <hr class="tn-admin-divider" />

                  <!-- Stripe -->
                  <div class="tn-admin-settings-toggle-row">
                    <div class="tn-admin-settings-toggle-info">
                      <strong><i class="bi bi-stripe"></i> Stripe</strong>
                      <span>Accept credit/debit cards via Stripe.</span>
                    </div>
                    <div class="tn-admin-toggle-row">
                      <input type="checkbox" id="tnAdminPaymentStripe" class="tn-admin-toggle-input" checked />
                      <label for="tnAdminPaymentStripe" class="tn-admin-toggle-track"></label>
                    </div>
                  </div>
                  <div class="tn-admin-settings-sub-options" id="tnAdminPaymentStripeOptions">
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminStripePublishable">Publishable Key</label>
                      <input type="text" class="tn-admin-input tn-admin-font-mono" id="tnAdminStripePublishable" value="pk_test_••••••••••••••••" />
                    </div>
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminStripeSecret">Secret Key</label>
                      <input type="password" class="tn-admin-input tn-admin-font-mono" id="tnAdminStripeSecret" value="sk_test_••••••••••••••••" />
                    </div>
                  </div>

                  <hr class="tn-admin-divider" />

                  <!-- Bank Transfer -->
                  <div class="tn-admin-settings-toggle-row">
                    <div class="tn-admin-settings-toggle-info">
                      <strong><i class="bi bi-bank"></i> Bank Transfer</strong>
                      <span>Accept direct bank transfers.</span>
                    </div>
                    <div class="tn-admin-toggle-row">
                      <input type="checkbox" id="tnAdminPaymentBank" class="tn-admin-toggle-input" />
                      <label for="tnAdminPaymentBank" class="tn-admin-toggle-track"></label>
                    </div>
                  </div>
                  <div class="tn-admin-settings-sub-options" id="tnAdminPaymentBankOptions" style="display:none;">
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminBankInstructions">Payment Instructions</label>
                      <textarea class="tn-admin-textarea" id="tnAdminBankInstructions" rows="3">Please transfer the total amount to: Bank: First National, Account: 1234567890, Routing: 021000021. Include your order number in the reference.</textarea>
                    </div>
                  </div>

                </div>
              </div>

              <div class="tn-admin-form-actions">
                <button type="reset" class="btn tn-admin-btn-outline">
                  <i class="bi bi-arrow-counterclockwise me-2"></i> Reset
                </button>
                <button type="button" class="btn tn-admin-btn-primary" id="tnAdminSettingsPaymentSave">
                  <i class="bi bi-check-lg me-2"></i> Save Changes
                </button>
              </div>

            </form>
          </div>

          <!-- ========== SECURITY TAB ========== -->
          <div class="tn-admin-settings-panel" id="tnAdminSettingsSecurity" style="display:none;">
            <form id="tnAdminSettingsSecurityForm">

              <div class="tn-admin-card tn-admin-form-card">
                <div class="tn-admin-form-card-header">
                  <h3><i class="bi bi-key"></i> Password</h3>
                </div>
                <div class="tn-admin-form-card-body">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminCurrentPassword">Current Password</label>
                    <input type="password" class="tn-admin-input" id="tnAdminCurrentPassword" placeholder="Enter current password" />
                  </div>
                  <div class="tn-admin-form-row">
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminNewPassword">New Password</label>
                      <input type="password" class="tn-admin-input" id="tnAdminNewPassword" placeholder="Enter new password" />
                      <div class="tn-admin-form-hint">Minimum 8 characters with letters, numbers, and symbols.</div>
                    </div>
                    <div class="tn-admin-form-group">
                      <label class="tn-admin-label" for="tnAdminConfirmPassword">Confirm Password</label>
                      <input type="password" class="tn-admin-input" id="tnAdminConfirmPassword" placeholder="Confirm new password" />
                    </div>
                  </div>
                </div>
              </div>

              <div class="tn-admin-card tn-admin-form-card">
                <div class="tn-admin-form-card-header">
                  <h3><i class="bi bi-shield-check"></i> Two-Factor Authentication</h3>
                </div>
                <div class="tn-admin-form-card-body">
                  <div class="tn-admin-settings-toggle-row">
                    <div class="tn-admin-settings-toggle-info">
                      <strong>Enable Two-Factor Authentication</strong>
                      <span>Add an extra layer of security to your admin account.</span>
                    </div>
                    <div class="tn-admin-toggle-row">
                      <input type="checkbox" id="tnAdmin2FA" class="tn-admin-toggle-input" />
                      <label for="tnAdmin2FA" class="tn-admin-toggle-track"></label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tn-admin-card tn-admin-form-card">
                <div class="tn-admin-form-card-header">
                  <h3><i class="bi bi-clock-history"></i> Session Settings</h3>
                </div>
                <div class="tn-admin-form-card-body">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminSessionTimeout">Session Timeout (minutes)</label>
                    <input type="number" class="tn-admin-input" id="tnAdminSessionTimeout" value="30" min="5" max="1440" />
                    <div class="tn-admin-form-hint">Admin sessions will expire after this period of inactivity.</div>
                  </div>
                  <div class="tn-admin-settings-toggle-row">
                    <div class="tn-admin-settings-toggle-info">
                      <strong>Require Password for Sensitive Actions</strong>
                      <span>Prompt for password when deleting products or processing refunds.</span>
                    </div>
                    <div class="tn-admin-toggle-row">
                      <input type="checkbox" id="tnAdminRequirePassword" class="tn-admin-toggle-input" checked />
                      <label for="tnAdminRequirePassword" class="tn-admin-toggle-track"></label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tn-admin-form-actions">
                <button type="reset" class="btn tn-admin-btn-outline">
                  <i class="bi bi-arrow-counterclockwise me-2"></i> Reset
                </button>
                <button type="button" class="btn tn-admin-btn-primary" id="tnAdminSettingsSecuritySave">
                  <i class="bi bi-check-lg me-2"></i> Save Changes
                </button>
              </div>

            </form>
          </div>

          <!-- ========== NOTIFICATIONS TAB ========== -->
          <div class="tn-admin-settings-panel" id="tnAdminSettingsNotifications" style="display:none;">
            <form id="tnAdminSettingsNotificationsForm">

              <div class="tn-admin-card tn-admin-form-card">
                <div class="tn-admin-form-card-header">
                  <h3><i class="bi bi-envelope"></i> Email Notifications</h3>
                </div>
                <div class="tn-admin-form-card-body">
                  <div class="tn-admin-settings-toggle-row">
                    <div class="tn-admin-settings-toggle-info">
                      <strong>New Order Notification</strong>
                      <span>Receive an email when a new order is placed.</span>
                    </div>
                    <div class="tn-admin-toggle-row">
                      <input type="checkbox" id="tnAdminNotifNewOrder" class="tn-admin-toggle-input" checked />
                      <label for="tnAdminNotifNewOrder" class="tn-admin-toggle-track"></label>
                    </div>
                  </div>
                  <div class="tn-admin-settings-toggle-row">
                    <div class="tn-admin-settings-toggle-info">
                      <strong>Low Stock Alert</strong>
                      <span>Receive an email when a product falls below the low stock threshold.</span>
                    </div>
                    <div class="tn-admin-toggle-row">
                      <input type="checkbox" id="tnAdminNotifLowStock" class="tn-admin-toggle-input" checked />
                      <label for="tnAdminNotifLowStock" class="tn-admin-toggle-track"></label>
                    </div>
                  </div>
                  <div class="tn-admin-settings-toggle-row">
                    <div class="tn-admin-settings-toggle-info">
                      <strong>Customer Registration</strong>
                      <span>Receive an email when a new customer creates an account.</span>
                    </div>
                    <div class="tn-admin-toggle-row">
                      <input type="checkbox" id="tnAdminNotifRegistration" class="tn-admin-toggle-input" />
                      <label for="tnAdminNotifRegistration" class="tn-admin-toggle-track"></label>
                    </div>
                  </div>
                  <div class="tn-admin-settings-toggle-row">
                    <div class="tn-admin-settings-toggle-info">
                      <strong>Product Review</strong>
                      <span>Receive an email when a customer leaves a product review.</span>
                    </div>
                    <div class="tn-admin-toggle-row">
                      <input type="checkbox" id="tnAdminNotifReview" class="tn-admin-toggle-input" checked />
                      <label for="tnAdminNotifReview" class="tn-admin-toggle-track"></label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tn-admin-card tn-admin-form-card">
                <div class="tn-admin-form-card-header">
                  <h3><i class="bi bi-bell"></i> Admin Notifications</h3>
                </div>
                <div class="tn-admin-form-card-body">
                  <div class="tn-admin-settings-toggle-row">
                    <div class="tn-admin-settings-toggle-info">
                      <strong>Browser Notifications</strong>
                      <span>Show desktop notifications for important events.</span>
                    </div>
                    <div class="tn-admin-toggle-row">
                      <input type="checkbox" id="tnAdminNotifBrowser" class="tn-admin-toggle-input" checked />
                      <label for="tnAdminNotifBrowser" class="tn-admin-toggle-track"></label>
                    </div>
                  </div>
                  <div class="tn-admin-settings-toggle-row">
                    <div class="tn-admin-settings-toggle-info">
                      <strong>Sound Alerts</strong>
                      <span>Play a sound when a notification arrives.</span>
                    </div>
                    <div class="tn-admin-toggle-row">
                      <input type="checkbox" id="tnAdminNotifSound" class="tn-admin-toggle-input" />
                      <label for="tnAdminNotifSound" class="tn-admin-toggle-track"></label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tn-admin-form-actions">
                <button type="reset" class="btn tn-admin-btn-outline">
                  <i class="bi bi-arrow-counterclockwise me-2"></i> Reset
                </button>
                <button type="button" class="btn tn-admin-btn-primary" id="tnAdminSettingsNotifSave">
                  <i class="bi bi-check-lg me-2"></i> Save Changes
                </button>
              </div>

            </form>
          </div>

        </div>
      </div>

    </main>

    <?php include 'includes/footer.php'; ?>
