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

    <style>
        /* ===== CSS VARIABLES ===== */
        :root {
            --primary-bg: #0a0028;
            --secondary-bg: #1e5799;
            --text-white: #ffffff;
            --border-white: #ffffff;
            --shadow-dark: rgba(0, 0, 0, 0.6);
            --shadow-light: rgba(0, 0, 0, 0.2);
            --overlay-bg: rgba(10, 0, 40, 0.6);
            --transition-speed: 0.3s;
            --border-radius: 20px;
            --border-radius-sm: 12px;
            --spacing-xs: 1rem;
            --spacing-sm: 1rem;
            --spacing-md: 1.5rem;
            --spacing-lg: 2rem;
            --spacing-xl: 3rem;
            --spacing-xxl: 5rem;
        }

        /* ===== RESET & BASE STYLES ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 16px;
            scroll-behavior: smooth;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* ===== LANDING PAGE LAYOUT ===== */
        .page-landing {
            background-image: url("{{ asset('Images/riyadh.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            background-color: var(--primary-bg);
            position: relative;
        }

        .page-landing::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--overlay-bg);
            z-index: 0;
        }

        /* ===== CONTAINER STYLES ===== */
        .container {
            width: 100%;
            max-width: 1400px;
            padding: var(--spacing-lg);
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-direction: column;
            gap: var(--spacing-lg);
            position: relative;
            z-index: 1;
            min-height: 100vh;
        }

        /* ===== LOGO STYLES ===== */
        .title-logo {
            max-width: 140px;
            width: 100%;
            margin-top: var(--spacing-sm);
            text-align: center;
            align-self: center;
        }

        .title-logo img {
            max-width: 100%;
            height: auto;
            filter: drop-shadow(0 4px 8px var(--shadow-dark));
            transition: transform var(--transition-speed) ease;
        }

        .title-logo img:hover {
            transform: scale(1.05);
        }

        /* ===== TITLE BUTTON STYLES ===== */
        .title-button {
            position: relative;
            display: inline-block;
            border-radius: var(--border-radius);
            background: linear-gradient(135deg, var(--secondary-bg) 0%, var(--primary-bg) 100%);
            border: 2px solid var(--border-white);
            color: var(--text-white);
            text-align: center;
            font-size: clamp(1.25rem, 3vw, 1.75rem);
            font-weight: 600;
            padding: var(--spacing-md) var(--spacing-lg);
            text-decoration: none;
            transition: all var(--transition-speed) ease;
            cursor: pointer;
            min-width: 280px;
            max-width: 90vw;
            width: auto;
            box-shadow: 0 8px 32px var(--shadow-dark);
            backdrop-filter: blur(10px);
            align-self: center;
        }

        .title-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px var(--shadow-dark);
            background: linear-gradient(135deg, #2980b9 0%, #1e5799 100%);
        }

        .title-button:active {
            transform: translateY(-1px);
        }

        .title-button:focus {
            outline: 3px solid rgba(255, 255, 255, 0.5);
            outline-offset: 2px;
        }

        .title-button h1 {
            font-size: clamp(1.1rem, 2.5vw, 1.3rem);
            font-weight: 700;
            margin: 0;
            line-height: 1.3;
        }

        /* ===== FEATURE BOXES STYLES ===== */
        .feature-boxes {
            display: flex;
            gap: var(--spacing-lg);
            margin-top: var(--spacing-xl);
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
        }

        .feature-box {
            background: linear-gradient(135deg, var(--secondary-bg) 0%, var(--primary-bg) 100%);
            border-radius: var(--border-radius);
            box-shadow: 0 8px 32px var(--shadow-dark);
            padding: var(--spacing-lg);
            flex: 1 1 280px;
            max-width: 350px;
            min-width: 250px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: all var(--transition-speed) ease;
            border: 2px solid var(--border-white);
            backdrop-filter: blur(10px);
            text-decoration: none;
            color: var(--text-white);
        }

        .feature-box:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 48px var(--shadow-dark);
            background: linear-gradient(135deg, #2980b9 0%, #1e5799 100%);
        }

        .feature-box:active {
            transform: translateY(-4px);
        }

        .feature-box:focus {
            outline: 3px solid rgba(255, 255, 255, 0.5);
            outline-offset: 2px;
        }

        .feature-box img {
            width: clamp(100px, 15vw, 135px);
            height: clamp(100px, 15vw, 135px);
            object-fit: contain;
            margin-bottom: var(--spacing-md);
            border-radius: var(--border-radius-sm);
            padding: var(--spacing-xs);
            background: rgba(255, 255, 255, 0.1);
            transition: transform var(--transition-speed) ease;
        }

        .feature-box:hover img {
            transform: scale(1.05);
        }

        .feature-box h3 {
            font-size: clamp(1.2rem, 2.5vw, 1.65rem);
            margin-bottom: var(--spacing-xs);
            color: var(--text-white);
            font-weight: 600;
            margin-top: 0;
        }

        .feature-box p {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            color: var(--text-white);
            margin: 0;
            opacity: 0.9;
        }

        /* ===== UTILITY CLASSES ===== */
        .mb-1 {
            margin-bottom: var(--spacing-sm);
        }

        .mb-2 {
            margin-bottom: var(--spacing-lg);
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        /* ===== RESPONSIVE DESIGN ===== */

        /* Large Desktop */
        @media (min-width: 1400px) {
            .container {
                gap: var(--spacing-xl);
                padding: var(--spacing-xl);
            }

            .feature-boxes {
                gap: var(--spacing-xl);
            }

            .feature-box {
                flex: 1 1 320px;
                max-width: 380px;
            }
        }

        /* Desktop */
        @media (max-width: 1399px) and (min-width: 1025px) {
            .container {
                gap: var(--spacing-lg);
                padding: var(--spacing-lg);
            }

            .feature-boxes {
                gap: var(--spacing-lg);
            }
        }

        /* Tablet */
        @media (max-width: 1024px) {
            .page-landing {
                background-attachment: scroll;
                min-height: auto;
            }

            .container {
                gap: var(--spacing-md);
                padding: var(--spacing-md);
                min-height: auto;
                align-items: center;
            }

            .title-logo {
                max-width: 120px;
            }

            .title-button {
                min-width: 250px;
                font-size: 1.25rem;
                padding: var(--spacing-sm) var(--spacing-md);
            }

            .feature-boxes {
                gap: var(--spacing-md);
                margin-top: var(--spacing-lg);
            }

            .feature-box {
                flex: 1 1 240px;
                max-width: 300px;
                min-width: 220px;
                padding: var(--spacing-md);
            }
        }

        /* Mobile Large */
        @media (max-width: 768px) {
            .container {
                gap: var(--spacing-sm);
                padding: var(--spacing-sm);
            }

            .title-logo {
                max-width: 100px;
                margin-top: var(--spacing-xs);
            }

            .title-button {
                min-width: 220px;
                font-size: 1.1rem;
                padding: var(--spacing-sm);
                border-radius: 15px;
            }

            .feature-boxes {
                flex-direction: column;
                gap: var(--spacing-sm);
                margin-top: var(--spacing-md);
                align-items: center;
            }

            .feature-box {
                max-width: 90vw;
                width: 100%;
                min-width: 200px;
                padding: var(--spacing-sm);
                border-radius: 15px;
            }

            .feature-box img {
                width: 140px;
                height: 140px;
            }
        }

        /* Mobile Medium */
        @media (max-width: 480px) {
            .container {
                gap: var(--spacing-xs);
                padding: var(--spacing-xs);
            }

            .title-logo {
                max-width: 80px;
            }

            .title-button {
                min-width: 200px;
                font-size: 1rem;
                padding: 8px 12px;
                border-radius: 12px;
            }

            .feature-boxes {
                gap: var(--spacing-xs);
                margin-top: var(--spacing-sm);
            }

            .feature-box {
                max-width: 95vw;
                padding: var(--spacing-xs);
                border-radius: 12px;
            }

            .feature-box img {
                width: 100px;
                height: 100px;
                margin-bottom: var(--spacing-xs);
            }

            .feature-box h3 {
                font-size: 1.1rem;
            }

            .feature-box p {
                font-size: 0.9rem;
            }
        }

        /* Mobile Small */
        @media (max-width: 360px) {
            .title-button {
                min-width: 180px;
                font-size: 0.9rem;
                padding: 6px 10px;
            }

            .title-logo {
                max-width: 70px;
            }

            .feature-box {
                padding: 8px;
            }

            .feature-box img {
                width: 60px;
                height: 60px;
            }
        }

        /* ===== ACCESSIBILITY ===== */
        @media (prefers-reduced-motion: reduce) {

            .title-button,
            .feature-box,
            .title-logo img,
            .feature-box img {
                transition: none;
                animation: none;
            }

            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* High contrast mode support */
        @media (prefers-contrast: high) {

            .title-button,
            .feature-box {
                border-width: 3px;
                background: var(--primary-bg);
            }
        }

        /* ===== PRINT STYLES ===== */
        @media print {
            .page-landing {
                background: white !important;
                color: black !important;
            }

            .title-button,
            .feature-box {
                background: white !important;
                color: black !important;
                border: 2px solid black !important;
                box-shadow: none !important;
            }
        }
    </style>
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
            <a href="{{ route('cs-induction') }}" class="feature-box fade-in-up" role="button"
                aria-label="Access PitStop 360 CS Induction Program">
                <img src="{{ asset('Images/pitstop.jpg') }}" alt="PitStop 360" loading="lazy">
                <h3>PitStop 360</h3>
                <p>CS Induction Program</p>
            </a>

            <a href="{{ route('vciso') }}" class="feature-box fade-in-up" role="button"
                aria-label="Access CISO 360 Decision Support System">
                <img src="{{ asset('Images/ConfidentCISO.png') }}" alt="CISO 360" loading="lazy">
                <h3>CISO 360</h3>
                <p>CISO Decision Support System</p>
            </a>

            <a href="{{ route('compliance') }}" class="feature-box fade-in-up" role="button"
                aria-label="Access Compliance 360 Out-of-the-Box Compliance">
                <img src="{{ asset('Images/ComplianceICon.jpeg') }}" alt="Compliance 360" loading="lazy">
                <h3>Compliance 360</h3>
                <p>100% Out-of-the-Box Compliance</p>
            </a>
        </div>
    </div>
</body>

</html>
