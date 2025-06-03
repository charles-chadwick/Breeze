<?php

namespace App\Models;

use App\Enums\PatientStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\HigherOrderWhenProxy;
use LaravelIdea\Helper\App\Models\_IH_Patient_QB;

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
    protected function casts() : array
    {
        return [
            'dob'    => 'date',
            'status' => PatientStatus::class
        ];
    }

    /**
     * @return int
     */
    protected function getAgeAttribute() : int
    {
        return Carbon::parse($this->attributes[ 'dob' ])->age;
    }

    /**
     * @return string
     */
    protected function getDobAttribute() : string
    {
        return Carbon::parse($this->attributes[ 'dob' ])
                     ->format('m/d/Y');
    }

    /**
     * @return string
     */
    protected function getFullNameAttribute() : string
    {
        return collect([
            $this->first_name,
            $this->middle_name,
            $this->last_name,
        ])
            ->filter(fn($value) => trim($value))
            ->implode(' ');
    }

    /**
     * @param $query
     * @param $status
     * @return Builder
     * @todo Error handling for the status var, either here or in Middleware
     * @todo Add in multiple status fields if array
     */
    protected function scopeByStatus($query, $status = null) : Builder
    {
        return $query->when($status, function ($query, $status) {
            return $query->whereIn('status', $status);
        });
    }
}
