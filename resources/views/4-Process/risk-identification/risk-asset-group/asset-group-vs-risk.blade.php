@extends('layouts.app-full')
@section('title', 'Asset Group vs Risk')
@section('title_ar', 'مجموعة الأصول مقابل المخاطر')
@section('content')
    <div>
        <x-table.action-wrapper title="Risk vs Asset Group">
            <x-action.button label="Risk vs Asset Group" label_ar="المخاطر مقابل مجموعة الأصول"
                route_name="risk-vs-asset-group.index" />
            <x-action.button label="Asset Group vs Risk" label_ar="مجموعة الأصول مقابل المخاطر"
                route_name="asset-group-vs-risk.index" disabled class="opacity-75" />
        </x-table.action-wrapper>

        <form action="{{ route('asset-group-vs-risk.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Asset Group" label_ar="مجموعة الأصول" name="assetGroup"
                            placeholder="Select Asset Group" :value="$assetGroupId" :data="$assetGroups" id_key="asset_group_id"
                            value_key="asset_group_name" onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.select label="Risks" label_ar="المخاطر" name="risk" placeholder="Select Risk"
                            :value="$riskId" :data="$risks" id_key="risk_id" value_key="risk_name"
                            onchange="this.form.submit()" :value="$riskId" />
                    </div>
                </x-form.grid-col>
            </div>
        </form>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Asset Group ID" label_ar="رمز مجموعة الأصول" />
                <x-table.th label="Asset Group Name" label_ar="اسم مجموعة الأصول" />
                <x-table.th label="Risk" label_ar="المخاطر" />
            </x-table.thead>
            <x-table.tbody>
                @forelse ($riskassetgroup as $row)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td><a href="{{ route('asset-groups.show', $row->asset_group_id) }}"
                                target="_blank">{{ $row->asset_group_id }}</a></x-table.td>
                        <x-table.td>{{ $row->asset_group_name }}</x-table.td>
                        <x-table.td>
                            <x-table-list :data="$row->risks" id_key="risk_id" value_key="risk_name" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
