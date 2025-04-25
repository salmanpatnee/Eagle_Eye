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
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-MainPageHeader.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/1-Process.css') }}">
    <style>
        .GrcDomainBoxes {
            justify-content: space-between;
            column-gap: 4%;
            flex-wrap: wrap;
            max-width: 90%;
            margin: auto;
        }
    </style>

<body>
    <header>
        <div class="header-content" id="header">
            <div>
                <a href="/compliance">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">المراجع مؤشرات الأداء الرئيسية</p>
                <p class="bold-text">KPI References</p>
            </div>
            <div class="d-flex align-items-center gap-3">
                @include('partials.roles')
                <div>
                    <a href="" onclick="document.querySelector('#logout-form').submit(); return false;">
                        <button class="RightButton">
                            <p class="RightButtonArbTxt">تسجيل الخروج</p>
                            <p class="RightButtonTxt">Logout</p>
                        </button>
                    </a>
                    <form id="logout-form" method="POST" action="{{ route('login.destroy') }}" style="display: none;">
                        @csrf
                        <button type="submit"> Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <div style="margin-top: 50px"></div>
    <div class="GrcDomainBoxes">
        @php
            $i = 1;
        @endphp
        @foreach ($references as $reference)
            <a href="{{ route('kpi-standards-report.show', $reference->category_id) }}">
                <div class="{{ $i % 2 == 0 ? 'GrcdomainboxTwo' : 'domainboxOne' }} ">
                    <i class='bx bx-box'></i>
                    <p style="margin-top:37px" class="domainboxTwoArbTxt">
                        {{ $reference->category_name_ar }}
                    </p>
                    <div style="margin-top: -10px;" class="domainboxline"></div>
                    <p class="domainboxTwoTxt">
                        {{ $reference->category_name }}
                    </p>
                </div>
            </a>
            @php
                $i++;
            @endphp
        @endforeach
        {{-- <a href="#">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 38px;" class="domainboxTwoArbTxt">
                    برامج مكافحة الفدية
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Anti-Ransomware Software
                </p>
            </div>
        </a>
        <a href="#">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 26px;" class="domainboxTwoArbTxt">
                    القائمة البيضاء للتطبيق
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Application Whitelisting (Application Security)
                </p>
            </div>
        </a>
        <a href="#">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 25px;" class="domainboxTwoArbTxt">
                    النسخ الاحتياطي و تعافي
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Backup Recovery
                </p>
            </div>
        </a> --}}
    </div>

</body>

</html>
