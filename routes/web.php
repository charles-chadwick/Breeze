<?php

use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\MedicationsController;
use App\Http\Controllers\PatientsDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Hi';
})->name('dashboard');

Route::prefix('patients')->group(function () {
    Route::get('/', [PatientsDashboardController::class, 'index'])->name('patients.index');
    Route::get('/{patient}/details', [PatientsDashboardController::class, 'details'])->name('patients.details');
    Route::get('/{patient}/medications', [PatientsDashboardController::class, 'medications'])->name('patients.medications');
});

Route::prefix('appointments')->group(function () {
    Route::get('/', [AppointmentsController::class, 'index'])->name('appointments.index');
});

Route::prefix('medications')->group(function () {
    Route::get('/', [MedicationsController::class, 'index'])->name('medications.index');
});
