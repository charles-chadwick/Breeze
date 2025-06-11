<?php

use App\Http\Controllers\PatientsDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Hi';
});

Route::prefix('patients')->group(function () {
    Route::get('/', [PatientsDashboardController::class, 'index'])->name('patients.index');

});
