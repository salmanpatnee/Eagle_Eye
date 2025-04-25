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
    <link rel="stylesheet" href="{{ asset('/css/7-Sidebar/1-Sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/2-Table/IndividualTable.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/9-RegulatoryReports/report.css') }}">

</head>

<body>
    <header>
        <div class="Header">
            <a href="{{route('home')}}">
                <i class='bx bx-home'></i>
            </a>
            <p class="bold-arbtext">العمليات</p>
            <p class="bold-text">Processes</p>
            <i style="padding-right: 30px" class='bx bx-right-arrow-alt'></i>
            <div class="HeadingTxt">
                <p class="ArbTxt">تقييم الضوابط</p>
                <p class="EngTxt">Regulatory Reports</p>
            </div>
            <div class="ReportButtonContainer">
                @yield('action-buttons')
            </div>
            <div class="RightButtonContainer">
                <a href="{{route('nca-regulatory-reports.index')}}">
                    <button class="RightButton">
                        <p>للخلف</p>
                        <p>Back</p>
                    </button>
                </a>
            </div>
        </div>
    </header>
    <main>
        <div class="contentsection">
            <div>
                <p class="arabichead">تقييم الضوابط</p>
                @yield('header')
                <p class="enghead">Current Date: {{ now()->format('d-m-Y') }}</p>
            </div>
            @yield('content')
        </div>
    </main>
</body>

</html>