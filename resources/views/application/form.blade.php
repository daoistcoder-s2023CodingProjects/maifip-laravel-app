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
                        <input type="text" class="form-control" name="interview_venue" placeholder="Add venue" value="Bantugan, Presentacion" required>
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
                            <input type="number" class="form-control" name="patient_age" min="0" required>
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
                            <input type="text" class="form-control" name="patient_contact_number" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Place of Birth</label>
                            <input type="text" class="form-control" name="place_of_birth" required>
                        </div>
                        <div class="col-md-4 d-flex gap-2">
                            <div style="flex:1">
                                <label class="form-label">Nationality</label>
                                <input type="text" class="form-control" name="nationality" required>
                            </div>
                            <div style="flex:1">
                                <label class="form-label">Religion</label>
                                <input type="text" class="form-control" name="religion" required>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-12">
                            <label class="form-label">Permanent Address</label>
                            <input type="text" class="form-control" name="permanent_address" required>
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-12">
                            <label class="form-label">Temporary Address</label>
                            <input type="text" class="form-control" name="temporary_address" id="temporary_address" required>
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
                            <select class="form-select" name="civil_status" required>
                                <option value="">Select</option>
                                @foreach($maritalStatuses as $mStatus)
                                    <option value="{{ $mStatus }}">{{ $mStatus }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Living Status</label>
                            <select class="form-select" name="living_status" required>
                                <option value="">Select</option>
                                @foreach($livingStatus as $lStatus)
                                    <option value="{{ $lStatus }}">{{ $lStatus }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Highest Educational Attainment</label>
                            <select class="form-select" name="highest_education" required>
                                <option value="">Select</option>
                                @foreach($educations as $education)
                                    <option value="{{ $education }}">{{ $education }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-6">
                            <label class="form-label">Occupation</label>
                            <input type="text" class="form-control" name="occupation" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Monthly Income</label>
                            <input type="number" class="form-control" name="monthly_income" min="0" step="0.01" required>
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
                        <select class="form-select" name="mswd_main_classification" required>
                            <option value="">Select</option>
                            @foreach($mswdMainClass as $mainClass)
                                <option value="{{ $mainClass }}">{{ $mainClass }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Sub Classification for Non PhilHealth Coverage</label>
                        <select class="form-select" name="mswd_sub_classification" required>
                            <option value="">Select</option>
                            @foreach($mswdSubClass as $subClass)
                                <option value="{{ $subClass }}">{{ $subClass }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Membership to Marginalized Sector</label>
                        <select class="form-select" name="mswd_marginalized_sector" required>
                            <option value="">Select</option>
                            @foreach($marginalizedSector as $sector)
                                <option value="{{ $sector }}">{{ $sector }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">MSS Class</label>
                        <select class="form-select" name="mswd_mss_class" required>
                            <option value="">Select</option>
                            @foreach($mssClass as $class)
                                <option value="{{ $class }}">{{ $class }}</option>
                            @endforeach
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
                    <!-- Hidden input for total -->
                    <input type="hidden" name="monthly_expenses_total" id="monthly_expenses_total" value="0.00">
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
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Admitting Diagnosis</label>
                        <input type="text" class="form-control" name="admitting_diagnosis" placeholder="Add details" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Final Diagnosis</label>
                        <input type="text" class="form-control" name="final_diagnosis" placeholder="Add details" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Duration of Problems / Symptoms</label>
                        <input type="text" class="form-control" name="duration_of_problems" placeholder="Add details" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Previous Treatment / Duration</label>
                        <input type="text" class="form-control" name="previous_treatment" placeholder="Add details" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Present Treatment Plan</label>
                        <input type="text" class="form-control" name="present_treatment_plan" placeholder="Add details" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Health Accessibility Problem</label>
                        <input type="text" class="form-control" name="health_accessibility_problem" placeholder="Add details" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Assessment / Findings</label>
                        <input type="text" class="form-control" name="assessment_findings" placeholder="Add details" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Recommended Interventions</label>
                        <input type="text" class="form-control" name="recommended_interventions" placeholder="Add details" required>
                    </div>
                </div>
            </div>
            <!-- Buttons outside the card -->
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-outline-success btn-lg backBtn w-50 me-2" data-back="3" style="max-width:50%;">Back</button>
                <button type="button" class="btn btn-success btn-lg nextBtn w-50 ms-2" data-next="5" style="max-width:50%;">Next</button>
            </div>
        </div>
        <!-- Step 5: Summary Accordion and Privacy Consent -->
        <div class="form-step position-relative" id="step-5" style="display:none;">
            <div class="accordion" id="summaryAccordion">
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="headingInitial">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInitial" aria-expanded="false" aria-controls="collapseInitial" style="font-weight:600;color:#186737;">
                            Initial Information
                        </button>
                    </h2>
                    <div id="collapseInitial" class="accordion-collapse collapse" aria-labelledby="headingInitial" data-bs-parent="#summaryAccordion">
                        <div class="accordion-body">
                            <div class="mb-2"><strong>Hospital Name:</strong> <span id="summary_hospital_name"></span></div>
                            <div class="mb-2"><strong>Category:</strong> <span id="summary_category"></span></div>
                            <div class="mb-2"><strong>Date of Interview:</strong> <span id="summary_interview_date"></span></div>
                            <div class="mb-2"><strong>Venue of Interview:</strong> <span id="summary_interview_venue"></span></div>
                            <div class="mb-2"><strong>Start of Interview:</strong> <span id="summary_interview_start_time"></span></div>
                            <div class="mb-2"><strong>End of Interview:</strong> <span id="summary_interview_end_time"></span></div>
                            <div class="mb-2"><strong>Name of Informant:</strong> <span id="summary_informant_name"></span></div>
                            <div class="mb-2"><strong>Relation to Patient:</strong> <span id="summary_relation_to_patient"></span></div>
                            <div class="mb-2"><strong>Contact Number:</strong> <span id="summary_informant_contact_number"></span></div>
                            <div class="mb-2"><strong>Address:</strong> <span id="summary_informant_address"></span></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="headingPatient">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePatient" aria-expanded="false" aria-controls="collapsePatient" style="font-weight:600;color:#186737;">
                            Patient Information
                        </button>
                    </h2>
                    <div id="collapsePatient" class="accordion-collapse collapse" aria-labelledby="headingPatient" data-bs-parent="#summaryAccordion">
                        <div class="accordion-body">
                            <div class="mb-2"><strong>Family Name:</strong> <span id="summary_patient_family_name"></span></div>
                            <div class="mb-2"><strong>First Name:</strong> <span id="summary_patient_first_name"></span></div>
                            <div class="mb-2"><strong>Middle Name:</strong> <span id="summary_patient_middle_name"></span></div>
                            <div class="mb-2"><strong>Extension:</strong> <span id="summary_patient_extension"></span></div>
                            <div class="mb-2"><strong>Date of Birth:</strong> <span id="summary_patient_birthdate"></span></div>
                            <div class="mb-2"><strong>Age:</strong> <span id="summary_patient_age"></span></div>
                            <div class="mb-2"><strong>Gender:</strong> <span id="summary_patient_gender"></span></div>
                            <div class="mb-2"><strong>Contact Number:</strong> <span id="summary_patient_contact_number"></span></div>
                            <div class="mb-2"><strong>Place of Birth:</strong> <span id="summary_place_of_birth"></span></div>
                            <div class="mb-2"><strong>Nationality:</strong> <span id="summary_nationality"></span></div>
                            <div class="mb-2"><strong>Religion:</strong> <span id="summary_religion"></span></div>
                            <div class="mb-2"><strong>Permanent Address:</strong> <span id="summary_permanent_address"></span></div>
                            <div class="mb-2"><strong>Temporary Address:</strong> <span id="summary_temporary_address"></span></div>
                            <div class="mb-2"><strong>Civil Status:</strong> <span id="summary_civil_status"></span></div>
                            <div class="mb-2"><strong>Living Status:</strong> <span id="summary_living_status"></span></div>
                            <div class="mb-2"><strong>Highest Educational Attainment:</strong> <span id="summary_highest_education"></span></div>
                            <div class="mb-2"><strong>Occupation:</strong> <span id="summary_occupation"></span></div>
                            <div class="mb-2"><strong>Monthly Income:</strong> <span id="summary_monthly_income"></span></div>
                            <div class="mb-2"><strong>PhilHealth PIN:</strong> <span id="summary_philhealth_pin"></span></div>
                            <div class="mb-2"><strong>Contributor Status:</strong> <span id="summary_philhealth_contributor_status"></span></div>
                            <div class="mb-2 mt-4"><strong>Family Composition:</strong></div>
                            <div id="summary_family_composition"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="headingMSWD">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMSWD" aria-expanded="false" aria-controls="collapseMSWD" style="font-weight:600;color:#186737;">
                            MSWD Classification
                        </button>
                    </h2>
                    <div id="collapseMSWD" class="accordion-collapse collapse" aria-labelledby="headingMSWD" data-bs-parent="#summaryAccordion">
                        <div class="accordion-body">
                            <!-- MSWD Classification fields go here -->
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="headingMedical">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMedical" aria-expanded="false" aria-controls="collapseMedical" style="font-weight:600;color:#186737;">
                            Medical Data
                        </button>
                    </h2>
                    <div id="collapseMedical" class="accordion-collapse collapse" aria-labelledby="headingMedical" data-bs-parent="#summaryAccordion">
                        <div class="accordion-body">
                            <!-- Medical Data fields go here -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="application-form-card mt-4">
                <h5 class="mb-3" id="data-privacy-title" style="color:#186737;font-weight:500;">Data Privacy Consent & Certification</h5>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="consent1">
                    <label class="form-check-label" for="consent1" style="font-size:0.75rem;">
                        I allow the Local Government to use my personal information to process my request for medical assistance. In accordance with the Data Privacy Act of 2012, and its implementing rules and regulations effective September 8, 2016.
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="consent2">
                    <label class="form-check-label" for="consent2" style="font-size:0.75rem;">
                        I understand that our request for assistance from the Medical Social Service is subject to the outcome of the Social Worker's interview with us. Any false information we provide can be used as a reason to invalidate our request for assistance. Due to this, we will pay all of our patient's bills here at the hospital.
                    </label>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-outline-success btn-lg backBtn w-50 me-2" data-back="4" style="max-width:50%;">Back</button>
                <button type="submit" class="btn btn-success btn-lg w-50 ms-2" id="submitBtn" style="max-width:50%;">Submit Application</button>
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
body, .application-form {
    background: #f8f9fa !important;
}
.accordion-button {
    font-weight: 500 !important;
}
@media (max-width: 600px) {
  .maifip-modal-title { font-size: 1.05rem; }
  .step { font-size: 0.7rem; }
  #data-privacy-title {
    font-size: 1.05rem !important;
  }
}
</style>
<script>
const steps = document.querySelectorAll('.form-step');
const stepper = document.querySelectorAll('.stepper .step');
const nextBtns = document.querySelectorAll('.nextBtn');
const backBtns = document.querySelectorAll('.backBtn');

nextBtns.forEach(btn => {
    btn.addEventListener('click', function(e) {
        const next = this.getAttribute('data-next');
        // Only validate if not going to summary step
        const currentStep = this.closest('.form-step');
        let valid = true;
        // Find all required fields in the current step
        const requiredFields = currentStep.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            if (!field.value) {
                field.classList.add('is-invalid');
                valid = false;
            } else {
                field.classList.remove('is-invalid');
            }
        });
        if (!valid) {
            e.preventDefault();
            // Optionally scroll to first invalid field
            const firstInvalid = currentStep.querySelector('.is-invalid');
            if (firstInvalid) firstInvalid.scrollIntoView({behavior:'smooth', block:'center'});
            return;
        }
        // --- Custom validation: At least one family member name required on Step 2 ---
        if (currentStep.id === 'step-2') {
            const famNameFields = currentStep.querySelectorAll('#family-composition-rows [name="family_member_name[]"]');
            let atLeastOneFilled = false;
            famNameFields.forEach(field => {
                if (field.value.trim() !== '') atLeastOneFilled = true;
            });
            if (!atLeastOneFilled) {
                famNameFields.forEach(field => field.classList.add('is-invalid'));
                e.preventDefault();
                famNameFields[0].scrollIntoView({behavior:'smooth', block:'center'});
                return;
            } else {
                famNameFields.forEach(field => field.classList.remove('is-invalid'));
            }
        }
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
        // --- Fix: Always scroll to top of page on step change ---
        window.scrollTo({ top: 0, behavior: 'smooth' });
        // Populate Step 1 summary accordion with current form values when entering Step 5
        if (next == '5') {
            document.getElementById('summary_hospital_name').textContent = document.querySelector('[name="hospital_name"]').value;
            document.getElementById('summary_category').textContent = document.querySelector('[name="category"]').value;
            document.getElementById('summary_interview_date').textContent = document.querySelector('[name="interview_date"]').value;
            document.getElementById('summary_interview_venue').textContent = document.querySelector('[name="interview_venue"]').value;
            document.getElementById('summary_interview_start_time').textContent = document.querySelector('[name="interview_start_time"]').value;
            document.getElementById('summary_interview_end_time').textContent = document.querySelector('[name="interview_end_time"]').value;
            document.getElementById('summary_informant_name').textContent = document.querySelector('[name="informant_name"]').value;
            document.getElementById('summary_relation_to_patient').textContent = document.querySelector('[name="relation_to_patient"]').value;
            document.getElementById('summary_informant_contact_number').textContent = document.querySelector('[name="informant_contact_number"]').value;
            document.getElementById('summary_informant_address').textContent = document.querySelector('[name="informant_address"]').value;
            // Step 2: Patient Information
            document.getElementById('summary_patient_family_name').textContent = document.querySelector('[name="patient_family_name"]').value;
            document.getElementById('summary_patient_first_name').textContent = document.querySelector('[name="patient_first_name"]').value;
            document.getElementById('summary_patient_middle_name').textContent = document.querySelector('[name="patient_middle_name"]').value;
            document.getElementById('summary_patient_extension').textContent = document.querySelector('[name="patient_extension"]').value;
            document.getElementById('summary_patient_birthdate').textContent = document.querySelector('[name="patient_birthdate"]').value;
            document.getElementById('summary_patient_age').textContent = document.querySelector('[name="patient_age"]').value;
            document.getElementById('summary_patient_gender').textContent = document.querySelector('[name="patient_gender"]').value;
            document.getElementById('summary_patient_contact_number').textContent = document.querySelector('[name="patient_contact_number"]').value;
            document.getElementById('summary_place_of_birth').textContent = document.querySelector('[name="place_of_birth"]').value;
            document.getElementById('summary_nationality').textContent = document.querySelector('[name="nationality"]').value;
            document.getElementById('summary_religion').textContent = document.querySelector('[name="religion"]').value;
            document.getElementById('summary_permanent_address').textContent = document.querySelector('[name="permanent_address"]').value;
            document.getElementById('summary_temporary_address').textContent = document.querySelector('[name="temporary_address"]').value;
            document.getElementById('summary_civil_status').textContent = document.querySelector('[name="civil_status"]').value;
            document.getElementById('summary_living_status').textContent = document.querySelector('[name="living_status"]').value;
            document.getElementById('summary_highest_education').textContent = document.querySelector('[name="highest_education"]').value;
            document.getElementById('summary_occupation').textContent = document.querySelector('[name="occupation"]').value;
            document.getElementById('summary_monthly_income').textContent = document.querySelector('[name="monthly_income"]').value;
            document.getElementById('summary_philhealth_pin').textContent = document.querySelector('[name="philhealth_pin"]').value;
            document.getElementById('summary_philhealth_contributor_status').textContent = document.querySelector('[name="philhealth_contributor_status"]').value;
            // Family Composition summary
            const famRows = document.querySelectorAll('#family-composition-rows .family-row');
            let famTable = '<table class="table table-sm table-bordered" style="font-size:0.97em;"><thead><tr><th>Name</th><th>Date of Birth</th><th>Age</th><th>Relationship</th></tr></thead><tbody>';
            let hasData = false;
            famRows.forEach(row => {
                const name = row.querySelector('[name="family_member_name[]"]').value;
                const dob = row.querySelector('[name="family_member_birthdate[]"]').value;
                const age = row.querySelector('[name="family_member_age[]"]').value;
                const rel = row.querySelector('[name="relationship_to_patient[]"]').value;
                if (name || dob || age || rel) {
                    famTable += `<tr><td>${name}</td><td>${dob}</td><td>${age}</td><td>${rel}</td></tr>`;
                    hasData = true;
                }
            });
            famTable += '</tbody></table>';
            document.getElementById('summary_family_composition').innerHTML = hasData ? famTable : '<em>No family members listed.</em>';
            // MSWD Classification summary (Accordion 3)
            let mswdSummary = '';
            mswdSummary += '<div class="mb-2"><strong>Main Classification:</strong> ' + (document.querySelector('[name="mswd_main_classification"]').value || '-') + '</div>';
            mswdSummary += '<div class="mb-2"><strong>Sub Classification:</strong> ' + (document.querySelector('[name="mswd_sub_classification"]').value || '-') + '</div>';
            mswdSummary += '<div class="mb-2"><strong>Marginalized Sector:</strong> ' + (document.querySelector('[name="mswd_marginalized_sector"]').value || '-') + '</div>';
            mswdSummary += '<div class="mb-2"><strong>MSS Class:</strong> ' + (document.querySelector('[name="mswd_mss_class"]').value || '-') + '</div>';
            // Monthly Expenses total only
            mswdSummary += '<div class="mb-2"><strong>Monthly Expenses (Total):</strong> <span id="summary_monthly_expenses_total">' + (document.getElementById('monthly-expenses-total').textContent || '0.00') + '</span></div>';
            document.querySelector('#collapseMSWD .accordion-body').innerHTML = mswdSummary;
            // Medical Data summary (Accordion 4)
            let medSummary = '';
            medSummary += '<div class="mb-2"><strong>Admitting Diagnosis:</strong> ' + (document.querySelector('[name="admitting_diagnosis"]').value || '-') + '</div>';
            medSummary += '<div class="mb-2"><strong>Final Diagnosis:</strong> ' + (document.querySelector('[name="final_diagnosis"]').value || '-') + '</div>';
            medSummary += '<div class="mb-2"><strong>Duration of Problems / Symptoms:</strong> ' + (document.querySelector('[name="duration_of_problems"]').value || '-') + '</div>';
            medSummary += '<div class="mb-2"><strong>Previous Treatment / Duration:</strong> ' + (document.querySelector('[name="previous_treatment"]').value || '-') + '</div>';
            medSummary += '<div class="mb-2"><strong>Present Treatment Plan:</strong> ' + (document.querySelector('[name="present_treatment_plan"]').value || '-') + '</div>';
            medSummary += '<div class="mb-2"><strong>Health Accessibility Problem:</strong> ' + (document.querySelector('[name="health_accessibility_problem"]').value || '-') + '</div>';
            medSummary += '<div class="mb-2"><strong>Assessment / Findings:</strong> ' + (document.querySelector('[name="assessment_findings"]').value || '-') + '</div>';
            medSummary += '<div class="mb-2"><strong>Recommended Interventions:</strong> ' + (document.querySelector('[name="recommended_interventions"]').value || '-') + '</div>';
            document.querySelector('#collapseMedical .accordion-body').innerHTML = medSummary;
        }
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
    // Update hidden input
    const hiddenInput = document.getElementById('monthly_expenses_total');
    if (hiddenInput) hiddenInput.value = total.toFixed(2);
}
document.addEventListener('input', function(e) {
    if (e.target.classList.contains('monthly-expense-input')) {
        updateMonthlyExpensesTotal();
    }
});
document.addEventListener('DOMContentLoaded', function() {
    updateMonthlyExpensesTotal();
});

// --- Data Privacy Consent Checkbox State Persistence and Validation ---
const consent1 = document.getElementById('consent1');
const consent2 = document.getElementById('consent2');
const submitBtn = document.getElementById('submitBtn');

function updateConsentState() {
    // Save state to localStorage
    localStorage.setItem('maifip_consent1', consent1.checked ? '1' : '0');
    localStorage.setItem('maifip_consent2', consent2.checked ? '1' : '0');
    // Enable submit only if both are checked
    submitBtn.disabled = !(consent1.checked && consent2.checked);
}

// Restore state on load
function restoreConsentState() {
    const c1 = localStorage.getItem('maifip_consent1');
    const c2 = localStorage.getItem('maifip_consent2');
    consent1.checked = c1 === '1';
    consent2.checked = c2 === '1';
    submitBtn.disabled = !(consent1.checked && consent2.checked);
}

document.addEventListener('DOMContentLoaded', function() {
    restoreConsentState();
    // Also update on any change
    consent1.addEventListener('change', updateConsentState);
    consent2.addEventListener('change', updateConsentState);
    // If form is reset, re-apply state
    document.getElementById('maifip-multistep-form').addEventListener('reset', function() {
        setTimeout(restoreConsentState, 10);
    });
});

// --- SUBMIT HANDLER WITH LOADING, MODAL, AND RESET ---
document.getElementById('maifip-multistep-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    // Show loading overlay
    document.getElementById('form-overlay').style.display = 'flex';
    // Prepare form data
    const form = e.target;
    const formData = new FormData(form);
    try {
        const response = await fetch(form.action, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value
            },
            body: formData
        });
        if (!response.ok) throw new Error('Submission failed');
        const data = await response.json();
        // Hide loading overlay
        document.getElementById('form-overlay').style.display = 'none';
        // Show modal with reference number from API
        showSuccessModal(data.application_reference_number);
    } catch (err) {
        document.getElementById('form-overlay').style.display = 'none';
        alert('There was an error submitting your application. Please try again.');
    }
});

function showSuccessModal(ref) {
    // Remove any existing modal
    const oldModal = document.getElementById('maifip-success-modal');
    if (oldModal) oldModal.remove();
    // Modal HTML
    const modal = document.createElement('div');
    modal.id = 'maifip-success-modal';
    modal.innerHTML = `
    <div class="maifip-modal-overlay"></div>
    <div class="maifip-modal-card">
        <div class="application-form-card" style="box-shadow:none;margin-top:0;margin-bottom:0;padding:2rem 1.5rem 1.5rem 1.5rem;">
            <div class="maifip-modal-header">
                <img src="/images/maifip_logo.png" alt="MAIFIP Logo" style="height: 50px; width: 50px; margin-right: 1rem;">
                <div class="maifip-brand">
                    <div class="maifip-title">MAIFIP</div>
                    <div class="maifip-modal-sub">Medical Assistance to Indigent and Financially Incapacitated Patients</div>
                </div>
            </div>
            <div class="maifip-modal-body">
                <div class="maifip-modal-success">Medical Assistance Application Submitted!</div>
                <div class="maifip-modal-desc">We are currently reviewing your application<br>and will notify you via SMS of the status<br>within 24hrs.<br><br>Your application reference number is <span class="maifip-modal-ref">${ref}</span>.<br>Please keep this number for all future inquiries regarding your application. Thank you!</div>
            </div>
            <button class="btn btn-success btn-lg w-100 mt-3" id="maifip-modal-close">Close</button>
        </div>
    </div>
    `;
    document.body.appendChild(modal);
    // Clear all form data and localStorage for consents
    document.getElementById('maifip-multistep-form').reset();
    localStorage.removeItem('maifip_consent1');
    localStorage.removeItem('maifip_consent2');
    // Reset to step 1
    steps.forEach(s => s.style.display = 'none');
    document.getElementById('step-1').style.display = '';
    stepper.forEach(st => st.classList.remove('active', 'completed'));
    document.querySelector('.stepper .step[data-step="1"]').classList.add('active');
    // Modal close handler
    document.getElementById('maifip-modal-close').onclick = function() {
        modal.remove();
        window.location.reload();
    };
}
// --- MODAL STYLES ---
const modalStyle = document.createElement('style');
modalStyle.innerHTML = `
.maifip-modal-overlay {
    position: fixed; left: 0; top: 0; width: 100vw; height: 100vh;
    background: linear-gradient(135deg,#eaf8f2 0%,#f8f9fa 100%); opacity: 0.92;
    z-index: 2000;
}
.maifip-modal-card {
    position: fixed; left: 50%; top: 50%; transform: translate(-50%,-50%);
    background: #fff; border-radius: 18px; box-shadow: 0 8px 32px 0 rgba(24,103,55,0.10);
    padding: 0.5rem 0.5rem 0 0.5rem; min-width: 150px; max-width: 76vw; width: 35vw; z-index: 2001;
    display: flex; flex-direction: column; align-items: center;
    text-align: left;
}
.maifip-modal-header { display: flex; align-items: center; margin-bottom: 2.5rem; }
.maifip-modal-title { font-weight: 700; color: #186737; font-size: 1.25rem; letter-spacing: 0.12em; }
.maifip-modal-sub { font-size: 0.8em; color: #222; font-weight: 600; }
.maifip-modal-success { color: #186737; font-size: 1.15rem; font-weight: 600; margin-bottom: 1.1rem; margin-left: 0.5rem; }
.maifip-modal-desc { color: #222; font-size: 1.15rem; text-align: left !important; margin-bottom: 0.7rem;  margin-left: 0.5rem; }
.maifip-modal-ref { color: #186737; font-weight: 600; letter-spacing: 0.04em; }
@media (max-width: 600px) {
  .maifip-modal-card { padding: .25rem 0.5rem; min-width: 0; width: 95vw; position: fixed; left: 50%; top: 40%; transform: translate(-50%,-50%);}
  .maifip-modal-header img { height: 38px !important; width: 38px !important; }
  .maifip-modal-title { font-size: 1rem; letter-spacing: 0.8em; }
  .maifip-modal-desc { color: #222; font-size: 0.85rem; text-align: left !important; margin-bottom: 0.7rem;  margin-left: 0.5rem; }
}
`;
document.head.appendChild(modalStyle);
</script>
<!-- Bootstrap 5 CSS & JS for Accordion functionality -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
