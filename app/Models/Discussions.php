<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discussions extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'status',
        'user_id',
    ];

    public function createdBy() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
