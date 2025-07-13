<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiscussionMessage extends Base
{
    use HasFactory;

    protected $table = 'discussions_messages';

    protected $fillable = [
        'discussion_id',
        'status',
        'content',
        'user_id',
    ];

    public function discussions() : BelongsTo
    {
        return $this->belongsTo(Discussion::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
