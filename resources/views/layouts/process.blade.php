@include('partials.header')
<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
        <!-- Small Device Overlay Start -->
        @include('partials.nav-ciso')
        <!-- ===== Main Content Start ===== -->
        <main>
            <div class="px-4 py-2 mx-auto max-w-(--breakpoint-2xl)">
                <x-sticky-breadcrumb />
                <div class="bg-white border border-gray-200 flex items-center p-4 rounded-lg min-h-screen"
                    id="process_banner"
                    >
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

                        <div class="max-w-full overflow-x-auto pt-4 relative rounded-lg">
                            @yield('content')
                        </div>

                    </div>
                </div>
                @yield('additional_content')
            </div>
        </main>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
</div>
<!-- ===== Page Wrapper End ===== -->
@include('partials.footer')
