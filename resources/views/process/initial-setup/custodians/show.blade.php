@extends('process/initial-setup/layout/app')
@section('title', 'Custodian Registration')
@section('title_ar', 'تسجيل الوصي')
@section('content')
    <div>
        <x-table.action-wrapper title="Custodian Details">
            <x-action.button label="View" label_ar="منظر" route_name="custodians.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="custodians.edit" route_param="{{ $custodian->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Custodian ID" label_ar="رمز الوصي">
                    {{ $custodian->custodian_name_id }}
                </x-info-col>

                <x-info-col label="Custodian Name" label_ar="اسم الوصي">
                    {{ $custodian->custodian_name_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Custodian Contact Number" label_ar="رقم الجوال الوصي">
                    {{ $custodian->custodian_name_contact_number }}
                </x-info-col>

                <x-info-col label="Custodian Contact Email Address" label_ar="عنوان البريد الإلكتروني للوصي">
                    {{ $custodian->custodian_name_email_address }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Custodian Role Title" label_ar="عنوان دور الوصي">
                    {{ $custodian->role->custodian_role_title }}
                </x-info-col>


            </x-info-row>



        </div>
    </div>
@endsection
