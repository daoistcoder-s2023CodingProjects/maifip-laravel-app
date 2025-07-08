@extends('layouts.app')
@section('content')
<div class="d-flex" style="min-height:100vh;background:#f8f9fa;">
    <!-- Sidebar -->
    <nav class="sidebar" style="width:240px;background:#fff;box-shadow:0 4px 24px 0 rgba(24,103,55,0.04);padding:2rem 1rem 1rem 1rem;display:flex;flex-direction:column;">
        <div class="mb-4 text-center d-flex align-items-center justify-content-center gap-2">
            <img src="/images/maifip_logo.png" alt="MAIFIP Logo" style="height:48px;width:48px;">
            <div style="font-weight:700;color:#186737;font-size:1.2rem;letter-spacing:0.08em;">MAIFIP</div>
        </div>
        <ul class="nav flex-column mb-auto">
            <li class="nav-item mb-2"><a href="#" class="nav-link active" style="color:#186737;font-weight:600;"><i class="bi bi-grid"></i> Dashboard</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link" style="color:#222;"><i class="bi bi-file-earmark-text"></i> Applications</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link" style="color:#222;"><i class="bi bi-people"></i> User Management</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link" style="color:#222;"><i class="bi bi-bar-chart"></i> Reports</a></li>
        </ul>
    </nav>
    <!-- Main Content -->
    <main class="flex-fill p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <div class="dashboard-title" style="font-size:1.5rem;font-weight:700;color:#186737;">Dashboard</div>
                <div style="font-size:1rem;color:#186737;"><i class="bi bi-grid"></i> Dashboard</div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="#" class="icon-btn"><i class="bi bi-search"></i></a>
                <a href="#" class="icon-btn"><i class="bi bi-envelope"></i></a>
                <a href="#" class="icon-btn"><i class="bi bi-bell"></i></a>
                <a href="#" class="icon-btn"><img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="rounded-circle" style="width:36px;height:36px;object-fit:cover;border:2px solid #e0e0e0;"></a>
            </div>
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
    </main>
</div>
<!-- Optionally include Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
<style>
.sidebar {
    min-height: 100vh;
    border-right: 1.5px solid #e0e0e0;
}
.sidebar .nav-link.active {
    background: #eaf8f2;
    border-radius: 8px;
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
    box-shadow: 0 8px 32px 0 rgba(24,103,55,0.08);
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
</style>
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('applicationsChart');
    if (!ctx) return;
    const applicationsChart = new Chart(ctx.getContext('2d'), {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [
                {
                    label: 'Current Week',
                    data: [1200000, 3200000, 2800000, 4100000, 5256598, 9000000, 8500000],
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
                    data: [900000, 1800000, 2100000, 3200000, 4800000, 8000000, 10000000],
                    borderColor: '#888',
                    backgroundColor: 'rgba(136,136,136,0.08)',
                    pointBackgroundColor: '#888',
                    pointBorderColor: '#fff',
                    pointRadius: 5,
                    fill: false,
                    tension: 0.4,
                }
            ]
        },
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
});
</script>
