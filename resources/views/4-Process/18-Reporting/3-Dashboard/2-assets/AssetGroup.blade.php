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

        th {
            white-space: nowrap;
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
                    <button id="print" class="btn btn-info btn-turqouis btn-sm rounded rounded-5 text-black"
                        data-filename="Risks on Critical Software">
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

    <body>

        <div id="print-area">
            <div class="OCD">
                <div class="OCDVBC">
                    <h3>Risks on {{ $assetGroup->asset_group_name }}</h3>
                    <canvas id="assetStatus" class="BRCHRT"></canvas>
                </div>
            </div>
            <div class="sk-chase" style="display: none">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>
            <div id="riskAppetiteContentRow">
                <h2 id="subdomain" class="text-center">Asset Risk Status Overview</h2>
                <div class="ListTable">
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th class="TableHeads">S.No</th>
                                <th class="TableHeads">Asset</th>
                                <th class="TableHeads">Asset Owner</th>
                                <th class="TableHeads">Asset Custodians</th>
                                <th class="TableHeads">Risk</th>
                                <th class="TableHeads">Risk Owner</th>
                                <th class="TableHeads">Risk Custodians</th>
                                <th class="TableHeads">Risk Status</th>
                                <th class="TableHeads">Control Details</th>
                            </tr>
                        </thead>
                        <tbody id="table_body">
                            {{-- @foreach ($risks as $risk)
                                <tr>
                                    <td> <a href="{{ route('riskmaster.show', $risk->risk_id) }}"
                                            >{{ $risk->risk_id }}</a>
                                    </td>
                                    <td>
                                        @if ($risk->risk_assessment_id)
            
                                            <a href="{{ route('risk-assessments.show', $risk->risk_assessment_id) }}"
                                                >
                                                {{ $risk->status }}
            
                                            </a>
                                            @else
                                            {{ $risk->status }}
                                        @endif
                                    </td>
                                    <td>
                                        {!!$risk->assets!!}
                                    </td>
                                    <td>
                                        <a href="{{ route('owners.show', $risk->owner_id) }}"
                                            >{{ $risk->owner_name }}</a>
                                    </td>
                                    <td>{!! $risk->custodians !!}</td>
                                    <td><a href="{{ route('risk-controls.show', $risk->risk_id) }}" >View
                                            Controls</a>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
            function initializeCharts() {


                const assetGroup = @json($assetGroup);
                const assetGroupId = @json($assetId);
                const assetGroups = @json($assetName);
                const risk_count = @json($riskCount);
                const open_risks = @json($openRisks);
                const closed_risks = @json($closedRisks);

                const colors = {
                    BLUE: "#2196F3",
                    GREEN: "#228B22",
                    ORANGE: "#FFC107",
                    RED: '#FF0000',
                    GREY: '#9E9E9E'
                };

                const assetChartBar = new Chart("assetStatus", {
                    type: "bar",
                    data: {
                        labels: assetGroups,
                        datasets: [{
                                label: 'Total Risks',
                                backgroundColor: colors.BLUE,
                                data: risk_count.map((value, index) => ({
                                    x: assetGroups[index],
                                    y: value,
                                    id: assetGroupId[index],
                                    statusCode: null
                                }))
                            },
                            {
                                label: 'Open',
                                backgroundColor: colors.RED,
                                data: open_risks.map((value, index) => ({
                                    x: assetGroups[index],
                                    y: value,
                                    id: assetGroupId[index],
                                    statusCode: 1
                                })),
                            },
                            {
                                label: 'Closed',
                                backgroundColor: colors.GREEN,
                                data: closed_risks.map((value, index) => ({
                                    x: assetGroups[index],
                                    y: value,
                                    id: assetGroupId[index],
                                    statusCode: 3
                                })),
                            },

                        ]
                    },
                    options: {
                        legend: {
                            display: true
                        },
                        scales: {
                            xAxes: [{
                                ticks: {
                                    fontSize: 14,
                                    fontColor: '#000',
                                    lineHeight: 1.9,
                                    padding: 4
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true, // Ensure the chart starts at 0
                                    fontColor: '#000',
                                }
                            }]
                        },
                        onClick: function(event, elements) {
                            if (elements.length > 0) {
                                const element = assetChartBar.getElementAtEvent(event)[0];
                                if (element) {
                                    const datasetIndex = element._datasetIndex;
                                    const dataIndex = element._index;

                                    const dataset = assetChartBar.data.datasets[datasetIndex];
                                    if (dataset && dataset.data[dataIndex]) {
                                        const dataPoint = dataset.data[dataIndex];
                                        const assetGroupId = assetGroup.asset_group_id



                                        $('#riskAppetiteContentRow').css('visibility', 'hidden');
                                        $('.sk-chase').show();
                                        const tableBody = $('#table_body');
                                        let html = "";

                                        $.ajax({
                                            url: `/group-asset-risks/${dataPoint.id}?status=${dataPoint.statusCode}&?assetGroupId=${assetGroupId}`,
                                            type: 'GET',
                                            dataType: 'json',
                                            success: function(response) {
                                                console.log('Response:', response);
                                                if (response.length) {

                                                    if (dataPoint.statusCode === null) {
                                                        $("h2#subdomain").text(
                                                            "Asset Risk Status Overview");
                                                    } else if (dataPoint.statusCode === 1) {
                                                        $("h2#subdomain").text(
                                                            "Asset Closed Risk Status Overview");
                                                    } else if (dataPoint.statusCode === 3) {
                                                        $("h2#subdomain").text(
                                                            "Asset Open Risk Status Overview");
                                                    }
                                                    let i = 1;
                                                    response.forEach(row => {
                                                        html += "<tr>";
                                                        html += `<td>${i}</td>`;
                                                        html +=
                                                            `<td><a href="/asset-register-table/${row.asset_id}" >${row.asset_name}</a></td>`;
                                                        html +=
                                                            `<td><a href="/owners/{owner}/${row.asset_owner_id}" >${row.asset_owner_name}</a></td>`;
                                                        html +=
                                                            `<td>${row.asset_custodians}</td>`;
                                                        html +=
                                                            `<td><a href="/risk-identification-table/${row.risk_id}" >${row.risk_name}</a></td>`;
                                                        html +=
                                                            `<td><a href="/owners/{owner}/${row.risk_owner_id}" >${row.risk_owner_name}</a></td>`;
                                                        html +=
                                                            `<td>${row.risk_custodians}</td>`;
                                                        // html += `<td><a href="/risk-assessment-table/${row.risk_assessment_id}" >${row.latest_status}</a></td>`;
                                                        html += `<td>${row.latest_status}</td>`;
                                                        html +=
                                                            `<td><a href="/risk-controls/${row.risk_id}">View Controls</a></td>`;
                                                        // if (row.control_assessment_id != "#") {
                                                        // } else {
                                                        //     html +=
                                                        //         `<td>${row.control_id}</td>`;
                                                        // }

                                                        // if (row.control_assessment_id != "#") {
                                                        //     html +=
                                                        //         `<td> <a href="/control-assessments/${row.control_assessment_id}" >${row.status}</a></td>`;
                                                        // } else {
                                                        //     html +=
                                                        //         `<td>${row.status}</td>`;
                                                        // }
                                                        // html +=
                                                        //     `<td> <a href="/owners/{owner}/${ownerNameId}" >${owner}</a></td>`;
                                                        // html +=
                                                        //     `<td><a href="/custodians/${row.custodian_name_id}" >${row.custodians}</a></td>`;
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
                        },
                        plugins: {
                            labels: {
                                render: 'value',
                                fontColor: '#fff',
                                arc: false,
                            }
                        }
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
        <script src="{{ asset('/js/dashboard.js') }}"></script>
    </body>
</body>

</html>
