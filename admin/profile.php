<?php
// admin/profile.php - TechNova Store Admin Profile
// Backend integration will be added later.
// include '../includes/config.php';
// include '../includes/db.php';
// include 'includes/auth.php';

$pageTitle = 'My Profile';
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
          <li class="active">My Profile</li>
        </ol>
      </nav>

      <!-- ========== PROFILE HEADER ========== -->
      <div class="tn-admin-card tn-admin-form-card tn-admin-profile-header-card">
        <div class="tn-admin-profile-header">
          <div class="tn-admin-profile-avatar-wrap">
            <div class="tn-admin-profile-avatar-lg">AD</div>
            <button type="button" class="tn-admin-profile-avatar-edit" id="tnAdminChangeAvatarBtn" title="Change photo">
              <i class="bi bi-camera"></i>
            </button>
          </div>
          <div class="tn-admin-profile-header-info">
            <h1>Alex Donovan</h1>
            <span class="tn-admin-badge tn-admin-badge-primary">Administrator</span>
            <p class="tn-admin-profile-header-meta">
              <span><i class="bi bi-envelope"></i> alex.donovan@technovastore.com</span>
              <span><i class="bi bi-calendar"></i> Joined Jan 15, 2024</span>
              <span><i class="bi bi-clock"></i> Last login: Jul 21, 2026 at 9:42 AM</span>
            </p>
          </div>
          <div class="tn-admin-profile-header-actions">
            <button type="button" class="btn tn-admin-btn-outline" id="tnAdminProfileExportBtn">
              <i class="bi bi-download me-2"></i> Export Data
            </button>
          </div>
        </div>
      </div>

      <!-- ========== PROFILE CONTENT ========== -->
      <div class="row g-4">

        <!-- Left Column: Forms -->
        <div class="col-lg-8">

          <!-- Personal Information -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-person"></i> Personal Information</h3>
            </div>
            <form id="tnAdminProfileForm">
              <div class="tn-admin-form-card-body">
                <div class="tn-admin-form-row">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminProfileFirstName">First Name <span class="tn-admin-required">*</span></label>
                    <input type="text" class="tn-admin-input" id="tnAdminProfileFirstName" value="Alex" />
                  </div>
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminProfileLastName">Last Name <span class="tn-admin-required">*</span></label>
                    <input type="text" class="tn-admin-input" id="tnAdminProfileLastName" value="Donovan" />
                  </div>
                </div>
                <div class="tn-admin-form-row">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminProfileEmail">Email Address <span class="tn-admin-required">*</span></label>
                    <input type="email" class="tn-admin-input" id="tnAdminProfileEmail" value="alex.donovan@technovastore.com" />
                  </div>
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminProfilePhone">Phone Number</label>
                    <input type="tel" class="tn-admin-input" id="tnAdminProfilePhone" value="+1 (555) 100-2000" />
                  </div>
                </div>
                <div class="tn-admin-form-group">
                  <label class="tn-admin-label" for="tnAdminProfileBio">Bio</label>
                  <textarea class="tn-admin-textarea" id="tnAdminProfileBio" rows="3">Tech-savvy administrator with a passion for e-commerce and user experience. Managing TechNova Store operations since 2024.</textarea>
                  <div class="tn-admin-form-hint">Brief description for your profile. Max 200 characters.</div>
                </div>
              </div>
              <div class="tn-admin-form-actions">
                <button type="reset" class="btn tn-admin-btn-outline">
                  <i class="bi bi-arrow-counterclockwise me-2"></i> Reset
                </button>
                <button type="button" class="btn tn-admin-btn-primary" id="tnAdminProfileSaveBtn">
                  <i class="bi bi-check-lg me-2"></i> Save Changes
                </button>
              </div>
            </form>
          </div>

          <!-- Change Password -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-key"></i> Change Password</h3>
            </div>
            <form id="tnAdminPasswordForm">
              <div class="tn-admin-form-card-body">
                <div class="tn-admin-form-group">
                  <label class="tn-admin-label" for="tnAdminProfileCurrentPass">Current Password</label>
                  <input type="password" class="tn-admin-input" id="tnAdminProfileCurrentPass" placeholder="Enter current password" />
                </div>
                <div class="tn-admin-form-row">
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminProfileNewPass">New Password</label>
                    <input type="password" class="tn-admin-input" id="tnAdminProfileNewPass" placeholder="Enter new password" />
                    <div class="tn-admin-form-hint">Minimum 8 characters with letters, numbers, and symbols.</div>
                  </div>
                  <div class="tn-admin-form-group">
                    <label class="tn-admin-label" for="tnAdminProfileConfirmPass">Confirm New Password</label>
                    <input type="password" class="tn-admin-input" id="tnAdminProfileConfirmPass" placeholder="Confirm new password" />
                  </div>
                </div>
              </div>
              <div class="tn-admin-form-actions">
                <button type="reset" class="btn tn-admin-btn-outline">
                  <i class="bi bi-arrow-counterclockwise me-2"></i> Reset
                </button>
                <button type="button" class="btn tn-admin-btn-primary" id="tnAdminPasswordSaveBtn">
                  <i class="bi bi-check-lg me-2"></i> Update Password
                </button>
              </div>
            </form>
          </div>

          <!-- Notification Preferences -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-bell"></i> Notification Preferences</h3>
            </div>
            <div class="tn-admin-form-card-body">
              <div class="tn-admin-settings-toggle-row">
                <div class="tn-admin-settings-toggle-info">
                  <strong>Email Notifications</strong>
                  <span>Receive order and activity updates via email.</span>
                </div>
                <div class="tn-admin-toggle-row">
                  <input type="checkbox" id="tnAdminProfileEmailNotif" class="tn-admin-toggle-input" checked />
                  <label for="tnAdminProfileEmailNotif" class="tn-admin-toggle-track"></label>
                </div>
              </div>
              <div class="tn-admin-settings-toggle-row">
                <div class="tn-admin-settings-toggle-info">
                  <strong>Browser Notifications</strong>
                  <span>Show desktop notifications in your browser.</span>
                </div>
                <div class="tn-admin-toggle-row">
                  <input type="checkbox" id="tnAdminProfileBrowserNotif" class="tn-admin-toggle-input" checked />
                  <label for="tnAdminProfileBrowserNotif" class="tn-admin-toggle-track"></label>
                </div>
              </div>
              <div class="tn-admin-settings-toggle-row">
                <div class="tn-admin-settings-toggle-info">
                  <strong>Weekly Reports</strong>
                  <span>Receive a weekly summary of store performance.</span>
                </div>
                <div class="tn-admin-toggle-row">
                  <input type="checkbox" id="tnAdminProfileWeeklyReport" class="tn-admin-toggle-input" />
                  <label for="tnAdminProfileWeeklyReport" class="tn-admin-toggle-track"></label>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- Right Column: Info Panels -->
        <div class="col-lg-4">

          <!-- Account Status -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-shield-check"></i> Account Status</h3>
            </div>
            <div class="tn-admin-order-customer-meta">
              <div class="tn-admin-order-customer-meta-item">
                <span>Role</span>
                <span>Administrator</span>
              </div>
              <div class="tn-admin-order-customer-meta-item">
                <span>Status</span>
                <span><span class="tn-admin-badge tn-admin-badge-success">Active</span></span>
              </div>
              <div class="tn-admin-order-customer-meta-item">
                <span>Two-Factor</span>
                <span><span class="tn-admin-badge tn-admin-badge-warning">Disabled</span></span>
              </div>
              <div class="tn-admin-order-customer-meta-item">
                <span>Last Password Change</span>
                <span>Jun 15, 2026</span>
              </div>
            </div>
          </div>

          <!-- Activity Summary -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-activity"></i> Activity Summary</h3>
            </div>
            <div class="tn-admin-order-customer-meta">
              <div class="tn-admin-order-customer-meta-item">
                <span>Total Logins</span>
                <span>1,247</span>
              </div>
              <div class="tn-admin-order-customer-meta-item">
                <span>Products Added</span>
                <span>156</span>
              </div>
              <div class="tn-admin-order-customer-meta-item">
                <span>Orders Processed</span>
                <span>892</span>
              </div>
              <div class="tn-admin-order-customer-meta-item">
                <span>Reviews Moderated</span>
                <span>64</span>
              </div>
            </div>
          </div>

          <!-- Recent Activity -->
          <div class="tn-admin-card tn-admin-form-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-clock-history"></i> Recent Activity</h3>
            </div>
            <div class="tn-admin-activity-list">
              <div class="tn-admin-activity-item">
                <div class="tn-admin-activity-dot tn-admin-activity-dot-primary"></div>
                <div class="tn-admin-activity-content">
                  <span>Updated product <strong>MacBook Pro 14-inch</strong></span>
                  <small>2 hours ago</small>
                </div>
              </div>
              <div class="tn-admin-activity-item">
                <div class="tn-admin-activity-dot tn-admin-activity-dot-accent"></div>
                <div class="tn-admin-activity-content">
                  <span>Processed order <strong>#TN-2847</strong></span>
                  <small>5 hours ago</small>
                </div>
              </div>
              <div class="tn-admin-activity-item">
                <div class="tn-admin-activity-dot tn-admin-activity-dot-purple"></div>
                <div class="tn-admin-activity-content">
                  <span>Added new category <strong>Wearables</strong></span>
                  <small>Yesterday</small>
                </div>
              </div>
              <div class="tn-admin-activity-item">
                <div class="tn-admin-activity-dot tn-admin-activity-dot-primary"></div>
                <div class="tn-admin-activity-content">
                  <span>Updated store settings</span>
                  <small>2 days ago</small>
                </div>
              </div>
              <div class="tn-admin-activity-item">
                <div class="tn-admin-activity-dot tn-admin-activity-dot-danger"></div>
                <div class="tn-admin-activity-content">
                  <span>Deleted product <strong>Old Case Model</strong></span>
                  <small>3 days ago</small>
                </div>
              </div>
            </div>
          </div>

          <!-- Danger Zone -->
          <div class="tn-admin-card tn-admin-form-card tn-admin-danger-card">
            <div class="tn-admin-form-card-header">
              <h3><i class="bi bi-exclamation-triangle"></i> Danger Zone</h3>
            </div>
            <div class="tn-admin-form-card-body">
              <p class="tn-admin-danger-text">Once you delete your account, there is no going back. Please be certain.</p>
              <button type="button" class="btn tn-admin-btn-danger tn-admin-btn-sm" id="tnAdminProfileDeleteBtn">
                <i class="bi bi-trash3 me-2"></i> Delete Account
              </button>
            </div>
          </div>

        </div>

      </div>

    </main>

    <?php include 'includes/footer.php'; ?>
