<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Notifications\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            return redirect()->route('login');
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
     * Show the forgot password form.
     */

    public function showForgotPassword() 
    {
        return view('auth.forgot');
    }

    /**
     * Handle the forgot password request.
     */
    public function sendResetLinkEmail(Request $request) 
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $status = Password::broker()->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
        
    }
    
    /**
     * Show the reset password form.
     */
    public function showResetForm(Request $request, $token)
    {
        $email = $request->query('email');
        return view('auth.reset', compact('token', 'email'));
    }

    /**
     * Handle the reset password request.
     */
    public function resetPassword(Request $request) 
    {    
        $request->validate([
                'token'    => 'required',
                'email'    => 'required|email',
                'password' => 'required|min:8|confirmed', 
            ]);
        
        $status = Password::broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),

            function ($user, $password) {
                $this->resetUserPassword($user, $password);
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Password reset successful! You can now log in with your new password.')
            : back()->withErrors(['email' => [__($status)]]);
    }

    /**
     * Reset the user's password.
     */
    protected function resetUserPassword($user, $password) 
    {
       $user->forceFill([
            'password' => Hash::make($password),
            'password_set' => 1,
        ])->setRememberToken(Str::random(60));

        $user->save();
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
