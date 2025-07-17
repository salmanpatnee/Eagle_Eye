@extends('4-Process.3-Asset.layout.app')
@section('title', 'Asset Registration')
@section('title_ar', 'تسجيل الأصول')
@section('content')
    <div>
        <x-table.action-wrapper title="Asset Details">
            <x-action.button label="View" label_ar="منظر" route_name="assets.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="assets.edit" route_param="{{ $asset->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Asset ID" label_ar="رمز الأصول">
                    {{ $asset->asset_id }}
                </x-info-col>

                <x-info-col label="Asset Name" label_ar="اسم الأصول">
                    {{ $asset->asset_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Asset Description" label_ar="عنوان الأصول">
                {{ $asset->asset_description ?? '—' }}
            </x-info-col-lg>



            <x-info-row>
                <x-info-col label="Asset IP Address" label_ar="عنوان IP للأصول">
                    {{ $asset->asset_ip_address }}
                </x-info-col>

                <x-info-col label="Client Server Name" label_ar="اسم خادم الأصول">
                    {{ $asset->asset_host_name }}
                </x-info-col>
            </x-info-row>


            <x-info-row>
                <x-info-col label="Asset URL" label_ar="عنوان URL للأصول">
                    {{ $asset->asset_url }}
                </x-info-col>

                <x-info-col label="Categories" label_ar="اسم فئة">
                    <x-list :data="$asset->categories" id_key="category_id" value_key="category_name" />
                </x-info-col>
            </x-info-row>
            {{-- 
            <x-info-row>
                <x-info-col label="Contact Person Email" label_ar="البريد الإلكتروني لجهة الاتصال">
                    {{ $asset->asset_contact_email }}
                </x-info-col>

            </x-info-row> --}}
        </div>
    </div>
@endsection
