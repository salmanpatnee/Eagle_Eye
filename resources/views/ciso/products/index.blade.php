@extends('layouts.ciso-full')
@section('title', 'Compliance Challenges Framework Model')
@section('title_ar', '')
@section('content')
    <div class="min-h-screen">
        <x-page-header
            title="Products"
            subtitle="Compliance Challenges Framework Model">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-white">
                    <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                    <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                </svg>
            </x-slot:icon>
            Explore our comprehensive product framework for addressing compliance challenges. Navigate through each product to understand how they can help implement effective governance, risk, and compliance solutions.
        </x-page-header>

        <x-grid-layout
            :items="$productsData"
            itemComponent="report-card"
            routeNameField="route_name"
            titleField="title"
            titleArField=""
            headerTitle="Browse Products"
            headerDescription="Select a product to explore detailed information and capabilities"
            wrapperClass="product-card-wrapper"
        />
    </div>
@endsection
