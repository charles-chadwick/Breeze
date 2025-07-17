<?php

use App\Livewire\AppointmentList;
use App\Livewire\ListDiscussions;
use App\Livewire\ShowDiscussion;
use Illuminate\Support\Facades\Route;

Route::prefix('discussions')->group(function () {
    Route::get('/', ListDiscussions::class)->name('discussions.list');
    Route::get('/{discussion}', ShowDiscussion::class)->name('discussions.show');
});

Route::prefix('appointments')->group(function () {
    Route::get('/', AppointmentList::class)->name('appointments.list');
});
