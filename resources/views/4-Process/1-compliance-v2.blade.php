<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compliance 360</title>
    <meta name="title" content="Saturn-V GRC Tool">
    <meta name="description" content="Zain Cloud GRC Tool">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <style>
        .btn-dark {
            background-color: #000;
            border-color: #000;
        }
    </style>
</head>

<body>
    <header class="p-0">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('compliance') }}">
                    <i class="fa-solid fa-house fa-xl"></i>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item fs-6">
                            <a class="nav-link active" href="{{ route('compliance') }}">
                                <span class="d-block">العمليات</span>
                                <span>Processes</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="text-center">
                    <button class="btn btn-dark w-100 rounded-pill">
                        <span class="d-block">تسجيل الخروج</span>
                        <span>Logout</span>
                    </button>
                    <ul class="navbar-nav d-flex">
                        <li class="nav-item fs-6 align-items-center d-flex nav-item">
                            <img src="/images/admin.png" width="30" height="30" alt="">
                            <a class="nav-link active" href="{{ route('compliance') }}">
                                <small>{{ auth()->user()->name }} ({{ auth()->user()->role->role_name }}</small>)
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>


</html>


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
</head>

<body class="processpage">
   
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
        <a href="/asset-register-input" class="boxhyperlink">
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
        <a href="/owner-input" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">تعريف الأدوار</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Roles Definition</p>
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
        <a href="/asset-group-input" class="boxhyperlink">
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
        <a href="/threat-agent-input" class="boxhyperlink">
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
        <a href="/va-input" class="boxhyperlink">
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
        <a href="/risk-identification-input" class="boxhyperlink">
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
        <a href="{{ route('risk-appetites.create') }}" class="boxhyperlink">
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
        <a href="/control-identification-input" class="boxhyperlink">
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
    </div>
    <div class="processes">
        <a href="/risk-treatment" class="boxhyperlink">
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
        <a href="/risk-asset-group" class="boxhyperlink">
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
        <a href="/risk-acceptance-input" class="boxhyperlink">
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
    </div>
    <div class="processes">
        <a href="/risk-register" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">قبول المخاطر</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Risk Register</p>
                </div>
            </div>
        </a>
        <a href="/mis-risk-register" class="boxhyperlink">
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
        <a href="/nca-regulatory-reports" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">التقارير التنظيمية</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Regulatory Reporting</p>
                </div>
            </div>
        </a>
        <a href="/mis-reporting" class="boxhyperlink">
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
    </div>
    <div class="processes">
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
        <a href="/frameworks" class="boxhyperlink">
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
        <a href="{{ route('control.evidence.index') }}" class="boxhyperlink">
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
        <a href="/control-identification-list" class="boxhyperlink">
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
        <a href="{{ route('control.smart.search.index') }}" class="boxhyperlink">
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
        <a href="/risk-identification-list" class="boxhyperlink">
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
        <a href="/audit-plan-input" class="boxhyperlink">
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
        <a href="{{ route('audit-registrations.create') }}" class="boxhyperlink">
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
        <a href="/controls-audit-findings" class="boxhyperlink">
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
    </div>
    <!-- ISO 27000 Family -->
    <div>
        <div class="sectionhead">
            <p>ISO 27000 Related Evidences</p>
            <p>الأدلة ذات الصلة بمعيار ISO 27000</p>
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
    <div>
        <div class="sectionhead">
            <p>Personal Data Protection Law</p>
            <p>قانون حماية البيانات الشخصية</p>
        </div>
    </div>
    <div class="processes">
        <a href="/data-governance" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">حوكمة البيانات</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Data Governance</p>
                </div>
            </div>
        </a>
        <a href="/data-catalog" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">البيانات الوصفية ودليل البيانات</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Data Catalog and Metadata</p>
                </div>
            </div>
        </a>
        <a href="/data-quality" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">جودة البيانات</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Data Quality</p>
                </div>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/data-operations" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">تخزين البيانات</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Data Operations</p>
                </div>
            </div>
        </a>
        <a href="/document-content-management" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">إدارة المحتوى والوثائق</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Document and Content Management</p>
                </div>
            </div>
        </a>
        <a href="/data-architecture-modeling" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">النمذجة وهيكلة البيانات</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Data Architecture and Modeling</p>
                </div>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/reference-master-data-management" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">المرجعية والرئيسية إدارة البيانات</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtexttwo">Reference and Master Data Management</p>
                </div>
            </div>
        </a>
        <a href="/business-intelligence-analytics" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">ذكاء األعمال والتحليالت</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Business Intelligence and Analytics</p>
                </div>
            </div>
        </a>
        <a href="/data-sharing-interoperability" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">تكامل البيانات ومشاركتها</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext"> Data Sharing and Interoperability</p>
                </div>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/data-value-realization" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">تحقيق القيمة من البيانات</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Data Value Realization </p>
                </div>
            </div>
        </a>
        <a href="/open-data" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">البيانات المفتوحة</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Open Data</p>
                </div>
            </div>
        </a>
        <a href="/freedom-information" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">حرية المعلومات</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Freedom of Information</p>
                </div>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/data-classification" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">تصنيف البيانات</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Data Classification</p>
                </div>
            </div>
        </a>
        <a href="/personal-data-protection" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">حماية البيانات الشخصية</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Personal Data Protection</p>
                </div>
            </div>
        </a>
        <a href="/data-security-protection" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">أمن البيانات وحمايتها</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">Data Security and Protection</p>
                </div>
            </div>
        </a>
    </div>
    <div class="processes">
        <div class="spacebox"></div>
        <a href="/personal-data-frameworks" class="boxhyperlink">
            <div class="itemprocesses">
                <div class="boxicon">
                    <i class='bx bxs-label'></i>
                </div>
                <div class="boxname">
                    <p class="boxarbtext">خمسة عشر زائد الأطر الموحدة</p>
                    <div class="seperatorline"></div>
                    <p class="boxengtext">15+ Consolidated Frameworks</p>
                </div>
            </div>
        </a>
        <div class="spacebox"></div>
    </div>
</body>

</html>
