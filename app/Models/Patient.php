<?php

namespace App\Models;

use App\Models\Traits\IsPerson;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Access\Authorizable;

class Patient extends Base implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use HasFactory;
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;
    use IsPerson;

    /**
     * Constructors
     */
    public function __construct($attributes = []) { parent::__construct($attributes); }

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
        'remember_token'
    ];
}
