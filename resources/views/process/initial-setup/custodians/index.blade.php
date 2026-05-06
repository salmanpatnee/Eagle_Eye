@extends('process/initial-setup/layout/app')
@section('title', 'Custodian Registration')
@section('title_ar', 'تسجيل الوصي')
@section('content')
    <div>
        <x-table.action-wrapper title="All Custodians">
            <x-action.button label="Add Custodian" label_ar="إضافة الوصي" route_name="custodians.create" />
            <x-action.button label="Upload Custodians" label_ar="رفع الوصي" route_name="upload.custodians.create" />
        </x-table.action-wrapper>

        <x-table.scroll-table height-offset="180" min-width="1100px">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Custodian ID" label_ar="رمز الوصي" />
                <x-table.th label="Custodian Name" label_ar="اسم الوصي" />
                <x-table.th label="Custodian Role" label_ar="دور الوصي" />
                <x-table.th label="Custodian Email" label_ar="البريد الإلكتروني الوصي" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-slot:head>
            <x-slot:body>
                @foreach ($custodians as $custodian)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$custodians" /></x-table.td>
                        <x-table.td>{{ $custodian->custodian_name_id }}</x-table.td>
                        <x-table.td min-width="200px" max-width="400px">{{ $custodian->custodian_name_name }}</x-table.td>
                        <x-table.td>{{ $custodian->custodian_role_id }}</x-table.td>
                        <x-table.td>{{ $custodian->custodian_name_email_address }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="custodians.show" param="{{ $custodian->id }}" />
                            <x-action.edit route_name="custodians.edit" param="{{ $custodian->id }}" />
                            <x-action.delete route_name="custodians.destroy" param="{{ $custodian->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $custodians->links() }}
        </x-pagination>

    </div>
@endsection
