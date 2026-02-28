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
    <div class="lg:hidden bg-blue-900 text-white p-4 flex justify-between items-center shadow-md">
        <a href="{{ route('home') }}">
            <img src="{{ asset('image/oasis-logo.png') }}" class="w-12 bg-white p-1 rounded-md">
        </a>
        <button id="mobile-menu-button" class="text-2xl focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="flex min-h-screen relative">
        <aside id="sidebar"
            class="w-64 bg-blue-900 text-white p-6 absolute inset-y-0 left-0 transform -translate-x-full transition duration-200 ease-in-out z-50 lg:relative lg:translate-x-0 lg:flex flex-col justify-between shadow-2xl lg:shadow-none">
            <div>
                <div class="flex justify-between items-center mb-10">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('image/oasis-logo.png') }}" class="w-20 bg-white p-2 rounded-lg">
                    </a>
                    <button id="close-sidebar" class="lg:hidden text-2xl text-blue-300">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <nav class="space-y-4">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 {{ request()->routeIs('dashboard') ? 'bg-blue-800' : '' }} hover:bg-blue-800  p-3 rounded-xl text-sm font-bold shadow-inner">
                        <i class="fas fa-th-large w-5"></i> Overview
                    </a>
                    <a href="{{ route('my.bookings') }}"
                        class="flex items-center gap-3 {{ request()->routeIs('my.bookings') ? 'bg-blue-800' : '' }} text-blue-300 p-3 hover:bg-blue-800 rounded-xl transition text-sm">
                        <i class="fas fa-calendar-check w-5"></i> My Bookings
                    </a>
                    <a href="{{ route('profile') }}"
                        class="flex items-center gap-3 {{ request()->routeIs('profile') ? 'bg-blue-800' : '' }} text-blue-300 p-3 hover:bg-blue-800 rounded-xl transition text-sm">
                        <i class="fas fa-user-circle w-5"></i> Profile
                    </a>
                </nav>
            </div>

            <div class="border-t border-blue-800 pt-4">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="flex items-center gap-3 text-red-400 p-3 hover:bg-red-500/10 rounded-xl transition text-sm font-bold">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </aside>

        <div id="overlay" class="fixed inset-0 bg-black opacity-50 z-40 hidden lg:hidden"></div>

        <main class="flex-1 p-4 md:p-8 w-full overflow-x-hidden">
            @if (!Auth::user()->password_set)
                <div
                    class="mb-6 bg-yellow-400 p-4 rounded-2xl flex flex-col md:flex-row items-center justify-between gap-4 shadow-lg shadow-yellow-100 border border-yellow-500">
                    <div class="flex items-center gap-3 text-center md:text-left">
                        <i class="fas fa-shield-alt text-yellow-900 text-xl shrink-0"></i>
                        <p class="text-sm font-bold text-yellow-900 leading-tight">Your account is not secure! Set a
                            password to protect your data.</p>
                    </div>
                    <a href=""
                        class="bg-yellow-900 text-white px-6 py-2 rounded-xl text-xs font-black uppercase shadow-md hover:bg-black transition whitespace-nowrap">Secure
                        Now</a>
                </div>
            @endif

            <header class="flex justify-between items-center mb-10">
                <h1 class="text-xl md:text-2xl font-black text-slate-800">{!! request()->routeIs('dashboard')
                    ? 'Dashboard'
                    : (request()->routeIs('my.bookings')
                        ? 'My Bookings'
                        : 'Profile') !!}</h1>
                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-slate-800 leading-none">{{ Auth::user()->name }}</p>
                        <p class="text-[9px] font-bold text-gray-500 italic uppercase">Band 8.0 Target</p>
                    </div>
                    <div
                        class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-800 font-bold border-2 border-blue-200">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                </div>
            </header>

            @yield('content')

        </main>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        const btn = document.getElementById('mobile-menu-button');
        const closeBtn = document.getElementById('close-sidebar');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        function toggleMenu() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        btn.addEventListener('click', toggleMenu);
        closeBtn.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);
    </script>
</body>



</html>
