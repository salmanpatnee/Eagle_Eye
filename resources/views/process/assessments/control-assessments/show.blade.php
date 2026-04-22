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
                    {{ $controlAssessment->bestPractice?->best_practices_name ?? '—' }}
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
        <div class="px-3 py-2">
            @if ($remainingControlsCount > 0)
                <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-sm font-medium"
                      style="background-color: var(--color-warning-100); color: var(--color-warning-800);">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                    {{ $remainingControlsCount }} control(s) remaining to assess
                </span>
            @else
                <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-800">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                    All controls assessed
                </span>
            @endif
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
