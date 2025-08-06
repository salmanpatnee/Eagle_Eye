@extends('layouts/kpi')
@section('title', 'KPI Categories')
@section('title_ar', 'مؤشرات الأداء الرئيسية')
@section('content')
    <div>

        <x-table.action-wrapper title="All KPI Categories">
            <x-action.button label="Add KPI Category" label_ar="إضافة مؤشرات الأداء الرئيسية"
                route_name="kpi-categories.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="KPI ID" label_ar="رمز مؤشرات الأداء الرئيسية" />
                <x-table.th label="KPI Name" label_ar="اسم مؤشرات الأداء الرئيسية" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($kpiCategories as $kpiCategory)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$kpiCategories" /></x-table.td>
                        <x-table.td>{{ $kpiCategory->kpi_id }}</x-table.td>
                        <x-table.td>{{ $kpiCategory->kpi_name }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="kpi-categories.show" param="{{ $kpiCategory->id }}" />
                            <x-action.edit route_name="kpi-categories.edit" param="{{ $kpiCategory->id }}" />
                            <x-action.delete route_name="kpi-categories.destroy" param="{{ $kpiCategory->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
        <x-pagination>
            {{ $kpiCategories->links() }}
        </x-pagination>
    </div>
@endsection
