@extends('layouts.app-full')
@section('title', 'Overall Compliance Dashboard')
@section('title_ar', 'لوحة التحكم بالامتثال الشامل')
@section('content')


    <div class="grid grid-cols-1 px-4 mb-6">
        <div class="card mx-auto" style="width: 65%">
            <h3 class="card-title">Risk's Controls Status</h3>
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

        const chartBar = new Chart("chart", {
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

                                $('#content').css('visibility', 'hidden');
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
                                            if (dataPoint.statusCode === null) {
                                                $("#title").text("Control Status Report");
                                            } else if (dataPoint.statusCode === 1) {
                                                $("#title").text(
                                                    "Implemented Controls Report");
                                            } else if (dataPoint.statusCode === 2) {
                                                $("#title").text(
                                                    "Not Implemented Controls Report");
                                            } else if (dataPoint.statusCode === 3) {
                                                $("#title").text(
                                                    "Partially Implemented Controls Report");
                                            } else if (dataPoint.statusCode === 4) {
                                                $("#title").text(
                                                    "Not Applicable Controls Report");
                                            }
                                            let i = 1
                                            response.forEach(row => {

                                                html += "<tr>";
                                                html +=
                                                    `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${i}</span></td>`;
                                                html +=
                                                    `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"><a href="/control-assessments/${row.control_assessment_id}" >${row.control_id}</a></span></td>`;
                                                html +=
                                                    `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"> <a href="/control-assessments/${row.control_assessment_id}" >${row.control_implementation_status}</a></span></td>`;
                                                html +=
                                                    `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"><a href="/owners/${row.owner_id}" >${row.owner_name}</a></span></td>`;
                                                html +=
                                                    `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.custodians != null ? row.custodians : ''}</span></td>`;
                                                if (row.evidence !== null) {

                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.evidence}</span></td>`;
                                                } else {
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">-</span></td>`;
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
    </script>
@endpush
