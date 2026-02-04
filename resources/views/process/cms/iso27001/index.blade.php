@extends('layouts.user')
@section('title', 'Sections')
@section('content')
    <div>
        <x-table.action-wrapper title="Section List">
            {{-- <x-action.button label="Add Section" route_name="cms.create" /> --}}
        </x-table.action-wrapper>

        <x-table.table-sticky>
            <x-table.thead-sticky>
                <x-table.th label="S.No" />
                <x-table.th label="Section ID" />
                <x-table.th label="Section Name" />
                <x-table.th label="Action" />
            </x-table.thead-sticky>

            <x-table.tbody>
                @foreach ($sections as $row)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$sections" /></x-table.td>
                        <x-table.td>{{ $row->section_id }}</x-table.td>
                        <x-table.td>{{ $row->title }}</x-table.td>
                        <x-table.td action_col="true">
                            <a href="{{ route('iso27001.resource.create', $row->id) }}"
                                class="inline-flex items-center justify-center p-1.5 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-blue-600 transition-colors">
                                <x-icons.media />
                            </a>
                            <x-action.view route_name="iso27001.show" param="{{ $row->id }}" />
                            <x-action.edit route_name="iso27001.edit" param="{{ $row->id }}" />
                            <x-action.delete route_name="iso27001.destroy" param="{{ $row->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table-sticky>

        <x-pagination>
            {{ $sections->links() }}
        </x-pagination>
    </div>
@endsection
