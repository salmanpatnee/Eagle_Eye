<style>
    [x-cloak] {
        display: none !important;
    }

    .maturity-level-info-trigger {
        transition: background-color 0.15s ease, transform 0.15s ease;
    }

    .maturity-level-info-trigger:hover {
        background-color: color-mix(in oklab, var(--color-brand-500) 20%, transparent);
        transform: scale(1.1);
    }

    :where(.dark) .maturity-level-info-trigger:hover {
        background-color: color-mix(in oklab, var(--color-brand-500) 30%, transparent);
    }

    :where(.dark) .maturity-level-row-alt {
        background-color: color-mix(in oklab, var(--color-green-900) 12%, transparent);
    }
</style>

<span x-data="{ open: false }" class="inline-block align-middle" style="margin-left: 0.25rem;">
    <button type="button" @click.prevent.stop="open = true"
        class="maturity-level-info-trigger inline-flex items-center justify-center rounded-full bg-brand-50 p-1 text-brand-500 dark:bg-brand-500/15 dark:text-brand-400 focus:outline-none"
        aria-label="View maturity level reference">
        <x-icons.information-circle class="w-4 h-4" />
    </button>

    <div x-show="open" x-cloak class="fixed inset-0 z-999999 flex items-center justify-center p-4"
        @keydown.window.escape="open = false">
        <div class="fixed inset-0 bg-gray-900/50" x-transition.opacity @click="open = false"></div>

        <div class="relative w-full overflow-y-auto rounded-2xl border border-gray-200 bg-white shadow-theme-lg dark:border-gray-800 dark:bg-gray-dark"
            style="max-width: 56rem; max-height: 85vh;" @click.outside="open = false"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95">

            <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4 dark:border-gray-800">
                <h3 class="text-base font-bold text-gray-800 dark:text-white">Control Maturity Level Reference</h3>
                <button type="button" @click="open = false"
                    class="hover:text-gray-700 dark:hover:text-gray-200 text-gray-400 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="p-6">
                <table class="w-full text-left text-sm">
                    <thead class="bg-brand-950 border-brand-500 border-y text-left">
                        <tr>
                            <th class="px-4 py-3 font-semibold text-white w-32">Maturity Level</th>
                            <th class="px-4 py-3 font-semibold text-white">Definition and Criteria</th>
                            <th class="px-4 py-3 font-semibold text-white">Explanation</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach (\App\Enums\ControlMaturityLevel::cases() as $case)
                            <tr
                                class="align-top {{ $loop->even ? 'bg-green-50 maturity-level-row-alt' : 'bg-white dark:bg-transparent' }}">
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="text-lg font-bold text-gray-800 dark:text-white">{{ $case->value }}</div>
                                    <div class="text-xs font-semibold text-gray-500 dark:text-gray-400">{{ $case->label() }}</div>
                                </td>
                                <td class="px-4 py-3 text-gray-600 dark:text-gray-300">
                                    <ul class="list-disc space-y-1 pl-4">
                                        @foreach ($case->criteria() as $point)
                                            <li>{{ $point }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="px-4 py-3 text-gray-600 dark:text-gray-300">
                                    <ul class="list-disc space-y-1 pl-4">
                                        @foreach ($case->explanation() as $point)
                                            <li>{{ $point }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</span>
