@extends('layouts.iso')
@section('title', 'ISO 27001:Statement of Applicability')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Statement of Applicability">
                <p>
                    A Statement of Applicability (SoA) is a document that outlines the controls from a specific standard,
                    such as
                    ISO 27001, and identifies which controls are applicable to the organization, along with the
                    justification for
                    their inclusion or exclusion, and the status of their implementation.</p>
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
