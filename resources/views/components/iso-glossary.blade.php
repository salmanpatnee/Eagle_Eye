@props(['link'])

<a href="{{ $link }}" class="block group">
    <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-200 dark:border-gray-700 hover:shadow-2xl hover:border-success-500/50 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
        <!-- Gradient Accent Bar -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-success-500 to-success-700 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>

        <!-- Background Glow -->
        <div class="absolute -top-10 -right-10 w-32 h-32 bg-success-500/5 rounded-full blur-2xl group-hover:bg-success-500/10 transition-colors duration-500"></div>

        <div class="relative z-10 flex items-center gap-4">
            <!-- Icon Container -->
            <div class="flex-shrink-0 flex items-center justify-center w-14 h-14 rounded-xl bg-gradient-to-br from-success-500 to-success-700 shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
            </div>

            <!-- Text Content -->
            <div class="flex-1">
                <h3 class="font-bold text-gray-900 dark:text-white text-base group-hover:text-success-700 dark:group-hover:text-success-400 transition-colors duration-300">
                    Arabic English Glossary
                </h3>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                    Terminology reference
                </p>
            </div>

            <!-- Arrow Icon -->
            <div class="flex-shrink-0">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-success-600 group-hover:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </div>
        </div>
    </div>
</a>
