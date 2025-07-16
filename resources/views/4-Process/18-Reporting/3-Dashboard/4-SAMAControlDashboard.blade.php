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
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/11-Dashboard/1-Dashboard.css') }}" />
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
            vertical-align: baseline;
            line-height: 2em;
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
                    <button id="print" class="btn btn-info btn-turqouis btn-sm rounded rounded-5 text-black"
                        data-filename="NCA Sub Domains Compliance Status">
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
                <h3>SAMA Controls Maturity Level {{ $level }} Distribution</h3>
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
                <h2 id="subdomain" class="text-center"></h2>
                <div class="ListTable">
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th class="TableHeads">S.No</th>
                                <th class="TableHeads">Control ID</th>
                                <th class="TableHeads">Status</th>
                                <th class="TableHeads">Owner Name</th>
                                <th class="TableHeads">Custodians</th>
                                {{-- <th class="TableHeads">Evidences</th> --}}
                            </tr>
                        </thead>
                        <tbody id="table_body"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
        function initializeCharts() {


            const controls = {!! json_encode($controls) !!};
            const level = {!! $level !!};

            const chartBar = new Chart("BRCHRT", {
                type: "bar",
                data: {
                    labels: [`Maturity Level ${level}`], // Single label since it's aggregated data
                    datasets: [{
                            label: 'Total Controls',
                            backgroundColor: "#2196F3",
                            data: [{
                                x: "Total Controls",
                                y: controls.total_controls,
                                id: null,
                                statusCode: null
                            }]
                        },
                        {
                            label: 'Implemented',
                            backgroundColor: "#228B22",
                            data: [{
                                x: "Total Controls",
                                y: controls.implemented,
                                id: null,
                                statusCode: 1
                            }]
                        },
                        {
                            label: 'Partially Implemented',
                            backgroundColor: "#FFC107",
                            data: [{
                                x: "Total Controls",
                                y: controls.partially_implemented,
                                id: null,
                                statusCode: 3
                            }]
                        },
                        {
                            label: 'Not Implemented',
                            backgroundColor: "#FF0000",
                            data: [{
                                x: "Total Controls",
                                y: controls.not_implemented,
                                id: null,
                                statusCode: 2
                            }]
                        },
                        {
                            label: 'Not Applicable',
                            backgroundColor: "#9E9E9E",
                            data: [{
                                x: "Total Controls",
                                y: controls.not_applicable,
                                id: null,
                                statusCode: 4
                            }]
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
                                const dataset = chartBar.data.datasets[datasetIndex];

                                if (dataset && dataset.data[0]) {
                                    const dataPoint = dataset.data[0];

                                    $('#riskAppetiteContentRow').css('visibility', 'hidden');
                                    $('.sk-chase').show();
                                    const tableBody = $('#table_body');
                                    let html = "";
                                    console.log(dataPoint.statusCode);

                                    $.ajax({
                                        url: `/sama-maturity-level-details/${level}?status=${dataPoint.statusCode}`,
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function(response) {
                                            if (response.length) {
                                                $("h2#subdomain").text(`Status: ${dataset.label}`);
                                                let i = 1;
                                                response.forEach(row => {
                                                    html += "<tr>";
                                                    html += `<td>${i}</td>`;
                                                    html += row.control_assessment_id ?
                                                        `<td><a href="/control-assessments/${row.control_assessment_id}">${row.control_id}</a></td>` :
                                                        `<td>${row.control_id}</td>`;

                                                    html += row.control_assessment_id ?
                                                        `<td><a href="/control-assessments/${row.control_assessment_id}">${row.status}</a></td>` :
                                                        `<td>${row.status}</td>`;

                                                    html +=
                                                        `<td><a href="/owners/{owner}/${row.owner_id}">${row.owner_name}</a></td>`;
                                                    html += `<td>${row.custodians}</td>`;

                                                    html += "</tr>";
                                                    i++;
                                                });

                                                $(tableBody).html(html);
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

        }

        // Call the function to initialize both charts
        initializeCharts();
    </script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script src="{{ asset('/js/dashboard.js') }}"></script>
</body>

</html>
