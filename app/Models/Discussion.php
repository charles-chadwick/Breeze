<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
