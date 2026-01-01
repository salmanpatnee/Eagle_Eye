@extends('layouts.user')
@section('title', 'Expertises')
@section('title_ar', 'الخبرات')

@section('content')
    <div>
        <x-table.action-wrapper title="Expertise Details">
            <x-action.button label="View" label_ar="منظر" route_name="expertises.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="expertises.edit" :route_param="$expertise->id" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Expertise ID" label_ar="رمز  الخبرة">
                    {{ $expertise->expertise_id }}
                </x-info-col>

                <x-info-col label="Expertise Title" label_ar="عنوان الخبرة">
                    {{ $expertise->expertise_title }}
                </x-info-col>
            </x-info-row>
        </div>
    </div>
@endsection