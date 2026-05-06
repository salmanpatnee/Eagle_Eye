@extends('layouts.error')

@section('content')
    <div class="relative flex flex-col items-center justify-center min-h-[65vh] overflow-hidden py-16 text-center">

        {{-- Decorative radial glow --}}
        <div class="pointer-events-none absolute inset-0 flex items-center justify-center" aria-hidden="true">
            <div class="h-[480px] w-[480px] rounded-full bg-brand-500/5 blur-3xl dark:bg-brand-500/[0.04]"></div>
        </div>

        {{-- Eagle Eye logo icon --}}
        <div class="relative mx-auto flex h-64 w-64 items-center justify-center">
            <div class="absolute inset-0 rounded-full border-2 border-brand-100 dark:border-brand-500/20"></div>
            <div class="flex h-52 w-52 items-center justify-center rounded-full bg-brand-50 dark:bg-brand-500/10">
                <img src="{{ asset('Images/logo/EagleEyeLogo.png') }}" alt="Eagle Eye" class="h-32 w-32 object-contain" />
            </div>
        </div>

        {{-- Heading --}}
        <h1 class="mt-7 mb-3 text-3xl font-bold text-gray-800 dark:text-white/90 sm:text-4xl">
            @yield('error_heading', 'Something Went Wrong')
        </h1>

        {{-- Message --}}
        <p class="mb-9 max-w-sm text-sm leading-relaxed text-gray-500 dark:text-gray-400 sm:text-base">
            @yield('error_message', 'An unexpected error occurred.')
        </p>

        {{-- Divider --}}
        <div class="mb-9 h-px w-16 bg-gray-200 dark:bg-gray-700"></div>

        {{-- Actions --}}
        <div class="flex flex-wrap items-center justify-center gap-3">
            <button
                onclick="history.back()"
                class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 shadow-theme-xs transition-colors hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-white/[0.05] dark:hover:text-gray-200"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Go Back
            </button>
            <a
                href="{{ url('/') }}"
                class="inline-flex items-center gap-2 rounded-lg bg-brand-500 px-5 py-2.5 text-sm font-medium text-white shadow-theme-xs transition-colors hover:bg-brand-600"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Go to Homepage
            </a>
        </div>

    </div>
@endsection
