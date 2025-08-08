@include('partials.header')
<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
        <!-- Small Device Overlay Start -->
        @include('partials.nav')
        <!-- ===== Main Content Start ===== -->
        <main>
            <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
                @include('partials.breadcrumbs')
                <div
                    class="min-h-screen rounded-lg border border-gray-200 bg-white p-4  dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="mx-auto w-full">


                        @if (session('error'))
                            <x-alert-error>
                                {{ session('error') }}
                            </x-alert-error>
                        @endif
                        @if (session('success'))
                            <x-alert-success>
                                {{ session('success') }}
                            </x-alert-success>
                        @endif

                        <div
                            class="relative max-w-full overflow-x-auto   rounded-lg border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
                            @yield('content')
                        </div>

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
