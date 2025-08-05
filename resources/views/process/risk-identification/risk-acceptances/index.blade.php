@extends('layouts.risk-acceptance')
@section('title', 'Risk Acceptance')
@section('title_ar', 'قبول المخاطر')

@section('content')
    <div>

        <x-table.action-wrapper title="All Risk Acceptances">
            <x-action.button label="Add Risk Acceptance" label_ar="إضافة قبول المخاطر" route_name="risk-acceptances.create" />
        </x-table.action-wrapper>


        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Risk Acceptance ID" label_ar="رمز قبول المخاطر" />
                <x-table.th label="Start Date" label_ar="تاريخ بدء" />
                <x-table.th label="End Date" label_ar="تاريخ انتهاء" />
                <x-table.th label="Control Name" label_ar="اسم الضوابط" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($riskAcceptances as $riskAcceptance)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$riskAcceptances" />
                        </x-table.td>
                        <x-table.td>
                            {{ $riskAcceptance->risk_acceptance_id }}
                        </x-table.td>
                        <x-table.td>
                            {{ $riskAcceptance->risk_acceptance_start_date }}
                        </x-table.td>
                        <x-table.td>{{ $riskAcceptance->risk_acceptance_end_date }}</x-table.td>
                        <x-table.td>{{ $riskAcceptance?->control?->control_name }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="risk-acceptances.show" param="{{ $riskAcceptance->id }}" />
                            <x-action.edit route_name="risk-acceptances.edit" param="{{ $riskAcceptance->id }}" />
                            <x-action.delete route_name="risk-acceptances.destroy" param="{{ $riskAcceptance->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
        <x-pagination>
            {{ $riskAcceptances->links() }}
        </x-pagination>
    </div>
@endsection
