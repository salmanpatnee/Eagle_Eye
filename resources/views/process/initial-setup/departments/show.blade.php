@extends('process/initial-setup/layout/app')
@section('title', 'Organization Departments')
@section('content')
    <div>
        <x-table.action-wrapper title="Department Details">
            <x-action.button label="View" route_name="departments.index" />
            <x-action.button label="Edit" route_name="departments.edit"
                route_param="{{ $department->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Department ID">
                    {{ $department->department_id }}
                </x-info-col>

                <x-info-col label="Department Name">
                    {{ $department->department_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Department Description">
                {{ $department->department_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Location Name">
                    {{ $department->location?->location_name ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>
    </div>
@endsection
