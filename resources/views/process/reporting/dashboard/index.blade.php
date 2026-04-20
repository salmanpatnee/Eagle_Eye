@extends('layouts.app-full')
@section('title', 'Compliance Dashboard')
@section('title_ar', 'لوحة معلومات الامتثال')

@section('content')

    <x-table.action-wrapper>

        <button type="button" data-filename="Overall Compliance Dashboard" id="print" class="action-btn">
            <x-icons.pdf />
            <span class="inline mx-2">Download as PDF</span>
        </button>
        <x-action.excel-button route_name="generate.ppt" label="Download as PPT"
            data-filename="Overall Compliance Dashboard" />
    </x-table.action-wrapper>

    <div id="print-area">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-6">
            <div class="card">
                <h3 class="card-title">SAMA Non-Compliance Status</h3>
                <canvas id="samaNonComplianceGauge"></canvas>
            </div>
            <div class="card">
                <h3 class="card-title">NCA Non-Compliance Status</h3>
                <canvas id="ncaNonComplianceGauge"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-6">
            <div class="card">
                <h3 class="card-title">NCA-ECC Compliance Status</h3>
                <canvas id="eccStatusChart"></canvas>
            </div>
            <div class="card">
                <h3 class="card-title">SAMA Compliance Status</h3>
                <canvas id="samaStatusChart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-6">
            <div class="card">
                <h3 class="card-title">Asset Distribution by Group</h3>
                <canvas id="assetGroupsChart"></canvas>
            </div>
            <div class="card">
                <h3 class="card-title">Implemented Controls of Best Practices</h3>
                <canvas id="ncaDomainChart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1 px-4 mb-6">
            <div class="card">
                <h3 class="card-title">Owner's Control Status</h3>
                <canvas id="ownerControlsChart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-6">
            <div class="card">
                <h3 class="card-title">Asset Technology Distribution Overviewp</h3>
                <canvas id="assetTechChart"></canvas>
            </div>
            <div class="card">
                <h3 class="card-title">Evidence Summary by Best Practices</h3>
                <canvas id="evidenceSummaryChart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-6">
            <div class="card">
                <h3 class="card-title">Risk Status by Asset Group</h3>
                <canvas id="assetGroupStatus"></canvas>
            </div>
            <div class="card">
                <h3 class="card-title">Risk Status</h3>
                <canvas id="riskStatusChart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-6">
            <div class="card">
                <h3 class="card-title">Asset Distribution by Technologies</h3>
                <canvas id="assetTechsChart"></canvas>
            </div>
            <div class="card">
                <h3 class="card-title">Risk Distribution by Technologies</h3>
                <canvas id="riskTechChart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-6">
            <div class="card">
                <h3 class="card-title">NCA Control Distribution by Technologies</h3>
                <canvas id="controlTechChart"></canvas>
            </div>
            <div class="card">
                <h3 class="card-title">SAMA Control Distribution by Technologies</h3>
                <canvas id="samaControlTechChart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-6">
            <div class="card">
                <h3 class="card-title">SAMA Control Maturity Level Distribution</h3>
                <canvas id="samaMaturityLevel"></canvas>
            </div>
            <div class="card">
                <h3 class="card-title">Heatmap - Risk Appetite Breakdown</h3>
                <canvas id="heatmapChart"></canvas>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-gauge@0.3.0/dist/chartjs-gauge.min.js"></script>
    <script src="{{ asset('js/compliance-dashboard.js') }}"></script>

    <script>
        createPieChart(
            "eccStatusChart",
            @json($eccComplianceStatus),
            "/domain-compliance/NCA-ECC"
        );
        createPieChart(
            "samaStatusChart",
            @json($samaComplianceStatus),
            "/domain-compliance/SAMA-CSF",
            true
        );

        const {
            assetGroupIds,
            assetGroupLabels,
            assetCounts
        } = @json($assetGroupOverview);

        createBarChart({
            elementId: "assetGroupsChart",
            labels: assetGroupLabels,
            data: assetCounts,
            customData: assetGroupIds,
            backgroundColor: "#2196F3",
            xAxisFontSize: 10,
            onClickUrlPrefix: "/asset-type-compliance"
        });

        // NCA Domain Compliance Status
        const data = @json($bestPracticesComplainceStatus);
        const labels = data.map(row => row.best_practices_name);
        const values = data.map(row => row.controls_implemented);
        createBarChart({
            elementId: "ncaDomainChart",
            labels,
            data: values,
            customData: labels,
            backgroundColor: "#2196F3",
            xAxisFontSize: 8,
            onClickUrlPrefix: "/domain-compliance"
        });
    </script>

    <!------------- Owner Controls ---------------->
    <script>
        const colors = {
            BLUE: "#2196F3",
            GREEN: "#228B22",
            ORANGE: "#FFC107",
            RED: "#FF0000",
            GREY: "#9E9E9E"
        };
        const s = @json($ownerControlsStatus);

        const datasets = [{
                label: 'Total Controls',
                color: colors.BLUE,
                data: s.total_controls,
                status: null
            },
            {
                label: 'Implemented',
                color: colors.GREEN,
                data: s.implemented,
                status: 1
            },
            {
                label: 'Partially Implemented',
                color: colors.ORANGE,
                data: s.partially_implemented,
                status: 3
            },
            {
                label: 'Not Implemented',
                color: colors.RED,
                data: s.not_implemented,
                status: 2
            },
            {
                label: 'Not Applicable',
                color: colors.GREY,
                data: s.not_applicable,
                status: 4
            }
        ].map(ds => ({
            label: ds.label,
            backgroundColor: ds.color,
            data: ds.data.map((y, i) => ({
                x: s.owner_name[i],
                y,
                id: s.owner_role_ids[i],
                statusCode: ds.status
            }))
        }));

        const chartBar = new Chart("ownerControlsChart", {
            type: "bar",
            data: {
                labels: s.owner_name,
                datasets
            },
            options: {
                legend: {
                    display: true
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 9,
                            fontColor: '#000',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }]
                },
                onClick: function(event, elements) {
                    if (elements.length) {
                        const el = chartBar.getElementAtEvent(event)[0];
                        if (el) {
                            const d = chartBar.data.datasets[el._datasetIndex].data[el._index];
                            window.location.href = `/owner-controls/${d.id}?status=${d.statusCode}`;
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
        (function () {
            function buildGauge(elementId, dataObj) {
                const implemented   = dataObj['Implemented']           ?? 0;
                const notImpl       = dataObj['Not Implemented']       ?? 0;
                const partial       = dataObj['Partially Implemented'] ?? 0;
                const notApplicable = dataObj['Not Applicable']        ?? 0;
                const total = implemented + notImpl + partial + notApplicable;
                const pct = total > 0 ? Math.round((notImpl + partial) / total * 100) : 0;

                new Chart(document.getElementById(elementId), {
                    type: 'gauge',
                    data: {
                        labels: ['High Risk (67–100%)', 'Medium Risk (34–66%)', 'Low Risk (0–33%)'],
                        datasets: [{
                            value: 100 - pct,
                            data: [34, 33, 33],
                            backgroundColor: ['#FF0000', '#FFC107', '#228B22'],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        layout: { padding: { bottom: 30 } },
                        needle: { radiusPercentage: 2, widthPercentage: 3.2, lengthPercentage: 80, color: 'rgba(0,0,0,1)' },
                        valueLabel: { display: true, formatter: () => pct + '%', fontSize: 22, color: '#FF0000', backgroundColor: 'rgba(0,0,0,0)' },
                        tooltips: {
                            enabled: true,
                            callbacks: {
                                label: function(tooltipItem, data) {
                                    return data.labels[tooltipItem.index] + ': ' + pct + '% non-compliant';
                                }
                            }
                        },
                        legend: {
                            display: true,
                            position: 'bottom',
                            labels: {
                                generateLabels: function() {
                                    return [
                                        { text: 'High (67–100%)',  fillStyle: '#FF0000', strokeStyle: '#FF0000', lineWidth: 1 },
                                        { text: 'Medium (34–66%)', fillStyle: '#FFC107', strokeStyle: '#FFC107', lineWidth: 1 },
                                        { text: 'Low (0–33%)',     fillStyle: '#228B22', strokeStyle: '#228B22', lineWidth: 1 }
                                    ];
                                }
                            }
                        }
                    }
                });
            }

            buildGauge('samaNonComplianceGauge', @json($samaComplianceStatus));
            buildGauge('ncaNonComplianceGauge',  @json($eccComplianceStatus));
        })();
    </script>
@endpush
