@extends('layouts.audit')
@section('title', 'Auditor Information')
@section('title_ar', 'معلومات المراجع')
@section('parent_url', route('auditors.index'))
@if(isset($auditor))
    @section('parent_title', 'Auditor Information')
    @section('breadcrumb_title', $auditor->auditor_first_name . ' ' . $auditor->auditor_last_name)
@endif
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $auditor?->id ? 'Update' : 'New' }} Auditor">
            <x-action.button label="View" label_ar="منظر" route_name="auditors.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($auditor) ? route('auditors.update', $auditor->id) : route('auditors.store') }}"
            method="POST">
            @csrf
            @if (isset($auditor))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Auditor ID" label_ar="رمز مراجع" name="auditor_id" required="true"
                            :readonly="$auditor?->auditor_id" placeholder="Enter Auditor ID" :value="$auditor?->auditor_id" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Auditor First Name" label_ar="مراجع الاسم الأول" name="auditor_first_name"
                            required="true" placeholder="Enter Auditor First Name" :value="$auditor?->auditor_first_name" />
                    </div>
                    <div>
                        <x-form.field label="Auditor Last Name" label_ar="مراجع الاسم الأخير" name="auditor_last_name"
                            placeholder="Enter Auditor Last Name" :value="$auditor?->auditor_last_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Auditor Organization" label_ar="مراجع الجهة" name="auditor_organization"
                            placeholder="Enter Auditor Organization" :value="$auditor?->auditor_organization" />
                    </div>
                    <div>
                        <x-form.field type="tel" label="Auditor Contact Number" label_ar="مراجع رقم الجوال"
                            name="auditor_contact_number" placeholder="Enter Auditor Contact Number" :value="$auditor?->auditor_contact_number" />
                    </div>
                </x-form.grid-col>


                <x-form.grid-col>
                    <div>
                        <x-form.field type="email" label="Auditor Email Address" label_ar="مراجع عنوان البريد الإلكتروني"
                            name="auditor_contact_email" placeholder="Enter Auditor Email Address" :value="$auditor?->auditor_contact_email" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>


                <div class="flex justify-end">
                    <x-form.submit label="Auditor" label_ar="المراجع" :isUpdate="$auditor?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
