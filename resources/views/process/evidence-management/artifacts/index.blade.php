@extends('layouts.user')
@section('title', 'Artifact Management')

@section('content')
    <div>
        <x-table.action-wrapper title="Artifact List">
            <x-action.button label="Add Artifact" route_name="artifacts.create" />
        </x-table.action-wrapper>

        <x-table.table-sticky>
            <x-table.thead-sticky>
                <x-table.th label="S.No"  />
                <x-table.th label="Artifact ID" />
                <x-table.th label="Artifact Name" />
                <x-table.th label="Number of Attachments" />
                <x-table.th label="Action" />
            </x-table.thead-sticky>
            <x-table.tbody>
                @foreach ($artifacts as $artifact)
                    <tr>
                        <x-table.td> <x-table.serial :loop="$loop" :paginator="$artifacts" /></x-table.td>
                        <x-table.td>{{ $artifact->artifact_id }}</x-table.td>
                        <x-table.td>{{ $artifact->artifact_name }}</x-table.td>
                        <x-table.td>
                            {{ $artifact->attachments_count }}
                        </x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="artifacts.show" param="{{ $artifact->id }}" />
                            <x-action.edit route_name="artifacts.edit" param="{{ $artifact->id }}" />
                            <x-action.delete route_name="artifacts.destroy" param="{{ $artifact->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table-sticky>

        <x-pagination>
            {{ $artifacts->links() }}
        </x-pagination>

    </div>
@endsection
