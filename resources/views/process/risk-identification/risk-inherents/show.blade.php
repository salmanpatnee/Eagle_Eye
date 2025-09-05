@extends('layouts.risk-appetite')
@section('title', 'Risk Inherent')
@section('title_ar', 'المخاطر الكامنة')

@section('content')
    <div>
        <x-table.action-wrapper title="Risk Inherent Details">
            <x-action.button label="View" label_ar="منظر" route_name="risk-inherents.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="risk-inherents.edit"
                route_param="{{ $riskInherent->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Risk Inherent ID" label_ar="رمز المخاطر الكامنة">
                    {{ $riskInherent->risk_inherent_id }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Risk Inherent Description" label_ar="وصف المخاطر الكامنة">
                {{ $riskInherent->risk_inherent_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Risk Appetite Name" label_ar="اسم الرغبة في المخاطرة">
                    {{ $riskInherent?->riskAppetite->risk_appetite_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Impact" label_ar="تأثير المخاطر">
                    {{ $riskInherent->risk_inherent_impact ?? '—' }}
                </x-info-col>
            </x-info-row>
            <x-info-row>
                <x-info-col label="Risk Likelihod" label_ar="احتمالات المخاطرة">
                    {{ $riskInherent->risk_inherent_likelihood ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Score" label_ar="درجة المخاطرة">
                    {{ $riskInherent->risk_inherent_score ?? '—' }}
                </x-info-col>
            </x-info-row>


        </div>
    </div>
@endsection
