@extends('layouts.app-full')
@section('title', 'Risk Assessment')
@section('title_ar', 'تقييم المخاطر')
@section('parent_title', 'Risk Assessments Summary')
@section('parent_url', route('risk-assessments.index'))
@section('breadcrumb_title', $riskAssessment->risk_assessment_name)
@section('content')
    <div>
        <x-table.action-wrapper title="Risk Assessment">
            <x-action.button label="View" label_ar="منظر" route_name="risk-assessments.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="risk-assessments.edit"
                route_param="{{ $riskAssessment->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Risk Assessment ID" label_ar="رمز تقييم المخاطر">
                    {{ $riskAssessment->risk_assessment_id }}
                </x-info-col>
                <x-info-col label="Risk Assessment Name" label_ar="اسم تقييم المخاطر">
                    {{ $riskAssessment->risk_assessment_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Risk Assessment Description" label_ar="وصف تقييم المخاطر">
                {{ $riskAssessment->risk_assessment_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Risk Assessment Start Date" label_ar="تاريخ بدء تقييم المخاطر">
                    {{ $riskAssessment->risk_assessment_start_date ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Assessment End Date" label_ar="تاريخ انتهاء تقييم المخاطر">
                    {{ $riskAssessment->risk_assessment_end_date ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Risk Assessment Type" label_ar="نوع تقييم المخاطر">
                    {{ $riskAssessment->risk_assessment_type ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Assessment Internal or External" label_ar="تقييم المخاطر الداخلية أو الخارجية">
                    {{ $riskAssessment->risk_assessment_internal_external ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Risk Assessment Approach" label_ar="نهج تقييم المخاطر">
                {{ $riskAssessment->risk_assessment_approach ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Risk Assessment Objectives" label_ar="أهداف تقييم المخاطر">
                {{ $riskAssessment->risk_assessment_objectives ?? '—' }}
            </x-info-col-lg>
            <x-info-col-lg label="Risk Assessment Scope" label_ar="نطاق تقييم المخاطر">
                {{ $riskAssessment->risk_assessment_scope ?? '—' }}
            </x-info-col-lg>
            <x-info-col-lg label="Standard References" label_ar="مراجع معايير">
                {{ $riskAssessment->standard_references ?? '—' }}
            </x-info-col-lg>
            <x-info-col-lg label="Risk Assessing Entity" label_ar="ضوابط تقييم الجهة">
                {{ $riskAssessment->risk_assessing_entity ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Risk Assessment Against" label_ar="المخاطر تقييم الجهة">
                    {{ $riskAssessment->risk_assessment_against ?? '—' }}
                </x-info-col>
                <x-info-col label="Location Name" label_ar="اسم الموقع">
                    {{ $riskAssessment->location?->location_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Auditor Name" label_ar="اسم مدقق">
                    {{ $riskAssessment->auditor->auditor_first_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Classification Name" label_ar="اسم التصنيف">
                    {{ $riskAssessment->classification?->classification_name ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>

        <div class="px-4 py-4 border-t border-gray-100 dark:border-gray-700 space-y-3">
            <div class="grid grid-cols-2 gap-3">
                {{-- Open --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden">
                    <div class="h-1 bg-error-500"></div>
                    <div class="px-4 py-3">
                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-1">Open</p>
                        <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $findingStats['open'] }}</p>
                        <div class="mt-2 flex items-center gap-2">
                            <div class="h-1.5 flex-1 rounded-full bg-gray-100 dark:bg-gray-700 overflow-hidden">
                                <div class="h-full bg-error-500 rounded-full" style="width: {{ $totalFindings > 0 ? round($findingStats['open'] / $totalFindings * 100) : 0 }}%"></div>
                            </div>
                            <span class="text-xs text-gray-400 shrink-0">{{ $totalFindings > 0 ? round($findingStats['open'] / $totalFindings * 100) : 0 }}%</span>
                        </div>
                    </div>
                </div>

                {{-- Close --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden">
                    <div class="h-1 bg-success-500"></div>
                    <div class="px-4 py-3">
                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-1">Close</p>
                        <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $findingStats['close'] }}</p>
                        <div class="mt-2 flex items-center gap-2">
                            <div class="h-1.5 flex-1 rounded-full bg-gray-100 dark:bg-gray-700 overflow-hidden">
                                <div class="h-full bg-success-500 rounded-full" style="width: {{ $completionPercent }}%"></div>
                            </div>
                            <span class="text-xs text-gray-400 shrink-0">{{ $completionPercent }}%</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Assessment Progress --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 shadow-sm px-4 py-3">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-semibold uppercase tracking-widest text-gray-400">Assessment Progress</span>
                    <div class="flex items-center gap-2">
                        @if ($totalFindings >= $scopedRisksCount && $scopedRisksCount > 0)
                            <span class="inline-flex items-center gap-1.5 rounded-full border border-success-200 bg-success-50 px-2.5 py-0.5 text-xs font-medium text-success-700">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                                Complete
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 rounded-full border border-warning-200 bg-warning-50 px-2.5 py-0.5 text-xs font-medium text-warning-700">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                </svg>
                                {{ $scopedRisksCount - $totalFindings }} risks remaining
                            </span>
                        @endif
                        <span class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ $riskCoveragePercent }}%</span>
                    </div>
                </div>
                <div class="h-2 rounded-full bg-gray-100 dark:bg-gray-700 overflow-hidden">
                    <div class="h-full rounded-full bg-brand-500 transition-all duration-500" style="width: {{ $riskCoveragePercent }}%"></div>
                </div>
                <div class="mt-2 flex items-center justify-between text-xs text-gray-400">
                    <span>{{ $totalFindings }} assessed</span>
                    <span>{{ $scopedRisksCount }} total risks</span>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-100 p-2 sm:p-6">
            <x-form.grid-3-col>
                <div>
                    <x-form.field name="search" label="Search" label_ar="بحث"
                        placeholder="Search by ID or name…" :value="request('search')" />
                </div>
                <div>
                    <x-form.select name="status" label="Status" label_ar="الحالة"
                        :custom_data="['Open', 'Close']"
                        :value="request('status')" />
                </div>
                <div class="flex items-end">
                    <button id="findings-clear" class="action-btn text-center justify-center">Clear Filters</button>
                </div>
            </x-form.grid-3-col>
        </div>
        <div id="findings-wrapper">
            @include('process/assessments/risk-assessments/_findings-table')
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function fetchFindings(url) {
        const wrapper = document.getElementById('findings-wrapper');
        wrapper.style.opacity = '0.5';
        wrapper.style.pointerEvents = 'none';

        fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function (r) { return r.text(); })
            .then(function (html) {
                wrapper.innerHTML = html;
                wrapper.style.opacity = '';
                wrapper.style.pointerEvents = '';
                if (window.Alpine) { Alpine.initTree(wrapper); }
                (wrapper.querySelector('thead') || wrapper).scrollIntoView({ behavior: 'smooth', block: 'start' });
            })
            .catch(function () {
                wrapper.style.opacity = '';
                wrapper.style.pointerEvents = '';
            });
    }

    function buildUrl(page) {
        const params = new URLSearchParams(window.location.search);
        params.set('page', page || 1);
        params.set('search', document.getElementById('search').value);
        const status = document.getElementById('status').value;
        if (status) { params.set('status', status); } else { params.delete('status'); }
        return window.location.pathname + '?' + params.toString();
    }

    document.getElementById('findings-wrapper').addEventListener('click', function (e) {
        const link = e.target.closest('a');
        if (!link || !link.href.includes('page=')) return;
        e.preventDefault();
        const page = new URL(link.href).searchParams.get('page');
        fetchFindings(buildUrl(page));
    });

    let debounceTimer;
    document.getElementById('search').addEventListener('input', function () {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(function () { fetchFindings(buildUrl(1)); }, 300);
    });

    document.getElementById('status').addEventListener('change', function () {
        fetchFindings(buildUrl(1));
    });

    document.getElementById('findings-clear').addEventListener('click', function () {
        document.getElementById('search').value = '';
        document.getElementById('status').value = '';
        fetchFindings(window.location.pathname);
    });
</script>
@endpush
