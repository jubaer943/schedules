@extends('student.layouts.app')

@section('content')
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest">Upcoming Test</span>
                            <h3 class="text-lg md:text-xl font-bold mt-2 leading-tight">Speaking Mock Test Session</h3>
                        </div>
                        <i class="fas fa-video text-blue-100 text-4xl hidden sm:block"></i>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 mb-8 text-sm">
                        <div class="flex items-center gap-2 font-bold text-gray-600 bg-gray-50 px-4 py-2 rounded-xl"><i class="fas fa-calendar text-blue-600"></i> 24 Feb, 2026</div>
                        <div class="flex items-center gap-2 font-bold text-gray-600 bg-gray-50 px-4 py-2 rounded-xl"><i class="fas fa-clock text-blue-600"></i> 10:30 AM</div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <a href="#" class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-2xl font-bold shadow-lg shadow-blue-50 transition active:scale-95 text-sm">
                            <i class="fas fa-play-circle"></i> Join Zoom
                        </a>
                        <a href="#" class="flex items-center justify-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white p-4 rounded-2xl font-bold shadow-lg shadow-emerald-50 transition active:scale-95 text-sm">
                            <i class="fas fa-poll-h"></i> Result
                        </a>
                        <a href="#" class="flex items-center justify-center gap-2 bg-gray-900 hover:bg-black text-white p-4 rounded-2xl font-bold shadow-lg shadow-gray-200 transition active:scale-95 text-sm">
                            <i class="fas fa-credit-card"></i> Pay Now
                        </a>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-blue-800 p-8 rounded-3xl shadow-xl text-white relative overflow-hidden group">
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-white/10 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
                        <p class="text-blue-300 text-xs font-bold uppercase tracking-widest">Available Slots</p>
                        <h4 class="text-4xl font-black mt-2">01</h4>
                        <div class="mt-8 pt-6 border-t border-blue-700">
                            <a href="#" class="w-full inline-block text-center bg-yellow-400 text-blue-900 px-6 py-3 rounded-xl text-xs font-black uppercase hover:bg-yellow-500 transition shadow-lg">Book Slot</a>
                        </div>
                    </div>
                </div>
            </div>
@endsection