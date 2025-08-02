@extends('layouts.audit')
@section('title', 'Auditee Information')
@section('title_ar', 'معلومات التدقيق')

@section('content')
    <div>

        <x-table.action-wrapper title="All Auditees">
            <x-action.button label="Add Auditee" label_ar="إضافة مراجعة" route_name="auditees.create" />
        </x-table.action-wrapper>


        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Auditee ID" label_ar="رمز مراجعة" />
                <x-table.th label="Auditee Name" label_ar="اسم مراجعة" />
                <x-table.th label="Auditee Department" label_ar="القسم مراجعة" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($auditees as $auditee)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$auditees" />
                        </x-table.td>
                        <x-table.td>
                            {{ $auditee->auditee_id }}
                        </x-table.td>
                        <x-table.td>{{ $auditee->auditee_first_name }} {{ $auditee->auditee_last_name }}</x-table.td>
                        <x-table.td>{{ $auditee?->department->department_name }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="auditees.show" param="{{ $auditee->id }}" />
                            <x-action.edit route_name="auditees.edit" param="{{ $auditee->id }}" />
                            <x-action.delete route_name="auditees.destroy" param="{{ $auditee->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        <x-pagination>
            {{ $auditees->links() }}
        </x-pagination>

    </div>
@endsection
