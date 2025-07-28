<!-- Application Details Modal Accordion (for Approve/Decline) -->
<div class="modal fade" id="applicationDetailsModal" tabindex="-1" aria-labelledby="applicationDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="maifip-modal-header" style="width:100%; justify-content:center; background:transparent; border:none; box-shadow:none; margin-bottom:2.5rem; padding-top:2.2rem;">
        <img src="/images/maifip_logo.png" alt="MAIFIP Logo" style="height:54px;width:54px;margin-right:1.2rem;">
        <div>
          <div class="maifip-modal-title">M A I F I P</div>
          <div class="maifip-modal-sub">Medical Assistance to Indigent and Financially Incapacitated Patients</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position:absolute;right:2.2rem;top:2.2rem;"></button>
      </div>
      <style>
      .maifip-modal-header {
        display: flex;
        align-items: center;
        margin-bottom: 2.5rem;
        background: transparent;
        border: none;
        box-shadow: none;
        position: relative;
        padding-top: 2.2rem;
      }
      .maifip-modal-title {
        font-weight: 700;
        color: #186737;
        font-size: 1.25rem;
        letter-spacing: 0.12em;
        margin-bottom: 0.1rem;
      }
      .maifip-modal-sub {
        font-size: 0.98rem;
        color: #222;
        font-weight: 600;
        margin-top: 0.1rem;
      }
      @media (max-width: 600px) {
        .maifip-modal-header img { height: 38px !important; width: 38px !important; }
        .maifip-modal-title { font-size: 1.05rem; }
      }
      </style>
      <div class="modal-body" style="background: #f8f9fa !important; padding: 2rem 2rem 1.5rem 2rem;">
        <div class="accordion" id="summaryAccordion">
          <div class="accordion-item mb-3">
            <h2 class="accordion-header" id="headingInitial">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInitial" aria-expanded="false" aria-controls="collapseInitial" style="font-weight:600;color:#186737;">
                Initial Information
              </button>
            </h2>
            <div id="collapseInitial" class="accordion-collapse collapse" aria-labelledby="headingInitial" data-bs-parent="#summaryAccordion">
              <div class="accordion-body">
                <div class="mb-2"><strong>Hospital Name:</strong> <span id="modal_summary_hospital_name"></span></div>
                <div class="mb-2"><strong>Category:</strong> <span id="modal_summary_category"></span></div>
                <div class="mb-2"><strong>Date of Interview:</strong> <span id="modal_summary_interview_date"></span></div>
                <div class="mb-2"><strong>Venue of Interview:</strong> <span id="modal_summary_interview_venue"></span></div>
                <div class="mb-2"><strong>Start of Interview:</strong> <span id="modal_summary_interview_start_time"></span></div>
                <div class="mb-2"><strong>End of Interview:</strong> <span id="modal_summary_interview_end_time"></span></div>
                <div class="mb-2"><strong>Name of Informant:</strong> <span id="modal_summary_informant_name"></span></div>
                <div class="mb-2"><strong>Relation to Patient:</strong> <span id="modal_summary_relation_to_patient"></span></div>
                <div class="mb-2"><strong>Contact Number:</strong> <span id="modal_summary_informant_contact_number"></span></div>
                <div class="mb-2"><strong>Address:</strong> <span id="modal_summary_informant_address"></span></div>
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
                <div class="mb-2"><strong>Family Name:</strong> <span id="modal_summary_patient_family_name"></span></div>
                <div class="mb-2"><strong>First Name:</strong> <span id="modal_summary_patient_first_name"></span></div>
                <div class="mb-2"><strong>Middle Name:</strong> <span id="modal_summary_patient_middle_name"></span></div>
                <div class="mb-2"><strong>Extension:</strong> <span id="modal_summary_patient_extension"></span></div>
                <div class="mb-2"><strong>Date of Birth:</strong> <span id="modal_summary_patient_birthdate"></span></div>
                <div class="mb-2"><strong>Age:</strong> <span id="modal_summary_patient_age"></span></div>
                <div class="mb-2"><strong>Gender:</strong> <span id="modal_summary_patient_gender"></span></div>
                <div class="mb-2"><strong>Contact Number:</strong> <span id="modal_summary_patient_contact_number"></span></div>
                <div class="mb-2"><strong>Place of Birth:</strong> <span id="modal_summary_place_of_birth"></span></div>
                <div class="mb-2"><strong>Nationality:</strong> <span id="modal_summary_nationality"></span></div>
                <div class="mb-2"><strong>Religion:</strong> <span id="modal_summary_religion"></span></div>
                <div class="mb-2"><strong>Permanent Address:</strong> <span id="modal_summary_permanent_address"></span></div>
                <div class="mb-2"><strong>Temporary Address:</strong> <span id="modal_summary_temporary_address"></span></div>
                <div class="mb-2"><strong>Civil Status:</strong> <span id="modal_summary_civil_status"></span></div>
                <div class="mb-2"><strong>Living Status:</strong> <span id="modal_summary_living_status"></span></div>
                <div class="mb-2"><strong>Highest Educational Attainment:</strong> <span id="modal_summary_highest_education"></span></div>
                <div class="mb-2"><strong>Occupation:</strong> <span id="modal_summary_occupation"></span></div>
                <div class="mb-2"><strong>Monthly Income:</strong> <span id="modal_summary_monthly_income"></span></div>
                <div class="mb-2"><strong>PhilHealth PIN:</strong> <span id="modal_summary_philhealth_pin"></span></div>
                <div class="mb-2"><strong>Contributor Status:</strong> <span id="modal_summary_philhealth_contributor_status"></span></div>
                <div class="mb-2 mt-4"><strong>Family Composition:</strong></div>
                <div id="modal_summary_family_composition"></div>
              </div>
            </div>
          </div>
          <div class="accordion-item mb-3">
            <h2 class="accordion-header" id="headingMSWD">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#modal_collapseMSWD" aria-expanded="false" aria-controls="modal_collapseMSWD" style="font-weight:600;color:#186737;">
                MSWD Classification
              </button>
            </h2>
            <div id="modal_collapseMSWD" class="accordion-collapse collapse" aria-labelledby="headingMSWD" data-bs-parent="#summaryAccordion">
              <div class="accordion-body">
                <div class="mb-2"><strong>Main Classification:</strong> <span id="modal_summary_mswd_main_classification"></span></div>
                <div class="mb-2"><strong>Sub Classification:</strong> <span id="modal_summary_mswd_sub_classification"></span></div>
                <div class="mb-2"><strong>Marginalized Sector:</strong> <span id="modal_summary_mswd_marginalized_sector"></span></div>
                <div class="mb-2"><strong>MSS Class:</strong> <span id="modal_summary_mswd_mss_class"></span></div>
                <div class="mb-2"><strong>Monthly Expenses:</strong></div>
                <div id="modal_summary_monthly_expenses"></div>
              </div>
            </div>
          </div>
          <div class="accordion-item mb-3">
            <h2 class="accordion-header" id="headingMedical">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#modal_collapseMedical" aria-expanded="false" aria-controls="modal_collapseMedical" style="font-weight:600;color:#186737;">
                Medical Data
              </button>
            </h2>
            <div id="modal_collapseMedical" class="accordion-collapse collapse" aria-labelledby="headingMedical" data-bs-parent="#summaryAccordion">
              <div class="accordion-body">
                <div class="mb-2"><strong>Admitting Diagnosis:</strong> <span id="modal_summary_admitting_diagnosis"></span></div>
                <div class="mb-2"><strong>Final Diagnosis:</strong> <span id="modal_summary_final_diagnosis"></span></div>
                <div class="mb-2"><strong>Duration of Problems / Symptoms:</strong> <span id="modal_summary_duration_of_problems"></span></div>
                <div class="mb-2"><strong>Previous Treatment / Duration:</strong> <span id="modal_summary_previous_treatment"></span></div>
                <div class="mb-2"><strong>Present Treatment Plan:</strong> <span id="modal_summary_present_treatment_plan"></span></div>
                <div class="mb-2"><strong>Health Accessibility Problem:</strong> <span id="modal_summary_health_accessibility_problem"></span></div>
                <div class="mb-2"><strong>Assessment / Findings:</strong> <span id="modal_summary_assessment_findings"></span></div>
                <div class="mb-2"><strong>Recommended Interventions:</strong> <span id="modal_summary_recommended_interventions"></span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between" style="padding: 0 1.75rem 1rem 1.75rem;">
        <button type="button" class="btn btn-outline-success btn-lg w-50 me-2" id="declineApplicationBtn" style="max-width:50%;">Decline Application</button>
        <button type="button" class="btn btn-success btn-lg w-50 ms-2" id="approveApplicationBtn" style="max-width:50%;">Approve Application</button>
      </div>
    </div>
  </div>
</div>
