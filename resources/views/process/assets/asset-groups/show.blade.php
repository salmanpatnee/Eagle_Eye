@extends('layouts.asset-group')
@section('title', 'Asset Groups')
@section('title_ar', 'مجموعة مجموعة الأصول')
@section('content')
    <div>
        <x-table.action-wrapper title="Asset Group Details">
            <x-action.button label="View" label_ar="منظر" route_name="asset-groups.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="asset-groups.edit"
                route_param="{{ $assetGroup->id }}" />
        </x-table.action-wrapper>


        <div class="border-gray-100 border-t p-3">

            <x-info-row>
                <x-info-col label="Asset Group ID" label_ar="رمز مجموعة الأصول">
                    {{ $assetGroup->asset_group_id }}
                </x-info-col>
                <x-info-col label="Asset Group Name" label_ar="اسم مجموعة الأصول">
                    {{ $assetGroup->asset_group_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Asset Group Description" label_ar="وصف مجموعة الأصول">
                {{ $assetGroup->asset_group_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Asset Group Owner Name" label_ar="اسم صاحب مجموعة الأصول">
                    {{ $assetGroup?->owner?->owner_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Classification Name" label_ar="اسم التصنيف مجموعة الأصول">
                    {{ $assetGroup->classification?->classification_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Custodians" label_ar="اسم الوصي">
                    <x-list :data="$assetGroup->custodians" id_key="custodian_role_id" value_key="custodian_role_title" />
                </x-info-col>

            </x-info-row>
        </div>

    </div>
@endsection
