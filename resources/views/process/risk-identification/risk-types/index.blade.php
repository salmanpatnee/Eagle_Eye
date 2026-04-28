@extends('layouts.risk')
@section('title', 'Risk Types')
@section('title_ar', 'النوع للمخاطر')

@section('content')
    <div>

        <x-table.action-wrapper title="All Risk Types">
            <x-action.button label="Add Risk Type" label_ar="إضافة النوع للمخاطر" route_name="risk-types.create" />
        </x-table.action-wrapper>


        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Risk Type ID" label_ar="رمز النوع للمخاطر" />
                <x-table.th label="Risk Type Name" label_ar="اسم النوع للمخاطر" />
                <x-table.th label="Risk Type Description" label_ar="وصف النوع للمخاطر" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($riskTypes as $riskType)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$riskTypes" />
                        </x-table.td>
                        <x-table.td>
                            {{ $riskType->risk_type_id }}
                        </x-table.td>
                        <x-table.td>{{ $riskType->risk_type_name }}</x-table.td>
                        <x-table.td wrap="true"><span class="line-clamp-3" title="{{ $riskType->risk_type_description }}">{{ $riskType->risk_type_description }}</span></x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="risk-types.show" param="{{ $riskType->id }}" />
                            <x-action.edit route_name="risk-types.edit" param="{{ $riskType->id }}" />
                            <x-action.delete route_name="risk-types.destroy" param="{{ $riskType->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
        <x-pagination>
            {{ $riskTypes->links() }}
        </x-pagination>
    </div>
@endsection
