@extends('process/initial-setup/layout/app')
@section('title', 'Sub-Category Definition')
@section('title_ar', 'تعريف الفئة الفرعية ')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $subCategory?->id ? 'Update' : 'New' }} Sub-Category">
            <x-action.button label="View" label_ar="منظر" route_name="sub-categories.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($subCategory) ? route('sub-categories.update', $subCategory->id) : route('sub-categories.store') }}"
            method="POST">
            @csrf
            @if (isset($subCategory))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Sub-Category ID" label_ar="رمز الفئة الفرعية" name="sub_category_id"
                            required="true" :readonly="$subCategory?->sub_category_id" placeholder="Enter Sub-Category ID" :value="$subCategory?->sub_category_id" />
                    </div>
                    <div>
                        <x-form.field label="Sub-Category Name" label_ar="اسم الفئة الفرعية" name="sub_category_name"
                            required="true" placeholder="Enter Sub-Category Name" :value="$subCategory?->sub_category_name" />
                    </div>
                </x-form.grid-col>


                <x-form.grid-col-full>
                    <x-form.textarea-field label="Sub-Category Description" label_ar="وصف الفئة الفرعية"
                        name="sub_category_description" placeholder="Enter Sub-Category Description" :value="$subCategory?->sub_category_description" />
                </x-form.grid-col-full>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Category" label_ar="اسم الفئة" name="category_id" required="true"
                            placeholder="Enter Category" :value="$subCategory?->category_id" :data="$categories" id_key="category_id"
                            value_key="category_name" />
                    </div>

                    <div></div>
                </x-form.grid-col>

                <div class="flex justify-end">
                    <x-form.submit label="Sub-Category" label_ar="الفئة الفرعية" :isUpdate="$subCategory?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
