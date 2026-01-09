@extends('layouts.hr')
@section('title', 'Organizations')

@section('content')
    <div>
        <x-table.action-wrapper title="Organization Details">
            <x-action.button label="View" route_name="organizations.index" />
            <x-action.button label="Edit" route_name="organizations.edit" :route_param="$organization->id" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
                <x-info-row>
                    <x-info-col label="Organization ID">
                        {{ $organization->organization_id }}
                    </x-info-col>

                    <x-info-col label="Organization Name">
                        {{ $organization->organization_name }}
                    </x-info-col>
                </x-info-row>

                <x-info-col-lg label="Organization Address">
                    {{ $organization->organization_address }}
                </x-info-col-lg>

                <x-info-row>
                    <x-info-col label="Contact Number">
                        {{ $organization->contact_number }}
                    </x-info-col>

                    <x-info-col label="Website Link">
                        {{ $organization->website_link }}
                    </x-info-col>
                </x-info-row>

        </div>
    </div>
@endsection