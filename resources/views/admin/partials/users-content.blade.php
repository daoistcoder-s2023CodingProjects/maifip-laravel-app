<!-- User Management Main Content Partial -->
<div id="users-section" style="display:none;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="dashboard-title" style="font-size:1.5rem;font-weight:700;color:#186737;">User Management</div>
            <div style="font-size:1rem;color:#186737;"><i class="bi bi-people"></i> Dashboard <span style="color:#b0b0b0;">/ User Management</span></div>
        </div>
        @include('admin.partials.navbar')
    </div>
    <div class="card p-4 mb-4" style="border:1px solid #e0e0e0;background:#fff;">
        <div class="d-flex gap-3 mb-4">
            <button class="btn btn-success px-4 py-2"><i class="bi bi-person-plus"></i> Add User</button>
            <button class="btn btn-outline-success px-4 py-2"><i class="bi bi-person-lines-fill"></i> Manage Roles</button>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-3">
                <label class="form-label mb-1" style="font-weight:500;">Search User</label>
                <input type="text" class="form-control" placeholder="Enter name or email">
            </div>
            <div class="col-md-3">
                <label class="form-label mb-1" style="font-weight:500;">Role</label>
                <select class="form-select">
                    <option>Select</option>
                    <option value="Admin">Admin</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-borderless align-middle">
                <thead>
                    <tr class="table-header-green">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>john.doe@email.com</td>
                        <td>Admin</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td><button class='btn btn-sm btn-outline-secondary'>Edit</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
