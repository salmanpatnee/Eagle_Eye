@extends('layouts.user')
@section('title', 'Users')
@section('content')
    <div>
        <x-table.action-wrapper title="User Details">
            <x-action.button label="View" route_name="users.index" />
            <x-action.button label="Edit" route_name="users.edit" route_param="{{ $user->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Full Name">
                    {{ $user->first_name . ' ' . $user->last_name }}
                </x-info-col>

                <x-info-col label="User Name">
                    {{ $user->username }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Email">
                    {{ $user->email }}
                </x-info-col>

                <x-info-col label="Role">
                    {{ $user->role->role_name ?? '—' }}

                </x-info-col>
            </x-info-row>



        </div>
    </div>
@endsection
