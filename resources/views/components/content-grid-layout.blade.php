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
        <x-page-header
            :title="$headerTitle"
            subtitle="">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 150" fill="currentColor" class="w-10 h-10 text-white">
                    <path fill-rule="evenodd" d="M12 5h76v10L74 28v6h-7v82h7v6l14 13v10H12v-10l14-13v-6h7V34h-7v-6L12 15z M39 36h4v78h-4z M57 36h4v78h-4z"/>
                </svg>
            </x-slot:icon>
           
        </x-page-header>

            {{-- <div class="mb-12 section-header relative border border-brand-400/30 rounded-2xl bg-gradient-to-br from-brand-50/50 to-white dark:from-brand-950/30 dark:to-gray-900/50 p-8 lg:p-10 backdrop-blur-sm overflow-hidden" @if($showAnimation) style="animation: headerSlideIn 0.6s ease-out backwards;" @endif>
                <!-- Decorative corner accents -->
                <div class="absolute top-0 left-0 w-20 h-20 border-t-2 border-l-2 border-brand-400/40 rounded-tl-2xl"></div>
                <div class="absolute top-0 right-0 w-20 h-20 border-t-2 border-r-2 border-brand-400/40 rounded-tr-2xl"></div>
                <div class="absolute bottom-0 left-0 w-20 h-20 border-b-2 border-l-2 border-brand-400/40 rounded-bl-2xl"></div>
                <div class="absolute bottom-0 right-0 w-20 h-20 border-b-2 border-r-2 border-brand-400/40 rounded-br-2xl"></div>

                <!-- Subtle background decorations -->
                <div class="absolute -top-20 -left-20 w-40 h-40 bg-brand-500/5 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-20 -right-32 w-48 h-48 bg-brand-400/5 rounded-full blur-3xl"></div>

                <!-- Top gradient line -->
                <div class="absolute top-0 left-12 right-12 h-0.5 bg-gradient-to-r from-transparent via-brand-400 to-transparent opacity-50"></div>
                <!-- Bottom gradient line -->
                <div class="absolute bottom-0 left-12 right-12 h-0.5 bg-gradient-to-r from-transparent via-brand-400 to-transparent opacity-50"></div>

                <div class="relative z-10">
                    <div class="flex items-start gap-6">
                        <!-- Left accent line -->
                        <div class="hidden sm:block w-1 h-20 bg-gradient-to-b from-brand-400 to-brand-600 rounded-full mt-1 flex-shrink-0"></div>

                        <div class="flex-1">
                            <h2 class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-brand-900 via-brand-700 to-brand-800 dark:from-brand-400 dark:via-brand-300 dark:to-brand-400 bg-clip-text text-transparent pb-2 tracking-tight leading-tight">
                                {{ $headerTitle }}
                            </h2>
                            <!-- Animated underline accent -->
                            <div class="h-1.5 bg-gradient-to-r from-brand-400 via-brand-500 to-transparent rounded-full w-0 mt-3" style="animation: expandWidth 0.8s ease-out 0.3s forwards;"></div>

                            @if($headerDescription)
                                <p class="text-base lg:text-lg text-brand-700/80 dark:text-brand-300/90 mt-6 max-w-2xl leading-relaxed font-light tracking-wide" style="animation: descriptionFade 0.6s ease-out 0.2s backwards;">
                                    {{ $headerDescription }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div> --}}
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

        /* Header entrance animation */
        @keyframes headerSlideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Description fade-in with slight delay */
        @keyframes descriptionFade {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animated underline expansion */
        @keyframes expandWidth {
            from {
                width: 0%;
                left: 0;
            }
            to {
                width: 100%;
                left: 0;
            }
        }

        /* Gradient animation for underline */
        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .section-header h2 {
            letter-spacing: -0.02em;
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