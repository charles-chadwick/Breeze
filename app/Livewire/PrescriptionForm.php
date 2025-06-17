<?php

namespace App\Livewire;

use App\Enums\MedicationFrequency;
use App\Enums\RouteOfAdministration;
use App\Models\Medication;
use App\Models\Prescription;
use Illuminate\View\View;
use Livewire\Component;

class PrescriptionForm extends Component
{
    public Prescription $prescription;
    public              $dosage;
    public              $frequency;
    public              $route;
    public              $quantity;
    public              $refills;
    public              $instructions;
    public              $medications = [];
    public array        $routes;
    public              $frequencies;
    public              $medication_id;
    public function mount(Prescription $prescription) : void
    {
        $this->prescription = $prescription;
        if ($prescription->id !== null) {
            $this->fill($prescription);
        }

        $this->medications = Medication::all();
        $this->routes = RouteOfAdministration::array();
        $this->frequencies = MedicationFrequency::array();
    }

    public function save() : void
    {
        $this->validate();

        $prescription_data = [
            'dosage' => $this->dosage,
            'frequency' => $this->frequency,
            'route' => $this->route,
            'quantity' => $this->quantity,
            'refills' => $this->refills,
            'instructions' => $this->instructions
        ];

        if ($this->prescription->id === null) {
            $this->prescription = Prescription::create($prescription_data);
            $message = 'Prescription has been created';
        } else {
            $this->prescription->update($prescription_data);
            $message = 'Prescription has been updated';
        }

        session()->flash('message', $message);
    }

    protected function rules() : array
    {
        return [
            'dosage' => 'required',
            'frequency' => 'required',
            'route' => 'required',
            'quantity' => 'required',
            'refills'  => 'required',
            'instructions' => 'nullable',
        ];
    }

    public function render() : View
    {
        return view('livewire.prescription-form');
    }
}
