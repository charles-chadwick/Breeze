<?php

namespace App\Models;

use App\Models\Scopes\FilterByStatus;
use App\Models\Scopes\FilterByType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discussion extends Base
{
    use HasFactory;
    use FilterByStatus, FilterByType;

    protected $fillable = [
        'status',
        'type',
        'title',
        'patient_id',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
