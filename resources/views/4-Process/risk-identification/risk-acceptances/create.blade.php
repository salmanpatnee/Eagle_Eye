@extends('layouts.risk-acceptance')
@section('title', 'Risk Acceptance')
@section('title_ar', 'قبول المخاطر')

@section('content')
    <div>
        <x-table.action-wrapper title="{{ $riskAcceptance?->id ? 'Update' : 'New' }} Risk Acceptance">
            <x-action.button label="View" label_ar="منظر" route_name="risk-acceptances.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($riskAcceptance) ? route('risk-acceptances.update', $riskAcceptance->id) : route('risk-acceptances.store') }}"
            method="POST">
            @csrf
            @if (isset($riskAcceptance))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Risk Acceptance ID" label_ar="رمز قبول المخاطر" name="risk_acceptance_id"
                            required="true" :readonly="$riskAcceptance?->risk_acceptance_id" placeholder="Enter Risk Acceptance ID" :value="$riskAcceptance?->risk_acceptance_id" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>


                <x-form.textarea-field label="Risk Acceptance Description" label_ar="وصف قبول المخاطر"
                    name="risk_acceptance_description" placeholder="Enter Risk Acceptance Description" :value="$riskAcceptance?->risk_acceptance_description" />

                <x-form.textarea-field label="Risk Acceptance Source" label_ar="مصدر قبول المخاطر"
                    name="risk_acceptance_source" required="true" placeholder="Enter Risk Acceptance Source"
                    :value="$riskAcceptance?->risk_acceptance_source" />

                <x-form.textarea-field label="Risk Acceptance Details" label_ar="تفاصيل قبول المخاطر"
                    name="risk_acceptance_details" placeholder="Enter Risk Acceptance Description" :value="$riskAcceptance?->risk_acceptance_details" />

                <x-form.grid-col>
                    <div>
                        <x-form.label label="Risk Acceptance Start Date" label_ar="تاريخ بدء قبول المخاطر"
                            for="risk_acceptance_start_date" />
                        <div class="relative">
                            <input type="date" id="risk_acceptance_start_date" name="risk_acceptance_start_date" required
                                value="{{ old('risk_acceptance_start_date', $riskAcceptance?->risk_acceptance_start_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                    <div>
                        <x-form.label label="Risk Acceptance End Date" label_ar="تاريخ انتهاء قبول المخاطر"
                            for="risk_acceptance_end_date" />
                        <div class="relative">
                            <input type="date" id="risk_acceptance_end_date" name="risk_acceptance_end_date" required
                                value="{{ old('risk_acceptance_end_date', $riskAcceptance?->risk_acceptance_end_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Control Name" label_ar="اسم الضوابط" name="control_id" required="true"
                            :value="$riskAcceptance?->control_id" :data="$controls" id_key="control_id" value_key="control_name" />
                    </div>
                    <div></div>
                </x-form.grid-col>

                <div class="flex justify-end">
                    <x-form.submit label="Risk Acceptance" label_ar="قبول المخاطر" :isUpdate="$riskAcceptance?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
