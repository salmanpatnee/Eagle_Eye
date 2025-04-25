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
                <div class="RightButtonContainer">
                    <button type="button" class="RightButton" onclick="goBack()">
                        <p>للخلف</p>
                        <p>Back</p>
                    </button>
                </div>
            </div>
        </header>
    </section>

    <body>
        <div class="OCD">
            <div class="OCDVBC">
                <h3>Risk's Controls Status</h3>
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
                    <table>
                        <thead>

                            <tr>
                                <th class="TableHeads">S.No</th>
                                <th class="TableHeads">Control ID</th>
                                <th class="TableHeads">Status</th>
                                <th class="TableHeads">Owner</th>
                                <th class="TableHeads">Custodians</th>
                                <th class="TableHeads">Evidences</th>
                            </tr>
                        </thead>
                        <tbody id="table_body">
                            @foreach ($controlDetails as $control)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>
                                        <a href="{{ route('control-assessments.show', $control->control_assessment_id) }}"
                                            >{{ $control->control_id }}
                                        </a>
                                    </td>

                                    <td>
                                        <a href="{{ route('control-assessments.show', $control->control_assessment_id) }}"
                                            >
                                            {{ $control->control_implementation_status }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('ownerreg.show', $control->owner_id) }}"
                                            >{{ $control->owner_name }}
                                        </a>
                                    </td>
                                    <td>
                                        {!! $control->custodians !!}
                                    </td>
                                    <td>
                                        {!! $control->evidence !!}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

        <script>
            const controlCounts = {!! json_encode($controlCounts) !!}

            const riskName = {!! json_encode($riskName) !!};
            const riskId = {!! json_encode($riskId) !!};
            const totalControls = controlCounts.total_controls
            const implementedControls = controlCounts.implemented_count;
            const notImplementedControls = controlCounts.not_implemented_count;
            const partiallyImplementedControls = controlCounts.partially_implemented_count;
            const notApplicableControls = controlCounts.not_applicable_count;


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
                    labels: [riskName],
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
                                        url: `/risk-controls/${riskId}?status=${dataPoint.statusCode}`,
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function(response) {
                                            console.log('Response:', response);
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
                                                let i = 1
                                                response.forEach(row => {

                                                    html += "<tr>";
                                                        html += `<td>${i}</td>`;
                                                    html +=
                                                        `<td><a href="/control-assessments/${row.control_assessment_id}" >${row.control_id}</a></td>`;
                                                    html +=
                                                        `<td> <a href="/control-assessments/${row.control_assessment_id}" >${row.control_implementation_status}</a></td>`;
                                                    html +=
                                                        `<td><a href="/owner-table/${row.owner_id}" >${row.owner_name}</a></td>`;
                                                    html +=
                                                        `<td>${row.custodians != null ? row.custodians : ''}</td>`;
                                                        if(row.evidence !== null){

                                                            html +=
                                                                `<td>${row.evidence}</td>`;
                                                        } else {
                                                            html +=
                                                            `<td>-</td>`;
                                                        }
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



    </body>
</body>

</html>
