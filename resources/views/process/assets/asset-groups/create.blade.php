@extends('layouts.asset-group')
@section('title', 'Asset Groups')
@section('title_ar', 'مجموعة الأصول')
@section('parent_url', route('asset-groups.index'))
@if(isset($assetGroup))
    @section('parent_title', 'Asset Groups')
    @section('breadcrumb_title', $assetGroup->asset_group_name)
@endif
@section('content')
    @php
        $ratingOptions = [1, 2, 3, 4, 5];
        $yesNoOptions = ['Yes', 'No'];
    @endphp
    <div>
        <x-table.action-wrapper title="{{ $assetGroup?->id ? 'Update' : 'New' }} Asset Group">
            <x-action.button label="View" label_ar="منظر" route_name="asset-groups.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($assetGroup) ? route('asset-groups.update', $assetGroup->id) : route('asset-groups.store') }}"
            method="POST">
            @csrf
            @if (isset($assetGroup))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Asset Group ID" label_ar="رمز مجموعة الأصول" name="asset_group_id" required="true"
                            :readonly="$assetGroup?->asset_group_id" placeholder="Enter Asset Group ID" :value="$assetGroup?->asset_group_id" />
                    </div>
                    <div>
                        <x-form.field label="Asset Group Name" label_ar="اسم  مجموعة الأصول" name="asset_group_name"
                            required="true" placeholder="Enter Asset Group Name" :value="$assetGroup?->asset_group_name" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Asset Group Description" label_ar="وصف  مجموعة الأصول"
                    name="asset_group_description" placeholder="Enter Asset Group Description" :value="$assetGroup?->asset_group_description" />


                <x-form.grid-col>
                    <div>
                        <x-form.select label="Owner Name" label_ar="اسم صاحب " name="owner_id" placeholder="Select Owner"
                            :value="$assetGroup?->owner_id" :data="$owners" id_key="owner_role_id" value_key="owner_name"
                            required="true" />
                    </div>
                    <div>
                        <x-form.select label="Asset Classification Name" label_ar="اسم التصنيف " name="classification_id"
                            placeholder="Select Classification" :value="$assetGroup?->classification_id" :data="$classifications"
                            id_key="classification_id" value_key="classification_name" required="true" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.multiselect label="Custodians" required="true" label_ar="اسم الوصي" name="custodians[]"
                            :value="$custodianIds" :data="$custodians" id_key="custodian_role_id" value_key="custodian_role_title"
                            show_key="true" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>

                <div class="flex justify-end">
                    <x-form.submit label="Asset Group" label_ar="مجموعة الأصول" :isUpdate="$assetGroup?->id" />
                </div>
            </div>

        </form>
    </div>
@endsection
