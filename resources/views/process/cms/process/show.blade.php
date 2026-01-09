@extends('layouts/user')
@section('title', 'Process')
@section('content')
    <div>
        <x-table.action-wrapper title="Process Details">
            <x-action.button label="View" route_name="cms.index" />
            <x-action.button label="Edit" route_name="cms.edit" route_param="{{ $process->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Process ID">
                    {{ $process->process_id }}
                </x-info-col>

                <x-info-col label="Process Name">
                    {{ $process->title }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Process Name Arabic">
                    <span dir="rtl" style="padding-right: .5em">{{ $process->title_ar }}</span>
                </x-info-col>

            </x-info-row>

            <x-info-col-lg label="Process Description">
                {{ $process->description ?? '—' }}
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
                    @foreach ($process->resources as $resource)
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
