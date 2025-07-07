<div class="application-form">
    <!-- Stepper Navigation (OUTSIDE the card) -->
    <div class="stepper mb-4">
        <div class="step active" data-step="1"><span>1</span><div>Initial</div></div>
        <div class="step" data-step="2"><span>2</span><div>Patient</div></div>
        <div class="step" data-step="3"><span>3</span><div>MSWD</div></div>
        <div class="step" data-step="4"><span>4</span><div>Medical Data</div></div>
        <div class="step" data-step="5"><span>5</span><div>Summary</div></div>
    </div>
    <!-- Multi-step Form -->
    <form id="maifip-multistep-form" method="POST" action="{{ route('application.submit') }}">
        @csrf
        <div id="form-overlay" style="display:none;position:absolute;top:0;left:0;width:100%;height:100%;background:linear-gradient(135deg,#eaf8f2 0%,#f8f9fa 100%);z-index:10;align-items:center;justify-content:center;">
            <div class="spinner-border text-success" style="width:3rem;height:3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <!-- Step 1 -->
        <div class="form-step form-step-active position-relative" id="step-1">
            <div class="application-form-card mb-4">
                <h5 class="mb-3" style="color:#186737;font-weight:500;">Initial Information</h5>
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Hospital Name</label>
                        <select class="form-select" name="hospital_name" required>
                            <option value="">Select hospital</option>
                            @foreach($hospitals as $hospital)
                                <option value="{{ $hospital }}">{{ $hospital }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Category</label>
                        <select class="form-select" name="category" required>
                            <option value="">Select category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Date of Interview</label>
                        <input type="date" class="form-control" name="interview_date" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Venue of Interview</label>
                        <input type="text" class="form-control" name="interview_venue" placeholder="Add venue" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Start of Interview</label>
                        <select class="form-select" name="interview_start_time" required>
                            <option value="">Select time</option>
                            @foreach($timeSelections as $time)
                                <option value="{{ $time['value'] }}">{{ $time['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">End of Interview</label>
                        <select class="form-select" name="interview_end_time" required>
                            <option value="">Select time</option>
                            @foreach($timeSelections as $time)
                                <option value="{{ $time['value'] }}">{{ $time['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="application-form-card">
                <h5 class="mb-3" style="color:#186737;font-weight:500;">Referral Information</h5>
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Name of Informant</label>
                        <input type="text" class="form-control" name="informant_name" placeholder="Add complete name" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Relation to Patient</label>
                        <select class="form-select" name="relation_to_patient" required>
                            <option value="">Select</option>
                            @foreach($relations as $rel)
                                <option value="{{ $rel }}">{{ $rel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Contact Number</label>
                        <input type="text" class="form-control" name="informant_contact_number" placeholder="Add contact" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="informant_address" placeholder="Add complete address" required>
                    </div>
                </div>
            </div>
            <!-- Buttons outside the card -->
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-outline-success btn-lg w-50 me-2" id="backBtn1" disabled style="max-width:50%;">Back</button>
                <button type="button" class="btn btn-success btn-lg w-50 ms-2 nextBtn" data-next="2" style="max-width:50%;">Next</button>
            </div>
        </div>
        <!-- Step 2 (Patient Information) -->
        <div class="form-step position-relative" id="step-2" style="display:none;">
            <div class="container-fluid px-0">
                <!-- Card 1: Patient Info -->
                <div class="application-form-card mb-4">
                    <h5 class="mb-3" style="color:#186737;font-weight:500;">Patient Information</h6>
                    <!-- Header Row -->
                    <div class="row g-3 mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Family Name</label>
                            <input type="text" class="form-control" name="patient_family_name" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="patient_first_name" required>
                        </div>
                        <div class="col-md-4 d-flex gap-2">
                            <div style="flex:2">
                                <label class="form-label">Middle Name</label>
                                <input type="text" class="form-control" name="patient_middle_name">
                            </div>
                            <div style="flex:1">
                                <label class="form-label">Extension</label>
                                <input type="text" class="form-control" name="patient_extension" placeholder="Sr, Jr, III...">
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" name="patient_birthdate" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Age</label>
                            <input type="number" class="form-control" name="patient_age" min="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Gender</label>
                            <select class="form-select" name="patient_gender" required>
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control" name="patient_contact_number">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Place of Birth</label>
                            <input type="text" class="form-control" name="place_of_birth">
                        </div>
                        <div class="col-md-4 d-flex gap-2">
                            <div style="flex:1">
                                <label class="form-label">Nationality</label>
                                <input type="text" class="form-control" name="nationality">
                            </div>
                            <div style="flex:1">
                                <label class="form-label">Religion</label>
                                <input type="text" class="form-control" name="religion">
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-12">
                            <label class="form-label">Permanent Address</label>
                            <input type="text" class="form-control" name="permanent_address">
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-12">
                            <label class="form-label">Temporary Address</label>
                            <input type="text" class="form-control" name="temporary_address" id="temporary_address">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="sameAsPermanent">
                                <label class="form-check-label" for="sameAsPermanent">
                                    Same as permanent address
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Civil Status</label>
                            <select class="form-select" name="civil_status">
                                <option value="">Select</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Living Status</label>
                            <select class="form-select" name="living_status">
                                <option value="">Select</option>
                                <option value="With Family">With Family</option>
                                <option value="Alone">Alone</option>
                                <option value="With Relatives">With Relatives</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Highest Educational Attainment</label>
                            <select class="form-select" name="highest_education">
                                <option value="">Select</option>
                                <option value="None">None</option>
                                <option value="Elementary">Elementary</option>
                                <option value="High School">High School</option>
                                <option value="College">College</option>
                                <option value="Postgraduate">Postgraduate</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-6">
                            <label class="form-label">Occupation</label>
                            <input type="text" class="form-control" name="occupation">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Monthly Income</label>
                            <input type="number" class="form-control" name="monthly_income" min="0" step="0.01">
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-6">
                            <label class="form-label">PhilHealth Membership Number (PIN)</label>
                            <input type="text" class="form-control" name="philhealth_pin">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contributor Status</label>
                            <select class="form-select" name="philhealth_contributor_status">
                                <option value="">Select</option>
                                <option value="Member">Member</option>
                                <option value="Dependent">Dependent</option>
                                <option value="Non-member">Non-member</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Card 2: Family Composition -->
                <div class="application-form-card">
                    <h5 class="mb-3" style="color:#186737;font-weight:500;">Family Composition</h5>
                    <div class="family-composition-bordered p-3">
                        <!-- Header Row -->
                        <div class="row g-2 mb-1 family-header" style="font-weight:500;">
                            <div class="col-md-4">Name (Last, First, Middle)</div>
                            <div class="col-md-3">Date of Birth</div>
                            <div class="col-md-2">Age</div>
                            <div class="col-md-3">Relationship to Patient</div>
                        </div>
                        <div id="family-composition-rows">
                            @for ($i = 0; $i < 3; $i++)
                            <div class="row g-2 mb-2 family-row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="family_member_name[]" placeholder="Enter full name">
                                </div>
                                <div class="col-md-3">
                                    <input type="date" class="form-control" name="family_member_birthdate[]">
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" name="family_member_age[]" placeholder="Age" min="0">
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select" name="relationship_to_patient[]">
                                        <option value="">Select</option>
                                        <option value="Parent">Parent</option>
                                        <option value="Sibling">Sibling</option>
                                        <option value="Spouse">Spouse</option>
                                        <option value="Child">Child</option>
                                        <option value="Relative">Relative</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            @endfor
                        </div>
                        <button type="button" class="btn btn-outline-success btn-sm mt-2" id="add-family-row">+ Add Family Member</button>
                    </div>
                </div>
            </div>
            <!-- Buttons outside the cards -->
            <div class="d-flex justify-content-between mt-4 ">
                <button type="button" class="btn btn-outline-success btn-lg backBtn w-50 me-2" data-back="1" style="max-width:50%;">Back</button>
                <button type="button" class="btn btn-success btn-lg nextBtn w-50 ms-2" data-next="3" style="max-width:50%;">Next</button>
            </div>
        </div>
        <!-- Step 3 (MSWD) -->
        <div class="form-step position-relative" id="step-3" style="display:none;">
            <div class="application-form-card mb-4">
                <h5 class="mb-3" style="color:#186737;font-weight:500;">MSWD Classification</h5>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Main Classification</label>
                        <select class="form-select" name="mswd_main_classification">
                            <option value="">Select</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Sub Classification for Non PhilHealth Coverage</label>
                        <select class="form-select" name="mswd_sub_classification">
                            <option value="">Select</option>
                            <option value="PWD">PWD</option>
                            <option value="Senior Citizen">Senior Citizen</option>
                            <option value="Solo Parent">Solo Parent</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Membership to Marginalized Sector</label>
                        <select class="form-select" name="mswd_marginalized_sector">
                            <option value="">Select</option>
                            <option value="4Ps">4Ps</option>
                            <option value="IP">IP</option>
                            <option value="Fisherfolk">Fisherfolk</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">MSS Class</label>
                        <select class="form-select" name="mswd_mss_class">
                            <option value="">Select</option>
                            <option value="Class 1">Class 1</option>
                            <option value="Class 2">Class 2</option>
                            <option value="Class 3">Class 3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="application-form-card">
                <h5 class="mb-3" style="color:#186737;font-weight:500;">Monthly Expenses</h5>
                <div class="family-composition-bordered p-3">
                    <div class="row mb-2" style="font-weight:500;">
                        <div class="col-md-6">Particulars</div>
                        <div class="col-md-6">Estimated Monthly Cost</div>
                    </div>
                    @php
                    $expenses = [
                        'Food', 'Education', 'Clothing', 'Transportation', 'Househelp', 'Medical Expenses',
                        'Insurance Premium', 'Electric Bills', 'Water Bills', 'Gas / Fuel'
                    ];
                    @endphp
                    @foreach($expenses as $expense)
                    <div class="row align-items-center mb-2">
                        <div class="col-md-6">{{ $expense }}</div>
                        <div class="col-md-6">
                            <input type="number" class="form-control monthly-expense-input" name="monthly_expenses[{{ $expense }}]" min="0" step="0.01" value="0.00">
                        </div>
                    </div>
                    @endforeach
                    <div class="row align-items-center mt-3">
                        <div class="col-md-6" style="font-weight:500;">TOTAL AMOUNT</div>
                        <div class="col-md-6"><span id="monthly-expenses-total">0.00</span></div>
                    </div>
                </div>
            </div>
            <!-- Buttons outside the card -->
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-outline-success btn-lg backBtn w-50 me-2" data-back="2" style="max-width:50%;">Back</button>
                <button type="button" class="btn btn-success btn-lg nextBtn w-50 ms-2" data-next="4" style="max-width:50%;">Next</button>
            </div>
        </div>
        <!-- Step 4 (Medical Data) -->
        <div class="form-step position-relative" id="step-4" style="display:none;">
            <div class="application-form-card mb-4">
                <h5 class="mb-3" style="color:#186737;font-weight:500;">Medical Data</h5>
                <!-- Medical history, allergies, etc. -->
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Do you have any allergies?</label>
                        <select class="form-select" name="allergies">
                            <option value="">Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">If yes, please specify</label>
                        <input type="text" class="form-control" name="allergies_details">
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Do you have any chronic illnesses?</label>
                        <select class="form-select" name="chronic_illnesses">
                            <option value="">Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">If yes, please specify</label>
                        <input type="text" class="form-control" name="chronic_illnesses_details">
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Are you currently taking any medications?</label>
                        <select class="form-select" name="current_medications">
                            <option value="">Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">If yes, please specify</label>
                        <input type="text" class="form-control" name="current_medications_details">
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Have you had any surgeries in the past?</label>
                        <select class="form-select" name="past_surgeries">
                            <option value="">Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">If yes, please specify</label>
                        <input type="text" class="form-control" name="past_surgeries_details">
                    </div>
                </div>
            </div>
            <!-- Buttons outside the card -->
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-outline-success btn-lg backBtn w-50 me-2" data-back="3" style="max-width:50%;">Back</button>
                <button type="button" class="btn btn-success btn-lg nextBtn w-50 ms-2" data-next="5" style="max-width:50%;">Next</button>
            </div>
        </div>
        <!-- Step 5, 6 ... (repeat similar structure) -->
        <!-- Final Step: Submit -->
        <div class="form-step position-relative" id="step-5" style="display:none;">
            <h5 class="mb-3" style="color:#186737;font-weight:700;">Summary</h5>
            <!-- Show summary of all fields here -->
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-outline-success btn-lg backBtn" data-back="4">Back</button>
                <button type="submit" class="btn btn-success btn-lg">Submit</button>
            </div>
        </div>
    </form>
</div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
.application-form, .application-form * {
    font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
}
.application-form {
    background: none !important;
    box-shadow: none !important;
    padding: 0;
    margin-top: 0;
}
.application-form-card {
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
.step.completed span {
    background: #186737;
    color: #fff;
    border-color: #186737;
}
html, body, .container {
    min-height: 80vh;
}
.family-composition-bordered {
    border: 1.4px solid #d9d9d9;
    border-radius: 12px;
    background: #fff;
}
</style>
<script>
const steps = document.querySelectorAll('.form-step');
const stepper = document.querySelectorAll('.stepper .step');
const nextBtns = document.querySelectorAll('.nextBtn');
const backBtns = document.querySelectorAll('.backBtn');

nextBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        const next = this.getAttribute('data-next');
        steps.forEach(s => s.style.display = 'none');
        document.getElementById('step-' + next).style.display = '';
        stepper.forEach(st => st.classList.remove('active', 'completed'));
        // Mark all previous steps as completed
        for (let i = 0; i < stepper.length; i++) {
            if (parseInt(stepper[i].getAttribute('data-step')) < next) {
                stepper[i].classList.add('completed');
            }
        }
        document.querySelector('.stepper .step[data-step="' + next + '"]').classList.add('active');
    });
});
backBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        const back = this.getAttribute('data-back');
        steps.forEach(s => s.style.display = 'none');
        document.getElementById('step-' + back).style.display = '';
        stepper.forEach(st => st.classList.remove('active', 'completed'));
        // Mark all previous steps as completed
        for (let i = 0; i < stepper.length; i++) {
            if (parseInt(stepper[i].getAttribute('data-step')) < back) {
                stepper[i].classList.add('completed');
            }
        }
        document.querySelector('.stepper .step[data-step="' + back + '"]').classList.add('active');
    });
});

document.getElementById('sameAsPermanent').addEventListener('change', function() {
    if(this.checked) {
        document.getElementById('temporary_address').value = document.querySelector('input[name="permanent_address"]').value;
    } else {
        document.getElementById('temporary_address').value = '';
    }
});

// Family composition repeater
const addFamilyRowBtn = document.getElementById('add-family-row');
const familyRows = document.getElementById('family-composition-rows');
addFamilyRowBtn.addEventListener('click', function() {
    const row = document.createElement('div');
    row.className = 'row g-2 mb-2 family-row';
    row.innerHTML = `
        <div class="col-md-4">
            <input type="text" class="form-control" name="family_member_name[]" placeholder="Enter full name">
        </div>
        <div class="col-md-3">
            <input type="date" class="form-control" name="family_member_birthdate[]">
        </div>
        <div class="col-md-2">
            <input type="number" class="form-control" name="family_member_age[]" placeholder="Age" min="0">
        </div>
        <div class="col-md-3">
            <select class="form-select" name="relationship_to_patient[]">
                <option value="">Select</option>
                <option value="Parent">Parent</option>
                <option value="Sibling">Sibling</option>
                <option value="Spouse">Spouse</option>
                <option value="Child">Child</option>
                <option value="Relative">Relative</option>
                <option value="Other">Other</option>
            </select>
        </div>
    `;
    familyRows.appendChild(row);
});

// Monthly Expenses total calculation
function updateMonthlyExpensesTotal() {
    let total = 0;
    document.querySelectorAll('.monthly-expense-input').forEach(function(input) {
        let val = parseFloat(input.value) || 0;
        total += val;
    });
    document.getElementById('monthly-expenses-total').textContent = total.toFixed(2);
}
document.addEventListener('input', function(e) {
    if (e.target.classList.contains('monthly-expense-input')) {
        updateMonthlyExpensesTotal();
    }
});
document.addEventListener('DOMContentLoaded', function() {
    updateMonthlyExpensesTotal();
});
</script>
