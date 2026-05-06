<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compliance 360 — Eagle Eye GRC</title>
    <meta name="title" content="Eagle Eye GRC">
    <meta name="description" content="Eagle Eye GRC Compliance Processes">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('/css/style.css?v=1.40') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('Images/favicon.ico') }}"> 
    <style>
        :root { --hh: 64px; }

        *, *::before, *::after { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            padding: 0;
            background: #f0f4f8;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            overflow-x: hidden;
        }

        /* ── TOP HEADER ── */
        .top-header {
            position: sticky;
            top: 0;
            z-index: 200;
            background: #203864;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.18);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .hamburger-btn {
            display: none;
            background: none;
            border: none;
            color: #fff;
            font-size: 22px;
            cursor: pointer;
            padding: 4px 6px;
            border-radius: 4px;
            line-height: 1;
        }
        .hamburger-btn:hover { background: rgba(255,255,255,0.12); }

        .header-home-link {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #fff;
            text-decoration: none;
        }
        .header-home-link i { font-size: 20px; }

        .header-title {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }
        .header-title-en {
            font-size: 13px;
            font-weight: 700;
            color: #fff;
            letter-spacing: 0.3px;
        }
        .header-title-ar {
            font-size: 11px;
            font-weight: 400;
            color: rgba(255,255,255,0.75);
            text-align: right;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* Logout button override for this page */
        .header-logout-btn {
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.25);
            color: #fff;
            border-radius: 6px;
            padding: 5px 14px;
            cursor: pointer;
            font-size: 12px;
            line-height: 1.4;
            text-align: center;
            transition: background 0.2s;
        }
        .header-logout-btn:hover { background: rgba(255,255,255,0.22); }
        .header-logout-btn p { margin: 0; padding: 0; }

        /* ── PAGE SHELL: sidebar + content ── */
        .page-shell {
            display: flex;
            min-height: calc(100vh - var(--hh));
        }

        /* ── LEFT SIDEBAR ── */
        .sidebar {
            width: 220px;
            flex-shrink: 0;
            background: #fff;
            border-right: 1px solid #e2e8f0;
            position: sticky;
            top: var(--hh);
            height: calc(100vh - var(--hh));
            overflow-y: auto;
            z-index: 100;
        }

        .sidebar-inner {
            padding: 12px 0 24px;
        }

        .sidebar-label {
            font-size: 10px;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 0 16px 8px;
            margin-top: 8px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 16px;
            color: #475569;
            text-decoration: none;
            font-size: 12.5px;
            font-weight: 500;
            border-left: 3px solid transparent;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .sidebar-link i {
            font-size: 16px;
            flex-shrink: 0;
            color: #94a3b8;
            transition: color 0.15s;
        }
        .sidebar-link:hover {
            background: #f8fafc;
            color: #203864;
        }
        .sidebar-link:hover i { color: #203864; }
        .sidebar-link.active {
            background: #f0f4f8;
            color: #203864;
            font-weight: 700;
            border-left-color: #203864;
        }
        .sidebar-link.active i { color: #203864; }

        /* ── MAIN CONTENT ── */
        .main-content {
            flex: 1;
            min-width: 0;
            padding: 20px 24px 40px;
        }

        /* ── SECTION HEADER ── */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(100deg, #203864 0%, #1c3259 100%);
            padding: 14px 20px;
            margin: 28px 0 14px;
            border-radius: 8px;
            box-shadow: 0 4px 14px rgba(32,56,100,0.25);
            position: relative;
            overflow: hidden;
            border: none;
            scroll-margin-top: 80px;
        }
        .section-header:first-child { margin-top: 0; }

        /* Diagonal stripe texture */
        .section-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background: repeating-linear-gradient(
                -55deg,
                transparent,
                transparent 20px,
                rgba(255,255,255,0.03) 20px,
                rgba(255,255,255,0.03) 21px
            );
            pointer-events: none;
        }

        /* Left accent strip */
        .section-header::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(180deg, #5ba3d9 0%, #2e74b6 100%);
            border-radius: 8px 0 0 8px;
        }

        .section-title-en {
            font-size: 20px;
            font-weight: 700;
            color: #ffffff;
            margin: 0;
            letter-spacing: 0.3px;
            position: relative;
            z-index: 1;
        }
        .section-title-ar {
            font-size: 20px;
            font-weight: 400;
            color: #ffffff;
            font-weight: 700;
            margin: 0;
            text-align: right;
            position: relative;
            z-index: 1;
        }

        /* ── CARD GRID ── */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
            margin-bottom: 4px;
        }
        .card-grid--featured .card-link:first-child {
            grid-column: 2;
            grid-row: 1;
        }
        .card-grid--featured .card-link:nth-child(n+2) {
            grid-row: 2;
        }

        /* ── CARD ── */
        .card-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .card {
            background: #fff;
            border: none;
            border-radius: 14px;
            display: flex;
            align-items: center;
            min-height: 72px;
            box-shadow: 0 1px 4px rgba(32,56,100,0.06);
            transition: box-shadow 0.25s ease, transform 0.25s ease;
        }
        .card:hover {
            box-shadow: 0 10px 28px rgba(32,56,100,0.18);
            transform: translateY(-4px) scale(1.025);
        }

        .card-icon {
            flex-shrink: 0;
            width: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            align-self: stretch;
        }
        .card-icon-inner {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #eef4fb;
            color: #203864;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .card-body {
            flex: 1;
            padding: 0 12px;
            min-width: 0;
        }
        .card-ar {
            font-size: 12px;
            font-weight: 700;
            color: #203864;
            text-align: right;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .card-sep {
            border: none;
            border-bottom: 1px solid #e2e8f0;
            margin: 4px 0;
        }
        .card-en {
            font-size: 12px;
            font-weight: 600;
            color: #1a2a40;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .card-en-sm { font-size: 11px; }

        /* ── MOBILE OVERLAY BACKDROP ── */
        .sidebar-backdrop {
            display: none;
            position: fixed;
            inset: var(--hh) 0 0 0;
            background: rgba(0,0,0,0.35);
            backdrop-filter: blur(2px);
            z-index: 99;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            .card-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 640px) {
            .hamburger-btn { display: flex; align-items: center; justify-content: center; }

            .sidebar {
                position: fixed;
                top: var(--hh);
                left: -220px;
                height: calc(100vh - var(--hh));
                transition: left 0.25s ease;
                z-index: 101;
            }

            body.sidebar-open .sidebar { left: 0; }
            body.sidebar-open .sidebar-backdrop { display: block; }

            .main-content { padding: 14px 14px 32px; }

            .card-grid { grid-template-columns: 1fr; }

            .section-header { flex-direction: column; align-items: flex-start; gap: 2px; }
        }

        /* Roles partial overrides — scoped to this header */
        .top-header .navbar-nav,
        .top-header .roles-wrap { gap: 8px; }
        .top-header .img-fluid { width: 20px !important; height: 20px !important; }
        .top-header .nav-item { padding: 5px !important; }

        /* Image card — no crop, full image shown */
        .card--img {
            display: block;
            min-height: auto;
            overflow: hidden;
        }
        .card--img img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 14px;
        }

        /* Center a lone orphan in last row of 3-col grid */
        .card-grid > .card-link:last-child:nth-child(3n + 1) {
            grid-column: 2;
        }
    </style>
</head>
<body class="processpage">

    <!-- TOP HEADER -->
    <header class="top-header">
        <div class="header-left">
            <button class="hamburger-btn" id="hamburgerBtn" aria-label="Toggle navigation">
                <i class='bx bx-menu'></i>
            </button>
            <a href="/compliance" class="header-home-link">
                <i class='bx bx-home'></i>
                <div class="header-title">
                    <span class="header-title-en">Processes</span>
                    <span class="header-title-ar">العمليات</span>
                </div>
            </a>
        </div>
        <div class="header-right">
            @include('partials.roles')
            <div>
                <a href="" onclick="document.querySelector('#logout-form').submit(); return false;">
                    <button class="header-logout-btn">
                        <p>تسجيل الخروج</p>
                        <p>Logout</p>
                    </button>
                </a>
                <form id="logout-form" method="POST" action="{{ route('login.destroy') }}" style="display:none;">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            </div>
        </div>
    </header>

    <!-- SIDEBAR BACKDROP (mobile) -->
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    <div class="page-shell">
        <!-- LEFT SIDEBAR -->
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-inner">
                {{-- <div class="sidebar-label">Navigation</div> --}}
                <a href="#section-initial" class="sidebar-link active" data-section="section-initial">
                    <i class='bx bxs-cog'></i> Initial Setup
                </a>
                <a href="#section-grc" class="sidebar-link" data-section="section-grc">
                    <i class='bx bxs-shield'></i> GRC Processes
                </a>
                <a href="#section-reporting" class="sidebar-link" data-section="section-reporting">
                    <i class='bx bxs-bar-chart-alt-2'></i> Reporting
                </a>
                <a href="#section-evidence" class="sidebar-link" data-section="section-evidence">
                    <i class='bx bxs-file-find'></i> Evidence Management
                </a>
                <a href="#section-control-risk" class="sidebar-link" data-section="section-control-risk">
                    <i class='bx bxs-check-shield'></i> Control Assessment
                </a>
                <a href="#section-risk-management" class="sidebar-link" data-section="section-risk-management">
                    <i class='bx bxs-error-alt'></i> Risk Management
                </a>
                <a href="#section-audit" class="sidebar-link" data-section="section-audit">
                    <i class='bx bxs-calendar-check'></i> Audit Management
                </a>
                <a href="#section-vapt" class="sidebar-link" data-section="section-vapt">
                    <i class='bx bxs-bug-alt'></i> VA / Pen Testing
                </a>
            </div>
        </nav>

        <!-- MAIN CONTENT -->
        <main class="main-content">

            <!-- ── INITIAL SETUP ── -->
            <div id="section-initial" class="section-header">
                <p class="section-title-en">Initial Setup</p>
                <p class="section-title-ar">الإعداد الأولي</p>
            </div>
            <div class="card-grid card-grid--featured">
                <a href="{{ route('organizations.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide1.JPG') }}" alt="Initial Setup">
                    </div>
                </a>
                <a href="/assets" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide2.JPG') }}" alt="Asset Register">
                    </div>
                </a>
                
                <a href="{{ route('users.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide4.JPG') }}" alt="Users">
                    </div>
                </a>
                <a href="{{ route('artifacts.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide3.JPG') }}" alt="Evidence Tracking">
                    </div>
                </a>
            </div>

            <!-- ── GRC PROCESSES ── -->
            <div id="section-grc" class="section-header">
                <p class="section-title-en">Complete Coverage of GRC Processes</p>
                <p class="section-title-ar">تغطية كاملة لعمليات الحوكمة والمخاطر والامتثال</p>
            </div>
            <div class="card-grid">
                <a href="/asset-groups" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide5.JPG') }}" alt="Asset Group">
                    </div>
                </a>
                <a href="{{ route('threat-agents.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide6.JPG') }}" alt="Threat Management">
                    </div>
                </a>
                <a href="{{ route('vulnerabilities.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide7.JPG') }}" alt="Vulnerability Management">
                    </div>
                </a>
                <a href="{{ route('risk-methodology.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide8.JPG') }}" alt="Risk Methodology">
                    </div>
                </a>
                <a href="{{ route('risks.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide9.JPG') }}" alt="Risk Identification">
                    </div>
                </a>
                <a href="{{ route('risk-appetites.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide10.JPG') }}" alt="Risk Appetite">
                    </div>
                </a>
                <a href="{{ route('controls.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide11.JPG') }}" alt="Control Identification">
                    </div>
                </a>
                <a href="{{ route('risk-vs-control.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide12.JPG') }}" alt="Risk Treatment">
                    </div>
                </a>
                <a href="{{ route('risk-vs-asset-group.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide13.JPG') }}" alt="Risk on Asset Group">
                    </div>
                </a>
                <a href="{{ route('risk-acceptances.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide14.JPG') }}" alt="Risk Acceptance">
                    </div>
                </a>
            </div>

            <!-- ── REPORTING ── -->
            <div id="section-reporting" class="section-header">
                <p class="section-title-en">Reporting</p>
                <p class="section-title-ar">التقارير</p>
            </div>
            <div class="card-grid">
                <a href="{{ route('kpi-references.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide17.JPG') }}" alt="KPI References">
                    </div>
                </a>
                <a href="/nca-regulatory-reports" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide18.JPG') }}" alt="NCA Regulatory Reporting">
                    </div>
                </a>
                <a href="/dashboard" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide19.JPG') }}" alt="SAMA Regulatory Reporting">
                    </div>
                </a>
                <a href="{{ route('mis-report.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide23.JPG') }}" alt="MIS Reporting">
                    </div>
                </a>
                <a href="{{ route('sama-regulatory-report.show') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide20.JPG') }}" alt="Dashboard">
                    </div>
                </a>
                <a href="/" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide21.JPG') }}" alt="Cybersecurity Strategy">
                    </div>
                </a>
                <a href="/" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide24.JPG') }}" alt="Cybersecurity Charter">
                    </div>
                </a>
                <a href="{{ route('compliance') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide22.JPG') }}" alt="30+ Frameworks">
                    </div>
                </a>
            </div>

            <!-- ── EVIDENCE MANAGEMENT ── -->
            <div id="section-evidence" class="section-header">
                <p class="section-title-en">Evidence Management</p>
                <p class="section-title-ar">إدارة الدليل</p>
            </div>
            <div class="card-grid">
                <a href="{{ route('artifacts.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide25.JPG') }}" alt="Artifact Registration">
                    </div>
                </a>
                <a href="{{ route('evidences.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide26.JPG') }}" alt="Register an Evidence">
                    </div>
                </a>
                <a href="{{ route('control-vs-evidence.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide27.JPG') }}" alt="Evidence vs Control">
                    </div>
                </a>
            </div>

            <!-- ── CONTROL & RISK ASSESSMENT ── -->
            <div id="section-control-risk" class="section-header">
                <p class="section-title-en">Control Assessment</p>
                <p class="section-title-ar">تقييم الضوابط</p>
            </div>
            <div class="card-grid">
                <a href="{{ route('control-assessments.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide28.JPG') }}" alt="Control Assessment">
                    </div>
                </a>
                <a href="{{ route('controls.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide29.JPG') }}" alt="Control Listing">
                    </div>
                </a>
                <a href="{{ route('control-smart-search.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide30.JPG') }}" alt="Control Smart Search">
                    </div>
                </a>
            </div>

            <!-- ── RISK MANAGEMENT ── -->
            <div id="section-risk-management" class="section-header">
                <p class="section-title-en">Risk Management</p>
                <p class="section-title-ar">إدارة المخاطر</p>
            </div>
            <div class="card-grid">
                <a href="{{ route('risk-assessments.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide31.JPG') }}" alt="Risk Assessment">
                    </div>
                </a>
                <a href="{{ route('risk-register.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide15.JPG') }}" alt="Risk Register">
                    </div>
                </a>
                <a href="{{ route('risk-status.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide16.JPG') }}" alt="Risk Status">
                    </div>
                </a>
            </div>

            <!-- ── AUDIT MANAGEMENT ── -->
            <div id="section-audit" class="section-header">
                <p class="section-title-en">Audit Management</p>
                <p class="section-title-ar">إدارة مراجعة</p>
            </div>
            <div class="card-grid">
                <a href="{{ route('audit-plans.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide33.JPG') }}" alt="Audit Planning">
                    </div>
                </a>
                <a href="{{ route('audit-plan-report.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide34.JPG') }}" alt="Audit Plan">
                    </div>
                </a>
                <a href="{{ route('audit-assessments.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide35.JPG') }}" alt="Audit Findings">
                    </div>
                </a>
                <a href="{{ route('control-vs-audit.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide36.JPG') }}" alt="Control vs Audit Findings">
                    </div>
                </a>
            </div>

            <!-- ── VA / PEN TESTING ── -->
            <div id="section-vapt" class="section-header">
                <p class="section-title-en">Vulnerability Assessment / Penetration Test Tracking</p>
                <p class="section-title-ar">تتبع تقييم الثغرات الأمنية / اختبار الاختراق</p>
            </div>
            <div class="card-grid">
                <a href="{{ route('va-pen-tests.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide37.JPG') }}" alt="VA-Pen Test Open Issues">
                    </div>
                </a>
                <a href="{{ route('pen-test-asset-vs-risk.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide38.JPG') }}" alt="Assets at Risks WRT VA">
                    </div>
                </a>
                <a href="{{ route('va-pen-test-dashboard.index') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide39.JPG') }}" alt="VA Pen Test Dashboard">
                    </div>
                </a>
                <a href="{{ route('va.register') }}" class="card-link">
                    <div class="card card--img">
                        <img src="{{ asset('Images/Home/Slide40.JPG') }}" alt="Vulnerability Register">
                    </div>
                </a>
            </div>

        </main>
    </div>

    <script>
        // Hamburger toggle
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const backdrop = document.getElementById('sidebarBackdrop');

        function closeSidebar() { document.body.classList.remove('sidebar-open'); }

        hamburgerBtn.addEventListener('click', () => {
            document.body.classList.toggle('sidebar-open');
        });
        backdrop.addEventListener('click', closeSidebar);

        // Close sidebar on nav link click (mobile)
        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 640) closeSidebar();
            });
        });

        // IntersectionObserver — highlight active sidebar link on scroll
        const sectionIds = ['section-initial','section-grc','section-reporting','section-evidence','section-control-risk','section-risk-management','section-audit','section-vapt'];

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.id;
                    document.querySelectorAll('.sidebar-link').forEach(link => {
                        link.classList.toggle('active', link.dataset.section === id);
                    });
                }
            });
        }, { rootMargin: '-56px 0px -60% 0px', threshold: 0 });

        sectionIds.forEach(id => {
            const el = document.getElementById(id);
            if (el) observer.observe(el);
        });
    </script>
</body>
</html>
