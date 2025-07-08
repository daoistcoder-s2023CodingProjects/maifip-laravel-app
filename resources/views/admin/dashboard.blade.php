@extends('layouts.app')
@section('content')
<div class="d-flex" style="min-height:100vh;background:#f8f9fa;">
    <!-- Sidebar -->
    <nav class="sidebar" style="width:240px;background:#fff;box-shadow:0 4px 24px 0 rgba(24,103,55,0.04);padding:2rem 1rem 1rem 1rem;display:flex;flex-direction:column;">
        <div class="mb-4 text-center">
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
            <h2 style="color:#186737;font-weight:700;">Dashboard</h2>
            <div>
                <span class="me-3"><i class="bi bi-bell"></i></span>
                <span class="me-3"><i class="bi bi-envelope"></i></span>
                <span><i class="bi bi-person-circle"></i></span>
            </div>
        </div>
        <!-- Dummy dashboard content -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-center p-3 mb-3" style="border:1px solid #e0e0e0;">
                    <div style="font-size:2rem;color:#186737;font-weight:700;">2,923</div>
                    <div style="font-size:1rem;color:#222;">Total Applications</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3 mb-3" style="border:1px solid #e0e0e0;">
                    <div style="font-size:2rem;color:#186737;font-weight:700;">1,520</div>
                    <div style="font-size:1rem;color:#222;">Approved Applications</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3 mb-3" style="border:1px solid #e0e0e0;">
                    <div style="font-size:2rem;color:#186737;font-weight:700;">726</div>
                    <div style="font-size:1rem;color:#222;">Pending Applications</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3 mb-3" style="border:1px solid #e0e0e0;">
                    <div style="font-size:2rem;color:#186737;font-weight:700;">₱ 11,895,601.00</div>
                    <div style="font-size:1rem;color:#222;">Total Covered</div>
                </div>
            </div>
        </div>
        <div class="card p-4 mb-4" style="border:1px solid #e0e0e0;">
            <div style="font-weight:600;color:#186737;">Total Applications (Dummy Chart)</div>
            <div style="height:220px;background:#eaf8f2;border-radius:12px;margin-top:1rem;display:flex;align-items:center;justify-content:center;color:#186737;font-size:1.5rem;">[Chart Placeholder]</div>
        </div>
        <div class="card p-4" style="border:1px solid #e0e0e0;">
            <div class="d-flex mb-3">
                <button class="btn btn-success me-2">Medical Services</button>
                <button class="btn btn-outline-success me-2">Applications</button>
                <button class="btn btn-outline-success">Hospitals</button>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="p-3" style="background:#f8f9fa;border-radius:12px;">
                        <div style="font-weight:600;">Drugs & Medicines</div>
                        <div style="font-size:0.9rem;">Applications Covered: <span style="color:#186737;">5,922</span></div>
                        <div style="font-size:0.9rem;">Amount Covered: <span style="color:#186737;">₱ 865,290.00</span></div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="p-3" style="background:#f8f9fa;border-radius:12px;">
                        <div style="font-weight:600;">Laboratory & Radiology</div>
                        <div style="font-size:0.9rem;">Applications Covered: <span style="color:#186737;">5,922</span></div>
                        <div style="font-size:0.9rem;">Amount Covered: <span style="color:#186737;">₱ 865,290.00</span></div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="p-3" style="background:#f8f9fa;border-radius:12px;">
                        <div style="font-weight:600;">Blood Screening</div>
                        <div style="font-size:0.9rem;">Applications Covered: <span style="color:#186737;">5,922</span></div>
                        <div style="font-size:0.9rem;">Amount Covered: <span style="color:#186737;">₱ 865,290.00</span></div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="p-3" style="background:#f8f9fa;border-radius:12px;">
                        <div style="font-weight:600;">Medical High Risk Cases</div>
                        <div style="font-size:0.9rem;">Applications Covered: <span style="color:#186737;">5,922</span></div>
                        <div style="font-size:0.9rem;">Amount Covered: <span style="color:#186737;">₱ 865,290.00</span></div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="p-3" style="background:#f8f9fa;border-radius:12px;">
                        <div style="font-weight:600;">Post-Hospitalization</div>
                        <div style="font-size:0.9rem;">Applications Covered: <span style="color:#186737;">5,922</span></div>
                        <div style="font-size:0.9rem;">Amount Covered: <span style="color:#186737;">₱ 865,290.00</span></div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="p-3" style="background:#f8f9fa;border-radius:12px;">
                        <div style="font-weight:600;">All Hospital Bills</div>
                        <div style="font-size:0.9rem;">Applications Covered: <span style="color:#186737;">5,922</span></div>
                        <div style="font-size:0.9rem;">Amount Covered: <span style="color:#186737;">₱ 865,290.00</span></div>
                    </div>
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
</style>
