@extends('layouts.process')
@push('css')
    <style>
        #process_banner {
            min-height: 350px;
        }
    </style>
@endpush
@section('title', $contentWithGlossary->category . ' Resource: Glossary')
@section('content')
  
    <div class="gap-6 grid grid-cols-1 px-4">
        <div class="hover:shadow-lg mx-auto rounded-lg shadow text-white transition">
            <x-iso-content-card title="{{ $contentWithGlossary->title }}">
                {{ $contentWithGlossary->description }}
            </x-iso-content-card>
        </div>
    </div>


@endsection

@section('additional_content')
    <div class="bg-white my-6 p-5 rounded-2xl">

        <div class="process-content">
            @include('resource.resource-table', [
                'resources' => $contentWithGlossary->resources,
            ])

        </div>
    </div>
@endsection
