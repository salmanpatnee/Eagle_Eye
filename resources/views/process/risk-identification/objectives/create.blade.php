@extends('layouts.risk')
@section('title', 'Objectives')
@section('title_ar', 'أهداف')

@section('content')
    <div>
        <x-table.action-wrapper title="{{ $objective?->id ? 'Update' : 'New' }} Objective">
            <x-action.button label="View" label_ar="منظر" route_name="objectives.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($objective) ? route('objectives.update', $objective->id) : route('objectives.store') }}"
            method="POST">
            @csrf
            @if (isset($objective))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Objective ID" label_ar="رمز أهداف" name="objective_id" required="true"
                            :readonly="$objective?->objective_id" placeholder="Enter Objective ID" :value="$objective?->objective_id" />
                    </div>

                </x-form.grid-col>


                <x-form.textarea-field label="Objective" label_ar=" أهداف" name="objective" placeholder="Enter Objective "
                    :value="$objective?->objective" required="true" />


                <div class="flex justify-end">
                    <x-form.submit label="Objective" label_ar="أهداف" :isUpdate="$objective?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
