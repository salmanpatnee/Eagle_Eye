@extends('layouts.iso')
@section('title', 'ISO 27001:Third-Party Security Framework')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Third-Party Security Framework">
                <p>

                    A Third-Party Security Framework is a set of guidelines, policies, and controls designed to assess,
                    manage, and
                    mitigate security risks associated with external vendors, partners, and service providers, ensuring that
                    third-party relationships do not compromise an organization's data, systems, or overall security
                    posture.


                </p>
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
