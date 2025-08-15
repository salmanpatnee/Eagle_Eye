@extends('process/initial-setup/layout/app')
@section('title', 'Domain Setup')
@section('title_ar', 'إعداد المكون')
@section('content')
    <div>

        <x-table.action-wrapper title="All Domains">
            <x-action.button label="Add Domain" label_ar="إضافة المكون" route_name="domains.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Domain ID" label_ar="رمز المكون" />
                <x-table.th label="Domain Name" label_ar="اسم المكون" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($domains as $domain)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$domains" /></x-table.td>
                        <x-table.td>{{ $domain->main_domain_id }}</x-table.td>
                        <x-table.td>{{ $domain->main_domain_name }}</x-table.td>

                        <x-table.td action_col="true">
                            <x-action.view route_name="domains.show" param="{{ $domain->id }}" />
                            <x-action.edit route_name="domains.edit" param="{{ $domain->id }}" />
                            <x-action.delete route_name="domains.destroy" param="{{ $domain->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        <x-pagination>
            {{ $domains->links() }}
        </x-pagination>

    </div>
@endsection
