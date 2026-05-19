@extends('layouts.app-full')
@section('title', 'Risk Assessment Findings')
@section('title_ar', 'تقييم المخاطر نتائج نتائج')
@section('parent_url', route('risk-assessments.index'))
@section('parent_title', 'Risk Assessments Summary')
@section('parent2_url', route('risk-assessments.show', $riskAssessment))
@section('parent2_title', $riskAssessment->risk_assessment_name)
@if(isset($riskAssessmentFinding))
    @section('breadcrumb_title', $riskAssessmentFinding->risk_finding_name)
@endif
@section('content')
    @php
        $ratings = ['1', '2', '3', '4', '5'];
    @endphp

    <div>
        <x-table.action-wrapper title="{{ isset($riskAssessmentFinding) ? 'Update' : 'New' }} Risk Assessment Finding">
            <x-action.button label="View" label_ar="منظر" route_name="risk-assessments.index" />
        </x-table.action-wrapper>
        <h1 class="text-2xl text-center bg-brand-950 text-white py-2 font-medium">Risk Assessment Master</h1>
        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Risk Assessment ID" label_ar="رمز تقييم المخاطر">
                    {{ $riskAssessment->risk_assessment_id }}
                </x-info-col>
                <x-info-col label="Risk Assessment Name" label_ar="اسم تقييم المخاطر">
                    {{ $riskAssessment->risk_assessment_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Assessments" label_ar="تقييمات الضوابط">
                    <x-list
                        :data="$riskAssessment->controlAssessments"
                        id_key="control_assessment_id"
                        value_key="control_assessment_name"
                        empty_message="No control assessments linked."
                    />
                </x-info-col>
                <x-info-col label="Classification Name" label_ar="اسم التصنيف">
                    {{ $riskAssessment->classification?->classification_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Auditor Name" label_ar="اسم مدقق">
                    {{ $riskAssessment->auditor->auditor_first_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Assessment Date" label_ar="تاريخ تقييم المخاطر">
                    {{ $riskAssessment->risk_assessment_start_date }} {{ $riskAssessment->risk_assessment_end_date }}
                </x-info-col>
            </x-info-row>
        </div>
        <h1 class="text-2xl text-center bg-brand-950 text-white py-2 font-medium">Risk Assessment Finding</h1>
        <form
            action="{{ isset($riskAssessmentFinding) ? route('risk-assessment-findings.update', $riskAssessmentFinding->id) : route('risk-assessment-findings.store', $riskAssessment->id) }}"
            method="POST">
            @csrf
            @if (isset($riskAssessmentFinding))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Risk Assessment Finding ID" label_ar="رمز تقييم المخاطر نتائج"
                            name="risk_finding_id" required="true" placeholder="Enter Risk Assessment Finding ID"
                            :value="$riskAssessmentFinding?->risk_finding_id ?? old('risk_finding_id')" />
                    </div>
                    <div>
                        <x-form.field label="Risk Assessment Finding Name" label_ar="اسم تقييم المخاطر نتائج"
                            name="risk_finding_name" required="true" placeholder="Enter Risk Assessment Finding Name"
                            :value="$riskAssessmentFinding?->risk_finding_name ?? old('risk_finding_name')" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Risk Assessment Finding Description" label_ar="وصف تقييم المخاطر"
                    name="risk_finding_description" placeholder="Enter Risk Assessment Finding Description"
                    :value="$riskAssessmentFinding?->risk_finding_description ?? old('risk_finding_description')" />

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risks" label_ar="اسم المخاطر" name="risk_id" :value="$riskAssessmentFinding?->risk_id ?? old('risk_id')"
                            :data="$risks" id_key="risk_id" value_key="risk_name" required="true" />
                    </div>

                    <div>
                        <x-form.select label="Risk Status" label_ar="حالة المخاطر" name="implementation_status"
                            :value="$riskAssessmentFinding?->implementation_status ??
                                old('implementation_status', $riskAssessmentFinding?->implementation_status ?? 'Open')" :custom_data="['Open', 'Close']" required="true" />
                    </div>
                </x-form.grid-col>

                <div id="risk_conrol_status"></div>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Likelihood" label_ar="احتمالات المخاطرة" name="risk_likelihood"
                            :value="$riskAssessmentFinding?->risk_likelihood ??
                                old('risk_likelihood', $riskAssessmentFinding?->risk_likelihood ?? '1')" :custom_data="$ratings" required="true" />
                    </div>
                    <div>
                        <x-form.select label="Risk Impact" label_ar="تأثير المخاطرة" name="risk_impact" :value="$riskAssessmentFinding?->risk_impact ??
                            old('risk_impact', $riskAssessmentFinding?->risk_impact ?? '1')"
                            :custom_data="$ratings" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field type="number" readonly="true" label="Risk Score" label_ar="درجة المخاطرة"
                            name="risk_score" placeholder="0" :value="$riskAssessmentFinding?->risk_score ?? old('risk_score', 1)" />
                    </div>
                    <div>
                        <x-form.field readonly="true" label="Risk Appetite" label_ar="لون الجوع للمخاطرة"
                            name="appetiteColor" placeholder="" :value="$riskAssessmentFinding?->risk_appetite ?? old('risk_appetite')" />
                        <div class="hidden">
                            <x-form.field hidden label="Risk Appetite" label_ar="لون الجوع للمخاطرة" name="risk_appetite"
                                placeholder="" :value="$riskAssessmentFinding?->risk_appetite ?? old('risk_appetite')" />
                            <x-form.field hidden label="Risk Appetite" label_ar="لون الجوع للمخاطرة"
                                name="risk_appetite_color" placeholder="" :value="$riskAssessmentFinding?->risk_appetite ?? old('risk_appetite')" />
                        </div>
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Risk Implementation Details" label_ar="تفاصيل تنفيذ التحكم"
                    name="implementation_details" placeholder="Enter Risk Implementation Details" :value="$riskAssessmentFinding?->implementation_details ?? old('implementation_details')" />


                <x-form.textarea-field label="Risk Maturity Justification" label_ar="مبرر نضج التحكم"
                    name="maturity_justification" placeholder="Enter Risk Maturity Justification" :value="$riskAssessmentFinding?->maturity_justification ?? old('maturity_justification')" />



                <x-form.textarea-field label="Risk Assessment Remarks" label_ar="ملاحظات تقييم المخاطر" name="Remarks"
                    placeholder="Enter Risk Assessment Remarks" :value="$riskAssessmentFinding?->Remarks ?? old('Remarks')" />

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Auditee Name" label_ar="الشخص الذي يتم التدقيق عليه" name="risk_auditee_name"
                            placeholder="Enter Auditee Name" :value="$riskAssessmentFinding?->risk_auditee_name ?? old('risk_auditee_name')" />
                    </div>
                    <div>
                        <x-form.field label="Auditee Department" label_ar="القسم الذي يتم التدقيق عليه"
                            name="risk_auditee_department" placeholder="Enter Auditee Name" :value="$riskAssessmentFinding?->risk_auditee_department ??
                                old('risk_auditee_department')" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Auditee System" label_ar="تم تدقيق النظام" name="risk_auditee_system"
                            placeholder="Enter Auditee System" :value="$riskAssessmentFinding?->risk_auditee_system ?? old('risk_auditee_system')" />
                    </div>
                    <div>
                        <x-form.select label="Risk Treatment" label_ar="اسم خيارات علاج المخاطر" name="risk_treatment_id"
                            required="true" :value="$riskAssessmentFinding?->risk_treatment_id" :data="$treatments" id_key="risk_treatment_id"
                            value_key="risk_treatment_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Corrective Action" label_ar="إجراءات التصحيح" name="corrective_action"
                            placeholder="Enter Corrective Action" :value="$riskAssessmentFinding?->corrective_action ?? old('corrective_action', 'None')" />
                    </div>
                    <div>
                        <x-form.label label="Corrective Action Due Date" label_ar="تاريخ استحقاق إجراءات التصحيح"
                            for="corrective_action_due_date" />
                        <div class="relative">
                            <input type="date" id="corrective_action_due_date" name="corrective_action_due_date"
                                value="{{ old('corrective_action_due_date', $riskAssessmentFinding?->corrective_action_due_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Preventive Action" label_ar="إجراءات الوقائي" name="preventive_action"
                            placeholder="Enter Preventive Action" :value="$riskAssessmentFinding?->preventive_action ?? old('preventive_action', 'None')" />
                    </div>
                    <div>
                        <x-form.label label="Preventive Action Due Date" label_ar="تاريخ استحقاق إجراءات الوقائي"
                            for="preventive_action_due_date" />
                        <div class="relative">
                            <input type="date" id="preventive_action_due_date" name="preventive_action_due_date"
                                value="{{ old('preventive_action_due_date', $riskAssessmentFinding?->preventive_action_due_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Lesson Learned" label_ar="الدرس المستفاد" name="lesson_learned"
                    placeholder="Enter Lesson Learned" :value="$riskAssessmentFinding?->lesson_learned ?? old('lesson_learned', 'None')" />

            </div>

            <div class="flex justify-end gap-3 p-3 pt-0">
                <x-form.submit label="Risk Assessment Finding" label_ar="تقييم المخاطر نتائج نتائج" :isUpdate="$riskAssessmentFinding?->id" />
                @if (!$riskAssessmentFinding?->id)
                    <button type="submit" name="submit" value="exit" class="submit-btn">
                        <span class="inline mx-2">Save and Exit</span>
                        <span class="inline text-xs font-semibold leading-tight " dir="rtl" lang="ar">حفظ
                            والخروج</span>
                    </button>
                @endif

            </div>
        </form>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $("#risk_id").change(function() {
                var selectedValue = $(this).val();
                console.log("Selected value:", selectedValue);

                $.ajax({
                    url: '/risk-control',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        selectedValue: selectedValue,
                        risk_assessment_id: '{{ $riskAssessment->risk_assessment_id }}',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#risk_conrol_status").html(response);
                        var autoStatus = $('input[name="auto_status"]', $("#risk_conrol_status")).val();
                        if (autoStatus) {
                            $("#implementation_status").val(autoStatus);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Handle any errors
                    }
                });


            });
        });


        document.addEventListener("DOMContentLoaded", function() {
            const riskLikelihoodSelect = document.getElementById("risk_likelihood");
            const riskImpactSelect = document.getElementById("risk_impact");
            const riskScoreInput = document.getElementById("risk_score");
            const appetiteColorInput = document.getElementById("appetiteColor");
            const appetiteInput = document.getElementById("risk_appetite");
            const appetiteColor = document.getElementById("risk_appetite_color");



            riskLikelihoodSelect.addEventListener("change", updateRiskScore);
            riskImpactSelect.addEventListener("change", updateRiskScore);

            function updateRiskScore() {
                const likelihood = parseInt(riskLikelihoodSelect.value);
                const impact = parseInt(riskImpactSelect.value);
                const score = likelihood * impact;
                riskScoreInput.value = score;

                // Determine appetite color based on the score and set the background color
                if (score <= 3) {

                    appetiteInput.value = appetiteColorInput.value = "Very Low";
                    appetiteColor.value = appetiteColorInput.style.backgroundColor = "#00850A"; // Green for Low
                } else if (score <= 4) {
                    appetiteInput.value = appetiteColorInput.value = "Low";
                    appetiteColor.value = appetiteColorInput.style.backgroundColor =
                        "#00FF78"; // Yellow for Moderate
                } else if (score <= 9) {
                    appetiteInput.value = appetiteColorInput.value = "Medium";
                    appetiteColor.value = appetiteColorInput.style.backgroundColor = "#ECFF00"; // Orange for High
                } else if (score <= 15) {
                    appetiteInput.value = appetiteColorInput.value = "High";
                    appetiteColor.value = appetiteColorInput.style.backgroundColor = "#FFB600"; // Orange for High
                } else {
                    appetiteInput.value = appetiteColorInput.value = "Very High";
                    appetiteColor.value = appetiteColorInput.style.backgroundColor = "#FF0000"; // Red for Very High
                }
            }
        });
    </script>
@endpush
