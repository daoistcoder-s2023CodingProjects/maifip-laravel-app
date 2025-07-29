<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicant extends Model
{
    use HasFactory;

    protected $table = 'applicant';
    protected $primaryKey = 'applicant_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'hospital_name',
        'category',
        'interview_date',
        'interview_venue',
        'interview_start_time',
        'interview_end_time',
        'informant_name',
        'informant_address',
        'relation_to_patient',
        'informant_contact_number',
        // Step 2: Patient Information
        'patient_family_name',
        'patient_first_name',
        'patient_middle_name',
        'patient_extension',
        'patient_birthdate',
        'patient_age',
        'patient_gender',
        'patient_contact_number',
        'place_of_birth',
        'nationality',
        'religion',
        'permanent_address',
        'temporary_address',
        'civil_status',
        'living_status',
        'highest_education',
        'occupation',
        'monthly_income',
        'philhealth_pin',
        'philhealth_contributor_status',
        // Step 2: Family Composition (JSON)
        'family_composition',
        // Step 3: MSWD
        'mswd_main_classification',
        'mswd_sub_classification',
        'mswd_marginalized_sector',
        'mswd_mss_class',
        'monthly_expenses',
        // Step 4: Medical Data
        'admitting_diagnosis',
        'final_diagnosis',
        'duration_of_problems',
        'previous_treatment',
        'present_treatment_plan',
        'health_accessibility_problem',
        'assessment_findings',
        'recommended_interventions',
        // System fields
        'application_reference_number',
        'is_approved',
        // Newly added fields
        'medical_service',
        'maifip_assistance_amount',
    ];

    // Computed field for application status
    public function getApplicationStatusAttribute()
    {
        switch (true) {
            case is_null($this->is_approved):
                return 'pending';
            case ($this->is_approved === true || $this->is_approved === 1 || $this->is_approved === '1'):
                return 'approved';
            case ($this->is_approved === false || $this->is_approved === 0 || $this->is_approved === '0'):
                return 'declined';
        }
    }
}
