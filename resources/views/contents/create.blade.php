@extends('layouts/user')
@section('title', 'Content')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $content?->id ? 'Update' : 'New' }} Article">
            <x-action.button label="View" route_name="contents.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($content) ? route('contents.update', $content->id) : route('contents.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($content))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Article Title" name="title" required="true" placeholder="Enter Article Title"
                            :value="$content?->title" />
                    </div>
                    <div>
                        <x-form.select label="Pillar" name="category" required="true" placeholder="Select Pillar"
                            :value="$content?->category" :custom_data="[
                                'Pillar 1: ICT Risk Management',
                                'Pillar 2: ICT-Related Incident Management',
                                'Pillar 3: Digital Operational Resilience Testing',
                                'Pillar 4: ICT Third-Party Risk Management',
                                'Pillar 5: Information Sharing Arrangements',
                            ]" id_key="id" value_key="role_name" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Sort Order" type="number" name="sort_order" required="true"
                            placeholder="Enter Sort Order" :value="$content?->sort_order" />
                    </div>
                    <div>
                        <x-form.upload-field label="Image" name="image" accept="image/*" />
                        @if ($content?->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $content->image) }}" alt="Current process image"
                                    class="h-24 w-auto rounded-lg border border-gray-200 object-cover">
                                <p class="mt-1 text-xs text-gray-500">Current image — upload a new one to replace it.</p>
                            </div>
                        @endif
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Content Description" name="description"
                        placeholder="Enter Content Description" :value="$content?->description" />
                </x-form.grid-col-full>

                <div class="flex justify-end">
                    <x-form.submit label="Content" :isUpdate="$content?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
