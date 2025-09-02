@extends('layouts.ciso-full')
@section('title', 'GRC Domain Resources (Capacity Building Framework)')
@section('title_ar', 'موارد الحوكمة والمخاطر والامتثال (إطار بناء القدرات)')
@section('content')
    <div>
        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                @foreach ($allProcess as $item)
                    <x-report-card route_name="process.view.show" route_param="{{ $item->process_id }}"
                        title="{{ $item->title }}" title_ar="{{ $item->title_ar }}" />
                @endforeach
            </div>
        </div>

    </div>
@endsection
