<?php

namespace App\Models;

use App\Enums\EncounterStatus;
use App\Models\Scopes\FilterByStatus;
use App\Models\Scopes\FilterByType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Encounter extends Base
{
    use FilterByStatus, FilterByType;
    use HasFactory;

    protected $fillable = [
        'type',
        'date_of_service',
        'patient_id',
        'appointment_id',
        'title',
        'content',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'date_of_service' => 'datetime',
            'status' => EncounterStatus::class,
        ];
    }

    public function appointment() : BelongsTo {
        return $this->belongsTo(Appointment::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'encounter_users')
            ->withTimestamps();
    }
}
