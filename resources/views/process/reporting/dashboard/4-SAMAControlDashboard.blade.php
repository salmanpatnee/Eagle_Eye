@extends('layouts.app-full')
@section('title', 'Overall Compliance Dashboard')
@section('title_ar', 'لوحة التحكم بالامتثال الشامل')
@section('content')

    <x-table.action-wrapper>
        <button type="button" data-filename="SAMA Controls Maturity Level {{ $maturityLevel->display() }} Distribution" id="print"
            class="action-btn">
            <x-icons.pdf />

            <span class="inline mx-2">Download as PDF</span>
        </button>

    </x-table.action-wrapper>


    <div id="print-area">
        <div class="grid grid-cols-1 px-4 mb-6">
            <div class="card mx-auto" style="width: 65%">
                <h3 class="card-title">SAMA Controls Maturity Level {{ $maturityLevel->display() }} Distribution</h3>
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
                <h3 class="card-title" id="title">Control Status Report</h3>
                <x-table.table>
                    <x-table.thead>
                        <x-table.th label="S.No" label_ar="رقم" />
                        <x-table.th label="Control ID" label_ar="رمز الضوابط" />
                        <x-table.th label="Status" label_ar="حالة" />
                        <x-table.th label="Owner Name" label_ar="اسم مالك" />
                        <x-table.th label="Custodians" label_ar="اسم الوصي" />
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


            const controls = {!! json_encode($controls) !!};
            const level = {!! $level !!};

            const chartBar = new Chart("chart", {
                type: "bar",
                data: {
                    labels: [{{ Illuminate\Support\Js::from($maturityLevel->display()) }}], // Single label since it's aggregated data
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

                                    $('#content').css('visibility', 'hidden');
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
                                                $("#title").text(`Status: ${dataset.label}`);
                                                let i = 1;
                                                response.forEach(row => {
                                                    html += "<tr>";
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${i}</span></td>`;
                                                    html += row.control_assessment_id ?
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.control_id}</span></td>` :
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.control_id}</span></td>`;

                                                    html += row.id ?
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.status}</span></td>` :
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.status}</span></td>`;

                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"><a href="/owners/${row.oid}">${row.owner_name}</a></span></td>`;
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.custodians}</span></td>`;

                                                    html += "</tr>";
                                                    i++;
                                                });

                                                $(tableBody).html(html);
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

        }

        // Call the function to initialize both charts
        initializeCharts();
    </script>
@endpush
