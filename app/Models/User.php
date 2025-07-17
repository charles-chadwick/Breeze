<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;

class User extends Base implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, HasFactory, MustVerifyEmail, Notifiable;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected $fillable = [
        'role',
        'status',
        'prefix',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts() : array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    public function avatar() : Attribute
    {
        return Attribute::make(get: function () {
                $avatar = $this->getFirstMediaUrl('avatar');
                if (!file_exists($this->getFirstMediaPath('avatar'))) {
                    $avatar = asset('default-avatar.png');
                }

                return $avatar;
            });
    }

    public function fullName() : Attribute
    {
        return Attribute::make(get: function () {
            return collect([
                $this->first_name,
                $this->middle_name,
                $this->last_name,
            ])
                ->filter(function ($value) {
                    return trim($value) !== '';
                })
                ->implode(' ');
        });
    }

    public function fullNameWithSalutations() : Attribute
    {
        return Attribute::make(get: function () {
            return collect([
                $this->prefix,
                $this->first_name,
                $this->middle_name,
                $this->last_name,
                $this->suffix,
            ])
                ->filter(function ($value) {
                    return trim($value) !== '';
                })
                ->implode(' ');
        });
    }

    public function discussions() : BelongsToMany
    {
        return $this->belongsToMany(Discussion::class, 'discussions_users');
    }

    public function scopePatient(Builder $query) : Builder {
        return $query->where('role', UserRole::Patient);
    }

    public function scopeDoctor(Builder $query) : Builder {
        return $query->where('role', UserRole::Doctor);
    }

    public function scopeNurse(Builder $query) : Builder {
        return $query->where('role', UserRole::Nurse);
    }

    public function scopeStaff(Builder $query) : Builder {
        return $query->where('role', UserRole::Staff);
    }

    public function scopeClinicalStaff(Builder $query) : Builder {
        return $query->whereNotIn('role', [UserRole::Patient, UserRole::Administrator]);
    }
}
