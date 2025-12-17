@extends('layouts.ciso')
@push('css')
    <style>
        #process_banner {
            min-height: 350px;
        }
    </style>
@endpush
@section('title', $resource->title)


@section('content')
    <div class="gap-6 grid grid-cols-1 px-4">
        <div class="bg-brand-950 hover:shadow-lg max-w-[700px] mx-auto p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="{{ $resource->title }}">
                {{ $resource->description }}
            </x-iso-content-card>
        </div>
    </div>
@endsection

@section('additional_content')
    @php
        $path = storage_path('app/public/' . $resource->file_path);
    @endphp
    <div class="bg-white my-6 p-5 rounded-2xl">

        <div class="process-content">
            <embed src="{{ asset('storage/' . $resource->file_path) }}" width="100%" height="500" type="application/pdf"
                title="{{ $resource->file_name }}" style="margin-bottom: 1em">

        </div>
    </div>
@endsection
