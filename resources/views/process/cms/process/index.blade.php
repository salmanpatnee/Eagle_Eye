@extends('layouts.content')
@section('title', 'Process')
@section('content')
    <div>
        <x-table.action-wrapper title="Process List">
            {{-- <x-action.button label="Add Process" route_name="cms.create" /> --}}
        </x-table.action-wrapper>

        <x-table.table-sticky>
            <x-table.thead-sticky>
                <x-table.th label="S.No" />
                <x-table.th label="Process ID" />
                <x-table.th label="Process Name" />
                <x-table.th label="Category" />
                <x-table.th label="Action" />
            </x-table.thead-sticky>

            <x-table.tbody>
                @foreach ($process as $row)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$process" /></x-table.td>
                        <x-table.td>{{ $row->process_id }}</x-table.td>
                        <x-table.td>{{ $row->title }}</x-table.td>
                        <x-table.td>{{ $row->articleCategories?->first()?->name ?? 'N/A' }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="cms.show" param="{{ $row->id }}" />
                            <x-action.edit route_name="cms.edit" param="{{ $row->id }}" />
                            <x-action.delete route_name="cms.destroy" param="{{ $row->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table-sticky>

        <x-pagination>
            {{ $process->links() }}
        </x-pagination>
    </div>
@endsection
