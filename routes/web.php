<?php


use App\Livewire\ListDiscussions;
use App\Livewire\ShowDiscussion;
use Illuminate\Support\Facades\Route;

Route::prefix('discussions')->group(function () {
   Route::get('/', ListDiscussions::class)->name('discussions.list');
   Route::get('/{discussion}', ShowDiscussion::class)->name('discussions.show');
});
