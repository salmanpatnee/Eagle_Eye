@extends('layouts.control')
@section('title', 'Control Type')
@section('title_ar', 'نوع الضوابط')

@section('content')

    <div>
        <x-table.action-wrapper title="{{ $controlType?->id ? 'Update' : 'New' }} Control Type">
            <x-action.button label="View" label_ar="منظر" route_name="control-types.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($controlType) ? route('control-types.update', $controlType->id) : route('control-types.store') }}"
            method="POST">
            @csrf
            @if (isset($controlType))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Control Type ID" label_ar="رمز نوع الضوابط" name="control_type_id" required="true"
                            :readonly="$controlType?->control_type_id" placeholder="Enter Control Type ID" :value="$controlType?->control_type_id" />
                    </div>
                    <div>
                        <x-form.field label="Control Type Name" label_ar="اسم نوع الضوابط" name="control_type_name"
                            required="true" placeholder="Enter Control Type Name" :value="$controlType?->control_type_name" />
                    </div>
                </x-form.grid-col>


                <x-form.textarea-field label="Control Type Description" label_ar="وصف نوع الضوابط"
                    name="control_type_description" placeholder="Enter Control Type Description" :value="$controlType?->control_type_description" />

                <div class="flex justify-end">
                    <x-form.submit label="Control Type" label_ar="نوع الضوابط" :isUpdate="$controlType?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
