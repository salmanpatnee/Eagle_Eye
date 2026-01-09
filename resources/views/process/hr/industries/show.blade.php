@extends('layouts.hr')
@section('title', 'Industries')

@section('content')
    <div>
        <x-table.action-wrapper title="Industry Details">
            <x-action.button label="View" route_name="industries.index" />
            <x-action.button label="Edit" route_name="industries.edit" :route_param="$industry->id" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
                <x-info-row>
                    <x-info-col label="Industry ID">
                        {{ $industry->industry_id }}
                    </x-info-col>

                    <x-info-col label="Industry Name">
                        {{ $industry->industry_name }}
                    </x-info-col>
                </x-info-row>


                <x-info-col-lg label="Sector">
                    {{ $industry->sector && $industry->sector !== 'null' ? $industry->sector : '' }}
                </x-info-col-lg>

        </div>
    </div>
@endsection