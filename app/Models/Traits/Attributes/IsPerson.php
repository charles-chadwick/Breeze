<?php

/** @noinspection ALL */

namespace App\Models\Traits\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait IsPerson
{
    public function fullName(): Attribute
    {
        return Attribute::make(get: function ($value) {
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

    public function fullNameWithSalutations(): Attribute
    {
        return Attribute::make(get: function ($value) {
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
}
