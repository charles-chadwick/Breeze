<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait FilterByStatus
{
    /**
     * @todo Error handling for the status var, either here or in Middleware
     * @todo Add in multiple status fields if array
     */
    protected function scopeFilterByStatus($query): Builder
    {
        return $query->when(request('status'), function ($query, $status) {
            if (! is_array($status)) {
                $status = [$status];
            }

            return $query->whereIn('status', $status);
        });
    }
}
