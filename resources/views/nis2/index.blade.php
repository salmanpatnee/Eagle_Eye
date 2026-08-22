@extends('layouts.ciso-full')
@section('title', 'NIS2 Resources')
@section('content')
    <div class="min-h-screen">
        @if ($nis2Contents->isNotEmpty())
            <x-content-grid-layout
                :items="$nis2Contents"
                itemComponent="content-image-card"
                routeName="resource-nis2.show"
                routeParam="id"
                titleField="title"
                titleArField=""
                :headerTitle="'NIS2 Compliance Resources'"
                headerDescription="Structured resources to support your NIS2 compliance journey"
                wrapperClass="iso-card-wrapper"
            />
        @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">No NIS2 resources available yet.</p>
            </div>
        @endif
    </div>
@endsection
