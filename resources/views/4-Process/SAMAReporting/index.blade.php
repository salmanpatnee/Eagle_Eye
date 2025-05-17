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
    <table class="table mb-0">
        <tbody>

            <x-main-domain domain="3.1 Cyber Security Leadership and Governance" />
            <x-sub-domain subdomain="Cyber Security Governance" id="3.1.1" />
            <x-sub-domain-info info_ar=""
                info="To direct and control the overall approach to cyber security within the Member Organization." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.1.1.1')
                    <x-main-control id="3.1.1.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.1.2')
                    <x-main-control id="3.1.1.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.1.3.A')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.1.3.');
                    @endphp
                    <x-main-control id="3.1.1.3"
                        details="The following positions should be represented in the cyber security committee:"
                        details_ar="" :status="$status" />

                    <x-sub-control id="3.1.1.3.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.1.3.B')
                    <x-sub-control id="3.1.1.3.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.1.3.C')
                    <x-sub-control id="3.1.1.3.C" details="{{ $control->control_description }}" details_ar=''
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.1.4.A')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.1.4.');
                    @endphp
                    <x-main-control id="3.1.1.4"
                        details="A cyber security committee charter should be developed, approved and reflect:"
                        details_ar="" :status="$status" />

                    <x-sub-control id="3.1.1.4.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.1.4.B')
                    <x-sub-control id="3.1.1.4.B" details="{{ $control->control_description }}" details_ar=''
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.1.4.C')
                    <x-sub-control id="3.1.1.4.C" details="{{ $control->control_description }}" details_ar=''
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.1.4.D')
                    <x-sub-control id="3.1.1.4.D" details="{{ $control->control_description }}" details_ar=''
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.1.5')
                    <x-main-control id="3.1.1.5" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.1.6')
                    <x-main-control id="3.1.1.6" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.1.7')
                    <x-main-control id="3.1.1.7" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.1.8')
                    <x-main-control id="3.1.1.8" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.1.9.A')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.1.4.');
                    @endphp
                    <x-main-control id="3.1.1.9" details="9.	The Member Organization should :" details_ar=""
                        :status="$status" />

                    <x-sub-control id="3.1.1.9.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.1.9.B')
                    <x-sub-control id="3.1.1.9.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.1.9.C')
                    <x-sub-control id="3.1.1.9.C" details="{{ $control->control_description }}" details_ar="."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.1.10')
                    <x-main-control id="3.1.1.10" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach

            @include('4-Process/SAMAReporting/controls')
        </tbody>

    </table>
@endsection
