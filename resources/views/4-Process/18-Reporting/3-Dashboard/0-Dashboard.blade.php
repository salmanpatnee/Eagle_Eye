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
            <p class="bold-arbtext">العمليات</p>
            <p class="bold-text">Processes</p>
            <i class='bx bx-right-arrow-alt'></i>
            <div class="HeadingTxt">
                <p class="ArbTxt">لوحة القيادة</p>
                <p class="EngTxt">Dashboard</p>
            </div>
            <div class="RightButtonContainer">
                <button type="button" class="RightButton" onclick="goBack()">
                    <p>للخلف</p>
                    <p>Back</p>
                </button>
            </div>
        </div>
    </header>
    {{-- <header>
        <div class="Header">
            <a href="/compliance">
                <i class='bx bx-home'></i>
            </a>
            <h2 style="margin-left: 10px">Process</h2>
            <i class='bx bx-right-arrow-alt'></i>
            <h2 style="margin-left: 20px">Inventory Dashboard</h2>
            <div class="RightButtonContainer">
                <a href="/dashboard">
                    <button class="RightButton">Back</button>
                </a>
            </div>
        </div>
    </header> --}}
    <!-- SIDEBAR -->
    <!-- CONTENT -->
    <div class="IndiTable">
        <div class="UpperBoxContainer">
            <a href="/assets">
                <div class="UpperBox">
                    <i class='bx bxs-box'></i>
                    <h3>{{ $assetCount }}</h3>
                    <p>Total Number of Assets</p>
                </div>
            </a>
            <div class="UpperBox">
                <a href="/risk-assessment-finding-list">
                    <i class='bx bxs-box'></i>
                    <h3>{{ $riskCount }}</h3>
                    <p>Total Number of Open Risks</p>
                </a>
            </div>
            <div class="UpperBox">
                <a href="/control-assessment-finding-list">
                    <i class='bx bxs-box'></i>
                    <h3>{{ $closeRiskCount }}</h3>
                    <p>Total Number of Not Implemented Controls</p>
                </a>
            </div>
            <div class="UpperBox">
                <a href="/control-assessment-finding-list">
                    <i class='bx bxs-box'></i>
                    <h3>{{ $pendingRiskCount }}</h3>
                    <p>Total Number of Pending Controls</p>
                </a>
            </div>
        </div>
        <div class="RightSideBar">
            <img src="Images/5-ZainLogo.png" alt="Description of the image" class="OrgLogo">
            <p class="Heading">Address:</p>
            <p>Zain in Saudi Arabia, Granada Business Park - Building A3, PO Box 295814, Riyadh 11351, Kingdom of Saudi
                Arabia</p>
            <p class="Heading">Locations:</p>
            <p>Total 6 Locations are added</p>
            <p class="Heading">Departments:</p>
            <p>Total 3 Department are added</p>
            <p class="Heading">Best Practices:</p>
            <p>Total 7 Best Practice are added</p>
            <p class="Heading">Control:</p>
            <p>Total 1000 Controls are Available</p>
        </div>

        <div class="UpperBoxContainer">
            <div class="FirstGraphBox">
                <h3>Asset Distribution by Groups</h3>
                <canvas id="barchart" class="barchart"></canvas>
            </div>
            <div class="FirstGraphBox">
                <h3>Risk Distribution by Groupss</h3>
                <canvas id="piechart" class="piechart"></canvas>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Assest Distribution by Groups


        var url = "{{ route('dashboardCount') }}";
        var token = "{{ csrf_token() }}";
        var barColors = ["red", "green", "blue", "orange", "brown"];

        $(document).ready(function() {
            $.post(url, {
                    _token: token
                },
                function(data, textStatus, jqXHR) {
                    barChart(data.asset_group_name, data.asset_count, barColors)
                },
                "json"
            );
        });




        function barChart(xValues, yValues, barColors) {
            new Chart("barchart", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                    }
                }
            });
        }


        var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        var yValues = [55, 49, 44, 24, 15];



        // Risk Distribution by Groups

        new Chart("piechart", {
            type: "pie",
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
                },
            }
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
