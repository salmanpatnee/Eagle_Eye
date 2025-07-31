@extends('layouts.app-full')
@section('title', 'Control Assessment Findings')
@section('title_ar', 'تقييم الضوابط نتائج نتائج')
@section('content')
    <div>
        <x-table.action-wrapper title="Control Assessment Findings">
            <x-action.button label="View" label_ar="منظر" route_name="control-assessments.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="control-assessment-findings.edit"
                route_param="{{ $controlAssessmentFinding->id }}" />

        </x-table.action-wrapper>


        <div class="border-gray-100 border-t p-3">

            <x-info-row>
                <x-info-col label="Control Assessment Finding ID" label_ar="رمز تقييم الضوابط نتائج">
                    {{ $controlAssessmentFinding->control_finding_id }}
                </x-info-col>
                <x-info-col label="Control Assessment Finding Name" label_ar="اسم تقييم الضوابط نتائج">
                    {{ $controlAssessmentFinding->control_finding_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Controls" label_ar="اسم الضوابط">
                    {{ $controlAssessmentFinding->control->control_name }}
                </x-info-col>
                <x-info-col label="Categories" label_ar="اسم الفئة">
                    <x-list :data="$controlAssessmentFinding->categories" id_key="" value_key="category_name" />
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Control Assessment Finding Description" label_ar="وصف تقييم الضوابط نتائج">
                {{ $controlAssessmentFinding->control_finding_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Implementation Status" label_ar="حالة العثور على">
                    {{ $controlAssessmentFinding->control_implementation_status }}
                </x-info-col>
                <x-info-col label="Maturity Level" label_ar="مستوى النضج">
                    {{ $controlAssessmentFinding->control_maturity_level }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Control Implementation Details" label_ar="الضوابط تفاصيل التنفيذ">
                {{ $controlAssessmentFinding->control_implementation_details ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Control Maturity Justification" label_ar="الضوابط تبرير النضج">
                {{ $controlAssessmentFinding->control_maturity_justification ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Control Assessment Remarks" label_ar="ملاحظات">
                {{ $controlAssessmentFinding->control_maturity_justification ?? '—' }}
            </x-info-col-lg>


            <x-info-row>
                <x-info-col label="Corrective Action" label_ar="إجراءات التصحيح">
                    {{ $controlAssessmentFinding->corrective_action ?? '—' }}
                </x-info-col>
                <x-info-col label="Corrective Action Due Date" label_ar="تاريخ استحقاق إجراءات التصحيح">
                    {{ $controlAssessmentFinding->corrective_action_due_date ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Preventive Action" label_ar="العمل الإجراء">
                    {{ $controlAssessmentFinding->preventive_action ?? '—' }}
                </x-info-col>
                <x-info-col label="Preventive Action Due Date" label_ar="تاريخ استحقاق الإجراء الوقائي">
                    {{ $controlAssessmentFinding->preventive_action_due_date ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Auditee Name" label_ar="الشخص الذي يتم التدقيق عليه">
                    {{ $controlAssessmentFinding->control_auditee_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Auditee Department" label_ar="القسم الذي يتم التدقيق عليه">
                    {{ $controlAssessmentFinding->control_auditee_department }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Auditee System" label_ar="تم تدقيق النظام">
                    {{ $controlAssessmentFinding->control_auditee_system ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Lesson Learned" label_ar="الدرس المستفاد">
                {{ $controlAssessmentFinding->lesson_learned ?? '—' }}
            </x-info-col-lg>

        </div>
    @endsection
