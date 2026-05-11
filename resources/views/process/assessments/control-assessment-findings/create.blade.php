@extends('layouts.app-full')
@section('title', 'Control Assessment Findings')
@section('title_ar', 'تقييم الضوابط نتائج نتائج')
@section('content')

    <div>
        <x-table.action-wrapper title="{{ isset($controlAssessmentFinding) ? 'Update' : 'New' }} Control Assessment Finding">
            <x-action.button label="View" label_ar="منظر" route_name="control-assessments.index" />
        </x-table.action-wrapper>
        <h1 class="text-2xl text-center bg-brand-950 text-white py-2 font-medium">Control Assessment Master</h1>
        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Control Assessment ID" label_ar="رمز تقييم الضوابط">
                    {{ $controlAssessment->control_assessment_id }}
                </x-info-col>
                <x-info-col label="Control Assessment Name" label_ar="اسم تقييم الضوابط">
                    {{ $controlAssessment->control_assessment_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Best Practice Name" label_ar="اسم أفضل الممارسات">
                    {{ $controlAssessment->bestPractice?->best_practices_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Location Name" label_ar="اسم الموقع">
                    {{ $controlAssessment->location?->location_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Auditor Name" label_ar="اسم مدقق">
                    {{ $controlAssessment->auditor->auditor_first_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Classification Name" label_ar="اسم التصنيف">
                    {{ $controlAssessment->classification?->classification_name ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>
        <h1 class="text-2xl text-center bg-brand-950 text-white py-2 font-medium">Control Assessment Finding</h1>
        @if (!$controlAssessmentFinding && $controls->isEmpty())
            <div class="m-6 rounded-lg border border-green-200 bg-green-50 px-6 py-8 text-center">
                <p class="text-lg font-semibold text-green-700">All Controls Assessed</p>
                <p class="mt-1 text-sm text-green-600">All controls in this assessment have been evaluated.</p>
                <a href="{{ route('control-assessments.index') }}" class="mt-4 inline-block text-sm text-green-700 underline">Back to Assessments</a>
            </div>
        @else
        <form
            action="{{ isset($controlAssessmentFinding) ? route('control-assessment-findings.update', $controlAssessmentFinding->id) : route('control-assessment-findings.store', $controlAssessment->id) }}"
            method="POST">
            @csrf
            @if (isset($controlAssessmentFinding))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Control Assessment Finding ID" label_ar="رمز تقييم الضوابط نتائج"
                            name="control_finding_id" required="true" placeholder="Enter Control Assessment Finding ID"
                            :value="$controlAssessmentFinding?->control_finding_id ?? old('control_finding_id')"
                            :readonly="$controlAssessmentFinding !== null" />
                    </div>
                    <div>
                        <x-form.field label="Control Assessment Finding Name" label_ar="اسم تقييم الضوابط نتائج"
                            name="control_finding_name" required="true" placeholder="Enter Control Assessment Finding Name"
                            :value="$controlAssessmentFinding?->control_finding_name ?? old('control_finding_name')" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Controls" label_ar="اسم الضوابط" name="control_id" :value="$controlAssessmentFinding?->control_id ?? old('control_id', 'Internal')"
                            :data="$controls" id_key="control_id" value_key="control_name" required="true"
                            id="control_dropdown" />
                    </div>

                    <div>
                        <x-form.multiselect label="Categories" label_ar="اسم الفئة" show_key="true" name="categories[]" :value="$selectedCategoryIds"
                            :data="$categories" id_key="category_id" value_key="category_name" required="true" />
                    </div>
                </x-form.grid-col>

                <div id="evidence_loading" class="hidden text-sm text-gray-500 py-2">Loading evidence...</div>
                <div id="evidenve_vs_control_content">
                    <div
                        class="flex items-center gap-2 rounded-lg border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-500">
                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Select a control above to load its associated evidence.
                    </div>
                </div>

                <x-form.textarea-field label="Control Assessment Finding Description" label_ar="وصف تقييم الضوابط"
                    name="control_finding_description" placeholder="Enter Control Assessment Finding Description"
                    :value="$controlAssessmentFinding?->control_finding_description ??
                        old('control_finding_description')" />


                <x-form.grid-col>
                    <div>
                        <x-form.select label="Implementation Status" label_ar="حالة العثور على"
                            name="control_implementation_status" :value="$controlAssessmentFinding?->control_implementation_status ??
                                old(
                                    'control_implementation_status',
                                    $controlAssessmentFinding?->control_implementation_status ?? 'Not Implemented',
                                )" :custom_data="['Not Implemented', 'Implemented', 'Partially Implemented', 'Not Applicable']" required="true" />
                    </div>
                    <div>
                        <x-form.select label="Maturity Level" label_ar="مستوى النضج" name="control_maturity_level"
                            :value="$controlAssessmentFinding?->control_maturity_level ??
                                old(
                                    'control_maturity_level',
                                    $controlAssessmentFinding?->control_maturity_level ?? '1',
                                )" :custom_data="['1', '2', '3', '4', '5']" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Control Implementation Details" label_ar="تفاصيل تنفيذ التحكم"
                    name="control_implementation_details" placeholder="Enter Control Implementation Details"
                    :value="$controlAssessmentFinding?->control_implementation_details ??
                        old('control_implementation_details')" />

                <x-form.textarea-field label="Control Maturity Justification" label_ar="مبرر نضج التحكم"
                    name="control_maturity_justification" placeholder="Enter Control Maturity Justification"
                    :value="$controlAssessmentFinding?->control_maturity_justification ??
                        old('control_maturity_justification')" />

                <x-form.textarea-field label="Control Assessment Remarks/Root Cause Analysis"
                    label_ar="ملاحظات تقييم الضوابط الرقابية / تحليل السبب الجذري" name="remarks"
                    placeholder="Enter Control Assessment Remarks/Root Cause Analysis" :value="$controlAssessmentFinding?->remarks ?? old('remarks')" />

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Auditee Name" label_ar="الشخص الذي يتم التدقيق عليه"
                            name="control_auditee_name" placeholder="Enter Auditee Name" :value="$controlAssessmentFinding?->control_auditee_name ?? old('control_auditee_name')" />
                    </div>
                    <div>
                        <x-form.field label="Auditee Department" label_ar="القسم الذي يتم التدقيق عليه"
                            name="control_auditee_department" placeholder="Enter Auditee Name" :value="$controlAssessmentFinding?->control_auditee_department ??
                                old('control_auditee_department')" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Auditee System" label_ar="تم تدقيق النظام" name="control_auditee_system"
                            placeholder="Enter Auditee System" :value="$controlAssessmentFinding?->control_auditee_system ??
                                old('control_auditee_system')" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>
               
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Corrective Action" label_ar="إجراءات التصحيح" name="corrective_action"
                            placeholder="Enter Corrective Action" :value="$controlAssessmentFinding?->corrective_action ?? old('corrective_action', 'None')" />
                    </div>
                    <div>
                        <x-form.label label="Corrective Action Due Date" label_ar="تاريخ استحقاق إجراءات التصحيح"
                            for="corrective_action_due_date" />
                        <div class="relative">
                            <input type="date" id="corrective_action_due_date" name="corrective_action_due_date"
                                value="{{ old('corrective_action_due_date', $controlAssessmentFinding?->corrective_action_due_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                        <x-form.error name="corrective_action_due_date" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Preventive Action" label_ar="إجراءات الوقائي" name="preventive_action"
                            placeholder="Enter Preventive Action" :value="$controlAssessmentFinding?->preventive_action ?? old('preventive_action', 'None')" />
                    </div>
                    <div>
                        <x-form.label label="Preventive Action Due Date" label_ar="تاريخ استحقاق إجراءات الوقائي"
                            for="preventive_action_due_date" />
                        <div class="relative">
                            <input type="date" id="preventive_action_due_date" name="preventive_action_due_date"
                                value="{{ old('preventive_action_due_date', $controlAssessmentFinding?->preventive_action_due_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                        <x-form.error name="preventive_action_due_date" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Lesson Learned" label_ar="الدرس المستفاد" name="lesson_learned"
                    placeholder="Enter Lesson Learned" :value="$controlAssessmentFinding?->lesson_learned ?? old('lesson_learned', 'None')" />


            </div>

            <div class="flex justify-end gap-3 p-3 pt-0">
                <x-form.submit label="Control Assessment Finding" label_ar="تقييم الضوابط نتائج نتائج"
                    :isUpdate="$controlAssessmentFinding?->id" />
                @if (!$controlAssessmentFinding?->id)
                    <button type="submit" name="submit" value="exit" class="submit-btn">
                        <span class="inline mx-2">Save and Exit</span>
                        <span class="inline text-xs font-semibold leading-tight " dir="rtl" lang="ar">حفظ
                            والخروج</span>
                    </button>
                @endif

            </div>
        </form>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#control_id").change(function() {
                var selectedValue = $(this).val();

                if (!selectedValue) {
                    $('#evidenve_vs_control_content').html(
                        '<div class="flex items-center gap-2 rounded-lg border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-500">' +
                        '<svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">' +
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />' +
                        '</svg>' +
                        'Select a control above to load its associated evidence.' +
                        '</div>'
                    );
                    return;
                }

                console.log("Selected value:", selectedValue);
                $.ajax({
                    url: '/evidence-controller',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        selectedValue: selectedValue
                    },
                    beforeSend: function() {
                        $('#evidence_loading').removeClass('hidden');
                        $('#evidenve_vs_control_content').html('');
                    },
                    success: function(response) {
                        $("#evidenve_vs_control_content").html(response);
                    },
                    complete: function() {
                        $('#evidence_loading').addClass('hidden');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endpush
