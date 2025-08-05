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
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <style>
        .buttonsec {
            padding-inline: 80px;
            margin-top: 120px;
        }
        @media (min-width: 1024px) and (max-width: 1179px) {
            .buttonsec {
    padding-inline: 80px;
    margin-top: 20%;
    padding: 0;
}
}
    </style>
</head>

<body class="regubg">
    <div class="headersec">
        <div class="headerleft">
            <div class="headericon">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
            </div>
            <div class="headertext">
                <p>العمليات</p>
                <p>Processes</p>
            </div>
            <div class="headericon">
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            <div class="headertext">
                <p>التقارير التنظيمية</p>
                <p>Regulatory Reports</p>
            </div>
        </div>
        <div class="d-flex align-items-center gap-3">
            @include('partials.roles')
            <div class="headerright">
                <button type="button" class="button" onclick="window.location.href=('/compliance')">
                    <p>للخلف</p>
                    <p>Back</p>
                </button>
            </div>
        </div>


    </div>
    <div class="buttonsec">
        <div class="firstrow">

            {{-- <a href="{{ route('ecc-regulatory-report.show') }}"> --}}
                <a href="{{ route('regulatory-reports.create') }}?best_practice=NCA-ECC-2018">
                <div class="regubutton">
                    <p>تقرير التقييم والامتثال NCA-ECC</p>
                    <div class="regusepline"></div>
                    <p>NCA-ECC Assessment and <br> Compliance Reports</p>
                </div>
            </a>
            <a href="{{ route('cscc-regulatory-report.show') }}">
                {{-- <a href="{{ route('regulatory-reports.create') }}?best_practice=NCA-CSCC-2019"> --}}
                <div class="regubutton">
                    <p>تقرير التقييم والامتثال NCA-CSCC</p>
                    <div class="regusepline"></div>
                    <p>NCA-CSCC Assessment and <br> Compliance Reports</p>
                </div>
            </a>
            <a href="{{ route('regulatory-reports.create') }}?best_practice=NCA-CCC-2020">
                <div class="regubutton">
                    <p>تقرير التقييم والامتثال NCA-CCC</p>
                    <div class="regusepline"></div>
                    <p>NCA-CCC Assessment and <br> Compliance Reports</p>
                </div>
            </a>
        </div>
        <div class="firstrow">
            <a href="{{ route('tcc-regulatory-report.show') }}">
                {{-- <a href="{{ route('regulatory-reports.create') }}?best_practice=NCA-TCC-2021"> --}}
                <div class="regubutton">
                    <p>تقرير التقييم والامتثال NCA-TCC</p>
                    <div class="regusepline"></div>
                    <p>NCA-TCC Assessment and <br> Compliance Reports</p>
                </div>
            </a>
            <a href="{{ route('osmacc-regulatory-report.show') }}">
                {{-- <a href="{{ route('regulatory-reports.create') }}?best_practice=NCA-OSMACC-2021"> --}}
                <div class="regubutton">
                    <p>تقرير التقييم والامتثال NCA-OSMACC</p>
                    <div class="regusepline"></div>
                    <p>NCA-OSMACC Assessment and <br> Compliance Reports</p>
                </div>
            </a>
            <a href="{{ route('dcc-regulatory-report.show') }}">
                {{-- <a href="{{ route('regulatory-reports.create') }}?best_practice=NCA-DCC-2022"> --}}
                <div class="regubutton">
                    <p>تقرير التقييم والامتثال NCA-DCC</p>
                    <div class="regusepline"></div>
                    <p>NCA-DCC Assessment and Compliance Reports</p>
                </div>
            </a>
        </div>
    </div>
</body>

</html>
