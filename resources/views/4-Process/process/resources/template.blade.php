@extends('4-Process/17-GrcDomain/ProcessLayout')
<style>
    .parasec {

        margin: 0 auto !important;
    }
</style>
@section('header')
    <h3>{{ $processWithTemplates->title }}</h3>
    <p>{{ $processWithTemplates->description }}</p>
@endsection

@section('content')
    <header class="text-center">
        <h1> Implementation Templates for {{ $processWithTemplates->title }} </h1>
    </header>

    @include('4-Process/process/resources/resource-table', ['resources' => $processWithTemplates->resources])

 

@endsection
