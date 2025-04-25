@extends('4-Process/19-NCAReporting/partials/app')
@section('action-buttons')
<a href="{{route('osmacc-regulatory-summary.show')}}" class="ReportButton">
    <p>تقرير ملخص</p>
    <p>Summary Report</p>
</a>
<a href="{{route('regulatory-reports.create')}}?best_practice=NCA-OSMACC-2021" class="ReportButton">
    <p>تقرير مفصل</p>
    <p>Detailed Report</p>
</a>
<a href="{{ route('osmacc-regulatory-report.excel') }}?controlAssessmentId={{ $controlAssessmentId }}"
    class="ReportButton">
    <p>تنزيل بصيغة إكسل</p>
    <p>Download in Excel</p>
</a>

@endsection

@section('header')
<p class="arabichead">
    الهيئة الوطنية للأمن السيبراني - ضوابط الأمن السيبراني لحساب وسائل
    التواصل الاجتماعي التنظيمي
</p>
<p class="enghead" style="margin-top: 20px">
    Control Assessment Regulator Reports
</p>
<p class="enghead">
    National Cybersecurity Authority - Organizational Social Media Account
    Cybersecurity Controls (NCA-OSMACC)
</p>
@endsection

@section('content')
<div>

    <div class="domainSubdomain">
        <p class="maindomain">(Main Domain) المكون الأساسي</p>
        <p class="maindomaintext">١ حوكمة الأمن السيبراني</p>
    </div>
    <!-- 1-1.STRG_D Cybersecurity Strategy -->
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            :١-١ سياسات وإجراءات الأمن السيبراني
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
            @if ($row->main_domain_id == 'NCA-OSMACC-1' && $row->sub_domain_id == 'NCA-OSMACC-1-1')
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
            @if ($row->main_domain_id == 'NCA-OSMACC-1' && $row->sub_domain_id == 'NCA-OSMACC-1-2')
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
            @if ($row->main_domain_id == 'NCA-OSMACC-1' && $row->sub_domain_id == 'NCA-OSMACC-1-3')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 1-4.R&R Cybersecurity Roles and Responsibility --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            :١-٤ أدوار ومسؤوليات الأمن السيبراني
        </p>
        <p class="maindomaintext">
            ضمان تحديد أدوار ومسؤوليات واضحة لجميع الأطراف المشاركة في تطبيق ضوابط
            الأمن السيبراني في الجهة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-OSMACC-1' && $row->sub_domain_id == 'NCA-OSMACC-1-4')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
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
        <p class="maindomaintext" style="font-weight: 600">٢-١ إدارة الأصول</p>
        <p class="maindomaintext">
            للتأكد من أن الجهة لديها قائمة جرد دقيقة وحديثة للأصول تشمل التفاصيل
            ذات العلاقة لجميع الأصول المعلوماتية والتقنية المتاحة للجهة، من أجل
            دعم العمليات التشغيلية للجهة ومتطلبات الأمن السيبراني ،لتحقيق سرية
            وسلامة الأصول المعلوماتية والتقنية للجهة ودقتها وتوافرها
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-OSMACC-2' && $row->sub_domain_id == 'NCA-OSMACC-2-1')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 2-2.IAM Cybersecurity Identity and Access --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ٢-٢ إدارة هويات الدخول والصلاحيات
        </p>
        <p class="maindomaintext">
            ضمان حماية الأمن السيبراني للوصول المنطقي )Logical Access( إلى الأصول
            المعلوماتية والتقنية للجهة من أجل منع الوصول غير المصرح به وتقييد
            الوصول إلى ما هو مطلوب لإنجاز الأعمال المتعلقة بالجهة.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-OSMACC-2' && $row->sub_domain_id == 'NCA-OSMACC-2-2')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 2-3.S&F Cybersecurity Security and Facility --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ٢-٣ حماية الأنظمة وأجهزة معالجة المعلومات
        </p>
        <p class="maindomaintext">
            ضمان حماية الأنظمة وأجهزة معالجة المعلومات بما في ذلك أجهزة المستخدمين
            والبنى التحتية للجهة من المخاطر السيبرانية
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-OSMACC-2' && $row->sub_domain_id == 'NCA-OSMACC-2-3')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 2-4.EML Cybersecurity Emial Protection --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ٢-٤ حماية البريد الإلكتروني
        </p>
        <p class="maindomaintext">
            ضمان حماية البريد الإلكتروني للجهة من المخاطر السيبرانية
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-OSMACC-2' && $row->sub_domain_id == 'NCA-OSMACC-2-4')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 2-5.NSEC Cybersecurity Network Security --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ٢-٥ إدارة أمن الشبكات
        </p>
        <p class="maindomaintext">
            ضمان حماية شبكات الجهة من المخاطر السيبرانية
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-OSMACC-2' && $row->sub_domain_id == 'NCA-OSMACC-2-5')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 2-6.MDM Cybersecurity Mobile Device Security --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ٢-٦ أمن الأجهزة المحمولة
        </p>
        <p class="maindomaintext">
            ضمان حماية أجهزة الجهة المحمولة )بما في ذلك أجهزة الحاسب المحمول
            والهواتف الذكية الأجهزة الذكية اللوحية( من المخاطر السيبرانية. وضمان
            التعامل بشكل آمن مع المعلومات لحساسة والمعلومات
        </p>
        <p class="maindomaintext">
            الخاصة بأعمال الجهة وحمايتها أثناء النقل والتخزين عند استخدام الأجهزة
            الشخصية للعاملين في الجهة )مبدأ« BYOD»(.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-OSMACC-2' && $row->sub_domain_id == 'NCA-OSMACC-2-6')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 2-7.D&I Cybersecurity Data and Information --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ٢-٧ حماية البيانات والمعلومات
        </p>
        <p class="maindomaintext">
            ضمان حماية السرية وسلامة بيانات ومعلومات الجهة ودقتها وتوافرها، وذلك
            وفقًاً للسياسات والإجراءات التنظيمية للجهة، والمتطلبات التشريعية
            والتنظيمية ذات العلاقة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-OSMACC-2' && $row->sub_domain_id == 'NCA-OSMACC-2-7')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
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
        <p class="maindomaintext" style="font-weight: 600">
            ٣-١ جوانب صمود الأمن السيبراني في إدارة استمرارية الأعمال
        </p>
        <p class="maindomaintext">
            الآثار المترتبة على الاضطرابات في الخدمات الإلكترونية الحرجة للجهة
            وأنظمة وأجهزة معالجة معلوماتها جراء الكوارث الناتجة عن المخاطر
            السيبرانية.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-OSMACC-3' && $row->sub_domain_id == 'NCA-OSMACC-3-1')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>

</div>
@endsection