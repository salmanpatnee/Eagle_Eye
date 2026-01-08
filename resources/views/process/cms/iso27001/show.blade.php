@extends('layouts/user')
@section('title', 'Section')
@section('title_ar', 'القسم')
@section('content')
    <div>
        <x-table.action-wrapper title="Section Details">
            <x-action.button label="View" label_ar="منظر" route_name="iso27001.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="iso27001.edit" route_param="{{ $process->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Section ID" label_ar="رمز القسم">
                    {{ $process->section_id }}
                </x-info-col>

                <x-info-col label="Section Name" label_ar="اسم القسم">
                    {{ $process->title }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Section Name Arabic" label_ar="اسم القسم عربي">
                    <span dir="rtl" style="padding-right: .5em">{{ $process->title_ar }}</span>
                </x-info-col>

            </x-info-row>

            <x-info-col-lg label="Section Description" label_ar="وصف القسم">
                {{ $process->description ?? '—' }}
            </x-info-col-lg>
        </div>

        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="S.No" label_ar="رقم" />
                    <x-table.th label="Resource Name" label_ar="اسم المورد" />
                    <x-table.th label="Resource Type" label_ar="نوع المورد" />
                    <x-table.th label="Action" label_ar="إجراء " />
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
