<?php

namespace App\Models;

use App\Enums\PatientStatus;
use App\Models\Traits\Filters\ByStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $encounters
 */
class Patient extends Model
{
    use ByStatus, HasFactory, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'status',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'dob',
        'gender',
    ];

    /**
     * @return string[]
     */
    protected function casts(): array
    {
        return [
            'dob' => 'date',
            'status' => PatientStatus::class,
        ];
    }

    protected function getAgeAttribute(): int
    {
        return Carbon::parse($this->attributes['dob'])->age;
    }

    protected function getDobAttribute(): string
    {
        return Carbon::parse($this->attributes['dob'])
            ->format('m/d/Y');
    }

    protected function getFullNameAttribute(): string
    {
        return collect([
            $this->first_name,
            $this->middle_name,
            $this->last_name,
        ])
            ->filter(fn ($value) => trim($value))
            ->implode(' ');
    }

    public function encounters(): Patient|HasMany
    {
        return $this->hasMany(Encounter::class);
    }
}
