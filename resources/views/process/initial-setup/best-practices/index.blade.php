@extends('process/initial-setup/layout/app')
@section('title', 'Best Practices Definition')
@section('title_ar', 'تعريف أفضل الممارسات')
@section('content')
    <div>

        <x-table.action-wrapper title="All Best Practices">
            <x-action.button label="Add Best Practice" label_ar="إضافة أفضل ممارسة" route_name="best-practices.create" />
        </x-table.action-wrapper>

        <x-table.scroll-table height-offset="180" min-width="1100px">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Best Practice ID" label_ar="رمز أفضل ممارسة" />
                <x-table.th label="Best Practice Name" label_ar="اسم أفضل ممارسة" freeze="true" freeze-last="true" />
                <x-table.th label="Release Year" label_ar="سنة الإصدار" />
                <x-table.th label="Version" label_ar="نسخة أفضل ممارسة" />
                <x-table.th label="Best Practice Country" label_ar="بلد أفضل الممارسات" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-slot:head>
            <x-slot:body>
                @foreach ($bestPractices as $bestPractice)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$bestPractices" /></x-table.td>
                        <x-table.td>{{ $bestPractice->best_practices_id }}</x-table.td>
                        <x-table.td min-width="200px" max-width="400px" freeze="true" freeze-last="true">{{ $bestPractice->best_practices_name }}</x-table.td>
                        <x-table.td>{{ $bestPractice->best_practices_release_year }}</x-table.td>
                        <x-table.td>{{ $bestPractice->best_practices_version }}</x-table.td>
                        <x-table.td>{{ $bestPractice->best_practices_country }}</x-table.td>
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
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $bestPractices->links() }}
        </x-pagination>
    </div>
@endsection
