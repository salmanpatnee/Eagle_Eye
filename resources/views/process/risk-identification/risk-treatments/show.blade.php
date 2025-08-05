@extends('layouts.risk')
@section('title', 'Risk Treatment Options')
@section('title_ar', 'خيارات علاج المخاطر')

@section('content')
    <div>
        <x-table.action-wrapper title="Risk Treatment Details">
            <x-action.button label="View" label_ar="منظر" route_name="risk-treatment-options.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="risk-treatment-options.edit"
                route_param="{{ $riskTreatmentOption->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Risk Treatment ID" label_ar="رمز خيارات علاج المخاطر">
                    {{ $riskTreatmentOption->risk_treatment_id }}
                </x-info-col>

                <x-info-col label="Risk Treatment Name" label_ar="اسم خيارات علاج المخاطر">
                    {{ $riskTreatmentOption->risk_treatment_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Risk Treatment Description" label_ar="عنوان خيارات علاج المخاطر">
                {{ $riskTreatmentOption->risk_treatment_description ?? '—' }}
            </x-info-col-lg>

        </div>
    </div>
@endsection
