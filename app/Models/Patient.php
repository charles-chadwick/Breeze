<?php

namespace App\Models;

use App\Enums\PatientStatus;
use App\Models\Scopes\FilterByStatus;
use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\Access\Authorizable;

/**
 * @property mixed $encounters
 */
class Patient extends Base implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use HasFactory;
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;
    use FilterByStatus;


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

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function encounters(): HasMany
    {
        return $this->hasMany(Encounter::class);
    }
}
