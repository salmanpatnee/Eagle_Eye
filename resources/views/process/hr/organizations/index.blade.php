@extends('layouts.hr')
@section('title', 'Organizations')

@section('content')
    <div>
        <x-table.action-wrapper title="All Organizations">
            <x-action.button label="Add Organization" route_name="organizations.create" />
        </x-table.action-wrapper>

      <x-table.table-sticky>
            <x-table.thead-sticky>
                <x-table.th label="S.No" />
                <x-table.th label="Organization ID" />
                <x-table.th label="Organization Name" />
                <x-table.th label="Contact Number" />
                <x-table.th label="Action" />
            </x-table.thead-sticky>
            <x-table.tbody>
                @foreach ($organizations as $organization)
                    <tr>
                        <x-table.td> <x-table.serial :loop="$loop" :paginator="$organizations" /></x-table.td>
                        <x-table.td>{{ $organization->organization_id }}</x-table.td>
                        <x-table.td>{{ $organization->organization_name }}</x-table.td>
                        <x-table.td>{{ $organization->contact_number }}</x-table.td>

                        <x-table.td action_col="true">
                            <x-action.view route_name="organizations.show" param="{{ $organization->id }}" />
                            <x-action.edit route_name="organizations.edit" param="{{ $organization->id }}" />
                            <x-action.delete route_name="organizations.destroy" param="{{ $organization->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table-sticky>

        <x-pagination>
            {{ $organizations->links() }}
        </x-pagination>

    </div>
@endsection