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

            <h2 class="text-xl font-black text-slate-800 mb-6">My Test History</h2>
<div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400">Date & Time</th>
                <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400">Status</th>
                <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400">Score</th>
                <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50 text-sm">
            <tr>
                <td class="px-6 py-4 font-bold text-gray-700">20 Feb, 2026 | 02:00 PM</td>
                <td class="px-6 py-4"><span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-[10px] font-bold">Completed</span></td>
                <td class="px-6 py-4 font-black text-blue-800">7.5</td>
                <td class="px-6 py-4"><a href="#" class="text-blue-600 font-bold hover:underline">View Report</a></td>
            </tr>
        </tbody>
    </table>
</div>
        </main>
    </div>
</body>



</html>