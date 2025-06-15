<?php

namespace App\Livewire;

use App\Enums\UserRole;
use App\Models\Appointment;
use App\Models\User;
use Flux\Flux;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Livewire\Component;

class AppointmentForm extends Component
{
    public Appointment $appointment;
    public Carbon      $date;
    public string      $time;
    public int         $length;
    public string      $status;
    public string      $type;
    public string      $title;
    public string      $description;
    public $users;
    public $user_ids = [];

    public function mount(Appointment $appointment) : void
    {
        $this->appointment = $appointment;
        if ($appointment->id !== null) {
            $this->fill($appointment);
            $this->date = Carbon::parse($appointment->date_and_time);
            $this->time = Carbon::parse($appointment->date_and_time)
                                ->format('H:i');
            $this->user_ids = $appointment->users()->get()->pluck('id')->toArray();
        }

        $this->users = User::where('role', '!=', UserRole::SuperAdmin)->get();
    }

    public function save() : void
    {
        $this->validate();

        $appointment_data = [
            'date_and_time' => Carbon::parse($this->date)->format('Y-m-d').' '.Carbon::parse($this->time)->format('H:i'),
            'length'        => $this->length,
            'status'        => $this->status,
            'type'          => $this->type,
            'title'         => $this->title,
            'description'   => $this->description,
        ];

        if ($this->appointment->id === null) {
            $this->appointment = Appointment::create($appointment_data);
            $message = 'Appointment has been created';
        } else {
            $this->appointment->update($appointment_data);
            $message = 'Appointment has been updated';
        }

        Flux::modals()->close();
        session()->flash('message', $message);

    }

    protected function rules() : array
    {
        return [
            'date'        => 'required',
            'time'        => 'required',
            'length'      => 'required',
            'status'      => 'required',
            'type'        => 'required',
            'title'       => 'required',
            'description' => 'required',
        ];
    }

    public function render() : View
    {
        return view('livewire.appointment-form');
    }
}
