@extends('4-Process.1-InitialSetup.layout.app')
@section('title', 'Organization Sub-Departments')
@section('title_ar', 'القسم الفرعي في الجهة')
@section('content') 
    <div>
        <x-table.action-wrapper title="New Sub-Department">
            <x-action.button label="View" label_ar="منظر" route_name="sub-departments.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($subDepartment) ? route('sub-departments.update', $subDepartment->id) : route('sub-departments.store') }}"
            method="POST">
            @csrf
            @if (isset($subDepartment))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $subDepartment->id }}">
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Sub-Department ID" label_ar="رمز القسم الفرعي" name="sub_department_id" required="true"
                            :readonly="$subDepartment?->sub_department_id" placeholder="Enter Sub-Department ID" :value="$subDepartment?->sub_department_id" />
                    </div>
                    <div>
                        <x-form.field label="Sub-Department Name" label_ar="اسم القسم الفرعي" name="sub_department_name" required="true"
                            placeholder="Enter Sub-Department Name" :value="$subDepartment?->sub_department_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Sub-Department Description" label_ar="وصف القسم الفرعي" name="sub_department_description"
                        placeholder="Enter Sub-Department Description" :value="$subDepartment?->sub_department_description" />
                </x-form.grid-col-full>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Deparment Name" label_ar="اسم القسم" name="department_id" required="true"
                            placeholder="Enter Deparment Name" :value="$subDepartment?->department_id" :data="$departments" id_key="department_id"
                            value_key="department_name"/>
                    </div>

                    <div></div>
                </x-form.grid-col>


                <div class="flex justify-end">
                    <x-form.submit label="Sub-Department" label_ar="القسم الفرعي" :isUpdate="$subDepartment?->sub_department_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
