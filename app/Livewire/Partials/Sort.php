<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Illuminate\Contracts\View\View;

class Sort extends Component
{
    public function mount() {

    }

    public function render() : View|Closure|string
    {
        return view('livewire.partials.sort');
    }
}
