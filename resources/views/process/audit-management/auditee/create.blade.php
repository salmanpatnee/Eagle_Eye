@extends('layouts.audit')
@section('title', 'Auditee Information')
@section('title_ar', 'معلومات التدقيق')
@section('parent_url', route('auditees.index'))
@if(isset($auditee))
    @section('parent_title', 'Auditee Information')
    @section('breadcrumb_title', $auditee->auditee_first_name . ' ' . $auditee->auditee_last_name)
@endif
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $auditee?->id ? 'Update' : 'New' }} Auditee">
            <x-action.button label="View" label_ar="منظر" route_name="auditees.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($auditee) ? route('auditees.update', $auditee->id) : route('auditees.store') }}"
            method="POST">
            @csrf
            @if (isset($auditee))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Auditee ID" label_ar="رمز مراجعة" name="auditee_id" required="true"
                            :readonly="$auditee?->auditee_id" placeholder="Enter Auditee ID" :value="$auditee?->auditee_id" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Auditee First Name" label_ar="مراجعة الاسم الأول" name="auditee_first_name"
                            required="true" placeholder="Enter Auditee First Name" :value="$auditee?->auditee_first_name" />
                    </div>
                    <div>
                        <x-form.field label="Auditee Last Name" label_ar="مراجعة الاسم الأخير" name="auditee_last_name"
                            placeholder="Enter Auditee Last Name" :value="$auditee?->auditee_last_name" />
                    </div>
                </x-form.grid-col>


                <x-form.grid-col>
                    <div>
                        <x-form.select label="Auditee Department" label_ar="مراجعة القسم" name="auditee_department"
                            required="true" :value="$auditee?->auditee_department" :data="$departments" id_key="department_id"
                            value_key="department_name" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>


                <div class="flex justify-end">
                    <x-form.submit label="Auditee" label_ar="مراجعة" :isUpdate="$auditee?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
