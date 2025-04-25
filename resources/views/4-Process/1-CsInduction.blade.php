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
    <header>
        <div class="header-content" id="header">
            <div>
                <a href="/home">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">البرنامج التعريفي للأمن السيبراني</p>
                <p class="bold-text">Cybersecurity Induction Program</p>
            </div>
            <div>
                <a href="/home">
                    <button class="RightButton">
                        <p class="RightButtonArbTxt">ارجع</p>
                        <p class="RightButtonTxt">Back</p>
                    </button>
                </a>
                <!--<a href="" onclick="document.querySelector('#logout-form').submit(); return false;">-->
                <!--    <button class="RightButton">-->
                <!--        <p class="RightButtonArbTxt">تسجيل الخروج</p>-->
                <!--        <p class="RightButtonTxt">Logout</p>-->
                <!--    </button>-->
                <!--</a>-->
                <form id="logout-form" method="POST" action="{{ route('login.destroy') }}" style="display: none;">
                    @csrf
                    <button type="submit"> Log Out</button>
                </form>
            </div>
        </div>
    </header>
    <!-- Initial Setup -->
    {{-- <div>
        <div class="sectionhead">
            <p>Initial Setup</p>
            <p>الإعداد الأولي</p>
        </div>
    </div>
    <div class="singleitemprocess">
        <a href="{{ route('organization.create') }}" class="boxhyperlink">
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
        <a href="/attachment-input" class="boxhyperlink">
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
        <a href="/risk-appetites/create" class="boxhyperlink">
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
    <!-- Evidence Management -->
    <div>
        <div class="sectionhead">
            <p>Evidence Management</p>
            <p>إدارة الدليل</p>
        </div>
    </div>
    <div class="processes">
        <a href="/attachment-list" class="boxhyperlink">
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
        <a href="/evidence-view" class="boxhyperlink">
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
        <a href="/evidence-control" class="boxhyperlink">
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
        <a href="{{route('control-assessments.index')}}" class="boxhyperlink">
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
        <a href="/href="{{route('risk-assessments.index')}}"" class="boxhyperlink">
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
        <a href="/href="{{route('audit-registrations.index')}}"" class="boxhyperlink">
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
        <a href="/attachments/78" class="boxhyperlink">
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
        <a href="/attachments/79" class="boxhyperlink">
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
        <a href="/attachments/80" class="boxhyperlink">
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
        <a href="/attachments/81" class="boxhyperlink">
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
    </div> --}}
    <!-- GRC Domains -->
    <div>
        <div class="sectionhead">
            <p>GRC Domain Resources (Capacity Building Framework)</p>
            <p>موارد الحوكمة والمخاطر والامتثال (إطار بناء القدرات)</p>
        </div>
    </div>
    <div class="processes">
        <a href="/cs-induction/cybersecurity-governance" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">حوكمة الأمن السيبراني</p>
                <div class="domainseperatorline"></div>
                <p class="domainengtext">Cyber Security Governance</p>
            </div>
        </a>
        <a href="/cs-induction/cybersecurity-strategy" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">استراتيجية الأمن السيبراني</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Cyber Security Strategy</p>
            </div>
        </a>
        <a href="/cs-induction/cybersecurity-policies" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">سياسة الأمن السيبراني</p>
                <div class="domainseperatorline"></div>
                <p class="domainengtext">Cyber Security Policy</p>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/cs-induction/cybersecurity-roles-and-responsibilities" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">أدوار ومسؤوليات الأمن السيبراني</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Cyber Security Roles and Responsibilities</p>
            </div>
        </a>
        <a href="/cs-induction/cybersecurity-project-management" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">الأمن السيبراني في إدارة المشاريع</p>
                <div class="domainseperatorline"></div>
                <p class="domainengtext">Cyber Security in Project Management</p>
            </div>
        </a>
        <a href="/cs-induction/cybersecurity-awareness" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">التوعية بالأمن السيبراني</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Cyber Security Awareness</p>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/cs-induction/cybersecurity-training" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">التدريب على الأمن السيبراني</p>
                <div class="domainseperatorline"></div>
                <p class="domainengtext">Cyber Security Training</p>
            </div>
        </a>
        <a href="/cs-induction/cybersecurity-risk-management" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">إدارة مخاطر الأمن السيبراني</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Cyber Security Risk Management</p>
            </div>
        </a>
        <a href="/cs-induction/cybersecurity-regulatory-compliance" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">التدقيق المطلوب</p>
                <div class="domainseperatorline"></div>
                <p class="domainengtext">Regulatory Compliance</p>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/cs-induction/cybersecurity-review" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">مراجعة الأمن السيبراني</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Cyber Security Review</p>
            </div>
        </a>
        <a href="/cs-induction/cybersecurity-audit" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">تدقيقات الأمن السيبراني</p>
                <div class="domainseperatorline"></div>
                <p class="domainengtext">Cyber Security Audits</p>
            </div>
        </a>
        <a href="/cs-induction/human-resources" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">الموارد البشرية</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Human Resources</p>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/cs-induction/physical-security" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">الأمن الجسدي</p>
                <div class="domainseperatorline"></div>
                <p class="domainengtext">Physical Security</p>
            </div>
        </a>
        <a href="/cs-induction/asset-management" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">إدارة الأصول</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Asset Management</p>
            </div>
        </a>
        <a href="/cs-induction/cybersecurity-architecture" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">هندسة الأمن السيبراني</p>
                <div class="domainseperatorline"></div>
                <p class="domainengtext">Cyber Security Architecture</p>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/cs-induction/identity-and-access-management" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">إدارة الهوية والوصول</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Identity and Access Management</p>
            </div>
        </a>
        <a href="/cs-induction/application-security" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">أمن التطبيق</p>
                <div class="domainseperatorline"></div>
                <p class="domainengtext">Application Security</p>
            </div>
        </a>
        <a href="/cs-induction/change-management" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">إدارة التغيير</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Change Management</p>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/cs-induction/infrastructure-security" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">أمن البنية التحتية</p>
                <div class="domainseperatorline"></div>
                <p class="domainengtext">Infrastructure Security</p>
            </div>
        </a>
        <a href="/cs-induction/cryptography" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">التشفير</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Cryptography</p>
            </div>
        </a>
        <a href="/cs-induction/bring-your-own-device" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">اجلب جهازك الخاص</p>
                <div class="domainseperatorline"></div>
                <p class="domainengtext">Bring Your Own Device (BYOD)</p>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/cs-induction/secure-disposal" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">التخلص الآمن من أصول المعلومات</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Secure Disposal of Information Assets</p>
            </div>
        </a>
        <a href="/cs-induction/payment-system" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">أنظمة الدفع</p>
                <div class="domainseperatorline"></div>
                <p class="domainengtext">Payment Systems</p>
            </div>
        </a>
        <a href="/cs-induction/electronic-banking" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">الخدمات المصرفية الإلكترونية</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Electronic Banking Services</p>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/cs-induction/cybersecurity-event-management" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">إدارة أحداث الأمن السيبراني</p>
                <div class="domainseperatorline"></div>
                <p class="domainengtext">Cyber Security Event Management</p>
            </div>
        </a>
        <a href="/cs-induction/cybersecurity-incident-management" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">إدارة حوادث الأمن السيبراني</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Cyber Security Incident Management</p>
            </div>
        </a>
        <a href="/cs-induction/threat-management" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">إدارة التهديدات</p>
                <div class="domainseperatorline"></div>
                <p class="domainengtext">Threat Management</p>
            </div>
        </a>
    </div>
    <div class="processes">
        <a href="/cs-induction/vulnerability-management" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">إدارة الثغرات الأمنية</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Vulnerability Management</p>
            </div>
        </a>
        <a href="/cs-induction/contract-and-vendor" class="boxhyperlink">
            <div class="domainbox">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">إدارة العقود والبائعين</p>
                <div class="domainseperatorline"></div>
                <p class="domainengtext">Contract & Vendor Management</p>
            </div>
        </a>
        <a href="/cs-induction/outsourcing" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">الاستعانة بمصادر خارجية</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Outsourcing</p>
            </div>
        </a>
    </div>
    <div class="processes">
        <div class="boxhyperlink"></div>
        <a href="/cs-induction/cloud-computing" class="boxhyperlink">
            <div class="domainboxlight">
                <i class='bx bx-box'></i>
                <p class="domainarbtext">حوسبة سحابية</p>
                <div class="domainseperatorlineblack"></div>
                <p class="domainengtext">Cloud Computing</p>
            </div>
        </a>
        <div class="boxhyperlink"></div>

    </div>


</body>

</html>
