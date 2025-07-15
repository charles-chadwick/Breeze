<?php

/** @noinspection ALL */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Base extends Model implements HasMedia
{
    use InteractsWithMedia, LogsActivity, SoftDeletes;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value)->format('m/d/Y h:i A') : null
        );
    }

    public function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value)->format('m/d/Y h:i A') : null
        );
    }

    public function deletedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value)->format('m/d/Y h:i A') : null
        );
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logExcept([
                'updated_at',
                'created_at',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Database');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('avatar')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }
}
