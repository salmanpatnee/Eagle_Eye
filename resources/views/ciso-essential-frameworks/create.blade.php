@extends('layouts/user')
@section('title', 'CISO Essential Framework')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $cisoEssentialFramework?->id ? 'Update' : 'New' }} Framework">
            <x-action.button label="View" route_name="ciso-essential-frameworks.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($cisoEssentialFramework) ? route('ciso-essential-frameworks.update', $cisoEssentialFramework->id) : route('ciso-essential-frameworks.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($cisoEssentialFramework))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Framework Title" name="title" required="true" placeholder="Enter Framework Title"
                            :value="$cisoEssentialFramework?->title" />
                    </div>
                    <div>
                        <x-form.upload-field label="Image" name="image" accept="image/*" />
                        @if ($cisoEssentialFramework?->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $cisoEssentialFramework->image) }}" alt="Current framework image"
                                    class="h-24 w-auto rounded-lg border border-gray-200 object-cover">
                                <p class="mt-1 text-xs text-gray-500">Current image — upload a new one to replace it.</p>
                            </div>
                        @endif
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Framework Description" name="description"
                        placeholder="Enter Framework Description" :value="$cisoEssentialFramework?->description" />
                </x-form.grid-col-full>

                <div class="flex justify-end">
                    <x-form.submit label="Framework" :isUpdate="$cisoEssentialFramework?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
