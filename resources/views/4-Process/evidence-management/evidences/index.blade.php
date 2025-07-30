@extends('layouts.evidence')
@section('title', 'Evidence Management')
@section('title_ar', 'إدارة الأدلة')

@section('content')
    <div>

        <x-table.action-wrapper>
            <x-action.button label="Add Evidence" label_ar="إضافة الأدلة" route_name="evidences.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Evidence ID" label_ar="رمز الأدلة" />
                <x-table.th label="Evidence Name" label_ar="الاسم الأدلة" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($evidences as $evidence)
                    <tr>
                        <x-table.td> <x-table.serial :loop="$loop" :paginator="$evidences" /></x-table.td>
                        <x-table.td>{{ $evidence->evidence_id }}</x-table.td>
                        <x-table.td>{{ $evidence->evidence_name }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="evidences.show" param="{{ $evidence->id }}" />
                            <x-action.edit route_name="evidences.edit" param="{{ $evidence->id }}" />
                            <x-action.delete route_name="evidences.destroy" param="{{ $evidence->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        <x-pagination>
            {{ $evidences->links() }}
        </x-pagination>

    </div>
@endsection
