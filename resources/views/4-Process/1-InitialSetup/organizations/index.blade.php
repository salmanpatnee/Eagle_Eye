@extends('layouts.app')
@section('title', 'Organization Setup')
@section('title_ar', 'إعداد الجهة')
@section('content')
    <div>
        <x-table.action-wrapper>
            <x-action.button label="Add" label_ar="يضيف" route_name="organizations.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Organization ID" label_ar="رمز للجهة" />
                <x-table.th label="Organization Name" label_ar="الاسم للجهة" />
                <x-table.th label="Contact Number" label_ar="رقم الاتصال" />
                <x-table.th label="Email Address" label_ar="عنوان البريد الإلكتروني" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($organizations as $organization)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $organization->organization_id }}</x-table.td>
                        <x-table.td>{{ $organization->organization_name_english }}</x-table.td>
                        <x-table.td>{{ $organization->initiative_owner_contact_number }}</x-table.td>
                        <x-table.td>{{ $organization->initiative_owner_email }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="organizations.show" param="{{ $organization->id }}" />
                            <x-action.edit route_name="organizations.edit" param="{{ $organization->id }}" />
                            <x-action.delete route_name="organizations.destroy" param="{{ $organization->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
