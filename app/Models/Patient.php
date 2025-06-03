<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

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

    protected function casts() : array
    {
        return [
            'dob' => 'date',
        ];
    }

    protected function getDobAttribute() : string  {
        return Carbon::parse($this->attributes['dob'])->format('m/d/Y');
    }

    protected function getFullNameAttribute() : string  {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }
}
