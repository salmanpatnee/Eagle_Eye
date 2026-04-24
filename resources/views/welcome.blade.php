<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eagle Eye — GRC Platform</title>
    <meta name="description"
        content="Enterprise GRC platform for risk assessment, audit management, and regulatory compliance in Saudi Arabia.">

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
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
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

        /* ─── Mockup ──────────────────────────────────── */
        .hero-visual {
            display: flex;
            justify-content: center;
            align-items: center;
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

            .nav-links,
            .nav-cta {
                display: none;
            }

            .hamburger {
                display: flex;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

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
        <div class="hero-blob-teal"></div>
        <div class="hero-blob-amber"></div>
        <div class="container">
            <div class="hero-inner">
                <div class="hero-content">
                    {{-- <div class="hero-overline anim-1">[ GRC Platform — KSA ]</div> --}}
                    <h1 class="hero-h1 anim-2">Out-of-the-Box<br>Regulatory Compliance, <span class="blue-text">Beyond
                            GRC.</span></h1>
                    {{-- <p class="hero-arabic anim-3">منصة الحوكمة والمخاطر والامتثال</p> --}}
                    <p class="hero-body anim-4">Eagle Eye is a Saudi product focused on Saudi Arabia, providing complete
                        regulatory compliance in the shortest possible time. The product is designed, developed, and
                        rolled out under the strict supervision of experienced GRC consultants.</p>
                    <div class="hero-actions anim-5">
                        <a href="/login" class="btn-primary">Enter Platform &rarr;</a>
                        <a href="#features" class="btn-ghost">Explore Features &darr;</a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="mockup-wrapper" id="mockupWrapper">
                        <div class="mockup-card">
                            <div class="mockup-tabs">
                                <div class="mockup-tab active">Overview</div>
                                <div class="mockup-tab">Risks</div>
                                <div class="mockup-tab">Audits</div>
                            </div>
                            <div class="mockup-header-row">
                                <span class="mockup-title">GRC Dashboard</span>
                                <span class="live-badge"><span class="live-dot"></span>Live</span>
                            </div>
                            <div class="stat-pills">
                                <div class="stat-pill">
                                    <div class="val">124</div>
                                    <div class="lbl">Controls</div>
                                </div>
                                <div class="stat-pill accent">
                                    <div class="val">87%</div>
                                    <div class="lbl">Compliant</div>
                                </div>
                                <div class="stat-pill warn">
                                    <div class="val">6</div>
                                    <div class="lbl">Open Risks</div>
                                </div>
                            </div>
                            <div class="compliance-head">
                                <span>Compliance Progress</span>
                            </div>
                            <div class="bar-row">
                                <div class="bar-row-top">
                                    <span class="bar-label">SAMA-CSF</span>
                                    <span class="bar-pct">91%</span>
                                </div>
                                <div class="bar-track">
                                    <div class="bar-fill bar-fill-1"></div>
                                </div>
                            </div>
                            <div class="bar-row">
                                <div class="bar-row-top">
                                    <span class="bar-label">NCA ECC</span>
                                    <span class="bar-pct">78%</span>
                                </div>
                                <div class="bar-track">
                                    <div class="bar-fill bar-fill-2"></div>
                                </div>
                            </div>
                            <div class="bar-row">
                                <div class="bar-row-top">
                                    <span class="bar-label">PDPL</span>
                                    <span class="bar-pct">85%</span>
                                </div>
                                <div class="bar-track">
                                    <div class="bar-fill bar-fill-3"></div>
                                </div>
                            </div>
                        </div>

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
                            <span class="dash-chip dchip-active">30D</span>
                            <span class="dash-chip">90D</span>
                            <span class="dash-chip">YTD</span>
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
                                            <span class="fw-name">SAMA-CSF</span><span class="fw-pct">91%</span>
                                        </div>
                                        <div class="fw-track">
                                            <div class="fw-fill" style="width:91%"></div>
                                        </div>
                                    </div>
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
                                            <span class="fw-name">ISO 27001</span><span class="fw-pct">85%</span>
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
                Built for Saudi Arabia's regulatory landscape &mdash; SAMA-CSF, NCA ECC, ISO 27001, and more.
                <a href="/login">Explore the platform &rarr;</a>
            </p>
        </div>
    </section>

    <!-- ─── Trust Bar ────────────────────────────────── -->
    <div class="trust-bar" id="standards">
        <div class="container">
            <div class="trust-bar-inner">
                <span class="trust-label">Trusted Standards</span>
                <div class="trust-marquee">
                    <div class="trust-track">
                        <span class="trust-badge">SAMA-CSF</span>
                        <span class="trust-badge">NCA ECC</span>
                        <span class="trust-badge">ISO 27001</span>
                        <span class="trust-badge">PDPL</span>
                        <span class="trust-badge">NIST CSF</span>
                        <span class="trust-badge">CITC</span>
                        <span class="trust-badge">ISO 27005</span>
                        <span class="trust-badge">NIST 800-53</span>
                        <span class="trust-badge">CIS Controls</span>
                        <span class="trust-badge">SAMA-CSF</span>
                        <span class="trust-badge">NCA ECC</span>
                        <span class="trust-badge">ISO 27001</span>
                        <span class="trust-badge">PDPL</span>
                        <span class="trust-badge">NIST CSF</span>
                        <span class="trust-badge">CITC</span>
                        <span class="trust-badge">ISO 27005</span>
                        <span class="trust-badge">NIST 800-53</span>
                        <span class="trust-badge">CIS Controls</span>
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
                <div class="feature-card reveal reveal-delay-2">
                    <div class="feature-icon-wrap amber">
                        <img src="/Images/14-Lifebuoy.png" alt="Asset Management">
                    </div>
                    <div class="feature-title">Asset Management</div>
                    <p class="feature-desc">Catalogue and classify information assets, link them to risks and controls,
                        and track ownership.</p>
                </div>

                <div class="feature-card reveal">
                    <div class="feature-icon-wrap blue">
                        <img src="/Images/16-FireFlame.png" alt="Risk Management">
                    </div>
                    <div class="feature-title">Risk Management</div>
                    <p class="feature-desc">Identify, evaluate, and treat organizational risks using structured
                        methodologies aligned with ISO 27005.</p>
                </div>

                <div class="feature-card reveal reveal-delay-2">
                    <div class="feature-icon-wrap blue">
                        <img src="/Images/13-LockIcon.png" alt="Controls Framework">
                    </div>
                    <div class="feature-title">Controls Framework</div>
                    <p class="feature-desc">Manage your control library across multiple frameworks with evidence
                        collection and effectiveness scoring.</p>
                </div>


                <div class="feature-card reveal reveal-delay-1">
                    <div class="feature-icon-wrap teal">
                        <img src="/Images/12-ComplianceIcon.png" alt="Regulatory Compliance">
                    </div>
                    <div class="feature-title">Regulatory Compliance</div>
                    <p class="feature-desc">Monitor compliance posture against SAMA-CSF, NCA ECC, ISO 27001, PDPL, and
                        NIST in real time.</p>
                </div>

                <div class="feature-card reveal reveal-delay-3">
                    <div class="feature-icon-wrap teal">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
                            <rect x="1" y="14" width="5" height="11" rx="1.5" fill="#0EA5E9" />
                            <rect x="10" y="8" width="5" height="17" rx="1.5" fill="#0EA5E9"
                                opacity="0.7" />
                            <rect x="19" y="2" width="5" height="23" rx="1.5" fill="#0EA5E9"
                                opacity="0.4" />
                        </svg>
                    </div>
                    <div class="feature-title">Executive Reporting</div>
                    <p class="feature-desc">Generate board-ready PDF reports and dashboards showing GRC posture across
                        all domains.</p>
                </div>
                <div class="feature-card reveal reveal-delay-1">
                    <div class="feature-icon-wrap amber">
                        <img src="/Images/11-CisoIcon.png" alt="Audit Management">
                    </div>
                    <div class="feature-title">Audit Management</div>
                    <p class="feature-desc">Plan and track internal audits, findings, and remediation workflows with
                        full lifecycle traceability.</p>
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
                <p class="quote-text">"Eagle Eye transformed how we demonstrate SAMA-CSF compliance to our board. What
                    used to take weeks of spreadsheet work now takes hours."</p>
                <div class="quote-attr">
                    <span>Chief Information Security Officer, Major Saudi Financial Institution</span>
                </div>
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
                        <li><a href="#standards">ISO 27001</a></li>
                        <li><a href="#standards">PDPL</a></li>
                        <li><a href="#standards">NIST CSF</a></li>
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
</body>

</html>
