@extends('layouts.control')
@section('title', 'KPI Standards')
@section('title_ar', 'معيار مؤشرات الأداء الرئيسية')

@section('content')
    <div>

        <x-table.action-wrapper title="All KPI Standards">
            <x-action.button label="Add KPI Standard" label_ar="إضافة معيار مؤشرات الأداء الرئيسية"
                route_name="kpi-standards.create" />
        </x-table.action-wrapper>


        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="KPI Standard ID" label_ar="رمز معيار مؤشرات الأداء الرئيسية" />
                <x-table.th label="KPI Standard Name" label_ar="اسم معيار مؤشرات الأداء الرئيسية" />
                <x-table.th label="Category" label_ar="الفئة" />
                <x-table.th label="Best Practice" label_ar="أفضل الممارسات" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($kpis as $kpi)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$kpis" />
                        </x-table.td>
                        <x-table.td>
                            {{ $kpi->kpi_id }}
                        </x-table.td>
                        <x-table.td>{{ $kpi->kpi_name }}</x-table.td>
                        <x-table.td>{{ $kpi?->category?->category_name }}</x-table.td>
                        <x-table.td>{{ $kpi?->bestPractice?->best_practice_name }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="kpi-standards.show" param="{{ $kpi->kpi_id }}" />
                            <x-action.edit route_name="kpi-standards.edit" param="{{ $kpi->kpi_id }}" />
                            <x-action.delete route_name="kpi-standards.destroy" param="{{ $kpi->kpi_id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
        <x-pagination>
            {{ $kpis->links() }}
        </x-pagination>
    </div>
@endsection
