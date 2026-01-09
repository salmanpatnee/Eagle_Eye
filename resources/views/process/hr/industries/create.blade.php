@extends('layouts.hr')
@section('title', 'Industries')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $industry?->industry_id ? 'Update' : 'New' }} Industry">
            <x-action.button label="View" route_name="industries.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($industry) ? route('industries.update', $industry->id) : route('industries.store') }}" method="POST">
            @csrf
            @if (isset($industry))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Industry ID" name="industry_id" required="true" :readonly="$industry?->industry_id"
                            placeholder="Enter Industry ID" :value="$industry?->industry_id" />
                    </div>
                    <div>
                        <x-form.field label="Industry Name" name="industry_name" required="true"
                            placeholder="Enter Industry Name" :value="$industry?->industry_name" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Sector" name="sector"
                            placeholder="Enter Sector" :value="$industry && $industry->sector && $industry->sector !== 'null' ? $industry->sector : ''" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>

                <div class="flex justify-end">
                    <x-form.submit label="Industry" :isUpdate="$industry?->industry_id" />
                </div>
            </div>
        </form>

    </div>
@endsection