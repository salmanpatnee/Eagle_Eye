@extends('4-Process/17-GrcDomain/ProcessLayout')

@section('header')
    <h3>{{ $processWithChecklist->title }}</h3>
    <p>{{ $processWithChecklist->description }}</p>
@endsection

@section('content')
    <header class="text-center">
        <h1>Checklist for CISO of {{ $processWithChecklist->title }} </h1>
    </header>
    
    @include('4-Process/process/resources/resource-table', ['resources' => $processWithChecklist->resources])

    @endsection
