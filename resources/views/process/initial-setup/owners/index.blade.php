@extends('process/initial-setup/layout/app')
@section('title', 'Owner Registration')
@section('title_ar', 'تسجيل صاحب')
@section('content')
    <div>
        <x-table.action-wrapper>
            <x-action.button label="Add Owner" label_ar="إضافة صاحب" route_name="owners.create" />
            <x-action.button label="Upload Owners" label_ar="تحميل صاحب" route_name="upload.owner.create" />
        </x-table.action-wrapper>

        <x-table.scroll-table height-offset="180" min-width="1100px">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Owner ID" label_ar="رمز صاحب" />
                <x-table.th label="Owner Name" label_ar="اسم صاحب" />
                <x-table.th label="Owner Role" label_ar="دور الصاحب" />
                <x-table.th label="Department Name" label_ar="اسم قسم" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-slot:head>
            <x-slot:body>
                @foreach ($owners as $owner)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$owners" /></x-table.td>
                        <x-table.td>{{ $owner->owner_id }}</x-table.td>
                        <x-table.td min-width="200px" max-width="400px">{{ $owner->owner_name }}</x-table.td>
                        <x-table.td>{{ $owner->owner_role_id }}</x-table.td>
                        <x-table.td>{{ $owner->department_id }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="owners.show" param="{{ $owner->id }}" />
                            <x-action.edit route_name="owners.edit" param="{{ $owner->id }}" />
                            <x-action.delete route_name="owners.destroy" param="{{ $owner->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $owners->links() }}
        </x-pagination>

    </div>
@endsection
