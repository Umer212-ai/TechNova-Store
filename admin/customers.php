<?php
// admin/customers.php - TechNova Store Admin Customers Management
// Backend integration will be added later.
// include '../includes/config.php';
// include '../includes/db.php';
// include 'includes/auth.php';

$pageTitle = 'Customers';
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
          <li class="active">Customers</li>
        </ol>
      </nav>

      <!-- ========== PAGE HEADER ========== -->
      <div class="tn-admin-page-header">
        <div class="tn-admin-page-header-left">
          <h1 class="tn-admin-page-title">Customers</h1>
          <p class="tn-admin-page-sub">Manage your customer accounts and view purchase history.</p>
        </div>
        <div class="tn-admin-page-header-actions">
          <button type="button" class="btn tn-admin-btn-outline" id="tnAdminCustomersExportBtn">
            <i class="bi bi-download me-2"></i> Export
          </button>
        </div>
      </div>

      <!-- ========== SUMMARY STATS ========== -->
      <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
          <div class="tn-admin-mini-stat">
            <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-primary">
              <i class="bi bi-people"></i>
            </div>
            <div class="tn-admin-mini-stat-info">
              <span class="tn-admin-mini-stat-value">15,842</span>
              <span class="tn-admin-mini-stat-label">Total Customers</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="tn-admin-mini-stat">
            <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-accent">
              <i class="bi bi-person-check"></i>
            </div>
            <div class="tn-admin-mini-stat-info">
              <span class="tn-admin-mini-stat-value">14,210</span>
              <span class="tn-admin-mini-stat-label">Active</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="tn-admin-mini-stat">
            <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-purple">
              <i class="bi bi-person-plus"></i>
            </div>
            <div class="tn-admin-mini-stat-info">
              <span class="tn-admin-mini-stat-value">342</span>
              <span class="tn-admin-mini-stat-label">New This Month</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="tn-admin-mini-stat">
            <div class="tn-admin-mini-stat-icon tn-admin-mini-stat-danger">
              <i class="bi bi-gem"></i>
            </div>
            <div class="tn-admin-mini-stat-info">
              <span class="tn-admin-mini-stat-value">1,256</span>
              <span class="tn-admin-mini-stat-label">VIP Customers</span>
            </div>
          </div>
        </div>
      </div>

      <!-- ========== CUSTOMERS TABLE ========== -->
      <div class="tn-admin-card tn-admin-form-card" id="tnAdminCustomersCard">

        <!-- Toolbar -->
        <div class="tn-admin-toolbar">
          <div class="tn-admin-toolbar-left">
            <div class="tn-admin-search tn-admin-search-sm">
              <i class="bi bi-search"></i>
              <input type="text" class="tn-admin-search-input" id="tnAdminCustomerSearch" placeholder="Search customers..." aria-label="Search customers" />
            </div>
            <div class="tn-admin-filter-group">
              <select class="tn-admin-select" id="tnAdminCustomerStatusFilter" aria-label="Filter by status">
                <option value="all">All Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="vip">VIP</option>
              </select>
            </div>
          </div>
          <div class="tn-admin-toolbar-right">
            <div class="tn-admin-filter-group">
              <select class="tn-admin-select" id="tnAdminCustomerSortFilter" aria-label="Sort customers">
                <option value="newest">Newest First</option>
                <option value="oldest">Oldest First</option>
                <option value="name-asc">Name A-Z</option>
                <option value="name-desc">Name Z-A</option>
                <option value="spent-desc">Spent High to Low</option>
                <option value="spent-asc">Spent Low to High</option>
                <option value="orders-desc">Most Orders</option>
              </select>
            </div>
            <span class="tn-admin-toolbar-count">Showing <strong>1-10</strong> of <strong>15,842</strong> customers</span>
          </div>
        </div>

        <!-- Customers Table -->
        <div class="tn-admin-table-wrap">
          <table class="tn-admin-table tn-admin-table-customers" id="tnAdminCustomersTable">
            <thead>
              <tr>
                <th class="tn-admin-th-check">
                  <label class="tn-admin-checkbox">
                    <input type="checkbox" id="tnAdminCustomerSelectAll" />
                    <span class="tn-admin-checkbox-mark"></span>
                  </label>
                </th>
                <th>Customer</th>
                <th>Phone</th>
                <th>Orders</th>
                <th>Total Spent</th>
                <th>Last Order</th>
                <th>Status</th>
                <th>Joined</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Dynamic Customers List -->
              <tr data-status="active" data-joined="2025-01-15" data-spent="4289" data-orders="12">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">SC</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Sarah Chen</strong>
                      <span>sarah.chen@email.com</span>
                    </div>
                  </div>
                </td>
                <td>+1 (555) 123-4567</td>
                <td><span class="tn-admin-customer-orders">12</span></td>
                <td><span class="tn-admin-order-amount">$4,289.00</span></td>
                <td>Jul 21, 2026</td>
                <td><span class="tn-admin-badge tn-admin-badge-success">Active</span></td>
                <td>Jan 15, 2025</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Orders"><i class="bi bi-eye"></i></a>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="customer"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="vip" data-joined="2024-06-22" data-spent="8750" data-orders="24">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">JW</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>James Wilson</strong>
                      <span>james.wilson@email.com</span>
                    </div>
                  </div>
                </td>
                <td>+1 (555) 234-5678</td>
                <td><span class="tn-admin-customer-orders">24</span></td>
                <td><span class="tn-admin-order-amount">$8,750.00</span></td>
                <td>Jul 20, 2026</td>
                <td><span class="tn-admin-badge tn-admin-badge-purple">VIP</span></td>
                <td>Jun 22, 2024</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Orders"><i class="bi bi-eye"></i></a>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="customer"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="active" data-joined="2025-03-10" data-spent="2158" data-orders="5">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">EM</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Emily Martinez</strong>
                      <span>emily.martinez@email.com</span>
                    </div>
                  </div>
                </td>
                <td>+1 (555) 345-6789</td>
                <td><span class="tn-admin-customer-orders">5</span></td>
                <td><span class="tn-admin-order-amount">$2,158.00</span></td>
                <td>Jul 20, 2026</td>
                <td><span class="tn-admin-badge tn-admin-badge-success">Active</span></td>
                <td>Mar 10, 2025</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Orders"><i class="bi bi-eye"></i></a>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="customer"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="active" data-joined="2025-05-18" data-spent="1599" data-orders="3">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">LP</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Lisa Patel</strong>
                      <span>lisa.patel@email.com</span>
                    </div>
                  </div>
                </td>
                <td>+1 (555) 456-7890</td>
                <td><span class="tn-admin-customer-orders">3</span></td>
                <td><span class="tn-admin-order-amount">$1,599.00</span></td>
                <td>Jul 19, 2026</td>
                <td><span class="tn-admin-badge tn-admin-badge-success">Active</span></td>
                <td>May 18, 2025</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Orders"><i class="bi bi-eye"></i></a>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="customer"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="vip" data-joined="2024-02-08" data-spent="12450" data-orders="31">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">DK</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>David Kim</strong>
                      <span>david.kim@email.com</span>
                    </div>
                  </div>
                </td>
                <td>+1 (555) 567-8901</td>
                <td><span class="tn-admin-customer-orders">31</span></td>
                <td><span class="tn-admin-order-amount">$12,450.00</span></td>
                <td>Jul 18, 2026</td>
                <td><span class="tn-admin-badge tn-admin-badge-purple">VIP</span></td>
                <td>Feb 8, 2024</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Orders"><i class="bi bi-eye"></i></a>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="customer"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="active" data-joined="2025-08-03" data-spent="899" data-orders="2">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">MB</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Maria Brown</strong>
                      <span>maria.b@email.com</span>
                    </div>
                  </div>
                </td>
                <td>+1 (555) 678-9012</td>
                <td><span class="tn-admin-customer-orders">2</span></td>
                <td><span class="tn-admin-order-amount">$899.00</span></td>
                <td>Jul 15, 2026</td>
                <td><span class="tn-admin-badge tn-admin-badge-success">Active</span></td>
                <td>Aug 3, 2025</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Orders"><i class="bi bi-eye"></i></a>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="customer"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="inactive" data-joined="2025-09-14" data-spent="349" data-orders="1">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">CW</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Chris Walker</strong>
                      <span>chris.w@email.com</span>
                    </div>
                  </div>
                </td>
                <td>+1 (555) 789-0123</td>
                <td><span class="tn-admin-customer-orders">1</span></td>
                <td><span class="tn-admin-order-amount">$349.00</span></td>
                <td>Jul 14, 2026</td>
                <td><span class="tn-admin-badge tn-admin-badge-warning">Inactive</span></td>
                <td>Sep 14, 2025</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Orders"><i class="bi bi-eye"></i></a>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="customer"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="active" data-joined="2025-11-01" data-spent="2890" data-orders="7">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">NS</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Nina Schmidt</strong>
                      <span>nina.s@email.com</span>
                    </div>
                  </div>
                </td>
                <td>+1 (555) 890-1234</td>
                <td><span class="tn-admin-customer-orders">7</span></td>
                <td><span class="tn-admin-order-amount">$2,890.00</span></td>
                <td>Jul 13, 2026</td>
                <td><span class="tn-admin-badge tn-admin-badge-success">Active</span></td>
                <td>Nov 1, 2025</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Orders"><i class="bi bi-eye"></i></a>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="customer"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="vip" data-joined="2024-04-17" data-spent="6320" data-orders="18">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">RJ</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Robert Johnson</strong>
                      <span>robert.j@email.com</span>
                    </div>
                  </div>
                </td>
                <td>+1 (555) 901-2345</td>
                <td><span class="tn-admin-customer-orders">18</span></td>
                <td><span class="tn-admin-order-amount">$6,320.00</span></td>
                <td>Jul 12, 2026</td>
                <td><span class="tn-admin-badge tn-admin-badge-purple">VIP</span></td>
                <td>Apr 17, 2024</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Orders"><i class="bi bi-eye"></i></a>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="customer"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>

              <tr data-status="inactive" data-joined="2026-01-20" data-spent="0" data-orders="0">
                <td><label class="tn-admin-checkbox"><input type="checkbox" class="tn-admin-row-check" /><span class="tn-admin-checkbox-mark"></span></label></td>
                <td>
                  <div class="tn-admin-order-customer">
                    <div class="tn-admin-order-avatar">AT</div>
                    <div class="tn-admin-order-customer-info">
                      <strong>Amanda Torres</strong>
                      <span>amanda.t@email.com</span>
                    </div>
                  </div>
                </td>
                <td>+1 (555) 012-3456</td>
                <td><span class="tn-admin-customer-orders">0</span></td>
                <td><span class="tn-admin-order-amount">$0.00</span></td>
                <td>Never</td>
                <td><span class="tn-admin-badge tn-admin-badge-warning">Inactive</span></td>
                <td>Jan 20, 2026</td>
                <td>
                  <div class="tn-admin-table-actions">
                    <a href="order-details.php" class="tn-admin-table-btn tn-admin-table-btn-view" title="View Orders"><i class="bi bi-eye"></i></a>
                    <button class="tn-admin-table-btn" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button class="tn-admin-table-btn tn-admin-table-btn-danger" title="Delete" data-delete="customer"><i class="bi bi-trash3"></i></button>
                  </div>
                </td>
              </tr>
              <!-- End Dynamic Customers List -->
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="tn-admin-pagination-wrap">
          <div class="tn-admin-pagination-info">
            <span>Showing 1-10 of 15,842 customers</span>
          </div>
          <div class="tn-admin-pagination" id="tnAdminCustomersPagination">
            <button class="tn-admin-page-btn" disabled><i class="bi bi-chevron-left"></i></button>
            <button class="tn-admin-page-btn active">1</button>
            <button class="tn-admin-page-btn">2</button>
            <button class="tn-admin-page-btn">3</button>
            <button class="tn-admin-page-btn">4</button>
            <button class="tn-admin-page-btn">...</button>
            <button class="tn-admin-page-btn">1,585</button>
            <button class="tn-admin-page-btn"><i class="bi bi-chevron-right"></i></button>
          </div>
        </div>
      </div>

      <!-- ========== EMPTY STATE ========== -->
      <div class="tn-admin-empty-state" id="tnAdminCustomersEmptyState" style="display: none;">
        <div class="tn-admin-empty-icon">
          <i class="bi bi-people"></i>
        </div>
        <h3>No customers found</h3>
        <p>We couldn't find any customers matching your search or filters. Try adjusting your criteria.</p>
        <div class="tn-admin-empty-actions">
          <button class="btn tn-admin-btn-outline" id="tnAdminCustomersClearFilters">
            <i class="bi bi-x-lg me-2"></i> Clear Filters
          </button>
        </div>
      </div>

      <!-- ========== BULK ACTIONS BAR ========== -->
      <div class="tn-admin-bulk-bar" id="tnAdminCustomersBulkBar">
        <div class="tn-admin-bulk-bar-left">
          <span class="tn-admin-bulk-count" id="tnAdminCustomersBulkCount">0 selected</span>
        </div>
        <div class="tn-admin-bulk-bar-right">
          <button class="btn tn-admin-btn-outline tn-admin-btn-sm" id="tnAdminCustomersBulkEmail">
            <i class="bi bi-envelope me-1"></i> Send Email
          </button>
          <button class="btn tn-admin-btn-outline tn-admin-btn-sm" id="tnAdminCustomersBulkDeactivate">
            <i class="bi bi-eye-slash me-1"></i> Deactivate
          </button>
          <button class="btn tn-admin-btn-outline tn-admin-btn-sm" id="tnAdminCustomersBulkActivate">
            <i class="bi bi-check-circle me-1"></i> Activate
          </button>
          <button class="btn tn-admin-btn-outline tn-admin-btn-sm tn-admin-btn-danger-outline" id="tnAdminCustomersBulkDelete">
            <i class="bi bi-trash3 me-1"></i> Delete
          </button>
          <button class="tn-admin-btn-text" id="tnAdminCustomersBulkCancel">Cancel</button>
        </div>
      </div>

      <!-- ========== DELETE MODAL ========== -->
      <div class="tn-admin-modal-overlay" id="tnAdminCustomerDeleteModal">
        <div class="tn-admin-modal">
          <div class="tn-admin-modal-icon tn-admin-modal-icon-danger">
            <i class="bi bi-exclamation-triangle"></i>
          </div>
          <h3 class="tn-admin-modal-title">Delete Customer</h3>
          <p class="tn-admin-modal-text">Are you sure you want to delete this customer? This will permanently remove their account and all associated order history. This action cannot be undone.</p>
          <div class="tn-admin-modal-actions">
            <button class="btn tn-admin-btn-outline" id="tnAdminCustomerModalCancel">Cancel</button>
            <button class="btn tn-admin-btn-danger" id="tnAdminCustomerModalConfirm">Delete Customer</button>
          </div>
        </div>
      </div>

    </main>

    <?php include 'includes/footer.php'; ?>
