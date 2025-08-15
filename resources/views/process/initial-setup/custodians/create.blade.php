@extends('process/initial-setup/layout/app')
@section('title', 'Custodian Registration')
@section('title_ar', 'تسجيل الوصي')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $custodian?->id ? 'Update' : 'New' }} Custodian">
            <x-action.button label="View" label_ar="منظر" route_name="custodians.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($custodian) ? route('custodians.update', $custodian->id) : route('custodians.store') }}"
            method="POST">
            @csrf
            @if (isset($custodian))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Custodian ID" label_ar="اسم الوصي" name="custodian_name_id" required="true"
                            :readonly="$custodian?->custodian_name_id" placeholder="Enter Custodian ID" :value="$custodian?->custodian_name_id" />
                    </div>
                    <div>
                        <x-form.field label="Custodian Name" label_ar="اسم الوصي" name="custodian_name_name" required="true"
                            placeholder="Enter Custodian Name" :value="$custodian?->custodian_name_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field type="tel" label="Custodian Contact Number" label_ar="رقم الجوال للالوصي"
                            name="custodian_name_contact_number" placeholder="Enter Custodian Contact Number"
                            :value="$custodian?->custodian_name_contact_number" />
                    </div>
                    <div>
                        <x-form.field type="email" label="Custodian Email Address"
                            label_ar="عنوان البريد الإلكتروني للالوصي" name="custodian_name_email_address"
                            placeholder="Enter Email Address" :value="$custodian?->custodian_name_email_address" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Custodian Role Title" label_ar="اسم دور الالوصي" name="custodian_role_id"
                            required="true" placeholder="Select Role Name" :value="$custodian?->custodian_role_id" :data="$custodianRoles"
                            id_key="custodian_role_id" value_key="custodian_role_title" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>

                <div class="flex justify-end">
                    <x-form.submit label="Custodian" label_ar="الوصي" :isUpdate="$custodian?->custodian_name_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
