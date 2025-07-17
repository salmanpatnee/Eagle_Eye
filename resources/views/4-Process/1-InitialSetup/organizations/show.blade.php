@extends('4-Process.1-InitialSetup.layout.app')
@section('title', 'Organization Setup')
@section('title_ar', 'إعداد الجهة')
@section('content')
    <div>
        <x-table.action-wrapper title="Organization Details">
            <x-action.button label="View" label_ar="منظر" route_name="organizations.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="organizations.edit"
                route_param="{{ $organization->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Organization ID" label_ar="رمز الجهة">
                    {{ $organization->organization_id }}
                </x-info-col>

                <x-info-col label="Organization Logo" label_ar="شعار الجهة">
                    @if ($organization->organization_logo == null)
                        <p class="sh-tx">No Logo</p>
                    @else
                        <img src="{{ asset('storage/' . $organization->organization_logo) }}" alt="Organization Logo"
                            class="w-[23%]">
                    @endif
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Organization Name" label_ar="اسم الجهة">
                    {{ $organization->organization_name_english }}
                </x-info-col>

                <x-info-col label="Organization Name Arabic" label_ar=" اسم الجهة (بالعربي) ">
                    {{ $organization->organization_name_arabic }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label=" Organization Address" label_ar="عنوان الجهة">
                {{ $organization->organization_address ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Owner Name" label_ar="اسم صاحب المبادرة">
                    {{ $organization->initiative_owner_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Owner Title" label_ar="تسمية صاحب المبادرة">
                    {{ $organization->initiative_owner_title }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Contact Number" label_ar="رقم الاتصال">
                    {{ $organization->initiative_owner_contact_number ?? '—' }}
                </x-info-col>

                <x-info-col label="Email Address" label_ar="عنوان البريد الإلكتروني">
                    {{ $organization->initiative_owner_email ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>
    </div>
@endsection
