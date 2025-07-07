@extends('layouts.app')

@section('title', 'MAIFIP - Medical Assistance')

@section('content')
<link rel="stylesheet" href="/css/landing.css">

<!-- Navigation Bar -->
<nav class="maifip-navbar">
    <div class="navbar-left">
        <img src="/images/maifip_logo.png" alt="MAIFIP Logo" class="maifip-logo">
        <div class="maifip-brand">
            <div class="maifip-title">MAIFIP</div>
            <div class="maifip-desc">Medical Assistance to Indigent and Financially Incapacitated Patients</div>
        </div>
    </div>
    <div class="navbar-right">
        <a href="#" class="nav-link">Check Application</a>
        <a href="{{ route('application') }}" class="btn btn-success nav-apply-btn">Apply Now</a>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero-section">
    <div class="hero-inner">
        <div class="hero-content">
            <h1 class="hero-title">Medical Assistance to Indigent and Financially Incapacitated Patients</h1>
            <p class="hero-description">The Department of Health offers the Medical Assistance to Indigent and Financially Incapacitated Patients (MAIFIP) Program to ensure continuous access to essential healthcare services for those in need.</p>
            <div class="hero-buttons">
                <a href="#" class="btn btn-success">Get Medical Assistance</a>
                <a href="#" class="btn btn-outline-success">Learn More</a>
            </div>
        </div>
        <div class="hero-img">
            <img src="/images/hero_img_1.png" alt="Medical Assistance Illustration">
        </div>
    </div>
</div>

<!-- Beneficiaries Section -->
<div class="section" style="background:#F8F9FA;">
    <div class="section-title">Who are MAIFIP Beneficiaries?</div>
    <div class="beneficiaries-cards">
        <div class="card">
            <img src="/images/about_us_patient_img.png" alt="Indigent Patients">
            <div class="card-title">Indigent Patients</div>
            <div class="card-desc">Who demonstrates a clearly inability to pay or spend for necessary expenditures for one's medical treatment.</div>
        </div>
        <div class="card">
            <img src="/images/about_us_illness_img.png" alt="Catastrophic Illness">
            <div class="card-title">Catastrophic Illness</div>
            <div class="card-desc">Or any illnesses, which is life or limb threatening and requires prolonged hospitalization.</div>
        </div>
        <div class="card">
            <img src="/images/about_us_therapy_img.png" alt="Expensive Therapies">
            <div class="card-title">Expensive Therapies</div>
            <div class="card-desc">Or other special but essential care that would deplete one's financial resources, as assessed by a medical social worker.</div>
        </div>
    </div>
</div>

<!-- Medical Services Section -->
<div class="section medical-services-section">
    <div class="services-section-title">MAIFIP Medical Services</div>
    <div class="services-cards">
        <div class="card">
            <img src="/images/drugs_logo.png" alt="Drugs & Medicines">
            <div class="card-title">Drugs & Medicines</div>
            <div class="card-desc">All included in the PHI National Drug Formulary and those which qualify for drug use compliance.</div>
        </div>
        <div class="card">
            <img src="/images/laboratory_logo.png" alt="Laboratory & Radiology">
            <div class="card-title">Laboratory & Radiology</div>
            <div class="card-desc">Laboratory tests, imaging tests, radiology tests and other diagnostic procedures needed by the patient.</div>
        </div>
        <div class="card">
            <img src="/images/blood_screening_logo.png" alt="Blood Screening">
            <div class="card-title">Blood Screening</div>
            <div class="card-desc">Blood and other related blood screening or blood products that are needed by the patient.</div>
        </div>
        <div class="card">
            <img src="/images/medical_cases_logo.png" alt="Medical High Risk Cases">
            <div class="card-title">Medical High Risk Cases</div>
            <div class="card-desc">All clinically indicated medical, surgical, high risk cases of obstetrics, ophthalmological, dental, implants, medical devices & supplies.</div>
        </div>
        <div class="card">
            <img src="/images/hospitalization_logo.png" alt="Post-Hospitalization">
            <div class="card-title">Post-Hospitalization</div>
            <div class="card-desc">Prescribed post-hospitalization, rehabilitation services, aftercare program, appropriate mental & psychosocial support.</div>
        </div>
        <div class="card">
            <img src="/images/hospital_bills_logo.png" alt="All Hospital Bills">
            <div class="card-title">All Hospital Bills</div>
            <div class="card-desc">All bills including professional fees, provided the expenses shall not exceed 50% of the approved amount of medical assistance.</div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <div style="font-size:1.2rem;font-weight:700;letter-spacing:0.2em;">M A I F I P</div>
    <div style="font-size:0.88rem;">Medical Assistance to Indigent and Financially Incapacitated Patients</div>
</footer>
@endsection
