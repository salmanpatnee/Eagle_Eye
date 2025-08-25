@extends('process/initial-setup/layout/app')
@section('title', 'Owner Registration')
@section('title_ar', 'تسجيل صاحب')
@section('content')
    <div>
        <x-table.action-wrapper title="Owner Details">
            <x-action.button label="View" label_ar="منظر" route_name="owners.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="owners.edit" route_param="{{ $owner->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Owner ID" label_ar="رمز صاحب">
                    {{ $owner->owner_id }}
                </x-info-col>

                <x-info-col label="Owner Name" label_ar="اسم صاحب">
                    {{ $owner->owner_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Owner Role Name" label_ar="اسم دور الصاحب">
                    {{ $owner->role->owner_role_name }}
                </x-info-col>

                <x-info-col label="Owner Department Name" label_ar="اسم قسم صاحب">
                    {{ $owner->department->department_name ?? '-' }}
                </x-info-col>
            </x-info-row>


            <x-info-col-lg label="Owner Details" label_ar="تفاصيل الصاحب">
                {{ $owner->specification ?? '—' }}
            </x-info-col-lg>


            <x-info-row>
                <x-info-col label="Owner Contact Number" label_ar="رقم الجوال للصاحب">
                    {{ $owner->owner_contact_number ?? '—' }}
                </x-info-col>

                <x-info-col label="Owner Email Address" label_ar="عنوان البريد الإلكتروني للصاحب">

                    {{ $owner->owner_email_address ?? '—' }}

                </x-info-col>
            </x-info-row>

        </div>
    </div>
@endsection
