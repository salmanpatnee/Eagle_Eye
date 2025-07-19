@extends('4-Process.7-Risk.layout.app-full')
@section('title', 'Risk vs Control')
@section('title_ar', 'تقرير معالجة المخاطر')
@section('content')
    <div>
        <x-table.action-wrapper title="Risk vs Controls">
            <x-action.button label="Control vs Risk" label_ar="تقرير معالجة المخاطر" route_name="control-risk.index" />
            <x-action.button label="Risk vs Control" label_ar="الضوابط مقابل الأدلة" route_name="risk-treatment.index" disabled
                class="opacity-75" />
        </x-table.action-wrapper>

        <form action="{{ route('risk-treatment.index') }}" method="GET">
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

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Risk ID" label_ar="رمز المخاطر" />
                <x-table.th label="Risk Name" label_ar="اسم المخاطر" />
                <x-table.th label="Control Name" label_ar="اسم الضوابط" />
            </x-table.thead>
            <x-table.tbody>
                @forelse ($riskTreatments as $riskTreatment)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td><a href="{{ route('riskmaster.show', $riskTreatment->risk_id) }}"
                                target="_blank">{{ $riskTreatment->risk_id }}</a></x-table.td>
                        <x-table.td>{{ $riskTreatment->risk_name }}</x-table.td>
                        <x-table.td>
                            <x-table-list :data="$riskTreatment->controls" id_key="control_id" value_key="control_name" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection


{{-- <!DOCTYPE html>
<html lang="en">


<body style="background-color: #f6f6f6">
 
 
    <div class="tablearea">
        <table class="table">
            <thead class="tablehead">
                <tr>
                    <th>
                        <p>رمز</p>
                        <p>S.No</p>
                    </th>
                    <th>
                        <p>رمز المخاطر</p>
                        <p>Risk ID</p>
                    </th>
                    <th>
                        <p>اسم المخاطر</p>
                        <p>Risk Name</p>
                    </th>
                    <th>
                        <p>اسم الضوابط</p>
                        <p>Control Name</p>
                    </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                @forelse ($riskTreatments as $riskTreatment)
                    <tr>
                        <td class="text-center">
                            {{ $loop->index + 1 }}
                        </td>
                        <td>
                            <a href="{{ route('riskmaster.show', $riskTreatment->risk_id) }}" target="_blank"
                                class="text-dark">
                                {{ $riskTreatment->risk_id }}
                            </a>
                        </td>
                        <td>{{ $riskTreatment->risk_name }} </td>
                        <td>
                            @foreach ($riskTreatment->controls as $control)
                                <p>
                                    <a href="{{ route('controlmaster.show', $control->control_id) }}" target="_blank"
                                        class="text-dark">
                                        {{ $control->control_id }} - {{ $control->control_name }}
                                    </a>
                                </p>
                            @endforeach
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-error">
                        <p>No results were found.</p>
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body> --}}
