@extends('layouts.hr')
@section('title', 'Expertises')

@section('content')
    <div>
        <x-table.action-wrapper title="Expertise Details">
            <x-action.button label="View" route_name="expertises.index" />
            <x-action.button label="Edit" route_name="expertises.edit" :route_param="$expertise->id" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Expertise ID">
                    {{ $expertise->expertise_id }}
                </x-info-col>

                <x-info-col label="Expertise Title">
                    {{ $expertise->expertise_title }}
                </x-info-col>
            </x-info-row>
        </div>
    </div>
@endsection