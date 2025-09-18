@extends('partials/ProcessLayout')

@section('header')
    <h3>{{ $processWithChecklist->title }}</h3>
    <p>{{ $processWithChecklist->description }}</p>
@endsection

@section('content')
    <header class="text-center">
        <h1>Checklist of {{ $processWithChecklist->title }} </h1>
    </header>
    
    @include('process/resources/resource-table', ['resources' => $processWithChecklist->resources])

    @endsection
