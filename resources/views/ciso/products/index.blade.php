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
                    <path fill-rule="evenodd" d="M12.378 1.602a.75.75 0 0 0-.756 0L3 6.632l.178.3a4.5 4.5 0 0 0 1.3.794v8.24a4.5 4.5 0 0 0-1.799 1.013l-.002.002-.006.007a3 3 0 0 0-.54 3.642 3 3 0 0 0 3.536 1.702l.006-.002.007-.006a3 3 0 0 0 1.538-1.517l.001-.006.002-.007a3 3 0 0 0-.54-3.642 3 3 0 0 0 3.536-1.702l.006.002.007.006c.135.08.27.157.406.23.416.22.84.422 1.27.606v-8.24a4.5 4.5 0 0 0-1.3-.794l.178-.3 8.622-5.03a.75.75 0 0 0-.756-1.298l-8.622 5.03Zm-4.5 7.5a.75.75 0 0 0-1.06 0l-2.25 2.25a.75.75 0 0 0 0 1.06l2.25 2.25a.75.75 0 0 0 1.06-1.06l-1.72-1.72 1.72-1.72a.75.75 0 0 0 0-1.06Zm9 0a.75.75 0 0 0-1.06 0l-1.72 1.72-1.72-1.72a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.06 0l2.25-2.25a.75.75 0 0 0 0-1.06Z" clip-rule="evenodd" />
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
