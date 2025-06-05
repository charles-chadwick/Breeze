<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DiscussionsController;
use App\Http\Controllers\EncounterController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('patients')
    ->group(function () {

        Route::get('/', [
            PatientController::class,
            'index',
        ])->name('patients.index');

        Route::get('/{patient}/details', [
            PatientController::class,
            'details',
        ])->name('patients.details');

        Route::get('/{patient}/encounters/', EncounterController::class)->name('patients.encounters');
        Route::get('/{patient}/appointments/', AppointmentController::class)->name('patients.appointments');
        Route::get('/{patient}/discussions/', DiscussionsController::class)->name('patients.discussions');
    });
