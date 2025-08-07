@extends('layouts.iso')
@section('title', 'ISO 27001:Network Security Framework')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Network Security Framework">
                <p>
                    A Network Security Framework is a structured set of policies, procedures, and technologies designed to
                    protect
                    an organization's network infrastructure from unauthorized access, attacks, and data breaches, ensuring
                    the
                    confidentiality, integrity, and availability of network resources and communications.</p>
            </x-iso-content-card>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
            <div class="flex flex-col gap-6">
                <x-iso-checklist link="#" />
                <x-iso-glossary link="#" />
            </div>
            <div class="flex flex-col gap-6">
                <x-iso-video link="#" />
                <x-iso-templates link="#" />
            </div>
        </div>
    </div>
@endsection
