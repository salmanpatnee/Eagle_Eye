@extends('layouts.risk')
@section('title', 'Key Risk Indicators')
@section('title_ar', 'مؤشرات المخاطر الرئيسية')
@section('parent_title', 'Key Risk Indicators')
@section('parent_url', route('kris.index'))
@section('breadcrumb_title', $kri->key_risk_indicator_id)

@section('content')
    <div>
        <x-table.action-wrapper title="Key Risk Indicator Details">
            <x-action.button label="View" label_ar="منظر" route_name="kris.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="kris.edit" route_param="{{ $kri->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Key Risk Indicator ID" label_ar="رمز مؤشرات المخاطر الرئيسية">
                    {{ $kri->key_risk_indicator_id }}
                </x-info-col>

                <x-info-col label="Key Risk Indicator Name" label_ar="اسم مؤشرات المخاطر الرئيسية">
                    {{ $kri->key_risk_indicator_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Key Risk Indicator Source" label_ar="مصدر مؤشرات المخاطر الرئيسية">
                    {{ $kri->key_risk_indicator_source }}
                </x-info-col>

                <x-info-col label="Key Risk Indicator Value" label_ar="قيمة مؤشرات المخاطر الرئيسية">
                    {{ $kri->key_risk_indicator_value }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Key Risk Indicator Description" label_ar="عنوان مؤشرات المخاطر الرئيسية">
                {{ $kri->key_risk_indicator_description ?? '—' }}
            </x-info-col-lg>

        </div>
    </div>
@endsection
