<!-- Applications Main Content Partial -->
<div id="applications-section" style="display:none;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="dashboard-title" style="font-size:1.5rem;font-weight:700;color:#186737;">Applications</div>
            <div style="font-size:1rem;color:#186737;"><i class="bi bi-grid"></i> Dashboard <span style="color:#b0b0b0;">/ Application List</span></div>
        </div>
        @include('admin.partials.navbar')
    </div>
    <div class="card p-4 mb-4" style="border:1px solid #e0e0e0;background:#fff;">
        <div class="d-flex gap-3 mb-4">
            <button class="btn btn-success px-4 py-2" id="pendingApplicationsBtn"><i class="bi bi-capsule"></i> Pending Applications</button>
            <button class="btn btn-outline-success px-4 py-2" id="approvedApplicationsBtn"><i class="bi bi-shield-check"></i> Approved Applications</button>
            <button class="btn btn-outline-success px-4 py-2" id="declinedApplicationsBtn"><i class="bi bi-shield-x"></i> Declined Applications</button>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-2">
                <label class="form-label mb-1" style="font-weight:500;">Reference Number</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label mb-1" style="font-weight:500;">Category</label>
                <select class="form-select">
                    <option>Select</option>
                    <option value="In-Patient">In-Patient</option>
                    <option value="Out-Patient">Out-Patient</option>
                    <option value="Walk-In">Walk-In</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label mb-1" style="font-weight:500;">Medical Services</label>
                <select class="form-select">
                    <option>Select</option>
                    <option value="Laboratory">Laboratory</option>
                    <option value="Operation">Operation</option>
                    <option value="Medication">Medication</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label mb-1" style="font-weight:500;">Date From</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="mm/dd/yyyy">
                    <span class="input-group-text bg-white"><i class="bi bi-calendar"></i></span>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label mb-1" style="font-weight:500;">Date To</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="mm/dd/yyyy">
                    <span class="input-group-text bg-white"><i class="bi bi-calendar"></i></span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-borderless align-middle">
                <thead>
                    <tr class="table-header-green">
                        <th>Reference No.</th>
                        <th>Patient Name</th>
                        <th>Category</th>
                        <th>Medical Service</th>
                        <th>Total Amount</th>
                        <th>Date Submitted</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="applications-table-body">
                    <!-- Data will be loaded here -->
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="text-muted" style="font-size:0.95rem;">
                Row per page 
                <select id="rowPerPageSelect" style="border:none;background:transparent;outline:none;">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
                <span id="table-range-info"></span>
            </div>
            <nav>
                <ul class="pagination mb-0" id="applications-pagination">
                    <!-- Pagination will be rendered here -->
                </ul>
            </nav>
        </div>
    </div>
</div>
