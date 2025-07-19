@extends('4-Process.7-Risk.layout.app-full')
@section('title', 'Control Vs Risk')
@section('title_ar', 'تقرير معالجة المخاطر')
@section('content')
    <div>
        <x-table.action-wrapper title="Control Vs Risk">
            <x-action.button label="Control vs Risk" label_ar="تقرير معالجة المخاطر" route_name="control-risk.index" disabled
                class="opacity-75" />
            <x-action.button label="Risk vs Control" label_ar="الضوابط مقابل الأدلة" route_name="risk-treatment.index" />
        </x-table.action-wrapper>

        <form action="{{ route('risk-treatment.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Controls" label_ar="الضوابط" name="control" placeholder="Select Control"
                            :value="$controlId" :data="$controls" id_key="control_id" value_key="control_name"
                            onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.select label="Risks" label_ar="المخاطر" name="risk" placeholder="Select Risk"
                            :value="$riskId" :data="$risks" id_key="risk_id" value_key="risk_name"
                            onchange="this.form.submit()" :value="$riskId" />
                    </div>
                </x-form.grid-col>
            </div>
        </form>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Control ID" label_ar="رمز الضوابط" />
                <x-table.th label="Control Name" label_ar="اسم الضوابط" />
                <x-table.th label="Risk Name" label_ar="اسم المخاطر" />
            </x-table.thead>
            <x-table.tbody>
                @forelse ($riskTreatments as $riskTreatment)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td><a href="{{ route('controlmaster.show', $riskTreatment->control_id) }}"
                                target="_blank">{{ $riskTreatment->control_id }}</a></x-table.td>
                        <x-table.td>{{ $riskTreatment->control_name }}</x-table.td>
                        <x-table.td>
                            <x-table-list :data="$riskTreatment->risks" id_key="risk_id" value_key="risk_name" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
