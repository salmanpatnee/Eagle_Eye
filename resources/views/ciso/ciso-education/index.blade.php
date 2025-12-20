@extends('layouts.ciso')
@section('title', 'CISO Education')
@section('title_ar', 'رئيس أمن المعلومات التعليم')
@section('content')
    <div>
        <div class="col-span-12 space-y-6 xl:col-span-7 mb-8">
            <div class="grid grid-cols-1 gap-9 sm:grid-cols-3 md:gap-9 px-4">
                @foreach ($data as $item)
                    <a href="{{ route($item['route']) }}">
                        <div class="bg-brand-950 border border-gray-200 px-3 py-5 rounded-2xl">
                            <div class="flex items-center justify-center mx-auto rounded-xl w-40">
                                <img src="/Images/{{ $item['image_url'] }}" alt="{{ $item['title'] }}">
                            </div>
                            <div class="flex items-center justify-center">
                                <div class="text-center text-white">
                                    <h4 class="font-bold mt-2">
                                        {{ $item['title'] }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('css')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush
