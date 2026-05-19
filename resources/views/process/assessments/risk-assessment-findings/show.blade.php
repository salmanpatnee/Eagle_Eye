@extends('layouts.app-full')
@section('title', 'Risk Assessment Findings')
@section('title_ar', 'تقييم المخاطر نتائج نتائج')
@section('parent_title', 'Risk Assessments Summary')
@section('parent_url', route('risk-assessments.index'))
@section('parent2_title', $riskAssessmentFinding->riskAssessment->risk_assessment_name)
@section('parent2_url', route('risk-assessments.show', $riskAssessmentFinding->riskAssessment))
@section('breadcrumb_title', $riskAssessmentFinding->risk_finding_name)
@section('content')
    <div>
        <x-table.action-wrapper title="Risk Assessment Findings">
            <x-action.button label="View" label_ar="منظر" route_name="risk-assessments.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="risk-assessment-findings.edit"
                route_param="{{ $riskAssessmentFinding->id }}" />

        </x-table.action-wrapper>


        <div class="border-gray-100 border-t p-3">

            <x-info-row>
                <x-info-col label="Risk Assessment Finding ID" label_ar="رمز تقييم المخاطر نتائج">
                    {{ $riskAssessmentFinding->risk_finding_id }}
                </x-info-col>
                <x-info-col label="Risk Assessment Finding Name" label_ar="اسم تقييم المخاطر نتائج">
                    {{ $riskAssessmentFinding->risk_finding_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Risk Assessment Finding Description" label_ar="وصف تقييم المخاطر نتائج">
                {{ $riskAssessmentFinding->risk_finding_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Risks" label_ar="اسم المخاطر">
                    {{ $riskAssessmentFinding->risk?->risk_id }} -
                    {{ $riskAssessmentFinding->risk?->risk_name }}
                </x-info-col>
                <x-info-col label="Risks Status" label_ar="حالة المخاطر">
                    {{ $riskAssessmentFinding->implementation_status }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Risk Likelihood" label_ar="احتمالات المخاطرة">
                    {{ $riskAssessmentFinding->risk_likelihood }}
                </x-info-col>
                <x-info-col label="Risk Impact" label_ar="تأثير المخاطرة">
                    {{ $riskAssessmentFinding->risk_impact }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Risk Score" label_ar="درجة المخاطرة">
                    {{ $riskAssessmentFinding->risk_score }}
                </x-info-col>
                <x-info-col label="Risk Appetite" label_ar="لون الجوع للمخاطرة">
                    {{ $riskAssessmentFinding->risk_appetite }}
                </x-info-col>
            </x-info-row>


            <x-info-col-lg label="Risk Implementation Details" label_ar="المخاطر تفاصيل التنفيذ">
                {{ $riskAssessmentFinding->implementation_details ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Risk Maturity Justification" label_ar="المخاطر تبرير النضج">
                {{ $riskAssessmentFinding->maturity_justification ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Risk Assessment Remarks" label_ar="ملاحظات">
                {{ $riskAssessmentFinding->Remarks ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Auditee Name" label_ar="الشخص الذي يتم التدقيق عليه">
                    {{ $riskAssessmentFinding->risk_auditee_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Auditee Department" label_ar="القسم الذي يتم التدقيق عليه">
                    {{ $riskAssessmentFinding->risk_auditee_department }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Auditee System" label_ar="تم تدقيق النظام">
                    {{ $riskAssessmentFinding->risk_auditee_system ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Treatment" label_ar="اسم خيارات علاج المخاطر">
                    {{ $riskAssessmentFinding?->treatment?->risk_treatment_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Corrective Action" label_ar="إجراءات التصحيح">
                    {{ $riskAssessmentFinding->corrective_action ?? '—' }}
                </x-info-col>
                <x-info-col label="Corrective Action Due Date" label_ar="تاريخ استحقاق إجراءات التصحيح">
                    {{ $riskAssessmentFinding->corrective_action_due_date ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Preventive Action" label_ar="العمل الإجراء">
                    {{ $riskAssessmentFinding->preventive_action ?? '—' }}
                </x-info-col>
                <x-info-col label="Preventive Action Due Date" label_ar="تاريخ استحقاق الإجراء الوقائي">
                    {{ $riskAssessmentFinding->preventive_action_due_date ?? '—' }}
                </x-info-col>
            </x-info-row>





            <x-info-col-lg label="Lesson Learned" label_ar="الدرس المستفاد">
                {{ $riskAssessmentFinding->lesson_learned ?? '—' }}
            </x-info-col-lg>

        </div>
    @endsection
