@extends('process/initial-setup/layout/app')
@section('title', 'Owner Role Details')
@section('title_ar', 'دور الصاحب')
@section('content')
    <div>
        <x-table.action-wrapper title="Owner Role Details">
            <x-action.button label="View" label_ar="منظر" route_name="owner-roles.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="owner-roles.edit" route_param="{{ $ownerRole->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Owner Role ID" label_ar="رمز دور الصاحب">
                    {{ $ownerRole->owner_role_id }}
                </x-info-col>

                <x-info-col label="Owner Role Name" label_ar="اسم دور الصاحب">
                    {{ $ownerRole->owner_role_name }}
                </x-info-col>
            </x-info-row>


            <x-info-col-lg label="Owner Role Description" label_ar="وصف دور الصاحب">
                {{ $ownerRole->owner_role_description ?? '—' }}
            </x-info-col-lg>



        </div>
    </div>
@endsection
