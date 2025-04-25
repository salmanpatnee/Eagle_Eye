@extends('4-Process/19-NCAReporting/partials/app')
@section('action-buttons')
<a href="{{route('tcc-regulatory-summary.show')}}" class="ReportButton">
    <p>تقرير ملخص</p>
    <p>Summary Report</p>
</a>
<a href="{{route('regulatory-reports.create')}}?best_practice=NCA-TCC-2021" class="ReportButton">
    <p>تقرير مفصل</p>
    <p>Detailed Report</p>
</a>
<a href="{{ route('tcc-regulatory-report.excel') }}?controlAssessmentId={{ $controlAssessmentId }}"
    class="ReportButton">
    <p>تنزيل بصيغة إكسل</p>
    <p>Download in Excel</p>
</a>
@endsection

@section('header')
<p class="arabichead">
    الهيئة الوطنية للأمن السيبراني - ضوابط الأمن السيبراني للعمل عن بعد
</p>
<p class="enghead" style="margin-top: 20px">
    Control Assessment Regulator Reports
</p>
<p class="enghead">
    National Cybersecurity Authority - Telework Cybersecurity Controls
    (NCA-TCC)
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
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-TCC-1' && $row->sub_domain_id == 'NCA-TCC-1-1')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
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
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-TCC-1' && $row->sub_domain_id == 'NCA-TCC-1-2')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
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
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-TCC-1' && $row->sub_domain_id == 'NCA-TCC-1-3')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
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
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-TCC-2' && $row->sub_domain_id == 'NCA-TCC-2-1')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
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
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-TCC-2' && $row->sub_domain_id == 'NCA-TCC-2-2')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
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
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-TCC-2' && $row->sub_domain_id == 'NCA-TCC-2-3')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
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
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-TCC-2' && $row->sub_domain_id == 'NCA-TCC-2-4')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
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
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-TCC-2' && $row->sub_domain_id == 'NCA-TCC-2-5')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
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
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-TCC-2' && $row->sub_domain_id == 'NCA-TCC-2-6')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
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
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-TCC-2' && $row->sub_domain_id == 'NCA-TCC-2-7')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 2-8.CRYPT Cybersecurity Cryptography --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">٢-٨ التشغير</p>
        <p class="maindomaintext">
            ضمان الاستخدام السليم والفعال للتشفير لحماية الأصول المعلوماتية
            الإلكترونية للجهة، وذلك وفقًاً للسياسات والإجراءات التنظيمية للجهة،
            والمتطلبات التشريعية والتنظيمية ذات العلاقة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-TCC-2' && $row->sub_domain_id == 'NCA-TCC-2-8')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 2-9.B&R Cybersecurity Backup and Recovery --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ٢-٩ إدارة النسخ الاحتياطية
        </p>
        <p class="maindomaintext">
            ضمان حماية بيانات ومعلومات الجهة والإعـــدادات التقنية للأنظمة
            والتطبيقات الخاصة بالجهة من الأضرار الناجمة عن المخاطر السيبرانية،
            وذلك وفقًاً للسياسات والإجراءات التنظيمية للجهة، والمتطلبات التشريعية
            والتنظيمية ذات العلاقة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-TCC-2' && $row->sub_domain_id == 'NCA-TCC-2-9')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 2-10.VA Cybersecurity Vulnerability Management --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ٢-١٠ إدارة الثغرات
        </p>
        <p class="maindomaintext">
            ضمان اكتشاف الثغرات التقنية في الوقت المناسب ومعالجتها بشكل فعال، وذلك
            لمنع أو تقليل احتمالية استغلال هذه الثغرات من قبل الهجمات السيبرانية
            وتقليل الآثار المترتبة على أعمال الجهة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-TCC-2' && $row->sub_domain_id == 'NCA-TCC-2-10')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 2-11.PEN Cybersecurity Penetration Testing --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ٢-١١ اختبار الاختراق
        </p>
        <p class="maindomaintext">
            تقييم واختبار مدى فعالية قدرات تعزيز الأمن السيبراني في الجهة، وذلك من
            خلال عمل محاكاة لتقنيات وأساليب الهجوم السيبراني الفعلية. ولاكتشاف
            نقاط الضعف الأمنية غير المعروفة والتي قد تؤدي إلى الاختراق السيبراني
            للجهة. وذلك وفقًاً للمتطلبات التشريعية والتنظيمية ذات العلاقة .
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-TCC-2' && $row->sub_domain_id == 'NCA-TCC-2-11')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- 2-12.EVNT Cybersecurity Event Logs --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600">
            ٢-١٢ إدارة سجلات الأحداث ومراقبة الأمن السيبراني
        </p>
        <p class="maindomaintext">
            ضمان تجميع وتحليل ومراقبة سجلات أحداث الأمن السيبراني في الوقت المناسب
            من أجل الاكتشاف الاستباقي للهجمات السيبرانية وإدارة مخاطرها بفعالية
            لمنع أو تقليل الآثار المترتبة على أعمال الجهة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-TCC-2' && $row->sub_domain_id == 'NCA-TCC-2-12')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>

</div>
@endsection