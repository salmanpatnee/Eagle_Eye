@extends('layouts.process')
@section('title', $process->title)
@section('content')
    @php
        $process_id = html_entity_decode($process->process_id);
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="{{ $process->title }}">
                {{ $process->description }}
            </x-iso-content-card>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
            <div class="flex flex-col gap-6">
                <x-iso-checklist link="{{ route('process.resource.checklist', $process_id) }}" />
                <x-iso-glossary link="{{ route('process.resource.glossary', $process_id) }}" />
            </div>
            <div class="flex flex-col gap-6">
                <x-iso-video link="{{ route('process.resource.videos', $process_id) }}" />
                <x-iso-templates link="{{ route('process.resource.template', $process_id) }}" />
            </div>
        </div>
    </div>


@endsection

@section('additional_content')
    <div class="bg-white my-6 p-5 rounded-2xl">
        <header class="text-center bg-brand-950 font-bold inline mb-3 p-3 rounded-md text-white">
            <h1>{{ $process->title }}</h1>
        </header>
        <div class="process-content">

            {{-- @include("process/process/content/{$process->process_id}") --}}
        </div>
    </div>
@endsection
