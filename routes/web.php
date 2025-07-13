<?php

use App\Livewire\DiscussionList;
use Illuminate\Support\Facades\Route;

Route::prefix('discussions')->group(function () {
   Route::get('/', DiscussionList::class)->name('discussions.list');
});
