<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Services\GoogleMeetService;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test-meet', function (GoogleMeetService $meetService) {
    try {
        $meeting = $meetService->createMeeting([
            'title'      => 'Test Filament Meeting',
            'start_time' => now()->addHour(),
            'end_time'   => now()->addHours(2),
        ]);

        return "Success! Meet Link: " . $meeting['meet_link'];
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});




Route::prefix('schedule')->group(function () {
    Route::get('/', [ScheduleController::class, 'index'])->name('schedule');
    
    Route::get('/slots/{slot}', [ScheduleController::class, 'slots'])->name('schedule.slots');
    Route::post('booking', [ScheduleController::class, 'storeBooking'])->name('schedule.apoitment');
});