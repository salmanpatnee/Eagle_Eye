<!DOCTYPE html5>
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
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/7-Sidebar/1-Sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/2-Table/IndividualTable.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/9-RegulatoryReports/report.css') }}">

</head>

<body>
    <section>
        <header>
            <div class="Header">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i style="padding-right: 30px" class='bx bx-right-arrow-alt'></i>
                <div class="HeadingTxt">
                    <p class="ArbTxt">تقييم الضوابط</p>
                    <p class="EngTxt">Regulatory Reports</p>
                </div>
                <div class="ReportButtonContainer">
                    {{-- <a href="/tcc-regulatory-summary">
                        <button class="ReportButton">
                            <p>تقرير ملخص</p>
                            <p>Summary Report</p>
                        </button>
                    </a> --}}
                    <a href="{{ route('regulatory-reports.create') }}?best_practice=NCA-TCC-2021">
                        <button class="ReportButton">
                            <p>تقرير مفصل</p>
                            <p>Detailed Report</p>
                        </button>
                    </a>
                </div>
                <div class="RightButtonContainer">
                    <a href="/nca-regulatory-reports">
                        <button class="RightButton">
                            <p>للخلف</p>
                            <p>Back</p>
                        </button>
                    </a>
                </div>
            </div>
        </header>
    </section>
    <div class="contentsection">
        <div>
            <p class="arabichead">تقييم الضوابط</p>
            <p class="arabichead">الهيئة الوطنية للأمن السيبراني - ضوابط الأمن السيبراني للعمل عن بعد</p>
            <p class="enghead" style="margin-top: 20px">Control Assessment Regulator Reports</p>
            <p class="enghead">National Cybersecurity Authority - Telework Cybersecurity Controls (NCA-TCC)</p>
            <p class="enghead">Current Date: {{ now()->format('d-m-Y') }}</p>
        </div>
        <div class="domainSubdomain">
            <p class="maindomain">(Main Domain) المكون الأساسي</p>
            <p class="maindomaintext">١ حوكمة الأمن السيبراني</p>
        </div>
        <!-- 1-1.STRG_D Cybersecurity Strategy -->
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                :١-١ استراتيجية الأمن السيبراني
            </p>
            <p class="maindomaintext">
                ضمان إسهام خطط العمل للأمن السيبراني والأهداف والمبادرات والمشاريع داخل الجهة في تحقيق المتطلبات
                التشريعية والتنظيمية ذات العلاقة
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-1' &&
                            $row->sub_domain_id == 'NCA-TCC-1-1')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- 1-2.MNGT Cybersecurity Management --}}
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                :١-٢ إدارة الأمن السيبراني
            </p>
            <p class="maindomaintext">
                ضمان التزام ودعم صاحب الصلاحية للجهة فيما يتعلق بإدارة وتطبيق برامج الأمن السيبراني في تلك الجهة وفقًاً
                للمتطلبات التشريعية والتنظيمية ذات العلاقة
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-1' &&
                            $row->sub_domain_id == 'NCA-TCC-1-2')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- 1-3.P&P Cybersecurity Policies and Procedures --}}
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                :١-٣ سياسات وإجراءات الأمن السيبراني
            </p>
            <p class="maindomaintext">
                ضمان توثيق ونشر متطلبات الأمن السيبراني والتزام الجهة بها، وذلك وفقًاً لمتطلبات الأعمال التنظيمية للجهة،
                والمتطلبات التشريعية والتنظيمية ذات العلاقة
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-1' &&
                            $row->sub_domain_id == 'NCA-TCC-1-3')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- 2-1.AST Cybersecurity Asset Management --}}
        <div class="domainSubdomain">
            <p class="maindomain">(Main Domain) المكون الأساسي</p>
            <p class="maindomaintext">٢ تعزيز الأمن السيبراني</p>
        </div>
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                ٢-١ إدارة الأصول
            </p>
            <p class="maindomaintext">
                للتأكد من أن الجهة لديها قائمة جرد دقيقة وحديثة للأصول تشمل التفاصيل ذات العلاقة لجميع الأصول
                المعلوماتية والتقنية المتاحة للجهة، من أجل دعم العمليات التشغيلية للجهة ومتطلبات الأمن السيبراني ،لتحقيق
                سرية وسلامة الأصول المعلوماتية والتقنية للجهة ودقتها وتوافرها
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-2' &&
                            $row->sub_domain_id == 'NCA-TCC-2-1')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- 2-2.IAM Cybersecurity Identity and Access --}}
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                ٢-٢ إدارة هويات الدخول والصلاحيات
            </p>
            <p class="maindomaintext">
                ضمان حماية الأمن السيبراني للوصول المنطقي )Logical Access( إلى الأصول المعلوماتية والتقنية للجهة من أجل
                منع الوصول غير المصرح به وتقييد الوصول إلى ما هو مطلوب لإنجاز الأعمال المتعلقة بالجهة.
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-2' &&
                            $row->sub_domain_id == 'NCA-TCC-2-2')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- 2-3.S&F Cybersecurity Security and Facility --}}
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                ٢-٣ حماية الأنظمة وأجهزة معالجة المعلومات
            </p>
            <p class="maindomaintext">
                ضمان حماية الأنظمة وأجهزة معالجة المعلومات بما في ذلك أجهزة المستخدمين والبنى التحتية للجهة من المخاطر
                السيبرانية
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-2' &&
                            $row->sub_domain_id == 'NCA-TCC-2-3')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- 2-4.EML Cybersecurity Emial Protection --}}
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                ٢-٤ حماية البريد الإلكتروني
            </p>
            <p class="maindomaintext">
                ضمان حماية البريد الإلكتروني للجهة من المخاطر السيبرانية
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-2' &&
                            $row->sub_domain_id == 'NCA-TCC-2-4')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- 2-5.NSEC Cybersecurity Network Security --}}
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                ٢-٥ إدارة أمن الشبكات
            </p>
            <p class="maindomaintext">
                ضمان حماية شبكات الجهة من المخاطر السيبرانية
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-2' &&
                            $row->sub_domain_id == 'NCA-TCC-2-5')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- 2-6.MDM Cybersecurity Mobile Device Security --}}
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                ٢-٦ أمن الأجهزة المحمولة
            </p>
            <p class="maindomaintext">
                ضمان حماية أجهزة الجهة المحمولة )بما في ذلك أجهزة الحاسب المحمول والهواتف الذكية الأجهزة الذكية اللوحية(
                من المخاطر السيبرانية. وضمان التعامل بشكل آمن مع المعلومات لحساسة والمعلومات
            </p>
            <p class="maindomaintext">
                الخاصة بأعمال الجهة وحمايتها أثناء النقل والتخزين عند استخدام الأجهزة الشخصية للعاملين في الجهة )مبدأ«
                BYOD»(.
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-2' &&
                            $row->sub_domain_id == 'NCA-TCC-2-6')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- 2-7.D&I Cybersecurity Data and Information --}}
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                ٢-٧ حماية البيانات والمعلومات
            </p>
            <p class="maindomaintext">
                ضمان حماية السرية وسلامة بيانات ومعلومات الجهة ودقتها وتوافرها، وذلك وفقًاً للسياسات والإجراءات
                التنظيمية للجهة، والمتطلبات التشريعية والتنظيمية ذات العلاقة
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-2' &&
                            $row->sub_domain_id == 'NCA-TCC-2-7')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- 2-8.CRYPT Cybersecurity Cryptography --}}
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                ٢-٨ التشغير
            </p>
            <p class="maindomaintext">
                ضمان الاستخدام السليم والفعال للتشفير لحماية الأصول المعلوماتية الإلكترونية للجهة، وذلك وفقًاً للسياسات
                والإجراءات التنظيمية للجهة، والمتطلبات التشريعية والتنظيمية ذات العلاقة
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-2' &&
                            $row->sub_domain_id == 'NCA-TCC-2-8')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- 2-9.B&R Cybersecurity Backup and Recovery --}}
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                ٢-٩ إدارة النسخ الاحتياطية
            </p>
            <p class="maindomaintext">
                ضمان حماية بيانات ومعلومات الجهة والإعـــدادات التقنية للأنظمة والتطبيقات الخاصة بالجهة من الأضرار
                الناجمة عن المخاطر السيبرانية، وذلك وفقًاً للسياسات والإجراءات التنظيمية للجهة، والمتطلبات التشريعية
                والتنظيمية ذات العلاقة
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-2' &&
                            $row->sub_domain_id == 'NCA-TCC-2-9')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- 2-10.VA Cybersecurity Vulnerability Management --}}
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                ٢-١٠ إدارة الثغرات
            </p>
            <p class="maindomaintext">
                ضمان اكتشاف الثغرات التقنية في الوقت المناسب ومعالجتها بشكل فعال، وذلك لمنع أو تقليل احتمالية استغلال
                هذه الثغرات من قبل الهجمات السيبرانية وتقليل الآثار المترتبة على أعمال الجهة
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-2' &&
                            $row->sub_domain_id == 'NCA-TCC-2-10')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- 2-11.PEN Cybersecurity Penetration Testing --}}
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                ٢-١١ اختبار الاختراق
            </p>
            <p class="maindomaintext">
                تقييم واختبار مدى فعالية قدرات تعزيز الأمن السيبراني في الجهة، وذلك من خلال عمل محاكاة لتقنيات وأساليب
                الهجوم السيبراني الفعلية. ولاكتشاف نقاط الضعف الأمنية غير المعروفة والتي قد تؤدي إلى الاختراق السيبراني
                للجهة. وذلك وفقًاً للمتطلبات التشريعية والتنظيمية ذات العلاقة .
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-2' &&
                            $row->sub_domain_id == 'NCA-TCC-2-11')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- 2-12.EVNT Cybersecurity Event Logs --}}
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                ٢-١٢ إدارة سجلات الأحداث ومراقبة الأمن السيبراني
            </p>
            <p class="maindomaintext">
                ضمان تجميع وتحليل ومراقبة سجلات أحداث الأمن السيبراني في الوقت المناسب من أجل الاكتشاف الاستباقي للهجمات
                السيبرانية وإدارة مخاطرها بفعالية لمنع أو تقليل الآثار المترتبة على أعمال الجهة
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-2' &&
                            $row->sub_domain_id == 'NCA-TCC-2-12')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        {{-- 3-1.BCM Cybersecurity Business Continuity Management --}}
        <div class="domainSubdomain">
            <p class="maindomain">(Main Domain) المكون الأساسي</p>
            <p class="maindomaintext">٣ صمود الأمن السيبراني</p>
        </div>
        <div class="domainSubdomain">
            <p class="maindomain">(Sub Domain) المكون الفرعي</p>
            <p class="maindomaintext" style="font-weight: 600;">
                ٣-١ جوانب صمود الأمن السيبراني في إدارة استمرارية الأعمال
            </p>
            <p class="maindomaintext">
                الآثار المترتبة على الاضطرابات في الخدمات الإلكترونية الحرجة للجهة وأنظمة وأجهزة معالجة معلوماتها جراء
                الكوارث الناتجة عن المخاطر السيبرانية.
            </p>
        </div>
        <div class="table-responsive">
            <table class="summaryreport">
                <tr>
                    @include('4-Process/19-NCASummaryReport/1-NcaEccTableHeads')
                </tr>
                @foreach ($tccsummaryreport as $row)
                    @if (
                        $row->best_practices_id == 'NCA-TCC-2021' &&
                            $row->main_domain_id == 'NCA-TCC-3' &&
                            $row->sub_domain_id == 'NCA-TCC-3-1')
                        <tr>
                            @include('4-Process/19-NCASummaryReport/1-NcaEccTableRows')
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>






        {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function addRowCount(tableAttr) {
            $(tableAttr).each(function() {
                $('thead th:last-child', this).each(function() {
                    var tag = $(this).prop('tagName');
                    $(this).before('<' + tag + '>#</' + tag + '>');
                });
                $('tbody td:last-child', this).each(function(i) {
                    $(this).before('<td>' + (i + 1) + '</td>');
                });
            });
        }

        // Call the function with table attr on which you want automatic serial number
        addRowCount('.summaryreport');
    </script> --}}

</body>
