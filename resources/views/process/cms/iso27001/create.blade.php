@extends('layouts/user')
@section('title', 'Section')
@section('title_ar', 'العملية')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $iso27001?->id ? 'Update' : 'New' }} Section">
            <x-action.button label="View" label_ar="منظر" route_name="iso27001.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($iso27001) ? route('iso27001.update', $iso27001->id) : route('iso27001.store') }}" method="POST">
            @csrf
            @if (isset($iso27001))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Section ID" label_ar="رمز العملية" name="section_id" required="true"
                            :readonly="$iso27001?->section_id" placeholder="Enter Section ID" :value="$iso27001?->section_id" />
                    </div>
                    <div>
                        <x-form.field label="Section Name" label_ar="اسم العملية" name="title" required="true"
                            placeholder="Enter Section Name" :value="$iso27001?->title" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Section Name Arabic" label_ar="اسم العملية عربي" name="title_ar"
                            placeholder="Enter Section Name Arabic" :value="$iso27001?->title_ar" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Section Description" label_ar="وصف العملية" name="description"
                        placeholder="Enter Section Description" :value="$iso27001?->description" />
                </x-form.grid-col-full>



                <div class="flex justify-end">
                    <x-form.submit label="Process" label_ar="العملية" :isUpdate="$iso27001?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
