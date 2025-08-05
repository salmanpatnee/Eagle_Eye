@extends('layouts.app-full')
@section('title', 'Risk Assessments Summary')
@section('title_ar', 'ملخص تقييم المخاطر')
@section('content')
    <div>
        <x-table.action-wrapper title="Risk Assessments Summary">
            <x-action.button label="Add Risk Assessment" label_ar="إضافة تقييم المخاطر" route_name="risk-assessments.create" />
        </x-table.action-wrapper>

        <form action="{{ route('risk-assessments.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-3-col>
                    <div>
                        <x-form.select label="Risk Assessments" label_ar="تقييم المخاطر" name="risk_assessment_id"
                            :value="$riskAssessmentId" :data="$riskAssessmentNames" id_key="risk_assessment_id" value_key="name"
                            onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.select label="Risks" label_ar="المخاطر" name="risk_id" :value="$riskId" :data="$riskNames"
                            id_key="risk_id" value_key="name" onchange="this.form.submit()" />
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
                    <x-table.th label="Assessment ID" label_ar="رمز تقييم المخاطر" />
                    <x-table.th label="Assessment Name" label_ar="اسم تقييم المخاطر" />
                    <x-table.th label="Start and End Date" label_ar="تاريخ بدءانتهاء" />
                    <x-table.th label="No of Risk Assessed" label_ar="عدد المخاطر التي تم تقييمها" />
                    <x-table.th label="Action" label_ar="إجراء " />
                </tr>
            </x-table.thead>
            <x-table.tbody>
                @forelse ($riskAssessments as $controlAssessment)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$riskAssessments" />
                        </x-table.td>
                        <x-table.td>
                            {{ $controlAssessment->risk_assessment_id }}
                        </x-table.td>
                        <x-table.td>
                            {{ $controlAssessment->risk_assessment_name }}
                        </x-table.td>
                        <x-table.td>
                            {{ $controlAssessment->start_end_date }}
                        </x-table.td>
                        <x-table.td>
                            {{ $controlAssessment->findings->count() }}
                        </x-table.td>

                        <x-table.td action_col="true">
                            <x-action.add route_name="risk-assessment-findings.create"
                                param="{{ $controlAssessment->id }}" />
                            <x-action.view route_name="risk-assessments.show" param="{{ $controlAssessment->id }}" />
                            <x-action.edit route_name="risk-assessments.edit" param="{{ $controlAssessment->id }}" />
                            <x-action.delete route_name="risk-assessments.destroy" param="{{ $controlAssessment->id }}" />
                        </x-table.td>

                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        <x-pagination>
            {{ $riskAssessments->links() }}
        </x-pagination>

    </div>
@endsection
