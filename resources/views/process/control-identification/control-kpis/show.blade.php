@extends('layouts.control')
@section('title', 'KPI Standards')
@section('title_ar', 'معيار مؤشرات الأداء الرئيسية')

@section('content')
    <div>
        <x-table.action-wrapper title="KPI Standard Details">
            <x-action.button label="View" label_ar="منظر" route_name="kpi-standards.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="kpi-standards.edit"
                route_param="{{ $kpiStandard->kpi_id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="KPI Standard ID" label_ar="رمز مؤشر الأداء الرئيسية">
                    {{ $kpiStandard->kpi_id }}
                </x-info-col>
                <x-info-col label="KPI Standard Name" label_ar="اسم مؤشر الأداء الرئيسية">
                    {{ $kpiStandard->kpi_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Reference" label_ar="المرجع">
                    {{ $kpiStandard->reference }}
                </x-info-col>
                <x-info-col label="Priority" label_ar="الأولوية">
                    {{ $kpiStandard->priority }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Category" label_ar="الفئة">
                    {{ $kpiStandard?->category?->category_name }}
                </x-info-col>
                <x-info-col label="Best Practice" label_ar="أفضل الممارسات">
                    {{ $kpiStandard?->bestPractice?->best_practice_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="KPI Frequency Value" label_ar="تكرار قيمة المؤشر الرئيسي">
                    {{ $kpiStandard->kpi_frequency_value }}
                </x-info-col>
                <x-info-col label="KPI Frequency Unit" label_ar="وحدة تكرار المؤشر الرئيسي">
                    {{ $kpiStandard->kpi_frequency_unit }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Remarks" label_ar="ملاحظات">
                {!! $kpiStandard->remarks ?? '—' !!}
            </x-info-col-lg>
            <x-info-col-lg label="Frequency" label_ar="تكرار">
                {!! html_entity_decode($kpiStandard?->kpi_value) !!}
            </x-info-col-lg>

        </div>
    </div>
@endsection
