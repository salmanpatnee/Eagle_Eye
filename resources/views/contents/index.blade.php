@extends('layouts.user')
@section('title', 'Contents')
@section('content')
    <div>
        <x-table.action-wrapper title="Content List">
            <x-action.button label="Add Content" route_name="contents.create" />
        </x-table.action-wrapper>

        <x-table.table-sticky>
            <x-table.thead-sticky>
                <x-table.th label="S.No" />
                <x-table.th label="Article Title" />
                <x-table.th label="Pillar" />
                <x-table.th label="Action" />
            </x-table.thead-sticky>

            <x-table.tbody>
                @foreach ($contents as $content)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$contents" /></x-table.td>
                        <x-table.td>{{ $content->title }}</x-table.td>
                        <x-table.td>{{ $content->category }}</x-table.td>
                        <x-table.td action_col="true">
                            <a href="{{ route('contents.resource.create', $content->id) }}"
                                class="inline-flex items-center justify-center p-1.5 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-blue-600 transition-colors">
                                <x-icons.media />
                            </a>
                            <x-action.view route_name="contents.show" param="{{ $content->id }}" />
                            <x-action.edit route_name="contents.edit" param="{{ $content->id }}" />
                            <x-action.delete route_name="contents.destroy" param="{{ $content->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table-sticky>

        <x-pagination>
            {{ $contents->links() }}
        </x-pagination>
    </div>
@endsection
