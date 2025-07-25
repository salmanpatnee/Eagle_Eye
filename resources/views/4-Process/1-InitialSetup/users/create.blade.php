@extends('layouts.user')
@section('title', 'Users')
@section('title_ar', 'المستخدم')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $user?->id ? 'Update' : 'New' }} User">
            <x-action.button label="View" label_ar="منظر" route_name="users.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
            @csrf
            @if (isset($user))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="First Name" label_ar="الاسم الأول" name="first_name" required="true"
                            placeholder="Enter First Name" :value="$user?->first_name" />
                    </div>
                    <div>
                        <x-form.field label="Last Name" label_ar="اسم العائلة" name="last_name" required="true"
                            placeholder="Enter Last Name" :value="$user?->last_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Username" label_ar="اسم المستخدم" name="username" required="true"
                            placeholder="Enter Username" :value="$user?->username" />
                    </div>
                    <div>
                        <x-form.field type="email" label="Email" label_ar="عنوان البريد الإلكتروني" name="email"
                            required="true" placeholder="Enter Email" :value="$user?->email" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        @if ($user?->id)
                            <x-form.field type="password" label="Password" label_ar="كلمة المرور" name="password"
                                placeholder="Enter Password" />
                        @else
                            <x-form.field type="password" label="Password" label_ar="كلمة المرور" name="password"
                                placeholder="Enter Password" required="true" />
                        @endif
                    </div>
                    <div>
                        <x-form.select label="Role" label_ar="دور" name="role_id" required="true"
                            placeholder="Select Role" :value="$user?->role_id" :data="$roles" id_key="id"
                            value_key="role_name" />
                    </div>
                </x-form.grid-col>


                <div class="flex justify-end">
                    <x-form.submit label="User" label_ar="المستخدم" :isUpdate="$user?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
