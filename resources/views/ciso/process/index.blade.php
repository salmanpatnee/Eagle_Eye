@extends('layouts.ciso-full')
@section('title', 'GRC Domain Resources (Capacity Building Framework)')
@section('title_ar', 'موارد الحوكمة والمخاطر والامتثال (إطار بناء القدرات)')
@section('content')
    <div class="min-h-screen">
        <x-page-header
            title="GRC Processes"
            subtitle="Governance, Risk, and Compliance Framework">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-white">
                    <path fill-rule="evenodd" d="M4.5 9.75a6 6 0 0 1 11.573-2.226 3.75 3.75 0 0 1 4.133 4.303A4.5 4.5 0 0 1 18 20.25h-2.515a2.25 2.25 0 0 1-2.228-2.024 4.5 4.5 0 0 0-3.503-4.21 4.5 4.5 0 0 0-4.637 0 2.25 2.25 0 0 1-2.228 2.024H4.5a4.5 4.5 0 0 1 0-9.5ZM9 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm3-4.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
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
            titleArField="title_ar"
            headerTitle="Browse Processes"
            headerDescription="Select a process to explore detailed information and requirements"
            wrapperClass="process-card-wrapper"
        />
    </div>
@endsection
