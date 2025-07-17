@extends('layouts.app')
@section('title', 'Organization Sub-Departments')
@section('title_ar', 'القسم الفرعي في الجهة')
@section('content') 
    <div> 
        <x-table.action-wrapper title="Organization Sub-Departments">
            <x-action.button label="View" label_ar="منظر" route_name="sub-departments.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="sub-departments.edit"
                route_param="{{ $subDepartment->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Sub-Department ID" label_ar="رمز القسم الفرعي">
                    {{ $subDepartment->sub_department_id }}
                </x-info-col>

                <x-info-col label="Sub-Department Name" label_ar="اسم القسم الفرعي">
                    {{ $subDepartment->sub_department_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Sub-Department Description" label_ar="وصف القسم الفرعي">
                {{ $subDepartment->sub_department_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Deparment" label_ar="القسم">
                    {{ $department->department->department_name ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>
    </div>
@endsection
