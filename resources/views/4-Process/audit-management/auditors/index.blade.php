@extends('layouts.audit')
@section('title', 'Auditor Information')
@section('title_ar', 'معلومات المراجع')

@section('content')
    <div>

        <x-table.action-wrapper title="All Auditors">
            <x-action.button label="Add Auditee" label_ar="إضافة مراجعة" route_name="auditors.create" />
        </x-table.action-wrapper>


        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Auditor ID" label_ar="رمز مراجعة" />
                <x-table.th label="Auditor Name" label_ar="اسم مراجعة" />
                <x-table.th label="Auditor Organization" label_ar="الجهة مراجعة" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($auditors as $auditor)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$auditors" />
                        </x-table.td>
                        <x-table.td>
                            {{ $auditor->auditor_id }}
                        </x-table.td>
                        <x-table.td>{{ $auditor->auditor_first_name }} {{ $auditor->auditor_last_name }}</x-table.td>
                        <x-table.td>{{ $auditor?->auditor_organization }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="auditors.show" param="{{ $auditor->id }}" />
                            <x-action.edit route_name="auditors.edit" param="{{ $auditor->id }}" />
                            <x-action.delete route_name="auditors.destroy" param="{{ $auditor->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        <x-pagination>
            {{ $auditors->links() }}
        </x-pagination>

    </div>
@endsection
