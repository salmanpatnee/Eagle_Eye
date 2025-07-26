@extends('layouts.risk')
@section('title', 'Risk Treatment Options')
@section('title_ar', 'خيارات علاج المخاطر')

@section('content')
    <div>

        <x-table.action-wrapper title="All Treatment Options">
            <x-action.button label="Add Treatment Option" label_ar="إضافة خيارات علاج المخاطر"
                route_name="risk-treatment-options.create" />
        </x-table.action-wrapper>


        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Risk Treatment ID" label_ar="رمز خيارات علاج المخاطر" />
                <x-table.th label="Risk Treatment Name" label_ar="اسم خيارات علاج المخاطر" />
                <x-table.th label="Risk Treatment Description" label_ar="وصف خيارات علاج المخاطر" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($riskTreatments as $riskTreatment)
                    <tr>
                        <x-table.td>
                            {{ $loop->index + 1 }}
                        </x-table.td>
                        <x-table.td>
                            {{ $riskTreatment->risk_treatment_id }}
                        </x-table.td>
                        <x-table.td>{{ $riskTreatment->risk_treatment_name }}</x-table.td>
                        <x-table.td>{{ $riskTreatment->risk_treatment_description }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="risk-treatment-options.show" param="{{ $riskTreatment->id }}" />
                            <x-action.edit route_name="risk-treatment-options.edit" param="{{ $riskTreatment->id }}" />
                            <x-action.delete route_name="risk-treatment-options.destroy" param="{{ $riskTreatment->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

    </div>
@endsection
