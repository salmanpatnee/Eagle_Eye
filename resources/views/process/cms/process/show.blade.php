@extends('layouts.content')
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
                <x-info-col label="Category">
                    {{ $process->articleCategories?->first()?->name ?? 'N/A' }}
                </x-info-col>

            </x-info-row>

            <x-info-col-lg label="Process Description">
                {{ $process->description ?? '—' }}
            </x-info-col-lg>
        </div>
    </div>
@endsection
