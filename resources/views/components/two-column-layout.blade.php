@props([
    'mainColumnSize' => 'lg:col-span-3',
    'sidebarColumnSize' => 'lg:col-span-2',
    'gap' => 'gap-6 lg:gap-8',
    'showAnimation' => true
])

<div class="grid grid-cols-1 lg:grid-cols-5 {{ $gap }}">
    <!-- Main Column -->
    <div class="{{ $mainColumnSize }} {{ $showAnimation ? 'animate-slideInLeft' : '' }}">
        {{ $main ?? $slot }}
    </div>

    <!-- Sidebar Column -->
    <div class="{{ $sidebarColumnSize }}">
        {{ $sidebar ?? '' }}
    </div>
</div>

@if($showAnimation)
    @once
        @push('styles')
            <style>
                @keyframes slideInLeft {
                    from {
                        opacity: 0;
                        transform: translateX(-30px);
                    }
                    to {
                        opacity: 1;
                        transform: translateX(0);
                    }
                }

                .animate-slideInLeft {
                    animation: slideInLeft 0.6s ease-out;
                }
            </style>
        @endpush
    @endonce
@endif
