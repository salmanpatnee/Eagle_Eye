@extends('layouts.app-full')
@section('title', 'Overall Compliance Dashboard')
@section('title_ar', 'لوحة التحكم بالامتثال الشامل')
@section('content')


    <div class="grid grid-cols-1 px-4 mb-6">
        <div class="card mx-auto" style="width: 60%">
            <h3 class="card-title">Asset Types Overview</h3>
            <div style="height: 400px; position: relative;">

                <canvas id="chart"></canvas>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function initializeCharts() {

            const assetTypeIds = {!! json_encode($assetTypeIds) !!};
            const types = {!! json_encode($assetTypeLabels) !!};
            const assetsCount = {!! json_encode($assetsCount) !!};



            const chartBar = new Chart("chart", {
                type: "bar",
                data: {
                    labels: types,
                    datasets: [{
                            data: assetsCount,
                            backgroundColor: "#2196F3",
                            customData: assetTypeIds
                        },

                    ]
                },
                options: {
                    scales: {

                        xAxes: [{
                            ticks: {
                                fontSize: 16,
                                fontColor: '#000'
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    onClick: function(event, elements) {
                        if (elements && elements.length > 0) {
                            var datasetIndex = elements[0]._datasetIndex;
                            var dataIndex = elements[0]._index;
                            var dataset = this.data.datasets[datasetIndex];
                            // Access custom data associated with the clicked data point
                            var assetType = dataset.customData[dataIndex];
                            console.log(assetType);

                            // window.open("/subdomain-compliance/" + assetType, '_blank');
                        }
                    }
                }

            });
        }
        initializeCharts();
    </script>
@endpush
