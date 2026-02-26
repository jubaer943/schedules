@props(['type' => 'success'])

@php
    // Configuration for different alert types
    $config =
        [
            'success' => [
                'bg' => 'bg-green-600',
                'shadow' => 'shadow-green-100',
                'icon' => '<path d="M5 13l4 4L19 7"></path>',
            ],
            'error' => [
                'bg' => 'bg-red-600',
                'shadow' => 'shadow-red-100',
                'icon' => '<path d="M6 18L18 6M6 6l12 12"></path>',
            ],
            'info' => [
                'bg' => 'bg-blue-600',
                'shadow' => 'shadow-blue-100',
                'icon' => '<path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
            ],
        ][$type] ?? $config['success'];
@endphp

@if (session()->has($type))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        class="fixed top-5 right-5 flex items-center p-4 mb-4 text-white {{ $config['bg'] }} {{ $config['shadow'] }} rounded-2xl shadow-lg z-50 transition-all"
        role="alert">

        <div class="flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                {!! $config['icon'] !!}
            </svg>
            <span class="text-sm font-bold">{{ session($type) }}</span>
        </div>

        <button @click="show = false" class="ml-4 hover:opacity-70 transition-opacity">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
@endif
