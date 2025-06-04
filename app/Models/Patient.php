<?php

namespace App\Models;

use App\Enums\PatientStatus;
use App\Models\Traits\FilterByStatus;
use App\Models\Traits\HasFullName;
use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;

/**
 * @property mixed $encounters
 */
class Patient extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;
    use HasFactory, SoftDeletes;
    use HasFullName;
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


    public function encounters(): Patient|HasMany
    {
        return $this->hasMany(Encounter::class);
    }
}
