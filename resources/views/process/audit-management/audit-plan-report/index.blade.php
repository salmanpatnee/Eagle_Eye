@extends('layouts.app-full')
@section('title', 'Audit Plan')
@section('title_ar', 'خطة التدقيق')
@section('content')
    <div>
        <x-table.action-wrapper title="Audit Plan">
            <x-action.button label="Summary Report" label_ar="تقرير ملخص" route_name="audit.plan.report.summarize" />
            <x-action.pdf-button route_name="audit-plan-report.index" />
            <x-action.excel-button route_name="audit.plan.excel.report" />

        </x-table.action-wrapper>

        <form action="{{ route('audit-plan-report.index') }}">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Team Responsible" label_ar="فريق المسؤول" name="team_responsible"
                            :value="$team" :data="$teamResponsible" id_key="auditor_organization"
                            value_key="auditor_organization" hide_keys="true" onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.label label="Audit Start Date" label_ar="تاريخ بدء التدقيق" for="audit_start_date" />
                        <div class="relative">
                            <input type="date" id="audit_start_date" name="audit_start_date"
                                value="{{ old('audit_start_date', $audit_start_date) }}" class="input-field"
                                onclick="this.showPicker()" onchange="this.form.submit()" />
                            <x-icons.calendar />
                        </div>
                    </div>

                </x-form.grid-col>
            </div>
        </form>



        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Audit ID" label_ar="رمز التدقيق" />
                <x-table.th label="Audit Name" label_ar="اسم التدقيق" />
                <x-table.th label="Team Responsible" label_ar="المسؤول عن الفريق" />
                <x-table.th label="Lead Auditor" label_ar="مدقق رئيسي" />
                <x-table.th label="Type of Audit" label_ar="نوع التدقيق" />
                <x-table.th label="Scope of Audit" label_ar="نطاق التدقيق" />
                <x-table.th label="Methods" label_ar="طُرق" />
                <x-table.th label="Criteria" label_ar="معايير" />
                <x-table.th label="Sampling" label_ar="أخذ العينات" />
                <x-table.th label="Evidence Needed" label_ar="الأدلة المطلوبة" />
                <x-table.th label="Duration" label_ar="مدة" />
                <x-table.th label="Schedule" label_ar="جدول" />
                <x-table.th label="Audit Start Date" label_ar="تاريخ بدء التدقيق" />
                <x-table.th label="Audit End Date" label_ar="تاريخ انتهاء التدقيق" />
                <x-table.th label="Cost" label_ar="يكلف" />
                <x-table.th label="Comment" label_ar="كيف" />
            </x-table.thead>
            <x-table.tbody>
                @forelse ($auditPlans as $auditPlan)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>
                            <a href="{{ route('audit-plans.show', $auditPlan['id']) }}">{{ $auditPlan['audit_id'] }}</a>
                        </x-table.td>
                        <x-table.td> {{ $auditPlan['audit_name'] }}</x-table.td>
                        <x-table.td> {{ $auditPlan['auditor_organization'] }}</x-table.td>
                        <x-table.td>
                            <a
                                href="{{ route('auditors.show', $auditPlan['auditor_row_id']) }}">{{ $auditPlan['auditor'] }}</a>
                        </x-table.td>
                        <x-table.td>{{ $auditPlan['audit_type'] }}</x-table.td>
                        <x-table.td>
                            <div style="width: 300px; white-space: normal">{{ $auditPlan['audit_scope'] }}</div>
                        </x-table.td>
                        <x-table.td>{{ $auditPlan['audit_methodology'] }}</x-table.td>
                        <x-table.td>{{ $auditPlan['audit_criteria'] }}</x-table.td>
                        <x-table.td>
                            <div style="width: 300px; white-space: normal">{{ $auditPlan['sampling'] }}</div>
                        </x-table.td>
                        <x-table.td>
                            <div style="width: 300px; white-space: normal">{{ $auditPlan['evidence_needed'] }}</div>
                        </x-table.td>
                        <x-table.td>{{ $auditPlan['duration_in_days'] }}</x-table.td>
                        <x-table.td>
                            <div style="width: 300px; white-space: normal">{{ $auditPlan['schedule'] }}</div>
                        </x-table.td>
                        <x-table.td>{{ $auditPlan['audit_plan_start_date'] }}</x-table.td>
                        <x-table.td>{{ $auditPlan['audit_plan_end_date'] }}</x-table.td>
                        <x-table.td>{{ $auditPlan['cost'] }}</x-table.td>
                        <x-table.td>{{ $auditPlan['comment'] }}</x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
