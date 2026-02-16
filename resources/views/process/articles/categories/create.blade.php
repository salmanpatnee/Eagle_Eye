@extends('layouts.content')
@section('title', 'Article Categories')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $articleCategory?->id ? 'Update' : 'New' }} Category">
            <x-action.button label="View" route_name="article-categories.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($articleCategory) ? route('article-categories.update', $articleCategory->id) : route('article-categories.store') }}" method="POST">
            @csrf
            @if (isset($articleCategory))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col-full>
                    <div>
                        <x-form.field label="Name" name="name" required="true"
                            placeholder="Enter Category Name" :value="$articleCategory?->name" />
                    </div>
                </x-form.grid-col-full>
                <x-form.textarea-field label="Description" name="description"
                    placeholder="Enter Category Description" :value="$articleCategory?->description ?? old('description')" />
                <x-form.textarea-field label="Article List" name="article_list"
                    placeholder="Enter Article List" :value="$articleCategory?->article_list ?? old('article_list')" />

                <div class="flex justify-end">
                    <x-form.submit label="Category" :isUpdate="$articleCategory?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
