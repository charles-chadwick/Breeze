<?php

namespace App\Models;

use App\Models\Traits\Scopes\HasStatus;
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
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Users' relationship
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "appointments_users", "appointment_id", "user_id");
    }
}
