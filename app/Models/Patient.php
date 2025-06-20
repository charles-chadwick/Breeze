<?php

namespace App\Models;

use App\Models\Traits\Attributes\HasAvatar;
use App\Models\Traits\Attributes\IsPerson;
use App\Models\Traits\Scopes\HasStatus;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Support\Carbon;

class Patient extends Base implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;
    use HasAvatar, HasStatus, IsPerson;
    use HasFactory;

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
        'prefix',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'gender',
        'dob',
        'status',
        'email',
        'password',
        'remember_token',
    ];

    /**
     * Date of Birth attribute
     */
    public function age() : Attribute
    {
        return Attribute::make(get: fn() => Carbon::parse($this->attributes[ 'dob' ])->age);
    }

    /**
     * Date of Birth attribute
     */
    public function dob() : Attribute
    {
        return Attribute::make(get: fn() => Carbon::parse($this->attributes[ 'dob' ])
                                                  ->format('m/d/Y'));
    }

    /**
     * Appointment relationship
     */
    public function appointments() : HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Prescription relationship
     */
    public function prescriptions() : HasMany
    {
        return $this->hasMany(Prescription::class);
    }
}
