@extends('4-Process.1-InitialSetup.layout.app')
@section('title', 'Classification Definition')
@section('title_ar', 'تعريف التصنيف ')
@section('content')
    <div>
        <x-table.action-wrapper title="New Department">
            <x-action.button label="View" label_ar="منظر" route_name="classifications.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($classification) ? route('classifications.update', $classification->id) : route('classifications.store') }}"
            method="POST">
            @csrf
            @if (isset($classification))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $classification->id }}">
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Classification ID" label_ar="رمز التصنيف" name="classification_id" required="true"
                            :readonly="$classification?->classification_id" placeholder="Enter Classification ID" :value="$classification?->classification_id" />
                    </div>
                    <div>
                        <x-form.field label="Classification Name" label_ar="اسم التصنيف" name="classification_name" required="true"
                            placeholder="Enter Classification Name" :value="$classification?->classification_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Classification Description" label_ar="وصف التصنيف" name="classification_description"
                        placeholder="Enter Classification Description" :value="$classification?->classification_description" />
                </x-form.grid-col-full>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Classification Source" label_ar="مصدر التصنيف" name="classification_source" required="true"
                            :readonly="$classification?->classification_id" placeholder="Enter Classification Source" :value="$classification?->classification_source" />
                    </div>
                </x-form.grid-col>


                <div class="flex justify-end">
                    <x-form.submit label="Classification" label_ar="التصنيف" :isUpdate="$classification?->classification_id" />
                </div>
            </div>
        </form>

    </div>
@endsection
