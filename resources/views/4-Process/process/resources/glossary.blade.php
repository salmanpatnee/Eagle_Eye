@extends('4-Process/17-GrcDomain/ProcessLayout')
<style>
    .parasec {

        margin: 0 auto !important;
    }
</style>
@section('header')
    <h3>{{ $processWithGlossary->title }}</h3>
    <p>{{ $processWithGlossary->description }}</p>
@endsection

@section('content')
    <header class="text-center">
        <h1>Arabic English Glossary of {{ $processWithGlossary->title }} </h1>
    </header>

    @include('4-Process/process/resources/resource-table', ['resources' => $processWithGlossary->resources])
    
@endsection
