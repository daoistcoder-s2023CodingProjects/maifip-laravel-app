<!-- Reports Main Content Partial -->
<div id="reports-section" style="display:none;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="dashboard-title" style="font-size:1.5rem;font-weight:700;color:#186737;">Reports</div>
            <div style="font-size:1rem;color:#186737;"><i class="bi bi-bar-chart"></i> Dashboard <span style="color:#b0b0b0;">/ Reports</span></div>
        </div>
        @include('admin.partials.navbar')
    </div>
    <div class="card p-4 mb-4" style="border:1px solid #e0e0e0;background:#fff;">
        <div class="d-flex gap-3 mb-4">
            <button class="btn btn-success px-4 py-2"><i class="bi bi-bar-chart"></i> Generate Report</button>
            <button class="btn btn-outline-success px-4 py-2"><i class="bi bi-download"></i> Export</button>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-3">
                <label class="form-label mb-1" style="font-weight:500;">Report Type</label>
                <select class="form-select">
                    <option>Select</option>
                    <option value="Summary">Summary</option>
                    <option value="Applications">Applications</option>
                    <option value="Users">Users</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label mb-1" style="font-weight:500;">Date Range</label>
                <input type="text" class="form-control" placeholder="mm/dd/yyyy - mm/dd/yyyy">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-borderless align-middle">
                <thead>
                    <tr class="table-header-green">
                        <th>Report Name</th>
                        <th>Created By</th>
                        <th>Date Generated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Applications Summary</td>
                        <td>Admin</td>
                        <td>{{ date('m/d/Y') }}</td>
                        <td><button class='btn btn-sm btn-outline-secondary'>View</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
