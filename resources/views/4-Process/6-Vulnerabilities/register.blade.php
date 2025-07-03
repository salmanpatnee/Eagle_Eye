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
            color: #FFF !important;
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

        .dheadersec>div {
            width: 33%;
            text-align: center;
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
            <div style="margin-left: -50px;">
                <a href="{{ route('va.register.excel', request()->query()) }}" class="btn-report">
                    <p>تنزيل بصيغة إكسل</p>
                    <p>Download in Excel</p>
                </a>
                <a href="{{ route('va.register', array_merge(request()->query(), ['pdf' => 1])) }}" class="btn-report">
                    <p>تنزيل بصيغة بي دي إف</p>
                    <p>Download as PDF</p>
                </a>
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
                <h3>سجل الثغرات</h3>
                <h3>Vulnerability Register</h3>
            </div>
            <div>
                <form action="">
                    <div class="filter-row">

                        <div class="col">
                            <label class="form-label" for="assets">
                                <p>Affected Assets</p>
                                <p>الأصول المتأثرة</p>
                            </label>
                            <select class="form-select" name="assets" id="assets" onchange="this.form.submit()">
                                <option value="">All</option>
                                @foreach ($affectedAssets as $affectedAsset)
                                    <option value="{{ $affectedAsset->asset_id }}"
                                        @if ($affectedAsset->asset_id == request('assets')) selected @endif>{{ $affectedAsset->asset_id }}
                                        -
                                        {{ $affectedAsset->asset_name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label" for="status">
                                <p>Status</p>
                                <p>الحالة</p>
                            </label>



                            <select class="form-select" name="status" id="status" onchange="this.form.submit()">
                                <option value="" @if (old('status', request('status')) == '') selected @endif>Select Status
                                </option>
                                <option value="Open - Not Started" @if (old('status', request('status')) == 'Open - Not Started') selected @endif>
                                    Open - Not Started
                                </option>
                                <option value="Open - WIP" @if (old('status', request('status')) == 'Open - WIP') selected @endif>
                                    Open - WIP
                                </option>
                                <option value="Closed" @if (old('status', request('status')) == 'Closed') selected @endif>
                                    Closed
                                </option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label" for="resolution_date">
                                <p>Resolution Date</p>
                                <p>تاريخ الحل</p>
                            </label>
                            <input type="date" class="form-select" name="resolution_date" id="resolution_date"
                                value="{{ old('resolution_date', request('resolution_date')) }}"
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

                {{-- <tr>
                    <th colspan="18">
                        <p>Vulnerability register</p>
                    </th>
                </tr> --}}
                <tr>
                    <th class="bg-light-gray">
                        <p>S.No</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Vulnerability ID</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Title</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Vulnerability Description</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>CVE Number</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>CVSS Score</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Affected Assets</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Threat Analysis</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Threat Severity (Used for Dynamic Prioritizaton)</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Risk Likelihood</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Risk Severity</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Risk Level</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Owner</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Status</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>First Observation Date</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Due date</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Resolution Date</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Comments</p>
                    </th>
                </tr>
            </thead>
            <tbody style="background-color: white">
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="{{ route('va.show', $row->va_id) }}">
                                {{ $row->va_id }}
                            </a>
                        </td>
                        <td>{{ $row->va_name }}</td>
                        <td>
                            <div style="width: 300px;white-space: normal;">
                                {{ $row->va_master_description }}
                            </div>
                        </td>
                        <td>{{ $row->cveid }}</td>
                        <td>{{ $row->cvss_score }}</td>
                        <td>{!! $row->assets !!}</td>
                        <td>{!! $row->threat_agents !!}</td>
                        <td>
                            <div style="width: 300px;white-space: normal;">
                                {{ $row->threat_agent_description }}
                            </div>
                        </td>
                        <td>{{ $row->risk_likelihood }}</td>
                        <td>{{ $row->risk_impact }}</td>
                        <td>{{ $row->risk_appetite_color }}</td>
                        <td><a href="{{ route('ownerreg.show', $row->owner_id) }}">{{ $row->owner_name }}</a></td>
                        <td>{{ $row->va_pt_status }}</td>
                        <td>{{ $row->discovery_date }}</td>
                        <td>{{ $row->due_date }}</td>
                        <td>{{ $row->due_date }}</td>
                        <td>
                            <div style="width: 300px;white-space: normal;">
                                {!! $row->va_pt_finding_description !!}
                            </div>
                        </td>
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
