@extends('layouts.ciso-full')
@section('title', 'Cybersecurity Induction Program')
@section('title_ar', 'البرنامج التعريفي للأمن السيبراني')
@section('content')
    <div>
        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                @foreach ($pitstopData as $item)
                    <x-report-card route_name="{{ $item['route'] }}" title="{{ $item['title'] }}"
                        title_ar="{{ $item['title_ar'] }}" />
                @endforeach
            </div>
        </div>

    </div>
@endsection
