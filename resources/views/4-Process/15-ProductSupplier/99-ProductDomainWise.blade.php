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
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-MainPageHeader.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/1-Process.css') }}">
</head>

<body>
    <header>
        <div class="header-content" id="header">
            <div>
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Products</p>
            </div>
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
    </header>
    <div class="separator initialSetupSeprator">
        <div>
            <i class='bx bxs-chevron-right'></i>
            <span class="grc-processes-line">Management Software Categories</span>
            <span class="management-software-Arbline">فئات برامج الإدارة</span>
        </div>
    </div>
    <div style="margin-top: 50px"></div>
    <div class="GrcDomainBoxes">
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    التوعية/نظام إدارة التعلم
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Awareness/LMS
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 38px;" class="domainboxTwoArbTxt">
                    أداة استمرارية الأعمال
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    BCM Tool
                </p>
            </div>
        </a>
        <a href="#">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 26px;" class="domainboxTwoArbTxt">
                    امتثال/أداة تدقيق
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Compliance/Audit Tool
                </p>
            </div>
        </a>
        <a href="#">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 1px;" class="domainboxTwoArbTxt">
                    الحوكمة وإدارة المخاطر والالتزام
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    GRC Tool
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:24px" class="domainboxTwoArbTxt">
                    أداة إدارة المشاريع
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Project Management Tool
                </p>
            </div>
        </a>
        <a style="margin-right:615px;" href="/cybersecurity-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 24px;" class="domainboxTwoArbTxt">
                    أداة إدارة المخاطر
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Risk Management Tool
                </p>
            </div>
        </a>
    </div>
    <div class="separator TechnicalSeprator">
        <div>
            <i class='bx bxs-chevron-right'></i>
            <span class="grc-processes-line">Technical Software Categories</span>
            <span class="management-software-Arbline">فئات البرامج التقنية</span>
        </div>
    </div>
    <div style="margin-top: 80px" class="GrcDomainBoxes">
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:50px" class="domainboxTwoArbTxt">
                    تهديد متطور دائم
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    APT Solutions
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 51px;" class="domainboxTwoArbTxt">
                    مكافحة التصيد
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Anti Phishing Tools
                </p>
            </div>
        </a>
        <a href="#">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 14px;" class="domainboxTwoArbTxt">
                    نظم أمنية واجهة برمجة التطبيقات
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    API Security Solutions
                </p>
            </div>
        </a>
        <a href="#">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 40px;" class="domainboxTwoArbTxt">
                    أمن تطبيقات الأعمال
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Application Security
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    الأرشفة
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Archiving
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    جرد الأصول
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Asset Inventory/CMDB
                </p>
            </div>
        </a>
        <a href="#">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 27px;" class="domainboxTwoArbTxt">
                    النسخ الاحتياطي و تعافي
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Backup and Recovery Tool
                </p>
            </div>
        </a>
        <a href="#">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 27px;" class="domainboxTwoArbTxt">
                    حماية العلامة التجارية
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Brand Protection
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:14px" class="domainboxTwoArbTxt">
                    كاميرا تلفزيونية ذات دائرة مغلقة
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    CCTV Monitoring Log
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    مزامنة الساعة
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Clock Synchronization
                </p>
            </div>
        </a>
        <a href="#">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 27px;" class="domainboxTwoArbTxt">
                    أمن الحوسبة السحابية
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Cloud Computing Security
                </p>
            </div>
        </a>
        <a href="#">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 27px;" class="domainboxTwoArbTxt">
                    علم التشفير/الأعمال الرئيسة
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Cryptography/Key Management
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:65px" class="domainboxTwoArbTxt">
                    أداة التوعية بالأمن السيبراني
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Cybersecurity Awareness Tool
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    استخبارات تهديدات الأمن السيبراني
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Cybersecurity Threat Intelligence (CTI)
                </p>
            </div>
        </a>
        <a href="#">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 53px;" class="domainboxTwoArbTxt">
                    منع فقدان البيانات
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Data Loss Prevention (DLP)
                </p>
            </div>
        </a>
        <a href="#">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 53px;" class="domainboxTwoArbTxt">
                    حماية البيانات
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Data Protection
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    حل مراقبة نشاط قاعدة البيانات
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Database Activity Monitoring (DAM) Solutions
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    منع الخدمة أداة الحماية
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    D-DOS Protection Tool
                </p>
            </div>
        </a>
        <a href="#">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 27px;" class="domainboxTwoArbTxt">
                    نظام اسماء النطاقات
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    DNS Security
                </p>
            </div>
        </a>
        <a href="#">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 27px;" class="domainboxTwoArbTxt">
                    أمن البريد الإلكتروني
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Email Security
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    أمن نقطة النهاية
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    End Point Security
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    حل بروتوكول تبادل الملفات
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    File Integrity Monitoring (FIM) Solutions
                </p>
            </div>
        </a>
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    جدار الحماية
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Firewall
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    أداة فحص جنائي
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Forensic Analysis Tools
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    حل نظام منع التسلل
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    IPS Solution
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    إدارة هويات الدخول
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Identity and Access Management
                </p>
            </div>
        </a>
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    خطة الاستجابة للحوادث
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Incident Response Platforms
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 11px;" class="domainboxTwoArbTxt">
                    إدارة خدمات تقنية المعلومات/مكتب تقديم الخدمة
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    ITSMS/Help Desk Tool
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    إدارة جهاز محمول
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Mobile Device Management
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    استيثاق متعدد العناصر
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Multi-Factor Authentication
                </p>
            </div>
        </a>
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    مركز تشغيل الشبكة
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    NOC Solution
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    إدارة حزم البرامج
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Patch Management
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    إدارة الوصول المميز
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Privileged Access Management
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 11px;" class="domainboxTwoArbTxt">
                    أدوات الكشف عن برامج الفدية و مجابهة
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Ransomware Detection and Mitigation Tools
                </p>
            </div>
        </a>
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:10px" class="domainboxTwoArbTxt">
                    المعلومات الأمنية و إدارة الأحداث
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    SIEM Solution
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    مركز العمليات الأمنية
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    SOC Solution
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/cybersecurity-strategy">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    إطار سياسة المرسل
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    SPF Solution
                </p>
            </div>
        </a>
        <a href="/cybersecurity-strategy">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    ادارة التخزين
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Storage Management Solution
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 11px;" class="domainboxTwoArbTxt">
                    قابلية الاصابة / فحص الاختراق
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    VA/Pen Test Tools
                </p>
            </div>
        </a>
        <a href="/cybersecurity-strategy">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    شبكة محلية افتراضية
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    VLan Tools
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/cybersecurity-management">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    إدارة قابلية الاصابة
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    VM/ Container Security Tools
                </p>
            </div>
        </a>
        <a href="/cybersecurity-strategy">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    شبكة خاصة افتراضية
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    VPN Solution
                </p>
            </div>
        </a>
        <a href="/cybersecurity-management">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    جدار حماية تطبيقات الويب
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Web Application Firewall
                </p>
            </div>
        </a>
        <a href="/cybersecurity-strategy">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    أمن واي فاي
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    WiFi Security
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/cybersecurity-management">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    الحماية اللاسلكية
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Wireless Protection
                </p>
            </div>
        </a>
        <a style="margin-right:616px;" href="/cybersecurity-strategy">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    أداة منع هجمات اليوم الصفري
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Zero Day Attack Prevention Tool
                </p>
            </div>
        </a>
    </div>


</body>

</html>
