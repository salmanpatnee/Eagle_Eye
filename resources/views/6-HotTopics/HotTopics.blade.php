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
</head>

<body class="processpage">
    <header>
        <div class="header-content" id="header">
            <div>
                <a href="/home">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">موضوعات ساخنة لرئيس أمن المعلومات</p>
                <p class="bold-text">Hot Topics for CISO</p>
            </div>
            <div class="d-flex align-items-center gap-3">
            @include('partials.roles')
            <a href="/vciso">
                <button class="RightButton">
                    <p class="RightButtonArbTxt">ارجع</p>
                    <p class="RightButtonTxt">Back</p>
                </button>
            </a>

          
            </div>
        </div>
    </header>
    <div class="processes">
        <a href="/hot-topics/compliance-challenges" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext"></p>
                <p class="BoxText">Compliance Challenges! <br> Framework Model</p>
            </div>
        </a>
        <a href="/hot-topics/key-performance-indicator" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext"></p>
                <p class="BoxText">Key Performance Indicator vs Key Risk Indicator</p>
            </div>
        </a>
        <a href="/hot-topics/essential-kpis-kris" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext"></p>
                <p class="BoxText">Essential KPIs & KRIs</p>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/hot-topics/risk-management-methodologies" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext"></p>
                <p class="BoxText">Risk Management Methodologies</p>
            </div>
        </a>
        <a href="/hot-topics/control-assessment-risk-assessment" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext"></p>
                <p class="BoxText">Control Assessment vs Risk Assessment</p>
            </div>
        </a>
        <a href="/hot-topics/26-essential-items-checklist-awareness-topics" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext"></p>
                <p class="BoxText">26 Essential Items Checklist of Awarness Topics</p>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/hot-topics/enhancing-staff-knowledge-skill" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext"></p>
                <p class="BoxText">Enhancing Staff Knowledge & Skill</p>
            </div>
        </a>
        <a href="/hot-topics/asset-inventory-configuration-management-database" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext"></p>
                <p class="BoxText">Asset Inventory vs Configuration Management Database</p>
            </div>
        </a>
        <a href="/hot-topics/essential-practical-cryptographic-deployment" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext"></p>
                <p class="BoxText">Essential and Practical Cryptographic Deployment</p>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/hot-topics/data-information" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext"></p>
                <p class="BoxText">Data & Information</p>
            </div>
        </a>
        <a href="/hot-topics/selecting-va-pen-tester" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext"></p>
                <p class="BoxText">Selecting VA & Pen Tester</p>
            </div>
        </a>
        <a href="/hot-topics/incident-management-cybersecurity-incident-management" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext"></p>
                <p class="BoxText">Incident Management vs Cybersecurity Incident Management</p>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/hot-topics/review-vs-audit" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext"></p>
                <p class="BoxText">Review vs Audit</p>
            </div>
        </a>
    </div>
</body>

</html>
