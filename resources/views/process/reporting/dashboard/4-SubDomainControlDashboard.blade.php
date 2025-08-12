@extends('layouts.app-full')
@section('title', 'Overall Compliance Dashboard')
@section('title_ar', 'لوحة التحكم بالامتثال الشامل')
@section('content')


    <div class="grid grid-cols-1 px-4 mb-6">
        <div class="card">
            <h3 class="card-title">Sub Domains Compliance Status</h3>
            <div style="height: 400px; position: relative;">
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
            <h3 class="card-title" id="title">Sub Domains Compliance Status</h3>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="S.No" label_ar="رقم" />
                    <x-table.th label="Control ID" label_ar="رمز الضوابط" />
                    <x-table.th label="Status" label_ar="حالة" />
                    <x-table.th label="Owner Name" label_ar="اسم مالك" />
                    <x-table.th label="Custodians" label_ar="اسم الوصي" />
                    <x-table.th label="Evidences" label_ar="الأدلة" />
                </x-table.thead>
                <x-table.tbody id="table_body">

                </x-table.tbody>
            </x-table.table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function initializeCharts() {
            // Show spinner when chart is loading
            $('.sk-chase').show();

            // Add a small delay to ensure spinner is visible
            setTimeout(() => {
                const subDomainIds = {!! json_encode($sub_domain_id) !!}
                const subDomains = {!! json_encode($subdomain_names) !!}
                const totalControls = {!! json_encode($controls_count) !!}
                const implementedCount = {!! json_encode($implemented) !!}
                const partiallyImplementedCount = {!! json_encode($partially_implemented) !!}
                const notImplementedCount = {!! json_encode($not_implemented) !!}
                const notApplicableCount = {!! json_encode($not_applicable) !!}



                const chartBar = new Chart("chart", {
                    type: "bar",
                    data: {
                        labels: subDomains,
                        datasets: [{
                                label: 'Total Controls',
                                backgroundColor: "#2196F3",
                                data: totalControls.map((value, index) => ({
                                    x: subDomains[index],
                                    y: value,
                                    id: subDomainIds[index],
                                    statusCode: null
                                }))
                            },
                            {
                                label: 'Implemented',
                                backgroundColor: "#228B22",
                                data: implementedCount.map((value, index) => ({
                                    x: subDomains[index],
                                    y: value,
                                    id: subDomainIds[index],
                                    statusCode: 1
                                }))
                            },
                            {
                                label: 'Partially Implemented',
                                backgroundColor: "#FFC107",
                                data: partiallyImplementedCount.map((value, index) => ({
                                    x: subDomains[index],
                                    y: value,
                                    id: subDomainIds[index],
                                    statusCode: 3
                                }))
                            },
                            {
                                label: 'Not Implemented',
                                backgroundColor: "#FF0000",
                                data: notImplementedCount.map((value, index) => ({
                                    x: subDomains[index],
                                    y: value,
                                    id: subDomainIds[index],
                                    statusCode: 2
                                }))
                            },
                            {
                                label: 'Not Applicable',
                                backgroundColor: "#9E9E9E",
                                data: notApplicableCount.map((value, index) => ({
                                    x: subDomains[index],
                                    y: value,
                                    id: subDomainIds[index],
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
                        plugins: {
                            datalabels: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': ' + context.parsed.y;
                                    }
                                }
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return value;
                                    }
                                }
                            }
                        },
                        onClick: function(event, elements) {
                            if (elements.length > 0) {
                                const element = chartBar.getElementAtEvent(event)[0];
                                if (element) {

                                    const datasetIndex = element._datasetIndex;
                                    const dataIndex = element._index;
                                    const subDomainName = subDomains[dataIndex];


                                    const dataset = chartBar.data.datasets[datasetIndex];
                                    if (dataset && dataset.data[dataIndex]) {
                                        const dataPoint = dataset.data[dataIndex];
                                        $('#content').css('visibility', 'hidden');
                                        $('.sk-chase').show();
                                        const tableBody = $('#table_body');
                                        let html = "";

                                        $.ajax({
                                            url: `/owner-compliance/${dataPoint.id}?status=${dataPoint.statusCode}`,
                                            type: 'GET',
                                            dataType: 'json',
                                            success: function(response) {
                                                if (response.length) {
                                                    $("#title").text(
                                                        `${dataPoint.id} - ${subDomainName}`
                                                    );
                                                    let i = 1;
                                                    response.forEach(row => {

                                                        html += "<tr>";

                                                        html +=
                                                            `<td class="px-3 py-3 whitespace-nowrap"><span class="block font-medium text-gray-700 text-theme-sm">${i}</span></td>`;
                                                        if (row
                                                            .control_assessment_id
                                                        ) {

                                                            html +=
                                                                `<td class="px-3 py-3 whitespace-nowrap " style="vertical-align: top;">
                                                                    <a href="/control-assessments/${row.control_assessment_id}" >
                                                                        <span class="block font-medium text-gray-700 text-theme-sm">
                                                                        ${row.control_id}
                                                                        </span>
                                                                    </a>
                                                                </td>`;
                                                        } else {
                                                            html +=
                                                                `<td class="px-3 py-3 whitespace-nowrap " style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.control_id}</span></td>`;
                                                        }

                                                        if (row
                                                            .control_assessment_id
                                                        ) {

                                                            html +=
                                                                `<td class="px-3 py-3 whitespace-nowrap " style="vertical-align: top;"> <a href="/control-assessments/${row.control_assessment_id}"> <span class="block font-medium text-gray-700 text-theme-sm">${row.status}</span></a></td>`;
                                                        } else {
                                                            html +=
                                                                `<td class="px-3 py-3 whitespace-nowrap " style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.status}</span></td>`;
                                                        }

                                                        html +=
                                                            `<td class="px-3 py-3 whitespace-nowrap " style="vertical-align: top;"><a href="/owners/${row.id}" ><span class="block font-medium text-gray-700 text-theme-sm">${row.owner_name}</span></a></td>`;
                                                        html +=
                                                            `<td class="px-3 py-3 whitespace-nowrap " style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.custodians}</span></td>`;

                                                        if (row.evidences) {

                                                            html +=
                                                                `<td class="px-3 py-3 whitespace-nowrap " style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.evidences}</span></td>`;
                                                        } else {
                                                            html +=
                                                                `<td class="px-3 py-3 whitespace-nowrap " style="vertical-align: top;">_</td>`;
                                                        }
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
                        }
                    }
                });

                // Hide spinner after chart is loaded
                $('.sk-chase').hide();
            }, 100); // 100ms delay to show spinner

        }

        // Call the function to initialize both charts
        initializeCharts();
    </script>
@endpush
