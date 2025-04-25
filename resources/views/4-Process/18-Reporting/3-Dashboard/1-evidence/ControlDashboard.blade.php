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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


    <style>
        .OCDVBC {
            max-width: 100% !important;
        }

        canvas#BRCHRT {
            margin: auto;
            width: 100%;
        }

        .ListTable {
            max-width: 1200;
            margin: 60px auto 60px;
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
                    <button id="print" class="btn btn-info btn-turqouis btn-sm rounded rounded-5 text-black" data-filename="Evidence Summary by Controls">
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
            <div class="OCD" >
                <div class="OCDVBC">
                    <h3>Evidence Summary by Controls</h3>
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
                    <h2 id="subdomain" class="text-center">Control Implementation Status</h2>
                    <div class="ListTable">
                        <table>
                            <thead>
                                <tr>
                                    <th class="TableHeads">S.No</th>
                                    <th class="TableHeads">Control ID</th>
                                    {{-- <th class="TableHeads">Control Name</th> --}}
                                    <th class="TableHeads">Status</th>
                                    <th class="TableHeads">Owner</th>
                                    <th class="TableHeads">Custodians</th>
                                    <th class="TableHeads">Evidences</th>
                                </tr>
                            </thead>
                            <tbody id="table_body">
                                @foreach ($controls as $control)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>
                                            <a href="{{ route('controlmaster.show', $control->control_id) }}"
                                                >
                                            {{ $control->control_id }}
                                            </a>
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('control-assessments.show', $control->control_assessment_id) }}"
                                                > --}}
                                            {{ $control->status }}
                                            {{-- </a> --}}
                                        </td>
                                        <td>
                                            <a href="{{ route('ownerreg.show', $control->owner_id) }}" >
                                                {{ $control->owner_name }}
                                            </a>
                                        </td>
                                        <td>
                                            {!! $control->custodians !!}
                                        </td>
                                        <td>
                                            {!! $control->evidences !!}
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
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

        <script>
            const controlCounts = {!! json_encode($controlsCount) !!}
            const subdomainId = {!! json_encode($subdomainId) !!}


            const totalControls = controlCounts.total_controls;
            const implementedControls = controlCounts.implemented;
            const notImplementedControls = controlCounts.not_implemented;
            const partiallyImplementedControls = controlCounts.partially_implemented;
            const notApplicableControls = controlCounts.not_applicable;

            const colors = {
                BLUE: "#2196F3",
                GREEN: "#228B22",
                ORANGE: "#FFC107",
                RED: '#FF0000',
                GREY: '#9E9E9E'
            };

            const chartBar = new Chart("BRCHRT", {
                type: "bar",
                data: {
                    labels: [""],
                    datasets: [{
                            label: 'Total Controls',
                            backgroundColor: colors.BLUE,
                            data: [totalControls].map((value, index) => ({
                                y: value,
                                statusCode: null
                            }))
                        }, {
                            label: 'Implemented',
                            backgroundColor: colors.GREEN,
                            data: [implementedControls].map((value, index) => ({
                                y: value,
                                statusCode: 1
                            }))
                        },
                        {
                            label: 'Partialy Implemented',
                            backgroundColor: colors.ORANGE,
                            data: [partiallyImplementedControls].map((value, index) => ({
                                y: value,
                                statusCode: 3
                            }))
                        },
                        {
                            label: 'Not Implemented',
                            backgroundColor: colors.RED,
                            data: [notImplementedControls].map((value, index) => ({
                                y: value,
                                statusCode: 2
                            }))
                        },
                        {
                            label: 'Not Applicable',
                            backgroundColor: colors.GREY,
                            data: [notApplicableControls].map((value, index) => ({
                                y: value,
                                statusCode: 4
                            }))
                        },

                    ]
                },
                options: {
                    legend: {
                        display: true
                    },
                    title: {
                        display: false,
                        text: ""
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
                                        url: `/controls-evidence/${subdomainId}?status=${dataPoint.statusCode}`,
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function(response) {

                                            if (response.length) {

                                                if(dataPoint.statusCode === null) {
                                                    $("h2#subdomain").text("Control Status Report");
                                                } else if(dataPoint.statusCode === 1) {
                                                    $("h2#subdomain").text("Implemented Controls Report");
                                                } else if(dataPoint.statusCode === 2) {
                                                    $("h2#subdomain").text("Not Implemented Controls Report");
                                                } else if(dataPoint.statusCode === 3) {
                                                    $("h2#subdomain").text("Partially Implemented Controls Report");
                                                } else if(dataPoint.statusCode === 4) {
                                                    $("h2#subdomain").text("Not Applicable Controls Report");
                                                }
                                                let i = 1;
                                                response.forEach(row => {

                                                    html += "<tr>";
                                                        html += `<td>${i}</td>`;
                                                    html +=
                                                        `<td><a href="/control-identification-table/${row.control_id}" >${row.control_id}</a></td>`;
                                                    html +=
                                                        `<td> ${row.status}</td>`;
                                                    html +=
                                                        `<td><a href="/owner-table/${row.owner_id}" >${row.owner_name}</a></td>`;
                                                    html +=
                                                        `<td>${row.custodians != null ? row.custodians : ''}</td>`;
                                                        if(row.evidences !== null) {
                                                    html +=

                                                            `<td>${row.evidences}</td>`;
                                                        } else {
                                                            html += `<td>-</td>`;

                                                        }
                                                    html += "</tr>";
                                                    i++;
                                                });

                                                $(tableBody).html(html)

                                                $('.sk-chase').hide();
                                                $('#riskAppetiteContentRow').css('visibility',
                                                    'visible');
                                            } else {
                                                alert("No record.");
                                                $('.sk-chase').hide();
                                                return;
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



    </body>
</body>

</html>
