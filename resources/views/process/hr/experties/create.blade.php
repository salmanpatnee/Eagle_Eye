@extends('layouts.hr')
@section('title', 'Expertises')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $expertise?->id ? 'Update' : 'New' }} Expertise">
            <x-action.button label="View" route_name="expertises.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($expertise) ? route('expertises.update', $expertise->id) : route('expertises.store') }}" method="POST">
            @csrf
            @if (isset($expertise))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Expertise ID" name="expertise_id" required="true" :readonly="$expertise?->expertise_id"
                            placeholder="Enter Expertise ID" :value="$expertise?->expertise_id" />
                    </div>
                    <div>
                        <x-form.field label="Expertise Title" name="expertise_title" required="true"
                            placeholder="Enter Expertise Title" :value="$expertise?->expertise_title" />
                    </div>
                </x-form.grid-col>


                <div class="flex justify-end">
                    <x-form.submit label="Expertise" :isUpdate="$expertise?->expertise_id" />
                </div>
            </div>
        </form>

    </div>
@endsection