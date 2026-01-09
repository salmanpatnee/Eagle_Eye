@extends('layouts.ciso-full')
@section('title', 'ISO 27001:Information Security Management System (ISMS)')
@section('content')
    <div>
        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                @foreach ($allSections as $item)
                    <x-report-card route_name="iso-27001.show" route_param="{{ $item->section_id }}"
                        title="{{ $item->title }}" title_ar="" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
