@extends('layouts.iso')
@section('title', 'ISO 27001:Project Management Security Framework')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4">
        <div class="bg-brand-950 hover:shadow-lg p-6 rounded-lg shadow text-white transition">
            <x-iso-content-card title="Project Management Security Framework">
                <p>
                    A Project Management Security Framework is a set of guidelines, policies, and best practices designed to
                    ensure
                    the security of information, assets, and processes throughout the lifecycle of a project, from
                    initiation to
                    completion, by addressing potential risks and ensuring compliance with security standards.</p>
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
