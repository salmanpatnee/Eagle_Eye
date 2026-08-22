@extends('layouts.user')
@section('title', 'NIS2 Contents')
@section('content')
    <div>
        <x-table.action-wrapper title="NIS2 Content List">
            <x-action.button label="Add Content" route_name="nis2-contents.create" />
        </x-table.action-wrapper>

        <x-table.table-sticky>
            <x-table.thead-sticky>
                <x-table.th label="S.No" />
                <x-table.th label="Title" />
                <x-table.th label="Sort Order" />
                <x-table.th label="Action" />
            </x-table.thead-sticky>

            <x-table.tbody>
                @foreach ($nis2Contents as $nis2Content)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$nis2Contents" /></x-table.td>
                        <x-table.td>{{ $nis2Content->title }}</x-table.td>
                        <x-table.td>{{ $nis2Content->sort_order }}</x-table.td>
                        <x-table.td action_col="true">
                            <a href="{{ route('nis2-contents.resource.create', $nis2Content->id) }}"
                                class="inline-flex items-center justify-center p-1.5 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-blue-600 transition-colors">
                                <x-icons.media />
                            </a>
                            <x-action.view route_name="nis2-contents.show" param="{{ $nis2Content->id }}" />
                            <x-action.edit route_name="nis2-contents.edit" param="{{ $nis2Content->id }}" />
                            <x-action.delete route_name="nis2-contents.destroy" param="{{ $nis2Content->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table-sticky>

        <x-pagination>
            {{ $nis2Contents->links() }}
        </x-pagination>
    </div>
@endsection
