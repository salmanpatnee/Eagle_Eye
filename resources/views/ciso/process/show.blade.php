@extends('layouts.process')
@section('title', $category->name)
@section('content')
    <style>
        article ol {
            margin: 0;
            padding-left: 2rem;
        }

        article li {
            margin-bottom: 0.5rem;
            line-height: 1.6;
        }

        article ol[type="a"] {
            list-style-type: lower-alpha;
            padding-left: 2rem;
        }

        article ol[type="i"] {
            list-style-type: lower-roman;
            padding-left: 2rem;
        }

        article ol ol {
            margin: 0.5rem 0;
        }
    </style>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-header :title="$category->name">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-white">
                    <path fill-rule="evenodd"
                        d="M5.625 1.5H21a2.25 2.25 0 0 1 2.25 2.25v16.5a2.25 2.25 0 0 1-2.25 2.25H5.625a2.25 2.25 0 0 1-2.25-2.25V3.75c0-1.23.845-2.25 2.25-2.25ZM6.375 9a.75.75 0 0 0 0 1.5h10.5a.75.75 0 0 0 0-1.5h-10.5Zm0 3a.75.75 0 0 0 0 1.5h10.5a.75.75 0 0 0 0-1.5h-10.5Zm0 3a.75.75 0 0 0 0 1.5h6a.75.75 0 0 0 0-1.5h-6Z"
                        clip-rule="evenodd" />
                </svg>
            </x-slot:icon>
        </x-section-header>

        <x-two-column-layout>
            <x-slot:main>
                <x-iso-content-card title="{{ $category->name }}">
                    {{ $category->description }}
                </x-iso-content-card>
            </x-slot:main>

            <x-slot:sidebar>
                <x-resource-sidebar>
                    <x-iso-templates link="{{ route('process.resource.template', $category->id) }}" />
                    <x-iso-checklist link="{{ route('process.resource.checklist', $category->id) }}" />
                    <x-iso-video link="{{ route('process.resource.videos', $category->id) }}" />
                    <x-iso-glossary link="{{ route('process.resource.glossary', $category->id) }}" />
                </x-resource-sidebar>
            </x-slot:sidebar>
        </x-two-column-layout>
    </div>
@endsection

@section('additional_content')
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-6">
            <div class="bg-white rounded-2xl overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr class="bg-brand-950 text-white">
                            <th class="px-6 py-3 text-left font-semibold">S.No</th>
                            <th class="px-6 py-3 text-left font-semibold">Articles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $articles = array_filter(array_map('trim', explode("\n", $category->article_list)));
                        @endphp
                        @foreach ($articles as $index => $article)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-6 py-3 text-sm font-medium text-gray-700">{{ $index + 1 }}</td>
                                <td class="px-6 py-3 text-sm text-gray-600">{{ $article }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
{{-- @php
        use Illuminate\Support\Facades\View;
    @endphp
    @forelse ($category->processes as $process)
        <div class="bg-white my-6 p-5 rounded-2xl">
            <header class="text-center bg-brand-950 font-bold  mb-3 p-3 rounded-md text-white">
                <h1>{{ $process->title }}</h1>
            </header>
            <div class="process-content">

                @if (View::exists("process/process/content/{$process->process_id}"))
                    @include("process/process/content/{$process->process_id}")
                @endif
            </div>
        </div>
    @empty
    @endforelse --}}
@endsection
