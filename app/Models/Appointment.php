<?php

namespace App\Models;

use App\Models\Scopes\FilterByStatus;
use App\Models\Scopes\FilterByType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Appointment extends Base
{
    use FilterByStatus, FilterByType;
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'status',
        'date_and_time',
        'length',
        'type',
        'title',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'date_and_time' => 'datetime',
        ];
    }

    /**
     * Just the date of the appointment
     * @return string
     */
    public function getDateAttribute(): string
    {
        return Carbon::parse($this->attributes['date_and_time'])
            ->format('m/d/Y');
    }

    /**
     * The start time of the appointment
     * @return string
     */
    public function getStartTimeAttribute(): string
    {
        return Carbon::parse($this->attributes['date_and_time'])
            ->format('h:i A');
    }

    /**
     * The end time of the appointment
     * @return string
     */
    public function getEndTimeAttribute(): string
    {
        return Carbon::parse($this->attributes['date_and_time'])
            ->addMinutes($this->attributes['length'])
            ->format('h:i A');
    }

    /**
     * The date and start time of the appointment
     * @return string
     */
    public function getDateAndTimeAttribute(): string
    {
        return "$this->date $this->start_time";
    }

    /**
     * The full date and time of the appointment
     * Ex: 01/01/2000 10:00 AM to 10:15 AM
     * @return string
     */
    public function getFullDateAndTimeAttribute(): string
    {
        return "$this->date $this->start_time to $this->end_time";
    }

    /**
     * Determine if an appointment already exists with the specific users and status
     */
    public function alreadyExists($suggested_date_and_time, $users, $status): bool
    {
        return $this->where('date_and_time', '=', $suggested_date_and_time)
            ->whereIn('status', is_array($status) ? $status : [$status])
            ->whereHas('users', function ($query) use ($users) {
                $query->whereIn('user_id', is_array($users) ? $users : [$users]);
            })
            ->count() > 0;

    }

    /**
     * The encounters
     * @return HasMany
     */
    public function encounters(): HasMany {
        return $this->hasMany(Encounter::class);
    }

    /**
     * The Patient relation
     * @return BelongsTo
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * The user relation.
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'appointment_users')
            ->withTimestamps();
    }
}
