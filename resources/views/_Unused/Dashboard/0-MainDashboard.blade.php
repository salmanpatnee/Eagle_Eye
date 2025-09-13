<!DOCTYPE html5>
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
</head>

<body>


    <!-- SIDEBAR -->
    <section>
        <header>
            <div class="Header">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i style="padding-right: 30px" class='bx bx-right-arrow-alt'></i>
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
    </section>
    <div class="RegulatoryBgImage">
        <img src="Images/8-RegulatoryReportingBG.jpg">
        <div class="overlay"></div>
        <div class="RegulatorySection">
            <div class="RegulatoryBoxSec" style="margin-right: 200px; margin-left: 200px">
                <a href="/overall-compliance-dashboard">
                    <div class="RegulatoryBox">
                        <div class="ReportsText">
                            <p class="ReportsTextArb">لوحة التحكم بالامتثال الشامل</p>
                            <p class="ReportsTextEng">Overall Complaiance Dashboard</p>
                        </div>
                    </div>
                </a>
                <a href="/risk-complaince-dashboard">
                    <div class="RegulatoryBox">
                        <div class="ReportsText">
                            <p class="ReportsTextArb">لوحة معلومات الامتثال للمخاطر</p>
                            <p class="ReportsTextEng">Risk Compliance Dashboard</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>


</body>

</html>
