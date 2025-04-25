<!DOCTYPE html>
<html lang="en">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tag  -->
    <title>Compliance 360</title>
    <meta name="title" content="Saturn-V GRC Tool">
    <meta name="description" content="Zain Cloud GRC Tool">
    <!-- Boxicons Icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/7-Sidebar/1-Sidebar.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/css/4-Process/4-Reporting/2-dashboard.css') }}">
</head>

<body>


    <!-- SIDEBAR -->
    <header>
        <div class="Header">
            <a href="/compliance">
                <i class='bx bx-home'></i>
            </a>
            <h2 style="margin-left: 10px">Process</h2>
            <i class='bx bx-right-arrow-alt'></i>
            <h2 style="margin-left: 20px">Assessment Dashboard</h2>
            <div class="RightButtonContainer">
                <button type="button" class="RightButton" onclick="goBack()">
                    <p>للخلف</p>
                    <p>Back</p>
                </button>
            </div>
        </div>
    </header>
    <!-- SIDEBAR -->
    <!-- CONTENT -->
    <div class="DBOneIndiTable">
        <div class="UpperBoxContainer">
            <div class="SecondGraphBox">
                <h3>Risk Status</h3>
                <canvas id="RiskStatus" class="RiskGraphs"></canvas>
            </div>
            <div class="SecondGraphBox">
                <h3>Control Status</h3>
                <canvas id="ControlStatus" class="RiskGraphs"></canvas>
            </div>
        </div>

        <div class="AppetiteBox">
            <h3>Risk Inherent Score</h3>
            <div class="row">
                <div class="GaugeBox">
                    <h4>Average Risk Score</h4>
                    <p class="RiskScore">12</p>
                </div>
                <div style="border-right: solid 1px gray"></div>
                <div class="GaugeBox">
                    <h4>Risk Appetite</h4>
                    <div id="myChart" class="RiskScoreBarChar"></div>
                </div>
            </div>
        </div>
    </div>



    <script>
        // Risk Status Graph
        var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        var yValues = [55, 49, 44, 24, 15];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        new Chart("RiskStatus", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                }
            }
        });

        // Risk Status Graph
        var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        var yValues = [55, 49, 44, 24, 15];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        new Chart("ControlStatus", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                }
            }
        });


        // Bullet Chart
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            const data = google.visualization.arrayToDataTable([
                ['Contry', 'Mhl'],
                ['1 to 3', 55],
                ['4', 49],
                ['5 to 9', 44],
                ['10 to 15', 24],
                ['16 to 25', 15]
            ]);

            const options = {};

            const chart = new google.visualization.BarChart(document.getElementById('myChart'));
            chart.draw(data, options);
        }


        // Gauge Graph
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
