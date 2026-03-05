@extends('layouts.ciso-full')
@section('title', 'CISO Essential Frameworks')
@section('content')
    <div class="min-h-screen">
        @if ($frameworks->isNotEmpty())
            <x-content-grid-layout
                :items="$frameworks"
                itemComponent="report-card"
                routeName="ciso-essential-framework-content.show"
                routeParam="id"
                titleField="title"
                titleArField=""
                headerTitle="CISO Essential Frameworks"
                headerDescription="Resources for CISO Essential Frameworks"
                wrapperClass="iso-card-wrapper"
            />
        @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">No frameworks available yet.</p>
            </div>
        @endif
    </div>
@endsection
