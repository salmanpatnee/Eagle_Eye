@extends('layouts.audit')
@section('title', 'Auditee Information')
@section('title_ar', 'معلومات التدقيق')
@section('parent_title', 'Auditee Information')
@section('parent_url', route('auditees.index'))
@section('breadcrumb_title', $auditee->auditee_first_name . ' ' . $auditee->auditee_last_name)
@section('content')
    <div>
        <x-table.action-wrapper title="Auditee Details">
            <x-action.button label="View" label_ar="منظر" route_name="auditees.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="auditees.edit" route_param="{{ $auditee->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Auditee ID" label_ar="رمز مراجعة">
                    {{ $auditee->auditee_id }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Auditee First Name" label_ar="مراجع الاسم الأول">
                    {{ $auditee->auditee_first_name }}
                </x-info-col>

                <x-info-col label="Auditee Last Name" label_ar="مراجع الاسم الأخير">
                    {{ $auditee->auditee_last_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>

                <x-info-col label="Auditee Department" label_ar="مراجع القسم">
                    {{ $auditee?->department?->department_name }}
                </x-info-col>
            </x-info-row>

        </div>
    </div>
@endsection
