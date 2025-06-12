<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Appointments extends Component
{
    public $appointments;
    public $patient;

    use WithPagination;

    public function render(): View
    {
        return view('livewire.appointments');
    }

    public $sortBy = 'date';
    public $sortDirection = 'desc';

    public function sort($column) {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    #[\Livewire\Attributes\Computed]
    public function orders()
    {
        return \App\Models\Appointment::query()
                                ->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
                                ->paginate(5);
    }
}
