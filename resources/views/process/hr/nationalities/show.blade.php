@extends('layouts.hr')
@section('title', 'Nationalities')

@section('content')
    <div>
        <x-table.action-wrapper title="Nationality Details">
            <x-action.button label="View" route_name="nationalities.index" />
            <x-action.button label="Edit" route_name="nationalities.edit" :route_param="$nationality->id" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">

                <x-info-col-lg label="Name">
                    {{ $nationality->name }}
                </x-info-col-lg>

        </div>
    </div>
@endsection