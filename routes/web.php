<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\ProfileController;

// --- Public Routes ---
Route::get('/', function () { return view('frontend.home'); });

// --- Authentication Routes ---
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::get('/lock', 'showLock')->name('lock');
    Route::post('/unlock', 'unlock')->name('unlock');
});

// --- Student Area (Protected by Middleware) ---
Route::middleware(['auth'])->prefix('student')->group(function () {
    
    // Overview / Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Bookings
    Route::get('/my-bookings', [DashboardController::class, 'bookings'])->name('my.bookings');
    
    // Profile & Security
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

});

// --- Booking / Schedule Logic ---
Route::prefix('schedule')->group(function () {
    Route::get('/', [ScheduleController::class, 'index'])->name('schedule');
    Route::get('/slots/{slot}', [ScheduleController::class, 'slots'])->name('schedule.slots');
    Route::post('/booking', [ScheduleController::class, 'storeBooking'])->name('schedule.appointment');
});