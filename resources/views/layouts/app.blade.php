@include('partials.header')
<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
    @include('partials.sidebar')
    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
        <!-- Small Device Overlay Start -->
        @include('partials.nav')
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
                                        <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
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
@include('partials.footer')
