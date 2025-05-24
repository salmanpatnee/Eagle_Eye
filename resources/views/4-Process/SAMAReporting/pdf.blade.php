@extends('pdf.partials.nca-pdf-report-layout')
@section('title', 'SAMA-CSF 2017 Assessment and Compliance')

@section('header')
    <h1 class="arabic-text">البنك المركزي السعودي</h1>
    <p style="margin-top: 20px">Control Assessment Regulator Reports</p>
    <p>Saudi Arabian Monetary Authority (SAMA)</p>
@endsection
@section('content')

    @include('4-Process/SAMAReporting/controls')
@endsection
