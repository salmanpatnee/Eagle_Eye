<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eagle Eye — GRC Platform</title>
    <meta name="description" content="Enterprise GRC platform for risk assessment, audit management, and regulatory compliance in Saudi Arabia.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Nunito+Sans:wght@400;500;600;700&family=IBM+Plex+Sans+Arabic:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy:        #0F4C81;
            --navy-dark:   #0A3260;
            --teal:        #0EA5E9;
            --teal-light:  #E0F2FE;
            --gold:        #F0A500;
            --bg-page:     #F0F4FF;
            --bg-white:    #FFFFFF;
            --text-primary:#1A2B4B;
            --text-muted:  #64748B;
            --border:      #E2E8F0;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Nunito Sans', sans-serif;
            background: var(--bg-page);
            color: var(--text-primary);
            line-height: 1.6;
        }

        h1, h2, h3, h4, h5 { font-family: 'Sora', sans-serif; }

        a { text-decoration: none; color: inherit; }

        img { max-width: 100%; height: auto; display: block; }

        /* ─── Animations ─────────────────────────────────────── */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(32px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(40px); }
            to   { opacity: 1; transform: translateX(0); }
        }
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50%       { background-position: 100% 50%; }
        }

        .anim-1 { animation: fadeInUp 0.7s ease both; animation-delay: 0.1s; }
        .anim-2 { animation: fadeInUp 0.7s ease both; animation-delay: 0.2s; }
        .anim-3 { animation: fadeInUp 0.7s ease both; animation-delay: 0.3s; }
        .anim-4 { animation: fadeInUp 0.7s ease both; animation-delay: 0.4s; }
        .anim-5 { animation: fadeInUp 0.7s ease both; animation-delay: 0.5s; }
        .anim-right { animation: fadeInRight 0.8s ease both; animation-delay: 0.3s; }

        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .reveal.is-visible { opacity: 1; transform: translateY(0); }
        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }
        .reveal-delay-4 { transition-delay: 0.4s; }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation-duration: 0.01ms !important; transition-duration: 0.01ms !important; }
        }

        /* ─── Layout Helpers ─────────────────────────────────── */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ─── Navbar ─────────────────────────────────────────── */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            padding: 16px 0;
            transition: background 0.3s, box-shadow 0.3s, backdrop-filter 0.3s;
        }
        .navbar.scrolled {
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 1px 24px rgba(15,76,129,0.10);
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
        .nav-brand img { width: 38px; height: 38px; object-fit: contain; }
        .nav-brand-text { line-height: 1.2; }
        .nav-brand-text .brand-name {
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            font-size: 15px;
            color: var(--navy);
        }
        .nav-brand-text .brand-sub {
            font-size: 11px;
            color: var(--text-muted);
            font-weight: 500;
        }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 32px;
            list-style: none;
        }
        .nav-links a {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-primary);
            transition: color 0.2s;
        }
        .nav-links a:hover { color: var(--teal); }
        .nav-cta {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--teal);
            color: #fff;
            font-family: 'Sora', sans-serif;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 22px;
            border-radius: 8px;
            transition: background 0.2s, transform 0.15s;
            white-space: nowrap;
        }
        .nav-cta:hover { background: #0284c7; transform: translateY(-1px); }
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
            gap: 0;
            background: var(--bg-white);
            border-top: 1px solid var(--border);
            padding: 16px 24px 20px;
        }
        .mobile-drawer.open { display: flex; }
        .mobile-drawer a {
            padding: 12px 0;
            font-weight: 600;
            font-size: 15px;
            color: var(--text-primary);
            border-bottom: 1px solid var(--border);
            transition: color 0.2s;
        }
        .mobile-drawer a:last-child { border-bottom: none; margin-top: 8px; }
        .mobile-drawer a:hover { color: var(--teal); }
        .mobile-cta {
            display: inline-flex;
            justify-content: center;
            background: var(--teal);
            color: #fff !important;
            border-radius: 8px;
            padding: 12px 24px !important;
            border-bottom: none !important;
        }

        /* ─── Hero ───────────────────────────────────────────── */
        .hero {
            min-height: 100vh;
            padding: 120px 0 80px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #F0F4FF 0%, #E8F0FE 100%);
        }
        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(var(--border) 1px, transparent 1px);
            background-size: 28px 28px;
            opacity: 0.6;
            pointer-events: none;
        }
        .hero-blob {
            position: absolute;
            top: -120px;
            right: -160px;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(14,165,233,0.18) 0%, transparent 70%);
            border-radius: 50%;
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
            gap: 8px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--teal);
            background: var(--teal-light);
            padding: 6px 14px;
            border-radius: 100px;
            margin-bottom: 20px;
        }
        .hero-overline::before {
            content: '';
            width: 6px;
            height: 6px;
            background: var(--teal);
            border-radius: 50%;
        }
        .hero-h1 {
            font-size: clamp(32px, 4vw, 52px);
            font-weight: 800;
            line-height: 1.15;
            color: var(--text-primary);
            margin-bottom: 12px;
        }
        .hero-h1 span { color: var(--teal); }
        .hero-arabic {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
            font-size: 18px;
            font-weight: 500;
            color: var(--navy);
            direction: rtl;
            margin-bottom: 20px;
            opacity: 0.8;
        }
        .hero-body {
            font-size: 16px;
            color: var(--text-muted);
            line-height: 1.75;
            margin-bottom: 32px;
            max-width: 480px;
        }
        .hero-actions {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--teal);
            color: #fff;
            font-family: 'Sora', sans-serif;
            font-weight: 600;
            font-size: 15px;
            padding: 14px 28px;
            border-radius: 10px;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 4px 16px rgba(14,165,233,0.3);
        }
        .btn-primary:hover { background: #0284c7; transform: translateY(-2px); box-shadow: 0 6px 24px rgba(14,165,233,0.4); }
        .btn-ghost {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            color: var(--navy);
            font-family: 'Sora', sans-serif;
            font-weight: 600;
            font-size: 15px;
            padding: 14px 28px;
            border-radius: 10px;
            border: 2px solid var(--border);
            transition: border-color 0.2s, color 0.2s, transform 0.15s;
        }
        .btn-ghost:hover { border-color: var(--teal); color: var(--teal); transform: translateY(-2px); }

        /* Dashboard Mockup */
        .hero-visual {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .mockup-card {
            background: var(--bg-white);
            border-radius: 20px;
            padding: 28px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 24px 64px rgba(15,76,129,0.18), 0 4px 16px rgba(15,76,129,0.08);
            transform: perspective(900px) rotateY(-8deg) rotateX(3deg);
            transition: transform 0.4s ease;
        }
        .mockup-card:hover { transform: perspective(900px) rotateY(0deg) rotateX(0deg); }
        .mockup-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .mockup-title {
            font-family: 'Sora', sans-serif;
            font-size: 13px;
            font-weight: 700;
            color: var(--text-primary);
        }
        .mockup-badge {
            font-size: 11px;
            font-weight: 600;
            background: #dcfce7;
            color: #166534;
            padding: 3px 10px;
            border-radius: 100px;
        }
        .stat-pills {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }
        .stat-pill {
            background: var(--bg-page);
            border-radius: 10px;
            padding: 12px 10px;
            text-align: center;
        }
        .stat-pill .val {
            font-family: 'Sora', sans-serif;
            font-size: 20px;
            font-weight: 800;
            color: var(--navy);
            line-height: 1;
        }
        .stat-pill .lbl {
            font-size: 10px;
            color: var(--text-muted);
            margin-top: 4px;
            font-weight: 600;
        }
        .stat-pill.accent .val { color: var(--teal); }
        .stat-pill.warn .val { color: #ef4444; }
        .compliance-bars { margin-bottom: 20px; }
        .compliance-bars h4 {
            font-size: 11px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 12px;
        }
        .bar-row { margin-bottom: 10px; }
        .bar-row-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }
        .bar-label { font-size: 12px; font-weight: 600; color: var(--text-primary); }
        .bar-pct { font-size: 12px; font-weight: 700; color: var(--teal); }
        .bar-track {
            height: 7px;
            background: var(--bg-page);
            border-radius: 100px;
            overflow: hidden;
        }
        .bar-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--teal), #38bdf8);
            border-radius: 100px;
        }
        .risk-badges { display: flex; gap: 8px; flex-wrap: wrap; }
        .risk-badge {
            font-size: 11px;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 100px;
        }
        .rb-low  { background: #dcfce7; color: #166534; }
        .rb-med  { background: #fef9c3; color: #854d0e; }
        .rb-high { background: #fee2e2; color: #991b1b; }
        .rb-crit { background: #f3e8ff; color: #6b21a8; }

        /* ─── Trust Bar ──────────────────────────────────────── */
        .trust-bar {
            background: var(--bg-white);
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            padding: 28px 0;
        }
        .trust-inner {
            display: flex;
            align-items: center;
            gap: 24px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .trust-label {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            white-space: nowrap;
        }
        .trust-badges { display: flex; gap: 10px; flex-wrap: wrap; justify-content: center; }
        .trust-badge {
            font-size: 12px;
            font-weight: 700;
            padding: 7px 16px;
            border-radius: 100px;
            background: var(--bg-page);
            color: var(--navy);
            border: 1.5px solid var(--border);
            transition: background 0.2s, border-color 0.2s, color 0.2s;
            cursor: default;
        }
        .trust-badge:hover { background: var(--teal-light); border-color: var(--teal); color: var(--teal); }

        /* ─── Features Section ───────────────────────────────── */
        .section-features {
            padding: 96px 0;
            background: var(--bg-page);
        }
        .section-header { text-align: center; margin-bottom: 56px; }
        .section-eyebrow {
            display: inline-block;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--teal);
            margin-bottom: 12px;
        }
        .section-title {
            font-size: clamp(26px, 3vw, 38px);
            font-weight: 800;
            color: var(--text-primary);
            line-height: 1.2;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }
        .feature-card {
            background: var(--bg-white);
            border-radius: 16px;
            padding: 32px 28px;
            border: 1.5px solid var(--border);
            position: relative;
            overflow: hidden;
            transition: transform 0.25s, box-shadow 0.25s, border-color 0.25s;
        }
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--teal), var(--navy));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }
        .feature-card:hover::before { transform: scaleX(1); }
        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(15,76,129,0.12);
            border-color: var(--teal);
        }
        .feature-icon {
            width: 52px;
            height: 52px;
            object-fit: contain;
            margin-bottom: 18px;
        }
        .feature-icon-svg {
            width: 52px;
            height: 52px;
            margin-bottom: 18px;
        }
        .feature-title {
            font-size: 17px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 8px;
        }
        .feature-desc { font-size: 14px; color: var(--text-muted); line-height: 1.65; }

        /* ─── How It Works ───────────────────────────────────── */
        .section-how {
            padding: 96px 0;
            background: var(--navy);
            position: relative;
            overflow: hidden;
        }
        .section-how::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.04) 1px, transparent 1px);
            background-size: 28px 28px;
            pointer-events: none;
        }
        .section-how .section-eyebrow { color: var(--teal); }
        .section-how .section-title { color: #fff; }
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
            height: 2px;
            border-top: 2px dashed rgba(14,165,233,0.4);
            pointer-events: none;
        }
        .step { text-align: center; position: relative; }
        .step-circle {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            border: 2px solid var(--teal);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-family: 'Sora', sans-serif;
            font-size: 14px;
            font-weight: 800;
            color: var(--teal);
            background: rgba(14,165,233,0.08);
            transition: background 0.25s, color 0.25s;
        }
        .step:hover .step-circle { background: var(--teal); color: #fff; }
        .step-title {
            font-family: 'Sora', sans-serif;
            font-size: 18px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 10px;
        }
        .step-desc { font-size: 14px; color: rgba(255,255,255,0.65); line-height: 1.65; }

        /* ─── Stats Bar ──────────────────────────────────────── */
        .section-stats {
            background: var(--bg-white);
            padding: 56px 0;
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
        .stat-item:last-child { border-right: none; }
        .stat-num {
            font-family: 'Sora', sans-serif;
            font-size: 44px;
            font-weight: 800;
            color: var(--teal);
            line-height: 1;
            margin-bottom: 8px;
        }
        .stat-label { font-size: 14px; font-weight: 600; color: var(--text-muted); }

        /* ─── Why Eagle Eye ──────────────────────────────────── */
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
        .why-heading {
            font-size: clamp(26px, 3vw, 38px);
            font-weight: 800;
            color: var(--text-primary);
            line-height: 1.25;
            margin-bottom: 20px;
        }
        .why-heading span { color: var(--teal); }
        .why-body { font-size: 16px; color: var(--text-muted); line-height: 1.75; }
        .why-items { display: flex; flex-direction: column; gap: 20px; }
        .why-item { display: flex; align-items: flex-start; gap: 16px; }
        .why-check {
            width: 36px;
            height: 36px;
            min-width: 36px;
            border-radius: 50%;
            background: var(--teal-light);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .why-check svg { width: 18px; height: 18px; }
        .why-item-text {}
        .why-item-title { font-weight: 700; font-size: 15px; color: var(--text-primary); margin-bottom: 4px; }
        .why-item-desc { font-size: 14px; color: var(--text-muted); line-height: 1.6; }

        /* ─── Final CTA ──────────────────────────────────────── */
        .section-cta {
            padding: 96px 0;
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-dark) 100%);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .section-cta::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.04) 1px, transparent 1px);
            background-size: 28px 28px;
        }
        .cta-inner { position: relative; z-index: 1; }
        .cta-title {
            font-size: clamp(24px, 3.5vw, 42px);
            font-weight: 800;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 16px;
        }
        .cta-subtitle { font-size: 17px; color: rgba(255,255,255,0.7); margin-bottom: 40px; }
        .btn-cta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--teal);
            color: #fff;
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            font-size: 17px;
            padding: 18px 40px;
            border-radius: 12px;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 4px 24px rgba(14,165,233,0.4);
        }
        .btn-cta:hover { background: #0284c7; transform: translateY(-3px); box-shadow: 0 8px 32px rgba(14,165,233,0.5); }

        /* ─── Footer ─────────────────────────────────────────── */
        .footer {
            background: var(--navy-dark);
            color: rgba(255,255,255,0.75);
            padding: 64px 0 0;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr 1fr 1fr;
            gap: 48px;
            padding-bottom: 48px;
        }
        .footer-brand img {
            width: 40px;
            height: 40px;
            object-fit: contain;
            margin-bottom: 12px;
            filter: brightness(0) invert(1);
        }
        .footer-brand-name {
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            font-size: 16px;
            color: #fff;
            margin-bottom: 8px;
        }
        .footer-tagline { font-size: 13px; line-height: 1.65; color: rgba(255,255,255,0.55); }
        .footer-col-title {
            font-family: 'Sora', sans-serif;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: rgba(255,255,255,0.5);
            margin-bottom: 16px;
        }
        .footer-links { list-style: none; display: flex; flex-direction: column; gap: 10px; }
        .footer-links a {
            font-size: 14px;
            color: rgba(255,255,255,0.65);
            transition: color 0.2s;
        }
        .footer-links a:hover { color: var(--teal); }
        .footer-contact-item { font-size: 14px; color: rgba(255,255,255,0.65); margin-bottom: 10px; }
        .footer-bar {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding: 20px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }
        .footer-copy { font-size: 13px; color: rgba(255,255,255,0.4); }
        .footer-arabic {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
            font-size: 13px;
            color: rgba(255,255,255,0.4);
            direction: rtl;
        }

        /* ─── Responsive ─────────────────────────────────────── */
        @media (max-width: 1024px) {
            .hero-inner { grid-template-columns: 1fr; gap: 0; }
            .hero-visual { display: none; }
            .hero { min-height: auto; padding: 100px 0 64px; }
            .features-grid { grid-template-columns: repeat(2, 1fr); }
            .footer-grid { grid-template-columns: 1fr 1fr; }
            .why-grid { grid-template-columns: 1fr; gap: 40px; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 0; }
            .stat-item:nth-child(2) { border-right: none; }
            .stat-item:nth-child(3) { border-top: 1px solid var(--border); }
            .stat-item:nth-child(4) { border-top: 1px solid var(--border); border-right: none; }
            .stat-item { padding: 24px; }
        }

        @media (max-width: 768px) {
            .nav-links, .nav-cta { display: none; }
            .hamburger { display: flex; }
            .features-grid { grid-template-columns: 1fr; }
            .steps-row { grid-template-columns: 1fr; gap: 32px; }
            .steps-row::before { display: none; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .footer-grid { grid-template-columns: 1fr; }
            .footer-bar { flex-direction: column; text-align: center; }
            .hero-h1 { font-size: 28px; }
            .section-title { font-size: 24px; }
        }
    </style>
</head>
<body>

    <!-- ─── Navbar ──────────────────────────────────────── -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <div class="nav-inner">
                <a href="/" class="nav-brand">
                    <img src="/Images/Eagle_Eye_Logo.png" alt="Eagle Eye Logo">
                    <div class="nav-brand-text">
                        <div class="brand-name">Eagle Eye</div>
                        <div class="brand-sub">GRC Platform</div>
                    </div>
                </a>
                <ul class="nav-links">
                    <li><a href="#features">Features</a></li>
                    <li><a href="#modules">Modules</a></li>
                    <li><a href="#standards">Standards</a></li>
                    <li><a href="#about">About</a></li>
                </ul>
                <a href="/login" class="nav-cta">Enter Platform &rarr;</a>
                <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
        <div class="mobile-drawer" id="mobileDrawer">
            <a href="#features">Features</a>
            <a href="#modules">Modules</a>
            <a href="#standards">Standards</a>
            <a href="#about">About</a>
            <a href="/login" class="mobile-cta">Enter Platform &rarr;</a>
        </div>
    </nav>

    <!-- ─── Hero ────────────────────────────────────────── -->
    <section class="hero">
        <div class="hero-blob"></div>
        <div class="container">
            <div class="hero-inner">
                <div class="hero-content">
                    <div class="hero-overline anim-1">GRC Platform for KSA</div>
                    <h1 class="hero-h1 anim-2">Govern. Manage Risk.<br><span>Stay Compliant.</span></h1>
                    <p class="hero-arabic anim-3">منصة الحوكمة والمخاطر والامتثال</p>
                    <p class="hero-body anim-4">Eagle Eye is an enterprise GRC platform built for Saudi Arabia's regulatory landscape — covering SAMA-CSF, NCA ECC, ISO 27001, and PDPL in one unified system.</p>
                    <div class="hero-actions anim-5">
                        <a href="/login" class="btn-primary">Enter Platform &rarr;</a>
                        <a href="#features" class="btn-ghost">Learn More &darr;</a>
                    </div>
                </div>
                <div class="hero-visual anim-right">
                    <div class="mockup-card">
                        <div class="mockup-header">
                            <span class="mockup-title">GRC Dashboard</span>
                            <span class="mockup-badge">Live</span>
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
                        <div class="compliance-bars">
                            <h4>Compliance Progress</h4>
                            <div class="bar-row">
                                <div class="bar-row-top">
                                    <span class="bar-label">SAMA-CSF</span>
                                    <span class="bar-pct">91%</span>
                                </div>
                                <div class="bar-track"><div class="bar-fill" style="width:91%"></div></div>
                            </div>
                            <div class="bar-row">
                                <div class="bar-row-top">
                                    <span class="bar-label">NCA ECC</span>
                                    <span class="bar-pct">78%</span>
                                </div>
                                <div class="bar-track"><div class="bar-fill" style="width:78%"></div></div>
                            </div>
                            <div class="bar-row">
                                <div class="bar-row-top">
                                    <span class="bar-label">ISO 27001</span>
                                    <span class="bar-pct">85%</span>
                                </div>
                                <div class="bar-track"><div class="bar-fill" style="width:85%"></div></div>
                            </div>
                        </div>
                        <div class="risk-badges">
                            <span class="risk-badge rb-low">Low: 18</span>
                            <span class="risk-badge rb-med">Medium: 9</span>
                            <span class="risk-badge rb-high">High: 5</span>
                            <span class="risk-badge rb-crit">Critical: 2</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── Trust Bar ─────────────────────────────────── -->
    <div class="trust-bar" id="standards">
        <div class="container">
            <div class="trust-inner">
                <span class="trust-label">Compliant with Leading Standards:</span>
                <div class="trust-badges">
                    <span class="trust-badge">SAMA-CSF</span>
                    <span class="trust-badge">NCA ECC</span>
                    <span class="trust-badge">ISO 27001</span>
                    <span class="trust-badge">PDPL</span>
                    <span class="trust-badge">NIST CSF</span>
                    <span class="trust-badge">CITC</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ─── Features Grid ─────────────────────────────── -->
    <section class="section-features" id="features">
        <div class="container">
            <div class="section-header">
                <span class="section-eyebrow reveal">Platform Capabilities</span>
                <h2 class="section-title reveal reveal-delay-1">Everything You Need</h2>
            </div>
            <div class="features-grid" id="modules">
                <div class="feature-card reveal">
                    <img src="/Images/16-FireFlame.png" alt="Risk Assessment" class="feature-icon">
                    <div class="feature-title">Risk Assessment</div>
                    <p class="feature-desc">Identify, evaluate, and treat organizational risks using structured methodologies aligned with ISO 27005.</p>
                </div>
                <div class="feature-card reveal reveal-delay-1">
                    <img src="/Images/11-CisoIcon.png" alt="Audit Management" class="feature-icon">
                    <div class="feature-title">Audit Management</div>
                    <p class="feature-desc">Plan and track internal audits, findings, and remediation workflows with full lifecycle traceability.</p>
                </div>
                <div class="feature-card reveal reveal-delay-2">
                    <img src="/Images/13-LockIcon.png" alt="Controls Framework" class="feature-icon">
                    <div class="feature-title">Controls Framework</div>
                    <p class="feature-desc">Manage your control library across multiple frameworks with evidence collection and effectiveness scoring.</p>
                </div>
                <div class="feature-card reveal reveal-delay-1">
                    <img src="/Images/12-ComplianceIcon.png" alt="Regulatory Compliance" class="feature-icon">
                    <div class="feature-title">Regulatory Compliance</div>
                    <p class="feature-desc">Monitor compliance posture against SAMA-CSF, NCA ECC, ISO 27001, PDPL, and NIST in real time.</p>
                </div>
                <div class="feature-card reveal reveal-delay-2">
                    <img src="/Images/14-Lifebuoy.png" alt="Asset Management" class="feature-icon">
                    <div class="feature-title">Asset Management</div>
                    <p class="feature-desc">Catalogue and classify information assets, link them to risks and controls, and track ownership.</p>
                </div>
                <div class="feature-card reveal reveal-delay-3">
                    <svg class="feature-icon-svg" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="52" height="52" rx="12" fill="#E0F2FE"/>
                        <rect x="12" y="32" width="6" height="10" rx="2" fill="#0EA5E9"/>
                        <rect x="22" y="24" width="6" height="18" rx="2" fill="#0F4C81"/>
                        <rect x="32" y="16" width="6" height="26" rx="2" fill="#0EA5E9"/>
                    </svg>
                    <div class="feature-title">Executive Reporting</div>
                    <p class="feature-desc">Generate board-ready PDF reports and dashboards showing GRC posture across all domains.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── How It Works ──────────────────────────────── -->
    <section class="section-how">
        <div class="container">
            <div class="section-header">
                <span class="section-eyebrow reveal">Simple Process</span>
                <h2 class="section-title reveal reveal-delay-1">How It Works</h2>
            </div>
            <div class="steps-row">
                <div class="step reveal">
                    <div class="step-circle">01</div>
                    <div class="step-title">Assess</div>
                    <p class="step-desc">Identify assets, threats, and vulnerabilities. Score risks using quantitative and qualitative methods.</p>
                </div>
                <div class="step reveal reveal-delay-2">
                    <div class="step-circle">02</div>
                    <div class="step-title">Control</div>
                    <p class="step-desc">Map controls to risks and frameworks. Collect evidence, assign owners, and track implementation.</p>
                </div>
                <div class="step reveal reveal-delay-4">
                    <div class="step-circle">03</div>
                    <div class="step-title">Report</div>
                    <p class="step-desc">Generate compliance reports, executive dashboards, and audit-ready documentation in seconds.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── Stats Bar ─────────────────────────────────── -->
    <section class="section-stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item reveal">
                    <div class="stat-num">500+</div>
                    <div class="stat-label">Controls</div>
                </div>
                <div class="stat-item reveal reveal-delay-1">
                    <div class="stat-num">10+</div>
                    <div class="stat-label">Standards</div>
                </div>
                <div class="stat-item reveal reveal-delay-2">
                    <div class="stat-num">Multi</div>
                    <div class="stat-label">Framework Coverage</div>
                </div>
                <div class="stat-item reveal reveal-delay-3">
                    <div class="stat-num">ع&amp;EN</div>
                    <div class="stat-label">Arabic + English</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── Why Eagle Eye ──────────────────────────────── -->
    <section class="section-why" id="about">
        <div class="container">
            <div class="why-grid">
                <div class="reveal">
                    <h2 class="why-heading">Built for the Saudi<br><span>Regulatory Landscape</span></h2>
                    <p class="why-body">Eagle Eye was designed from the ground up for organizations operating under Saudi Arabia's cybersecurity and data protection regulations. Native support for SAMA-CSF and NCA ECC means no mapping or translation — just compliance out of the box.</p>
                </div>
                <div class="why-items">
                    <div class="why-item reveal">
                        <div class="why-check">
                            <svg viewBox="0 0 18 18" fill="none"><path d="M3.5 9.5l4 4 7-8" stroke="#0EA5E9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <div class="why-item-text">
                            <div class="why-item-title">SAMA-CSF &amp; NCA ECC Native</div>
                            <div class="why-item-desc">Pre-loaded control libraries and assessment templates for both frameworks.</div>
                        </div>
                    </div>
                    <div class="why-item reveal reveal-delay-1">
                        <div class="why-check">
                            <svg viewBox="0 0 18 18" fill="none"><path d="M3.5 9.5l4 4 7-8" stroke="#0EA5E9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <div class="why-item-text">
                            <div class="why-item-title">Arabic-First Interface</div>
                            <div class="why-item-desc">Full RTL support and Arabic-language reports for local teams and regulators.</div>
                        </div>
                    </div>
                    <div class="why-item reveal reveal-delay-2">
                        <div class="why-check">
                            <svg viewBox="0 0 18 18" fill="none"><path d="M3.5 9.5l4 4 7-8" stroke="#0EA5E9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <div class="why-item-text">
                            <div class="why-item-title">Role-Based Access Control</div>
                            <div class="why-item-desc">CISO, auditor, and analyst roles with granular permission sets per module.</div>
                        </div>
                    </div>
                    <div class="why-item reveal reveal-delay-3">
                        <div class="why-check">
                            <svg viewBox="0 0 18 18" fill="none"><path d="M3.5 9.5l4 4 7-8" stroke="#0EA5E9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <div class="why-item-text">
                            <div class="why-item-title">Audit-Ready PDF Reports</div>
                            <div class="why-item-desc">One-click export of risk assessments, audit findings, and compliance summaries.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── Final CTA ─────────────────────────────────── -->
    <section class="section-cta">
        <div class="container">
            <div class="cta-inner">
                <h2 class="cta-title reveal">Ready to Take Control of<br>Your GRC Program?</h2>
                <p class="cta-subtitle reveal reveal-delay-1">Join organizations across the Kingdom managing compliance the smart way.</p>
                <a href="/login" class="btn-cta reveal reveal-delay-2">Enter Platform &rarr;</a>
            </div>
        </div>
    </section>

    <!-- ─── Footer ────────────────────────────────────── -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <img src="/Images/Eagle_Eye_Logo.png" alt="Eagle Eye Logo">
                    <div class="footer-brand-name">Eagle Eye GRC</div>
                    <p class="footer-tagline">Enterprise governance, risk management, and compliance for the Saudi regulatory landscape.</p>
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
                    <div class="footer-contact-item" style="font-family:'IBM Plex Sans Arabic',sans-serif;direction:rtl;">المملكة العربية السعودية</div>
                </div>
            </div>
            <div class="footer-bar">
                <span class="footer-copy">&copy; {{ date('Y') }} Eagle Eye GRC. All rights reserved.</span>
                <span class="footer-arabic">نسر العيون — منصة الحوكمة والمخاطر والامتثال</span>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function () {
            navbar.classList.toggle('scrolled', window.scrollY > 40);
        }, { passive: true });

        // Hamburger
        const hamburger = document.getElementById('hamburger');
        const drawer = document.getElementById('mobileDrawer');
        hamburger.addEventListener('click', function () {
            const open = drawer.classList.toggle('open');
            hamburger.setAttribute('aria-expanded', String(open));
        });
        drawer.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                drawer.classList.remove('open');
                hamburger.setAttribute('aria-expanded', 'false');
            });
        });

        // Intersection Observer — reveal
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });
        document.querySelectorAll('.reveal').forEach(function (el) { observer.observe(el); });

        // Smooth scroll with navbar offset
        document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
            anchor.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (!target) return;
                e.preventDefault();
                const offset = navbar.offsetHeight + 12;
                const top = target.getBoundingClientRect().top + window.pageYOffset - offset;
                window.scrollTo({ top: top, behavior: 'smooth' });
            });
        });
    </script>
</body>
</html>
