<?php
namespace App\Jobs;

use App\Models\Appointment; 
use App\Services\ZoomService;
use App\Mail\BookingConfirmedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessBookingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(protected $registrationId) {}

    public function handle(ZoomService $zoomService)
    {
       
        $registration = \App\Models\Appointment::with('schedule')->find($this->registrationId);
        if (!$registration || !$registration->schedule) return;

        $schedule = $registration->schedule;

        $dateString = $schedule->date->format('Y-m-d'); 
        $startTime = \Carbon\Carbon::parse($dateString . ' ' . $schedule->schedule);

        $zoomData = $zoomService->createMeeting([
            'topic'      => "Consultation: " . $registration->email,
            'start_time' => $startTime,
            'duration'   => 40,
        ]);

        if (isset($zoomData['join_url'])) {
            $registration->update(['meet_link' => $zoomData['join_url']]);
            
            Mail::to($registration->email)->send(new BookingConfirmedMail($registration, $zoomData['join_url']));
        }
    }
}