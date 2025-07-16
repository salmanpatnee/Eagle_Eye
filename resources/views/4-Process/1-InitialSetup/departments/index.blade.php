@extends('layouts.app')
@section('title', 'Organization Departments')
@section('title_ar', 'قسم الجهة')
@section('content')
    <div>
        <x-table.action-wrapper>

            <x-action.button label="Add" label_ar="يضيف" route_name="departments.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Department ID" label_ar="رمز القسم" />
                <x-table.th label="Department Name" label_ar="اسم القسم" />
                <x-table.th label="Location Name" label_ar="اسم الموقع" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>

            <x-table.tbody>
                @foreach ($departments as $department)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $department->department_id }}</x-table.td>
                        <x-table.td>{{ $department->department_name }}</x-table.td>
                        <x-table.td>{{ $department->location->location_name }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="departments.show" param="{{ $department->id }}" />
                            <x-action.edit route_name="departments.edit" param="{{ $department->id }}" />
                            <x-action.delete route_name="departments.destroy" param="{{ $department->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        <x-pagination>
            {{ $departments->links() }}
        </x-pagination>


    </div>
@endsection
