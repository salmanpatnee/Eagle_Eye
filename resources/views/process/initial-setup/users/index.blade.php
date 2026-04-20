@extends('layouts.user')
@section('title', 'Users')
@section('title_ar', 'المستخدم')

@section('content')
    <div>
        <x-table.action-wrapper>
            @if(auth()->user()->role_id === 1)
                <x-action.button label="Add User" label_ar="إضافة المستخدم" route_name="users.create" />
            @endif
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Full Name" label_ar="الاسم الكامل" />
                <x-table.th label="Username" label_ar="اسم المستخدم" />
                <x-table.th label="Email" label_ar="عنوان البريد الإلكتروني" />
                <x-table.th label="Role" label_ar="دور" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($users as $user)
                    <tr>
                        <x-table.td> <x-table.serial :loop="$loop" :paginator="$users" /></x-table.td>
                        <x-table.td>{{ $user->first_name . ' ' . $user->last_name }}</x-table.td>
                        <x-table.td>{{ $user->username }}</x-table.td>
                        <x-table.td>{{ $user->email }}</x-table.td>
                        <x-table.td>{{ $user->role->role_name }}</x-table.td>

                        <x-table.td action_col="true">
                            <x-action.view route_name="users.show" param="{{ $user->id }}" />
                            @if(auth()->user()->role_id === 1)
                                <x-action.edit route_name="users.edit" param="{{ $user->id }}" />
                                <x-action.delete route_name="users.destroy" param="{{ $user->id }}" />
                            @endif
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        <x-pagination>
            {{ $users->links() }}
        </x-pagination>

    </div>
@endsection
