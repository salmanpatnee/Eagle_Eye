@extends('layouts.risk-acceptance')
@section('title', 'Risk Acceptance')
@section('title_ar', 'قبول المخاطر')

@section('content')
    <div>
        <x-table.action-wrapper title="Risk Acceptance Details">
            <x-action.button label="View" label_ar="منظر" route_name="risk-acceptances.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="risk-acceptances.edit"
                route_param="{{ $riskAcceptance->risk_acceptance_id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Risk Acceptance ID" label_ar="رمز قبول المخاطر">
                    {{ $riskAcceptance->risk_acceptance_id }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Risk Acceptance Description" label_ar="وصف قبول المخاطر">
                {{ $riskAcceptance->risk_acceptance_description ?? '—' }}
            </x-info-col-lg>
            <x-info-col-lg label="Risk Accepting Source" label_ar="مصدر قبول المخاطر">
                {{ $riskAcceptance->risk_acceptance_source ?? '—' }}
            </x-info-col-lg>
            <x-info-col-lg label="Risk Accepting Details" label_ar="تفاصيل قبول المخاطر">
                {{ $riskAcceptance->risk_acceptance_details ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Risk Acceptance Start Date" label_ar="تاريخ بدء قبول المخاطر">
                    {{ $riskAcceptance->risk_acceptance_start_date }}
                </x-info-col>
                <x-info-col label="Risk Acceptance End Date" label_ar="تاريخ انتهاء قبول المخاطر">
                    {{ $riskAcceptance->risk_acceptance_end_date }}
                </x-info-col>
            </x-info-row>


            <x-info-row>
                <x-info-col label="Control Name" label_ar="اسم الضوابط">
                    {{ $riskAcceptance->control->control_name ?? '—' }}
                </x-info-col>
            </x-info-row>

        </div>
    </div>
@endsection
