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
            <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-100 rounded-3xl mb-4 shadow-sm">
                <i class="fas fa-user-shield text-blue-800 text-3xl"></i>
            </div>
            <h2 class="text-2xl font-black text-slate-800 italic">Verify Identity</h2>
            <p class="text-gray-400 text-[10px] uppercase font-bold tracking-widest mt-1">Welcome back to Oasis Mock
                Center</p>
        </div>

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
            <form action="{{ route('unlock') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <div class="bg-blue-50 p-4 rounded-xl border border-blue-100 flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-blue-800 rounded-full flex items-center justify-center text-white font-bold">
                        {{ substr($user->name ?? 'U', 0, 1) }} </div>
                    <div>
                        <p class="text-[10px] text-blue-600 font-bold uppercase tracking-tighter">Existing account
                            detected</p>
                        <p class="text-sm font-bold text-blue-900 leading-tight">
                            @php
                                $email = $user->email ?? 'user@example.com';
                                [$username, $domain] = explode('@', $email);

                                $length = strlen($username);
                                $masked =
                                    $length > 6
                                        ? substr($username, 0, 4) . str_repeat('*', 8) . substr($username, -5)
                                        : substr($username, 0, 1) . '****' . substr($username, -1);

                                $displayEmail = $masked . '@' . $domain;
                            @endphp

                            {{ $displayEmail }}
                        </p>
                    </div>
                </div>


                @error('password')
                    <div class="text-xs text-red-500 font-bold bg-red-50 p-3 rounded-lg border border-red-100 italic">
                        <i class="fas fa-exclamation-circle mr-1"></i> Incorrect password. Please try again.
                    </div>
                @enderror


                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-1 tracking-widest">Enter
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

                <button type="submit"
                    class="w-full bg-blue-800 hover:bg-black text-white font-bold py-4 rounded-2xl shadow-xl shadow-blue-100 transition transform active:scale-95 flex items-center justify-center gap-3">
                    Verify & Book Slot <i class="fas fa-check-circle text-xs"></i>
                </button>

                <div class="flex flex-col gap-4 pt-2">
                    <a href="#"
                        class="text-[10px] font-black text-blue-600 hover:text-blue-800 uppercase tracking-widest transition text-center underline decoration-2 underline-offset-4">
                        Forgot Password?
                    </a>
                    <a href=""
                        class="text-[10px] font-black text-gray-300 hover:text-red-500 uppercase tracking-widest transition text-center">
                        Not you? Use different email <i class="fas fa-sign-out-alt ml-1"></i>
                    </a>
                </div>
            </form>
        </div>

        <p class="mt-10 text-center text-[9px] text-gray-400 font-bold uppercase tracking-[0.3em]">
            Oasis Informatics • Secure Authentication
        </p>
    </div>
</body>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</html>
