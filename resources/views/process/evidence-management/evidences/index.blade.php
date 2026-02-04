@extends('layouts.user')
@section('title', 'Evidence Management')
@section('title_ar', 'إدارة الأدلة')

@section('content')
    <div>

        <x-table.action-wrapper title="Evidence List">
            <x-action.button label="Add Evidence" route_name="evidences.create" />
        </x-table.action-wrapper>

        <x-table.table-sticky>
            <x-table.thead-sticky>
                <x-table.th label="S.No" />
                <x-table.th label="Evidence ID" />
                <x-table.th label="Evidence Name" />
                <x-table.th label="Action" />
            </x-table.thead-sticky>
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
        </x-table.table-sticky>

        <x-pagination>
            {{ $evidences->links() }}
        </x-pagination>

    </div>
@endsection
