<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;
use App\Services\GoogleMeetService;

class ScheduleController extends Controller
{
    public function index() {
        
        $shcedules = Schedule::all();

        // return response()->json($shcedules);

        return view('schedule', compact('shcedules'));
    }

public function slots(Request $request, $slot)
{
    $selectedRecord = Schedule::find($slot);

    if (!$selectedRecord) {
        return response()->json([
            'status' => false,
            'message' => 'Date not found'
        ], 404);
    }


    $allSlots = Schedule::where('date', $selectedRecord->date)
                        ->orderBy('schedule', 'asc')
                        ->get();


    return response()->json([
        'status'  => true,
        'code'    => 200,
        'message' => 'success',
        'data'    => $allSlots,
    ]);
}



public function storeBooking(Request $request) 
{
    $data = $request->validate([
        'email'         => 'required|email',
        'selected_slot' => 'required|exists:schedules,id'
    ]);

    try {
        $registration = DB::transaction(function () use ($data) {
            $schedule = Schedule::where('id', $data['selected_slot'])
                ->where('is_available', 1)
                ->lockForUpdate() 
                ->first();

            if (!$schedule) {
                throw new \Exception('Slot taken');
            }

            $reg = $schedule->registrations()->create([
                'email' => $data['email'],
            ]);

            $schedule->update(['is_available' => 0]);
            
            return $reg;
        });

        \App\Jobs\ProcessBookingJob::dispatch($registration->id);

        return back()->with('success', 'Booking received! Your Zoom link is being generated and will be emailed to you shortly.');

    } catch (\Exception $e) {
        return back()->with('error', 'This schedule is no longer available.');
    }
}
}
