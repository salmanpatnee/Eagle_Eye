@extends('4-Process.1-InitialSetup.layout.app')
@section('title', 'Custodian Registration')
@section('title_ar', 'تسجيل الوصي')
@section('content')
    <div>
        <x-table.action-wrapper>

            <x-action.button label="Add Custodian" label_ar="إضافة الوصي" route_name="custodians.create" />
            <x-action.button label="Upload Custodians" label_ar="رفع الوصي" route_name="upload.custodians.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Custodian ID" label_ar="رمز الوصي" />
                <x-table.th label="Custodian Name" label_ar="اسم الوصي" />
                <x-table.th label="Custodian Role" label_ar="دور الوصي" />
                <x-table.th label="Custodian Email" label_ar="البريد الإلكتروني الوصي" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>

            <x-table.tbody>
                @foreach ($custodians as $custodian)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $custodian->custodian_name_id }}</x-table.td>
                        <x-table.td>{{ $custodian->custodian_name_name }}</x-table.td>
                        <x-table.td>{{ $custodian->custodian_role_id }}</x-table.td>
                        <x-table.td>{{ $custodian->custodian_name_email_address }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="custodians.show" param="{{ $custodian->id }}" />
                            <x-action.edit route_name="custodians.edit" param="{{ $custodian->id }}" />
                            <x-action.delete route_name="custodians.destroy" param="{{ $custodian->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        {{-- <x-pagination>
            {{ $departments->links() }}
    </x-pagination> --}}


    </div>
@endsection
