@extends('layouts.process')
@push('css')
    <style>
        #process_banner {
            min-height: 350px;
        }
    </style>
@endpush
@section('title', $sectionWithTemplates->title)
@section('content')
    @php
        $section_id = html_entity_decode($sectionWithTemplates->section_id);
    @endphp
    <div class="gap-6 grid grid-cols-1 px-4">
        <div class="hover:shadow-lg mx-auto rounded-lg shadow text-white transition">
            <x-iso-content-card title="{{ $sectionWithTemplates->title }}">
                {{ $sectionWithTemplates->description }}
            </x-iso-content-card>
        </div>
    </div>


@endsection

@section('additional_content')
    <div class="bg-white my-6 p-5 rounded-2xl">

        <div class="process-content">
            @include('ciso/iso27001/resources/resource-table', [
                'resources' => $sectionWithTemplates->resources,
            ])

        </div>
    </div>
@endsection
