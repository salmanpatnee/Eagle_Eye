<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light only">
    <title>UK CISO Resources - Strategic Cybersecurity Intelligence</title>
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
                        <img src="/Images/EuroCISOLogo.png" alt="UK CISO Logo" class="h-16 w-auto" />
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('vciso') }}" class="btn-primary">
                        Access Platform
                    </a>
                    <a href="#" class="BudgetButton btn-secondary" id="headerContactButton">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen pt-24 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden"
        style="background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 25%, #f0f9ff 75%, #faf5ff 100%);">
        <!-- Decorative Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div
                class="absolute top-20 right-20 w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-25 animate-pulse">
            </div>
            <div class="absolute bottom-20 left-20 w-96 h-96 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-25 animate-pulse"
                style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 right-1/4 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"
                style="animation-delay: 4s;"></div>
        </div>

        <!-- Hero Content -->
        <div class="max-w-4xl mx-auto relative z-10">
            <div
                class="flex pt-10 flex-col justify-center items-center text-center space-y-8 min-h-[calc(100vh-120px)]">

                <!-- Headline -->
                @if ($landingPageContent?->hero_title)
                    <div>
                        <h1
                            class="text-5xl sm:text-6xl lg:text-7xl font-bold tracking-tight text-gray-900 leading-tight max-w-3xl mx-auto">
                            {!! $landingPageContent->hero_title !!}
                        </h1>
                        <div class="h-1 w-24 bg-gradient-to-r from-blue-600 to-indigo-600 mt-8 rounded-full mx-auto">
                        </div>
                    </div>
                @endif

                <!-- Description -->
                @if ($landingPageContent?->hero_list_items)
                    <div class="prose prose-sm lg:prose-lg max-w-5xl mx-auto text-gray-700 leading-relaxed text-2xl">
                        {!! $landingPageContent->hero_list_items !!}
                    </div>
                @endif

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-8 justify-center">
                    <a href="{{ route('vciso') }}"
                        class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 active:scale-95">
                        <span>Access Platform</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <a href="#"
                        class="BudgetButton inline-flex items-center justify-center px-8 py-4 border-2 border-gray-300 text-gray-900 font-semibold rounded-lg hover:border-blue-600 hover:text-blue-600 hover:bg-blue-50 transition-all duration-300 transform hover:scale-105 active:scale-95"
                        id="heroContactButton">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Find Certified Professionals Section -->
    <section class="find-professionals-section py-16 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <!-- Text Column -->
                <div class="text-center md:text-left">
                    <h2 class="section-title text-center md:!text-left mb-6 capitalize">
                        Find certified cybersecurity professionals in the <span class="hero-gradient">UK</span>
                    </h2>
                    <p class="text-lg text-gray-700 leading-relaxed mb-8 max-w-xl mx-auto md:mx-0">
                        Connect with vetted, certified CISO-level talent across the UK. Our platform helps HR teams and
                        recruiters source experienced cybersecurity leaders with verified credentials — ready to
                        strengthen your organisation's security posture.
                    </p>
                    <div class="flex justify-center md:justify-start">
                        <a href="{{ route('people.index') }}"
                            class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 active:scale-95">
                            <span>Find Professionals</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="flex justify-center">
                    <img src="{{ asset('Images/hr-professional.jpg') }}"
                        alt="Certified cybersecurity professionals in the UK"
                        class="w-full h-auto rounded-xl shadow-lg object-cover" />
                </div>
            </div>
        </div>
    </section>

    <!-- Core Offerings Section -->
    <section class="core-offerings-section py-10 px-6 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="section-title mb-4">
                    Core <span class="hero-gradient">Offerings</span>
                </h2>

            </div>

            <div class="max-w-7xl mx-auto">
            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4">
                @foreach (range(1, 4) as $i)

                    <a href="{{ $i == 3 ? route('resource-content.index') : 'javascript:void(0)' }}" class="group block bg-white rounded-xl overflow-hidden transition-transform duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{-- use an <img> so the container height matches the picture and we avoid large blank areas --}}
                        <img src="{{ asset('Images/landing-page/C'.$i.'.JPG') }}" alt="Core {{ $i }}" class="w-full h-auto object-contain" />
                    </a>
                @endforeach
            </div>
        </div>


            {{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- ISO 27001 Card -->
                <div class="offering-card group rounded-xl shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 p-8 text-center border border-indigo-200"
                    style="background: linear-gradient(135deg, #f0f4ff 0%, #e0e7ff 50%, #f3e8ff 100%);">
                    <div class="flex justify-center mb-6">
                        <div
                            class="w-16 h-16 bg-white rounded-lg flex items-center justify-center shadow-sm group-hover:shadow-md transition-all duration-300">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3
                        class="font-semibold text-lg text-gray-900 group-hover:text-blue-700 transition-colors duration-300">
                        ISO 27001 Complement Management System</h3>
                </div>

                <!-- NIST Card -->
                <div class="offering-card group rounded-xl shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 p-8 text-center border border-indigo-200"
                    style="background: linear-gradient(135deg, #f0f4ff 0%, #e0e7ff 50%, #f3e8ff 100%);">
                    <div class="flex justify-center mb-6">
                        <div
                            class="w-16 h-16 bg-white rounded-lg flex items-center justify-center shadow-sm group-hover:shadow-md transition-all duration-300">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3
                        class="font-semibold text-lg text-gray-900 group-hover:text-blue-700 transition-colors duration-300">
                        Cybersecurity Strategy</h3>
                </div>

                <!-- DORA Card -->
                <div class="offering-card group rounded-xl shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 p-8 text-center border border-indigo-200"
                    style="background: linear-gradient(135deg, #f0f4ff 0%, #e0e7ff 50%, #f3e8ff 100%);">
                    <div class="flex justify-center mb-6">
                        <div
                            class="w-16 h-16 bg-white rounded-lg flex items-center justify-center shadow-sm group-hover:shadow-md transition-all duration-300">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3
                        class="font-semibold text-lg text-gray-900 group-hover:text-blue-700 transition-colors duration-300">
                        DORA Compliance Management System</h3>
                </div>

                <!-- Risk Assessment Card -->
                <div class="offering-card group rounded-xl shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 p-8 text-center border border-indigo-200"
                    style="background: linear-gradient(135deg, #f0f4ff 0%, #e0e7ff 50%, #f3e8ff 100%);">
                    <div class="flex justify-center mb-6">
                        <div
                            class="w-16 h-16 bg-white rounded-lg flex items-center justify-center shadow-sm group-hover:shadow-md transition-all duration-300">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3
                        class="font-semibold text-lg text-gray-900 group-hover:text-blue-700 transition-colors duration-300">
                        NIS2 Compliance Management System</h3>
                </div>
            </div> --}}
        </div>
    </section>

    <!-- Card Gallery Section -->
    <section class="gallery-section py-10 px-6 bg-white">
        <div class="max-w-7xl mx-auto text-center mb-12">
            @if ($landingPageContent?->gallery_title)
                <h2 class="section-title mb-4">
                    {!! $landingPageContent->gallery_title !!}
                </h2>
            @else
                <h2 class="section-title mb-4">
                    CISO Essential Frameworks: <br><span class="hero-gradient">Are You Missing Any? </span>
                </h2>
            @endif

            @if ($landingPageContent?->gallery_subtitle)
                <p class="mt-2 text-lg text-gray-700 max-w-3xl mx-auto">
                    {!! $landingPageContent->gallery_subtitle !!}
                </p>
            @else
                <p class="mt-2 text-lg text-gray-700 max-w-3xl mx-auto">
                    (Each Framework includes Policies, Procedures, Roles and Responsibilities, and KPIs)
                </p>
            @endif
        </div>

        <div class="max-w-7xl mx-auto">
            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-3">
                @foreach ($frameworks as $framework)
                    <a href="{{ route('ciso-essential-framework-content.show', $framework->id) }}" class="group block bg-white rounded-xl overflow-hidden transition-transform duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <img src="{{ asset('storage/' . $framework->image) }}" alt="{{ $framework->title }}" class="w-full h-auto object-contain" />
                        <span class="sr-only">{{ $framework->title }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Education Resources Section -->
    <section class="education-resources-section py-10 px-6 bg-gradient-to-b from-white to-gray-50">
        @php
            $educationResources = [
                ['title' => 'Applying CISSP Knowledge in UK', 'route' => 'cissp', 'image' => 'CISSPLogo.png'],
                ['title' => 'Applying CISM Knowledge in UK', 'route' => 'cism', 'image' => 'CISMLogo.png'],
                ['title' => 'Applying CGEIT Knowledge in UK', 'route' => 'cgeit', 'image' => 'CGEITLogo.png'],
                ['title' => 'Applying PMP Knowledge in UK', 'route' => 'pmp', 'image' => 'PMPLogo.png'],
                ['title' => 'Applying Agile Approach to Your Department', 'route' => 'agile', 'image' => 'AgileLogo.png'],
            ];
        @endphp

        <div class="max-w-7xl mx-auto text-center mb-12">
            <h2 class="section-title mb-4">
                CISO <span class="hero-gradient">Education &amp; Training</span>
            </h2>
            <p class="mt-2 text-lg text-gray-700 max-w-3xl mx-auto">
                Enhance your knowledge and skills in information security leadership. Access comprehensive educational
                resources, training materials, and best practices for CISO excellence.
            </p>
        </div>

        <div class="max-w-7xl mx-auto">
            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
                @foreach ($educationResources as $item)
                    <a href="{{ route($item['route']) }}"
                        class="offering-card group relative overflow-hidden block rounded-2xl shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 p-8 text-center border border-indigo-100 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gradient-to-br from-indigo-100 via-blue-50 to-purple-100 hover:from-indigo-200 hover:via-blue-100 hover:to-purple-200">
                        <span
                            class="pointer-events-none absolute -top-12 -right-12 w-36 h-36 bg-gradient-to-br from-blue-400/30 to-indigo-500/30 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></span>
                        <span
                            class="pointer-events-none absolute -bottom-12 -left-12 w-32 h-32 bg-gradient-to-tr from-purple-400/20 to-blue-400/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></span>
                        <span
                            class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-blue-600 to-indigo-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        <div class="relative z-10">
                            <div class="flex justify-center mb-6">
                                <div
                                    class="w-40 h-24 bg-white rounded-xl flex items-center justify-center shadow-md group-hover:shadow-lg ring-1 ring-indigo-100 transition-all duration-300 p-4">
                                    <img src="{{ asset('Images/' . $item['image']) }}" alt="{{ $item['title'] }}"
                                        class="max-w-full max-h-full object-contain" />
                                </div>
                            </div>
                            <h3
                                class="font-semibold text-lg text-gray-900 group-hover:text-blue-700 transition-colors duration-300">
                                {{ $item['title'] }}
                            </h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Hot Topics Section -->
    <section class="hot-topics-section py-10 px-6 bg-white">
        @php
            $hotTopics = [
                ['title' => 'Compliance Challenges Framework Model', 'route' => 'compliance-challenges'],
                ['title' => 'Key Performance Indicator vs Key Risk Indicator', 'route' => 'key-performance-indicator'],
                ['title' => 'Essential KPIs & KRIs', 'route' => 'essential-kpis-kris'],
                ['title' => 'Risk Management Methodologies', 'route' => 'risk-management-methodologies'],
                ['title' => 'Control Assessment vs Risk Assessment', 'route' => 'control-assessment-risk-assessment'],
                ['title' => '26 Essential Items Checklist of Awarness Topics', 'route' => '26-essential-items'],
                ['title' => 'Enhancing Staff Knowledge & Skill', 'route' => 'enhancing-staff-knowledge'],
                ['title' => 'Asset Inventory vs Configuration Management Database', 'route' => 'asset-inventory'],
                ['title' => 'Essential and Practical Cryptographic Deployment', 'route' => 'essential-practical-cryptographic'],
                ['title' => 'Data & Information', 'route' => 'data-information'],
                ['title' => 'Selecting VA & Pen Tester', 'route' => 'selecting-va-pen-tester'],
                ['title' => 'Incident Management vs Cybersecurity Incident Management', 'route' => 'incident-management'],
                ['title' => 'Review vs Audit', 'route' => 'review-vs-audit'],
            ];
        @endphp

        <div class="max-w-7xl mx-auto text-center mb-12">
            <h2 class="section-title mb-4">
                <span class="hero-gradient">Hot Topics</span>
            </h2>
            <p class="mt-2 text-lg text-gray-700 max-w-3xl mx-auto">
                Stay updated with the most pressing cybersecurity challenges, emerging threats, and strategic insights
                that matter to Chief Information Security Officers.
            </p>
        </div>

        <div class="max-w-7xl mx-auto">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($hotTopics as $item)
                    <a href="{{ route($item['route']) }}"
                        class="offering-card group relative overflow-hidden block rounded-2xl shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 p-8 text-center border border-indigo-100 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gradient-to-br from-indigo-100 via-blue-50 to-purple-100 hover:from-indigo-200 hover:via-blue-100 hover:to-purple-200">
                        <span
                            class="pointer-events-none absolute -top-12 -right-12 w-36 h-36 bg-gradient-to-br from-blue-400/30 to-indigo-500/30 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></span>
                        <span
                            class="pointer-events-none absolute -bottom-12 -left-12 w-32 h-32 bg-gradient-to-tr from-purple-400/20 to-blue-400/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></span>
                        <span
                            class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-blue-600 to-indigo-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        <div class="relative z-10">
                            <div class="flex justify-center mb-6">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-md group-hover:shadow-lg group-hover:scale-110 transition-all duration-300">
                                    <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            </div>
                            <h3
                                class="font-semibold text-lg text-gray-900 group-hover:text-blue-700 transition-colors duration-300">
                                {{ $item['title'] }}
                            </h3>
                        </div>
                    </a>
                @endforeach
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
        class="program-benefits-section py-10 px-6 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
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

            <div class="flex justify-center gap-6">
                <a href="{{ route('vciso') }}" class="btn-secondary group inline-flex items-center gap-3">
                    <span>Access Platform</span>
                </a>
                <a href="#" class="BudgetButton btn-primary" id="headerContactButton">
                    Contact Us
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 p-6">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-slate-400 text-sm">
                &copy; 2026 UK CISO. All rights reserved.
            </p>
        </div>
    </footer>
    <div id="contactModal" class="modal">

        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Contact Us to Solve Your Biggest Problem!</h2>
            <form id="contactForm">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Work Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="company">Company/Organization:</label>
                <input type="text" id="company" name="company" required>

                <label for="problem">Your Biggest Problem/Inquiry:</label>
                <textarea id="problem" name="problem" rows="4" required></textarea>

                <button type="submit" class="submit-button">Send Inquiry</button>
            </form>
        </div>

    </div>
    @include('partials.chatbot')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Get the modal element
        var modal = document.getElementById("contactModal");

        // Get the contact elements:
        // 1. The <a> tag in the header with href="#"
        // 2. The <p> tag in the budget section with id="budgetContactButton"
        // 3. The new header contact button with class "BudgetButton"
        var contactTriggers = document.querySelectorAll("a[href='#'], #budgetContactButton, #headerContactButton");

        // Get the <span> element that closes the modal ('&times;')
        var span = document.getElementsByClassName("close-button")[0];

        // Function to open the modal
        function openModal(event) {
            // Check if the event target is an <a> tag and prevent default
            if (event.target.tagName === 'A') {
                event.preventDefault();
            }
            modal.style.display = "block";
        }

        // Attach click events to all contact triggers
        contactTriggers.forEach(function(element) {
            element.onclick = openModal;
        });

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Handle form submission via AJAX
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Stop the form from submitting normally

            // Get form data
            const formData = new FormData(this);
            const formObject = {};
            for (let [key, value] of formData.entries()) {
                // Map form field names to model field names
                if (key === 'name') formObject.fullname = value;
                else if (key === 'problem') formObject.message = value;
                else formObject[key] = value;
            }

            // Show a loading state or disable submit button
            const submitButton = this.querySelector('.submit-button');
            const originalButtonText = submitButton.textContent;
            submitButton.textContent = 'Sending...';
            submitButton.disabled = true;

            // Send the data to the server via an AJAX request
            axios.post('/contact-inquiry', formObject)
                .then(function(response) {
                    // On success, show success message and reset form
                    alert(response.data.message);
                    modal.style.display = "none";
                    document.getElementById('contactForm').reset();
                })
                .catch(function(error) {
                    // On error, show validation errors or generic error message
                    if (error.response && error.response.status === 422) {
                        // Validation error
                        const errors = error.response.data.errors;
                        let errorMessage = "Please correct the following errors:\n";

                        for (let field in errors) {
                            errorMessage += "- " + errors[field][0] + "\n";
                        }

                        alert(errorMessage);
                    } else {
                        // General server error
                        alert('There was an error submitting your inquiry. Please try again.');
                    }
                })
                .finally(function() {
                    // Reset button state regardless of success or error
                    submitButton.textContent = originalButtonText;
                    submitButton.disabled = false;
                });
        });
    </script>

</body>

</html>
