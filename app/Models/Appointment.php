<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
