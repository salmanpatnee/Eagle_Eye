@extends('layouts.content')
@section('title', 'Article Categories')

@section('content')
    <div>
        <x-table.action-wrapper title="All Article Categories">
            <x-action.button label="Add Category" route_name="article-categories.create" />
        </x-table.action-wrapper>

        <x-table.table-sticky>
            <x-table.thead-sticky>
                <x-table.th label="S.No" />
                <x-table.th label="Name" />
                <x-table.th label="Action" />
            </x-table.thead-sticky>
            <x-table.tbody>
                @foreach ($categories as $category)
                    <tr>
                        <x-table.td> <x-table.serial :loop="$loop" :paginator="$categories" /></x-table.td>
                        <x-table.td>{{ $category->name }}</x-table.td>

                        <x-table.td action_col="true">
                            <a href="{{ route('article-categories.create-resource', $category->id) }}"
                                class="inline-flex items-center justify-center p-1.5 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-blue-600 transition-colors">
                                <x-icons.media />
                            </a>
                            <x-action.view route_name="article-categories.show" param="{{ $category->id }}" />
                            <x-action.edit route_name="article-categories.edit" param="{{ $category->id }}" />
                            <x-action.delete route_name="article-categories.destroy" param="{{ $category->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table-sticky>

        <x-pagination>
            {{ $categories->links() }}
        </x-pagination>

    </div>
@endsection
