@props([
    'title' => '',
    'subtitle' => 'Comprehensive guide and resources',
    'icon' => null,
    'showAnimation' => true
])

<div class="mb-8 {{ $showAnimation ? 'animate-fadeIn' : '' }}">
    <div class="flex items-start gap-4 mb-6">
        @if($icon)
            <div class="flex-shrink-0">
                <div class="relative w-16 h-16 rounded-2xl bg-gradient-to-br from-brand-600 to-brand-950 flex items-center justify-center shadow-xl shadow-brand-500/20 ring-4 ring-white dark:ring-gray-800">
                    {!! $icon !!}
                    <div class="absolute inset-0 rounded-2xl bg-brand-600 opacity-20 animate-ping"></div>
                </div>
            </div>
        @endif
        <div class="flex-1">
            <h1 class="text-3xl sm:text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-brand-900 to-brand-600 dark:from-white dark:to-gray-300 mb-2">
                {{ $title }}
            </h1>
            @if($subtitle)
                <p class="text-gray-600 dark:text-gray-400 text-sm sm:text-base">
                    {{ $subtitle }}
                </p>
            @endif
        </div>
    </div>
</div>

@if($showAnimation)
    @once
        @push('styles')
            <style>
                @keyframes fadeIn {
                    from {
                        opacity: 0;
                        transform: translateY(-10px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                .animate-fadeIn {
                    animation: fadeIn 0.6s ease-out;
                }
            </style>
        @endpush
    @endonce
@endif
