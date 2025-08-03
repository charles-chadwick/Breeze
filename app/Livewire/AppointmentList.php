<?php

namespace App\Livewire;

use App\Models\Appointment;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Livewire\Component;

class AppointmentList extends Component
{
    public $sort_by        = 'date_and_time';
    public $sort_direction = 'asc';
    public $current_date;

    public $start_month;
    public $start_day;
    public $start_year;
    public $end_month;
    public $end_day;
    public $end_year;

    public $months;
    public $year_range;
    public $error_message;

    public function mount() : void
    {
        $this->start_month = Carbon::now()->month;
        $this->start_day = Carbon::now()->day;
        $this->start_year = Carbon::now()->year;
        $this->end_month = Carbon::now()->month;
        $this->end_day = Carbon::now()->day;
        $this->end_year = Carbon::now()->year;

        // these are for the lists
        $this->year_range = range(
            Carbon::parse(Appointment::orderBy('date_and_time')->get()->first()->date_and_time)->year,
            Carbon::parse(Appointment::orderBy('date_and_time', 'desc')->get()->first()->date_and_time)->year,
        );

        $this->months = [
            1  => 'January',
            2  => 'February',
            3  => 'March',
            4  => 'April',
            5  => 'May',
            6  => 'June',
            7  => 'July',
            8  => 'August',
            9  => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];
    }

    public function sort($column) : void
    {
        if ($this->sort_by === $column) {
            $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort_by = $column;
            $this->sort_direction = 'asc';
        }
    }

    public function appointments()
    {
        $start_date = Carbon::parse($this->start_year."-".$this->start_month."-".$this->start_day)
                            ->setHour(0)
                            ->setMinute(0)
                            ->setSecond(0);

        $end_date = Carbon::parse($this->end_year."-".$this->end_month."-".$this->end_day)
                          ->setHour(11)
                          ->setMinute(59)
                          ->setSecond(59);

        return Appointment::whereDate('date_and_time', ">=", $start_date)
                   ->whereDate('date_and_time', "<=", $end_date)
                   ->orderBy($this->sort_by, $this->sort_direction)
                   ->get();
    }

    public function render() : View
    {
        return view('livewire.appointments.list', [
            'appointments' => $this->appointments()
        ]);
    }
}
