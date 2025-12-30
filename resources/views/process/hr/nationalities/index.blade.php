@extends('layouts.user')
@section('title', 'Nationalities')
@section('title_ar', 'الجنسيات')

@section('content')
    <div>
        <x-table.action-wrapper>
            <x-action.button label="Add Nationality" label_ar="إضافة جنسية" route_name="nationalities.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Name" label_ar="الاسم" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($nationalities as $nationality)
                    <tr>
                        <x-table.td> <x-table.serial :loop="$loop" :paginator="$nationalities" /></x-table.td>
                        <x-table.td>{{ $nationality->name }}</x-table.td>

                        <x-table.td action_col="true">
                            <x-action.view route_name="nationalities.show" param="{{ $nationality->id }}" />
                            <x-action.edit route_name="nationalities.edit" param="{{ $nationality->id }}" />
                            <x-action.delete route_name="nationalities.destroy" param="{{ $nationality->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        <x-pagination>
            {{ $nationalities->links() }}
        </x-pagination>

    </div>
@endsection