<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    protected $fillable = [
        'date',
        'schedule',
        'is_available',
    ];

    protected $casts = [
    'date' => 'date', 
    'is_available' => 'boolean',
];

    /**
     * Get the appointments for the schedule.
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}


