@extends('layouts.hr')
@section('title', 'Certifications')

@section('content')
    <div>
        <x-table.action-wrapper title="Certification Details">
            <x-action.button label="View" route_name="certifications.index" />
            <x-action.button label="Edit" route_name="certifications.edit" :route_param="$certification->id" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
                <x-info-row>
                    <x-info-col label="Certification ID">
                        {{ $certification->certification_id }}
                    </x-info-col>

                    <x-info-col label="Certification Title">
                        {{ $certification->certification_title }}
                    </x-info-col>
                </x-info-row>

                <x-info-col-lg label="Institute">
                    {{ $certification->institute }}
                </x-info-col-lg>

        </div>
    </div>
@endsection