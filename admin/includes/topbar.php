  <!-- ========== TOPBAR ========== -->
  <header class="tn-admin-topbar" id="tnAdminTopbar">
    <div class="tn-admin-topbar-left">
      <button class="tn-admin-sidebar-toggle d-lg-none" id="tnAdminSidebarToggle" aria-label="Toggle sidebar">
        <i class="bi bi-list"></i>
      </button>
      <div class="tn-admin-search">
        <i class="bi bi-search"></i>
        <input type="text" class="tn-admin-search-input" id="tnAdminSearchInput" placeholder="Search products, orders, customers..." aria-label="Search" />
      </div>
    </div>

    <div class="tn-admin-topbar-right">
      <!-- Notifications -->
      <div class="tn-admin-notif-wrap">
        <button class="tn-admin-topbar-btn" id="tnAdminNotifToggle" aria-label="Notifications">
          <i class="bi bi-bell"></i>
          <span class="tn-admin-notif-dot"></span>
        </button>
        <!-- Dynamic Notifications Panel -->
        <div class="tn-admin-notif-panel" id="tnAdminNotifPanel">
          <div class="tn-admin-notif-header">
            <h6>Notifications</h6>
            <button class="tn-admin-notif-mark-read" id="tnAdminNotifMarkRead">Mark all read</button>
          </div>
          <div class="tn-admin-notif-list">
            <div class="tn-admin-notif-item tn-admin-notif-unread">
              <div class="tn-admin-notif-icon tn-admin-notif-icon-order">
                <i class="bi bi-cart-check"></i>
              </div>
              <div class="tn-admin-notif-content">
                <p><strong>New order #TN-2847</strong> placed by Sarah Chen for $1,299.00</p>
                <span>2 minutes ago</span>
              </div>
            </div>
            <div class="tn-admin-notif-item tn-admin-notif-unread">
              <div class="tn-admin-notif-icon tn-admin-notif-icon-stock">
                <i class="bi bi-exclamation-triangle"></i>
              </div>
              <div class="tn-admin-notif-content">
                <p><strong>Low stock alert:</strong> Wireless Earbuds Pro — 3 units remaining</p>
                <span>15 minutes ago</span>
              </div>
            </div>
            <div class="tn-admin-notif-item">
              <div class="tn-admin-notif-icon tn-admin-notif-icon-customer">
                <i class="bi bi-person-plus"></i>
              </div>
              <div class="tn-admin-notif-content">
                <p><strong>New customer registered:</strong> James Wilson</p>
                <span>1 hour ago</span>
              </div>
            </div>
            <div class="tn-admin-notif-item">
              <div class="tn-admin-notif-icon tn-admin-notif-icon-review">
                <i class="bi bi-star-fill"></i>
              </div>
              <div class="tn-admin-notif-content">
                <p><strong>New 5-star review</strong> on MacBook Air M3 by Emily Park</p>
                <span>3 hours ago</span>
              </div>
            </div>
          </div>
          <div class="tn-admin-notif-footer">
            <a href="orders.php">View all notifications</a>
          </div>
        </div>
      </div>

      <!-- Screen mode -->
      <button class="tn-admin-topbar-btn d-none d-md-inline-flex" id="tnAdminFullscreen" aria-label="Fullscreen">
        <i class="bi bi-fullscreen"></i>
      </button>

      <!-- Admin Profile -->
      <div class="tn-admin-profile-wrap">
        <button class="tn-admin-profile" id="tnAdminProfileToggle">
          <div class="tn-admin-profile-avatar">
            <i class="bi bi-person-fill"></i>
          </div>
          <div class="tn-admin-profile-info d-none d-md-block">
            <span class="tn-admin-profile-name">Admin User</span>
            <span class="tn-admin-profile-role">Super Administrator</span>
          </div>
          <i class="bi bi-chevron-down d-none d-md-inline"></i>
        </button>

        <!-- Dynamic Profile Dropdown -->
        <div class="tn-admin-profile-dropdown" id="tnAdminProfileDropdown">
          <div class="tn-admin-profile-dropdown-header">
            <div class="tn-admin-profile-dropdown-avatar">
              <i class="bi bi-person-fill"></i>
            </div>
            <div>
              <strong>Admin User</strong>
              <span>admin@technova.com</span>
            </div>
          </div>
          <hr class="tn-admin-dropdown-divider" />
            <a href="profile.php" class="tn-admin-dropdown-item">
              <i class="bi bi-person"></i> My Profile
            </a>
            <a href="settings.php" class="tn-admin-dropdown-item">
              <i class="bi bi-gear"></i> Account Settings
            </a>
            <a href="#" class="tn-admin-dropdown-item">
              <i class="bi bi-clock-history"></i> Activity Log
            </a>
            <hr class="tn-admin-dropdown-divider" />
            <a href="logout.php" class="tn-admin-dropdown-item tn-admin-dropdown-logout">
              <i class="bi bi-box-arrow-right"></i> Sign Out
            </a>
        </div>
      </div>
    </div>
  </header>
