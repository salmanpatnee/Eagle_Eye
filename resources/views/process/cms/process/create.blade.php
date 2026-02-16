@extends('layouts.content')
@section('title', 'Process')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $cm?->id ? 'Update' : 'New' }} Process">
            <x-action.button label="View" route_name="cms.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($cm) ? route('cms.update', $cm->id) : route('cms.store') }}" method="POST">
            @csrf
            @if (isset($cm))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Process ID" name="process_id" required="true"
                            :readonly="$cm?->process_id" placeholder="Enter Process ID" :value="$cm?->process_id" />
                    </div>
                    <div>
                        <x-form.field label="Process Name" name="title" required="true"
                            placeholder="Enter Process Name" :value="$cm?->title" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <div>
                        <x-form.select label="Article Category" name="article_category_id"
                            placeholder="Select Article Category" :value="$cm?->articleCategories?->first()?->id" :data="$articleCategories" id_key="id"
                            value_key="name" :hide_keys="true"/>
                    </div>
                </x-form.grid-col-full>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Process Description" name="description"
                        placeholder="Enter Process Description" :value="$cm?->description" />
                </x-form.grid-col-full>

                
                <div class="flex justify-end">
                    <x-form.submit label="Process" :isUpdate="$cm?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
