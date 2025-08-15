@extends('process/initial-setup/layout/app')
@section('title', 'Owner Role Details')
@section('title_ar', 'دور الصاحب')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $ownerRole?->id ? 'Update' : 'New' }} Owner">
            <x-action.button label="View" label_ar="منظر" route_name="owner-roles.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($ownerRole) ? route('owner-roles.update', $ownerRole->id) : route('owner-roles.store') }}"
            method="POST">
            @csrf
            @if (isset($ownerRole))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Owner Role ID" label_ar="رمز دور الصاحب" name="owner_role_id" required="true"
                            :readonly="$ownerRole?->owner_role_id" placeholder="Enter Owner Role ID" :value="$ownerRole?->owner_role_id" />
                    </div>
                    <div>
                        <x-form.field label="Owner Role Name" label_ar="اسم دور الصاحب" name="owner_role_name"
                            required="true" placeholder="Enter Owner Role Name" :value="$ownerRole?->owner_role_name" />
                    </div>
                </x-form.grid-col>



                <x-form.grid-col-full>
                    <x-form.textarea-field label="Owner Role Description" label_ar="وصف دور الصاحب"
                        name="owner_role_description" placeholder="Enter Owner Role Description" :value="$ownerRole?->owner_role_description" />
                </x-form.grid-col-full>

                <div class="flex justify-end">
                    <x-form.submit label="Owner Role" label_ar="دور الصاحب" :isUpdate="$ownerRole?->owner_role_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
