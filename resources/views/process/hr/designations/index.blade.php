@extends('layouts.user')
@section('title', 'Designations')
@section('title_ar', 'المناصب')

@section('content')
    <x-table.action-wrapper>
        <x-action.button label="Add Designation" label_ar="إضافة منصب" route_name="designations.create" />
    </x-table.action-wrapper>

    <x-table.table>
        <x-table.thead>
            <x-table.th label="S.No" label_ar="رقم" />
            <x-table.th label="Designation ID" label_ar="رمز  المنصب" />
            <x-table.th label="Designation Name" label_ar="اسم المنصب" />
            <x-table.th label="Action" label_ar="إجراء" />
        </x-table.thead>
        <x-table.tbody>
            @foreach ($designations as $designation)
                <x-table.td>
                    {{ $designation->id }}
                </x-table.td>
                <x-table.td>
                    {{ $designation->designation_id }}
                </x-table.td>
                <x-table.td>
                    {{ $designation->designation_name }}
                </x-table.td>
              <x-table.td action_col="true">
                        <x-action.view route_name="designations.show" param="{{ $designation->id }}" />
                        <x-action.edit route_name="designations.edit" param="{{ $designation->id }}" />
                        <x-action.delete route_name="designations.destroy" param="{{ $designation->id }}" />
                    </x-table.td>
            @endforeach
        </x-table.tbody>
    </x-table.table>

    <x-pagination>
        {{ $designations->links() }}
    </x-pagination>
@endsection