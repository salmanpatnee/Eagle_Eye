@extends('layouts.audit')
@section('title', 'Audit Information')
@section('title_ar', 'تخطيط مراجعة')
@section('content')
    <div>
        <x-table.action-wrapper title="Audit Plan Details">
            <x-action.button label="View" label_ar="منظر" route_name="audit-plans.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="audit-plans.edit" route_param="{{ $auditPlan->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Audit Plan ID" label_ar="رمز المراجعة">
                    {{ $auditPlan->audit_id }}
                </x-info-col>
                <x-info-col label="Audit Plan Name" label_ar="اسم المراجعة">
                    {{ $auditPlan->audit_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Audit Plan Description" label_ar="وصف المراجعة">
                {{ $auditPlan->audit_description ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Audit Plan Sponsor" label_ar="الراعي المراجعة">
                {{ $auditPlan->audit_sponsor ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Audit Plan Scope" label_ar="نطاق المراجعة">
                {{ $auditPlan->audit_scope ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Audit Plan Objectives" label_ar="أهداف المراجعة">
                {{ $auditPlan->audit_objectives ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Audit Plan Criteria" label_ar="معايير المراجعة">
                {{ $auditPlan->audit_criteria ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Audit Plan Methodology" label_ar="منهجية المراجعة">
                {{ $auditPlan->audit_methodology ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Sampling" label_ar="أخذ العينات">
                {{ $auditPlan->sampling ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Evidence Needed" label_ar="الأدلة المطلوبة">
                {{ $auditPlan->evidence_needed ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Schedule" label_ar="جدول">
                {{ $auditPlan->schedule ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Comment" label_ar="تعليق">
                {{ $auditPlan->comment ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Audit Plan Start Date" label_ar="تاريخ بدء خطة التدقيق">
                    {{ $auditPlan->audit_plan_start_date }}
                </x-info-col>

                <x-info-col label="Audit Plan End Date" label_ar="تاريخ انتهاء خطة التدقيق">
                    {{ $auditPlan->audit_plan_start_date }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Auditing Entity" label_ar="الجهة المراجعة">
                    {{ $auditPlan->auditing_entity }}
                </x-info-col>

                <x-info-col label="Audit Type" label_ar="نوع التدقيق">
                    {{ $auditPlan->audit_type }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Audit Location" label_ar="موقع التدقيق">
                    {{ $auditPlan?->location?->location_name }}
                </x-info-col>

                <x-info-col label="Audit Nature" label_ar="طبيعة التدقيق">
                    {{ $auditPlan->audit_nature }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Auditor" label_ar="اسم المراجع">
                    {{ $auditPlan->auditor->auditor_first_name }} {{ $auditPlan->auditor->auditor_last_name }}
                </x-info-col>

                <x-info-col label="Auditee Name" label_ar="اسم مدقق">
                    {{ $auditPlan->auditee->auditee_first_name }} {{ $auditPlan->auditee->auditee_last_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Cost" label_ar="يكلف">
                    {{ $auditPlan->cost }}
                </x-info-col>
            </x-info-row>
        </div>
    </div>
@endsection
