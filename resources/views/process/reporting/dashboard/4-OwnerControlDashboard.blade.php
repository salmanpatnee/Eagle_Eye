@extends('layouts.app-full')
@section('title', 'Overall Compliance Dashboard')
@section('title_ar', 'لوحة التحكم بالامتثال الشامل')
@section('content')

    <x-table.action-wrapper>
        <button type="button" data-filename="Human Resource Owner" id="print" class="action-btn">
            <x-icons.pdf />

            <span class="inline mx-2">Download as PDF</span>
        </button>

    </x-table.action-wrapper>


    <div id="print-area">
        <div class="grid grid-cols-1 px-4 mb-6">
            <div class="card mx-auto" style="width: 65%">
                <h3 class="card-title">{{ $owner[0]->owner_name }}</h3>
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
                        @foreach ($controls as $control)
                            <tr>
                                <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                                <x-table.td>
                                    {{-- @if ($control->control_assessment_id != '#') --}}
                                    <a href="{{ route('controls.show', $control->cid) }}">{{ $control->control_id }}
                                    </a>
                                    {{-- @else
                                        {{ $control->control_id }}
                                    @endif --}}
                                </x-table.td>
                                <x-table.td>

                                    {{ $control->status }}
                                </x-table.td>
                                <x-table.td>
                                    <a href="{{ route('owners.show', $owner[0]->id) }}">{{ $owner[0]->owner_name }}
                                    </a>
                                </x-table.td>
                                <x-table.td>
                                    <a href="">{!! $control->custodians !!}</a>
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
        const ownerId = {!! json_encode($ownerId) !!};
        const owner = [{!! json_encode($owner[0]->owner_name) !!}];
        const ownerNameId = [{!! json_encode($owner[0]->id) !!}];
        const totalControls = [{!! json_encode($controlsCount[0]->total_controls) !!}];
        const implementedCount = [{!! json_encode($controlsCount[0]->implemented) !!}];
        const partiallyImplementedCount = [{!! json_encode($controlsCount[0]->partially_implemented) !!}];
        const notImplementedCount = [{!! json_encode($controlsCount[0]->not_implemented) !!}];
        const notApplicableCount = [{!! json_encode($controlsCount[0]->not_applicable) !!}];

        console.log(implementedCount);

        const chartBar = new Chart("chart", {
            type: "bar",
            data: {
                labels: owner,
                datasets: [{
                        label: 'Total Controls',
                        backgroundColor: "#2196F3",
                        data: totalControls.map((value, index) => ({
                            y: value,
                            statusCode: null
                        }))
                    },
                    {
                        label: 'Implemented',
                        backgroundColor: "#228B22",
                        data: implementedCount.map((value, index) => ({
                            y: value,
                            statusCode: 1
                        }))
                    },
                    {
                        label: 'Partially Implemented',
                        backgroundColor: "#FFC107",
                        data: partiallyImplementedCount.map((value, index) => ({
                            y: value,
                            statusCode: 3
                        }))
                    },
                    {
                        label: 'Not Implemented',
                        backgroundColor: "#FF0000",
                        data: notImplementedCount.map((value, index) => ({
                            y: value,
                            statusCode: 2
                        }))
                    },
                    {
                        label: 'Not Applicable',
                        backgroundColor: "#9E9E9E",
                        data: notApplicableCount.map((value, index) => ({
                            y: value,
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
                                    url: `/owner-controls/${ownerId}?status=${dataPoint.statusCode}`,
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(response) {
                                        console.log('Response:', response);
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

                                                if (row.cid) {
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"><a href="/controls/${row.cid}" >${row.control_id}</a></span></td>`;
                                                } else {
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.control_id}</span></td>`;
                                                }

                                                if (row.control_assessment_id != "#") {
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"> ${row.status}</span></td>`;
                                                } else {
                                                    html +=
                                                        `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm">${row.status}</span></td>`;
                                                }
                                                html +=
                                                    `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"> <a href="/owners/${ownerNameId}" >${owner}</a></span></td>`;
                                                html +=
                                                    `<td class="px-3 py-3 whitespace-nowrap" style="vertical-align: top;"><span class="block font-medium text-gray-700 text-theme-sm"><a href="/custodian-table/${row.custodian_name_id}" >${row.custodians}</a></span></td>`;
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
