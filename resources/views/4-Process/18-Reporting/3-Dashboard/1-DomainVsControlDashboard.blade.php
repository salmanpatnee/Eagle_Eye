@extends('4-Process.18-Reporting.3-Dashboard.template.layout')

@section('content')
    <div id="domain_controller_chart" style="width:100%; height:400px;"></div>
@endsection


@section('footerjs')

    <script>
        $(document).ready(function () {
            const chart = Highcharts.chart('domain_controller_chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Number of Controls Each Domain Has'
                },
                xAxis: {
                    categories: {!! $domainNames !!},
                    crosshair: true,
                    accessibility: {
                        description: 'Domains'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'No. of Controls'
                    }
                },
                tooltip: {
                    valueSuffix: ''
                },
                series: [{
                    showInLegend: false,
                    name: 'Controlls',
                    data: {!! $numberOfControls !!}
                }]
            });
        });
    </script>

@endsection
