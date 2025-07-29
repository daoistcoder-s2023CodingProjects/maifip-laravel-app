<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Applicant;

class ApplicationController extends Controller
{
    public function showForm()
    {
        $hospitals = [
            'Bicol Access Health Centrum',
            'Bicol Medical Center',
            'Bicol Region General Hospital and Geriatric Medical Center',
            'Caramoan Municipal Hospital',
            'CHMSC Lourdes Hospital',
            'Dr. Nilo O. Roa Memorial Foundation Hospital Inc.',
            'Libmanan District Hospital',
            'Naga City General Hospital',
            'Ocampo Municipal Hospital',
            'Our Lady Mediatrix Hospital',
            'Our Lady of Lourdes Infirmary',
            'Ragay District Hospital',
            'Sagnay Infirmary',
            'San Jose Medicare Community Hospital',
        ];
        $categories = [
            'In-Patient',
            'Out-Patient',
            'Walk-In',
            'ER',
            'Old Case',
            'New Case',
            'Forwarded',
            'Closed',
            'Service',
            'Semi-Private',
            'Private',
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
        $maritalStatuses = [
            'Single',
            'Married',
            'Common-Law',
            'Widowed',
            'Separated'
        ];
        $livingStatus = [
            'Owned',
            'Shared',
            'Rent',
            'Homeless',
            'Institutionalized',
        ];
        $educations = [
            'Primary',
            'Secondary',
            'Vocational',
            'Tertiary',
            'Post Graduate',
            'No Educational Attainment',
        ];
        
        $mswdMainClass = [
            'Financially Capable / Capacitated (5,074 & up)',
            'Financially Incapable / Incapacitated (2307-5073)',
            'Indigent (2,306 & below)',
        ];
        $mswdSubClass = [
            'C1',
            'C2',
            'C3',
        ];
        $marginalizedSector = [
            'Artisanal Fishfolk',
            'Farmer and Landless Rural Worker',
            'Urban Poor',
            'Indegenous Peoples',
            'Senior Citizen',
            'Formal Labor and Migrant Workers',
            'Workers in Informal Sector',
            'PWD',
            'Victims of Disaster and Calamity',
        ];
        $mssClass = [
            'Charity Patient',
            'Private Patient',
            'Subsidized Patient',
        ];
        
        $timeSelections = [];
        $start = strtotime('10:00');
        $end = strtotime('17:00');
        for ($t = $start; $t <= $end; $t += 1800) {
            $display = date('h:i A', $t);
            $value = date('H:i', $t);
            $timeSelections[] = [
                'label' => $display,
                'value' => $value
            ];
        }

        // Medical services mapping for dashboard/service cards
        $medicalServices = [
            'Medication' => 'Medication',
            'Laboratory' => 'Laboratory & Radiology',
            'Blood Screening' => 'Blood Screening',
            'High Risk Case' => 'Medical High Risk Treatment',
            'Post-Hospitalization' => 'Hospitalization'
        ];

        return view('application', compact(
            'hospitals', 'categories', 'relations', 'maritalStatuses', 'livingStatus', 'educations',
            'mswdMainClass', 'mswdSubClass', 'marginalizedSector', 'mssClass', 'timeSelections', 'medicalServices'
        ));
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
            // \Log::debug('Application submission request data:', $request->all());   
            
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
                // Add these for totals
                'monthly_expenses_total' => 'nullable|numeric',
            ]);

            // Generate unique application reference number
            $reference = 'APN-' . mt_rand(100000, 999999);

            $applicant = new Applicant();
            $applicant->applicant_id = \Illuminate\Support\Str::uuid();
            $applicant->application_reference_number = $reference;
            $applicant->is_approved = null;
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

            $applicant->maifip_assistance_amount = $request->input('monthly_expenses_total', 0.00);
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
        $perPage = $request->input('per_page', 10);

        $query = Applicant::query();

        // Filter by computed application_status in PHP after fetching
        if (
            $request->filled('application_status') ||
            $request->filled('date_from') ||
            $request->filled('date_to')
        ) {
            // Apply date filters in SQL for efficiency
            if ($request->filled('date_from')) {
                $query->whereDate('created_at', '>=', $request->input('date_from'));
            }
            if ($request->filled('date_to')) {
                $query->whereDate('created_at', '<=', $request->input('date_to'));
            }
            // Fetch all matching date range, then filter by computed status in PHP
            $applicants = $query->orderByDesc('created_at')->get();
            if ($request->filled('application_status')) {
                $status = $request->input('application_status');
                $applicants = $applicants->filter(function ($item) use ($status) {
                    return $item->application_status === $status;
                })->values();
            }
            // Paginate manually
            $page = $request->input('page', 1);
            $paginated = new \Illuminate\Pagination\LengthAwarePaginator(
                $applicants->forPage($page, $perPage),
                $applicants->count(),
                $perPage,
                $page,
                ['path' => $request->url(), 'query' => $request->query()]
            );
            // Add computed application_status to each item
            $paginated->getCollection()->transform(function ($item) {
                $item->application_status = $item->application_status;
                return $item;
            });
            return response()->json($paginated);
        } else {
            // No filters, use normal pagination
            $applicants = $query->orderByDesc('created_at')->paginate($perPage);
            $applicants->getCollection()->transform(function ($item) {
                $item->application_status = $item->application_status;
                return $item;
            });
            return response()->json($applicants);
        }
    }

    // Get applicant details by ID
    public function getApplicantById($id)
    {
        $applicant = Applicant::find($id);
        if (!$applicant) {
            return response()->json([
                'success' => false,
                'message' => 'Applicant not found.'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $applicant
        ]);
    }

    // Set applicant status (approved/declined) using switch
    public function setApplicantStatus(Request $request, $id)
    {
        \Log::debug('Setting applicant status', ['id' => $id, 'request' => $request->all()]);
        $applicant = Applicant::find($id);
        if (!$applicant) {
            return response()->json([
                'success' => false,
                'message' => 'Applicant not found.'
            ], 404);
        }
        $status = $request->input('application_status');
        switch ($status) {
            case 'approved':
                $applicant->is_approved = true;
                $applicant->approval_date = now();
                // Update extra fields if provided
                if ($request->has('maifip_assistance_amount')) {
                    $applicant->maifip_assistance_amount = $request->input('maifip_assistance_amount');
                }
                if ($request->has('medical_service')) {
                    $applicant->medical_service = $request->input('medical_service');
                }
                break;
            case 'declined':
                $applicant->is_approved = false;
                $applicant->approval_date = null;
                break;
            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid application_status value.'
                ], 400);
        }
        $applicant->save();
        return response()->json([
            'success' => true,
            'message' => 'Application status updated.',
            'is_approved' => $applicant->is_approved
        ]);
    }

    // Update applicant details (partial update)
    public function updateApplicantDetails(Request $request, $id)
    {
        $applicant = Applicant::find($id);
        if (!$applicant) {
            return response()->json([
                'success' => false,
                'message' => 'Applicant not found.'
            ], 404);
        }
        // Only update fields present in request
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
            if ($request->has($field)) {
                $applicant->$field = $request->input($field);
            }
        }
        // Optionally update family_composition and monthly_expenses if present
        if ($request->has('family_composition')) {
            $applicant->family_composition = json_encode($request->input('family_composition'));
        }
        if ($request->has('monthly_expenses')) {
            $applicant->monthly_expenses = json_encode($request->input('monthly_expenses'));
        }
        $applicant->save();
        return response()->json([
            'success' => true,
            'message' => 'Applicant details updated.',
            'data' => $applicant
        ]);
    }
    
    // Dashboard summary API
    public function dashboardData(Request $request)
    {
        $query = Applicant::query();

        // Optionally filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->input('date_from'));
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->input('date_to'));
        }

        $applicants = $query->orderByDesc('created_at')->get();

        $counts = [
            'pending' => 0,
            'approved' => 0,
            'declined' => 0,
            'total' => $applicants->count(),
        ];
        $totalCovered = 0;
        $today = now()->format('Y-m-d');
        $newToday = [
            'pending' => 0,
            'approved' => 0,
            'declined' => 0,
        ];
        $newlyCoveredAmount = 0;

        foreach ($applicants as $item) {
            $status = $item->application_status;
            if ($status === 'pending') $counts['pending']++;
            elseif ($status === 'approved') {
                $counts['approved']++;
                $totalCovered += floatval($item->maifip_assistance_amount ?? 0);
            }
            elseif ($status === 'declined') $counts['declined']++;

            // New pending today (created_at)
            if ($status === 'pending' && \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') === $today) {
                $newToday['pending']++;
            }
            // New approved today (updated_at)
            if ($status === 'approved' && \Carbon\Carbon::parse($item->updated_at)->format('Y-m-d') === $today) {
                $newToday['approved']++;
                $newlyCoveredAmount += floatval($item->maifip_assistance_amount ?? 0);
            }
            // New declined today (updated_at)
            if ($status === 'declined' && \Carbon\Carbon::parse($item->updated_at)->format('Y-m-d') === $today) {
                $newToday['declined']++;
            }
        }

        // Medical service summary for new approved today (by updated_at)
        $medicalSummary = [];
        foreach ($applicants as $item) {
            if ($item->application_status === 'approved' && \Carbon\Carbon::parse($item->updated_at)->format('Y-m-d') === $today) {
                $service = $item->medical_service ?: 'Others';
                $serviceKey = strtolower(trim($service));
                if (!isset($medicalSummary[$serviceKey])) {
                    $medicalSummary[$serviceKey] = [
                        'applications' => 0,
                        'amount' => 0,
                    ];
                }
                $medicalSummary[$serviceKey]['applications']++;
                $medicalSummary[$serviceKey]['amount'] += floatval($item->maifip_assistance_amount ?? 0);
            }
        }

        // Chart data: group by day for current and previous week
        $chart = [
            'labels' => [],
            'currentWeek' => [],
            'previousWeek' => [],
        ];
        $now = now();
        $weekStart = $now->copy()->startOfWeek();
        $prevWeekStart = $weekStart->copy()->subWeek();

        for ($i = 0; $i < 7; $i++) {
            $chart['labels'][] = $weekStart->copy()->addDays($i)->format('D');
            $chart['currentWeek'][] = $applicants->whereBetween('created_at', [
                $weekStart->copy()->addDays($i)->startOfDay(),
                $weekStart->copy()->addDays($i)->endOfDay()
            ])->count();
            $chart['previousWeek'][] = $applicants->whereBetween('created_at', [
                $prevWeekStart->copy()->addDays($i)->startOfDay(),
                $prevWeekStart->copy()->addDays($i)->endOfDay()
            ])->count();
        }

        return response()->json([
            'success' => true,
            'counts' => $counts,
            'new_today' => $newToday,
            'total_covered' => $totalCovered,
            'newly_covered_amount' => $newlyCoveredAmount,
            'medical_summary' => $medicalSummary,
            'chart' => $chart,
            'data' => $applicants,
        ]);
    }
}