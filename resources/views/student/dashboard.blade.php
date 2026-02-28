@extends('student.layouts.app')

@section('content')
    {{-- Main Parent Grid: 3 Columns for better balance --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- LEFT SIDE: List of Appointments (Spans 2 columns) --}}
        <div class="lg:col-span-2 space-y-6">
            <x-alert type="success" />

            @if ($schedules->isNotEmpty())
                {{-- Inner Grid: Changed to 1 column so cards stack nicely or 2 for side-by-side --}}
                <div class="grid grid-cols-1 md:grid-cols-1 gap-6">

                    @foreach ($schedules as $date => $appointments)
                        @foreach ($appointments as $appointment)
                            @php
                                $eventDate = \Carbon\Carbon::parse($appointment->schedule->date)->format('Y-m-d');
                                $eventTime = $appointment->schedule->schedule;
                                $fullDateTime = \Carbon\Carbon::parse($eventDate . ' ' . $eventTime)->toIso8601String();
                            @endphp

                            {{-- Card Container: Removed 'lg:col-span-2' to prevent squishing --}}
                            <div
                                class="bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col h-full">
                                <div class="flex justify-between items-start mb-6">
                                    <div>
                                        <span
                                            class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest">
                                            Upcoming Test
                                        </span>
                                        <h3 class="text-lg md:text-xl font-bold mt-2 leading-tight">
                                            <span class="block font-semibold text-blue-600 mt-1 js-countdown"
                                                data-expire="{{ $fullDateTime }}">
                                                Calculating...
                                            </span>
                                        </h3>
                                    </div>
                                    <i class="fas fa-video text-blue-100 text-4xl hidden sm:block"></i>
                                </div>

                                {{-- Date/Time Badges --}}
                                <div class="flex flex-wrap gap-3 mb-8 text-sm">
                                    <div
                                        class="flex items-center gap-2 font-bold text-gray-600 bg-gray-50 px-3 py-2 rounded-xl">
                                        <i class="fas fa-calendar text-blue-600"></i>
                                        {{ \Carbon\Carbon::parse($appointment->schedule->date)->format('d M, Y') }}
                                    </div>
                                    <div
                                        class="flex items-center gap-2 font-bold text-gray-600 bg-gray-50 px-3 py-2 rounded-xl">
                                        <i class="fas fa-clock text-blue-600"></i>
                                        {{ $appointment->schedule->schedule }}
                                    </div>
                                </div>

                                {{-- Buttons: Using text-xs for better fit on smaller cards --}}
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 mt-auto">
                                    <a href="{{ $appointment->join_url ?? '#' }}"
                                        class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-2xl font-bold transition active:scale-95 text-[11px] {{ !$appointment->join_url ? 'opacity-50 cursor-not-allowed' : '' }} ">
                                        <i class="fas fa-play-circle"></i> Join Zoom
                                    </a>

                                    <a href="#"
                                        class="flex items-center justify-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white p-3 rounded-2xl font-bold transition active:scale-95 text-[11px]">
                                        <i class="fas fa-poll-h"></i> Result
                                    </a>

                                    <a href="#"
                                        class="flex items-center justify-center gap-2 bg-gray-900 hover:bg-black text-white p-3 rounded-2xl font-bold transition active:scale-95 text-[11px]">
                                        <i class="fas fa-credit-card"></i> Pay Now
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            @else
                <div class="text-center p-12 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                    <p class="text-gray-500 font-medium">No scheduled appointments found.</p>
                </div>
            @endif
        </div>

        {{-- RIGHT SIDE: Available Slots Card (Spans 1 column) --}}
        <div class="lg:col-span-1">
            <div class="bg-blue-800 p-8 rounded-3xl shadow-xl text-white relative overflow-hidden group h-fit sticky top-6">
                <div
                    class="absolute -right-4 -top-4 w-24 h-24 bg-white/10 rounded-full group-hover:scale-150 transition-transform duration-500">
                </div>

                <p class="text-blue-300 text-xs font-bold uppercase tracking-widest">Available Slots</p>
                <h4 class="text-5xl font-black mt-2">{{ $availableSlots }}</h4>

                <div class="mt-8 pt-6 border-t border-blue-700">
                    <a href="{{ route('schedule') }}"
                        class="w-full inline-block text-center bg-yellow-400 text-blue-900 px-6 py-4 rounded-2xl text-xs font-black uppercase hover:bg-yellow-500 transition shadow-lg">
                        Book Slot
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- JavaScript Countdown Engine --}}
    <script>
        function updateAllCountdowns() {
            const timers = document.querySelectorAll('.js-countdown');

            timers.forEach(timer => {
                const targetDate = new Date(timer.getAttribute('data-expire')).getTime();
                const now = new Date().getTime();
                const gap = targetDate - now;

                if (gap <= 0) {
                    timer.innerHTML = "● Session Live Now";
                    timer.classList.remove('text-blue-600');
                    timer.classList.add('text-red-500', 'animate-pulse');
                    return;
                }

                const second = 1000;
                const minute = second * 60;
                const hour = minute * 60;
                const day = hour * 24;

                const d = Math.floor(gap / day);
                const h = Math.floor((gap % day) / hour);
                const m = Math.floor((gap % hour) / minute);
                const s = Math.floor((gap % minute) / second);

                let timeLeft = "";
                if (d > 0) timeLeft += d + "d ";
                timeLeft += h + "h " + m + "m " + s + "s remaining";

                timer.innerText = timeLeft;
            });
        }

        setInterval(updateAllCountdowns, 1000);
        updateAllCountdowns();
    </script>
@endsection
