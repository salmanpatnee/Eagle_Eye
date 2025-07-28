@extends('layouts.risk')
@section('title', 'Risk Groups')
@section('title_ar', 'مجموعة المخاطر')

@section('content')
    <div>

        <x-table.action-wrapper title="All Risk Groups">
            <x-action.button label="Add Risk Group" label_ar="إضافة مجموعة المخاطر" route_name="risk-groups.create" />
        </x-table.action-wrapper>


        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Risk Group ID" label_ar="رمز مجموعة المخاطر" />
                <x-table.th label="Risk Group Name" label_ar="اسم مجموعة المخاطر" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($riskGroups as $riskGroup)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$riskGroups" />
                        </x-table.td>
                        <x-table.td>
                            {{ $riskGroup->risk_group_id }}
                        </x-table.td>
                        <x-table.td>{{ $riskGroup->risk_group_name }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="risk-groups.show" param="{{ $riskGroup->id }}" />
                            <x-action.edit route_name="risk-groups.edit" param="{{ $riskGroup->id }}" />
                            <x-action.delete route_name="risk-groups.destroy" param="{{ $riskGroup->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
        <x-pagination>
            {{ $riskGroups->links() }}
        </x-pagination>
    </div>
@endsection
