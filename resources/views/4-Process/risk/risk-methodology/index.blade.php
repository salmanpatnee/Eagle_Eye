@extends('4-Process.risk.risk-methodology.layout.app')
@section('title', 'Risk Methodology')
@section('title_ar', 'منهجية المخاطر')
@section('content')
    <div>

        <x-table.action-wrapper>
            <x-action.button label="Add Methodology" label_ar="إضافة منهجية المخاطر" route_name="risk-methodology.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Risk Methodology ID" label_ar="رمز منهجية المخاطر" />
                <x-table.th label="Risk Methodology Name" label_ar="الاسم منهجية المخاطر" />
                <x-table.th label="Risk Methodology Source" label_ar="مصدر منهجية المخاطر" />
                <x-table.th label="Action" label_ar="إجراء" />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($riskMethodologies as $riskMethodology)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $riskMethodology->risk_methodology_id }}</x-table.td>
                        <x-table.td>{{ $riskMethodology->risk_methodology_name }}</x-table.td>
                        <x-table.td>{{ $riskMethodology->risk_methodology_source }}</x-table.td>

                        <x-table.td action_col="true">
                            <x-action.view route_name="risk-methodology.show" param="{{ $riskMethodology->id }}" />
                            <x-action.edit route_name="risk-methodology.edit" param="{{ $riskMethodology->id }}" />
                            <x-action.delete route_name="risk-methodology.destroy" param="{{ $riskMethodology->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
