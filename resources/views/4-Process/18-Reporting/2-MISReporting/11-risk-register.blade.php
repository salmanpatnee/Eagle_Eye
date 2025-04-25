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
        th p {
            line-height: 1em;
        }

        .tablebody tr td {

            white-space: nowrap;
            line-height: 25px;
        }

        .tablearea {
            margin-top: 0px;
            line-height: 10px;
            position: relative;
            z-index: 50;
        }

        .risk-status-content {
    position: absolute;
    width: 100%;
    top: 194px;
}

        .card-header {
            background-color: #203864;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        li.list-group-item {
            font-size: 12px;
        }

        .herosec {
            padding-bottom: 30px !important;
            
        }
    </style>
</head>

<body style="background-color: #f6f6f6">
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
                <!--<div class="dheadericon">-->
                <!--    <i class='bx bx-right-arrow-alt'></i>-->
                <!--</div>-->
                <!--<div class="dheadertext">-->
                <!--    <p>تقرير المخاطر مقابل مجموعة الأصول</p>-->
                <!--    <p>Risk vs Asset Group Table</p>-->
                <!--</div>-->
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
                <h3>Risk Status</h3>
                <p style="text-align: center; line-height: 35px; color:#203864;">Current Date:
                    {{ now()->format('d-m-Y') }}
                </p>
            </div>
        </div>
    </div>
    <div class="risk-status-content">
        <section class="herosec" style="position: fixed; width: 100%; top: 190px;">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Risk Status Summary
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class=" py-1 list-group-item d-flex justify-content-between"><b class="mr-3">Total
                                        Risks:</b> {{ $risksCount->total_risks }}</li>
                                <li class=" py-1 list-group-item d-flex justify-content-between"><b class="mr-3">Open
                                        Risks:</b> {{ $risksCount->open_risks }}</li>
                                <li class=" py-1 list-group-item d-flex justify-content-between"><b class="mr-3">Close
                                        Risks:</b> {{ $risksCount->closed_risks }}</li>

                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Control Status Summary
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item py-1 d-flex justify-content-between"><b class="mr-3">Total
                                        Controls:</b> {{ $controlsCount->total_controls }}</li>
                                <li class="list-group-item py-1 d-flex justify-content-between"><b
                                        class="mr-3">Implemented:</b> {{ $controlsCount->implemented_controls }}</li>
                                <li class="list-group-item py-1 d-flex justify-content-between"><b
                                        class="mr-3">Partially Implemented:</b>
                                    {{ $controlsCount->partially_implemented_controls }}</li>
                                <li class="list-group-item py-1 d-flex justify-content-between"><b class="mr-3">Not
                                        Applicable:</b> {{ $controlsCount->not_applicable_controls }}</li>
                                <li class="list-group-item py-1 d-flex justify-content-between"><b
                                        class="mr-3">Partially Implemented </b>
                                    {{ $controlsCount->not_implemented_controls }}</li>
                        </div>
                    </div>
                </div>
        </section>
        <div class="tablearea" style="margin-top: 220px;"> 
            <table class="table">
                <thead class="tablehead">
                    <tr>
                        <th >
                          
                            <p>S.No</p>
                        </th>
                        <th>
                            <p>Risk</p>
                        </th>
                        <th>
                            <p>Risk Owner</p>
                        </th>
                        <th>
                            <p>Risk Assessment</p>
                        </th>
                        <th>
                            <p>Risk Assessment Date</p>
                        </th>
                        <th>
                            <p>Risk Finding</p>
                        </th>
                        <th>
                            <p>Risk Status</p>
                        </th>
                        <th>
                            <p>Controls</p>
                        </th>
                        <th>
                            <p>Control Implementation Status
                            </p>
                        </th>
                        <th>
                            <p>Control Owner Name</p>
                        </th>
                    </tr>
                </thead>
                <tbody class="tablebody">
                    @foreach ($riskStatus as $row)
                        <tr>
                            <td class="text-center">
                                {{$loop->index + 1}}
                            </td>
                            <td>
                                <a href="{{ route('riskmaster.show', $row->risk_id) }}" target="_blank" class="text-dark">
                                    {{ $row->risk }}
                                </a>
                            </td>
                            <td>{{ $row->risk_owner }}</td>
                            <td>{{ $row->risk_assessment }}</td>
                            <td>{{ $row->risk_assessment_start_date }}</td>
                            <td>{{ $row->findings }}</td>
                            <td>{{ $row->implementation_status }}</td>
                            <td>{!! $row->controls !!}</td>
                            <td>{!! $row->control_status !!}</td>
                            <td>{!! $row->control_owner !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
