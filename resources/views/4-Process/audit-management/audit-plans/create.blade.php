@extends('layouts.audit')
@section('title', 'Audit Information')
@section('title_ar', 'تخطيط المراجعةة')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $auditPlan?->id ? 'Update' : 'New' }} Audit Plan">
            <x-action.button label="View" label_ar="منظر" route_name="audit-plans.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($auditPlan) ? route('audit-plans.update', $auditPlan->id) : route('audit-plans.store') }}"
            method="POST">
            @csrf
            @if (isset($auditPlan))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Audit Plan ID" label_ar="رمز المراجعة" name="audit_id" required="true"
                            :readonly="$auditPlan?->audit_id" placeholder="Enter Audit Plan ID" :value="$auditPlan?->audit_id" />
                    </div>
                    <div>
                        <x-form.field label="Audit Plan Name" label_ar="المراجعة الاسم " name="audit_name" required="true"
                            placeholder="Enter Audit Plan Name" :value="$auditPlan?->audit_name" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Audit Plan Description" label_ar="وصف المراجعة" name="audit_description"
                    placeholder="Enter Audit Plan Description" :value="$auditPlan?->audit_description" />

                <x-form.textarea-field label="Audit Plan Sponsor" label_ar="مراجعة الراعي" name="audit_sponsor"
                    placeholder="Enter Audit Plan Sponsor" :value="$auditPlan?->audit_sponsor" />

                <x-form.textarea-field label="Audit Plan Scope" label_ar="مراجعة نطاق" name="audit_scope"
                    placeholder="Enter Audit Plan Scope" :value="$auditPlan?->audit_scope" />

                <x-form.textarea-field label="Audit Plan Objectives" label_ar="أهداف نطاق" name="audit_objectives"
                    placeholder="Enter Audit Plan Objectives" :value="$auditPlan?->audit_objectives" />

                <x-form.textarea-field label="Audit Plan Criteria" label_ar="معايير نطاق" name="audit_criteria"
                    placeholder="Enter Audit Plan Criteria" :value="$auditPlan?->audit_criteria" />

                <x-form.textarea-field label="Audit Plan Methodology" label_ar="منهجية نطاق" name="audit_methodology"
                    placeholder="Enter Audit Plan Methodology" :value="$auditPlan?->audit_methodology" />

                <x-form.textarea-field label="Sampling" label_ar="أخذ العينات" name="sampling" placeholder="Enter Sampling"
                    :value="$auditPlan?->sampling" />

                <x-form.textarea-field label="Evidence Needed" label_ar="الأدلة المطلوبة" name="evidence_needed"
                    placeholder="Enter Evidence Needed" :value="$auditPlan?->evidence_needed" />

                <x-form.textarea-field label="Schedule" label_ar="جدول" name="schedule" placeholder="Enter Schedule"
                    :value="$auditPlan?->schedule" />

                <x-form.textarea-field label="Comment" label_ar="تعليق" name="comment" placeholder="Enter Comment"
                    :value="$auditPlan?->comment" />

                <x-form.grid-col>
                    <div>
                        <x-form.label label="Audit Plan Start Date" label_ar="تاريخ بدء خطة التدقيق"
                            for="audit_plan_start_date" />
                        <div class="relative">
                            <input type="date" id="audit_plan_start_date" name="audit_plan_start_date" required
                                value="{{ old('audit_plan_start_date', $auditPlan?->audit_plan_start_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                    <div>
                        <x-form.label label="Audit Plan End Date" label_ar="تاريخ انتهاء خطة التدقيق"
                            for="audit_plan_end_date" />
                        <div class="relative">
                            <input type="date" id="audit_plan_end_date" name="audit_plan_end_date"
                                value="{{ old('audit_plan_end_date', $auditPlan?->audit_plan_end_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Auditing Entity" label_ar="الجهة المراجعة" name="auditing_entity"
                            placeholder="Enter Auditing Entity" :value="$auditPlan?->auditing_entity" />
                    </div>
                    <div>
                        <x-form.field label="Audit Type" label_ar="نوع التدقيق" name="auditing_entity"
                            placeholder="Enter type=" :value="$auditPlan?->auditing_entity" />
                    </div>
                </x-form.grid-col>


                <x-form.grid-col>
                    <div>
                        <x-form.select label="Auditing Location" label_ar="موقع التدقيق" name="location_id" required="true"
                            :value="$auditPlan?->location_id" :data="$locations" id_key="location_id" value_key="location_name" />
                    </div>
                    <div>
                        <x-form.field label="Audit Nature" label_ar="طبيعة التدقيق" name="audit_nature"
                            placeholder="Enter Audit Nature" :value="$auditPlan?->audit_nature" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Auditor" label_ar="اسم المراجع" name="auditor_id" required="true"
                            :value="$auditPlan?->auditor_id" :data="$auditors" id_key="auditor_id" value_key="auditor_first_name" />
                    </div>
                    <div>
                        <x-form.select label="Auditee Name" label_ar="اسم مدقق" name="auditee_id" required="true"
                            :value="$auditPlan?->auditee_id" :data="$auditees" id_key="auditee_id" value_key="auditee_first_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field type="number" label="Cost" label_ar="يكلف" name="cost"
                            placeholder="Enter Cost" :value="$auditPlan?->cost" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>



                <div class="flex justify-end">
                    <x-form.submit label="Audit Plan" label_ar="المراجعة" :isUpdate="$auditPlan?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
