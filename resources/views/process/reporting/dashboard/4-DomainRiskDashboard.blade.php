@extends('layouts.app-full')
@section('title', 'Overall Compliance Dashboard')
@section('title_ar', 'لوحة التحكم بالامتثال الشامل')
@section('content')


    <div class="grid grid-cols-1 px-4 mb-6">
        <div class="card mx-auto" style="width: 75%">
            <h3 class="card-title">Domains Risk Status</h3>
            <canvas id="chart"></canvas>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function initializeCharts() {

            const domainIds = {!! json_encode($domainIds) !!};
            const domains = {!! json_encode($domainNames) !!};
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
                    labels: domains,
                    datasets: [{
                            label: 'Total Risks',
                            data: totalRisks,
                            backgroundColor: colors.BLUE,
                            customData: {!! json_encode($domainIds) !!}
                        },
                        {
                            label: 'Open',
                            backgroundColor: colors.RED,
                            data: totalRisksOpen,
                            customData: {!! json_encode($domainIds) !!}

                        },
                        {
                            label: 'Close',
                            backgroundColor: colors.GREEN,
                            data: totalRisksClose,
                            customData: {!! json_encode($domainIds) !!}
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
                    onClick: function(event, elements) {
                        if (elements && elements.length > 0) {
                            var datasetIndex = elements[0]._datasetIndex;
                            var dataIndex = elements[0]._index;
                            var dataset = this.data.datasets[datasetIndex];
                            // Access custom data associated with the clicked data point
                            var domainId = dataset.customData[dataIndex];
                            window.location.href = "/risk-subdomain-compliance/" + domainId;
                        }
                    }
                }
            });
        }
        initializeCharts();
    </script>
@endpush
