<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'applicant_id' => $this->applicant_id,
            'application_reference_number' => $this->application_reference_number,
            'is_approved' => $this->is_approved,
            'hospital_name' => $this->hospital_name,
            'category' => $this->category,
            'interview_date' => $this->interview_date,
            'interview_venue' => $this->interview_venue,
            'interview_start_time' => $this->interview_start_time,
            'interview_end_time' => $this->interview_end_time,
            'informant_name' => $this->informant_name,
            'informant_address' => $this->informant_address,
            'relation_to_patient' => $this->relation_to_patient,
            'informant_contact_number' => $this->informant_contact_number,
            'patient_family_name' => $this->patient_family_name,
            'patient_first_name' => $this->patient_first_name,
            'patient_middle_name' => $this->patient_middle_name,
            'patient_extension' => $this->patient_extension,
            'patient_birthdate' => $this->patient_birthdate,
            'patient_age' => $this->patient_age,
            'patient_gender' => $this->patient_gender,
            'patient_contact_number' => $this->patient_contact_number,
            'place_of_birth' => $this->place_of_birth,
            'nationality' => $this->nationality,
            'religion' => $this->religion,
            'permanent_address' => $this->permanent_address,
            'temporary_address' => $this->temporary_address,
            'civil_status' => $this->civil_status,
            'living_status' => $this->living_status,
            'highest_education' => $this->highest_education,
            'occupation' => $this->occupation,
            'monthly_income' => $this->monthly_income,
            'philhealth_pin' => $this->philhealth_pin,
            'philhealth_contributor_status' => $this->philhealth_contributor_status,
            'family_composition' => json_decode($this->family_composition),
            'mswd_main_classification' => $this->mswd_main_classification,
            'mswd_sub_classification' => $this->mswd_sub_classification,
            'mswd_marginalized_sector' => $this->mswd_marginalized_sector,
            'mswd_mss_class' => $this->mswd_mss_class,
            'monthly_expenses' => json_decode($this->monthly_expenses),
            'admitting_diagnosis' => $this->admitting_diagnosis,
            'final_diagnosis' => $this->final_diagnosis,
            'duration_of_problems' => $this->duration_of_problems,
            'previous_treatment' => $this->previous_treatment,
            'present_treatment_plan' => $this->present_treatment_plan,
            'health_accessibility_problem' => $this->health_accessibility_problem,
            'assessment_findings' => $this->assessment_findings,
            'recommended_interventions' => $this->recommended_interventions,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
