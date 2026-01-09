@extends('layouts.user')
@section('title', 'Users')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $user?->id ? 'Update' : 'New' }} User">
            <x-action.button label="View" route_name="users.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
            @csrf
            @if (isset($user))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="First Name" name="first_name" required="true"
                            placeholder="Enter First Name" :value="$user?->first_name" />
                    </div>
                    <div>
                        <x-form.field label="Last Name" name="last_name" required="true"
                            placeholder="Enter Last Name" :value="$user?->last_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Username" name="username" required="true"
                            placeholder="Enter Username" :value="$user?->username" />
                    </div>
                    <div>
                        <x-form.field type="email" label="Email" name="email"
                            required="true" placeholder="Enter Email" :value="$user?->email" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        @if ($user?->id)
                            <x-form.field type="password" label="Password" name="password"
                                placeholder="Enter Password" />
                        @else
                            <x-form.field type="password" label="Password" name="password"
                                placeholder="Enter Password" required="true" />
                        @endif
                    </div>
                    <div>
                        <x-form.select label="Role" name="role_id" required="true"
                            placeholder="Select Role" :value="$user?->role_id" :data="$roles" id_key="id"
                            value_key="role_name" />
                    </div>
                </x-form.grid-col>


                <div class="flex justify-end">
                    <x-form.submit label="User" :isUpdate="$user?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
