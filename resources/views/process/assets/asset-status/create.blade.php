@extends('layouts.asset')
@section('title', 'Asset Status Definition')
@section('title_ar', 'تعريف حالة الأصول')
@section('parent_url', route('asset-status.index'))
@if(isset($assetStatus))
    @section('parent_title', 'Asset Status Definition')
    @section('breadcrumb_title', $assetStatus->asset_current_status)
@endif
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $assetStatus?->id ? 'Update' : 'New' }} Asset Status">
            <x-action.button label="View" label_ar="منظر" route_name="asset-status.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($assetStatus) ? route('asset-status.update', $assetStatus->id) : route('asset-status.store') }}"
            method="POST">
            @csrf
            @if (isset($assetStatus))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Asset Status ID" label_ar="رمز حالة الأصول" name="asset_status_id" required="true"
                            :readonly="$assetStatus?->asset_status_id" placeholder="Enter Asset Status ID" :value="$assetStatus?->asset_status_id" />
                    </div>
                    <div>
                        <x-form.field label="Asset Status Name" label_ar="اسم حالة الأصول" name="asset_current_status"
                            required="true" placeholder="Enter Asset Status Name" :value="$assetStatus?->asset_current_status" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Asset Status Description" label_ar="وصف حالة الأصول"
                    name="asset_status_description" placeholder="Enter Asset Status Description" :value="$assetStatus?->asset_status_description" />


                <div class="flex justify-end">
                    <x-form.submit label="Asset Status" label_ar="حالة الأصول" :isUpdate="$assetStatus?->asset_status_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
