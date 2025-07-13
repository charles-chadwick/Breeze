<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class ShowDiscussion extends Component
{
    public function mount() {

    }

    public function render() : View
    {
        return view('livewire.discussions.show');
    }
}
