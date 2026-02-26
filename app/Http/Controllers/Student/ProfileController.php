<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the student's profile.
     */
    public function index()
    {
        return view('student.profile');
    }

    /**
     * Update the student's profile.
    */
    public function update(UpdateProfileRequest $request) {

        $user = Auth::user();

        // Update name
        $user->name = $request->name;

        // Update password if provided
        if($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->password_set = true; 
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }

}
