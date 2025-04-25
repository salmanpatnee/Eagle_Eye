<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Primary Meta Tag  -->
    <title>Compliance 360</title>
    <meta name="title" content="Saturn-V GRC Tool" />
    <meta name="description" content="Zain Cloud GRC Tool" />
    <!-- Boxicons Icons-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-header.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/7-Sidebar/1-Sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/4-Process/2-Table/IndividualTable.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/11-Dashboard/1-Dashboard.css') }}" />
    <link rel="stylesheet" href="{{asset('/css/dashboard.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
        .OCDVBC {
            max-width: 100%;
        }

        .BRCHRT {
            width: 100%;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
        }

        .ListTable {
            max-width: 1200;
            margin: 30px auto 60px;
        }

        td {
            text-align: left;
            padding: 8px;
            line-height: 2em;
            vertical-align: baseline;
        }
    </style>
</head>

<body>
     <!-- SIDEBAR -->
     <section>
        <header>
            <div class="Header">

                <div class="flex items-center">
                    <a href="/compliance">
                        <i class="bx bx-home"></i>
                    </a>
                    <p class="bold-arbtext">العمليات</p>
                    <p class="bold-text">Processes</p>
                    <i style="padding-right: 30px" class="bx bx-right-arrow-alt"></i>
                    <div class="HeadingTxt">
                        <p class="ArbTxt">لوحة التحكم بالامتثال الشامل</p>
                        <p class="EngTxt">Overall Compliance Dashboard</p>
                    </div>
                </div>

                <div>
                    <button id="print" class="btn btn-info btn-turqouis btn-sm rounded rounded-5 text-black" data-filename="Domains Risk Status">
                        <p class="m-0">تنزيل بصيغة بي دي إف</p>
                        <p class="m-0">Download as PDF</p>
                    </button>
                </div>

                <div class="flex items-center">
                    @include('partials.roles')
                    <div class="RightButtonContainer">
                        <button type="button" class="RightButton" onclick="goBack()">
                            <p>للخلف</p>
                            <p>Back</p>
                        </button>
                    </div>
                </div>
            </div>
        </header>
    </section>



        <div id="print-area">
            <div class="OCD">
                <div class="OCDVBC">
                    <h3>{{ $ownerNames[0] }} Risk Status</h3>
                    <canvas id="BRCHRT" class="BRCHRT"></canvas>
                </div>
            </div>
            <div class="ContentTableSection" id="riskAppetiteContent">
                <div class="sk-chase" style="display: none">
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                </div>
                <div id="riskAppetiteContentRow">
                    <h2 id="subdomain" class="text-center">Risk Status Overview</h2>
                    <div class="ListTable">
                        <table cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="TableHeads">S.No</th>
                                    <th class="TableHeads"> Risk ID</th>
                                    <th class="TableHeads">Status</th>
                                    <th class="TableHeads">Owner Name</th>
                                    <th class="TableHeads">Custodians</th>
                                    <th class="TableHeads">Control Details</th>
                                </tr>
                            </thead>
                            <tbody id="table_body">
                                @foreach ($risks as $risk)
                                    <tr>
                                        <td> {{$loop->index + 1}}
                                    </td>
                                        <td> <a href="{{ route('riskmaster.show', $risk->risk_id) }}"
                                                >{{ $risk->risk_id }}</a>
                                        </td>
                                        <td>
                                            @if ($risk->risk_assessment_id)
            
                                            <a href="{{ route('risk-assessments.show', $risk->risk_assessment_id) }}">
                                            @endif
            
                                                {{ $risk->implementation_status }}
            
                                                @if ($risk->risk_assessment_id)
            
                                            </a>
                                            @endif
                                                </td>
                                        <td>
                                            <a href="{{ route('ownerreg.show', $risk->owner_id) }}"
                                                >{{ $risk->owner_name }}</a>
                                        </td>
                                        <td>{!! $risk->custodians !!}</td>
                                        <td><a href="{{ route('risk-controls.show', $risk->risk_id) }}"
                                                >View
                                                Controls</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{asset('/js/dashboard.js')}}"></script>
        <script>
            function initializeCharts() {

                const ownerId = {!! json_encode($ownerId) !!};
                const owners = {!! json_encode($ownerNames) !!};
                const totalRisks = {!! json_encode($totalRisks) !!};
                const totalRisksOpen = {!! json_encode($totalRisksOpen) !!};
                const totalRisksClose = {!! json_encode($totalRisksClose) !!};
                const colors = {
                    BLUE: "#2196F3",
                    GREEN: "#228B22",
                    RED: '#FF0000',
                };

                const chartBar = new Chart("BRCHRT", {
                    type: "bar",
                    data: {
                        labels: owners,
                        datasets: [{
                                label: 'Total Risks',
                                data: totalRisks,
                                backgroundColor: colors.BLUE,
                                customData: {!! json_encode($ownerId) !!}
                            },
                            {
                                label: 'Open',
                                backgroundColor: colors.RED,
                                data: totalRisksOpen,
                                customData: {!! json_encode($ownerId) !!}

                            },
                            {
                                label: 'Close',
                                backgroundColor: colors.GREEN,
                                data: totalRisksClose,
                                customData: {!! json_encode($ownerId) !!}
                            }
                        ]
                    },
                    options: {

                        legend: {
                            display: true,
                            labels: {
                                fontColor: '#000', // Change legend label color here, 
                                fontSize: 16
                            }
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    fontColor: '#000', // Change y-axis labels color here
                                    // beginAtZero: true, 
                                    fontSize: 16
                                }
                            }],
                            xAxes: [{
                                ticks: {
                                    fontColor: '#000', // Change x-axis labels color here, 
                                    fontSize: 16
                                }
                            }]
                        },
                        title: {
                            display: false,
                        },
                        // onClick: function(event, elements) {
                        //     if (elements && elements.length > 0) {
                        //         var datasetIndex = elements[0]._datasetIndex;
                        //         var dataIndex = elements[0]._index;
                        //         var dataset = this.data.datasets[datasetIndex];
                        //         var ownerId = dataset.customData[dataIndex];

                        //         window.open("/risk-owner-compliance/" + ownerId, '_blank');
                        //     }
                        // }
                    }
                });
            }
            initializeCharts();
        </script>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </body>
</body>

</html>
