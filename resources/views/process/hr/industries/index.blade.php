@extends('layouts.hr')
@section('title', 'Industries')
@section('title_ar', 'الصناعات')

@section('content')
    <div>
        <x-table.action-wrapper title="All Industries">
            <x-action.button label="Add Industry" label_ar="إضافة صناعة" route_name="industries.create" />
        </x-table.action-wrapper>

        <x-table.table-sticky>
            <x-table.thead-sticky>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Industry Name" label_ar="اسم الصناعة" />
                <x-table.th label="Sector" label_ar="القطاع" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead-sticky>
            <x-table.tbody>
                @foreach ($industries as $industry)
                    <tr>
                        <x-table.td> <x-table.serial :loop="$loop" :paginator="$industries" /></x-table.td>
                        <x-table.td>{{ $industry->industry_name }}</x-table.td>
                        <x-table.td>{{ $industry->sector && $industry->sector !== 'null' ? $industry->sector : '' }}</x-table.td>

                        <x-table.td action_col="true">
                            <x-action.view route_name="industries.show" param="{{ $industry->id }}" />
                            <x-action.edit route_name="industries.edit" param="{{ $industry->id }}" />
                            <x-action.delete route_name="industries.destroy" param="{{ $industry->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table-sticky>

        <x-pagination>
            {{ $industries->links() }}
        </x-pagination>

    </div>
@endsection