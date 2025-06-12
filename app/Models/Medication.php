<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medication extends Base
{
    use HasFactory;

    public function __construct(array $attributes = []) { parent::__construct($attributes); }

    protected $fillable = [
        'brand_name',
        'generic_name',
        'manufacturer',
        'strength',
        'dose_form',
        'ndc',
    ];

    /**
     * Prescription relationship
     */
    public function prescriptions() : HasMany
    {
        return $this->hasMany(Prescription::class);
    }
}
