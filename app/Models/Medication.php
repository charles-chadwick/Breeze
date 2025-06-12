<?php

namespace App\Models;

use App\Enums\DoseForm;
use App\Enums\DrugSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medication extends Base
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected $fillable = [
        'brand_name',
        'generic_name',
        'manufacturer',
        'strength',
        'dose_form',
        'ndc',
        'schedule',
    ];

    public function casts(): array
    {
        return [
            'schedule' => DrugSchedule::class,
            'dose_form' => DoseForm::class,
        ];
    }

    /**
     * Prescription relationship
     */
    public function prescriptions(): HasMany
    {
        return $this->hasMany(Prescription::class);
    }
}
