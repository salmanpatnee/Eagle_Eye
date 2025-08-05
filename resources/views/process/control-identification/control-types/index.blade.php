@extends('layouts.control')
@section('title', 'Control Type')
@section('title_ar', 'نوع الضوابط')

@section('content')
    <div>

        <x-table.action-wrapper title="All Control Types">
            <x-action.button label="Add Control Type" label_ar="إضافة نوع الضوابط" route_name="control-types.create" />
        </x-table.action-wrapper>


        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Control Type ID" label_ar="رمز نوع الضوابط" />
                <x-table.th label="Control Type Score" label_ar="اسم نوع الضوابط" />
                <x-table.th label="Description" label_ar="وصف نوع الضوابط" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($controlTypes as $controlType)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$controlTypes" />
                        </x-table.td>
                        <x-table.td>
                            {{ $controlType->control_type_id }}
                        </x-table.td>
                        <x-table.td>{{ $controlType->control_type_name }}</x-table.td>
                        <x-table.td>{{ $controlType->control_type_description }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="control-types.show" param="{{ $controlType->id }}" />
                            <x-action.edit route_name="control-types.edit" param="{{ $controlType->id }}" />
                            <x-action.delete route_name="control-types.destroy" param="{{ $controlType->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
        <x-pagination>
            {{ $controlTypes->links() }}
        </x-pagination>
    </div>
@endsection
