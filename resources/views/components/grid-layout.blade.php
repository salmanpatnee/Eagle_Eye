@props([
    'items' => [],
    'itemComponent' => null,
    'routeName' => null,
    'routeParam' => 'id',
    'routeNameField' => null,
    'titleField' => 'title',
    'titleArField' => 'title_ar',
    'headerTitle' => '',
    'headerDescription' => '',
    'showHeader' => true,
    'columns' => 'grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3',
    'gap' => 'gap-6',
    'animationDelay' => 0.04,
    'showAnimation' => true,
    'wrapperClass' => 'card-wrapper'
])

<div class="px-4 sm:px-6 lg:px-8 pb-16">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        @if($showHeader && ($headerTitle || $headerDescription))
            <div class="mb-8">
                @if($headerTitle)
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $headerTitle }}</h2>
                @endif
                @if($headerDescription)
                    <p class="text-gray-600 dark:text-gray-400">{{ $headerDescription }}</p>
                @endif
            </div>
        @endif

        <!-- Enhanced Grid with better spacing -->
        <div class="grid {{ $columns }} {{ $gap }}">
            @foreach ($items as $index => $item)
                <div class="{{ $wrapperClass }}" @if($showAnimation) style="animation: fadeInUp 0.5s ease-out {{ (int)$index * $animationDelay }}s backwards;" @endif>
                    @if($itemComponent)
                        @php
                            $itemRouteName = $routeNameField ? (data_get($item, $routeNameField, '')) : ($routeName ?? '');
                        @endphp
                        <x-dynamic-component
                            :component="$itemComponent"
                            :item="$item"
                            :route_name="$itemRouteName"
                            :route_param="$routeParam ? (data_get($item, $routeParam, '')) : ''"
                            :title="$titleField ? (data_get($item, $titleField, '')) : ''"
                            :title_ar="$titleArField ? (data_get($item, $titleArField, '')) : ''" />
                    @else
                        {{ $slot }}
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

@if($showAnimation)
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
        .{{ $wrapperClass }} {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .{{ $wrapperClass }}:hover {
            transform: translateY(-8px);
        }

        /* Add subtle scale on hover */
        @media (hover: hover) {
            .{{ $wrapperClass }}:hover {
                animation: none;
            }
        }
    </style>
@endif