@extends('layouts.risk')
@section('title', 'Key Performance Indicators')
@section('title_ar', 'مؤشرات الأداء الرئيسية')

@section('content')
    <div>

        <x-table.action-wrapper title="All KPIs">
            <x-action.button label="Add KPI" label_ar="إضافة مؤشرات الأداء الرئيسية" route_name="kpis.create" />
        </x-table.action-wrapper>


        <x-table.scroll-table height-offset="280" min-width="900px">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="KPI ID" label_ar="رمز مؤشرات الأداء الرئيسية" />
                <x-table.th label="KPI Name" label_ar="اسم مؤشرات الأداء الرئيسية" />
                <x-table.th label="KPI Value" label_ar="قيمة مؤشرات الأداء الرئيسية" />
                <x-table.th label="Action" label_ar="إجراء " />
           </x-slot:head>
           <x-slot:body>
                @foreach ($keyPerformanceIndicators as $keyPerformanceIndicator)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$keyPerformanceIndicators" />
                        </x-table.td>
                        <x-table.td>
                            {{ $keyPerformanceIndicator->key_performance_indicatory_id }}
                        </x-table.td>
                        <x-table.td wrap="true">
                            {{ $keyPerformanceIndicator->key_performance_indicatory_name }}
                        </x-table.td>
                        <x-table.td>{{ $keyPerformanceIndicator->key_performance_indicatory_value }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="kpis.show" param="{{ $keyPerformanceIndicator->id }}" />
                            <x-action.edit route_name="kpis.edit" param="{{ $keyPerformanceIndicator->id }}" />
                            <x-action.delete route_name="kpis.destroy" param="{{ $keyPerformanceIndicator->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
                </x-slot:body>
        </x-table.scroll-table>


        <x-pagination>
            {{ $keyPerformanceIndicators->links() }}
        </x-pagination>
    </div>
@endsection
