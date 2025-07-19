@extends('4-Process.1-InitialSetup.layout.app')
@section('title', 'Category Definition')
@section('title_ar', 'تعريف الفئة ')
@section('content')
    <div>
        <x-table.action-wrapper title="New Category">
            <x-action.button label="View" label_ar="منظر" route_name="categories.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
            method="POST">
            @csrf
            @if (isset($category))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $category->id }}">
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Category ID" label_ar="رمز الفئة" name="category_id" required="true"
                            :readonly="$category?->category_id" placeholder="Enter Category ID" :value="$category?->category_id" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Category Name" label_ar="اسم الفئة" name="category_name" required="true"
                            placeholder="Enter Category Name" :value="$category?->category_name" />
                    </div>
                    <div>
                        <x-form.field label="Category Name Arabic" label_ar="اسم الفئة العربية" name="category_name_ar" required="true"
                            placeholder="Enter Category Name Arabic" :value="$category?->category_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Category Description" label_ar="وصف الفئة" name="category_description"
                        placeholder="Enter Category Description" :value="$category?->category_description" />
                </x-form.grid-col-full>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Category Source" label_ar="مصدر الفئة" name="Category_source" required="true"
                            :readonly="$category?->Category_source" placeholder="Enter Category Source" :value="$category?->Category_source" />
                    </div>
                </x-form.grid-col>


                <div class="flex justify-end">
                    <x-form.submit label="Category" label_ar="الفئة" :isUpdate="$category?->category_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
