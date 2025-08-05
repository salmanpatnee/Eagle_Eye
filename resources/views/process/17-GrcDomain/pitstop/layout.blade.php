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
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <style>
        .bodysec {
            margin-bottom: 3em;
            padding: 3em 0;
        }

        .parasec {

            min-height: 250px;
        }
    </style>
</head>

<body class="CsInducbody">
    <div class="headersec">
        <div class="headerleft">
            <div class="headericon">
                <a href="/home">
                    <i class='bx bx-home'></i>
                </a>
            </div>
            <div class="headertext">
                <p>العمليات</p>
                <p>Process</p>
            </div>
            <div class="headericon">
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            <div class="headertext">
                <p>موارد الحوكمة والمخاطر والامتثال</p>
                <p>GRC Domain Resources</p>
            </div>
        </div>
        <div class="headerright">
            <button type="button" class="button" onclick="window.location.href=('/cs-induction')">
                <p>ارجع</p>
                <p>Back</p>
            </button>
        </div>
    </div>
    <div class="bodysec">
        @yield('content')
    </div>
</body>

</html>
