<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tag  -->
    <title>Compliance 360</title>
    <meta name="title" content="Saturn-V GRC Tool">
    <meta name="description" content="Zain Cloud GRC Tool">
    <!-- Boxicons Icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/report.css') }}">
    <style>
        .tablehead tr th {
            background-color: #373E49;
            padding: .5em 0;
            border: 1px solid #fff;
        }

        .tablehead tr th p {
            margin: 0;
            line-height: 1.5em;
            white-space: nowrap;
        }

        th.bg-light-gray {
            background-color: #203864 !important;
            color: #fff !important;
            padding: 0.7em !important;
            font-weight: 500;
        }

        .rtablearea {
            line-height: 10px;
            position: absolute;
            width: 100%;
            top: 200px;
        }

        tbody tr {
            vertical-align: top;
        }

        tbody td {
            white-space: nowrap;
            border: 1px solid #000;
            padding: 12px;
            line-height: 1.2em;
            text-align: center;
        }

        tbody td.list {

            text-align: left;
        }

        tbody td span {
            line-height: 1.5em;
        }

        tbody td a {
            margin-bottom: .5em;
            display: inline-block;
            color: black;
        }

        tr:nth-child(even) {
            background-color: #D9D9D9;
            /* White for even rows */
        }

        td.big-text {
            white-space: initial;
            /* width: 200px; */
        }

        td.big-text p {
            width: 300px;
            text-align: left;
        }

        @media (min-width: 1024px) and (max-width: 1179px) {
            .rtablearea {
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>
    <div class="fixposition">
        <div class="dheadersec">
            <div class="dheaderleft">
                <div class="dheadericon">
                    <a href="/compliance" class="text-white">
                        <i class='bx bx-home'></i>
                    </a>
                </div>
                <div class="dheadertext">
                    <p>العمليات</p>
                    <p>Processes</p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                @include('partials.roles')
                <div class="dheaderright">
                    <button type="dbutton" class="dbutton" onclick="goBack()">
                        <p>للخلف</p>
                        <p>Back</p>
                    </button>
                </div>
            </div>
        </div>
        <div class="herosec">
            <div class="herosecleft">
                <h3>منهجية المخاطر</h3>
                <h3>Risk Methodology</h3>
            </div>
            <div>
                {{-- <form action="/risk-register">
                    <div class="filter-row">

                        <div class="col">
                            <label class="form-label" for="risk">
                                <p>Risk</p>
                                <p>المخاطر</p>
                            </label>
                            <select class="form-select" name="risk" id="risk" onchange="this.form.submit()">
                                <option value="">All</option>
                                @foreach ($risks as $risk)
                                    <option value="{{ $risk->risk_id }}"
                                        @if ($risk->risk_id == request('risk')) selected @endif>{{ $risk->risk_id }} -
                                        {{ $risk->risk_name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label" for="asset_group">
                                <p>Risk Treatment Action Status</p>
                                <p>خيارات علاج المخاطر</p>
                            </label>
                            <select class="form-select" name="riskTreatment" id="riskTreatment"
                                onchange="this.form.submit()">
                                <option value="">All</option>
                                @foreach ($riskTreatments as $riskTreatment)
                                    <option value="{{ $riskTreatment->risk_treatment_id }}"
                                        @if ($riskTreatment->risk_treatment_id == request('riskTreatment')) selected @endif>
                                        {{ $riskTreatment->risk_treatment_id }} -
                                        {{ $riskTreatment->risk_treatment_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label" for="asset_group">
                                <p>Last Evalution Date</p>
                                <p>تاريخ التقييم الأخير</p>
                            </label>
                            <input type="date" class="form-select" name="evalutionDate" id="evalutionDate"
                                value="{{ old('evalutionDate', request('evalutionDate')) }}"
                                onchange="this.form.submit()">

                        </div>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
    <div class="rtablearea">
        <table class="table-response">
            <thead class="tablehead">


                <tr>

                    <th class="bg-light-gray" position:sticky; left: 0; z-index: 3;">
                        {{-- <p>رمز المخاطر</p> --}}
                        <p>Risk Methodology ID</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Owner</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Background</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Asset Identification</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Threat Identification</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Vulnerability Identification</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Risk Appetite</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Risk Assessment Approach</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Risk Response</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Residual Risk</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Risk Acceptance</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Risk Audit</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Risk Change Management</p>
                    </th>

                </tr>
            </thead>
            <tbody style="background-color: white">
                <tr>
                    <td>
                        {{ $riskMethodology->risk_methodology_id }}
                    </td>
                    <td>
                        <a href="{{ route('owners.show', $riskMethodology->owner?->owner_id) }}">
                            {{ $riskMethodology->owner?->owner_name }}
                        </a>
                    </td>
                    <td class="big-text">
                        <p>

                            {{ $riskMethodology->background }}
                        </p>
                    </td>
                    <td>
                        <a href="{{ route('assets.show', $riskMethodology->asset?->asset_id) }}">

                            {{ $riskMethodology->asset?->asset_name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('threatagent.show', $riskMethodology->threat?->threat_agent_id) }}">

                            {{ $riskMethodology->threat?->threat_agent_name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('va.show', $riskMethodology->vulnerability?->va_id) }}">

                            {{ $riskMethodology->vulnerability?->va_name }}
                        </a>
                    </td>
                    <td>
                        {{ $riskMethodology->appetite?->risk_appetite_name }}
                        {{ $riskMethodology->appetite?->risk_score }}
                    </td>
                    <td class="big-text">
                        <p>{{ $riskMethodology->risk_assessment_approach }}</p>
                    </td>
                    <td>
                        {{ $riskMethodology->risk_treatment }}
                    </td>
                    <td>
                        {{ $riskMethodology->residual_risk }}
                    </td>
                    <td>
                        {{ $riskMethodology->acceptance?->risk_acceptance_source }}
                    </td>
                    <td class="big-text">
                        <p>{{ $riskMethodology->risk_audit }}</p>
                    </td>
                    <td class="big-text">
                        <p>{{ $riskMethodology->risk_change_management }}</p>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
