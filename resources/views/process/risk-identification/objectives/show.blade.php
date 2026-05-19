@extends('layouts.risk')
@section('title', 'Objectives')
@section('title_ar', 'أهداف')
@section('parent_title', 'Objectives')
@section('parent_url', route('objectives.index'))
@section('breadcrumb_title', $objective->objective_id)

@section('content')
    <div>
        <x-table.action-wrapper title="Objective Details">
            <x-action.button label="View" label_ar="منظر" route_name="objectives.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="objectives.edit" route_param="{{ $objective->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Objective ID" label_ar="رمز أهداف">
                    {{ $objective->objective_id }}
                </x-info-col>


            </x-info-row>

            <x-info-col-lg label="Objective" label_ar="أهداف">
                {{ $objective->objective }}
            </x-info-col-lg>

        </div>
    </div>
@endsection
