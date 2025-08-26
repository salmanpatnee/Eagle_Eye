@extends('layouts.app-full')
@section('title', 'Risk Assessment')
@section('title_ar', 'تقييم المخاطر')
@section('content')

    <div>
        <x-table.action-wrapper title="{{ isset($riskAssessment) ? 'Update' : 'New' }} Risk Assessment">
            <x-action.button label="View" label_ar="منظر" route_name="risk-assessments.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($riskAssessment) ? route('risk-assessments.update', $riskAssessment->id) : route('risk-assessments.store') }}"
            method="POST">
            @csrf
            @if (isset($riskAssessment))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Risk Assessment ID" label_ar="رمز تقييم المخاطر" name="risk_assessment_id"
                            required="true" :readonly="$riskAssessment?->risk_assessment_id" placeholder="Enter Risk Assessment ID" :value="$riskAssessment?->risk_assessment_id ?? old('risk_assessment_id')" />
                    </div>
                    <div>
                        <x-form.field label="Risk Assessment Name" label_ar="اسم تقييم المخاطر" name="risk_assessment_name"
                            required="true" placeholder="Enter Risk Assessment Name" :value="$riskAssessment?->risk_assessment_name ?? old('risk_assessment_name')" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Risk Assessment Description" label_ar="وصف تقييم المخاطر"
                    name="risk_assessment_description" placeholder="Enter Risk Assessment Description" :value="$riskAssessment?->risk_assessment_description ?? old('risk_assessment_description')" />

                <x-form.grid-col>
                    <div>
                        <x-form.label label="Risk Assessment Start Date" label_ar="تاريخ بدء تقييم المخاطر"
                            for="risk_assessment_start_date" />
                        <div class="relative">
                            <input type="date" id="risk_assessment_start_date" name="risk_assessment_start_date" required
                                value="{{ old('risk_assessment_start_date', $riskAssessment?->risk_assessment_start_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                    <div>
                        <x-form.label label="Risk Assessment End Date" label_ar="تاريخ انتهاء تقييم المخاطر"
                            for="risk_assessment_end_date" />
                        <div class="relative">
                            <input type="date" id="risk_assessment_end_date" name="risk_assessment_end_date" required
                                value="{{ old('risk_assessment_end_date', $riskAssessment?->risk_assessment_end_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Risk Assessment Type" label_ar="نوع تقييم المخاطر" name="risk_assessment_type"
                            placeholder="Enter Risk Assessment Type" :value="$riskAssessment?->risk_assessment_type ?? old('risk_assessment_type')" />
                    </div>
                    <div>
                        <x-form.select label="Risk Assessment Internal or External"
                            label_ar="تقييم المخاطر الداخلية أو الخارجية" name="risk_assessment_internal_external"
                            :value="$riskAssessment?->risk_assessment_internal_external ??
                                old('risk_assessment_internal_external', 'Internal')" :custom_data="['Internal', 'External']" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Risk Assessment Approach" label_ar="نهج تقييم المخاطر"
                    name="risk_assessment_approach" placeholder="Enter Risk Assessment Approach" :value="$riskAssessment?->risk_assessment_approach ?? old('risk_assessment_approach')" />

                <x-form.textarea-field label="Risk Assessment Objectives" label_ar="أهداف تقييم المخاطر"
                    name="risk_assessment_objectives" placeholder="Enter Risk Assessment Objectives" :value="$riskAssessment?->risk_assessment_objectives ?? old('risk_assessment_objectives')" />

                <x-form.textarea-field label="Risk Assessment Scope" label_ar="نطاق تقييم المخاطر"
                    name="risk_assessment_scope" placeholder="Enter Risk Assessment Scope" :value="$riskAssessment?->risk_assessment_scope ?? old('risk_assessment_scope')" />

                <x-form.textarea-field label="Standard References" label_ar="مراجع معايير" name="standard_references"
                    placeholder="Enter Standard References" :value="$riskAssessment?->standard_references ?? old('standard_references')" />

                <x-form.textarea-field label="Risk Assessing Entity" label_ar="ضوابط تقييم الجهة"
                    name="risk_assessing_entity" placeholder="Enter Risk Assessing Entity" :value="$riskAssessment?->risk_assessing_entity ?? old('risk_assessing_entity')" />

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Location Name" label_ar="اسم الموقع" name="location_id" :value="$riskAssessment?->location_id ?? old('location_id')"
                            :data="$locations" id_key="location_id" value_key="location_name" required="true" />
                    </div>
                    <div>
                        <x-form.select label="Classification" label_ar="التصنيف" name="classification_id" :value="$riskAssessment?->classification_id ?? old('classification_id')"
                            :data="$classifications" id_key="classification_id" value_key="classification_name" required="true" />
                    </div>

                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Auditor Name" label_ar="اسم مدقق" name="auditor_id" :value="$riskAssessment?->auditor_id ?? old('auditor_id')"
                            :data="$auditors" id_key="auditor_id" value_key="auditor_name" required="true" />
                    </div>
                    <div>

                    </div>

                </x-form.grid-col>
            </div>

            <div class="flex justify-end">
                <x-form.submit label="Risk Assessment" label_ar="تقييم المخاطر" :isUpdate="$riskAssessment?->id" />
            </div>
        </form>
    </div>
@endsection
