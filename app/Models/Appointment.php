<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    protected $fillable = [
        'email',
        'schedule_id',
        'start_url',
        'join_url',
    ];

    /**
     * Get the schedule that owns the registration.
     */

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }
}
