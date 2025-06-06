<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Base extends Model
{
    use SoftDeletes, LogsActivity;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function getActivitylogOptions() : LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('System');
    }
}
