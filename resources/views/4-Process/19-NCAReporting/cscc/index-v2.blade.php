@extends('4-Process/19-NCAReporting/partials/app')
@section('action-buttons')
<a href="{{route('cscc-regulatory-summary.show')}}" class="ReportButton">
    <p>تقرير ملخص</p>
    <p>Summary Report</p>
</a>
<a href="{{route('regulatory-reports.create')}}?best_practice=NCA-CSCC-2019" class="ReportButton">
    <p>تقرير مفصل</p>
    <p>Detailed Report</p>
</a>
<a href="{{ route('cscc-regulatory-report.excel') }}?controlAssessmentId={{ $controlAssessmentId }}"
    class="ReportButton">
    <p>تنزيل بصيغة إكسل</p>
    <p>Download in Excel</p>
</a>
@endsection

@section('header')
<p class="arabichead">الهيئة الوطنية للأمن السيبراني - ضوابط الأمن السيبراني للأنظمة الحساسة</p>
<p class="enghead" style="margin-top: 20px">Control Assessment Regulator Reports</p>
<p class="enghead">National Cybersecurity Authority - Critica Systems Cybersecurity Controls (NCA-CSCC)</p>
@endsection

@section('content')
<div class="">
    <div class="domainSubdomain">
        <p class="maindomain">(Main Domain) المكون الأساسي</p>
        <p class="maindomaintext">١ حوكمة الأمن السيبراني</p>
    </div>
    <!-- NCA-CSCC-1-1 Cybersecurity Strategy -->
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            :١-١ استراتيجية الأمن السيبراني
        </p>
        <p class="maindomaintext">
            ضمان احتواء خطط العمل والأهداف والمبادرات والمشاريع داخل الجهة للأمن السيبراني وإسهامها في تحقيق
            المتطلبات التشريعية والتنظيمية ذات العلاقة
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-1' && $row->sub_domain_id == 'NCA-CSCC-1-1')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-1-2 Cybersecurity Risk Management --}}
    <div class="domainSubdomain" dir="rtl">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            - ١

            إدارة مخاطر األمن السيبراني
        </p>
        <p class="maindomaintext">
            ضامن إدارة مخاطر األمن السيرباين؛ لحامية األصول املعلوماتية والتقنية للجهة، عىل نحو ممنهج؛
            وذلك وفقاً للسياسات واإلجراءات التنظيمية للجهة، واملتطلبات الترشيعية والتنظيمية ذات العالقة.

        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-1' && $row->sub_domain_id == 'NCA-CSCC-1-2')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-1-3 Cybersecurity Project Management --}}
    <div class="domainSubdomain" dir="rtl">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ١ - ٣

            األمن السيبراني ضمن إدارة المشاريع المعلوماتية والتقنية </p>
        <p class="maindomaintext">
            التأكد من أن متطلبات األمن السيرباين مضمنة يف منهجية إدارة مشاريع الجهة وإجراءاتها؛ لحامية الرسية،
            وسالمة األصول املعلوماتية والتقنية للجهة، ودقتها وتوافرها؛ وذلك وفقاً للسياسات واإلجراءات التنظيمية
            للجهة، واملتطلبات الترشيعية والتنظيمية ذات العالقة.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-1' && $row->sub_domain_id == 'NCA-CSCC-1-3')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-1-4 Cybersecurity review and audit --}}
    <div class="domainSubdomain" dir="rtl">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ١ - ٤
            المراجعة والتدقيق الدوري لألمن السيبراني


        </p>
        <p class="maindomaintext">
            ضامن التأكد من أن ضوابط األمن السيرباين، لدى الجهة؛ مطبقة، وتعمل وفقاً للسياسات واإلجراءات
            التنظيمية للجهة؛ وكذلك للمتطلبات الترشيعية والتنظيمية الوطنية ذات العالقة، واملتطلبات الدولية
            ّة تنظيمياً عىل الجهة.

        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-1' && $row->sub_domain_id == 'NCA-CSCC-1-4')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-1-5 Cybersecurity Human Resources --}}
    <div class="domainSubdomain" dir="rtl">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ١ - ٥
            األمن السيبراني المتعلق بالموارد البشرية
        </p>
        <p class="maindomaintext">
            ضامن التأكد من أن مخاطر األمن السيرباين ومتطلباته، املتعلقة بالعاملني )موظفني ومتعاقدين( يف الجهة؛
            تعالج بفعالية، قبل عملهم، وأثنائه، وعند انتهائه. وذلك وفقاً للسياسات واإلجراءات التنظيمية للجهة؛
            واملتطلبات الترشيعية والتنظيمية ذات العالقة.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-1' && $row->sub_domain_id == 'NCA-CSCC-1-5')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>

    <div class="domainSubdomain">
        <p class="maindomain">(Main Domain) المكون الأساسي</p>
        <p class="maindomaintext"> ٢ تعزيز األمن السيبراني </p>
    </div>
    {{-- NCA-CSCC-2- Cybersecurity Assest Management --}}
    <div class="domainSubdomain" dir="rtl">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ٢ - ١
            إدارة األصول
        </p>
        <p class="maindomaintext">
            التأكد من أن الجهة لديها قامئة جرد دقيقة، وحديثة لألصول؛ تشمل التفاصيل ذات العالقة، لجميع
            األصول املعلوماتية، والتقنية املتاحة للجهة؛ وذلك من أجل دعم العمليات التشغيلية للجهة، ومتطلبات
            األمن السيرباين، بهدف تحقيق رسية األصول املعلوماتية والتقنية للجهة، وسالمتها ودقتها وتوافرها.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-2' && $row->sub_domain_id == 'NCA-CSCC-2-1')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-2-2 Cybersecurity Identity and Access --}}
    <div class="domainSubdomain" dir="rtl">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            ٢ - ٢
            إدارة هويات الدخول والصالحيات </p>
        <p class="maindomaintext">
            ضامن حامية األمن السيرباين للوصول املنطقي )Access Logical )إىل األصول املعلوماتية والتقنية
            الهدف للجهة؛ من أجل منع الوصول غري املرصح به، وتقييد الوصول إىل ما هو مطلوب؛ إلنجاز األعامل املتعلقة بالجهة.
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-2' && $row->sub_domain_id == 'NCA-CSCC-2-2')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-2-3 Cybersecurity system and facility protection --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            Cybersecurity Risk Management
        </p>
        <p class="maindomaintext">
            Details
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-2' && $row->sub_domain_id == 'NCA-CSCC-2-3')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-2-4 Cybersecurity Network Security --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            Cybersecurity Risk Management
        </p>
        <p class="maindomaintext">
            Details
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-2' && $row->sub_domain_id == 'NCA-CSCC-2-4')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-2-5 Cybersecurity Mobile Device --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            Cybersecurity Risk Management
        </p>
        <p class="maindomaintext">
            Details
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-2' && $row->sub_domain_id == 'NCA-CSCC-2-5')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-2-6 Cybersecurity Data and Information --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            Cybersecurity Risk Management
        </p>
        <p class="maindomaintext">
            Details
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-2' && $row->sub_domain_id == 'NCA-CSCC-2-6')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-2-7 Cybersecurity Cryptography --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            Cybersecurity Risk Management
        </p>
        <p class="maindomaintext">
            Details
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-2' && $row->sub_domain_id == 'NCA-CSCC-2-7')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-2-8 Cybersecurity Backup and Recovery --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            Cybersecurity Risk Management
        </p>
        <p class="maindomaintext">
            Details
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-2' && $row->sub_domain_id == 'NCA-CSCC-2-8')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-2-8 Cybersecurity Vulnerability --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            Cybersecurity Risk Management
        </p>
        <p class="maindomaintext">
            Details
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-2' && $row->sub_domain_id == 'NCA-CSCC-2-9')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-2-10 Cybersecurity Penetration --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            Cybersecurity Risk Management
        </p>
        <p class="maindomaintext">
            Details
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-2' && $row->sub_domain_id == 'NCA-CSCC-2-10')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-2-11 Cybersecurity Event Log --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            Cybersecurity Risk Management
        </p>
        <p class="maindomaintext">
            Details
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-2' && $row->sub_domain_id == 'NCA-CSCC-2-11')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-2-12 Cybersecurity Web Application --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            Cybersecurity Risk Management
        </p>
        <p class="maindomaintext">
            Details
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-2' && $row->sub_domain_id == 'NCA-CSCC-2-12')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-2-13 Cybersecurity Application Security --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            Cybersecurity Risk Management
        </p>
        <p class="maindomaintext">
            Details
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-2' && $row->sub_domain_id == 'NCA-CSCC-2-13')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-3-1 Cybersecurity BCM --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            Cybersecurity Risk Management
        </p>
        <p class="maindomaintext">
            Details
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-3' && $row->sub_domain_id == 'NCA-CSCC-3-1')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-4-1 Cybersecurity Third Party --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            Cybersecurity Risk Management
        </p>
        <p class="maindomaintext">
            Details
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-4' && $row->sub_domain_id == 'NCA-CSCC-4-1')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    {{-- NCA-CSCC-4-2 Cybersecurity Cloud Computing --}}
    <div class="domainSubdomain">
        <p class="maindomain">(Sub Domain) المكون الفرعي</p>
        <p class="maindomaintext" style="font-weight: 600;">
            Cybersecurity Risk Management
        </p>
        <p class="maindomaintext">
            Details
        </p>
    </div>
    <div class="table-responsive">
        <table class="customers">
            <tr>
                @include('4-Process/19-NCAReporting/cscc/head-cells')
            </tr>
            @foreach ($report as $row)
            @if ($row->main_domain_id == 'NCA-CSCC-2' && $row->sub_domain_id == 'NCA-CSCC-4-2')
            <tr>
                @include('4-Process/19-NCAReporting/cscc/cells')
            </tr>
            @endif
            @endforeach
        </table>
    </div>


</div>
@endsection