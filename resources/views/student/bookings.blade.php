@extends('student.layouts.app')

@section('content')
    <h2 class="text-xl font-black text-slate-800 mb-6">Test History</h2>
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
                @foreach ($appointments as $appointment)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-gray-700">
                            {{ $appointment['full_schedule'] }}
                        </td>

                        <td class="px-6 py-4">
                            <span
                                class="px-3 py-1 rounded-full text-[10px] font-bold 
                    {{ $appointment['is_completed'] ? 'bg-blue-100 text-blue-600' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ $appointment['status_label'] }}
                            </span>
                        </td>

                        {{-- Score Cell --}}
                        <td class="px-6 py-4">
                            @if ($appointment['score'] === 'Locked')
                                <span class="text-gray-400 flex items-center gap-1 text-xs">
                                    <i class="fas fa-lock text-[10px]"></i> Pay to view
                                </span>
                            @else
                                <span class="font-black text-blue-800 text-lg">
                                    {{ $appointment['score'] }}
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                @if ($appointment['is_paid'] && $appointment['is_completed'])
                                    {{-- Show Report only if paid --}}
                                    <a href="#" class="text-blue-600 font-bold hover:underline text-sm">View
                                        Report</a>
                                @elseif(!$appointment['is_paid'])
                                    {{-- Show Pay Now button if not paid --}}
                                    <a href=""
                                        class="bg-gray-900 text-white px-3 py-1 rounded-lg text-[10px] font-bold uppercase hover:bg-black transition">
                                        <i class="fas fa-credit-card mr-1"></i> Pay Now
                                    </a>
                                @else
                                    <span class="text-gray-400 text-xs italic">Awaiting Result...</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
