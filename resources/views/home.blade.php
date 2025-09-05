<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0a0028">

    <!-- Primary Meta Tags -->
    <title>Compliance 360</title>
    <meta name="title" content="Saturn-V GRC Tool">
    <meta name="description" content="Zain Cloud GRC Tool">
    <meta name="keywords" content="GRC, Compliance, Risk Management, Governance, CISO">
    <meta name="author" content="Compliance 360">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Compliance 360">
    <meta property="og:description" content="Zain Cloud GRC Tool">
    <meta property="og:image" content="{{ asset('Images/Eagle_Eye_Logo.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Compliance 360">
    <meta property="twitter:description" content="Zain Cloud GRC Tool">
    <meta property="twitter:image" content="{{ asset('Images/Eagle_Eye_Logo.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- External CSS -->
    <link rel="stylesheet" href="css/1-Title/1-TitleIndex.css">


</head>

<body class="page-landing">
    <div class="container">
        <div class="title-logo fade-in-up">
            <img src="/Images/Eagle_Eye_Logo.png" alt="Eagle Eye Logo" loading="lazy">
        </div>

        {{-- <span class="title-button fade-in-up" role="heading" aria-level="1">
            <h1>Eagle Eye: The Complete Solution for CISO</h1>
        </span> --}}

        <div class="feature-boxes">
            <a href="{{ route('compliance') }}" class="feature-box fade-in-up" role="button"
                aria-label="Access Compliance 360 Out-of-the-Box Compliance">
                <img src="{{ asset('Images/ComplianceICon.jpeg') }}" alt="Compliance 360" loading="lazy">
                <h3>Compliance 360</h3>
                <p>100% Out-of-the-Box Compliance</p>
            </a>
            <a href="{{ route('vciso') }}" class="feature-box fade-in-up" role="button"
                aria-label="Access CISO 360 Decision Support System">
                <img src="{{ asset('Images/ConfidentCISO.png') }}" alt="CISO 360" loading="lazy">
                <h3>CISO 360</h3>
                <p>CISO Decision Support System</p>
            </a>
            <a href="{{ route('pitstop.index') }}" class="feature-box fade-in-up" role="button"
                aria-label="Access PitStop 360 CS Induction Program">
                <img src="{{ asset('Images/pitstop.jpg') }}" alt="PitStop 360" loading="lazy">
                <h3>PitStop 360</h3>
                <p>CS Induction Program</p>
            </a>


        </div>
    </div>
</body>

</html>
