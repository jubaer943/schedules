<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Services\ZoomService;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test-meet', function (ZoomService $zoomService) {
    try {
        $meeting = $zoomService->createMeeting([
            'topic'      => 'Test Laravel Meeting',
            'start_time' => now()->addHour(),
            'duration'   => 60, 
        ]);

        if (isset($meeting['join_url'])) {
            return "Success! Join Link: " . $meeting['join_url'];
        }

        return response()->json($meeting); 
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
}); 


Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/forgot', function () {
    return view('forgot');
});
Route::get('/lock', function () {
    return view('lock');
});
Route::get('/profile', function () {
    return view('profile');
})->name('profile');
Route::get('/my-bookings', function () {
    return view('bookings');
})->name('my.bookings');

Route::prefix('schedule')->group(function () {
    Route::get('/', [ScheduleController::class, 'index'])->name('schedule');
    Route::get('/slots/{slot}', [ScheduleController::class, 'slots'])->name('schedule.slots');
    Route::post('booking', [ScheduleController::class, 'storeBooking'])->name('schedule.apoitment');
});