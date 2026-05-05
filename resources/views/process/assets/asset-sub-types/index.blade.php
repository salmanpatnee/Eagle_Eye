@extends('layouts.asset')
@section('title', 'Asset Sub-Type Definition')
@section('title_ar', 'تعريف النوع الفرعي الأصل')

@section('content')
    <div>

        <x-table.action-wrapper title="All Asset Sub-Types">
            <x-action.button label="Add Asset Sub-Type" label_ar="إضافة النوع الفرعي الأصل"
                route_name="asset-sub-types.create" />
        </x-table.action-wrapper>


        <div class="overflow-auto" style="max-height: calc(100vh - 200px);">
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="S.No" label_ar="رقم" />
                    <x-table.th label="Asset Sub-Type ID" label_ar="رمز النوع الفرعي للأصول" />
                    <x-table.th label="Asset Sub-Type Name" label_ar="اسم النوع الفرعي للأصول" />
                    <x-table.th label="Asset Type Name" label_ar="اسم نوع الأصل" />
                    <x-table.th label="Description" label_ar="وصف النوع الفرعي للأصول" />
                    <x-table.th label="Action" label_ar="إجراء " />
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($assetSubTypes as $assetSubType)
                        <tr>
                            <x-table.td>
                                <x-table.serial :loop="$loop" :paginator="$assetSubTypes" />
                            </x-table.td>
                            <x-table.td>
                                {{ $assetSubType->asset_sub_type_id }}
                            </x-table.td>
                            <x-table.td>{{ $assetSubType->asset_sub_type_name }}</x-table.td>
                            <x-table.td>{{ $assetSubType->type?->asset_type_name }}</x-table.td>
                            <x-table.td wrap="true"><span class="line-clamp-3" title="{{ $assetSubType->asset_sub_type_description }}">{{ $assetSubType->asset_sub_type_description }}</span></x-table.td>
                            <x-table.td action_col="true">
                                <x-action.view route_name="asset-sub-types.show" param="{{ $assetSubType->id }}" />
                                <x-action.edit route_name="asset-sub-types.edit" param="{{ $assetSubType->id }}" />
                                <x-action.delete route_name="asset-sub-types.destroy" param="{{ $assetSubType->id }}" />
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>
        <x-pagination>
            {{ $assetSubTypes->links() }}
        </x-pagination>

    </div>
@endsection
