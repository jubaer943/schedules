<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;
use App\Services\GoogleMeetService;
use App\Services\BookingService;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    
    /**
     * Display the schedule page with available slots.
     */
    public function index() {
        
        $schedules = Schedule::all();

        return view('frontend.schedule', compact('schedules'));
    }

    /**
     * Fetch all slots for a given date based on the selected slot's date.
     */
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

    /**
     * Handle booking requests, including user creation and Zoom meeting scheduling.
    */
    public function storeBooking(Request $request, BookingService $bookingService) 
    {
        $data = $request->validate([
            'email'         => 'required|email',
            'selected_slot' => 'required|exists:schedules,id'
        ]);

        try{
            $result = $bookingService->handleBooking($data);

            $registration = $result['registration'];
            $user = $result['user'];

            // zoom meeting creation is handled in the job, so we just dispatch it here
            \App\Jobs\ProcessBookingJob::dispatch($registration->id);

            // return response()->json([
            //     'status' => true,
            //     'data' => $result,
            // ]);

            // old user and not logged in, redirect to lock page
            if($result['is_new_user']){
                Auth::login($user);

                return redirect()->route('dashboard')->with('success', 'Booking successful! Your Zoom link is being generated and will be emailed to you shortly.');
            }  

            // auto-login for new users after booking
            if (!$result['is_new_user'] && !Auth::check()) {

                session(['lock_email' => $user->email]); 
 
                return redirect()->route('lock')
                ->with('info', 'Please enter your password to confirm booking.');
            }

            return back()->with('success', 'Booking successful! Your Zoom link is being generated and will be emailed to you shortly or it in your dashboard.');


        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }
}
