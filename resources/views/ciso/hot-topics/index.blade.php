@extends('layouts.ciso-full')
@section('title', 'Hot Topics for CISO')
@section('content')
    <div class="min-h-screen">
        <x-page-header
            title="Hot Topics"
            subtitle="Current Trends and Critical Issues in Information Security">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-white">
                    <path fill-rule="evenodd" d="M19.5 21a3 3 0 003-3v-4.5a3 3 0 00-3-3h-15a3 3 0 00-3 3V18a3 3 0 003 3h15zM1.5 10.146V6a3 3 0 013-3h5.379a2.25 2.25 0 011.59.659l2.122 2.121c.14.141.331.22.53.22H19.5a3 3 0 013 3v1.146A4.483 4.483 0 0019.5 9h-15a4.483 4.483 0 00-3 1.146z" clip-rule="evenodd" />
                </svg>
            </x-slot:icon>
            Stay updated with the most pressing cybersecurity challenges, emerging threats, and strategic insights that matter to Chief Information Security Officers.
        </x-page-header>

        <x-grid-layout
            :items="$topicsData"
            itemComponent="report-card"
            routeNameField="route"
            titleField="title"
            titleArField=""
            headerTitle="Browse Hot Topics"
            headerDescription="Select a topic to explore detailed information and insights"
            wrapperClass="hot-topic-card-wrapper"
        />
    </div>
@endsection