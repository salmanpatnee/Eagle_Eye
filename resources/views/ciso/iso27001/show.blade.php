@extends('layouts.process')
@section('title', $section->title)
@section('content')
    @php
        $section_id = html_entity_decode($section->section_id);
    @endphp

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-header :title="$section->title">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-white">
                    <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z" clip-rule="evenodd" />
                </svg>
            </x-slot:icon>
        </x-section-header>

        <x-two-column-layout>
            <x-slot:main>
                <x-iso-content-card title="{{ $section->title }}">
                    {{ $section->description }}
                </x-iso-content-card>
            </x-slot:main>

            <x-slot:sidebar>
                <x-resource-sidebar>
                    <x-iso-templates link="{{ route('iso27001.resource.template', $section_id) }}" />
                    <x-iso-checklist link="{{ route('iso27001.resource.checklist', $section_id) }}" />
                    <x-iso-video link="{{ route('iso27001.resource.videos', $section_id) }}" />
                    <x-iso-glossary link="{{ route('iso27001.resource.glossary', $section_id) }}" />
                </x-resource-sidebar>
            </x-slot:sidebar>
        </x-two-column-layout>
    </div>
@endsection

@section('additional_content')
    {{-- <div class="bg-white my-6 p-5 rounded-2xl">
        <header class="text-center bg-brand-950 font-bold inline mb-3 p-3 rounded-md text-white">
            <h1>{{ $section->title }}</h1>
        </header>
        <div class="process-content">
            @php
                use Illuminate\Support\Facades\View;
            @endphp
            @if (View::exists("process/process/content/{$section->section_id}"))
                @include("process/process/content/{$section->section_id}")
            @endif
        </div>
    </div> --}}
@endsection
