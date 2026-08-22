@extends('layouts/user')
@section('title', 'NIS2 Content')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $nis2Content?->id ? 'Update' : 'New' }} Article">
            <x-action.button label="View" route_name="nis2-contents.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($nis2Content) ? route('nis2-contents.update', $nis2Content->id) : route('nis2-contents.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($nis2Content))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Article Title" name="title" required="true" placeholder="Enter Article Title"
                            :value="$nis2Content?->title" />
                    </div>
                    <div>
                        <x-form.field label="Sort Order" type="number" name="sort_order" required="true"
                            placeholder="Enter Sort Order" :value="$nis2Content?->sort_order" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.upload-field label="Image" name="image" accept="image/*" />
                        @if ($nis2Content?->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $nis2Content->image) }}" alt="Current NIS2 content image"
                                    class="h-24 w-auto rounded-lg border border-gray-200 object-cover">
                                <p class="mt-1 text-xs text-gray-500">Current image — upload a new one to replace it.</p>
                            </div>
                        @endif
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Content Description" name="description"
                        placeholder="Enter Content Description" :value="$nis2Content?->description" />
                </x-form.grid-col-full>

                <div class="flex justify-end">
                    <x-form.submit label="Content" :isUpdate="$nis2Content?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
