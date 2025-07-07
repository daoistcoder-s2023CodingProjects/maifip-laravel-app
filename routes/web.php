<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ApplicationController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/apply', [LandingController::class, 'apply'])->name('application');
Route::get('/application', [ApplicationController::class, 'showForm'])->name('application');
Route::post('/application/form1', [ApplicationController::class, 'submitForm1'])->name('application.form1.submit');
