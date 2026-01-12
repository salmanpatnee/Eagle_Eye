@extends('layouts.process')
@push('css')
    <style>
        #process_banner {
            min-height: 350px;
        }
    </style>
@endpush
@section('title', $sectionWithVideos->title)
@section('content')
    @php
        $section_id = html_entity_decode($sectionWithVideos->section_id);
    @endphp
    <div class="gap-6 grid grid-cols-1 px-4">
        <div class="hover:shadow-lg mx-auto rounded-lg shadow text-white transition">
            <x-iso-content-card title="{{ $sectionWithVideos->title }}">
                {{ $sectionWithVideos->description }}
            </x-iso-content-card>
        </div>
    </div>


@endsection

@php
    $videoCount = $sectionWithVideos->resources->count();
@endphp

@section('additional_content')
    <div class="bg-white my-6 p-5 rounded-2xl">
        <header class="text-center bg-brand-950 font-bold  mb-3 p-3 rounded-md text-white">
            <h1>Video Explanations of {{ $sectionWithVideos->title }}</h1>
        </header>

        <div class="process-content">
            @if ($videoCount === 1)
                <div class="grid grid-cols-1 gap-6">
                    @foreach ($sectionWithVideos->resources as $video)
                        <div>
                            <video class="w-full rounded-lg" controls controlsList="nodownload" preload="metadata">
                                <source src="{{ route('secure.video.stream', $video->id) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endforeach
                </div>
            @elseif ($videoCount > 1)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($sectionWithVideos->resources as $video)
                        <div>
                            <video class="w-full rounded-lg" controls controlsList="nodownload" preload="metadata">
                                <source src="{{ route('secure.video.stream', $video->id) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center">
                    <p>No videos found</p>
                </div>
            @endif

        </div>
    </div>
@endsection
