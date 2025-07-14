@extends('layouts.app')
@section('title', 'Organization Setup')
@section('title_ar', 'إعداد الجهة')
@section('content')
    <div>
        <x-table.action-wrapper title="New Organization">
            <x-action.button label="View" label_ar="منظر" route_name="organizations.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($organization) ? route('organizations.update', $organization->id) : route('organizations.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($organization))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $organization->id }}">
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Organization ID" label_ar="رمز الجهة" name="organization_id" required="true"
                            :readonly="$organization?->organization_id" placeholder="Enter Organization ID" :value="$organization?->organization_id" />
                    </div>
                    <div>
                        <x-form.upload-field label="Organization Logo" label_ar="شعار الجهة" name="organization_logo"
                            placeholder="Upload Organization Logo" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Organization Name" label_ar="اسم الجهة" name="organization_name_english"
                            required="true" placeholder="Enter Organization Name" :value="$organization?->organization_name_english" />
                    </div>
                    <div>
                        <x-form.field label="Organization Name (Arabic)" label_ar="اسم الجهة (بالعربي)"
                            name="organization_name_arabic" placeholder="Enter Organization Name (Arabic)"
                            :value="$organization?->organization_name_arabic" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col-full>
                    <x-form.textarea-field label="Organization Address" label_ar="عنوان الجهة" name="organization_address"
                        placeholder="Enter Organization Address" :value="$organization?->organization_address" />
                </x-form.grid-col-full>
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Owner Name" label_ar="اسم صاحب المبادرة" name="initiative_owner_name"
                            placeholder="Enter Owner Name" :value="$organization?->initiative_owner_name" />
                    </div>
                    <div>
                        <x-form.field label="Owner Title" label_ar="تسمية صاحب المبادرة" name="initiative_owner_title"
                            placeholder="Enter Owner Title" :value="$organization?->initiative_owner_title" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.field type="tel" label="Contact Number" label_ar="رقم الاتصال"
                            name="initiative_owner_contact_number" placeholder="Enter Contact Number" :value="$organization?->initiative_owner_contact_number" />
                    </div>
                    <div>
                        <x-form.field type="email" label="Email Address" label_ar="عنوان البريد الإلكتروني"
                            name="initiative_owner_email" placeholder="Enter Email Address" :value="$organization?->initiative_owner_email" />
                    </div>
                </x-form.grid-col>
                <div class="flex justify-end">
                    <x-form.submit label="Organization" label_ar="جهة" :isUpdate="$organization?->organization_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
