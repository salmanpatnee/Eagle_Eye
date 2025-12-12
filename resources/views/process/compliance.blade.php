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
    {{-- <link rel="stylesheet" href="{{ asset('/css/6-Header/1-MainPageHeader.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <style>
        .text-center {
            text-align: center !important;
        }

        .gap-3 {
            gap: 1rem !important;
        }

        .d-flex {
            display: flex !important;
        }

        .align-items-center {
            align-items: center !important;
        }

        .gap-2 {
            gap: .5rem !important;
        }

        .navbar-nav {
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .bg-white {
            background-color: #fff !important;
        }

        .fs-6 {
            font-size: 1rem !important;
        }

        .p-2 {
            padding: .5rem !important;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .bg-info {
            background-color: #6ba8b5 !important;
        }

        /* ===== COMPREHENSIVE MOBILE RESPONSIVE FIXES ===== */
        /* Prevent horizontal scrolling and ensure proper viewport */
        body {
            overflow-x: hidden;
            max-width: 100vw;
            margin: 0;
            padding: 0;
        }

        /* Ensure proper box sizing */
        * {
            box-sizing: border-box;
        }

        /* Make header fully responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 15px;
                padding: 15px;
                align-items: center;
            }

            .header-content>div:first-child {
                order: 1;
                /* text-align: center; */
            }

            .header-content>div:last-child {
                order: 2;
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .text-center.d-flex.gap-3 {
                gap: 10px !important;
                flex-wrap: wrap;
                justify-content: center;
            }
        }

        /* Make processes fully responsive */
        @media (max-width: 1024px) {
            .processes {
                display: flex !important;
                flex-direction: column !important;
                gap: 20px !important;
                align-items: center;
            }

            .singleitemprocess {
                display: flex !important;
                justify-content: center;
                /* width: 100%; */
            }

            .itemprocesses {
                width: 100%;
                max-width: 400px;
                min-height: auto;
            }
        }

        /* Tablet specific adjustments */
        @media (max-width: 768px) and (min-width: 481px) {
            #desktop {
                padding: 20px;
            }

            .sectionhead {
                margin: 20px 0 15px 0;
                padding: 15px;
            }

            .itemprocesses {
                padding: 20px;
                min-height: 120px;
                margin: auto;
            }

            .boxicon {
                width: 50px;
                height: 50px;
                font-size: 1.3rem;
                display: flex;
                align-items: center;
            }
        }

        /* Mobile specific adjustments */
        @media (max-width: 480px) {
            #desktop {
                padding: 15px;
            }

            .sectionhead {
                margin: 15px 0 10px 0;
                padding: 12px;
            }

            .itemprocesses {
                min-height: auto;
                padding: 15px;
                margin: 0;
            }

            .boxicon {
                width: 45px;
                height: 45px;
                font-size: 1.2rem;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .boxarbtext {
                font-size: 0.9rem;
            }

            .boxengtext,
            .boxengtexttwo {
                font-size: 0.8rem;
            }

            .seperatorline {
                width: 100%;
                height: 1px;
            }

            .header-content>div:first-child a {
                font-size: 1.3rem;
            }

            .RightButton {
                padding: 8px 12px;
                font-size: 0.8rem;
            }
        }

        /* Very small mobile adjustments */
        @media (max-width: 360px) {



            #desktop {
                padding: 10px;
            }

            .sectionhead {
                padding: 10px;
            }

            .itemprocesses {
                padding: 12px;
            }

            .boxicon {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
            }

            .boxarbtext {
                font-size: 0.8rem;
            }

            .boxengtext,
            .boxengtexttwo {
                font-size: 0.7rem;
            }

            .header-content>div:first-child a {
                font-size: 1.2rem;
            }
        }

        /* Ensure spacebox doesn't break layout on mobile */
        @media (max-width: 1024px) {
            .boxhyperlink {

                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
            }

            .spacebox {
                display: none !important;
            }
        }

        /* Fix any potential flex issues */
        .processes {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        /* Ensure proper touch targets on mobile */
        @media (max-width: 768px) {
            .boxhyperlink {
                min-height: 44px;
                display: flex;
                align-items: center;
                width: 100%;
            }

            .roles-wrap {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>

<body class="processpage">
    <header>
        <div class="header-content" id="header">
            <div>
                <a href="/vciso" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
            </div>

            <div class="text-center d-flex gap-3 roles-wrap">
                @include('partials.roles')

                <div>
                    <a href="" onclick="document.querySelector('#logout-form').submit(); return false;">
                        <button class="RightButton">
                            <p class="RightButtonArbTxt">تسجيل الخروج</p>
                            <p class="RightButtonTxt">Logout</p>
                        </button>
                    </a>
                    <form id="logout-form" method="POST" action="{{ route('login.destroy') }}" style="display: none;">
                        @csrf
                        <button type="submit"> Log Out</button>
                    </form>
                </div>
            </div>


        </div>
    </header>
    <div id="desktop">
        <!-- Initial Setup -->
        <div>
            <div class="sectionhead">
                <p>Initial Setup</p>
                <p>الإعداد الأولي</p>
            </div>
        </div>
        <div class="singleitemprocess">
            <a href="{{ route('organizations.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">الإعداد الأولي</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Initial Setup</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="processes">
            <a href="/assets" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">سجل الأصول</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Asset Register</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('artifacts.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">تتبع الأدلة</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Evidence Tracking</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('users.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">المستخدمين</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Users</p>
                    </div>
                </div>
            </a>
        </div>
        <!-- GRC Processes -->
        <div>
            <div class="sectionhead">
                <p>Complete Coverage of GRC Processes</p>
                <p>تغطية كاملة لعمليات الحوكمة والمخاطر والامتثال</p>
            </div>
        </div>
        <div class="processes">
            <a href="/asset-groups" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">مجموعة الأصول</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Asset Group</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('threat-agents.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">إدارة التهديدات</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Threat Management</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('vulnerabilities.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">إدارة نقاط الضعف</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Vulnerability Management</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="processes">
            <a href="{{ route('risk-methodology.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">منهجية المخاطر</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Risk Methodology</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('risks.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">تحديد المخاطر</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Risk Identification</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('risk-appetites.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">الرغبة في المخاطرة</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Risk Appetite</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="processes">
            <a href="{{ route('controls.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">تحديد الضوابط</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Control Identification</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('risk-vs-control.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">علاج المخاطر</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Risk Treatment</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('risk-vs-asset-group.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">المخاطر على مجموعة الأصول</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Risk on Asset Group</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="processes">
            <a href="{{ route('risk-acceptances.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">قبول المخاطر</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Risk Acceptance</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('risk-register.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">سجل المخاطر</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Risk Register</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('risk-status.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">حالة المخاطر</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Risk Status</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="processes">
            <div class="spacebox"></div>
            <a href="{{ route('va.register') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">سجل الثغرات الأمنية</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Vulnerability Regsiter</p>
                    </div>
                </div>
            </a>
            <div class="spacebox"></div>
        </div>
        <!-- Reporting -->
        <div>
            <div class="sectionhead">
                <p>Reporting</p>
                <p>التقارير</p>
            </div>
        </div>
        <div class="processes">
            <div class="spacebox"></div>
            <a href="{{ route('kpi-references.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">المراجع مؤشرات الأداء الرئيسية </p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">KPI References</p>
                    </div>
                </div>
            </a>
            <div class="spacebox"></div>
        </div>
        <div class="processes">
            <a href="/nca-regulatory-reports" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">التقارير التنظيمية NCA</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">NCA Regulatory Reporting</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('sama-regulatory-report.show') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">التقارير التنظيمية SAMA</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">SAMA Regulatory Reporting</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('mis-report.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">تقارير نظم المعلومات الإدارية</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">MIS Reporting</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="processes">
            <a href="/dashboard" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">لوحة القيادة</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Dashboard</p>
                    </div>
                </div>
            </a>
            <a href="/" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">استراتيجية الأمن السيبراني</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Cybersecurity Strategy</p>
                    </div>
                </div>
            </a>
            <a href="/" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">ميثاق الأمن السيبراني</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Cybersecurity Charter</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="processes">
            <div class="spacebox"></div>
            <a href="{{ route('frameworks') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">ثلاثون زائد إطار العمل</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">30+ Frameworks</p>
                    </div>
                </div>
            </a>
            <div class="spacebox"></div>
        </div>
        <!-- Evidence Management -->
        <div>
            <div class="sectionhead">
                <p>Evidence Management</p>
                <p>إدارة الدليل</p>
            </div>
        </div>
        <div class="processes">
            <a href="{{ route('artifacts.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">تسجيل سجل</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Artifact Registration</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('evidences.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">تسجيل الدليل</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Register an Evidence</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('control-vs-evidence.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">الدليل المتعلق بالضوابط</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Evidence vs Control</p>
                    </div>
                </div>
            </a>
        </div>
        <!-- Control Assessment and Risk Assessment -->
        <div>
            <div class="sectionhead">
                <p>Control Assessment & Risk Assessment</p>
                <p>تقييم الضوابط وتقييم المخاطر</p>
            </div>
        </div>
        <div class="processes">
            <a href="{{ route('control-assessments.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">تقييم الضوابط</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Control Assessment</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('controls.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">قائمة الضوابط</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Control Listing</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('control-smart-search.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">الضوابط في البحث الذكي</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Control Smart Search</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="processes">
            <a href="{{ route('risk-assessments.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">تقييم المخاطر</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Risk Assessment</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('risks.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">قائمة المخاطر</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Risk Listing</p>
                    </div>
                </div>
            </a>
            <div class="spacebox"></div>
        </div>
        <!-- Audit Management -->
        <div>
            <div class="sectionhead">
                <p>Audit Management</p>
                <p>إدارة مراجعة</p>
            </div>
        </div>
        <div class="processes">
            <a href="{{ route('audit-plans.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">تخطيط مراجعة والتسجيل</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Audit Planning</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('audit-plan-report.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">خطة التدقيق</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Audit Plan</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('audit-assessments.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">نتائج مراجعة</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Audit Findings</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="processes">
            <div class="spacebox"></div>
            <a href="{{ route('control-vs-audit.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">الضوابط المتعلقة بنتائج مراجعة</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Control vs Audit Findings</p>
                    </div>
                </div>
            </a>
            <div class="spacebox"></div>
        </div>
        <!-- ISO 27000 Family -->
        <div>
            <div class="sectionhead">
                <p>ISO 27001 Related Evidences</p>
                <p>الأدلة ذات الصلة بمعيار ISO 27001</p>
            </div>
        </div>
        <div class="processes">
            <a href="" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">نظام إدارة متكامل</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtexttwo">Integrated Management System</p>
                    </div>
                </div>
            </a>
            <a href="" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">بيان قابلية التطبيق</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Statement of Applicability</p>
                    </div>
                </div>
            </a>
            <a href="" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">التدقيق الداخلي</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Internal Audit</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="processes">
            <div class="spacebox"></div>
            <a href="" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">مراجعة الإدارة</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Management Review</p>
                    </div>
                </div>
            </a>
            <div class="spacebox"></div>
        </div>
        @include('process/domain-ISO-27001')
        <!-- Vulnerability Penetration Test -->
        <div>
            <div class="sectionhead">
                <p>Vulnerability Assessment / Penetration Test Tracking</p>
                <p>تتبع تقييم الثغرات الأمنية / اختبار الاختراق</p>
            </div>
        </div>
        <div class="processes">
            <a href="{{ route('patches.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">القضايا المفتوحة لاختبار الثغرات</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">VA-Pen Test Open Issues</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('pen-test-asset-vs-risk.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">الأصول المعرضة للثغرات الأمنية</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">Assets at Risks WRT VA</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('va-pen-test-dashboard.index') }}" class="boxhyperlink">
                <div class="itemprocesses">
                    <div class="boxicon">
                        <i class='bx bxs-label'></i>
                    </div>
                    <div class="boxname">
                        <p class="boxarbtext">لوحة تحكم اختبار الثغرات الأمنية</p>
                        <div class="seperatorline"></div>
                        <p class="boxengtext">VA Pen Test Dashboard</p>
                    </div>
                </div>
            </a>
        </div>
        @include('process/resource-management')
    </div>

</body>

</html>
