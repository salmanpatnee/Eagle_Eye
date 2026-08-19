<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Posture Brief — Eagle Eye GRC</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('Images/favicon.ico') }}">
    <script>if(JSON.parse(localStorage.getItem('darkMode')))document.documentElement.classList.add('dark');</script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700;9..40,800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg:        #ECF0F7;
            --surface:   #FFFFFF;
            --surface-2: #F8FAFD;
            --border:    rgba(15,30,80,0.09);
            --border-hi: rgba(37,99,235,0.3);
            --text-1:    #0B1D3A;
            --text-2:    #4B6280;
            --text-3:    #8FA3BE;
            --accent:    #2563EB;
            --cyan:      #0891B2;
            --green:     #059669;
            --amber:     #D97706;
            --red:       #DC2626;
            --radius:    10px;
        }
        :root.dark {
            --bg:        #0D1526;
            --surface:   #162035;
            --surface-2: #1A2740;
            --border:    rgba(255,255,255,0.07);
            --border-hi: rgba(59,130,246,0.35);
            --text-1:    #E8EDF5;
            --text-2:    #8FA3BE;
            --text-3:    #4B6280;
        }
        .theme-toggle-btn {
            background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15);
            color: rgba(255,255,255,0.75); border-radius: 6px; padding: 5px 9px;
            cursor: pointer; display: flex; align-items: center; transition: all 0.18s;
        }
        .theme-toggle-btn:hover { background: rgba(255,255,255,0.14); color: #fff; }
        .theme-icon-moon { display: block; }
        .theme-icon-sun  { display: none; }
        :root.dark .theme-icon-moon { display: none; }
        :root.dark .theme-icon-sun  { display: block; }
        :root.dark .obligation-table th { background: #1A2740; }
        :root.dark .obligation-table td { color: var(--text-1); }
        :root.dark .obligation-table tbody tr:hover td { background: rgba(59,130,246,0.07); }
        :root.dark .compliance-bar-bg { background: #2A3F5F; }
        :root.dark .kpi-card--amber .kpi-value { color: #F59E0B; }
        :root.dark .chart-card { box-shadow: 0 1px 3px rgba(0,0,0,0.3); }

        *, *::before, *::after { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            margin: 0; padding: 0;
            background: var(--bg);
            font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            color: var(--text-1);
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed; inset: 0; pointer-events: none; z-index: 0;
            background:
                radial-gradient(ellipse 55% 45% at 10% 10%, rgba(37,99,235,0.05) 0%, transparent 65%),
                radial-gradient(ellipse 40% 35% at 90% 90%, rgba(8,145,178,0.04) 0%, transparent 65%);
        }

        /* ── HEADER ── */
        .top-header {
            position: sticky; top: 0; z-index: 200;
            height: 52px;
            background: #1E3A5F;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 20px;
            box-shadow: 0 1px 0 rgba(255,255,255,0.06), 0 4px 20px rgba(10,20,50,0.22);
        }

        .header-left  { display: flex; align-items: center; gap: 14px; }
        .header-right { display: flex; align-items: center; gap: 12px; }

        .header-home-link {
            display: flex; align-items: center; gap: 10px;
            color: #fff; text-decoration: none;
        }

        .header-title    { display: flex; flex-direction: column; line-height: 1.25; }
        .header-title-en { font-size: 13px; font-weight: 700; color: #fff; letter-spacing: 0.2px; }
        .header-title-ar { font-size: 10px; font-weight: 400; color: rgba(255,255,255,0.5); }

        .header-logout-btn {
            background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15);
            color: rgba(255,255,255,0.75); border-radius: 6px; padding: 4px 12px;
            cursor: pointer; font-size: 11px; font-family: inherit;
            line-height: 1.5; text-align: center; transition: all 0.18s;
        }
        .header-logout-btn:hover {
            background: rgba(239,68,68,0.15); border-color: rgba(239,68,68,0.35); color: #FCA5A5;
        }
        .header-logout-btn p { margin: 0; padding: 0; }

        /* ── PAGE ── */
        .page-main { position: relative; z-index: 1; padding: 12px 16px 14px; }

        /* ── SECTION HEADER ── */
        .section-header { display: flex; align-items: center; gap: 10px; margin: 0 0 10px; }
        .sh-bar  { width: 3px; height: 16px; border-radius: 2px; background: linear-gradient(180deg,#2563EB,#0891B2); flex-shrink: 0; }
        .sh-text { font-size: 10.5px; font-weight: 700; color: var(--text-2); text-transform: uppercase; letter-spacing: 0.1em; margin: 0; }
        .sh-rule { flex: 1; height: 1px; background: linear-gradient(90deg, var(--border) 0%, transparent 100%); }

        /* ── KPI BANNER ── */
        .kpi-banner { display: grid; grid-template-columns: repeat(5,1fr); gap: 10px; margin-bottom: 10px; }

        .kpi-card {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: var(--radius); padding: 12px 16px;
            display: flex; align-items: center; gap: 13px;
            position: relative; overflow: hidden;
            box-shadow: 0 1px 3px rgba(10,20,60,0.06), 0 4px 12px rgba(10,20,60,0.04);
            transition: border-color 0.2s, box-shadow 0.2s, transform 0.2s;
        }
        .kpi-card:hover {
            border-color: var(--border-hi);
            box-shadow: 0 2px 8px rgba(10,20,60,0.1), 0 8px 24px rgba(37,99,235,0.1);
            transform: translateY(-1px);
        }

        .kpi-pill { width: 3px; height: 38px; border-radius: 2px; flex-shrink: 0; }
        .kpi-card--blue   .kpi-pill { background: linear-gradient(180deg,#2563EB,#0891B2); box-shadow: 0 0 8px rgba(37,99,235,0.35); }
        .kpi-card--red    .kpi-pill { background: linear-gradient(180deg,#DC2626,#EA580C); box-shadow: 0 0 8px rgba(220,38,38,0.35); }
        .kpi-card--amber  .kpi-pill { background: linear-gradient(180deg,#D97706,#F59E0B); box-shadow: 0 0 8px rgba(217,119,6,0.35); }
        .kpi-card--green  .kpi-pill { background: linear-gradient(180deg,#059669,#10B981); box-shadow: 0 0 8px rgba(5,150,105,0.35); }
        .kpi-card--orange .kpi-pill { background: linear-gradient(180deg,#EA580C,#F97316); box-shadow: 0 0 8px rgba(234,88,12,0.35); }

        .kpi-body { display: flex; flex-direction: column; gap: 2px; }
        .kpi-label { font-size: 9px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.09em; color: var(--text-3); }
        .kpi-value { font-size: 28px; font-weight: 800; line-height: 1; font-variant-numeric: tabular-nums; }
        .kpi-card--blue   .kpi-value { color: #1D4ED8; }
        .kpi-card--red    .kpi-value { color: #DC2626; }
        .kpi-card--amber  .kpi-value { color: #B45309; }
        .kpi-card--green  .kpi-value { color: #047857; }
        .kpi-card--orange .kpi-value { color: #C2410C; }

        /* ── CHART CARD ── */
        .chart-card {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: var(--radius); padding: 11px 13px 8px;
            position: relative; overflow: hidden;
            box-shadow: 0 1px 3px rgba(10,20,60,0.06), 0 4px 12px rgba(10,20,60,0.04);
            transition: border-color 0.2s, box-shadow 0.2s, transform 0.2s;
        }
        .chart-card:hover {
            border-color: var(--border-hi);
            box-shadow: 0 2px 8px rgba(10,20,60,0.1), 0 8px 28px rgba(37,99,235,0.1);
            transform: translateY(-1px);
        }
        .chart-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
            background: linear-gradient(90deg,#2563EB 0%,#0891B2 45%,transparent 100%);
        }

        .chart-card-title {
            display: flex; align-items: center; gap: 7px;
            font-size: 9.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.09em;
            color: var(--text-2);
            margin-bottom: 6px; padding-bottom: 6px;
            border-bottom: 1px solid rgba(15,30,80,0.07);
        }
        .chart-card-title::before {
            content: ''; width: 4px; height: 4px; border-radius: 50%; flex-shrink: 0;
            background: #2563EB; box-shadow: 0 0 5px rgba(37,99,235,0.5);
        }

        /* ── OBLIGATION TABLE ── */
        .obligation-table { width: 100%; border-collapse: collapse; font-size: 11px; }
        .obligation-table th {
            background: #F8FAFD; color: var(--text-3);
            font-weight: 700; font-size: 8.5px; text-transform: uppercase; letter-spacing: 0.07em;
            padding: 6px 8px; text-align: left; border-bottom: 1px solid var(--border);
        }
        .obligation-table td {
            padding: 7px 8px; border-bottom: 1px solid rgba(15,30,80,0.055);
            color: var(--text-1); vertical-align: middle;
        }
        .obligation-table tr:last-child td { border-bottom: none; }
        .obligation-table tbody tr:hover td { background: rgba(37,99,235,0.03); }

        .compliance-bar-wrap { display: flex; align-items: center; gap: 5px; }
        .compliance-bar-bg   { flex: 1; height: 4px; background: #E8EDF5; border-radius: 2px; overflow: hidden; }
        .compliance-bar-fill { height: 100%; border-radius: 2px; background: linear-gradient(90deg,#2563EB,#0891B2); }

        .risk-badge { display: inline-block; font-size: 8px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; padding: 2px 6px; border-radius: 4px; }
        .risk-badge--high   { background: #FEE2E2; color: #B91C1C; border: 1px solid #FECACA; }
        .risk-badge--medium { background: #FEF3C7; color: #92400E; border: 1px solid #FDE68A; }
        .risk-badge--low    { background: #D1FAE5; color: #065F46; border: 1px solid #A7F3D0; }
        .risk-badge--unrated { background: #F1F5F9; color: #64748B; border: 1px solid #E2E8F0; }
        :root.dark .risk-badge--unrated { background: rgba(148,163,184,0.12); color: #94A3B8; border-color: rgba(148,163,184,0.25); }

        /* ── GRID ROWS ── */
        .dash-row-main {
            display: grid; grid-template-columns: 28% 18% 18% 36%;
            gap: 10px; margin-bottom: 10px; height: 340px;
        }
        .dash-row-bottom {
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 10px; margin-bottom: 10px; height: 265px;
        }
        .chart-card-empty {
            display: flex; align-items: center; justify-content: center; text-align: center;
            height: calc(100% - 26px); color: var(--text-2); font-size: 11.5px; line-height: 1.5; padding: 0 10px;
        }
        .dash-row-main  > .chart-card,
        .dash-row-bottom > .chart-card { height: 100%; overflow: hidden; }

        /* ── CTA ── */
        .cta-row { text-align: center; margin-top: 4px; }
        .cta-btn {
            display: inline-flex; align-items: center; gap: 8px;
            background: linear-gradient(135deg,#1D4ED8,#2563EB);
            color: #fff; text-decoration: none;
            font-size: 13px; font-weight: 600; font-family: inherit;
            padding: 9px 28px; border-radius: 8px;
            transition: all 0.2s;
            box-shadow: 0 1px 3px rgba(29,78,216,0.2), 0 4px 16px rgba(37,99,235,0.28);
            letter-spacing: 0.01em;
        }
        .cta-btn:hover {
            background: linear-gradient(135deg,#2563EB,#3B82F6);
            box-shadow: 0 2px 6px rgba(29,78,216,0.25), 0 8px 24px rgba(37,99,235,0.38);
            transform: translateY(-1px);
        }
        .cta-btn svg { width: 14px; height: 14px; transition: transform 0.2s; }
        .cta-btn:hover svg { transform: translateX(3px); }

        @media (max-width: 1100px) {
            .kpi-banner { grid-template-columns: repeat(3,1fr); }
        }
        @media (max-width: 900px) {
            .kpi-banner      { grid-template-columns: repeat(2,1fr); }
            .dash-row-main   { grid-template-columns: 1fr 1fr; height: auto; }
            .dash-row-bottom { grid-template-columns: 1fr 1fr; height: auto; }
        }
        @media (max-width: 640px) {
            .kpi-banner, .dash-row-main, .dash-row-bottom { grid-template-columns: 1fr; height: auto; }
        }
    </style>
</head>
<body>

    <div class="top-header">
        <div class="header-left">
            <a href="{{ route('compliance') }}" class="header-home-link">
                <i class='bx bx-home'></i>
                <div class="header-title">
                    <span class="header-title-en">Eagle Eye GRC</span>
                    <span class="header-title-ar">نظام إدارة المخاطر</span>
                </div>
            </a>
        </div>
        <div class="header-right">
            <button class="theme-toggle-btn" onclick="document.documentElement.classList.toggle('dark');localStorage.setItem('darkMode',JSON.stringify(document.documentElement.classList.contains('dark')));location.reload()" aria-label="Toggle dark mode">
                <svg class="theme-icon-sun" width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.99998 1.5415C10.4142 1.5415 10.75 1.87729 10.75 2.2915V3.5415C10.75 3.95572 10.4142 4.2915 9.99998 4.2915C9.58577 4.2915 9.24998 3.95572 9.24998 3.5415V2.2915C9.24998 1.87729 9.58577 1.5415 9.99998 1.5415ZM10.0009 6.79327C8.22978 6.79327 6.79402 8.22904 6.79402 10.0001C6.79402 11.7712 8.22978 13.207 10.0009 13.207C11.772 13.207 13.2078 11.7712 13.2078 10.0001C13.2078 8.22904 11.772 6.79327 10.0009 6.79327ZM5.29402 10.0001C5.29402 7.40061 7.40135 5.29327 10.0009 5.29327C12.6004 5.29327 14.7078 7.40061 14.7078 10.0001C14.7078 12.5997 12.6004 14.707 10.0009 14.707C7.40135 14.707 5.29402 12.5997 5.29402 10.0001ZM15.9813 5.08035C16.2742 4.78746 16.2742 4.31258 15.9813 4.01969C15.6884 3.7268 15.2135 3.7268 14.9207 4.01969L14.0368 4.90357C13.7439 5.19647 13.7439 5.67134 14.0368 5.96423C14.3297 6.25713 14.8045 6.25713 15.0974 5.96423L15.9813 5.08035ZM18.4577 10.0001C18.4577 10.4143 18.1219 10.7501 17.7077 10.7501H16.4577C16.0435 10.7501 15.7077 10.4143 15.7077 10.0001C15.7077 9.58592 16.0435 9.25013 16.4577 9.25013H17.7077C18.1219 9.25013 18.4577 9.58592 18.4577 10.0001ZM14.9207 15.9806C15.2135 16.2735 15.6884 16.2735 15.9813 15.9806C16.2742 15.6877 16.2742 15.2128 15.9813 14.9199L15.0974 14.036C14.8045 13.7431 14.3297 13.7431 14.0368 14.036C13.7439 14.3289 13.7439 14.8038 14.0368 15.0967L14.9207 15.9806ZM9.99998 15.7088C10.4142 15.7088 10.75 16.0445 10.75 16.4588V17.7088C10.75 18.123 10.4142 18.4588 9.99998 18.4588C9.58577 18.4588 9.24998 18.123 9.24998 17.7088V16.4588C9.24998 16.0445 9.58577 15.7088 9.99998 15.7088ZM5.96356 15.0972C6.25646 14.8043 6.25646 14.3295 5.96356 14.0366C5.67067 13.7437 5.1958 13.7437 4.9029 14.0366L4.01902 14.9204C3.72613 15.2133 3.72613 15.6882 4.01902 15.9811C4.31191 16.274 4.78679 16.274 5.07968 15.9811L5.96356 15.0972ZM4.29224 10.0001C4.29224 10.4143 3.95645 10.7501 3.54224 10.7501H2.29224C1.87802 10.7501 1.54224 10.4143 1.54224 10.0001C1.54224 9.58592 1.87802 9.25013 2.29224 9.25013H3.54224C3.95645 9.25013 4.29224 9.58592 4.29224 10.0001ZM4.9029 5.9637C5.1958 6.25659 5.67067 6.25659 5.96356 5.9637C6.25646 5.6708 6.25646 5.19593 5.96356 4.90303L5.07968 4.01915C4.78679 3.72626 4.31191 3.72626 4.01902 4.01915C3.72613 4.31204 3.72613 4.78692 4.01902 5.07981L4.9029 5.9637Z" fill="currentColor"/></svg>
                <svg class="theme-icon-moon" width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.4547 11.97L18.1799 12.1611C18.265 11.8383 18.1265 11.4982 17.8401 11.3266C17.5538 11.1551 17.1885 11.1934 16.944 11.4207L17.4547 11.97ZM8.0306 2.5459L8.57989 3.05657C8.80718 2.81209 8.84554 2.44682 8.67398 2.16046C8.50243 1.8741 8.16227 1.73559 7.83948 1.82066L8.0306 2.5459ZM12.9154 13.0035C9.64678 13.0035 6.99707 10.3538 6.99707 7.08524H5.49707C5.49707 11.1823 8.81835 14.5035 12.9154 14.5035V13.0035ZM16.944 11.4207C15.8869 12.4035 14.4721 13.0035 12.9154 13.0035V14.5035C14.8657 14.5035 16.6418 13.7499 17.9654 12.5193L16.944 11.4207ZM16.7295 11.7789C15.9437 14.7607 13.2277 16.9586 10.0003 16.9586V18.4586C13.9257 18.4586 17.2249 15.7853 18.1799 12.1611L16.7295 11.7789ZM10.0003 16.9586C6.15734 16.9586 3.04199 13.8433 3.04199 10.0003H1.54199C1.54199 14.6717 5.32892 18.4586 10.0003 18.4586V16.9586ZM3.04199 10.0003C3.04199 6.77289 5.23988 4.05695 8.22173 3.27114L7.83948 1.82066C4.21532 2.77574 1.54199 6.07486 1.54199 10.0003H3.04199ZM6.99707 7.08524C6.99707 5.52854 7.5971 4.11366 8.57989 3.05657L7.48132 2.03522C6.25073 3.35885 5.49707 5.13487 5.49707 7.08524H6.99707Z" fill="currentColor"/></svg>
            </button>
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
    </div>

    <div class="page-main">

        <div class="section-header">
            <div class="sh-bar"></div>
            <h2 class="sh-text">Organization Security Posture</h2>
            <div class="sh-rule"></div>
        </div>

        {{-- KPI Banner --}}
        <div class="kpi-banner">
            <div class="kpi-card kpi-card--blue">
                <div class="kpi-pill"></div>
                <div class="kpi-body">
                    <span class="kpi-label">Control Assessment Coverage</span>
                    <span class="kpi-value">{{ $dashboardData['controlCoverage']['coverage'] }}%</span>
                </div>
            </div>
            <div class="kpi-card kpi-card--red">
                <div class="kpi-pill"></div>
                <div class="kpi-body">
                    <span class="kpi-label">Unassessed Controls</span>
                    <span class="kpi-value">{{ $dashboardData['controlCoverage']['total'] - $dashboardData['controlCoverage']['assessed'] }}</span>
                </div>
            </div>
            <div class="kpi-card kpi-card--amber">
                <div class="kpi-pill"></div>
                <div class="kpi-body">
                    <span class="kpi-label">Risk Assessment Coverage</span>
                    <span class="kpi-value">{{ $dashboardData['riskCoverage']['coverage'] }}%</span>
                </div>
            </div>
            <div class="kpi-card kpi-card--orange">
                <div class="kpi-pill"></div>
                <div class="kpi-body">
                    <span class="kpi-label">Open Risks</span>
                    <span class="kpi-value">{{ $dashboardData['openRisks'] }}</span>
                </div>
            </div>
            <div class="kpi-card kpi-card--green">
                <div class="kpi-pill"></div>
                <div class="kpi-body">
                    <span class="kpi-label">Controls Implemented</span>
                    <span class="kpi-value">{{ $dashboardData['controlsImplementedPct'] }}%</span>
                </div>
            </div>
        </div>

        {{-- Main 4-col row --}}
        <div class="dash-row-main">

            <div class="chart-card" style="overflow-x:auto">
                <div class="chart-card-title">Framework Compliance Scorecard</div>
                <table class="obligation-table">
                    <thead>
                        <tr><th>Framework</th><th>Assessed</th><th>Compliance</th><th>Risk</th></tr>
                    </thead>
                    <tbody>
                        @foreach($dashboardData['frameworks'] as $fw)
                        @php
                            $s = $fw['status'];
                            $total = array_sum($s);
                            $assessed = $total - ($s['Not Yet Assessed'] ?? 0);
                            $compliance = $assessed > 0 ? round(($s['Implemented'] ?? 0) / $assessed * 100) : 0;
                            $risk = $assessed === 0 ? 'Unrated' : ($compliance < 50 ? 'High' : ($compliance < 80 ? 'Medium' : 'Low'));
                        @endphp
                        <tr>
                            <td>{{ $fw['name'] }}</td>
                            <td style="white-space:nowrap;color:var(--text-2);font-size:10px">{{ $assessed }} of {{ $total }}</td>
                            <td>
                                <div class="compliance-bar-wrap">
                                    <div class="compliance-bar-bg">
                                        <div class="compliance-bar-fill" style="width:{{ $compliance }}%"></div>
                                    </div>
                                    <span style="font-size:9.5px;color:var(--text-2);white-space:nowrap;font-variant-numeric:tabular-nums">{{ $compliance }}%</span>
                                </div>
                            </td>
                            <td><span class="risk-badge risk-badge--{{ strtolower($risk) }}">{{ $risk }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="chart-card">
                <div class="chart-card-title">Control Implementation Status</div>
                <div id="controlStatusChart"></div>
            </div>

            <div class="chart-card">
                <div class="chart-card-title">Risk Status</div>
                <div id="riskChart"></div>
            </div>

            <div class="chart-card">
                <div class="chart-card-title">Top Risk Categories</div>
                <div id="topRisksChart"></div>
            </div>

        </div>

        {{-- Bottom 3-col row --}}
        <div class="dash-row-bottom">
            <div class="chart-card"><div class="chart-card-title">Asset Group Risk Exposure</div><div id="assetGroupChart"></div></div>
            <div class="chart-card"><div class="chart-card-title">Control Ownership Accountability</div><div id="ownershipChart"></div></div>
            <div class="chart-card">
                <div class="chart-card-title">Risk Heatmap — Impact × Likelihood</div>
                @if($dashboardData['hasRiskScoreVariance'])
                    <div id="riskHeatmapChart"></div>
                @else
                    <div class="chart-card-empty">Risk scoring has not yet been differentiated across the register — heatmap unavailable.</div>
                @endif
            </div>
        </div>

        <div class="cta-row">
            <a href="{{ route('compliance') }}" class="cta-btn">
                Enter Compliance Portal
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>

    </div>

    <script src="{{ asset('js/apexcharts.js') }}"></script>
    <script>
        var FONT   = "'DM Sans', sans-serif";
        var isDark    = document.documentElement.classList.contains('dark');
        var C_FG      = isDark ? '#8FA3BE' : '#4B6280';
        var C_BG      = 'transparent';
        var C_SRF     = isDark ? '#162035' : '#FFFFFF';
        var C_LBL     = isDark ? '#E8EDF5' : '#0B1D3A';
        var C_TOOLTIP = isDark ? 'dark' : 'light';

        var dd = @json($dashboardData);

        // ── Compact donut factory ──────────────────────────────────────────────
        function apexDonut(id, labels, series, colors, centerLabel, height) {
            new ApexCharts(document.getElementById(id), {
                chart: {
                    type: 'donut', height: height || 210,
                    fontFamily: FONT, background: C_BG, foreColor: C_FG,
                    toolbar: { show: false },
                    animations: { enabled: true, easing: 'easeinout', speed: 500 }
                },
                series: series, labels: labels, colors: colors,
                dataLabels: { enabled: false },
                stroke: { width: 2, colors: [C_SRF] },
                legend: {
                    position: 'bottom', fontSize: '9px', fontFamily: FONT,
                    labels: { colors: C_FG },
                    markers: { width: 6, height: 6, radius: 2 },
                    itemMargin: { horizontal: 4, vertical: 0 }, offsetY: 4
                },
                tooltip: { theme: C_TOOLTIP, style: { fontSize: '11px', fontFamily: FONT } },
                plotOptions: { pie: { donut: { size: '66%', labels: { show: true,
                    name:  { show: true,  fontSize: '9px',  color: C_FG,  offsetY: -4 },
                    value: { show: true,  fontSize: '19px', fontWeight: 800, color: C_LBL, offsetY: 4,
                        formatter: function(val) { return val; }
                    },
                    total: { show: true, showAlways: true, label: centerLabel || 'Total',
                        fontSize: '9px', fontWeight: 600, color: C_FG,
                        formatter: function(w) {
                            return w.globals.seriesTotals.reduce(function(a,b){return a+b;}, 0);
                        }
                    }
                }}}}
            }).render();
        }

        // Control Implementation Status (5-bucket, all controls)
        apexDonut('controlStatusChart',
            ['Implemented', 'Partially Implemented', 'Not Implemented', 'Not Applicable', 'Not Yet Assessed'],
            [
                dd.controlImplementationStatus['Implemented'],
                dd.controlImplementationStatus['Partially Implemented'],
                dd.controlImplementationStatus['Not Implemented'],
                dd.controlImplementationStatus['Not Applicable'],
                dd.controlImplementationStatus['Not Yet Assessed']
            ],
            ['#059669', '#D97706', '#DC2626', '#94A3B8', '#475569'],
            'Controls', 210);

        // Risk Status (Open / Closed / Not Yet Assessed)
        apexDonut('riskChart',
            ['Open', 'Closed', 'Not Yet Assessed'],
            [dd.riskStatus['Open'], dd.riskStatus['Closed'], dd.riskStatus['Not Yet Assessed']],
            ['#DC2626', '#059669', '#475569'],
            'Risks', 210);

        // Top Risk Categories — horizontal bar
        new ApexCharts(document.getElementById('topRisksChart'), {
            chart: { type: 'bar', height: 280, fontFamily: FONT, background: C_BG, foreColor: C_FG, toolbar: { show: false } },
            series: [{ name: 'Risks', data: dd.riskCategories.counts }],
            xaxis: {
                categories: dd.riskCategories.labels,
                labels: { style: { colors: C_FG, fontSize: '9.5px' } },
                axisBorder: { show: false }, axisTicks: { show: false }
            },
            yaxis: { labels: { style: { colors: C_FG, fontSize: '9.5px' } } },
            colors: ['#2563EB'],
            fill: { type: 'gradient', gradient: { type: 'horizontal', gradientToColors: ['#0891B2'], stops: [0, 100] } },
            plotOptions: { bar: { horizontal: true, barHeight: '58%', borderRadius: 3, dataLabels: { position: 'center' } } },
            dataLabels: { enabled: true, offsetX: 0, style: { fontSize: '9.5px', colors: ['#fff'], fontWeight: 700 } },
            grid: { borderColor: 'rgba(15,30,80,0.07)', strokeDashArray: 3, padding: { left: 0, right: 8 } },
            legend: { show: false },
            tooltip: { theme: C_TOOLTIP, style: { fontSize: '11px', fontFamily: FONT } }
        }).render();

        // Asset Group Risk Exposure — stacked horizontal bar
        new ApexCharts(document.getElementById('assetGroupChart'), {
            chart: { type: 'bar', height: 210, stacked: true, fontFamily: FONT, background: C_BG, foreColor: C_FG, toolbar: { show: false } },
            series: [
                { name: 'Open', data: dd.assetGroupExposure.open },
                { name: 'Closed', data: dd.assetGroupExposure.closed },
                { name: 'Not Yet Assessed', data: dd.assetGroupExposure.notYetAssessed }
            ],
            xaxis: {
                categories: dd.assetGroupExposure.labels,
                labels: { style: { colors: C_FG, fontSize: '8.5px' } },
                axisBorder: { show: false }, axisTicks: { show: false }
            },
            yaxis: { labels: { style: { colors: C_FG, fontSize: '8.5px' } } },
            colors: ['#DC2626', '#059669', '#475569'],
            plotOptions: { bar: { horizontal: true, barHeight: '65%', borderRadius: 2 } },
            dataLabels: { enabled: false },
            grid: { borderColor: 'rgba(15,30,80,0.07)', strokeDashArray: 3, padding: { left: 0, right: 8 } },
            legend: { show: true, position: 'top', fontSize: '8.5px', fontFamily: FONT, labels: { colors: C_FG },
                markers: { width: 6, height: 6, radius: 2 }, itemMargin: { horizontal: 4 }, offsetY: -2 },
            tooltip: { theme: C_TOOLTIP, style: { fontSize: '11px', fontFamily: FONT } }
        }).render();

        // Control Ownership Accountability — top owners by unassessed count, stacked horizontal bar
        new ApexCharts(document.getElementById('ownershipChart'), {
            chart: { type: 'bar', height: 210, stacked: true, fontFamily: FONT, background: C_BG, foreColor: C_FG, toolbar: { show: false } },
            series: [
                { name: 'Implemented', data: dd.controlOwners.implemented },
                { name: 'Partial', data: dd.controlOwners.partiallyImplemented },
                { name: 'Not Implemented', data: dd.controlOwners.notImplemented },
                { name: 'Not Applicable', data: dd.controlOwners.notApplicable },
                { name: 'Not Yet Assessed', data: dd.controlOwners.notYetAssessed }
            ],
            xaxis: {
                categories: dd.controlOwners.labels,
                labels: { style: { colors: C_FG, fontSize: '8.5px' } },
                axisBorder: { show: false }, axisTicks: { show: false }
            },
            yaxis: { labels: { style: { colors: C_FG, fontSize: '8px' } } },
            colors: ['#059669', '#D97706', '#DC2626', '#94A3B8', '#475569'],
            plotOptions: { bar: { horizontal: true, barHeight: '70%', borderRadius: 2 } },
            dataLabels: { enabled: false },
            grid: { borderColor: 'rgba(15,30,80,0.07)', strokeDashArray: 3, padding: { left: 0, right: 8 } },
            legend: { show: true, position: 'top', fontSize: '8px', fontFamily: FONT, labels: { colors: C_FG },
                markers: { width: 6, height: 6, radius: 2 }, itemMargin: { horizontal: 3 }, offsetY: -2 },
            tooltip: { theme: C_TOOLTIP, style: { fontSize: '11px', fontFamily: FONT } }
        }).render();

        // Risk Heatmap — only rendered when the register has score variance
        if (dd.hasRiskScoreVariance) {
            var HM = isDark ? {
                none:     '#334155',
                low:      '#14532D',
                moderate: '#78350F',
                high:     '#7C2D12',
                critical: '#7F1D1D',
                label:    '#E8EDF5'
            } : {
                none:     '#CBD5E1',
                low:      '#6EE7B7',
                moderate: '#FCD34D',
                high:     '#FB923C',
                critical: '#F87171',
                label:    '#1E3A5F'
            };
            var hmSeries = dd.riskHeatmap.map(function(row) {
                return { name: row.name, data: row.data };
            });
            new ApexCharts(document.getElementById('riskHeatmapChart'), {
                chart: { type: 'heatmap', height: 210, fontFamily: FONT, background: C_BG, foreColor: C_FG, toolbar: { show: false } },
                series: hmSeries,
                xaxis: {
                    categories: ['Likelihood 1','2','3','4','5'],
                    labels: { style: { colors: C_FG, fontSize: '8.5px' } },
                    axisBorder: { show: false }, axisTicks: { show: false }
                },
                yaxis: { labels: { style: { colors: C_FG, fontSize: '8.5px' }, offsetX: -6 } },
                dataLabels: {
                    enabled: true,
                    style: { fontSize: '9px', colors: [HM.label], fontWeight: 600 },
                    formatter: function(val) { return val; }
                },
                plotOptions: { heatmap: {
                    shadeIntensity: 0, radius: 3,
                    colorScale: { ranges: [
                        { from: 0,  to: 0,   color: HM.none,     name: 'None'     },
                        { from: 1,  to: 3,   color: HM.low,      name: 'Low'      },
                        { from: 4,  to: 8,   color: HM.moderate, name: 'Moderate' },
                        { from: 9,  to: 15,  color: HM.high,     name: 'High'     },
                        { from: 16, to: 999, color: HM.critical, name: 'Critical' }
                    ]}
                }},
                grid: { padding: { top: -8, right: 4, bottom: 0, left: 12 } },
                legend: {
                    show: true, position: 'top', fontSize: '8.5px', fontFamily: FONT,
                    labels: { colors: C_FG },
                    markers: { width: 7, height: 7, radius: 2 },
                    itemMargin: { horizontal: 4 }, offsetY: -2
                },
                tooltip: { theme: C_TOOLTIP, style: { fontSize: '11px', fontFamily: FONT } }
            }).render();
        }
    </script>

</body>
</html>
