@extends('4-Process.assets.layout.app')
@section('title', 'Asset Sub-Type Definition')
@section('title_ar', 'تعريف النوع الفرعي الأصل')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $assetSubType?->id ? 'Update' : 'New' }} Asset Sub-Type">
            <x-action.button label="View" label_ar="منظر" route_name="asset-sub-types.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($assetSubType) ? route('asset-sub-types.update', $assetSubType->id) : route('asset-sub-types.store') }}"
            method="POST">
            @csrf
            @if (isset($assetSubType))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Asset Sub-Type ID" label_ar="رمز النوع الفرعي الأصل" name="asset_sub_type_id"
                            required="true" :readonly="$assetSubType?->asset_sub_type_id" placeholder="Enter Asset Sub-Type ID" :value="$assetSubType?->asset_sub_type_id" />
                    </div>
                    <div>
                        <x-form.field label="Asset Sub-Type Name" label_ar="اسم النوع الفرعي الأصل"
                            name="asset_sub_type_name" required="true" placeholder="Enter Asset Sub-Type Name"
                            :value="$assetSubType?->asset_sub_type_name" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Asset Sub-Type Description" label_ar="وصف النوع الفرعي الأصل"
                    name="asset_sub_type_description" placeholder="Enter Asset Sub-Type Description" :value="$assetSubType?->asset_sub_type_description" />


                <x-form.grid-col>
                    <div>
                        <x-form.select label="Asset Type" label_ar="نوع الأصل" name="asset_type_id" required="true"
                            placeholder="Enter Asset Type" :value="$assetSubType?->asset_type_id" :data="$assetTypes" id_key="asset_type_id"
                            value_key="asset_type_name" />
                    </div>

                    <div>

                    </div>
                </x-form.grid-col>


                <div class="flex justify-end">
                    <x-form.submit label="Asset Sub-Type" label_ar="النوع الفرعي الأصل" :isUpdate="$assetSubType?->asset_sub_type_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
