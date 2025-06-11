<?php

namespace App\Models\Traits\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait HasStatus
{
    public function scopeStatus(Builder $query): Builder
    {
        return $query->when(request('status'), function (Builder $query, $status) {
            if (! is_array($status)) {
                $status = [$status];
            }

            return $query->whereIn('status', $status);
        });
    }
}
