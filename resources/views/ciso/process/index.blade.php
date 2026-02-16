@extends('layouts.ciso-full')
@section('title', 'Article Categories')
@section('content')
    <div class="min-h-screen">
        <x-page-header
            title="Article Categories"
            subtitle="Digital Operational Resilience Act (DORA)">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-white">
                    <path fill-rule="evenodd" d="M6 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3H6Zm1 2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H7Zm8 0a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1h-2Zm-8 6a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1H7Zm8 0a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd" />
                </svg>
            </x-slot:icon>
            Explore article categories to organize and discover comprehensive resources related to the Digital Operational Resilience Act (DORA). Each category contains relevant articles and guidance for implementation.
        </x-page-header>

        <x-grid-layout
            :items="$allProcess"
            itemComponent="category-card"
            routeName="process.view.show"
            routeParam="id"
            titleField="name"
            titleArField=""
            headerTitle="Browse Article Categories"
            headerDescription="Select a category to explore articles and detailed information"
            wrapperClass="category-card-wrapper"
        />
    </div>
@endsection
