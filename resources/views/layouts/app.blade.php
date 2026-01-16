@include('partials.header')
<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
    @include('partials.sidebar')
    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
        <!-- Small Device Overlay Start -->
        {{-- @include('partials.nav-ciso') --}}
        <!-- ===== Main Content Start ===== -->
        <main>
            <div class="bg-brand-950 flex grow items-center justify-between lg:flex-row lg:px-6 py-3">
                <div>
                    <img class="lg:hidden" src="{{ asset('Images/SaudiCISOLogo.png') }}" alt="Logo" width="80"
                                height="80">
                </div>
            <!-- User Area -->
            @auth
                <div class="relative mr-3 lg:mr-0" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                    <a class="flex items-center text-white" href="#"
                        @click.prevent="dropdownOpen = ! dropdownOpen">
                        <span class="mr-3 h-7 w-7 overflow-hidden ">
                            <img src="{{ asset('Images/user/Admin.png') }}" alt="User" />
                        </span>
                        <span class="text-theme-sm mr-1 block font-medium">
                            {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }} </span>
                        <svg :class="dropdownOpen && 'rotate-180'" class="stroke-current"
                            width="18" height="20" viewBox="0 0 18 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.3125 8.65625L9 13.3437L13.6875 8.65625" stroke="" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <!-- Dropdown Start -->
                    <div x-show="dropdownOpen"
                        class="z-60 shadow-theme-lg dark:bg-gray-dark absolute right-0 mt-[17px] flex w-[280px] flex-col rounded-2xl border border-gray-200 bg-white p-3 dark:border-gray-800">
                        <div>
                            <span class="text-theme-sm block font-medium text-gray-700 dark:text-gray-400">
                                {{ auth()->user()->role->role_name }}
                            </span>
                            <span class="text-theme-xs mt-0.5 block text-gray-500 dark:text-gray-400">
                                {{ auth()->user()->email }}
                            </span>
                        </div>
                        @if (auth()->user()->role_id == 1)
                        <ul class="flex flex-col gap-1 border-b border-gray-200 pt-4 pb-3 dark:border-gray-800">
                            <li>
                                <a href="{{ route('users.index') }}"
                                    class="group text-theme-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round fill-gray-500 group-hover:fill-gray-700 dark:fill-gray-400 dark:group-hover:fill-gray-300"><path d="M18 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="10" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                    <span>Admin Portal</span>
                                    {{-- <span class="text-theme-sm text-gray-700 dark:text-gray-400" dir="rtl"
                                    style="font-family: inherit;">
                                         بوابة المشرف
                                    </span> --}}
                                </a>
                            </li>
                        </ul>
                        @endif
                     
                        <form id="logout-form" method="POST" action="{{ route('login.destroy') }}">
                            @csrf

                            <button
                                class="w-full group text-theme-sm mt-3 flex items-center justify-between gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                <span class="flex items-center gap-3">
                                    <svg class="fill-gray-500 group-hover:fill-gray-700 dark:group-hover:fill-gray-300"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.1007 19.247C14.6865 19.247 14.3507 18.9112 14.3507 18.497L14.3507 14.245H12.8507V18.497C12.8507 19.7396 13.8581 20.747 15.1007 20.747H18.5007C19.7434 20.747 20.7507 19.7396 20.7507 18.497L20.7507 5.49609C20.7507 4.25345 19.7433 3.24609 18.5007 3.24609H15.1007C13.8581 3.24609 12.8507 4.25345 12.8507 5.49609V9.74501L14.3507 9.74501V5.49609C14.3507 5.08188 14.6865 4.74609 15.1007 4.74609L18.5007 4.74609C18.9149 4.74609 19.2507 5.08188 19.2507 5.49609L19.2507 18.497C19.2507 18.9112 18.9149 19.247 18.5007 19.247H15.1007ZM3.25073 11.9984C3.25073 12.2144 3.34204 12.4091 3.48817 12.546L8.09483 17.1556C8.38763 17.4485 8.86251 17.4487 9.15549 17.1559C9.44848 16.8631 9.44863 16.3882 9.15583 16.0952L5.81116 12.7484L16.0007 12.7484C16.4149 12.7484 16.7507 12.4127 16.7507 11.9984C16.7507 11.5842 16.4149 11.2484 16.0007 11.2484L5.81528 11.2484L9.15585 7.90554C9.44864 7.61255 9.44847 7.13767 9.15547 6.84488C8.86248 6.55209 8.3876 6.55226 8.09481 6.84525L3.52309 11.4202C3.35673 11.5577 3.25073 11.7657 3.25073 11.9984Z"
                                            fill="" />
                                    </svg>
                                    <span>Sign out</span>
                                </span>
                                {{-- <span class="text-theme-sm text-gray-700 dark:text-gray-400" dir="rtl"
                                    style="font-family: inherit;">
                                    تسجيل الخروج
                                </span> --}}
                            </button>
                        </form>
                    </div>
                    <!-- Dropdown End -->
                </div>
            @endauth
            <!-- User Area -->
            </div>
            <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
                
                @include('partials.breadcrumbs-ciso')
                <div
                    class="min-h-screen rounded-lg border border-gray-200 bg-white p-4  dark:border-gray-800 dark:bg-white/[0.03] mt-2">
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
                            class="relative max-w-full overflow-x-auto rounded-lg border border-gray-200 bg-white pt-2 dark:border-gray-800 dark:bg-white/[0.03]">
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
