<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light only">
    <title>Euro CISO Resources - Strategic Cybersecurity Intelligence</title>
    <link rel="icon" href="{{ asset('Images/favicon.ico') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="css/landing.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="fixed top-0 right-0 left-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between md:px-0 px-3 py-3">
                <div class="flex items-center">
                    <a href="/" class="flex-shrink-0 logo-text text-2xl font-bold text-gray-900">
                        <img src="/Images/EuroCISOLogo.png" alt="Euro CISO Logo" class="h-16 w-auto"/>
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('vciso') }}" class="btn-primary">
                        Access Platform
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section pt-32 pb-10 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Hero Content -->
                <div class="text-center lg:text-left">
                    @if ($landingPageContent?->hero_title)
                        <h1 class="hero-title mb-6">
                            {!! $landingPageContent->hero_title !!}
                        </h1>
                    @endif
                    <div class="mb-8">
                        @if ($landingPageContent?->hero_list_items)
                            {!! $landingPageContent->hero_list_items !!}
                        @endif
                    </div>
                </div>

                <!-- Hero Image -->
                <div class="flex justify-center lg:justify-end">
                    <div class="hero-image-wrapper w-full max-w-lg">
                        <div class="hero-image">
                            @if ($landingPageContent?->hero_image_path)
                                <img src="{{ asset('storage/' . $landingPageContent->hero_image_path) }}" alt="Cybersecurity Dashboard" class="w-full h-auto object-cover" />
                            @else
                                <img src="https://images.unsplash.com/photo-1579567761406-4684ee0c75b6?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="Cybersecurity Dashboard" class="w-full h-auto object-cover" />
                            @endif
                        </div>
                        <div class="ripple-ring ripple-1"></div>
                        <div class="ripple-ring ripple-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-14 px-6 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="mb-10">
                @if ($landingPageContent?->features_title)
                    <h2 class="section-title mb-12 text-center">
                        {!! $landingPageContent->features_title !!}
                    </h2>
                @endif


                <div class="grid lg:grid-cols-2 gap-12 mt-12 items-center">
                    <!-- Left Column: List Content -->
                    <div>
                        @if ($landingPageContent?->features_list_items)
                            {!! $landingPageContent->features_list_items !!}
                        @endif
                    </div>

                    <!-- Right Column: Professional Image -->
                    <div class="flex justify-center lg:justify-end">
                        <div class="hero-image-wrapper w-full max-w-lg">
                            <div class="hero-image">
                                @if ($landingPageContent?->features_image_path)
                                    <img src="/storage/{{ $landingPageContent->features_image_path }}"
                                        alt="Cybersecurity Dashboard" class="w-full h-auto object-cover" />
                                @else
                                    <img src="https://images.unsplash.com/photo-1579567761406-4684ee0c75b6?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                        alt="Cybersecurity Dashboard" class="w-full h-auto object-cover" />
                                @endif

                            </div>
                            <div class="ripple-ring ripple-1"></div>
                            <div class="ripple-ring ripple-2"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <!-- Program Benefits Section -->
    <section
        class="program-benefits-section py-20 px-6 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                @if ($landingPageContent?->benefits_title)
                    <h2 class="section-title mb-4">
                        {!! $landingPageContent->benefits_title !!}
                    </h2>
                @endif
            </div>

            <!-- Benefits Grid -->
            <div class="grid lg:grid-cols-2 gap-12 items-start max-w-6xl mx-auto">
                <!-- Left Column -->
                <div class="benefit-card">
                    @if ($landingPageContent?->benefits_left_title)
                        <h3 class="benefit-card-title">
                            {!! $landingPageContent->benefits_left_title !!}
                        </h3>
                    @endif

                    @if ($landingPageContent?->benefits_left_items)
                        {!! $landingPageContent->benefits_left_items !!}
                    @endif
                </div>

                <!-- Right Column -->
                <div class="benefit-card">
                    @if ($landingPageContent?->benefits_right_title)
                        <h3 class="benefit-card-title">
                            {!! $landingPageContent->benefits_right_title !!}
                        </h3>
                    @endif
                    @if ($landingPageContent?->benefits_right_items)
                        {!! $landingPageContent->benefits_right_items !!}
                    @endif
                </div>
            </div>
        </div>

        <!-- Decorative Background Element -->
        <div class="absolute top-0 right-0 w-1/2 h-full opacity-30 pointer-events-none">
            <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-blue-200 rounded-full blur-3xl"></div>
        </div>
    </section>

    <!-- Stats/CTA Section -->
    <section class="stats-section py-24 px-6 relative">
        <div class="max-w-5xl mx-auto text-center relative z-10">
            @if ($landingPageContent?->stats_title)
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    {!! $landingPageContent->stats_title !!}
                </h2>
            @endif
            @if ($landingPageContent?->stats_subtitle)
                <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                    {!! $landingPageContent->stats_subtitle !!}
                </p>
                {{-- </h2> --}}
            @endif

            <div class="flex justify-center">
                <a href="{{ route('vciso') }}"  class="btn-secondary group inline-flex items-center gap-3">
                    <span>Access Platform</span>

                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 p-6">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-slate-400 text-sm">
                &copy; 2026 EURO CISO. All rights reserved.
            </p>
        </div>
    </footer>

        <!-- Elfsight AI Chatbot | Untitled AI Chatbot -->
<script src="https://elfsightcdn.com/platform.js" async></script>
<div class="elfsight-app-a3e8273f-df3f-447c-ade7-64c1193be15b" data-elfsight-app-lazy></div>

</body>

</html>
