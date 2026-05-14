@extends('layouts.app-full')
@section('title', 'Audit Assessments Summary')
@section('title_ar', 'ملخص تقييم مراجعة')
@section('content')
    <div>
        <x-table.action-wrapper title="Audit Assessment">
            <x-action.button label="View" label_ar="منظر" route_name="audit-assessments.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="audit-assessments.edit"
                route_param="{{ $auditAssessment->id }}" />
            @if ($auditAssessment->status !== 'Completed')
                @auth
                    @if (auth()->user()->canWrite())
                        <form action="{{ route('audit-assessments.complete', $auditAssessment->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="submit-btn bg-success-600 hover:bg-success-700">
                                <span class="inline mx-2">Mark as Completed</span>
                                <span class="inline text-xs font-semibold leading-tight" dir="rtl" lang="ar">إغلاق المراجعة</span>
                            </button>
                        </form>
                    @endif
                @endauth
            @endif
        </x-table.action-wrapper>



        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Audit Assessment ID" label_ar="رمز تقييم مراجعة">
                    {{ $auditAssessment->audit_id }}
                </x-info-col>
                <x-info-col label="Audit Assessment Name" label_ar="اسم تقييم مراجعة">
                    {{ $auditAssessment->audit_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Audit Assessment Description" label_ar="وصف تقييم مراجعة">
                {{ $auditAssessment->audit_description ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Audit Assessment Objective" label_ar="أهداف تقييم مراجعة">
                {{ $auditAssessment->audit_objectives ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Classification Name" label_ar="اسم التصنيف">
                    {{ $auditAssessment->classification?->classification_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Location Name" label_ar="اسم الموقع">
                    {{ $auditAssessment->location?->location_name ?? '—' }}
                </x-info-col>

            </x-info-row>

            <x-info-row>
                <x-info-col label="Audit Assessment Start Date" label_ar="تاريخ بدء تقييم مراجعة">
                    {{ $auditAssessment->audit_start_date ?? '—' }}
                </x-info-col>
                <x-info-col label="Audit Assessment End Date" label_ar="تاريخ انتهاء تقييم مراجعة">
                    {{ $auditAssessment->audit_end_date ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Audit Assessment Type" label_ar="نوع تقييم مراجعة">
                    {{ $auditAssessment->audit_type ?? '—' }}
                </x-info-col>
                <x-info-col label="Audit Assessment Internal or External" label_ar="تقييم مراجعة الداخلية أو الخارجية">
                    {{ $auditAssessment->audit_internal_external ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Auditing Entity" label_ar="الجهة المراجعة">
                    {{ $auditAssessment->auditing_entity ?? '—' }}
                </x-info-col>
                <x-info-col label="Auditor Name" label_ar="اسم مدقق">
                    {{ $auditAssessment->auditor->auditor_first_name }}
                    {{ $auditAssessment->auditor->auditor_last_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Audit Approach" label_ar="نهج تقييم مراجعة">
                {{ $auditAssessment->audit_approach ?? '—' }}
            </x-info-col-lg>


            <x-info-col-lg label="Audit Scope" label_ar="نطاق تقييم مراجعة">
                {{ $auditAssessment->audit_scope ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Standard References" label_ar="مراجع معايير">
                {{ $auditAssessment->standard_references ?? '—' }}
            </x-info-col-lg>


            <x-info-row>
                <x-info-col label="Best Practice Name" label_ar="اسم أفضل الممارسات">
                    {{ $auditAssessment->bestPractice?->best_practices_name ?? '—' }}
                </x-info-col>

            </x-info-row>
        </div>
        <div class="border-t border-gray-100 p-2 sm:p-6">
            <x-form.grid-3-col>
                <div>
                    <x-form.field name="search" label="Search" label_ar="بحث"
                        placeholder="Search by ID or name…" :value="request('search')" />
                </div>
                <div>
                    <x-form.select name="status" label="Status" label_ar="الحالة"
                        :custom_data="['Open - Not Started', 'Open - WIP', 'Closed']"
                        :value="request('status')" />
                </div>
                <div class="flex items-end">
                    <button id="findings-clear" class="action-btn text-center justify-center">Clear Filters</button>
                </div>
            </x-form.grid-3-col>
        </div>
        <div id="findings-wrapper">
            @include('process/assessments/audit-assessments/_findings-table')
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
