<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prescription extends Model
{
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
        'instructions'
    ];

    public function patient() : BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function prescriber() : BelongsTo
    {
        return $this->belongsTo(User::class,  'prescriber_id');
    }

    public function medication() : BelongsTo
    {
        return $this->belongsTo(Medication::class);
    }
//
//    public function fills()
//    {
//        return $this->hasMany(PrescriptionFill::class);
//    }
}
