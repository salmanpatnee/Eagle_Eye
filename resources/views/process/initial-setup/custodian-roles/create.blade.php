@extends('process/initial-setup/layout/app')
@section('title', 'Custodian Roles')
@section('title_ar', 'دور الوصي')
@section('content')
    @php
        $options = ['System', 'Application', 'Other'];
    @endphp
    <div>
        <x-table.action-wrapper title="{{ $custodianRole?->id ? 'Update' : 'New' }} Custodian">
            <x-action.button label="View" label_ar="منظر" route_name="custodian-roles.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($custodianRole) ? route('custodian-roles.update', $custodianRole->id) : route('custodian-roles.store') }}"
            method="POST">
            @csrf
            @if (isset($custodianRole))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Custodian Role ID" label_ar="رمز دور الوصي" name="custodian_role_id"
                            required="true" :readonly="$custodianRole?->custodian_role_id" placeholder="Enter Custodian Role ID" :value="$custodianRole?->custodian_role_id" />
                    </div>
                    <div>
                        <x-form.field label="Custodian Role Name" label_ar="اسم دور الوصي" name="custodian_role_title"
                            required="true" placeholder="Enter Custodian Role Name" :value="$custodianRole?->custodian_role_title" />
                    </div>
                </x-form.grid-col>



                <x-form.grid-col-full>
                    <x-form.textarea-field label="Custodian Role Description" label_ar="وصف دور الوصي"
                        name="custodian_role_description" placeholder="Enter Custodian Role Description"
                        :value="$custodianRole?->custodian_role_description" />
                </x-form.grid-col-full>

                <div x-data="{
                    selected: '{{ old('system_application_other', $custodianRole?->system_application_other) }}'
                }">
                    <x-form.grid-col>
                        <div>
                            <x-form.select label="System/Application/Other" label_ar="المتعلقة بالنظام/التطبيق/أخرى"
                                name="system_application_other" placeholder="Select Option" :value="$custodianRole?->system_application_other"
                                :custom_data="$options" x-model="selected" required="true" />
                        </div>
                        <div x-show="selected === 'Other'" x-cloak>
                            <x-form.field label="Define Other" label_ar="تعريف أخرى" name="other"
                                placeholder="Enter Define Other" :value="$custodianRole?->other" />
                        </div>
                    </x-form.grid-col>
                </div>


                <div class="flex justify-end">
                    <x-form.submit label="Custodian Role" label_ar="دور الوصي" :isUpdate="$custodianRole?->custodian_role_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
