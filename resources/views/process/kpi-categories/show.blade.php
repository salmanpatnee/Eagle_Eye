@extends('layouts/kpi')
@section('title', 'KPI Categories')
@section('title_ar', 'مؤشرات الأداء الرئيسية')
@section('parent_title', 'KPI Categories')
@section('parent_url', route('kpi-categories.index'))
@section('breadcrumb_title', $kpiCategory->kpi_name)
@section('content')
    <div>
        <x-table.action-wrapper title="KPI Category Details">
            <x-action.button label="View" label_ar="منظر" route_name="kpi-categories.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="kpi-categories.edit"
                route_param="{{ $kpiCategory->kpi_id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="KPI Category ID" label_ar="رمز مؤشرات الأداء الرئيسية">
                    {{ $kpiCategory->kpi_id }}
                </x-info-col>
                <x-info-col label="KPI Category Name" label_ar="اسم مؤشرات الأداء الرئيسية">
                    {{ $kpiCategory->kpi_name }}
                </x-info-col>
            </x-info-row>
            <x-info-row>
                <x-info-col label="KPI Category Name Arabic" label_ar="اسم عربي مؤشر الأداء الرئيسية">
                    <span dir="rtl" lang="ar">{{ $kpiCategory->kpi_name_ar }}</span>
                </x-info-col>

            </x-info-row>

            <x-info-col-lg label="KPI Recommendation" label_ar="توصية مؤشر الأداء الرئيسية">
                {{ $kpiCategory->conclusion ?? '—' }}
            </x-info-col-lg>

        </div>
    </div>
@endsection
