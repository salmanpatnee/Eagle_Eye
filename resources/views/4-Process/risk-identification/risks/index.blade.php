@extends('layouts.risk')
@section('title', 'Risk Identification')
@section('title_ar', 'تحديد المخاطر')

@section('content')
    <div>

        <x-table.action-wrapper title="All Risks">
            <x-action.button label="Add Risk" label_ar="إضافة المخاطر" route_name="risks.create" />
        </x-table.action-wrapper>


        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Risk ID" label_ar="رمز تحديد المخاطر" />
                <x-table.th label="Risk Name" label_ar="اسم تحديد المخاطر" />
                <x-table.th label="Risk Group" label_ar="اسم مجموعة المخاطر" />
                <x-table.th label="Owner" label_ar="اسم صاحب المخاطر" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($risks as $risk)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$risks" />
                        </x-table.td>
                        <x-table.td>
                            {{ $risk->risk_id }}
                        </x-table.td>
                        <x-table.td>{{ $risk->risk_name }}</x-table.td>
                        <x-table.td>{{ $risk?->group?->risk_group_name }}</x-table.td>
                        <x-table.td>{{ $risk?->owner?->owner_name }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="risks.show" param="{{ $risk->id }}" />
                            <x-action.edit route_name="risks.edit" param="{{ $risk->id }}" />
                            <x-action.delete route_name="risks.destroy" param="{{ $risk->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
        <x-pagination>
            {{ $risks->links() }}
        </x-pagination>
    </div>
@endsection
