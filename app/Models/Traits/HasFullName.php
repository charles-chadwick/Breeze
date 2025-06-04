<?php
namespace App\Models\Traits;

trait HasFullName {

    protected function getFullNameAttribute(): string
    {
        return collect([
            $this->first_name,
            $this->middle_name,
            $this->last_name,
        ])
            ->filter(fn ($value) => trim($value))
            ->implode(' ');
    }
}
