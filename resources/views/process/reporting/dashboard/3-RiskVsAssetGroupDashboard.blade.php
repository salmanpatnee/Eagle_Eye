@extends('4-Process.18-Reporting.3-Dashboard.template.layout')

@section('content')
    <div id="asset_group_risks_chart" style="width:100%; height:400px;"></div>
@endsection


@section('footerjs')

    <script>
        $(document).ready(function () {
            const chart = Highcharts.chart('asset_group_risks_chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'No. of Risks Each Asset Group Has'
                },
                xAxis: {
                    categories: {!! $assetGroupNames !!},
                    crosshair: true,
                    accessibility: {
                        description: 'Asset Groups'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'No. of Risks'
                    }
                },
                tooltip: {
                    valueSuffix: ''
                },
                series: [{
                    showInLegend: false,
                    name: 'Risks',
                    data: {!! $numberOfRisks !!}
                }]
            });
        });
    </script>

@endsection
