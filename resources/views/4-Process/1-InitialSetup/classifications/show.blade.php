@extends('4-Process.1-InitialSetup.layout.app')
@section('title', 'Classification Definition')
@section('title_ar', 'تعريف التصنيف')
@section('content') 
    <div> 
        <x-table.action-wrapper title="Classification Definition">
            <x-action.button label="View" label_ar="منظر" route_name="classifications.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="classifications.edit"
                route_param="{{ $classification->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Classification ID" label_ar="رمز التصنيف">
                    {{ $classification->classification_id }}
                </x-info-col>

                <x-info-col label="Classification Name" label_ar="اسم التصنيف">
                    {{ $classification->classification_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Classification Description" label_ar="وصف التصنيف">
                {{ $classification->classification_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Classification Source" label_ar="مصدر التصنيف">
                    {{ $classification->classification_source ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>
    </div>
@endsection
