@extends('layouts.asset')
@section('title', 'Asset Sub-Type Definition')
@section('title_ar', 'تعريف النوع الفرعي الأصل')
@section('parent_title', 'Asset Sub-Type Definition')
@section('parent_url', route('asset-sub-types.index'))
@section('breadcrumb_title', $assetSubType->asset_sub_type_name)
@section('content')
    <div>
        <x-table.action-wrapper title="Asset Sub-Type Details">
            <x-action.button label="View" label_ar="منظر" route_name="asset-sub-types.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="asset-sub-types.edit"
                route_param="{{ $assetSubType->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Asset Sub-Type ID" label_ar="رمز النوع الفرعي للأصول">
                    {{ $assetSubType->asset_sub_type_id }}
                </x-info-col>

                <x-info-col label="Asset Sub-Type Name" label_ar="اسم النوع الفرعي للأصول">
                    {{ $assetSubType->asset_sub_type_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Asset Sub-Type Description" label_ar="عنوان النوع الفرعي للأصول">
                {{ $assetSubType->asset_sub_type_description ?? '—' }}
            </x-info-col-lg>



            <x-info-row>
                <x-info-col label="Asset Type" label_ar="اسم نوع الأصل">
                    {{ $assetSubType->type->asset_type_name }}
                </x-info-col>

            </x-info-row>


        </div>
    </div>
@endsection
