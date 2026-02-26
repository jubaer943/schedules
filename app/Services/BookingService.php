<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BookingService
{
    /**
     * Main method for handling bookings and auto-registration.
     */
    public function handleBooking(array $data)
    {
        return DB::transaction(function () use ($data) {
            // check if the slot is still available

                $schedule = Schedule::where('id', $data['selected_slot'])
                    ->where('is_available', 1)
                    ->lockForUpdate() 
                    ->first();

            if (!$schedule) {
               throw new \Exception("Selected schedule is not available.");
            }            
            
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'] ?? 'Unknown',
                    'password' => Hash::make(Str::random(6)),
                    'password_set' => false
                ]);

                // save the appointment
                $registration = $schedule->appointments()->create([
                    'user_id' => $user->id,
                ]);

                // mark the schedule as unavailable
                $schedule->update(['is_available' => 0]);

                return [
                    'registration' => $registration,
                    'user' => $user, 
                    'is_new_user' => $user->wasRecentlyCreated,
                ];

        });
        
    }
}