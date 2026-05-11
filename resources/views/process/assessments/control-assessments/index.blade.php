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
                <x-form.grid-4-col>
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
                        <x-form.select label="Status" label_ar="الحالة" name="status"
                            :value="$status" :data="$statusOptions"
                            id_key="status_id" value_key="status_text" 
                            onchange="this.form.submit()" hide_keys="true"/>
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
                    
                </x-form.grid-4-col>
            </div>
        </form>

        <x-table.scroll-table>
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Assessment ID" label_ar="رمز تقييم الضوابط" />
                <x-table.th label="Assessment Name" label_ar="اسم تقييم الضوابط" />
                <x-table.th label="Start and End Date" label_ar="تاريخ بدءانتهاء" />
                <x-table.th label="No of Control Assessed" label_ar="عدد الضوابط التي تم تقييمها" />
                <x-table.th label="Status" label_ar="الحالة" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-slot:head>
            <x-slot:body>
                @forelse ($controlAssessments as $controlAssessment)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$controlAssessments" />
                        </x-table.td>
                        <x-table.td>{{ $controlAssessment->control_assessment_id }}</x-table.td>
                        <x-table.td min-width="250px">{{ $controlAssessment->control_assessment_name }}</x-table.td>
                        <x-table.td>{{ $controlAssessment->start_end_date }}</x-table.td>
                        <x-table.td>{{ $controlAssessment->findings->count() }}</x-table.td>
                        <x-table.td>
                            <x-status-badge :status="$controlAssessment->remaining_controls_count === 0 ? 'completed' : 'in-progress'" />
                        </x-table.td>
                        <x-table.td action_col="true">
                            @if ($controlAssessment->remaining_controls_count > 0)
                                <x-action.add route_name="control-assessment-findings.create" param="{{ $controlAssessment->id }}" />
                            @endif
                            <x-action.view route_name="control-assessments.show" param="{{ $controlAssessment->id }}" />
                            <x-action.edit route_name="control-assessments.edit" param="{{ $controlAssessment->id }}" />
                            <x-action.delete route_name="control-assessments.destroy" param="{{ $controlAssessment->id }}" />
                        </x-table.td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-3 py-6 text-center text-gray-500 dark:text-gray-400">No control assessments found.</td>
                    </tr>
                @endforelse
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $controlAssessments->links() }}
        </x-pagination>

    </div>
@endsection
