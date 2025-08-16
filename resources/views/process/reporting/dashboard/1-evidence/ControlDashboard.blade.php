@extends('layouts.app-full')
@section('title', 'Overall Compliance Dashboard')
@section('title_ar', 'لوحة التحكم بالامتثال الشامل')
@section('content')

    <x-table.action-wrapper>
        <button type="button" data-filename="Evidence Summary by Controls" id="print" class="action-btn">
            <x-icons.pdf />

            <span class="inline mx-2">Download as PDF</span>
        </button>

    </x-table.action-wrapper>


    <div id="print-area">
        <div class="grid grid-cols-1 px-4 mb-6">
            <div class="card mx-auto" style="width: 65%">
                <h3 class="card-title">Evidence Summary by Controls</h3>
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
                <h3 class="card-title" id="title">Control Implementation Status</h3>
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
                        @foreach ($controls as $control)
                            <tr>
                                <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                                <x-table.td>
                                    <a href="{{ route('controls.show', $control->id) }}">
                                        {{ $control->control_id }}
                                    </a>
                                </x-table.td>
                                <x-table.td>
                                    {{-- <a href="{{ route('control-assessments.show', $control->control_assessment_id) }}"
                                        > --}}
                                    {{ $control->status }}
                                    {{-- </a> --}}
                                </x-table.td>
                                <x-table.td>
                                    <a href="{{ route('owners.show', $control->oid) }}">
                                        {{ $control->owner_name }}
                                    </a>
                                </x-table.td>
                                <x-table.td>
                                    {!! $control->custodians !!}
                                </x-table.td>
                                <x-table.td>
                                    {!! $control->evidences !!}
                                </x-table.td>
                            </tr>
                        @endforeach
                    </x-table.tbody>
                </x-table.table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const controlCounts = {!! json_encode($controlsCount) !!}
        const subdomainId = {!! json_encode($subdomainId) !!}


        const totalControls = controlCounts.total_controls;
        const implementedControls = controlCounts.implemented;
        const notImplementedControls = controlCounts.not_implemented;
        const partiallyImplementedControls = controlCounts.partially_implemented;
        const notApplicableControls = controlCounts.not_applicable;

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
                labels: [""],
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
                                    url: `/controls-evidence/${subdomainId}?status=${dataPoint.statusCode}`,
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(response) {

                                        if (response.length) {

                                            if (dataPoint.statusCode === null) {
                                                $("h2#subdomain").text("Control Status Report");
                                            } else if (dataPoint.statusCode === 1) {
                                                $("h2#subdomain").text(
                                                    "Implemented Controls Report");
                                            } else if (dataPoint.statusCode === 2) {
                                                $("h2#subdomain").text(
                                                    "Not Implemented Controls Report");
                                            } else if (dataPoint.statusCode === 3) {
                                                $("h2#subdomain").text(
                                                    "Partially Implemented Controls Report");
                                            } else if (dataPoint.statusCode === 4) {
                                                $("h2#subdomain").text(
                                                    "Not Applicable Controls Report");
                                            }
                                            let i = 1;
                                            response.forEach(row => {

                                                html += "<tr>";
                                                html +=
                                                    `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${i}</span></td>`;
                                                html +=
                                                    `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"><a href="/controls/${row.id}" >${row.control_id}</a></span></td>`;
                                                html +=
                                                    `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"> ${row.status}</span></td>`;
                                                html +=
                                                    `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"><a href="/owners/${row.oid}" >${row.owner_name}</a></span></td>`;
                                                html +=
                                                    `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.custodians != null ? row.custodians : ''}</span></td>`;
                                                if (row.evidences !== null) {
                                                    html +=

                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.evidences}</span></td>`;
                                                } else {
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">-</span></td>`;

                                                }
                                                html += "</tr>";
                                                i++;
                                            });

                                            $(tableBody).html(html)

                                            $('.sk-chase').hide();
                                            $('#riskAppetiteContentRow').css('visibility',
                                                'visible');
                                        } else {
                                            alert("No record.");
                                            $('.sk-chase').hide();
                                            return;
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
