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
    <x-alert type="error" />
    <div class="max-w-md w-full">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
            <div class="bg-blue-800 p-8 text-center">
                <img src="{{ asset('image/oasis-logo.png') }}" class="w-24 mx-auto mb-4 bg-white p-2 rounded-xl">
                <h2 class="text-2xl font-black text-white italic">Welcome Back!</h2>
                <p class="text-blue-200 text-xs uppercase tracking-widest mt-2">Login to access your mock dashboard</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase ml-1">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full mt-2 px-4 py-3 rounded-xl border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-200' }} focus:ring-2 focus:ring-blue-500 outline-none transition"
                        placeholder="name@example.com">
                    @error('email')
                        <p class="text-red-500 text-[10px] mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase ml-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full mt-2 px-4 py-3 rounded-xl border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-200' }} focus:ring-2 focus:ring-blue-500 outline-none transition"
                        placeholder="••••••••">
                </div>

                <div class="flex justify-between items-center text-xs">
                    <label class="flex items-center text-gray-500 cursor-pointer">
                        <input type="checkbox" name="remember" class="mr-2 rounded border-gray-300"> Remember me
                    </label>
                    <a href="{{ route('lock') }}" class="text-blue-600 font-bold hover:underline">Forgot Password?</a>
                </div>

                <button type="submit"
                    class="w-full bg-blue-800 hover:bg-blue-900 text-white font-bold py-4 rounded-xl shadow-lg transition transform active:scale-95">
                    Sign In <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </button>
            </form>
        </div>
    </div>
</body>


<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</html>
