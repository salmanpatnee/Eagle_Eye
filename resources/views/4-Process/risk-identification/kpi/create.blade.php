@extends('layouts.risk')
@section('title', 'Key Performance Indicators')
@section('title_ar', 'مؤشرات الأداء الرئيسية')

@section('content')
    <div>
        <x-table.action-wrapper title="{{ $kpi?->id ? 'Update' : 'New' }} Key Performance Indicator">
            <x-action.button label="View" label_ar="منظر" route_name="kpis.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($kpi) ? route('kpis.update', $kpi->id) : route('kpis.store') }}" method="POST">
            @csrf
            @if (isset($kpi))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="KPI ID" label_ar="رمز مؤشرات الأداء الرئيسية" name="key_performance_indicatory_id"
                            required="true" :readonly="$kpi?->key_performance_indicatory_id" placeholder="Enter KPI ID" :value="$kpi?->key_performance_indicatory_id" />
                    </div>
                    <div>
                        <x-form.field label="KPI Name" label_ar="اسم مؤشرات الأداء الرئيسية"
                            name="key_performance_indicatory_name" required="true" placeholder="Enter KPI Name"
                            :value="$kpi?->key_performance_indicatory_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="KPI Source" label_ar="مصدر مؤشرات الأداء الرئيسية" required="true"
                            name="key_performance_indicatory_source" placeholder="Enter KPI Source" :value="$kpi?->key_performance_indicatory_source" />
                    </div>
                    <div>
                        <x-form.field type="number" label="KPI Value" label_ar="قيمة مؤشرات الأداء الرئيسية"
                            name="key_performance_indicatory_value" required="true" placeholder="Enter KPI Value"
                            :value="$kpi?->key_performance_indicatory_value" />
                    </div>
                </x-form.grid-col>


                <x-form.textarea-field label="KPI Description" label_ar="وصف مؤشرات الأداء الرئيسية"
                    name="key_performance_indicatory_description" placeholder="Enter KPI Description" :value="$kpi?->key_performance_indicatory_description" />


                <div class="flex justify-end">
                    <x-form.submit label="Key Performance Indicator" label_ar="مؤشرات الأداء الرئيسية" :isUpdate="$kpi?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
