@extends('4-Process/17-GrcDomain/ProcessLayout')
<style>
    .parasec {

        margin: 0 auto !important;
    }
</style>
@section('header')
    <h3>{{ $processWithVideos->title }}</h3>
    <p>{{ $processWithVideos->description }}</p>
@endsection

@section('content')
    <header class="text-center">
        <h1>Video Explanations of {{ $processWithVideos->title }} </h1>
    </header>



    @php
        $videoCount = $processWithVideos->resources->count();
    @endphp

    <div class="video-grid {{ $videoCount > 1 ? 'multiple-videos' : '' }}">
        @forelse ($processWithVideos->resources as $video)
            <div class="video-item">
                {{-- <div class="video-title">
                    {{ $video->title ?? 'Video' }}
                </div> --}}

                <video controls controlsList="nodownload" preload="metadata">
                    <source src="{{ route('secure.video.stream', $video->id) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @empty
            <div class="video-item">
                <p>No videos found</p>
            </div>
        @endforelse
    </div>
@endsection
