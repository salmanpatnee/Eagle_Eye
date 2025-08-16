@extends('layouts/nca-report')
@section('title', 'SAMA Regulatory Reporting')
@section('title_ar', 'التقارير التنظيمية SAMA')

@section('content')

@section('actions')
    <x-table.action-wrapper title="">
        <x-action.pdf-button route_name="sama-regulatory-report.show" />
        <x-action.excel-button route_name="sama-regulatory-report.excel" />
    </x-table.action-wrapper>
@endsection

@section('report-info')

    <p class="font-bold mb-5 rtl:text-right text-2xl text-gray-900" lang="ar" dir="rtl">
        البنك المركزي السعودي</p>
    <p class="text-lg text-gray-900 mb-0">Control Assessment Regulator Reports</p>
    <p class="text-lg text-gray-900 mb-0">Saudi Arabian Monetary Authority (SAMA)</p>
@endsection

<main class="report text-left max-w-full overflow-x-auto lg:overflow-visible custom-scrollbar">

    @include('process/reporting/sama/controls')
@endsection
