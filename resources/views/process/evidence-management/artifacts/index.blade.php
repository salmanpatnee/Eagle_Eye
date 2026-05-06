@extends('layouts.artifact')
@section('title', 'Artifact Management')
@section('title_ar', 'إدارة المقتنيات')

@section('content')
    <div>

        <x-table.action-wrapper>
            <x-action.button label="Add Artifact" label_ar="إضافة المرفقات" route_name="artifacts.create" />
        </x-table.action-wrapper>

        <x-table.scroll-table height-offset="180">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Artifact ID" label_ar="رمز المرفقات" />
                <x-table.th label="Artifact Name" label_ar="الاسم المرفقات" />
                <x-table.th label="Number of Attachments" label_ar="عدد المرفقات" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-slot:head>
            <x-slot:body>
                @foreach ($artifacts as $artifact)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$artifacts" /></x-table.td>
                        <x-table.td>{{ $artifact->artifact_id }}</x-table.td>
                        <x-table.td min-width="250px">{{ $artifact->artifact_name }}</x-table.td>
                        <x-table.td>{{ $artifact->attachments_count }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="artifacts.show" param="{{ $artifact->id }}" />
                            <x-action.edit route_name="artifacts.edit" param="{{ $artifact->id }}" />
                            <x-action.delete route_name="artifacts.destroy" param="{{ $artifact->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $artifacts->links() }}
        </x-pagination>

    </div>
@endsection
