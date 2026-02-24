@extends('layouts/user')
@section('title', 'Contents')
@section('content')
    <div>
        <x-table.action-wrapper title="Contents Details">
            <x-action.button label="View" route_name="contents.index" />
            <x-action.button label="Edit" route_name="contents.edit" route_param="{{ $content->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Content Title">
                    {{ $content->title }}
                </x-info-col>
                <x-info-col label="Section">
                    {{ $content->category }}
                </x-info-col>

            </x-info-row>

            <x-info-row>
                <x-info-col label="Sort Order">
                    {{ $content->sort_order ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Content Description">
                {{ $content->description ?? '—' }}
            </x-info-col-lg>
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
                    @foreach ($content->resources as $resource)
                        <tr>
                            <x-table.td> {{ $loop->index + 1 }}</x-table.td>
                            <x-table.td>
                                {{ $resource->file_name }}
                            </x-table.td>
                            <x-table.td>
                                {{ ucfirst($resource->resource_type) }}
                            </x-table.td>

                            <x-table.td action_col="true">
                                <x-action.delete route_name="process.resource.destroy" param="{{ $resource->id }}" />
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>
    </div>
@endsection
