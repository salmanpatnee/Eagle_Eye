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
                <a href="/" class="text-white">
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
            <a href="{{ route('locations.index') }}" class="boxhyperlink">
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
        <div>
            <div class="sectionhead">
                <p>Golden Bulb Database and MIS</p>
                <p>قاعدة بيانات المصباح الأزرق ونظام إدارة المعلومات</p>
            </div>
        </div>
    </div>
    <div class="processes">
        <a href="#" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">قاعدة بيانات الذكاء الاصطناعي</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Artificial Intelligence Database</p>
                </div>
            </div>
        </a>
        <a href="#" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">مراجعة و تدقيق الذكاء الاصطناعي</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Artificial Intelligence Review and Audit</p>
                </div>
            </div>
        </a>
        <a href="#" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">لوحة تحكم الذكاء الاصطناعي</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Artificial Intelligence Dashboard</p>
                </div>
            </div>
        </a>
    </div>

    <div>
        <div class="sectionhead">
            <p>Artificial Intelligence System</p>
            <p>نظام الذكاء الاصطناعي</p>
        </div>
    </div>
    <div class="processes">
        <a href="{{ route('process.view.show', 'PRC-AIF-001') }}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">إطار عمل الذكاء الاصطناعي</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Artificial Intelligence Framework</p>
                </div>
            </div>
        </a>
        <a href="{{ route('process.view.show', 'PRC-AIS-001') }}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">نظام الذكاء الاصطناعي</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Artificial Intelligence System</p>
                </div>
            </div>
        </a>
        <a href="{{ route('process.view.show', 'PRC-R&R-001') }}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">أدوار ومسؤوليات </p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Roles and Responsibilities</p>
                </div>
            </div>
        </a>
    </div>
    <div>
        <div class="sectionhead">
            <p>Core Processes</p>
            <p>العمليات الأساسية</p>
        </div>
    </div>
    <div class="processes">

        <a href="{{ route('process.view.show', 'PRC-OPC-001') }}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">أهداف الذكاء الاصطناعي</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Core Process: 8.1 Operation Planning and Control</p>
                </div>
            </div>
        </a>

        <a href="{{ route('process.view.show', 'PRC-AIRSK-001') }}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">سياسة الذكاء الاصطناعي</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Core Process: 8.2 AI Risk Assessment</p>
                </div>
            </div>
        </a>

        <a href="{{ route('process.view.show', 'PRC-RSKT-001') }}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">استراتيجية الذكاء الاصطناعي</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Core Process: 8.3 AI Risk Treatment</p>
                </div>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="{{ route('process.view.show', 'PRC-AISIA-001') }}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">تحديد الفرص</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Core Process: 8.4 AI System Impact Assessment</p>
                </div>
            </div>
        </a>

        {{-- <a href="{{route('innovation-create-concepts')}}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">إنشاء المفاهيم</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Core Process:Create Concepts</p>
                </div>
            </div>
        </a>
        <a href="{{route('innovation-validate-concepts')}}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">تحقق من المفاهيم</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Core Process:Validate Concepts</p>
                </div>
            </div>
        </a> --}}
    </div>
    <div>
        <div class="sectionhead">
            <p>Supporting Processes</p>
            <p>العمليات المساندة</p>
        </div>
    </div>
    <div class="processes">
        <a href="{{ route('process.view.show', 'PRC-LDR-001') }}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">عملية الدعم: القيادة</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Support Process: Leadership</p>
                </div>
            </div>
        </a>
        <a href="{{ route('process.view.show', 'PRC-PLN-001') }}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">عملية الدعم: التخطيط</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Support Process: Planning</p>
                </div>
            </div>
        </a>
        <a href="{{ route('process.view.show', 'PRC-RMGN-001') }}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">عملية الدعم: إدارة الموارد</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Support Process: Resource Management</p>
                </div>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="{{ route('process.view.show', 'PRC-KPI-001') }}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">عملية الدعم: التقييم الأداء</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Support Process: Performance Evaluation KPIs</p>
                </div>
            </div>
        </a>
        <a href="{{ route('process.view.show', 'PRC-CTI-001') }}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">عملية الدعم: التحسين المستمر</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Support Process: Continual Improvement</p>
                </div>
            </div>
        </a>
        <div class="spacebox"></div>
    </div>
    <div>
        <div class="sectionhead">
            <p>Artificial Intelligence Resource Center</p>
            <p>مركز موارد الذكاء الاصطناعي</p>
        </div>
    </div>
    <div class="processes">
        <a href="{{ route('process.view.show', 'ISO-BRF-001') }}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">إحاطة حول ISO 42001</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">ISO 42001 Briefing</p>
                </div>
            </div>
        </a>
        <a href="{{ route('process.view.show', 'ISO-AUD-001') }}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">تدقيق ISO 42001</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">ISO 42001 Audit</p>
                </div>
            </div>
        </a>
        <a href="{{ route('process.view.show', 'ISO-CRF') }}" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">شهادة ISO 42001</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">ISO 42001 Certification</p>
                </div>
            </div>
        </a>
    </div>

    @include('process/resource-management')
    </div>

</body>

</html>
