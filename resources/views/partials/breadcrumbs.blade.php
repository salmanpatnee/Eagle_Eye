<!-- Breadcrumb Start -->
<div>
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div class="flex flex-col">
            <span
                class="ibm-plex-sans-arabic-semibold text-sm lg:text-xl font-semibold text-gray-800 dark:text-white/90 text-right"
                dir="rtl">
                @yield('title_ar', '')
            </span>
            <span class="text-sm lg:text-xl font-semibold text-gray-800 dark:text-white/90">
                @yield('title')
            </span>
        </div>

        <nav>
            <ol class="flex items-center gap-1.5">
                <li>
                    <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                        href="{{ route('compliance') }}">
                        Process
                        <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="currentColor" stroke-width="1.2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </li>
                @hasSection('parent_title')
                <li>
                    <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                        href="@yield('parent_url')">
                        @yield('parent_title')
                        <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="currentColor" stroke-width="1.2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </li>
                @endif
                @hasSection('parent2_title')
                <li>
                    <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                        href="@yield('parent2_url')">
                        @yield('parent2_title')
                        <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="currentColor" stroke-width="1.2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </li>
                @endif
                <li class="text-sm text-gray-800 dark:text-white/90">
                    @hasSection('breadcrumb_title')
                        @yield('breadcrumb_title')
                    @else
                        @hasSection('parent2_url')
                            @yield('title')
                        @else
                            @hasSection('parent_url')
                                <a href="@yield('parent_url')" class="text-gray-500 dark:text-gray-400">@yield('title')</a>
                            @else
                                @yield('title')
                            @endif
                        @endif
                    @endif
                </li>

            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->
