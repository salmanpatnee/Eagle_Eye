@extends('layouts.asset')
@section('title', 'Asset Status Definition')
@section('title_ar', 'تعريف حالة الأصول')
@section('content')
    <div>
        <x-table.action-wrapper title="Asset Status Details">




            <x-action.button label="View" label_ar="منظر" route_name="asset-status.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="asset-status.edit"
                route_param="{{ $assetStatus->id }}" />


        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Asset Status ID" label_ar="رمز حالة الأصول">
                    {{ $assetStatus->asset_status_id }}
                </x-info-col>
                <x-info-col label="Asset Current Status" label_ar="حالة الحالي للأصول">
                    {{ $assetStatus->asset_current_status }}
                </x-info-col>
            </x-info-row>
            <x-info-col-lg label="Asset Status Description" label_ar="وصف حالة الأصول">
                {{ $assetStatus->asset_status_description ?? '—' }}
            </x-info-col-lg>
        </div>
    </div>
@endsection
