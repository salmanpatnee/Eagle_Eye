@extends('layouts.user')
@section('title', 'Users')
@section('title_ar', 'المستخدم')
@section('content')
    <div>
        <x-table.action-wrapper title="User Details">
            <x-action.button label="View" label_ar="منظر" route_name="users.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="users.edit" route_param="{{ $user->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Full Name" label_ar="الاسم الكامل">
                    {{ $user->first_name . ' ' . $user->last_name }}
                </x-info-col>

                <x-info-col label="User Name" label_ar="اسم المستخدم">
                    {{ $user->username }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Email" label_ar="عنوان البريد الإلكتروني">
                    {{ $user->email }}
                </x-info-col>

                <x-info-col label="Role" label_ar="دور">
                    {{ $user->role->role_name ?? '—' }}

                </x-info-col>
            </x-info-row>



        </div>
    </div>
@endsection
