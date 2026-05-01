@extends('layouts.app-full')
@section('title', 'Overall Compliance Dashboard')
@section('title_ar', 'لوحة التحكم بالامتثال الشامل')
@section('content')


    <x-table.action-wrapper>
        <button type="button" data-filename="Subdomains Risk Status" id="print" class="action-btn">
            <x-icons.pdf />

            <span class="inline mx-2">Download as PDF</span>
        </button>

    </x-table.action-wrapper>

    <div class="grid grid-cols-1 px-4 mb-6" id="print-area">
        <div class="card mx-auto" style="width: 75%">
            <h3 class="card-title">Subdomains Risk Status</h3>
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
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                color: '#000',
                                font: { size: 16 }
                            }
                        },
                        title: {
                            display: false,
                        }
                    },
                    scales: {
                        y: {
                            ticks: {
                                color: '#000',
                                font: { size: 16 }
                            }
                        },
                        x: {
                            ticks: {
                                color: '#000',
                                font: { size: 16 }
                            }
                        }
                    },
                    onClick: function(event, elements, chart) {
                        if (elements && elements.length > 0) {
                            var datasetIndex = elements[0].datasetIndex;
                            var dataIndex = elements[0].index;
                            var dataset = chart.data.datasets[datasetIndex];
                            var subdomainId = dataset.customData[dataIndex];
                            window.location.href = "/risk-owners-compliance/" + subdomainId;
                        }
                    }
                }
            });
        }
        initializeCharts();
    </script>
@endpush
