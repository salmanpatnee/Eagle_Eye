@extends('4-Process.7-Risk.layout.app-full')
@section('title', 'Risk vs Asset Group')
@section('title_ar', 'المخاطر مقابل مجموعة الأصول')
@section('content')
    <div>
        <x-table.action-wrapper title="Risk vs Asset Group">
            <x-action.button label="Risk vs Asset Group" label_ar="المخاطر مقابل مجموعة الأصول" route_name="riskvsassetgroup"
                disabled class="opacity-75" />
            <x-action.button label="Asset Group vs Risk" label_ar="مجموعة الأصول مقابل المخاطر"
                route_name="assetgroupvsrisk" />
        </x-table.action-wrapper>

        <form action="{{ route('riskvsassetgroup') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risks" label_ar="المخاطر" name="risk" placeholder="Select Risk"
                            :value="$riskId" :data="$risks" id_key="risk_id" value_key="risk_name"
                            onchange="this.form.submit()" :value="$riskId" />
                    </div>
                    <div>
                        <x-form.select label="Asset Group" label_ar="مجموعة الأصول" name="assetGroup"
                            placeholder="Select Asset Group" :value="$assetGroupId" :data="$assetGroups" id_key="asset_group_id"
                            value_key="asset_group_name" onchange="this.form.submit()" />
                    </div>
                </x-form.grid-col>
            </div>
        </form>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Risk ID" label_ar="رمز المخاطر" />
                <x-table.th label="Risk Name" label_ar="اسم المخاطر" />
                <x-table.th label="Asset Group" label_ar="اسم مجموعة الأصول" />
            </x-table.thead>
            <x-table.tbody>
                @forelse ($riskassetgroup as $row)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td><a href="{{ route('riskmaster.show', $row->risk_id) }}"
                                target="_blank">{{ $row->risk_id }}</a></x-table.td>
                        <x-table.td>{{ $row->risk_name }}</x-table.td>
                        <x-table.td>
                            <x-table-list :data="$row->assetGroups" id_key="asset_group_id" value_key="asset_group_name" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
