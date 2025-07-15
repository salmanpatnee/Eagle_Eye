@extends('layouts.app')
@section('title', 'Organization Departments')
@section('title_ar', 'القسم الجهة')
@section('content')
    <div>
        <x-table.action-wrapper title="New Department">
            <x-action.button label="View" label_ar="منظر" route_name="departments.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($department) ? route('departments.update', $department->id) : route('departments.store') }}"
            method="POST">
            @csrf
            @if (isset($department))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $department->id }}">
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Department ID" label_ar="رمز القسم" name="department_id" required="true"
                            :readonly="$department?->department_id" placeholder="Enter Department ID" :value="$department?->department_id" />
                    </div>
                    <div>
                        <x-form.field label="Department Name" label_ar="اسم القسم" name="department_name" required="true"
                            placeholder="Enter Department Name" :value="$department?->department_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Department Description" label_ar="وصف القسم" name="department_description"
                        placeholder="Enter Department Description" :value="$department?->department_description" />
                </x-form.grid-col-full>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Location Name" label_ar="اسم الموقع" name="location_id" required="true"
                            placeholder="Enter Location Name" :value="$department?->location_id" :data="$locations" id_key="location_id"
                            value_key="location_name" />
                    </div>

                    <div></div>
                </x-form.grid-col>


                <div class="flex justify-end">
                    <x-form.submit label="Department" label_ar="القسم" :isUpdate="$department?->department_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
