<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait IsPerson
{
    public function fullName() : Attribute
    {
        return Attribute::make(get: function () {
                return collect([
                    'prefix',
                    'first_name',
                    'middle_name',
                    'last_name',
                    'suffix'
                ])
                    ->map(function ($value) {
                        if (isset($this->$value) && trim($this->$value) !== '') {
                            return $this->$value;
                        }
                        return null;
                    })
                    ->implode(' ');
            });
    }
}
