@extends('layouts.ciso-full')
@section('title', 'Compliance Challenges Framework Model')
@section('title_ar', '')
@section('content')

    <div>


        <div class="col-span-12 space-y-6 xl:col-span-7">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                @foreach ($productsData as $title => $route)
                    <a href="{{ route($route) }}">
                        <div class="bg-brand-950 border border-gray-200 md:p-6 p-5 rounded-2xl">
                            <div class="bg-gray-100 flex h-12 items-center justify-center mx-auto rounded-xl w-12">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                </svg>
                            </div>
                            <div class="flex items-center justify-center mt-5">
                                <div class="text-center text-white">
                                    {{-- <span class="font-bold" lang="ar"
                                        dir="rtl">{{ $data->category_name_ar }}</span> --}}
                                    <h4 class="font-bold mt-2">
                                        {{ $title }}
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
