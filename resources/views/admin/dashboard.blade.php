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

    // Sidebar JS selection logic
    const sidebarLinks = document.querySelectorAll('.sidebar-link');
    const dashboardSection = document.getElementById('dashboard-section');
    const applicationsSection = document.getElementById('applications-section');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            sidebarLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
            if (this.dataset.section === 'applications') {
                dashboardSection.style.display = 'none';
                applicationsSection.style.display = '';
            } else {
                dashboardSection.style.display = '';
                applicationsSection.style.display = 'none';
            }
        });
    });

    // Fetch and populate applicants table
    const tableBody = document.getElementById('applications-table-body');

    fetch('/admin/applicants?page=1')
        .then(response => response.json())
        .then(data => {
            tableBody.innerHTML = '';
            data.data.forEach(applicant => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${applicant.application_reference_number}</td>
                    <td>${applicant.patient_first_name} ${applicant.patient_family_name}</td>
                    <td>${applicant.category || '(not set)'}</td>
                    <td>${applicant.medical_service || '(not set)'}</td>
                    <td>${applicant.total_amount || '(not set)'}</td>
                    <td>${new Date(applicant.created_at).toLocaleDateString()}</td>
                    <td><button class='btn btn-sm btn-outline-secondary'>...</button></td>
                `;
                tableBody.appendChild(row);
            });
        });
});
</script>
