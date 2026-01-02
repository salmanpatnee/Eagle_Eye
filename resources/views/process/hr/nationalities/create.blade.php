@extends('layouts.hr')
@section('title', 'Nationalities')
@section('title_ar', 'الجنسيات')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $nationality?->id ? 'Update' : 'New' }} Nationality">
            <x-action.button label="View" label_ar="منظر" route_name="nationalities.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($nationality) ? route('nationalities.update', $nationality->id) : route('nationalities.store') }}" method="POST">
            @csrf
            @if (isset($nationality))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col-full>
                    <div>
                        <x-form.field label="Name" label_ar="الاسم" name="name" required="true"
                            placeholder="Enter Nationality Name" :value="$nationality?->name" />
                    </div>
                </x-form.grid-col-full>

                <div class="flex justify-end">
                    <x-form.submit label="Nationality" label_ar="الجنسية" :isUpdate="$nationality?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection