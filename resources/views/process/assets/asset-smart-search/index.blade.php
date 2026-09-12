@extends('layouts.app-full')
@section('title', 'Asset Smart Search')
@section('title_ar', 'البحث الذكي عن الأصول')
@section('content')
    <div>
        <x-table.action-wrapper title="Asset Smart Search" />

        <form action="{{ route('asset-smart-search.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-3-col>
                    <div>
                        <x-form.select label="Asset Name" label_ar="اسم الأصول" name="asset_name" :value="$asset"
                            :custom_data="$assets" onchange="this.form.submit()" searchable />
                    </div>
                    <div>
                        <x-form.select label="Asset Group" label_ar="مجموعة الأصول" name="asset_group_name" :value="$asset_group_name"
                            :custom_data="$assetGroups" onchange="this.form.submit()" hide_keys="true" searchable />
                    </div>
                    <div>
                        <x-form.select label="Exclusive Category" label_ar="فئة حصرية" name="relation" :value="$relation"
                            :data="$categories" id_key="category_id" value_key="category_name" hide_keys="true"
                            onchange="this.form.submit()" searchable />
                    </div>
                    <div>

                    </div>
                </x-form.grid-3-col>
                <x-form.grid-3-col>
                    <div>
                        <x-form.select label="Asset Type" label_ar="نوع الأصول" name="asset_type_name" :value="$asset_type_name"
                            :custom_data="$assetTypes" onchange="this.form.submit()" searchable />
                    </div>
                    <div>
                        <x-form.select label="Asset Sub Type" label_ar="النوع الفرعي للأصول" name="asset_sub_type_name"
                            :value="$asset_sub_type_name" :custom_data="$assetSubTypes" onchange="this.form.submit()" searchable />
                    </div>
                    <div>
                        <x-form.select label="Location" label_ar="المواقع" name="location_name" :value="$location_name"
                            :custom_data="$locations" onchange="this.form.submit()" searchable />
                    </div>
                </x-form.grid-3-col>
            </div>
        </form>

        <x-table.scroll-table height-offset="280" min-width="1100px">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Asset ID" label_ar="رمز الأصول" />
                <x-table.th label="Asset Name" label_ar="اسم الأصول" />
                <x-table.th label="Asset Group" label_ar="مجموعة الأصول" />
                <x-table.th label="Asset Type" label_ar="نوع الأصول" />
                <x-table.th label="Asset Sub-Type" label_ar="النوع الفرعي للأصول" />
                <x-table.th label="Exclusive Category" label_ar="فئة حصرية" />
                <x-table.th label="Location" label_ar=" موقع الأصول" />
            </x-slot:head>
            <x-slot:body>
                @forelse ($result as $asset)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$result" /></x-table.td>
                        <x-table.td> {{ $asset->asset_id }}</x-table.td>
                        <x-table.td wrap="true"> {{ $asset->asset_name }}</x-table.td>
                        <x-table.td> {{ $asset->asset_group_name }}</x-table.td>
                        <x-table.td> {{ $asset->asset_type_name }}</x-table.td>
                        <x-table.td> {{ $asset->asset_sub_type_name }}</x-table.td>
                        <x-table.td>
                            <?php $exclusiveCategories = []; ?>

                            @if ($asset->critical_asset == 'Yes')
                                <?php $exclusiveCategories[] = 'Critical Asset'; ?>
                            @endif

                            @if ($asset->cloud_asset == 'Yes')
                                <?php $exclusiveCategories[] = 'Cloud Asset'; ?>
                            @endif

                            @if (count($exclusiveCategories) > 0)
                                {{ implode(', ', $exclusiveCategories) }}
                            @else
                                No Exclusive Category
                            @endif
                        </x-table.td>
                        <x-table.td> {{ $asset->location_name }} </x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $result->links() }}
        </x-pagination>


    </div>
@endsection
