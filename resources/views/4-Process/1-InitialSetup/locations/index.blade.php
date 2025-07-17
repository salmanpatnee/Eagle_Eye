@extends('layouts.app')
@section('title', 'Location Setup')
@section('title_ar', 'إعداد الموقع')
@section('content')
    <div>
        <x-table.action-wrapper>
            <x-action.button label="Add Location" label_ar="إضافة موقع" route_name="locations.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Location ID" label_ar="رمز الموقع" />
                <x-table.th label="Location Name" label_ar="اسم الموقع" />
                <x-table.th label="Location City" label_ar="البلد الموقع" />
                <x-table.th label="Location Address" label_ar="منطقة الموقع" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>

            <x-table.tbody>
                @foreach ($locations as $location)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $location->location_id }}</x-table.td>
                        <x-table.td>{{ $location->location_name }}</x-table.td>
                        <x-table.td>{{ $location->location_city }}</x-table.td>
                        <x-table.td>{{ $location->location_address }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="locations.show" param="{{ $location->id }}" />
                            <x-action.edit route_name="locations.edit" param="{{ $location->id }}" />
                            <x-action.delete route_name="locations.destroy" param="{{ $location->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
