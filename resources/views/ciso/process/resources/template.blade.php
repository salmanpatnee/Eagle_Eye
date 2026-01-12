@extends('layouts.process')
@push('css')
    <style>
        #process_banner {
            min-height: 350px;
        }
    </style>
@endpush
@section('title', $processWithTemplates->title)
@section('content')
    @php
        $process_id = html_entity_decode($processWithTemplates->process_id);
    @endphp
    <div class="gap-6 grid grid-cols-1 px-4">
        <div class="hover:shadow-lg mx-auto p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="{{ $processWithTemplates->title }}">
                {{ $processWithTemplates->description }}
            </x-iso-content-card>
        </div>
    </div>


@endsection

@section('additional_content')
    <div class="bg-white my-6 p-5 rounded-2xl">

        <div class="process-content">
            @include('ciso/process/resources/resource-table', [
                'resources' => $processWithTemplates->resources,
            ])

        </div>
    </div>
@endsection
