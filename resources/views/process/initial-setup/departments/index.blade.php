@extends('process/initial-setup/layout/app')
@section('title', 'Organization Departments')
@section('content')
    <div>
        <x-table.action-wrapper title="All Departments">
            <x-action.button label="Add Department" route_name="departments.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" />
                <x-table.th label="Department ID" />
                <x-table.th label="Department Name" />
                <x-table.th label="Location Name" />
                <x-table.th label="Action" />
            </x-table.thead>

            <x-table.tbody>
                @foreach ($departments as $department)
                    <tr>
                        <x-table.td> <x-table.serial :loop="$loop" :paginator="$departments" /></x-table.td>
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
