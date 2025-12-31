@extends('layouts.user')
@section('title', 'Certifications')
@section('title_ar', 'الشهادات')

@section('content')
    <div>
        <x-table.action-wrapper title="Certification Details">
            <x-action.button label="View" label_ar="منظر" route_name="certifications.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="certifications.edit" :route_param="$certification->id" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
                <x-info-row>
                    <x-info-col label="Certification ID" label_ar="رمز الشهادة">
                        {{ $certification->certification_id }}
                    </x-info-col>

                    <x-info-col label="Certification Title" label_ar="عنوان الشهادة">
                        {{ $certification->certification_title }}
                    </x-info-col>
                </x-info-row>

                <x-info-col-lg label="Institute" label_ar="المعهد">
                    {{ $certification->institute }}
                </x-info-col-lg>

        </div>
    </div>
@endsection