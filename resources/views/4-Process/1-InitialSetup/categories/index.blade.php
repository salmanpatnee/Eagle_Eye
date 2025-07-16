@extends('layouts.app')
@section('title', 'Category Definition')
@section('title_ar', 'تعريف الفئة')
@section('content')
    <div>

        <x-table.action-wrapper>
            <x-action.button label="Add Organization" label_ar="إضافة جهة" route_name="categories.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Category ID" label_ar="رمز الفئة" />
                <x-table.th label="Category Name" label_ar="اسم الفئة" />
                <x-table.th label="Category Source" label_ar="مصدر الفئة" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($categories as $category)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $category->category_id }}</x-table.td>
                        <x-table.td>{{ $category->category_name }}</x-table.td>
                        <x-table.td>{{ $category->Category_source }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="categories.show" param="{{ $category->category_id }}" />
                            <x-action.edit route_name="categories.edit" param="{{ $category->category_id }}" />
                            <x-action.delete route_name="categories.destroy" param="{{ $category->category_id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
