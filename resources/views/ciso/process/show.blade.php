
@extends('layouts.process')
@section('title', $process->title)
@section('content')
    @php
        $process_id = html_entity_decode($process->process_id);
    @endphp

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-header :title="$process->title">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-white">
                    <path fill-rule="evenodd" d="M4.5 9.75a6 6 0 0 1 11.573-2.226 3.75 3.75 0 0 1 4.133 4.303A4.5 4.5 0 0 1 18 20.25h-2.515a2.25 2.25 0 0 1-2.228-2.024 4.5 4.5 0 0 0-3.503-4.21 4.5 4.5 0 0 0-4.637 0 2.25 2.25 0 0 1-2.228 2.024H4.5a4.5 4.5 0 0 1 0-9.5ZM9 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm3-4.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                </svg>
            </x-slot:icon>
        </x-section-header>

        <x-two-column-layout>
            <x-slot:main>
                <x-iso-content-card title="{{ $process->title }}">
                    {{ $process->description }}
                </x-iso-content-card>
            </x-slot:main>

            <x-slot:sidebar>
                <x-resource-sidebar>
                    <x-iso-templates link="{{ route('process.resource.template', $process_id) }}" />
                    <x-iso-checklist link="{{ route('process.resource.checklist', $process_id) }}" />
                    <x-iso-video link="{{ route('process.resource.videos', $process_id) }}" />
                    <x-iso-glossary link="{{ route('process.resource.glossary', $process_id) }}" />
                </x-resource-sidebar>
            </x-slot:sidebar>
        </x-two-column-layout>
    </div>
@endsection

@section('additional_content')
    <div class="bg-white my-6 p-5 rounded-2xl">
        <header class="text-center bg-brand-950 font-bold  mb-3 p-3 rounded-md text-white">
            <h1>{{ $process->title }}</h1>
        </header>
        <div class="process-content">
            @php
                use Illuminate\Support\Facades\View;
            @endphp
            @if (View::exists("process/process/content/{$process->process_id}"))
                @include("process/process/content/{$process->process_id}")
            @endif
        </div>
    </div>
@endsection
