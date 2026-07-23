/**
 * TechNova Store — Admin Panel JavaScript
 * Handles sidebar toggle, notifications, profile dropdown,
 * search, fullscreen, chart filters, and UI animations.
 */
(function () {
  'use strict';

  /* ---------- DOM References ---------- */
  const $ = (sel, ctx) => (ctx || document).querySelector(sel);
  const $$ = (sel, ctx) => [...(ctx || document).querySelectorAll(sel)];

  const sidebar       = $('#tnAdminSidebar');
  const sidebarToggle = $('#tnAdminSidebarToggle');
  const sidebarClose  = $('#tnAdminSidebarClose');
  const notifToggle   = $('#tnAdminNotifToggle');
  const notifPanel    = $('#tnAdminNotifPanel');
  const notifMarkRead = $('#tnAdminNotifMarkRead');
  const profileToggle = $('#tnAdminProfileToggle');
  const profileWrap   = $('.tn-admin-profile-wrap');
  const fullscreenBtn = $('#tnAdminFullscreen');
  const searchInput   = $('#tnAdminSearchInput');
  const yearSpan      = $('#tnAdminYear');
  const chartFilters  = $$('.tn-admin-chart-filter');

  /* ---------- Overlay (created dynamically for mobile sidebar) ---------- */
  const overlay = document.createElement('div');
  overlay.className = 'tn-admin-sidebar-overlay';
  document.body.appendChild(overlay);

  /* ---------- Sidebar Toggle (Mobile) ---------- */
  function openSidebar() {
    sidebar.classList.add('open');
    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeSidebar() {
    sidebar.classList.remove('open');
    overlay.classList.remove('open');
    document.body.style.overflow = '';
  }

  if (sidebarToggle) sidebarToggle.addEventListener('click', openSidebar);
  if (sidebarClose)  sidebarClose.addEventListener('click', closeSidebar);
  overlay.addEventListener('click', closeSidebar);

  /* ---------- Notifications Panel ---------- */
  function toggleNotifications(e) {
    e.stopPropagation();
    closeProfileDropdown();
    notifPanel.classList.toggle('open');
  }

  function closeNotifications() {
    if (notifPanel) notifPanel.classList.remove('open');
  }

  if (notifToggle) notifToggle.addEventListener('click', toggleNotifications);

  if (notifMarkRead) {
    notifMarkRead.addEventListener('click', function () {
      $$('.tn-admin-notif-unread', notifPanel).forEach(function (item) {
        item.classList.remove('tn-admin-notif-unread');
      });
      var dot = $('.tn-admin-notif-dot', notifToggle);
      if (dot) dot.style.display = 'none';
    });
  }

  /* ---------- Profile Dropdown ---------- */
  function toggleProfileDropdown(e) {
    e.stopPropagation();
    closeNotifications();
    profileWrap.classList.toggle('open');
  }

  function closeProfileDropdown() {
    if (profileWrap) profileWrap.classList.remove('open');
  }

  if (profileToggle) profileToggle.addEventListener('click', toggleProfileDropdown);

  /* ---------- Close Dropdowns on Outside Click ---------- */
  document.addEventListener('click', function (e) {
    if (notifPanel && !notifPanel.contains(e.target) && notifToggle && !notifToggle.contains(e.target)) {
      closeNotifications();
    }
    if (profileWrap && !profileWrap.contains(e.target) && profileToggle && !profileToggle.contains(e.target)) {
      closeProfileDropdown();
    }
  });

  /* Prevent clicks inside panels from closing them */
  if (notifPanel)  notifPanel.addEventListener('click', function (e) { e.stopPropagation(); });
  if (profileWrap) profileWrap.addEventListener('click', function (e) { e.stopPropagation(); });

  /* ---------- Fullscreen Toggle ---------- */
  if (fullscreenBtn) {
    fullscreenBtn.addEventListener('click', function () {
      if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen().catch(function () {});
        fullscreenBtn.innerHTML = '<i class="bi bi-fullscreen-exit"></i>';
      } else {
        document.exitFullscreen().catch(function () {});
        fullscreenBtn.innerHTML = '<i class="bi bi-fullscreen"></i>';
      }
    });
  }

  /* ---------- Chart Filter Buttons ---------- */
  chartFilters.forEach(function (btn) {
    btn.addEventListener('click', function () {
      chartFilters.forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');
    });
  });

  /* ---------- Search Input Focus ---------- */
  if (searchInput) {
    searchInput.addEventListener('focus', function () {
      this.parentElement.classList.add('tn-admin-search-focused');
    });
    searchInput.addEventListener('blur', function () {
      this.parentElement.classList.remove('tn-admin-search-focused');
    });
  }

  /* ---------- Footer Year ---------- */
  if (yearSpan) {
    yearSpan.textContent = new Date().getFullYear();
  }

  /* ---------- Chart Bar Animation on Load ---------- */
  function animateChartBars() {
    $$('.tn-admin-chart-bar').forEach(function (bar, i) {
      var targetHeight = bar.style.height;
      bar.style.height = '0';
      setTimeout(function () {
        bar.style.transition = 'height 0.8s cubic-bezier(0.2, 0.7, 0.3, 1)';
        bar.style.height = targetHeight;
      }, 120 * i);
    });
  }

  /* ---------- Stagger Card Fade-in ---------- */
  function animateCards() {
    $$('.tn-admin-stat-card, .tn-admin-revenue-card, .tn-admin-card').forEach(function (card, i) {
      card.style.opacity = '0';
      card.style.transform = 'translateY(16px)';
      setTimeout(function () {
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        card.style.opacity = '1';
        card.style.transform = 'translateY(0)';
      }, 80 * i);
    });
  }

  /* ---------- Window Resize: Close Mobile Sidebar ---------- */
  var resizeTimer;
  window.addEventListener('resize', function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
      if (window.innerWidth > 991) closeSidebar();
    }, 150);
  });

  /* ---------- Keyboard Shortcuts ---------- */
  document.addEventListener('keydown', function (e) {
    /* Escape closes open panels */
    if (e.key === 'Escape') {
      closeNotifications();
      closeProfileDropdown();
      closeSidebar();
    }
    /* Ctrl/Cmd + K focuses search */
    if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
      e.preventDefault();
      if (searchInput) searchInput.focus();
    }
  });

  /* ---------- Init Animations ---------- */
  animateChartBars();
  animateCards();

  /* =========================================================
     CATEGORIES PAGE — Interactive Behaviors
     ========================================================= */

  /* ---------- Select All / Row Checkboxes ---------- */
  var selectAll    = $('#tnAdminSelectAll');
  var rowChecks    = $$('.tn-admin-row-check');
  var bulkBar      = $('#tnAdminBulkBar');
  var bulkCount    = $('#tnAdminBulkCount');
  var bulkCancel   = $('#tnAdminBulkCancel');

  function updateBulkBar() {
    var checked = $$('.tn-admin-row-check:checked');
    if (checked.length > 0) {
      bulkBar.classList.add('visible');
      bulkCount.textContent = checked.length + ' selected';
    } else {
      bulkBar.classList.remove('visible');
    }
  }

  if (selectAll) {
    selectAll.addEventListener('change', function () {
      rowChecks.forEach(function (cb) { cb.checked = selectAll.checked; });
      updateBulkBar();
    });
  }

  rowChecks.forEach(function (cb) {
    cb.addEventListener('change', function () {
      if (selectAll) selectAll.checked = rowChecks.every(function (c) { return c.checked; });
      updateBulkBar();
    });
  });

  if (bulkCancel) {
    bulkCancel.addEventListener('click', function () {
      rowChecks.forEach(function (cb) { cb.checked = false; });
      if (selectAll) selectAll.checked = false;
      updateBulkBar();
    });
  }

  /* ---------- Category Search ---------- */
  var categorySearch = $('#tnAdminCategorySearch');
  var categoriesTable = $('#tnAdminCategoriesTable');
  var emptyState = $('#tnAdminEmptyState');
  var statusFilter = $('#tnAdminStatusFilter');

  function filterCategories() {
    if (!categoriesTable) return;
    var query = (categorySearch ? categorySearch.value : '').toLowerCase();
    var statusVal = statusFilter ? statusFilter.value : 'all';
    var rows = $$('tbody tr', categoriesTable);
    var visibleCount = 0;

    rows.forEach(function (row) {
      var text = row.textContent.toLowerCase();
      var status = row.getAttribute('data-status') || '';
      var matchSearch = !query || text.indexOf(query) !== -1;
      var matchStatus = statusVal === 'all' || status === statusVal;

      if (matchSearch && matchStatus) {
        row.style.display = '';
        visibleCount++;
      } else {
        row.style.display = 'none';
      }
    });

    if (emptyState) {
      emptyState.style.display = visibleCount === 0 ? '' : 'none';
    }

    /* Update count text */
    var countEl = $('.tn-admin-toolbar-count');
    if (countEl) {
      countEl.innerHTML = 'Showing <strong>' + visibleCount + '</strong> of <strong>' + rows.length + '</strong> categories';
    }
  }

  if (categorySearch) categorySearch.addEventListener('input', filterCategories);
  if (statusFilter) statusFilter.addEventListener('change', filterCategories);

  /* Clear Filters button in empty state */
  var clearFilters = $('#tnAdminClearFilters');
  if (clearFilters) {
    clearFilters.addEventListener('click', function () {
      if (categorySearch) categorySearch.value = '';
      if (statusFilter) statusFilter.value = 'all';
      filterCategories();
    });
  }

  /* ---------- Delete Modal ---------- */
  var deleteModal = $('#tnAdminDeleteModal');
  var modalCancel = $('#tnAdminModalCancel');
  var modalConfirm = $('#tnAdminModalConfirm');
  var activeDeleteBtn = null;

  function openDeleteModal(btn) {
    activeDeleteBtn = btn;
    if (deleteModal) deleteModal.classList.add('open');
  }

  function closeDeleteModal() {
    if (deleteModal) deleteModal.classList.remove('open');
    activeDeleteBtn = null;
  }

  document.addEventListener('click', function (e) {
    var btn = e.target.closest('[data-delete]');
    if (btn) {
      e.preventDefault();
      openDeleteModal(btn);
    }
  });

  if (modalCancel) modalCancel.addEventListener('click', closeDeleteModal);
  if (deleteModal) {
    deleteModal.addEventListener('click', function (e) {
      if (e.target === deleteModal) closeDeleteModal();
    });
  }

  

  /* ---------- Pagination UI ---------- */
  var pageBtns = $$('.tn-admin-page-btn');
  pageBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      if (btn.disabled) return;
      /* If it's an arrow button, skip active toggle */
      if (btn.querySelector('i')) return;
      pageBtns.forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');
    });
  });

  /* ---------- Stagger Table Row Animation ---------- */
  function animateTableRows() {
    var rows = categoriesTable ? $$('tbody tr', categoriesTable) : [];
    rows.forEach(function (row, i) {
      row.style.opacity = '0';
      row.style.transform = 'translateY(10px)';
      setTimeout(function () {
        row.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
        row.style.opacity = '1';
        row.style.transform = 'translateY(0)';
      }, 60 * i);
    });
  }

  animateTableRows();

  /* =========================================================
     ADD CATEGORY FORM — Interactive Behaviors
     ========================================================= */

  /* ---------- Auto-generate Slug from Category Name ---------- */
  var categoryName = $('#tnAdminCategoryName');
  var categorySlug = $('#tnAdminCategorySlug');

  if (categoryName && categorySlug) {
    categoryName.addEventListener('input', function () {
      var slug = categoryName.value
        .toLowerCase()
        .trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_]+/g, '-')
        .replace(/-+/g, '-')
        .replace(/^-|-$/g, '');
      categorySlug.value = slug;
    });
  }

  /* ---------- Character Counters ---------- */
  var descField = $('#tnAdminCategoryDesc');
  var descCount = $('#tnAdminDescCharCount');
  var metaTitle = $('#tnAdminMetaTitle');
  var metaTitleCount = $('#tnAdminMetaTitleCount');
  var metaDesc = $('#tnAdminMetaDesc');
  var metaDescCount = $('#tnAdminMetaDescCount');

  function bindCharCount(field, counter, max) {
    if (!field || !counter) return;
    field.addEventListener('input', function () {
      var len = field.value.length;
      counter.textContent = len;
      if (max && len > max) {
        counter.style.color = '#ff4d6d';
        field.value = field.value.substring(0, max);
        counter.textContent = max;
      } else {
        counter.style.color = '';
      }
    });
  }

  bindCharCount(descField, descCount, 200);
  bindCharCount(metaTitle, metaTitleCount, 60);
  bindCharCount(metaDesc, metaDescCount, 160);

  /* ---------- Image Upload Zone ---------- */
  var uploadZone = $('#tnAdminImageUpload');
  var uploadInput = $('#tnAdminImageFile');
  var uploadPlaceholder = $('#tnAdminUploadPlaceholder');
  var uploadPreview = $('#tnAdminUploadPreview');
  var previewImg = $('#tnAdminPreviewImg');
  var removeImage = $('#tnAdminRemoveImage');

  if (uploadZone && uploadInput) {
    uploadZone.addEventListener('click', function (e) {
      if (e.target === removeImage || removeImage && removeImage.contains(e.target)) return;
      uploadInput.click();
    });

    uploadZone.addEventListener('dragover', function (e) {
      e.preventDefault();
      uploadZone.classList.add('drag-over');
    });

    uploadZone.addEventListener('dragleave', function () {
      uploadZone.classList.remove('drag-over');
    });

    uploadZone.addEventListener('drop', function (e) {
      e.preventDefault();
      uploadZone.classList.remove('drag-over');
      var files = e.dataTransfer.files;
      if (files.length > 0) handleImageFile(files[0]);
    });

    uploadInput.addEventListener('change', function () {
      if (uploadInput.files.length > 0) handleImageFile(uploadInput.files[0]);
    });
  }

  function handleImageFile(file) {
    if (!file.type.startsWith('image/')) return;
    if (file.size > 2 * 1024 * 1024) {
      showFormToast('Image must be under 2MB.', 'error');
      return;
    }
    var reader = new FileReader();
    reader.onload = function (e) {
      previewImg.src = e.target.result;
      uploadPlaceholder.style.display = 'none';
      uploadPreview.style.display = 'flex';
    };
    reader.readAsDataURL(file);
  }

  if (removeImage) {
    removeImage.addEventListener('click', function (e) {
      e.stopPropagation();
      uploadInput.value = '';
      previewImg.src = '';
      uploadPlaceholder.style.display = '';
      uploadPreview.style.display = 'none';
    });
  }

  /* ---------- Icon Picker ---------- */
  var iconBtns = $$('.tn-admin-icon-btn');
  var selectedIconInput = $('#tnAdminSelectedIcon');

  iconBtns.forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      iconBtns.forEach(function (b) { b.classList.remove('selected'); });
      btn.classList.add('selected');
      if (selectedIconInput) selectedIconInput.value = btn.getAttribute('data-icon');
    });
  });

  /* ---------- Form Validation ---------- */
  var addCategoryForm = $('#tnAdminAddCategoryForm');
  var nameError = $('#tnAdminCategoryNameError');
  var slugError = $('#tnAdminCategorySlugError');

  function clearValidation() {
    if (categoryName) categoryName.classList.remove('is-invalid');
    if (categorySlug) categorySlug.classList.remove('is-invalid');
    if (nameError) { nameError.textContent = ''; nameError.classList.remove('visible'); }
    if (slugError) { slugError.textContent = ''; slugError.classList.remove('visible'); }
  }

  function showFieldError(field, errorEl, message) {
    if (field) field.classList.add('is-invalid');
    if (errorEl) {
      errorEl.textContent = message;
      errorEl.classList.add('visible');
    }
  }

  function validateForm() {
    clearValidation();
    var valid = true;

    if (!categoryName || !categoryName.value.trim()) {
      showFieldError(categoryName, nameError, 'Category name is required.');
      valid = false;
    } else if (categoryName.value.trim().length < 2) {
      showFieldError(categoryName, nameError, 'Category name must be at least 2 characters.');
      valid = false;
    }

    if (!categorySlug || !categorySlug.value.trim()) {
      showFieldError(categorySlug, slugError, 'Slug is required.');
      valid = false;
    } else if (!/^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(categorySlug.value.trim())) {
      showFieldError(categorySlug, slugError, 'Slug must contain only lowercase letters, numbers, and hyphens.');
      valid = false;
    }

    return valid;
  }

  /* Live validation on blur */
  if (categoryName) {
    categoryName.addEventListener('blur', function () {
      if (!categoryName.value.trim()) {
        showFieldError(categoryName, nameError, 'Category name is required.');
      } else if (categoryName.value.trim().length < 2) {
        showFieldError(categoryName, nameError, 'Category name must be at least 2 characters.');
      } else {
        categoryName.classList.remove('is-invalid');
        nameError.textContent = '';
        nameError.classList.remove('visible');
      }
    });
  }

  if (categorySlug) {
    categorySlug.addEventListener('blur', function () {
      if (!categorySlug.value.trim()) {
        showFieldError(categorySlug, slugError, 'Slug is required.');
      } else if (!/^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(categorySlug.value.trim())) {
        showFieldError(categorySlug, slugError, 'Slug must contain only lowercase letters, numbers, and hyphens.');
      } else {
        categorySlug.classList.remove('is-invalid');
        slugError.textContent = '';
        slugError.classList.remove('visible');
      }
    });
  }

  /* ---------- Toast Helper ---------- */
  function showFormToast(message, type) {
    /* Remove existing toast if any */
    var existing = $('.tn-admin-toast');
    if (existing) existing.remove();

    var toast = document.createElement('div');
    toast.className = 'tn-admin-toast tn-admin-toast-' + (type || 'success');
    var iconClass = type === 'error' ? 'bi-exclamation-circle' : 'bi-check-circle';
    toast.innerHTML = '<span class="tn-admin-toast-icon"><i class="bi ' + iconClass + '"></i></span><span>' + message + '</span>';
    document.body.appendChild(toast);

    requestAnimationFrame(function () {
      requestAnimationFrame(function () {
        toast.classList.add('show');
      });
    });

    setTimeout(function () {
      toast.classList.remove('show');
      setTimeout(function () { toast.remove(); }, 400);
    }, 3000);
  }

  /* ---------- Form Submit ---------- */
  if (addCategoryForm) {
    addCategoryForm.addEventListener('submit', function (e) {
      if (!validateForm()) {
        e.preventDefault();
      }
    });
  }

  /* ---------- Save & Add Another ---------- */
  var saveAndAdd = $('#tnAdminSaveAndAdd');
  if (saveAndAdd) {
    saveAndAdd.addEventListener('click', function () {
      if (validateForm()) {
        var flag = document.getElementById('tnAdminSaveAndAddFlag');
        if (flag) flag.value = '1';
        addCategoryForm.submit();
      }
    });
  }

  /* ---------- Reset Button ---------- */
  var formReset = $('#tnAdminFormReset');
  if (formReset) {
    formReset.addEventListener('click', function () {
      clearValidation();
      if (uploadPlaceholder) uploadPlaceholder.style.display = '';
      if (uploadPreview) uploadPreview.style.display = 'none';
      if (previewImg) previewImg.src = '';
      if (uploadInput) uploadInput.value = '';
      iconBtns.forEach(function (b) { b.classList.remove('selected'); });
      if (selectedIconInput) selectedIconInput.value = '';
      if (descCount) descCount.textContent = '0';
      if (metaTitleCount) metaTitleCount.textContent = '0';
      if (metaDescCount) metaDescCount.textContent = '0';
    });
  }

  /* ---------- Escape key closes toasts ---------- */
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      var toast = $('.tn-admin-toast');
      if (toast) {
        toast.classList.remove('show');
        setTimeout(function () { toast.remove(); }, 400);
      }
    }
  });

  /* ---------- Animate form cards on load ---------- */
  function animateFormCards() {
    $$('.tn-admin-form-card').forEach(function (card, i) {
      card.style.opacity = '0';
      card.style.transform = 'translateY(16px)';
      setTimeout(function () {
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        card.style.opacity = '1';
        card.style.transform = 'translateY(0)';
      }, 80 * i);
    });
  }

  animateFormCards();

  /* =========================================================
     EDIT CATEGORY FORM — Interactive Behaviors
     ========================================================= */

  /* ---------- Change / Remove Current Image ---------- */
  var changeImageBtn    = $('#tnAdminChangeImage');
  var removeCurrentBtn  = $('#tnAdminRemoveCurrentImage');
  var editImageWrap     = $('#tnAdminEditImageWrap');
  var editImageUpload   = $('#tnAdminImageUpload');

  if (changeImageBtn && editImageWrap && editImageUpload) {
    changeImageBtn.addEventListener('click', function () {
      editImageWrap.style.display = 'none';
      editImageUpload.style.display = '';
    });
  }

  if (removeCurrentBtn && editImageWrap && editImageUpload) {
    removeCurrentBtn.addEventListener('click', function () {
      editImageWrap.style.display = 'none';
      editImageUpload.style.display = '';
      var removeFlag = document.getElementById('tnAdminRemoveImageFlag');
      if (removeFlag) removeFlag.value = '1';
    });
  }

  /* ---------- Auto-generate Slug from Category Name ---------- */
  var categoryName = $('#tnAdminCategoryName');
  var categorySlug = $('#tnAdminCategorySlug');

  if (categoryName && categorySlug) {
    categoryName.addEventListener('input', function () {
      var slug = categoryName.value
        .toLowerCase()
        .trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_]+/g, '-')
        .replace(/-+/g, '-')
        .replace(/^-|-$/g, '');
      categorySlug.value = slug;
    });
  }

  /* ---------- Character Counters ---------- */
  var descField = $('#tnAdminCategoryDesc');
  var descCount = $('#tnAdminDescCharCount');
  var metaTitle = $('#tnAdminMetaTitle');
  var metaTitleCount = $('#tnAdminMetaTitleCount');
  var metaDesc = $('#tnAdminMetaDesc');
  var metaDescCount = $('#tnAdminMetaDescCount');

  function bindCharCount(field, counter, max) {
    if (!field || !counter) return;
    /* Set initial count on load */
    counter.textContent = field.value.length;
    field.addEventListener('input', function () {
      var len = field.value.length;
      counter.textContent = len;
      if (max && len > max) {
        counter.style.color = '#ff4d6d';
        field.value = field.value.substring(0, max);
        counter.textContent = max;
      } else {
        counter.style.color = '';
      }
    });
  }

  bindCharCount(descField, descCount, 200);
  bindCharCount(metaTitle, metaTitleCount, 60);
  bindCharCount(metaDesc, metaDescCount, 160);

  /* ---------- Image Upload Zone (when changing image) ---------- */
  var uploadZone = $('#tnAdminImageUpload');
  var uploadInput = $('#tnAdminImageFile');
  var uploadPlaceholder = $('#tnAdminUploadPlaceholder');
  var uploadPreview = $('#tnAdminUploadPreview');
  var previewImg = $('#tnAdminPreviewImg');
  var removeImage = $('#tnAdminRemoveImage');
  var editPreviewImg = $('#tnAdminEditPreviewImg');

  if (uploadZone && uploadInput) {
    uploadZone.addEventListener('click', function (e) {
      if (e.target === removeImage || removeImage && removeImage.contains(e.target)) return;
      uploadInput.click();
    });

    uploadZone.addEventListener('dragover', function (e) {
      e.preventDefault();
      uploadZone.classList.add('drag-over');
    });

    uploadZone.addEventListener('dragleave', function () {
      uploadZone.classList.remove('drag-over');
    });

    uploadZone.addEventListener('drop', function (e) {
      e.preventDefault();
      uploadZone.classList.remove('drag-over');
      var files = e.dataTransfer.files;
      if (files.length > 0) handleImageFile(files[0]);
    });

    uploadInput.addEventListener('change', function () {
      if (uploadInput.files.length > 0) handleImageFile(uploadInput.files[0]);
    });
  }

  function handleImageFile(file) {
    if (!file.type.startsWith('image/')) return;
    if (file.size > 2 * 1024 * 1024) {
      showFormToast('Image must be under 2MB.', 'error');
      return;
    }
    var reader = new FileReader();
    reader.onload = function (e) {
      /* Update both the upload preview and the edit preview */
      previewImg.src = e.target.result;
      if (editPreviewImg) editPreviewImg.src = e.target.result;
      uploadPlaceholder.style.display = 'none';
      uploadPreview.style.display = 'flex';
      /* Show edit image wrap with updated image, hide upload zone */
      if (editImageWrap) editImageWrap.style.display = '';
      uploadZone.style.display = 'none';
    };
    reader.readAsDataURL(file);
  }

  if (removeImage) {
    removeImage.addEventListener('click', function (e) {
      e.stopPropagation();
      uploadInput.value = '';
      previewImg.src = '';
      uploadPlaceholder.style.display = '';
      uploadPreview.style.display = 'none';
    });
  }

  /* ---------- Icon Picker ---------- */
  var iconBtns = $$('.tn-admin-icon-btn');
  var selectedIconInput = $('#tnAdminSelectedIcon');

  iconBtns.forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      iconBtns.forEach(function (b) { b.classList.remove('selected'); });
      btn.classList.add('selected');
      if (selectedIconInput) selectedIconInput.value = btn.getAttribute('data-icon');
    });
  });

  /* ---------- Form Validation ---------- */
  var editCategoryForm = $('#tnAdminEditCategoryForm');
  var nameError = $('#tnAdminCategoryNameError');
  var slugError = $('#tnAdminCategorySlugError');

  function clearValidation() {
    if (categoryName) categoryName.classList.remove('is-invalid');
    if (categorySlug) categorySlug.classList.remove('is-invalid');
    if (nameError) { nameError.textContent = ''; nameError.classList.remove('visible'); }
    if (slugError) { slugError.textContent = ''; slugError.classList.remove('visible'); }
  }

  function showFieldError(field, errorEl, message) {
    if (field) field.classList.add('is-invalid');
    if (errorEl) {
      errorEl.textContent = message;
      errorEl.classList.add('visible');
    }
  }

  function validateForm() {
    clearValidation();
    var valid = true;

    if (!categoryName || !categoryName.value.trim()) {
      showFieldError(categoryName, nameError, 'Category name is required.');
      valid = false;
    } else if (categoryName.value.trim().length < 2) {
      showFieldError(categoryName, nameError, 'Category name must be at least 2 characters.');
      valid = false;
    }

    if (!categorySlug || !categorySlug.value.trim()) {
      showFieldError(categorySlug, slugError, 'Slug is required.');
      valid = false;
    } else if (!/^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(categorySlug.value.trim())) {
      showFieldError(categorySlug, slugError, 'Slug must contain only lowercase letters, numbers, and hyphens.');
      valid = false;
    }

    return valid;
  }

  /* Live validation on blur */
  if (categoryName) {
    categoryName.addEventListener('blur', function () {
      if (!categoryName.value.trim()) {
        showFieldError(categoryName, nameError, 'Category name is required.');
      } else if (categoryName.value.trim().length < 2) {
        showFieldError(categoryName, nameError, 'Category name must be at least 2 characters.');
      } else {
        categoryName.classList.remove('is-invalid');
        nameError.textContent = '';
        nameError.classList.remove('visible');
      }
    });
  }

  if (categorySlug) {
    categorySlug.addEventListener('blur', function () {
      if (!categorySlug.value.trim()) {
        showFieldError(categorySlug, slugError, 'Slug is required.');
      } else if (!/^[a-z0-9]+(?:-[a-z0-9]+)*$/.test(categorySlug.value.trim())) {
        showFieldError(categorySlug, slugError, 'Slug must contain only lowercase letters, numbers, and hyphens.');
      } else {
        categorySlug.classList.remove('is-invalid');
        slugError.textContent = '';
        slugError.classList.remove('visible');
      }
    });
  }

  /* ---------- Toast Helper ---------- */
  function showFormToast(message, type) {
    var existing = document.querySelector('.tn-admin-toast');
    if (existing) existing.remove();

    var toast = document.createElement('div');
    toast.className = 'tn-admin-toast tn-admin-toast-' + (type || 'success');
    var iconClass = type === 'error' ? 'bi-exclamation-circle' : 'bi-check-circle';
    toast.innerHTML = '<span class="tn-admin-toast-icon"><i class="bi ' + iconClass + '"></i></span><span>' + message + '</span>';
    document.body.appendChild(toast);

    requestAnimationFrame(function () {
      requestAnimationFrame(function () {
        toast.classList.add('show');
      });
    });

    setTimeout(function () {
      toast.classList.remove('show');
      setTimeout(function () { toast.remove(); }, 400);
    }, 3000);
  }

  /* ---------- Form Submit ---------- */
  if (editCategoryForm) {
    editCategoryForm.addEventListener('submit', function (e) {
      if (!validateForm()) {
        e.preventDefault();
      }
    });
  }

  /* ---------- Reset Button ---------- */
  var formReset = $('#tnAdminFormReset');
  if (formReset) {
    formReset.addEventListener('click', function () {
      clearValidation();
      /* Reset image states */
      if (editImageWrap) editImageWrap.style.display = '';
      if (editImageUpload) editImageUpload.style.display = 'none';
      if (uploadPlaceholder) uploadPlaceholder.style.display = '';
      if (uploadPreview) uploadPreview.style.display = 'none';
      if (previewImg) previewImg.src = '';
      if (uploadInput) uploadInput.value = '';
      /* Reset icon to original */
      iconBtns.forEach(function (b) { b.classList.remove('selected'); });
      var originalIcon = selectedIconInput ? selectedIconInput.value : '';
      if (originalIcon) {
        var matchBtn = document.querySelector('.tn-admin-icon-btn[data-icon="' + originalIcon + '"]');
        if (matchBtn) matchBtn.classList.add('selected');
      }
      /* Reset char counts to field lengths */
      if (descField && descCount) descCount.textContent = descField.value.length;
      if (metaTitle && metaTitleCount) metaTitleCount.textContent = metaTitle.value.length;
      if (metaDesc && metaDescCount) metaDescCount.textContent = metaDesc.value.length;
    });
  }

  /* ---------- Escape key closes toasts ---------- */
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      var toast = document.querySelector('.tn-admin-toast');
      if (toast) {
        toast.classList.remove('show');
        setTimeout(function () { toast.remove(); }, 400);
      }
    }
  });

  /* =========================================================
     PRODUCTS PAGE — Interactive Behaviors
     ========================================================= */

  /* ---------- Select All / Row Checkboxes ---------- */
  var productsSelectAll = $('#tnAdminSelectAll');
  var productsRowChecks = $$('.tn-admin-row-check');
  var productsBulkBar = $('#tnAdminBulkBar');
  var productsBulkCount = $('#tnAdminBulkCount');
  var productsBulkCancel = $('#tnAdminBulkCancel');
  var productsTable = $('#tnAdminProductsTable');

  function updateProductsBulkBar() {
    var checked = $$('.tn-admin-row-check:checked');
    if (checked.length > 0 && productsBulkBar) {
      productsBulkBar.classList.add('visible');
      productsBulkCount.textContent = checked.length + ' selected';
    } else if (productsBulkBar) {
      productsBulkBar.classList.remove('visible');
    }
  }

  if (productsSelectAll) {
    productsSelectAll.addEventListener('change', function () {
      productsRowChecks.forEach(function (cb) { cb.checked = productsSelectAll.checked; });
      updateProductsBulkBar();
    });
  }

  productsRowChecks.forEach(function (cb) {
    cb.addEventListener('change', function () {
      if (productsSelectAll) productsSelectAll.checked = productsRowChecks.every(function (c) { return c.checked; });
      updateProductsBulkBar();
    });
  });

  if (productsBulkCancel) {
    productsBulkCancel.addEventListener('click', function () {
      productsRowChecks.forEach(function (cb) { cb.checked = false; });
      if (productsSelectAll) productsSelectAll.checked = false;
      updateProductsBulkBar();
    });
  }

  /* ---------- Product Search + Filters ---------- */
  var productSearch = $('#tnAdminProductSearch');
  var categoryFilter = $('#tnAdminCategoryFilter');
  var statusFilter = $('#tnAdminStatusFilter');
  var stockFilter = $('#tnAdminStockFilter');
  var sortFilter = $('#tnAdminSortFilter');
  var productsEmptyState = $('#tnAdminEmptyState');
  var productsCard = productsTable ? productsTable.closest('.tn-admin-card') : null;

  function getStockLevel(count) {
    count = parseInt(count, 10);
    if (count === 0) return 'out-of-stock';
    if (count <= 10) return 'low-stock';
    return 'in-stock';
  }

  function filterProducts() {
    if (!productsTable) return;
    var query = productSearch ? productSearch.value.toLowerCase().trim() : '';
    var catVal = categoryFilter ? categoryFilter.value : 'all';
    var statVal = statusFilter ? statusFilter.value : 'all';
    var stockVal = stockFilter ? stockFilter.value : 'all';
    var sortVal = sortFilter ? sortFilter.value : 'newest';
    var rows = $$('tbody tr', productsTable);
    var visibleCount = 0;

    /* Filter */
    rows.forEach(function (row) {
      var name = (row.querySelector('.tn-admin-product-name') || {}).textContent || '';
      var sku = (row.querySelector('.tn-admin-sku') || {}).textContent || '';
      var brand = row.getAttribute('data-brand') || '';
      var text = (name + ' ' + sku + ' ' + brand).toLowerCase();
      var cat = row.getAttribute('data-category') || '';
      var stat = row.getAttribute('data-status') || '';
      var stock = row.getAttribute('data-stock') || '';

      var matchSearch = !query || text.indexOf(query) !== -1;
      var matchCat = catVal === 'all' || cat === catVal;
      var matchStat = statVal === 'all' || stat === statVal;
      var matchStock = stockVal === 'all' || stock === stockVal;

      if (matchSearch && matchCat && matchStat && matchStock) {
        row.style.display = '';
        visibleCount++;
      } else {
        row.style.display = 'none';
      }
    });

    /* Sort visible rows */
    var tbody = $$('tbody', productsTable)[0];
    if (tbody && sortVal) {
      var visibleRows = rows.filter(function (r) { return r.style.display !== 'none'; });
      visibleRows.sort(function (a, b) {
        switch (sortVal) {
          case 'newest': return 0;
          case 'oldest': return 0;
          case 'name-asc': return (a.querySelector('.tn-admin-product-name') || {}).textContent.localeCompare((b.querySelector('.tn-admin-product-name') || {}).textContent);
          case 'name-desc': return (b.querySelector('.tn-admin-product-name') || {}).textContent.localeCompare((a.querySelector('.tn-admin-product-name') || {}).textContent);
          case 'price-asc': return parseFloat(a.getAttribute('data-price')) - parseFloat(b.getAttribute('data-price'));
          case 'price-desc': return parseFloat(b.getAttribute('data-price')) - parseFloat(a.getAttribute('data-price'));
          case 'stock-asc': return parseInt(a.getAttribute('data-stock-count')) - parseInt(b.getAttribute('data-stock-count'));
          case 'stock-desc': return parseInt(b.getAttribute('data-stock-count')) - parseInt(a.getAttribute('data-stock-count'));
          default: return 0;
        }
      });
      visibleRows.forEach(function (row) { tbody.appendChild(row); });
    }

    /* Update count */
    var countEl = $('.tn-admin-toolbar-count');
    if (countEl) {
      var total = rows.length;
      countEl.innerHTML = 'Showing <strong>' + (visibleCount > 0 ? '1-' + visibleCount : '0') + '</strong> of <strong>' + total.toLocaleString() + '</strong> products';
    }

    /* Toggle empty state */
    if (productsEmptyState) {
      productsEmptyState.style.display = visibleCount === 0 ? '' : 'none';
    }
    if (productsCard) {
      productsCard.style.display = visibleCount === 0 ? 'none' : '';
    }
  }

  if (productSearch) productSearch.addEventListener('input', filterProducts);
  if (categoryFilter) categoryFilter.addEventListener('change', filterProducts);
  if (statusFilter) statusFilter.addEventListener('change', filterProducts);
  if (stockFilter) stockFilter.addEventListener('change', filterProducts);
  if (sortFilter) sortFilter.addEventListener('change', filterProducts);

  /* Clear Filters */
  var productsClearFilters = $('#tnAdminClearFilters');
  if (productsClearFilters) {
    productsClearFilters.addEventListener('click', function () {
      if (productSearch) productSearch.value = '';
      if (categoryFilter) categoryFilter.value = 'all';
      if (statusFilter) statusFilter.value = 'all';
      if (stockFilter) stockFilter.value = 'all';
      if (sortFilter) sortFilter.value = 'newest';
      filterProducts();
    });
  }

  /* ---------- Delete Modal ---------- */
  var productsDeleteModal = $('#tnAdminDeleteModal');
  var productsModalCancel = $('#tnAdminModalCancel');
  var productsModalConfirm = $('#tnAdminModalConfirm');
  var productsActiveDeleteBtn = null;

  function openProductsDeleteModal(btn) {
    productsActiveDeleteBtn = btn;
    if (productsDeleteModal) productsDeleteModal.classList.add('open');
  }

  function closeProductsDeleteModal() {
    if (productsDeleteModal) productsDeleteModal.classList.remove('open');
    productsActiveDeleteBtn = null;
  }

  document.addEventListener('click', function (e) {
    var btn = e.target.closest('[data-delete="product"]');
    if (btn) {
      e.preventDefault();
      openProductsDeleteModal(btn);
    }
  });

  if (productsModalCancel) productsModalCancel.addEventListener('click', closeProductsDeleteModal);
  if (productsDeleteModal) {
    productsDeleteModal.addEventListener('click', function (e) {
      if (e.target === productsDeleteModal) closeProductsDeleteModal();
    });
  }

 

  /* ---------- Pagination Active State ---------- */
  var productsPageBtns = $$('.tn-admin-page-btn');
  productsPageBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      if (btn.disabled) return;
      if (btn.querySelector('i') || btn.textContent === '...') return;
      productsPageBtns.forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');
    });
  });

  /* ---------- Import / Export Toast ---------- */
  var importBtn = $('#tnAdminImportBtn');
  var exportBtn = $('#tnAdminExportBtn');

  function productsShowToast(message) {
    var existing = document.querySelector('.tn-admin-toast');
    if (existing) existing.remove();
    var toast = document.createElement('div');
    toast.className = 'tn-admin-toast tn-admin-toast-success';
    toast.innerHTML = '<span class="tn-admin-toast-icon"><i class="bi bi-info-circle"></i></span><span>' + message + '</span>';
    document.body.appendChild(toast);
    requestAnimationFrame(function () {
      requestAnimationFrame(function () { toast.classList.add('show'); });
    });
    setTimeout(function () {
      toast.classList.remove('show');
      setTimeout(function () { toast.remove(); }, 400);
    }, 3000);
  }

  if (importBtn) importBtn.addEventListener('click', function () { productsShowToast('Import feature coming soon!'); });
  if (exportBtn) exportBtn.addEventListener('click', function () { productsShowToast('Export feature coming soon!'); });

  /* ---------- Stagger Table Row Animation ---------- */
  function animateProductRows() {
    var rows = productsTable ? $$('tbody tr', productsTable) : [];
    rows.forEach(function (row, i) {
      row.style.opacity = '0';
      row.style.transform = 'translateY(10px)';
      setTimeout(function () {
        row.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
        row.style.opacity = '1';
        row.style.transform = 'translateY(0)';
      }, 60 * i);
    });
  }

  animateProductRows();

  /* =========================================================
     ADD PRODUCT FORM
     ========================================================= */
  var addProductForm = document.getElementById('tnAdminAddProductForm');
  if (!addProductForm) return;

  /* ---------- Auto-Slug from Product Name ---------- */
  var productNameEl = document.getElementById('tnAdminProductName');
  var productSlugEl = document.getElementById('tnAdminProductSlug');
  if (productNameEl && productSlugEl) {
    productNameEl.addEventListener('input', function () {
      productSlugEl.value = slugify(productNameEl.value);
    });
  }

  /* ---------- Tags Input ---------- */
  var tagsInput = document.getElementById('tnAdminTagsInput');
  var tagsList = document.getElementById('tnAdminTagsList');
  var tagField = document.getElementById('tnAdminTagField');
  var tagsValue = document.getElementById('tnAdminTagsValue');
  var productTags = [];

  function syncTags() {
    tagsValue.value = productTags.join(',');
  }

  function renderTags() {
    tagsList.innerHTML = '';
    productTags.forEach(function (tag, i) {
      var el = document.createElement('span');
      el.className = 'tn-admin-tag';
      el.innerHTML = tag + '<button type="button" class="tn-admin-tag-remove" data-index="' + i + '">&times;</button>';
      tagsList.appendChild(el);
    });
  }

  function addTag(raw) {
    var tag = raw.trim().toLowerCase().replace(/[^a-z0-9\- ]/g, '');
    if (tag && productTags.indexOf(tag) === -1 && productTags.length < 15) {
      productTags.push(tag);
      syncTags();
      renderTags();
    }
    tagField.value = '';
  }

  if (tagField) {
    tagField.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ',') {
        e.preventDefault();
        addTag(tagField.value.replace(',', ''));
      }
      if (e.key === 'Backspace' && tagField.value === '' && productTags.length > 0) {
        productTags.pop();
        syncTags();
        renderTags();
      }
    });

    tagField.addEventListener('blur', function () {
      if (tagField.value.trim()) addTag(tagField.value);
    });
  }

  if (tagsList) {
    tagsList.addEventListener('click', function (e) {
      var btn = e.target.closest('.tn-admin-tag-remove');
      if (btn) {
        var idx = parseInt(btn.getAttribute('data-index'), 10);
        productTags.splice(idx, 1);
        syncTags();
        renderTags();
      }
    });
  }

  if (tagsInput) {
    tagsInput.addEventListener('click', function () { tagField && tagField.focus(); });
  }

  /* ---------- Char Counters ---------- */
  function bindCharCounter(inputId, counterId, max) {
    var input = document.getElementById(inputId);
    var counter = document.getElementById(counterId);
    if (!input || !counter) return;
    input.addEventListener('input', function () {
      var len = input.value.length;
      counter.textContent = len;
      counter.style.color = len > max ? '#ff4d6d' : '';
    });
  }

  bindCharCounter('tnAdminProductShortDesc', 'tnAdminShortDescCount', 200);
  bindCharCounter('tnAdminSEOTitle', 'tnAdminSEOTitleCount', 60);
  bindCharCounter('tnAdminSEODescription', 'tnAdminSEODescCount', 160);

  /* ---------- Featured Image Upload ---------- */
  var featuredUpload = document.getElementById('tnAdminFeaturedUpload');
  var featuredFile = document.getElementById('tnAdminFeaturedFile');
  var featuredPlaceholder = document.getElementById('tnAdminFeaturedPlaceholder');
  var featuredPreview = document.getElementById('tnAdminFeaturedPreview');
  var featuredPreviewImg = document.getElementById('tnAdminFeaturedPreviewImg');
  var removeFeatured = document.getElementById('tnAdminRemoveFeatured');

  function validateImage(file) {
    var valid = ['image/jpeg','image/png','image/webp','image/svg+xml'];
    if (valid.indexOf(file.type) === -1) { addProductToast('Only SVG, PNG, JPG or WEBP allowed.', 'error'); return false; }
    if (file.size > 2 * 1024 * 1024) { addProductToast('Image must be under 2MB.', 'error'); return false; }
    return true;
  }

  function showFeaturedPreview(file) {
    if (!validateImage(file)) return;
    var reader = new FileReader();
    reader.onload = function (e) {
      featuredPreviewImg.src = e.target.result;
      featuredPlaceholder.style.display = 'none';
      featuredPreview.style.display = 'block';
    };
    reader.readAsDataURL(file);
  }

  if (featuredUpload) {
    featuredUpload.addEventListener('click', function (e) {
      if (e.target.closest('.tn-admin-upload-remove')) return;
      featuredFile && featuredFile.click();
    });
    featuredUpload.addEventListener('dragover', function (e) { e.preventDefault(); featuredUpload.classList.add('tn-admin-upload-zone-dragover'); });
    featuredUpload.addEventListener('dragleave', function () { featuredUpload.classList.remove('tn-admin-upload-zone-dragover'); });
    featuredUpload.addEventListener('drop', function (e) {
      e.preventDefault();
      featuredUpload.classList.remove('tn-admin-upload-zone-dragover');
      if (e.dataTransfer.files.length) showFeaturedPreview(e.dataTransfer.files[0]);
    });
  }

  if (featuredFile) {
    featuredFile.addEventListener('change', function () {
      if (featuredFile.files.length) showFeaturedPreview(featuredFile.files[0]);
    });
  }

  if (removeFeatured) {
    removeFeatured.addEventListener('click', function (e) {
      e.stopPropagation();
      featuredFile.value = '';
      featuredPreviewImg.src = '';
      featuredPreview.style.display = 'none';
      featuredPlaceholder.style.display = '';
    });
  }

  /* ---------- Multi-Image Upload ---------- */
  var multiFile = document.getElementById('tnAdminMultiFile');
  var multiGrid = document.getElementById('tnAdminMultiGrid');
  var multiAdd = document.getElementById('tnAdminMultiAdd');
  var multiImages = [];
  var MAX_MULTI_IMAGES = 8;

  function renderMultiImages() {
    multiGrid.innerHTML = '';
    multiImages.forEach(function (src, i) {
      var item = document.createElement('div');
      item.className = 'tn-admin-multi-item';
      item.innerHTML = '<img src="' + src + '" alt="Product image ' + (i + 1) + '">' +
        '<div class="tn-admin-multi-item-overlay"><button type="button" class="tn-admin-multi-item-remove" data-index="' + i + '"><i class="bi bi-trash"></i></button></div>' +
        (i === 0 ? '<span class="tn-admin-multi-item-badge">Main</span>' : '');
      multiGrid.appendChild(item);
    });
  }

  function addMultiImages(files) {
    var remaining = MAX_MULTI_IMAGES - multiImages.length;
    var toAdd = Array.from(files).slice(0, remaining);
    toAdd.forEach(function (file) {
      if (!validateImage(file)) return;
      var reader = new FileReader();
      reader.onload = function (e) {
        multiImages.push(e.target.result);
        renderMultiImages();
      };
      reader.readAsDataURL(file);
    });
    if (files.length > remaining) {
      addProductToast('Maximum ' + MAX_MULTI_IMAGES + ' additional images allowed.', 'error');
    }
  }

  if (multiAdd) {
    multiAdd.addEventListener('click', function () { multiFile && multiFile.click(); });
  }

  if (multiFile) {
    multiFile.addEventListener('change', function () {
      if (multiFile.files.length) addMultiImages(multiFile.files);
      multiFile.value = '';
    });
  }

  if (multiGrid) {
    multiGrid.addEventListener('click', function (e) {
      var btn = e.target.closest('.tn-admin-multi-item-remove');
      if (btn) {
        var idx = parseInt(btn.getAttribute('data-index'), 10);
        multiImages.splice(idx, 1);
        renderMultiImages();
      }
    });
  }

  if (multiGrid) {
    multiGrid.addEventListener('dragover', function (e) { e.preventDefault(); });
    multiGrid.addEventListener('drop', function (e) {
      e.preventDefault();
      if (e.dataTransfer.files.length) addMultiImages(e.dataTransfer.files);
    });
  }

  /* ---------- Discount % Auto-Calc ---------- */
  var regularPriceEl = document.getElementById('tnAdminRegularPrice');
  var salePriceEl = document.getElementById('tnAdminSalePrice');
  var discountPctEl = document.getElementById('tnAdminDiscountPercent');

  function calcDiscount() {
    var regular = parseFloat(regularPriceEl && regularPriceEl.value) || 0;
    var sale = parseFloat(salePriceEl && salePriceEl.value) || 0;
    if (discountPctEl) {
      if (regular > 0 && sale > 0 && sale < regular) {
        discountPctEl.value = Math.round(((regular - sale) / regular) * 100);
      } else {
        discountPctEl.value = '';
      }
    }
  }

  if (regularPriceEl) regularPriceEl.addEventListener('input', calcDiscount);
  if (salePriceEl) salePriceEl.addEventListener('input', calcDiscount);

  /* ---------- Stock Status Auto-Update ---------- */
  var stockQtyEl = document.getElementById('tnAdminStockQuantity');
  var stockStatusEl = document.getElementById('tnAdminStockStatus');
  var lowStockAlertEl = document.getElementById('tnAdminLowStockAlert');

  function autoStockStatus() {
    if (!stockQtyEl || !stockStatusEl) return;
    var qty = parseInt(stockQtyEl.value, 10) || 0;
    var threshold = parseInt(lowStockAlertEl && lowStockAlertEl.value, 10) || 10;
    if (qty === 0) {
      stockStatusEl.value = 'out-of-stock';
    } else if (qty <= threshold) {
      stockStatusEl.value = 'low-stock';
    } else {
      stockStatusEl.value = 'in-stock';
    }
  }

  if (stockQtyEl) stockQtyEl.addEventListener('input', autoStockStatus);

  /* ---------- Toast ---------- */
  var addProductToastEl;
  function addProductToast(msg, type) {
    if (addProductToastEl) addProductToastEl.remove();
    addProductToastEl = document.createElement('div');
    addProductToastEl.className = 'tn-admin-toast tn-admin-toast-' + (type || 'success');
    addProductToastEl.innerHTML = '<i class="bi ' + (type === 'error' ? 'bi-exclamation-circle' : 'bi-check-circle') + '"></i><span>' + msg + '</span>';
    document.body.appendChild(addProductToastEl);
    setTimeout(function () { addProductToastEl.classList.add('tn-admin-toast-show'); }, 20);
    setTimeout(function () {
      if (addProductToastEl) {
        addProductToastEl.classList.remove('tn-admin-toast-show');
        setTimeout(function () { if (addProductToastEl) addProductToastEl.remove(); }, 400);
      }
    }, 3500);
  }

  /* ---------- Client-Side Validation ---------- */
  var requiredFields = [
    { el: 'tnAdminProductName', err: 'tnAdminProductNameError', msg: 'Product name is required.' },
    { el: 'tnAdminProductSlug', err: 'tnAdminProductSlugError', msg: 'Slug is required.' },
    { el: 'tnAdminProductSKU', err: 'tnAdminProductSKUError', msg: 'SKU is required.' },
    { el: 'tnAdminProductCategory', err: 'tnAdminProductCategoryError', msg: 'Please select a category.' },
    { el: 'tnAdminRegularPrice', err: 'tnAdminRegularPriceError', msg: 'Regular price is required.' },
    { el: 'tnAdminStockQuantity', err: 'tnAdminStockQuantityError', msg: 'Stock quantity is required.' }
  ];

  requiredFields.forEach(function (f) {
    var el = document.getElementById(f.el);
    var err = document.getElementById(f.err);
    if (el) {
      el.addEventListener('blur', function () {
        if (!el.value.trim()) {
          if (err) { err.textContent = f.msg; err.style.display = 'block'; }
          el.style.borderColor = '#ff4d6d';
        } else {
          if (err) { err.textContent = ''; err.style.display = 'none'; }
          el.style.borderColor = '';
        }
      });
      el.addEventListener('input', function () {
        if (el.value.trim() && err && err.style.display === 'block') {
          err.textContent = ''; err.style.display = 'none';
          el.style.borderColor = '';
        }
      });
    }
  });

  /* ---------- Form Submit ---------- */
  addProductForm.addEventListener('submit', function (e) {
    e.preventDefault();
    var valid = true;

    requiredFields.forEach(function (f) {
      var el = document.getElementById(f.el);
      var err = document.getElementById(f.err);
      if (el && !el.value.trim()) {
        if (err) { err.textContent = f.msg; err.style.display = 'block'; }
        el.style.borderColor = '#ff4d6d';
        valid = false;
      }
    });

    if (!valid) {
      addProductToast('Please fix the errors before saving.', 'error');
      var firstErr = addProductForm.querySelector('[style*="border-color: rgb(255, 77, 109)"]');
      if (firstErr) firstErr.scrollIntoView({ behavior: 'smooth', block: 'center' });
      return;
    }

    addProductToast('Product saved successfully!');
    setTimeout(function () { window.location.href = 'products.php'; }, 1500);
  });

  /* ---------- Save & Add Another ---------- */
  var saveAndAddBtn = document.getElementById('tnAdminSaveAndAdd');
  if (saveAndAddBtn) {
    saveAndAddBtn.addEventListener('click', function () {
      addProductForm.reset();
      productTags = [];
      syncTags();
      renderTags();
      multiImages = [];
      renderMultiImages();
      if (discountPctEl) discountPctEl.value = '';
      if (featuredPreview) featuredPreview.style.display = 'none';
      if (featuredPlaceholder) featuredPlaceholder.style.display = '';
      if (featuredFile) featuredFile.value = '';
      requiredFields.forEach(function (f) {
        var err = document.getElementById(f.err);
        if (err) { err.textContent = ''; err.style.display = 'none'; }
      });
      addProductForm.querySelectorAll('.tn-admin-input, .tn-admin-textarea, .tn-admin-select').forEach(function (el) {
        el.style.borderColor = '';
      });
      addProductToast('Form cleared. Add another product!');
      productNameEl && productNameEl.focus();
    });
  }

  /* ---------- Form Card Stagger Animation ---------- */
  function animateFormCards() {
    var cards = addProductForm.querySelectorAll('.tn-admin-form-card');
    cards.forEach(function (card, i) {
      card.style.opacity = '0';
      card.style.transform = 'translateY(14px)';
      setTimeout(function () {
        card.style.transition = 'opacity 0.45s ease, transform 0.45s ease';
        card.style.opacity = '1';
        card.style.transform = 'translateY(0)';
      }, 80 * i);
    });
  }

  animateFormCards();

  /* =========================================================
     EDIT PRODUCT FORM — Interactive Behaviors
     ========================================================= */
  var editProductForm = document.getElementById('tnAdminEditProductForm');
  if (!editProductForm) return;

  /* ---------- Auto-Slug from Product Name ---------- */
  var epName = document.getElementById('tnAdminEditProductName');
  var epSlug = document.getElementById('tnAdminEditProductSlug');

  if (epName && epSlug) {
    epName.addEventListener('input', function () {
      epSlug.value = epName.value
        .toLowerCase()
        .trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_]+/g, '-')
        .replace(/-+/g, '-')
        .replace(/^-|-$/g, '');
    });
  }

  /* ---------- Tags Input ---------- */
  var epTagsList = document.getElementById('tnAdminEditTagsList');
  var epTagField = document.getElementById('tnAdminEditTagField');
  var epTagsValue = document.getElementById('tnAdminEditTagsValue');
  var epTags = ['laptop', 'apple', 'macbook', 'pro', 'm4'];

  function syncEditTags() {
    if (epTagsValue) epTagsValue.value = epTags.join(',');
  }

  function renderEditTags() {
    if (!epTagsList) return;
    epTagsList.innerHTML = '';
    epTags.forEach(function (tag, i) {
      var el = document.createElement('span');
      el.className = 'tn-admin-tag';
      el.innerHTML = tag + '<button type="button" class="tn-admin-tag-remove" data-index="' + i + '">&times;</button>';
      epTagsList.appendChild(el);
    });
  }

  function addEditTag(raw) {
    var tag = raw.trim().toLowerCase().replace(/[^a-z0-9\- ]/g, '');
    if (tag && epTags.indexOf(tag) === -1 && epTags.length < 15) {
      epTags.push(tag);
      syncEditTags();
      renderEditTags();
    }
    if (epTagField) epTagField.value = '';
  }

  if (epTagField) {
    epTagField.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ',') {
        e.preventDefault();
        addEditTag(epTagField.value.replace(',', ''));
      }
      if (e.key === 'Backspace' && epTagField.value === '' && epTags.length > 0) {
        epTags.pop();
        syncEditTags();
        renderEditTags();
      }
    });
    epTagField.addEventListener('blur', function () {
      if (epTagField.value.trim()) addEditTag(epTagField.value);
    });
  }

  if (epTagsList) {
    epTagsList.addEventListener('click', function (e) {
      var btn = e.target.closest('.tn-admin-tag-remove');
      if (btn) {
        var idx = parseInt(btn.getAttribute('data-index'), 10);
        epTags.splice(idx, 1);
        syncEditTags();
        renderEditTags();
      }
    });
  }

  var epTagsInput = document.getElementById('tnAdminEditTagsInput');
  if (epTagsInput && epTagField) {
    epTagsInput.addEventListener('click', function () { epTagField.focus(); });
  }

  /* ---------- Char Counters (set initial from pre-filled values) ---------- */
  function epBindCharCounter(inputId, counterId, max) {
    var input = document.getElementById(inputId);
    var counter = document.getElementById(counterId);
    if (!input || !counter) return;
    counter.textContent = input.value.length;
    input.addEventListener('input', function () {
      var len = input.value.length;
      counter.textContent = len;
      counter.style.color = len > max ? '#ff4d6d' : '';
    });
  }

  epBindCharCounter('tnAdminEditProductShortDesc', 'tnAdminEditShortDescCount', 200);
  epBindCharCounter('tnAdminEditSEOTitle', 'tnAdminEditSEOTitleCount', 60);
  epBindCharCounter('tnAdminEditSEODescription', 'tnAdminEditSEODescCount', 160);

  /* ---------- Featured Image — Change / Remove ---------- */
  var epChangeFeatured = document.getElementById('tnAdminEditChangeFeatured');
  var epRemoveFeatured = document.getElementById('tnAdminEditRemoveFeatured');
  var epFeaturedWrap = document.getElementById('tnAdminEditFeaturedWrap');
  var epFeaturedUpload = document.getElementById('tnAdminEditFeaturedUpload');
  var epFeaturedFile = document.getElementById('tnAdminEditFeaturedFile');
  var epFeaturedPlaceholder = document.getElementById('tnAdminEditFeaturedPlaceholder');
  var epFeaturedUploadPreview = document.getElementById('tnAdminEditFeaturedUploadPreview');
  var epFeaturedUploadImg = document.getElementById('tnAdminEditFeaturedUploadImg');
  var epFeaturedPreviewImg = document.getElementById('tnAdminEditFeaturedPreviewImg');
  var epFeaturedRemoveNew = document.getElementById('tnAdminEditFeaturedRemoveNew');

  if (epChangeFeatured && epFeaturedWrap && epFeaturedUpload) {
    epChangeFeatured.addEventListener('click', function () {
      epFeaturedWrap.style.display = 'none';
      epFeaturedUpload.style.display = '';
    });
  }

  if (epRemoveFeatured && epFeaturedWrap && epFeaturedUpload) {
    epRemoveFeatured.addEventListener('click', function () {
      epFeaturedWrap.style.display = 'none';
      epFeaturedUpload.style.display = '';
    });
  }

  function epValidateImage(file) {
    var valid = ['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'];
    if (valid.indexOf(file.type) === -1) { epToast('Only SVG, PNG, JPG or WEBP allowed.', 'error'); return false; }
    if (file.size > 2 * 1024 * 1024) { epToast('Image must be under 2MB.', 'error'); return false; }
    return true;
  }

  function epShowFeaturedUploadPreview(file) {
    if (!epValidateImage(file)) return;
    var reader = new FileReader();
    reader.onload = function (e) {
      if (epFeaturedUploadImg) epFeaturedUploadImg.src = e.target.result;
      if (epFeaturedPreviewImg) epFeaturedPreviewImg.src = e.target.result;
      if (epFeaturedPlaceholder) epFeaturedPlaceholder.style.display = 'none';
      if (epFeaturedUploadPreview) epFeaturedUploadPreview.style.display = 'flex';
    };
    reader.readAsDataURL(file);
  }

  if (epFeaturedUpload && epFeaturedFile) {
    epFeaturedUpload.addEventListener('click', function (e) {
      if (e.target.closest('.tn-admin-upload-remove')) return;
      epFeaturedFile.click();
    });
    epFeaturedUpload.addEventListener('dragover', function (e) { e.preventDefault(); epFeaturedUpload.classList.add('tn-admin-upload-zone-dragover'); });
    epFeaturedUpload.addEventListener('dragleave', function () { epFeaturedUpload.classList.remove('tn-admin-upload-zone-dragover'); });
    epFeaturedUpload.addEventListener('drop', function (e) {
      e.preventDefault();
      epFeaturedUpload.classList.remove('tn-admin-upload-zone-dragover');
      if (e.dataTransfer.files.length) epShowFeaturedUploadPreview(e.dataTransfer.files[0]);
    });
    epFeaturedFile.addEventListener('change', function () {
      if (epFeaturedFile.files.length) epShowFeaturedUploadPreview(epFeaturedFile.files[0]);
    });
  }

  if (epFeaturedRemoveNew) {
    epFeaturedRemoveNew.addEventListener('click', function (e) {
      e.stopPropagation();
      if (epFeaturedFile) epFeaturedFile.value = '';
      if (epFeaturedUploadImg) epFeaturedUploadImg.src = '';
      if (epFeaturedPlaceholder) epFeaturedPlaceholder.style.display = '';
      if (epFeaturedUploadPreview) epFeaturedUploadPreview.style.display = 'none';
    });
  }

  /* ---------- Multi-Image Gallery ---------- */
  var epMultiFile = document.getElementById('tnAdminEditMultiFile');
  var epMultiGrid = document.getElementById('tnAdminEditMultiGrid');
  var epMultiAdd = document.getElementById('tnAdminEditMultiAdd');
  var epMultiCount = epMultiGrid ? epMultiGrid.querySelectorAll('.tn-admin-multi-item').length : 0;
  var EP_MAX_MULTI = 8;

  function epAddMultiImages(files) {
    var remaining = EP_MAX_MULTI - epMultiCount;
    var toAdd = Array.from(files).slice(0, remaining);
    toAdd.forEach(function (file) {
      if (!epValidateImage(file)) return;
      var reader = new FileReader();
      reader.onload = function (e) {
        var item = document.createElement('div');
        item.className = 'tn-admin-multi-item';
        item.innerHTML = '<img src="' + e.target.result + '" alt="Gallery">' +
          '<div class="tn-admin-multi-item-overlay"><button type="button" class="tn-admin-multi-item-remove-new"><i class="bi bi-trash"></i></button></div>';
        epMultiGrid.appendChild(item);
        epMultiCount++;
      };
      reader.readAsDataURL(file);
    });
    if (files.length > remaining) {
      epToast('Maximum ' + EP_MAX_MULTI + ' gallery images allowed.', 'error');
    }
  }

  if (epMultiAdd && epMultiFile) {
    epMultiAdd.addEventListener('click', function () { epMultiFile.click(); });
    epMultiFile.addEventListener('change', function () {
      if (epMultiFile.files.length) epAddMultiImages(epMultiFile.files);
      epMultiFile.value = '';
    });
  }

  if (epMultiGrid) {
    epMultiGrid.addEventListener('click', function (e) {
      var btn = e.target.closest('.tn-admin-multi-item-remove, .tn-admin-multi-item-remove-new');
      if (btn) {
        var item = btn.closest('.tn-admin-multi-item');
        if (item) { item.remove(); epMultiCount--; }
      }
    });
    epMultiGrid.addEventListener('dragover', function (e) { e.preventDefault(); });
    epMultiGrid.addEventListener('drop', function (e) {
      e.preventDefault();
      if (e.dataTransfer.files.length) epAddMultiImages(e.dataTransfer.files);
    });
  }

  /* ---------- Discount % Auto-Calc (set initial from pre-filled prices) ---------- */
  var epRegularPrice = document.getElementById('tnAdminEditRegularPrice');
  var epSalePrice = document.getElementById('tnAdminEditSalePrice');
  var epDiscountPct = document.getElementById('tnAdminEditDiscountPercent');

  function epCalcDiscount() {
    var regular = parseFloat(epRegularPrice && epRegularPrice.value) || 0;
    var sale = parseFloat(epSalePrice && epSalePrice.value) || 0;
    if (epDiscountPct) {
      if (regular > 0 && sale > 0 && sale < regular) {
        epDiscountPct.value = Math.round(((regular - sale) / regular) * 100);
      } else {
        epDiscountPct.value = '';
      }
    }
  }

  epCalcDiscount();
  if (epRegularPrice) epRegularPrice.addEventListener('input', epCalcDiscount);
  if (epSalePrice) epSalePrice.addEventListener('input', epCalcDiscount);

  /* ---------- Stock Status Auto-Update (set initial from pre-filled values) ---------- */
  var epStockQty = document.getElementById('tnAdminEditStockQuantity');
  var epStockStatus = document.getElementById('tnAdminEditStockStatus');
  var epLowStockAlert = document.getElementById('tnAdminEditLowStockAlert');

  function epAutoStockStatus() {
    if (!epStockQty || !epStockStatus) return;
    var qty = parseInt(epStockQty.value, 10) || 0;
    var threshold = parseInt(epLowStockAlert && epLowStockAlert.value, 10) || 10;
    if (qty === 0) {
      epStockStatus.value = 'out-of-stock';
    } else if (qty <= threshold) {
      epStockStatus.value = 'low-stock';
    } else {
      epStockStatus.value = 'in-stock';
    }
  }

  if (epStockQty) epStockQty.addEventListener('input', epAutoStockStatus);

  /* ---------- Toast ---------- */
  var epToastEl;
  function epToast(msg, type) {
    if (epToastEl) epToastEl.remove();
    epToastEl = document.createElement('div');
    epToastEl.className = 'tn-admin-toast tn-admin-toast-' + (type || 'success');
    epToastEl.innerHTML = '<i class="bi ' + (type === 'error' ? 'bi-exclamation-circle' : 'bi-check-circle') + '"></i><span>' + msg + '</span>';
    document.body.appendChild(epToastEl);
    setTimeout(function () { epToastEl.classList.add('tn-admin-toast-show'); }, 20);
    setTimeout(function () {
      if (epToastEl) {
        epToastEl.classList.remove('tn-admin-toast-show');
        setTimeout(function () { if (epToastEl) epToastEl.remove(); }, 400);
      }
    }, 3500);
  }

  /* ---------- Client-Side Validation ---------- */
  var epRequiredFields = [
    { el: 'tnAdminEditProductName', err: 'tnAdminEditProductNameError', msg: 'Product name is required.' },
    { el: 'tnAdminEditProductSlug', err: 'tnAdminEditProductSlugError', msg: 'Slug is required.' },
    { el: 'tnAdminEditProductSKU', err: 'tnAdminEditProductSKUError', msg: 'SKU is required.' },
    { el: 'tnAdminEditProductCategory', err: 'tnAdminEditProductCategoryError', msg: 'Please select a category.' },
    { el: 'tnAdminEditRegularPrice', err: 'tnAdminEditRegularPriceError', msg: 'Regular price is required.' },
    { el: 'tnAdminEditStockQuantity', err: 'tnAdminEditStockQuantityError', msg: 'Stock quantity is required.' }
  ];

  epRequiredFields.forEach(function (f) {
    var el = document.getElementById(f.el);
    var err = document.getElementById(f.err);
    if (el) {
      el.addEventListener('blur', function () {
        if (!el.value.trim()) {
          if (err) { err.textContent = f.msg; err.style.display = 'block'; }
          el.style.borderColor = '#ff4d6d';
        } else {
          if (err) { err.textContent = ''; err.style.display = 'none'; }
          el.style.borderColor = '';
        }
      });
      el.addEventListener('input', function () {
        if (el.value.trim() && err && err.style.display === 'block') {
          err.textContent = ''; err.style.display = 'none';
          el.style.borderColor = '';
        }
      });
    }
  });

  /* ---------- Form Submit ---------- */
  editProductForm.addEventListener('submit', function (e) {
    e.preventDefault();
    var valid = true;

    epRequiredFields.forEach(function (f) {
      var el = document.getElementById(f.el);
      var err = document.getElementById(f.err);
      if (el && !el.value.trim()) {
        if (err) { err.textContent = f.msg; err.style.display = 'block'; }
        el.style.borderColor = '#ff4d6d';
        valid = false;
      }
    });

    if (!valid) {
      epToast('Please fix the errors before saving.', 'error');
      var firstErr = editProductForm.querySelector('[style*="border-color: rgb(255, 77, 109)"]');
      if (firstErr) firstErr.scrollIntoView({ behavior: 'smooth', block: 'center' });
      return;
    }

    epToast('Product updated successfully!');
  });

  /* ---------- Reset Button ---------- */
  var epFormReset = document.getElementById('tnAdminEditFormReset');
  if (epFormReset) {
    epFormReset.addEventListener('click', function () {
      /* Clear validation */
      epRequiredFields.forEach(function (f) {
        var err = document.getElementById(f.err);
        var el = document.getElementById(f.el);
        if (err) { err.textContent = ''; err.style.display = 'none'; }
        if (el) el.style.borderColor = '';
      });

      /* Restore image states */
      if (epFeaturedWrap) epFeaturedWrap.style.display = '';
      if (epFeaturedUpload) epFeaturedUpload.style.display = 'none';
      if (epFeaturedPlaceholder) epFeaturedPlaceholder.style.display = '';
      if (epFeaturedUploadPreview) epFeaturedUploadPreview.style.display = 'none';
      if (epFeaturedUploadImg) epFeaturedUploadImg.src = '';
      if (epFeaturedFile) epFeaturedFile.value = '';

      /* Re-sync tags from hidden field */
      syncEditTags();

      /* Recalc discount */
      epCalcDiscount();

      /* Reset char counts */
      var shortDesc = document.getElementById('tnAdminEditProductShortDesc');
      var shortDescCount = document.getElementById('tnAdminEditShortDescCount');
      var seoTitle = document.getElementById('tnAdminEditSEOTitle');
      var seoTitleCount = document.getElementById('tnAdminEditSEOTitleCount');
      var seoDesc = document.getElementById('tnAdminEditSEODescription');
      var seoDescCount = document.getElementById('tnAdminEditSEODescCount');
      if (shortDesc && shortDescCount) shortDescCount.textContent = shortDesc.value.length;
      if (seoTitle && seoTitleCount) seoTitleCount.textContent = seoTitle.value.length;
      if (seoDesc && seoDescCount) seoDescCount.textContent = seoDesc.value.length;
    });
  }

  /* ---------- Form Card Stagger Animation ---------- */
  function animateEditProductCards() {
    var cards = editProductForm.querySelectorAll('.tn-admin-form-card');
    cards.forEach(function (card, i) {
      card.style.opacity = '0';
      card.style.transform = 'translateY(14px)';
      setTimeout(function () {
        card.style.transition = 'opacity 0.45s ease, transform 0.45s ease';
        card.style.opacity = '1';
        card.style.transform = 'translateY(0)';
      }, 80 * i);
    });
  }

  animateEditProductCards();

  /* =========================================================
     ORDERS PAGE — Interactive Behaviors
     ========================================================= */
  var ordersTable = document.getElementById('tnAdminOrdersTable');
  if (!ordersTable) return;

  var orderSearch = document.getElementById('tnAdminOrderSearch');
  var orderStatusFilter = document.getElementById('tnAdminOrderStatusFilter');
  var ordersEmptyState = document.getElementById('tnAdminOrdersEmptyState');
  var ordersCard = ordersTable.closest('.tn-admin-card');
  var ordersClearFilters = document.getElementById('tnAdminOrdersClearFilters');
  var ordersExportBtn = document.getElementById('tnAdminOrdersExportBtn');

  /* ---------- Search + Filter ---------- */
  function filterOrders() {
    var query = orderSearch ? orderSearch.value.toLowerCase().trim() : '';
    var statusVal = orderStatusFilter ? orderStatusFilter.value : 'all';
    var rows = ordersTable.querySelectorAll('tbody tr');
    var visibleCount = 0;

    rows.forEach(function (row) {
      var orderId = (row.querySelector('.tn-admin-order-id') || {}).textContent || '';
      var customerStrong = (row.querySelector('.tn-admin-order-customer-info strong') || {}).textContent || '';
      var customerSpan = (row.querySelector('.tn-admin-order-customer-info span') || {}).textContent || '';
      var text = (orderId + ' ' + customerStrong + ' ' + customerSpan).toLowerCase();
      var status = row.getAttribute('data-status') || '';

      var matchSearch = !query || text.indexOf(query) !== -1;
      var matchStatus = statusVal === 'all' || status === statusVal;

      if (matchSearch && matchStatus) {
        row.style.display = '';
        visibleCount++;
      } else {
        row.style.display = 'none';
      }
    });

    /* Toggle empty state */
    if (visibleCount === 0) {
      ordersTable.style.display = 'none';
      var paginationWrap = ordersCard ? ordersCard.querySelector('.tn-admin-pagination-wrap') : null;
      if (paginationWrap) paginationWrap.style.display = 'none';
      if (ordersEmptyState) ordersEmptyState.style.display = '';
    } else {
      ordersTable.style.display = '';
      var paginationWrap = ordersCard ? ordersCard.querySelector('.tn-admin-pagination-wrap') : null;
      if (paginationWrap) paginationWrap.style.display = '';
      if (ordersEmptyState) ordersEmptyState.style.display = 'none';
    }

    /* Update toolbar count */
    var totalCount = rows.length;
    var toolbarCount = ordersCard ? ordersCard.querySelector('.tn-admin-toolbar-count strong:first-child') : null;
    if (toolbarCount) toolbarCount.textContent = '1-' + visibleCount;
    var toolbarCountAll = ordersCard ? ordersCard.querySelector('.tn-admin-toolbar-count strong:last-child') : null;
    if (toolbarCountAll) toolbarCountAll.textContent = totalCount;
  }

  if (orderSearch) orderSearch.addEventListener('input', filterOrders);
  if (orderStatusFilter) orderStatusFilter.addEventListener('change', filterOrders);

  /* ---------- Clear Filters ---------- */
  if (ordersClearFilters) {
    ordersClearFilters.addEventListener('click', function () {
      if (orderSearch) orderSearch.value = '';
      if (orderStatusFilter) orderStatusFilter.value = 'all';
      filterOrders();
    });
  }

  /* ---------- Export Toast ---------- */
  if (ordersExportBtn) {
    ordersExportBtn.addEventListener('click', function () {
      var toast = document.createElement('div');
      toast.className = 'tn-admin-toast tn-admin-toast-success';
      toast.innerHTML = '<i class="bi bi-check-circle"></i><span>Orders exported successfully!</span>';
      document.body.appendChild(toast);
      requestAnimationFrame(function () {
        requestAnimationFrame(function () { toast.classList.add('tn-admin-toast-show'); });
      });
      setTimeout(function () {
        toast.classList.remove('tn-admin-toast-show');
        setTimeout(function () { toast.remove(); }, 400);
      }, 3000);
    });
  }

  /* ---------- Stagger Table Row Animation ---------- */
  function animateOrderRows() {
    var rows = ordersTable.querySelectorAll('tbody tr');
    rows.forEach(function (row, i) {
      row.style.opacity = '0';
      row.style.transform = 'translateY(10px)';
      setTimeout(function () {
        row.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
        row.style.opacity = '1';
        row.style.transform = 'translateY(0)';
      }, 50 * i);
    });
  }

  animateOrderRows();

  /* =========================================================
     ORDER DETAILS PAGE — Interactive Behaviors
     ========================================================= */
  var orderItemsTable = document.getElementById('tnAdminOrderItemsTable');
  if (!orderItemsTable) return;

  /* ---------- Print Order ---------- */
  var printOrderBtn = document.getElementById('tnAdminPrintOrder');
  if (printOrderBtn) {
    printOrderBtn.addEventListener('click', function () { window.print(); });
  }

  /* ---------- Email Invoice Toast ---------- */
  var emailInvoiceBtn = document.getElementById('tnAdminEmailInvoice');
  if (emailInvoiceBtn) {
    emailInvoiceBtn.addEventListener('click', function () {
      var toast = document.createElement('div');
      toast.className = 'tn-admin-toast tn-admin-toast-success';
      toast.innerHTML = '<i class="bi bi-check-circle"></i><span>Invoice sent to sarah.chen@email.com!</span>';
      document.body.appendChild(toast);
      requestAnimationFrame(function () {
        requestAnimationFrame(function () { toast.classList.add('tn-admin-toast-show'); });
      });
      setTimeout(function () {
        toast.classList.remove('tn-admin-toast-show');
        setTimeout(function () { toast.remove(); }, 400);
      }, 3000);
    });
  }

  /* ---------- Form Card Stagger Animation ---------- */
  function animateOrderDetailsCards() {
    var orderDetailsForm = orderItemsTable.closest('form') || orderItemsTable.closest('.row');
    if (orderDetailsForm) {
      var cards = orderDetailsForm.querySelectorAll('.tn-admin-form-card');
      cards.forEach(function (card, i) {
        card.style.opacity = '0';
        card.style.transform = 'translateY(14px)';
        setTimeout(function () {
          card.style.transition = 'opacity 0.45s ease, transform 0.45s ease';
          card.style.opacity = '1';
          card.style.transform = 'translateY(0)';
        }, 80 * i);
      });
    }
  }

  animateOrderDetailsCards();

  /* =========================================================
     CUSTOMERS PAGE — Interactive Behaviors
     ========================================================= */
  var customersTable = document.getElementById('tnAdminCustomersTable');
  if (!customersTable) return;

  var customerSearch = document.getElementById('tnAdminCustomerSearch');
  var customerStatusFilter = document.getElementById('tnAdminCustomerStatusFilter');
  var customersEmptyState = document.getElementById('tnAdminCustomersEmptyState');
  var customersCard = customersTable.closest('.tn-admin-card');
  var customersClearFilters = document.getElementById('tnAdminCustomersClearFilters');
  var customersExportBtn = document.getElementById('tnAdminCustomersExportBtn');
  var customerSelectAll = document.getElementById('tnAdminCustomerSelectAll');
  var customersBulkBar = document.getElementById('tnAdminCustomersBulkBar');
  var customersBulkCount = document.getElementById('tnAdminCustomersBulkCount');
  var customersBulkCancel = document.getElementById('tnAdminCustomersBulkCancel');
  var customerDeleteModal = document.getElementById('tnAdminCustomerDeleteModal');
  var customerModalCancel = document.getElementById('tnAdminCustomerModalCancel');
  var customerModalConfirm = document.getElementById('tnAdminCustomerModalConfirm');

  /* ---------- Search + Filter ---------- */
  function filterCustomers() {
    var query = customerSearch ? customerSearch.value.toLowerCase().trim() : '';
    var statusVal = customerStatusFilter ? customerStatusFilter.value : 'all';
    var rows = customersTable.querySelectorAll('tbody tr');
    var visibleCount = 0;

    rows.forEach(function (row) {
      var strong = (row.querySelector('.tn-admin-order-customer-info strong') || {}).textContent || '';
      var span = (row.querySelector('.tn-admin-order-customer-info span') || {}).textContent || '';
      var phone = row.cells[2] ? row.cells[2].textContent : '';
      var text = (strong + ' ' + span + ' ' + phone).toLowerCase();
      var status = row.getAttribute('data-status') || '';

      var matchSearch = !query || text.indexOf(query) !== -1;
      var matchStatus = statusVal === 'all' || status === statusVal;

      if (matchSearch && matchStatus) {
        row.style.display = '';
        visibleCount++;
      } else {
        row.style.display = 'none';
      }
    });

    if (visibleCount === 0) {
      customersTable.style.display = 'none';
      var pw = customersCard ? customersCard.querySelector('.tn-admin-pagination-wrap') : null;
      if (pw) pw.style.display = 'none';
      if (customersEmptyState) customersEmptyState.style.display = '';
    } else {
      customersTable.style.display = '';
      var pw = customersCard ? customersCard.querySelector('.tn-admin-pagination-wrap') : null;
      if (pw) pw.style.display = '';
      if (customersEmptyState) customersEmptyState.style.display = 'none';
    }

    var totalCount = rows.length;
    var tc1 = customersCard ? customersCard.querySelector('.tn-admin-toolbar-count strong:first-child') : null;
    if (tc1) tc1.textContent = '1-' + visibleCount;
    var tc2 = customersCard ? customersCard.querySelector('.tn-admin-toolbar-count strong:last-child') : null;
    if (tc2) tc2.textContent = totalCount;
  }

  if (customerSearch) customerSearch.addEventListener('input', filterCustomers);
  if (customerStatusFilter) customerStatusFilter.addEventListener('change', filterCustomers);

  /* ---------- Clear Filters ---------- */
  if (customersClearFilters) {
    customersClearFilters.addEventListener('click', function () {
      if (customerSearch) customerSearch.value = '';
      if (customerStatusFilter) customerStatusFilter.value = 'all';
      filterCustomers();
    });
  }

  /* ---------- Export Toast ---------- */
  if (customersExportBtn) {
    customersExportBtn.addEventListener('click', function () {
      var toast = document.createElement('div');
      toast.className = 'tn-admin-toast tn-admin-toast-success';
      toast.innerHTML = '<i class="bi bi-check-circle"></i><span>Customers exported successfully!</span>';
      document.body.appendChild(toast);
      requestAnimationFrame(function () {
        requestAnimationFrame(function () { toast.classList.add('tn-admin-toast-show'); });
      });
      setTimeout(function () {
        toast.classList.remove('tn-admin-toast-show');
        setTimeout(function () { toast.remove(); }, 400);
      }, 3000);
    });
  }

  /* ---------- Bulk Select ---------- */
  function updateCustomersBulkBar() {
    var checks = customersTable.querySelectorAll('.tn-admin-row-check');
    var count = 0;
    checks.forEach(function (c) { if (c.checked) count++; });
    if (customersBulkCount) customersBulkCount.textContent = count + ' selected';
    if (customersBulkBar) customersBulkBar.classList.toggle('tn-admin-bulk-bar-visible', count > 0);
  }

  if (customerSelectAll) {
    customerSelectAll.addEventListener('change', function () {
      var rows = customersTable.querySelectorAll('tbody tr');
      var visible = false;
      rows.forEach(function (row) {
        if (row.style.display !== 'none') {
          var cb = row.querySelector('.tn-admin-row-check');
          if (cb) { cb.checked = customerSelectAll.checked; visible = true; }
        }
      });
      if (!visible) customerSelectAll.checked = false;
      updateCustomersBulkBar();
    });
  }

  customersTable.addEventListener('change', function (e) {
    if (e.target.classList.contains('tn-admin-row-check')) {
      var checks = customersTable.querySelectorAll('.tn-admin-row-check');
      var allChecked = true;
      checks.forEach(function (c) { if (c.style.display !== 'none' && !c.checked) allChecked = false; });
      if (customerSelectAll) customerSelectAll.checked = allChecked;
      updateCustomersBulkBar();
    }
  });

  if (customersBulkCancel) {
    customersBulkCancel.addEventListener('click', function () {
      customersTable.querySelectorAll('.tn-admin-row-check').forEach(function (c) { c.checked = false; });
      if (customerSelectAll) customerSelectAll.checked = false;
      updateCustomersBulkBar();
    });
  }

  /* ---------- Delete Modal ---------- */
  function openCustomerDeleteModal() { if (customerDeleteModal) customerDeleteModal.classList.add('tn-admin-modal-visible'); }
  function closeCustomerDeleteModal() { if (customerDeleteModal) customerDeleteModal.classList.remove('tn-admin-modal-visible'); }

  customersTable.addEventListener('click', function (e) {
    var btn = e.target.closest('[data-delete="customer"]');
    if (btn) openCustomerDeleteModal();
  });
  if (customerModalCancel) customerModalCancel.addEventListener('click', closeCustomerDeleteModal);
  if (customerModalConfirm) {
    customerModalConfirm.addEventListener('click', function () {
      closeCustomerDeleteModal();
      var toast = document.createElement('div');
      toast.className = 'tn-admin-toast tn-admin-toast-success';
      toast.innerHTML = '<i class="bi bi-check-circle"></i><span>Customer deleted successfully!</span>';
      document.body.appendChild(toast);
      requestAnimationFrame(function () {
        requestAnimationFrame(function () { toast.classList.add('tn-admin-toast-show'); });
      });
      setTimeout(function () {
        toast.classList.remove('tn-admin-toast-show');
        setTimeout(function () { toast.remove(); }, 400);
      }, 3000);
    });
  }

  /* ---------- Bulk Action Toasts ---------- */
  ['tnAdminCustomersBulkEmail', 'tnAdminCustomersBulkDeactivate', 'tnAdminCustomersBulkActivate', 'tnAdminCustomersBulkDelete'].forEach(function (id) {
    var b = document.getElementById(id);
    if (b) {
      b.addEventListener('click', function () {
        var action = id.indexOf('Email') !== -1 ? 'Emails sent' : id.indexOf('Deactivate') !== -1 ? 'Customers deactivated' : id.indexOf('Activate') !== -1 ? 'Customers activated' : 'Customers deleted';
        var toast = document.createElement('div');
        toast.className = 'tn-admin-toast tn-admin-toast-success';
        toast.innerHTML = '<i class="bi bi-check-circle"></i><span>' + action + ' successfully!</span>';
        document.body.appendChild(toast);
        requestAnimationFrame(function () {
          requestAnimationFrame(function () { toast.classList.add('tn-admin-toast-show'); });
        });
        setTimeout(function () {
          toast.classList.remove('tn-admin-toast-show');
          setTimeout(function () { toast.remove(); }, 400);
        }, 3000);
        customersTable.querySelectorAll('.tn-admin-row-check').forEach(function (c) { c.checked = false; });
        if (customerSelectAll) customerSelectAll.checked = false;
        updateCustomersBulkBar();
      });
    }
  });

  /* ---------- Stagger Table Row Animation ---------- */
  function animateCustomerRows() {
    var rows = customersTable.querySelectorAll('tbody tr');
    rows.forEach(function (row, i) {
      row.style.opacity = '0';
      row.style.transform = 'translateY(8px)';
      setTimeout(function () {
        row.style.transition = 'opacity 0.35s ease, transform 0.35s ease';
        row.style.opacity = '1';
        row.style.transform = 'translateY(0)';
      }, 40 * i);
    });
  }

  animateCustomerRows();

  /* =========================================================
     SETTINGS PAGE — Interactive Behaviors
     ========================================================= */
  var settingsTabs = document.querySelectorAll('.tn-admin-settings-tab');
  var settingsPanels = document.querySelectorAll('.tn-admin-settings-panel');
  if (!settingsTabs.length || !settingsPanels.length) return;

  /* ---------- Tab Switching ---------- */
  settingsTabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      var target = tab.getAttribute('data-tab');
      settingsTabs.forEach(function (t) { t.classList.remove('active'); });
      tab.classList.add('active');
      settingsPanels.forEach(function (p) {
        p.style.display = p.id === 'tnAdminSettings' + target.charAt(0).toUpperCase() + target.slice(1) ? '' : 'none';
      });
    });
  });

  /* ---------- Toggle Sub-Options ---------- */
  var toggleMap = {
    tnAdminShippingFree: 'tnAdminShippingFreeOptions',
    tnAdminShippingStandard: 'tnAdminShippingStandardOptions',
    tnAdminShippingExpress: 'tnAdminShippingExpressOptions',
    tnAdminShippingOvernight: 'tnAdminShippingOvernightOptions',
    tnAdminPaymentPaypal: 'tnAdminPaymentPaypalOptions',
    tnAdminPaymentStripe: 'tnAdminPaymentStripeOptions',
    tnAdminPaymentBank: 'tnAdminPaymentBankOptions'
  };

  Object.keys(toggleMap).forEach(function (toggleId) {
    var toggle = document.getElementById(toggleId);
    var options = document.getElementById(toggleMap[toggleId]);
    if (toggle && options) {
      toggle.addEventListener('change', function () {
        options.style.display = toggle.checked ? '' : 'none';
      });
    }
  });

  /* ---------- Save Button Toasts ---------- */
  var settingsSaveIds = [
    'tnAdminSettingsGeneralSave',
    'tnAdminSettingsShippingSave',
    'tnAdminSettingsPaymentSave',
    'tnAdminSettingsSecuritySave',
    'tnAdminSettingsNotifSave'
  ];

  settingsSaveIds.forEach(function (id) {
    var btn = document.getElementById(id);
    if (btn) {
      btn.addEventListener('click', function () {
        var toast = document.createElement('div');
        toast.className = 'tn-admin-toast tn-admin-toast-success';
        toast.innerHTML = '<i class="bi bi-check-circle"></i><span>Settings saved successfully!</span>';
        document.body.appendChild(toast);
        requestAnimationFrame(function () {
          requestAnimationFrame(function () { toast.classList.add('tn-admin-toast-show'); });
        });
        setTimeout(function () {
          toast.classList.remove('tn-admin-toast-show');
          setTimeout(function () { toast.remove(); }, 400);
        }, 3000);
      });
    }
  });

  /* ---------- Reset Button Confirmation ---------- */
  document.querySelectorAll('.tn-admin-settings-panel form').forEach(function (form) {
    form.addEventListener('reset', function () {
      setTimeout(function () {
        form.querySelectorAll('.tn-admin-settings-sub-options').forEach(function (opt) {
          var toggle = opt.previousElementSibling ? opt.previousElementSibling.querySelector('.tn-admin-toggle-input') : null;
          if (toggle && !toggle.checked) opt.style.display = 'none';
        });
      }, 10);
    });
  });

  /* ---------- Settings Card Stagger Animation ---------- */
  function animateSettingsCards() {
    var activePanel = document.querySelector('.tn-admin-settings-panel.active');
    if (!activePanel) return;
    var cards = activePanel.querySelectorAll('.tn-admin-form-card');
    cards.forEach(function (card, i) {
      card.style.opacity = '0';
      card.style.transform = 'translateY(12px)';
      setTimeout(function () {
        card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
        card.style.opacity = '1';
        card.style.transform = 'translateY(0)';
      }, 80 * i);
    });
  }

  animateSettingsCards();

  /* =========================================================
     PROFILE PAGE — Interactive Behaviors
     ========================================================= */
  var profileForm = document.getElementById('tnAdminProfileForm');
  if (!profileForm) return;

  /* ---------- Toast Helper ---------- */
  function profileToast(msg) {
    var toast = document.createElement('div');
    toast.className = 'tn-admin-toast tn-admin-toast-success';
    toast.innerHTML = '<i class="bi bi-check-circle"></i><span>' + msg + '</span>';
    document.body.appendChild(toast);
    requestAnimationFrame(function () {
      requestAnimationFrame(function () { toast.classList.add('tn-admin-toast-show'); });
    });
    setTimeout(function () {
      toast.classList.remove('tn-admin-toast-show');
      setTimeout(function () { toast.remove(); }, 400);
    }, 3000);
  }

  /* ---------- Save Profile ---------- */
  var profileSaveBtn = document.getElementById('tnAdminProfileSaveBtn');
  if (profileSaveBtn) {
    profileSaveBtn.addEventListener('click', function () { profileToast('Profile updated successfully!'); });
  }

  /* ---------- Update Password ---------- */
  var passwordSaveBtn = document.getElementById('tnAdminPasswordSaveBtn');
  if (passwordSaveBtn) {
    passwordSaveBtn.addEventListener('click', function () {
      var current = document.getElementById('tnAdminProfileCurrentPass');
      var newPass = document.getElementById('tnAdminProfileNewPass');
      var confirm = document.getElementById('tnAdminProfileConfirmPass');
      if (newPass && confirm && newPass.value && newPass.value !== confirm.value) {
        var toast = document.createElement('div');
        toast.className = 'tn-admin-toast tn-admin-toast-error';
        toast.innerHTML = '<i class="bi bi-exclamation-circle"></i><span>Passwords do not match!</span>';
        document.body.appendChild(toast);
        requestAnimationFrame(function () {
          requestAnimationFrame(function () { toast.classList.add('tn-admin-toast-show'); });
        });
        setTimeout(function () {
          toast.classList.remove('tn-admin-toast-show');
          setTimeout(function () { toast.remove(); }, 400);
        }, 3000);
        return;
      }
      profileToast('Password updated successfully!');
      if (current) current.value = '';
      if (newPass) newPass.value = '';
      if (confirm) confirm.value = '';
    });
  }

  /* ---------- Change Avatar ---------- */
  var changeAvatarBtn = document.getElementById('tnAdminChangeAvatarBtn');
  if (changeAvatarBtn) {
    changeAvatarBtn.addEventListener('click', function () { profileToast('Avatar updated successfully!'); });
  }

  /* ---------- Export Data ---------- */
  var exportBtn = document.getElementById('tnAdminProfileExportBtn');
  if (exportBtn) {
    exportBtn.addEventListener('click', function () { profileToast('Profile data exported!'); });
  }

  /* ---------- Delete Account ---------- */
  var deleteBtn = document.getElementById('tnAdminProfileDeleteBtn');
  if (deleteBtn) {
    deleteBtn.addEventListener('click', function () {
      var toast = document.createElement('div');
      toast.className = 'tn-admin-toast tn-admin-toast-error';
      toast.innerHTML = '<i class="bi bi-exclamation-circle"></i><span>Account deletion is disabled in demo mode.</span>';
      document.body.appendChild(toast);
      requestAnimationFrame(function () {
        requestAnimationFrame(function () { toast.classList.add('tn-admin-toast-show'); });
      });
      setTimeout(function () {
        toast.classList.remove('tn-admin-toast-show');
        setTimeout(function () { toast.remove(); }, 400);
      }, 3000);
    });
  }

  /* ---------- Profile Card Stagger Animation ---------- */
  function animateProfileCards() {
    var cards = document.querySelectorAll('.tn-admin-profile-header-card, .tn-admin-main .tn-admin-form-card');
    cards.forEach(function (card, i) {
      card.style.opacity = '0';
      card.style.transform = 'translateY(12px)';
      setTimeout(function () {
        card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
        card.style.opacity = '1';
        card.style.transform = 'translateY(0)';
      }, 80 * i);
    });
  }

  animateProfileCards();

  /* =========================================================
     ADMIN LOGIN PAGE
     ========================================================= */

  /* ---------- Password Toggle ---------- */
  var loginToggleBtn = document.getElementById('tnAdminTogglePassword');
  if (loginToggleBtn) {
    loginToggleBtn.addEventListener('click', function () {
      var pw = document.getElementById('tnAdminLoginPassword');
      var icon = this.querySelector('i');
      if (pw.type === 'password') {
        pw.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
      } else {
        pw.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
      }
    });
  }

  /* ---------- Login Form Submit ---------- */
  var loginForm = document.getElementById('tnAdminLoginForm');
  if (loginForm) {
    loginForm.addEventListener('submit', function () {
      var btn = document.getElementById('tnAdminLoginBtn');
      if (btn) {
        btn.classList.add('tn-admin-login-btn-loading');
      }
    });
  }

})();
