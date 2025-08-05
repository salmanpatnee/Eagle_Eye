@extends('layouts.asset')
@section('title', 'Asset Status Definition')
@section('title_ar', 'تعريف حالة الأصول')

@section('content')
    <div>

        <x-table.action-wrapper title="All Asset Status">
            <x-action.button label="Add Asset Status" label_ar="إضافة حالة الأصول" route_name="asset-status.create" />
        </x-table.action-wrapper>


        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Asset Status ID" label_ar="رمز حالة الأصول" />
                <x-table.th label="Asset Status Name" label_ar="اسم حالة الأصول" />
                <x-table.th label="Asset Status Description" label_ar="وصف حالة الأصول" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($assetStatus as $status)
                    <tr>
                        <x-table.td>
                            {{ $loop->index + 1 }}
                        </x-table.td>
                        <x-table.td>
                            {{ $status->asset_status_id }}
                        </x-table.td>
                        <x-table.td>{{ $status->asset_current_status }}</x-table.td>
                        <x-table.td>{{ $status->asset_status_description }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="asset-status.show" param="{{ $status->id }}" />
                            <x-action.edit route_name="asset-status.edit" param="{{ $status->id }}" />
                            <x-action.delete route_name="asset-status.destroy" param="{{ $status->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>



    </div>
@endsection
