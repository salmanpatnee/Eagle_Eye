@extends('layouts.content')
@section('title', 'Article Categories')
@section('content')
    <div>
        <x-table.action-wrapper title="Category Details">
            <x-action.button label="View" route_name="article-categories.index" />
            <x-action.button label="Edit" route_name="article-categories.edit" :route_param="$articleCategory->id" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-col-lg label="Name">
                {{ $articleCategory->name }}
            </x-info-col-lg>
            @if ($articleCategory->description)
                <x-info-col-lg label="Description">
                    {!! nl2br(e($articleCategory->description)) !!}
                </x-info-col-lg>
            @endif
            @if ($articleCategory->article_list)
                <x-info-col-lg label="Article List">
                    {!! nl2br(e($articleCategory->article_list)) !!}
                </x-info-col-lg>
            @endif
        </div>

        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="S.No" />
                    <x-table.th label="Resource Name" />
                    <x-table.th label="Resource Type" />
                    <x-table.th label="Action" />
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($articleCategory->resources as $resource)
                        <tr>
                            <x-table.td> {{ $loop->index + 1 }}</x-table.td>
                            <x-table.td>
                                {{ $resource->file_name }}
                            </x-table.td>
                            <x-table.td>
                                {{ ucfirst($resource->resource_type) }}
                            </x-table.td>

                            <x-table.td action_col="true">
                                <x-action.delete route_name="article-categories.resource.destroy" param="{{ $resource->id }}" />
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>
    </div>
@endsection