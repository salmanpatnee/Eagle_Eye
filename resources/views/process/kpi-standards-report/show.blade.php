@extends('layouts.app-full')
@section('title', 'Available KPIs with References')
@section('title_ar', 'مؤشرات الأداء الرئيسية المتاحة مع المراجع')
@section('content')
    <div>
        <x-table.action-wrapper title="Available KPIs with References">
        </x-table.action-wrapper>

        <form action="{{ route('kpi-standards-report.show', $kpiStandardsReport->category_id) }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-3-col>
                    <div>
                    </div>
                    <div>
                        <x-form.select label="Best Practices" label_ar="أفضل الممارسات" name="bestPractice"
                            placeholder="Select Best Practice" :value="$bestPractice" :data="$bestPractices" id_key="best_practices_id"
                            value_key="best_practices_name" onchange="this.form.submit()" />
                    </div>
                    <div>
                    </div>
                </x-form.grid-3-col>
            </div>
        </form>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="KPI ID" label_ar="رمز مؤشرات الأداء الرئيسية" />
                <x-table.th label="KPI Name" label_ar="اسم مؤشرات الأداء الرئيسية" />
                <x-table.th label="KPI Value" label_ar="تكرار مؤشرات الأداء الرئيسية" />
                <x-table.th label="Category" label_ar="اسم الفئة" />
                <x-table.th label="Best Practice" label_ar="أفضل الممارسات" />
                <x-table.th label="Reference" label_ar="مرجع" />
                <x-table.th label="Remarks/Comments" label_ar="ملاحظات" />
            </x-table.thead>
            <x-table.tbody>
                @forelse ($kpiStandardsReport->recommededPriorites as $standard)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>
                            {{ $standard->kpi_id }}
                        </x-table.td>
                        <x-table.td>
                            {{ $standard->kpi_name }}
                        </x-table.td>
                        <x-table.td>
                            {!! html_entity_decode($standard?->kpi_value) !!}
                        </x-table.td>
                        <x-table.td>
                            {{ $standard->category->category_name }}
                        </x-table.td>
                        <x-table.td>
                            {{ $standard->bestPractice->best_practices_name }}
                        </x-table.td>
                        <x-table.td>
                            {{ $standard->reference }}
                        </x-table.td>
                        <x-table.td>
                            {!! html_entity_decode($standard?->remarks) !!}
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        <h1 class="text-2xl text-center mt-6 mb-2 bg-brand-950 text-white py-2 font-medium">Other KPIs References</h1>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="KPI ID" label_ar="رمز مؤشرات الأداء الرئيسية" />
                <x-table.th label="KPI Name" label_ar="اسم مؤشرات الأداء الرئيسية" />
                <x-table.th label="KPI Value" label_ar="تكرار مؤشرات الأداء الرئيسية" />
                <x-table.th label="Category" label_ar="اسم الفئة" />
                <x-table.th label="Best Practice" label_ar="أفضل الممارسات" />
                <x-table.th label="Reference" label_ar="مرجع" />
                <x-table.th label="Remarks/Comments" label_ar="ملاحظات" />
            </x-table.thead>
            <x-table.tbody>
                @forelse ($kpiStandardsReport->recommededPriorites as $standard)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>
                            {{ $standard->kpi_id }}
                        </x-table.td>
                        <x-table.td>
                            {{ $standard->kpi_name }}
                        </x-table.td>
                        <x-table.td>
                            {!! html_entity_decode($standard?->kpi_value) !!}
                        </x-table.td>
                        <x-table.td>
                            {{ $standard->category->category_name }}
                        </x-table.td>
                        <x-table.td>
                            {{ $standard->bestPractice->best_practices_name }}
                        </x-table.td>
                        <x-table.td>
                            {{ $standard->reference }}
                        </x-table.td>
                        <x-table.td>
                            {!! html_entity_decode($standard?->remarks) !!}
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>


    </div>
@endsection
