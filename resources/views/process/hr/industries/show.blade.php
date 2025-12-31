@extends('layouts.user')
@section('title', 'Industries')
@section('title_ar', 'الصناعات')

@section('content')
    <div>
        <x-table.action-wrapper title="Industry Details">
            <x-action.button label="View" label_ar="منظر" route_name="industries.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="industries.edit" :route_param="$industry->id" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
                <x-info-row>
                    <x-info-col label="Industry ID" label_ar="رمز الصناعة">
                        {{ $industry->industry_id }}
                    </x-info-col>
    
                    <x-info-col label="Industry Name" label_ar="اسم الصناعة">
                        {{ $industry->industry_name }}
                    </x-info-col>
                </x-info-row>


                <x-info-col-lg label="Sector" label_ar="القطاع">
                    {{ $industry->sector && $industry->sector !== 'null' ? $industry->sector : '' }}
                </x-info-col-lg>

        </div>
    </div>
@endsection