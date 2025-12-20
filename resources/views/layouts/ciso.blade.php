@include('partials.header')
<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
        <!-- Small Device Overlay Start -->
        @include('partials.nav-ciso')
        <!-- ===== Main Content Start ===== -->
        <main>
            <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
                <div class="top-16 sm:sticky sm:top-[60px] md:top-[66px] z-99995 p-4" style="background-color: #F9FAFB;">
                    @include('partials.breadcrumbs-ciso')
                </div>
                <div class="bg-white border border-gray-200 flex items-center min-h-screen p-4 rounded-lg"
                    style="background-image: url('/Images/riyadh.jpg'); background-size: cover; background-position: center;">
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

            </div>
        </main>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
</div>
@push('css')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush
<!-- ===== Page Wrapper End ===== -->
@include('partials.footer')
