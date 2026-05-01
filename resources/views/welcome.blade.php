<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eagle Eye — GRC Platform</title>
    <meta name="description"
        content="Enterprise GRC platform for risk assessment, audit management, and regulatory compliance in Saudi Arabia.">
    <link rel="icon" type="image/x-icon" href="{{ asset('Images/favicon.ico') }}"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..60,400;12..60,700;12..60,800&family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600&family=JetBrains+Mono:wght@400;700&family=IBM+Plex+Sans+Arabic:wght@400;500;600&display=swap"
        rel="stylesheet">

    <style>
        :root {
            /* Core palette */
            --navy: #0B2447;
            --navy-mid: #1A3F6F;
            --blue: #2563EB;
            --blue-hover: #1D4ED8;
            --blue-light: #EFF6FF;
            --blue-mid: #DBEAFE;
            --blue-border: rgba(37, 99, 235, 0.18);
            --teal: #0EA5E9;
            --teal-light: #E0F2FE;
            --amber: #D97706;
            --amber-light: #FEF3C7;
            --amber-border: rgba(217, 119, 6, 0.25);
            --green: #059669;
            --green-light: #D1FAE5;
            --red: #DC2626;
            /* Backgrounds */
            --bg-page: #F8FAFC;
            --bg-white: #FFFFFF;
            --bg-alt: #F1F5F9;
            --bg-blue-soft: #EFF6FF;
            /* Text */
            --text-1: #0F172A;
            --text-2: #475569;
            --text-3: #94A3B8;
            /* Borders */
            --border: #E2E8F0;
            --border-2: #CBD5E1;
            /* Shadows */
            --shadow-xs: 0 1px 2px rgba(15, 23, 42, 0.05);
            --shadow-sm: 0 1px 4px rgba(15, 23, 42, 0.07), 0 1px 2px rgba(15, 23, 42, 0.04);
            --shadow-md: 0 4px 16px rgba(15, 23, 42, 0.09), 0 2px 6px rgba(15, 23, 42, 0.05);
            --shadow-lg: 0 12px 40px rgba(15, 23, 42, 0.12), 0 4px 12px rgba(15, 23, 42, 0.06);
            --shadow-xl: 0 24px 64px rgba(15, 23, 42, 0.14), 0 8px 20px rgba(15, 23, 42, 0.07);
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg-page);
            color: var(--text-1);
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Bricolage Grotesque', sans-serif;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* ─── Keyframes ───────────────────────────────── */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(28px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(36px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes bar-fill-91 {
            from {
                width: 0;
            }

            to {
                width: 91%;
            }
        }

        @keyframes bar-fill-78 {
            from {
                width: 0;
            }

            to {
                width: 78%;
            }
        }

        @keyframes bar-fill-85 {
            from {
                width: 0;
            }

            to {
                width: 85%;
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.55);
                opacity: 0.3;
            }
        }

        @keyframes marquee-scroll {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        @keyframes scanline-sweep {
            from {
                top: -100%;
            }

            to {
                top: 150%;
            }
        }

        @keyframes mesh-shift {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .anim-1 {
            animation: fadeInUp 0.65s ease both;
            animation-delay: 0.10s;
        }

        .anim-2 {
            animation: fadeInUp 0.65s ease both;
            animation-delay: 0.20s;
        }

        .anim-3 {
            animation: fadeInUp 0.65s ease both;
            animation-delay: 0.30s;
        }

        .anim-4 {
            animation: fadeInUp 0.65s ease both;
            animation-delay: 0.40s;
        }

        .anim-5 {
            animation: fadeInUp 0.65s ease both;
            animation-delay: 0.50s;
        }

        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.55s ease, transform 0.55s ease;
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-delay-1 {
            transition-delay: 0.10s;
        }

        .reveal-delay-2 {
            transition-delay: 0.20s;
        }

        .reveal-delay-3 {
            transition-delay: 0.30s;
        }

        .reveal-delay-4 {
            transition-delay: 0.40s;
        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* ─── Layout ──────────────────────────────────── */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ─── Navbar ──────────────────────────────────── */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 14px 0;
            background: #ffffff;
            backdrop-filter: none;
            -webkit-backdrop-filter: none;
            border-bottom: 1px solid transparent;
            transition: border-color 0.25s, box-shadow 0.25s;
        }

        .navbar.scrolled {
            border-bottom-color: var(--border);
            box-shadow: 0 1px 20px rgba(15, 23, 42, 0.07);
        }

        .nav-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .nav-brand img {
            width: 100%;
            height: auto;
            object-fit: contain;
            max-width: 150px;
        }

        .nav-brand-text .brand-name {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-weight: 700;
            font-size: 15px;
            color: var(--navy);
        }

        .nav-brand-text .brand-sub {
            font-size: 11px;
            color: var(--text-3);
            font-weight: 500;
        }

        .nav-center {
            position: relative;
            display: flex;
            align-items: center;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 4px;
            list-style: none;
        }

        .nav-links a {
            font-size: 14px;
            font-weight: 500;
            color: var(--text-2);
            padding: 6px 14px;
            border-radius: 6px;
            transition: color 0.18s, background 0.18s;
        }

        .nav-links a:hover {
            color: var(--navy);
            background: var(--bg-alt);
        }

        .nav-indicator {
            position: absolute;
            bottom: -2px;
            height: 2px;
            background: var(--blue);
            border-radius: 2px;
            transition: left 0.22s ease, width 0.22s ease;
            pointer-events: none;
            display: none;
        }

        .nav-cta {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--blue);
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            font-size: 14px;
            padding: 9px 20px;
            border-radius: 8px;
            transition: background 0.18s, transform 0.15s, box-shadow 0.18s;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.28);
            white-space: nowrap;
        }

        .nav-cta:hover {
            background: var(--blue-hover);
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.38);
        }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
        }

        .hamburger span {
            display: block;
            width: 24px;
            height: 2px;
            background: var(--navy);
            border-radius: 2px;
            transition: transform 0.3s, opacity 0.3s;
        }

        .mobile-drawer {
            display: none;
            flex-direction: column;
            background: var(--bg-white);
            border-top: 1px solid var(--border);
            padding: 16px 24px 20px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
        }

        .mobile-drawer.open {
            display: flex;
        }

        .mobile-drawer a {
            padding: 12px 0;
            font-weight: 500;
            font-size: 15px;
            color: var(--text-2);
            border-bottom: 1px solid var(--border);
            transition: color 0.18s;
        }

        .mobile-drawer a:last-child {
            border-bottom: none;
            margin-top: 8px;
        }

        .mobile-drawer a:hover {
            color: var(--navy);
        }

        .mobile-cta {
            display: inline-flex !important;
            justify-content: center;
            background: var(--blue) !important;
            color: #fff !important;
            border-radius: 8px;
            padding: 12px 24px !important;
            border-bottom: none !important;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.28);
        }

        /* ─── Hero ────────────────────────────────────── */
        .hero {
            min-height: 100vh;
            padding: 128px 0 96px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            background: linear-gradient(150deg, #EFF6FF 0%, #F8FAFC 45%, #FFFFFF 100%);
        }

        /* Subtle dot-grid texture */
        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24'%3E%3Ccircle cx='1' cy='1' r='1' fill='rgba(15%2C23%2C42%2C0.05)'/%3E%3C/svg%3E");
            background-size: 24px 24px;
            pointer-events: none;
        }

        .hero-blob-teal {
            position: absolute;
            top: -160px;
            right: -100px;
            width: 640px;
            height: 640px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.08) 0%, transparent 65%);
            pointer-events: none;
        }

        .hero-blob-amber {
            position: absolute;
            bottom: -180px;
            left: -120px;
            width: 560px;
            height: 560px;
            background: radial-gradient(circle, rgba(14, 165, 233, 0.07) 0%, transparent 65%);
            pointer-events: none;
        }

        .hero-inner {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 64px;
            align-items: center;
        }

        .hero-overline {
            display: inline-flex;
            align-items: center;
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
            font-weight: 700;
            color: var(--blue);
            margin-bottom: 22px;
            border-left: 2px solid var(--blue);
            padding-left: 12px;
            letter-spacing: 0.04em;
        }

        .hero-h1 {
            font-size: clamp(40px, 5vw, 48px);
            font-weight: 800;
            line-height: 1.1;
            color: var(--navy);
            margin-bottom: 16px;
        }

        .blue-text {
            background: linear-gradient(135deg, #2563EB 0%, #0EA5E9 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-arabic {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
            font-size: 16px;
            font-weight: 500;
            color: var(--amber);
            direction: rtl;
            text-align: right;
            margin-bottom: 20px;
            padding-left: 16px;
            border-left: 3px solid var(--amber-border);
        }

        .hero-body {
            font-size: 17px;
            color: var(--text-2);
            line-height: 1.75;
            margin-bottom: 36px;
            max-width: 480px;
        }

        .hero-actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--blue);
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            font-size: 15px;
            padding: 14px 28px;
            border-radius: 10px;
            transition: background 0.18s, transform 0.15s, box-shadow 0.18s;
            box-shadow: 0 4px 16px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:hover {
            background: var(--blue-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(37, 99, 235, 0.4);
        }

        .btn-ghost {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--bg-white);
            color: var(--navy);
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            font-size: 15px;
            padding: 14px 28px;
            border-radius: 10px;
            border: 1.5px solid var(--border-2);
            transition: border-color 0.18s, color 0.18s, background 0.18s, transform 0.15s;
            box-shadow: var(--shadow-xs);
        }

        .btn-ghost:hover {
            border-color: var(--blue);
            color: var(--blue);
            background: var(--blue-light);
            transform: translateY(-2px);
        }

        /* ─── Hero Badge ──────────────────────────────── */
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(37, 99, 235, 0.05);
            border: 1px solid rgba(37, 99, 235, 0.18);
            border-radius: 100px;
            padding: 6px 16px 6px 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--navy-mid);
            margin-bottom: 22px;
            width: fit-content;
        }

        .hero-badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--green);
            animation: hero-dot-pulse 2.4s ease-in-out infinite;
            flex-shrink: 0;
        }

        @keyframes hero-dot-pulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(5, 150, 105, 0.5); }
            50%       { box-shadow: 0 0 0 5px rgba(5, 150, 105, 0); }
        }

        /* ─── Hero Announcement Strip ──────────────────── */
        .hero-announce {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            background: rgba(37, 99, 235, 0.03);
            border: 1px solid rgba(37, 99, 235, 0.13);
            border-radius: 10px;
            padding: 14px 18px;
            margin-bottom: 20px;
            max-width: 480px;
            overflow: hidden;
        }

        .hero-announce::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, #2563EB 0%, #0EA5E9 55%, transparent 100%);
        }

        .hero-announce-icon {
            flex-shrink: 0;
            margin-top: 2px;
            opacity: 0.8;
        }

        .hero-announce-text {
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            font-weight: 400;
            color: var(--text-2);
            line-height: 1.65;
        }

        .hero-announce-text strong {
            font-weight: 600;
            color: var(--navy-mid);
        }

        /* ─── Hero Stats Trio ─────────────────────────── */
        .hero-stats-trio {
            display: flex;
            align-items: center;
            margin-top: 28px;
            padding: 14px 4px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow-sm);
            width: fit-content;
        }

        .hst-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0 22px;
        }

        .hst-sep {
            width: 1px;
            height: 32px;
            background: var(--border);
            flex-shrink: 0;
        }

        .hst-val {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: 22px;
            font-weight: 800;
            color: var(--navy);
            line-height: 1;
        }

        .hst-lbl {
            font-size: 10.5px;
            font-weight: 500;
            color: var(--text-3);
            margin-top: 3px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ─── Mockup ──────────────────────────────────── */
        .hero-visual {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-width: 0;
            animation: fadeInRight 0.8s ease 0.4s both;
        }

        .mockup-wrapper {
            position: relative;
            width: 100%;
            max-width: 440px;
            padding-bottom: 64px;
            transition: transform 0.18s ease;
        }

        .mockup-card {
            background: var(--bg-white);
            border-radius: 20px;
            padding: 24px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-xl);
        }

        .mockup-tabs {
            display: flex;
            margin-bottom: 18px;
            border-bottom: 1px solid var(--border);
        }

        .mockup-tab {
            font-family: 'DM Sans', sans-serif;
            font-size: 12px;
            font-weight: 500;
            color: var(--text-3);
            padding: 6px 14px;
            cursor: default;
            border-bottom: 2px solid transparent;
            margin-bottom: -1px;
        }

        .mockup-tab.active {
            color: var(--blue);
            border-bottom-color: var(--blue);
            font-weight: 600;
        }

        .mockup-header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .mockup-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 600;
            color: var(--navy);
        }

        .live-badge {
            display: flex;
            align-items: center;
            gap: 6px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            font-weight: 700;
            color: var(--green);
            background: var(--green-light);
            border: 1px solid rgba(5, 150, 105, 0.25);
            padding: 3px 10px;
            border-radius: 100px;
        }

        .live-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--green);
            animation: pulse 1.6s ease-in-out infinite;
        }

        .stat-pills {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin-bottom: 18px;
        }

        .stat-pill {
            background: var(--bg-page);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 12px 8px;
            text-align: center;
        }

        .stat-pill .val {
            font-family: 'JetBrains Mono', monospace;
            font-size: 18px;
            font-weight: 700;
            color: var(--navy);
            line-height: 1;
        }

        .stat-pill .lbl {
            font-size: 10px;
            color: var(--text-3);
            margin-top: 4px;
            font-weight: 500;
        }

        .stat-pill.accent .val {
            color: var(--blue);
        }

        .stat-pill.warn .val {
            color: var(--red);
        }

        .compliance-head {
            margin-bottom: 12px;
        }

        .compliance-head span {
            font-family: 'JetBrains Mono', monospace;
            font-size: 10px;
            font-weight: 700;
            color: var(--text-3);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .bar-row {
            margin-bottom: 10px;
        }

        .bar-row:last-child {
            margin-bottom: 0;
        }

        .bar-row-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .bar-label {
            font-size: 11px;
            font-weight: 600;
            color: var(--text-2);
        }

        .bar-pct {
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            font-weight: 700;
            color: var(--blue);
        }

        .bar-track {
            height: 6px;
            background: var(--bg-alt);
            border-radius: 100px;
            overflow: hidden;
        }

        .bar-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--blue), var(--teal));
            border-radius: 100px;
            width: 0;
        }

        .bar-fill-1 {
            animation: bar-fill-91 1.2s cubic-bezier(0.4, 0, 0.2, 1) 0.8s forwards;
        }

        .bar-fill-2 {
            animation: bar-fill-78 1.2s cubic-bezier(0.4, 0, 0.2, 1) 1.0s forwards;
        }

        .bar-fill-3 {
            animation: bar-fill-85 1.2s cubic-bezier(0.4, 0, 0.2, 1) 1.2s forwards;
        }

        .floating-card {
            position: absolute;
            bottom: 0;
            left: -20px;
            background: var(--bg-white);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 14px 16px;
            width: 210px;
            box-shadow: var(--shadow-lg);
            animation: fadeInUp 0.65s ease 1.4s both;
        }

        .floating-card-title {
            font-family: 'JetBrains Mono', monospace;
            font-size: 10px;
            font-weight: 700;
            color: var(--text-3);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 10px;
        }

        .finding-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 6px;
            font-size: 11px;
            color: var(--text-2);
            line-height: 1.4;
        }

        .finding-row:last-child {
            margin-bottom: 0;
        }

        .finding-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .dot-green {
            background: var(--green);
        }

        .dot-amber {
            background: var(--amber);
        }

        .dot-red {
            background: var(--red);
        }


        /* --- Hero Visual — Colour Treatment ---------- */
        .mockup-card {
            background: #0B2447;
            border: 1px solid rgba(37,99,235,0.28);
            box-shadow:
                0 32px 80px rgba(9,28,62,0.65),
                0 8px 24px rgba(37,99,235,0.18),
                inset 0 1px 0 rgba(255,255,255,0.06);
            position: relative;
            overflow: hidden;
        }
        /* Blue glow top-right */
        .mockup-card::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 240px; height: 240px;
            background: radial-gradient(circle, rgba(37,99,235,0.25) 0%, transparent 65%);
            pointer-events: none;
            z-index: 0;
        }
        /* Teal glow bottom-left */
        .mockup-card::after {
            content: '';
            position: absolute;
            bottom: -40px; left: 20px;
            width: 180px; height: 180px;
            background: radial-gradient(circle, rgba(14,165,233,0.15) 0%, transparent 65%);
            pointer-events: none;
            z-index: 0;
        }
        .mockup-card > * { position: relative; z-index: 1; }
        .mockup-tabs    { border-bottom-color: rgba(255,255,255,0.08); }
        .mockup-tab     { color: rgba(255,255,255,0.32); }
        .mockup-tab.active { color: #60A5FA; border-bottom-color: #60A5FA; }
        .mockup-title   { color: #fff; }
        .stat-pill {
            background: rgba(255,255,255,0.06);
            border-color: rgba(255,255,255,0.1);
        }
        .stat-pill .val { color: #F1F5F9; }
        .stat-pill .lbl { color: rgba(255,255,255,0.38); }
        .stat-pill.accent {
            background: rgba(37,99,235,0.22);
            border-color: rgba(96,165,250,0.38);
        }
        .stat-pill.accent .val { color: #60A5FA; }
        .stat-pill.warn {
            background: rgba(220,38,38,0.18);
            border-color: rgba(248,113,113,0.38);
        }
        .stat-pill.warn .val { color: #F87171; }
        .compliance-head span { color: rgba(255,255,255,0.32); }
        .bar-label { color: rgba(255,255,255,0.62); }
        .bar-pct   { color: #93C5FD; }
        .bar-track { background: rgba(255,255,255,0.09); }
        /* Per-framework distinct gradient colours */
        .bar-fill-1 { background: linear-gradient(90deg, #2563EB, #38BDF8); }
        .bar-fill-2 { background: linear-gradient(90deg, #D97706, #FCD34D); }
        .bar-fill-3 { background: linear-gradient(90deg, #7C3AED, #C084FC); }
        /* Floating card: white with gradient accent top border */
        .floating-card {
            background: #fff;
            border-color: rgba(37,99,235,0.14);
            border-top: 2.5px solid transparent;
            background-image: linear-gradient(white, white),
                              linear-gradient(90deg, #2563EB 0%, #0EA5E9 50%, #7C3AED 100%);
            background-origin: border-box;
            background-clip: padding-box, border-box;
            box-shadow:
                0 16px 48px rgba(9,28,62,0.22),
                0 4px 14px rgba(37,99,235,0.12);
        }
        /* Glowing status dots */
        .dot-green { background: #10B981; box-shadow: 0 0 7px rgba(16,185,129,0.55); }
        .dot-amber { background: #F59E0B; box-shadow: 0 0 7px rgba(245,158,11,0.55); }
        .dot-red   { background: #EF4444; box-shadow: 0 0 7px rgba(239,68,68,0.55); }

        /* ─── Trust Bar ───────────────────────────────── */
        .trust-bar {
            background: var(--bg-white);
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            padding: 20px 0;
            overflow: hidden;
        }

        .trust-bar-inner {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .trust-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            font-weight: 700;
            color: var(--text-3);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .trust-marquee {
            overflow: hidden;
            flex: 1;
            position: relative;
        }

        .trust-marquee::before,
        .trust-marquee::after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            width: 48px;
            z-index: 2;
            pointer-events: none;
        }

        .trust-marquee::before {
            left: 0;
            background: linear-gradient(to right, var(--bg-white), transparent);
        }

        .trust-marquee::after {
            right: 0;
            background: linear-gradient(to left, var(--bg-white), transparent);
        }

        .trust-track {
            display: flex;
            gap: 10px;
            animation: marquee-scroll 22s linear infinite;
            width: max-content;
        }

        .trust-badge {
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
            font-weight: 700;
            padding: 6px 16px;
            border-radius: 100px;
            background: var(--bg-page);
            color: var(--navy);
            border: 1px solid var(--border);
            white-space: nowrap;
            transition: background 0.18s, border-color 0.18s, color 0.18s;
            cursor: default;
        }

        .trust-badge:hover {
            background: var(--blue-light);
            border-color: rgba(37, 99, 235, 0.35);
            color: var(--blue);
        }

        /* ─── Section Helpers ─────────────────────────── */
        .section-eyebrow {
            display: inline-block;
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--blue);
            margin-bottom: 12px;
        }

        .section-title {
            font-size: clamp(26px, 3vw, 40px);
            font-weight: 800;
            color: var(--navy);
            line-height: 1.2;
        }

        .section-header {
            text-align: center;
            margin-bottom: 56px;
        }

        .section-sub {
            font-size: 17px;
            color: var(--text-2);
            margin-top: 14px;
            max-width: 560px;
            margin-left: auto;
            margin-right: auto;
        }

        /* ─── Features ────────────────────────────────── */
        .section-features {
            padding: 96px 0;
            background: var(--bg-page);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .feature-card {
            background: var(--bg-white);
            border-radius: 16px;
            padding: 32px 28px;
            border: 1.5px solid var(--border);
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
            transition: transform 0.22s, box-shadow 0.22s, border-color 0.22s;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--blue), var(--teal));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.28s ease;
        }

        .feature-card::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            height: 55%;
            top: -100%;
            background: linear-gradient(to bottom, transparent 0%, rgba(37, 99, 235, 0.04) 50%, transparent 100%);
            pointer-events: none;
        }

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-card:hover::after {
            animation: scanline-sweep 0.5s ease forwards;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(37, 99, 235, 0.25);
        }

        .feature-icon-wrap {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
        }

        .feature-icon-wrap.blue {
            background: var(--blue-light);
            border: 1px solid var(--blue-border);
        }

        .feature-icon-wrap.amber {
            background: var(--amber-light);
            border: 1px solid var(--amber-border);
        }

        .feature-icon-wrap.teal {
            background: var(--teal-light);
            border: 1px solid rgba(14, 165, 233, 0.25);
        }

        .feature-icon-wrap img {
            width: 26px;
            height: 26px;
            object-fit: contain;
        }

        .feature-title {
            font-size: 17px;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 8px;
        }

        .feature-desc {
            font-size: 14px;
            color: var(--text-2);
            line-height: 1.65;
        }

        /* ─── How It Works ────────────────────────────── */
        .section-how {
            padding: 96px 0;
            background: var(--bg-blue-soft);
            position: relative;
            overflow: hidden;
        }

        /* Subtle grid overlay */
        .section-how::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='32'%3E%3Crect x='0' y='0' width='1' height='1' fill='rgba(37%2C99%2C235%2C0.07)'/%3E%3C/svg%3E");
            background-size: 32px 32px;
            pointer-events: none;
        }

        .steps-row {
            position: relative;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 48px;
            margin-top: 56px;
        }

        .steps-row::before {
            content: '';
            position: absolute;
            top: 28px;
            left: calc(16.66% + 28px);
            right: calc(16.66% + 28px);
            border-top: 2px dashed rgba(37, 99, 235, 0.22);
            pointer-events: none;
        }

        .step {
            text-align: center;
            position: relative;
        }

        .step-ghost {
            position: absolute;
            top: -24px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 120px;
            font-weight: 800;
            font-family: 'Bricolage Grotesque', sans-serif;
            color: var(--blue);
            opacity: 0.05;
            line-height: 1;
            pointer-events: none;
            user-select: none;
        }

        .step-circle {
            position: relative;
            z-index: 1;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            border: 2px solid var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 14px;
            font-weight: 700;
            color: var(--blue);
            background: var(--bg-white);
            box-shadow: 0 4px 16px rgba(37, 99, 235, 0.16);
            transition: background 0.22s, color 0.22s, box-shadow 0.22s;
        }

        .step:hover .step-circle {
            background: var(--blue);
            color: #fff;
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.38);
        }

        .step-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 10px;
        }

        .step-desc {
            font-size: 14px;
            color: var(--text-2);
            line-height: 1.65;
        }

        /* ─── Stats ───────────────────────────────────── */
        .section-stats {
            background: var(--bg-white);
            padding: 56px 0;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
        }

        .stat-item {
            text-align: center;
            padding: 0 24px;
            border-right: 1px solid var(--border);
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-num {
            font-family: 'JetBrains Mono', monospace;
            font-size: clamp(36px, 4vw, 54px);
            font-weight: 700;
            color: var(--blue);
            line-height: 1;
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 14px;
            font-weight: 500;
            color: var(--text-2);
        }

        /* ─── Why Eagle Eye ───────────────────────────── */
        .section-why {
            padding: 96px 0;
            background: var(--bg-page);
        }

        .why-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .why-since {
            display: inline-flex;
            align-items: center;
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            color: var(--text-3);
            border: 1px solid var(--border);
            background: var(--bg-white);
            padding: 5px 12px;
            border-radius: 100px;
            margin-bottom: 20px;
        }

        .why-heading {
            font-size: clamp(26px, 3vw, 38px);
            font-weight: 800;
            color: var(--navy);
            line-height: 1.25;
            margin-bottom: 20px;
        }

        .why-heading span {
            color: var(--blue);
        }

        .why-body {
            font-size: 16px;
            color: var(--text-2);
            line-height: 1.75;
        }

        .why-items {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .why-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            background: var(--bg-white);
            border: 1.5px solid var(--border);
            border-radius: 12px;
            padding: 18px 20px;
            box-shadow: var(--shadow-sm);
            transition: border-color 0.18s, box-shadow 0.18s, transform 0.18s;
        }

        .why-item:hover {
            border-color: rgba(37, 99, 235, 0.3);
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .why-check {
            width: 32px;
            height: 32px;
            min-width: 32px;
            border-radius: 50%;
            background: var(--blue-light);
            border: 1px solid var(--blue-border);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 2px;
        }

        .why-check svg {
            width: 16px;
            height: 16px;
        }

        .why-item-title {
            font-weight: 600;
            font-size: 15px;
            color: var(--navy);
            margin-bottom: 4px;
        }

        .why-item-desc {
            font-size: 13px;
            color: var(--text-2);
            line-height: 1.6;
        }

        /* ─── Testimonial ─────────────────────────────── */
        .section-testimonial {
            background: var(--bg-white);
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            padding: 80px 0;
            overflow: hidden;
        }

        .testimonial-inner {
            max-width: 760px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            padding-top: 16px;
        }

        .quote-icon {
            position: absolute;
            top: -28px;
            left: -8px;
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 140px;
            line-height: 1;
            color: var(--blue);
            opacity: 0.08;
            pointer-events: none;
            user-select: none;
        }

        .quote-text {
            font-style: italic;
            font-size: 21px;
            font-weight: 400;
            color: var(--navy);
            line-height: 1.65;
            margin-bottom: 32px;
            position: relative;
            z-index: 1;
        }

        .quote-attr {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            color: var(--text-2);
            padding-left: 16px;
            border-left: 3px solid var(--amber);
            text-align: left;
        }

        /* ─── Final CTA ───────────────────────────────── */
        .section-cta {
            padding: 96px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(140deg, var(--navy) 0%, #1A3F6F 60%, #0D3061 100%);
        }

        /* Subtle blue mesh glow */
        .section-cta::before {
            content: '';
            position: absolute;
            inset: -50%;
            background: conic-gradient(from 0deg at 50% 50%, rgba(37, 99, 235, 0.35), transparent 30%, rgba(14, 165, 233, 0.2), transparent 60%);
            animation: mesh-shift 14s linear infinite;
            opacity: 0.18;
            pointer-events: none;
        }

        .cta-inner {
            position: relative;
            z-index: 1;
        }

        .cta-title {
            font-size: clamp(28px, 4vw, 50px);
            font-weight: 800;
            color: #fff;
            line-height: 1.15;
            margin-bottom: 16px;
        }

        .cta-subtitle {
            font-size: 17px;
            color: rgba(255, 255, 255, 0.65);
            margin-bottom: 40px;
        }

        .btn-cta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #fff;
            color: var(--navy);
            font-family: 'DM Sans', sans-serif;
            font-weight: 700;
            font-size: 16px;
            padding: 17px 40px;
            border-radius: 12px;
            transition: background 0.18s, transform 0.15s, box-shadow 0.18s;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-cta .arrow {
            display: inline-block;
            transition: transform 0.2s;
        }

        .btn-cta:hover {
            background: var(--blue-light);
            transform: translateY(-3px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.28);
        }

        .btn-cta:hover .arrow {
            transform: translateX(4px);
        }

        /* ─── Footer ──────────────────────────────────── */
        .footer {
            background: var(--navy);
            color: rgba(255, 255, 255, 0.7);
            padding: 64px 0 0;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr 1fr 1fr;
            gap: 48px;
            padding-bottom: 48px;
        }

        .footer-brand img {
    width: 100%;
    height: auto;
    object-fit: contain;
    margin-bottom: 12px;
    /* filter: brightness(0) invert(1); */
    max-width: 140px;
}

        .footer-brand-name {
            font-weight: 700;
            font-size: 16px;
            color: #fff;
            margin-bottom: 8px;
        }

        .footer-tagline {
            font-size: 13px;
            line-height: 1.65;
            color: rgba(255, 255, 255, 0.45);
        }

        .footer-col-title {
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: rgba(255, 255, 255, 0.4);
            margin-bottom: 16px;
        }

        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footer-links a {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.55);
            transition: color 0.18s;
        }

        .footer-links a:hover {
            color: #fff;
        }

        .footer-contact-item {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.55);
            margin-bottom: 10px;
        }

        .footer-bar {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding: 20px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .footer-copy {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.35);
        }

        .footer-arabic {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.35);
            direction: rtl;
        }


        /* --- Dashboard Showcase -------------------- */
        @keyframes donut-fill {
            from {
                stroke-dasharray: 0 264;
            }

            to {
                stroke-dasharray: 222 42;
            }
        }

        @keyframes trend-draw {
            to {
                stroke-dashoffset: 0;
            }
        }

        .section-showcase {
            padding: 96px 0 112px;
            background: var(--bg-page);
            position: relative;
            overflow: hidden;
        }

        .section-showcase::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24'%3E%3Ccircle cx='1' cy='1' r='1' fill='rgba(15%2C23%2C42%2C0.04)'/%3E%3C/svg%3E");
            background-size: 24px 24px;
            pointer-events: none;
        }

        .showcase-blob-1 {
            position: absolute;
            top: -80px;
            right: -160px;
            width: 560px;
            height: 560px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.07) 0%, transparent 65%);
            pointer-events: none;
        }

        .showcase-blob-2 {
            position: absolute;
            bottom: -100px;
            left: -120px;
            width: 480px;
            height: 480px;
            background: radial-gradient(circle, rgba(14, 165, 233, 0.05) 0%, transparent 65%);
            pointer-events: none;
        }

        .browser-frame {
            max-width: 1040px;
            margin: 0 auto;
            background: #fff;
            border-radius: 16px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-xl), 0 48px 96px rgba(15, 23, 42, 0.08);
            overflow: hidden;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .browser-frame:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-xl), 0 64px 120px rgba(15, 23, 42, 0.13);
        }

        .browser-chrome {
            background: #F1F5F9;
            border-bottom: 1px solid var(--border);
            padding: 11px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .browser-dots {
            display: flex;
            gap: 6px;
            flex-shrink: 0;
        }

        .browser-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .bd-red {
            background: #FF5F57;
        }

        .bd-yellow {
            background: #FEBC2E;
        }

        .bd-green {
            background: #28C840;
        }

        .browser-url {
            flex: 1;
            max-width: 380px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 5px 10px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            color: #64748B;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .dash-body {
            padding: 14px;
            background: #EEF2F7;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .dash-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            border-radius: 10px;
            padding: 10px 16px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-xs);
        }

        .dash-topbar-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dash-topbar-title {
            font-family: 'DM Sans', sans-serif;
            font-weight: 700;
            font-size: 13px;
            color: var(--navy);
        }

        .dash-topbar-right {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .dash-chip {
            font-family: 'JetBrains Mono', monospace;
            font-size: 10px;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 4px;
            border: 1px solid var(--border);
            color: var(--text-3);
            background: var(--bg-page);
            cursor: default;
        }

        .dash-chip.dchip-active {
            background: var(--blue);
            color: #fff;
            border-color: var(--blue);
        }

        .dash-export-btn {
            font-family: 'DM Sans', sans-serif;
            font-size: 10px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 5px;
            background: var(--blue-light);
            color: var(--blue);
            border: 1px solid var(--blue-border);
            cursor: default;
            margin-left: 2px;
        }

        .dash-kpi-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .kpi-card {
            background: #fff;
            border-radius: 10px;
            padding: 14px 16px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-xs);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .kpi-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .kpi-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--text-3);
            margin-bottom: 6px;
        }

        .kpi-val {
            font-family: 'JetBrains Mono', monospace;
            font-size: 24px;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 6px;
        }

        .kpi-val.kv-blue {
            color: var(--blue);
        }

        .kpi-val.kv-green {
            color: var(--green);
        }

        .kpi-val.kv-amber {
            color: var(--amber);
        }

        .kpi-val.kv-red {
            color: var(--red);
        }

        .kpi-tag {
            display: inline-flex;
            align-items: center;
            gap: 3px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 9px;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 4px;
        }

        .kpi-tag.kt-up {
            background: var(--green-light);
            color: var(--green);
        }

        .kpi-tag.kt-down {
            background: #FEE2E2;
            color: var(--red);
        }

        .kpi-tag.kt-flat {
            background: var(--amber-light);
            color: var(--amber);
        }

        .kpi-spark {
            height: 3px;
            background: var(--bg-alt);
            border-radius: 2px;
            margin-top: 8px;
            overflow: hidden;
        }

        .kpi-spark-fill {
            height: 100%;
            border-radius: 2px;
        }

        .dash-charts-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
        }

        .dcc {
            background: #fff;
            border-radius: 10px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-xs);
            padding: 14px 16px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .dcc:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .dcc-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 11px;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 1px;
        }

        .dcc-sub {
            font-size: 10px;
            color: var(--text-3);
            margin-bottom: 10px;
        }

        .fw-legend-row {
            display: flex;
            flex-direction: column;
            gap: 7px;
            flex: 1;
        }

        .fw-name {
            font-size: 10px;
            font-weight: 600;
            color: var(--text-2);
        }

        .fw-pct {
            font-family: 'JetBrains Mono', monospace;
            font-size: 10px;
            font-weight: 700;
            color: var(--blue);
        }

        .fw-track {
            height: 4px;
            background: var(--border);
            border-radius: 2px;
            overflow: hidden;
        }

        .fw-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--blue), var(--teal));
            border-radius: 2px;
        }

        .donut-arc {
            stroke-dasharray: 0 264;
            stroke-dashoffset: -66;
        }

        .browser-frame.is-visible .donut-arc {
            animation: donut-fill 1.4s cubic-bezier(0.4, 0, 0.2, 1) 0.5s forwards;
        }

        .trend-line {
            stroke-dasharray: 220;
            stroke-dashoffset: 220;
        }

        .browser-frame.is-visible .trend-line {
            animation: trend-draw 1.6s ease 0.6s forwards;
        }

        .dash-ctrl-strip {
            background: #fff;
            border-radius: 10px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-xs);
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .ctrl-strip-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--text-3);
            white-space: nowrap;
            flex-shrink: 0;
        }

        .ctrl-strip-bar {
            flex: 1;
            height: 8px;
            border-radius: 4px;
            background: var(--bg-alt);
            overflow: hidden;
            display: flex;
        }

        .ctrl-bar-seg {
            height: 100%;
        }

        .cseg-pass {
            background: var(--green);
        }

        .cseg-review {
            background: var(--amber);
        }

        .cseg-fail {
            background: var(--red);
        }

        .ctrl-strip-legend {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }

        .ctrl-strip-legend span {
            display: flex;
            align-items: center;
            gap: 5px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 10px;
            font-weight: 600;
            color: var(--text-2);
        }

        .ctrl-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .cdot-pass {
            background: var(--green);
        }

        .cdot-review {
            background: var(--amber);
        }

        .cdot-fail {
            background: var(--red);
        }

        .showcase-caption {
            text-align: center;
            margin-top: 28px;
            font-size: 14px;
            color: var(--text-3);
        }

        .showcase-caption a {
            color: var(--blue);
            font-weight: 600;
            margin-left: 4px;
        }

        .showcase-caption a:hover {
            text-decoration: underline;
        }

        /* ─── Aurora Hero ─────────────────────────────── */
        @keyframes aurora-drift {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(40px, -30px) scale(1.08); }
            66% { transform: translate(-20px, 20px) scale(0.95); }
        }
        @keyframes aurora-drift-alt {
            0%, 100% { transform: translate(0, 0) scale(1); }
            40% { transform: translate(-50px, 25px) scale(1.05); }
            70% { transform: translate(30px, -15px) scale(0.98); }
        }
        .aurora-orb {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            will-change: transform;
        }
        .aurora-1 {
            width: 700px; height: 700px;
            top: -200px; right: -100px;
            background: radial-gradient(circle, rgba(37,99,235,0.55) 0%, rgba(37,99,235,0.12) 48%, transparent 70%);
            filter: blur(88px);
            animation: aurora-drift 16s ease-in-out infinite;
        }
        .aurora-2 {
            width: 600px; height: 600px;
            bottom: -160px; left: -100px;
            background: radial-gradient(circle, rgba(14,165,233,0.45) 0%, rgba(14,165,233,0.08) 48%, transparent 70%);
            filter: blur(80px);
            animation: aurora-drift-alt 20s ease-in-out infinite;
        }
        .aurora-3 {
            width: 480px; height: 480px;
            top: 18%; left: 32%;
            background: radial-gradient(circle, rgba(124,58,237,0.32) 0%, transparent 65%);
            filter: blur(72px);
            animation: aurora-drift 28s ease-in-out infinite;
            animation-delay: -8s;
        }
        .aurora-4 {
            width: 320px; height: 320px;
            bottom: 12%; right: 28%;
            background: radial-gradient(circle, rgba(16,185,129,0.22) 0%, transparent 65%);
            filter: blur(60px);
            animation: aurora-drift-alt 18s ease-in-out infinite;
            animation-delay: -12s;
        }
        /* ─── Light Hero ──────────────────────────────── */
        .hero { background: linear-gradient(150deg, #EFF6FF 0%, #F8FAFC 45%, #FFFFFF 100%); }
        /* Subtle aurora blobs for light background */
        .aurora-1 { background: radial-gradient(circle, rgba(37,99,235,0.14) 0%, rgba(37,99,235,0.05) 48%, transparent 70%); }
        .aurora-2 { background: radial-gradient(circle, rgba(14,165,233,0.11) 0%, rgba(14,165,233,0.03) 48%, transparent 70%); }
        .aurora-3 { background: radial-gradient(circle, rgba(124,58,237,0.09) 0%, transparent 65%); }
        .aurora-4 { background: radial-gradient(circle, rgba(16,185,129,0.08) 0%, transparent 65%); }

        /* ─── Infographics Section ─────────────────────── */
        .section-infographics {
            padding: 96px 0;
            background: var(--bg-white);
            position: relative;
            overflow: hidden;
        }
        .section-infographics::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent 5%, #2563EB 30%, #7C3AED 55%, #0EA5E9 80%, transparent 95%);
        }
        .section-infographics::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(14,165,233,0.3), rgba(16,185,129,0.3), transparent);
        }
        .infographics-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .ig-panel {
            background: var(--bg-page);
            border: 1.5px solid var(--border);
            border-radius: 20px;
            padding: 24px;
            position: relative;
            overflow: hidden;
            transition: transform 0.22s, box-shadow 0.22s, border-color 0.22s;
        }
        .ig-panel:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(37,99,235,0.25);
        }
        .ig-panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }
        .ig-panel-title {
            font-family: 'DM Sans', sans-serif;
            font-weight: 700;
            font-size: 14px;
            color: var(--navy);
        }
        .ig-badge {
            font-family: 'JetBrains Mono', monospace;
            font-size: 10px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 100px;
            background: var(--green-light);
            color: var(--green);
            border: 1px solid rgba(5,150,105,0.25);
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .ig-badge::before {
            content: '';
            width: 5px; height: 5px;
            border-radius: 50%;
            background: var(--green);
            animation: pulse 1.6s ease-in-out infinite;
            display: block;
        }
        /* Heatmap legend */
        .hm-legend-item {
            display: flex;
            align-items: center;
            gap: 4px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 9px;
            font-weight: 600;
            color: var(--text-3);
        }
        .hm-swatch {
            width: 10px; height: 10px;
            border-radius: 2px;
            flex-shrink: 0;
        }
        /* Compliance rings */
        .rings-grid {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .ring-row {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .ring-info { flex: 1; }
        .ring-framework {
            font-family: 'DM Sans', sans-serif;
            font-weight: 700;
            font-size: 12px;
            color: var(--navy);
            margin-bottom: 2px;
        }
        .ring-sub {
            font-family: 'JetBrains Mono', monospace;
            font-size: 10px;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .ring-bar {
            height: 4px;
            background: var(--border);
            border-radius: 2px;
            overflow: hidden;
        }
        .ring-bar-fill {
            height: 100%;
            border-radius: 2px;
        }
        /* Ring arc animations */
        @keyframes ring-fill-91 {
            from { stroke-dasharray: 0 150.8; }
            to { stroke-dasharray: 137.2 13.6; }
        }
        @keyframes ring-fill-78 {
            from { stroke-dasharray: 0 150.8; }
            to { stroke-dasharray: 117.6 33.2; }
        }
        @keyframes ring-fill-85 {
            from { stroke-dasharray: 0 150.8; }
            to { stroke-dasharray: 128.2 22.6; }
        }
        @keyframes ring-fill-72 {
            from { stroke-dasharray: 0 150.8; }
            to { stroke-dasharray: 108.6 42.2; }
        }
        .ring-arc { stroke-dasharray: 0 150.8; }
        .section-infographics.rings-animated .ring-91 {
            animation: ring-fill-91 1.4s cubic-bezier(0.4,0,0.2,1) 0.1s forwards;
        }
        .section-infographics.rings-animated .ring-78 {
            animation: ring-fill-78 1.4s cubic-bezier(0.4,0,0.2,1) 0.3s forwards;
        }
        .section-infographics.rings-animated .ring-85 {
            animation: ring-fill-85 1.4s cubic-bezier(0.4,0,0.2,1) 0.5s forwards;
        }
        .section-infographics.rings-animated .ring-72 {
            animation: ring-fill-72 1.4s cubic-bezier(0.4,0,0.2,1) 0.7s forwards;
        }
        /* Control effectiveness */
        .ctrl-eff-big {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 8px;
            margin-bottom: 14px;
        }
        .ctrl-eff-item {
            text-align: center;
            padding: 14px 6px;
            border-radius: 12px;
        }
        .ctrl-eff-item.pass {
            background: linear-gradient(135deg, rgba(5,150,105,0.1), rgba(16,185,129,0.06));
            border: 1.5px solid rgba(5,150,105,0.22);
        }
        .ctrl-eff-item.review {
            background: linear-gradient(135deg, rgba(217,119,6,0.1), rgba(245,158,11,0.06));
            border: 1.5px solid rgba(217,119,6,0.22);
        }
        .ctrl-eff-item.fail {
            background: linear-gradient(135deg, rgba(220,38,38,0.1), rgba(239,68,68,0.06));
            border: 1.5px solid rgba(220,38,38,0.22);
        }
        .ctrl-eff-num {
            font-family: 'JetBrains Mono', monospace;
            font-size: 26px;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 3px;
        }
        .pass .ctrl-eff-num { color: var(--green); }
        .review .ctrl-eff-num { color: var(--amber); }
        .fail .ctrl-eff-num { color: var(--red); }
        .ctrl-eff-label {
            font-family: 'DM Sans', sans-serif;
            font-size: 10px;
            font-weight: 600;
            color: var(--text-2);
        }
        .ctrl-stacked-bar {
            height: 10px;
            border-radius: 5px;
            overflow: hidden;
            display: flex;
            margin-bottom: 10px;
        }
        .ctrl-stacked-seg { height: 100%; }
        .ctrl-eff-detail {
            border-top: 1px solid var(--border);
            padding-top: 12px;
            display: flex;
            flex-direction: column;
            gap: 7px;
        }
        .ctrl-eff-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .ctrl-eff-row-label {
            font-size: 11px;
            font-weight: 600;
            color: var(--text-2);
        }
        .ctrl-eff-pill {
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 4px;
        }

        /* ─── Feature Card Color Variants ──────────────── */
        .feature-card.fc-amber::before { background: linear-gradient(90deg, #D97706, #F59E0B); }
        .feature-card.fc-blue::before  { background: linear-gradient(90deg, #2563EB, #0EA5E9); }
        .feature-card.fc-violet::before{ background: linear-gradient(90deg, #7C3AED, #A78BFA); }
        .feature-card.fc-teal::before  { background: linear-gradient(90deg, #0EA5E9, #34D399); }
        .feature-card.fc-emerald::before{ background: linear-gradient(90deg, #059669, #34D399); }
        .feature-card.fc-rose::before  { background: linear-gradient(90deg, #E11D48, #FB7185); }

        .feature-card.fc-amber .feature-icon-wrap { background: #FEF3C7; border-color: rgba(217,119,6,0.28); }
        .feature-card.fc-violet .feature-icon-wrap { background: #EDE9FE; border-color: rgba(124,58,237,0.25); }
        .feature-card.fc-teal .feature-icon-wrap  { background: #E0F2FE; border-color: rgba(14,165,233,0.25); }
        .feature-card.fc-emerald .feature-icon-wrap{ background: #D1FAE5; border-color: rgba(5,150,105,0.22); }
        .feature-card.fc-rose .feature-icon-wrap  { background: #FFF1F2; border-color: rgba(225,29,72,0.2); }

        /* ─── Features — Equal 3-col Colorful Grid ────── */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        /* Always-visible top accent stripe */
        .feature-card::before { transform: scaleX(1); }

        /* Per-card tinted backgrounds */
        .feature-card.fc-amber  { background: linear-gradient(155deg, #FFFBEB 0%, #fff 55%); }
        .feature-card.fc-rose   { background: linear-gradient(155deg, #FFF1F2 0%, #fff 55%); }
        .feature-card.fc-violet { background: linear-gradient(155deg, #F5F3FF 0%, #fff 55%); }
        .feature-card.fc-blue   { background: linear-gradient(155deg, #EFF6FF 0%, #fff 55%); }
        .feature-card.fc-teal   { background: linear-gradient(155deg, #F0F9FF 0%, #fff 55%); }
        .feature-card.fc-emerald{ background: linear-gradient(155deg, #ECFDF5 0%, #fff 55%); }

        /* Larger icon wraps for visual weight */
        .feature-icon-wrap { width: 56px; height: 56px; border-radius: 14px; }
        .feature-icon-wrap img { width: 28px; height: 28px; }

        /* Colored hover borders per variant */
        .feature-card.fc-amber:hover  { border-color: rgba(217,119,6,0.35); }
        .feature-card.fc-rose:hover   { border-color: rgba(225,29,72,0.3); }
        .feature-card.fc-violet:hover { border-color: rgba(124,58,237,0.3); }
        .feature-card.fc-teal:hover   { border-color: rgba(14,165,233,0.3); }
        .feature-card.fc-emerald:hover{ border-color: rgba(5,150,105,0.3); }

        /* Audit card — normal card layout */
        .fc-bento-full { display: block; padding: 32px 28px; }
        .fc-bento-full .fc-visual { display: none; }

        /* ─── Stats Dark ───────────────────────────────── */
        .section-stats {
            background: linear-gradient(140deg, #050E1F 0%, #0B2447 55%, #0D2F5A 100%);
            border: none;
            padding: 72px 0;
        }
        .stat-item {
            border-right: 1px solid rgba(255,255,255,0.09);
        }
        .stat-item:last-child { border-right: none; }
        /* .stat-item::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 50% 0%, var(--stat-glow,rgba(37,99,235,0.12)) 0%, transparent 68%);
            pointer-events: none;
        } */
        .stat-item { position: relative; overflow: hidden; }
        .stat-item:nth-child(1) { --stat-glow: rgba(37,99,235,0.18); }
        .stat-item:nth-child(2) { --stat-glow: rgba(14,165,233,0.18); }
        .stat-item:nth-child(3) { --stat-glow: rgba(124,58,237,0.18); }
        .stat-item:nth-child(4) { --stat-glow: rgba(16,185,129,0.18); }
        .stat-num { position: relative; z-index: 1; }
        .stat-label { color: #fff; position: relative; z-index: 1; }
        .stat-item:nth-child(1) .stat-num { color: #60A5FA; }
        .stat-item:nth-child(2) .stat-num { color: #38BDF8; }
        .stat-item:nth-child(3) .stat-num { color: #A78BFA; }
        .stat-item:nth-child(4) .stat-num { color: #34D399; }

        /* ─── Colorful Trust Badges ────────────────────── */
        .trust-badge.tb-blue   { background:rgba(37,99,235,0.09);  border-color:rgba(37,99,235,0.3);  color:#2563EB; }
        .trust-badge.tb-violet { background:rgba(124,58,237,0.09); border-color:rgba(124,58,237,0.3); color:#7C3AED; }
        .trust-badge.tb-teal   { background:rgba(14,165,233,0.09); border-color:rgba(14,165,233,0.3); color:#0284C7; }
        .trust-badge.tb-emerald{ background:rgba(16,185,129,0.09); border-color:rgba(16,185,129,0.3); color:#059669; }
        .trust-badge.tb-amber  { background:rgba(217,119,6,0.09);  border-color:rgba(217,119,6,0.3);  color:#D97706; }
        .trust-badge.tb-rose   { background:rgba(225,29,72,0.09);  border-color:rgba(225,29,72,0.3);  color:#E11D48; }

        /* ─── How It Works — gradient circles ──────────── */
        .step-circle {
            background: linear-gradient(135deg, #2563EB 0%, #0EA5E9 100%) !important;
            color: #fff !important;
            border: none !important;
            box-shadow: 0 4px 18px rgba(37,99,235,0.42) !important;
        }
        .step:nth-child(2) .step-circle {
            background: linear-gradient(135deg, #7C3AED 0%, #2563EB 100%) !important;
            box-shadow: 0 4px 18px rgba(124,58,237,0.4) !important;
        }
        .step:nth-child(3) .step-circle {
            background: linear-gradient(135deg, #059669 0%, #0EA5E9 100%) !important;
            box-shadow: 0 4px 18px rgba(5,150,105,0.4) !important;
        }
        .step:hover .step-circle {
            filter: brightness(1.15);
            box-shadow: 0 8px 28px rgba(37,99,235,0.55) !important;
        }

        /* Infographics responsive */
        @media (max-width: 1024px) {
            .infographics-grid {
                grid-template-columns: 1fr 1fr;
            }
            .infographics-grid .ig-panel:last-child {
                grid-column: 1 / -1;
            }
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 768px) {
            .infographics-grid {
                grid-template-columns: 1fr;
            }
            .infographics-grid .ig-panel:last-child {
                grid-column: auto;
            }
        }

        /* ─── Responsive ──────────────────────────────── */
        @media (max-width: 1024px) {
            .hero-inner {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .hero-visual {
                display: none;
            }

            .hero {
                min-height: auto;
                padding: 100px 0 64px;
            }

            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }

            .why-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0;
            }

            .stat-item:nth-child(2) {
                border-right: none;
            }

            .stat-item:nth-child(3) {
                border-top: 1px solid var(--border);
            }

            .stat-item:nth-child(4) {
                border-top: 1px solid var(--border);
                border-right: none;
            }

            .stat-item {
                padding: 24px;
            }

            .dash-charts-row {
                grid-template-columns: 1fr 1fr;
            }

            .dash-kpi-row {
                grid-template-columns: repeat(2, 1fr);
            }

            .ctrl-strip-legend {
                display: none;
            }
        }

        @media (max-width: 768px) {

            .hero-stats-trio {
                width: 100%;
                justify-content: space-around;
            }

            .hst-item {
                padding: 0 12px;
            }

            .nav-links,
            .nav-cta {
                display: none;
            }

            .hamburger {
                display: flex;
            }

            .features-grid {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
            }
            .fc-bento-wide, .fc-bento-full { grid-column: auto; grid-row: auto; }

            .steps-row {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .steps-row::before {
                display: none;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .footer-bar {
                flex-direction: column;
                text-align: center;
            }

            .browser-chrome {
                padding: 10px 12px;
            }

            .dash-body {
                padding: 10px;
            }

            .dash-topbar-right {
                display: none;
            }

            .dash-charts-row {
                grid-template-columns: 1fr;
            }

            .kpi-val {
                font-size: 20px;
            }
        }
        /* ─── Hero Compliance Visualization ──────────────── */
        .compliance-viz {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0;
            width: 100%;
            max-width: 380px;
            min-width: 0;
            margin: 0 auto;
        }

        .cv-ring-wrap {
            position: relative;
            width: 100%;
            max-width: 360px;
            aspect-ratio: 1 / 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cv-ring-svg {
            filter: drop-shadow(0 0 30px rgba(52, 211, 153, 0.28));
            width: 100%;
            height: auto;
        }

        /* r=96, circumference ≈ 603.19 */
        /* r=90, circumference ≈ 565.49 */
        @keyframes cv-arc-spin {
            from { stroke-dasharray: 0 565.49; }
            to   { stroke-dasharray: 565.49 0; }
        }

        .cv-main-arc {
            stroke-dasharray: 0 565.49;
            animation: cv-arc-spin 2.4s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.3s both;
        }

        .cv-fw-badge {
            position: absolute;
            display: flex;
            align-items: center;
            gap: 5px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(52, 211, 153, 0.5);
            border-radius: 20px;
            padding: 6px 11px 6px 7px;
            font-size: 11px;
            font-weight: 600;
            color: var(--navy);
            white-space: nowrap;
            z-index: 4;
            box-shadow: 0 4px 20px rgba(37, 99, 235, 0.10), 0 1px 4px rgba(15, 23, 42, 0.08);
            opacity: 0;
        }

        .cv-check {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: linear-gradient(135deg, #34D399, #059669);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0;
            line-height: 1;
        }

        .cv-fw-tl { top: 20px; left: 2px; animation: cv-badge-in 0.45s ease 1.8s forwards, cv-float-up 7s ease-in-out 2.4s infinite; }
        .cv-fw-tr { top: 20px; right: 2px; animation: cv-badge-in 0.45s ease 2.05s forwards, cv-float-up 7s ease-in-out 2.65s infinite; }
        .cv-fw-bl { bottom: 16px; left: 2px; animation: cv-badge-in 0.45s ease 2.3s forwards, cv-float-dn 7s ease-in-out 2.9s infinite; }
        .cv-fw-br { bottom: 16px; right: 2px; animation: cv-badge-in 0.45s ease 2.55s forwards, cv-float-dn 7s ease-in-out 3.15s infinite; }

        @keyframes cv-badge-in {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        @keyframes cv-float-up {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-6px); }
        }

        @keyframes cv-float-dn {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(6px); }
        }

        .cv-cert-card {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #fff;
            border: 1px solid rgba(37, 99, 235, 0.18);
            border-radius: 14px;
            padding: 12px 16px;
            width: 100%;
            max-width: 300px;
            box-shadow: 0 8px 32px rgba(37, 99, 235, 0.10), 0 2px 8px rgba(15, 23, 42, 0.06);
            opacity: 0;
            animation: cv-badge-in 0.6s ease 3.0s forwards;
        }

        .cv-cert-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: linear-gradient(135deg, rgba(52, 211, 153, 0.2), rgba(5, 150, 105, 0.35));
            border: 1px solid rgba(52, 211, 153, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .cv-cert-text { flex: 1; min-width: 0; }

        .cv-cert-title {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: 13px;
            font-weight: 700;
            color: var(--navy);
            line-height: 1.2;
        }

        .cv-cert-sub {
            font-size: 10.5px;
            color: var(--text-3);
            margin-top: 2px;
        }

        .cv-cert-score {
            font-family: 'JetBrains Mono', monospace;
            font-size: 20px;
            font-weight: 700;
            color: #34D399;
            flex-shrink: 0;
        }

        .cv-stats-row {
            display: flex;
            align-items: stretch;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            width: 100%;
            max-width: 300px;
            box-shadow: 0 2px 12px rgba(15, 23, 42, 0.06);
            opacity: 0;
            animation: cv-badge-in 0.6s ease 3.3s forwards;
        }

        .cv-stat {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 8px;
        }

        .cv-stat + .cv-stat { border-left: 1px solid var(--border); }

        .cv-stat-val {
            font-family: 'JetBrains Mono', monospace;
            font-size: 20px;
            font-weight: 700;
            color: var(--blue);
            line-height: 1;
        }

        .cv-val-emerald { color: var(--green); }
        .cv-val-violet  { color: #7C3AED; }

        .cv-stat-lbl {
            font-size: 9.5px;
            font-weight: 500;
            color: var(--text-3);
            margin-top: 3px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .cv-live-pill {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 11px;
            font-weight: 500;
            color: var(--text-3);
            opacity: 0;
            animation: cv-badge-in 0.5s ease 3.6s forwards;
        }

        .cv-live-orb {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #34D399;
            position: relative;
            flex-shrink: 0;
        }

        .cv-live-orb::before {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 50%;
            background: rgba(52, 211, 153, 0.35);
            animation: cv-orb-pulse 2.2s ease-in-out infinite;
        }

        @keyframes cv-orb-pulse {
            0%, 100% { transform: scale(1); opacity: 0.6; }
            50%       { transform: scale(1.9); opacity: 0; }
        }
    </style>
</head>

<body>

    <!-- ─── Navbar ──────────────────────────────────── -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <div class="nav-inner">
                <a href="/" class="nav-brand">
                    <img src="/Images/EagleEyeLogo.png" alt="Eagle Eye Logo">
                    {{-- <div class="nav-brand-text">
                        <div class="brand-name">Eagle Eye</div>
                        <div class="brand-sub">GRC Platform</div>
                    </div> --}}
                </a>
                <div class="nav-center" id="navCenter">
                    <ul class="nav-links" id="navLinks">
                        <li><a href="#features">Features</a></li>
                        <li><a href="#how">How It Works</a></li>
                        <li><a href="#standards">Standards</a></li>
                        <li><a href="#about">About</a></li>
                    </ul>
                    <div class="nav-indicator" id="navIndicator"></div>
                </div>
                <a href="/login" class="nav-cta">Enter Platform &rarr;</a>
                <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
        <div class="mobile-drawer" id="mobileDrawer">
            <a href="#features">Features</a>
            <a href="#how">How It Works</a>
            <a href="#standards">Standards</a>
            <a href="#about">About</a>
            <a href="/login" class="mobile-cta">Enter Platform &rarr;</a>
        </div>
    </nav>

    <!-- ─── Hero ─────────────────────────────────────── -->
    <section class="hero" id="heroSection">
        <div class="aurora-orb aurora-1"></div>
        <div class="aurora-orb aurora-2"></div>
        <div class="aurora-orb aurora-3"></div>
        <div class="aurora-orb aurora-4"></div>
        <div class="container">
            <div class="hero-inner">
                <div class="hero-content">
                    {{-- <div class="hero-badge anim-1">
                        <span class="hero-badge-dot"></span>
                        ISO 27001 &middot; NCA ECC &middot; CITC &middot; PDPL
                    </div> --}}
                    <h1 class="hero-h1 anim-2">Out-of-the-Box<br>Regulatory Compliance, <span class="blue-text">Beyond GRC.</span></h1>
                    <p class="hero-body anim-4">Eagle Eye is a Saudi product focused on Saudi Arabia, providing complete
                        regulatory compliance in the shortest possible time. Designed, developed, and rolled out under
                        the strict supervision of experienced GRC consultants.</p>
                    <div class="hero-announce anim-5">
                        <svg class="hero-announce-icon" width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                            <path d="M7 1L13 7L7 13L1 7L7 1Z" stroke="#2563EB" stroke-width="1.5" stroke-linejoin="round"/>
                            <circle cx="7" cy="7" r="2" fill="#2563EB"/>
                        </svg>
                        <span class="hero-announce-text">Eagle Eye is now proudly part of Flexshield Solution, a subsidiary of Ethara Holding. This marks a significant strengthening of our ties with <strong><a href="https://ethraaholding.com.sa/en/" target="_blank" rel="noopener noreferrer">Ethara Holding</a></strong>. <a href="https://ethraaholding.com.sa/en/" target="_blank" rel="noopener noreferrer">https://ethraaholding.com.sa/en/</a></span>
                    </div>
                    <div class="hero-actions anim-5">
                        <a href="/login" class="btn-primary">Enter Platform &rarr;</a>
                        <a href="#features" class="btn-ghost">Explore Features &darr;</a>
                    </div>
                    {{-- <div class="hero-stats-trio anim-5" style="animation-delay:0.62s">
                        <div class="hst-item">
                            <div class="hst-val">150+</div>
                            <div class="hst-lbl">Controls</div>
                        </div>
                        <div class="hst-sep"></div>
                        <div class="hst-item">
                            <div class="hst-val">6+</div>
                            <div class="hst-lbl">Frameworks</div>
                        </div>
                        <div class="hst-sep"></div>
                        <div class="hst-item">
                            <div class="hst-val">100%</div>
                            <div class="hst-lbl">Saudi-Built</div>
                        </div>
                    </div> --}}
                </div>
                <div class="hero-visual">
                    <div class="compliance-viz">

                        <!-- Compliance seal ring -->
                        <div class="cv-ring-wrap">

                            <!-- Floating framework badges -->
                            {{-- <div class="cv-fw-badge cv-fw-tl">
                                <div class="cv-check">&#10003;</div>
                                ISO 27001 Ready
                            </div>
                            <div class="cv-fw-badge cv-fw-tr">
                                <div class="cv-check">&#10003;</div>
                                NCA ECC Aligned
                            </div>
                            <div class="cv-fw-badge cv-fw-bl">
                                <div class="cv-check">&#10003;</div>
                                PDPL Compliant
                            </div>
                            <div class="cv-fw-badge cv-fw-br">
                                <div class="cv-check">&#10003;</div>
                                CITC Framework
                            </div> --}}

                            <svg class="cv-ring-svg" viewBox="0 0 240 240"
                                role="img" aria-label="100% GRC Compliance Score">
                                <defs>
                                    <linearGradient id="cvRingGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#34D399"/>
                                        <stop offset="50%" stop-color="#10B981"/>
                                        <stop offset="100%" stop-color="#059669"/>
                                    </linearGradient>
                                    <filter id="cvGlowFilter" x="-25%" y="-25%" width="150%" height="150%">
                                        <feGaussianBlur stdDeviation="5" result="blur"/>
                                        <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
                                    </filter>
                                    <path id="cvTopArc" d="M 13 120 A 107 107 0 0 1 227 120"/>
                                    <path id="cvBotArc" d="M 13 120 A 107 107 0 0 0 227 120"/>
                                </defs>

                                <circle cx="120" cy="120" r="117" fill="none"
                                    stroke="rgba(52,211,153,0.12)" stroke-width="1" stroke-dasharray="2 7"/>
                                <circle cx="120" cy="120" r="111" fill="none"
                                    stroke="rgba(52,211,153,0.5)" stroke-width="1.5"/>

                                <text x="120" y="14" text-anchor="middle" font-size="10" fill="rgba(52,211,153,0.7)">✦</text>
                                <text x="120" y="236" text-anchor="middle" font-size="10" fill="rgba(52,211,153,0.7)">✦</text>
                                <text x="232" y="125" text-anchor="middle" font-size="9" fill="rgba(52,211,153,0.7)">✦</text>
                                <text x="8" y="125" text-anchor="middle" font-size="9" fill="rgba(52,211,153,0.7)">✦</text>

                                <text font-family="'Bricolage Grotesque', sans-serif" font-size="9"
                                    font-weight="700" fill="rgba(52,211,153,0.72)" letter-spacing="2.5">
                                </text>
                                <text font-family="'Bricolage Grotesque', sans-serif" font-size="9"
                                    font-weight="700" fill="rgba(52,211,153,0.72)" letter-spacing="2.5">
                                    <textPath href="#cvBotArc" startOffset="50%" text-anchor="middle" side="right">CERTIFIED · 100% COMPLIANT ·</textPath>
                                </text>

                                <circle cx="120" cy="120" r="90" fill="none"
                                    stroke="rgba(52,211,153,0.1)" stroke-width="12"/>
                                <circle cx="120" cy="120" r="90" fill="none"
                                    stroke="url(#cvRingGrad)" stroke-width="12" stroke-linecap="round"
                                    class="cv-main-arc" transform="rotate(-90 120 120)"
                                    filter="url(#cvGlowFilter)"/>
                                <circle cx="120" cy="120" r="72" fill="none"
                                    stroke="rgba(52,211,153,0.12)" stroke-width="1" stroke-dasharray="4 8"/>
                                <circle cx="120" cy="120" r="58" fill="none"
                                    stroke="rgba(52,211,153,0.06)" stroke-width="1"/>

                                <text x="120" y="108" text-anchor="middle"
                                    font-family="'Bricolage Grotesque', sans-serif"
                                    font-size="48" font-weight="800" fill="#34D399">100%</text>
                                <text x="120" y="131" text-anchor="middle"
                                    font-family="'DM Sans', sans-serif"
                                    font-size="10" font-weight="600"
                                    fill="rgba(11,36,71,0.52)" letter-spacing="2.8">FULLY COMPLIANT</text>
                                <text x="120" y="150" text-anchor="middle"
                                    font-family="'JetBrains Mono', monospace"
                                    font-size="8.5" fill="rgba(5,150,105,0.72)" letter-spacing="1.5">GRC VERIFIED ✓</text>
                            </svg>
                        </div>

                        <!-- Certification card -->
                        {{-- <div class="cv-cert-card">
                            <div class="cv-cert-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                                        stroke="#059669" stroke-width="2" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="cv-cert-text">
                                <div class="cv-cert-title">Saudi GRC Platform</div>
                                <div class="cv-cert-sub">NCA &middot; PDPL &middot; ISO 27001 &middot; CITC</div>
                            </div>
                            <div class="cv-cert-score">100%</div>
                        </div> --}}

                        <!-- Live metrics row -->
                        {{-- <div class="cv-stats-row">
                            <div class="cv-stat">
                                <div class="cv-stat-val">84%</div>
                                <div class="cv-stat-lbl">Compliance</div>
                            </div>
                            <div class="cv-stat">
                                <div class="cv-stat-val cv-val-emerald">89</div>
                                <div class="cv-stat-lbl">Controls</div>
                            </div>
                            <div class="cv-stat">
                                <div class="cv-stat-val cv-val-violet">14</div>
                                <div class="cv-stat-lbl">Risks</div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Dashboard Showcase -->
    <section class="section-showcase" id="showcase">
        <div class="showcase-blob-1" aria-hidden="true"></div>
        <div class="showcase-blob-2" aria-hidden="true"></div>
        <div class="container">
            <div class="section-header">
                <div class="section-eyebrow reveal">Product Preview</div>
                <h2 class="section-title reveal reveal-delay-1">Every Insight.<br>One Command Center.</h2>
                <p class="section-sub reveal reveal-delay-2">Live compliance scores, risk distribution, and control
                    status — all in one view, designed for CISOs and auditors who act on data, not guesswork.</p>
            </div>

            <div class="browser-frame reveal reveal-delay-2">
                <!-- Browser chrome bar -->
                <div class="browser-chrome">
                    <div class="browser-dots">
                        <span class="browser-dot bd-red"></span>
                        <span class="browser-dot bd-yellow"></span>
                        <span class="browser-dot bd-green"></span>
                    </div>
                    <div class="browser-url">
                        <svg width="10" height="11" viewBox="0 0 10 11" fill="none" aria-hidden="true">
                            <rect x="1.5" y="4.5" width="7" height="6" rx="1" stroke="#059669"
                                stroke-width="1" />
                            <path d="M3 4.5V3a2 2 0 014 0v1.5" stroke="#059669" stroke-width="1" fill="none" />
                        </svg>
                        grc.test / dashboard
                    </div>
                    <div style="flex:1"></div>
                </div>

                <!-- Dashboard body -->
                <div class="dash-body">
                    <!-- Top bar -->
                    <div class="dash-topbar">
                        <div class="dash-topbar-left">
                            <span class="dash-topbar-title">GRC Overview</span>
                            <span class="live-badge"><span class="live-dot"></span>Live</span>
                        </div>
                        <div class="dash-topbar-right">
                            {{-- <span class="dash-chip dchip-active">30D</span>
                            <span class="dash-chip">90D</span>
                            <span class="dash-chip">YTD</span> --}}
                            <span class="dash-export-btn">Export PDF &darr;</span>
                        </div>
                    </div>

                    <!-- KPI Row -->
                    <div class="dash-kpi-row">
                        <div class="kpi-card">
                            <div class="kpi-label">Compliance Score</div>
                            <div class="kpi-val kv-blue">84%</div>
                            <span class="kpi-tag kt-up">&#x2191; +6% this month</span>
                            <div class="kpi-spark">
                                <div class="kpi-spark-fill" style="width:84%;background:var(--blue);"></div>
                            </div>
                        </div>
                        <div class="kpi-card">
                            <div class="kpi-label">Open Risks</div>
                            <div class="kpi-val kv-amber">31</div>
                            <span class="kpi-tag kt-down">&#x2193; &minus;4 this week</span>
                            <div class="kpi-spark">
                                <div class="kpi-spark-fill" style="width:52%;background:var(--amber);"></div>
                            </div>
                        </div>
                        <div class="kpi-card">
                            <div class="kpi-label">Controls Passed</div>
                            <div class="kpi-val kv-green">89</div>
                            <span class="kpi-tag kt-up">&#x2191; 74% pass rate</span>
                            <div class="kpi-spark">
                                <div class="kpi-spark-fill" style="width:74%;background:var(--green);"></div>
                            </div>
                        </div>
                        <div class="kpi-card">
                            <div class="kpi-label">Audit Findings</div>
                            <div class="kpi-val kv-red">7</div>
                            <span class="kpi-tag kt-flat">&#x2192; 2 critical open</span>
                            <div class="kpi-spark">
                                <div class="kpi-spark-fill" style="width:18%;background:var(--red);"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Row -->
                    <div class="dash-charts-row">

                        <!-- Chart 1: Compliance Donut + Framework Bars -->
                        <div class="dcc">
                            <div class="dcc-title">Compliance Score</div>
                            <div class="dcc-sub">Across all active frameworks</div>
                            <div style="display:flex;align-items:center;gap:14px;">
                                <svg viewBox="0 0 110 110" width="96" height="96" style="flex-shrink:0;"
                                    role="img" aria-label="Donut chart: 84% compliance">
                                    <defs>
                                        <linearGradient id="dGrad" x1="0%" y1="0%" x2="100%"
                                            y2="100%">
                                            <stop offset="0%" stop-color="#2563EB" />
                                            <stop offset="100%" stop-color="#0EA5E9" />
                                        </linearGradient>
                                    </defs>
                                    <circle cx="55" cy="55" r="42" fill="none" stroke="#E2E8F0"
                                        stroke-width="10" />
                                    <circle cx="55" cy="55" r="42" fill="none" stroke="url(#dGrad)"
                                        stroke-width="10" stroke-linecap="round" class="donut-arc" />
                                    <text x="55" y="51" text-anchor="middle" font-family="JetBrains Mono,monospace"
                                        font-size="17" font-weight="700" fill="#0F172A">84%</text>
                                    <text x="55" y="63" text-anchor="middle" font-family="DM Sans,sans-serif"
                                        font-size="8" fill="#94A3B8">COMPLIANT</text>
                                </svg>
                                <div class="fw-legend-row">
                                    <div>
                                        <div style="display:flex;justify-content:space-between;">
                                            <span class="fw-name">NCA ECC</span><span class="fw-pct">78%</span>
                                        </div>
                                        <div class="fw-track">
                                            <div class="fw-fill" style="width:78%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div style="display:flex;justify-content:space-between;">
                                            <span class="fw-name">SAMA-CSF</span><span class="fw-pct">91%</span>
                                        </div>
                                        <div class="fw-track">
                                            <div class="fw-fill" style="width:91%"></div>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <div style="display:flex;justify-content:space-between;">
                                            <span class="fw-name">OSMACC</span><span class="fw-pct">85%</span>
                                        </div>
                                        <div class="fw-track">
                                            <div class="fw-fill" style="width:85%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div style="display:flex;justify-content:space-between;">
                                            <span class="fw-name">PDPL</span><span class="fw-pct">72%</span>
                                        </div>
                                        <div class="fw-track">
                                            <div class="fw-fill" style="width:72%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Chart 2: Risk Distribution Horizontal Bars -->
                        <div class="dcc">
                            <div class="dcc-title">Risk Distribution</div>
                            <div class="dcc-sub">By severity &mdash; 134 total</div>
                            <svg viewBox="0 0 200 112" width="100%" role="img"
                                aria-label="Horizontal bar chart: risk distribution by severity">
                                <!-- Grid verticals -->
                                <line x1="62" y1="0" x2="62" y2="102" stroke="#F1F5F9"
                                    stroke-width="1" />
                                <line x1="112" y1="0" x2="112" y2="102" stroke="#F1F5F9"
                                    stroke-width="1" />
                                <line x1="162" y1="0" x2="162" y2="102" stroke="#F1F5F9"
                                    stroke-width="1" />
                                <!-- Critical: 8/62*130=16.7 -->
                                <text x="58" y="17" text-anchor="end" font-family="DM Sans,sans-serif" font-size="9"
                                    font-weight="600" fill="#475569">Critical</text>
                                <rect x="62" y="7" width="17" height="13" rx="3" fill="#DC2626" />
                                <text x="83" y="17" font-family="JetBrains Mono,monospace" font-size="9"
                                    font-weight="700" fill="#DC2626">8</text>
                                <!-- High: 23/62*130=48.2 -->
                                <text x="58" y="40" text-anchor="end" font-family="DM Sans,sans-serif" font-size="9"
                                    font-weight="600" fill="#475569">High</text>
                                <rect x="62" y="30" width="48" height="13" rx="3" fill="#D97706" />
                                <text x="114" y="40" font-family="JetBrains Mono,monospace" font-size="9"
                                    font-weight="700" fill="#D97706">23</text>
                                <!-- Medium: 41/62*130=86 -->
                                <text x="58" y="63" text-anchor="end" font-family="DM Sans,sans-serif" font-size="9"
                                    font-weight="600" fill="#475569">Medium</text>
                                <rect x="62" y="53" width="86" height="13" rx="3" fill="#2563EB" />
                                <text x="152" y="63" font-family="JetBrains Mono,monospace" font-size="9"
                                    font-weight="700" fill="#2563EB">41</text>
                                <!-- Low: 62/62*130=130 -->
                                <text x="58" y="86" text-anchor="end" font-family="DM Sans,sans-serif" font-size="9"
                                    font-weight="600" fill="#475569">Low</text>
                                <rect x="62" y="76" width="130" height="13" rx="3" fill="#059669" />
                                <text x="196" y="86" font-family="JetBrains Mono,monospace" font-size="9"
                                    font-weight="700" fill="#059669">62</text>
                                <!-- X axis -->
                                <line x1="62" y1="102" x2="200" y2="102" stroke="#E2E8F0"
                                    stroke-width="1" />
                                <text x="62" y="110" text-anchor="middle" font-family="JetBrains Mono,monospace"
                                    font-size="7" fill="#94A3B8">0</text>
                                <text x="112" y="110" text-anchor="middle" font-family="JetBrains Mono,monospace"
                                    font-size="7" fill="#94A3B8">30</text>
                                <text x="162" y="110" text-anchor="middle" font-family="JetBrains Mono,monospace"
                                    font-size="7" fill="#94A3B8">60</text>
                            </svg>
                        </div>

                        <!-- Chart 3: 30-Day Compliance Trend -->
                        <div class="dcc">
                            <div class="dcc-title">Compliance Trend</div>
                            <div class="dcc-sub">30-day rolling score</div>
                            <svg viewBox="0 0 220 82" width="100%" role="img"
                                aria-label="Line chart: 30-day compliance trend from 71% to 87%">
                                <defs>
                                    <linearGradient id="tFill" x1="0" y1="0" x2="0"
                                        y2="1">
                                        <stop offset="0%" stop-color="#2563EB" stop-opacity="0.14" />
                                        <stop offset="100%" stop-color="#2563EB" stop-opacity="0" />
                                    </linearGradient>
                                </defs>
                                <!-- Y axis labels -->
                                <text x="6" y="9" font-family="JetBrains Mono,monospace" font-size="7"
                                    fill="#94A3B8">90%</text>
                                <text x="6" y="29" font-family="JetBrains Mono,monospace" font-size="7"
                                    fill="#94A3B8">80%</text>
                                <text x="6" y="49" font-family="JetBrains Mono,monospace" font-size="7"
                                    fill="#94A3B8">70%</text>
                                <!-- Grid lines -->
                                <line x1="28" y1="6" x2="218" y2="6" stroke="#F1F5F9"
                                    stroke-width="1" />
                                <line x1="28" y1="26" x2="218" y2="26" stroke="#F1F5F9"
                                    stroke-width="1" />
                                <line x1="28" y1="46" x2="218" y2="46" stroke="#F1F5F9"
                                    stroke-width="1" />
                                <line x1="28" y1="66" x2="218" y2="66" stroke="#E2E8F0"
                                    stroke-width="1" />
                                <!-- Area fill (y_px = 66 - (v-60)*2, x step=21, start x=28)
                                     Values: 71,73,69,75,78,74,80,83,85,87
                                     y:       44,40,48,36,30,38,26,20,16,12 -->
                                <polygon
                                    points="28,66 28,44 49,40 70,48 91,36 112,30 133,38 154,26 175,20 196,16 217,12 217,66"
                                    fill="url(#tFill)" />
                                <!-- Trend line -->
                                <polyline points="28,44 49,40 70,48 91,36 112,30 133,38 154,26 175,20 196,16 217,12"
                                    fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="trend-line" />
                                <!-- End dot -->
                                <circle cx="217" cy="12" r="5" fill="#EFF6FF" stroke="#2563EB"
                                    stroke-width="1.5" />
                                <circle cx="217" cy="12" r="2.5" fill="#2563EB" />
                                <text x="210" y="8" text-anchor="end" font-family="JetBrains Mono,monospace"
                                    font-size="8" font-weight="700" fill="#2563EB">87%</text>
                                <!-- X axis labels -->
                                <text x="28" y="76" text-anchor="middle" font-family="JetBrains Mono,monospace"
                                    font-size="7" fill="#94A3B8">Day 1</text>
                                <text x="122" y="76" text-anchor="middle" font-family="JetBrains Mono,monospace"
                                    font-size="7" fill="#94A3B8">Day 15</text>
                                <text x="217" y="76" text-anchor="middle" font-family="JetBrains Mono,monospace"
                                    font-size="7" fill="#94A3B8">Day 30</text>
                            </svg>
                        </div>
                    </div><!-- /.dash-charts-row -->

                    <!-- Control Status Strip -->
                    <div class="dash-ctrl-strip">
                        <span class="ctrl-strip-label">Control Status</span>
                        <div class="ctrl-strip-bar" role="img"
                            aria-label="Control status: 89 passed, 28 in review, 7 failed">
                            <div class="ctrl-bar-seg cseg-pass" style="width:73.6%;"></div>
                            <div class="ctrl-bar-seg cseg-review" style="width:23.1%;"></div>
                            <div class="ctrl-bar-seg cseg-fail" style="width:5.8%;"></div>
                        </div>
                        <div class="ctrl-strip-legend">
                            <span><span class="ctrl-dot cdot-pass"></span>89 Passed</span>
                            <span><span class="ctrl-dot cdot-review"></span>28 In Review</span>
                            <span><span class="ctrl-dot cdot-fail"></span>7 Failed</span>
                        </div>
                    </div>
                </div><!-- /.dash-body -->
            </div><!-- /.browser-frame -->

            <p class="showcase-caption reveal">
                Built for Saudi Arabia's regulatory compliance &mdash; SAMA-CSF, NCA ECC, DCC, and more.
                <a href="/login">Explore the platform &rarr;</a>
            </p>
        </div>
    </section>

    <!-- ─── GRC Infographics ─────────────────────────── -->
    <section class="section-infographics" id="infographics">
        <div class="container">
            <div class="section-header">
                <div class="section-eyebrow reveal">GRC Intelligence</div>
                <h2 class="section-title reveal reveal-delay-1">Data That Drives Decisions</h2>
                <p class="section-sub reveal reveal-delay-2">Real-time visibility across your entire risk and compliance landscape — all from one unified platform.</p>
            </div>
            <div class="infographics-grid">

                <!-- Panel 1: Risk Heatmap -->
                <div class="ig-panel reveal">
                    <div class="ig-panel-header">
                        <span class="ig-panel-title">Risk Heatmap</span>
                        <span class="ig-badge">Live</span>
                    </div>
                    <div style="display:flex;gap:4px;align-items:flex-start;">
                        <!-- Y-axis (likelihood) -->
                        <div style="display:flex;flex-direction:column;justify-content:space-around;height:172px;padding:4px 0;gap:0;flex-shrink:0;">
                            <span style="font-size:8px;color:#94A3B8;font-family:'JetBrains Mono',monospace;width:32px;text-align:right;line-height:33px;">V.Hi</span>
                            <span style="font-size:8px;color:#94A3B8;font-family:'JetBrains Mono',monospace;width:32px;text-align:right;line-height:33px;">Hi</span>
                            <span style="font-size:8px;color:#94A3B8;font-family:'JetBrains Mono',monospace;width:32px;text-align:right;line-height:33px;">Med</span>
                            <span style="font-size:8px;color:#94A3B8;font-family:'JetBrains Mono',monospace;width:32px;text-align:right;line-height:33px;">Low</span>
                            <span style="font-size:8px;color:#94A3B8;font-family:'JetBrains Mono',monospace;width:32px;text-align:right;line-height:33px;">V.Lo</span>
                        </div>
                        <div style="flex:1;">
                            <!-- X-axis labels -->
                            <div style="display:flex;margin-bottom:3px;padding:0 2px;">
                                <span style="flex:1;font-size:8px;color:#94A3B8;font-family:'JetBrains Mono',monospace;text-align:center;">Low</span>
                                <span style="flex:1;font-size:8px;color:#94A3B8;font-family:'JetBrains Mono',monospace;text-align:center;">Med</span>
                                <span style="flex:1;font-size:8px;color:#94A3B8;font-family:'JetBrains Mono',monospace;text-align:center;">High</span>
                                <span style="flex:1;font-size:8px;color:#94A3B8;font-family:'JetBrains Mono',monospace;text-align:center;">V.Hi</span>
                                <span style="flex:1;font-size:8px;color:#94A3B8;font-family:'JetBrains Mono',monospace;text-align:center;">Crit</span>
                            </div>
                            <!-- 5×5 heatmap: row=likelihood top→VHigh, col=impact left→Low -->
                            <svg viewBox="0 0 205 165" width="100%" role="img" aria-label="5x5 risk heatmap: likelihood vs impact">
                                <defs>
                                    <filter id="hm-shadow">
                                        <feDropShadow dx="0" dy="1" stdDeviation="1" flood-opacity="0.08"/>
                                    </filter>
                                </defs>
                                <!-- Row 1 top = Very High likelihood -->
                                <rect x="1"   y="1"  width="37" height="31" rx="5" fill="#FCA5A5" filter="url(#hm-shadow)"/>
                                <rect x="42"  y="1"  width="37" height="31" rx="5" fill="#EF4444" filter="url(#hm-shadow)"/>
                                <rect x="83"  y="1"  width="37" height="31" rx="5" fill="#DC2626" filter="url(#hm-shadow)"/>
                                <rect x="124" y="1"  width="37" height="31" rx="5" fill="#B91C1C" filter="url(#hm-shadow)"/>
                                <rect x="165" y="1"  width="37" height="31" rx="5" fill="#7F1D1D" filter="url(#hm-shadow)"/>
                                <!-- Row 2 = High likelihood -->
                                <rect x="1"   y="34" width="37" height="31" rx="5" fill="#FDE68A" filter="url(#hm-shadow)"/>
                                <rect x="42"  y="34" width="37" height="31" rx="5" fill="#FCA5A5" filter="url(#hm-shadow)"/>
                                <rect x="83"  y="34" width="37" height="31" rx="5" fill="#EF4444" filter="url(#hm-shadow)"/>
                                <rect x="124" y="34" width="37" height="31" rx="5" fill="#DC2626" filter="url(#hm-shadow)"/>
                                <rect x="165" y="34" width="37" height="31" rx="5" fill="#B91C1C" filter="url(#hm-shadow)"/>
                                <!-- Row 3 = Medium likelihood -->
                                <rect x="1"   y="67" width="37" height="31" rx="5" fill="#D1FAE5" filter="url(#hm-shadow)"/>
                                <rect x="42"  y="67" width="37" height="31" rx="5" fill="#FEF9C3" filter="url(#hm-shadow)"/>
                                <rect x="83"  y="67" width="37" height="31" rx="5" fill="#FDE68A" filter="url(#hm-shadow)"/>
                                <rect x="124" y="67" width="37" height="31" rx="5" fill="#FCA5A5" filter="url(#hm-shadow)"/>
                                <rect x="165" y="67" width="37" height="31" rx="5" fill="#EF4444" filter="url(#hm-shadow)"/>
                                <!-- Row 4 = Low likelihood -->
                                <rect x="1"   y="100" width="37" height="31" rx="5" fill="#D1FAE5" filter="url(#hm-shadow)"/>
                                <rect x="42"  y="100" width="37" height="31" rx="5" fill="#D1FAE5" filter="url(#hm-shadow)"/>
                                <rect x="83"  y="100" width="37" height="31" rx="5" fill="#FEF9C3" filter="url(#hm-shadow)"/>
                                <rect x="124" y="100" width="37" height="31" rx="5" fill="#FDE68A" filter="url(#hm-shadow)"/>
                                <rect x="165" y="100" width="37" height="31" rx="5" fill="#FCA5A5" filter="url(#hm-shadow)"/>
                                <!-- Row 5 bottom = Very Low likelihood -->
                                <rect x="1"   y="133" width="37" height="31" rx="5" fill="#D1FAE5" filter="url(#hm-shadow)"/>
                                <rect x="42"  y="133" width="37" height="31" rx="5" fill="#D1FAE5" filter="url(#hm-shadow)"/>
                                <rect x="83"  y="133" width="37" height="31" rx="5" fill="#D1FAE5" filter="url(#hm-shadow)"/>
                                <rect x="124" y="133" width="37" height="31" rx="5" fill="#FEF9C3" filter="url(#hm-shadow)"/>
                                <rect x="165" y="133" width="37" height="31" rx="5" fill="#D1FAE5" filter="url(#hm-shadow)"/>
                                <!-- Risk count labels -->
                                <text x="19.5" y="21" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#DC2626">0</text>
                                <text x="60.5" y="21" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#fff">1</text>
                                <text x="101.5" y="21" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#fff">2</text>
                                <text x="142.5" y="21" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#fff">4</text>
                                <text x="183.5" y="21" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#fff">4</text>
                                <text x="19.5" y="54" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#374151">1</text>
                                <text x="60.5" y="54" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#DC2626">3</text>
                                <text x="101.5" y="54" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#fff">5</text>
                                <text x="142.5" y="54" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#fff">3</text>
                                <text x="183.5" y="54" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#fff">1</text>
                                <text x="19.5" y="87" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#374151">3</text>
                                <text x="60.5" y="87" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#374151">8</text>
                                <text x="101.5" y="87" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#374151">4</text>
                                <text x="142.5" y="87" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#DC2626">2</text>
                                <text x="183.5" y="87" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#fff">0</text>
                                <text x="19.5" y="120" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#374151">5</text>
                                <text x="60.5" y="120" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#374151">3</text>
                                <text x="101.5" y="120" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#374151">2</text>
                                <text x="142.5" y="120" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#374151">1</text>
                                <text x="183.5" y="120" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#DC2626">0</text>
                                <text x="19.5" y="153" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#374151">2</text>
                                <text x="60.5" y="153" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#374151">1</text>
                                <text x="101.5" y="153" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#374151">0</text>
                                <text x="142.5" y="153" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#374151">0</text>
                                <text x="183.5" y="153" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="11" font-weight="700" fill="#374151">0</text>
                            </svg>
                        </div>
                    </div>
                    <!-- Legend -->
                    <div style="display:flex;align-items:center;gap:8px;justify-content:center;margin-top:10px;flex-wrap:wrap;">
                        <div class="hm-legend-item"><div class="hm-swatch" style="background:#D1FAE5;"></div>Low</div>
                        <div class="hm-legend-item"><div class="hm-swatch" style="background:#FEF9C3;"></div>Medium</div>
                        <div class="hm-legend-item"><div class="hm-swatch" style="background:#FDE68A;"></div>High</div>
                        <div class="hm-legend-item"><div class="hm-swatch" style="background:#EF4444;"></div>V.High</div>
                        <div class="hm-legend-item"><div class="hm-swatch" style="background:#7F1D1D;"></div>Critical</div>
                    </div>
                    <div style="margin-top:7px;text-align:center;">
                        <span style="font-family:'JetBrains Mono',monospace;font-size:8px;color:#94A3B8;letter-spacing:0.04em;">Y = Likelihood · X = Impact · numbers = risk count</span>
                    </div>
                </div>

                <!-- Panel 2: Framework Compliance Rings -->
                <div class="ig-panel reveal reveal-delay-1">
                    <div class="ig-panel-header">
                        <span class="ig-panel-title">Framework Coverage</span>
                    </div>
                    <div class="rings-grid">
                        <!-- SAMA-CSF 91% blue -->
                        <div class="ring-row">
                            <svg viewBox="0 0 60 60" width="52" height="52" style="flex-shrink:0;" role="img" aria-label="SAMA-CSF 91%">
                                <defs><linearGradient id="rg1" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#2563EB"/><stop offset="100%" stop-color="#60A5FA"/></linearGradient></defs>
                                <circle cx="30" cy="30" r="24" fill="none" stroke="#DBEAFE" stroke-width="6"/>
                                <circle cx="30" cy="30" r="24" fill="none" stroke="url(#rg1)" stroke-width="6" stroke-linecap="round" class="ring-arc ring-91" transform="rotate(-90 30 30)"/>
                                <text x="30" y="28" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="9" font-weight="700" fill="#1D4ED8">91%</text>
                            </svg>
                            <div class="ring-info">
                                <div class="ring-framework">SAMA-CSF</div>
                                <div class="ring-sub" style="color:#2563EB;">91% compliant</div>
                                <div class="ring-bar"><div class="ring-bar-fill" style="width:91%;background:linear-gradient(90deg,#2563EB,#60A5FA);"></div></div>
                            </div>
                        </div>
                        <!-- NCA ECC 78% violet -->
                        <div class="ring-row">
                            <svg viewBox="0 0 60 60" width="52" height="52" style="flex-shrink:0;" role="img" aria-label="NCA ECC 78%">
                                <defs><linearGradient id="rg2" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#7C3AED"/><stop offset="100%" stop-color="#A78BFA"/></linearGradient></defs>
                                <circle cx="30" cy="30" r="24" fill="none" stroke="#EDE9FE" stroke-width="6"/>
                                <circle cx="30" cy="30" r="24" fill="none" stroke="url(#rg2)" stroke-width="6" stroke-linecap="round" class="ring-arc ring-78" transform="rotate(-90 30 30)"/>
                                <text x="30" y="28" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="9" font-weight="700" fill="#5B21B6">78%</text>
                            </svg>
                            <div class="ring-info">
                                <div class="ring-framework">NCA ECC</div>
                                <div class="ring-sub" style="color:#7C3AED;">78% compliant</div>
                                <div class="ring-bar"><div class="ring-bar-fill" style="width:78%;background:linear-gradient(90deg,#7C3AED,#A78BFA);"></div></div>
                            </div>
                        </div>
                        <!-- PDPL 85% emerald -->
                        <div class="ring-row">
                            <svg viewBox="0 0 60 60" width="52" height="52" style="flex-shrink:0;" role="img" aria-label="PDPL 85%">
                                <defs><linearGradient id="rg3" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#059669"/><stop offset="100%" stop-color="#34D399"/></linearGradient></defs>
                                <circle cx="30" cy="30" r="24" fill="none" stroke="#D1FAE5" stroke-width="6"/>
                                <circle cx="30" cy="30" r="24" fill="none" stroke="url(#rg3)" stroke-width="6" stroke-linecap="round" class="ring-arc ring-85" transform="rotate(-90 30 30)"/>
                                <text x="30" y="28" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="9" font-weight="700" fill="#065F46">85%</text>
                            </svg>
                            <div class="ring-info">
                                <div class="ring-framework">PDPL</div>
                                <div class="ring-sub" style="color:#059669;">85% compliant</div>
                                <div class="ring-bar"><div class="ring-bar-fill" style="width:85%;background:linear-gradient(90deg,#059669,#34D399);"></div></div>
                            </div>
                        </div>
                        <!-- OSMACC 72% amber -->
                        <div class="ring-row">
                            <svg viewBox="0 0 60 60" width="52" height="52" style="flex-shrink:0;" role="img" aria-label="OSMACC 72%">
                                <defs><linearGradient id="rg4" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#D97706"/><stop offset="100%" stop-color="#FCD34D"/></linearGradient></defs>
                                <circle cx="30" cy="30" r="24" fill="none" stroke="#FEF3C7" stroke-width="6"/>
                                <circle cx="30" cy="30" r="24" fill="none" stroke="url(#rg4)" stroke-width="6" stroke-linecap="round" class="ring-arc ring-72" transform="rotate(-90 30 30)"/>
                                <text x="30" y="28" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="9" font-weight="700" fill="#78350F">72%</text>
                            </svg>
                            <div class="ring-info">
                                <div class="ring-framework">OSMACC</div>
                                <div class="ring-sub" style="color:#D97706;">72% compliant</div>
                                <div class="ring-bar"><div class="ring-bar-fill" style="width:72%;background:linear-gradient(90deg,#D97706,#FCD34D);"></div></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel 3: Control Effectiveness -->
                <div class="ig-panel reveal reveal-delay-2">
                    <div class="ig-panel-header">
                        <span class="ig-panel-title">Control Status</span>
                        <span style="font-family:'JetBrains Mono',monospace;font-size:10px;color:#94A3B8;font-weight:600;">124 total</span>
                    </div>
                    <div class="ctrl-eff-big">
                        <div class="ctrl-eff-item pass">
                            <div class="ctrl-eff-num">89</div>
                            <div class="ctrl-eff-label">Passed</div>
                        </div>
                        <div class="ctrl-eff-item review">
                            <div class="ctrl-eff-num">28</div>
                            <div class="ctrl-eff-label">Review</div>
                        </div>
                        <div class="ctrl-eff-item fail">
                            <div class="ctrl-eff-num">7</div>
                            <div class="ctrl-eff-label">Failed</div>
                        </div>
                    </div>
                    <div class="ctrl-stacked-bar">
                        <div class="ctrl-stacked-seg cseg-pass" style="width:71.8%;"></div>
                        <div class="ctrl-stacked-seg cseg-review" style="width:22.6%;"></div>
                        <div class="ctrl-stacked-seg cseg-fail" style="width:5.6%;"></div>
                    </div>
                    <div style="font-family:'JetBrains Mono',monospace;font-size:10px;color:#94A3B8;text-align:center;margin-bottom:14px;">71.8% pass rate &mdash; industry avg: 65%</div>
                    <div class="ctrl-eff-detail">
                        <div class="ctrl-eff-row">
                            <span class="ctrl-eff-row-label">Critical Risks</span>
                            <span class="ctrl-eff-pill" style="color:#DC2626;background:#FEE2E2;border:1px solid rgba(220,38,38,0.2);">8</span>
                        </div>
                        <div class="ctrl-eff-row">
                            <span class="ctrl-eff-row-label">High Risks</span>
                            <span class="ctrl-eff-pill" style="color:#D97706;background:#FEF3C7;border:1px solid rgba(217,119,6,0.2);">23</span>
                        </div>
                        <div class="ctrl-eff-row">
                            <span class="ctrl-eff-row-label">Audit Findings</span>
                            <span class="ctrl-eff-pill" style="color:#2563EB;background:#EFF6FF;border:1px solid rgba(37,99,235,0.2);">7</span>
                        </div>
                        <div class="ctrl-eff-row">
                            <span class="ctrl-eff-row-label">Assets Tracked</span>
                            <span class="ctrl-eff-pill" style="color:#059669;background:#D1FAE5;border:1px solid rgba(5,150,105,0.2);">342</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ─── Trust Bar ────────────────────────────────── -->
    <div class="trust-bar" id="standards">
        <div class="container">
            <div class="trust-bar-inner">
                <span class="trust-label">Trusted Standards</span>
                <div class="trust-marquee">
                    <div class="trust-track">
                        <span class="trust-badge tb-blue">NCA ECC</span>
                        <span class="trust-badge tb-violet">NCA ECC 2024</span>
                        <span class="trust-badge tb-teal">NCA CSCC</span>
                        <span class="trust-badge tb-emerald">NCA CCC</span>
                        <span class="trust-badge tb-amber">NCA DCC</span>
                        <span class="trust-badge tb-rose">NCA OSMACC</span>
                        <span class="trust-badge tb-blue">NCA TCC</span>
                        <span class="trust-badge tb-violet">PDPL</span>
                        <span class="trust-badge tb-teal">CITC</span>
                        <span class="trust-badge tb-emerald">SAMA-CSF</span>
                        <span class="trust-badge tb-amber">BCMS</span>
                        <span class="trust-badge tb-rose">ITSM</span>
                        <!-- duplicate set for seamless marquee -->
                        <span class="trust-badge tb-blue">NCA ECC</span>
                        <span class="trust-badge tb-violet">NCA ECC 2024</span>
                        <span class="trust-badge tb-teal">NCA CSCC</span>
                        <span class="trust-badge tb-emerald">NCA CCC</span>
                        <span class="trust-badge tb-amber">NCA DCC</span>
                        <span class="trust-badge tb-rose">NCA OSMACC</span>
                        <span class="trust-badge tb-blue">NCA TCC</span>
                        <span class="trust-badge tb-violet">PDPL</span>
                        <span class="trust-badge tb-teal">CITC</span>
                        <span class="trust-badge tb-emerald">SAMA-CSF</span>
                        <span class="trust-badge tb-amber">BCMS</span>
                        <span class="trust-badge tb-rose">ITSM</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ─── Features Grid ────────────────────────────── -->
    <section class="section-features" id="features">
        <div class="container">
            <div class="section-header">
                <div class="section-eyebrow reveal">Platform Capabilities</div>
                <h2 class="section-title reveal reveal-delay-1">Everything You Need</h2>
                <p class="section-sub reveal reveal-delay-2">One platform, every framework — purpose-built for Saudi
                    Arabia’s complete compliance needs and beyond.</p>
            </div>
            <div class="features-grid" id="modules">

                <!-- Asset Management -->
                <div class="feature-card fc-amber reveal">
                    <div class="feature-icon-wrap amber">
                        <img src="/Images/14-Lifebuoy.png" alt="Asset Management">
                    </div>
                    <div class="feature-title">Asset Management</div>
                    <p class="feature-desc">Catalogue and classify information assets, link them to risks and controls, and track ownership across your entire organizational inventory.</p>
                    <!-- Mini asset network SVG decorative -->
                    <svg viewBox="0 0 180 60" width="180" style="margin-top:20px;opacity:0.55;" aria-hidden="true">
                        <circle cx="20" cy="30" r="8" fill="none" stroke="#D97706" stroke-width="1.5"/>
                        <circle cx="20" cy="30" r="3" fill="#D97706"/>
                        <circle cx="60" cy="14" r="6" fill="none" stroke="#D97706" stroke-width="1.5" opacity="0.7"/>
                        <circle cx="60" cy="14" r="2.5" fill="#D97706" opacity="0.7"/>
                        <circle cx="60" cy="46" r="6" fill="none" stroke="#F59E0B" stroke-width="1.5" opacity="0.6"/>
                        <circle cx="60" cy="46" r="2.5" fill="#F59E0B" opacity="0.6"/>
                        <circle cx="100" cy="8" r="5" fill="none" stroke="#D97706" stroke-width="1.5" opacity="0.5"/>
                        <circle cx="100" cy="30" r="5" fill="none" stroke="#F59E0B" stroke-width="1.5" opacity="0.5"/>
                        <circle cx="100" cy="52" r="5" fill="none" stroke="#D97706" stroke-width="1.5" opacity="0.4"/>
                        <circle cx="140" cy="20" r="4" fill="none" stroke="#D97706" stroke-width="1.5" opacity="0.4"/>
                        <circle cx="140" cy="40" r="4" fill="none" stroke="#F59E0B" stroke-width="1.5" opacity="0.35"/>
                        <line x1="28" y1="26" x2="54" y2="16" stroke="#D97706" stroke-width="1" stroke-dasharray="3 2" opacity="0.5"/>
                        <line x1="28" y1="34" x2="54" y2="44" stroke="#F59E0B" stroke-width="1" stroke-dasharray="3 2" opacity="0.5"/>
                        <line x1="66" y1="14" x2="95" y2="10" stroke="#D97706" stroke-width="1" stroke-dasharray="3 2" opacity="0.4"/>
                        <line x1="66" y1="18" x2="95" y2="28" stroke="#D97706" stroke-width="1" stroke-dasharray="3 2" opacity="0.4"/>
                        <line x1="66" y1="44" x2="95" y2="52" stroke="#F59E0B" stroke-width="1" stroke-dasharray="3 2" opacity="0.4"/>
                        <line x1="105" y1="28" x2="136" y2="22" stroke="#D97706" stroke-width="1" stroke-dasharray="3 2" opacity="0.35"/>
                        <line x1="105" y1="32" x2="136" y2="38" stroke="#F59E0B" stroke-width="1" stroke-dasharray="3 2" opacity="0.35"/>
                        <text x="175" y="32" text-anchor="end" font-family="JetBrains Mono,monospace" font-size="8" fill="#D97706" opacity="0.6" font-weight="700">342 assets</text>
                    </svg>
                </div>

                <!-- Risk Management -->
                <div class="feature-card fc-rose reveal reveal-delay-1">
                    <div class="feature-icon-wrap" style="background:#FFF1F2;border-color:rgba(225,29,72,0.2);">
                        <img src="/Images/16-FireFlame.png" alt="Risk Management">
                    </div>
                    <div class="feature-title">Risk Management</div>
                    <p class="feature-desc">Identify, evaluate, and treat organizational risks using structured methodologies aligned with ISO 27005.</p>
                    <!-- Risk matrix heatmap -->
                    <svg viewBox="0 0 156 58" width="156" style="margin-top:18px;opacity:0.72;" aria-hidden="true">
                        <!-- Row: High likelihood -->
                        <rect x="2"   y="2"  width="46" height="17" rx="2" fill="#FEF3C7"/>
                        <rect x="52"  y="2"  width="46" height="17" rx="2" fill="#FECACA"/>
                        <rect x="102" y="2"  width="52" height="17" rx="2" fill="#E11D48"/>
                        <!-- Row: Med likelihood -->
                        <rect x="2"   y="21" width="46" height="17" rx="2" fill="#D1FAE5"/>
                        <rect x="52"  y="21" width="46" height="17" rx="2" fill="#FEF3C7"/>
                        <rect x="102" y="21" width="52" height="17" rx="2" fill="#FECACA"/>
                        <!-- Row: Low likelihood -->
                        <rect x="2"   y="40" width="46" height="17" rx="2" fill="#D1FAE5"/>
                        <rect x="52"  y="40" width="46" height="17" rx="2" fill="#D1FAE5"/>
                        <rect x="102" y="40" width="52" height="17" rx="2" fill="#FEF3C7"/>
                        <!-- Cell text -->
                        <text x="25"  y="13.5" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6" font-weight="700" fill="#D97706">MED</text>
                        <text x="75"  y="13.5" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6" font-weight="700" fill="#DC2626">HIGH</text>
                        <text x="128" y="13.5" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6" font-weight="700" fill="#fff">CRIT</text>
                        <text x="25"  y="32.5" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6" font-weight="700" fill="#059669">LOW</text>
                        <text x="75"  y="32.5" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6" font-weight="700" fill="#D97706">MED</text>
                        <text x="128" y="32.5" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6" font-weight="700" fill="#DC2626">HIGH</text>
                        <text x="25"  y="51.5" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6" font-weight="700" fill="#059669">LOW</text>
                        <text x="75"  y="51.5" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6" font-weight="700" fill="#059669">LOW</text>
                        <text x="128" y="51.5" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6" font-weight="700" fill="#D97706">MED</text>
                        <!-- Risk count chip on critical cell -->
                        <circle cx="145" cy="6" r="5" fill="rgba(255,255,255,0.28)"/>
                        <text x="145" y="9" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6.5" fill="#fff" font-weight="700">3</text>
                    </svg>
                </div>

                <!-- Controls Framework -->
                <div class="feature-card fc-violet reveal reveal-delay-2">
                    <div class="feature-icon-wrap" style="background:#EDE9FE;border-color:rgba(124,58,237,0.22);">
                        <img src="/Images/13-LockIcon.png" alt="Controls Framework">
                    </div>
                    <div class="feature-title">Controls Framework</div>
                    <p class="feature-desc">Manage your control library across multiple frameworks with evidence collection and effectiveness scoring.</p>
                    <!-- Control category coverage bars -->
                    <svg viewBox="0 0 180 82" width="180" style="margin-top:18px;opacity:0.72;" aria-hidden="true">
                        <!-- Technical 84% -->
                        <text x="0" y="9" font-family="DM Sans,sans-serif" font-size="7.5" font-weight="600" fill="#7C3AED">Technical</text>
                        <text x="180" y="9" text-anchor="end" font-family="JetBrains Mono,monospace" font-size="7.5" font-weight="700" fill="#7C3AED">84%</text>
                        <rect x="0" y="12" width="180" height="5" rx="2.5" fill="#EDE9FE"/>
                        <rect x="0" y="12" width="151" height="5" rx="2.5" fill="url(#vg1)"/>
                        <!-- Administrative 71% -->
                        <text x="0" y="30" font-family="DM Sans,sans-serif" font-size="7.5" font-weight="600" fill="#7C3AED">Administrative</text>
                        <text x="180" y="30" text-anchor="end" font-family="JetBrains Mono,monospace" font-size="7.5" font-weight="700" fill="#7C3AED">71%</text>
                        <rect x="0" y="33" width="180" height="5" rx="2.5" fill="#EDE9FE"/>
                        <rect x="0" y="33" width="128" height="5" rx="2.5" fill="url(#vg1)"/>
                        <!-- Physical 93% -->
                        <text x="0" y="51" font-family="DM Sans,sans-serif" font-size="7.5" font-weight="600" fill="#7C3AED">Physical</text>
                        <text x="180" y="51" text-anchor="end" font-family="JetBrains Mono,monospace" font-size="7.5" font-weight="700" fill="#7C3AED">93%</text>
                        <rect x="0" y="54" width="180" height="5" rx="2.5" fill="#EDE9FE"/>
                        <rect x="0" y="54" width="167" height="5" rx="2.5" fill="url(#vg1)"/>
                        <!-- Operational 76% -->
                        <text x="0" y="72" font-family="DM Sans,sans-serif" font-size="7.5" font-weight="600" fill="#7C3AED">Operational</text>
                        <text x="180" y="72" text-anchor="end" font-family="JetBrains Mono,monospace" font-size="7.5" font-weight="700" fill="#7C3AED">76%</text>
                        <rect x="0" y="75" width="180" height="5" rx="2.5" fill="#EDE9FE"/>
                        <rect x="0" y="75" width="137" height="5" rx="2.5" fill="url(#vg1)"/>
                        <defs>
                            <linearGradient id="vg1" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#7C3AED"/>
                                <stop offset="100%" stop-color="#A78BFA"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>

                <!-- Regulatory Compliance -->
                <div class="feature-card fc-blue reveal">
                    <div class="feature-icon-wrap blue">
                        <img src="/Images/12-ComplianceIcon.png" alt="Regulatory Compliance">
                    </div>
                    <div class="feature-title">Regulatory Compliance</div>
                    <p class="feature-desc">Monitor compliance posture against SAMA-CSF, NCA ECC, BCMS, PDPL, and NIST in real time.</p>
                    <!-- Framework compliance score bars -->
                    <svg viewBox="0 0 180 82" width="180" style="margin-top:18px;opacity:0.72;" aria-hidden="true">
                        <defs>
                            <linearGradient id="bg1" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#2563EB"/>
                                <stop offset="100%" stop-color="#38BDF8"/>
                            </linearGradient>
                        </defs>
                        <!-- SAMA-CSF 91% -->
                        <text x="0" y="9" font-family="JetBrains Mono,monospace" font-size="7.5" font-weight="700" fill="#2563EB">SAMA-CSF</text>
                        <text x="180" y="9" text-anchor="end" font-family="JetBrains Mono,monospace" font-size="7.5" font-weight="700" fill="#2563EB">91%</text>
                        <rect x="0" y="12" width="180" height="5" rx="2.5" fill="#DBEAFE"/>
                        <rect x="0" y="12" width="164" height="5" rx="2.5" fill="url(#bg1)"/>
                        <!-- NCA ECC 85% -->
                        <text x="0" y="30" font-family="JetBrains Mono,monospace" font-size="7.5" font-weight="700" fill="#2563EB">NCA ECC</text>
                        <text x="180" y="30" text-anchor="end" font-family="JetBrains Mono,monospace" font-size="7.5" font-weight="700" fill="#2563EB">85%</text>
                        <rect x="0" y="33" width="180" height="5" rx="2.5" fill="#DBEAFE"/>
                        <rect x="0" y="33" width="153" height="5" rx="2.5" fill="url(#bg1)"/>
                        <!-- ITSM 78% -->
                        <text x="0" y="51" font-family="JetBrains Mono,monospace" font-size="7.5" font-weight="700" fill="#2563EB">ITSM</text>
                        <text x="180" y="51" text-anchor="end" font-family="JetBrains Mono,monospace" font-size="7.5" font-weight="700" fill="#2563EB">78%</text>
                        <rect x="0" y="54" width="180" height="5" rx="2.5" fill="#DBEAFE"/>
                        <rect x="0" y="54" width="140" height="5" rx="2.5" fill="url(#bg1)"/>
                        <!-- PDPL 82% -->
                        <text x="0" y="72" font-family="JetBrains Mono,monospace" font-size="7.5" font-weight="700" fill="#2563EB">PDPL</text>
                        <text x="180" y="72" text-anchor="end" font-family="JetBrains Mono,monospace" font-size="7.5" font-weight="700" fill="#2563EB">82%</text>
                        <rect x="0" y="75" width="180" height="5" rx="2.5" fill="#DBEAFE"/>
                        <rect x="0" y="75" width="148" height="5" rx="2.5" fill="url(#bg1)"/>
                    </svg>
                </div>

                <!-- Executive Reporting -->
                <div class="feature-card fc-teal reveal reveal-delay-1">
                    <div class="feature-icon-wrap teal">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
                            <rect x="1" y="14" width="5" height="11" rx="1.5" fill="#0EA5E9"/>
                            <rect x="10" y="8" width="5" height="17" rx="1.5" fill="#0EA5E9" opacity="0.7"/>
                            <rect x="19" y="2" width="5" height="23" rx="1.5" fill="#0EA5E9" opacity="0.4"/>
                        </svg>
                    </div>
                    <div class="feature-title">Executive Reporting</div>
                    <p class="feature-desc">Generate board-ready PDF reports and dashboards showing GRC posture across all domains.</p>
                    <!-- GRC score trend sparkline -->
                    <svg viewBox="0 0 180 60" width="180" style="margin-top:18px;opacity:0.72;" aria-hidden="true">
                        <defs>
                            <linearGradient id="tg1" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#0EA5E9"/>
                                <stop offset="100%" stop-color="#34D399"/>
                            </linearGradient>
                            <linearGradient id="tg1-fill" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" stop-color="#0EA5E9" stop-opacity="0.22"/>
                                <stop offset="100%" stop-color="#0EA5E9" stop-opacity="0"/>
                            </linearGradient>
                        </defs>
                        <!-- Area fill -->
                        <polygon points="0,44 36,36 72,28 108,20 144,12 180,6 180,52 0,52" fill="url(#tg1-fill)"/>
                        <!-- Trend line -->
                        <polyline points="0,44 36,36 72,28 108,20 144,12 180,6" fill="none" stroke="url(#tg1)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <!-- Data points -->
                        <circle cx="0"   cy="44" r="3" fill="#0EA5E9"/>
                        <circle cx="36"  cy="36" r="3" fill="#0EA5E9"/>
                        <circle cx="72"  cy="28" r="3" fill="#0EA5E9"/>
                        <circle cx="108" cy="20" r="3" fill="#0EA5E9"/>
                        <circle cx="144" cy="12" r="3" fill="#34D399"/>
                        <circle cx="180" cy="6"  r="3.5" fill="#34D399"/>
                        <!-- Month labels -->
                        <text x="0"   y="58" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6" fill="#94A3B8" font-weight="600">JAN</text>
                        <text x="36"  y="58" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6" fill="#94A3B8" font-weight="600">FEB</text>
                        <text x="72"  y="58" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6" fill="#94A3B8" font-weight="600">MAR</text>
                        <text x="108" y="58" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6" fill="#94A3B8" font-weight="600">APR</text>
                        <text x="144" y="58" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6" fill="#94A3B8" font-weight="600">MAY</text>
                        <text x="180" y="58" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6" fill="#94A3B8" font-weight="600">JUN</text>
                        <!-- Score label on last point -->
                        <rect x="154" y="0" width="24" height="10" rx="2" fill="#D1FAE5"/>
                        <text x="166" y="8" text-anchor="middle" font-family="JetBrains Mono,monospace" font-size="6.5" fill="#059669" font-weight="700">89%</text>
                    </svg>
                </div>

                <!-- Audit Management -->
                <div class="feature-card fc-emerald reveal reveal-delay-2">
                    <div class="feature-icon-wrap" style="background:#D1FAE5;border-color:rgba(5,150,105,0.2);">
                        <img src="/Images/11-CisoIcon.png" alt="Audit Management">
                    </div>
                    <div class="feature-title">Audit Management</div>
                    <p class="feature-desc">Plan and track internal audits, findings, and remediation workflows with full lifecycle traceability.</p>
                    <!-- Mini audit timeline -->
                    <svg viewBox="0 0 200 48" width="100%" style="margin-top:20px;max-width:200px;opacity:0.7;" aria-hidden="true">
                        <defs>
                            <linearGradient id="auditLine2" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#059669"/>
                                <stop offset="100%" stop-color="#34D399"/>
                            </linearGradient>
                        </defs>
                        <line x1="16" y1="20" x2="184" y2="20" stroke="#D1FAE5" stroke-width="2"/>
                        <line x1="16" y1="20" x2="140" y2="20" stroke="url(#auditLine2)" stroke-width="2"/>
                        <circle cx="16"  cy="20" r="6" fill="#059669"/>
                        <circle cx="60"  cy="20" r="6" fill="#059669"/>
                        <circle cx="104" cy="20" r="6" fill="#059669"/>
                        <circle cx="140" cy="20" r="6" fill="#F59E0B"/>
                        <circle cx="184" cy="20" r="6" fill="#D1FAE5" stroke="#A7F3D0" stroke-width="1.5"/>
                        <path d="M12 20l3 3 5-5" stroke="#fff" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                        <path d="M56 20l3 3 5-5" stroke="#fff" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                        <path d="M100 20l3 3 5-5" stroke="#fff" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                        <circle cx="140" cy="20" r="3" fill="#fff"/>
                        <text x="16"  y="38" text-anchor="middle" font-family="DM Sans,sans-serif" font-size="7" fill="#059669" font-weight="700">Plan</text>
                        <text x="60"  y="38" text-anchor="middle" font-family="DM Sans,sans-serif" font-size="7" fill="#059669" font-weight="700">Fieldwork</text>
                        <text x="104" y="38" text-anchor="middle" font-family="DM Sans,sans-serif" font-size="7" fill="#059669" font-weight="700">Findings</text>
                        <text x="140" y="38" text-anchor="middle" font-family="DM Sans,sans-serif" font-size="7" fill="#D97706" font-weight="700">Review</text>
                        <text x="184" y="38" text-anchor="middle" font-family="DM Sans,sans-serif" font-size="7" fill="#94A3B8" font-weight="700">Closed</text>
                    </svg>
                </div>

            </div>
        </div>
    </section>

    <!-- ─── How It Works ─────────────────────────────── -->
    <section class="section-how" id="how">
        <div class="container">
            <div class="section-header">
                <div class="section-eyebrow reveal">Simple Process</div>
                <h2 class="section-title reveal reveal-delay-1">How It Works</h2>
                <p class="section-sub reveal reveal-delay-2">Three clear steps from risk exposure to board-level
                    confidence.</p>
            </div>
            <div class="steps-row">
                <div class="step reveal">
                    <div class="step-ghost">01</div>
                    <div class="step-circle">01</div>
                    <div class="step-title">Assess</div>
                    <p class="step-desc">Identify assets, threats, and vulnerabilities. Score risks using quantitative
                        and qualitative methods.</p>
                </div>
                <div class="step reveal reveal-delay-2">
                    <div class="step-ghost">02</div>
                    <div class="step-circle">02</div>
                    <div class="step-title">Control</div>
                    <p class="step-desc">Map controls to risks and frameworks. Collect evidence, assign owners, and
                        track implementation.</p>
                </div>
                <div class="step reveal reveal-delay-4">
                    <div class="step-ghost">03</div>
                    <div class="step-circle">03</div>
                    <div class="step-title">Report</div>
                    <p class="step-desc">Generate compliance reports, executive dashboards, and audit-ready
                        documentation in seconds.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── Stats ────────────────────────────────────── -->
    <section class="section-stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item reveal">
                    <div class="stat-num"><span class="count-stat" data-target="500" data-suffix="+">500+</span>
                    </div>
                    <div class="stat-label">Controls Mapped</div>
                </div>
                <div class="stat-item reveal reveal-delay-1">
                    <div class="stat-num"><span class="count-stat" data-target="10" data-suffix="+">10+</span></div>
                    <div class="stat-label">Standards Covered</div>
                </div>
                <div class="stat-item reveal reveal-delay-2">
                    <div class="stat-num"><span class="count-stat" data-target="6" data-suffix="">6</span></div>
                    <div class="stat-label">GRC Modules</div>
                </div>
                <div class="stat-item reveal reveal-delay-3">
                    <div class="stat-num"><span class="count-stat" data-target="2" data-suffix="">2</span></div>
                    <div class="stat-label">Languages (AR + EN)</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── Why Eagle Eye ─────────────────────────────── -->
    <section class="section-why" id="about">
        <div class="container">
            <div class="why-grid">
                <div class="reveal">
                    <div class="why-since">Since 2023</div>
                    <h2 class="why-heading">Built for the Saudi<br><span>Regulatory Landscape</span></h2>
                    <p class="why-body">Eagle Eye was designed from the ground up for organizations operating in Saudi
                        Arabia, covering their GRC needs and beyond. For boards and C-level executives, regulatory
                        compliance is a top priority.</p>
                </div>
                <div class="why-items">
                    <div class="why-item reveal">
                        <div class="why-check">
                            <svg viewBox="0 0 16 16" fill="none">
                                <path d="M3 8.5l3.5 3.5 6.5-7" stroke="#2563EB" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <div class="why-item-title">Beyond Software, Our Focuses on Content</div>
                            <div class="why-item-desc">Competitors may focus on look and feel, but we focus on content.
                                Our focus is Saudi Arabian regulatory compliance. Period.</div>
                        </div>
                    </div>
                    <div class="why-item reveal reveal-delay-1">
                        <div class="why-check">
                            <svg viewBox="0 0 16 16" fill="none">
                                <path d="M3 8.5l3.5 3.5 6.5-7" stroke="#2563EB" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <div class="why-item-title">Arabic-First Interface</div>
                            <div class="why-item-desc">Full RTL support and Arabic-language reports for local teams and
                                regulators.</div>
                        </div>
                    </div>
                    <div class="why-item reveal reveal-delay-2">
                        <div class="why-check">
                            <svg viewBox="0 0 16 16" fill="none">
                                <path d="M3 8.5l3.5 3.5 6.5-7" stroke="#2563EB" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <div class="why-item-title">Role-Based Access Control</div>
                            <div class="why-item-desc">CISO, auditor, and analyst roles with granular permission sets
                                per module.</div>
                        </div>
                    </div>
                    <div class="why-item reveal reveal-delay-3">
                        <div class="why-check">
                            <svg viewBox="0 0 16 16" fill="none">
                                <path d="M3 8.5l3.5 3.5 6.5-7" stroke="#2563EB" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <div class="why-item-title">Audit-Ready PDF Reports</div>
                            <div class="why-item-desc">One-click export of risk assessments, audit findings, and
                                compliance summaries.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── Testimonial ───────────────────────────────── -->
    <section class="section-testimonial">
        <div class="container">
            <div class="testimonial-inner reveal">
                <span class="quote-icon">&ldquo;</span>
                <p class="quote-text">"Eagle Eye transformed how we demonstrate Regulatory Compliance to our board. What
                    used to take weeks of spreadsheet work now takes hours."</p>
                {{-- <div class="quote-attr">
                    <span>Chief Information Security Officer, Major Saudi Financial Institution</span>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- ─── Final CTA ─────────────────────────────────── -->
    <section class="section-cta">
        <div class="container">
            <div class="cta-inner">
                <h2 class="cta-title reveal">Ready to Go Beyond GRC?</h2>
                <p class="cta-subtitle reveal reveal-delay-1">Join organizations across the Kingdom managing compliance
                    the smart way.</p>
                <a href="/login" class="btn-cta reveal reveal-delay-2">Enter Platform <span
                        class="arrow">&rarr;</span></a>
            </div>
        </div>
    </section>

    <!-- ─── Footer ────────────────────────────────────── -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <img src="/Images/EagleEyeLogoLight.png" alt="Eagle Eye Logo">
                    {{-- <div class="footer-brand-name">Eagle Eye GRC</div> --}}
                    <p class="footer-tagline">Enterprise governance, risk management, and compliance for the Saudi
                        regulatory landscape.</p>
                </div>
                <div>
                    <div class="footer-col-title">Platform</div>
                    <ul class="footer-links">
                        <li><a href="#features">Features</a></li>
                        <li><a href="#modules">Modules</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="/login">Login</a></li>
                    </ul>
                </div>
                <div>
                    <div class="footer-col-title">Standards</div>
                    <ul class="footer-links">
                        <li><a href="#standards">SAMA-CSF</a></li>
                        <li><a href="#standards">NCA ECC</a></li>
                        <li><a href="#standards">BCMS</a></li>
                        <li><a href="#standards">PDPL</a></li>
                        <li><a href="#standards">ITSM</a></li>
                    </ul>
                </div>
                <div>
                    <div class="footer-col-title">Contact</div>
                    <div class="footer-contact-item">Eagle Eye GRC Platform</div>
                    <div class="footer-contact-item">Kingdom of Saudi Arabia</div>
                    {{-- <div class="footer-contact-item"
                        style="font-family:'IBM Plex Sans Arabic',sans-serif;direction:rtl;">المملكة العربية السعودية
                    </div> --}}
                </div>
            </div>
            <div class="footer-bar">
                <span class="footer-copy">&copy; {{ date('Y') }} Eagle Eye GRC. All rights reserved.</span>
                {{-- <span class="footer-arabic">نسر العيون — منصة الحوكمة والمخاطر والامتثال</span> --}}
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll
        var navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function() {
            navbar.classList.toggle('scrolled', window.scrollY > 40);
        }, {
            passive: true
        });

        // Nav hover indicator
        var navCenter = document.getElementById('navCenter');
        var navLinks = document.getElementById('navLinks');
        var navIndicator = document.getElementById('navIndicator');
        if (navLinks && navIndicator && navCenter) {
            navLinks.querySelectorAll('a').forEach(function(link) {
                link.addEventListener('mouseenter', function() {
                    var lr = link.getBoundingClientRect();
                    var cr = navCenter.getBoundingClientRect();
                    navIndicator.style.display = 'block';
                    navIndicator.style.width = lr.width + 'px';
                    navIndicator.style.left = (lr.left - cr.left) + 'px';
                });
            });
            navLinks.addEventListener('mouseleave', function() {
                navIndicator.style.display = 'none';
            });
        }

        // Hamburger
        var hamburger = document.getElementById('hamburger');
        var drawer = document.getElementById('mobileDrawer');
        hamburger.addEventListener('click', function() {
            var open = drawer.classList.toggle('open');
            hamburger.setAttribute('aria-expanded', String(open));
        });
        drawer.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                drawer.classList.remove('open');
                hamburger.setAttribute('aria-expanded', 'false');
            });
        });

        // Mouse parallax on mockup
        var heroSection = document.getElementById('heroSection');
        var mockupWrapper = document.getElementById('mockupWrapper');
        if (heroSection && mockupWrapper) {
            heroSection.addEventListener('mousemove', function(e) {
                var rect = heroSection.getBoundingClientRect();
                var dx = (e.clientX - (rect.left + rect.width / 2)) / rect.width * 18;
                var dy = (e.clientY - (rect.top + rect.height / 2)) / rect.height * 18;
                mockupWrapper.style.transform = 'translate(' + Math.max(-9, Math.min(9, dx)) + 'px,' + Math.max(-9,
                    Math.min(9, dy)) + 'px)';
            }, {
                passive: true
            });
            heroSection.addEventListener('mouseleave', function() {
                mockupWrapper.style.transform = 'translate(0,0)';
            });
        }

        // IntersectionObserver — .reveal
        var revealObs = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) {
                    e.target.classList.add('is-visible');
                    revealObs.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.12
        });
        document.querySelectorAll('.reveal').forEach(function(el) {
            revealObs.observe(el);
        });

        // Count-up stats
        function animateCount(el, target, suffix, duration) {
            var start = performance.now();

            function tick(now) {
                var p = Math.min((now - start) / duration, 1);
                el.textContent = Math.floor((1 - Math.pow(1 - p, 3)) * target) + suffix;
                if (p < 1) requestAnimationFrame(tick);
            }
            requestAnimationFrame(tick);
        }
        var countObs = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) {
                    var el = e.target;
                    animateCount(el, parseInt(el.dataset.target), el.dataset.suffix || '', 1800);
                    countObs.unobserve(el);
                }
            });
        }, {
            threshold: 0.5
        });
        document.querySelectorAll('.count-stat').forEach(function(el) {
            countObs.observe(el);
        });

        // Compliance rings animation trigger
        var infographicsSection = document.getElementById('infographics');
        if (infographicsSection) {
            var ringsObs = new IntersectionObserver(function(entries) {
                entries.forEach(function(e) {
                    if (e.isIntersecting) {
                        e.target.classList.add('rings-animated');
                        ringsObs.unobserve(e.target);
                    }
                });
            }, { threshold: 0.25 });
            ringsObs.observe(infographicsSection);
        }

        // Smooth scroll with navbar offset
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                var target = document.querySelector(this.getAttribute('href'));
                if (!target) return;
                e.preventDefault();
                window.scrollTo({
                    top: target.getBoundingClientRect().top + window.pageYOffset - navbar
                        .offsetHeight - 12,
                    behavior: 'smooth'
                });
            });
        });
    </script>
    <!-- Elfsight AI Chatbot | Eagle Eye GRC -->
<script src="https://elfsightcdn.com/platform.js" async></script>
<div style="position:fixed;bottom:0;right:0;z-index:9999;line-height:0;height:0;overflow:visible;">
    <div class="elfsight-app-81a06091-998d-4479-82a3-0d48cf35c660" data-elfsight-app-lazy></div>
</div>
</body>

</html>
