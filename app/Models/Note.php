<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Base
{
    use HasFactory;

    public function __construct(array $attributes = []) { parent::__construct($attributes); }

    protected $fillable = [
        'on',
        'on_id',
        'type',
        'title',
        'content',
    ];

    public function noteable() : MorphTo
    {
        return $this->morphTo("noteable", "on", "on_id");
    }
}
