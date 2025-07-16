<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vulnerability Register</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,300;1,400;1,500&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@200;300;400;500;600;700;800;900&display=swap");

        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: normal;
            src: url('{{ asset('fonts/DejaVuSans.ttf') }}') format('truetype');
        }

        body {
            background: #fff;
            font-family: "Roboto", sans-serif;
            font-size: 12px;
            margin: 0;
        }

        main {
            padding: 0 1em;
        }

        .report-info {
            text-align: center;
            margin: 2em 0;
            font-weight: 700;
            color: black;
            line-height: 25px;
            font-size: 15px;
        }

        .report-info h1 {
            font-size: 25px;
            line-height: 35px;
        }

        .arabic-text {
            font-family: "Noto Sans Arabic", sans-serif;
        }

        p {
            margin: 0;
        }

        th p,
        td p {
            font-size: 12px;
            line-height: 1.5em;
        }

        table,
        tr,
        th,
        td {
            border-collapse: collapse;
            padding: .5em;
        }

        td {
            border: 1px solid black;
        }

        .bg-blue {
            background-color: #2C3A83 !important;
        }

        .text-light {
            color: #fff;
        }

        table {
            page-break-inside: auto;
            width: 100%;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        .mt-0 {
            margin-top: 0;
        }

        th {
            padding: .5em;
            font-weight: normal;
            font-size: 8px;
        }

        th,
        .bordered {
            border: 1px solid black;
        }

        td {
            padding: .5em;
            text-align: center;
            vertical-align: top;
            font-size: 8px;
        }

        th.description {
            width: 230px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>

    <main>
        <div class="report-info">
            @if ($organizationData)
                <img src="{{ asset('storage/' . $organizationData?->organization_logo) }}" alt="Organization Logo"
                    width="200" class="mb-4">
                <h2 class="arabic-text mt-0">{{ $organizationData->organization_name_arabic }}</h2>
                <h2 class="arabic-text mt-0">{{ $organizationData->organization_name_english }}</h2>
            @endif
            <h2>Vulnerability Register</h2>

            <p class="enghead">Current Date: {{ now()->format('d-m-Y') }}</p>
        </div>
        <table class="table-response">
            <thead class="tablehead">
                <tr>
                    <th class="bg-blue text-light">
                        <p>S.No</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Vulnerability ID</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Title</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Description</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>CVE Number</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>CVSS Score</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Affected Assets</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Threat Analysis</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Threat Severity</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Risk Likelihood</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Risk Severity</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Risk Level</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Owner</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Status</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>First Observation Date</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Due Date</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Resolution Date</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Comments</p>
                    </th>
                </tr>
            </thead>
            <tbody style="background-color: white">
                @foreach ($report as $row)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">
                            <a href="{{ route('va.show', $row->va_id) }}">
                                {{ $row->va_id }}
                            </a>
                        </td>
                        <td class="text-center">{{ $row->va_name }}</td>
                        <td class="text-center">
                            <div style="width: 300px;white-space: normal;">
                                {{ $row->va_master_description }}
                            </div>
                        </td>
                        <td class="text-center">{{ $row->cveid }}</td>
                        <td class="text-center">{{ $row->cvss_score }}</td>
                        <td class="text-center">{!! $row->assets !!}</td>
                        <td class="text-center">{!! $row->threat_agents !!}</td>
                        <td class="text-center">
                            <div style="width: 300px;white-space: normal;">
                                {{ $row->threat_agent_description }}
                            </div>
                        </td>
                        <td class="text-center">{{ $row->risk_likelihood }}</td>
                        <td class="text-center">{{ $row->risk_impact }}</td>
                        <td class="text-center">{{ $row->risk_appetite_color }}</td>
                        <td class="text-center"><a
                                href="{{ route('owners.show', $row->owner_id) }}">{{ $row->owner_name }}</a></td>
                        <td class="text-center">{{ $row->va_pt_status }}</td>
                        <td class="text-center">{{ $row->discovery_date }}</td>
                        <td class="text-center">{{ $row->due_date }}</td>
                        <td class="text-center">{{ $row->due_date }}</td>
                        <td class="text-center">
                            <div style="width: 300px;white-space: normal;">
                                {!! $row->va_pt_finding_description !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>
