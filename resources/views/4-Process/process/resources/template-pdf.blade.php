@extends('4-Process/17-GrcDomain/ProcessLayout')
<style>
    .parasec {

        margin: 0 auto !important;
    }
</style>
@section('header')
    <h3>{{ $resource->resourceable->title }}</h3>
    <p>{{ $resource->resourceable->description }}</p>
@endsection

@section('content')
    {{-- <header class="text-center">
        <h1> Implementation Templates for {{ $resource->resourceable->title }} </h1>
    </header> --}}

    @php
        $path = storage_path('app/public/' . $resource->file_path);
    @endphp

    <embed src="{{ asset('storage/' . $resource->file_path) }}" width="100%" height="500" type="application/pdf"
        title="{{ $resource->file_name }}" style="margin-bottom: 1em">
@endsection
