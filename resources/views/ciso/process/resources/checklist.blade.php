@extends('layouts.process')
@push('css')
    <style>
        #process_banner {
            min-height: 350px;
        }
    </style>
@endpush
@section('title', $processWithChecklist->title)
@section('content')
    @php
        $process_id = html_entity_decode($processWithChecklist->process_id);
    @endphp
    <div class="gap-6 grid grid-cols-1 px-4">
        <div class="hover:shadow-lg mx-auto p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="{{ $processWithChecklist->title }}">
                {{ $processWithChecklist->description }}
            </x-iso-content-card>
        </div>
    </div>


@endsection

@section('additional_content')
    <div class="bg-white my-6 p-5 rounded-2xl">
        {{-- <header class="text-center bg-brand-950 font-bold inline mb-3 p-3 rounded-md text-white">
            <h1>Checklist for CISO of {{ $processWithChecklist->title }}</h1>
        </header> --}}
        <div class="process-content">
            @include('ciso/process/resources/resource-table', [
                'resources' => $processWithChecklist->resources,
            ])

        </div>
    </div>
@endsection
