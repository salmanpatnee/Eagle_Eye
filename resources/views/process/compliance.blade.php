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
            background: #fff;
            border-left: 4px solid #203864;
            padding: 12px 16px;
            margin: 28px 0 14px;
            border-radius: 0 6px 6px 0;
            box-shadow: 0 1px 4px rgba(32,56,100,0.07);
        }
        .section-header:first-child { margin-top: 0; }

        .section-title-en {
            font-size: 13px;
            font-weight: 700;
            color: #203864;
            margin: 0;
        }
        .section-title-ar {
            font-size: 12px;
            font-weight: 400;
            color: #64748b;
            margin: 0;
            text-align: right;
        }

        /* ── CARD GRID ── */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 4px;
        }

        /* ── CARD ── */
        .card-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-left: 4px solid #203864;
            border-radius: 8px;
            display: flex;
            align-items: center;
            min-height: 72px;
            overflow: hidden;
            transition: box-shadow 0.2s ease, transform 0.18s ease, border-left-color 0.2s ease;
        }
        .card:hover {
            box-shadow: 0 4px 12px rgba(32,56,100,0.12);
            transform: translateY(-2px);
            border-left-color: #2e74b6;
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
                <div class="sidebar-label">Navigation</div>
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
                    <i class='bx bxs-check-shield'></i> Control & Risk
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
            <div class="card-grid">
                <a href="{{ route('organizations.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-cog'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">الإعداد الأولي</p>
                            <hr class="card-sep">
                            <p class="card-en">Initial Setup</p>
                        </div>
                    </div>
                </a>
                <a href="/assets" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-server'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">سجل الأصول</p>
                            <hr class="card-sep">
                            <p class="card-en">Asset Register</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('artifacts.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-file-find'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">تتبع الأدلة</p>
                            <hr class="card-sep">
                            <p class="card-en">Evidence Tracking</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('users.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-user-circle'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">المستخدمين</p>
                            <hr class="card-sep">
                            <p class="card-en">Users</p>
                        </div>
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
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-layer'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">مجموعة الأصول</p>
                            <hr class="card-sep">
                            <p class="card-en">Asset Group</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('threat-agents.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-shield-x'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">إدارة التهديدات</p>
                            <hr class="card-sep">
                            <p class="card-en">Threat Management</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('vulnerabilities.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-bug'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">إدارة نقاط الضعف</p>
                            <hr class="card-sep">
                            <p class="card-en">Vulnerability Management</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('risk-methodology.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-book-open'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">منهجية المخاطر</p>
                            <hr class="card-sep">
                            <p class="card-en">Risk Methodology</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('risks.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-search-alt-2'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">تحديد المخاطر</p>
                            <hr class="card-sep">
                            <p class="card-en">Risk Identification</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('risk-appetites.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-bar-chart-square'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">الرغبة في المخاطرة</p>
                            <hr class="card-sep">
                            <p class="card-en">Risk Appetite</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('controls.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-check-shield'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">تحديد الضوابط</p>
                            <hr class="card-sep">
                            <p class="card-en">Control Identification</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('risk-vs-control.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-first-aid'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">علاج المخاطر</p>
                            <hr class="card-sep">
                            <p class="card-en">Risk Treatment</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('risk-vs-asset-group.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-link-alt'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">المخاطر على مجموعة الأصول</p>
                            <hr class="card-sep">
                            <p class="card-en">Risk on Asset Group</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('risk-acceptances.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-check-circle'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">قبول المخاطر</p>
                            <hr class="card-sep">
                            <p class="card-en">Risk Acceptance</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('risk-register.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-spreadsheet'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">سجل المخاطر</p>
                            <hr class="card-sep">
                            <p class="card-en">Risk Register</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('risk-status.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-chart'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">حالة المخاطر</p>
                            <hr class="card-sep">
                            <p class="card-en">Risk Status</p>
                        </div>
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
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-bar-chart-alt-2'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">المراجع مؤشرات الأداء الرئيسية</p>
                            <hr class="card-sep">
                            <p class="card-en">KPI References</p>
                        </div>
                    </div>
                </a>
                <a href="/nca-regulatory-reports" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-institution'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">التقارير التنظيمية NCA</p>
                            <hr class="card-sep">
                            <p class="card-en">NCA Regulatory Reporting</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('sama-regulatory-report.show') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-bank'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">التقارير التنظيمية SAMA</p>
                            <hr class="card-sep">
                            <p class="card-en">SAMA Regulatory Reporting</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('mis-report.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-pie-chart-alt-2'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">تقارير نظم المعلومات الإدارية</p>
                            <hr class="card-sep">
                            <p class="card-en">MIS Reporting</p>
                        </div>
                    </div>
                </a>
                <a href="/dashboard" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-dashboard'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">لوحة القيادة</p>
                            <hr class="card-sep">
                            <p class="card-en">Dashboard</p>
                        </div>
                    </div>
                </a>
                <a href="/" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-shield'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">استراتيجية الأمن السيبراني</p>
                            <hr class="card-sep">
                            <p class="card-en">Cybersecurity Strategy</p>
                        </div>
                    </div>
                </a>
                <a href="/" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-file'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">ميثاق الأمن السيبراني</p>
                            <hr class="card-sep">
                            <p class="card-en">Cybersecurity Charter</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('compliance') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-category'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">ثلاثون زائد إطار العمل</p>
                            <hr class="card-sep">
                            <p class="card-en">30+ Frameworks</p>
                        </div>
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
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-archive'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">تسجيل سجل</p>
                            <hr class="card-sep">
                            <p class="card-en">Artifact Registration</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('evidences.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-file-plus'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">تسجيل الدليل</p>
                            <hr class="card-sep">
                            <p class="card-en">Register an Evidence</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('control-vs-evidence.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-link'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">الدليل المتعلق بالضوابط</p>
                            <hr class="card-sep">
                            <p class="card-en">Evidence vs Control</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- ── CONTROL & RISK ASSESSMENT ── -->
            <div id="section-control-risk" class="section-header">
                <p class="section-title-en">Control Assessment &amp; Risk Assessment</p>
                <p class="section-title-ar">تقييم الضوابط وتقييم المخاطر</p>
            </div>
            <div class="card-grid">
                <a href="{{ route('control-assessments.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-check-square'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">تقييم الضوابط</p>
                            <hr class="card-sep">
                            <p class="card-en">Control Assessment</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('controls.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bx-list-ul'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">قائمة الضوابط</p>
                            <hr class="card-sep">
                            <p class="card-en">Control Listing</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('control-smart-search.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bx-search-alt'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">الضوابط في البحث الذكي</p>
                            <hr class="card-sep">
                            <p class="card-en">Control Smart Search</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('risk-assessments.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-target-lock'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">تقييم المخاطر</p>
                            <hr class="card-sep">
                            <p class="card-en">Risk Assessment</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('risks.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-list-check'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">قائمة المخاطر</p>
                            <hr class="card-sep">
                            <p class="card-en">Risk Listing</p>
                        </div>
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
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-calendar'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">تخطيط مراجعة والتسجيل</p>
                            <hr class="card-sep">
                            <p class="card-en">Audit Planning</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('audit-plan-report.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-calendar-check'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">خطة التدقيق</p>
                            <hr class="card-sep">
                            <p class="card-en">Audit Plan</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('audit-assessments.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-report'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">نتائج مراجعة</p>
                            <hr class="card-sep">
                            <p class="card-en">Audit Findings</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('control-vs-audit.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-analyse'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">الضوابط المتعلقة بنتائج مراجعة</p>
                            <hr class="card-sep">
                            <p class="card-en card-en-sm">Control vs Audit Findings</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- ── VA / PEN TESTING ── -->
            <div id="section-vapt" class="section-header">
                <p class="section-title-en">Vulnerability Assessment / Penetration Test Tracking</p>
                <p class="section-title-ar">تتبع تقييم الثغرات الأمنية / اختبار الاختراق</p>
            </div>
            <div class="card-grid">
                <a href="{{ route('patches.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-bug-alt'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">القضايا المفتوحة لاختبار الثغرات</p>
                            <hr class="card-sep">
                            <p class="card-en">VA-Pen Test Open Issues</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('pen-test-asset-vs-risk.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-shield-minus'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">الأصول المعرضة للثغرات الأمنية</p>
                            <hr class="card-sep">
                            <p class="card-en">Assets at Risks WRT VA</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('va-pen-test-dashboard.index') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-tachometer'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">لوحة تحكم اختبار الثغرات الأمنية</p>
                            <hr class="card-sep">
                            <p class="card-en">VA Pen Test Dashboard</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('va.register') }}" class="card-link">
                    <div class="card">
                        <div class="card-icon"><div class="card-icon-inner"><i class='bx bxs-data'></i></div></div>
                        <div class="card-body">
                            <p class="card-ar">سجل الثغرات الأمنية</p>
                            <hr class="card-sep">
                            <p class="card-en">Vulnerability Register</p>
                        </div>
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
        const sectionIds = ['section-initial','section-grc','section-reporting','section-evidence','section-control-risk','section-audit','section-vapt'];

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
