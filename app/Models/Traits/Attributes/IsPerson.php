<?php

namespace App\Models\Traits\Attributes;

use Exception;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait IsPerson
{
    public function fullName(): Attribute
    {
        return Attribute::make(get: function () {
            return collect([$this->prefix, $this->first_name, $this->middle_name, $this->last_name, $this->suffix])
                ->filter(function ($value) {
                    return trim($value) !== '';
                })
                ->implode(' ');
        }, set: function ($value) {
            throw new Exception('Cannot set the classes name via full_name. Use individual fields instead.');
        });
    }
}
