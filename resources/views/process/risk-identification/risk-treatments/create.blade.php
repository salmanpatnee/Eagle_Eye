@extends('layouts.risk')
@section('title', 'Risk Treatment Options')
@section('title_ar', 'خيارات علاج المخاطر')
@section('parent_url', route('risk-treatment-options.index'))
@if(isset($riskTreatmentOption))
    @section('parent_title', 'Risk Treatment Options')
    @section('breadcrumb_title', $riskTreatmentOption->risk_treatment_name)
@endif

@section('content')
    <div>
        <x-table.action-wrapper title="{{ $riskTreatmentOption?->id ? 'Update' : 'New' }} Risk Treatment Option">
            <x-action.button label="View" label_ar="منظر" route_name="risk-treatment-options.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($riskTreatmentOption) ? route('risk-treatment-options.update', $riskTreatmentOption->id) : route('risk-treatment-options.store') }}"
            method="POST">
            @csrf
            @if (isset($riskTreatmentOption))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Risk Treatment ID" label_ar="رمز خيارات علاج المخاطر" name="risk_treatment_id"
                            required="true" :readonly="$riskTreatmentOption?->risk_treatment_id" placeholder="Enter Risk Treatment ID" :value="$riskTreatmentOption?->risk_treatment_id" />
                    </div>
                    <div>
                        <x-form.field label="Risk Treatment Name" label_ar="اسم خيارات علاج المخاطر"
                            name="risk_treatment_name" required="true" placeholder="Enter Risk Treatment Name"
                            :value="$riskTreatmentOption?->risk_treatment_name" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Risk Treatment Description" label_ar="وصف خيارات علاج المخاطر"
                    name="risk_treatment_description" placeholder="Enter Risk Treatment Description" :value="$riskTreatmentOption?->risk_treatment_description" />


                <div class="flex justify-end">
                    <x-form.submit label="Risk Treatment Option" label_ar="خيارات علاج المخاطر" :isUpdate="$riskTreatmentOption?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
