@extends('layouts.mis')
@section('title', 'Management Information System Reports')
@section('title_ar', 'تقارير نظم المعلومات الإدارية')
@section('content')
    <div>
        <x-table.action-wrapper title="E-Banking Assets Report">
            <x-action.pdf-button route_name="mis-e-banking-assets.index" />

        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" />
                <x-table.th label="Asset ID" label_ar="رمز الأصول" />
                <x-table.th label="Asset Name" label_ar="اسم الأصول" />
                <x-table.th label="Asset Group Name" label_ar="اسم مجموعة الأصول" />
                <x-table.th label="Asset Type Name" label_ar="اسم نوع الأصل" />
                <x-table.th label="Location" label_ar="اسم الموقع" />
            </x-table.thead>

            <x-table.tbody>

                @forelse ($result as $row)
                    <tr>
                        <x-table.td class="text-center">
                            {{ $loop->index + 1 }}
                        </x-table.td>
                        <x-table.td>
                            <a href="{{ route('assets.show', $row->id) }}">
                                {{ $row->asset_id }}
                            </a>
                        </x-table.td>
                        <x-table.td>{{ $row->asset_name }}</x-table.td>
                        <x-table.td>{{ $row->asset_group_name }}</x-table.td>
                        <x-table.td>{{ $row->asset_type_name }}</x-table.td>
                        <x-table.td>{{ $row->location_name }}</x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
