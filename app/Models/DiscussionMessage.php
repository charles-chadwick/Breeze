<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscussionMessage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'discussions_id',
        'status',
        'content',
        'user_id',
    ];

    public function discussions() : BelongsTo
    {
        return $this->belongsTo(Discussions::class);
    }

    public function createdBy() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
