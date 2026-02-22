<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IELTS Mock Test - Slot Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .flatpickr-day.selected { background: #2563eb !important; border-color: #2563eb !important; }
        .flatpickr-day.today { border-color: #facc15 !important; }
    </style>
</head>
<body class="bg-gray-100 font-sans">

    <div class="max-w-5xl mx-auto py-10 px-4">
        <form action="{{ route('schedule.apoitment') }}" method="POST">
            @csrf
            <div class="bg-blue-800 text-white p-6 rounded-t-3xl shadow-xl flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 bg-white p-2 rounded-lg">
                        <img src="{{asset('image/oasis-logo.png')}}" alt="Logo" style="width: 80px; object-fit: contain;">
                    </div>
                </div>
                <div class="flex items-center gap-6 text-sm">
                    <div class="text-center">
                        <p class="text-blue-300 uppercase text-xs">Platform</p>
                        <p class="font-bold">Zoom meeting</p>
                    </div>
                    <div class="h-8 w-[1px] bg-blue-400"></div>
                    <div class="flex flex-col items-center space-y-1">
                        <span class="text-blue-400 uppercase text-[10px] font-semibold tracking-wider">Select Date</span>
                        <div class="relative">
                            <input type="text" id="date-picker" placeholder="Choose Date" readonly class="bg-blue-900/50 border-b-2 border-yellow-400 text-white font-bold py-1 px-3 focus:outline-none cursor-pointer rounded-t-md w-32 text-center">
                            <i class="fas fa-calendar-day absolute right-2 top-2 text-yellow-400 pointer-events-none text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 shadow-2xl border-x border-b border-gray-200">
                <h2 class="text-lg font-bold text-gray-700 mb-6 flex items-center gap-2">
                    <i class="fas fa-clock text-blue-600"></i> Available Time Slots (20 minutes)
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="result-display">
                    <div class="col-span-full text-center py-12 px-4 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
                        <i class="fas fa-calendar-check text-blue-200 text-4xl mb-3"></i>
                        <p class="text-gray-500 font-medium">Please pick a date from the calendar</p>
                    </div>
                </div>
                @if(session('error'))
                    <div x-data="{ show: true }" x-show="show" class="flex items-start p-4 mb-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg shadow-sm">
                        <div class="flex-shrink-0">
                            <i class="fas fa-circle-exclamation text-red-500 mt-0.5"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-bold text-red-800">Registration Error</p>
                            <p class="text-xs text-red-700 mt-1">{{ session('error') }}</p>
                        </div>
                        <button @click="show = false" class="ml-auto text-red-400 hover:text-red-600">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="p-4 mb-4 bg-orange-50 border-l-4 border-orange-500 rounded-r-lg shadow-sm">
                        <div class="flex">
                            <i class="fas fa-triangle-exclamation text-orange-500 mr-3 mt-1"></i>
                            <ul class="list-disc list-inside text-xs text-orange-800">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                
                @if(session('success'))
                    <div x-data="{ show: true }" 
                        x-init="setTimeout(() => show = false, 5000)"
                        x-show="show" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="flex items-center p-4 mb-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-lg shadow-sm ring-1 ring-emerald-100">
                        
                        <div class="flex-shrink-0">
                            <div class="bg-emerald-100 rounded-full p-1">
                                <i class="fas fa-check-circle text-emerald-600 text-lg"></i>
                            </div>
                        </div>

                        <div class="ml-4">
                            <p class="text-sm font-bold text-emerald-900">Registration Complete!</p>
                            <p class="text-xs text-emerald-700 mt-0.5">{{ session('success') }}</p>
                        </div>

                        <button @click="show = false" class="ml-auto text-emerald-400 hover:text-emerald-600 transition-colors">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif
            </div>
            <div class="bg-gray-50 p-6 rounded-b-3xl border-x border-b border-gray-200 flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-4">
                    <!-- <div class="text-3xl font-mono text-gray-300 border-r pr-4 italic">Ticket</div> -->
                <div class="max-w-md">
                    <label for="email" class="block text-xs text-gray-400 uppercase font-bold tracking-widest mb-2 ml-1">
                        Register Schedule
                    </label>

                    <div class="relative flex items-center">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>

                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            placeholder="Enter your email" 
                            class="block w-full pl-10 pr-32 py-3 border border-gray-200 rounded-xl leading-5 bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out sm:text-sm"
                        >

                        <button type="submit" class="absolute right-2 bg-gray-900 hover:bg-black text-white px-4 py-1.5 rounded-lg text-sm font-semibold transition-colors">
                           Confirm 
                        </button>
                    </div>
                    
                    <p class="mt-2 text-xs text-gray-500">We'll send the schedule details to this address.</p>
                </div>
                </div>
                <div class="flex items-center gap-6">
                    <div class="text-right">
                        <p class="text-xs text-gray-400 uppercase font-bold tracking-widest">Pay After mock </p>
                        <p class="text-3xl font-black text-blue-800">25.00</p>
                    </div>
                    <!-- <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-black px-10 py-4 rounded-xl shadow-lg shadow-yellow-200 transition-all active:scale-95 uppercase tracking-tighter">
                        Confirm & Book Seat
                    </button> -->
                </div>
            </div>
        </form>

        <div class="mt-8 flex justify-center gap-8 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
            <div class="flex items-center gap-2"><span class="w-4 h-4 bg-white border border-gray-200 rounded"></span> Available</div>
            <div class="flex items-center gap-2"><span class="w-4 h-4 bg-gray-100 rounded"></span> Booked</div>
            <div class="flex items-center gap-2"><span class="w-4 h-4 bg-blue-600 rounded"></span> Selected</div>
        </div>
    </div>

    <script>
        const resultDisplay = document.getElementById('result-display');
       const availableDates = [
                @if($shcedules) 
                    @foreach($shcedules as $shcedule) 
                        // Use ->format() because $shcedule->date is now a Carbon object
                        "{{ $shcedule->date->format('Y-m-d') }}",
                    @endforeach
                @endif
            ];

            const dateMap = {
                @if($shcedules) 
                    @foreach($shcedules as $shcedule) 
                        // Use ->format() here as well
                        "{{ $shcedule->date->format('Y-m-d') }}":"{{ $shcedule->id }}",
                    @endforeach
                @endif
            };

        flatpickr("#date-picker", {
            dateFormat: "Y-m-d",
            minDate: "today",
            enable: availableDates,
            onChange: function(selectedDates, dateStr) {
                const scheduleId = dateMap[dateStr];
                fetchSlots(scheduleId);
            }
        });

        async function fetchSlots(id) {
            resultDisplay.innerHTML = `
                <div class="col-span-full flex flex-col justify-center items-center py-12 space-y-3">
                    <div class="flex space-x-2 animate-pulse">
                        <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-blue-400 rounded-full"></div>
                        <div class="w-3 h-3 bg-blue-300 rounded-full"></div>
                    </div>
                    <span class="text-blue-600 font-bold tracking-wide text-sm">Finding slots...</span>
                </div>`;

            try {
                const response = await fetch(`/schedule/slots/${id}`);
                const data = await response.json();
                console.log(data);
                
                renderResults(data);
            } catch (error) {
                resultDisplay.innerHTML = `<p class="col-span-full text-center text-red-500">Error loading data.</p>`;
            }
        }

function renderResults(response) {
    // 1. Correctly extract the array
    // Laravel returns the array inside 'data' if you used response()->json(['data' => $allSlots])
    let slots = [];
    
    if (response.data && Array.isArray(response.data)) {
        slots = response.data;
    } else if (Array.isArray(response)) {
        slots = response;
    }

    // 2. Clear previous content
    resultDisplay.innerHTML = '';

    // 3. Handle Empty State
    if (slots.length === 0) {
        resultDisplay.innerHTML = `
            <div class="col-span-full text-center py-12 px-4 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
                <i class="fas fa-calendar-times text-gray-300 text-4xl mb-3"></i>
                <p class="text-gray-500 font-medium">No slots found for this date.</p>
            </div>`;
        return;
    }

    // 4. Map through the multiple slots
    const html = slots.map(item => {
        if (item.is_available == 1) {
            return `
                <label class="cursor-pointer group">
                    <input type="radio" name="selected_slot" value="${item.id}" class="hidden peer" required>
                    <div class="border-2 border-gray-100 p-4 rounded-xl text-center transition-all bg-white 
                                peer-checked:border-blue-600 peer-checked:bg-blue-50 peer-checked:ring-2 peer-checked:ring-blue-100 
                                hover:border-blue-300 shadow-sm">
                        <span class="block text-xl font-black text-blue-900">${item.schedule}</span>
                        <span class="text-[10px] text-green-600 font-bold uppercase tracking-wider">
                            <i class="fas fa-check-circle mr-1"></i>Available
                        </span>
                    </div>
                </label>`;
        } else {
            return `
                <div class="border-2 border-gray-100 p-4 rounded-xl text-center bg-gray-50 opacity-60 cursor-not-allowed shadow-inner">
                    <span class="block text-xl font-black text-gray-400">${item.schedule}</span>
                    <span class="text-[10px] text-red-400 font-bold uppercase tracking-wider">
                        <i class="fas fa-times-circle mr-1"></i>Booked
                    </span>
                </div>`;
        }
    }).join('');

    resultDisplay.innerHTML = html;
}
    </script>
</body>
</html>