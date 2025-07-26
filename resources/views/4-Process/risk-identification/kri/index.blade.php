@extends('layouts.risk')
@section('title', 'Key Risk Indicators')
@section('title_ar', 'مؤشرات المخاطر الرئيسية')

@section('content')
    <div>

        <x-table.action-wrapper title="All KRIs">
            <x-action.button label="Add KRI" label_ar="إضافة مؤشرات المخاطر الرئيسية" route_name="kris.create" />
        </x-table.action-wrapper>


        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="KRI ID" label_ar="رمز مؤشرات المخاطر الرئيسية" />
                <x-table.th label="KRI Name" label_ar="اسم مؤشرات المخاطر الرئيسية" />
                <x-table.th label="KRI Value" label_ar="قيمة مؤشرات المخاطر الرئيسية" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($keyRiskIndicators as $keyRiskIndicator)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$keyRiskIndicators" />
                        </x-table.td>
                        <x-table.td>
                            {{ $keyRiskIndicator->key_risk_indicator_id }}
                        </x-table.td>
                        <x-table.td>{{ $keyRiskIndicator->key_risk_indicator_name }}</x-table.td>
                        <x-table.td>{{ $keyRiskIndicator->key_risk_indicator_value }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="kris.show" param="{{ $keyRiskIndicator->id }}" />
                            <x-action.edit route_name="kris.edit" param="{{ $keyRiskIndicator->id }}" />
                            <x-action.delete route_name="kris.destroy" param="{{ $keyRiskIndicator->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
        <x-pagination>
            {{ $keyRiskIndicators->links() }}
        </x-pagination>
    </div>
@endsection
