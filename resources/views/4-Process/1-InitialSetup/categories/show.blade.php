@extends('4-Process.1-InitialSetup.layout.app')
@section('title', 'Category Definition')
@section('title_ar', 'تعريف الفئة')
@section('content')
    <div>
        <x-table.action-wrapper title="Category Definition">
            <x-action.button label="View" label_ar="منظر" route_name="categories.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="categories.edit"
                route_param="{{ $category->category_id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Category ID" label_ar="رمز الفئة">
                    {{ $category->category_id }}
                </x-info-col>
            </x-info-row>
            <x-info-row>
                <x-info-col label="Category Name" label_ar="اسم الفئة">
                    {{ $category->category_name }}
                </x-info-col>
                <x-info-col label="Category Name Arabic" label_ar="اسم الفئة العربية">
                    {{ $category->category_name_ar }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Category Description" label_ar="وصف الفئة">
                {{ $category->category_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Category Source" label_ar="مصدر الفئة">
                    {{ $category->Category_source ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>
    </div>
@endsection
