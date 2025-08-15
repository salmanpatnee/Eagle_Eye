@extends('process/initial-setup/layout/app')
@section('title', 'Custodian Roles')
@section('title_ar', 'دور الوصي')
@section('content')
    <div>
        <x-table.action-wrapper title="Custodian Role Details">
            <x-action.button label="View" label_ar="منظر" route_name="custodian-roles.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="custodian-roles.edit"
                route_param="{{ $custodianRole->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Custodian Role ID" label_ar="رمز دور الصاحب">
                    {{ $custodianRole->custodian_role_id }}
                </x-info-col>

                <x-info-col label="Custodian Role Name" label_ar="اسم دور الصاحب">
                    {{ $custodianRole->custodian_role_title }}
                </x-info-col>
            </x-info-row>


            <x-info-col-lg label="Custodian Role Description" label_ar="وصف دور الصاحب">
                {{ $custodianRole->custodian_role_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="System/Application/Other" label_ar="المتعلقة بالنظام/التطبيق/أخرى">
                    {{ $custodianRole->system_application_other }}
                </x-info-col>

                @if ($custodianRole->system_application_other === 'Other')
                    <x-info-col label="Define Other" label_ar="تعريف أخرى">
                        {{ $custodianRole->other }}
                    </x-info-col>
                @endif
            </x-info-row>



        </div>
    </div>
@endsection
