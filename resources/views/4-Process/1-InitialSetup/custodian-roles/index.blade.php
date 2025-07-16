@extends('layouts.app')
@section('title', 'Custodian Roles')
@section('title_ar', 'دور الوصي')
@section('content')
    <div>
        <x-table.action-wrapper>

            <x-action.button label="Add Custodian Role" label_ar="إضافة دور الوصي" route_name="custodian-roles.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Custodian Role ID" label_ar="رمز دور الوصي" />
                <x-table.th label="Custodian Role Title" label_ar="عنوان دور الوصي" />
                <x-table.th label="Description" label_ar="وصف دور الوصي" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>

            <x-table.tbody>
                @foreach ($custodianRoles as $custodianRole)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $custodianRole->custodian_role_id }}</x-table.td>
                        <x-table.td>{{ $custodianRole->custodian_role_title }}</x-table.td>
                        <x-table.td>{{ $custodianRole->custodian_role_description }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="custodian-roles.show" param="{{ $custodianRole->id }}" />
                            <x-action.edit route_name="custodian-roles.edit" param="{{ $custodianRole->id }}" />
                            <x-action.delete route_name="custodian-roles.destroy" param="{{ $custodianRole->id }}" />
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
