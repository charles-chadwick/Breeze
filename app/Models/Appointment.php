<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Base
{
    use HasFactory;

    protected $fillable = [
        'status',
        'type',
        'title',
        'description',
        'patient_id',
        'date_and_time',
        'length',
    ];

    public function patient() : BelongsTo
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    protected function casts() : array
    {
        return [
            'date_and_time' => 'datetime',
        ];
    }

    protected function fullDateTimeRange() : Attribute
    {
        return Attribute::make(get: function () {
            $date = Carbon::parse($this->date_and_time);
                return $date->format('D M d, Y h:i a').' - '.$date->addMinutes($this->length)->format('h:i a');
            });
    }
}
