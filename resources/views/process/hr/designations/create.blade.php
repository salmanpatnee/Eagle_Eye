@extends('layouts.hr')
@section('title', 'Designations')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $designation?->id ? 'Update' : 'New' }} Designation">
            <x-action.button label="View" route_name="designations.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($designation) ? route('designations.update', $designation->id) : route('designations.store') }}" method="POST">
            @csrf
            @if (isset($designation))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Designation ID" name="designation_id" required="true" :readonly="$designation?->designation_id"
                            placeholder="Enter Designation ID" :value="$designation?->designation_id" />
                    </div>
                    <div>
                        <x-form.field label="Designation Name" name="designation_name" required="true"
                            placeholder="Enter Designation Name" :value="$designation?->designation_name" />
                    </div>
                </x-form.grid-col>

                <div class="flex justify-end">
                    <x-form.submit label="Designation" :isUpdate="$designation?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection