@extends('layouts.app-full')
@section('title', 'Risk Assessment')
@section('title_ar', 'تقييم المخاطر')
@section('content')
    <div>
        <x-table.action-wrapper title="Risk Assessment">
            <x-action.button label="View" label_ar="منظر" route_name="risk-assessments.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="risk-assessments.edit"
                route_param="{{ $riskAssessment->id }}" />
        </x-table.action-wrapper>



        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Risk Assessment ID" label_ar="رمز تقييم المخاطر">
                    {{ $riskAssessment->risk_assessment_id }}
                </x-info-col>
                <x-info-col label="Risk Assessment Name" label_ar="اسم تقييم المخاطر">
                    {{ $riskAssessment->risk_assessment_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Risk Assessment Description" label_ar="وصف تقييم المخاطر">
                {{ $riskAssessment->risk_assessment_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Risk Assessment Start Date" label_ar="تاريخ بدء تقييم المخاطر">
                    {{ $riskAssessment->risk_assessment_start_date ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Assessment End Date" label_ar="تاريخ انتهاء تقييم المخاطر">
                    {{ $riskAssessment->risk_assessment_end_date ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Risk Assessment Type" label_ar="نوع تقييم المخاطر">
                    {{ $riskAssessment->risk_assessment_type ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Assessment Internal or External" label_ar="تقييم المخاطر الداخلية أو الخارجية">
                    {{ $riskAssessment->risk_assessment_internal_external ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Risk Assessment Approach" label_ar="نهج تقييم المخاطر">
                {{ $riskAssessment->risk_assessment_approach ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Risk Assessment Objectives" label_ar="أهداف تقييم المخاطر">
                {{ $riskAssessment->risk_assessment_objectives ?? '—' }}
            </x-info-col-lg>
            <x-info-col-lg label="Risk Assessment Scope" label_ar="نطاق تقييم المخاطر">
                {{ $riskAssessment->risk_assessment_scope ?? '—' }}
            </x-info-col-lg>
            <x-info-col-lg label="Standard References" label_ar="مراجع معايير">
                {{ $riskAssessment->standard_references ?? '—' }}
            </x-info-col-lg>
            <x-info-col-lg label="Risk Assessing Entity" label_ar="ضوابط تقييم الجهة">
                {{ $riskAssessment->risk_assessing_entity ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Risk Assessment Against" label_ar="المخاطر تقييم الجهة">
                    {{ $riskAssessment->risk_assessment_against ?? '—' }}
                </x-info-col>
                <x-info-col label="Location Name" label_ar="اسم الموقع">
                    {{ $riskAssessment->location?->location_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Auditor Name" label_ar="اسم مدقق">
                    {{ $riskAssessment->auditor->auditor_first_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Classification Name" label_ar="اسم التصنيف">
                    {{ $riskAssessment->classification?->classification_name ?? '—' }}
                </x-info-col>
            </x-info-row>

        </div>
        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="S.No" label_ar="رقم" />
                    <x-table.th label="Finding ID" label_ar="رمز العثور على" />
                    <x-table.th label="Finding Name" label_ar="اسم العثور على" />
                    <x-table.th label="Risk Implementation Status" label_ar="حالة تنفيذ المخاطر" />
                    <x-table.th label="Action" label_ar="إجراء " />
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($riskAssessment->findings as $finding)
                        <tr>
                            <x-table.td> {{ $loop->index + 1 }}</x-table.td>
                            <x-table.td>
                                {{ $finding->risk_finding_id }}
                            </x-table.td>
                            <x-table.td>
                                {{ $finding->risk_finding_name }}
                            </x-table.td>
                            <x-table.td>
                                {{ $finding->risk_implementation_status }}
                            </x-table.td>
                            <x-table.td action_col="true">

                                <x-action.view route_name="risk-assessment-findings.show" param="{{ $finding->id }}" />
                                <x-action.edit route_name="risk-assessment-findings.edit" param="{{ $finding->id }}" />
                                <x-action.delete route_name="risk-assessment-findings.destroy"
                                    param="{{ $finding->id }}" />
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>
    </div>
@endsection
