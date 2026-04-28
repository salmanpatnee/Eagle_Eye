@extends('layouts.app-full')
@section('title', 'Management by Exceptions (MBE)')
@section('title_ar', 'إدارة بواسطة الاستثناءات')
@section('content')
    <div>
        <x-table.action-wrapper title="Risk Status">
            <x-action.button label="Control Status" label_ar="حالة الضوابط" route_name="exceptions-report.index" />
            <x-action.button label="Risk Status" label_ar="حالة المخاطر" route_name="risk-exceptions-report.index" disabled
                class="opacity-75" />
            <x-action.button label="Asset Status" label_ar="حالة الأصول" route_name="asset-exceptions-report.index" />
            <x-slot:extra>
                <div>
                    <x-action.pdf-button route_name="risk-exceptions-report.index" />
                    <x-action.excel-button route_name="risk-exceptions-report.index" query_params="?excel=1" />
                </div>
            </x-slot:extra>
        </x-table.action-wrapper>


        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Risk ID" label_ar="رمز المخاطر" />
                <x-table.th label="Risk Name" label_ar="اسم المخاطر" />
                <x-table.th label="Status" label_ar="حالة" />
                <x-table.th label="Owner" label_ar="اسم صاحب" />
                <x-table.th label="Custodians" label_ar="اسم الوصي" />
                <x-table.th label="Controls" label_ar="الضوابط" />
            </x-table.thead>
            <x-table.tbody>
                @forelse ($report as $row)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td> <a href="{{ route('risks.show', $row->rid) }}">{{ $row->risk_id }}</a></x-table.td>
                        <x-table.td wrap="true"> {{ $row->risk_name }}</x-table.td>
                        <x-table.td> {{ $row->status }}</x-table.td>
                        <x-table.td wrap="true"> <a href="{{ route('owners.show', $row->oid) }}">{{ $row->owner_name }}</a></x-table.td>
                        <x-table.td> {!! $row->custodian_links !!}</x-table.td>
                        <x-table.td> {!! $row->control_links !!}</x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>


    </div>
@endsection
