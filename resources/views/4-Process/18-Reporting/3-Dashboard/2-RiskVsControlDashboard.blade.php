@extends('4-Process.18-Reporting.3-Dashboard.template.layout')

@section('content')
    <div id="control_risks_chart" style="width:100%; height:400px;"></div>
@endsection


@section('footerjs')

    <script>
        $(document).ready(function () {
            const chart = Highcharts.chart('control_risks_chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'No. of Risks Each Control Has'
                },
                xAxis: {
                    categories: {!! $controlNames !!},
                    crosshair: true,
                    accessibility: {
                        description: 'Controls'
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
