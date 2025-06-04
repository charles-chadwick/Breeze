<?php

namespace App\Models;

use App\Models\Scopes\FilterByStatus;
use App\Models\Scopes\FilterByType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Base
{
    use HasFactory;
    use FilterByType, FilterByStatus;

    protected $fillable = [
        'patient_id',
        'status',
        'date_and_time',
        'length',
        'type',
        'title',
        'description',
    ];

    protected function casts() : array
    {
        return [
            'date_and_time' => 'datetime',
        ];
    }

    public function getDateAttribute() : string
    {
        return Carbon::parse($this->attributes['date_and_time'])->format('m/d/Y');
    }

    public function getStartTimeAttribute() : string
    {
        return Carbon::parse($this->attributes['date_and_time'])->format('h:i A');
    }

    public function getEndTimeAttribute() : string
    {
        return Carbon::parse($this->attributes['date_and_time'])->addMinutes($this->attributes['length'])->format('h:i A');
    }

    public function getDateAndTimeAttribute() : string {
        return "$this->date $this->start_time";
    }

    public function getFullDateAndTimeAttribute() : string {
        return "{$this->date} {$this->start_time} to {$this->end_time}";
    }

    public function patient() : BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
