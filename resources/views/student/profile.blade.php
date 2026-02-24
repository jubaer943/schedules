@extends('student.layouts.app')
@section('content')
<div class="max-w-2xl bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
    <h2 class="text-xl font-black text-slate-800 mb-8">Account Settings</h2>
    
    <form class="space-y-6">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-[10px] font-black text-gray-400 uppercase ml-1">Full Name</label>
                <input type="text" value="{{ auth()->user()->name }}" class="w-full mt-2 p-3 rounded-xl bg-gray-50 border-none">
            </div>
            <div>
                <label class="text-[10px] font-black text-gray-400 uppercase ml-1">Email</label>
                <input type="email" disabled value="{{ auth()->user()->email }}" class="w-full mt-2 p-3 rounded-xl bg-gray-200 border-none cursor-not-allowed">
            </div>
        </div>

        <div class="pt-6 border-t border-gray-50">
            <h3 class="text-sm font-black text-blue-800 uppercase tracking-widest mb-4">Update Password</h3>
            <div class="space-y-4">
                <input type="password" placeholder="New Password" class="w-full p-4 rounded-xl border border-gray-100 focus:ring-2 focus:ring-blue-500 outline-none">
                <input type="password" placeholder="Confirm Password" class="w-full p-4 rounded-xl border border-gray-100 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
        </div>
        
        <button class="bg-blue-800 text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-blue-100 hover:bg-black transition">Save Changes</button>
    </form>
</div>
@endsection