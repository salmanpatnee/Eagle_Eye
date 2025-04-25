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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            background-image: url('Images/CISOEduBG.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .logoImg {
            width: 160px;
            height: auto;
        }

        
    </style>

</head>

<body>
    <header>
        <div class="header-content" id="header">
            <div>
                <a href="/home">
                    <i class="bx bx-home"></i>
                </a>
                <p class="bold-arbtext">رئيس أمن المعلومات التعليم</p>
                <p class="bold-text">CISO Education</p>
            </div>
            <div>
                <div class="d-flex align-items-center gap-3">
                    @include('partials.roles')
                    <a href="/vciso">
                        <button class="RightButton">
                            <p class="RightButtonArbTxt">ارجع</p>
                            <p class="RightButtonTxt">Back</p>
                        </button>
                    </a>
                </div>
                <form id="logout-form" method="POST" action="{{ route('login.destroy') }}" style="display: none;">
                    @csrf
                    <button type="submit"> Log Out</button>
                </form>
            </div>
        </div>
    </header>
    <div class="processes">
        <a href="/ciso-education/applying-cissp-knowledge-in-ksa" class="boxhyperlink">
            <div class="CisoEdudomainbox">
                <img class="logoImg" src="Images/CISSPLogo.png">
                <p class="BoxText">Applying CISSP Knowledge in KSA</p>
            </div>
        </a>
        <a href="/ciso-education/applying-cism-knowledge-in-ksa" class="boxhyperlink">
            <div class="CisoEdudomainboxlight">
                <img class="logoImg" src="Images/CISMLogo.png">
                <p class="BoxText">Applying CISM Knowledge in KSA</p>
            </div>
        </a>
        <a href="ciso-education/applying-cgeit-knowledge-in-ksa" class="boxhyperlink">
            <div class="CisoEdudomainbox">
                <img class="logoImg" src="Images/CGEITLogo.png">
                <p class="BoxText">Applying CGEIT Knowledge in KSA</p>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/ciso-education/applying-pmp-knowledge-in-ksa" class="boxhyperlink">
            <div class="CisoEdudomainboxlight">
                <img class="logoImg" src="Images/PMPLogo.png">
                <p class="BoxText">Applying PMP Knowledge in KSA</p>
            </div>
        </a>
        <a href="/ciso-education/applying-agile-approach" class="boxhyperlink">
            <div class="CisoEdudomainbox">
                <img class="logoImg" src="Images/AgileLogo.png">
                <p class="BoxText">Applying Agile Approach to Your Department</p>
            </div>
        </a>
        <div class="BlacnkBox"></div>
    </div>
</body>

</html>
