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
                <div style="font-size:1.2rem;font-weight:600;color:#222;">Today - {{ date('m/d/Y') }} <i class="bi bi-chevron-down" style="font-size:1rem;"></i></div>
            </div>
            <div style="font-size:1.1rem;font-weight:500;color:#222;">8:00 AM – 12:00 PM <i class="bi bi-chevron-down" style="font-size:1rem;"></i></div>
        </div>
        <div class="row g-3">
            <div class="col-md-3">
                <div class="summary-card p-3 h-100">
                    <div class="summary-title">Total Applications</div>
                    <div class="summary-value">2,923</div>
                    <div class="summary-desc"><span class="summary-number">18</span> New applications added</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="summary-card p-3 h-100">
                    <div class="summary-title">Approved Applications</div>
                    <div class="summary-value">1,520</div>
                    <div class="summary-desc"><span class="summary-number">10</span> Approved applications added</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="summary-card p-3 h-100">
                    <div class="summary-title">Pending Applications</div>
                    <div class="summary-value">726</div>
                    <div class="summary-desc"><span class="summary-number">5</span> Pending applications added</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="summary-card p-3 h-100">
                    <div class="summary-title">Total Covered</div>
                    <div class="summary-value">₱ 11,895,601.00</div>
                    <div class="summary-desc"><span class="summary-number">180,000</span> Added to total covered</div>
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
            <button class="btn btn-outline-success px-4 py-2" style="font-weight:600;font-size:1.1rem;"><i class="bi bi-file-earmark-text"></i> Applications</button>
            <button class="btn btn-outline-success px-4 py-2" style="font-weight:600;font-size:1.1rem;"><i class="bi bi-hospital"></i> Hospitals</button>
        </div>
        <div class="services-cards d-grid gap-4" style="grid-template-columns: repeat(3, 1fr);">
            <div class="service-card h-100 p-4">
                <div class="service-icon"><img src="/images/drugs_logo.png" alt="Drugs & Medicines"></div>
                <div class="service-title">Drugs & Medicines</div>
                <div class="service-stats"><span>Applications Covered</span><span class="service-value">5,922</span></div>
                <div class="service-stats"><span>Amount Covered</span><span class="service-value">₱ 865,290.00</span></div>
            </div>
            <div class="service-card h-100 p-4">
                <div class="service-icon"><img src="/images/laboratory_logo.png" alt="Laboratory & Radiology"></div>
                <div class="service-title">Laboratory & Radiology</div>
                <div class="service-stats"><span>Applications Covered</span><span class="service-value">5,922</span></div>
                <div class="service-stats"><span>Amount Covered</span><span class="service-value">₱ 865,290.00</span></div>
            </div>
            <div class="service-card h-100 p-4">
                <div class="service-icon"><img src="/images/blood_screening_logo.png" alt="Blood Screening"></div>
                <div class="service-title">Blood Screening</div>
                <div class="service-stats"><span>Applications Covered</span><span class="service-value">5,922</span></div>
                <div class="service-stats"><span>Amount Covered</span><span class="service-value">₱ 865,290.00</span></div>
            </div>
            <div class="service-card h-100 p-4">
                <div class="service-icon"><img src="/images/medical_cases_logo.png" alt="Medical High Risk Cases"></div>
                <div class="service-title">Medical High Risk Cases</div>
                <div class="service-stats"><span>Applications Covered</span><span class="service-value">5,922</span></div>
                <div class="service-stats"><span>Amount Covered</span><span class="service-value">₱ 865,290.00</span></div>
            </div>
            <div class="service-card h-100 p-4">
                <div class="service-icon"><img src="/images/hospitalization_logo.png" alt="Post-Hospitalization"></div>
                <div class="service-title">Post-Hospitalization</div>
                <div class="service-stats"><span>Applications Covered</span><span class="service-value">5,922</span></div>
                <div class="service-stats"><span>Amount Covered</span><span class="service-value">₱ 865,290.00</span></div>
            </div>
            <div class="service-card h-100 p-4">
                <div class="service-icon"><img src="/images/hospital_bills_logo.png" alt="All Hospital Bills"></div>
                <div class="service-title">All Hospital Bills</div>
                <div class="service-stats"><span>Applications Covered</span><span class="service-value">5,922</span></div>
                <div class="service-stats"><span>Amount Covered</span><span class="service-value">₱ 865,290.00</span></div>
            </div>
        </div>
    </div>
</div>
