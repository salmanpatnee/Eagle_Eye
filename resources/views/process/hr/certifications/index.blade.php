@extends('layouts.hr')
@section('title', 'Certifications')

@section('content')
    <div>
        <x-table.action-wrapper title="All Certifications">
            <x-action.button label="Add Certification" route_name="certifications.create" />
        </x-table.action-wrapper>

      <x-table.table-sticky>
            <x-table.thead-sticky>
                <x-table.th label="S.No" />
                <x-table.th label="Certification ID" />
                <x-table.th label="Certification Title" />
                <x-table.th label="Institute" />
                <x-table.th label="Action" />
            </x-table.thead-sticky>
            <x-table.tbody>
                @foreach ($certifications as $certification)
                    <tr>
                        <x-table.td> <x-table.serial :loop="$loop" :paginator="$certifications" /></x-table.td>
                        <x-table.td>{{ $certification->certification_id }}</x-table.td>
                        <x-table.td>{{ $certification->certification_title }}</x-table.td>
                        <x-table.td>{{ $certification->institute }}</x-table.td>

                        <x-table.td action_col="true">
                            <x-action.view route_name="certifications.show" param="{{ $certification->id }}" />
                            <x-action.edit route_name="certifications.edit" param="{{ $certification->id }}" />
                            <x-action.delete route_name="certifications.destroy" param="{{ $certification->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
       </x-table.table-sticky>

        <x-pagination>
            {{ $certifications->links() }}
        </x-pagination>

    </div>
@endsection