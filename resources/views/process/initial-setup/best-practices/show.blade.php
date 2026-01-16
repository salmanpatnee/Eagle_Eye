@extends('process/initial-setup/layout/app')
@section('title', 'Best Practices Definition')
@section('title_ar', 'تعريف أفضل الممارسات')
@section('content')
    <div>
        <x-table.action-wrapper title="Best Practices Details">
            <x-action.button label="View" label_ar="منظر" route_name="best-practices.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="best-practices.edit"
                route_param="{{ $bestPractice->best_practice_id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Best Practice ID" label_ar="رمز أفضل الممارسات">
                    {{ $bestPractice->best_practice_id }}
                </x-info-col>
                <x-info-col label="Best Practice Name" label_ar="اسم أفضل الممارسات">
                    {{ $bestPractice->best_practice_name ?? '—' }}
                </x-info-col>
            </x-info-row>



            <x-info-col-lg label="Best Practice Source" label_ar="مصدر أفضل الممارسات">
                {{ $bestPractice->best_practices_source ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Best Practice Version" label_ar="إصدار نسخة من أفضل الممارسات">
                    {{ $bestPractice->best_practices_version }}
                </x-info-col>
                <x-info-col label="Best Practice Country" label_ar="بلد أفضل الممارسات">
                    {{ $bestPractice->best_practices_country ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Best Practice Regulation" label_ar="تنظيم أفضل الممارسات">
                    {{ $bestPractice->best_practices_regulation }}
                </x-info-col>
                <x-info-col label="Exclusively Related to ISO?" label_ar="تتعلق حصرا؟ ISO">
                    {{ $bestPractice->best_practice_iso ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Best Practice Year" label_ar="سنة أفضل الممارسات">
                    {{ $bestPractice->best_practices_release_year }}
                </x-info-col>
                <x-info-col label="Regulatory" label_ar="تنظيمية">
                    {{ $bestPractice->regulatory ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Remarks" label_ar="ملاحظات">
                {{ $bestPractice->remarks ?? '—' }}
            </x-info-col-lg>

        </div>
    </div>
@endsection
