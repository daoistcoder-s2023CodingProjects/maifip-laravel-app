<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Applicant;

class ApplicationController extends Controller
{
    public function showForm()
    {
        // Dummy data for dropdowns
        $hospitals = [
            'General Hospital',
            'City Medical Center',
            'Provincial Hospital',
            'Community Health Clinic',
        ];
        $categories = [
            'In-Patient',
            'Out-Patient',
            'Walk-In',
            'Others',
        ];
        $relations = [
            'Parent',
            'Sibling',
            'Spouse',
            'Child',
            'Relative',
            'Friend',
            'Other',
        ];
        // Office hours 10:00 AM to 5:00 PM, 30 min interval
        $timeSelections = [];
        $start = strtotime('10:00');
        $end = strtotime('17:00');
        for ($t = $start; $t <= $end; $t += 1800) {
            $display = date('h:i A', $t);
            $value = date('H:i', $t); // military format
            $timeSelections[] = [
                'label' => $display,
                'value' => $value
            ];
        }
        return view('application', compact('hospitals', 'categories', 'relations', 'timeSelections'));
    }

    public function view($id)
    {
        $applicant = Applicant::findOrFail($id);
        // Dummy data for dropdowns (reuse for step 2)
        $genders = ['Male', 'Female', 'Other'];
        $civilStatuses = ['Single', 'Married', 'Widowed', 'Separated'];
        $livingStatuses = ['With Family', 'Alone', 'With Relatives'];
        $educations = ['None', 'Elementary', 'High School', 'College', 'Postgraduate'];
        $contributorStatuses = ['Member', 'Dependent', 'Non-member'];
        $relations = [
            'Parent', 'Sibling', 'Spouse', 'Child', 'Relative', 'Friend', 'Other',
        ];
        return view('application.form2', compact('applicant', 'genders', 'civilStatuses', 'livingStatuses', 'educations', 'contributorStatuses', 'relations'));
    }

    public function submit(Request $request)
    {
        try {
            \Log::debug('Application submission request data:', $request->all());   
            
            $validated = $request->validate([
                'hospital_name' => 'nullable|string',
                'category' => 'nullable|string',
                'interview_date' => 'nullable|date',
                'interview_venue' => 'nullable|string',
                'interview_start_time' => 'nullable|string',
                'interview_end_time' => 'nullable|string',
                'informant_name' => 'nullable|string',
                'informant_address' => 'nullable|string',
                'relation_to_patient' => 'nullable|string',
                'informant_contact_number' => 'nullable|string',
                // Step 2: Patient Information
                'patient_family_name' => 'nullable|string',
                'patient_first_name' => 'nullable|string',
                'patient_middle_name' => 'nullable|string',
                'patient_extension' => 'nullable|string',
                'patient_birthdate' => 'nullable|date',
                'patient_age' => 'nullable|integer',
                'patient_gender' => 'nullable|string',
                'patient_contact_number' => 'nullable|string',
                'place_of_birth' => 'nullable|string',
                'nationality' => 'nullable|string',
                'religion' => 'nullable|string',
                'permanent_address' => 'nullable|string',
                'temporary_address' => 'nullable|string',
                'civil_status' => 'nullable|string',
                'living_status' => 'nullable|string',
                'highest_education' => 'nullable|string',
                'occupation' => 'nullable|string',
                'monthly_income' => 'nullable|numeric',
                'philhealth_pin' => 'nullable|string',
                'philhealth_contributor_status' => 'nullable|string',
                // Step 2: Family Composition (array fields)
                'family_member_name' => 'array',
                'family_member_name.*' => 'nullable|string',
                'family_member_birthdate' => 'array',
                'family_member_birthdate.*' => 'nullable|date',
                'family_member_age' => 'array',
                'family_member_age.*' => 'nullable|integer',
                'relationship_to_patient' => 'array',
                'relationship_to_patient.*' => 'nullable|string',
                // Step 3: MSWD
                'mswd_main_classification' => 'nullable|string',
                'mswd_sub_classification' => 'nullable|string',
                'mswd_marginalized_sector' => 'nullable|string',
                'mswd_mss_class' => 'nullable|string',
                'monthly_expenses' => 'array',
                // Step 4: Medical Data
                'admitting_diagnosis' => 'nullable|string',
                'final_diagnosis' => 'nullable|string',
                'duration_of_problems' => 'nullable|string',
                'previous_treatment' => 'nullable|string',
                'present_treatment_plan' => 'nullable|string',
                'health_accessibility_problem' => 'nullable|string',
                'assessment_findings' => 'nullable|string',
                'recommended_interventions' => 'nullable|string',
            ]);

            // Generate unique application reference number
            $reference = 'APN-' . mt_rand(100000, 999999);

            $applicant = new Applicant();
            $applicant->applicant_id = \Illuminate\Support\Str::uuid();
            $applicant->application_reference_number = $reference;
            $applicant->is_approved = false;
            // Fill simple fields
            $fields = [
                'hospital_name', 'category', 'interview_date', 'interview_venue', 'interview_start_time', 'interview_end_time',
                'informant_name', 'informant_address', 'relation_to_patient', 'informant_contact_number',
                'patient_family_name', 'patient_first_name', 'patient_middle_name', 'patient_extension', 'patient_birthdate',
                'patient_age', 'patient_gender', 'patient_contact_number', 'place_of_birth', 'nationality', 'religion',
                'permanent_address', 'temporary_address', 'civil_status', 'living_status', 'highest_education',
                'occupation', 'monthly_income', 'philhealth_pin', 'philhealth_contributor_status',
                'mswd_main_classification', 'mswd_sub_classification', 'mswd_marginalized_sector', 'mswd_mss_class',
                'admitting_diagnosis', 'final_diagnosis', 'duration_of_problems', 'previous_treatment',
                'present_treatment_plan', 'health_accessibility_problem', 'assessment_findings', 'recommended_interventions'
            ];
            foreach ($fields as $field) {
                $applicant->$field = $request->input($field);
            }
            // Save family composition as JSON
            $family = [];
            $names = $request->input('family_member_name', []);
            $birthdates = $request->input('family_member_birthdate', []);
            $ages = $request->input('family_member_age', []);
            $relations = $request->input('relationship_to_patient', []);
            $count = max(count($names), count($birthdates), count($ages), count($relations));
            for ($i = 0; $i < $count; $i++) {
                if ($names[$i] || $birthdates[$i] || $ages[$i] || $relations[$i]) {
                    $family[] = [
                        'name' => $names[$i] ?? '',
                        'birthdate' => $birthdates[$i] ?? '',
                        'age' => $ages[$i] ?? '',
                        'relationship' => $relations[$i] ?? '',
                    ];
                }
            }
            $applicant->family_composition = json_encode($family);
            // Save monthly expenses as JSON
            $applicant->monthly_expenses = json_encode($request->input('monthly_expenses', []));
            $applicant->save();

            return response()->json([
                'success' => true,
                'application_reference_number' => $reference
            ]);
        } catch (\Throwable $e) {
            \Log::error('Application submission failed: ' . $e->getMessage(), [
                'exception' => $e,
                'request' => $request->all(),
            ]);
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting the application.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getApplicants(Request $request)
    {
        // Default pagination size
        $perPage = $request->input('per_page', 10); // Default to 10 items per page

        // Fetch applicants with pagination
        $applicants = Applicant::paginate($perPage);

        return response()->json($applicants);
    }
}
