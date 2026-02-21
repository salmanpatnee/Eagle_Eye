@props(['route_name', 'route_param' => null, 'title', 'title_ar', 'item'])

@php
    $lowerTitle = strtolower($title);

    // Keys ordered longest/most-specific first to prevent partial false matches.
    // Matches actual article_categories.name values from the database.
    $iconMap = [
        // Multi-word specific phrases first
        'resilience testing'  => 'testing.png',              // Digital Operational Resilience Testing
        'third-party risk'    => 'information-transit.png',  // ICT Third-Party Risk Management
        'information sharing' => 'information-security.png',  // Information Sharing and Threat Intelligence
        'change and release'  => 'change-management.png',    // Change and Release Management Framework
        'review and audit'    => 'auditor.png',             // Review and Audit Management Framework
        'physical security'   => 'cctv-camera.png',          // Physical Security Management Framework
        'network management'  => 'networking.png', // Network Management Framework
        'asset management'    => 'assets-procedure.png',     // Asset Management Framework
        'data management'     => 'data.png',                 // Data Management Framework
        'hr management'       => 'human-resources.png',      // HR Management Framework
        'identity access'     => 'identity-management.png',  // Identity Access Management Framework
        'mobile device'       => 'mobile-device.png',  // Mobile Device Management Framework
        'project management'  => 'project-management.png',   // Project Management Framework
        'ai management'       => 'ai.png',   // AI Management Framework
        'ict incident'        => 'incident-management.png',  // ICT Incident Management and Reporting
        'ict risk'            => 'risk-management.png',      // ICT Risk Management Framework (IRM)

        // Single-word / shorter phrases after
        'introduction'        => 'preface.png',              // Introduction
        'governance'          => 'policy.png',               // Governance, Strategy and Oversight
        'oversight'           => 'activity-detection.png',   // Oversight of Critical ICT Third-Party Providers
        'training'            => 'training.png',             // Training and Awareness Management Framework
        'email'               => 'email.png',        // Email Management Framework
        'vulnerability'       => 'vulnerability.png',        // Vulnerability Management Framework
        'patch'               => 'patch.png',   // Patch Management Framework
        'siem'                => 'activity-detection.png',   // SIEM Management Framework
        'cryptography'        => 'cryptographic-management.png', // Cryptography Management Framework
        'application'         => 'system-development.png',   // Application Management Framework
        'backup'              => 'recovery.png',             // Backup Management Framework
        'cloud'               => 'cloud.png', // Cloud Management Framework
        'configuration'       => 'operational-management.png', // Configuration Management Framework
        'capacity'            => 'capacity-management.png',  // Capacity Management Framework
    ];

    $iconFile = 'policy.png';

    foreach ($iconMap as $keyword => $file) {
        if (str_contains($lowerTitle, $keyword)) {
            $iconFile = $file;
            break;
        }
    }
@endphp

@if ($route_name)
    <a href="{{ route($route_name, html_entity_decode($route_param)) }}" class="block h-full group">
    @else
        <a href="#" class="block h-full group">
@endif
<div
    class="relative bg-gradient-to-br from-brand-900 to-brand-950 dark:from-brand-950 dark:to-gray-900 border border-brand-800/30 dark:border-gray-700/50 px-6 py-10 rounded-3xl h-full min-h-[260px] flex flex-col overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-brand-500/20 hover:border-brand-700 hover:scale-[1.02] group-hover:from-brand-800 group-hover:to-brand-950">

    <!-- Decorative gradient orb -->
    <div
        class="absolute -top-12 -right-12 w-32 h-32 bg-gradient-to-br from-brand-400/20 to-brand-600/20 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-700">
    </div>
    <div
        class="absolute -bottom-8 -left-8 w-24 h-24 bg-gradient-to-tr from-blue-light-400/10 to-brand-500/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700">
    </div>

    <!-- Icon Container -->
    <div
        class="relative z-10 mx-auto mb-8 w-20 h-20 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
        <!-- Glow halo (appears on hover behind the box) -->
        <div
            class="absolute -inset-3 rounded-3xl bg-white/20 blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
        </div>
        <!-- White icon box -->
        <div
            class="relative flex items-center justify-center w-full h-full rounded-2xl bg-white overflow-hidden shadow-[0_8px_24px_rgba(0,0,0,0.4),0_2px_6px_rgba(0,0,0,0.25)] group-hover:shadow-[0_12px_36px_rgba(0,0,0,0.45)]">
            <!-- Gloss shine overlay -->
            <div
                class="absolute inset-0 bg-gradient-to-b from-white/70 via-white/5 to-transparent pointer-events-none">
            </div>
            <img src="{{ asset('Images/icons/process/' . $iconFile) }}" alt="{{ $title }}"
                class="w-11 h-11 object-contain relative z-10" />
        </div>
    </div>

    <!-- Content Container -->
    <div class="relative z-10 flex items-start justify-center flex-grow">
        <div class="text-center px-2">
            @if (isset($title_ar) && !empty($title_ar))
                <span class="block font-bold text-lg leading-relaxed text-white/90 mb-3" lang="ar"
                    dir="rtl">{{ $title_ar }}</span>
            @endif
            <h4
                class="min-h-[80px] font-bold text-2xl leading-relaxed text-white group-hover:text-white transition-colors {{ isset($title_ar) && !empty($title_ar) ? 'mt-2' : '' }}">
                {{ $title }}
            </h4>

            @php
                $articles = count(array_filter(array_map('trim', explode("\n", $item->article_list))));
            @endphp

            <!-- Article Count Badge -->
            <div
                class="mt-6 inline-flex items-center gap-2 px-4 py-2 bg-brand-500/20 backdrop-blur-sm border border-brand-400/30 rounded-full group-hover:bg-brand-500/30 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-4 h-4 text-white">
                    <path fill-rule="evenodd"
                        d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd"
                        d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="text-sm font-semibold text-white">{{ $articles }}
                    {{ $articles == 1 ? 'Article' : 'Articles' }}</span>
            </div>

            <!-- Subtle hover indicator -->
            <div
                class="mt-4 flex items-center justify-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <span class="text-xs text-white/70 font-medium">Explore</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor"
                    class="w-3 h-3 text-white/70 group-hover:translate-x-1 transition-transform duration-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Bottom accent line -->
    <div
        class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-brand-400 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
    </div>
</div>
</a>
