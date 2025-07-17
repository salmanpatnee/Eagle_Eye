@extends('4-Process.1-InitialSetup.layout.app')
@section('title', 'Location Setup')
@section('title_ar', 'إعداد الموقع')
@section('content')
    <div>
        <x-table.action-wrapper title="Location Details">
            <x-action.button label="View" label_ar="منظر" route_name="locations.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="locations.edit" route_param="{{ $location->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Location ID" label_ar="رمز الموقع">
                    {{ $location->location_id }}
                </x-info-col>

                <x-info-col label="Location Name" label_ar="اسم الموقع">
                    {{ $location->location_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col-lg label="Location Description" label_ar="وصف الموقع">
                    {{ $location->location_description ?? '—' }}
                </x-info-col-lg>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Location Country" label_ar="البلد الموقع">
                    {{ $location->location_country }}
                </x-info-col>

                <x-info-col label="Location City" label_ar="المدينة الموقع">
                    {{ $location->location_city }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Location Area" label_ar="موقع المنطقة">
                    {{ $location->location_area }}
                </x-info-col>

                <x-info-col label="Location Address" label_ar="موقع العنوان">
                    {{ $location->location_address }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Contact Person Name" label_ar="اسم جهة الاتصال بالموقع">
                    {{ $location->location_contact_name }}
                </x-info-col>

                <x-info-col label="Contact Person Number" label_ar="رقم الجوال المحمول لجهة الاتصال">
                    {{ $location->location_contact_number }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Contact Person Email" label_ar="البريد الإلكتروني لجهة الاتصال">
                    {{ $location->location_contact_email }}
                </x-info-col>

            </x-info-row>
        </div>
    </div>
@endsection
