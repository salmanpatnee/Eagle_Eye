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
            border: 1px solid #000;
        }

        .tablehead tr th p {
            margin: 0;
            line-height: 1.5em;
            white-space: nowrap;
        }

        th.bg-light-gray {
            background-color: #D9D9D9 !important;
            color: #373E49 !important;
            padding: 0.7em !important;
            font-weight: 500;
        }

        .rtablearea {
            line-height: 10px;
            position: absolute;
            width: 100%;
            top: 340px;
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
            color: #000;
        }

        tr:nth-child(even) {
            background-color: #D9D9D9;
            /* White for even rows */
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
                <h3>سجل المخاطر</h3>
                <h3>Risk Register</h3>
            </div>
            <div>
                <form action="/risk-register">
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
                </form>
            </div>
        </div>
    </div>
    <div class="rtablearea">
        <table class="table-response">
            <thead class="tablehead">

                <tr>
                    <th colspan="29">
                        {{-- <p>تفاصيل المخاطر</p> --}}
                        <p>Risk register</p>
                    </th>
                </tr>
                <tr>
                    <th class="bg-light-gray">
                        <p>S.No</p>
                    </th>
                    <th class="bg-light-gray" position:sticky; left: 0; z-index: 3;">
                        {{-- <p>رمز المخاطر</p> --}}
                        <p>Risk identifier</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Risk area (scope of risk)</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Risk owner</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Date of risk identification</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Description of the risk</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Risk cause</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Threat</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Risk analysis and consequences</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Date of risk analysis and evaluation</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Inherent risk likelihood (1-5)</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Inherent risk magnitude/impact (1-5)</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Overall inherent risk rating</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Updated overall inherent risk rating (manual override)</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Type of treatment action</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Risk treatment description</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Owner of the treatment action</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Treatment action status</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Deadline for action</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Residual risk description</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Residual risk likelihood (1-5)</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Residual risk magnitude/impact (1-5)</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Overall residaul risk rating</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Following steps description</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Last evaluation date</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Comment</p>
                    </th>
                </tr>
            </thead>
            <tbody style="background-color: white">
                @foreach ($riskRegister as $row)
                    <tr>
                        <td class="text-center">
                            {{ $loop->index + 1 }}
                        </td>
                        <td>
                            <a href="{{ route('riskmaster.show', $row->risk_id) }}" target="_blank">
                                {{ $row->risk_id }}
                            </a>
                        </td>
                        <td class="list">{!! $row->categories !!}</td>
                        <td>{{ $row->owner_name }}</td>
                        <td>&nbsp;</td>
                        <td>{{ $row->risk_description }}</td>
                        <td>&nbsp;</td>
                        <td class="list">{!! $row->agents !!}</td>
                        <td>{{ $row->risk_assessment_description }}</td>
                        <td>{{ $row->date_of_risk_analysis }}</td>
                        <td>{{ $row->risk_inherent_likelihood }}</td>
                        <td>{{ $row->risk_inherent_impact }}</td>
                        <td>{{ $row->risk_inherent_score }}</td>
                        <td>&nbsp;</td>
                        <td>{{ $row->risk_treatment_name }}</td>
                        <td>{{ $row->risk_treatment_description }}</td>
                        <td class="list">{!! $row->control_owner !!}</td>
                        <td class="list">{!! $row->status !!}</td>
                        <td>{{ $row->corrective_action_due_date }}</td>
                        <td style="background-color: {{ $row->risk_appetite_color }};">{{ $row->risk_appetite }}</td>
                        <td>{{ $row->risk_likelihood }}</td>
                        <td>{{ $row->risk_impact }}</td>
                        <td>{{ $row->risk_score }}</td>
                        <td>{{ $row->preventive_action }}</td>
                        <td>{{ $row->last_evaluation_date }}</td>
                        <td>{{ $row->lesson_learned }}</td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
