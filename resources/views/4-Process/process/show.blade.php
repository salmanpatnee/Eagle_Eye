@extends('4-Process/17-GrcDomain/ProcessLayout')
@section('header')
    <h3>{{ $process->title }}</h3>
    <p>{{ $process->description }}</p>
@endsection
@section('boxes')
    <div class="rowsec">
        <div id="VideoExplanation">
            <div class="itemsec">
                <a href="{{ route('process.resource.videos', $process->process_id) }}">

                    <i class='bx bxs-videos'></i>
                    <p>Video Explanation</p>
                </a>
            </div>
        </div>
        <div>
            <a href="{{ route('process.resource.template', $process->process_id) }}">
                <div class="itemsec">
                    <div>
                        <div id="ImplementationDocs">

                            <i class='bx bxs-file-doc'></i>
                        </div>
                        <div id="ImplementationPdf">
                            <i class='bx bxs-file-pdf'></i>
                        </div>
                    </div>
                    <p>Implementation Templates</p>
                </div>
            </a>
        </div>
    </div>
    <div class="rowsec">
        <div id="Checklist">
            <div class="itemsec">
                <a href="{{ route('process.resource.checklist', $process->process_id) }}">
                    <i class='bx bxs-file'></i>
                    <p>Checklist for CISO</p>
                </a>
            </div>
        </div>
        <div id="Glossary">
            <div class="itemsec">
                <a href="{{ route('process.resource.glossary', $process->process_id) }}">
                    <img class="imgicon" src="/Images/8-TransIcon.png">
                    <p>Arabic English Glossary</p>
                </a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <header class="text-center">
        <h1>{{ $process->title }}</h1>
    </header>
    @include("4-Process/process/content/{$process->process_id}")
@endsection
