@extends('layouts.asset-group')
@section('title', 'Asset Groups')
@section('title_ar', 'مجموعة الأصول')

@section('content')
    <div>

        <x-table.action-wrapper title="All Asset Groups">
            <x-action.button label="Add Asset Group" label_ar="مجموعة الأصول" route_name="asset-groups.create" />
        </x-table.action-wrapper>

        <x-table.scroll-table height-offset="180" min-width="900px">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Asset Group ID" label_ar="رمز مجموعة الأصول" />
                <x-table.th label="Asset Group Name" label_ar="الاسم مجموعة الأصول" />
                <x-table.th label="Owner" label_ar="اسم صاحب" />
                <x-table.th label="Classification" label_ar="اسم التصنيف" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-slot:head>
            <x-slot:body>
                @foreach ($assetGroups as $assetGroup)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$assetGroups" /></x-table.td>
                        <x-table.td>{{ $assetGroup->asset_group_id }}</x-table.td>
                        <x-table.td min-width="200px" max-width="400px">{{ $assetGroup->asset_group_name }}</x-table.td>
                        <x-table.td>{{ $assetGroup?->owner?->owner_name }}</x-table.td>
                        <x-table.td>{{ $assetGroup->classification->classification_name }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="asset-groups.show" param="{{ $assetGroup->id }}" />
                            <x-action.edit route_name="asset-groups.edit" param="{{ $assetGroup->id }}" />
                            <x-action.delete route_name="asset-groups.destroy" param="{{ $assetGroup->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $assetGroups->links() }}
        </x-pagination>

    </div>
@endsection
