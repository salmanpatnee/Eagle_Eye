@props(['route_name', 'route_param' => null, 'title', 'title_ar'])

@if ($route_name)
    <a href="{{ route($route_name, html_entity_decode($route_param)) }}" class="block h-full group">
@else
    <a href="#" class="block h-full group">
@endif
    <div class="relative bg-gradient-to-br from-brand-900 to-brand-950 dark:from-brand-950 dark:to-gray-900 border border-brand-800/30 dark:border-gray-700/50 px-6 py-10 rounded-3xl h-full min-h-[260px] flex flex-col overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-brand-500/20 hover:border-brand-700 hover:scale-[1.02] group-hover:from-brand-800 group-hover:to-brand-950">

        <!-- Decorative gradient orb -->
        <div class="absolute -top-12 -right-12 w-32 h-32 bg-gradient-to-br from-brand-400/20 to-brand-600/20 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-700"></div>
        <div class="absolute -bottom-8 -left-8 w-24 h-24 bg-gradient-to-tr from-blue-light-400/10 to-brand-500/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>

        <!-- Icon Container with enhanced styling -->
        <div class="relative z-10 flex items-center justify-center w-20 h-20 mx-auto mb-8 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20 shadow-xl group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 group-hover:bg-white/15">
            <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-white/20 to-transparent opacity-50"></div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-white relative z-10 drop-shadow-lg">
                <path fill-rule="evenodd"
                    d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                    clip-rule="evenodd" />
                <path fill-rule="evenodd"
                    d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z"
                    clip-rule="evenodd" />
            </svg>
        </div>

        <!-- Content Container -->
        <div class="relative z-10 flex items-start justify-center flex-grow">
            <div class="text-center px-2">
                @if(isset($title_ar) && !empty($title_ar))
                    <span class="block font-bold text-lg leading-relaxed text-white/90 mb-3" lang="ar" dir="rtl">{{ $title_ar }}</span>
                @endif
                <h4 class="font-bold text-2xl leading-relaxed text-white group-hover:text-white transition-colors {{ isset($title_ar) && !empty($title_ar) ? 'mt-2' : '' }}">
                    {{ $title }}
                </h4>

                <!-- Subtle hover indicator -->
                <div class="mt-4 flex items-center justify-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <span class="text-xs text-white/70 font-medium">Explore</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3 text-white/70 group-hover:translate-x-1 transition-transform duration-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Bottom accent line -->
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-brand-400 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
    </div>
</a>
