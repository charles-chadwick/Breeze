<?php

namespace App\Models;

use App\Enums\PatientStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

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
        ];
    }

    /**
     * @return int
     */
    protected function getAgeAttribute(): int
    {
        return Carbon::parse($this->attributes['dob'])->age;
    }

    /**
     * @return string
     */
    protected function getDobAttribute(): string
    {
        return Carbon::parse($this->attributes['dob'])
            ->format('m/d/Y');
    }

    /**
     * @return string
     */
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

    protected function scopeByStatus($query, PatientStatus $status) {
        return $query->where('status', $status);
    }
}
