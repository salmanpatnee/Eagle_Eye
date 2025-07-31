@extends('layouts.app-full')
@section('title', 'Control Assessments Summary')
@section('title_ar', 'ملخص تقييم الضوابط')
@section('content')
    <div>
        <x-table.action-wrapper title="Control Assessments Summary">
            <x-action.button label="Add Control Assessment" label_ar="إضافة تقييم الضوابط"
                route_name="control-assessments.create" />
        </x-table.action-wrapper>

        <form action="{{ route('control-assessments.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-3-col>
                    <div>
                        <x-form.select label="Control Assessments" label_ar="تقييم الضوابط" name="control_assessment_id"
                            :value="$controlAssessmentId" :data="$assessments" id_key="control_assessment_id" value_key="name"
                            onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.select label="Controls" label_ar="الضوابط" name="control_id" :value="$controlId"
                            :data="$controls" id_key="control_id" value_key="control_name" onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.label label="Date" label_ar="تاريخ" for="start_end_date" />
                        <div class="relative">
                            <input type="date" id="start_end_date" name="start_end_date"
                                value="{{ old('start_end_date', $startEndDate) }}" class="input-field"
                                onclick="this.showPicker()" onchange="this.form.submit()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                </x-form.grid-3-col>
            </div>
        </form>

        <x-table.table>
            <x-table.thead>
                <tr>
                    <x-table.th label="S.No" label_ar="رقم" />
                    <x-table.th label="Assessment ID" label_ar="رمز تقييم الضوابط" />
                    <x-table.th label="Assessment Name" label_ar="اسم تقييم الضوابط" />
                    <x-table.th label="Start and End Date" label_ar="تاريخ بدءانتهاء" />
                    <x-table.th label="Control Assessed" label_ar="تقييم الرقابة" />
                    <x-table.th label="Action" label_ar="إجراء " />
                </tr>
            </x-table.thead>
            <x-table.tbody>
                @forelse ($controlAssessments as $controlAssessment)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$controlAssessments" />
                        </x-table.td>
                        <x-table.td>
                            <a href="{{ route('control-assessments.show', $controlAssessment->id) }}">
                                {{ $controlAssessment->control_assessment_id }}
                            </a>
                        </x-table.td>
                        <x-table.td>
                            {{ $controlAssessment->control_assessment_name }}
                        </x-table.td>
                        <x-table.td>
                            {{ $controlAssessment->start_end_date }}
                        </x-table.td>
                        <x-table.td>

                            <ul class="flex flex-col gap-1.5">
                                @forelse ($controlAssessment->findings as $finding)
                                    <li class="border-b border-gray-200 flex items-center last:border-b-0">
                                        <span>
                                            <a
                                                href="{{ route('control-assessment-findings.show', $finding->id) }}">{{ $finding->control_id }}</a>
                                        </span>
                                    </li>
                                @empty
                                    <li
                                        class="flex items-center gap-2 border-b border-gray-200 px-3 py-2.5 text-base text-left font-medium text-gray-600 last:border-b-0">
                                        -
                                    </li>
                                @endforelse
                            </ul>
                            {{-- <x-table-list :data="$controlAssessment->findings" id_key="" value_key="control_finding_id" /> --}}
                        </x-table.td>
                        <x-table.td action_col="true">
                            <x-action.add route_name="control-assessment-findings.create"
                                param="{{ $controlAssessment->control_assessment_id }}" />
                            <x-action.view route_name="control-assessments.show" param="{{ $controlAssessment->id }}" />
                            <x-action.edit route_name="control-assessments.edit" param="{{ $controlAssessment->id }}" />
                            <x-action.delete route_name="control-assessments.destroy"
                                param="{{ $controlAssessment->id }}" />
                        </x-table.td>

                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        <x-pagination>
            {{ $controlAssessments->links() }}
        </x-pagination>

    </div>
@endsection
