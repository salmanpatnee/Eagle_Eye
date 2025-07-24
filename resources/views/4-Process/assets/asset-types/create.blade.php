@extends('4-Process.assets.layout.app')
@section('title', 'Asset Type Definition')
@section('title_ar', 'تعريف نوع الأصل')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $assetType?->id ? 'Update' : 'New' }} Asset Type">
            <x-action.button label="View" label_ar="منظر" route_name="asset-types.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($assetType) ? route('asset-types.update', $assetType->id) : route('asset-types.store') }}"
            method="POST">
            @csrf
            @if (isset($assetType))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Asset Type ID" label_ar="رمز نوع الأصل" name="asset_type_id" required="true"
                            :readonly="$assetType?->asset_type_id" placeholder="Enter Asset Type ID" :value="$assetType?->asset_type_id" />
                    </div>
                    <div>
                        <x-form.field label="Asset Type Name" label_ar="اسم نوع الأصل" name="asset_type_name"
                            required="true" placeholder="Enter Asset Type Name" :value="$assetType?->asset_type_name" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Asset Type Description" label_ar="وصف نوع الأصل" name="asset_type_description"
                    placeholder="Enter Asset Type Description" :value="$assetType?->asset_type_description" />


                <div class="flex justify-end">
                    <x-form.submit label="Asset Type" label_ar="النوع الفرعي الأصل" :isUpdate="$assetType?->asset_sub_type_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
