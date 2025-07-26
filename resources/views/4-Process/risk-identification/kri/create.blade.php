@extends('layouts.risk')
@section('title', 'Key Risk Indicators')
@section('title_ar', 'مؤشرات المخاطر الرئيسية')

@section('content')
    <div>
        <x-table.action-wrapper title="{{ $kri?->id ? 'Update' : 'New' }} Key Risk Indicator">
            <x-action.button label="View" label_ar="منظر" route_name="kris.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($kri) ? route('kris.update', $kri->id) : route('kris.store') }}" method="POST">
            @csrf
            @if (isset($kri))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="KRI ID" label_ar="رمز مؤشرات المخاطر الرئيسية" name="key_risk_indicator_id"
                            required="true" :readonly="$kri?->key_risk_indicator_id" placeholder="Enter KRI ID" :value="$kri?->key_risk_indicator_id" />
                    </div>
                    <div>
                        <x-form.field label="KRI Name" label_ar="اسم مؤشرات المخاطر الرئيسية" name="key_risk_indicator_name"
                            required="true" placeholder="Enter KRI Name" :value="$kri?->key_risk_indicator_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="KRI Source" label_ar="مصدر مؤشرات المخاطر الرئيسية" required="true"
                            name="key_risk_indicator_source" placeholder="Enter KRI Source" :value="$kri?->key_risk_indicator_source" />
                    </div>
                    <div>
                        <x-form.field type="number" label="KRI Value" label_ar="قيمة مؤشرات المخاطر الرئيسية"
                            name="key_risk_indicator_value" required="true" placeholder="Enter KRI Value"
                            :value="$kri?->key_risk_indicator_value" />
                    </div>
                </x-form.grid-col>


                <x-form.textarea-field label="KRI Description" label_ar="وصف مؤشرات المخاطر الرئيسية"
                    name="key_risk_indicator_description" placeholder="Enter KRI Description" :value="$kri?->key_risk_indicator_description" />


                <div class="flex justify-end">
                    <x-form.submit label="Key Risk Indicator" label_ar="مؤشرات المخاطر الرئيسية" :isUpdate="$kri?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
