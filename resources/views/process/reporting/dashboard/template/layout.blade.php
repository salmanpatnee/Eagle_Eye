<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="{{ asset('/css/4-Process/4-Reporting/2-dashboard.css') }}">
</head>

<body>
    <!-- SIDEBAR -->
    <header>
        <div class="Header">
            <a href="/home">
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
                <a href="/process">
                    <button class="RightButton">
                        <p>ارجع</p>
                        <p>Back</p>
                    </button>
                </a>
            </div>
        </div>
    </header>
    <div class="subheader">
        <div class="subheaderactive">
            <a href="{{ route("domain-vs-control-dashboard") }}">
                <p>Domains vs Controls</p>
            </a>
        </div>

        <div class="subheaderactive">
            <a href="{{ route("control-vs-risk-dashboard") }}">
                <p>Control vs Risk</p>
            </a>
        </div>

        <div class="subheaderactive">
            <a href="{{ route("risk-vs-asset-dashboard") }}">
                <p>Risk vs Asset Group</p>
            </a>
        </div>
    </div>

    <div id="content" style="margin-top: 80px;">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    @yield('footerjs')
</body>
