@extends('process/initial-setup/layout/app')
@section('title', 'Best Practices Definition')
@section('title_ar', 'تعريف أفضل الممارسات')
@section('content')
    <div>

        <x-table.action-wrapper title="All Best Practices">
            <x-action.button label="Add Best Practice" label_ar="إضافة أفضل ممارسة" route_name="best-practices.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Best Practice ID" label_ar="رمز أفضل ممارسة" />
                <x-table.th label="Best Practice Name" label_ar="اسم أفضل ممارسة" />
                <x-table.th label="Release Year" label_ar="سنة الإصدار" />
                <x-table.th label="Version" label_ar="نسخة أفضل ممارسة" />
                <x-table.th label="Best Practice Country" label_ar="بلد أفضل الممارسات" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($bestPractices as $bestPractice)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$bestPractices" /></x-table.td>
                        <x-table.td>{{ $bestPractice->best_practice_id }}</x-table.td>
                        <x-table.td>{{ $bestPractice->best_practice_name }}</x-table.td>
                        <x-table.td>{{ $bestPractice->best_practices_release_year }}</x-table.td>
                        <x-table.td>{{ $bestPractice->best_practices_version }}</x-table.td>
                        <x-table.td>{{ $bestPractice->best_practices_country }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="best-practices.show"
                                param="{{ $bestPractice->best_practice_id }}" />
                            <x-action.edit route_name="best-practices.edit"
                                param="{{ $bestPractice->best_practice_id }}" />
                            <x-action.delete route_name="best-practices.destroy"
                                param="{{ $bestPractice->best_practice_id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>

        <x-pagination>
            {{ $bestPractices->links() }}
        </x-pagination>
    </div>
@endsection
