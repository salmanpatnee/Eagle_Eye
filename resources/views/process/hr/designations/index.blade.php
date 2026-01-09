@extends('layouts.hr')
@section('title', 'Designations')

@section('content')
    <x-table.action-wrapper title="All Designations">
        <x-action.button label="Add Designation" route_name="designations.create" />
    </x-table.action-wrapper>

    <x-table.table-sticky>
        <x-table.thead-sticky>
            <x-table.th label="S.No" />
            <x-table.th label="Designation ID" />
            <x-table.th label="Designation Name" />
            <x-table.th label="Action" />
        </x-table.thead-sticky>
        <x-table.tbody>
            @foreach ($designations as $designation)
                <x-table.td>
                    {{ $designation->id }}
                </x-table.td>
                <x-table.td>
                    {{ $designation->designation_id }}
                </x-table.td>
                <x-table.td>
                    {{ $designation->designation_name }}
                </x-table.td>
                <x-table.td action_col="true">
                    <x-action.view route_name="designations.show" param="{{ $designation->id }}" />
                    <x-action.edit route_name="designations.edit" param="{{ $designation->id }}" />
                    <x-action.delete route_name="designations.destroy" param="{{ $designation->id }}" />
                </x-table.td>
            @endforeach
        </x-table.tbody>
    </x-table.table-sticky>

    <x-pagination>
        {{ $designations->links() }}
    </x-pagination>
@endsection
