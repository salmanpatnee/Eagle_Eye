@extends('layouts.hr')
@section('title', 'Designations')

@section('content')
    <div>
        <x-table.action-wrapper title="Designation Details">
            <x-action.button label="View" route_name="designations.index" />
            <x-action.button label="Edit" route_name="designations.edit" :route_param="$designation->id" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="ID">
                    {{ $designation->designation_id }}
                </x-info-col>

                <x-info-col label="Designation ID">

                    {{ $designation->designation_name }}
                </x-info-col>
            </x-info-row>


        </div>
    </div>
@endsection