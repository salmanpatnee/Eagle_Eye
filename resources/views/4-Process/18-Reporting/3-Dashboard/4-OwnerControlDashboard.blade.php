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
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
        .text-center {
            text-align: center;
        }

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
                    <button id="print" class="btn btn-info btn-turqouis btn-sm rounded rounded-5 text-black"
                        data-filename="Management Owner">
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
                <h3>{{ $owner[0]->owner_name }}</h3>
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
                <h2 id="subdomain" class="text-center">Control Status Report</h2>
                <div class="ListTable">
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th class="TableHeads">S.No</th>
                                <th class="TableHeads">Control ID</th>
                                <th class="TableHeads">Status</th>
                                <th class="TableHeads">Owner Name</th>
                                <th class="TableHeads">Custodian Name</th>
                            </tr>
                        </thead>
                        <tbody id="table_body">
                            @foreach ($controls as $control)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        @if ($control->control_assessment_id != '#')
                                            <a
                                                href="{{ route('control-assessments.show', $control->control_assessment_id) }}">{{ $control->control_id }}
                                            </a>
                                        @else
                                            {{ $control->control_id }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($control->control_assessment_id != '#')
                                            <a
                                                href="{{ route('control-assessments.show', $control->control_assessment_id) }}">
                                                {{ $control->status }}
                                            </a>
                                        @else
                                            {{ $control->status }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('owners.show', $owner[0]->owner_id) }}">{{ $owner[0]->owner_name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">{!! $control->custodians !!}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
        const ownerId = {!! json_encode($ownerId) !!};
        const owner = [{!! json_encode($owner[0]->owner_name) !!}];
        const ownerNameId = [{!! json_encode($owner[0]->owner_id) !!}];
        const totalControls = [{!! json_encode($controlsCount[0]->total_controls) !!}];
        const implementedCount = [{!! json_encode($controlsCount[0]->implemented) !!}];
        const partiallyImplementedCount = [{!! json_encode($controlsCount[0]->partially_implemented) !!}];
        const notImplementedCount = [{!! json_encode($controlsCount[0]->not_implemented) !!}];
        const notApplicableCount = [{!! json_encode($controlsCount[0]->not_applicable) !!}];

        console.log(implementedCount);

        const chartBar = new Chart("BRCHRT", {
            type: "bar",
            data: {
                labels: owner,
                datasets: [{
                        label: 'Total Controls',
                        backgroundColor: "#2196F3",
                        data: totalControls.map((value, index) => ({
                            y: value,
                            statusCode: null
                        }))
                    },
                    {
                        label: 'Implemented',
                        backgroundColor: "#228B22",
                        data: implementedCount.map((value, index) => ({
                            y: value,
                            statusCode: 1
                        }))
                    },
                    {
                        label: 'Partially Implemented',
                        backgroundColor: "#FFC107",
                        data: partiallyImplementedCount.map((value, index) => ({
                            y: value,
                            statusCode: 3
                        }))
                    },
                    {
                        label: 'Not Implemented',
                        backgroundColor: "#FF0000",
                        data: notImplementedCount.map((value, index) => ({
                            y: value,
                            statusCode: 2
                        }))
                    },
                    {
                        label: 'Not Applicable',
                        backgroundColor: "#9E9E9E",
                        data: notApplicableCount.map((value, index) => ({
                            y: value,
                            statusCode: 4
                        }))
                    }

                ]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: false,
                    text: "NCA-ECC"
                },
                onClick: function(event, elements) {
                    if (elements.length > 0) {
                        const element = chartBar.getElementAtEvent(event)[0];
                        if (element) {
                            const datasetIndex = element._datasetIndex;
                            const dataIndex = element._index;

                            const dataset = chartBar.data.datasets[datasetIndex];
                            if (dataset && dataset.data[dataIndex]) {
                                const dataPoint = dataset.data[dataIndex];


                                $('#riskAppetiteContentRow').css('visibility', 'hidden');
                                $('.sk-chase').show();
                                const tableBody = $('#table_body');
                                let html = "";

                                $.ajax({
                                    url: `/owner-controls/${ownerId}?status=${dataPoint.statusCode}`,
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(response) {
                                        console.log('Response:', response);
                                        if (response.length) {
                                            if (dataPoint.statusCode === null) {
                                                $("h2#subdomain").text("Control Status Report");
                                            } else if (dataPoint.statusCode === 1) {
                                                $("h2#subdomain").text(
                                                    "Implemented Controls Report");
                                            } else if (dataPoint.statusCode === 2) {
                                                $("h2#subdomain").text(
                                                    "Not Implemented Controls Report");
                                            } else if (dataPoint.statusCode === 3) {
                                                $("h2#subdomain").text(
                                                    "Partially Implemented Controls Report");
                                            } else if (dataPoint.statusCode === 4) {
                                                $("h2#subdomain").text(
                                                    "Not Applicable Controls Report");
                                            }
                                            let i = 1;
                                            response.forEach(row => {
                                                html += "<tr>";
                                                html += `<td>${i}</td>`;

                                                if (row.control_assessment_id != "#") {
                                                    html +=
                                                        `<td><a href="/control-assessments/${row.control_assessment_id}" >${row.control_id}</a></td>`;
                                                } else {
                                                    html +=
                                                        `<td>${row.control_id}</td>`;
                                                }

                                                if (row.control_assessment_id != "#") {
                                                    html +=
                                                        `<td> <a href="/control-assessments/${row.control_assessment_id}" >${row.status}</a></td>`;
                                                } else {
                                                    html +=
                                                        `<td>${row.status}</td>`;
                                                }
                                                html +=
                                                    `<td> <a href="/owners/{owner}/${ownerNameId}" >${owner}</a></td>`;
                                                html +=
                                                    `<td><a href="/custodians/${row.custodian_name_id}" >${row.custodians}</a></td>`;
                                                html += "</tr>";
                                                i++;
                                            });
                                            $(tableBody).html(html)

                                            $('.sk-chase').hide();
                                            $('#riskAppetiteContentRow').css('visibility',
                                                'visible');
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Error:', error);
                                    }
                                });
                            }
                        }
                    }
                }

            }
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script src="{{ asset('/js/dashboard.js') }}"></script>
</body>

</html>
