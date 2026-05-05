@extends('layouts.asset')
@section('title', 'Asset Type Definition')
@section('title_ar', 'تعريف نوع الأصل')

@section('content')
    <div>

        <x-table.action-wrapper title="All Asset Types">
            <x-action.button label="Add Asset Type" label_ar="إضافة نوع الأصل" route_name="asset-types.create" />
        </x-table.action-wrapper>


        <div class="overflow-auto" style="max-height: calc(100vh - 200px);">
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="S.No" label_ar="رقم" />
                    <x-table.th label="Asset Type ID" label_ar="رمز نوع الأصل" />
                    <x-table.th label="Asset Type Name" label_ar="اسم نوع الأصل" />
                    <x-table.th label="Asset Type Description" label_ar="وصف نوع الأصل" />
                    <x-table.th label="Action" label_ar="إجراء " />
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($assetTypes as $assetType)
                        <tr>
                            <x-table.td>
                                {{ $loop->index + 1 }}
                            </x-table.td>
                            <x-table.td>
                                {{ $assetType->asset_type_id }}
                            </x-table.td>
                            <x-table.td>{{ $assetType->asset_type_name }}</x-table.td>
                            <x-table.td wrap="true"><span class="line-clamp-3" title="{{ $assetType->asset_type_description }}">{{ $assetType->asset_type_description }}</span></x-table.td>
                            <x-table.td action_col="true">
                                <x-action.view route_name="asset-types.show" param="{{ $assetType->id }}" />
                                <x-action.edit route_name="asset-types.edit" param="{{ $assetType->id }}" />
                                <x-action.delete route_name="asset-types.destroy" param="{{ $assetType->id }}" />
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>
        <x-pagination>
            {{ $assetTypes->links() }}
        </x-pagination>

    </div>
@endsection
