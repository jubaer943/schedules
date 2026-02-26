<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the student dashboard.
    */
    public function index()
    {
        // $schedules = auth()->user()->appointments()
        //     ->with('schedule')
        //     ->orderBy('created_at', 'desc')
        //     ->get()
        //     ->groupBy(function($appointment) {
        //         return $appointment->schedule->date->format('Y-m-d');
        //     });

        return view('student.dashboard');
    }
}
