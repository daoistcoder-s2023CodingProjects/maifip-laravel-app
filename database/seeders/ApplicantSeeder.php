<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Applicant;

class ApplicantSeeder extends Seeder
{
    public function run()
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
        $medicalServices = [
            'Medication',
            'Laboratory',
            'Blood Screening',
            'High Risk Case',
            'Post-Hospitalization',
            'Hospital Bills'
        ];

        for ($i = 0; $i < 50; $i++) {
            Applicant::create([
                'applicant_id' => Str::uuid(),
                'application_reference_number' => 'APN-' . mt_rand(100000, 999999),
                'is_approved' => null,
                'hospital_name' => $hospitals[array_rand($hospitals)],
                'category' => $categories[array_rand($categories)],
                'interview_date' => now()->subDays(rand(1, 10))->format('Y-m-d'),
                'interview_venue' => 'Room ' . rand(1, 10),
                'interview_start_time' => '10:00',
                'interview_end_time' => '11:00',
                'informant_name' => 'Informant ' . $i,
                'informant_address' => 'Address ' . $i,
                'relation_to_patient' => $relations[array_rand($relations)],
                'informant_contact_number' => '09' . rand(100000000, 999999999),
                'patient_family_name' => 'Family' . $i,
                'patient_first_name' => 'Patient' . $i,
                'patient_middle_name' => 'M',
                'patient_extension' => '',
                'patient_birthdate' => now()->subYears(rand(18, 70))->format('Y-m-d'),
                'patient_age' => rand(18, 70),
                'patient_gender' => rand(0, 1) ? 'Male' : 'Female',
                'patient_contact_number' => '09' . rand(100000000, 999999999),
                'place_of_birth' => 'City ' . $i,
                'nationality' => 'Filipino',
                'religion' => 'Religion ' . $i,
                'permanent_address' => 'Permanent Address ' . $i,
                'temporary_address' => 'Temporary Address ' . $i,
                'civil_status' => $maritalStatuses[array_rand($maritalStatuses)],
                'living_status' => $livingStatus[array_rand($livingStatus)],
                'highest_education' => $educations[array_rand($educations)],
                'occupation' => 'Occupation ' . $i,
                'monthly_income' => rand(1000, 10000),
                'philhealth_pin' => 'PH' . rand(100000, 999999),
                'philhealth_contributor_status' => 'Member',
                'mswd_main_classification' => $mswdMainClass[array_rand($mswdMainClass)],
                'mswd_sub_classification' => $mswdSubClass[array_rand($mswdSubClass)],
                'mswd_marginalized_sector' => $marginalizedSector[array_rand($marginalizedSector)],
                'mswd_mss_class' => $mssClass[array_rand($mssClass)],
                'admitting_diagnosis' => 'Diagnosis ' . $i,
                'final_diagnosis' => 'Final Diagnosis ' . $i,
                'duration_of_problems' => rand(1, 12) . ' months',
                'previous_treatment' => 'Treatment ' . $i,
                'present_treatment_plan' => 'Plan ' . $i,
                'health_accessibility_problem' => 'None',
                'assessment_findings' => 'Findings ' . $i,
                'recommended_interventions' => 'Intervention ' . $i,
                'family_composition' => json_encode([]),
                'monthly_expenses' => json_encode(['Food' => rand(1000, 3000), 'Rent' => rand(500, 2000)]),
                'maifip_assistance_amount' => rand(1000, 10000),
                'medical_service' => $medicalServices[array_rand($medicalServices)],
            ]);
        }

        for ($i = 0; $i < 200; $i++) {
            Applicant::create([
                'applicant_id' => Str::uuid(),
                'application_reference_number' => 'APN-' . mt_rand(100000, 999999),
                'is_approved' => true,
                'approval_date' => now()->subDays(rand(0, 5)),
                'hospital_name' => $hospitals[array_rand($hospitals)],
                'category' => $categories[array_rand($categories)],
                'interview_date' => now()->subDays(rand(1, 10))->format('Y-m-d'),
                'interview_venue' => 'Room ' . rand(1, 10),
                'interview_start_time' => '10:00',
                'interview_end_time' => '11:00',
                'informant_name' => 'Informant ' . ($i+10),
                'informant_address' => 'Address ' . ($i+10),
                'relation_to_patient' => $relations[array_rand($relations)],
                'informant_contact_number' => '09' . rand(100000000, 999999999),
                'patient_family_name' => 'Family' . ($i+10),
                'patient_first_name' => 'Patient' . ($i+10),
                'patient_middle_name' => 'M',
                'patient_extension' => '',
                'patient_birthdate' => now()->subYears(rand(18, 70))->format('Y-m-d'),
                'patient_age' => rand(18, 70),
                'patient_gender' => rand(0, 1) ? 'Male' : 'Female',
                'patient_contact_number' => '09' . rand(100000000, 999999999),
                'place_of_birth' => 'City ' . ($i+10),
                'nationality' => 'Filipino',
                'religion' => 'Religion ' . ($i+10),
                'permanent_address' => 'Permanent Address ' . ($i+10),
                'temporary_address' => 'Temporary Address ' . ($i+10),
                'civil_status' => $maritalStatuses[array_rand($maritalStatuses)],
                'living_status' => $livingStatus[array_rand($livingStatus)],
                'highest_education' => $educations[array_rand($educations)],
                'occupation' => 'Occupation ' . ($i+10),
                'monthly_income' => rand(1000, 10000),
                'philhealth_pin' => 'PH' . rand(100000, 999999),
                'philhealth_contributor_status' => 'Member',
                'mswd_main_classification' => $mswdMainClass[array_rand($mswdMainClass)],
                'mswd_sub_classification' => $mswdSubClass[array_rand($mswdSubClass)],
                'mswd_marginalized_sector' => $marginalizedSector[array_rand($marginalizedSector)],
                'mswd_mss_class' => $mssClass[array_rand($mssClass)],
                'admitting_diagnosis' => 'Diagnosis ' . ($i+10),
                'final_diagnosis' => 'Final Diagnosis ' . ($i+10),
                'duration_of_problems' => rand(1, 12) . ' months',
                'previous_treatment' => 'Treatment ' . ($i+10),
                'present_treatment_plan' => 'Plan ' . ($i+10),
                'health_accessibility_problem' => 'None',
                'assessment_findings' => 'Findings ' . ($i+10),
                'recommended_interventions' => 'Intervention ' . ($i+10),
                'family_composition' => json_encode([]),
                'monthly_expenses' => json_encode(['Food' => rand(1000, 3000), 'Rent' => rand(500, 2000)]),
                'maifip_assistance_amount' => rand(1000, 10000),
                'medical_service' => $medicalServices[array_rand($medicalServices)],
            ]);
        }
    }
}
