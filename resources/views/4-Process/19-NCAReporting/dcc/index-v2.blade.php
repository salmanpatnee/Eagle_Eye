@extends('4-Process/19-NCAReporting/partials/app')
@section('action-buttons')
<a href="{{route('dcc-regulatory-summary.show')}}" class="ReportButton">
    <p>تقرير ملخص</p>
    <p>Summary Report</p>
</a>
<a href="{{route('regulatory-reports.create')}}?best_practice=NCA-DCC-2022" class="ReportButton">
    <p>تقرير مفصل</p>
    <p>Detailed Report</p>
</a>
<a href="{{ route('dcc-regulatory-report.excel') }}?controlAssessmentId={{ $controlAssessmentId }}">
    <button class="ReportButton">
        <p>تنزيل بصيغة إكسل</p>
        <p>Download in Excel</p>
    </button>
</a>
@endsection

@section('header')
<p class="arabichead">
    الهيئة الوطنية للأمن السيبراني - ضوابط الأمن السيبراني للبيانات
    التنظيمي
</p>
<p class="enghead" style="margin-top: 20px">
    Control Assessment Regulator Reports
</p>
<p class="enghead">
    National Cybersecurity Authority - Data Cybersecurity Controls
    (NCA-DCC)
</p>
@endsection

@section('content')
<div class="">

    <div class="domainSubdomain">
        <p class="maindomain">(Main Domain) المكون الأساسي</p>
        <p class="maindomaintext">١ حوكمة الأمن السيبراني</p>
    </div>
    <!-- 1-1.STRG_D Cybersecurity Strategy -->
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            :١-١ المراجعة والتدقيق الدوري للأمن السيبراني
        </p>
        <p class="maindomaintext">
            للتأكد من توثيق متطلبات الأمن السيبراني وإبلاغها والامتثال لها من قبل
            المنظمة وفقًا للقوانين واللوائح ذات الصلة والمتطلبات التنظيمية.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-DCC-1' && $row->sub_domain_id == 'NCA-DCC-1-1')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 1-2.MNGT Cybersecurity Management --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            :١-٢ إدارة مخاطر الأمن السيبراني
        </p>
        <p class="maindomaintext">
            ضضمان إدارة مخاطر الأمن السيبراني؛ لحماية الأصول المعلوماتية والتقنية
            للجهة، على نحو ممنهج؛وذلك وفقاً للسياسات والإجراءات التنظيمية للجهة،
            والمتطلبات التشريعية والتنظيمية ذات العلاقة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-DCC-1' && $row->sub_domain_id == 'NCA-DCC-1-2')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 1-3.P&P Cybersecurity Policies and Procedures --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            :١-٣ الأمن السيبراني ضمن إدارة المشاريع المعلوماتية والتقنية
        </p>
        <p class="maindomaintext">
            التأكد من أن متطلبات الأمن السيبراني مضمنة في منهجية إدارة مشاريع
            الجهة وإجراءاتها؛ لحماية السرية ،وسلامة الأصول المعلوماتية والتقنية
            للجهة، ودقتها وتوافرها؛ وذلك وفقاً للسياسات والإجراءات التنظيمية
            للجهة، والمتطلبات التشريعية والتنظيمية ذات العلاقة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-DCC-1' && $row->sub_domain_id == 'NCA-DCC-1-3')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>

    <div class="domainSubdomain">
        <p class="maindomain">(Main Domain) المكون الأساسي</p>
        <p class="maindomaintext">٢ تعزيز الأمن السيبراني</p>
    </div>
    <!-- 2-1.STRG_D Cybersecurity Strategy -->
    <div class="domainSubdomain" dir="rtl">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ۱-۲ إدارة هويات الدخول والصلاحيات
        </p>
        <p class="maindomaintext">
            ضمان حماية الأمن السيبراني للوصول المنطقي (Logical Access) إلى الأصول المعلوماتية والتقنية للجهة؛ من أجل
            منع الوصول غير المصرح به، وتقييد الوصول إلى ما هو مطلوب؛ لإنجاز الأعمال المتعلقة بالجهة.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-DCC-2' && $row->sub_domain_id == 'NCA-DCC-2-1')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    <!-- 2-2.STRG_D Cybersecurity Strategy -->
    <div class="domainSubdomain" dir="rtl">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ۲-۲ حماية الأنظمة وأجهزة معالجة المعلومات


        </p>
        <p class="maindomaintext">
            ضمان حماية الأنظمة وأجهزة معالجة المعلومات بما في ذلك أجهزة المستخدمين والبنى التحتية للجهة من المخاطر
            السيبرانية. </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-DCC-2' && $row->sub_domain_id == 'NCA-DCC-2-2')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    <!-- 2-3.STRG_D Cybersecurity Strategy -->
    <div class="domainSubdomain" dir="rtl">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ۳-۲ أمن الأجهزة المحمولة

        </p>
        <p class="maindomaintext">
            ضمان حماية أجهزة الجهة المحمولة (بما في ذلك أجهزة الحاسب المحمول والهواتف الذكية والأجهزة الذكية اللوحية
            من المخاطر السيبرانية. وضمان التعامل بشكل آمن مع المعلومات الحساسة والمعلومات الخاصة بأعمال الجهة
            وحمايتها أثناء النقل والتخزين والمعالجة عند استخدام الأجهزة الشخصية للعاملين في الجهة (مبدأ BYOD).
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-DCC-2' && $row->sub_domain_id == 'NCA-DCC-2-3')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>

    <!-- 2-4.STRG_D Cybersecurity Strategy -->
    <div class="domainSubdomain" dir="rtl">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">

            ٢ - ٤
            حماية البيانات والمعلومات
        </p>
        <p class="maindomaintext">
            ضمان حماية السرية وسلامة بيانات ومعلومات الجهة ودقتها وتوافرها، وذلك وفقًا للسياسات والإجراءات التنظيمية
            للجهة، والمتطلبات

            التشريعية والتنظيمية ذات العلاقة.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-DCC-2' && $row->sub_domain_id == 'NCA-DCC-2-4')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>

    <!-- 2-5.STRG_D Cybersecurity Strategy -->
    <div class="domainSubdomain" dir="rtl">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ٢ - ٥
            التشفير
        </p>
        <p class="maindomaintext">
            ضمان الاستخدام السليم والفعال للتشفير؛ لحماية الأصول المعلوماتية الإلكترونية للجهة، وذلك وفقًا للسياسات،
            والإجراءات التنظيمية

            للجهة، والمتطلبات التشريعية والتنظيمية ذات العلاقة.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-DCC-2' && $row->sub_domain_id == 'NCA-DCC-2-5')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>

    <!-- 2-6.STRG_D Cybersecurity Strategy -->
    <div class="domainSubdomain" dir="rtl">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ٢ - ٦
            الإتلاف الآمن للبيانات


        </p>
        <p class="maindomaintext">
            ضمان تنفيذ عمليات إتلاف البيانات بشكل آمن، وذلك وفقًا للسياسات والإجراءات التنظيمية للجهة، والمتطلبات
            التشريعية

            والتنظيمية ذات العلاقة.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-DCC-2' && $row->sub_domain_id == 'NCA-DCC-2-6')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>

    <!-- 2-7.STRG_D Cybersecurity Strategy -->
    <div class="domainSubdomain" dir="rtl">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ٢ - ٧
            الأمن السيبراني للطابعات والماسحات الضوئية وآلات التصوير


        </p>
        <p class="maindomaintext">
            ضمان التعامل الآمن مع البيانات عند استخدام الطابعات والماسحات الضوئية وآلات التصوير.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-DCC-2' && $row->sub_domain_id == 'NCA-DCC-2-7')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>

    <div class="domainSubdomain">
        <p class="maindomain">(Main Domain) المكون الأساسي</p>
        <p class="maindomaintext">
            ٣
            األمن السيبراني المتعلق باألطراف الخارجية والحوسبة السحابية
        </p>
    </div>

    <!-- 3-1.Third-Party and Cloud Computing Cybersecurity -->
    <div class="domainSubdomain" dir="rtl">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ٣ - ١
            الأمن السيبراني المتعلق بالأطراف الخارجية

        </p>
        <p class="maindomaintext">
            ضمان حماية أصول الجهة من مخاطر الأمن السيبراني المتعلقة بالأطراف الخارجية بما في ذلك خدمات الإسناد
            لتقنية المعلومات "Outsourcing" والخدمات المدارة "Managed Services والخدمات الاستشارية Consultancy
            Services" وفقًا للسياسات والإجراءات التنظيمية للجهة، والمتطلبات التشريعية والتنظيمية ذات العلاقة.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-DCC-3' && $row->sub_domain_id == 'NCA-DCC-3-1')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</div>
@endsection