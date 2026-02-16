@extends('layouts.ciso-full')
@section('title', 'Digital Operational Resilience Act (DORA)')
@section('content')
    <div class="min-h-screen">
        <x-page-header
            title="DORA Articles"
            subtitle="Digital Operational Resilience Act (DORA)">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-white">
                    <path fill-rule="evenodd" d="M5.625 1.5H21a2.25 2.25 0 0 1 2.25 2.25v16.5a2.25 2.25 0 0 1-2.25 2.25H5.625a2.25 2.25 0 0 1-2.25-2.25V3.75c0-1.23.845-2.25 2.25-2.25ZM6.375 9a.75.75 0 0 0 0 1.5h10.5a.75.75 0 0 0 0-1.5h-10.5Zm0 3a.75.75 0 0 0 0 1.5h10.5a.75.75 0 0 0 0-1.5h-10.5Zm0 3a.75.75 0 0 0 0 1.5h6a.75.75 0 0 0 0-1.5h-6Z" clip-rule="evenodd" />
                </svg>
            </x-slot:icon>
            Explore the comprehensive EU regulatory framework for ICT risk management in financial institutions. Navigate through each article to understand and implement digital operational resilience requirements and best practices.
        </x-page-header>

        <x-grid-layout
            :items="$allProcess"
            itemComponent="report-card"
            routeName="process.view.show"
            routeParam="process_id"
            titleField="title"
            titleArField=""
            headerTitle="Browse Articles"
            headerDescription="Select a article to explore detailed information and requirements"
            wrapperClass="process-card-wrapper"
        />
    </div>
@endsection
