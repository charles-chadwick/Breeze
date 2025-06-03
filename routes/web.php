<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('patients')
     ->group(function () {
         Route::get('/details/{patient}', [
             PatientController::class,
             'details'
         ])
              ->name('patients.details');
     });
