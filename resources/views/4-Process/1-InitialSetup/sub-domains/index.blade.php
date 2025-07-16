@extends('layouts.app')
@section('title', 'Sub-Domains Setup')
@section('title_ar', 'إعداد المكون الفرعي')
@section('content')
    <div>

        <x-table.action-wrapper>
            <x-action.button label="Add Sub-Domains" label_ar="إضافة المكون الفرعي" route_name="sub-domains.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Sub-Domain ID" label_ar="رمز المكون الفرعي" />
                <x-table.th label="Sub-Domain Name" label_ar="اسم المكون الفرعي" />
                <x-table.th label="Main Domain Name" label_ar="اسم المكون الأساسي" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($subDomains as $subDomain)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $subDomain->sub_domain_id }}</x-table.td>
                        <x-table.td>{{ $subDomain->sub_domain_name }}</x-table.td>
                        <x-table.td>{{ $subDomain->sub_domain_name }}</x-table.td>

                        <x-table.td action_col="true">
                            <x-action.view route_name="sub-domains.show" param="{{ $subDomain->id }}" />
                            <x-action.edit route_name="sub-domains.edit" param="{{ $subDomain->id }}" />
                            <x-action.delete route_name="sub-domains.destroy" param="{{ $subDomain->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
