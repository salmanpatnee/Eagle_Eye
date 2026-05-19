@extends('layouts.risk')
@section('title', 'Key Performance Indicators')
@section('title_ar', 'مؤشرات الأداء الرئيسية')
@section('parent_title', 'Key Performance Indicators')
@section('parent_url', route('kpis.index'))
@section('breadcrumb_title', $kpi->key_performance_indicatory_id)

@section('content')
    <div>
        <x-table.action-wrapper title="Key Performance Indicator Details">
            <x-action.button label="View" label_ar="منظر" route_name="kpis.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="kpis.edit" route_param="{{ $kpi->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Key Performance Indicator ID" label_ar="رمز مؤشرات الأداء الرئيسية">
                    {{ $kpi->key_performance_indicatory_id }}
                </x-info-col>

                <x-info-col label="Key Performance Indicator Name" label_ar="اسم مؤشرات الأداء الرئيسية">
                    {{ $kpi->key_performance_indicatory_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Key Performance Indicator Source" label_ar="مصدر مؤشرات الأداء الرئيسية">
                    {{ $kpi->key_performance_indicatory_source }}
                </x-info-col>

                <x-info-col label="Key Performance Indicator Value" label_ar="قيمة مؤشرات الأداء الرئيسية">
                    {{ $kpi->key_performance_indicatory_value }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Key Performance Indicator Description" label_ar="عنوان مؤشرات الأداء الرئيسية">
                {{ $kpi->key_performance_indicatory_description ?? '—' }}
            </x-info-col-lg>

        </div>
    </div>
@endsection
