<div class="px-4 sm:px-6 lg:px-8 pb-16">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $headerTitle ?? 'Browse Items' }}</h2>
            <p class="text-gray-600 dark:text-gray-400">{{ $headerDescription ?? 'Select an item to explore detailed information and requirements' }}</p>
        </div>

        <!-- Enhanced Grid with better spacing -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($items as $index => $item)
                <div class="card-wrapper" style="animation: fadeInUp 0.5s ease-out {{ $index * 0.04 }}s backwards;">
                    @if($itemComponent)
                        <x-dynamic-component
                            :component="$itemComponent"
                            :item="$item"
                            :route_name="$routeName ?? ''"
                            :route_param="$item->$routeParam ?? ''"
                            :title="$item->$titleField ?? ''"
                            :title_ar="$item->$titleArField ?? ''" />
                    @else
                        {{ $slot }}
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Smoother card hover effects */
    .card-wrapper {
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-wrapper:hover {
        transform: translateY(-8px);
    }

    /* Add subtle scale on hover */
    @media (hover: hover) {
        .card-wrapper:hover {
            animation: none;
        }
    }
</style>