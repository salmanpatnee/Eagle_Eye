@include('partials.header')

<div class="relative p-6 bg-white z-1 dark:bg-gray-900 sm:p-0">
    <div class="relative flex flex-col justify-center w-full min-h-screen dark:bg-gray-900 sm:p-0 lg:flex-row">
        <!-- Form -->
        <div class="flex flex-col flex-1 w-full lg:w-1/2">
            <div class="w-full max-w-md pt-10 mx-auto">
                <a href="{{ route('welcome') }}"
                    class="inline-flex items-center text-sm text-gray-500 transition-colors hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                    <svg class="stroke-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 20 20" fill="none">
                        <path d="M12.7083 5L7.5 10.2083L12.7083 15.4167" stroke="" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Back
                </a>
            </div>

            <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
                <div>
                    <div class="mb-5 sm:mb-8">
                        <h1 class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md">
                            Get Access to EURO CISO
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Subscribe for 1 year and get full access to all EURO CISO resources.
                        </p>
                    </div>

                    @if (session('error'))
                        <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700 dark:border-red-800 dark:bg-red-900/20 dark:text-red-400">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Pricing Card -->
                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="mb-6 text-center">
                            <p class="text-sm font-medium uppercase tracking-wide text-brand-600 dark:text-brand-400">Annual Plan</p>
                            <div class="mt-2 flex items-baseline justify-center gap-x-1">
                                <span class="text-4xl font-bold text-gray-900 dark:text-white">$99</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">/ year</span>
                            </div>
                        </div>

                        <ul class="mb-6 space-y-3 text-sm text-gray-600 dark:text-gray-300">
                            <li class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Full access to all CISO frameworks
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                ISO 27001 content and resources
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Control assessments and evidence tracking
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                12-month subscription validity
                            </li>
                        </ul>

                        <form method="POST" action="{{ route('payment.paypal.create') }}">
                            @csrf
                            <button type="submit"
                                class="w-full rounded-lg bg-[#0070ba] px-4 py-3 text-sm font-semibold text-white transition-colors hover:bg-[#003087] focus:outline-none focus:ring-2 focus:ring-[#0070ba] focus:ring-offset-2">
                                Pay with PayPal
                            </button>
                        </form>
                    </div>

                    <p class="mt-4 text-center text-xs text-gray-400">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-brand-600 hover:underline dark:text-brand-400">Sign in</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="relative items-center hidden w-full h-full bg-brand-950 dark:bg-white/5 lg:grid lg:w-1/2">
            <div class="flex items-center justify-center z-1">
                <div class="absolute right-0 top-0 -z-1 w-full max-w-[250px] xl:max-w-[450px]">
                    <img src="{{ asset('Images/shape/grid-01.svg') }}" alt="grid" />
                </div>
                <div class="absolute bottom-0 left-0 -z-1 w-full max-w-[250px] rotate-180 xl:max-w-[450px]">
                    <img src="{{ asset('Images/shape/grid-01.svg') }}" alt="grid" />
                </div>
                <div class="flex flex-col items-center max-w-xs">
                    <a href="{{ route('welcome') }}" class="block mb-4">
                        <img src="{{ asset('Images/EuroCISOLogo.png') }}" class="w-40" alt="Logo" />
                    </a>
                    <p class="mb-2 font-semibold text-white text-title-sm dark:text-white/90 sm:text-title-md">
                        UK CISO
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')
