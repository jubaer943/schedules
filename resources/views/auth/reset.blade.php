<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IELTS Success - Mock Test Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">
    <x-alert type="info" />
    <div class="max-w-md w-full">
        <div class="text-center mb-8">

            <h2 class="text-2xl font-black text-slate-800 italic">Reset Password</h2>
            <p class="text-gray-400 text-[10px] uppercase font-bold tracking-widest mt-1">Welcome back to Oasis Mock
                Center</p>
        </div>
        @if ($errors->any())
            <div class="mb-4 p-4 rounded-2xl bg-red-100 text-red-700 font-bold text-center text-sm">
                {{ $errors->first() }}
            </div>
        @endif
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
            <form action="{{ route('password.update') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">
                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-1 tracking-widest">New
                        Password</label>
                    <div class="relative mt-2">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="fas fa-lock text-xs"></i>
                        </span>
                        <input type="password" name="password" required
                            class="w-full pl-11 pr-4 py-4 rounded-2xl bg-gray-50 border border-transparent focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition-all font-bold"
                            placeholder="••••••">
                    </div>
                </div>
                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-1 tracking-widest">Confirm New
                        Password</label>
                    <div class="relative mt-2">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="fas fa-lock text-xs"></i>
                        </span>
                        <input type="password" name="password_confirmation" required
                            class="w-full pl-11 pr-4 py-4 rounded-2xl bg-gray-50 border border-transparent focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition-all font-bold"
                            placeholder="••••••">
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-blue-800 hover:bg-black text-white font-bold py-4 rounded-2xl shadow-xl shadow-blue-100 transition transform active:scale-95 flex items-center justify-center gap-3">
                    Update Password <i class="fas fa-check-circle text-xs"></i>
                </button>
            </form>
        </div>

        <p class="mt-10 text-center text-[9px] text-gray-400 font-bold uppercase tracking-[0.3em]">
            Oasis Informatics • Secure Authentication
        </p>
    </div>
</body>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</html>
