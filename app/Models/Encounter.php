<?php

namespace App\Models;

use App\Enums\EncounterStatus;
use App\Models\Traits\Filters\ByStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Encounter extends Model
{
    use ByStatus, HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'date_of_service',
        'patient_id',
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

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
