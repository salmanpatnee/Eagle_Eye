@extends('layouts.risk')
@section('title', 'Objectives')
@section('title_ar', 'أهداف')

@section('content')
    <div>

        <x-table.action-wrapper title="All Objectives">
            <x-action.button label="Add Objective" label_ar="إضافة أهداف" route_name="objectives.create" />
        </x-table.action-wrapper>


        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Objective ID" label_ar="رمز أهداف" />
                <x-table.th label="Objective" label_ar=" أهداف" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($objectives as $objective)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$objectives" />
                        </x-table.td>
                        <x-table.td>
                            {{ $objective->objective_id }}
                        </x-table.td>
                        <x-table.td>{{ $objective->objective }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="objectives.show" param="{{ $objective->id }}" />
                            <x-action.edit route_name="objectives.edit" param="{{ $objective->id }}" />
                            <x-action.delete route_name="objectives.destroy" param="{{ $objective->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
        <x-pagination>
            {{ $objectives->links() }}
        </x-pagination>
    </div>
@endsection
