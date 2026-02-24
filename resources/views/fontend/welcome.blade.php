<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IELTS Success - Mock Test Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-white font-sans text-gray-900">

    <nav class="flex justify-between items-center px-6 py-4 max-w-7xl mx-auto">
        <div class="flex items-center gap-2">
            <img src="{{ asset('image/oasis-logo.png') }}" alt="" srcset="" style="width: 100px;object-fit: contain;">
        </div>
        <!-- <div class="hidden md:flex gap-8 font-medium text-gray-600">
            <a href="#" class="hover:text-blue-600">Features</a>
            <a href="#" class="hover:text-blue-600">Test Types</a>
            <a href="#" class="hover:text-blue-600">Pricing</a>
        </div> -->
        <a href="{{ route('schedule')}}" class="bg-blue-700 text-white px-6 py-2 rounded-full font-bold hover:bg-blue-800 transition">Book Now</a>
    </nav>

    <section class="relative bg-slate-50 py-20 px-6 overflow-hidden">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="bg-blue-100 text-blue-700 px-4 py-1 rounded-full text-sm font-bold uppercase tracking-widest">Target Band 8.0+</span>
                <!-- md:text-6xl -->
                <h1 class="text-5xl  font-black text-slate-900 mt-6 leading-tight">
                    আপনার <span class="text-red-600  ">IELTS</span> স্বপ্ন পূরণ হোক <span class="text-blue-600">সঠিক প্র্যাকটিসে।</span>
                </h1>
                <p class="text-lg text-gray-600 mt-6 leading-relaxed">
                    আমাদের ২০ মিনিটের স্পেশালাইজড স্পিকিং মক টেস্টের মাধ্যমে আপনার ভুলগুলো শুধরে নিন। অভিজ্ঞ ট্রেইনারদের ফিডব্যাক আর রিয়েল এক্সাম এনভায়রনমেন্টে নিজেকে যাচাই করুন।
                </p>
                <div class="flex gap-4 mt-10">
                    <a href="{{ route('schedule')}}" class="bg-blue-700 text-white px-8 py-4 rounded-xl font-bold text-sm font-medium shadow-lg shadow-blue-200 hover:scale-105 transition transform">বুকিং শুরু করুন</a>
                    <a href="#" class="flex items-center gap-2 text-blue-700 font-bold px-6">
                        <i class="fas fa-play-circle text-2xl"></i> হাউ ইট ওয়ার্কস
                    </a>
                </div>
                <div class="mt-8 flex items-center gap-4">
                    <div class="flex -space-x-3">
                        <img class="w-10 h-10 rounded-full border-4 border-white" src="https://i.pravatar.cc/100?u=1" alt="">
                        <img class="w-10 h-10 rounded-full border-4 border-white" src="https://i.pravatar.cc/100?u=2" alt="">
                        <img class="w-10 h-10 rounded-full border-4 border-white" src="https://i.pravatar.cc/100?u=3" alt="">
                    </div>
                    <p class="text-sm text-gray-500 font-medium">৫০০+ স্টুডেন্ট ইতিমধ্যে তাদের স্লট বুক করেছে</p>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -top-10 -left-10 w-64 h-64 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
                <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse delay-700"></div>
                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&q=80&w=800" alt="IELTS Student" class="relative rounded-3xl shadow-2xl border-8 border-white">
            </div>
        </div>
    </section>

    <section class="py-20 max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-slate-900">কেন আমাদের মক টেস্ট আলাদা?</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto mt-4"></div>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="p-8 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl transition group">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition">
                    <i class="fas fa-clock text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">২০ মিনিট ফোকাসড স্লট</h3>
                <p class="text-gray-600">অল্প সময়ে ইন্টারভিউ দিয়ে দ্রুত ফিডব্যাক পাওয়ার জন্য এটি সেরা উপায়।</p>
            </div>
            <div class="p-8 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl transition group">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition">
                    <i class="fas fa-chart-line text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">বিস্তারিত স্কোর রিপোর্ট</h3>
                <p class="text-gray-600">Fluency, Lexical Resource এবং Grammar-এর ওপর ভিত্তি করে আলাদা ব্যান্ড স্কোর।</p>
            </div>
            <div class="p-8 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl transition group">
                <div class="w-14 h-14 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-orange-600 group-hover:text-white transition">
                    <i class="fas fa-video text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">রেকর্ডেড সেশন</h3>
                <p class="text-gray-600">আপনার টেস্টের ভিডিও/অডিও রেকর্ড পাবেন যা পরবর্তীতে নিজের ভুলগুলো বুঝতে সাহায্য করবে।</p>
            </div>
        </div>
    </section>

    <section id="booking" class="bg-blue-900 py-16 px-6 mx-6 rounded-3xl mb-20">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-4xl font-black mb-6 italic">Ready to take the first step towards Band 8.0?</h2>
            <p class="text-blue-200 text-lg mb-10 leading-relaxed uppercase tracking-widest">আপনার জন্য উপযোগী সময়টি বুক করতে নিচের বাটনে ক্লিক করুন।</p>
            
            <a href="{{ route('schedule')}" class="bg-yellow-400 text-blue-950 px-10 py-5 rounded-full font-black text-xl hover:bg-yellow-500 transition shadow-2xl">
                স্লট বুকিং পেজে যান <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>

    <footer class="bg-gray-50 py-10 border-t border-gray-200 text-center">
        <p class="text-gray-500 text-sm">© 2025 Oasis Informatics. All rights reserved.</p>
    </footer>

</body>
</html>


<!-- /**
   <label class="cursor-pointer">
                        <input type="radio" name="selected_slot" value="02:00" class="hidden slot-radio" required>
                        <div class="slot-card border-2 border-gray-100 p-4 rounded-xl text-center transition-all hover:border-blue-300 bg-white">
                            <span class="block text-xl font-black text-blue-900">02:00</span>
                            <span class="text-[10px] text-green-600 font-bold uppercase tracking-wider">Available</span>
                        </div>
                    </label>



                    <div class="border-2 border-gray-100 p-4 rounded-xl text-center bg-gray-50 opacity-50 cursor-not-allowed">
                        <span class="block text-xl font-black text-gray-400">02:40</span>
                        <span class="text-[10px] text-red-400 font-bold uppercase tracking-wider">Booked</span>
                    </div>
**/ -->
