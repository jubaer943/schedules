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
        </main>
    </div>
</body>



</html>