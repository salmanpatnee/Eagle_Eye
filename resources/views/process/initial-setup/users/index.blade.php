@extends('layouts.user')
@section('title', 'Users')

@section('content')
    <div>
        <x-table.action-wrapper title="User List">
            <x-action.button label="Add User" route_name="users.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" />
                <x-table.th label="Full Name" />
                <x-table.th label="Username" />
                <x-table.th label="Email" />
                <x-table.th label="Role" />
                <x-table.th label="Action" />
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
                            <x-action.edit route_name="users.edit" param="{{ $user->id }}" />
                            <x-action.delete route_name="users.destroy" param="{{ $user->id }}" />
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
