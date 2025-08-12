@extends('layouts.app-full')
@section('title', 'Overall Compliance Dashboard')
@section('title_ar', 'لوحة التحكم بالامتثال الشامل')
@section('content')


    <div class="grid grid-cols-1 px-4 mb-6">
        <div class="card mx-auto" style="width: 70%">
            <h3 class="card-title">Evidence Summary by Subdomains</h3>
            <canvas id="chart"></canvas>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function initializeCharts() {

            const subdomains = {!! json_encode($subdomains) !!};
            const subdomainIds = {!! json_encode($subdomainIds) !!};
            const evidenceCount = {!! json_encode($evidenceCount) !!};

            const chartBar = new Chart("chart", {
                type: "bar",
                data: {
                    labels: subdomains,
                    datasets: [{
                        label: "Evidences",
                        data: evidenceCount,
                        backgroundColor: "#2196F3",
                        customData: subdomainIds
                    }, ]
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
                                lineHeight: 1.8,
                                padding: 0
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true, // Ensure the chart starts at 0
                                fontColor: '#000',
                            }
                        }]
                    },
                    title: {
                        display: false,
                        text: "NCA-ECC"
                    },
                    onClick: function(event, elements) {
                        if (elements && elements.length > 0) {
                            var datasetIndex = elements[0]._datasetIndex;
                            var dataIndex = elements[0]._index;
                            var dataset = this.data.datasets[datasetIndex];
                            var subdomainId = dataset.customData[dataIndex];

                            window.location.href = "/controls-evidence/" + subdomainId;
                        }
                    }
                }
            });
        }
        initializeCharts();
    </script>
@endpush
