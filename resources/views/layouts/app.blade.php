<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        eCommerce Dashboard | TailAdmin - Tailwind CSS Admin Dashboard Template
    </title>
    <link rel="icon" href="favicon.ico">
    <link href="{{ asset('tailadmin/build/style.css') }}" rel="stylesheet">
</head>

<body x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark bg-gray-900': darkMode === true }">

    @include('partials.preloader')


    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
        @include('partials.sidebar')
        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            <!-- Small Device Overlay Start -->
            @include('partials.header')
            <!-- ===== Main Content Start ===== -->
            <main>
                <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
                    <!-- Breadcrumb Start -->
                    <div x-data="{ pageName: `
                                        Page Title` }">
                        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName"></h2>

                            <nav>
                                <ol class="flex items-center gap-1.5">
                                    <li>
                                        <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                                            href="{{ route('compliance') }}">
                                            Home
                                            <svg class="stroke-current" width="17" height="16"
                                                viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke=""
                                                    stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="text-sm text-gray-800 dark:text-white/90" x-text="pageName"></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Breadcrumb End -->
                    <div
                        class="min-h-screen rounded-2xl border border-gray-200 bg-white px-5 py-7  dark:border-gray-800 dark:bg-white/[0.03]">
                        <div class="mx-auto w-full text-center">
                            <h3 class="text-theme-xl mb-4 font-semibold text-gray-800 sm:text-2xl dark:text-white/90">
                                Content Goes Here
                            </h3>
                            {{-- @yield('content') --}}
                        </div>
                    </div>

                </div>
            </main>
            <!-- ===== Main Content End ===== -->
        </div>
        <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
    <script defer src="{{ asset('tailadmin/build/bundle.js') }}"></script>
</body>

</html>
