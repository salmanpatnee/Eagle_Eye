<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Audit Plan Report</title>

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
            font-size: 12px;
        }

        th,
        .bordered {
            border: 1px solid black;
        }

        td {
            padding: .5em;
            text-align: center;
            vertical-align: top;
            font-size: 12px;
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
            <h2>Audit Plan Summary Report</h2>

            <p class="enghead">Current Date: {{ now()->format('d-m-Y') }}</p>
        </div>
        <table class="table-response">
            <thead class="tablehead">
                <tr>
                    <th class="bg-blue text-light">
                        <p>S.No</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Audit ID</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Audit Name</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Auditee</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Team</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Auditor</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>Start Date</p>
                    </th>
                    <th class="bg-blue text-light">
                        <p>End Date</p>
                    </th>
                </tr>
            </thead>
            <tbody style="background-color: white">
                @foreach ($report as $auditPlan)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td><a
                                href="{{ route('audit.plan.show', $auditPlan['audit_id']) }}">{{ $auditPlan['audit_id'] }}</a>
                        </td>
                        <td>{{ $auditPlan['audit_name'] }}</td>
                        <td>{{ $auditPlan['auditee'] }}</td>
                        <td>{{ $auditPlan['auditor_organization'] }}</td>
                        <td><a
                                href="{{ route('auditors.show', $auditPlan['auditor_id']) }}">{{ $auditPlan['auditor'] }}</a>
                        </td>

                        <td>{{ $auditPlan['audit_plan_start_date'] }}</td>
                        <td>{{ $auditPlan['audit_plan_end_date'] }}</td>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>
