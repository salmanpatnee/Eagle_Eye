@extends('layouts.app-full')
@section('title', 'Management by Exceptions (MBE)')
@section('title_ar', 'إدارة بواسطة الاستثناءات')
@section('content')
    <div>
        <x-table.action-wrapper title="Management by Exceptions (MBE)">
            <x-action.button label="Control Status" label_ar="حالة الضوابط" route_name="exceptions-report.index" />
            <x-action.button label="Risk Status" label_ar="حالة المخاطر" route_name="risk-exceptions-report.index" />
            <x-action.button label="Asset Status" label_ar="حالة الأصول" route_name="asset-exceptions-report.index" disabled
                class="opacity-75" />
        </x-table.action-wrapper>

        {{-- <form action="{{ route('asset-smart-search.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-3-col>
                    <div>
                        <x-form.select label="Asset Name" label_ar="اسم الأصول" name="asset_name" :value="$asset"
                            :custom_data="$assets" onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.select label="Asset Group" label_ar="مجموعة الأصول" name="asset_group_name"
                            :value="$asset_group_name" :custom_data="$assetGroups" onchange="this.form.submit()" hide_keys="true" />
                    </div>
                    <div>
                        <x-form.select label="Exclusive Category" label_ar="فئة حصرية" name="relation" :value="$relation"
                            :data="$categories" id_key="category_id" value_key="category_name" hide_keys="true"
                            onchange="this.form.submit()" hide_keys="true" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-3-col>
                <x-form.grid-3-col>
                    <div>
                        <x-form.select label="Asset Type" label_ar="نوع الأصول" name="asset_type_name" :value="$asset_type_name"
                            :custom_data="$assetTypes" onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.select label="Asset Sub Type" label_ar="النوع الفرعي للأصول" name="asset_sub_type_name"
                            :value="$asset_sub_type_name" :custom_data="$assetSubTypes" onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.select label="Location" label_ar="المواقع" name="location_name" :value="$location_name"
                            :custom_data="$locations" onchange="this.form.submit()" />
                    </div>
                </x-form.grid-3-col>
            </div>
        </form> --}}

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Asset ID" label_ar="رمز الأصول" />
                <x-table.th label="Asset Name" label_ar="اسم الأصول" />
                <x-table.th label="Asset Group" label_ar="مجموعة الأصول" />
                <x-table.th label="Owner" label_ar="اسم صاحب" />
                <x-table.th label="Custodians" label_ar="اسم الوصي" />
                <x-table.th label="Risks" label_ar="المخاطر" />
                <x-table.th label="Controls" label_ar="الضوابط" />
            </x-table.thead>
            <x-table.tbody>
                @forelse ($report as $row)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td> <a href="{{ route('assets.show', $row->aid) }}">{{ $row->asset_id }}</a></x-table.td>
                        <x-table.td> {{ $row->asset_name }}</x-table.td>
                        <x-table.td> {{ $row->asset_group_name }}</x-table.td>
                        <x-table.td> <a href="{{ route('owners.show', $row->oid) }}">{{ $row->owner_name }}</a></x-table.td>
                        <x-table.td> {!! $row->custodians !!}</x-table.td>
                        <x-table.td> {!! $row->risks !!}</x-table.td>
                        <x-table.td> {!! $row->controls !!}</x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>


    </div>
@endsection
