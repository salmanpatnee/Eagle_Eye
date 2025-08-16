@extends('layouts.app-full')
@section('title', 'Audit Plan')
@section('title_ar', 'خطة التدقيق')
@section('content')
    <div>
        <x-table.action-wrapper title="Audit Plan">
            <x-action.button label="Detailed Report" label_ar="تقرير ملخص" route_name="audit-plan-report.index" />

            <x-slot:extra>
            <div>
                <x-action.pdf-button route_name="audit.plan.report.summarize" />
                <x-action.excel-button route_name="audit.plan.summarize.excel.report" />
            </div>
            </x-slot:extra>
        </x-table.action-wrapper>

        <form action="{{ route('audit.plan.report.summarize') }}">
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
                <x-table.th label="Audit Start Date" label_ar="تاريخ بدء التدقيق" />
                <x-table.th label="Audit End Date" label_ar="تاريخ انتهاء التدقيق" />
                <x-table.th label="Auditee" label_ar="المدقق" />
                <x-table.th label="Team Responsible" label_ar="المسؤول عن الفريق" />
                <x-table.th label="Lead Auditor" label_ar="مدقق رئيسي" />

            </x-table.thead>
            <x-table.tbody>
                @forelse ($auditPlanSummary as $row)
                    <tr>
                        <x-table.td>{{ $loop->iteration }}</x-table.td>
                        <x-table.td><a href="{{ route('audit-plans.show', $row['id']) }}">{{ $row['audit_id'] }}</a>
                        </x-table.td>
                        <x-table.td>{{ $row['audit_name'] }}</x-table.td>
                        <x-table.td>{{ $row['audit_plan_start_date'] }}</x-table.td>
                        <x-table.td>{{ $row['audit_plan_end_date'] }}</x-table.td>
                        <x-table.td><a href="{{ route('auditees.show', $row['auditee_id']) }}">{{ $row['auditee'] }}</a>
                        </x-table.td>
                        <x-table.td>{{ $row['auditor_organization'] }}</x-table.td>
                        <x-table.td><a href="{{ route('auditors.show', $row['auditor_id']) }}">{{ $row['auditor'] }}</a>
                        </x-table.td>
                        {{-- <x-table.td>{{ $row['comment'] }}</x-table.td> --}}
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
