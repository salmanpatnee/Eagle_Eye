@extends('layouts.risk')
@section('title', 'Risk Types')
@section('title_ar', 'النوع للمخاطر')
@section('parent_title', 'Risk Types')
@section('parent_url', route('risk-types.index'))
@section('breadcrumb_title', $riskType->risk_type_name)

@section('content')
    <div>
        <x-table.action-wrapper title="Risk Type Details">
            <x-action.button label="View" label_ar="منظر" route_name="risk-types.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="risk-types.edit" route_param="{{ $riskType->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Risk Type ID" label_ar="رمز النوع للمخاطر">
                    {{ $riskType->risk_type_id }}
                </x-info-col>

                <x-info-col label="Risk Type Name" label_ar="اسم النوع للمخاطر">
                    {{ $riskType->risk_type_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Risk Type Description" label_ar="وصف النوع للمخاطر">
                {{ $riskType->risk_type_description ?? '—' }}
            </x-info-col-lg>

        </div>
    </div>
@endsection
