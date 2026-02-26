@extends('student.layouts.app')

@section('content')
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
                    <td class="px-6 py-4"><span
                            class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-[10px] font-bold">Completed</span>
                    </td>
                    <td class="px-6 py-4 font-black text-blue-800">7.5</td>
                    <td class="px-6 py-4"><a href="#" class="text-blue-600 font-bold hover:underline">View Report</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
