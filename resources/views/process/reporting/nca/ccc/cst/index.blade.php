@extends('pdf.partials.layout')
@section('title', 'NCA CCC CST 2020 Assessment and Compliance')
@section('action-buttons')
    <a href="{{ route('ccc-regulatory-summary.show') }}?controlAssessmentId={{ $controlAssessmentId }}&cloudControlType={{ $cloudControlType }}"
        class="btn-report">
        <p>تقرير ملخص</p>
        <p>Summary Report</p>
    </a>
    {{-- <a href="{{ route('regulatory-reports.create') }}?best_practice=NCA-CCC-2020" class="btn-report">
        <p>تقرير مفصل</p>
        <p>Detailed Report</p>
    </a> --}}
    <a href="{{ route('ccc-regulatory-report.excel') }}?cloudControlType=cst"
    class="btn-report">
    <p>تنزيل بصيغة إكسل</p>
    <p>Download in Excel</p>
</a>
<a href="{{ route('ccc-regulatory-report.show') }}?pdf=1&cloudControlType=cst" class="btn-report">
    <p>تنزيل بصيغة بي دي إف</p>
    <p>Download as PDF</p>
</a>
@endsection

@section('header')
    <h1 class="arabic-text">
        الهيئة الوطنية للأمن السيبراني - التحكم في الأمن السيبراني السحابي
    </h1>
    <p style="margin-top: 20px">
        Control Assessment Regulator Reports
    </p>
    <p>
        National Cybersecurity Authority - Cloud Cybersecurity Controls
        NCA-CCC CST
    </p>


@endsection
@section('content')



    <table class="table mb-0">
        <tbody>
            {{-- Heads --}}
            <tr class="bg-light-gray">
                <th>
                    <p>
                        <span>مستوى البيانات المستضافة في الخدمة</span>
                        <br>
                        <span>Data Clasification Level Hosted in Cloud</span>
                    </p>
                </th>
                <th>
                    <p>
                        <span>المستوى ١</span>
                        <br>
                        <span>Level 1</span>
                    </p>
                </th>
                <th colspan="2">
                    <p>
                        <span>عدد المشتركين في الخدمة</span>
                        <br>
                        <span>Number of CSTs for this service</span>
                    </p>
                </th>
                <th colspan="7"></th>
            </tr>
            <tr class="bg-light-gray">
                <th>
                    <p>
                        <span>المكون الأساسي</span>
                        <br>
                        <span>Main Domain</span>
                    </p>
                </th>
                <th colspan="2">
                    <p>
                        <span>المكون الفرعي </span>
                        <br>
                        <span>Subdomains</span>
                    </p>
                </th>
                <th>
                    <p>
                        <span>نوع الضابط</span>
                        <br>
                        <span>Control Type</span>
                    </p>
                </th>
                <th>
                    <p>
                        <span>رقم الضابط</span>
                        <br>
                        <span>Control Reference Number</span>
                    </p>
                </th>
                <th>
                    <p>
                        <span>إلزامية التطبيق</span>
                        <br>
                        <span>Implementation Mandatoriness</span>
                    </p>
                </th>
                <th>
                    <p>
                        <span>نص الضابط</span>
                        <br>
                        <span>Control Clauses</span>
                    </p>
                </th>
                <th>
                    <p>
                        <span>مستوى الالتزام</span>
                        <br>
                        <span>Compliance Level</span>
                    </p>
                </th>
                <th>
                    <p>
                        <span>الملاحظات</span>
                        <br>
                        <span>Remarks</span>
                    </p>
                </th>
                <th>
                    <p>
                        <span>إجراءات التصحيح</span>
                        <br>
                        <span>Corrective Procedure</span>
                    </p>
                </th>
                <th>
                    <p>
                        <span>تاريخ الالتزام المتوقع
                            (يوم/شهر/ سنة)</span>
                        <br>
                        <span>Expected Compliance Date (Day/Month/Year)</span>
                    </p>
                </th>
            </tr>
            {{-- Heads --}}

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-CCC-1-1-T-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CCC-1-1-T-1-');
                    @endphp
                    <x-main-control-ccc main_domain="Cybersecurity Governance" main_domain_ar="1- حوكمة الأمن السيبراني"
                        main_domain_id="1-1" sub_domain="(Cybersecurity Roles and Responsibilities)"
                        sub_domain_ar="أدوار ومسؤوليات الأمن السيبراني" control_id="1-1-T-1"
                        description="In addition to the ECC control 1-4-1, the Authorizing Official shall also identify, document and approve"
                        description_ar="بالإضافة للضابط ١-٤-١ في الضوابط الأساسية للأمن السيبراني، يجب على صاحب الصلاحية تحديد وتوثيق واعتماد ما يلي:"
                        :control="$control" :status="$status" />

                    <x-sub-control-ccc control_id="1-1-T-1-1"
                        description="Cybersecurity roles and RACI assignment for all stakeholders of the cloud services including Authorizing Official's roles and responsibilities"
                        description_ar="أدوار الأمن السيبراني، وتكليفات المسؤولية والمحاسبة والاستشارة والتبليغ  (RACI)  لكل أصحاب العلاقة في خدمات الحوسبة السحابية، بما في ذلك أدوار ومسؤوليات صاحب الصلاحية."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-2-T-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CCC-1-2-T-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="1-2"
                        sub_domain="(Cybersecurity Risk Management)" sub_domain_ar="إدارة مخاطر الأمن السيبراني"
                        control_id="1-2-T-1"
                        description="Cybersecurity risk management methodology mentioned in the ECC Subdomain 1-5 shall also include for the CST, as a minimum"
                        description_ar="يجب أن تتضمن منهجية إدارة مخاطر الأمن السيبراني المذكورة في المكون الفرعي ١-٥ في الضوابط الأساسية للأمن السيبراني لدى المشتركين بحد أدنى ما يلي:"
                        :control="$control" :status="$status" />

                    <x-sub-control-ccc control_id="1-2-T-1-1"
                        description="Defining acceptable risk levels for the cloud services"
                        description_ar="تحديد المستوى المقبول للمخاطر (Acceptable Risk Levels) فيما يتعلق بخدمات الحوسبة السحابية."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-2-T-1-2')
                    <x-sub-control-ccc control_id="1-2-T-1-2"
                        description="Considering data and information classification accredited by CST in cybersecurity risk management methodology"
                        description_ar="أخذ تصنيف البيانات والمعلومات بالاعتبار في منهجية إدارة مخاطر الأمن السيبراني.  "
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-2-T-1-3')
                    <x-sub-control-ccc control_id="1-2-T-1-3"
                        description="Developing cybersecurity risk register for cloud services, and monitoring it periodically according to the risks"
                        description_ar="إنشاء سجل لمخاطر الأمن السيبراني خاص بالعمليات وخدمات الحوسبة السحابية، ومتابعته دوريًا بما يتناسب مع طبيعة المخاطر."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-3-T-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CCC-1-3-T-1-');
                    @endphp

                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="1-3"
                        sub_domain="(Compliance with Cybersecurity Standards, Laws and Regulations)"
                        sub_domain_ar="الالتزام بتشريعات وتنظيمات ومعايير الأمن السيبراني" control_id="1-3-T-1"
                        description="In addition to the ECC control 1-7-1, the CST legislative and regulatory compliance should include as a minimum with the following requirements"
                        description_ar="بالإضافة للضابط ١-٧-١ في الضوابط الأساسية للأمن السيبراني، يجب أن يشتمل التزام المشتركين بالمتطلبات التشريعية والتنظيمية بحد أدنى ما يلي:"
                        :control="$control" :status="$status" />
                    <x-sub-control-ccc control_id="1-3-T-1-1"
                        description="Continuous or real-time compliance monitoring of the CSP with relevant cybersecurity legislation and contract clauses"
                        description_ar="المراقبة الدائمة والمستمرة لمدى التزام مقدمي الخدمات بالتشريعات، وبنود العقود المتعلقة بالأمن السيبراني."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-4-T-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CCC-1-4-T-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="1-4"
                        sub_domain="(Cybersecurity in Human Resources) "
                        sub_domain_ar="الأمن السيبراني المتعلق بالموارد البشرية " control_id="1-4-T-1"
                        description="In addition to subcontrols in the ECC control 1-9-3, the following requirements should be covered prior the professional relationship of staff with the CST shall cover, at a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ١-٩-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني قبل بدء العلاقة المهنية بين العاملين والمشتركين، بحد أدنى ما يلي:
"
                        :control="$control" :status="$status" />

                    <x-sub-control-ccc control_id="1-4-T-1-1"
                        description="Screening or vetting candidates of personnel with access to Cloud Service sensitive functions (Key Management, Service Administration, Access Control)"
                        description_ar="إجراء المسح الأمني للعاملين الذين لهم حق الوصول إلى المهام الحساسة لخدمات الحوسبة السحابية، مثل: إدارة المفاتيح، إدارة الخدمات، التحكم بالوصول (Access Control).
"
                        :control="$control" border_="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-1-T-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CCC-2-1-T-1-');
                    @endphp

                    <x-main-control-ccc main_domain="(Cybersecurity Defense)" main_domain_ar="2- تعزيز الأمن السيبراني "
                        main_domain_id="2-1" sub_domain="(Asset Management)" sub_domain_ar="إدارة الأصول"
                        control_id="2-1-T-1"
                        description="In addition to controls in the ECC control 2-1, the CST shall cover the following additional controls for cybersecurity requirements for cybersecurity event logs and monitoring management, as a minimum"
                        description_ar="بالإضافة للضوابط ضمن المكون الفرعي ٢-١ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لإدارة الأصول المعلوماتية والتقنية لدى المشتركين، بحد أدنى ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-ccc control_id="2-1-T-1-1"
                        description="Inventory of all cloud services and information and technology assets related to the cloud services"
                        description_ar="حصر جميع الخدمات السحابية والأصول المعلوماتية والتقنية المتعلقة بها."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-T-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CCC-2-2-T-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-2"
                        sub_domain="(Identity and Access Management)" sub_domain_ar="إدارة هويات الدخول والصلاحيات"
                        control_id="2-2-T-1"
                        description="In addition to subcontrols in the ECC control 2-2-3, the CST shall cover the following additional subcontrols for cybersecurity requirements for identity and access management requirements, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٢-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بإدارة هويات الدخول والصلاحيات لدى المشتركين، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-ccc control_id="2-2-T-1-1"
                        description="Identity and access management for all cloud credentials along their full lifecycle"
                        description_ar="إدارة هويات الدخول والصلاحيات لجميع الحسابات، التي لديها صلاحية الوصول إلى الخدمات السحابية، خلال دورة حياتها."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-T-1-2')
                    <x-sub-control-ccc control_id="2-2-T-1-2"
                        description="Confidentiality of cloud user identification, cloud credential and cloud access rights information, including the requirement on users to keep them private (for employed, third party and CST personnel)"
                        description_ar="سرِّية هوية المستخدم والحسابات والصلاحيات، بما في ذلك الطلب من المستخدمين حفظ خصوصيتها (للعاملين، والأطراف الخارجية، والمستخدمين من جهة المشترك)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-T-1-3')
                    <x-sub-control-ccc control_id="2-2-T-1-3"
                        description="Secure session management, including session authenticity, session lockout, and session timeout termination on the cloud"
                        description_ar="الإدارة الآمنة للجلسات (Secure Session Management)، وتشمل موثوقية الجلسات (Authenticity)، وإقفالها (Lockout)، وإنهاء مهلتها (Timeout)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-T-1-4')
                    <x-sub-control-ccc control_id="2-2-T-1-4"
                        description="Multi-factor authentication for privileged cloud users"
                        description_ar="التحقق من الهوية متعدد العناصر لكافة الحسابات السحابية للمستخدمين ذوي الصلاحيات الهامة والحساسة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-T-1-5')
                    <x-sub-control-ccc control_id="2-2-T-1-5"
                        description="Formal process to detect and prevent unauthorized access to cloud (such as a threshold of unsuccessful login attempts)"
                        description_ar="إجراءات لكشف محاولات الوصول غير المصرح به ومنعها مثل: (الحد الأقصى من محاولات عمليات الدخول غير الناجحة (Unsuccessful Login))."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif

                @if ($control->control_id == 'NCA-CCC-2-3-T-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CCC-2-3-T-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-3"
                        sub_domain="(Information System and Information Processing Facilities Protection)	"
                        sub_domain_ar="حماية الأنظمة وأجهزة معالجة المعلومات" control_id="2-3-T-1"
                        description="In addition to subcontrols in the ECC control 2-3-3, the CST shall cover the following additional subcontrols for cybersecurity requirements for information system and processing facilities protection requirements, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٣-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بحماية الأنظمة وأجهزة معالجة المعلومات لدى المشتركين، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />
                    <x-sub-control-ccc control_id="2-3-T-1-1"
                        description="Verifying that the CSP isolates the community cloud services provided to CSTs (government organizations and CNI organizations) from any other cloud computing provided to organizations outside the scope of work"
                        description_ar="التحقق من قيام مقدم الخدمة بعزل الحوسبة السحابية المشتركة المقدمة للمشتركين (الجهات الحكومية والجهات ذات البنية التحتية الحساسة) عن أي حوسبة سحابية أخرى مقدمة للجهات خارج نطاق العمل."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-4-T-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CCC-2-4-T-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-4"
                        sub_domain="(Networks Security Management)" sub_domain_ar="إدارة أمن الشبكات "
                        control_id="2-4-T-1"
                        description="In addition to subcontrols in the ECC control 2-5-3, the CST shall cover the following additional subcontrols for cybersecurity requirements for networks security management requirements, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٥-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بإدارة أمن الشبكات لدى المشتركين، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-ccc control_id="2-4-T-1-1" description="Protecting the connection channel with CSP"
                        description_ar="حماية القناة المستخدمة للاتصال الشبكي مع مقدم الخدمة." :control="$control"
                        theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-5-T-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CCC-2-5-T-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-5"
                        sub_domain="(Mobile Devices Security) 	" sub_domain_ar="أمن الأجهزة المحمولة "
                        control_id="2-5-T-1"
                        description="In addition to subcontrols in the ECC control 2-6-3, the CST shall cover the following additional subcontrols for cybersecurity requirements for mobile device security, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٦-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بأمن الأجهزة المحمولة لدى المشتركين، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-ccc control_id="2-5-T-1-1"
                        description="Data sanitation and secure disposal for end-user devices with access to the cloud services"
                        description_ar="قبل إعادة استخدام الأجهزة المحمولة أو التخلص منها، خصوصًا التي يتم استخدامها للدخول على الخدمات السحابية، يجب التأكد من عدم احتوائها على أية بيانات أو معلومات باستخدام وسائل آمنة."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-6-T-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CCC-2-6-T-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-6"
                        sub_domain="(Data and Information Protection)	" sub_domain_ar="حماية البيانات والمعلومات "
                        control_id="2-6-T-1"
                        description="In addition to subcontrols in the ECC control 2-7-3, the CST shall cover the following additional subcontrols for cybersecurity requirements for protecting CST’s data and information in cloud computing , as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٧-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي  متطلبات الأمن السيبراني الخاصة بحماية بيانات و معلومات المشتركين في الحوسبة السحابية، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-ccc control_id="2-6-T-1-1"
                        description="Exit Strategy to ensure means for secure disposal of data on termination or expiry of the contract with the CSP"
                        description_ar="وجود ضمانات للقدرة على حذف البيانات بطرق آمنة عند الانتهاء من العلاقة مع مقدم الخدمة
 (Exit Strategy)
."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-6-T-1-2')
                    <x-sub-control-ccc control_id="2-6-T-1-2"
                        description="Using secure means to export and transfer data and virtual infrastructure"
                        description_ar="استخدام وسائل آمنة لتصدير ونقل البيانات والبنية التحتية الافتراضية."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-7-T-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CCC-2-7-T-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-7"
                        sub_domain="(Cryptography)" sub_domain_ar="التشفير" control_id="2-7-T-1"
                        description="In addition to subcontrols in the ECC control 2-8-3, the CST shall cover the following additional subcontrols for cryptography, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٨-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بالتشفير لدى المشتركين، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-ccc control_id="2-7-T-1-1"
                        description="Technical mechanisms and cryptographic primitives for strong encryption, in according to the advanced level in the National Cryptographic Standards 
(NCS-1:2020)"
                        description_ar="الالتزام باستخدام طرق وخوارزميات ومفاتيح وأجهزة تشفير محدثة وآمنة، وفقًا للمستوى المتقدم (Advanced) ضمن المعايير الوطنية للتشفير (NCS-1:2020)."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                
                @if ($control->control_id == 'NCA-CCC-2-7-T-1-2')
                <x-sub-control-ccc control_id="2-7-T-1-2"
                        description="Encryption of data and information transferred to or transferred out of the cloud according to the relevant law and regulatory requirements"
                        description_ar="تشفير البيانات والمعلومات المنقولة إلى الخدمات السحابية، أو المنقولة منها، بحسب المتطلبات التشريعية والتنظيمية ذات العلاقة."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif 

                @if ($control->control_id == 'NCA-CCC-2-9-T-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CCC-2-9-T-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-9"
                        sub_domain="(Vulnerabilities Management)" sub_domain_ar="إدارة الثغرات " control_id="2-9-T-1"
                        description="In addition to subcontrols in the ECC control 2-10-3, the CST shall cover the following additional subcontrols for cybersecurity requirements for vulnerability management requirements, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٠-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بإدارة الثغرات لدى المشتركين، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-ccc control_id="2-9-T-1-1"
                        description="Assessing and remediating vulnerabilities cloud services and at least once every three months"
                        description_ar="تقييم ومعالجة الثغرات الخاصة بالخدمات السحابية مرة واحدة كل ثلاثة أشهر على الأقل."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif

                @if ($control->control_id == 'NCA-CCC-2-9-T-1-2')
                <x-sub-control-ccc control_id="2-9-T-1-2"
                        description="Management of CSP-notified vulnerabilities safeguards in place"
                        description_ar="إدارة الثغرات التي تم إشعار المشترك بها عن طريق مقدم الخدمة، ومعالجتها."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif 

                @if ($control->control_id == 'NCA-CCC-2-11-T-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CCC-2-11-T-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-11"
                        sub_domain="(Cybersecurity Event Logs and Monitoring Management)	"
                        sub_domain_ar="إدارة سجلات الأحداث ومراقبة الأمن السيبراني" control_id="2-11-T-1"
                        description="In addition to subcontrols in the ECC control 2-12-3, the CST shall cover the following additional subcontrols for cybersecurity requirements for cybersecurity event logs and monitoring management, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٢-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي  متطلبات الأمن السيبراني لإدارة سجلات الأحداث ومراقبة الأمن السيبراني لدى المشتركين، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-ccc control_id="2-11-T-1-1"
                        description="Activating and collecting of login event logs, and cybersecurity event logs on assets related to cloud services"
                        description_ar="تفعيل وجمع سجلات الأحداث الخاصة بعمليات الدخول (Login)، وسجلات الأحداث الخاصة بالأمن السيبراني على الأصول المتعلقة بالخدمات السحابية."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-11-T-1-2')
                    <x-sub-control-ccc control_id="2-11-T-1-2"
                        description="Activating and collecting of login event logs, and cybersecurity event logs on assets related to cloud services"
                        description_ar="تفعيل وجمع سجلات الأحداث الخاصة بعمليات الدخول (Login)، وسجلات الأحداث الخاصة بالأمن السيبراني على الأصول المتعلقة بالخدمات السحابية."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif

                @if ($control->control_id == 'NCA-CCC-2-15-T-1')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-15"
                        sub_domain="(Key Management)" sub_domain_ar="إدارة المفاتيح " control_id="2-15-T-1"
                        description="Cybersecurity requirements for key management within the CST shall be identified, documented and approved"
                        description_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني، الخاصة بإدارة المفاتيح لدى المشتركين."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-15-T-2')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-15"
                        sub_domain="(Key Management)" sub_domain_ar="إدارة المفاتيح " control_id="2-15-T-2"
                        description="Cybersecurity requirements for key management within the CST shall applied"
                        description_ar="يجب تطبيق متطلبات الأمن السيبراني، الخاصة بإدارة المفاتيح لدى المشتركين."
                        :control="$control" theme="bg-teal" />
                @endif

                {{-- 

                @if ($control->control_id == 'NCA-CCC-2-15-T-1')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id=""" sub_domain=""
                        sub_domain_ar="" control_id="2-15-T-2"
                        description="Cybersecurity requirements for key management within the CST shall applied"
                        description_ar="يجب تطبيق متطلبات الأمن السيبراني، الخاصة بإدارة المفاتيح لدى المشتركين."
                        :control="$control" theme="bg-teal" />
                @endif --}}
                
                @if ($control->control_id == 'NCA-CCC-2-15-T-3-1')
                @php
                $status = getParentStatus($report, 'NCA-CCC-2-11-T-3-');
            @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="2-15-T-3"
                        description="In addition to the ECC subcontrol 
2-8-3-2
 cybersecurity requirements for key management within the CST shall cover, at minimum, the following"
                        description_ar="بالإضافة للضابط ٢-٨-٣-٢ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني، الخاصة بعملية إدارة المفاتيح لدى المشتركين، بحد أدنى ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-15-T-3-1"
                        description="Ensure well-defined ownership for cryptographic keys"
                        description_ar="تحديد ملاك لمفاتيح التشفير
 (Key Owner)." :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-15-T-3-2')
                    <x-sub-control-ccc control_id="2-15-T-3-2"
                        description="A secure data retrieval mechanism in case of cryptographic encryption key lost (such as backup of keys and enforcement of trusted key storage, strictly external to cloud)"
                        description_ar="وجود آلية آمنة لاسترجاع مفاتيح التشفير في حال فقدانها مثل: (نسخها احتياطيًا وتخزينها بطرق آمنة خارج الأنظمة السحابية).
"
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-15-T-3-2')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="2-15-T-4"
                        description="Cybersecurity requirements for key management within the CST shall be applied and reviewed periodically"
                        description_ar="يجب مراجعة متطلبات الأمن السيبراني الخاصة بإدارة المفاتيح لدى المشتركين، ومراجعة تطبييقها، دوريًا."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-3-1-T-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-3-1-T-1-');
                    @endphp

                    <x-main-control-ccc main_domain="(Cybersecurity Resilience)" main_domain_ar="3- صمود الأمن السيبراني "
                        main_domain_id="3-1"
                        sub_domain="(Cybersecurity Resilience aspects of Business Continuity Management - BCM)"
                        sub_domain_ar="جوانب صمود الأمن السيبراني في إدارة استمرارية الأعمال" control_id="3-1-T-1"
                        description="In addition to subcontrols in the ECC control 3-1-3, the CST shall cover the following additional subcontrols for cybersecurity requirements for cybersecurity resilience aspects of business continuity management, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٣-١-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لجوانب صمود الأمن السيبراني في إدارة استمرارية الأعمال لدى المشتركين، بحد أدنى مايلي:"
                        :control="$control" theme="bg-dark" :status="$status"/>

                    <x-sub-control-ccc control_id="3-1-T-1-1"
                        description="Developing and implementing disaster recovery and business continuity procedures related to cloud computing, in a secure manner"
                        description_ar="تطوير وتنفيذ إجراءات التعافي من الكوارث واستمرارية الأعمال، المتعلقة بالحوسبة السحابية، بصورة آمنة."
                        :control="$control" theme="bg-dark" />
                @endif
            @endforeach

        </tbody>
    </table>
@endsection
