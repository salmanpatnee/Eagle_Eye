@extends('layouts.app-full')
@section('title', 'Controls Without Evidence')
@section('title_ar', 'الضوابط بدون أدلة')
@section('content')
    <div>
        <x-table.action-wrapper title="Controls Without Evidence" />

        <p class="mx-3 -mt-3 mb-4 text-sm text-gray-500 dark:text-gray-400">
            Surfaces every control mapped to a best practice that has no evidence on file yet — use it to
            close coverage gaps before an audit.
        </p>

        <form action="{{ route('controls-without-evidence.index') }}" method="GET">
            <div class="mx-3 mb-6 rounded-xl border border-gray-200 bg-gray-50/60 px-5 py-5 dark:border-gray-800 dark:bg-white/[0.02]">
                <div class="flex flex-wrap items-end justify-center gap-4">
                    <div class="w-full max-w-xs">
                        <x-form.select label="Best Practices" label_ar="أفضل الممارسات" name="practice"
                            :value="$bestPracticeId" :data="$practices" id_key="best_practices_id"
                            value_key="best_practices_name" onchange="this.form.submit()" searchable />
                    </div>
                    @if ($controls)
                        <span
                            class="inline-flex h-11 items-center gap-1.5 rounded-full border border-brand-200 bg-brand-50 px-3.5 text-xs font-semibold text-brand-700 dark:border-brand-500/30 dark:bg-brand-500/10 dark:text-brand-400">
                            <svg class="h-3.5 w-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h3.75M9 15.75h3.75M9 8.25h6M18 5.25v13.5a1.5 1.5 0 01-1.5 1.5h-9A1.5 1.5 0 016 18.75V5.25a1.5 1.5 0 011.5-1.5h9a1.5 1.5 0 011.5 1.5z" />
                            </svg>
                            {{ $controls->total() }} {{ $controls->total() === 1 ? 'control' : 'controls' }} found
                        </span>
                    @endif
                </div>
            </div>
        </form>

        @if (! $bestPracticeId)
            <div
                class="mx-3 mb-6 flex flex-col items-center gap-3 rounded-xl border border-dashed border-gray-200 bg-gray-50/60 px-6 py-14 text-center dark:border-gray-700 dark:bg-white/[0.02]">
                <span
                    class="flex h-12 w-12 items-center justify-center rounded-full bg-brand-50 text-brand-500 dark:bg-brand-500/10 dark:text-brand-400">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM20.25 20.25l-4.35-4.35" />
                    </svg>
                </span>
                <div>
                    <p class="text-base font-semibold text-gray-800 dark:text-white">Select a best practice</p>
                    <p class="mt-1 max-w-sm text-sm text-gray-500 dark:text-gray-400">
                        Choose a best practice above to see which of its controls have no evidence on file.
                    </p>
                </div>
            </div>
        @elseif ($controls->isEmpty())
            <div
                class="mx-3 mb-6 flex flex-col items-center gap-3 rounded-xl border border-dashed border-success-200 bg-success-50/50 px-6 py-14 text-center dark:border-success-500/20 dark:bg-success-500/5">
                <span
                    class="flex h-12 w-12 items-center justify-center rounded-full bg-success-100 text-success-600 dark:bg-success-500/10 dark:text-success-400">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </span>
                <div>
                    <p class="text-base font-semibold text-gray-800 dark:text-white">Fully covered</p>
                    <p class="mt-1 max-w-sm text-sm text-gray-500 dark:text-gray-400">
                        Every control under this best practice already has evidence linked. Nothing to chase down
                        here.
                    </p>
                </div>
            </div>
        @else
            <x-table.scroll-table height-offset="280">
                <x-slot:head>
                    <x-table.th label="S.No" label_ar="رقم" />
                    <x-table.th label="Control ID" label_ar="رمز الضوابط" />
                    <x-table.th label="Control Name" label_ar="اسم الضوابط" />
                    <x-table.th label="Control Type" label_ar="نوع الضوابط" />
                    <x-table.th label="Classification" label_ar="التصنيف" />
                    <x-table.th label="Owner" label_ar="المالك" />
                </x-slot:head>
                <x-slot:body>
                    @foreach ($controls as $control)
                        <tr class="transition-colors hover:bg-gray-50 dark:hover:bg-white/[0.03]">
                            <x-table.td><x-table.serial :loop="$loop" :paginator="$controls" /></x-table.td>
                            <x-table.td>
                                <a href="{{ route('controls.show', $control->id) }}"
                                    class="font-mono text-xs font-semibold text-brand-600 hover:underline dark:text-brand-400">
                                    {{ $control->control_id }}
                                </a>
                            </x-table.td>
                            <x-table.td min-width="250px" max-width="400px">
                                <span class="font-medium text-gray-800 dark:text-white">{{ $control->control_name }}</span>
                            </x-table.td>
                            <x-table.td>
                                @if ($control->type)
                                    <span
                                        class="inline-flex items-center rounded-md bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-700 dark:bg-white/5 dark:text-gray-300">
                                        {{ $control->type->control_type_name }}
                                    </span>
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </x-table.td>
                            <x-table.td>
                                @if ($control->classification)
                                    <span
                                        class="inline-flex items-center rounded-md bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-700 dark:bg-white/5 dark:text-gray-300">
                                        {{ $control->classification->classification_name }}
                                    </span>
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </x-table.td>
                            <x-table.td>
                                <span class="text-gray-600 dark:text-gray-300">{{ $control->owner?->owner_name ?? '—' }}</span>
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-slot:body>
            </x-table.scroll-table>

            <x-pagination>
                {{ $controls->links() }}
            </x-pagination>
        @endif
    </div>
@endsection
