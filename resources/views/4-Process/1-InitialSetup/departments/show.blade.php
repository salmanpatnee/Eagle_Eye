@extends('layouts.app')
@section('title', 'Organization Departments')
@section('title_ar', 'قسم الجهة')
@section('content')
    <div> 
        <x-table.action-wrapper title="Organization Departments">
            <x-action.button label="View" label_ar="منظر" route_name="departments.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="departments.edit"
                route_param="{{ $department->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Department ID" label_ar="رمز القسم">
                    {{ $department->department_id }}
                </x-info-col>

                <x-info-col label="Department Name" label_ar="اسم القسم">
                    {{ $department->department_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Department Description" label_ar="وصف القسم">
                {{ $department->department_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Location Name" label_ar="اسم الموقع">
                    {{ $department->location?->location_name ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>
    </div>
@endsection
