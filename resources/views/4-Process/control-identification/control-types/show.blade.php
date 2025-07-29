@extends('layouts.control')
@section('title', 'Control Type')
@section('title_ar', 'نوع الضوابط')

@section('content')
    <div>
        <x-table.action-wrapper title="Control Type Details">
            <x-action.button label="View" label_ar="منظر" route_name="control-types.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="control-types.edit"
                route_param="{{ $controlType->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Control Type ID" label_ar="رمز نوع الضوابط">
                    {{ $controlType->control_type_id }}
                </x-info-col>
                <x-info-col label="Control Type Name" label_ar="اسم نوع الضوابط">
                    {{ $controlType->control_type_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Control Type Description" label_ar="وصف نوع الضوابط">
                {{ $controlType->control_type_description ?? '—' }}
            </x-info-col-lg>

        </div>
    </div>
@endsection
