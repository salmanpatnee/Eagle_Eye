@extends('layouts.app-full')
@section('title', 'Control Assessment')
@section('title_ar', 'تقييم الضوابط')
@section('content')

    <div>
        <x-table.action-wrapper title="{{ isset($controlAssessment) ? 'Update' : 'New' }} Control Assessment">
            <x-action.button label="View" label_ar="منظر" route_name="control-assessments.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($controlAssessment) ? route('control-assessments.update', $controlAssessment->id) : route('control-assessments.store') }}"
            method="POST">
            @csrf
            @if (isset($controlAssessment))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Control Assessment ID" label_ar="رمز تقييم الضوابط" name="control_assessment_id"
                            required="true" :readonly="$controlAssessment?->control_assessment_id" placeholder="Enter Control Assessment ID" :value="$controlAssessment?->control_assessment_id ?? old('control_assessment_id')" />
                    </div>
                    <div>
                        <x-form.field label="Control Assessment Name" label_ar="اسم تقييم الضوابط"
                            name="control_assessment_name" required="true" placeholder="Enter Control Assessment Name"
                            :value="$controlAssessment?->control_assessment_name ?? old('control_assessment_name')" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Control Assessment Description" label_ar="وصف تقييم الضوابط"
                    name="control_assessment_description" placeholder="Enter Control Assessment Description"
                    :value="$controlAssessment?->control_assessment_description ??
                        old('control_assessment_description')" />

                <x-form.grid-col>
                    <div>
                        <x-form.label label="Control Assessment Start Date" label_ar="تاريخ بدء تقييم الضوابط"
                            for="control_assessment_start_date" />
                        <div class="relative">
                            <input type="date" id="control_assessment_start_date" name="control_assessment_start_date"
                                required
                                value="{{ old('control_assessment_start_date', $controlAssessment?->control_assessment_start_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                    <div>
                        <x-form.label label="Control Assessment End Date" label_ar="تاريخ انتهاء تقييم الضوابط"
                            for="control_assessment_end_date" />
                        <div class="relative">
                            <input type="date" id="control_assessment_end_date" name="control_assessment_end_date"
                                required
                                value="{{ old('control_assessment_end_date', $controlAssessment?->control_assessment_end_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Control Assessment Type" label_ar="نوع تقييم الضوابط"
                            name="control_assessment_type" placeholder="Enter Control Assessment Type" :value="$controlAssessment?->control_assessment_type ?? old('control_assessment_type')" />
                    </div>
                    <div>
                        <x-form.select label="Control Assessment Internal or External"
                            label_ar="تقييم الضوابط الداخلية أو الخارجية" name="control_assessment_internal_external"
                            :value="$controlAssessment?->control_assessment_internal_external ??
                                old('control_assessment_internal_external', 'Internal')" :custom_data="['Internal', 'External']" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Control Assessment Approach" label_ar="نهج تقييم الضوابط"
                    name="control_assessment_approach" placeholder="Enter Control Assessment Approach" :value="$controlAssessment?->control_assessment_approach ?? old('control_assessment_approach')" />

                <x-form.textarea-field label="Control Assessment Objectives" label_ar="أهداف تقييم الضوابط"
                    name="control_assessment_objectives" placeholder="Enter Control Assessment Objectives"
                    :value="$controlAssessment?->control_assessment_objectives ??
                        old('control_assessment_objectives')" />

                <x-form.textarea-field label="Control Assessment Scope" label_ar="نطاق تقييم الضوابط"
                    name="control_assessment_scope" placeholder="Enter Control Assessment Scope" :value="$controlAssessment?->control_assessment_scope ?? old('control_assessment_scope')" />

                <x-form.textarea-field label="Standard References" label_ar="مراجع معايير" name="standard_references"
                    placeholder="Enter Standard References" :value="$controlAssessment?->standard_references ?? old('standard_references')" />

                <x-form.textarea-field label="Control Assessing Entity" label_ar="ضوابط تقييم الجهة"
                    name="control_assessing_entity" placeholder="Enter Control Assessing Entity" :value="$controlAssessment?->control_assessing_entity ?? old('control_assessing_entity')" />

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Best Practice Name" label_ar="اسم أفضل الممارسات" name="best_practice_id"
                            :value="$controlAssessment?->best_practice_id ?? old('best_practice_id')" :data="$bestPractices" id_key="best_practice_id" value_key="best_practice_name"
                            required="true" />
                    </div>
                    <div>
                        <x-form.select label="Location Name" label_ar="اسم الموقع" name="location_id" :value="$controlAssessment?->location_id ?? old('location_id')"
                            :data="$locations" id_key="location_id" value_key="location_name" required="true" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Classification" label_ar="التصنيف" name="classification_id" :value="$controlAssessment?->classification_id ?? old('classification_id')"
                            :data="$classifications" id_key="classification_id" value_key="classification_name" required="true" />
                    </div>
                    <div>
                        <x-form.select label="Auditor Name" label_ar="اسم مدقق" name="auditor_id" :value="$controlAssessment?->auditor_id ?? old('auditor_id')"
                            :data="$auditors" id_key="auditor_id" value_key="auditor_name" required="true" />
                    </div>
                </x-form.grid-col>
            </div>

            <div class="flex justify-end">
                <x-form.submit label="Control Assessment" label_ar="المرفق" :isUpdate="$controlAssessment?->id" />
            </div>
        </form>
    </div>
@endsection
