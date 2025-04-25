@extends('4-Process/19-NCAReporting/partials/app')
@section('action-buttons')
<a href="{{route('ecc-regulatory-summary.show')}}" class="ReportButton">
    <p>تقرير ملخص</p>
    <p>Summary Report</p>
</a>
<a href="{{route('regulatory-reports.create')}}?best_practice=NCA-ECC-2018" class="ReportButton">
    <p>تقرير مفصل</p>
    <p>Detailed Report</p>
</a>
<a href="{{ route('ecc-regulatory-report.excel') }}?controlAssessmentId={{ $controlAssessmentId }}"
    class="ReportButton">
    <p>تنزيل بصيغة إكسل</p>
    <p>Download in Excel</p>
</a>
@endsection

@section('header')
<p class="arabichead">الهيئة الوطنية للأمن السيبراني - الضوابط الأساسية للأمن السيبراني</p>
<p class="enghead" style="margin-top: 20px">Control Assessment Regulator Reports</p>
<p class="enghead">National Cybersecurity Authority - Essential Cybersecurity Controls (NCA-ECC)</p>
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
        <p class="maindomaintext" style="font-weight: 600;">
            :١-١ استراتيجية الأمن السيبراني
        </p>
        <p class="maindomaintext">
            ضمان إسهام خطط العمل للأمن السيبراني والأهداف والمبادرات والمشاريع داخل الجهة في تحقيق المتطلبات
            التشريعية والتنظيمية ذات العلاقة
        </p>
    </div>

    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-1' &&
            $row->sub_domain_id == 'NCA-ECC-1-1')
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
        <p class="maindomaintext" style="font-weight: 600;">
            :١-٢ إدارة الأمن السيبراني
        </p>
        <p class="maindomaintext">
            ضمان التزام ودعم صاحب الصلاحية للجهة فيما يتعلق بإدارة وتطبيق برامج الأمن السيبراني في تلك الجهة وفقًاً
            للمتطلبات التشريعية والتنظيمية ذات العلاقة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-1' &&
            $row->sub_domain_id == 'NCA-ECC-1-2')
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
        <p class="maindomaintext" style="font-weight: 600;">
            :١-٣ سياسات وإجراءات الأمن السيبراني
        </p>
        <p class="maindomaintext">
            ضمان توثيق ونشر متطلبات الأمن السيبراني والتزام الجهة بها، وذلك وفقًاً لمتطلبات الأعمال التنظيمية للجهة،
            والمتطلبات التشريعية والتنظيمية ذات العلاقة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-1' &&
            $row->sub_domain_id == 'NCA-ECC-1-3')
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
        <p class="maindomaintext" style="font-weight: 600;">
            :١-٤ أدوار ومسؤوليات الأمن السيبراني
        </p>
        <p class="maindomaintext">
            ضمان تحديد أدوار ومسؤوليات واضحة لجميع الأطراف المشاركة في تطبيق ضوابط الأمن السيبراني في الجهة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-1' &&
            $row->sub_domain_id == 'NCA-ECC-1-4')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 1-5.RSK Cybersecurity Risk Management --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ١-٥ إدارة مخاطر الأمن السيبراني
        </p>
        <p class="maindomaintext">
            ضمان إدارة مخاطر الأمن السيبراني على نحو ممنهج يهدف إلى حماية الأصول المعلوماتية والتقنية للجهة، وذلك
            وفقًاً للسياسات والإج راءات التنظيمية للجهة والمتطلبات التشريعية والتنظيمية ذات العلاقة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-1' &&
            $row->sub_domain_id == 'NCA-ECC-1-5')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 1-6.PMO Cybersecurity Porject Management --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ١-٦ الأمن السيبراني ضمن إدارة مشاريع المعلومات والتقنية
        </p>
        <p class="maindomaintext">
            التأكد من أن متطلبات الأمن السيبراني مضمنة في منهجية وإجراءات إدارة مشاريع الجهة لحماية السرية وسلامة
            الأصول المعلوماتية والتقنية للجهة ودقتها وتوافرها، وذلك وفقًاً للسياسات والإج راءات التنظيمية للجهة
            والمتطلبات التشريعية والتنظيمية ذات العلاقة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-1' &&
            $row->sub_domain_id == 'NCA-ECC-1-6')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 1-7.RGL Cybersecurity Laws and Standards --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ١-٧ الالتزام بتشريعات وتنظيمات ومعايير الأمن السيبراني
        </p>
        <p class="maindomaintext">
            ضمان التأكد من أن برنامج الأمن السيبراني لدى الجهة يتوافق مع المتطلبات التشريعية والتنظيمية ذات العلاقة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-1' &&
            $row->sub_domain_id == 'NCA-ECC-1-7')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 1-8.A&A Cybersecurity Audit and Review --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ١-٨ المراجعة والتدقيق الدوري للأمن السيبراني
        </p>
        <p class="maindomaintext">
            ضمان التأكد من أن ضوابط الأمن السيبراني لدى الجهة مطبقة وتعمل وفقًاً للسياسات والإجراءات التنظيمية
            للجهة، والمتطلبات التشريعية والتنظيمية الوطنية ذات العلاقة، والمتطلبات الدولية المقرّة تنظيميًاً على
            الجهة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-1' &&
            $row->sub_domain_id == 'NCA-ECC-1-8')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 1-9.HR Cybersecurity Human Resource --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ١-٩ الأمن السيبراني المتعلق بالموارد البشرية
        </p>
        <p class="maindomaintext">
            ضمان التأكد من أن مخاطر ومتطلبات الأمن السيبراني المتعلقة بالعاملين )موظفين ومتعاقدين( في الجهة تعالج
            بفعالية قبل وأثناء وعند انتهاء/إنهاء عملهم، وذلك وفقًاً للسياسات والإجراءات التنظيمية للجهة، والمتطلبات
            التشريعية والتنظيمية ذات العلاقة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-1' &&
            $row->sub_domain_id == 'NCA-ECC-1-9')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 1-10.TRG Cybersecurity Awarness and Training --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ١-١٠ برنامج التوعية والتدريب بالأمن السيبراني
        </p>
        <p class="maindomaintext">
            ضمان التأكد من أن العاملين بالجهة لديهم التوعية الأمنية اللازمة وعلى دراية بمسؤولياتهم في جال الأمن
            السيبراني. والتأكد من تزويد العاملين بالجهة بالمهارات والمؤهلات والدورات لتدريبية المطلوبة
        </p>
        <p class="maindomaintext">
            في مجال الأمن السيبراني حماية الأصول المعلوماتية والتقنية للجهة القيام بمسؤولياتهم تجاه الأمن السيبراني
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-1' &&
            $row->sub_domain_id == 'NCA-ECC-1-10')
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
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-2' &&
            $row->sub_domain_id == 'NCA-ECC-2-1')
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
        <p class="maindomaintext" style="font-weight: 600;">
            ٢-٢ إدارة هويات الدخول والصلاحيات
        </p>
        <p class="maindomaintext">
            ضمان حماية الأمن السيبراني للوصول المنطقي )Logical Access( إلى الأصول المعلوماتية والتقنية للجهة من أجل
            منع الوصول غير المصرح به وتقييد الوصول إلى ما هو مطلوب لإنجاز الأعمال المتعلقة بالجهة.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-2' &&
            $row->sub_domain_id == 'NCA-ECC-2-2')
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
        <p class="maindomaintext" style="font-weight: 600;">
            ٢-٣ حماية الأنظمة وأجهزة معالجة المعلومات
        </p>
        <p class="maindomaintext">
            ضمان حماية الأنظمة وأجهزة معالجة المعلومات بما في ذلك أجهزة المستخدمين والبنى التحتية للجهة من المخاطر
            السيبرانية
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-2' &&
            $row->sub_domain_id == 'NCA-ECC-2-3')
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
        <p class="maindomaintext" style="font-weight: 600;">
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
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-2' &&
            $row->sub_domain_id == 'NCA-ECC-2-4')
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
        <p class="maindomaintext" style="font-weight: 600;">
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
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-2' &&
            $row->sub_domain_id == 'NCA-ECC-2-5')
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
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-2' &&
            $row->sub_domain_id == 'NCA-ECC-2-6')
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
        <p class="maindomaintext" style="font-weight: 600;">
            ٢-٧ حماية البيانات والمعلومات
        </p>
        <p class="maindomaintext">
            ضمان حماية السرية وسلامة بيانات ومعلومات الجهة ودقتها وتوافرها، وذلك وفقًاً للسياسات والإجراءات
            التنظيمية للجهة، والمتطلبات التشريعية والتنظيمية ذات العلاقة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-2' &&
            $row->sub_domain_id == 'NCA-ECC-2-7')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
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
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-2' &&
            $row->sub_domain_id == 'NCA-ECC-2-8')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
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
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-2' &&
            $row->sub_domain_id == 'NCA-ECC-2-9')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
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
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-2' &&
            $row->sub_domain_id == 'NCA-ECC-2-10')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
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
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-2' &&
            $row->sub_domain_id == 'NCA-ECC-2-11')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
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
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-2' &&
            $row->sub_domain_id == 'NCA-ECC-2-12')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 2-13.CTI Cybersecurity Threat and Incident --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ٢-١٣ إدارة حوادث وتهديدات الأمن السيبراني
        </p>
        <p class="maindomaintext">
            ضمان تحديد واكتشاف حوادث الأمن السيبراني في الوقت المناسب وإدارتها بشكل فعّال والتعامل مع تهديدات الأمن
            السيبراني استباقيًاً من أجل منع أو تقليل الآثار المترتبة على أعمال الجهة. مع مراعاة ما ورد في الأمر
            السامي الكريم رقم 37140 وتاريخ 14 / 8 / 1438هـ
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-2' &&
            $row->sub_domain_id == 'NCA-ECC-2-13')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 2-14.PHY Cybersecurity Physical Security --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ٢-١٤ الأمن المادي
        </p>
        <p class="maindomaintext">
            ضمان حماية الأصول المعلوماتية والتقنية للجهة من الوصول المادي غير المصرح به والفقدان والسرقة والتخريب
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-2' &&
            $row->sub_domain_id == 'NCA-ECC-2-14')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 2-15.WAS Cybersecurity Web Application Security --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ٢-١٥ حماية تطبيقات الويب
        </p>
        <p class="maindomaintext">
            ضمان حماية تطبيقات الويب الخارجية للجهة من المخاطر السيبرانية
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-2' &&
            $row->sub_domain_id == 'NCA-ECC-2-15')
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
        <p class="maindomaintext" style="font-weight: 600;">
            ٣-١ جوانب صمود الأمن السيبراني في إدارة استمرارية الأعمال
        </p>
        <p class="maindomaintext">
            الآثار المترتبة على الاضطرابات في الخدمات الإلكترونية الحرجة للجهة وأنظمة وأجهزة معالجة معلوماتها جراء
            الكوارث الناتجة عن المخاطر السيبرانية.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-3' &&
            $row->sub_domain_id == 'NCA-ECC-3-1')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 4-1.TPT Cybersecurity Third Party Management --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Main Domain) المكون الأساسي</p>
        <p class="maindomaintext">٤ الأمن السيبراني المتعلق بالأطراف الخارجية والحوسبة السحابية</p>
    </div>
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ٤-١ الأمن السيبراني المتعلق بالأطراف الخارجية
        </p>
        <p class="maindomaintext">
            ضمان حماية أصول الجهة من مخاطر الأمن السيبراني المتعلقة بالأطراف الخارجية )بما في ذلك خدمات الإسناد
            لتقنية المعلومات" Outsourcing" والخدمات المدارة" Managed Services"(. وفقًاً للسياسات والإجراءات
            التنظيمية للجهة، والمتطلبات التشريعية والتنظيمية ذات العلاقة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-4' &&
            $row->sub_domain_id == 'NCA-ECC-4-1')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 4-2.CCH Cybersecurity Cloud Computing --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ٤-٢ الأمن السيبراني المتعلق بالحوسبة السحابية والاستضافة
        </p>
        <p class="maindomaintext">
            ضمان معالجة المخاطر السيبرانية وتنفيذ متطلبات الأمن السيبراني للحوسبة السحابية والاستضافة بشكل ملائم
            وفعّال، وذلك وفقًاً للسياسات والإجــراءات التنظيمية للجهة، والمتطلبات التشريعية والتنظيمية والأوامر
            والقرارات ذات العلاقة. وضمان حماية الأصول المعلوماتية والتقنية للجهة على خدمات لحوسبة السحابية التي تتم
            استضافتها أو معالجتها أو إدارتها بواسطة أطراف خارجية
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-4' &&
            $row->sub_domain_id == 'NCA-ECC-4-2')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 5-1.ICS Cybersecurity Industrial Control --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Main Domain) المكون الأساسي</p>
        <p class="maindomaintext">٥ الأمن السيبراني لأنظمة التحكم الصناعي</p>
    </div>
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ٥-١ حماية أجهزة وأنظمة التحكم الصناعي
        </p>
        <p class="maindomaintext">
            ضمان إدارة الأمن السيبراني بشكل سليم وفعال لحماية توافر وسلامة وسرية أصول الجهة المتعلقة بأجهزة وأنظمة
            التحكم الصناعي )OT/ICS( ضد الهجوم السيبراني )مثل الوصول غير المصرح به والتخريب والتجسس والتلاعب( بما
            يتماشى مع إستراتيجية الأمن السيبراني للجهة، وإدارة مخاطر الأمن السيبراني ،والمتطلبات التشريعية
            والتنظيمية ذات العلاقة، وكذلك المتطلبات الدولية المقرّة تنظيميًاً على الجهة والمتعلقة بالأمن السيبراني
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/partials/head-cells')
            </tr>
            @foreach ($report as $row)
            @if (
            $row->best_practices_id == 'NCA-ECC-2018' &&
            $row->main_domain_id == 'NCA-ECC-5' &&
            $row->sub_domain_id == 'NCA-ECC-5-1')
            <tr>
                @include('4-Process/19-NCAReporting/partials/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</div>
@endsection