<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ApplicationController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/apply', [LandingController::class, 'apply'])->name('application');
Route::get('/application', [ApplicationController::class, 'showForm'])->name('application');
Route::get('/application/{id}', [ApplicationController::class, 'view'])->name('application.view');
Route::post('/application/submit', [ApplicationController::class, 'submit'])->name('application.submit');

// Admin routes
Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('admin.login.submit');
Route::middleware([])->group(function () {
    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/applicants', [ApplicationController::class, 'getApplicants']);
    // More admin routes can be added here
});
