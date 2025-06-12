<?php

namespace App\Models;

use App\Models\Traits\Scopes\HasStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Appointment extends Base
{
    use HasFactory;
    use HasStatus;

    /**
     * Constructors
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }

    protected function casts() : array
    {
        return [
            'date' => 'datetime:Y-m-d',
        ];
    }

    /**
     * Fillable
     */
    protected $fillable = [
        'patient_id',
        'date_and_time',
        'length',
        'status',
        'type',
        'title',
        'description',
    ];

    /**
     * Patient relationship
     */
    public function patient() : BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Users' relationship
     */
    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'appointments_users', 'appointment_id', 'user_id')
                    ->withTimestamps();
    }

    /**
     * Get the formatted date
     */
    public function date() : Attribute
    {
        return Attribute::make(get: fn() => Carbon::parse($this->attributes[ 'date_and_time' ])
                                                  ->format('m/d/Y'));
    }

    /**
     * Get the formatted start time
     */
    public function startTime() : Attribute
    {
        return Attribute::make(get: fn() => Carbon::parse($this->attributes[ 'date_and_time' ])
                                                  ->format('h:i A'));
    }

    /**
     * Get the formatted end time
     */
    public function endTime() : Attribute
    {
        return Attribute::make(get: fn() => Carbon::parse($this->attributes[ 'date_and_time' ])
                                                  ->addMinutes((int) $this->attributes[ 'length' ])
                                                  ->format('h:i A'));
    }

    /**
     * Get the full date time range
     */
    public function fullDateAndTimeRange() : Attribute
    {
        return Attribute::make(get: fn() => "{$this->date} from {$this->start_time} to {$this->end_time}");
    }
}
