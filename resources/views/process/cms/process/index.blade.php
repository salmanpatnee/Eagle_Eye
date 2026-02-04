@extends('layouts.user')
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
                <x-table.th label="Action" />
            </x-table.thead-sticky>

            <x-table.tbody>
                @foreach ($process as $row)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$process" /></x-table.td>
                        <x-table.td>{{ $row->process_id }}</x-table.td>
                        <x-table.td>{{ $row->title }}</x-table.td>
                        <x-table.td action_col="true">
                            <a href="{{ route('resource.create', $row->id) }}"
                                class="inline-flex items-center justify-center p-1.5 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-blue-600 transition-colors">
                                <x-icons.media />
                            </a>
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
