@extends('layouts.hr')
@section('title', 'Nationalities')

@section('content')
    <div>
        <x-table.action-wrapper title="All Nationalities">
            <x-action.button label="Add Nationality" route_name="nationalities.create" />
        </x-table.action-wrapper>

        <x-table.table-sticky>
            <x-table.thead-sticky>
                <x-table.th label="S.No" />
                <x-table.th label="Name" />
                <x-table.th label="Action" />
            </x-table.thead-sticky>
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
        </x-table.table-sticky>

        <x-pagination>
            {{ $nationalities->links() }}
        </x-pagination>

    </div>
@endsection
