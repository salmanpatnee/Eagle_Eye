@extends('process/initial-setup/layout/app')
@section('title', 'Sub-Category Definition')
@section('title_ar', 'تعريف الفئة الفرعية الفرعية')
@section('content')
    <div>
        <x-table.action-wrapper title="Sub-Category Details">
            <x-action.button label="View" label_ar="منظر" route_name="sub-categories.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="sub-categories.edit"
                route_param="{{ $subCategory->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Sub-Category ID" label_ar="رمز الفئة الفرعية">
                    {{ $subCategory->sub_category_id }}
                </x-info-col>
                <x-info-col label="Sub-Category Name" label_ar="اسم الفئة الفرعية">
                    {{ $subCategory->sub_category_name }}
                </x-info-col>
            </x-info-row>


            <x-info-col-lg label="Sub-Category Description" label_ar="وصف الفئة الفرعية">
                {{ $subCategory->sub_category_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Category" label_ar=" الفئة ">
                    {{ $subCategory->category->category_name }}
                </x-info-col>

            </x-info-row>

        </div>
    </div>
@endsection
