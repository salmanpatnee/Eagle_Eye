@extends('layouts.risk-appetite')
@section('title', 'Risk Appetite')
@section('title_ar', 'الرغبة في المخاطرة')

@section('content')
    <div>
        <x-table.action-wrapper title="New Risk Appetite">
            <x-action.button label="View" label_ar="منظر" route_name="risk-appetites.index" />
        </x-table.action-wrapper>

        <form action="{{ route('risk-appetites.store') }}" method="POST">
            @csrf
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Risk Appetite ID" label_ar="رمز الرغبة في المخاطرة"
                            name="risk_appetite_id" required="true" placeholder="Enter Risk Appetite ID" />
                    </div>
                    <div>
                        <x-form.field label="Risk Appetite Name" label_ar="اسم الرغبة في المخاطرة"
                            name="risk_appetite_name" required="true" placeholder="Enter Risk Appetite Name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Risk Appetite Description" label_ar="وصف الرغبة في المخاطرة"
                        name="risk_appetite_description" placeholder="Enter Risk Appetite Description" />
                </x-form.grid-col-full>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Likelihood" label_ar="احتمالات المخاطرة"
                            name="risk_likelihood" required="true" :custom_data="[1, 2, 3, 4, 5]" />
                    </div>
                    <div>
                        <x-form.select label="Risk Impact" label_ar="تأثير المخاطر"
                            name="risk_impact" required="true" :custom_data="[1, 2, 3, 4, 5]" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Risk Score" label_ar="درجة المخاطرة"
                            name="risk_score" readonly="true" placeholder="Auto-calculated" />
                    </div>
                    <div>
                        <x-form.field label="Risk Appetite Color" label_ar="لون الرغبة في المخاطرة"
                            name="risk_appetite_color" readonly="true" placeholder="Auto-assigned" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Risk Appetite Upper Limit" label_ar="الحد الأعلى للرغبة في المخاطرة"
                            name="risk_appetite_upper_limit" placeholder="Enter Upper Limit" />
                    </div>
                    <div>
                        <x-form.field label="Risk Appetite Lower Limit" label_ar="الحد السفلي للرغبة في المخاطرة"
                            name="risk_appetite_lower_limit" placeholder="Enter Lower Limit" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.field label="Risk Sensitivity" label_ar="حساسية المخاطر"
                        name="risk_sensitivity" placeholder="Enter Risk Sensitivity" />
                </x-form.grid-col-full>

                <x-form.grid-col-full>
                    <x-form.field label="Risk Implication" label_ar="آثار المخاطر"
                        name="risk_implication" placeholder="Enter Risk Implication" />
                </x-form.grid-col-full>

                <div class="flex justify-end">
                    <x-form.submit label="Risk Appetite" label_ar="الرغبة في المخاطرة" :isUpdate="false" />
                </div>

            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const likelihoodSelect = document.getElementById('risk_likelihood');
            const impactSelect = document.getElementById('risk_impact');
            const scoreInput = document.getElementById('risk_score');
            const colorInput = document.getElementById('risk_appetite_color');

            function updateScore() {
                const likelihood = parseInt(likelihoodSelect.value) || 0;
                const impact = parseInt(impactSelect.value) || 0;
                const score = likelihood * impact;
                scoreInput.value = score || '';

                if (score <= 2) {
                    colorInput.value = 'Very Low';
                    colorInput.style.backgroundColor = '#00850A';
                } else if (score <= 4) {
                    colorInput.value = 'Low';
                    colorInput.style.backgroundColor = '#00FF78';
                } else if (score <= 9) {
                    colorInput.value = 'Medium';
                    colorInput.style.backgroundColor = '#ECFF00';
                } else if (score <= 15) {
                    colorInput.value = 'High';
                    colorInput.style.backgroundColor = '#FFB600';
                } else {
                    colorInput.value = 'Critical';
                    colorInput.style.backgroundColor = '#FF0000';
                }
            }

            likelihoodSelect.addEventListener('change', updateScore);
            impactSelect.addEventListener('change', updateScore);
        });
    </script>
@endsection
