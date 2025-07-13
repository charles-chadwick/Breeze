<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discussion extends Base
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'user_id',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'discussions_users');
    }

    public function messages() : HasMany {
        return $this->hasMany(DiscussionMessage::class);
    }

    public function lastPost() {
        return $this->messages()->orderBy('created_at', 'desc')->first();
    }

    public function firstPost()  {
        return $this->messages()->orderBy('created_at')->first();
    }
}
