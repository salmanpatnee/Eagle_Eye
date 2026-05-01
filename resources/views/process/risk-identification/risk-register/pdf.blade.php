<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Risk Register</title>

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
            <h2>Risk Register</h2>
            <p>Current Date: {{ now()->format('d-m-Y') }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="bg-blue text-light"><p>S.No</p></th>
                    <th class="bg-blue text-light"><p>Risk ID</p></th>
                    <th class="bg-blue text-light"><p>Risk Description</p></th>
                    <th class="bg-blue text-light"><p>Category</p></th>
                    <th class="bg-blue text-light"><p>Owner</p></th>
                    <th class="bg-blue text-light"><p>Threat Agents</p></th>
                    <th class="bg-blue text-light"><p>Inherent Likelihood</p></th>
                    <th class="bg-blue text-light"><p>Inherent Impact</p></th>
                    <th class="bg-blue text-light"><p>Inherent Risk Appetite</p></th>
                    <th class="bg-blue text-light"><p>Risk Treatment</p></th>
                    <th class="bg-blue text-light"><p>Control Owner</p></th>
                    <th class="bg-blue text-light"><p>Control Status</p></th>
                    <th class="bg-blue text-light"><p>Due Date</p></th>
                    <th class="bg-blue text-light"><p>Residual Likelihood</p></th>
                    <th class="bg-blue text-light"><p>Residual Impact</p></th>
                    <th class="bg-blue text-light"><p>Residual Risk Appetite</p></th>
                </tr>
            </thead>
            <tbody style="background-color: white">
                @forelse ($riskRegister as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->risk_id }}</td>
                        <td>{{ $row->risk_description }}</td>
                        <td>{!! $row->categories !!}</td>
                        <td>{{ $row->owner_name }}</td>
                        <td>{!! $row->agents !!}</td>
                        <td>{{ $row->risk_inherent_likelihood }}</td>
                        <td>{{ $row->risk_inherent_impact }}</td>
                        <td>{{ $row->risk_appetite_name }}</td>
                        <td>{{ $row->risk_treatment_name }}</td>
                        <td>{!! $row->control_owner !!}</td>
                        <td>{!! $row->status !!}</td>
                        <td>{{ $row->corrective_action_due_date }}</td>
                        <td>{{ $row->risk_likelihood }}</td>
                        <td>{{ $row->risk_impact }}</td>
                        <td>{{ $row->risk_appetite }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="16">No risk register records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
</body>

</html>
