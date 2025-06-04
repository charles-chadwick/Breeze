<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EncounterUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'encounter_id',
        'user_id',
    ];
}
