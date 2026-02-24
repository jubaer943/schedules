<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IELTS Success - Mock Test Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-blue-900 text-white p-6 hidden lg:flex flex-col justify-between">
            <div>
                <img src="{{asset('image/oasis-logo.png')}}" class="w-20 mb-10 bg-white p-2 rounded-lg">
                <nav class="space-y-4">
                    <a href="#" class="flex items-center gap-3 bg-blue-800 p-3 rounded-xl text-sm font-bold"><i class="fas fa-th-large"></i> Overview</a>
                    <a href="" class="flex items-center gap-3 text-blue-300 p-3 hover:bg-blue-800 rounded-xl transition text-sm"><i class="fas fa-calendar-check"></i> My Bookings</a>
                    <a href="" class="flex items-center gap-3 text-blue-300 p-3 hover:bg-blue-800 rounded-xl transition text-sm"><i class="fas fa-user-circle"></i> Profile</a>
                </nav>
            </div>
            
            <div class="border-t border-blue-800 pt-4">
                <a href="#" class="flex items-center gap-3 text-red-400 p-3 hover:bg-red-500/10 rounded-xl transition text-sm font-bold">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </aside>

        <main class="flex-1 p-8">
            <!-- @if(!auth()->user()->password_set) -->
            <div class="mb-6 bg-yellow-400 p-4 rounded-2xl flex items-center justify-between shadow-lg shadow-yellow-100 border border-yellow-500">
                <div class="flex items-center gap-3">
                    <i class="fas fa-shield-alt text-yellow-900 text-xl"></i>
                    <p class="text-sm font-bold text-yellow-900">Your account is not secure! Set a password to protect your data.</p>
                </div>
                <a href="" class="bg-yellow-900 text-white px-4 py-2 rounded-lg text-xs font-black uppercase shadow-md">Secure Now</a>
            </div>
            <!-- @endif -->

            <header class="flex justify-between items-center mb-10">
                <h1 class="text-2xl font-black text-slate-800">Student Dashboard</h1>
                <div class="flex items-center gap-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-slate-800">Hridoy</p>
                        <p class="text-[10px] font-bold text-gray-500 italic uppercase">Band 8.0 Target</p>
                    </div>
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-800 font-bold border-2 border-blue-200">JD</div>
                </div>
            </header>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="md:col-span-2 bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest">Upcoming Test</span>
                            <h3 class="text-xl font-bold mt-2">Speaking Mock Test Session</h3>
                        </div>
                        <i class="fas fa-video text-blue-100 text-4xl"></i>
                    </div>
                    
                    <div class="flex flex-wrap gap-6 mb-8 text-sm">
                        <div class="flex items-center gap-2 font-bold text-gray-600 bg-gray-50 px-4 py-2 rounded-lg"><i class="fas fa-calendar text-blue-600"></i> 24 Feb, 2026</div>
                        <div class="flex items-center gap-2 font-bold text-gray-600 bg-gray-50 px-4 py-2 rounded-lg"><i class="fas fa-clock text-blue-600"></i> 10:30 AM</div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <a href="#" class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-2xl font-bold shadow-lg shadow-blue-100 transition">
                            <i class="fas fa-play-circle text-sm"></i> Join Zoom
                        </a>
                        <a href="#" class="flex items-center justify-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white p-4 rounded-2xl font-bold shadow-lg shadow-emerald-100 transition">
                            <i class="fas fa-poll-h text-sm"></i> Result
                        </a>
                        <a href="#" class="flex items-center justify-center gap-2 bg-gray-900 hover:bg-black text-white p-4 rounded-2xl font-bold shadow-lg shadow-gray-200 transition">
                            <i class="fas fa-credit-card text-sm"></i> Pay Now
                        </a>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-blue-800 p-8 rounded-3xl shadow-xl text-white relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-white/10 rounded-full"></div>
                        <p class="text-blue-300 text-xs font-bold uppercase tracking-widest">Available Slots</p>
                        <h4 class="text-4xl font-black mt-2">01</h4>
                        <div class="mt-8 pt-6 border-t border-blue-700">
                            <a href="{{ route('schedule') }}" class="inline-block bg-yellow-400 text-blue-900 px-6 py-2 rounded-xl text-xs font-black uppercase hover:bg-yellow-500 transition">Book Slot</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>



</html>