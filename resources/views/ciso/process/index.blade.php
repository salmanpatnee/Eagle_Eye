@extends('layouts.ciso-full')
@section('title', 'GRC Domain Resources (Capacity Building Framework)')
@section('content')
    <div class="min-h-screen">
        <x-page-header
            title="GRC Processes"
            subtitle="Governance, Risk, and Compliance Framework">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-white">
                    <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                    <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                </svg>
            </x-slot:icon>
            Explore the comprehensive framework for governance, risk, and compliance processes. Navigate through each process to understand and implement effective GRC practices.
        </x-page-header>

        <x-grid-layout
            :items="$allProcess"
            itemComponent="report-card"
            routeName="process.view.show"
            routeParam="process_id"
            titleField="title"
            titleArField=""
            headerTitle="Browse Processes"
            headerDescription="Select a process to explore detailed information and requirements"
            wrapperClass="process-card-wrapper"
        />
    </div>
@endsection
