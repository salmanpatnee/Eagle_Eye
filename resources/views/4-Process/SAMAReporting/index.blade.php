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

                @if ($control->control_id == 'SAMA-CSF-3.1.1.3')
                    @php $status = getParentStatus($report, 'SAMA-CSF-3.1.1.3.'); @endphp
                    <x-main-control id="3.1.1.3" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />

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

                @if ($control->control_id == 'SAMA-CSF-3.1.1.4')
                    @php $status = getParentStatus($report, 'SAMA-CSF-3.1.1.4.'); @endphp
                    <x-main-control id="3.1.1.4" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />

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

                @if ($control->control_id == 'SAMA-CSF-3.1.1.9')
                    @php $status = getParentStatus($report, 'SAMA-CSF-3.1.1.9.'); @endphp
                    <x-main-control id="3.1.1.9" details="{{ $control->control_description }}" details_ar=""
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

            <x-sub-domain subdomain="Cyber Security Strategy" id="3.1.2" />
            <x-sub-domain-info info_ar=""
                info="To ensure that cyber security initiatives and projects within the Member Organization contribute to the Member Organization’s strategic objectives and are aligned with the Banking Sector’s cyber security strategy." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.1.2.1')
                    <x-main-control id="3.1.2.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.2.2')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.2.2.');
                    @endphp
                    <x-main-control id="3.1.2.2" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />

                    <x-sub-control id="3.1.2.2.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.2.2.B')
                    <x-sub-control id="3.1.2.2.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.2.2.C')
                    <x-sub-control id="3.1.2.2.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.2.3')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.2.3.');
                    @endphp
                    <x-main-control id="3.1.2.3" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />

                    <x-sub-control id="3.1.2.3.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.2.3.B')
                    <x-sub-control id="3.1.2.3.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.2.3.C')
                    <x-sub-control id="3.1.2.3.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="Cyber Security Policy" id="3.1.3" />
            <x-sub-domain-info info_ar=""
                info="To document the Member Organization’s commitment and objectives of cyber security, and to communicate this to the relevant stakeholders." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.1.3.1')
                    <x-main-control id="3.1.3.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.3.2')
                    <x-main-control id="3.1.3.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.1.3.3')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.3.3.');
                    @endphp
                    <x-main-control id="3.1.3.3" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />

                    <x-sub-control id="3.1.3.3.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.3.3.B')
                    <x-sub-control id="3.1.3.3.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.3.3.C')
                    <x-sub-control id="3.1.3.3.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.3.3.D')
                    <x-sub-control id="3.1.3.3.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.3.4')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.3.4.', true, 'SAMA-CSF-3.1.3.4.F');
                    @endphp

                    <x-main-control id="3.1.3.4" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.3.4.A')
                    <x-sub-control id="3.1.3.4.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.3.4.B')
                    <x-sub-control id="3.1.3.4.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.3.4.C')
                    <x-sub-control id="3.1.3.4.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.3.4.D')
                    <x-sub-control id="3.1.3.4.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.3.4.E')
                    <x-sub-control id="3.1.3.4.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.3.4.F')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.3.4.F.');
                    @endphp

                    <x-sub-control id="3.1.3.4.F" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.3.4.F.1')
                    <x-sub-control id="3.1.3.4.F.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.3.4.F.2')
                    <x-sub-control id="3.1.3.4.F.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.3.4.F.3')
                    <x-sub-control id="3.1.3.4.F.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.3.4.F.4')
                    <x-sub-control id="3.1.3.4.F.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.3.4.F.5')
                    <x-sub-control id="3.1.3.4.F.5" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.3.4.F.6')
                    <x-sub-control id="3.1.3.4.F.6" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.3.4.F.7')
                    <x-sub-control id="3.1.3.4.F.7" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.3.4.F.8')
                    <x-sub-control id="3.1.3.4.F.8" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="Cyber Security Roles and Responsibilities" id="3.1.4" />
            <x-sub-domain-info info_ar=""
                info="To ensure that relevant stakeholders are aware of the responsibilities with regard to cyber security and apply cyber security controls throughout the Member Organization." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.1.4.1')
                    @php
                        // Ignore controls here
                        $status = getParentStatus(
                            $report,
                            'SAMA-CSF-3.1.4.1.',
                            true,
                            '3.1.4.1.C,3.1.4.2,3.1.4.2.C,3.1.4.3,3.1.4.4,3.1.4.4.A,3.1.4.4.E,3.1.4.4.G,3.1.4.4.I,3.1.4.6',
                        );
                    @endphp
                    <x-main-control id="3.1.4.1" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.1.A')
                    <x-sub-control id="3.1.4.1.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.1.B')
                    <x-sub-control id="3.1.4.1.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.1.4.1.C')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.4.1.C.');
                    @endphp

                    <x-sub-control id="3.1.4.1.C" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.1.C.1')
                    <x-sub-control id="3.1.4.1.C.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.1.C.2')
                    <x-sub-control id="3.1.4.1.C.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.1.C.3')
                    <x-sub-control id="3.1.4.1.C.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.2')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.4.2.', true, '3.1.4.2.C');
                    @endphp
                    <x-main-control id="3.1.4.2" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.2.A')
                    <x-sub-control id="3.1.4.2.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.2.B')
                    <x-sub-control id="3.1.4.2.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.2.C')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.4.2.C.');
                    @endphp
                    <x-sub-control id="3.1.4.2.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.2.C.1')
                    <x-sub-control id="3.1.4.2.C.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.2.C.2')
                    <x-sub-control id="3.1.4.2.C.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.2.C.3')
                    <x-sub-control id="3.1.4.2.C.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.2.C.4')
                    <x-sub-control id="3.1.4.2.C.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.2.C.5')
                    <x-sub-control id="3.1.4.2.C.5" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.2.C.6')
                    <x-sub-control id="3.1.4.2.C.6" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.1.4.3')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.4.3.');
                    @endphp
                    <x-main-control id="3.1.4.3" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.3.A')
                    <x-sub-control id="3.1.4.3.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.3.B')
                    <x-sub-control id="3.1.4.3.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.3.C')
                    <x-sub-control id="3.1.4.3.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.1.4.4')
                    @php
                        $status = getParentStatus(
                            $report,
                            'SAMA-CSF-3.1.4.4.',
                            true,
                            'SAMA-CSF-3.1.4.4.A,SAMA-CSF-3.1.4.4.E,SAMA-CSF-3.1.4.4.G,SAMA-CSF-3.1.4.4.I',
                        );
                    @endphp

                    <x-main-control id="3.1.4.4" details="The CISO should be responsible for:" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.A')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.4.4.A.');
                    @endphp


                    <x-sub-control id="3.1.4.4.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.A.1')
                    <x-sub-control id="3.1.4.4.A.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.A.2')
                    <x-sub-control id="3.1.4.4.A.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.A.3')
                    <x-sub-control id="3.1.4.4.A.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.A.4')
                    <x-sub-control id="3.1.4.4.A.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.B')
                    <x-sub-control id="3.1.4.4.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.C')
                    <x-sub-control id="3.1.4.4.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.D')
                    <x-sub-control id="3.1.4.4.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.E')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.4.4.E.');
                    @endphp
                    <x-sub-control id="3.1.4.4.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.E.1')
                    <x-sub-control id="3.1.4.4.E.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.E.2')
                    <x-sub-control id="3.1.4.4.E.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.E.3')
                    <x-sub-control id="3.1.4.4.E.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.E.4')
                    <x-sub-control id="3.1.4.4.E.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.E.5')
                    <x-sub-control id="3.1.4.4.E.5" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.F')
                    <x-sub-control id="3.1.4.4.F" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.G')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.4.4.G.');
                    @endphp
                    <x-sub-control id="3.1.4.4.G" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.G.1')
                    <x-sub-control id="3.1.4.4.G.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.G.2')
                    <x-sub-control id="3.1.4.4.G.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.G.3')
                    <x-sub-control id="3.1.4.4.G.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.H')
                    <x-sub-control id="3.1.4.4.H" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.I')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.4.4.I.');
                    @endphp


                    <x-sub-control id="3.1.4.4.I" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.I.1')
                    <x-sub-control id="3.1.4.4.I.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.I.2')
                    <x-sub-control id="3.1.4.4.I.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.I.3')
                    <x-sub-control id="3.1.4.4.I.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.4.4.I.4')
                    <x-sub-control id="3.1.4.4.I.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.5')
                    <x-main-control id="3.1.4.5" :details="$control->control_description" details_ar="" :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.6')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.4.6.');
                    @endphp

                    <x-main-control id="3.1.4.6" :details="$control->control_description" details_ar="" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.4.6.A')
                    <x-sub-control id="3.1.4.6.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-sub-domain subdomain="Cyber Security in Project Management" id="3.1.5" />
            <x-sub-domain-info info_ar=""
                info="To ensure that the all the Member Organization’s projects meet cyber security requirements." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.1.5.1')
                    <x-main-control id="3.1.5.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.1.5.2')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.5.2.');
                    @endphp
                    <x-main-control id="3.1.5.2"
                        details="2.	The Member Organization’s project management methodology should ensure that:"
                        details_ar="" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.5.2.A')
                    <x-sub-control id="3.1.5.2.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.5.2.B')
                    <x-sub-control id="3.1.5.2.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.5.2.C')
                    <x-sub-control id="3.1.5.2.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.5.2.D')
                    <x-sub-control id="3.1.5.2.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.5.2.E')
                    <x-sub-control id="3.1.5.2.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.5.2.F')
                    <x-sub-control id="3.1.5.2.F" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-sub-domain subdomain="Cyber Security Awareness" id="3.1.6" />
            <x-sub-domain-info info_ar=""
                info="To create a cyber security risk-aware culture where the Member Organization’s staff, third parties and customers make effective risk-based decisions which protect the Member Organization’s information." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.1.6.1')
                    <x-main-control id="3.1.6.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.6.2')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.6.2.');
                    @endphp
                    <x-main-control id="3.1.6.2"
                        details="2.	A cyber security awareness program should be defined and conducted for" details_ar=""
                        :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.6.2.A')
                    <x-sub-control id="3.1.6.2.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.6.2.B')
                    <x-sub-control id="3.1.6.2.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.6.2.C')
                    <x-sub-control id="3.1.6.2.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.6.3')
                    <x-main-control id="3.1.6.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.6.4')
                    <x-main-control id="3.1.6.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.6.5')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.6.5.');
                    @endphp
                    <x-main-control id="3.1.6.5" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.6.5.A')
                    <x-sub-control id="3.1.6.5.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.6.5.B')
                    <x-sub-control id="3.1.6.5.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.1.6.5.C')
                    <x-sub-control id="3.1.6.5.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.6.6')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.6.6.');
                    @endphp
                    <x-main-control id="3.1.6.6" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.6.6.A')
                    <x-sub-control id="3.1.6.6.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.6.6.B')
                    <x-sub-control id="3.1.6.6.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.1.6.7')
                    <x-main-control id="3.1.6.7" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-sub-domain subdomain="Cyber Security Training" id="3.1.7" />
            <x-sub-domain-info info_ar=""
                info="To ensure that staff of the Member Organization are equipped with the skills and required knowledge to protect the Member Organization’s information assets and to fulfil their cyber security responsibilities." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.1.7.1')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.1.7.1.');
                    @endphp
                    <x-main-control id="3.1.7.1" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.7.1.A')
                    <x-sub-control id="3.1.7.1.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.7.1.B')
                    <x-sub-control id="3.1.7.1.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.7.1.C')
                    <x-sub-control id="3.1.7.1.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.7.1.D')
                    <x-sub-control id="3.1.7.1.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.1.7.2')
                    <x-main-control id="3.1.7.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-main-domain domain="Cyber Security Risk Management and Compliance" />
            <x-sub-domain subdomain="" id="3.2.1" />
            <x-sub-domain-info info_ar=""
                info="To ensure cyber security risks are properly managed to protect the confidentiality, integrity and availability of the Member Organization’s information assets, and to ensure the cyber security risk management process is aligned with the Member Organization’s enterprise risk management process." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.2.1.1')
                    <x-main-control id="3.2.1.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.2')
                    <x-main-control id="3.2.1.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.2.1.3')
                    <x-main-control id="3.2.1.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.4')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.2.1.4.');
                    @endphp

                    <x-main-control id="3.2.1.4" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.4.A')
                    <x-sub-control id="3.2.1.4.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.4.B')
                    <x-sub-control id="3.2.1.4.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.4.C')
                    <x-sub-control id="3.2.1.4.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.4.D')
                    <x-sub-control id="3.2.1.4.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.5')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.2.1.5.');
                    @endphp

                    <x-main-control id="3.2.1.5" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.5.A')
                    <x-sub-control id="3.2.1.5.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.5.B')
                    <x-sub-control id="3.2.1.5.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.5.C')
                    <x-sub-control id="3.2.1.5.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.6')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.2.1.6.');
                    @endphp
                    <x-main-control id="3.2.1.6" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.6.A')
                    <x-sub-control id="3.2.1.6.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.6.B')
                    <x-sub-control id="3.2.1.6.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.6.C')
                    <x-sub-control id="3.2.1.6.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.6.D')
                    <x-sub-control id="3.2.1.6.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.7')
                    <x-main-control id="3.2.1.7" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.8')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.2.1.8.');
                    @endphp
                    <x-main-control id="3.2.1.8" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.8.A')
                    <x-sub-control id="3.2.1.8.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.8.B')
                    <x-sub-control id="3.2.1.8.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.8.C')
                    <x-sub-control id="3.2.1.8.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.8.D')
                    <x-sub-control id="3.2.1.8.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.9')
                    <x-main-control id="3.2.1.9" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.10')
                    <x-main-control id="3.2.1.10" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.11')
                    <x-main-control id="3.2.1.11" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-main-domain domain="Cyber Security Risk Identification" />
            <x-sub-domain subdomain="" id="3.2.1.1" />
            <x-sub-domain-info info_ar=""
                info="To find, recognize and describe the Member Organization’s cyber security risks" />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.2.1.1.1')
                    <x-main-control id="3.2.1.1.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.1.2')
                    <x-main-control id="3.2.1.1.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.1.3')
                    <x-main-control id="3.2.1.1.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach

            <x-main-domain domain="Cyber Security Risk Analysis" />
            <x-sub-domain subdomain="" id="3.2.1.2" />
            <x-sub-domain-info info_ar=""
                info="To find, recognize and describe the Member Organization’s cyber security risks" />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.2.1.2.1')
                    <x-main-control id="3.2.1.2.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.2.2')
                    <x-main-control id="3.2.1.2.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-main-domain domain="Cyber Security Risk Analysis" />
            <x-sub-domain subdomain="" id="3.2.1.3" />
            <x-sub-domain-info info_ar=""
                info="To ensure cyber security risks are treated (i.e., accepted, avoided, transferred or mitigated)." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.1')
                    <x-main-control id="3.2.1.3.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.2')
                    <x-main-control id="3.2.1.3.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.3')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.2.1.3.3.', true, 'SAMA-CSF-3.2.1.3.3.B');
                    @endphp
                    <x-main-control id="3.2.1.3.3" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.3.A')
                    <x-sub-control id="3.2.1.3.3.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.3.B')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.2.1.3.3.B.');
                    @endphp
                    <x-sub-control id="3.2.1.3.3.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.3.B.1')
                    <x-sub-control id="3.2.1.3.3.B.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.3.B.2')
                    <x-sub-control id="3.2.1.3.3.B.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif



                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.4')
                    <x-main-control id="3.2.1.3.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.5')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.2.1.3.5.');
                    @endphp
                    <x-main-control id="3.2.1.3.5" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.5.A')
                    <x-sub-control id="3.2.1.3.5.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.5.B')
                    <x-sub-control id="3.2.1.3.5.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.5.C')
                    <x-sub-control id="3.2.1.3.5.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.6')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.2.1.3.6.', true, 'SAMA-CSF-3.2.1.3.6.B');
                    @endphp
                    <x-main-control id="3.2.1.3.6" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.6.A')
                    <x-sub-control id="3.2.1.3.6.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.6.B')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.2.1.3.6.B.');
                    @endphp

                    <x-sub-control id="3.2.1.3.6.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.6.B.1')
                    <x-sub-control id="3.2.1.3.6.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.6.B.2')
                    <x-sub-control id="3.2.1.3.6.B.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.6.B.3')
                    <x-sub-control id="3.2.1.3.6.B.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.6.C')
                    <x-sub-control id="3.2.1.3.6.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.6.D')
                    <x-sub-control id="3.2.1.3.6.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.1.3.7')
                    <x-main-control id="3.2.1.3.7" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-main-domain domain="Cyber Risk Monitoring and Review" />
            <x-sub-domain subdomain="" id="3.2.1.4" />
            <x-sub-domain-info info_ar=""
                info="To ensure that the cyber security risk treatment is performed according to the treatment plans. To ensure that the revised or newly implemented cyber security controls are effective" />


            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.2.1.4.1')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.2.1.4.1.');
                    @endphp

                    <x-sub-control id="3.2.1.4.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.4.1.A')
                    <x-sub-control id="3.2.1.4.1.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.4.1.B')
                    <x-sub-control id="3.2.1.4.1.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.1.4.2')
                    <x-sub-control id="3.2.1.4.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-main-domain domain="Cyber Risk Monitoring and Review" />
            <x-sub-domain subdomain="" id="3.2.2" />
            <x-sub-domain-info info_ar=""
                info="To comply with regulations affecting cyber security of the Member Organization." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.2.2.1')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.2.2.1.');
                    @endphp
                    <x-main-control id="3.2.2.1" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.2.1.A')
                    <x-sub-control id="3.2.2.1.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.2.1.B')
                    <x-sub-control id="3.2.2.1.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.2.1.C')
                    <x-sub-control id="3.2.2.1.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-main-domain domain="Compliance with (inter)national industry standards" />
            <x-sub-domain subdomain="" id="3.2.3" />
            <x-sub-domain-info info_ar="" info="To comply with mandatory (inter)national industry standards" />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.2.3.1')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.2.3.1.');
                    @endphp
                    <x-main-control id="3.2.3.1" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.3.1.A')
                    <x-sub-control id="3.2.3.1.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.3.1.B')
                    <x-sub-control id="3.2.3.1.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.3.1.C')
                    <x-sub-control id="3.2.3.1.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-main-domain domain="Cyber Security Review" />
            <x-sub-domain subdomain="" id="3.2.4" />
            <x-sub-domain-info info_ar=""
                info="To ascertain whether the cyber security controls are securely designed and implemented, and the effectiveness of these controls is being monitored." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.2.4.1')
                    <x-main-control id="3.2.4.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.4.2')
                    <x-main-control id="3.2.4.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.4.3')
                    <x-main-control id="3.2.4.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.4.4')
                    <x-main-control id="3.2.4.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.4.5')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.2.4.5.');
                    @endphp
                    <x-main-control id="3.2.4.5"
                        details="Cyber security review should be subject to follow-up reviews to check that:"
                        details_ar="" :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.4.5.A')
                    <x-sub-control id="3.2.4.5.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.2.4.5.B')
                    <x-sub-control id="3.2.4.5.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.4.5.C')
                    <x-sub-control id="3.2.4.5.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach

            <x-main-domain domain="Cyber Security Review" />
            <x-sub-domain subdomain="" id="3.2.5" />
            <x-sub-domain-info info_ar=""
                info="To ascertain with reasonable assurance whether the cyber security controls are securely designed and implemented, and whether the effectiveness of these controls is being monitored." />
            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.2.5.1')
                    <x-main-control id="3.2.5.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.2.5.2')
                    <x-main-control id="3.2.5.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-main-domain domain="3.3 Cyber Security Operations and Technology" />
            <x-sub-domain subdomain="" id="3.3.1" />
            <x-sub-domain-info info_ar=""
                info="To ensure that Member Organization staff’s cyber security responsibilities are embedded in staff agreements and staff are being screened before and during their employment lifecycle." />
            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.1.1')
                    <x-main-control id="3.3.1.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.1.2')
                    <x-main-control id="3.3.1.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.1.3')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.1.3.', true, 'SAMA-CSF-3.3.1.3.E');
                    @endphp
                    <x-main-control id="3.3.1.3" details="example" details_ar="" :status="$status" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.3.1.3.A')
                    <x-sub-control id="3.3.1.3.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.1.3.B')
                    <x-sub-control id="3.3.1.3.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.1.3.C')
                    <x-sub-control id="3.3.1.3.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.1.3.D')
                    <x-sub-control id="3.3.1.3.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.1.3.E')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.1.3.E.');
                    @endphp

                    <x-sub-control id="3.3.1.3.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.1.3.E.1')
                    <x-sub-control id="3.3.1.3.3.E.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.1.3.E.2')
                    <x-sub-control id="3.3.1.3.3.E.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="" id="3.3.2" />
            <x-sub-domain-info info_ar=""
                info="To prevent unauthorized physical access to the Member Organization information assets and to ensure its protection." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.2.1')
                    <x-main-control id="3.3.2.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.2.2')
                    <x-main-control id="3.3.2.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.2.3')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.2.3.');
                    @endphp
                    <x-main-control id="3.3.2.3" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.2.3.A')
                    <x-sub-control id="3.3.2.3.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.2.3.B')
                    <x-sub-control id="3.3.2.3.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.2.3.C')
                    <x-sub-control id="3.3.2.3.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.2.3.D')
                    <x-sub-control id="3.3.2.3.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.2.3.E')
                    <x-sub-control id="3.3.2.3.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-sub-domain subdomain="" id="3.3.3" />
            <x-sub-domain-info info_ar=""
                info="To support the Member Organization in having an accurate and up-to-date inventory and central insight in the physical / logical location and relevant details of all available information assets, in order to support its processes, such as financial, procurement, IT and cyber security processes." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.3.1')
                    <x-main-control id="3.3.3.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.3.2')
                    <x-main-control id="3.3.3.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.3.3')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.3.3.');
                    @endphp
                    <x-main-control id="3.3.3.3" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.3.3.A')
                    <x-sub-control id="3.3.3.3.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.3.3.B')
                    <x-sub-control id="3.3.3.3.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.3.3.C')
                    <x-sub-control id="3.3.3.3.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.3.3.D')
                    <x-sub-control id="3.3.3.3.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.3.3.E')
                    <x-sub-control id="3.3.3.3.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="" id="3.3.4" />
            <x-sub-domain-info info_ar=""
                info="To support the Member Organization in achieving a strategic, consistent, cost effective and end-to-end cyber security architecture." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.4.1')
                    <x-main-control id="3.3.4.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.4.2')
                    <x-main-control id="3.3.4.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.4.3.A')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.4.3.A');
                    @endphp
                    <x-main-control id="3.3.4.3" details="The cyber security architecture should include:"
                        details_ar="" :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.4.3.A')
                    <x-sub-control id="3.3.4.3.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.4.3.B')
                    <x-sub-control id="3.3.4.3.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.4.3.C')
                    <x-sub-control id="3.3.4.3.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.4.3.D')
                    <x-sub-control id="3.3.4.3.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.4.3.E')
                    <x-sub-control id="3.3.4.3.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="" id="3.3.5" />
            <x-sub-domain-info info_ar=""
                info="To ensure that the Member Organization only provides authorized and sufficient access privileges to approved users." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.5.1')
                    <x-main-control id="3.3.5.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.2')
                    <x-main-control id="3.3.5.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.3')
                    <x-main-control id="3.3.5.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.5.4')
                    @php
                        $status = getParentStatus(
                            $report,
                            'SAMA-CSF-3.3.5.4.',
                            true,
                            'SAMA-CSF-3.3.5.4.B,SAMA-CSF-3.3.5.4.F, SAMA-CSF-3.3.5.4.F.1, SAMA-CSF-3.3.5.4.F.4',
                        );
                    @endphp
                    <x-main-control id="3.3.5.4" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.A')
                    <x-sub-control id="3.3.5.4.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.B')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.5.4.B.');
                    @endphp
                    <x-sub-control id="3.3.5.4.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.B.1')
                    <x-sub-control id="3.3.5.4.B.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.B.2')
                    <x-sub-control id="3.3.5.4.B.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.B.3')
                    <x-sub-control id="3.3.5.4.B.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.B.4')
                    <x-sub-control id="3.3.5.4.B.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.B.5')
                    <x-sub-control id="3.3.5.4.B.5" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.B.6')
                    <x-sub-control id="3.3.5.4.B.6" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.B.7')
                    <x-sub-control id="3.3.5.4.B.7" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.C')
                    <x-sub-control id="3.3.5.4.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.D')
                    <x-sub-control id="3.3.5.4.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.E')
                    <x-sub-control id="3.3.5.4.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.F')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.5.4.F.');
                    @endphp
                    <x-sub-control id="3.3.5.4.F" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.F.1')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.5.4.F.1.');
                    @endphp
                    <x-sub-control id="3.3.5.4.F.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.F.1.A')
                    <x-sub-control id="3.3.5.4.F.1.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.F.1.B')
                    <x-sub-control id="3.3.5.4.F.1.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.F.2')
                    <x-sub-control id="3.3.5.4.F.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.F.3')
                    <x-sub-control id="3.3.5.4.F.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.F.4')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.5.4.F.4.');
                    @endphp
                    <x-sub-control id="3.3.5.4.F.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.F.4.A')
                    <x-sub-control id="3.3.5.4.F.4.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.F.4.B')
                    <x-sub-control id="3.3.5.4.F.4.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.5.4.F.4.C')
                    <x-sub-control id="3.3.5.4.F.4.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-sub-domain subdomain="" id="3.3.6" />
            <x-sub-domain-info info_ar=""
                info="To ensure that sufficient cyber security controls are formally documented and implemented for all applications, and that the compliance is monitored and its effectiveness is evaluated periodically within the Member Organization." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.6.1')
                    <x-main-control id="3.3.6.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.6.2')
                    <x-main-control id="3.3.6.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.6.3')
                    <x-main-control id="3.3.6.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.6.4')
                    <x-main-control id="3.3.6.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.6.5')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.6.5.');
                    @endphp
                    <x-main-control id="3.3.6.5" details="The application security standard should include:"
                        details_ar="" :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.6.5.A')
                    <x-sub-control id="3.3.6.5.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.6.5.B')
                    <x-sub-control id="3.3.6.5.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.6.5.C')
                    <x-sub-control id="3.3.6.5.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.6.5.D')
                    <x-sub-control id="3.3.6.5.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.6.5.E')
                    <x-sub-control id="3.3.6.5.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.6.5.F')
                    <x-sub-control id="3.3.6.5.F" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.6.5.G')
                    <x-sub-control id="3.3.6.5.G" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-sub-domain subdomain="" id="3.3.7" />
            <x-sub-domain-info info_ar=""
                info="To ensure that all change in the information assets within the Member Organization follow a strict change control process." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.7.1')
                    <x-main-control id="3.3.7.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.7.2')
                    <x-main-control id="3.3.7.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.7.3')
                    <x-main-control id="3.3.7.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.7.4')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.7.4.', true, 'SAMA-CSF-3.3.7.4.B');
                    @endphp
                    <x-main-control id="3.3.7.4" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.3.7.4.A')
                    <x-sub-control id="3.3.7.4.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.7.4.B')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.7.4.B. ');
                    @endphp
                    <x-sub-control id="3.3.7.4.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.7.4.B.1')
                    <x-sub-control id="3.3.7.4.B.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.7.4.B.2')
                    <x-sub-control id="3.3.7.4.B.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.7.4.B.3')
                    <x-sub-control id="3.3.7.4.B.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.7.4.B.4')
                    <x-sub-control id="3.3.7.4.B.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.7.4.C')
                    <x-sub-control id="3.3.7.4.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.7.4.D')
                    <x-sub-control id="3.3.7.4.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.7.4.E')
                    <x-sub-control id="3.3.7.4.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.7.4.F')
                    <x-sub-control id="3.3.7.4.F" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.7.4.G')
                    <x-sub-control id="3.3.7.4.G" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.7.4.H')
                    <x-sub-control id="3.3.7.4.H" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.7.4.I')
                    <x-sub-control id="3.3.7.4.I" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-sub-domain subdomain="" id="3.3.8" />
            <x-sub-domain-info info_ar=""
                info="To support that all cyber security controls within the infrastructure are formally documented and the compliance is monitored and its effectiveness is evaluated periodically within the Member Organization." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.8.1')
                    <x-main-control id="3.3.8.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.2')
                    <x-main-control id="3.3.8.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.3')
                    <x-main-control id="3.3.8.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.4')
                    <x-main-control id="3.3.8.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.5')
                    <x-main-control id="3.3.8.5" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.8.6')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.8.6.', true, 'SAMA-CSF-3.3.8.6.H');
                    @endphp
                    <x-main-control id="3.3.8.6" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.8.6.A')
                    <x-sub-control id="3.3.8.6.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.6.B')
                    <x-sub-control id="3.3.8.6.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.6.C')
                    <x-sub-control id="3.3.8.6.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.6.D')
                    <x-sub-control id="3.3.8.6.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.6.E')
                    <x-sub-control id="3.3.8.6.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.6.F')
                    <x-sub-control id="3.3.8.6.F" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.6.G')
                    <x-sub-control id="3.3.8.6.G" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.6.H')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.8.6.H.');
                    @endphp
                    <x-sub-control id="3.3.8.6.H" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.6.H.1')
                    <x-sub-control id="3.3.8.6.H.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.6.H.2')
                    <x-sub-control id="3.3.8.6.H.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.6.H.3')
                    <x-sub-control id="3.3.8.6.H.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.6.H.4')
                    <x-sub-control id="3.3.8.6.H.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.6.H.5')
                    <x-sub-control id="3.3.8.6.H.5" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.6.I')
                    <x-sub-control id="3.3.8.6.I" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.8.6.J')
                    <x-sub-control id="3.3.8.6.J" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach



            <x-sub-domain subdomain="" id="3.3.9" />
            <x-sub-domain-info info_ar=""
                info="To ensure that access to and integrity of sensitive information is protected and the originator of communication or transactions can be confirmed." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.9.1')
                    <x-main-control id="3.3.9.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.9.2')
                    <x-main-control id="3.3.9.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.9.3')
                    <x-main-control id="3.3.9.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.9.4')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.9.4.');
                    @endphp
                    <x-main-control id="3.3.9.4" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.9.4.A')
                    <x-sub-control id="3.3.9.4.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.9.4.B')
                    <x-sub-control id="3.3.9.4.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.9.4.C')
                    <x-sub-control id="3.3.9.4.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="" id="3.3.10" />
            <x-sub-domain-info info_ar=""
                info="To ensure that business and sensitive information of the Member Organization is securely handled by staff and protected during transmission and storage, when using personal devices." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.10.1')
                    <x-main-control id="3.3.10.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.10.2')
                    <x-main-control id="3.3.10.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.10.3')
                    <x-main-control id="3.3.10.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.10.4')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.10.4.');
                    @endphp
                    <x-main-control id="3.3.10.4" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.10.4.A')
                    <x-sub-control id="3.3.10.4.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.10.4.B')
                    <x-sub-control id="3.3.10.4.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.10.4.C')
                    <x-sub-control id="3.3.10.4.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.10.4.D')
                    <x-sub-control id="3.3.10.4.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.10.4.E')
                    <x-sub-control id="3.3.10.4.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-sub-domain subdomain="" id="3.3.11" />
            <x-sub-domain-info info_ar=""
                info="To ensure that the Member Organization’s business, customer and other sensitive information are protected from leakage or unauthorized disclosure when disposed." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.11.1')
                    <x-main-control id="3.3.11.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.11.2')
                    <x-main-control id="3.3.11.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.11.3')
                    <x-main-control id="3.3.11.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.11.4')
                    <x-main-control id="3.3.11.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.11.5')
                    <x-main-control id="3.3.11.5" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.11.6')
                    <x-main-control id="3.3.11.6" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-sub-domain subdomain="" id="3.3.12" />
            <x-sub-domain-info info_ar=""
                info="The Member Organization should define, approve, implement and monitor a cyber security standard for payment systems. The effectiveness of this process should be measured and periodically evaluated." />
            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.12.1')
                    <x-main-control id="3.3.12.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.12.2.A')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.12.2.');
                    @endphp
                    <x-main-control id="3.3.12.2" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.12.2.A')
                    <x-sub-control id="3.3.12.2.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.12.2.B')
                    <x-sub-control id="3.3.12.2.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.12.2.C')
                    <x-sub-control id="3.3.12.2.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-sub-domain subdomain="" id="3.3.13" />
            <x-sub-domain-info info_ar=""
                info="To ensure the Member Organization safeguards the confidentiality and integrity of the customer information and transactions." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.13.1')
                    <x-main-control id="3.3.13.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.2')
                    <x-main-control id="3.3.13.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.3')
                    <x-main-control id="3.3.13.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4')
                    @php
                        $status = getParentStatus(
                            $report,
                            'SAMA-CSF-3.3.13.4.',
                            true,
                            'SAMA-CSF-3.3.13.4.B,SAMA-CSF-3.3.13.4.B.6,SAMA-CSF-3.3.13.4.B.6.G,SAMA-CSF-3.3.13.4.C,SAMA-CSF-3.3.13.4.D',
                        );
                    @endphp
                    <x-main-control id="3.3.13.4" details="Electronic banking services security standard should cover"
                        details_ar="" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.A')
                    <x-sub-control id="3.3.13.4.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B')
                    @php
                        $status = getParentStatus(
                            $report,
                            'SAMA-CSF-3.3.13.4.',
                            true,
                            '3.3.13.4.B.',
                            true,
                            'SAMA-CSF-3.3.13.4.B.6, SAMA-CSF-3.3.13.4.B.6.G',
                        );
                    @endphp

                    <x-sub-control id="3.3.13.4.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.1')
                    <x-sub-control id="3.3.13.4.B.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.2')
                    <x-sub-control id="3.3.13.4.B.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.3')
                    <x-sub-control id="3.3.13.4.B.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.4')
                    <x-sub-control id="3.3.13.4.B.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.5')
                    <x-sub-control id="3.3.13.4.B.5" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.6')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.13.4.B.6.');
                    @endphp

                    <x-sub-control id="3.3.13.4.B.6" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.6.A')
                    <x-sub-control id="3.3.13.4.B.6.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.6.B')
                    <x-sub-control id="3.3.13.4.B.6.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.6.C')
                    <x-sub-control id="3.3.13.4.B.6.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.6.D')
                    <x-sub-control id="3.3.13.4.B.6.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.6.E')
                    <x-sub-control id="3.3.13.4.B.6.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.6.F')
                    <x-sub-control id="3.3.13.4.B.6.F" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.6.G')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.13.4.B.6.G.');
                    @endphp

                    <x-sub-control id="3.3.13.4.B.6.G" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.6.G.1')
                    <x-sub-control id="3.3.13.4.B.6.G.1" details="{{ $control->control_description }}"
                        details_ar="" :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.6.G.2')
                    <x-sub-control id="3.3.13.4.b.6.G.2" details="{{ $control->control_description }}"
                        details_ar="" :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.6.G.3')
                    <x-sub-control id="3.3.13.4.B.6.G.3" details="{{ $control->control_description }}"
                        details_ar="" :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.6.G.4')
                    <x-sub-control id="3.3.13.4.B.6.G.4" details="{{ $control->control_description }}"
                        details_ar="" :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.6.G.5')
                    <x-sub-control id="3.3.13.4.B.6.G.5" details="{{ $control->control_description }}"
                        details_ar="" :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.7')
                    <x-sub-control id="3.3.13.4.B.7" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.8')
                    <x-sub-control id="3.3.13.4.B.8" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.9')
                    <x-sub-control id="3.3.13.4.B.9" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.10')
                    <x-sub-control id="3.3.13.4.B.10" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.B.11')
                    <x-sub-control id="3.3.13.4.B.11" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.C')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.13.4.C.');
                    @endphp

                    <x-sub-control id="3.3.13.4.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.C.1')
                    <x-sub-control id="3.3.13.4.C.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.C.2')
                    <x-sub-control id="3.3.13.4.C.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.C.3')
                    <x-sub-control id="3.3.13.4.C.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.D')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.13.4.D.');
                    @endphp

                    <x-sub-control id="3.3.13.4.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.D.1')
                    <x-sub-control id="3.3.13.4.D.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.D.2')
                    <x-sub-control id="3.3.13.4.D.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.D.3')
                    <x-sub-control id="3.3.13.4.D.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.D.4')
                    <x-sub-control id="3.3.13.4.D.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.13.4.D.5')
                    <x-sub-control id="3.3.13.4.D.5" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="" id="3.3.14" />
            <x-sub-domain-info info_ar=""
                info="To ensure timely identification and response to anomalies or suspicious events within regard to information assets." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.14.1')
                    <x-main-control id="3.3.14.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.14.2')
                    <x-main-control id="3.3.14.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.14.3')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.14.3.');
                    @endphp
                    <x-main-control id="3.3.14.3" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.14.3.A')
                    <x-sub-control id="3.3.14.3.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.14.4')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.14.4.');
                    @endphp
                    <x-main-control id="3.3.14.4" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.14.4.A')
                    <x-sub-control id="3.3.14.4.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.14.4.B')
                    <x-sub-control id="3.3.14.4.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.14.4.C')
                    <x-sub-control id="3.3.14.4.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.14.4.D')
                    <x-sub-control id="3.3.14.4.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.14.4.E')
                    <x-sub-control id="3.3.14.4.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.14.4.F')
                    <x-sub-control id="3.3.14.4.F" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.14.4.G')
                    <x-sub-control id="3.3.14.4.G" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.14.4.H')
                    <x-sub-control id="3.3.14.4.H" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.14.4.I')
                    <x-sub-control id="3.3.14.4.I" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.14.4.J')
                    <x-sub-control id="3.3.14.4.J" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.14.4.K')
                    <x-sub-control id="3.3.14.4.K" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.14.4.L')
                    <x-sub-control id="3.3.14.4.L" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="" id="3.3.15" />
            <x-sub-domain-info info_ar=""
                info="To ensure timely identification and handling of cyber security incidents in order to reduce the (potential) business impact for the Member Organization." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.15.1')
                    <x-main-control id="3.3.15.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.15.2')
                    <x-main-control id="3.3.15.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.15.3')
                    <x-main-control id="3.3.15.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.15.4')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.15.4.');
                    @endphp
                    <x-main-control id="3.3.15.4" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.3.15.4.A')
                    <x-sub-control id="3.3.15.4.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.3.15.4.B')
                    <x-sub-control id="3.3.15.4.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.15.4.C')
                    <x-sub-control id="3.3.15.4.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.15.4.D')
                    <x-sub-control id="3.3.15.4.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.15.4.E')
                    <x-sub-control id="3.3.15.4.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.15.4.F')
                    <x-sub-control id="3.3.15.4.F" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.15.4.G')
                    <x-sub-control id="3.3.15.4.G" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.15.4.H')
                    <x-sub-control id="3.3.15.4.H" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.15.4.I')
                    <x-sub-control id="3.3.15.4.I" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.15.4.J')
                    <x-sub-control id="3.3.15.4.J" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.15.5')
                    <x-main-control id="3.3.15.5" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.15.6')
                    <x-main-control id="3.3.15.6" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.15.7')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.15.7.A');
                    @endphp
                    <x-main-control id="3.3.15.7" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.15.7.A')
                    <x-sub-control id="3.3.15.7.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.15.7.B')
                    <x-sub-control id="3.3.15.7.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.15.7.C')
                    <x-sub-control id="3.3.15.7.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.15.7.D')
                    <x-sub-control id="3.3.15.7.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.15.7.E')
                    <x-sub-control id="3.3.15.7.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.15.7.F')
                    <x-sub-control id="3.3.15.7.F" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.15.7.G')
                    <x-sub-control id="3.3.15.7.G" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.15.7.H')
                    <x-sub-control id="3.3.15.7.H" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.15.7.I')
                    <x-sub-control id="3.3.15.7.I" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.15.7.J')
                    <x-sub-control id="3.3.15.7.J" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.15.7.K')
                    <x-sub-control id="3.3.15.7.K" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="" id="3.3.16" />
            <x-sub-domain-info info_ar=""
                info="To obtain an adequate understanding of the Member Organization’s emerging threat posture." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.16.1')
                    <x-main-control id="3.3.16.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.16.2')
                    <x-main-control id="3.3.16.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.16.3')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.16.3.');
                    @endphp
                    <x-main-control id="3.3.16.3" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.16.3.A')
                    <x-sub-control id="3.3.16.3.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.16.3.B')
                    <x-sub-control id="3.3.16.3.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.16.3.C')
                    <x-sub-control id="3.3.16.3.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.16.3.D')
                    <x-sub-control id="3.3.16.3.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.16.3.E')
                    <x-sub-control id="3.3.16.3.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.16.3.F')
                    <x-sub-control id="3.3.16.3.F" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="" id="3.3.17" />
            <x-sub-domain-info info_ar=""
                info="To ensure timely identification and effective mitigation of application and infrastructure vulnerabilities in order to reduce the likelihood and business impact for the Member Organization." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.3.17.1')
                    <x-main-control id="3.3.17.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.3.17.2')
                    <x-main-control id="3.3.17.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.17.3')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.3.17.3.');
                    @endphp
                    <x-main-control id="3.3.17.3" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.17.3.A')
                    <x-sub-control id="3.3.17.3.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.17.3.B')
                    <x-sub-control id="3.3.17.3.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.17.3.C')
                    <x-sub-control id="3.3.17.3.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif



                @if ($control->control_id == 'SAMA-CSF-3.3.17.3.D')
                    <x-sub-control id="3.3.17.3.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.17.3.E')
                    <x-sub-control id="3.3.17.3.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.3.17.3.F')
                    <x-sub-control id="3.3.17.3.F" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach

            <x-main-domain domain="3.4	Third Party Cyber Security" />
            <x-sub-domain subdomain="Contract and Vendor Management" id="3.4.1" />
            <x-sub-domain-info info_ar=""
                info="To ensure that the Member Organization’s approved cyber security requirements are appropriately addressed before signing the contract, and the compliance with the cyber security requirements is being monitored and evaluated during the contract life-cycle." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.4.1.1')
                    <x-main-control id="3.4.1.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.4.1.2')
                    <x-main-control id="3.4.1.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.4.1.3')
                    <x-main-control id="3.4.1.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.4.1.4')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.4.1.4.');
                    @endphp
                    <x-main-control id="3.4.1.4" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.1.4.A')
                    <x-sub-control id="3.4.1.4.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.1.4.B')
                    <x-sub-control id="3.4.1.4.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.1.4.C')
                    <x-sub-control id="3.4.1.4.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.1.5')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.4.1.5.');
                    @endphp
                    <x-main-control id="3.4.1.5" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.1.5.A')
                    <x-sub-control id="3.4.1.5.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.1.5.B')
                    <x-sub-control id="3.4.1.5.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.4.1.5.C')
                    <x-sub-control id="3.4.1.5.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.4.1.5.D')
                    <x-sub-control id="3.4.1.5.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.4.1.5.E')
                    <x-sub-control id="3.4.1.5.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.4.1.5.F')
                    <x-sub-control id="3.4.1.5.F" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.4.1.5.G')
                    <x-sub-control id="3.4.1.5.G" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.1.6')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.4.1.6.');
                    @endphp
                    <x-main-control id="3.4.1.6" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.4.1.6.A')
                    <x-sub-control id="3.4.1.6.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-sub-domain subdomain="Contract and Vendor Management" id="3.4.2" />
            <x-sub-domain-info info_ar=""
                info="To ensure that the Member Organization’s cyber security requirements are appropriately addressed before, during and while exiting outsourcing contracts." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.4.2.1')
                    <x-main-control id="3.4.2.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.4.2.2')
                    <x-main-control id="3.4.2.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.4.2.3')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.4.2.3.');
                    @endphp
                    <x-main-control id="3.4.2.3" details="{{ $control->control_description }}" details_ar=""
                        :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.2.3.A')
                    <x-sub-control id="3.4.2.3.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.4.2.3.B')
                    <x-sub-control id="3.4.2.3.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.2.3.C')
                    <x-sub-control id="3.4.2.3.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach


            <x-sub-domain subdomain="Cloud Computing" id="3.4.3" />
            <x-sub-domain-info info_ar=""
                info="To ensure that all functions and staff within the Member Organization are aware of the agreed direction and position on hybrid and public cloud services, the required process to apply for hybrid and public cloud services, the risk appetite on hybrid and public cloud services and the specific cyber security requirements for hybrid and public cloud services." />

            @foreach ($report as $control)
                @if ($control->control_id == 'SAMA-CSF-3.4.3.1')
                    <x-main-control id="3.4.3.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.4.3.2')
                    <x-main-control id="3.4.3.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.4.3.3')
                    <x-main-control id="3.4.3.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.4.3.4')
                    @php
                        $status = getParentStatus(
                            $report,
                            'SAMA-CSF-3.4.3.4.',
                            true,
                            'SAMA-CSF-3.4.3.4.A,SAMA-CSF-3.4.3.4.B,SAMA-CSF-3.4.3.4.C,SAMA-CSF-3.4.3.4.D,SAMA-CSF-3.4.3.4.E,SAMA-CSF-3.4.3.4.F,SAMA-CSF-3.4.3.4.G,SAMA-CSF-3.4.3.4.H',
                        );
                    @endphp
                    <x-main-control id="3.4.3.4" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.A')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.4.3.4.A.');
                    @endphp


                    <x-sub-control id="3.4.3.4.A" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.A.1')
                    <x-sub-control id="3.4.3.4.A.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.A.2')
                    <x-sub-control id="3.4.3.4.A.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.A.3')
                    <x-sub-control id="3.4.3.4.A.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.B')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.4.3.4.B.');
                    @endphp
                    <x-sub-control id="3.4.3.4.B" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.B.1')
                    <x-sub-control id="3.4.3.4.B.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.C')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.4.3.4.C.');
                    @endphp
                    <x-sub-control id="3.4.3.4.C" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.C.1')
                    <x-sub-control id="3.4.3.4.C.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.D')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.4.3.4.D.');
                    @endphp
                    <x-sub-control id="3.4.3.4.D" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.D.1')
                    <x-sub-control id="3.4.3.4.D.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.E')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.4.3.4.E.');
                    @endphp
                    <x-sub-control id="3.4.3.4.E" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif


                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.E.1')
                    <x-sub-control id="3.4.3.4.E.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.F')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.4.3.4.F.');
                    @endphp
                    <x-sub-control id="3.4.3.4.F" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.F.1')
                    <x-sub-control id="3.4.3.4.F.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.G')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.4.3.4.G.');
                    @endphp
                    <x-sub-control id="3.4.3.4.G" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.G.1')
                    <x-sub-control id="3.4.3.4.G.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.G.2')
                    <x-sub-control id="3.4.3.4.G.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.G.3')
                    <x-sub-control id="3.4.3.4.G.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.H')
                    @php
                        $status = getParentStatus($report, 'SAMA-CSF-3.4.3.4.H.');
                    @endphp
                    <x-sub-control id="3.4.3.4.H" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" :status="$status" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.H.1')
                    <x-sub-control id="3.4.3.4.H.1" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.H.2')
                    <x-sub-control id="3.4.3.4.H.2" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif

                @if ($control->control_id == 'SAMA-CSF-3.4.3.4.H.3')
                    <x-sub-control id="3.4.3.4.H.3" details="{{ $control->control_description }}" details_ar=""
                        :control="$control" />
                @endif
            @endforeach
        </tbody>

    </table>
@endsection
