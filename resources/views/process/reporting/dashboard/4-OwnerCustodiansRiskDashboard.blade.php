@extends('layouts.app-full')
@section('title', 'Overall Compliance Dashboard')
@section('title_ar', 'لوحة التحكم بالامتثال الشامل')
@section('content')

    <x-table.action-wrapper>
        <button type="button" data-filename="{{ $ownerNames[0] }} Risk Status" id="print" class="action-btn">
            <x-icons.pdf />

            <span class="inline mx-2">Download as PDF</span>
        </button>

    </x-table.action-wrapper>


    <div id="print-area">
        <div class="grid grid-cols-1 px-4 mb-6">
            <div class="card mx-auto" style="width: 65%">
                <h3 class="card-title">{{ $ownerNames[0] }} Risk Status</h3>
                <canvas id="chart"></canvas>
                <!-- Loading Text -->
                <div class="sk-chase text-2xl"
                    style="display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; color: #1f2937; font-weight: bold;">
                    Loading...
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 px-4 mb-6">
            <div class="card" id="content">
                <h3 class="card-title" id="title">Risk Status Overview</h3>
                <x-table.table>
                    <x-table.thead>
                        <x-table.th label="S.No" label_ar="رقم" />
                        <x-table.th label="Risk ID" label_ar="رمز مخاطر" />
                        <x-table.th label="Status" label_ar="حالة" />
                        <x-table.th label="Owner Name" label_ar="اسم مالك" />
                        <x-table.th label="Custodians" label_ar="اسم الوصي" />
                        <x-table.th label="Control Details" label_ar="تفاصيل التحكم" />
                    </x-table.thead>
                    <x-table.tbody id="table_body">
                        @foreach ($risks as $risk)
                            <tr>
                                <x-table.td> {{ $loop->index + 1 }}
                                </x-table.td>
                                <x-table.td> <a href="{{ route('risks.show', $risk->id) }}">{{ $risk->risk_id }}</a>
                                </x-table.td>
                                <x-table.td>
                                    @if ($risk->risk_assessment_id)
                                        <a href="{{ route('risk-assessments.show', $risk->risk_assessment_id) }}">
                                    @endif
                                    {{ $risk->implementation_status }}
                                    @if ($risk->risk_assessment_id)
                                        </a>
                                    @endif
                                </x-table.td>
                                <x-table.td>
                                    <a href="{{ route('owners.show', $risk->oid) }}">{{ $risk->owner_name }}</a>
                                </x-table.td>
                                <x-table.td>{!! $risk->custodians !!}</x-table.td>
                                <x-table.td>
                                    <a href="{{ route('risk-controls.show', $risk->risk_id) }}">View
                                        Controls</a>
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
        function initializeCharts() {

            const ownerId = {!! json_encode($ownerId) !!};
            const owners = {!! json_encode($ownerNames) !!};
            const totalRisks = {!! json_encode($totalRisks) !!};
            const totalRisksOpen = {!! json_encode($totalRisksOpen) !!};
            const totalRisksClose = {!! json_encode($totalRisksClose) !!};
            const colors = {
                BLUE: "#2196F3",
                GREEN: "#228B22",
                RED: '#FF0000',
            };

            const chartBar = new Chart("chart", {
                type: "bar",
                data: {
                    labels: owners,
                    datasets: [{
                            label: 'Total Risks',
                            data: totalRisks,
                            backgroundColor: colors.BLUE,
                            customData: {!! json_encode($ownerId) !!}
                        },
                        {
                            label: 'Open',
                            backgroundColor: colors.RED,
                            data: totalRisksOpen,
                            customData: {!! json_encode($ownerId) !!}

                        },
                        {
                            label: 'Close',
                            backgroundColor: colors.GREEN,
                            data: totalRisksClose,
                            customData: {!! json_encode($ownerId) !!}
                        }
                    ]
                },
                options: {

                    legend: {
                        display: true,
                        labels: {
                            fontColor: '#000', // Change legend label color here, 
                            fontSize: 16
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontColor: '#000', // Change y-axis labels color here
                                // beginAtZero: true, 
                                fontSize: 16
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontColor: '#000', // Change x-axis labels color here, 
                                fontSize: 16
                            }
                        }]
                    },
                    title: {
                        display: false,
                    },
                    // onClick: function(event, elements) {
                    //     if (elements && elements.length > 0) {
                    //         var datasetIndex = elements[0]._datasetIndex;
                    //         var dataIndex = elements[0]._index;
                    //         var dataset = this.data.datasets[datasetIndex];
                    //         var ownerId = dataset.customData[dataIndex];

                    //         window.open("/risk-owner-compliance/" + ownerId, '_blank');
                    //     }
                    // }
                }
            });
        }
        initializeCharts();
    </script>
@endpush
