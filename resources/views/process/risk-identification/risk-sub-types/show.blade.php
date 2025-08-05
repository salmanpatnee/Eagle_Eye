@extends('layouts.risk')
@section('title', 'Risk Sub-Types')
@section('title_ar', 'النوع الفرعي للمخاطر')

@section('content')
    <div>
        <x-table.action-wrapper title="Risk Sub-Type Details">
            <x-action.button label="View" label_ar="منظر" route_name="risk-sub-types.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="risk-sub-types.edit"
                route_param="{{ $riskSubType->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Risk Sub-Type ID" label_ar="رمز النوع الفرعي للمخاطر">
                    {{ $riskSubType->risk_sub_type_id }}
                </x-info-col>

                <x-info-col label="Risk Sub-Type Name" label_ar="اسم النوع الفرعي للمخاطر">
                    {{ $riskSubType->risk_sub_type_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Risk Sub-Type Description" label_ar="وصف النوع الفرعي للمخاطر">
                {{ $riskSubType->risk_sub_type_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Risk Type" label_ar="اسم النوع  للمخاطر">
                    {{ $riskSubType->type->risk_type_name }}
                </x-info-col>
            </x-info-row>

        </div>
    </div>
@endsection
