@extends('layouts.ciso-full')
@section('title', 'ISO 27001:Information Security Management System (ISMS)')
@section('content')
    <div class="min-h-screen">
        <!-- Page Header Section -->
        <div class="px-4 sm:px-6 lg:px-8 py-8 mb-8">
            <div class="max-w-7xl mx-auto">
                <!-- Title & Description -->
                <div class="mb-8">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex items-center justify-center w-16 h-16 rounded-2xl bg-brand-950 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-white">
                                <path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.08.75.75 0 0 0-.722.515A12.74 12.74 0 0 0 2.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 0 0 .374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 0 0-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08Zm3.094 8.016a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white tracking-tight">
                                ISO 27001
                            </h1>
                            <p class="text-sm sm:text-base text-gray-500 dark:text-gray-400 mt-1 font-medium">
                                Information Security Management System (ISMS)
                            </p>
                        </div>
                    </div>

                    <!-- Description Card -->
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800/50 dark:to-gray-900/50 rounded-2xl p-6 border border-gray-200 dark:border-gray-700">
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            Explore the comprehensive framework for establishing, implementing, maintaining, and continually improving your information security management system. Navigate through each section to understand and implement ISO 27001 standards effectively.
                        </p>
                    </div>
                </div>

                <!-- Stats Bar (Optional - shows count) -->
                <div class="mb-8">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-gray-800 rounded-full border border-gray-200 dark:border-gray-700 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-brand-950">
                            <path d="M3.196 12.87l-.825.483a.75.75 0 000 1.294l7.25 4.25a.75.75 0 00.758 0l7.25-4.25a.75.75 0 000-1.294l-.825-.484-5.666 3.322a2.25 2.25 0 01-2.276 0L3.196 12.87z" />
                            <path d="M3.196 8.87l-.825.483a.75.75 0 000 1.294l7.25 4.25a.75.75 0 00.758 0l7.25-4.25a.75.75 0 000-1.294l-.825-.484-5.666 3.322a2.25 2.25 0 01-2.276 0L3.196 8.87z" />
                            <path d="M10.38 1.103a.75.75 0 00-.76 0l-7.25 4.25a.75.75 0 000 1.294l7.25 4.25a.75.75 0 00.76 0l7.25-4.25a.75.75 0 000-1.294l-7.25-4.25z" />
                        </svg>
                        <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">
                            {{ count($allSections) }} Sections Available
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sections Grid -->
        <div class="px-4 sm:px-6 lg:px-8 pb-12">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($allSections as $index => $item)
                        <div class="group" style="animation: fadeInUp 0.6s ease-out {{ $index * 0.05 }}s backwards;">
                            <x-report-card
                                route_name="iso-27001.show"
                                route_param="{{ $item->section_id }}"
                                title="{{ $item->title }}"
                                title_ar="" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Enhanced card hover effects */
        .group:hover {
            transform: translateY(-4px);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
@endsection
