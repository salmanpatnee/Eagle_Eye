@extends('layouts.app-full')
@section('title', 'Audit Assessments Summary')
@section('title_ar', 'ملخص تقييم مراجعة')
@section('content')
    <div>
        <x-table.action-wrapper title="Audit Assessment">
            <x-action.button label="View" label_ar="منظر" route_name="audit-assessments.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="audit-assessments.edit"
                route_param="{{ $auditAssessment->id }}" />
        </x-table.action-wrapper>



        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Audit Assessment ID" label_ar="رمز تقييم مراجعة">
                    {{ $auditAssessment->audit_id }}
                </x-info-col>
                <x-info-col label="Audit Assessment Name" label_ar="اسم تقييم مراجعة">
                    {{ $auditAssessment->audit_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Audit Assessment Description" label_ar="وصف تقييم مراجعة">
                {{ $auditAssessment->audit_description ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Audit Assessment Objective" label_ar="أهداف تقييم مراجعة">
                {{ $auditAssessment->audit_objectives ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Classification Name" label_ar="اسم التصنيف">
                    {{ $auditAssessment->classification?->classification_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Location Name" label_ar="اسم الموقع">
                    {{ $auditAssessment->location?->location_name ?? '—' }}
                </x-info-col>

            </x-info-row>

            <x-info-row>
                <x-info-col label="Audit Assessment Start Date" label_ar="تاريخ بدء تقييم مراجعة">
                    {{ $auditAssessment->audit_start_date ?? '—' }}
                </x-info-col>
                <x-info-col label="Audit Assessment End Date" label_ar="تاريخ انتهاء تقييم مراجعة">
                    {{ $auditAssessment->audit_end_date ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Audit Assessment Type" label_ar="نوع تقييم مراجعة">
                    {{ $auditAssessment->audit_type ?? '—' }}
                </x-info-col>
                <x-info-col label="Audit Assessment Internal or External" label_ar="تقييم مراجعة الداخلية أو الخارجية">
                    {{ $auditAssessment->audit_internal_external ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Auditing Entity" label_ar="الجهة المراجعة">
                    {{ $auditAssessment->auditing_entity ?? '—' }}
                </x-info-col>
                <x-info-col label="Auditor Name" label_ar="اسم مدقق">
                    {{ $auditAssessment->auditor->auditor_first_name }}
                    {{ $auditAssessment->auditor->auditor_last_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Audit Approach" label_ar="نهج تقييم مراجعة">
                {{ $auditAssessment->audit_approach ?? '—' }}
            </x-info-col-lg>


            <x-info-col-lg label="Audit Scope" label_ar="نطاق تقييم مراجعة">
                {{ $auditAssessment->audit_scope ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Standard References" label_ar="مراجع معايير">
                {{ $auditAssessment->standard_references ?? '—' }}
            </x-info-col-lg>


            <x-info-row>
                <x-info-col label="Best Practice Name" label_ar="اسم أفضل الممارسات">
                    {{ $auditAssessment->bestPractice?->best_practices_name ?? '—' }}
                </x-info-col>

            </x-info-row>
        </div>
        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="S.No" label_ar="رقم" />
                    <x-table.th label="Finding ID" label_ar="رمز العثور على" />
                    <x-table.th label="Finding Name" label_ar="اسم العثور على" />
                    <x-table.th label="Implementation Status" label_ar="حالة تنفيذ مراجعة" />
                    <x-table.th label="Action" label_ar="إجراء " />
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($auditAssessment->findings as $finding)
                        <tr>
                            <x-table.td> {{ $loop->index + 1 }}</x-table.td>
                            <x-table.td>
                                {{ $finding->audit_finding_id }}
                            </x-table.td>
                            <x-table.td>
                                {{ $finding->audit_finding_name }}
                            </x-table.td>
                            <x-table.td>
                                {{ $finding->audit_finding_status }}
                            </x-table.td>
                            <x-table.td action_col="true">

                                {{-- <x-action.view route_name="audit-assessment-findings.show" param="{{ $finding->id }}" />
                                <x-action.edit route_name="audit-assessment-findings.edit" param="{{ $finding->id }}" />
                                <x-action.delete route_name="audit-assessment-findings.destroy"
                                    param="{{ $finding->id }}" /> --}}
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>
    </div>
@endsection
