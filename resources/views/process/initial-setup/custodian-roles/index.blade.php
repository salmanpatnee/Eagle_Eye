@extends('process/initial-setup/layout/app')
@section('title', 'Custodian Roles')
@section('title_ar', 'دور الوصي')
@section('content')
    <div>
        <x-table.action-wrapper title="All Custodian Roles">
            <x-action.button label="Add Custodian Role" label_ar="إضافة دور الوصي" route_name="custodian-roles.create" />
        </x-table.action-wrapper>

        <x-table.scroll-table height-offset="180" min-width="900px">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Custodian Role ID" label_ar="رمز دور الوصي" />
                <x-table.th label="Custodian Role Title" label_ar="عنوان دور الوصي" />
                <x-table.th label="Description" label_ar="وصف دور الوصي" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-slot:head>
            <x-slot:body>
                @foreach ($custodianRoles as $custodianRole)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$custodianRoles" /></x-table.td>
                        <x-table.td>{{ $custodianRole->custodian_role_id }}</x-table.td>
                        <x-table.td>{{ $custodianRole->custodian_role_title }}</x-table.td>
                        <x-table.td min-width="200px" max-width="500px"><span class="line-clamp-3" title="{{ $custodianRole->custodian_role_description }}">{{ $custodianRole->custodian_role_description }}</span></x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="custodian-roles.show" param="{{ $custodianRole->id }}" />
                            <x-action.edit route_name="custodian-roles.edit" param="{{ $custodianRole->id }}" />
                            <x-action.delete route_name="custodian-roles.destroy" param="{{ $custodianRole->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $custodianRoles->links() }}
        </x-pagination>

    </div>
@endsection
