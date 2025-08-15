@extends('process/initial-setup/layout/app')
@section('title', 'Owner Registration')
@section('title_ar', 'تسجيل صاحب')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $owner?->id ? 'Update' : 'New' }} Owner">
            <x-action.button label="View" label_ar="منظر" route_name="owners.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($owner) ? route('owners.update', $owner->id) : route('owners.store') }}" method="POST">
            @csrf
            @if (isset($owner))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Owner ID" label_ar="اسم صاحب" name="owner_id" required="true" :readonly="$owner?->owner_id"
                            placeholder="Enter Owner ID" :value="$owner?->owner_id" />
                    </div>
                    <div>
                        <x-form.field label="Owner Name" label_ar="اسم صاحب" name="owner_name" required="true"
                            placeholder="Enter Owner Name" :value="$owner?->owner_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Owner Role Name" label_ar="اسم دور الصاحب" name="owner_role_id"
                            required="true" placeholder="Select Role Name" :value="$owner?->owner_role_id" :data="$ownerRoles"
                            id_key="owner_role_id" value_key="owner_role_name" />
                    </div>
                    <div>
                        <x-form.select label="Owner Department Name" label_ar="اسم قسم صاحب" name="department_id"
                            required="true" placeholder="Select Department Name" :value="$owner?->department_id" :data="$departments"
                            id_key="department_id" value_key="department_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Owner Description" label_ar="وصف صاحب" name="specification"
                        placeholder="Enter Owner Description" :value="$owner?->specification" />
                </x-form.grid-col-full>

                <x-form.grid-col>
                    <div>
                        <x-form.field type="tel" label="Owner Contact Number" label_ar="رقم الجوال للصاحب"
                            name="owner_contact_number" placeholder="Enter Owner Contact Number" :value="$owner?->owner_contact_number" />
                    </div>
                    <div>
                        <x-form.field type="email" label="Owner Email Address" label_ar="عنوان البريد الإلكتروني للصاحب"
                            name="owner_email_address" placeholder="Enter Email Address" :value="$owner?->owner_email_address" />
                    </div>
                </x-form.grid-col>




                <div class="flex justify-end">
                    <x-form.submit label="Owner" label_ar="صاحب" :isUpdate="$owner?->owner_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
