@extends('layouts.app-full')
@section('title', 'Compliance Dashboard')
@section('title_ar', 'لوحة معلومات الامتثال')

@push('css')
<style>
:root {
    --dn: #0B2447;
    --db: #2563EB;
    --dt: #0EA5E9;
    --dg: #059669;
    --da: #D97706;
    --dr: #DC2626;
    --dm: #64748B;
}

#print-area .card {
    padding: 20px 22px;
    border-color: #E2E8F0;
    box-shadow: 0 1px 4px rgba(15,23,42,0.06);
    position: relative;
    overflow: hidden;
    transition: box-shadow 0.2s, transform 0.2s;
}
#print-area .card:hover {
    box-shadow: 0 4px 16px rgba(15,23,42,0.1);
    transform: translateY(-2px);
}
#print-area .card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--db) 0%, var(--dt) 100%);
    border-radius: 12px 12px 0 0;
}
#print-area .card-title {
    font-family: 'Outfit', sans-serif;
    font-size: 11px;
    font-weight: 700;
    color: var(--dn);
    text-align: left;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    margin-bottom: 14px;
    padding-bottom: 10px;
    border-bottom: 1px solid #F1F5F9;
}

.dash-pg-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    padding: 4px 16px 20px;
    border-bottom: 1px solid #F1F5F9;
    margin-bottom: 24px;
    flex-wrap: wrap;
    gap: 12px;
}
.dash-pg-title {
    font-family: 'Outfit', sans-serif;
    font-size: 24px;
    font-weight: 800;
    color: var(--dn);
    line-height: 1.2;
}
.dash-pg-sub {
    font-size: 13px;
    color: var(--dm);
    margin-top: 4px;
}

.dash-kpi-strip {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    padding: 0 16px;
    margin-bottom: 28px;
}
.dash-kpi-card {
    background: #fff;
    border-radius: 14px;
    border: 1px solid #E2E8F0;
    padding: 18px 20px;
    box-shadow: 0 1px 4px rgba(15,23,42,0.06);
    border-left: 3px solid transparent;
    transition: box-shadow 0.2s, transform 0.2s;
}
.dash-kpi-card:hover {
    box-shadow: 0 4px 16px rgba(15,23,42,0.1);
    transform: translateY(-2px);
}
.k-blue  { border-left-color: var(--db); }
.k-teal  { border-left-color: var(--dt); }
.k-amber { border-left-color: var(--da); }
.k-green { border-left-color: var(--dg); }

.dash-kpi-lbl {
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: #94A3B8;
    margin-bottom: 8px;
}
.dash-kpi-val {
    font-family: 'Outfit', sans-serif;
    font-size: 36px;
    font-weight: 800;
    line-height: 1;
    margin-bottom: 4px;
}
.k-blue  .dash-kpi-val { color: var(--db); }
.k-teal  .dash-kpi-val { color: var(--dt); }
.k-amber .dash-kpi-val { color: var(--da); }
.k-green .dash-kpi-val { color: var(--dg); }
.dash-kpi-desc { font-size: 12px; color: var(--dm); line-height: 1.4; }

.dash-section {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 0 16px;
    margin: 28px 0 14px;
}
.dash-section::after {
    content: '';
    flex: 1;
    height: 1px;
    background: #E2E8F0;
}
.dash-section-badge {
    font-size: 9px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    color: var(--db);
    background: #EFF6FF;
    border: 1px solid rgba(37,99,235,0.18);
    padding: 2px 8px;
    border-radius: 100px;
}
.dash-section-title {
    font-family: 'Outfit', sans-serif;
    font-size: 15px;
    font-weight: 700;
    color: var(--dn);
    white-space: nowrap;
}

@media (max-width: 1024px) { .dash-kpi-strip { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 640px)  { .dash-kpi-strip { grid-template-columns: 1fr; }
    .dash-pg-header { flex-direction: column; } }
</style>
@endpush

@section('content')

@php
    $samaImpl  = (int) ($samaComplianceStatus->Implemented ?? 0);
    $samaTotal = max(1, collect((array) $samaComplianceStatus)->sum());
    $samaScore = round($samaImpl / $samaTotal * 100);

    $eccImpl  = (int) ($eccComplianceStatus->Implemented ?? 0);
    $eccTotal = max(1, collect((array) $eccComplianceStatus)->sum());
    $eccScore = round($eccImpl / $eccTotal * 100);

    $openRisks   = (int) ($riskStatus->Open   ?? 0);
    $closedRisks = (int) ($riskStatus->Closed ?? 0);

    $totalCtrl = collect($ownerControlsStatus['total_controls'] ?? [])->sum();
    $implCtrl  = collect($ownerControlsStatus['implemented']    ?? [])->sum();
    $ctrlScore = $totalCtrl > 0 ? round($implCtrl / $totalCtrl * 100) : 0;
@endphp

{{-- Page header + actions --}}
<div class="dash-pg-header">
    <div>
        <div class="dash-pg-title">Compliance Dashboard</div>
        <div class="dash-pg-sub">Overall GRC posture — compliance, risks, controls &amp; assets at a glance</div>
    </div>
    <div class="flex gap-2 items-center">
        <button type="button" data-filename="Overall Compliance Dashboard" id="print" class="action-btn">
            <x-icons.pdf /><span class="inline mx-2">Download as PDF</span>
        </button>
        <x-action.excel-button route_name="generate.ppt" label="Download as PPT"
            data-filename="Overall Compliance Dashboard" />
    </div>
</div>

{{-- KPI Strip --}}
{{-- <div class="dash-kpi-strip">
    <div class="dash-kpi-card k-blue">
        <div class="dash-kpi-lbl">SAMA Compliance</div>
        <div class="dash-kpi-val">{{ $samaScore }}%</div>
        <div class="dash-kpi-desc">{{ $samaImpl }} of {{ $samaTotal }} controls</div>
    </div>
    <div class="dash-kpi-card k-teal">
        <div class="dash-kpi-lbl">NCA Compliance</div>
        <div class="dash-kpi-val">{{ $eccScore }}%</div>
        <div class="dash-kpi-desc">{{ $eccImpl }} of {{ $eccTotal }} controls</div>
    </div>
    <div class="dash-kpi-card k-amber">
        <div class="dash-kpi-lbl">Open Risks</div>
        <div class="dash-kpi-val">{{ $openRisks }}</div>
        <div class="dash-kpi-desc">{{ $closedRisks }} risks closed</div>
    </div>
    <div class="dash-kpi-card k-green">
        <div class="dash-kpi-lbl">Controls Passed</div>
        <div class="dash-kpi-val">{{ $ctrlScore }}%</div>
        <div class="dash-kpi-desc">{{ $implCtrl }} of {{ $totalCtrl }} implemented</div>
    </div>
</div> --}}

<div id="print-area">
    {{-- Section 1: Framework Compliance --}}
    <div class="dash-section">
        <span class="dash-section-badge">01</span>
        <span class="dash-section-title">Framework Compliance</span>
    </div>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-4">
        <div class="card"><h3 class="card-title">SAMA Non-Compliance Status</h3><canvas id="samaNonComplianceGauge"></canvas></div>
        <div class="card"><h3 class="card-title">NCA Non-Compliance Status</h3><canvas id="ncaNonComplianceGauge"></canvas></div>
    </div>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-6">
        <div class="card"><h3 class="card-title">NCA-ECC Compliance Status</h3><canvas id="eccStatusChart"></canvas></div>
        <div class="card"><h3 class="card-title">SAMA Compliance Status</h3><canvas id="samaStatusChart"></canvas></div>
    </div>

    {{-- Section 2: Assets & Controls --}}
    <div class="dash-section">
        <span class="dash-section-badge">02</span>
        <span class="dash-section-title">Assets &amp; Controls</span>
    </div>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-4">
        <div class="card"><h3 class="card-title">Asset Distribution by Group</h3><canvas id="assetGroupsChart"></canvas></div>
        <div class="card"><h3 class="card-title">Implemented Controls of Best Practices</h3><canvas id="ncaDomainChart"></canvas></div>
    </div>
    <div class="grid grid-cols-1 px-4 mb-4">
        <div class="card"><h3 class="card-title">Owner's Control Status</h3><canvas id="ownerControlsChart"></canvas></div>
    </div>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-6">
        <div class="card"><h3 class="card-title">Asset Technology Distribution Overview</h3><canvas id="assetTechChart"></canvas></div>
        <div class="card"><h3 class="card-title">Evidence Summary by Best Practices</h3><canvas id="evidenceSummaryChart"></canvas></div>
    </div>

    {{-- Section 3: Risk Analysis --}}
    <div class="dash-section">
        <span class="dash-section-badge">03</span>
        <span class="dash-section-title">Risk Analysis</span>
    </div>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-6">
        <div class="card"><h3 class="card-title">Risk Status by Asset Group</h3><canvas id="assetGroupStatus"></canvas></div>
        <div class="card"><h3 class="card-title">Risk Status</h3><canvas id="riskStatusChart"></canvas></div>
    </div>

    {{-- Section 4: Technology Distribution --}}
    <div class="dash-section">
        <span class="dash-section-badge">04</span>
        <span class="dash-section-title">Technology Distribution</span>
    </div>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-4">
        <div class="card"><h3 class="card-title">Asset Distribution by Technologies</h3><canvas id="assetTechsChart"></canvas></div>
        <div class="card"><h3 class="card-title">Risk Distribution by Technologies</h3><canvas id="riskTechChart"></canvas></div>
    </div>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-6">
        <div class="card"><h3 class="card-title">NCA Control Distribution by Technologies</h3><canvas id="controlTechChart"></canvas></div>
        <div class="card"><h3 class="card-title">SAMA Control Distribution by Technologies</h3><canvas id="samaControlTechChart"></canvas></div>
    </div>

    {{-- Section 5: Maturity & Risk Appetite --}}
    <div class="dash-section">
        <span class="dash-section-badge">05</span>
        <span class="dash-section-title">Maturity &amp; Risk Appetite</span>
    </div>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-6">
        <div class="card"><h3 class="card-title">SAMA Control Maturity Level Distribution</h3><canvas id="samaMaturityLevel"></canvas></div>
        <div class="card"><h3 class="card-title">Heatmap - Risk Appetite Breakdown</h3><canvas id="heatmapChart"></canvas></div>
    </div>

    {{-- Section 6: Audit Findings --}}
    <div class="dash-section">
        <span class="dash-section-badge">06</span>
        <span class="dash-section-title">Audit Findings</span>
    </div>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 px-4 mb-6">
        <div class="card"><h3 class="card-title">Audit Finding Status Distribution</h3><canvas id="auditFindingStatusChart"></canvas></div>
        <div class="card"><h3 class="card-title">Audit Findings by Owner</h3><canvas id="auditFindingOwnerChart"></canvas></div>
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
            backgroundColor: "#2563EB",
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
            backgroundColor: "#2563EB",
            xAxisFontSize: 8,
            onClickUrlPrefix: "/domain-compliance"
        });
    </script>

    <!------------- Owner Controls ---------------->
    <script>
        const colors = {
            BLUE:   "#2563EB",
            GREEN:  "#059669",
            ORANGE: "#F59E0B",
            RED:    "#DC2626",
            GREY:   "#94A3B8"
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
                            fontColor: '#64748B',
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
                    backgroundColor: "#2563EB",
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
                            fontColor: '#64748B',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#64748B',
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
                            fontColor: '#64748B',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#64748B',
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
                            statusCode: 'Open'
                        })),
                    },
                    {
                        label: 'Closed',
                        backgroundColor: colors.GREEN,
                        data: closed_risks.map((value, index) => ({
                            x: assetGroups[index],
                            y: value,
                            id: assetGroupId[index],
                            statusCode: 'Close'
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
                            fontColor: '#64748B',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#64748B',
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

                                const url = `/asset-group-risks/${dataPoint.id}` + (dataPoint.statusCode ? `?status=${dataPoint.statusCode}` : '');
                                window.location.href = url;
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
            "#DC2626",
            "#059669",
        ];

        new Chart("riskStatusChart", {
            type: "pie",
            data: {
                labels: riskStatusLabel,
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
                        render: 'percentage',
                        showZero: true,
                        fontSize: 16,
                        fontColor: '#fff',
                        arc: false,
                        position: 'border',
                    }
                },
                onClick: function(event, elements) {
                    const statusMap = ['Open', 'Close'];
                    const status = elements.length > 0 ? statusMap[elements[0]._index] : null;
                    const url = '/risk-domain-compliance' + (status ? `?status=${status}` : '');
                    window.location.href = url;
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
                    backgroundColor: "#2563EB",
                    data: assetTypesValues,
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
                            fontColor: '#64748B',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#64748B',
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
                    backgroundColor: "#2563EB",
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
                            fontColor: '#64748B',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#64748B',
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
                    backgroundColor: "#2563EB",
                    data: controlTypesValues,
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
                            fontColor: '#64748B',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#64748B',
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
                    backgroundColor: "#2563EB",
                    data: samaControlTypesValues,
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
                            fontColor: '#64748B',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#64748B',
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
                    backgroundColor: "#2563EB",
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
                            fontColor: '#64748B',
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
                labels: ["Very Low", "Low", "Medium", "High", "Critical"],
                datasets: [{
                    backgroundColor: heatmapBackgroundColor,
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
                        render: 'percentage',
                        showZero: false,
                        fontSize: 20,
                        fontColor: '#fff',
                        arc: false,
                        position: 'border',
                    }
                },
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
                            backgroundColor: ['#DC2626', '#F59E0B', '#059669'],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        layout: { padding: { bottom: 30 } },
                        needle: { radiusPercentage: 2, widthPercentage: 3.2, lengthPercentage: 80, color: 'rgba(0,0,0,1)' },
                        valueLabel: { display: true, formatter: () => pct + '%', fontSize: 22, color: '#DC2626', backgroundColor: 'rgba(0,0,0,0)' },
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
                                        { text: 'High (67–100%)',  fillStyle: '#DC2626', strokeStyle: '#DC2626', lineWidth: 1 },
                                        { text: 'Medium (34–66%)', fillStyle: '#F59E0B', strokeStyle: '#F59E0B', lineWidth: 1 },
                                        { text: 'Low (0–33%)',     fillStyle: '#059669', strokeStyle: '#059669', lineWidth: 1 }
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

    <!------------- Audit Finding Status Distribution ---------------->
    <script>
        const auditFindingStatus = @json($auditFindingStatus);
        const auditFindingLabels = ['Open - Not Started', 'Open - WIP', 'Closed'];
        const auditFindingCounts = [
            auditFindingStatus.open_not_started ?? 0,
            auditFindingStatus.open_wip ?? 0,
            auditFindingStatus.closed ?? 0
        ];
        const auditFindingColors = ['#DC2626', '#F59E0B', '#059669'];

        new Chart("auditFindingStatusChart", {
            type: "pie",
            data: {
                labels: auditFindingLabels,
                datasets: [{
                    backgroundColor: auditFindingColors,
                    data: auditFindingCounts
                }]
            },
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                },
                plugins: {
                    labels: {
                        render: 'percentage',
                        showZero: false,
                        fontSize: 14,
                        fontColor: '#fff',
                        arc: false,
                        position: 'border',
                    }
                },
                onClick: function(event, elements) {
                    if (elements && elements.length > 0) {
                        const status = auditFindingLabels[elements[0]._index];
                        window.location.href = '/audit-findings?status=' + encodeURIComponent(status);
                    }
                },
            }
        });
    </script>

    <!------------- Audit Findings by Owner ---------------->
    <script>
        const auditOwnerData = @json($auditFindingOwnerData);

        const auditOwnerChart = new Chart("auditFindingOwnerChart", {
            type: "bar",
            data: {
                labels: auditOwnerData.owner_names,
                datasets: [
                    {
                        label: 'Open - Not Started',
                        backgroundColor: '#DC2626',
                        data: (auditOwnerData.open_not_started ?? []).map((y, i) => ({
                            x: auditOwnerData.owner_names[i],
                            y,
                            status: 'Open - Not Started'
                        }))
                    },
                    {
                        label: 'Open - WIP',
                        backgroundColor: '#F59E0B',
                        data: (auditOwnerData.open_wip ?? []).map((y, i) => ({
                            x: auditOwnerData.owner_names[i],
                            y,
                            status: 'Open - WIP'
                        }))
                    },
                    {
                        label: 'Closed',
                        backgroundColor: '#059669',
                        data: (auditOwnerData.closed ?? []).map((y, i) => ({
                            x: auditOwnerData.owner_names[i],
                            y,
                            status: 'Closed'
                        }))
                    }
                ]
            },
            options: {
                legend: {
                    display: true
                },
                scales: {
                    xAxes: [{
                        stacked: true,
                        ticks: {
                            fontSize: 9,
                            fontColor: '#64748B',
                            lineHeight: 1.5,
                            padding: 4
                        }
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#64748B',
                        }
                    }]
                },
                onClick: function(event, elements) {
                    if (elements && elements.length > 0) {
                        const el = auditOwnerChart.getElementAtEvent(event)[0];
                        if (el) {
                            const d = auditOwnerChart.data.datasets[el._datasetIndex].data[el._index];
                            window.location.href = '/audit-findings?status=' + encodeURIComponent(d.status);
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
@endpush
