@php
    use Illuminate\Support\Str;
@endphp

@extends('pdf.partials.layout')
@section('title', 'SAMA-CSF 2017 Assessment and Compliance')
@section('action-buttons')
    {{-- <a href="{{ route('ecc-regulatory-summary.show') }}?controlAssessmentId={{ $controlAssessmentId }}" class="btn-report">
        <p>تقرير ملخص</p>
        <p>Summary Report</p>
    </a> --}}
    {{-- <a href="{{ route('regulatory-reports.create') }}?best_practice=NCA-ECC-2018" class="btn-report">
        <p>تقرير مفصل</p>
        <p>Detailed Report</p>
    </a> --}}
    <a href="{{ route('sama-regulatory-report.excel') }}" class="btn-report">
        <p>تنزيل بصيغة إكسل</p>
        <p>Download in Excel</p>
    </a>
    <a href="{{ route('sama-regulatory-report.show') }}?pdf=1" class="btn-report">
        <p>تنزيل بصيغة بي دي إف</p>
        <p>Download as PDF</p>
    </a>
@endsection

@section('header')
    <h1 class="arabic-text">البنك المركزي السعودي</h1>
    <p style="margin-top: 20px">Control Assessment Regulator Reports</p>
    <p>Saudi Arabian Monetary Authority (SAMA)</p>
@endsection

@section('content')
    @include('4-Process/SAMAReporting/controls')
@endsection
