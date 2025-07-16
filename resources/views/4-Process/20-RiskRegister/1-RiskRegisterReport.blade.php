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
    <link rel="stylesheet" href="{{ asset('/css/9-RegulatoryReports/report.css') }}">
</head>

<body>
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
                    <p class="ArbTxt">تقييم الضوابط</p>
                    <p class="EngTxt">Regulatory Reports</p>
                </div>
                <div class="RightButtonContainer">
                    <a href="/regulatory-reports">
                        <button class="RightButton">
                            <p>للخلف</p>
                            <p>Back</p>
                        </button>
                    </a>
                </div>
            </div>
        </header>
    </section>
    <div class="contentsection">
        <div>
            <p class="arabichead">سجل المخاطر</p>
            <p class="enghead" style="margin-top: 20px">Risk Register</p>
            <p class="enghead">Current Date: {{ now()->format('d-m-Y') }}</p>
        </div>
        <!-- 1-1.STRG_D Cybersecurity Strategy -->
        <div class="domainSubdomain">
            <p class="maindomain">(Category) الفئة</p>
            <p class="maindomaintext" style="font-weight: 600;">
                استراتيجية الأمن السيبراني
            </p>
        </div>
        <table class="customers">
            <tr>
                @include('4-Process/20-RiskRegister/0-risktableheads')
            </tr>
        </table>
        <!-- 1-1.STRG_D Cybersecurity Strategy -->
        <div class="domainSubdomain">
            <p class="maindomain">(Category) الفئة</p>
            <p class="maindomaintext" style="font-weight: 600;">
                إدارة الأمن السيبراني
            </p>
        </div>
        <table class="customers">
            <tr>
                @include('4-Process/20-RiskRegister/0-risktableheads')
            </tr>
        </table>
        <!-- 1-1.STRG_D Cybersecurity Strategy -->
        <div class="domainSubdomain">
            <p class="maindomain">(Category) الفئة</p>
            <p class="maindomaintext" style="font-weight: 600;">
                السياسات والإجراءات
            </p>
        </div>
        <table class="customers">
            <tr>
                @include('4-Process/20-RiskRegister/0-risktableheads')
            </tr>
        </table>
        <!-- 1-1.STRG_D Cybersecurity Strategy -->
        <div class="domainSubdomain">
            <p class="maindomain">(Category) الفئة</p>
            <p class="maindomaintext" style="font-weight: 600;">
                الادوار والمسؤوليات
            </p>
        </div>
        <table class="customers">
            <tr>
                @include('4-Process/20-RiskRegister/0-risktableheads')
            </tr>
        </table>
        <!-- 1-1.STRG_D Cybersecurity Strategy -->
        <div class="domainSubdomain">
            <p class="maindomain">(Category) الفئة</p>
            <p class="maindomaintext" style="font-weight: 600;">
                إدارة المخاطر
            </p>
        </div>
        <table class="customers">
            <tr>
                @include('4-Process/20-RiskRegister/0-risktableheads')
            </tr>
        </table>
        <!-- 1-1.STRG_D Cybersecurity Strategy -->
        <div class="domainSubdomain">
            <p class="maindomain">(Category) الفئة</p>
            <p class="maindomaintext" style="font-weight: 600;">
                إدارة التكوين
            </p>
        </div>
        <table class="customers">
            <tr>
                @include('4-Process/20-RiskRegister/0-risktableheads')
            </tr>
        </table>
    </div>






    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function addRowCount(tableAttr) {
            $(tableAttr).each(function() {
                $('thead th:last-child', this).each(function() {
                    var tag = $(this).prop('tagName');
                    $(this).before('<' + tag + '>#</' + tag + '>');
                });
                $('tbody td:last-child', this).each(function(i) {
                    $(this).before('<td>' + (i + 1) + '</td>');
                });
            });
        }

        // Call the function with table attr on which you want automatic S.No
        addRowCount('.customers');
    </script>

</body>
