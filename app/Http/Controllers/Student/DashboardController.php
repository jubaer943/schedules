<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Http\Resources\AppointmentResource;

class DashboardController extends Controller
{
    /**
     * Display the student dashboard.
    */
    public function index()
    {
        
        $schedules = auth()->user()->appointments()
            ->with('schedule')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function($appointment) {
                return $appointment->schedule->date->format('Y-m-d');
            });

        
        $availableSlots = Schedule::where('is_available', true)
            ->whereDate('date', '>=', now()->toDateString())
            ->count();
        
        return view('student.dashboard', compact('schedules', 'availableSlots'));
    }

    /**
     * my bookings page
     */

    public function bookings()
    {
        $bookings = auth()->user()->appointments()
            ->with('schedule')
            ->orderBy('created_at', 'desc')
            ->get();

        $appointments = AppointmentResource::collection($bookings)->resolve();

        return view('student.bookings', compact('bookings', 'appointments'));
    }    
}
