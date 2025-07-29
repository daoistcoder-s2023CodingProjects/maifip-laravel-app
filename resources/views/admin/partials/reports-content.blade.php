<!-- Reports Main Content Partial -->
<div id="reports-section" style="display:none;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="dashboard-title" style="font-size:1.5rem;font-weight:700;color:#186737;">Reports</div>
            <div style="font-size:1rem;color:#186737;"><i class="bi bi-grid"></i> Dashboard <span style="color:#b0b0b0;">/ Reports</span></div>
        </div>
        @include('admin.partials.navbar')
    </div>
    <div class="card p-4 mb-4" style="border:1px solid #e0e0e0;background:#fff;">
        <div class="d-flex gap-3 mb-4">
            <button class="btn btn-success px-4 py-2" data-bs-toggle="modal" data-bs-target="#generateReportModal"><i class="bi bi-bar-chart"></i> Generate New Report</button>
            {{-- <button class="btn btn-outline-success px-4 py-2"><i class="bi bi-download"></i> Export</button> --}}
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label mb-1" style="font-weight:500;">Report Type</label>
                <select class="form-select">
                    <option selected>Select</option>
                    <option value="patient-list-coa">Summary of Patient List w/ COA Report</option>
                    <option value="fund-utilization">Fund Utilization Report Summary</option>
                    <option value="monthly-patients" disabled>List of All Patients Served Monthly Report (coming soon)</option>
                </select>
            </div>
            {{-- <div class="col-md-3">
                <label class="form-label mb-1" style="font-weight:500;">Date Range</label>
                <input type="text" class="form-control" placeholder="mm/dd/yyyy - mm/dd/yyyy">
            </div> --}}
        </div>
        <div class="table-responsive">
            <table id="reports-table" class="table table-borderless align-middle">
                <thead>
                    <tr class="table-header-green">
                        <th>Report Name</th>
                        <th>Report Type</th>
                        <th>Created By</th>
                        <th>Date Generated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be loaded here -->
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="text-muted" style="font-size:0.95rem;">
                Row per page 
                <select id="reportsRowPerPageSelect" style="border:none;background:transparent;outline:none;">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
                <span id="reports-table-range-info"></span>
            </div>
            <nav>
                <ul class="pagination mb-0" id="reports-pagination">
                    <!-- Pagination will be rendered here -->
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Generate Report Modal -->
<div class="modal fade" id="generateReportModal" tabindex="-1" aria-labelledby="generateReportModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="maifip-modal-header" style="width:100%; justify-content:center; background:transparent; border:none; box-shadow:none; margin-bottom:2.5rem; padding-top:2.2rem;">
        <img src="/images/maifip_logo.png" alt="MAIFIP Logo" style="height:54px;width:54px;margin-right:1.2rem;">
        <div>
          <div class="maifip-modal-title">M A I F I P</div>
          <div class="maifip-modal-sub">Medical Assistance to Indigent and Financially Incapacitated Patients</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position:absolute;right:2.2rem;top:2.2rem;"></button>
      </div>
      <div class="modal-body" style="background: #f8f9fa !important; padding: 2rem 2rem 1.5rem 2rem;">
        <form id="generateReportForm">
          <div class="mb-3">
            <label class="form-label">Report Type</label>
            <select class="form-select" id="reportTypeSelect" name="report_type" required>
              <option value="" selected>Select</option>
              <option value="patient-list-coa">Summary of Patient List w/ COA Report</option>
              <option value="fund-utilization">Fund Utilization Report Summary</option>
              <option value="monthly-patients" disabled>List of All Patients Served Monthly Report (coming soon)</option>
            </select>
          </div>
          <div id="reportFieldsContainer">
            <!-- Dynamic fields will be injected here by JS -->
          </div>
        </form>
      </div>
      <div class="d-flex justify-content-between" style="padding: 0 1.75rem 1rem 1.75rem;">
        <button type="button" class="btn btn-outline-success btn-lg w-50 me-2" data-bs-dismiss="modal" style="max-width:50%;">Cancel</button>
        <button type="button" class="btn btn-success btn-lg w-50 ms-2" id="generateReportSubmit" style="max-width:50%;">Generate/Export</button>
      </div>
    </div>
  </div>
</div>
<script>
const hospitals = [
    'Bicol Access Health Centrum',
    'Bicol Medical Center',
    'Bicol Region General Hospital and Geriatric Medical Center',
    'Caramoan Municipal Hospital',
    'CHMSC Lourdes Hospital',
    'Dr. Nilo O. Roa Memorial Foundation Hospital Inc.',
    'Libmanan District Hospital',
    'Naga City General Hospital',
    'Ocampo Municipal Hospital',
    'Our Lady Mediatrix Hospital',
    'Our Lady of Lourdes Infirmary',
    'Ragay District Hospital',
    'Sagnay Infirmary',
    'San Jose Medicare Community Hospital',
];

function showToast(message, isError = false) {
    // Use main blade toast notification function if available
    if (window.showStatusToast) {
        window.showStatusToast(message, isError);
    } else {
        alert(message);
    }
}

let reportsCurrentPage = 1;
let reportsPerPage = 10;
let reportsLastPage = 1;

function fetchReportsAndUpdateTable(page = 1, perPage = 10) {
    const tbody = document.querySelector('#reports-table tbody');
    if (!tbody) return;
    fetch(`/admin/dashboard/reports?page=${page}&per_page=${perPage}`)
        .then(res => res.json())
        .then(data => {
            tbody.innerHTML = '';
            if (data.success && Array.isArray(data.data)) {
                if (data.data.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="5" class="text-center text-muted">No reports found.</td></tr>`;
                } else {
                    data.data.forEach(report => {
                        tbody.innerHTML += `
                            <tr>
                                <td>${report.report_name}</td>
                                <td>${report.report_type_label ?? report.report_type}</td>
                                <td>${report.created_by}</td>
                                <td>${new Date(report.date_generated).toLocaleDateString()}</td>
                                <td><button class='btn btn-sm btn-outline-secondary'>View</button></td>
                            </tr>
                        `;
                    });
                }
                // Update pagination info
                reportsCurrentPage = data.current_page;
                reportsPerPage = data.per_page;
                reportsLastPage = data.last_page;
                updateReportsPagination(data.total);
            }
        });
}

function updateReportsPagination(total) {
    const pagination = document.getElementById('reports-pagination');
    const rangeInfo = document.getElementById('reports-table-range-info');
    pagination.innerHTML = '';
    if (reportsLastPage <= 1) {
        rangeInfo.textContent = '';
        return;
    }
    // Range info
    const start = (reportsCurrentPage - 1) * reportsPerPage + 1;
    const end = Math.min(start + reportsPerPage - 1, total);
    rangeInfo.textContent = `${start}-${end} of ${total}`;
    // Pagination buttons
    for (let i = 1; i <= reportsLastPage; i++) {
        pagination.innerHTML += `<li class="page-item${i === reportsCurrentPage ? ' active' : ''}">
            <a class="page-link" href="#" onclick="fetchReportsAndUpdateTable(${i},${reportsPerPage});return false;">${i}</a>
        </li>`;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Dynamic modal fields for report type
    const reportTypeSelect = document.getElementById('reportTypeSelect');
    const reportFieldsContainer = document.getElementById('reportFieldsContainer');

    function renderPatientListFields() {
        // Initial fields for patient-list-coa
        let html = `
        <div class="mb-3">
          <label class="form-label">Report Range</label>
          <select class="form-select" name="report_range" id="reportRangeSelect" required>
            <option value="" selected>Select Range</option>
            <option value="day">Day</option>
            <option value="month">Month</option>
            <option value="year">Year</option>
          </select>
        </div>
        <div id="reportRangeFields"></div>
        <div class="mb-3">
          <label class="form-label">Facility</label>
          <select class="form-select" name="facility" required>
            <option value="" selected>Select Facility</option>
            ${hospitals.map(h => `<option value="${h}">${h}</option>`).join('')}
          </select>
        </div>
        `;
        reportFieldsContainer.innerHTML = html;

        // Add event listener for range select
        const reportRangeSelect = document.getElementById('reportRangeSelect');
        const reportRangeFields = document.getElementById('reportRangeFields');
        if (reportRangeSelect) {
            reportRangeSelect.onchange = function() {
                const range = this.value;
                let rangeHtml = '';
                const currentYear = new Date().getFullYear();
                if (range === 'day') {
                    rangeHtml = `
                    <div class="mb-3">
                      <label class="form-label">Day</label>
                      <input type="date" class="form-control" name="day" required>
                    </div>
                    `;
                } else if (range === 'month') {
                    rangeHtml = `
                    <div class="mb-3">
                      <label class="form-label">Month</label>
                      <select class="form-select" name="month" required>
                        ${[...Array(12)].map((_, i) => {
                            const month = i + 1;
                            return `<option value="${month}">${new Date(0, month-1).toLocaleString('default', { month: 'long' })}</option>`;
                        }).join('')}
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Year</label>
                      <select class="form-select" name="year" required>
                        ${[...Array(6)].map((_, i) => {
                            const year = currentYear - i;
                            return `<option value="${year}"${i===0?' selected':''}>${year}</option>`;
                        }).join('')}
                      </select>
                    </div>
                    `;
                } else if (range === 'year') {
                    rangeHtml = `
                    <div class="mb-3">
                      <label class="form-label">Year</label>
                      <select class="form-select" name="year" required>
                        ${[...Array(6)].map((_, i) => {
                            const year = currentYear - i;
                            return `<option value="${year}"${i===0?' selected':''}>${year}</option>`;
                        }).join('')}
                      </select>
                    </div>
                    `;
                }
                reportRangeFields.innerHTML = rangeHtml;
            };
        }
    }

    if (reportTypeSelect) {
        reportTypeSelect.onchange = function() {
            const type = this.value;
            let html = '';
            if (type === 'patient-list-coa') {
                renderPatientListFields();
                return;
            } else if (type === 'fund-utilization') {
                const currentYear = new Date().getFullYear();
                html += `
                <div class="mb-3">
                  <label class="form-label">Year</label>
                  <select class="form-select" name="year" required>
                    ${[...Array(6)].map((_, i) => {
                        const year = currentYear - i;
                        return `<option value="${year}"${i===0?' selected':''}>${year}</option>`;
                    }).join('')}
                  </select>
                </div>
                `;
            }
            reportFieldsContainer.innerHTML = html;
        };
    }

    // Reset modal fields when closed
    const generateReportModal = document.getElementById('generateReportModal');
    if (generateReportModal) {
        generateReportModal.addEventListener('hidden.bs.modal', function() {
            const reportTypeSelect = document.getElementById('reportTypeSelect');
            const reportFieldsContainer = document.getElementById('reportFieldsContainer');
            if (reportTypeSelect) reportTypeSelect.value = '';
            if (reportFieldsContainer) reportFieldsContainer.innerHTML = '';
        });
    }

    // Optionally handle Generate/Export button click
    document.getElementById('generateReportSubmit').onclick = function() {
        const form = document.getElementById('generateReportForm');
        const formData = new FormData(form);
        // Open PDF download in new tab
        const params = new URLSearchParams();
        for (const [key, value] of formData.entries()) {
            params.append(key, value);
        }
        const url = '/admin/dashboard/reports/generate';
        // Create a temporary form to POST and open in new tab
        const tempForm = document.createElement('form');
        tempForm.action = url + '?' + params.toString();
        tempForm.method = 'POST';
        tempForm.target = '_blank';
        // Add CSRF token
        const csrf = document.querySelector('meta[name="csrf-token"]');
        if (csrf) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = '_token';
            input.value = csrf.content;
            tempForm.appendChild(input);
        }
        // Add all fields
        for (const [key, value] of formData.entries()) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = key;
            input.value = value;
            tempForm.appendChild(input);
        }
        document.body.appendChild(tempForm);
        tempForm.submit();
        document.body.removeChild(tempForm);

        // Close modal, show toast, refresh table
        const modal = bootstrap.Modal.getInstance(document.getElementById('generateReportModal'));
        if (modal) modal.hide();
        showToast('Report requested. It will be available shortly.', false);
        setTimeout(fetchReportsAndUpdateTable, 1200);
    };

    document.getElementById('reportsRowPerPageSelect').onchange = function() {
        reportsPerPage = parseInt(this.value);
        fetchReportsAndUpdateTable(1, reportsPerPage);
    };
    fetchReportsAndUpdateTable();
});
</script>
