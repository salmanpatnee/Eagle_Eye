@extends('layouts.audit')
@section('title', 'Audit Information')
@section('title_ar', 'تخطيط مراجعة')

@section('content')
    <div>

        <x-table.action-wrapper title="All Audits ">
            <x-action.button label="Add Audit Plan" label_ar="إضافة مراجعة" route_name="audit-plans.create" />
        </x-table.action-wrapper>


        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Audit ID" label_ar="رمز مراجعة" />
                <x-table.th label="Audit Name" label_ar="اسم مراجعة" />
                <x-table.th label="Audit Start Date" label_ar="تاريخ بدء خطة مراجعة" />
                <x-table.th label="Audit End Date" label_ar="تاريخ انتهاء خطة مراجعة" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($auditPlans as $auditPlan)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$auditPlans" />
                        </x-table.td>
                        <x-table.td>
                            {{ $auditPlan->audit_id }}
                        </x-table.td>
                        <x-table.td>{{ $auditPlan->audit_name }}</x-table.td>
                        <x-table.td>{{ $auditPlan?->audit_plan_start_date }}</x-table.td>
                        <x-table.td>{{ $auditPlan?->audit_plan_end_date }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="audit-plans.show" param="{{ $auditPlan->id }}" />
                            <x-action.edit route_name="audit-plans.edit" param="{{ $auditPlan->id }}" />
                            <x-action.delete route_name="audit-plans.destroy" param="{{ $auditPlan->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        <x-pagination>
            {{ $auditPlans->links() }}
        </x-pagination>

    </div>
@endsection
