@extends('layouts.app')
@section('title', 'Sub-Category Definition')
@section('title_ar', 'تعريف الفئة الفرعية')
@section('content') 
    <div>

        <x-table.action-wrapper>
            <x-action.button label="Add Organization" label_ar="إضافة جهة" route_name="sub-categories.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Sub-Category ID" label_ar="رمز الفئة الفرعية" />
                <x-table.th label="Sub-Category Name" label_ar="اسم الفئة الفرعية" />
                <x-table.th label="Category Name" label_ar="اسم الفئة" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($subCategories as $subCategory)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $subCategory->sub_category_id }}</x-table.td>
                        <x-table.td>{{ $subCategory->sub_category_name }}</x-table.td>
                        <x-table.td>{{ $subCategory->category_id }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="sub-categories.show" param="{{ $subCategory->id }}" />
                            <x-action.edit route_name="sub-categories.edit" param="{{ $subCategory->id }}" />
                            <x-action.delete route_name="sub-categories.destroy" param="{{ $subCategory->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
