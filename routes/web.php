<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ApplicationController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/apply', [LandingController::class, 'apply'])->name('application');
Route::get('/application', [ApplicationController::class, 'showForm'])->name('application');
Route::get('/application/{id}', [ApplicationController::class, 'view'])->name('application.view');
Route::post('/application/submit', [ApplicationController::class, 'submit'])->name('application.submit');
