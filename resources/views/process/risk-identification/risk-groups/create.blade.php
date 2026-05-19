@extends('layouts.risk')
@section('title', 'Risk Groups')
@section('title_ar', 'مجموعة المخاطر')
@section('parent_url', route('risk-groups.index'))
@if(isset($riskGroup))
    @section('parent_title', 'Risk Groups')
    @section('breadcrumb_title', $riskGroup->risk_group_name)
@endif

@section('content')
    <div>
        <x-table.action-wrapper title="{{ $riskGroup?->id ? 'Update' : 'New' }} Risk Group">
            <x-action.button label="View" label_ar="منظر" route_name="risk-groups.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($riskGroup) ? route('risk-groups.update', $riskGroup->id) : route('risk-groups.store') }}"
            method="POST">
            @csrf
            @if (isset($riskGroup))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Risk Group ID" label_ar="رمز مجموعة المخاطر" name="risk_group_id" required="true"
                            :readonly="$riskGroup?->risk_group_id" placeholder="Enter Risk Group ID" :value="$riskGroup?->risk_group_id" />
                    </div>
                    <div>
                        <x-form.field label="Risk Group Name" label_ar="اسم مجموعة المخاطر" name="risk_group_name"
                            required="true" placeholder="Enter Risk Group Name" :value="$riskGroup?->risk_group_name" />
                    </div>
                </x-form.grid-col>


                <x-form.textarea-field label="Risk Group Description" label_ar="وصف مجموعة المخاطر"
                    name="risk_group_description" placeholder="Enter Risk Group Description" :value="$riskGroup?->risk_group_description" />
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Group Owner" label_ar="اسم صاحب مجموعة المخاطر" name="owner_id"
                            required="true" :value="$riskGroup?->owner_id" :data="$owners" id_key="owner_role_id"
                            value_key="owner_name" />
                    </div>
                    <div></div>
                </x-form.grid-col>

                <div class="flex justify-end">
                    <x-form.submit label="Risk Group" label_ar="مجموعة المخاطر" :isUpdate="$riskGroup?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
