<div class="relative overflow-hidden bg-gradient-to-br from-brand-50 via-white to-blue-light-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 px-4 sm:px-6 lg:px-8 py-6">
    <!-- Decorative Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <svg class="absolute right-0 top-0 h-full w-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon points="50,0 100,0 50,100 0,100" class="text-brand-600" />
        </svg>
    </div>

    <div class="max-w-7xl mx-auto relative z-10">
        <!-- Title & Description -->
        <div class="mb-8">
            <div class="flex items-center gap-5 mb-6">
                <div class="relative flex items-center justify-center w-20 h-20 rounded-3xl bg-gradient-to-br from-brand-600 to-brand-950 shadow-xl shadow-brand-500/20 ring-4 ring-white dark:ring-gray-800">
                    {{ $icon ?? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-white"><path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.08.75.75 0 0 0-.722.515A12.74 12.74 0 0 0 2.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 0 0 .374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 0 0-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08Zm3.094 8.016a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" /></svg>' }}
                    <!-- Subtle pulse animation -->
                    <div class="absolute inset-0 rounded-3xl bg-brand-600 opacity-20 animate-ping"></div>
                </div>
                <div>
                    <h1 class="text-4xl sm:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-brand-900 to-brand-600 dark:from-white dark:to-gray-300 tracking-tight mb-2">
                        {{ $title ?? 'Page Title' }}
                    </h1>
                    <p class="text-base sm:text-lg text-gray-600 dark:text-gray-400 font-medium">
                        {{ $subtitle ?? 'Page Subtitle' }}
                    </p>
                </div>
            </div>

            <!-- Enhanced Description Card -->
            <div class="relative bg-white dark:bg-gray-800/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-gray-200/50 dark:border-gray-700/50 hover:shadow-2xl transition-shadow duration-300">
                <div class="absolute -top-3 -right-3 w-24 h-24 bg-brand-100 dark:bg-brand-900/30 rounded-full blur-2xl opacity-50"></div>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-lg relative z-10">
                    {{ $slot }}
                </p>
            </div>
        </div>
    </div>
</div>