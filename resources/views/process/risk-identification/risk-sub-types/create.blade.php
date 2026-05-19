@extends('layouts.risk')
@section('title', 'Risk Sub-Types')
@section('title_ar', 'النوع الفرعي للمخاطر')
@section('parent_url', route('risk-sub-types.index'))
@if(isset($riskSubType))
    @section('parent_title', 'Risk Sub-Types')
    @section('breadcrumb_title', $riskSubType->risk_sub_type_name)
@endif

@section('content')
    <div>
        <x-table.action-wrapper title="{{ $riskSubType?->id ? 'Update' : 'New' }} Risk Sub-Type">
            <x-action.button label="View" label_ar="منظر" route_name="risk-sub-types.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($riskSubType) ? route('risk-sub-types.update', $riskSubType->id) : route('risk-sub-types.store') }}"
            method="POST">
            @csrf
            @if (isset($riskSubType))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Risk Sub-Type ID" label_ar="رمز النوع الفرعي للمخاطر" name="risk_sub_type_id"
                            required="true" :readonly="$riskSubType?->risk_sub_type_id" placeholder="Enter Risk Sub-Type ID" :value="$riskSubType?->risk_sub_type_id" />
                    </div>
                    <div>
                        <x-form.field label="Risk Sub-Type Name" label_ar="اسم النوع الفرعي للمخاطر"
                            name="risk_sub_type_name" required="true" placeholder="Enter Risk Sub-Type Name"
                            :value="$riskSubType?->risk_sub_type_name" />
                    </div>
                </x-form.grid-col>


                <x-form.textarea-field label="Risk Sub-Type Description" label_ar="وصف النوع الفرعي للمخاطر"
                    name="risk_sub_type_description" placeholder="Enter Risk Sub-Type Description" :value="$riskSubType?->risk_sub_type_description" />
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Type" label_ar="اسم النوع للمخاطر" name="risk_type_id" required="true"
                            :value="$riskSubType?->risk_type_id" :data="$riskTypes" id_key="risk_type_id" value_key="risk_type_name" />
                    </div>
                    <div></div>
                </x-form.grid-col>

                <div class="flex justify-end">
                    <x-form.submit label="Risk Sub-Type" label_ar="النوع الفرعي للمخاطر" :isUpdate="$riskSubType?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
