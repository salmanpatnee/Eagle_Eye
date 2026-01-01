@extends('layouts.user')
@section('title', 'Designations')
@section('title_ar', 'المناصب')

@section('content')
    <div>
        <x-table.action-wrapper title="Designation Details">
            <x-action.button label="View" label_ar="منظر" route_name="designations.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="designations.edit" :route_param="$designation->id" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="ID" label_ar="رمز ">
                    {{ $designation->designation_id }}
                </x-info-col>

                <x-info-col label="Designation ID" label_ar="رمز  المنصب">
                    
                    {{ $designation->designation_name }}
                </x-info-col>
            </x-info-row>

           
        </div>
    </div>
@endsection