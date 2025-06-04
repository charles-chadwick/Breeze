<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait FilterByType
{
    /**
     * @todo Error handling for the status var, either here or in Middleware
     * @todo Add in multiple status fields if array
     */
    protected function scopeFilterByType($query): Builder
    {
        return $query->when(request('type'), function ($query, $status) {
            if (! is_array($status)) {
                $status = [$status];
            }

            return $query->whereIn('type', $status);
        });
    }
}
