@extends('layouts.risk')
@section('title', 'Risk Types')
@section('title_ar', 'النوع للمخاطر')
@section('parent_url', route('risk-types.index'))
@if(isset($riskType))
    @section('parent_title', 'Risk Types')
    @section('breadcrumb_title', $riskType->risk_type_name)
@endif

@section('content')
    <div>
        <x-table.action-wrapper title="{{ $riskType?->id ? 'Update' : 'New' }} Risk Type">
            <x-action.button label="View" label_ar="منظر" route_name="risk-types.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($riskType) ? route('risk-types.update', $riskType->id) : route('risk-types.store') }}"
            method="POST">
            @csrf
            @if (isset($riskType))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Risk Type ID" label_ar="رمز النوع للمخاطر" name="risk_type_id" required="true"
                            :readonly="$riskType?->risk_type_id" placeholder="Enter Risk Type ID" :value="$riskType?->risk_type_id" />
                    </div>
                    <div>
                        <x-form.field label="Risk Type Name" label_ar="اسم النوع للمخاطر" name="risk_type_name"
                            required="true" placeholder="Enter Risk Type Name" :value="$riskType?->risk_type_name" />
                    </div>
                </x-form.grid-col>


                <x-form.textarea-field label="Risk Type Description" label_ar="وصف النوع للمخاطر"
                    name="risk_type_description" placeholder="Enter Risk Type Description" :value="$riskType?->risk_type_description" />


                <div class="flex justify-end">
                    <x-form.submit label="Risk Type" label_ar="النوع للمخاطر" :isUpdate="$riskType?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
