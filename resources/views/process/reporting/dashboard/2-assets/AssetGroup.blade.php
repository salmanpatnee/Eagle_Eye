@extends('layouts.app-full')
@section('title', 'Overall Compliance Dashboard')
@section('title_ar', 'لوحة التحكم بالامتثال الشامل')
@section('content')

    <x-table.action-wrapper>
        <button type="button" data-filename="Risks on {{ $assetGroup->asset_group_name }}" id="print" class="action-btn">
            <x-icons.pdf />

            <span class="inline mx-2">Download as PDF</span>
        </button>

    </x-table.action-wrapper>


    <div id="print-area">
        <div class="grid grid-cols-1 px-4 mb-6">
            <div class="card mx-auto" style="width: 65%">
                <h3 class="card-title">Risks on {{ $assetGroup->asset_group_name }}</h3>
                <div style="position: relative;">
                    <canvas id="chart"></canvas>
                    <!-- Loading Text -->
                    <div class="sk-chase text-2xl"
                        style="display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; color: #1f2937; font-weight: bold;">
                        Loading...
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 px-4 mb-6">
            <div class="card" id="content">
                <h3 class="card-title" id="title">Asset Risk Status Overview</h3>
                <x-table.table>
                    <x-table.thead>
                        <x-table.th label="S.No" label_ar="رقم" />
                        <x-table.th label="Asset" label_ar="الأصول" />
                        <x-table.th label="Asset Owner" label_ar="مالك الأصول" />
                        <x-table.th label="Asset Custodians" label_ar="الأصول الوصي" />
                        <x-table.th label="Risk Owner" label_ar="مالك المخاطر" />
                        <x-table.th label="Risk Custodians" label_ar="الوصي المخاطر" />
                        <x-table.th label="Risk Status" label_ar="حالة المخاطر" />
                        <x-table.th label="Control Details" label_ar="تفاصيل التحكم" />
                    </x-table.thead>
                    <x-table.tbody id="table_body">
                    </x-table.tbody>
                </x-table.table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
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

            const assetChartBar = new Chart("chart", {
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



                                    $('#content').css('visibility', 'hidden');
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
                                                    $("h2#title").text(
                                                        "Asset Risk Status Overview");
                                                } else if (dataPoint.statusCode === 1) {
                                                    $("h2#title").text(
                                                        "Asset Closed Risk Status Overview");
                                                } else if (dataPoint.statusCode === 3) {
                                                    $("h2#title").text(
                                                        "Asset Open Risk Status Overview");
                                                }
                                                let i = 1;
                                                response.forEach(row => {
                                                    html += "<tr>";
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${i}</span></td>`;
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"><a href="/asset-register-table/${row.asset_id}" >${row.asset_name}</a></span></td>`;
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"><a href="/owners/${row.asset_owner_id}" >${row.asset_owner_name}</a></span></td>`;
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.asset_custodians}</span></td>`;
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"><a href="/risk-identification-table/${row.risk_id}" >${row.risk_name}</a></span></td>`;
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"><a href="/owners/${row.risk_owner_id}" >${row.risk_owner_name}</a></span></td>`;
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.risk_custodians}</span></td>`;
                                                    // html += `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"><a href="/risk-assessment-table/${row.risk_assessment_id}" >${row.latest_status}</a></span></td>`;
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.latest_status}</span></td>`;
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"><a href="/risk-controls/${row.risk_id}">View Controls</a></span></td>`;
                                                    // if (row.control_assessment_id != "#") {
                                                    // } else {
                                                    //     html +=
                                                    //         `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.control_id}</span></td>`;
                                                    // }

                                                    // if (row.control_assessment_id != "#") {
                                                    //     html +=
                                                    //         `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"> <a href="/control-assessments/${row.control_assessment_id}" >${row.status}</a></span></td>`;
                                                    // } else {
                                                    //     html +=
                                                    //         `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.status}</span></td>`;
                                                    // }
                                                    // html +=
                                                    //     `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"> <a href="/owners/${ownerNameId}" >${owner}</a></span></td>`;
                                                    // html +=
                                                    //     `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"><a href="/custodian-table/${row.custodian_name_id}" >${row.custodians}</a></span></td>`;
                                                    html += "</tr>";
                                                    i++;
                                                });
                                                $(tableBody).html(html)

                                                $('.sk-chase').hide();
                                                $('#content').css('visibility',
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
@endpush
