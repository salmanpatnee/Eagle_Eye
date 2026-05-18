@extends('layouts.app-full')
@section('title', 'Risk vs Control')
@section('title_ar', 'تقرير معالجة المخاطر')
@section('content')
    <div>
        <x-table.action-wrapper title="Risk vs Controls">
            <x-action.button label="Risk vs Control" label_ar="الضوابط مقابل الأدلة" route_name="risk-vs-control.index"
                disabled class="opacity-75" />
            <x-action.button label="Control vs Risk" label_ar="تقرير معالجة المخاطر" route_name="control-vs-risk.index" />
        </x-table.action-wrapper>

        <form action="{{ route('risk-vs-control.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risks" label_ar="المخاطر" name="risk" placeholder="Select Risk"
                            :value="$riskId" :data="$risks" id_key="risk_id" value_key="risk_name"
                            onchange="this.form.submit()" :value="$riskId" />
                    </div>
                    <div>
                        <x-form.select label="Controls" label_ar="الضوابط" name="control" placeholder="Select Control"
                            :value="$controlId" :data="$controls" id_key="control_id" value_key="control_name"
                            onchange="this.form.submit()" />
                    </div>
                </x-form.grid-col>
            </div>
        </form>

        <x-table.scroll-table height-offset="250" min-width="900px">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Risk ID" label_ar="رمز المخاطر" />
                <x-table.th label="Risk Name" label_ar="اسم المخاطر" />
                <x-table.th label="Control Name" label_ar="اسم الضوابط" />
            </x-slot:head>
            <x-slot:body>
                @forelse ($riskTreatments as $riskTreatment)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$riskTreatments" /></x-table.td>
                        <x-table.td><a href="{{ route('risks.show', $riskTreatment->id) }}"
                                target="_blank">{{ $riskTreatment->risk_id }}</a></x-table.td>
                        <x-table.td min-width="200px" max-width="400px">{{ $riskTreatment->risk_name }}</x-table.td>
                        <x-table.td min-width="200px">
                            <x-table-list :data="$riskTreatment->controls" id_key="control_id" value_key="control_name" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $riskTreatments->links() }}
        </x-pagination>
    </div>
@endsection
