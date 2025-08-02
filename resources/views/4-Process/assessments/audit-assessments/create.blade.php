@extends('layouts.app-full')
@section('title', 'Audits Summary')
@section('title_ar', 'ملخص مراجعة')
@section('content')

    <div>
        <x-table.action-wrapper title="{{ isset($auditAssessment) ? 'Update' : 'New' }} Audit">
            <x-action.button label="View" label_ar="منظر" route_name="audit-assessments.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($auditAssessment) ? route('audit-assessments.update', $auditAssessment->id) : route('audit-assessments.store') }}"
            method="POST">
            @csrf
            @if (isset($auditAssessment))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Audit ID" label_ar="رمز  مراجعة" name="audit_id" required="true" :readonly="$auditAssessment?->audit_id"
                            placeholder="Enter Audit ID" :value="$auditAssessment?->audit_id ?? old('audit_id')" />
                    </div>
                    <div>
                        <x-form.field label="Audit Name" label_ar="اسم  مراجعة" name="audit_name" required="true"
                            placeholder="Enter Audit Name" :value="$auditAssessment?->audit_name ?? old('audit_name')" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Audit Description" label_ar="وصف  مراجعة" name="audit_description"
                    placeholder="Enter Audit Description" :value="$auditAssessment?->audit_description ?? old('audit_description')" />

                <x-form.textarea-field label="Audit Objectives" label_ar="أهداف  مراجعة" name="audit_objectives"
                    placeholder="Enter Audit Objectives" :value="$auditAssessment?->audit_objectives ?? old('audit_objectives')" />

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Classification" label_ar="التصنيف" name="classification_id" :value="$auditAssessment?->classification_id ?? old('classification_id')"
                            :data="$classifications" id_key="classification_id" value_key="classification_name" required="true" />
                    </div>
                    <div>
                        <x-form.select label="Location Name" label_ar="اسم الموقع" name="location_id" :value="$auditAssessment?->location_id ?? old('location_id')"
                            :data="$locations" id_key="location_id" value_key="location_name" required="true" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.label label="Audit Start Date" label_ar="تاريخ بدء  مراجعة" for="audit_start_date" />
                        <div class="relative">
                            <input type="date" id="audit_start_date" name="audit_start_date" required
                                value="{{ old('audit_start_date', $auditAssessment?->audit_start_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                    <div>
                        <x-form.label label="Audit End Date" label_ar="تاريخ انتهاء  مراجعة" for="audit_end_date" />
                        <div class="relative">
                            <input type="date" id="audit_end_date" name="audit_end_date" required
                                value="{{ old('audit_end_date', $auditAssessment?->audit_end_date) }}" class="input-field"
                                onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Audit Type" label_ar="نوع  مراجعة" name="audit_type"
                            placeholder="Enter Audit Type" :value="$auditAssessment?->audit_type ?? old('audit_type')" />
                    </div>
                    <div>
                        <x-form.select label="Audit Internal or External" label_ar=" مراجعة الداخلية أو الخارجية"
                            name="audit_internal_external" :value="$auditAssessment?->audit_internal_external ??
                                old('audit_internal_external', 'Internal')" :custom_data="['Internal', 'External']" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Auditing Entity" label_ar="الجهة المراجعة" name="auditing_entity"
                            placeholder="Enter Auditing Entity" :value="$auditAssessment?->auditing_entity ?? old('auditing_entity')" />
                    </div>
                    <div>
                        <x-form.select label="Auditor Name" label_ar="اسم مدقق" name="auditor_id" :value="$auditAssessment?->auditor_id ?? old('auditor_id')"
                            :data="$auditors" id_key="auditor_id" value_key="auditor_first_name" required="true" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Audit Scope" label_ar="نطاق  مراجعة" name="audit_scope"
                    placeholder="Enter Audit Scope" :value="$auditAssessment?->audit_scope ?? old('audit_scope')" />

                <x-form.textarea-field label="Audit Approach" label_ar="نهج  مراجعة" name="audit_approach"
                    placeholder="Enter Audit Approach" :value="$auditAssessment?->audit_approach ?? old('audit_approach')" />


                <x-form.textarea-field label="Standard References" label_ar="مراجع معايير" name="standard_references"
                    placeholder="Enter Standard References" :value="$auditAssessment?->standard_references ?? old('standard_references')" />



                <x-form.grid-col>
                    <div>
                        <x-form.select label="Best Practice Name" label_ar="اسم أفضل الممارسات" name="best_practice"
                            :value="$auditAssessment?->best_practice ?? old('best_practices_id')" :data="$bestPractices" id_key="best_practices_id" value_key="best_practices_name"
                            required="true" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>


            </div>

            <div class="flex justify-end">
                <x-form.submit label="Audit" label_ar="المرفق" :isUpdate="$auditAssessment?->id" />
            </div>
        </form>
    </div>
@endsection
