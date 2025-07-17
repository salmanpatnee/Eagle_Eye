@extends('4-Process.1-InitialSetup.layout.app')
@section('title', 'Owner Role')
@section('title_ar', 'دور الصاحب')
@section('content')
    <div>
        <x-table.action-wrapper>

            <x-action.button label="Add Owner Role" label_ar="إضافة دور الصاحب" route_name="owner-roles.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Owner Role ID" label_ar="رمز دور الصاحب" />
                <x-table.th label="Owner Role Name" label_ar="اسم دور الصاحب" />
                <x-table.th label="Owner Role Description" label_ar="اسم دور الصاحب" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>

            <x-table.tbody>
                @foreach ($ownerRoles as $ownerRole)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $ownerRole->owner_role_id }}</x-table.td>
                        <x-table.td>{{ $ownerRole->owner_role_name }}</x-table.td>
                        <x-table.td>{{ $ownerRole->owner_role_description }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="owner-roles.show" param="{{ $ownerRole->id }}" />
                            <x-action.edit route_name="owner-roles.edit" param="{{ $ownerRole->id }}" />
                            <x-action.delete route_name="owner-roles.destroy" param="{{ $ownerRole->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        {{-- <x-pagination>
            {{ $departments->links() }}
        </x-pagination> --}}


    </div>
@endsection
