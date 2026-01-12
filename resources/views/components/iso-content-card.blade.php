@props(['title'])

<div class="relative h-full bg-gradient-to-br from-brand-900 to-brand-950 dark:from-brand-950 dark:to-gray-900 rounded-3xl p-8 shadow-2xl border border-brand-800/30 dark:border-gray-700/50 overflow-hidden group hover:shadow-brand-500/20 transition-all duration-500">
    <!-- Decorative Background Elements -->
    <div class="absolute -top-20 -right-20 w-48 h-48 bg-gradient-to-br from-brand-400/10 to-brand-600/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-16 -left-16 w-40 h-40 bg-gradient-to-tr from-blue-light-400/10 to-brand-500/10 rounded-full blur-3xl"></div>

    <!-- Content -->
    <div class="relative z-10">
        <!-- Icon Badge -->
        {{-- <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20 shadow-lg mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-white">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
            </svg>
        </div> --}}

        <!-- Title -->
        <h3 class="text-2xl sm:text-3xl font-bold text-white mb-6 leading-tight">
            {!! $title !!}
        </h3>

        <!-- Divider -->
        <div class="h-px bg-gradient-to-r from-transparent via-white/20 to-transparent mb-6"></div>

        <!-- Description -->
        <div class="text-2xl text-white/90 leading-relaxed space-y-4" style="text-align: justify">
            {{ $slot }}
        </div>

        <!-- Bottom Accent -->
        <div class="mt-8 pt-6 border-t border-white/10">
            <div class="flex items-center gap-2 text-white/60 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>ISO 27001 Standard</span>
            </div>
        </div>
    </div>

    <!-- Hover Glow Effect -->
    <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-brand-500/0 to-brand-700/0 group-hover:from-brand-500/5 group-hover:to-brand-700/5 transition-all duration-500"></div>
</div>
