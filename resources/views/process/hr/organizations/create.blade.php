@extends('layouts.hr')
@section('title', 'Organizations')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $organization?->organization_id ? 'Update' : 'New' }} Organization">
            <x-action.button label="View" route_name="organizations.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($organization) ? route('organizations.update', $organization->id) : route('organizations.store') }}" method="POST">
            @csrf
            @if (isset($organization))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Organization ID" name="organization_id" required="true" :readonly="$organization?->organization_id"
                            placeholder="Enter Organization ID" :value="$organization?->organization_id" />
                    </div>
                    <div>
                        <x-form.field label="Organization Name" name="organization_name" required="true"
                            placeholder="Enter Organization Name" :value="$organization?->organization_name" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Organization Address" name="organization_address"
                            placeholder="Enter Organization Address" :value="$organization?->organization_address" />
                    </div>
                    <div>
                        <x-form.field label="Contact Number" name="contact_number"
                            placeholder="Enter Contact Number" :value="$organization?->contact_number" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Website Link" name="website_link"
                            placeholder="Enter Website Link" :value="$organization?->website_link" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>

                <div class="flex justify-end">
                    <x-form.submit label="Organization" :isUpdate="$organization?->organization_id" />
                </div>
            </div>
        </form>

    </div>
@endsection