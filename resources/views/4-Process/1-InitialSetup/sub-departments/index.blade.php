@extends('layouts.app')
@section('title', 'Organization Sub-Departments')
@section('title_ar', 'القسم الفرعي في الجهة')
@section('content')
    <div>
        <x-table.action-wrapper>
            <x-action.button label="Add" label_ar="يضيف" route_name="sub-departments.create" />
        </x-table.action-wrapper>

        <x-table.table>
           <x-table.thead>
            <x-table.th label="Serial Number" label_ar="الرقم التسلسلي" />
            <x-table.th label="Sub-Department ID" label_ar="رمز القسم الفرعي" />
            <x-table.th label="Sub-Department Name" label_ar="اسم القسم الفرعي" />
            <x-table.th label="Department Name" label_ar="اسم القسم" />
            <x-table.th label="Action" label_ar="إجراء " />
        </x-table.thead>

            <x-table.tbody>
                @foreach ($subDepartments as $subDepartment)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $subDepartment->sub_department_id }}</x-table.td>
                        <x-table.td>{{ $subDepartment->sub_department_name }}</x-table.td>
                        <x-table.td>{{ $subDepartment->department?->department_name }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="sub-departments.show" param="{{ $subDepartment->id }}" />
                            <x-action.edit route_name="sub-departments.edit" param="{{ $subDepartment->id }}" />
                            <x-action.delete route_name="sub-departments.edit" param="{{ $subDepartment->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
