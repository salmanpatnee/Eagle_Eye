@extends('layouts.risk')
@section('title', 'Risk Inherent')
@section('title_ar', 'المخاطر الكامنة')

@section('content')
    @php
        $score = ['1', '2', '3', '4', '5'];
    @endphp
    <div>
        <x-table.action-wrapper title="{{ $riskInherent?->id ? 'Update' : 'New' }} Risk Inherent">
            <x-action.button label="View" label_ar="منظر" route_name="risk-inherents.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($riskInherent) ? route('risk-inherents.update', $riskInherent->id) : route('risk-inherents.store') }}"
            method="POST">
            @csrf
            @if (isset($riskInherent))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Risk Inherent ID" label_ar="رمز المخاطر الكامنة" name="risk_inherent_id"
                            required="true" :readonly="$riskInherent?->risk_inherent_id" placeholder="Enter Risk Inherent ID" :value="$riskInherent?->risk_inherent_id" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>


                <x-form.textarea-field label="Risk Inherent Description" label_ar="وصف المخاطر الكامنة"
                    name="risk_inherent_description" placeholder="Enter Risk Inherent Description" :value="$riskInherent?->risk_inherent_description" />

                <div x-data="{
                    likelihood: '{{ old('risk_inherent_likelihood', $riskInherent?->risk_inherent_likelihood) }}',
                    impact: '{{ old('risk_inherent_impact', $riskInherent?->risk_inherent_impact) }}',
                    get score() {
                        let l = parseInt(this.likelihood) || 0;
                        let i = parseInt(this.impact) || 0;
                        return l * i;
                    }
                }">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-form.select label="Risk Appetite Name" label_ar="اسم الرغبة في المخاطرة"
                                name="risk_appetite_id" required="true" :value="$riskInherent?->risk_appetite_id" :data="$riskAppetites"
                                id_key="risk_appetite_id" value_key="risk_appetite_name" />
                        </div>
                        <div>
                            <x-form.select label="Risk Likelihood" label_ar="احتمالات المخاطرة"
                                name="risk_inherent_likelihood" required="true" :value="$riskInherent?->risk_inherent_likelihood" :custom_data="$score"
                                x-model="likelihood" />
                        </div>
                        <div>
                            <x-form.select label="Risk Impact" label_ar="تأثير المخاطر" name="risk_inherent_impact"
                                required="true" :value="$riskInherent?->risk_inherent_impact" :custom_data="$score" x-model="impact" />
                        </div>
                        <div>
                            <x-form.label for="risk_inherent_score" label="Risk Score" label_ar="درجة المخاطرة" />
                            <input type="number" id="risk_inherent_score" name="risk_inherent_score" class="input-field"
                                placeholder="0" readonly required x-bind:value="score">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <x-form.submit label="Risk Inherent" label_ar="المخاطر الكامنة" :isUpdate="$riskInherent?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
