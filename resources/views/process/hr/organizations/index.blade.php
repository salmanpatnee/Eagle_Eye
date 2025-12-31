@extends('layouts.user')
@section('title', 'Organizations')
@section('title_ar', 'المنظمات')

@section('content')
    <div>
        <x-table.action-wrapper>
            <x-action.button label="Add Organization" label_ar="إضافة منظمة" route_name="organizations.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Organization ID" label_ar="رمز المنظمة" />
                <x-table.th label="Organization Name" label_ar="اسم المنظمة" />
                <x-table.th label="Contact Number" label_ar="رقم الاتصال" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($organizations as $organization)
                    <tr>
                        <x-table.td> <x-table.serial :loop="$loop" :paginator="$organizations" /></x-table.td>
                        <x-table.td>{{ $organization->organization_id }}</x-table.td>
                        <x-table.td>{{ $organization->organization_name }}</x-table.td>
                        <x-table.td>{{ $organization->contact_number }}</x-table.td>

                        <x-table.td action_col="true">
                            <x-action.view route_name="organizations.show" param="{{ $organization->id }}" />
                            <x-action.edit route_name="organizations.edit" param="{{ $organization->id }}" />
                            <x-action.delete route_name="organizations.destroy" param="{{ $organization->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        <x-pagination>
            {{ $organizations->links() }}
        </x-pagination>

    </div>
@endsection