@extends('layouts.mis')
@section('title', 'Management Information System Reports')
@section('title_ar', 'تقارير نظم المعلومات الإدارية')
@section('content')
    <div>
        <x-table.action-wrapper title="Critical Assets Report">
            <x-action.pdf-button route_name="mis-critical-assets.index" />
        </x-table.action-wrapper>

        <x-table.scroll-table height-offset="180" min-width="900px">
            <x-slot:head>
                <x-table.th label="S.No" />
                <x-table.th label="Asset ID" label_ar="رمز الأصول" />
                <x-table.th label="Asset Name" label_ar="اسم الأصول" />
                <x-table.th label="Asset Group Name" label_ar="اسم مجموعة الأصول" />
                <x-table.th label="Asset Type Name" label_ar="اسم نوع الأصل" />
                <x-table.th label="Location" label_ar="اسم الموقع" />
            </x-slot:head>

            <x-slot:body>

                @forelse ($criticalAssets as $criticalAsset)
                    <tr>
                        <x-table.td class="text-center">
                            {{ $loop->index + 1 }}
                        </x-table.td>
                        <x-table.td>
                            <a href="{{ route('assets.show', $criticalAsset->id) }}">
                                {{ $criticalAsset->asset_id }}
                            </a>
                        </x-table.td>
                        <x-table.td>{{ $criticalAsset->asset_name }}</x-table.td>
                        <x-table.td>{{ $criticalAsset->assetGroup->asset_group_name }}</x-table.td>
                        <x-table.td>{{ $criticalAsset->assetType->asset_type_name }}</x-table.td>
                        <x-table.td>{{ $criticalAsset->location->location_name }}</x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>
    </div>
@endsection
