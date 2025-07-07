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
        return view('application', compact('hospitals', 'categories', 'relations'));
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

        // For now, redirect back with a success message
        return redirect()->back()->with('success', 'Form 1 submitted successfully!');
    }
}
