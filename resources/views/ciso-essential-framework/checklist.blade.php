@extends('layouts.process')
@push('css')
    <style>
        #process_banner {
            min-height: 350px;
        }
    </style>
@endpush
@section('title', $frameworkWithChecklist->title . ' Resource: Checklist')
@section('content')
    <div class="gap-6 grid grid-cols-1 px-4">
        <div class="hover:shadow-lg mx-auto rounded-lg shadow text-white transition">
            <x-iso-content-card title="{{ $frameworkWithChecklist->title }}">
                {{ $frameworkWithChecklist->description }}
            </x-iso-content-card>
        </div>
    </div>
@endsection

@section('additional_content')
    <div class="bg-white my-6 p-5 rounded-2xl">
        <div class="process-content">
            @include('resource.resource-table', [
                'resources' => $frameworkWithChecklist->resources,
            ])
        </div>
    </div>
@endsection
