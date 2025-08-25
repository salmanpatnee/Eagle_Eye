@extends('layouts.app-full')
@section('title', 'Overall Compliance Dashboard')
@section('title_ar', 'لوحة التحكم بالامتثال الشامل')
@section('content')

    <x-table.action-wrapper title="">
        <button type="button" data-filename="Domain Compliance Status" id="print" class="action-btn">
            <x-icons.pdf />
            <span class="inline mx-2">Download as PDF</span>
        </button>

    </x-table.action-wrapper>

    <div class="grid grid-cols-1 px-4 mb-6" id="print-area">
        <div class="card mx-auto" style="width: 65%">
            <h3 class="card-title">Domain Compliance Status</h3>
            <canvas id="chart"></canvas>
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        function initializeCharts() {

            const domains = {!! json_encode($domain_names) !!};

            const totalControls = {!! json_encode($countrols_count) !!};
            const implementedCount = {!! json_encode($implemented_count) !!};
            const partiallyImplementedCount = {!! json_encode($partially_implemented_count) !!};
            const notImplementedCount = {!! json_encode($not_implemented_count) !!};
            const notApplicableCount = {!! json_encode($not_applicable_count) !!};

            const barColorsBar = ["#4A90E2", "#4A90E2", "#4A90E2", "#4A90E2", "#4A90E2", "#000"];
            const barColorsBar2 = Array(4).fill('#228B22');
            const barColorsBar3 = Array(10).fill('#FF0000');
            const barColorsBar4 = Array(10).fill('#FFC107');
            const barColorsBar5 = Array(10).fill('#9E9E9E');


            const chartBar = new Chart("chart", {
                type: "bar",
                responsive: true,
                maintainAspectRatio: false,
                data: {
                    labels: domains,
                    datasets: [{
                            label: 'Total Controls',
                            data: totalControls,
                            backgroundColor: barColorsBar,
                            customData: {!! json_encode($domain_ids) !!}
                        },
                        {
                            label: 'Implemented',
                            backgroundColor: barColorsBar2,
                            data: implementedCount,
                            customData: {!! json_encode($domain_ids) !!}
                        },

                        {
                            label: 'Partially Implemented',
                            backgroundColor: barColorsBar4,
                            data: partiallyImplementedCount,
                            customData: {!! json_encode($domain_ids) !!}
                        },
                        {
                            label: 'Not Implemented',
                            backgroundColor: barColorsBar3,
                            data: notImplementedCount,
                            customData: {!! json_encode($domain_ids) !!}
                        },
                        {
                            label: 'Not Applicable',
                            backgroundColor: barColorsBar5,
                            data: notApplicableCount,
                            customData: {!! json_encode($domain_ids) !!}
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
                        if (elements && elements.length > 0) {
                            var datasetIndex = elements[0]._datasetIndex;
                            var dataIndex = elements[0]._index;
                            var dataset = this.data.datasets[datasetIndex];
                            // Access custom data associated with the clicked data point
                            var domainName = dataset.customData[dataIndex];
                            window.location.href = `/subdomain-compliance/${domainName}`
                            // window.open("/subdomain-compliance/" + domainName, '_blank');
                        }
                    }
                }
            });
        }
        initializeCharts();
    </script>
@endpush
