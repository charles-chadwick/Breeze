<?php

namespace App\Livewire;

use App\Models\Appointment;
use Illuminate\View\View;
use Livewire\Component;

class AppointmentList extends Component
{
    public $sort_by        = 'date_and_time';
    public $sort_direction = 'desc';

    public function sort($column) : void
    {
        if ($this->sort_by === $column) {
            $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort_by = $column;
            $this->sort_direction = 'asc';
        }
    }

    public function render() : View
    {
        return view('livewire.appointments.list', [
            'appointments' => Appointment::orderBy($this->sort_by, $this->sort_direction)->get()
        ]);
    }
}
