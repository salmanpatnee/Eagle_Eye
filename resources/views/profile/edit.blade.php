@extends('layouts.profile')

@section('title', 'Update Profile')
@section('title_ar', 'تحديث الملف الشخصي')

@section('content')
    <div class="max-w-4xl mx-auto">
        <x-table.action-wrapper title="Update Profile">
            <x-action.button label="Dashboard" label_ar="لوحة القيادة" route_name="vciso" />
        </x-table.action-wrapper>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="First Name" label_ar="الاسم الأول" name="first_name" required="true"
                            placeholder="Enter First Name" :value="old('first_name', $user->first_name)" />
                        @error('first_name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <x-form.field label="Last Name" label_ar="اسم العائلة" name="last_name" required="true"
                            placeholder="Enter Last Name" :value="old('last_name', $user->last_name)" />
                        @error('last_name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Username" label_ar="اسم المستخدم" name="username" required="true"
                            placeholder="Enter Username" :value="old('username', $user->username)" />
                        @error('username')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <x-form.field type="email" label="Email" label_ar="عنوان البريد الإلكتروني" name="email"
                            required="true" placeholder="Enter Email" :value="$user->email" readonly="true" />
                        <p class="text-red-600 text-sm mt-1">Cannot be changed</p>
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field type="password" label="Password" label_ar="كلمة المرور" name="password"
                            placeholder="Enter New Password (leave blank to keep current)" />
                        @error('password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
                            Role
                        </label>
                        <input
                            type="text"
                            id="role"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-brand-500 focus:border-brand-500"
                            value="{{ $user->role->role_name ?? 'N/A' }}"
                            readonly
                        />
                        <p class="text-red-600 text-sm mt-1">Cannot be changed</p>
                    </div>
                </x-form.grid-col>

                <div class="flex justify-end">
                    <x-form.submit label="Update Profile" label_ar="تحديث الملف الشخصي" isUpdate="1" />
                </div>
            </div>
        </form>
    </div>
@endsection