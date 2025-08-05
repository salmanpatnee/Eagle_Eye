@extends('layouts.audit')
@section('title', 'Auditor Information')
@section('title_ar', 'معلومات المراجع')
@section('content')
    <div>
        <x-table.action-wrapper title="Auditor Details">
            <x-action.button label="View" label_ar="منظر" route_name="auditors.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="auditors.edit" route_param="{{ $auditor->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Auditor ID" label_ar="رمز المراجع">
                    {{ $auditor->auditor_id }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Auditor First Name" label_ar="مراجع الاسم الأول">
                    {{ $auditor->auditor_first_name }}
                </x-info-col>

                <x-info-col label="Auditor Last Name" label_ar="مراجع الاسم الأخير">
                    {{ $auditor->auditor_last_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>

                <x-info-col label="Auditor Organization" label_ar="مراجع الجهة">
                    {{ $auditor->auditor_organization }}
                </x-info-col>
                <x-info-col label="Auditor Contact Number" label_ar="مراجع رقم الجوال">
                    {{ $auditor->auditor_contact_number }}
                </x-info-col>
            </x-info-row>

            <x-info-row>

                <x-info-col label="Auditor Email Address" label_ar="مراجع عنوان البريد الإلكتروني">
                    {{ $auditor->auditor_contact_email }}
                </x-info-col>

            </x-info-row>

        </div>
    </div>
@endsection
