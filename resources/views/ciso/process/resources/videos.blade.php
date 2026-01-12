@extends('layouts.process')
@push('css')
    <style>
        #process_banner {
            min-height: 350px;
        }
    </style>
@endpush
@section('title', $processWithVideos->title)
@section('content')
    @php
        $process_id = html_entity_decode($processWithVideos->process_id);
    @endphp
    <div class="gap-6 grid grid-cols-1 px-4">
        <div class="hover:shadow-lg mx-auto p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="{{ $processWithVideos->title }}">
                {{ $processWithVideos->description }}
            </x-iso-content-card>
        </div>
    </div>


@endsection

@php
    $videoCount = $processWithVideos->resources->count();
@endphp

@section('additional_content')
    <div class="bg-white my-6 p-5 rounded-2xl">
        <header class="text-center bg-brand-950 font-bold  mb-3 p-3 rounded-md text-white">
            <h1>Video Explanations of {{ $processWithVideos->title }}</h1>
        </header>

        <div class="process-content">
            @if ($videoCount === 1)
                <div class="grid grid-cols-1 gap-6">
                    @foreach ($processWithVideos->resources as $video)
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
                    @foreach ($processWithVideos->resources as $video)
                        <div>
                            <video class="w-full rounded-lg" controls controlsList="nodownload" preload="metadata">
                                <source src="{{ route('secure.video.stream', $video->id) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endforeach
                </div>
            @else
                <div>
                    <p>No videos found</p>
                </div>
            @endif

        </div>
    </div>
@endsection
