@extends('layouts.asset')
@section('title', 'Asset Type Definition')
@section('title_ar', 'تعريف نوع الأصل')
@section('parent_title', 'Asset Type Definition')
@section('parent_url', route('asset-types.index'))
@section('breadcrumb_title', $assetType->asset_type_name)
@section('content')
    <div>
        <x-table.action-wrapper title="Asset Type Details">
            <x-action.button label="View" label_ar="منظر" route_name="asset-types.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="asset-types.edit" route_param="{{ $assetType->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Asset Type ID" label_ar="رمز نوع الأصل">
                    {{ $assetType->asset_type_id }}
                </x-info-col>

                <x-info-col label="Asset Type Name" label_ar="اسم نوع الأصل">
                    {{ $assetType->asset_type_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Asset Type Description" label_ar="عنوان نوع الأصل">
                {{ $assetType->asset_type_description ?? '—' }}
            </x-info-col-lg>

        </div>
    </div>
@endsection
