@include('admin.partials.application-details-modal')
<!-- Toast Notification -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
  <div id="statusToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body" id="statusToastBody">
        <!-- Message will be set by JS -->
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
<!-- Modal Loading Spinner Overlay -->
<div id="modalLoadingSpinner" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; z-index:1055; background:rgba(255,255,255,0.6); align-items:center; justify-content:center;">
  <div class="spinner-border text-success" style="width:3rem;height:3rem;" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>
<!-- JS for modal moved to bottom for better organization -->
@extends('layouts.app')
@section('content')
<div class="d-flex" style="min-height:100vh;background:#f8f9fa;">
    <!-- Side Menu -->
    @include('admin.partials.sidebar')
    <!-- Main Content -->
    <main class="flex-fill p-4">
        @include('admin.partials.dashboard-content')
        @include('admin.partials.applications-content')
        @include('admin.partials.reports-content')
        @include('admin.partials.users-content')
    </main>
</div>
<!-- Optionally include Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
<style>
.sidebar {
    min-height: 100vh;
    border-right: 1.5px solid #e0e0e0;
    width: 264px !important;
}
.sidebar .nav-link.sidebar-link {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-size: 1.06rem;
    font-weight: 600;
    color: #222;
    padding: 0.94rem 1.02rem;
    border-radius: 10.5px;
    transition: background 0.2s, color 0.2s;
    position: relative;
}
.sidebar .nav-link.sidebar-link.active {
    background: #186737;
    color: #fff;
    font-size: 1.15rem;
    font-weight: 700;
    box-shadow: 0 4px 24px 0 rgba(24,103,55,0.08);
    border-radius: 10.5px;
}
.sidebar .nav-link.sidebar-link.active::before {
    display: none;
}
.sidebar-label {
    font-size: 1.15rem;
    font-weight: 600;
    letter-spacing: 0.01em;
}
@media (max-width: 900px) {
    .sidebar .nav-link.sidebar-link, .sidebar .nav-link.sidebar-link.active {
        font-size: 0.94rem;
        padding: 0.8rem 0.9rem;
    }
    .sidebar-label {
        font-size: 0.85rem;
    }
}
.card {
    border-radius: 14px;
    box-shadow: 0 2px 8px 0 rgba(24,103,55,0.03);
}
.dashboard-summary-card {
    border-radius: 16px;
    box-shadow: 0 4px 24px 0 rgba(24,103,55,0.04);
    background: #fff;
}
.summary-card {
    border: 1.5px solid #e0e0e0;
    box-shadow: none;
    border-radius: 14px;
    background: #fff;
}
.summary-title {
    color: #186737;
    font-weight: 600;
    font-size: 1.1rem;
    margin-bottom: 0.5rem;
    text-align: left;
}
.summary-value {
    font-size: 2rem;
    font-weight: 700;
    color: #222;
    text-align: left;
}
.summary-desc {
    font-size: 0.98rem;
    color: #222;
    margin-top: 0.3rem;
    text-align: left;
}
.summary-number {
    color: #186737;
    font-weight: 600;
}
.icon-btn {
    color: #186737;
    font-size: 1.5rem;
    margin-left: 0.5rem;
    text-decoration: none;
    transition: color 0.2s;
}
.icon-btn:hover {
    color: #14582b;
}
.dashboard-title {
    font-size: 2rem;
    font-weight: 700;
    color: #186737;
    margin-bottom: 0.1rem;
}
.services-cards {
    gap: 2rem 1.5rem;
}
.service-card {
    background: #fff;
    border: 1.5px solid #e0e0e0;
    border-radius: 16px;
    box-shadow: 0 2px 8px 0 rgba(24,103,55,0.03);
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    height: 100%;
    transition: box-shadow 0.2s;
}
.service-card:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 8px 32px 0 rgba(24,103,55,0.15);
}
.service-icon {
    border-radius: 50%;
    width: 62px;
    height: 62px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.2rem;
}
.service-icon img {
    width: 62px;
    height: 62px;
    object-fit: contain;
}
.service-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #222;
    margin-bottom: 0.5rem;
}
.service-stats {
    display: flex;
    justify-content: space-between;
    width: 100%;
    font-size: 1rem;
    color: #4a5568;
    margin-bottom: 0.2rem;
    margin-left: 0.5rem;
}
.service-value {
    color: #186737;
    font-weight: 600;
    margin-left: auto;
}
.btn.btn-success, .btn.btn-success:focus, .btn.btn-success:active, .btn.btn-success.active {
    background: #186737 !important;
    border-color: #186737 !important;
    color: #fff !important;
    box-shadow: none !important;
}
.btn.btn-outline-success {
    color: #186737 !important;
    border-color: #186737 !important;
    background: #fff !important;
}
.btn.btn-outline-success:hover, .btn.btn-outline-success:focus, .btn.btn-outline-success:active, .btn.btn-outline-success.active {
    background: #186737 !important;
    color: #fff !important;
    border-color: #186737 !important;
}
.btn:hover {
    opacity: 0.9;
    transition: opacity 0.2s ease;
}

/* Update hover effect for top-right user icons */
.icon-btn.icon-circle:hover {
    background-color: #186737 !important;
    color: #fff !important;
    border-color: #14582b !important;
    transition: background-color 0.3s, color 0.3s, border-color 0.3s;
}

/* Ensure the actual icon inside the circle turns white */
.icon-btn.icon-circle i {
    transition: color 0.3s;
}
.icon-btn.icon-circle:hover i {
    color: #fff !important;
}
.table-header-green th {
    color: #186737 !important;
    font-weight: 700;
}
.pagination .page-item.active .page-link {
    background-color: #186737 !important;
    border-color: #186737 !important;
    color: #fff !important;
    font-weight: 700;
}
.pagination .page-link {
    color: #186737 !important;
    border-radius: 8px !important;
    border: 1.5px solid #e0e0e0 !important;
    transition: background-color 0.2s, color 0.2s;
}
.pagination .page-item:not(.active) .page-link:hover {
    background-color: #eaf8f2 !important;
    color: #186737 !important;
}
.pagination .page-item {
    margin-right: 10px !important;
}
.pagination .page-item:last-child {
    margin-right: 0 !important;
}
</style>
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Bootstrap 5 JS CDN (required for modal JS API) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fetch and populate applicants table
    const tableBody = document.getElementById('applications-table-body');

    // Store applicant id for modal actions
    let currentApplicantId = null;
    // Listen for modal show to set currentApplicantId
    window.showApplicationDetailsModal = function(btn) {
        const app = btn.getAttribute('data-app');
        if (!app) return;
        let data;
        try { data = JSON.parse(app); } catch { return; }
        currentApplicantId = data.applicant_id;

        // Show details section, hide approve section and set buttons
        document.getElementById('modalDetailsSection').style.display = '';
        document.getElementById('modalApproveSection').style.display = 'none';
        document.getElementById('modal_action_btns').style.display = '';

        // Populate all modal fields (match summary accordion)
        document.getElementById('modal_summary_hospital_name').textContent = data.hospital_name || '';
        document.getElementById('modal_summary_category').textContent = data.category || '';
        document.getElementById('modal_summary_interview_date').textContent = data.interview_date || '';
        document.getElementById('modal_summary_interview_venue').textContent = data.interview_venue || '';
        document.getElementById('modal_summary_interview_start_time').textContent = data.interview_start_time || '';
        document.getElementById('modal_summary_interview_end_time').textContent = data.interview_end_time || '';
        document.getElementById('modal_summary_informant_name').textContent = data.informant_name || '';
        document.getElementById('modal_summary_relation_to_patient').textContent = data.relation_to_patient || '';
        document.getElementById('modal_summary_informant_contact_number').textContent = data.informant_contact_number || '';
        document.getElementById('modal_summary_informant_address').textContent = data.informant_address || '';
        // Patient Info
        document.getElementById('modal_summary_patient_family_name').textContent = data.patient_family_name || '';
        document.getElementById('modal_summary_patient_first_name').textContent = data.patient_first_name || '';
        document.getElementById('modal_summary_patient_middle_name').textContent = data.patient_middle_name || '';
        document.getElementById('modal_summary_patient_extension').textContent = data.patient_extension || '';
        document.getElementById('modal_summary_patient_birthdate').textContent = data.patient_birthdate || '';
        document.getElementById('modal_summary_patient_age').textContent = data.patient_age || '';
        document.getElementById('modal_summary_patient_gender').textContent = data.patient_gender || '';
        document.getElementById('modal_summary_patient_contact_number').textContent = data.patient_contact_number || '';
        document.getElementById('modal_summary_place_of_birth').textContent = data.place_of_birth || '';
        document.getElementById('modal_summary_nationality').textContent = data.nationality || '';
        document.getElementById('modal_summary_religion').textContent = data.religion || '';
        document.getElementById('modal_summary_permanent_address').textContent = data.permanent_address || '';
        document.getElementById('modal_summary_temporary_address').textContent = data.temporary_address || '';
        document.getElementById('modal_summary_civil_status').textContent = data.civil_status || '';
        document.getElementById('modal_summary_living_status').textContent = data.living_status || '';
        document.getElementById('modal_summary_highest_education').textContent = data.highest_education || '';
        document.getElementById('modal_summary_occupation').textContent = data.occupation || '';
        document.getElementById('modal_summary_monthly_income').textContent = data.monthly_income || '';
        document.getElementById('modal_summary_philhealth_pin').textContent = data.philhealth_pin || '';
        document.getElementById('modal_summary_philhealth_contributor_status').textContent = data.philhealth_contributor_status || '';
        // Family Composition (support stringified JSON or array)
        let famComp = data.family_composition;
        if (typeof famComp === 'string') {
            try { famComp = JSON.parse(famComp); } catch { famComp = []; }
        }
        if (famComp && Array.isArray(famComp)) {
            let famTable = '<table class="table table-sm table-bordered" style="font-size:0.97em;"><thead><tr><th>Name</th><th>Date of Birth</th><th>Age</th><th>Relationship</th></tr></thead><tbody>';
            let hasData = false;
            famComp.forEach(row => {
                if (row.name || row.birthdate || row.age || row.relationship) {
                    famTable += `<tr><td>${row.name||''}</td><td>${row.birthdate||''}</td><td>${row.age||''}</td><td>${row.relationship||''}</td></tr>`;
                    hasData = true;
                }
            });
            famTable += '</tbody></table>';
            document.getElementById('modal_summary_family_composition').innerHTML = hasData ? famTable : '<em>No family members listed.</em>';
        } else {
            document.getElementById('modal_summary_family_composition').innerHTML = '<em>No family members listed.</em>';
        }

        // MSWD Classification (populate spans directly)

        document.getElementById('modal_summary_mswd_main_classification').textContent = data.mswd_main_classification || '-';
        document.getElementById('modal_summary_mswd_sub_classification').textContent = data.mswd_sub_classification || '-';
        document.getElementById('modal_summary_mswd_marginalized_sector').textContent = data.mswd_marginalized_sector || '-';
        document.getElementById('modal_summary_mswd_mss_class').textContent = data.mswd_mss_class || '-';

        // Monthly Expenses breakdown table
        let expenses = data.monthly_expenses;
        if (typeof expenses === 'string') {
            try { expenses = JSON.parse(expenses); } catch { expenses = {}; }
        }
        let expenseRows = '';
        let total = 0;
        if (expenses && typeof expenses === 'object') {
            Object.entries(expenses).forEach(([particular, amount]) => {
                if (amount && !isNaN(amount)) {
                    total += parseFloat(amount);
                    expenseRows += `<tr><td>${particular}</td><td class="text-end">₱ ${parseFloat(amount).toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2})}</td></tr>`;
                }
            });
        }
        let expenseTable = `<table class="table table-sm table-bordered" style="font-size:0.97em; margin-bottom:0;">
            <thead><tr><th>Particulars</th><th class="text-end">Estimated Monthly Cost</th></tr></thead>
            <tbody>${expenseRows}</tbody>
            <tfoot><tr><th>Total</th><th class="text-end">₱ ${total.toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2})}</th></tr></tfoot>
        </table>`;
        document.getElementById('modal_summary_monthly_expenses').innerHTML = expenseRows ? expenseTable : '<em>No monthly expenses listed.</em>';

        // Medical Data (populate spans directly)
        document.getElementById('modal_summary_admitting_diagnosis').textContent = data.admitting_diagnosis || '-';
        document.getElementById('modal_summary_final_diagnosis').textContent = data.final_diagnosis || '-';
        document.getElementById('modal_summary_duration_of_problems').textContent = data.duration_of_problems || '-';
        document.getElementById('modal_summary_previous_treatment').textContent = data.previous_treatment || '-';
        document.getElementById('modal_summary_present_treatment_plan').textContent = data.present_treatment_plan || '-';
        document.getElementById('modal_summary_health_accessibility_problem').textContent = data.health_accessibility_problem || '-';
        document.getElementById('modal_summary_assessment_findings').textContent = data.assessment_findings || '-';
        document.getElementById('modal_summary_recommended_interventions').textContent = data.recommended_interventions || '-';

        // Show/hide approve/decline buttons based on application_status
        const btnDiv = document.getElementById('modal_action_btns');
        if (btnDiv) {
            if (data.application_status == 'pending') {
                btnDiv.style.setProperty('display', '', 'important');
            } else {
                btnDiv.style.setProperty('display', 'none', 'important');
            }
        }

        // Programmatically show the modal using Bootstrap 5 JS API
        var modalEl = document.getElementById('applicationDetailsModal');
        if (modalEl) {
            var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();

            // Reset modal to details section when closed
            modalEl.addEventListener('hidden.bs.modal', function handler() {
                document.getElementById('modalDetailsSection').style.display = '';
                document.getElementById('modalApproveSection').style.display = 'none';
                document.getElementById('modal_action_btns').style.display = '';
                document.getElementById('approveModalButtonDiv').style.setProperty('display', 'none', 'important');
                // Collapse all accordion sections when modal is closed
                var accordions = modalEl.querySelectorAll('.accordion-collapse');
                accordions.forEach(function(acc) {
                    acc.classList.remove('show');
                });
                // Remove highlight from all accordion headers
                var accordionBtns = modalEl.querySelectorAll('.accordion-button');
                accordionBtns.forEach(function(btn) {
                    btn.classList.add('collapsed');
                    btn.setAttribute('aria-expanded', 'false');
                });
                modalEl.removeEventListener('hidden.bs.modal', handler);
            });
        }
    }

    // --- Approve/Decline logic using API ---
    function updateApplicantStatus(applicantId, status, extra = {}) {
        // If status is 'approved', show approve section and capture input fields
        if (status === 'approved') {
            // Hide details, show approve form and buttons
            document.getElementById('modalDetailsSection').style.display = 'none';
            document.getElementById('modalApproveSection').style.display = '';
            document.getElementById('modal_action_btns').style.setProperty('display', 'none', 'important');
            document.getElementById('approveModalButtonDiv').style.display = '';

            // Handle approve modal submit
            document.getElementById('approveModalSubmit').onclick = function() {
                const medicalServiceInput = document.getElementById('approveMedicalService');
                const assistanceAmountInput = document.getElementById('approveAssistanceAmount');
                const medicalService = medicalServiceInput.value;
                const assistanceAmount = assistanceAmountInput.value;
                // Validation
                if (!medicalService || !assistanceAmount) {
                    showStatusToast('Medical Service and Assistance Amount cannot be empty.', true);
                    return;
                }
                setModalLoading(true);
                // Call API with extra fields
                sendStatusUpdate(applicantId, status, {
                    medical_service: medicalService,
                    maifip_assistance_amount: assistanceAmount
                });
                // Clear input fields
                medicalServiceInput.selectedIndex = 0;
                assistanceAmountInput.value = '';
                // Modal will be hidden after request completes
            };
            // Handle approve modal cancel/close
            document.getElementById('approveModalCancel').onclick = function() {
                document.getElementById('approveMedicalService').selectedIndex = 0;
                document.getElementById('approveAssistanceAmount').value = '';
                bootstrap.Modal.getOrCreateInstance(document.getElementById('applicationDetailsModal')).hide();
            };
        } else {
            // Decline: call API immediately
            sendStatusUpdate(applicantId, status, extra);
            bootstrap.Modal.getOrCreateInstance(document.getElementById('applicationDetailsModal')).hide();
        }
    }

    // Helper to send status update API call
    function sendStatusUpdate(applicantId, status, extra = {}) {
        setModalLoading(true);
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
        if (!csrfToken) {
            setModalLoading(false);
            bootstrap.Modal.getOrCreateInstance(document.getElementById('applicationDetailsModal')).hide();
            showStatusToast('CSRF token not found. Make sure <meta name="csrf-token" content="{{ csrf_token() }}"> is in your <head>.', true);
            return;
        }
        fetch(`/admin/applicant/${applicantId}/update-status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ application_status: status, ...extra })
        })
        .then(res => {
            const contentType = res.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                return res.json();
            } else {
                setModalLoading(false);
                bootstrap.Modal.getOrCreateInstance(document.getElementById('applicationDetailsModal')).hide();
                return res.text().then(text => {
                    showStatusToast('Non-JSON response: ' + text, true);
                    return {};
                });
            }
        })
        .then((data) => {
            setModalLoading(false);
            bootstrap.Modal.getOrCreateInstance(document.getElementById('applicationDetailsModal')).hide();
            refreshApplicantsTable();
            showStatusToast('Applicant status updated successfully.', false);
        })
        .catch(err => {
            setModalLoading(false);
            bootstrap.Modal.getOrCreateInstance(document.getElementById('applicationDetailsModal')).hide();
            showStatusToast('Error updating applicant status: ' + err, true);
        });
    }

    // Toast notification function
    function showStatusToast(message, isError) {
        const toastEl = document.getElementById('statusToast');
        const toastBody = document.getElementById('statusToastBody');
        toastBody.textContent = message;
        toastEl.classList.remove('text-bg-success', 'text-bg-danger');
        toastEl.classList.add(isError ? 'text-bg-danger' : 'text-bg-success');
        const toast = bootstrap.Toast.getOrCreateInstance(toastEl);
        toast.show();
    }

    // Approve button handler
    document.getElementById('approveApplicationBtn').onclick = function() {
        // Show approve form section
        updateApplicantStatus(currentApplicantId, 'approved');
    };
    // Decline button handler
    document.getElementById('declineApplicationBtn').onclick = function() {
        updateApplicantStatus(currentApplicantId, 'declined');
    };

    // --- Application status filter logic ---
    let currentStatus = 'pending'; // default
    let currentPage = 1;
    let perPage = 10;

    function setActiveStatusButton(status) {
        document.getElementById('pendingApplicationsBtn').classList.toggle('btn-success', status === 'pending');
        document.getElementById('pendingApplicationsBtn').classList.toggle('btn-outline-success', status !== 'pending');
        document.getElementById('approvedApplicationsBtn').classList.toggle('btn-success', status === 'approved');
        document.getElementById('approvedApplicationsBtn').classList.toggle('btn-outline-success', status !== 'approved');
        document.getElementById('declinedApplicationsBtn').classList.toggle('btn-success', status === 'declined');
        document.getElementById('declinedApplicationsBtn').classList.toggle('btn-outline-success', status !== 'declined');
    }

    document.getElementById('pendingApplicationsBtn').onclick = function() {
        currentStatus = 'pending';
        currentPage = 1;
        setActiveStatusButton(currentStatus);
        refreshApplicantsTable();
    };
    document.getElementById('approvedApplicationsBtn').onclick = function() {
        currentStatus = 'approved';
        currentPage = 1;
        setActiveStatusButton(currentStatus);
        refreshApplicantsTable();
    };
    document.getElementById('declinedApplicationsBtn').onclick = function() {
        currentStatus = 'declined';
        currentPage = 1;
        setActiveStatusButton(currentStatus);
        refreshApplicantsTable();
    };

    document.getElementById('rowPerPageSelect').onchange = function() {
        perPage = parseInt(this.value, 10);
        currentPage = 1;
        refreshApplicantsTable();
    };

    function renderPagination(pagination) {
        const ul = document.getElementById('applications-pagination');
        ul.innerHTML = '';
        ul.innerHTML += `<li class="page-item${pagination.current_page === 1 ? ' disabled' : ''}">
            <a class="page-link" href="#" data-page="${pagination.current_page - 1}">&lt;</a></li>`;
        for (let i = 1; i <= pagination.last_page; i++) {
            ul.innerHTML += `<li class="page-item${pagination.current_page === i ? ' active' : ''}">
                <a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
        }
        ul.innerHTML += `<li class="page-item${pagination.current_page === pagination.last_page ? ' disabled' : ''}">
            <a class="page-link" href="#" data-page="${pagination.current_page + 1}">&gt;</a></li>`;
        ul.querySelectorAll('a.page-link').forEach(link => {
            link.onclick = function(e) {
                e.preventDefault();
                const page = parseInt(this.getAttribute('data-page'), 10);
                if (!isNaN(page) && page >= 1 && page <= pagination.last_page && page !== pagination.current_page) {
                    currentPage = page;
                    refreshApplicantsTable();
                }
            };
        });
    }

    function refreshApplicantsTable() {
        fetch(`/admin/applicants?page=${currentPage}&per_page=${perPage}&application_status=${currentStatus}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('applications-table-body');
                tableBody.innerHTML = '';
                if (!data.data || data.data.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="7" class="text-center text-muted py-4">No record found.</td></tr>`;
                } else {
                    data.data.forEach(applicant => {
                        const row = document.createElement('tr');
                        row.setAttribute('data-applicant-id', applicant.applicant_id);
                        const appData = {
                            applicant_id: applicant.applicant_id,
                            hospital_name: applicant.hospital_name,
                            category: applicant.category,
                            interview_date: applicant.interview_date,
                            interview_venue: applicant.interview_venue,
                            interview_start_time: applicant.interview_start_time,
                            interview_end_time: applicant.interview_end_time,
                            informant_name: applicant.informant_name,
                            relation_to_patient: applicant.relation_to_patient,
                            informant_contact_number: applicant.informant_contact_number,
                            informant_address: applicant.informant_address,
                            patient_family_name: applicant.patient_family_name,
                            patient_first_name: applicant.patient_first_name,
                            patient_middle_name: applicant.patient_middle_name,
                            patient_extension: applicant.patient_extension,
                            patient_birthdate: applicant.patient_birthdate,
                            patient_age: applicant.patient_age,
                            patient_gender: applicant.patient_gender,
                            patient_contact_number: applicant.patient_contact_number,
                            place_of_birth: applicant.place_of_birth,
                            nationality: applicant.nationality,
                            religion: applicant.religion,
                            permanent_address: applicant.permanent_address,
                            temporary_address: applicant.temporary_address,
                            civil_status: applicant.civil_status,
                            living_status: applicant.living_status,
                            highest_education: applicant.highest_education,
                            occupation: applicant.occupation,
                            monthly_income: applicant.monthly_income,
                            philhealth_pin: applicant.philhealth_pin,
                            philhealth_contributor_status: applicant.philhealth_contributor_status,
                            mswd_main_classification: applicant.mswd_main_classification,
                            mswd_sub_classification: applicant.mswd_sub_classification,
                            mswd_marginalized_sector: applicant.mswd_marginalized_sector,
                            mswd_mss_class: applicant.mswd_mss_class,
                            monthly_expenses: applicant.monthly_expenses,
                            admitting_diagnosis: applicant.admitting_diagnosis,
                            final_diagnosis: applicant.final_diagnosis,
                            duration_of_problems: applicant.duration_of_problems,
                            previous_treatment: applicant.previous_treatment,
                            present_treatment_plan: applicant.present_treatment_plan,
                            health_accessibility_problem: applicant.health_accessibility_problem,
                            assessment_findings: applicant.assessment_findings,
                            recommended_interventions: applicant.recommended_interventions,
                            family_composition: applicant.family_composition,
                            total_amount: applicant.maifip_assistance_amount,
                            application_status: applicant.application_status // <-- add status here
                        };
                        row.innerHTML = `
                            <td>${applicant.application_reference_number}</td>
                            <td>${applicant.patient_first_name} ${applicant.patient_family_name}</td>
                            <td>${applicant.category || '(not set)'}</td>
                            <td>${applicant.medical_service || '(not set)'}</td>
                            <td>${applicant.maifip_assistance_amount || '(not set)'}</td>
                            <td>${new Date(applicant.created_at).toLocaleDateString()}</td>
                            <td>
                                <button class='btn btn-sm btn-outline-secondary' data-bs-toggle="modal" data-bs-target="#applicationDetailsModal" data-app='${JSON.stringify(appData)}' onclick="showApplicationDetailsModal(this)">...</button>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
                }
                // Update table range info
                const start = (data.current_page - 1) * data.per_page + 1;
                const end = Math.min(data.current_page * data.per_page, data.total);
                document.getElementById('table-range-info').textContent = `${start}-${end} of ${data.total}`;
                // Render pagination
                renderPagination(data);
            });
    }

    // --- Dashboard summary integration ---
    function refreshDashboardSummary() {
        fetch('/admin/dashboard/data')
            .then(res => res.json())
            .then(data => {
                if (!data.success) return;

                // Update summary cards using IDs for easier targeting
                document.getElementById('dashboard-total-applications').textContent = data.counts.total.toLocaleString();
                document.getElementById('dashboard-total-applications-new').textContent = (data.new_today.pending + data.new_today.approved + data.new_today.declined).toLocaleString();

                document.getElementById('dashboard-approved-applications').textContent = data.counts.approved.toLocaleString();
                document.getElementById('dashboard-approved-applications-new').textContent = data.new_today.approved.toLocaleString();

                document.getElementById('dashboard-pending-applications').textContent = data.counts.pending.toLocaleString();
                document.getElementById('dashboard-pending-applications-new').textContent = data.new_today.pending.toLocaleString();

                document.getElementById('dashboard-total-covered').textContent = '₱ ' + parseFloat(data.total_covered).toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2});
                document.getElementById('dashboard-total-covered-new').textContent = parseFloat(data.newly_covered_amount).toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2});

                // Update medical service cards
                const serviceMap = {
                    'medication': 'dashboard-service-drugs',
                    'laboratory': 'dashboard-service-laboratory',
                    'blood screening': 'dashboard-service-blood',
                    'high risk case': 'dashboard-service-medical',
                    'post-hospitalization': 'dashboard-service-posthospital',
                    'hospital bills': 'dashboard-service-hospitalbills'
                };
                Object.entries(serviceMap).forEach(([serviceKey, idPrefix]) => {
                    const summary = data.medical_summary[serviceKey] || { applications: 0, amount: 0 };
                    document.getElementById(idPrefix + '-applications').textContent = summary.applications.toLocaleString();
                    document.getElementById(idPrefix + '-amount').textContent = '₱ ' + parseFloat(summary.amount).toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2});
                });

                // Update chart
                const ctx = document.getElementById('applicationsChart');
                if (ctx && data.chart) {
                    const chartData = {
                        labels: data.chart.labels,
                        datasets: [
                            {
                                label: 'Current Week',
                                data: data.chart.currentWeek,
                                borderColor: '#186737',
                                backgroundColor: 'rgba(24,103,55,0.08)',
                                pointBackgroundColor: '#186737',
                                pointBorderColor: '#fff',
                                pointRadius: 5,
                                fill: false,
                                tension: 0.4,
                            },
                            {
                                label: 'Previous Week',
                                data: data.chart.previousWeek,
                                borderColor: '#888',
                                backgroundColor: 'rgba(136,136,136,0.08)',
                                pointBackgroundColor: '#888',
                                pointBorderColor: '#fff',
                                pointRadius: 5,
                                fill: false,
                                tension: 0.4,
                            }
                        ]
                    };
                    if (window.applicationsChartInstance) {
                        window.applicationsChartInstance.data = chartData;
                        window.applicationsChartInstance.update();
                    } else {
                        window.applicationsChartInstance = new Chart(ctx.getContext('2d'), {
                            type: 'line',
                            data: chartData,
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: { display: false },
                                    tooltip: {
                                        callbacks: {
                                            label: function(context) {
                                                let label = context.dataset.label || '';
                                                if (label) label += ': ';
                                                if (context.parsed.y !== null) label += context.parsed.y.toLocaleString();
                                                return label;
                                            }
                                        },
                                        backgroundColor: '#222',
                                        titleColor: '#fff',
                                        bodyColor: '#fff',
                                        borderColor: '#186737',
                                        borderWidth: 1,
                                        padding: 10
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            callback: function(value) {
                                                if (value >= 1000000) return (value/1000000) + 'M';
                                                if (value >= 1000) return (value/1000) + 'K';
                                                return value;
                                            },
                                            color: '#bbb',
                                            font: { size: 13 }
                                        },
                                        grid: { color: '#f0f0f0' }
                                    },
                                    x: {
                                        ticks: { color: '#bbb', font: { size: 13 } },
                                        grid: { display: false }
                                    }
                                }
                            }
                        });
                    }
                }
            });
    }

    // Call on load
    refreshDashboardSummary();

    // Set default active status and load table
    setActiveStatusButton(currentStatus);
    refreshApplicantsTable();

    // Add this function near the top of your script
    function setModalLoading(isLoading) {
        const spinner = document.getElementById('modalLoadingSpinner');
        const submitBtn = document.getElementById('approveModalSubmit');
        if (isLoading) {
            spinner.style.display = 'flex';
            if (submitBtn) submitBtn.disabled = true;
        } else {
            spinner.style.display = 'none';
            if (submitBtn) submitBtn.disabled = false;
        }
    }

    // Section mapping
    const sectionMap = {
        '#': 'dashboard-section',
        '#applications': 'applications-section',
        '#reports': 'reports-section',
        '#users': 'users-section'
    };

    // Helper to show only the selected section
    function showSectionByHash(hash) {
        // Default to dashboard if hash is not recognized
        const sectionId = sectionMap[hash] || sectionMap['#'];
        // Hide all sections
        ['dashboard-section', 'applications-section', 'reports-section', 'users-section'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.style.display = 'none';
        });
        // Show the selected section
        const activeSection = document.getElementById(sectionId);
        if (activeSection) activeSection.style.display = '';
        // Update sidebar active state
        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.classList.remove('active');
            if (
                (hash === '#' && link.dataset.section === 'dashboard') ||
                (hash !== '#' && link.dataset.section === sectionId.replace('-section', ''))
            ) {
                link.classList.add('active');
            }
        });
    }

    // Initial section display based on hash
    showSectionByHash(window.location.hash || '#');

    // Listen for hash changes (browser navigation, manual change)
    window.addEventListener('hashchange', function() {
        showSectionByHash(window.location.hash || '#');
    });

    // Sidebar click: update hash and show section
    document.querySelectorAll('.sidebar-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            // Map sidebar data-section to hash
            let hash = '#';
            if (this.dataset.section === 'applications') hash = '#applications';
            else if (this.dataset.section === 'reports') hash = '#reports';
            else if (this.dataset.section === 'users') hash = '#users';
            window.location.hash = hash;
        });
    });

    // Expose showStatusToast globally for other partials
    window.showStatusToast = showStatusToast;
});
</script>
<meta name="csrf-token" content="{{ csrf_token() }}">
