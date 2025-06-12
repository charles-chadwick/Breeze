<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Prescription extends Base
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'prescriber_id',
        'medication_id',
        'dosage',
        'frequency',
        'route',
        'quantity',
        'refills',
        'prescribed_at',
        'instructions',
    ];

    public function prescribedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('m/d/Y h:i a'),
        );
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function prescriber(): BelongsTo
    {
        return $this->belongsTo(User::class, 'prescriber_id');
    }

    public function medication(): BelongsTo
    {
        return $this->belongsTo(Medication::class);
    }
    //
    //    public function fills()
    //    {
    //        return $this->hasMany(PrescriptionFill::class);
    //    }
}
