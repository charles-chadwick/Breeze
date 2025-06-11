<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentsUser extends Base
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'appointment_id',
        'user_id'
    ];

    public function appointment() : BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
