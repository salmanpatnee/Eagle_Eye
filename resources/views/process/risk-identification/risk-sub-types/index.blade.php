@extends('layouts.risk')
@section('title', 'Risk Sub-Types')
@section('title_ar', 'النوع الفرعي للمخاطر')

@section('content')
    <div>

        <x-table.action-wrapper title="All Risk Sub-Types">
            <x-action.button label="Add Risk Sub-Type" label_ar="إضافة النوع الفرعي للمخاطر"
                route_name="risk-sub-types.create" />
        </x-table.action-wrapper>


        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Risk Sub-Type ID" label_ar="رمز النوع الفرعي للمخاطر" />
                <x-table.th label="Risk Sub-Type Name" label_ar="اسم النوع الفرعي للمخاطر" />
                <x-table.th label="Risk Sub-Type Description" label_ar="وصف النوع الفرعي للمخاطر" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($riskSubTypes as $riskSubType)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$riskSubTypes" />
                        </x-table.td>
                        <x-table.td>
                            {{ $riskSubType->risk_sub_type_id }}
                        </x-table.td>
                        <x-table.td>{{ $riskSubType->risk_sub_type_name }}</x-table.td>
                        <x-table.td>{{ $riskSubType->risk_sub_type_description }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="risk-sub-types.show" param="{{ $riskSubType->id }}" />
                            <x-action.edit route_name="risk-sub-types.edit" param="{{ $riskSubType->id }}" />
                            <x-action.delete route_name="risk-sub-types.destroy" param="{{ $riskSubType->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
        <x-pagination>
            {{ $riskSubTypes->links() }}
        </x-pagination>
    </div>
@endsection
