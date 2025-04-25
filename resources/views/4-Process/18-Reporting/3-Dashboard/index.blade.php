<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0em;
        }

        body {
            background-color: #E8EBF0;
        }

        .headersec {
            display: flex;
            justify-content: space-between;
            background: linear-gradient(to right, #203864, #2e74b6);
            padding: 6px 0px 5px 0px;
            margin: 0px 0px 15px 0px;
            width: 100%;
            height: 62px;
            z-index: 1;
        }

        .headerleft {
            display: flex;
            justify-content: left;
            margin: 0px 0px 0px 50px;
            color: white;
            font-weight: 800;
            align-items: center;

        }

        .headericon {
            font-size: 30px;
        }

        .headertext {
            font-size: 18px;
            line-height: 18px;
        }

        .headericon,
        .headertext {
            margin-right: 10px;
        }

        .button {
            background-color: black;
            color: white;
            padding: 0px 50px 0px 50px;
            margin: 0px 56px 0px 0px;
            border: solid 1px black;
            border-radius: 10px;
            transition: 0.3s;
            font-size: 12px;
            width: auto;
            height: 50px;
        }

        .button:hover {
            background-color: white;
            color: black;
        }

        .bodysec {
            margin-inline: 30px;
        }

        .graphrowone {
            display: flex;
            justify-content: space-between;
            /* margin-block: 10px; */
        }

        /* .grtcolumnone {
            margin-block: 10px;
        } */

        .chart-card {
            background-color: white;
            border-radius: 8px;
            border: 1px solid rgba(203, 208, 221, 0.54)
        }

        .abar {
            /* width: 580px;
            height: 150px;
            box-shadow: 0px 1px 6px 3px #c3c3c3;
            border-radius: 20px; */
            padding: 10px;
            /* color: #000000; */
            text-align: center;
        }

        .bchart {
            /* width: 290px;
            height: 150px;
            box-shadow: 0px 1px 6px 3px #c3c3c3;
            border-radius: 20px; */
            padding: 10px;
            /* color: #000000; */
            text-align: center;
        }

        .cchart {
            /* width: 250px;
            height: 150px;
            box-shadow: 0px 1px 6px 3px #c3c3c3;
            border-radius: 20px; */
            padding: 10px;
            /* color: #000000; */
            text-align: center;
        }

        .abar h4 {
            padding-bottom: 10px;
        }

        .dchart {
            /* width: 290px; */
            /* height: 150px; */
            /* box-shadow: 0px 1px 6px 3px #c3c3c3; */
            /* border-radius: 20px; */
            padding: 10px;
            /* color: #000000; */
            text-align: center;
            margin-block: 10px;
        }

        .echart {
            /* width: 171px; */
            /* height: 150px; */
            /* box-shadow: 0px 1px 6px 3px #c3c3c3; */
            /* border-radius: 20px; */
            padding: 10px;
            /* color: #000000; */
            text-align: center;
            margin-block: 10px;
        }

        .chartarea {
            display: flex;
            justify-content: center;
        }

        .grtcolumntwo {
            width: 60%;
            /* height: 328px; */
            /* box-shadow: 0px 1px 6px 3px #c3c3c3; */
            /* border-radius: 20px; */
            /* padding: 10px; */
            /* color: #000000; */
            text-align: center;
            /* margin-top: 21px; */
        }

        #ncaDomainChart {
            height: 280px !important;
        }

        #doughnutChart,
        #myPieChartTwo {
            height: 120px !important;
        }

        #gauge_one,
        #gauge_two {
            height: 115px !important;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</head>

<body>
    <div class="headersec">
        <div class="headerleft">
            <div class="headericon">
                <a href="/compliance" class="text-white">

                    <i class='bx bx-home'></i>
                </a>
            </div>
            <div class="headertext">
                <p class="m-0">العمليات</p>
                <p class="m-0">Processes</p>
            </div>
            <div class="headericon">
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            <div class="headertext">
                <p class="m-0">لوحة معلومات الامتثال</p>
                <p class="m-0">Compliance Dashboard</p>
            </div>
        </div>
        <div class="flex ">
            <button id="print" class="btn btn-info btn-turqouis btn-sm rounded rounded-5 text-black me-2"
                data-filename="Overall Compliance Dashboard">
                <p class="m-0">تنزيل بصيغة بي دي إف</p>
                <p class="m-0">Download as PDF</p>
            </button>
            <a href="{{ route('generate.ppt') }}" class="btn btn-info btn-turqouis btn-sm rounded rounded-5 text-black"
                data-filename="Overall Compliance Dashboard">
                <p class="m-0">تنزيل بصيغة بي بي تي</p>
                <p class="m-0">Download as PPT</p>
            </a>
        </div>
        <div class="d-flex align-items-center gap-3">
            @include('partials.roles')
            <div class="headerright">
                <button type="button" class="button" onclick="window.location.href=('/compliance')">
                    <span class="d-block">للخلف</span>
                    <span>Back</span>
                </button>
            </div>
        </div>
    </div>
    <section id="print-area">
        <div class="container-fluid">
            <div class="row">
                {{-- <div class="col-3">
                    <div class="card p-2">
                        <h4 class="fs-6 text-center">Best Practice Implementation Status Overview</h4>
                        <div id="barchart_material"></div>
                    </div>
                </div> --}}
                <div class="col-6">
                    <div class="card p-2">
                        <h4 class="fs-6 text-center">NCA-ECC Compliance Status</h4>
                        <canvas id="eccStatusChart"></canvas>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card p-2">
                        <h4 class="fs-6 text-center">SAMA Compliance Status</h4>
                        <canvas id="samaStatusChart"></canvas>

                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid mt-2 mb-2">
            <div class="row">

                <div class="col-6">
                    <div class="card p-2">
                        <h4 class="fs-6 text-center">Asset Distribution by Group</h4>
                        <canvas id="assetGroupsChart"></canvas>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card p-2 h-100">
                        <h4 class="fs-6 text-center ">Implemented Controls of Best Practices</h4>
                        <canvas id="ncaDomainChart"></canvas>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid mt-2 mb-2">
            <div class="row">
                <div class="col">
                    <div class="card p-2">
                        <h4 class="fs-6 text-center">Owner's Control Status</h4>
                        <canvas id="ownerControlsChart" style="height: 480px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-2 mb-2">
            <div class="row">
                <div class="col-6">
                    <div class="card p-2">
                        <h4 class="fs-6 text-center">Asset Technology Distribution Overview</h4>
                        <canvas id="assetTechChart"></canvas>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card p-2">
                        <h4 class="fs-6 text-center">Evidence Summary by Best Practices</h4>
                        <canvas id="evidenceSummaryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-2 mb-2">
            <div class="row">
                <div class="col-6">
                    <div class="card p-2">
                        <h4 class="fs-6 text-center">Risk Status by Asset Group</h4>
                        <canvas id="assetGroupStatus"></canvas>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card p-2 h-100">
                        <h4 class="fs-6 text-center">Risk Status</h4>
                        <canvas id="riskStatusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-2 mb-2">
            <div class="row">
                <div class="col-6">
                    <div class="card p-2">
                        <h4 class="fs-6 text-center">Asset Distribution by Technologies</h4>
                        <canvas id="assetTechsChart"></canvas>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card p-2">
                        <h4 class="fs-6 text-center">Risk Distribution by Technologies</h4>
                        <canvas id="riskTechChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-2 mb-2">
            <div class="row">
                <div class="col-6">
                    <div class="card p-2">
                        <h4 class="fs-6 text-center">NCA Control Distribution by Technologies</h4>
                        <canvas id="controlTechChart"></canvas>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card p-2">
                        <h4 class="fs-6 text-center">SAMA Control Distribution by Technologies</h4>
                        <canvas id="samaControlTechChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-2 mb-2">
            <div class="row">
                <div class="col-6">
                    <div class="card p-2">
                        <h4 class="fs-6 text-center">SAMA Control Maturity Level Distribution</h4>
                        <canvas id="samaMaturityLevel"></canvas>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card p-2">
                        <h4 class="fs-6 text-center">Heatmap - Risk Appetite Breakdown</h4>
                        <canvas id="heatmapChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
    <script src="{{ asset('/js/dashboard.js') }}"></script>


    <!------------- ECC Compliance Status ---------------->
    <script>
        const eccComplianceStatus = @json($eccComplianceStatus);

        const labels = Object.keys(eccComplianceStatus);
        const data = Object.values(eccComplianceStatus);
        const backgroundColor = [
            "#228B22",
            "#FF0000",
            "#FFC107",
            "#9E9E9E"
        ];

        new Chart("eccStatusChart", {
            type: "pie",
            data: {
                labels,
                datasets: [{
                    backgroundColor,
                    data
                }]
            },
            options: {
                title: {
                    display: false,
                },
                legend: {
                    display: true,
                    position: 'left',
                    labels: {
                        render: 'label',
                    }
                },
                plugins: {
                    labels: {
                        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                        render: 'percentage',
                        showZero: false,
                        fontSize: 20,
                        fontColor: '#fff',
                        arc: false,
                        position: 'border',
                    }
                },
                onClick: function(event, elements) {

                    window.location.href = "/domain-compliance/NCA-ECC";
                },
            }
        });
    </script>

    <script>
        const samaComplianceStatus = @json($samaComplianceStatus);

        const samaLabels = Object.keys(samaComplianceStatus);
        const samaData = Object.values(samaComplianceStatus);
        const samaBackgroundColor = [
            "#228B22",
            "#FF0000",
            "#FFC107",
            "#9E9E9E"
        ];

        new Chart("samaStatusChart", {
            type: "pie",
            data: {
                labels: samaLabels, // Corrected property name
                datasets: [{
                    backgroundColor: samaBackgroundColor, // Corrected property name
                    data: samaData // Corrected property name
                }]
            },
            options: {
                title: {
                    display: false,
                },
                legend: {
                    display: true,
                    position: 'left',
                    labels: {
                        render: 'label',
                    }
                },
                plugins: {
                    labels: {
                        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                        render: 'percentage',
                        showZero: true,
                        fontSize: 20,
                        fontColor: '#fff',
                        arc: false,
                        position: 'border',
                    }
                },
                onClick: function(event, elements) {
                    window.location.href = "/domain-compliance/SAMA-CSF";
                },
            }
        });
    </script>

    <!------------- Asset Groups Overview ---------------->
    <script>
        const assetGroupOverview = @json($assetGroupOverview);

        const assetGroupIds = assetGroupOverview.assetGroupIds;
        const assetGroupLabels = assetGroupOverview.assetGroupLabels;
        const assetCounts = assetGroupOverview.assetCounts;

        new Chart("assetGroupsChart", {
            type: "bar",
            data: {
                labels: assetGroupLabels,
                datasets: [{
                    backgroundColor: "#2196F3",
                    data: assetCounts,
                    customData: assetGroupIds,
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 10,
                            fontColor: '#000',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }]
                },
                onClick: function(event, elements) {

                    if (elements && elements.length > 0) {
                        var datasetIndex = elements[0]._datasetIndex;
                        var dataIndex = elements[0]._index;
                        var dataset = this.data.datasets[datasetIndex];
                        var groupId = dataset.customData[dataIndex];
                        window.location.href = `/asset-type-compliance/${groupId}`
                        // window.open("/asset-type-compliance/" + groupId);
                    }
                },
                plugins: {
                    labels: {
                        render: 'value',
                        fontColor: '#fff',
                        arc: false,
                    }
                }
            },
        });
    </script>

    <!-- ----------- NCA Domain Compliance Status -------------- -->
    <script>
        const bestPracticesComplainceStatus = @json($bestPracticesComplainceStatus);
        const bestPracticeLabels = bestPracticesComplainceStatus.map(row => row.best_practices_name);
        const implementedControlsCount = bestPracticesComplainceStatus.map(row => row.controls_implemented);
        const colors = {
            BLUE: "#2196F3",
            GREEN: "#228B22",
            ORANGE: "#FFC107",
            RED: '#FF0000',
            GREY: '#9E9E9E'
        };

        new Chart("ncaDomainChart", {
            type: "bar",
            data: {
                labels: bestPracticeLabels,
                datasets: [{
                    data: implementedControlsCount,
                    customData: bestPracticeLabels,
                    backgroundColor: colors.BLUE,
                }]
            },
            options: {
                legend: {
                    display: false,
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 8,
                            fontColor: '#000'
                        }
                    }]
                },
                onClick: function(event, elements) {

                    if (elements && elements.length > 0) {
                        var datasetIndex = elements[0]._datasetIndex;
                        var dataIndex = elements[0]._index;
                        var dataset = this.data.datasets[datasetIndex];
                        var bestPracticeName = dataset.customData[dataIndex];
                        window.location.href = `/domain-compliance/${bestPracticeName}`
                        // window.open("/domain-compliance/" + bestPracticeName);
                    }
                },
                plugins: {
                    labels: {
                        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                        render: 'value',
                        fontColor: '#fff',
                        arc: false,
                    }
                }
            },
        });
    </script>

    <!------------- Owner Controls ---------------->
    <script>
        const ownerControlsStatus = @json($ownerControlsStatus);

        const ownerLabels = ownerControlsStatus.owner_name.map(ownerName => ownerName);
        const ownerRoleIds = ownerControlsStatus.owner_role_ids.map(ownerId => ownerId);
        const totalControls = ownerControlsStatus.total_controls.map(control => control);
        const implementedCount = ownerControlsStatus.implemented.map(control => control);
        const partiallyImplementedCount = ownerControlsStatus.partially_implemented.map(control => control);
        const notImplementedCount = ownerControlsStatus.not_implemented.map(control => control);
        const notApplicableCount = ownerControlsStatus.not_applicable.map(control => control);

        const chartBar = new Chart("ownerControlsChart", {
            type: "bar",
            data: {
                labels: ownerLabels,
                datasets: [
                    {
                        label: 'Total Controls',
                        backgroundColor: colors.BLUE,
                        data: totalControls.map((value, index) => ({
                            x: ownerLabels[index],
                            y: value,
                            id: ownerRoleIds[index],
                            statusCode: null
                        }))
                    }, 
                    {
                        label: 'Implemented',
                        backgroundColor: colors.GREEN,
                        data: implementedCount.map((value, index) => ({
                            x: ownerLabels[index],
                            y: value,
                            id: ownerRoleIds[index],
                            statusCode: 1
                        })),

                    },
                    {
                        label: 'Partially Implemented',
                        backgroundColor: colors.ORANGE,
                        data: partiallyImplementedCount.map((value, index) => ({
                            x: ownerLabels[index],
                            y: value,
                            id: ownerRoleIds[index],
                            statusCode: 3
                        })),
                    },
                    {
                        label: 'Not Implemented',
                        backgroundColor: colors.RED,
                        data: notImplementedCount.map((value, index) => ({
                            x: ownerLabels[index],
                            y: value,
                            id: ownerRoleIds[index],
                            statusCode: 2
                        })),
                    },
                    {
                        label: 'Not Applicable',
                        backgroundColor: colors.GREY,
                        data: notApplicableCount.map((value, index) => ({
                            x: ownerLabels[index],
                            y: value,
                            id: ownerRoleIds[index],
                            statusCode: 4
                        })),
                    }
                ]
            },
            options: {
                legend: {
                    display: true
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 9,
                            fontColor: '#000000',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }]
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
                                window.location.href =
                                    `/owner-controls/${dataPoint.id}?status=${dataPoint.statusCode}`;

                                // window.open(`/owner-controls/${dataPoint.id}?status=${dataPoint.statusCode}`,
                                //     '_blank');
                            }
                        }
                    }
                },
                plugins: {
                    labels: {
                        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                        render: 'value',
                        fontColor: '#fff',
                        arc: false,
                    }
                }
            }
        });
    </script>

    <!------------- Asset Technology Distribution Overview ---------------->
    <script>
        const assetTechData = @json($assetTechData);
        const assetTechnologies = Object.keys(assetTechData);
        const assetGroupCounts = Object.values(assetTechData)

        new Chart("assetTechChart", {
            type: "bar",
            data: {
                labels: assetTechnologies,
                datasets: [{
                    backgroundColor: "#2196F3",
                    data: assetGroupCounts,
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 10,
                            fontColor: '#000',
                            lineHeight: 1.5,
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

                plugins: {
                    labels: {
                        render: 'value',
                        fontColor: '#fff',
                        arc: false,
                    }
                }
            },
        });
    </script>

    <!-- ----------- Evidence Summary by Best Practices -------------- -->
    <script>
        const evidenceSummary = @json($evidenceSummary);
        const bestPracticeIds = evidenceSummary.map(row => row.best_practices_id);
        const bestPractices = evidenceSummary.map(row => row.best_practices_name);
        const evidenceCount = evidenceSummary.map(row => row.evidence_count);


        new Chart("evidenceSummaryChart", {
            type: "bar",
            data: {
                labels: bestPractices,
                datasets: [{
                    data: evidenceCount,
                    customData: bestPracticeIds,
                    backgroundColor: colors.GREEN,
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 10,
                            fontColor: '#000',
                            lineHeight: 1.5,
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

                    if (elements && elements.length > 0) {
                        var datasetIndex = elements[0]._datasetIndex;
                        var dataIndex = elements[0]._index;
                        var dataset = this.data.datasets[datasetIndex];
                        var bestPracticeId = dataset.customData[dataIndex];

                        window.location.href = `/domain-evidence/${bestPracticeId}`
                        // window.open("/domain-evidence/" + bestPracticeId);
                    }
                },
                plugins: {
                    labels: {
                        render: 'value',
                        fontColor: '#fff',
                        arc: false,
                    }
                }
            },

        });
    </script>

    <!------------- Asset Groups Vs Risks ---------------->
    <script>
        const riskVsAssetGroup = @json($riskVsAssetGroup);
        const assetGroupId = riskVsAssetGroup.assetGroupId
        const assetGroups = riskVsAssetGroup.assetGroupName
        const risk_count = riskVsAssetGroup.risk_count
        const open_risks = riskVsAssetGroup.open_risks
        const closed_risks = riskVsAssetGroup.closed_risks

        const assetChartBar = new Chart("assetGroupStatus", {
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
                            fontSize: 9,
                            fontColor: '#000000',
                            lineHeight: 1.5,
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

                                window.location.href = `/asset-group-risks/${dataPoint.id}`
                                // window.open(`/asset-group-risks/${dataPoint.id}`);
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

        function goBack() {
            window.history.back();
        }
    </script>

    <!------------- Risk Implementation Status ---------------->
    <script>
        const riskStatusLabel = [`Open`, "Closed"];
        const riskStatusCount = @json($riskStatus);

        const barColors = [
            "#FF0000",
            "#069806",
        ];

        new Chart("riskStatusChart", {
            type: "pie",
            data: {
                labels: riskStatusLabel, // Adding labels for each data point
                datasets: [{
                    backgroundColor: barColors,
                    data: [riskStatusCount.Open, riskStatusCount.Closed]
                }]
            },
            options: {
                title: {
                    display: false,
                },
                legend: {
                    display: false,
                    position: 'right',
                    labels: {
                        render: 'label',
                    }
                },
                plugins: {
                    labels: {
                        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                        render: 'percentage',
                        showZero: true,
                        fontSize: 16,
                        fontColor: '#fff',
                        arc: false,
                        position: 'border',
                    }
                },
                onClick: function(event, elements) {
                    window.location.href = `/risk-domain-compliance`;

                    // window.open(`/risk-domain-compliance`,
                    //     '_blank');


                },
            }
        });
    </script>

    <!------------- Asset Tech Overview ---------------->
    <script>
        const assetCountByTech = @json($assetCountByTech);
        const assetTypesKeys = Object.keys(assetCountByTech);
        const assetTypesValues = Object.values(assetCountByTech)

        new Chart("assetTechsChart", {
            type: "bar",
            data: {
                labels: assetTypesKeys,
                datasets: [{
                    backgroundColor: "#2196F3",
                    data: assetTypesValues,
                    // customData: assetGroupIds,
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 10,
                            fontColor: '#000',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }]
                },
                plugins: {
                    labels: {
                        render: 'value',
                        fontColor: '#fff',
                        arc: false,
                    }
                }
            },
        });
    </script>

    <!------------- Risk Tech Overview ---------------->
    <script>
        const riskCountByTech = @json($riskCountByTech);
        const riskTypesLabels = Object.keys(riskCountByTech)
        const riskTypesCount = Object.values(riskCountByTech)

        new Chart("riskTechChart", {
            type: "bar",
            data: {
                labels: riskTypesLabels,
                datasets: [{
                    backgroundColor: "#2196F3",
                    data: riskTypesCount,
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 10,
                            fontColor: '#000',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }]
                },
                // onClick: function(event, elements) {

                //     if (elements && elements.length > 0) {
                //         var datasetIndex = elements[0]._datasetIndex;
                //         var dataIndex = elements[0]._index;
                //         var dataset = this.data.datasets[datasetIndex];
                //         var groupId = dataset.customData[dataIndex];
                //         window.location.href = `/asset-type-compliance/${groupId}`
                //         // window.open("/asset-type-compliance/" + groupId);
                //     }
                // },
                plugins: {
                    labels: {
                        render: 'value',
                        fontColor: '#fff',
                        arc: false,
                    }
                }
            },
        });
    </script>

    <!------------- Control Tech Overview ---------------->
    <script>
        const controlCountByTech = @json($controlCountByTech);
        const controlTypesKeys = Object.keys(controlCountByTech)
        const controlTypesValues = Object.values(controlCountByTech)

        new Chart("controlTechChart", {
            type: "bar",
            data: {
                labels: controlTypesKeys,
                datasets: [{
                    backgroundColor: "#2196F3",
                    data: controlTypesValues,
                    // customData: assetGroupIds,
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 10,
                            fontColor: '#000',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }]
                },
                // onClick: function(event, elements) {

                //     if (elements && elements.length > 0) {
                //         var datasetIndex = elements[0]._datasetIndex;
                //         var dataIndex = elements[0]._index;
                //         var dataset = this.data.datasets[datasetIndex];
                //         var groupId = dataset.customData[dataIndex];
                //         window.location.href = `/asset-type-compliance/${groupId}`
                //         // window.open("/asset-type-compliance/" + groupId);
                //     }
                // },
                plugins: {
                    labels: {
                        render: 'value',
                        fontColor: '#fff',
                        arc: false,
                    }
                }
            },
        });
    </script>

    <!------------- Control Tech Overview ---------------->
    <script>
        const samaControlCountByMaturityLevel = @json($samaControlCountByMaturityLevel);
        const scc = samaControlCountByMaturityLevel.total_controls

        new Chart("samaMaturityLevel", {
            type: "bar",
            data: {
                labels: ['Level 1', 'Level 2', 'Level 3', 'Level 4', 'Level 5'],
                datasets: [{
                    backgroundColor: "#2196F3",
                    data: scc,
                    customData: [1, 2, 3, 4, 5],
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 10,
                            fontColor: '#000',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }]
                },
                onClick: function(event, elements) {

                    if (elements && elements.length > 0) {
                        var datasetIndex = elements[0]._datasetIndex;
                        var dataIndex = elements[0]._index;
                        var dataset = this.data.datasets[datasetIndex];
                        var level = dataset.customData[dataIndex];

                        window.location.href = `/sama-maturity-level/${level}`
                    }
                },
                plugins: {
                    labels: {
                        render: 'value',
                        fontColor: '#fff',
                        arc: false,
                    }
                }
            },
        });
    </script>



    <!------------- SAMA Control Tech Overview ---------------->
    <script>
        const samaControlCountByTech = @json($samaControlCountByTech);
        const samaControlTypesKeys = Object.keys(samaControlCountByTech)
        const samaControlTypesValues = Object.values(samaControlCountByTech)

        new Chart("samaControlTechChart", {
            type: "bar",
            data: {
                labels: samaControlTypesKeys,
                datasets: [{
                    backgroundColor: "#2196F3",
                    data: samaControlTypesValues,
                    // customData: assetGroupIds,
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 10,
                            fontColor: '#000',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }]
                },

                plugins: {
                    labels: {
                        render: 'value',
                        fontColor: '#fff',
                        arc: false,
                    }
                }
            },
        });
    </script>


    <!------------- Heatmap ---------------->
    <script>
        const heatmapData = {!! json_encode($heatmap) !!}
    
        const heatmapBackgroundColor = [
            "#00B050",
            "#A8D08D",
            "#FFFF00",
            "#FFC000",
            "#FF0000",
        ];

        new Chart("heatmapChart", {
            type: "pie",
            data: {
                labels: ["Very Low", "Low", "Medium", "High", "Critical"], // Corrected property name
                datasets: [{
                    backgroundColor: heatmapBackgroundColor, // Corrected property name
                    data: heatmapData
                }]
            },
            options: {
                title: {
                    display: false,
                },
                legend: {
                    display: true,
                    position: 'left',
                    labels: {
                        render: 'label',
                    }
                },
                plugins: {
                    labels: {
                        // render 'label', 'value', 'percentage', 'image' or custom function, default is 'percentage'
                        render: 'percentage',
                        showZero: false,
                        fontSize: 20,
                        fontColor: '#fff',
                        arc: false,
                        position: 'border',
                    }
                },
                // onClick: function(event, elements) {
                //     window.location.href = "/domain-compliance/NCA-ECC";
                // },
            }
        });
    </script>


    <script>
        const xPieTwoValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        const yPieTwoValues = [55, 49, 44, 24, 15];
        const barTwoColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        new Chart("myPieChartTwo", {
            type: "pie",
            data: {
                labels: xPieTwoValues, // Adding labels for each data point
                datasets: [{
                    backgroundColor: barTwoColors,
                    data: yPieTwoValues
                }]
            },
            options: {
                title: {
                    display: false,
                },
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        boxWidth: 20,
                        padding: 10
                    }
                }
            }
        });
    </script>


    <!-- ----------- Chart 1 -------------- -->

    <script>
        google.charts.load('current', {
            'packages': ['gauge']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Label', 'Value'],
                ['Risk', 2],
            ]);

            var options = {
                width: 400,
                height: 120,
                redFrom: 0,
                redTo: 6,
                yellowFrom: 6,
                yellowTo: 8,
                greenFrom: 8,
                greenTo: 10,
                blueFrom: 10,
                blueTo: 15,
                purpleFrom: 15,
                purpleTo: 25,
                minorTicks: 5,
            };

            var chart = new google.visualization.Gauge(document.getElementById('gauge_one'));

            chart.draw(data, options);

            setInterval(function() {
                data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
                chart.draw(data, options);
            }, 13000);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["bar"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Best Practices", "Implemented", "Partially Implemented", "Not Implemented"],
                ["NCA-ECC", 1, 2, 3],
                ["NCA-CCC", 6, 8, 10],
                ["NCA-DCC", 12, 14, 16],
                ["NCA-CSCC", 1, 0, 1],
                ["NCA-OSMACC", 2, 0, 3],
                ["NCA-TCC", 2, 0, 2],
            ]);

            var options = {
                chart: {
                    title: "",
                    subtitle: "",
                },
                bars: "horizontal",
                // height: 120,
                // width: 550,
            };

            var chart = new google.charts.Bar(
                document.getElementById("barchart_material")
            );

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

    <!-- ----------- Chart 2 -------------- -->
    <script>
        const xLineValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
        const yLineValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xLineValues,
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: yLineValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 6,
                            max: 16
                        }
                    }],
                }
            }
        });
    </script>

    <!-- ----------- Chart 4 -------------- -->
    <script>
        // Data for the doughnut chart
        const xdoughnutValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        const ydoughnutValues = [55, 49, 44, 24, 15];
        const bardoughnutColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        // Create the doughnut chart
        new Chart("doughnutChart", {
            type: "doughnut",
            data: {
                labels: xdoughnutValues,
                datasets: [{
                    backgroundColor: bardoughnutColors,
                    data: ydoughnutValues
                }]
            },
            options: {
                title: {
                    display: false
                },
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        boxWidth: 20,
                        padding: 10
                    }
                }
            }
        });
    </script>
    <!-- ----------- Chart 5 -------------- -->

    <!-- ----------- Chart 8 -------------- -->
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['gauge']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Label', 'Value'],
                ['Memory', 80],
            ]);

            var options = {
                width: 500,
                height: 110,
                redFrom: 90,
                redTo: 100,
                yellowFrom: 75,
                yellowTo: 90,
                minorTicks: 5,
            };

            var chart = new google.visualization.Gauge(document.getElementById('gauge_two'));

            chart.draw(data, options);

            setInterval(function() {
                data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
                chart.draw(data, options);
            }, 13000);
        }
    </script>







</body>

</html>
