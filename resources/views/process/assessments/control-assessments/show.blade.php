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
        <div class="px-4 py-4 border-t border-gray-100 space-y-3">
            {{-- 4 Implementation Status Stats --}}
            <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
                {{-- Implemented --}}
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="h-1 bg-success-500"></div>
                    <div class="px-4 py-3">
                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-1">Implemented</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $findingStats['implemented'] }}</p>
                        <div class="mt-2 flex items-center gap-2">
                            <div class="h-1.5 flex-1 rounded-full bg-gray-100 overflow-hidden">
                                <div class="h-full bg-success-500 rounded-full" style="width: {{ $totalControls > 0 ? round($findingStats['implemented'] / $totalControls * 100) : 0 }}%"></div>
                            </div>
                            <span class="text-xs text-gray-400 shrink-0">{{ $totalControls > 0 ? round($findingStats['implemented'] / $totalControls * 100) : 0 }}%</span>
                        </div>
                    </div>
                </div>

                {{-- Partially Implemented --}}
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="h-1 bg-warning-400"></div>
                    <div class="px-4 py-3">
                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-1">Partial</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $findingStats['partially_implemented'] }}</p>
                        <div class="mt-2 flex items-center gap-2">
                            <div class="h-1.5 flex-1 rounded-full bg-gray-100 overflow-hidden">
                                <div class="h-full bg-warning-400 rounded-full" style="width: {{ $totalControls > 0 ? round($findingStats['partially_implemented'] / $totalControls * 100) : 0 }}%"></div>
                            </div>
                            <span class="text-xs text-gray-400 shrink-0">{{ $totalControls > 0 ? round($findingStats['partially_implemented'] / $totalControls * 100) : 0 }}%</span>
                        </div>
                    </div>
                </div>

                {{-- Not Implemented --}}
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="h-1 bg-error-500"></div>
                    <div class="px-4 py-3">
                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-1">Not Implemented</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $findingStats['not_implemented'] }}</p>
                        <div class="mt-2 flex items-center gap-2">
                            <div class="h-1.5 flex-1 rounded-full bg-gray-100 overflow-hidden">
                                <div class="h-full bg-error-500 rounded-full" style="width: {{ $totalControls > 0 ? round($findingStats['not_implemented'] / $totalControls * 100) : 0 }}%"></div>
                            </div>
                            <span class="text-xs text-gray-400 shrink-0">{{ $totalControls > 0 ? round($findingStats['not_implemented'] / $totalControls * 100) : 0 }}%</span>
                        </div>
                    </div>
                </div>

                {{-- Not Applicable --}}
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="h-1 bg-gray-400"></div>
                    <div class="px-4 py-3">
                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-1">Not Applicable</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $findingStats['not_applicable'] }}</p>
                        <div class="mt-2 flex items-center gap-2">
                            <div class="h-1.5 flex-1 rounded-full bg-gray-100 overflow-hidden">
                                <div class="h-full bg-gray-400 rounded-full" style="width: {{ $totalControls > 0 ? round($findingStats['not_applicable'] / $totalControls * 100) : 0 }}%"></div>
                            </div>
                            <span class="text-xs text-gray-400 shrink-0">{{ $totalControls > 0 ? round($findingStats['not_applicable'] / $totalControls * 100) : 0 }}%</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Assessment Progress --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm px-4 py-3">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-semibold uppercase tracking-widest text-gray-400">Assessment Progress</span>
                    <div class="flex items-center gap-2">
                        @if ($remainingControlsCount > 0)
                            <span class="inline-flex items-center gap-1.5 rounded-full border border-warning-200 bg-warning-50 px-2.5 py-0.5 text-xs font-medium text-warning-700">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                </svg>
                                {{ $remainingControlsCount }} remaining
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 rounded-full border border-success-200 bg-success-50 px-2.5 py-0.5 text-xs font-medium text-success-700">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                                Complete
                            </span>
                        @endif
                        <span class="text-sm font-bold text-gray-700">{{ $completionPercent }}%</span>
                    </div>
                </div>
                <div class="h-2 rounded-full bg-gray-100 overflow-hidden">
                    <div class="h-full rounded-full bg-brand-500 transition-all duration-500" style="width: {{ $completionPercent }}%"></div>
                </div>
                <div class="mt-2 flex items-center justify-between text-xs text-gray-400">
                    <span>{{ $controlAssessment->findings->count() }} assessed</span>
                    <span>{{ $totalControls }} total controls</span>
                </div>
            </div>
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
