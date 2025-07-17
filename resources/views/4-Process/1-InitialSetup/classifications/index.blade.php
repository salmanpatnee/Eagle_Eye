@extends('4-Process.1-InitialSetup.layout.app')
@section('title', 'Classification Definition')
@section('title_ar', 'تعريف التصنيف')
@section('content')
    <div>

        <x-table.action-wrapper>
            <x-action.button label="Add Organization" label_ar="إضافة جهة" route_name="classifications.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Classification IDs" label_ar="رمز القسم الفرعي" />
                <x-table.th label="Classification Names" label_ar="رمز القسم الفرعي" />
                <x-table.th label="Classification Source" label_ar="مصدر التصنيف" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($classifications as $classification)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $classification->classification_id }}</x-table.td>
                        <x-table.td>{{ $classification->classification_name }}</x-table.td>
                        <x-table.td>{{ $classification->classification_source }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="classifications.show" param="{{ $classification->id }}" />
                            <x-action.edit route_name="classifications.edit" param="{{ $classification->id }}" />
                            <x-action.delete route_name="classifications.destroy" param="{{ $classification->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
