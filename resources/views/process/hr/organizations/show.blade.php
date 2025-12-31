@extends('layouts.user')
@section('title', 'Organizations')
@section('title_ar', 'المنظمات')

@section('content')
    <div>
        <x-table.action-wrapper title="Organization Details">
            <x-action.button label="View" label_ar="منظر" route_name="organizations.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="organizations.edit" :route_param="$organization->id" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
                <x-info-row>
                    <x-info-col label="Organization ID" label_ar="رمز المنظمة">
                        {{ $organization->organization_id }}
                    </x-info-col>

                    <x-info-col label="Organization Name" label_ar="اسم المنظمة">
                        {{ $organization->organization_name }}
                    </x-info-col>
                </x-info-row>

                <x-info-col-lg label="Organization Address" label_ar="عنوان المنظمة">
                    {{ $organization->organization_address }}
                </x-info-col-lg>

                <x-info-row>
                    <x-info-col label="Contact Number" label_ar="رقم الاتصال">
                        {{ $organization->contact_number }}
                    </x-info-col>

                    <x-info-col label="Website Link" label_ar="رابط الموقع">
                        {{ $organization->website_link }}
                    </x-info-col>
                </x-info-row>

        </div>
    </div>
@endsection