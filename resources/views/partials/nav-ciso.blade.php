<div @click="sidebarToggle=false" :class="sidebarToggle ? 'block lg:hidden' : 'hidden'"
    class="fixed w-full h-screen z-9 bg-gray-900/50"></div>
<!-- Small Device Overlay End -->
<!-- ===== Header Start ===== -->
<header x-data="{ menuToggle: false }"
    class="sticky top-0 z-99999 flex w-full border-gray-200 bg-brand-950 lg:border-b dark:border-gray-800 dark:bg-gray-900">
    <div class="flex flex-col grow items-center justify-between lg:flex-row lg:px-6 max-w-(--breakpoint-2xl) mx-auto">
        <div
            class="flex w-full items-center justify-between gap-2 border-b border-gray-200 px-3 py-1 sm:gap-4 lg:justify-normal lg:border-b-0 lg:px-0 dark:border-gray-800">
            <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
                class="flex items-center gap-2 sidebar-header hidden lg:flex">
                <a href="{{ route('vciso') }}">
                    <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                        <span class="flex items-center space-x-2">
                            <img class="dark:hidden" src="{{ asset('Images/SaudiCISOLogo.png') }}"
                                alt="Logo" style="height: 80px; width: auto;"/>
                            {{-- <span class="dark:hidden text-2xl font-semibold">CISO 360</span> --}}
                        </span>
                    </span>
                    <img class="logo-icon" :class="sidebarToggle ? 'lg:block mt-10 w-20' : 'hidden'"
                        src="{{ asset('Images/SaudiCISOLogo.png') }}" alt="Logo" />

                </a>
            </div>
            <!-- Hamburger Toggle BTN -->
            
            <!-- Hamburger Toggle BTN -->
            <a href="{{ route('vciso') }}" class="lg:hidden">
                <img class="dark:hidden w-12" src="{{ asset('Images/SaudiCISOLogo.png') }}" alt="Logo" />
            </a>
            <!-- Application nav menu button -->
            <button
                class="z-99999 flex h-10 w-10 items-center justify-center rounded-lg text-gray-700 hover:bg-gray-100 lg:hidden dark:text-gray-400 dark:hover:bg-gray-800"
                :class="menuToggle ? 'bg-gray-100 dark:bg-gray-800' : ''" @click.stop="menuToggle = !menuToggle">
                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M5.99902 10.4951C6.82745 10.4951 7.49902 11.1667 7.49902 11.9951V12.0051C7.49902 12.8335 6.82745 13.5051 5.99902 13.5051C5.1706 13.5051 4.49902 12.8335 4.49902 12.0051V11.9951C4.49902 11.1667 5.1706 10.4951 5.99902 10.4951ZM17.999 10.4951C18.8275 10.4951 19.499 11.1667 19.499 11.9951V12.0051C19.499 12.8335 18.8275 13.5051 17.999 13.5051C17.1706 13.5051 16.499 12.8335 16.499 12.0051V11.9951C16.499 11.1667 17.1706 10.4951 17.999 10.4951ZM13.499 11.9951C13.499 11.1667 12.8275 10.4951 11.999 10.4951C11.1706 10.4951 10.499 11.1667 10.499 11.9951V12.0051C10.499 12.8335 11.1706 13.5051 11.999 13.5051C12.8275 13.5051 13.499 12.8335 13.499 12.0051V11.9951Z"
                        fill="" />
                </svg>
            </button>
            <!-- SEARCH -->

        </div>
        <div :class="menuToggle ? 'flex' : 'hidden'"
            class="shadow-theme-md w-full items-center justify-between gap-4 px-5 py-4 lg:flex lg:justify-end lg:px-0 lg:shadow-none">
            <div class="2xsm:gap-3 flex items-center gap-2">
                <!-- Dark Mode Toggler -->
                <!-- Notification Menu Area -->
            </div>
            <!-- User Area -->
            @auth
                <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                    <a class="flex items-center text-white" href="#"
                        @click.prevent="dropdownOpen = ! dropdownOpen">
                        <span class="mr-3 h-8 w-8 overflow-hidden ">
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
                        class="shadow-theme-lg dark:bg-gray-dark absolute right-0 mt-[17px] flex w-[280px] flex-col rounded-2xl border border-gray-200 bg-white p-3 dark:border-gray-800">
                        <div>
                            <span class="text-theme-sm block font-medium text-gray-700 dark:text-gray-400">
                                {{ auth()->user()->role->role_name }}
                            </span>
                            <span class="text-theme-xs mt-0.5 block text-gray-500 dark:text-gray-400">
                                {{ auth()->user()->email }}
                            </span>
                        </div>
                        <ul class="flex flex-col gap-1 border-b border-gray-200 pt-4 pb-3 dark:border-gray-800">
                            @if (auth()->user()->role_id == 1)
                            <li>
                                <a href="{{ route('users.index') }}"
                                    class="group text-theme-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round fill-gray-500 group-hover:fill-gray-700 dark:fill-gray-400 dark:group-hover:fill-gray-300"><path d="M18 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="10" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                    <span class="flex-1">Admin Portal</span>
                                    {{-- <span class="text-theme-sm text-gray-700 dark:text-gray-400" dir="rtl"
                                    style="font-family: inherit;">
                                         بوابة المشرف
                                    </span> --}}
                                </a>
                            </li>
                            @else
                            <li>
                                <a href="{{ route('profile.edit') }}"
                                    class="group text-theme-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round fill-gray-500 group-hover:fill-gray-700 dark:fill-gray-400 dark:group-hover:fill-gray-300">
                                        <circle cx="18" cy="15" r="3"/><circle cx="9" cy="7" r="4"/><path d="M10 15H6a4 4 0 0 0-4 4v2"/><path d="M22 21v-2a4 4 0 0 0-4-4h-5"/></svg>
                                    <span class="flex-1">Edit Profile</span>
                                    {{-- <span class="text-theme-sm text-gray-700 dark:text-gray-400" dir="rtl"
                                    style="font-family: inherit;">
                                         تحديث الملف الشخصي
                                    </span> --}}
                                </a>
                            </li>
                            @endif
                        </ul>
                     
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
    </div>
</header>
<!-- ===== Header End ===== -->
