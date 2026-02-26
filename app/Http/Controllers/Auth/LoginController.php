<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
    */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle the login request.
     */
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'))
                ->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email'); 
    }

    /**
     * Show the lock screen.
     */
    public function showLock() 
    {
        $email = session('lock_email');

        if(!$email) {
            return view('auth.login');
        }

        // find the user by email
        $user = User::where('email', $email)->first();

        if(!$user) {
            return view('auth.login');
        }

        return view('auth.lock', compact('user'));
    }

    /**
     * Handle the unlock request.
    */
    public function unlock(Request $request) {
        $request->validate([
            'password' => 'required|string',
        ]);

        // 1. Get the email that we stored in the session earlier
        $email = session('lock_email');

        if (!$email) {
            return redirect()->route('login')->with('error', 'Session expired. Please try again.');
        }

        $credentials = [
            'email' => $email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {

            session()->forget('lock_email');
            
            return redirect()->intended('/student/dashboard')->with('success', 'Welcome back! Booking confirmed.');
        }

        return back()->withErrors(['password' => 'Incorrect password. Please try again.']);
    }

    /**
     * Handle the logout request.
     */
    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }
}
