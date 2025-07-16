@extends('layouts.app')
@section('title', 'Best Practices Definition')
@section('title_ar', 'تعريف أفضل الممارسات')
@section('content')
    <div>

        <x-table.action-wrapper>
            <x-action.button label="Add Best Practice" label_ar="إضافة أفضل ممارسة" route_name="categories.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Best Practice ID" label_ar="رمز أفضل ممارسة" />
                <x-table.th label="Best Practice Name" label_ar="اسم أفضل ممارسة" />
                <x-table.th label="Release Year" label_ar="سنة الإصدار" />
                <x-table.th label="Best Practice Version" label_ar="نسخة أفضل ممارسة" />
                <x-table.th label="Regulatory" label_ar="تنظيمية" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($bestPractices as $bestPractice)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $bestPractice->best_practices_id }}</x-table.td>
                        <x-table.td>{{ $bestPractice->best_practices_name }}</x-table.td>
                        <x-table.td>{{ $bestPractice->best_practices_release_year }}</x-table.td>
                        <x-table.td>{{ $bestPractice->best_practices_version }}</x-table.td>
                        <x-table.td>{{ $bestPractice->regulatory }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="best-practices.show"
                                param="{{ $bestPractice->best_practices_id }}" />
                            <x-action.edit route_name="best-practices.edit"
                                param="{{ $bestPractice->best_practices_id }}" />
                            <x-action.delete route_name="best-practices.destroy"
                                param="{{ $bestPractice->best_practices_id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
