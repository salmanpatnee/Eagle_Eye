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
                <a href="/home">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Products</p>
            </div>
            <div class="d-flex align-items-center gap-3">
            @include('partials.roles')
            <a href="/vciso">
                <button class="RightButton">
                    <p class="RightButtonArbTxt">ارجع</p>
                    <p class="RightButtonTxt">Back</p>
                </button>
            </a>

            {{-- <div>
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
            </div> --}}
            </div>
        </div>
    </header>
    <div style="margin-top: 50px"></div>
    <div class="GrcDomainBoxes">
        <a href="/products/anti-phishing-software">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    مكافحة التصيد
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Anti-Phishing Software
                </p>
            </div>
        </a>
        <a href="/products/anti-ransomware-software">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 38px;" class="domainboxTwoArbTxt">
                    برامج مكافحة الفدية
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Anti-Ransomware Software
                </p>
            </div>
        </a>
        <a href="/products/application-whitelisting">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 26px;" class="domainboxTwoArbTxt">
                    القائمة البيضاء للتطبيق
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Application Whitelisting (Application Security)
                </p>
            </div>
        </a>
        <a href="/products/backup-recovery">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 25px;" class="domainboxTwoArbTxt">
                    النسخ الاحتياطي و تعافي
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Backup Recovery
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/products/brand-protection">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:50px" class="domainboxTwoArbTxt">
                    حماية العلامة التجارية
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Brand Protection
                </p>
            </div>
        </a>
        <a href="/products/casb">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 51px;" class="domainboxTwoArbTxt">
                    وسيط أمان الوصول السحابي
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Cloud Access Security Broker (CASB)
                </p>
            </div>
        </a>
        <a href="/products/container-kubernetes-security">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 40px;" class="domainboxTwoArbTxt">
                    أمان الحاوية و كوبرنيتيس
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Container and Kubernetes Security
                </p>
            </div>
        </a>
        <a href="/products/data-classification">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 40px;" class="domainboxTwoArbTxt">
                    تصنيف البيانات
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Data Classification
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/products/data-loss-prevention">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:37px" class="domainboxTwoArbTxt">
                    منع فقدان البيانات
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Data Loss Prevention (DLP)
                </p>
            </div>
        </a>
        <a href="/products/database-activity-monitoring">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    مراقبة نشاط قاعدة البيانات
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Database Activity Monitoring (DAM)
                </p>
            </div>
        </a>
        <a href="/products/distributed-denial-of-service-of-attack">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 27px;" class="domainboxTwoArbTxt">
                    هجوم منع الخدمة
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Distributed Denial-of-Service of Attack
                </p>
            </div>
        </a>
        <a href="/products/email-security">
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
        <a href="/products/encryption">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:42px" class="domainboxTwoArbTxt">
                    (أمن نقطة النهاية) التشفير
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Encryption (Endpoint Security)
                </p>
            </div>
        </a>
        <a href="/products/end-point-detection-response">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 13px;" class="domainboxTwoArbTxt">
                    كشف نقطة النهاية والاستجابة لها
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    End-Point Detection and Response (EDR)
                </p>
            </div>
        </a>
        <a href="/products/extended-detection-protection-response">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 27px;" class="domainboxTwoArbTxt">
                    استجابة حماية الكشف الموسعة
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Extended Detection Protection Response (XDR)
                </p>
            </div>
        </a>
        <a href="/products/identity-access-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 27px;" class="domainboxTwoArbTxt">
                    إدارة هويات الدخول
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Identity and Access Management (IAM)
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/products/iot-security">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:65px" class="domainboxTwoArbTxt">
                    إنترنت الأشياء الأمن
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    IoT Security
                </p>
            </div>
        </a>
        <a href="/products/multi-factor-authentication">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 65px;" class="domainboxTwoArbTxt">
                    استيثاق متعدد العناصر
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Multi-Factor Authentication (MFA)
                </p>
            </div>
        </a>
        <a href="/products/network-access-control">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 53px;" class="domainboxTwoArbTxt">
                    التحكم في الوصول إلى الشبكة
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Network Access Control (NAC)
                </p>
            </div>
        </a>
        <a href="/products/next-generation-firewall">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 53px;" class="domainboxTwoArbTxt">
                    جدار الحماية من الجيل القادم
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Next Generation Firewall
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/products/penetration-testing">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:65px" class="domainboxTwoArbTxt">
                    فحص الاختراق
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Penetration Testing
                </p>
            </div>
        </a>
        <a href="/products/privilege-access-management">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 65px;" class="domainboxTwoArbTxt">
                    إدارة الوصول المميز
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Privillage Access Management (PAM)
                </p>
            </div>
        </a>
        <a href="/products/siem-solution">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 27px;" class="domainboxTwoArbTxt">
                    المعلومات الأمنية و إدارة الأحداث
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    SIEM Solution
                </p>
            </div>
        </a>
        <a href="/products/threat-intelligence">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 55px;" class="domainboxTwoArbTxt">
                    استخبارات التهديد
                </p>
                <div class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Threat Intelligence
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a href="/products/unified-threat-management">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:63px" class="domainboxTwoArbTxt">
                    إدارة التهديدات الموحدة
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Unified Threat Management
                </p>
            </div>
        </a>
        <a href="/products/user-entity-behavior-analytics">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    تحليلات سلوك المستخدم والكيان
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    User and Entity Behaviour Analytics (UEBA)
                </p>
            </div>
        </a>
        <a href="/products/web-application-firewall">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top:63px" class="domainboxTwoArbTxt">
                    جدار حماية تطبيقات الويب
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Web Application Firewall (WAF)
                </p>
            </div>
        </a>
        <a href="/products/wifi-security">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top: 63px;" class="domainboxTwoArbTxt">
                    أمن واي فاي
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Wifi Security
                </p>
            </div>
        </a>
    </div>
    <div class="GrcDomainBoxes">
        <a style="margin-left: 0px" href="/products/zero-day-attack">
            <div class="GrcdomainboxTwo">
                <i class='bx bx-box'></i>
                <p style="margin-top:40px" class="domainboxTwoArbTxt">
                    هجوم يوم الصفر
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Zero Day Attack
                </p>
            </div>
        </a>
        <a style="margin-left: -26px" href="/products/zero-trust">
            <div class="domainboxOne">
                <i class='bx bx-box'></i>
                <p style="margin-top: 37px;" class="domainboxTwoArbTxt">
                    الثقة صفر
                </p>
                <div style="margin-top: -10px;" class="domainboxline"></div>
                <p class="domainboxTwoTxt">
                    Zero Trust
                </p>
            </div>
        </a>
        <div class="spaceproductbox"></div>
        <div class="spaceproductbox"></div>
    </div>


</body>

</html>
