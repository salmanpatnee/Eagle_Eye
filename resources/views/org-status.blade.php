<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Posture Brief — Eagle Eye GRC</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        *, *::before, *::after { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            padding: 0;
            background: #f0f4f8;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            overflow-x: hidden;
        }

        /* ── TOP HEADER (exact compliance page) ── */
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

        /* ── PAGE ── */
        .page-main {
            padding: 24px 16px 48px;
        }

        /* ── SECTION HEADER (exact compliance page) ── */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            border-left: 4px solid #203864;
            padding: 12px 16px;
            margin: 0 0 20px;
            border-radius: 0 6px 6px 0;
            box-shadow: 0 1px 4px rgba(32,56,100,0.07);
        }

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

        /* ── CHART GRID ── */
        .charts-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 24px;
        }

        /* ── CHART CARD (dashboard style) ── */
        .chart-card {
            background: #fff;
            border: 1px solid #E2E8F0;
            border-radius: 12px;
            padding: 20px 22px;
            box-shadow: 0 1px 4px rgba(15,23,42,0.06);
            position: relative;
            overflow: hidden;
            transition: box-shadow 0.2s, transform 0.2s;
        }

        .chart-card:hover {
            box-shadow: 0 4px 16px rgba(15,23,42,0.1);
            transform: translateY(-2px);
        }

        .chart-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, #2563EB 0%, #0EA5E9 100%);
            border-radius: 12px 12px 0 0;
        }

        .chart-card-title {
            font-size: 11px;
            font-weight: 700;
            color: #0B2447;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 14px;
            padding-bottom: 10px;
            border-bottom: 1px solid #F1F5F9;
        }


        /* ── CTA ── */
        .cta-row {
            text-align: center;
            margin-top: 8px;
        }

        .cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #203864;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            padding: 12px 32px;
            border-radius: 8px;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(32,56,100,0.22);
        }

        .cta-btn:hover {
            background: #2e74b6;
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(32,56,100,0.3);
        }

        .cta-btn svg {
            width: 16px; height: 16px;
            transition: transform 0.2s;
        }

        .cta-btn:hover svg { transform: translateX(3px); }

        @media (max-width: 640px) {
            .charts-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    {{-- Header — exact compliance page structure --}}
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
            <form action="{{ route('login.destroy') }}" method="POST">
                @csrf
                <button type="submit" class="header-logout-btn">
                    <p>Logout</p>
                    <p>تسجيل الخروج</p>
                </button>
            </form>
        </div>
    </div>

    <div class="page-main">
        <div>

            {{-- Section header — exact compliance page style --}}
            <div class="section-header">
                <div>
                    <h2 class="section-title-en">Organization Security Posture</h2>
                    <h2 class="section-title-ar">ملخص الوضع الأمني للمنظمة</h2>
                </div>
            </div>

            {{-- 2×2 Chart Grid --}}
            <div class="charts-grid">

                {{-- NCA ECC --}}
                <div class="chart-card">
                    <div class="chart-card-title">NCA ECC Compliance Status</div>
                    <canvas id="eccChart"></canvas>
                </div>

                {{-- SAMA CSF --}}
                <div class="chart-card">
                    <div class="chart-card-title">SAMA CSF Compliance Status</div>
                    <canvas id="samaChart"></canvas>
                </div>

                {{-- Risk Status --}}
                <div class="chart-card">
                    <div class="chart-card-title">Risk Status</div>
                    <canvas id="riskChart"></canvas>
                </div>

                {{-- Assets by Group --}}
                <div class="chart-card">
                    <div class="chart-card-title">Assets by Group</div>
                    <canvas id="assetGroupChart"></canvas>
                </div>

            </div>

            {{-- CTA — inline/centered, not full width --}}
            <div class="cta-row">
                <a href="{{ route('compliance') }}" class="cta-btn">
                    Enter Compliance Portal
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                    </svg>
                </a>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>

    <script>
        // ── Shared pie options (identical to createPieChart in compliance-dashboard.js) ──
        function pieOpts(showZero) {
            return {
                title: { display: false },
                legend: { display: true, position: 'left' },
                plugins: {
                    labels: {
                        render: 'percentage',
                        showZero: showZero || false,
                        fontSize: 20,
                        fontColor: '#fff',
                        arc: false,
                        position: 'border',
                    }
                }
            };
        }

        // NCA ECC
        new Chart('eccChart', {
            type: 'pie',
            data: {
                labels: Object.keys(@json($eccComplianceStatus)),
                datasets: [{
                    backgroundColor: ['#228B22', '#FF0000', '#FFC107', '#9E9E9E'],
                    data: Object.values(@json($eccComplianceStatus))
                }]
            },
            options: pieOpts()
        });

        // SAMA CSF
        new Chart('samaChart', {
            type: 'pie',
            data: {
                labels: Object.keys(@json($samaComplianceStatus)),
                datasets: [{
                    backgroundColor: ['#228B22', '#FF0000', '#FFC107', '#9E9E9E'],
                    data: Object.values(@json($samaComplianceStatus))
                }]
            },
            options: pieOpts(true)
        });

        // Risk Status (same pie style, custom red/green colors)
        var riskData = @json($riskStatus);
        new Chart('riskChart', {
            type: 'pie',
            data: {
                labels: ['Open', 'Closed'],
                datasets: [{
                    backgroundColor: ['#DC2626', '#059669'],
                    data: [riskData.Open, riskData.Closed]
                }]
            },
            options: pieOpts()
        });

        // Asset Groups (same as createBarChart in compliance-dashboard.js)
        var ag = @json($assetGroupOverview);
        new Chart('assetGroupChart', {
            type: 'bar',
            data: {
                labels: ag.assetGroupLabels,
                datasets: [{
                    backgroundColor: '#2563EB',
                    data: ag.assetCounts
                }]
            },
            options: {
                legend: { display: false },
                scales: {
                    xAxes: [{
                        ticks: { fontSize: 10, fontColor: '#000', lineHeight: 1.5, padding: 4 }
                    }]
                },
                plugins: {
                    labels: { render: 'value', fontColor: '#fff', arc: false }
                }
            }
        });
    </script>

</body>
</html>
