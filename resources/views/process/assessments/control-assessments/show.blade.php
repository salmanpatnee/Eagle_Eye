@extends('layouts.app-full')
@section('title', 'Control Assessment')
@section('title_ar', 'تقييم الضوابط')
@section('content')
    <div>
        <x-table.action-wrapper title="Control Assessment">
            <x-action.button label="View" label_ar="منظر" route_name="control-assessments.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="control-assessments.edit"
                route_param="{{ $controlAssessment->id }}" />
        </x-table.action-wrapper>



        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Control Assessment ID" label_ar="رمز تقييم الضوابط">
                    {{ $controlAssessment->control_assessment_id }}
                </x-info-col>
                <x-info-col label="Control Assessment Name" label_ar="اسم تقييم الضوابط">
                    {{ $controlAssessment->control_assessment_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Control Assessment Description" label_ar="وصف تقييم الضوابط">
                {{ $controlAssessment->control_assessment_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Control Assessment Start Date" label_ar="تاريخ بدء تقييم الضوابط">
                    {{ $controlAssessment->control_assessment_start_date ?? '—' }}
                </x-info-col>
                <x-info-col label="Control Assessment End Date" label_ar="تاريخ انتهاء تقييم الضوابط">
                    {{ $controlAssessment->control_assessment_end_date ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Assessment Type" label_ar="نوع تقييم الضوابط">
                    {{ $controlAssessment->control_assessment_type ?? '—' }}
                </x-info-col>
                <x-info-col label="Control Assessment Internal or External" label_ar="تقييم الضوابط الداخلية أو الخارجية">
                    {{ $controlAssessment->control_assessment_internal_external ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Control Assessment Approach" label_ar="نهج تقييم الضوابط">
                {{ $controlAssessment->control_assessment_approach ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Control Assessment Objectives" label_ar="أهداف تقييم الضوابط">
                {{ $controlAssessment->control_assessment_objectives ?? '—' }}
            </x-info-col-lg>
            <x-info-col-lg label="Control Assessment Scope" label_ar="نطاق تقييم الضوابط">
                {{ $controlAssessment->control_assessment_scope ?? '—' }}
            </x-info-col-lg>
            <x-info-col-lg label="Standard References" label_ar="مراجع معايير">
                {{ $controlAssessment->standard_references ?? '—' }}
            </x-info-col-lg>
            <x-info-col-lg label="Control Assessing Entity" label_ar="ضوابط تقييم الجهة">
                {{ $controlAssessment->control_assessing_entity ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Best Practice Name" label_ar="اسم أفضل الممارسات">
                    {{ $controlAssessment->bestPractice?->best_practice_name ?? '—' }}
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
        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="S.No" label_ar="رقم" />
                    <x-table.th label="Finding ID" label_ar="رمز العثور على" />
                    <x-table.th label="Finding Name" label_ar="اسم العثور على" />
                    <x-table.th label="Control Implementation Status" label_ar="حالة تنفيذ الضوابط" />
                    <x-table.th label="Action" label_ar="إجراء " />
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($controlAssessment->findings as $finding)
                        <tr>
                            <x-table.td> {{ $loop->index + 1 }}</x-table.td>
                            <x-table.td>
                                {{ $finding->control_finding_id }}
                            </x-table.td>
                            <x-table.td>
                                {{ $finding->control_finding_name }}
                            </x-table.td>
                            <x-table.td>
                                {{ $finding->control_implementation_status }}
                            </x-table.td>
                            <x-table.td action_col="true">

                                <x-action.view route_name="control-assessment-findings.show" param="{{ $finding->id }}" />
                                <x-action.edit route_name="control-assessment-findings.edit" param="{{ $finding->id }}" />
                                <x-action.delete route_name="control-assessment-findings.destroy"
                                    param="{{ $finding->id }}" />
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>
    </div>
@endsection
