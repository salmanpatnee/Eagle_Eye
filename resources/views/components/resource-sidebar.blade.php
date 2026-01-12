@props([
    'title' => 'Resources',
    'description' => 'Access helpful materials and tools',
    'showAnimation' => true
])

<div class="space-y-4 {{ $showAnimation ? 'animate-slideInRight' : '' }}">
    <div class="mb-4">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $title }}</h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $description }}</p>
    </div>

    {{ $slot }}
</div>

@if($showAnimation)
    @once
        @push('styles')
            <style>
                @keyframes slideInRight {
                    from {
                        opacity: 0;
                        transform: translateX(30px);
                    }
                    to {
                        opacity: 1;
                        transform: translateX(0);
                    }
                }

                .animate-slideInRight {
                    animation: slideInRight 0.6s ease-out 0.2s backwards;
                }
            </style>
        @endpush
    @endonce
@endif
