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
    // 1. First, find the specific schedule record to get its date string
    $selectedRecord = Schedule::find($slot);

    if (!$selectedRecord) {
        return response()->json([
            'status' => false,
            'message' => 'Date not found'
        ], 404);
    }

    // 2. Find all slots that have the same date as the selected record
    // We use ->get() to return a collection (array) of all matches
    $allSlots = Schedule::where('date', $selectedRecord->date)
                        ->orderBy('schedule', 'asc')
                        ->get();

    // 3. Return the collection wrapped in your data structure
    return response()->json([
        'status'  => true,
        'code'    => 200,
        'message' => 'success',
        'data'    => $allSlots,
    ]);
}



public function storeBooking(Request $request, GoogleMeetService $meetService) 
{

    $data = $request->validate([
        'email'       => 'required|email',
        'selected_slot' => 'required|exists:schedules,id'
    ]);

    try {

        return DB::transaction(function () use ($data) {
            
            $schedule = Schedule::where('id', $data['selected_slot'])
                ->where('is_available', 1)
                ->lockForUpdate() 
                ->first();

            if (!$schedule) {
                return back()->with('error', 'This schedule is no longer available.');
            }

            $meeting = $meetService->createMeeting([
                'title'      => "Meeting: " . $data['email'],
                'start_time' => $schedule->start_time,
                'end_time'   => $schedule->end_time,
            ]);

            $schedule->registrations()->create([
                'email' => $data['email'],
                'meet_link'=> $meeting['meet_link'],
            ]);

            $schedule->update(['is_available' => 0]);

            return back()->with('success', 'Registration successful!');
        });

    } catch (\Exception $e) {
        // 6. Log errors for debugging
        logger()->error("Booking failed: " . $e->getMessage());
        return back()->with('error', 'Something went wrong. Please try again.');
    }
}
}
