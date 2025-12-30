@extends('layouts.user')
@section('title', 'Nationalities')
@section('title_ar', 'الجنسيات')

@section('content')
    <div>
        <x-table.action-wrapper title="Nationality Details">
            <x-action.button label="View" label_ar="منظر" route_name="nationalities.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="nationalities.edit" :route_param="$nationality->id" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
          
                <x-info-col-lg label="Name" label_ar="الاسم">
                    {{ $nationality->name }}
                </x-info-col-lg>
            
        </div>
    </div>
@endsection