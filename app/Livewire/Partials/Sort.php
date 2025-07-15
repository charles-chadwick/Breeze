<?php

namespace App\Livewire\Partials;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Sort extends Component
{
    public function mount() {}

    public function render(): View|Closure|string
    {
        return view('livewire.partials.sort');
    }
}
