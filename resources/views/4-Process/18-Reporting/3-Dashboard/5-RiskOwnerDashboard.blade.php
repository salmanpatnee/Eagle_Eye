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
                <h3>Owner's Risk Status</h3>
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
                <div class="ListTable">
                    <table cellspacing="0">
                        <thead>

                            <tr>
                                <th class="TableHeads">Risk ID</th>
                                <th class="TableHeads">Status</th>
                                <th class="TableHeads">Owner</th>
                                <th class="TableHeads">Custodians</th>
                                <th class="TableHeads">Control Details</th>
                                <th class="TableHeads">Assessment Details</th>
                            </tr>
                        </thead>
                        <tbody id="table_body">
                            @foreach ($riskDetails as $risk)
                                <tr>
                                    <td>
                                        <a href="{{ route('riskmaster.show', $risk->risk_id) }} "
                                            target="_blank">{{ $risk->risk_id }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('risk-assessments.show', $risk->risk_assessment_id) }}"
                                            target="_blank">
                                            {{ $risk->status }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('owners.show', $risk->owner_id) }}"
                                            target="_blank">{{ $risk->owner_name }}
                                        </a>
                                    </td>
                                    <td>
                                        {!! $risk->custodians !!}
                                    </td>
                                    <td><a href="{{ route('risk-controls.show', $risk->risk_id) }}"
                                            target="_blank">View Controls</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('risk-assessments.show', $risk->risk_assessment_id) }}"
                                            target="_blank">

                                            {{ $risk->risk_assessment_id }}
                                        </a>
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
            const ownerRisks = {!! json_encode($ownerRisksGraph) !!}
            const ownerId = {!! json_encode($ownerId) !!};
            const owners = ownerRisks.map(row => row.owner_name);
            const totalRisks = ownerRisks.map(row => row.risk_count);
            const openRisks = ownerRisks.map(row => row.open_count);
            const closeRisks = ownerRisks.map(row => row.close_count);
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
                    labels: owners,
                    datasets: [{
                        label: 'Total Risks',
                        backgroundColor: colors.BLUE,
                        data: totalRisks.map((value, index) => ({
                            y: value,
                            statusCode: null
                        }))
                    }, {
                        label: 'Open Risks',
                        backgroundColor: colors.RED,
                        data: openRisks.map((value, index) => ({
                            y: value,
                            statusCode: 1
                        })),
                    }, {
                        label: 'Close Risks',
                        backgroundColor: colors.GREEN,
                        data: closeRisks.map((value, index) => ({
                            y: value,
                            statusCode: 2
                        }))
                    }]
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
                                        url: `/risk-owner/${ownerId}?status=${dataPoint.statusCode}`,
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function(response) {
                                            console.log('Response:', response);
                                            if (response.length) {
                                                console.log(response);

                                                response.forEach(row => {

                                                    html += "<tr>";
                                                    html +=
                                                        `<td><a href="/risk-assessment-table/${row.risk_assessment_id}" target="_blank">${row.risk_id}</a></td>`;
                                                    html +=
                                                        `<td> <a href="/risk-assessment-table/${row.risk_assessment_id}" target="_blank">${row.status}</a></td>`;
                                                    html +=
                                                        `<td><a href="/owners/{owner}/${row.owner_id}" target="_blank">${row.owner_id} - ${row.owner_name}</a></td>`;
                                                    html +=
                                                        `<td><a href="#" target="_blank">${row.custodians}</a></td>`;
                                                    html +=
                                                        `<td><a href="#" target="_blank">View Controls</a></td>`;
                                                    html += "</tr>";
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
