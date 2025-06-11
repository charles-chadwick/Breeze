<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Base
{
    use HasFactory;

    public function __construct($attributes = []) { parent::__construct($attributes); }

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
        'description'
    ];

    /**
     * Patient relationship
     */
    public function patient() : BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Users relationship
     */
    public function users() :  BelongsToMany {
        return $this->belongsToMany(User::class);
    }
}
