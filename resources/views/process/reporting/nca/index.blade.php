@extends('layouts.iso')
@section('title', 'Regulatory Reports')
@section('title_ar', 'التقارير التنظيمية')
@section('content')
    <div>
        <x-table.action-wrapper title="">
        </x-table.action-wrapper>



        <div class="col-span-12 space-y-6 xl:col-span-7 mb-8">
            <div class="grid grid-cols-1 gap-9 sm:grid-cols-3 md:gap-9 px-4">

                <a href="/regulatory-report?best_practice=NCA-ECC-2018">
                    <div class="bg-brand-950 border border-gray-200 px-3 py-5 rounded-2xl">
                        <div class="bg-gray-100 flex h-12 items-center justify-center mx-auto rounded-xl w-12">
                            <x-icons.report />
                        </div>
                        <div class="flex items-center justify-center mt-5">
                            <div class="text-center text-white">
                                <span class="font-bold text-sm" lang="ar" dir="rtl">تقرير التقييم والامتثال
                                    NCA-ECC</span>
                                <h4 class="font-bold text-sm mt-2">
                                    NCA-ECC Assessment and Compliance Reports
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
                <x-report-card route_name="cscc-regulatory-report.show" title="NCA-CSCC Assessment and Compliance Reports"
                    title_ar="تقرير التقييم والامتثال NCA-CSCC" />
                <a href="/regulatory-report?best_practice=NCA-CSCC-2019">
                    <div class="bg-brand-950 border border-gray-200 px-3 py-5 rounded-2xl">
                        <div class="bg-gray-100 flex h-12 items-center justify-center mx-auto rounded-xl w-12">
                            <x-icons.report />
                        </div>
                        <div class="flex items-center justify-center mt-5">
                            <div class="text-center text-white">
                                <span class="font-bold text-sm" lang="ar" dir="rtl">تقرير التقييم والامتثال
                                    NCA-CCC</span>
                                <h4 class="font-bold text-sm mt-2">
                                    NCA-CCC Assessment and Compliance Reports
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-8">
            <div class="grid grid-cols-1 gap-9 sm:grid-cols-3 md:gap-9 px-4">
                <x-report-card route_name="tcc-regulatory-report.show" title="NCA-TCC Assessment and Compliance Reports"
                    title_ar="تقرير التقييم والامتثال NCA-TCC" />
                <x-report-card route_name="osmacc-regulatory-report.show"
                    title="NCA-OSMACC Assessment and Compliance Reports" title_ar="تقرير التقييم والامتثال NCA-OSMACC" />
                <x-report-card route_name="dcc-regulatory-report.show" title="NCA-DCC Assessment and Compliance Reports"
                    title_ar="تقرير التقييم والامتثال NCA-DCC" />
            </div>
        </div>



    </div>
@endsection
