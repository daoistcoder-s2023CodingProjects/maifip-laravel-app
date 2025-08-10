<!-- Dashboard Main Content Partial -->
<div id="dashboard-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="dashboard-title" style="font-size:1.5rem;font-weight:700;color:#186737;">Dashboard</div>
            <div style="font-size:1rem;color:#186737;"><i class="bi bi-grid"></i> Dashboard</div>
        </div>
        @include('admin.partials.navbar')
    </div>
    <div class="card dashboard-summary-card mb-4 p-4" style="border:1px solid #e0e0e0;background:#fff;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <div style="font-size:1.2rem;font-weight:600;color:#222;">
                   <input type="date" id="dashboard-date-filter" class="form-control" style="min-width:160px;">
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-3">
                <div class="summary-card p-3 h-100">
                    <div class="summary-title">Total Applications</div>
                    <div class="summary-value" id="dashboard-total-applications">0</div>
                    <div class="summary-desc"><span class="summary-number" id="dashboard-total-applications-new">0</span> New applications added</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="summary-card p-3 h-100">
                    <div class="summary-title">Approved Applications</div>
                    <div class="summary-value" id="dashboard-approved-applications">0</div>
                    <div class="summary-desc"><span class="summary-number" id="dashboard-approved-applications-new">0</span> Approved applications added</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="summary-card p-3 h-100">
                    <div class="summary-title">Pending Applications</div>
                    <div class="summary-value" id="dashboard-pending-applications">0</div>
                    <div class="summary-desc"><span class="summary-number" id="dashboard-pending-applications-new">0</span> Pending applications added</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="summary-card p-3 h-100">
                    <div class="summary-title">Total Covered</div>
                    <div class="summary-value" id="dashboard-total-covered">₱ 00.00</div>
                    <div class="summary-desc"><span class="summary-number" id="dashboard-total-covered-new">0</span> Added to total covered</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-4 mb-4" style="border:1px solid #e0e0e0;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div style="font-weight:600;color:#222;font-size:1.1rem;">
                Total Applications
                <span style="border-left:1.5px solid #e0e0e0;margin:0 1rem 0 1rem;"></span>
                <span style="color:#186737;font-size:0.98rem;"><i class="bi bi-dot" style="color:#186737;font-size:1.2rem;"></i> Current Week</span>
                <span style="color:#888;font-size:0.98rem;margin-left:1.5rem;"><i class="bi bi-dot" style="color:#888;font-size:1.2rem;"></i> Previous Week</span>
            </div>
            <div style="color:#888;font-size:1.5rem;cursor:pointer;">&hellip;</div>
        </div>
        <div style="width:100%;height:300px;">
            <canvas id="applicationsChart" style="width:100%;height:100%;"></canvas>
        </div>
    </div>
    <div class="card p-4" style="border:1px solid #e0e0e0;">
        <div class="d-flex mb-4 gap-3">
            <button class="btn btn-success px-4 py-2" style="font-weight:600;font-size:1.1rem;"><i class="bi bi-capsule"></i> Medical Services</button>
            {{-- <button class="btn btn-outline-success px-4 py-2" style="font-weight:600;font-size:1.1rem;"><i class="bi bi-file-earmark-text"></i> Applications</button>
            <button class="btn btn-outline-success px-4 py-2" style="font-weight:600;font-size:1.1rem;"><i class="bi bi-hospital"></i> Hospitals</button> --}}
        </div>
        <div class="services-cards d-grid gap-4" style="grid-template-columns: repeat(3, 1fr);">
            <div class="service-card h-100 p-4">
                <div class="service-icon"><img src="/images/drugs_logo.png" alt="Drugs & Medicines"></div>
                <div class="service-title">Drugs & Medicines</div>
                <div class="service-stats"><span>Applications Covered</span><span class="service-value" id="dashboard-service-drugs-applications">0</span></div>
                <div class="service-stats"><span>Amount Covered</span><span class="service-value" id="dashboard-service-drugs-amount">₱ 00.00</span></div>
            </div>
            <div class="service-card h-100 p-4">
                <div class="service-icon"><img src="/images/laboratory_logo.png" alt="Laboratory & Radiology"></div>
                <div class="service-title">Laboratory & Radiology</div>
                <div class="service-stats"><span>Applications Covered</span><span class="service-value" id="dashboard-service-laboratory-applications">0</span></div>
                <div class="service-stats"><span>Amount Covered</span><span class="service-value" id="dashboard-service-laboratory-amount">₱ 00.00</span></div>
            </div>
            <div class="service-card h-100 p-4">
                <div class="service-icon"><img src="/images/blood_screening_logo.png" alt="Blood Screening"></div>
                <div class="service-title">Blood Screening</div>
                <div class="service-stats"><span>Applications Covered</span><span class="service-value" id="dashboard-service-blood-applications">0</span></div>
                <div class="service-stats"><span>Amount Covered</span><span class="service-value" id="dashboard-service-blood-amount">₱ 00.00</span></div>
            </div>
            <div class="service-card h-100 p-4">
                <div class="service-icon"><img src="/images/medical_cases_logo.png" alt="Medical High Risk Cases"></div>
                <div class="service-title">Medical High Risk Cases</div>
                <div class="service-stats"><span>Applications Covered</span><span class="service-value" id="dashboard-service-medical-applications">0</span></div>
                <div class="service-stats"><span>Amount Covered</span><span class="service-value" id="dashboard-service-medical-amount">₱ 00.00</span></div>
            </div>
            <div class="service-card h-100 p-4">
                <div class="service-icon"><img src="/images/hospitalization_logo.png" alt="Post-Hospitalization"></div>
                <div class="service-title">Post-Hospitalization</div>
                <div class="service-stats"><span>Applications Covered</span><span class="service-value" id="dashboard-service-posthospital-applications">0</span></div>
                <div class="service-stats"><span>Amount Covered</span><span class="service-value" id="dashboard-service-posthospital-amount">₱ 00.00</span></div>
            </div>
            <div class="service-card h-100 p-4">
                <div class="service-icon"><img src="/images/hospital_bills_logo.png" alt="All Hospital Bills"></div>
                <div class="service-title">All Hospital Bills</div>
                <div class="service-stats"><span>Applications Covered</span><span class="service-value" id="dashboard-service-hospitalbills-applications">0</span></div>
                <div class="service-stats"><span>Amount Covered</span><span class="service-value" id="dashboard-service-hospitalbills-amount">₱ 00.00</span></div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // --- Date filter logic ---
    const dateInput = document.getElementById('dashboard-date-filter');
    if (dateInput) {
        // Set default date to today
        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const dd = String(today.getDate()).padStart(2, '0');
        const todayStr = `${yyyy}-${mm}-${dd}`;
        dateInput.value = todayStr;

        // Trigger initial fetch with today's date
        fetchDashboardData(todayStr);

        dateInput.addEventListener('change', function() {
            fetchDashboardData(this.value);
        });
    }

    function fetchDashboardData(date) {
        // Example endpoint: /admin/dashboard-data?date=YYYY-MM-DD
        fetch(`/admin/dashboard/data?date=${encodeURIComponent(date)}`)
            .then(res => res.json())
            .then(data => {
                // Update dashboard summary values
                document.getElementById('dashboard-total-applications-new').textContent = data.new_applications ?? '0';
                document.getElementById('dashboard-approved-applications-new').textContent = data.new_approved_applications ?? '0';
                document.getElementById('dashboard-pending-applications-new').textContent = data.new_pending_applications ?? '0';
                document.getElementById('dashboard-total-covered-new').textContent = data.new_total_covered ?? '0';

                // Update service cards
                document.getElementById('dashboard-service-drugs-applications').textContent = data.services?.drugs?.applications ?? '0';
                document.getElementById('dashboard-service-drugs-amount').textContent = data.services?.drugs?.amount ?? '₱ 0.00';
                document.getElementById('dashboard-service-laboratory-applications').textContent = data.services?.laboratory?.applications ?? '0';
                document.getElementById('dashboard-service-laboratory-amount').textContent = data.services?.laboratory?.amount ?? '₱ 0.00';
                document.getElementById('dashboard-service-blood-applications').textContent = data.services?.blood?.applications ?? '0';
                document.getElementById('dashboard-service-blood-amount').textContent = data.services?.blood?.amount ?? '₱ 0.00';
                document.getElementById('dashboard-service-medical-applications').textContent = data.services?.medical?.applications ?? '0';
                document.getElementById('dashboard-service-medical-amount').textContent = data.services?.medical?.amount ?? '₱ 0.00';
                document.getElementById('dashboard-service-posthospital-applications').textContent = data.services?.posthospital?.applications ?? '0';
                document.getElementById('dashboard-service-posthospital-amount').textContent = data.services?.posthospital?.amount ?? '₱ 0.00';
                document.getElementById('dashboard-service-hospitalbills-applications').textContent = data.services?.hospitalbills?.applications ?? '0';
                document.getElementById('dashboard-service-hospitalbills-amount').textContent = data.services?.hospitalbills?.amount ?? '₱ 0.00';

                // Optionally, update chart data here if needed
                // updateApplicationsChart(data.chart_data);
            });
    }
});
</script>
