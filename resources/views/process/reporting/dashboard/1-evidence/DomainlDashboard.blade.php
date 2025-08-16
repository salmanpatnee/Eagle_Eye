@extends('layouts.app-full')
@section('title', 'Overall Compliance Dashboard')
@section('title_ar', 'لوحة التحكم بالامتثال الشامل')
@section('content')

    <x-table.action-wrapper>
        <button type="button" data-filename="Evidence Summary by Domains" id="print" class="action-btn">
            <x-icons.pdf />

            <span class="inline mx-2">Download as PDF</span>
        </button>

    </x-table.action-wrapper>


    <div class="grid grid-cols-1 px-4 mb-6" id="print-area">
        <div class="card mx-auto" style="width: 65%">
            <h3 class="card-title">Evidence Summary by Domains</h3>
            <canvas id="chart"></canvas>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function initializeCharts() {

            const domains = {!! json_encode($domains) !!};
            const domainIds = {!! json_encode($domainIds) !!};
            const evidenceCount = {!! json_encode($evidenceCount) !!};

            const chartBar = new Chart("chart", {
                type: "bar",
                data: {
                    labels: domains,
                    datasets: [{
                        label: "Evidences",
                        data: evidenceCount,
                        backgroundColor: "#2196F3",
                        customData: domainIds
                    }, ]
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
                        if (elements && elements.length > 0) {
                            var datasetIndex = elements[0]._datasetIndex;
                            var dataIndex = elements[0]._index;
                            var dataset = this.data.datasets[datasetIndex];
                            var domainId = dataset.customData[dataIndex];
                            window.location.href = `/subdomain-evidence/${domainId}`
                            // window.open("/subdomain-evidence/" + domainId, '_blank');
                        }
                    }
                }
            });
        }
        initializeCharts();
    </script>
@endpush
