<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/apply', [LandingController::class, 'apply'])->name('application');
Route::get('/application', [ApplicationController::class, 'showForm'])->name('application');
Route::get('/application/{id}', [ApplicationController::class, 'view'])->name('application.view');
Route::post('/application/submit', [ApplicationController::class, 'submit'])->name('application.submit');

// Admin routes
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::middleware([])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/data', [ApplicationController::class, 'dashboardData']);
    Route::get('/admin/applicants', [ApplicationController::class, 'getApplicants']);
    Route::get('/admin/applicant/{id}', [ApplicationController::class, 'getApplicant']);
    Route::post('/admin/applicant/{id}/update', [ApplicationController::class, 'updateApplicantDetails']);
    Route::post('/admin/applicant/{id}/update-status', [ApplicationController::class, 'setApplicantStatus']);
    Route::post('/admin/dashboard/reports/generate', [ReportController::class, 'generateReportPdf']);
    Route::get('/admin/dashboard/reports', [ReportController::class, 'getReports']);
});
