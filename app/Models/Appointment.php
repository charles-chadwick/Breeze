<?php

namespace App\Models;

use App\Models\Scopes\FilterByStatus;
use App\Models\Scopes\FilterByType;
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

    public function patient() : BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
