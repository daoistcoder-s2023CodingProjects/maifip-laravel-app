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
            'Indigent',
            'Financially Incapacitated',
            'Catastrophic Illness',
            'Expensive Therapy',
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

    public function submitForm1(Request $request)
    {
        $validated = $request->validate([
            'hospital_name' => 'required|string',
            'category' => 'required|string',
            'interview_date' => 'required|date',
            'interview_venue' => 'required|string',
            'interview_start_time' => 'required|string',
            'interview_end_time' => 'required|string',
            'informant_name' => 'required|string',
            'informant_address' => 'required|string',
            'relation_to_patient' => 'required|string',
            'informant_contact_number' => 'required|string',
        ]);

        $applicant = new \App\Models\Applicant();
        $applicant->applicant_id = Str::uuid();
        $applicant->fill($validated);
        $applicant->save();

        // Redirect to application route with applicant_id for next step
        return redirect()->route('application.view', ['id' => $applicant->applicant_id]);
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
}
