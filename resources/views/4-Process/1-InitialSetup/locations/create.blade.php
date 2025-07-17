@extends('4-Process.1-InitialSetup.layout.app')
@section('title', 'Location Setup')
@section('title_ar', 'إعداد الموقع')
@section('content')
    <div>
        <x-table.action-wrapper title="New Location">
            <x-action.button label="View" label_ar="منظر" route_name="locations.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($location) ? route('locations.update', $location->id) : route('locations.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($location))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $location->id }}">
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Location ID" label_ar="رمز الموقع" name="location_id" required="true"
                            :readonly="$location?->location_id" placeholder="Enter Location ID" :value="$location?->location_id" />
                    </div>
                    <div>
                        <x-form.field label="Location Name" label_ar="اسم الموقع" name="location_name" required="true"
                            placeholder="Enter Location Name" :value="$location?->location_name" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col-full>
                    <x-form.textarea-field label="Location Description" label_ar="وصف الموقع" name="location_description"
                        placeholder="Enter Location Description" :value="$location?->location_description" />
                </x-form.grid-col-full>
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Location Country" label_ar="البلد الموقع" name="location_country"
                            placeholder="Enter Location Country" :value="$location?->location_country" />
                    </div>
                    <div>
                        <x-form.field label="Location City" label_ar="المدينة الموقع" name="location_city"
                            placeholder="Enter Location City" :value="$location?->location_city" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Location Area" label_ar="موقع المنطقة" name="location_area"
                            placeholder="Enter Location Area" :value="$location?->location_area" />
                    </div>
                    <div>
                        <x-form.field label="Location Address" label_ar="موقع العنوان" name="location_address"
                            placeholder="Enter Location Address" :value="$location?->location_address" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Contact Person Name" label_ar="اسم جهة الاتصال بالموقع"
                            name="location_contact_name" placeholder="Enter Contact Person Name" :value="$location?->location_contact_name" />
                    </div>
                    <div>
                        <x-form.field label="Contact Person Number" label_ar="رقم الجوال" name="location_contact_number"
                            placeholder="Enter Contact Person Number" :value="$location?->location_contact_number" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Contact Person Email" label_ar="البريد الإلكتروني لجهة الاتصال"
                            name="location_contact_email" placeholder="Enter Contact Person Email" :value="$location?->location_contact_email" />
                    </div>
                </x-form.grid-col>

                <div class="flex justify-end">
                    <x-form.submit label="Location" label_ar="جهة" :isUpdate="$location?->location_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
