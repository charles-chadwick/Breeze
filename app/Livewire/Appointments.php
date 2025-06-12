<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Appointments extends Component
{
    public $appointments;
    public $patient;

    public function render() : View
    {
        return view('livewire.appointments');
    }
}
