<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\ProfileController;
use Illuminate\Support\Facades\Mail;

// --- Public Routes ---
Route::get('/', function () { return view('frontend.home'); })->name('home');

// --- Booking / Schedule Logic ---
Route::prefix('schedule')->group(function () {
    Route::get('/', [ScheduleController::class, 'index'])->name('schedule');
    Route::get('/slots/{slot}', [ScheduleController::class, 'slots'])->name('schedule.slots');
    Route::post('/booking', [ScheduleController::class, 'storeBooking'])->name('schedule.appointment');
});


// --- Authentication Routes ---
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::get('/lock', 'showLock')->name('lock');
    Route::post('/unlock', 'unlock')->name('unlock');
    Route::get('/forgot-password', 'showForgotPassword')->name('password.request');
    Route::post('/forgot-password', 'sendResetLinkEmail')->name('password.email');
    Route::get('/reset-password/{token}', 'showResetForm')->name('password.reset');
    Route::post('/reset-password', 'resetPassword')->name('password.update');
});

// --- Student Area (Protected by Middleware) ---
Route::middleware(['student.auth'])->prefix('student')->group(function () {
    
    // Overview / Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Bookings
    Route::get('/my-bookings', [DashboardController::class, 'bookings'])->name('my.bookings');
    
    // Profile & Security
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


    // Logout 
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});

Route::get('/test-email', function () {
    try {
        Mail::raw('Hi, this is a test email from Laravel!', function ($message) {
            $message->to('jubaerhosenhridoy2@example.com') // Put your real email here
                    ->subject('Server Test Email');
        });
        return "Email sent successfully! Check your inbox/Mailtrap.";
    } catch (\Exception $e) {
        // This will catch the EXACT error (wrong password, wrong port, etc.)
        return "Email failed! Error: " . $e->getMessage();
    }
});


