@extends('layouts.risk-appetite')
@section('title', 'Risk Appetite List')
@section('title_ar', 'قائمة شهية المخاطر')

@section('content')
    <div>

        <x-table.action-wrapper title="All Risk Appetites">
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Risk Appetite ID" label_ar="رمز شهية المخاطر" />
                <x-table.th label="Risk Appetite Name" label_ar="اسم شهية المخاطر" />
                <x-table.th label="Risk Score" label_ar="درجة المخاطرة" />
                <x-table.th label="Action" label_ar="إجراء" />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($riskAppetites as $riskAppetite)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$riskAppetites" />
                        </x-table.td>
                        <x-table.td>{{ $riskAppetite->risk_appetite_id }}</x-table.td>
                        <x-table.td>{{ $riskAppetite->risk_appetite_name }}</x-table.td>
                        <x-table.td>{{ $riskAppetite->risk_score }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.edit route_name="risk-appetites.edit" param="{{ $riskAppetite->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
        <x-pagination>
            {{ $riskAppetites->links() }}
        </x-pagination>
    </div>
@endsection
