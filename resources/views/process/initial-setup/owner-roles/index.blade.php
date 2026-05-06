@extends('process/initial-setup/layout/app')
@section('title', 'Owner Role')
@section('title_ar', 'دور الصاحب')
@section('content')
    <div>
        <x-table.action-wrapper title="All Owner Roles">
            <x-action.button label="Add Owner Role" label_ar="إضافة دور الصاحب" route_name="owner-roles.create" />
        </x-table.action-wrapper>

        <x-table.scroll-table height-offset="180" min-width="900px">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Owner Role ID" label_ar="رمز دور الصاحب" />
                <x-table.th label="Owner Role Name" label_ar="اسم دور الصاحب" />
                <x-table.th label="Owner Role Description" label_ar="اسم دور الصاحب" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-slot:head>
            <x-slot:body>
                @foreach ($ownerRoles as $ownerRole)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$ownerRoles" /></x-table.td>
                        <x-table.td>{{ $ownerRole->owner_role_id }}</x-table.td>
                        <x-table.td>{{ $ownerRole->owner_role_name }}</x-table.td>
                        <x-table.td min-width="410px" max-width="800px"><span class="line-clamp-3" title="{{ $ownerRole->owner_role_description }}">{{ $ownerRole->owner_role_description }}</span></x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="owner-roles.show" param="{{ $ownerRole->id }}" />
                            <x-action.edit route_name="owner-roles.edit" param="{{ $ownerRole->id }}" />
                            <x-action.delete route_name="owner-roles.destroy" param="{{ $ownerRole->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $ownerRoles->links() }}
        </x-pagination>

    </div>
@endsection
