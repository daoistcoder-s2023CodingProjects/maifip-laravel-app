<div class="application-form">
    <!-- Stepper Navigation -->
    <div class="stepper mb-4">
        <div class="step active"><span>1</span><div>Initial</div></div>
        <div class="step"><span>2</span><div>Patient</div></div>
        <div class="step"><span>3</span><div>MSWD</div></div>
        <div class="step"><span>4</span><div>Medical Data</div></div>
        <div class="step"><span>5</span><div>Summary</div></div>
    </div>
    <!-- Multi-step Form -->
    <form id="maifip-multistep-form">
        <div class="form-step form-step-active" id="step-1">
            <h5 class="mb-3" style="color:#186737;font-weight:700;">Initial Information</h5>
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label class="form-label">Hospital Name</label>
                    <select class="form-select" name="hospital_name">
                        <option value="">Select hospital</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Category</label>
                    <select class="form-select" name="category">
                        <option value="">Select category</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Date of Interview</label>
                    <input type="date" class="form-control" name="interview_date">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Venue of Interview</label>
                    <input type="text" class="form-control" name="interview_venue" placeholder="Add venue">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Start of Interview</label>
                    <input type="text" class="form-control" name="interview_start_time" placeholder="Add time AM/PM">
                </div>
                <div class="col-md-4">
                    <label class="form-label">End of Interview</label>
                    <input type="text" class="form-control" name="interview_end_time" placeholder="Add time AM/PM">
                </div>
            </div>
            <h5 class="mb-3" style="color:#186737;font-weight:700;">Referral Information</h5>
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label class="form-label">Name of Informant</label>
                    <input type="text" class="form-control" name="informant_name" placeholder="Add complete name">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Relation to Patient</label>
                    <select class="form-select" name="relation_to_patient">
                        <option value="">Select</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Contact Number</label>
                    <input type="text" class="form-control" name="informant_contact_number" placeholder="Add contact">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="informant_address" placeholder="Add complete address">
                </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-outline-success btn-lg" disabled>Back</button>
                <button type="button" class="btn btn-success btn-lg" id="nextBtn">Next</button>
            </div>
        </div>
        <!-- Steps 2-4 and Summary will be added here in the next steps -->
    </form>
</div>
<style>
.application-form {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 24px 0 rgba(24, 103, 55, 0.04);
    padding: 2.5rem 2rem 2rem 2rem;
    margin-top: 2rem;
}
.stepper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2.5rem;
    background: none;
}
.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex: 1;
    color: #bdbdbd;
    font-weight: 500;
    font-size: 1.1rem;
}
.step span {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #fff;
    border: 2.5px solid #bdbdbd;
    color: #bdbdbd;
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 0.3rem;
    transition: border 0.2s, color 0.2s;
}
.step.active,
.step.active span {
    color: #186737;
    border-color: #186737;
}
.step.active span {
    border: 2.5px solid #186737;
    color: #186737;
    background: #fff;
}
</style>
<script>
document.getElementById('nextBtn').onclick = function() {
    // JS for step navigation will go here
};
</script>
