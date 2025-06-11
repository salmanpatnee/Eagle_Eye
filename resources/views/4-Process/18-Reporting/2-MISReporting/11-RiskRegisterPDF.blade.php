<!DOCTYPE html>
<html lang="en" dir="rtl">

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
            /* font-family: 'DejaVu Sans', sans-serif; */
            direction: rtl;
            background: #fff;
            font-family: "Roboto", sans-serif;
            font-size: 12px;
            margin: 0;
        }

        #main-header {
            background: linear-gradient(to right, #203864, #2e74b6);
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            direction: ltr;
            box-sizing: border-box;
        }

        main {
            padding: 0 1em;
        }

        #main-header>div {
            width: 33%;
        }

        .breadcrumbs {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }

        ul.breadcrumbs li {
            margin-right: .5em;
            font-size: 15px;
            font-weight: 500;
        }

        .breadcrumbs i {
            color: white;
            font-size: 40px;
        }

        .action-buttons-container {
            display: flex;
            text-align: center;
            justify-content: center;
        }

        .btn-report {
            background-color: #00fbff;
            color: black;
            border-radius: 20px;
            border: solid #00fbff;
            transition-duration: 0.3s;
            font-size: 14px;
            text-align: center;
            margin: 0 .2em;
            text-decoration: none;
            padding: .2em .5em;
        }

        .btn-report:hover {
            background-color: white;
            border: solid 2px black;
            color: black;
        }

        .extra-buttons-container {
            text-align: right;
        }

        .btn-back {
            background-color: black;
            display: inline-block;
            color: white;
            padding: 0.7em 4em;
            border: 1px solid black;
            border-radius: 10px;
            font-size: 12px;
            text-decoration: none;
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

        .bg-gradient {
            background: linear-gradient(to right, #2c3a83 30%, #1a8884 100%) !important;
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

        .bg-light-gray {
            background-color: #F2F2F2 !important;
        }

        .bg-blue {
            background-color: #2C3A83 !important;
        }

        .bg-teal {
            background-color: #00b9ac !important;
        }

        .bg-dark {
            background-color: #363c48 !important;
        }

        .bg-aqua {
            background-color: #E2FAFC !important
        }

        .bg-green {
            background-color: #92D14F !important;
        }

        .be-blue {
            border-bottom-color: #2C3A83;
        }

        .be-teal {
            border-bottom-color: teal;
        }

        .be-dark {
            border-bottom-color: #363c48;
        }

        .text-light {
            color: #fff;
        }

        /* Prevent page breaks inside tables */
        table {
            page-break-inside: auto;
            width: 100%;
            /* Ensure table width is appropriate */
        }

        /* Prevent page breaks inside table rows */
        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        /* Prevent page breaks inside divs */
        div {
            page-break-inside: avoid;
        }

        /* Force page breaks before specific elements if needed */
        .page-break {
            page-break-before: always;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mt-0 {
            margin-top: 0;
        }

        .py-1 {
            padding-block: .5em;
        }

        .py-2 {
            padding-block: 1em;
        }

        .px-1 {
            padding-left: .5em;
            padding-right: .5em;
        }

        .mb-1 {
            margin-bottom: 1em;
        }



        .tr-border-0,
        .tr-border-0 th,
        .tr-border-0 td {
            border: none
        }

        .text-start {
            text-align: right;
        }

        .text-end {
            text-align: left;
        }

        th {
            padding: .5em;
            font-weight: bold;
        }

        th,
        .bordered {
            border: 1px solid black;
        }

        td {
            padding: .5em;
            text-align: center;
        }

        th.description {
            /* text-align: left; */
            width: 230px;

        }

        @page {
            margin-right: 0px;
            margin-left: 0px;
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
            <h1 class="arabic-text">سجل المخاطر</h1>
            <h1>Risk Register</h1>
            <p class="enghead">Current Date: {{ now()->format('d-m-Y') }}</p>


        </div>
        <table>
            <thead>
                <tr>
                    <th colspan="29"
                        style="background-color: #373E49; color: white; padding: .5em 0; border: 1px solid #000; font-size: 16px; font-weight: bold;">
                        Risk register
                    </th>
                </tr>
                <tr>
                    <th class="bg-light-gray">
                        <p>S.No</p>
                    </th>
                    <th class="bg-light-gray">

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
                        <p>Inherent risk magnitude/impact</p>
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
                </tr> --}}
            </thead>
        </table>
        {{-- @yield('content') --}}
    </main>
</body>

</html>
