@extends('layouts/kpi')
@section('title', 'KPI Categories')
@section('title_ar', 'مؤشرات الأداء الرئيسية')
@section('parent_url', route('kpi-categories.index'))
@if(isset($kpiCategory))
    @section('parent_title', 'KPI Categories')
    @section('breadcrumb_title', $kpiCategory->kpi_name)
@endif
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $kpiCategory?->id ? 'Update' : 'New' }} KPI Category">
            <x-action.button label="View" label_ar="منظر" route_name="kpi-categories.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($kpiCategory) ? route('kpi-categories.update', $kpiCategory->id) : route('kpi-categories.store') }}"
            method="POST">
            @csrf
            @if (isset($kpiCategory))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="KPI Category ID" label_ar="رمز مؤشرات الأداء الرئيسية" name="kpi_id"
                            required="true" :readonly="$kpiCategory?->kpi_id" placeholder="Enter KPI Category ID" :value="$kpiCategory?->kpi_id" />
                    </div>
                    <div>
                        <x-form.field label="KPI Category Name" label_ar="اسم مؤشرات الأداء الرئيسية" name="kpi_name"
                            placeholder="Enter KPI Category Name" :value="$kpiCategory?->kpi_name" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.field label="KPI Category Name Arabic" label_ar="اسم عربي مؤشر الأداء الرئيسية"
                            name="kpi_name_ar" required="true" placeholder="Enter KPI Category Name Arabic"
                            :value="$kpiCategory?->kpi_name_ar" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="KPI Recommendation" label_ar="توصية مؤشر الأداء الرئيسية"
                        name="conclusion" placeholder="Enter KPI Recommendation" :value="$kpiCategory?->conclusion" />
                </x-form.grid-col-full>



                <div class="flex justify-end">
                    <x-form.submit label="KPI Category" label_ar="مؤشرات الأداء الرئيسية" :isUpdate="$kpiCategory?->kpi_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
