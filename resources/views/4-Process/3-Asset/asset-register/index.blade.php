@extends('4-Process.3-Asset.layout.app')
@section('title', 'Asset Registration')
@section('title_ar', 'تسجيل الأصول')

@section('content')
    <div>

        <x-table.action-wrapper>
            <x-action.button label="Add Asset" label_ar="إضافة الأصول" route_name="assets.create" />
        </x-table.action-wrapper>

        <form action="{{ route('assets.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Asset" label_ar="الأصول" name="asset" placeholder="Select Asset" value=""
                            :data="$assetOptions" id_key="asset_id" value_key="asset_name" onchange="this.form.submit()"
                            :value="$asset" />
                    </div>
                    <div>
                        <x-form.select label="Asset Categories" label_ar="الفئة" name="category"
                            placeholder="Select Category" :value="$category" :data="$categories" id_key="category_id"
                            value_key="category_name" onchange="this.form.submit()" />
                    </div>
                </x-form.grid-col>
            </div>
        </form>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Asset ID" label_ar="رمز الأصول" />
                <x-table.th label="Asset Name" label_ar="الاسم الأصول" />
                <x-table.th label="Asset Description" label_ar="وصف الأصول" />
                <x-table.th label="Categories" label_ar="وصف الأصول" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($assets as $asset)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $asset->asset_id }}</x-table.td>
                        <x-table.td>{{ $asset->asset_name }}</x-table.td>
                        <x-table.td>{{ $asset->asset_description }}</x-table.td>
                        <x-table.td>
                            <x-table-list :data="$asset->categories" id_key="" value_key="category_name" />
                        </x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="assets.show" param="{{ $asset->asset_id }}" />
                            <x-action.edit route_name="assets.edit" param="{{ $asset->asset_id }}" />
                            <x-action.delete route_name="assets.destroy" param="{{ $asset->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        <x-pagination>
            {{ $assets->links() }}
        </x-pagination>

    </div>
@endsection
