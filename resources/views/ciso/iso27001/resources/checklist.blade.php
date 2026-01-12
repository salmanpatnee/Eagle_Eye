@extends('layouts.process')
@push('css')
    <style>
        #process_banner {
            min-height: 350px;
        }
    </style>
@endpush
@section('title', $sectionWithChecklist->title)
@section('content')
    @php
        $section_id = html_entity_decode($sectionWithChecklist->section_id);
    @endphp
    <div class="gap-6 grid grid-cols-1 px-4">
        <div class="hover:shadow-lg mx-auto rounded-lg shadow text-white transition">
            <x-iso-content-card title="{{ $sectionWithChecklist->title }}">
                {{ $sectionWithChecklist->description }}
            </x-iso-content-card>
        </div>
    </div>


@endsection

@section('additional_content')
    <div class="bg-white my-6 p-5 rounded-2xl">
        {{-- <header class="text-center bg-brand-950 font-bold inline mb-3 p-3 rounded-md text-white">
            <h1>Checklist for CISO of {{ $sectionWithChecklist->title }}</h1>
        </header> --}}
        <div class="process-content">
            @include('ciso/iso27001/resources/resource-table', [
                'resources' => $sectionWithChecklist->resources,
            ])

        </div>
    </div>
@endsection
