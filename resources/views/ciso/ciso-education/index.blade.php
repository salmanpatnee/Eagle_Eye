@extends('layouts.ciso')
@section('title', 'CISO Education')
@section('title_ar', 'رئيس أمن المعلومات التعليم')
@section('content')
    <div>
        <x-table.action-wrapper title="">
        </x-table.action-wrapper>



        <div class="col-span-12 space-y-6 xl:col-span-7 mb-8">
            <div class="grid grid-cols-1 gap-9 sm:grid-cols-3 md:gap-9 px-4">

                <a href="{{ route('cissp') }}">
                    <div class="bg-brand-950 border border-gray-200 px-3 py-5 rounded-2xl">
                        <div class="flex items-center justify-center mx-auto rounded-xl w-40">
                            <img src="/Images/CISSPLogo.png" alt="">
                        </div>
                        <div class="flex items-center justify-center">
                            <div class="text-center text-white">

                                <h4 class="font-bold mt-2">
                                    Applying CISSP Knowledge in KSA
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('cism') }}">
                    <div class="bg-brand-950 border border-gray-200 px-3 py-5 rounded-2xl">
                        <div class="flex items-center justify-center mx-auto rounded-xl w-40">
                            <img src="/Images/CISMLogo.png" alt="cism">
                        </div>
                        <div class="flex items-center justify-center">
                            <div class="text-center text-white">

                                <h4 class="font-bold mt-2">
                                    Applying CISM Knowledge in KSA
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('cgeit') }}">
                    <div class="bg-brand-950 border border-gray-200 px-3 py-5 rounded-2xl">
                        <div class="flex items-center justify-center mx-auto rounded-xl w-40">
                            <img src="/Images/CGEITLogo.png" alt="CGEITLogo">
                        </div>
                        <div class="flex items-center justify-center">
                            <div class="text-center text-white">

                                <h4 class="font-bold mt-2">
                                    Applying CGEIT Knowledge in KSA
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-8">
            <div class="grid grid-cols-1 gap-9 sm:grid-cols-3 md:gap-9 px-4">
                <a href="{{ route('pmp') }}">
                    <div class="bg-brand-950 border border-gray-200 px-3 py-5 rounded-2xl">
                        <div class="flex items-center justify-center mx-auto rounded-xl w-40">
                            <img src="/Images/PMPLogo.png" alt="PMP">
                        </div>
                        <div class="flex items-center justify-center">
                            <div class="text-center text-white">

                                <h4 class="font-bold mt-2">
                                    Applying PMP Knowledge in KSA
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('agile') }}">
                    <div class="bg-brand-950 border border-gray-200 px-3 py-5 rounded-2xl">
                        <div class="flex items-center justify-center mx-auto rounded-xl w-40">
                            <img src="/Images/AgileLogo.png" alt="">
                        </div>
                        <div class="flex items-center justify-center">
                            <div class="text-center text-white">

                                <h4 class="font-bold mt-2">
                                    Applying Agile Approach to Your Department
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
        </div>



    </div>
@endsection
