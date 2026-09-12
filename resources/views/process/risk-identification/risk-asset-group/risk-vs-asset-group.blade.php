@extends('layouts.app-full')
@section('title', 'Risk vs Asset Group')
@section('title_ar', 'المخاطر مقابل مجموعة الأصول')
@section('content')
    <div>
        <x-table.action-wrapper title="Risk vs Asset Group">
            <x-action.button label="Risk vs Asset Group" label_ar="المخاطر مقابل مجموعة الأصول"
                route_name="risk-vs-asset-group.index" disabled class="opacity-75" />
            <x-action.button label="Asset Group vs Risk" label_ar="مجموعة الأصول مقابل المخاطر"
                route_name="asset-group-vs-risk.index" />
        </x-table.action-wrapper>

        <form action="{{ route('risk-vs-asset-group.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risks" label_ar="المخاطر" name="risk" placeholder="Select Risk"
                            :value="$riskId" :data="$risks" id_key="risk_id" value_key="risk_name"
                            onchange="this.form.submit()" searchable />
                    </div>
                    <div>
                        <x-form.select label="Asset Group" label_ar="مجموعة الأصول" name="assetGroup"
                            placeholder="Select Asset Group" :value="$assetGroupId" :data="$assetGroups" id_key="asset_group_id"
                            value_key="asset_group_name" onchange="this.form.submit()" searchable />
                    </div>
                </x-form.grid-col>
            </div>
        </form>

        <x-table.scroll-table height-offset="250" min-width="900px">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Risk ID" label_ar="رمز المخاطر" />
                <x-table.th label="Risk Name" label_ar="اسم المخاطر" />
                <x-table.th label="Asset Group" label_ar="اسم مجموعة الأصول" />
            </x-slot:head>
            <x-slot:body>
                @forelse ($riskassetgroup as $row)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$riskassetgroup" /></x-table.td>
                        <x-table.td><a href="{{ route('risks.show', $row->id) }}"
                                target="_blank">{{ $row->risk_id }}</a></x-table.td>
                        <x-table.td min-width="200px" max-width="400px">{{ $row->risk_name }}</x-table.td>
                        <x-table.td min-width="200px">
                            <x-table-list :data="$row->assetGroups" id_key="asset_group_id" value_key="asset_group_name" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $riskassetgroup->links() }}
        </x-pagination>
    </div>
@endsection
