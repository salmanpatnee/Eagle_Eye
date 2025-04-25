@extends('pdf.partials.layout')
@section('title', 'NCA CCC CSP 2020 Assessment and Compliance')
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
    <a href="{{ route('ccc-regulatory-report.excel') }}?cloudControlType=csp"
    class="btn-report">
    <p>تنزيل بصيغة إكسل</p>
    <p>Download in Excel</p>
</a>
<a href="{{ route('ccc-regulatory-report.show') }}?pdf=1&cloudControlType=csp" class="btn-report">
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
        (NCA-CCC CSP)
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
                @if ($control->control_id == 'NCA-CCC-1-1-P-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CCC-1-1-P-1-');
                    @endphp

                    <x-main-control-ccc main_domain="Cybersecurity Governance" main_domain_ar="1- حوكمة الأمن السيبراني"
                        main_domain_id="1-1" sub_domain="(Cybersecurity Roles and Responsibilities)"
                        sub_domain_ar="أدوار ومسؤوليات الأمن السيبراني" control_id="1-1-P-1"
                        description="In addition to the ECC control 1-4-1 the Authorizing Official shall also identify, document and approve"
                        description_ar="بالإضافة للضابط ١-٤-١ في الضوابط الأساسية للأمن السيبراني، يجب على صاحب الصلاحية تحديد وتوثيق واعتماد ما يلي:"
                        :control="$control" :status="$status" />

                    <x-sub-control-ccc control_id="1-1-P-1-1"
                        description="Cybersecurity roles and RACI assignment for all stakeholders of the cloud services including Authorizing Official's roles and responsibilities"
                        description_ar="أدوار الأمن السيبراني، وتكليفات المسؤولية والمحاسبة والاستشارة والتبليغ  (RACI)  لكل أصحاب العلاقة في خدمات الحوسبة السحابية، بما في ذلك أدوار ومسؤوليات صاحب الصلاحية."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-2-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-1-2-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="1-2"
                        sub_domain="(Cybersecurity Risk Management)" sub_domain_ar="إدارة مخاطر الأمن السيبراني"
                        control_id="1-2-P-1"
                        description="Cybersecurity risk management methodology mentioned in the ECC Subdomain 1-5, shall also include for the CSP, as a minimum"
                        description_ar="يجب أن تتضمن منهجية إدارة مخاطر الأمن السيبراني المذكورة في المكون الفرعي ١-٥ في الضوابط الأساسية للأمن السيبراني لدى مقدمي الخدمات، بحد أدنى ما يلي:"
                        :control="$control" :status="$status"/>

                    <x-sub-control-ccc control_id="1-2-P-1-1"
                        description="Defining acceptable risk levels for the cloud services, and clarifying them to the CST if they are related to the CST"
                        description_ar="تحديد المستوى المقبول للمخاطر (Acceptable Risk Levels) فيما يتعلق بخدمات الحوسبة السحابية، وتوضيحها للمشترك إذا كانت المخاطر ذات علاقة به."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-2-P-1-2')
                    <x-sub-control-ccc control_id="1-2-P-1-2"
                        description="Considering data and information classification in cybersecurity risk management methodology"
                        description_ar="أخذ تصنيف البيانات والمعلومات بالاعتبار في منهجية إدارة مخاطر الأمن السيبراني."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-2-P-1-3')
                    <x-sub-control-ccc control_id="1-2-P-1-3"
                        description="Developing cybersecurity risk register for cloud services, and monitoring it periodically according to the risks"
                        description_ar="إنشاء سجل لمخاطر الأمن السيبراني خاص بالعمليات وخدمات الحوسبة السحابية، ومتابعته دوريًا بما يتناسب مع طبيعة المخاطر."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-3-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-1-3-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="1-3"
                        sub_domain="(Compliance with Cybersecurity Standards, Laws and Regulations)"
                        sub_domain_ar="الالتزام بتشريعات وتنظيمات ومعايير الأمن السيبراني" control_id="1-3-P-1"
                        description="In addition to the ECC control 1-7-1 the CSP legislative and regulatory compliance should include as a minimum with the following requirements"
                        description_ar="بالإضافة للضابط ١-٧-١ في الضوابط الأساسية للأمن السيبراني، يجب أن يشتمل التزام مقدمي الخدمات بالمتطلبات التشريعية والتنظيمية بحد أدنى ما يلي:"
                        :control="$control" :status="$status"/>
                    <x-sub-control-ccc control_id="1-3-P-1-1"
                        description="Continuous compliance with all laws, regulations, instructions, decisions, regulatory frameworks and controls, and mandates regarding cybersecurity in KSA"
                        description_ar="الالتزام الدائم والمستمر بجميع الأنظمة واللوائح والتعليمات والقرارات والأطر والضوابط التنظيمية المتعلقة بالأمن السيبراني والمعمول بها في المملكة."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-4-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-1-4-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="1-4"
                        sub_domain="(Cybersecurity in Human Resources)"
                        sub_domain_ar="الأمن السيبراني المتعلق بالموارد البشرية " control_id="1-4-P-1"
                        description="In addition to subcontrols in the ECC controls 1-9-3 and 1-9-4, the following requirements should be covered prior and during the professional relationship of personnel with the CSP as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابطين ١-٩-٣ و  ١-٩-٤ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني قبل بدء وخلال العلاقة المهنية بين العاملين ومقدمي الخدمة بحد أدنى ما يلي:"
                        :control="$control" :status="$status"/>

                    <x-sub-control-ccc control_id="1-4-P-1-1"
                        description="Positions of cybersecurity functions in CSP’s data centers within the KSA must be filled with qualified and suitable Saudi nationals"
                        description_ar="فيما يتعلق بمراكز البيانات التابعة لمقدم الخدمة داخل المملكة، يجب أن يشغل وظائف الأمن السيبراني مواطنون سعوديون مؤهلون.
"
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-4-P-1-2')
                    <x-sub-control-ccc control_id="1-4-P-1-2"
                        description="Screening or vetting candidates of personnel working inside KSA who have access to Cloud Technology Stack, periodically"
                        description_ar="إجراء المسح الأمني للعاملين داخل المملكة الذين لهم حق الوصول إلى الأنظمة التقنية السحابية (Cloud Technology Stack (CTS)) دوريًا."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-4-P-1-3')
                    <x-sub-control-ccc control_id="1-4-P-1-3"
                        description="Cybersecurity policies as a prerequisite to access to Cloud Technology Stack, signed and appropriately approved"
                        description_ar="إقرار وتوقيع العاملين على جميع سياسات الأمن السيبراني كشرط مسبق للوصول إلى الأنظمة التقنية السحابية (CTS). "
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-4-P-2-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-1-4-P-2-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="" sub_domain="" sub_domain_ar=""
                        control_id="1-4-P-2"
                        description="In addition to subcontrols in the ECC control 1-9-5, the following requirements should be in place, as a minimum, for the termination/completion of a human resource’s professional relationship with the CSP"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ١-٩-٥ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني بعد انتهاء العلاقة المهنية بين العاملين ومقدمي الخدمة بحد أدنى ما يلي:"
                        :control="$control" :status="$status"/>

                    <x-sub-control-ccc control_id="1-4-P-2-1"
                        description="Assurance that assets owned by the organization (especially those with security exposure) are accounted for and returned upon termination"
                        description_ar="ضمان إعادة الأصول الخاصة بمقدمي الخدمات (لا سيما ذات الصلة بالأمن السيبراني) بمجرد إنهاء الخدمة مع العاملين."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-5-P-1')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="1-5"
                        sub_domain="(Cybersecurity in Change Management)" sub_domain_ar="الأمن السيبراني ضمن إدارة التغيير "
                        control_id="1-5-P-1"
                        description="Cybersecurity requirements for change management within the CSP shall be identified, documented and approved"
                        description_ar="يجب تحديد متطلبات الأمن السيبراني لإدارة التغيير لدى مقدمي الخدمات، وتوثيقها، واعتمادها."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-5-P-2')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="" sub_domain="" sub_domain_ar=""
                        control_id="1-5-P-2"
                        description="Cybersecurity requirements for change management within the CSP shall be applied"
                        description_ar="يجب تطبيق متطلبات الأمن السيبراني، الخاصة بإدارة التغيير لدى مقدمي الخدمات."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-5-P-3-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-1-5-P-3-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="" sub_domain="" sub_domain_ar=""
                        control_id="1-5-P-3"
                        description="Cybersecurity for change management in the CSP shall cover, as a minimum"
                        description_ar="يجب أن يغطي الأمن السيبراني لإدارة التغيير لدى مقدمي الخدمات بحد أدنى ما يلي:"
                        :control="$control" :status="$status"/>

                    <x-sub-control-ccc control_id="1-5-P-3-1"
                        description="Processes and procedures to securely implement changes (planned works) in production systems, with priority given to cybersecurity observations"
                        description_ar="إجراءات تنفيذ التغييرات (المخطط لها) بطرق آمنة، في أنظمة الإنتاج (Production Systems)، مع إعطاء أولوية للملاحظات المتعلقة بالأمن السيبراني."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-5-P-3-2')
                    <x-sub-control-ccc control_id="1-5-P-3-2"
                        description="Process for the implementation of cybersecurity exceptional changes (e.g.: changes during incident restoration)"
                        description_ar="إجراءات تنفيذ التغييرات الاستثنائية ذات العلاقة بالأمن السيبراني (مثل التغييرات أثناء التعافي من الحوادث)."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CCC-1-5-P-4')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="1-5-P-4"
                        description="Cybersecurity requirements for change management within the CSP shall be applied and reviewed periodically"
                        description_ar="يجب مراجعة متطلبات الأمن السيبراني لإدارة التغيير لدى مقدمي الخدمات، ومراجعة تطبيقها، دوريًا."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-1-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-1-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="(Cybersecurity Defense)" main_domain_ar="2- تعزيز الأمن السيبراني "
                        main_domain_id="2-1" sub_domain="(Asset Management)" sub_domain_ar="إدارة الأصول"
                        control_id="2-1-P-1"
                        description="In addition to controls in the ECC control 2-1, the CSP shall cover the following additional controls for cybersecurity requirements for cybersecurity event logs and monitoring management, as a minimum"
                        description_ar="بالإضافة للضوابط ضمن المكون الفرعي ٢-١ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لإدارة الأصول المعلوماتية والتقنية لدى مقدمي الخدمات، بحد أدنى ما يلي:"
                        :control="$control" theme="bg-teal" border_t="true" :status="$status"/>

                    <x-sub-control-ccc control_id="2-1-P-1-1"
                        description="Inventory of all information and technology assets using suitable techniques such as Configuration Management Database (CMDB) or similar capability containing an inventory of all technical assets"
                        description_ar="حصر جميع الأصول المعلوماتية والتقنية باستخدام التقنيات المناسبة كقاعدة بيانات إدارة الإعدادات (CMDB)، أو قدرة مماثلة، تتضمن جردًا لكل الأصول التقنية."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-1-P-1-2')
                    <x-sub-control-ccc control_id="2-1-P-1-2"
                        description="Identifying assets owners and involving them in the asset management lifecycle"
                        description_ar="تحديد ملاك الأصول (Asset Owners) وإشراكهم في دورة حياة إدارة الأصول."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-2-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-2"
                        sub_domain="(Identity and Access Management)" sub_domain_ar="إدارة هويات الدخول والصلاحيات"
                        control_id="2-2-P-1"
                        description="In addition to subcontrols in the ECC control 2-2-3, the CSP shall cover the following additional subcontrols for cybersecurity requirements for identity and access management requirements, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٢-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي  متطلبات الأمن السيبراني الخاصة بإدارة هويات الدخول والصلاحيات لدى مقدمي الخدمات، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-2-P-1-1"
                        description="Identity and access management of generic accounts credentials for accountability cannot be assigned for a specific individual"
                        description_ar="إدارة الحسابات العامة (Generic Accounts) التي لا يمكن إسناد مسؤوليتها إلى أشخاص محددين. "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-P-1-2')
                    <x-sub-control-ccc control_id="2-2-P-1-2"
                        description="Secure session management, including session authenticity, session lockout, and session timeout termination"
                        description_ar="الإدارة الآمنة للجلسات (Secure Session Management)، وتشمل موثوقية الجلسات (Authenticity)، وإقفالها (Lockout)، وإنهاء مهلتها (Timeout)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-P-1-3')
                    <x-sub-control-ccc control_id="2-2-P-1-3"
                        description="Multi-factor authentication for privileged users, and candidates of personnel with access to Cloud Technology Stack"
                        description_ar="التحقق من الهوية متعدد العناصر (Mulit-Factor Authentication) لحسابات المستخدمين ذوي الصلاحيات الهامة والحساسة، والذين لهم حق الوصول إلى الأنظمة التقنية السحابية (CTS). "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-P-1-4')
                    <x-sub-control-ccc control_id="2-2-P-1-4"
                        description="Formal process to detect and prevent unauthorized access (e.g unsuccessful login attempt threshold)"
                        description_ar="إجراءات لكشف محاولات الوصول غير المصرح به ومنعها مثل: (الحد الأقصى من محاولات عمليات الدخول غير الناجحة (Unsuccessful Login))."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-P-1-5')
                    <x-sub-control-ccc control_id="2-2-P-1-5"
                        description="Utilizing secure methods and algorithms for saving and processing passwords, such as: Secure Hashing functions"
                        description_ar="استخدام الطرق والخوارزميات الآمنة لحفظ ومعالجة كلمات المرور مثل: استخدام دوال اختزال آمنة (Secure Hashing Functions).
"
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-P-1-6')
                    <x-sub-control-ccc control_id="2-2-P-1-6"
                        description="Secure management of third party personnel’s accounts"
                        description_ar="الإدارة الآمنة للحسابات الخاصة بالعاملين التابعين للأطراف الخارجية (Third-party). "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-P-1-7')
                    <x-sub-control-ccc control_id="2-2-P-1-7"
                        description="Access control enforced to management systems, administrative consoles"
                        description_ar="التحكم في الوصول إلى الأنظمة الإدارية (Management Systsmes) والإشرافية (Administrative Consoles)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-P-1-8')
                    <x-sub-control-ccc control_id="2-2-P-1-8"
                        description="Masking of displayed authentication inputs, especially passwords, to prevent shoulder surfing"
                        description_ar="إخفاء معلومات التحقق من الهوية، خاصةً كلمات المرور، عند عرضها للمستخدم؛ لحمايتها من اطلاع الآخرين عليها. "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-P-1-9')
                    <x-sub-control-ccc control_id="2-2-P-1-9"
                        description="Getting CST’s approval before accessing any CST-related asset by the CSP or CSP’s third parties"
                        description_ar="الحصول على موافقة المشترك قبل عملية الوصول إلى أي من الأصول والبيانات الخاصة به، من قبل مقدم الخدمة أو الأطراف الخارجية لمقدم الخدمة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-P-1-10')
                    <x-sub-control-ccc control_id="2-2-P-1-10"
                        description="Capability to immediately interrupt a remote access session and prevent any future access for a user"
                        description_ar="القدرة على الإيقاف الفوري للجلسة (Session) لعمليات الدخول عن بعد ومنع المستخدم من الدخول مستقبلًا.
"
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-P-1-11')
                    <x-sub-control-ccc control_id="2-2-P-1-11"
                        description="Provision to CSTs of Multi-factor authentication services for privileged cloud users"
                        description_ar="تزويد المشتركين بخدمات التحقق من الهوية متعدد العناصر لكافة الحسابات السحابية للمستخدمين ذوي الصلاحيات الهامة والحساسة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-2-P-1-12')
                    <x-sub-control-ccc control_id="2-2-P-1-12"
                        description="Assurance of restricted and controlled access to storage systems and means (such as Storage Area Network (SAN))"
                        description_ar="التحكم بالوصول لأنظمة ووسائل التخزين (مثل الشبكة الخاصة بالتخزين (Storage Area Network (SAN"
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-3-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-3-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-3"
                        sub_domain="(Information System and Information Processing Facilities Protection)"
                        sub_domain_ar="حماية الأنظمة وأجهزة معالجة المعلومات" control_id="2-3-P-1"
                        description="In addition to subcontrols in the ECC control 2-3-3, the CSP shall cover the following additional subcontrols for cybersecurity requirements for information system and processing facilities protection requirements, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٣-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بحماية الأنظمة وأجهزة معالجة المعلومات لدى مقدمي الخدمات، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-3-P-1-1"
                        description="Ensuring that all configurations are applied in accordance to CSP’s cybersecurity standards"
                        description_ar="التحقق من مدى التزام الإعدادات التقنية لمعايير الأمن السيبراني المعتمدة لدى مقدم الخدمة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-3-P-1-2')
                    <x-sub-control-ccc control_id="2-3-P-1-2"
                        description="Assurance of separation and isolation of data, environments and information systems across CSTs, to prevent data commingling"
                        description_ar="وضع ضمانات لمنع اختلاط بيانات (Data Commingling) المشتركين." :control="$control"
                        theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-3-P-1-3')
                    <x-sub-control-ccc control_id="2-3-P-1-3"
                        description="Adopting of cybersecurity principles for technical system configurations adhering to the minimum functionality principle"
                        description_ar="اتباع مبادئ الأمن السيبراني لتفعيل الحد الأدنى من الوظائف المطلوبة (Minimum Functionality Principle) لإعدادات الأنظمة (System Configurations)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-3-P-1-4')
                    <x-sub-control-ccc control_id="2-3-P-1-4"
                        description="Ability of the Cloud Technology Stacks to securely handle input validation, exceptions and failure"
                        description_ar="أن تكون الأنظمة التقنية السحابية (CTS) قادرة على التعامل بطرق آمنة مع: المدخلات والتحقق منها (Input Validation)، والاستثناءات (Exception)، والتوقف (Failure).
"
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-3-P-1-5')
                    <x-sub-control-ccc control_id="2-3-P-1-5"
                        description="Full isolation of security functions and applications from other functions and applications in the Cloud Technology Stack"
                        description_ar="عزل التطبيقات والوظائف الأمنية عن التطبيقات والوظائف الأخرى في الأنظمة التقنية السحابية (CTS)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-3-P-1-6')
                    <x-sub-control-ccc control_id="2-3-P-1-6"
                        description="Notification to CSTs with cybersecurity requirements provided by the CSP that are useable by the CST"
                        description_ar="تبليغ المشترك بالمتطلبات المتعلقة بالأمن السيبراني التي يوفرها مقدم الخدمة والقابلة للاستخدام من قبل المشترك."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-3-P-1-7')
                    <x-sub-control-ccc control_id="2-3-P-1-7"
                        description="Detection and prevention of unauthorized changes to softwares, and systems"
                        description_ar="اكتشاف ومنع التغييرات غير المصرح بها على البرامج والأنظمة." :control="$control"
                        theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-3-P-1-8')
                

                    <x-sub-control-ccc control_id="2-3-P-1-8"
                        description="Complete isolation and protection of multiple guest environments"
                        description_ar="العزل بين بيئات الاستضافة
الخاصة بالمشتركين (Guest Environments)، والحماية فيما بينها."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-3-P-1-9')
                    <x-sub-control-ccc control_id="2-3-P-1-9"
                        description="The community cloud services provided to CSTs (government organizations and CNI organizations) shall be isolated from any other cloud computing provided to organizations outside the scope of work"
                        description_ar="أن تكون الحوسبة السحابية المشتركة المقدمة للمشتركين (الجهات الحكومية والجهات ذات البنية التحتية الحساسة) معزولة عن أي حوسبة سحابية أخرى مقدمة للجهات خارج نطاق العمل."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-3-P-1-10')
                    <x-sub-control-ccc control_id="2-3-P-1-10"
                        description="Provide cloud computing services from within the KSA, including systems used for storage, processing, and disaster recovery centers"
                        description_ar="تقديم خدمات الحوسبة السحابية من داخل المملكة، وتشمل الأنظمة المستخدمة بما في ذلك أنظمة التخزين، والمعالجة، ومراكز التعافي من الكوارث."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-3-P-1-11')
                    <x-sub-control-ccc control_id="2-3-P-1-11"
                        description="Provide cloud computing services from within the KSA, including systems used for monitoring, and support"
                        description_ar="تقديم خدمات الحوسبة السحابية من داخل المملكة، وتشمل الأنظمة المستخدمة بما في ذلك أنظمة المراقبة، والدعم."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-3-P-1-12')
                    <x-sub-control-ccc control_id="2-3-P-1-12"
                        description="Modern technologies, such as Endpoint Detection and Response (EDR) technologies, to ensure that the information servers and devices of CSP’s information processing systems and devices of are ready for rapid response to incidents"
                        description_ar="استخدام التقنيات الحديثة، مثل تقنيات (Endpoint Detection and Response (EDR)) ، لضمان جاهزية خوادم وأجهزة المعلومات الخاصة بأنظمة وأجهزة معالجة المعلومات لدى مقدمي الخدمات، للاستجابة السريعة للحوادث."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-4-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-4-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-4"
                        sub_domain="(Networks Security Management)" sub_domain_ar="إدارة أمن الشبكات"
                        control_id="2-4-P-1"
                        description="In addition to subcontrols in the ECC control 2-5-3, the CSP shall cover the following additional subcontrols for cybersecurity requirements for networks security management requirements, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٥-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بإدارة أمن الشبكات لدى مقدمي الخدمات، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-4-P-1-1"
                        description="Monitoring of traffic across the external and internal networks to detect anomalies"
                        description_ar="مراقبة الشبكات الداخلية والخارجية للكشف عن الأنشطة المشبوهة." :control="$control"
                        theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-4-P-1-2')
                    <x-sub-control-ccc control_id="2-4-P-1-2"
                        description="Network isolation and protection of Cloud Technology Stack network from other internal and external networks"
                        description_ar="عزل وحماية الشبكة الخاصة بالأنظمة التقنية السحابية (CTS) من الشبكات الأخرى الداخلية والخارجية."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-4-P-1-3')
                    <x-sub-control-ccc control_id="2-4-P-1-3"
                        description="Protection from denial of service attacks (including Distributed Denial of Service (DDoS))"
                        description_ar="الحماية من هجمات تعطيل الخدمات (Denial of Service (DoS))، وهجمات تعطيل الخدمات الموزعة (Distributed Denial of Service (DDoS))."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-4-P-1-5')
                    <x-sub-control-ccc control_id="2-4-P-1-4"
                        description="Protection of data transmitted through the network; from and to the Cloud Technology Stack network using cryptography primitives; for management and administrative access"
                        description_ar="استخدام التشفير للبيانات المنتقلة عبر الشبكة من وإلى الشبكة الخاصة بالأنظمة التقنية السحابية (CTS) لعمليات الوصول الإشرافي والإداري (Management and Administrative Access)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-4-P-1-5')
                    <x-sub-control-ccc control_id="2-4-P-1-5"
                        description="Access control between different network segments"
                        description_ar="التحكم في الوصول (Access Control) بين أجزاء الشبكة (Network Segments) المختلفة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-4-P-1-6')
                    <x-sub-control-ccc control_id="2-4-P-1-6"
                        description="Isolation between cloud service delivery network, cloud management network and CSP enterprise network"
                        description_ar="العزل بين شبكات الخدمات السحابية (Cloud Service Delivery) وشبكات الإدارة السحابية (Cloud Management) والشبكة الداخلية لمقدم الخدمة (Enterprise)."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-5-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-5-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-5"
                        sub_domain="(Mobile Devices Security) " sub_domain_ar="أمن الأجهزة المحمولة "
                        control_id="2-5-P-1"
                        description="In addition to subcontrols in the ECC control 2-6-3, the CSP shall cover the following additional subcontrols for cybersecurity requirements for mobile device security, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٦-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بأمن الأجهزة المحمولة لدى مقدمي الخدمات، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-5-P-1-1"
                        description="In addition to subcontrols in the ECC control 2-6-3, the CSP shall cover the following additional subcontrols for cybersecurity requirements for mobile device security, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٦-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بأمن الأجهزة المحمولة لدى مقدمي الخدمات، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-5-P-1-2')
                    <x-sub-control-ccc control_id="2-5-P-1-2" description="Centralized mobile device security management"
                        description_ar="الإدارة الأمنية للأجهزة المحمولة (Mobile Device Management) مركزيًا."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-5-P-1-3')
                    <x-sub-control-ccc control_id="2-5-P-1-3" description="Screen locking for end user devices"
                        description_ar="قفل الشاشة لأجهزة المستخدمين (Screen Lock)." :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-5-P-1-4')
                    <x-sub-control-ccc control_id="2-5-P-1-4"
                        description="Data sanitation and secure disposal for end-user devices, especially for those with exposure to the Cloud Technology Stack"
                        description_ar="قبل إعادة استخدام الأجهزة المحمولة أو التخلص منها، خصوصًا التي يتم استخدامها للدخول على الأنظمة التقنية السحابية (CTS)، يجب التأكد من عدم احتوائها على أية بيانات أو معلومات باستخدام وسائل آمنة."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-6-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-6-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-6"
                        sub_domain="(Data and Information Protection)" sub_domain_ar="حماية البيانات والمعلومات "
                        control_id="2-6-P-1"
                        description="In addition to subcontrols in the ECC control 2-7-3, the CSP shall cover the following additional subcontrols for cybersecurity requirements for data and information protection requirements, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٧-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بحماية البيانات والمعلومات لدى مقدمي الخدمة، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-6-P-1-1"
                        description="Prohibiting the use of Cloud Technology Stack’s data in any environment other than production environment, except after applying strict controls for protecting that data, such as: data masking or data scrambling techniques"
                        description_ar="عدم استخدام بيانات الأنظمة التقنية السحابية (CTS) في غير بيئة الإنتاج (Production Environment) إلا بعد استخدام ضوابط مشددة لحماية تلك البيانات مثل: تقنيات تعتيم البيانات (Data Masking) أو تقنيات مزج البيانات (Data Scrambling)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-6-P-1-2')
                    <x-sub-control-ccc control_id="2-6-P-1-2"
                        description="Provision to CSTs of securely data storage processes, procedures, and technologies to comply with related legal and regulatory requirements"
                        description_ar="تزويد المشتركين بعمليات وإجراءات وتقنيات آمنة لتخزين البيانات، مع الالتزام بالمتطلبات التشريعية والتنظيمية ذات العلاقة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-6-P-1-3')
                    <x-sub-control-ccc control_id="2-6-P-1-3"
                        description="Disposal of CST’s data should be performed in a secure manner on termination or expiry of the contract with the CSP"
                        description_ar="حذف وإتلاف بيانات المشترك بطرق آمنة عند الانتهاء من العلاقة مع المشترك."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-6-P-1-4')
                    <x-sub-control-ccc control_id="2-6-P-1-4"
                        description="Commitment to maintain the confidentiality of the CST’s data and information, according to related legal and regulatory requirements"
                        description_ar="الالتزام بالمحافظة على سرية بيانات ومعلومات المشترك، حسب المتطلبات التشريعية والتنظيمية ذات العلاقة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-6-P-1-5')
                    <x-sub-control-ccc control_id="2-6-P-1-5"
                        description="Providing CSTs with secure means to export and transfer data and virtual infrastructure"
                        description_ar="تزويد المشتركين بوسائل آمنة لتصدير ونقل البيانات والبنية التحتية الافتراضية."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-7-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-7-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-7"
                        sub_domain="(Cryptography)" sub_domain_ar="التشفير" control_id="2-7-P-1"
                        description="In addition to subcontrols in the ECC control 2-8-3, the CSP shall cover the following additional subcontrols for cryptography, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٨-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بالتشفير لدى مقدمي الخدمات، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-7-P-1-1"
                        description="Technical mechanisms and cryptographic primitives for strong encryption, in according to the advanced level in the National Cryptographic Standards (NCS-1:2020)"
                        description_ar="الالتزام باستخدام طرق وخوارزميات ومفاتيح وأجهزة تشفير محدثة وآمنة، وفقًا للمستوى المتقدم (Advanced) ضمن المعايير الوطنية للتشفير (NCS-1:2020)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-7-P-1-2')
                    <x-sub-control-ccc control_id="2-7-P-1-2"
                        description="Certification authority and issuance capability in a secure manner, or usage of certificates from a trusted certification authority"
                        description_ar="القدرة على إصدار شهادات رقمية وإدارتها بطرق آمنة، أو استخدام شهادات رقمية صادرة من جهات موثوقة (Trusted Certification Authority)."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-8-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-8-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-8"
                        sub_domain=" (Backup and Recovery Management)" sub_domain_ar="إدارة النسخ الاحتياطية"
                        control_id="2-8-P-1"
                        description="In addition to subcontrols in the ECC control 2-9-3, the CSP shall cover the following additional subcontrols for cybersecurity requirements for backup and recovery management, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٩-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بإدارة النسخ الاحتياطية لدى مقدمي الخدمات، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-8-P-1-1"
                        description="Securing access, storage and transfer of CST’s data backups and its mediums, and protecting it against damage, amendment or unauthorized access"
                        description_ar="تأمين الوصول، والتخزين، والنقل لمحتوى النسخ الاحتياطية لبيانات المشترك ووسائطها، وحمايتها من الإتلاف، أو التعديل، أو الاطلاع غير المصرح به."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-8-P-1-2')
                    <x-sub-control-ccc control_id="2-8-P-1-2"
                        description="Securing access, storage and transfer of Cloud Technology Stack backups and its mediums, and protecting it against damage, amendment or unauthorized access"
                        description_ar="تأمين الوصول، والتخزين، والنقل لمحتوى النسخ الاحتياطية للأنظمة التقنية السحابية (CTS)، ووسائطها، وحمايتها من الإتلاف، أو التعديل، أو الاطلاع غير المصرح به."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-9-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-9-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-9"
                        sub_domain="(Vulnerabilities Management)" sub_domain_ar="إدارة الثغرات " control_id="2-9-P-1"
                        description="In addition to subcontrols in the ECC control 2-10-3, the CSP shall cover the following additional subcontrols for cybersecurity requirements for vulnerability management requirements, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٠-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بإدارة الثغرات لدى مقدمي الخدمات، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-9-P-1-1"
                        description="Assessing and remediating vulnerabilities on external components of Cloud Technology Stack at least once every month, and at least once every three months for internal components of Cloud Technology Stack"
                        description_ar="تقييم ومعالجة الثغرات لمكونات الأنظمة التقنية السحابية (CTS) الخارجية مرة واحدة شهريًا على الأقل، وكل ثلاثة أشهر على الأقل لمكونات الأنظمة التقنية السحابية (CTS) الداخلية."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-9-P-1-2')
                    <x-sub-control-ccc control_id="2-9-P-1-2"
                        description="Notification to CSTs of identified vulnerabilities that may affecting them, and safeguards in place"
                        description_ar="إشعار المشترك بالثغرات المكتشفة التي قد تؤثر عليه، وكيفية معالجتها. "
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-10-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-10-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-10"
                        sub_domain="(Penetration Testing)" sub_domain_ar="اختبار الاختراق " control_id="2-10-P-1"
                        description="In addition to subcontrols in the ECC control 2-11-3, the CSP shall cover the following additional subcontrols for cybersecurity requirements for penetration testing, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-١١-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة باختبار الاختراق لدى مقدمي الخدمات، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-10-P-1-1"
                        description="Scope of penetration tests must cover Cloud Technology Stack and must be conducted at least once every six months"
                        description_ar="يجب أن يشمل نطاق عمل اختبار الاختراق الأنظمة التقنية السحابية (CTS)، وأن يتم عمل اختبار الاختراق كل ستة أشهر؛ على الأقل."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-11-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-11-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-11"
                        sub_domain="(Cybersecurity Event Logs and Monitoring Management)"
                        sub_domain_ar="إدارة سجلات الأحداث ومراقبة الأمن السيبراني" control_id="2-11-P-1"
                        description="In addition to subcontrols in the ECC control 2-12-3, the CSP shall cover the following additional subcontrols for cybersecurity requirements for cybersecurity event logs and monitoring management, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٢-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لإدارة سجلات الأحداث ومراقبة الأمن السيبراني لدى مقدمي الخدمات، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-11-P-1-1"
                        description="Activating and protecting event logs and audit trails of Cloud Technology Stack"
                        description_ar="تفعيل وحماية سجلات الأحداث (Event Logs) والتدقيق (Audit Trial)  للأنظمة التقنية السحابية (CTS)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-11-P-1-2')
                    <x-sub-control-ccc control_id="2-11-P-1-2"
                        description="Activating and collecting of login attempts history"
                        description_ar="تفعيل سجلات الأحداث الخاصة بمحاولات عمليات الدخول (Login) وجمعها."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-11-P-1-3')
                    <x-sub-control-ccc control_id="2-11-P-1-3"
                        description="Activating and protecting all event logs of activities and operations performed by the CSP at the tenant level in order to support forensic analysis"
                        description_ar="تفعيل وحماية سجلات الأحداث لجميع الأنشطة والعمليات التي يقوم بها مقدم الخدمة على أنظمة المشتركين، بهدف دعم عمليات التحليل الرقمي الجنائي (Digital  Forensics)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-11-P-1-4')
                    <x-sub-control-ccc control_id="2-11-P-1-4"
                        description="Protecting cybersecurity event logs from alteration, disclosure, destruction and unauthorized access and unauthorized release, in accordance with regulatory, or law requirements"
                        description_ar="حماية سجلات الأحداث (Event Logs) الخاصة بالأمن السيبراني، من الوصول غير المصرح به، أو العبث، أو التغيير، أو الحذف غير المشروع، وذلك وفقًا للمتطلبات التشريعية، أو التنظيمية."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-11-P-1-5')
                    <x-sub-control-ccc control_id="2-11-P-1-5"
                        description="Continuous cybersecurity events monitoring using SIEM technique covering the full Cloud Technology Stack"
                        description_ar="المراقبة الأمنية المستمرة لأحداث الأمن السيبراني (Cybersecurity Events) باستخدام تقنيات (SIEM) بحيث تشمل جميع الأحداث المتعلقة بالأنظمة  التقنية السحابية (CTS)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-11-P-1-6')
                    <x-sub-control-ccc control_id="2-11-P-1-6"
                        description="Reviewing cybersecurity event logs and audit trails periodically, covering CSP events in the Cloud Technology Stack"
                        description_ar="المراجعة الدورية لسجلات الأحداث (Event Logs) والتدقيق (Audit Trail)  بحيث تشمل الأحداث والسجلات المتعلقة بالأنظمة التقنية السحابية (CTS)، التي تم تنفيذها من قبل مقدم الخدمة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-11-P-1-7')
                    <x-sub-control-ccc control_id="2-11-P-1-7"
                        description="Automated monitoring and logging of remote access sessions event logs"
                        description_ar="استخدام وسائل آلية لمراقبة سجلات الأحداث الخاصة بعمليات الدخول عن بعد (Remote Access)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-11-P-1-8')
                    <x-sub-control-ccc control_id="2-11-P-1-8"
                        description="Secure handling of user-related data found in the audit trails and the cybersecurity event logs"
                        description_ar="التعامل الآمن مع بيانات المستخدمين المتواجدة في سجلات الأحداث (Event Logs) والتدقيق (Audit Trails) وسجلات أحداث الأمن السيبراني (Cybersecurity Events Logs)."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-12-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-11-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-12"
                        sub_domain="(Cybersecurity Incident and Threat Management)"
                        sub_domain_ar="إدارة حوادث وتهديدات الأمن السيبراني " control_id="2-12-P-1"
                        description="In addition to subcontrols in the ECC control 2-13-3, the CSP shall cover the following additional subcontrols for cybersecurity requirements for cybersecurity incident and threat management, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٣-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لإدارة حوادث وتهديدات الأمن السيبراني لدى مقدمي الخدمات، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-12-P-1-1"
                        description="Subscribing in authorized and specialized organizations and groups to stay up-to-date on Cybersecurity threats, common practices and key know-how"
                        description_ar="الاشتراك مع المجموعات والجهات المتخصصة والموثوقة للحصول على آخر التهديدات والمستجدات في مجال الأمن السيبراني."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-12-P-1-2')
                    <x-sub-control-ccc control_id="2-12-P-1-2"
                        description="Training for employees and third party personnel to respond to cybersecurity incidents, in line with their roles and responsibilities"
                        description_ar="تدريب العاملين (موظفين ومتعاقدين) على الاستجابة لحوادث الأمن السيبراني بما يتماشى مع الأدوار والمسؤوليات."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-12-P-1-3')
                    <x-sub-control-ccc control_id="2-12-P-1-3"
                        description="Periodically testing the incident response capability"
                        description_ar="اختبار قدرات الاستجابة لحوادث الأمن السيبراني دوريًا." :control="$control"
                        theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-12-P-1-4')
                    <x-sub-control-ccc control_id="2-12-P-1-4"
                        description="Root Cause Analysis of cybersecurity incidents and developing plans to address them"
                        description_ar="تحليل وتحديد الأسباب الجذرية (Root Cause Analysis) لحوادث الأمن السيبراني، ووضع الخطط الكفيلة بمعالجتها. "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-12-P-1-5')
                    <x-sub-control-ccc control_id="2-12-P-1-5"
                        description="Support the CST in cases legal proceedings and forensics, protecting the chain of custody that falls under the management and responsibility of the CSP, in accordance with the related law and regulatory requirements"
                        description_ar="تقديم الدعم إلى المشتركين في حالات القضايا القانونية، والتحليل الرقمي الجنائي، والحفاظ على الأدلة الرقمية التي تقع تحت إدارة ومسؤولية مقدم الخدمة حسب المتطلبات التشريعية والتنظيمية ذات العلاقة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-12-P-1-6')
                    <x-sub-control-ccc control_id="2-12-P-1-6"
                        description="Real-time reporting to the CST of incidents that may affect CST; if the incident is discovered"
                        description_ar="تبليغ المشترك بشكل فوري عن حوادث الأمن السيبراني التي قد تؤثر عليه، في حال اكتشاف الحادثة. "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-12-P-1-7')
                    <x-sub-control-ccc control_id="2-12-P-1-7"
                        description="Support for CSTs to handle security incidents according to the agreement between the CSP and CST"
                        description_ar="دعم المشتركين للتعامل مع حوادث الأمن السيبراني حسب الاتفاقية مابين مقدم الخدمة والمشترك."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-12-P-1-8')
                    <x-sub-control-ccc control_id="2-12-P-1-8"
                        description="Measuring and monitoring cybersecurity incident metrics and monitor compliance with contracts and legislative requirements"
                        description_ar="قياس ومراقبة مؤشرات الأداء الخاصة بإدارة حوادث الأمن السيبراني، ومراقبة مدى الالتزام بمتطلبات العقود والتشريعات."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-13-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-13-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-13"
                        sub_domain="(Physical Security)" sub_domain_ar="الأمن المادي" control_id="2-13-P-1"
                        description="In addition to subcontrols in the ECC control 2-14-3, the CSP shall cover the following additional subcontrols for cybersecurity requirements for physical security, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٤-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بالأمن المادي لدى مقدمي الخدمات، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-13-P-1-1"
                        description="Continual monitoring of access to CSP’s sites and buildings"
                        description_ar="المراقبة المستمرة لعمليات الدخول والخروج للمباني والمواقع لدى مقدم الخدمة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-13-P-1-2')
                    <x-sub-control-ccc control_id="2-13-P-1-2"
                        description="Preventing unauthorized access to devices in the Cloud Technology Stack"
                        description_ar="منع الوصول غير المصرح به للأجهزة التي تتعامل مباشرة مع الأنظمة التقنية السحابية (CTS)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-13-P-1-3')
                    <x-sub-control-ccc control_id="2-13-P-1-3"
                        description="Disposal of cloud infrastructure hardware, in particular, storage equipment (external or internal), by adopting relevant legislation and best practices"
                        description_ar="التخلص الآمن من أجهزة البنية التحتية (Infrastructure Hardware)، وبالأخص معدات التخزين (Storage Equipments) باتباع أفضل الممارسات والتشريعات ذات العلاقة."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-14-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-14-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-14"
                        sub_domain="(Web Application Security) " sub_domain_ar="حماية تطبيقات الويب "
                        control_id="2-14-P-1"
                        description="In addition to subcontrols in the ECC control 2-15-3, the CSP shall cover the following additional subcontrols for cybersecurity requirements for web application security, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٥-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بحماية تطبيقات الويب لدى مقدمي الخدمات، بحد أدنى مايلي:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-14-P-1-1"
                        description="Protecting information involved in application service transactions against possible risks (e.g: incomplete transmission, mis-routing, unauthorized message alteration, unauthorized disclosure….)"
                        description_ar="حماية المعلومات المستخدمة في إجراء المعاملات عن طريق تطبيقات الويب من المخاطر المحتملة، مثل: انقطاع الاتصال (Incomplete Transmission) ، التوجيه الخاطئ (Mis-routing)، التعديل غير المصرح به، الاطلاع غير المصرح به."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif

                @if ($control->control_id == 'NCA-CCC-2-15-P-1')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-15"
                        sub_domain="(Key Management)" sub_domain_ar="إدارة المفاتيح " control_id="2-15-P-1"
                        description="Cybersecurity requirements for key management process within the CSP shall be identified, documented and approved"
                        description_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني، الخاصة بعملية إدارة المفاتيح لدى مقدمي الخدمات."
                        :control="$control" theme="bg-teal" />
                @endif

                @if ($control->control_id == 'NCA-CCC-2-15-P-2')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="2-15-P-2"
                        description="Cybersecurity requirements for key management process within the CSP shall be applied"
                        description_ar="يجب تطبيق متطلبات الأمن السيبراني، الخاصة بعملية إدارة المفاتيح لدى مقدمي الخدمات."
                        :control="$control" theme="bg-teal" />
                @endif

                @if ($control->control_id == 'NCA-CCC-2-15-P-3-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-15-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="2-15-P-3"
                        description="In addition to the ECC subcontrol 2-8-3-2 cybersecurity requirements for key management within the CSP shall cover, at minimum, the following"
                        description_ar="بالإضافة للضابط ٢-٨-٣-٢ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بعملية إدارة المفاتيح لدى مقدمي الخدمات بحد أدنى ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-15-P-3-1"
                        description="Ensure well-defined ownership for cryptographic keys"
                        description_ar="تحديد ملاك لمفاتيح التشفير (Key Owner)." :control="$control" theme="bg-teal" />
                @endif

                @if ($control->control_id == 'NCA-CCC-2-15-P-3-2')
                    <x-sub-control-ccc control_id="2-15-P-3-2"
                        description="A secure cryptographic key retrieval mechanism in case of cryptographic key lost (such as backup of keys and enforcement of trusted key storage, strictly external to cloud)"
                        description_ar="وجود آلية آمنة لاسترجاع مفاتيح التشفير في حال فقدانها مثل: (نسخها احتياطيًا وتخزينها بطرق آمنة خارج الأنظمة السحابية)."
                        :control="$control" theme="bg-teal" />
                @endif

                @if ($control->control_id == 'NCA-CCC-2-15-P-3-3')
                    <x-sub-control-ccc control_id="2-15-P-3-3"
                        description="Activating and monitoring of all audit trails of keys"
                        description_ar="تفعيل سجلات الأحداث المتعلقة بمفاتيح التشفير، ومراقبتها." :control="$control"
                        theme="bg-teal" />
                @endif

                @if ($control->control_id == 'NCA-ccc-2-15-p-4')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="2-15-P-4"
                        description="Cybersecurity requirements for key management within the CSP shall be applied and reviewed periodically"
                        description_ar="يجب مراجعة متطلبات الأمن السيبراني، الخاصة بإدارة المفاتيح لدى مقدمي الخدمات، ومراجعة تطبيقها دوريًا."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif

                @if ($control->control_id == 'NCA-CCC-2-16-P-1')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-16"
                        sub_domain="(System Development Security)" sub_domain_ar="أمن تطوير الأنظمة"
                        control_id="2-16-P-1"
                        description="Cybersecurity requirements for system development within the CSP shall be identified, documented and approved"
                        description_ar="يجب تحديد متطلبات الأمن السيبراني لتطوير الأنظمة لدى مقدمي الخدمات، وتوثيقها واعتمادها."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-16-P-2')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="2-16-P-2"
                        description="Cybersecurity requirements for system development within the CSP shall be applied"
                        description_ar="يجب تطبيق متطلبات الأمن السيبراني لتطوير الأنظمة لدى مقدمي الخدمات."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-16-P-3-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-16-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="2-16-P-3"
                        description="Cybersecurity requirements for system development within the CSP shall include as a minimum the following controls along the development lifecycle"
                        description_ar="يجب أن تغطي متطلبات الأمن السيبراني لتطوير الأنظمة لدى مقدمي الخدمات  بحد أدنى الضوابط التالية خلال دورة حياة التطوير:"
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-16-P-3-1"
                        description="Considering cybersecurity requirements of the Cloud Technology Stack and relevant systems in the design and implementation of the cloud computing services"
                        description_ar="أخذ متطلبات الأمن السيبراني (للأنظمة التقنية السحابية (CTS)، والأنظمة ذات العلاقة) بالاعتبار عند تصميم  وتطوير خدمات الحوسبة السحابية."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-16-P-3-2')
                    <x-sub-control-ccc control_id="2-16-P-3-2"
                        description="Protecting system development environments, testing environments, including data used in testing environment, and integration platforms"
                        description_ar="حماية بيئات  التطوير (Development Environments) والاختبار (Testing Environments) وماتحويه من بيانات، ومنصات التكامل (Integration Platforms)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-16-P-4')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="2-16-P-4"
                        description="Cybersecurity requirements for system development within the CSP shall be applied and reviewed periodically"
                        description_ar="يجب مراجعة متطلبات الأمن السيبراني لتطوير الأنظمة لدى مقدمي الخدمات، ومراجعة تطبيقها، دوريًا."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-17-P-1')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="2-17"
                        sub_domain="(Storage Media Security)" sub_domain_ar="أمن وسائط التخزين " control_id="2-17-P-1"
                        description="Cybersecurity requirements for usage of information and data media within the CSP shall be identified, documented and approved"
                        description_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لاستخدام وسائط المعلومات والبيانات المادية لدى مقدمي الخدمات."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-17-P-2')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="2-17-P-2"
                        description="Cybersecurity requirements for usage of information and data media within the CSP shall be identified, documented and approved"
                        description_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لاستخدام وسائط المعلومات والبيانات المادية لدى مقدمي الخدمات."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-17-P-3-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-2-17-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="2-17-P-3"
                        description="Enforcement of sanitization of media, prior to disposal or reuse"
                        description_ar="يجب التأكد من عدم احتواء الوسائط على أية بيانات أو معلومات، قبل إعادة استخدام الوسائط أو التخلص منها."
                        :control="$control" theme="bg-teal" :status="$status"/>

                    <x-sub-control-ccc control_id="2-17-P-3-1"
                        description="Enforcement of sanitization of media, prior to disposal or reuse"
                        description_ar="يجب التأكد من عدم احتواء الوسائط على أية بيانات أو معلومات، قبل إعادة استخدام الوسائط أو التخلص منها."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-17-P-3-2')
                    <x-sub-control-ccc control_id="2-17-P-3-2" description="Using secure means when disposing of media"
                        description_ar="يجب استخدام وسائل آمنة عند التخلص من الوسائط." :control="$control"
                        theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-17-P-3-3')
                    <x-sub-control-ccc control_id="2-17-P-3-3"
                        description="Provision to maintain confidentiality and integrity of data on removable media"
                        description_ar="الحفاظ على سرية وسلامة البيانات على أجهزة وسائط التخزين الخارجية."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-17-P-3-4')
                    <x-sub-control-ccc control_id="2-17-P-3-4"
                        description="Human readable labelling of media, to explain its classification and the sensitivity of the information it contains"
                        description_ar="وضع ترميز أو علامة (Labelling) مقروءة على الوسائط توضح تصنيفها ومدى حساسية المعلومات والبيانات التي تحتويها."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-17-P-3-5')
                    <x-sub-control-ccc control_id="2-17-P-3-5"
                        description="Controlled and physically secure storage of removable media"
                        description_ar="الحفظ الآمن لأجهزة وسائط التخزين الخارجية." :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-17-P-3-6')
                    <x-sub-control-ccc control_id="2-17-P-3-6"
                        description="Restriction and control of usage of portable media inside the Cloud Technology Stack"
                        description_ar="التقييد الحازم لاستخدام وسائط التخزين الخارجية على الأنظمة التقنية السحابية (CTS)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CCC-2-17-P-4')
                    <x-main-control-ccc main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="2-17-P-4"
                        description="Cybersecurity requirements for usage of information and data media within the CSP shall be applied and reviewed periodically"
                        description_ar="يجب مراجعة متطلبات الأمن السيبراني لاستخدام وسائط المعلومات والبيانات المادية لدى مقدمي الخدمات، ومراجعة تطبيقها، دوريًا."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-3-1-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-3-1-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="(Cybersecurity Resilience)" main_domain_ar="3- صمود الأمن السيبراني"
                        main_domain_id="3-1"
                        sub_domain="(Cybersecurity Resilience aspects of Business Continuity Management - BCM)"
                        sub_domain_ar="جوانب صمود الأمن السيبراني في إدارة استمرارية الأعمال" control_id="3-1-P-1-1"
                        description="In addition to subcontrols in the ECC control 3-1-3, the CSP shall cover the following additional subcontrols for cybersecurity requirements for cybersecurity resilience aspects of business continuity management, as a minimum"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٣-١-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لجوانب صمود الأمن السيبراني في إدارة استمرارية الأعمال لدى مقدمي الخدمات، بحد أدنى مايلي:"
                        :control="$control" theme="bg-dark" :status="$status"/>

                    <x-sub-control-ccc control_id="3-1-P-1-1"
                        description="Developing and implementing disaster recovery and business continuity procedures in a secure manner"
                        description_ar="تطوير وتنفيذ إجراءات التعافي من الكوارث واستمرارية الأعمال بصورة آمنة."
                        :control="$control" theme="bg-dark" />
                @endif
                @if ($control->control_id == 'NCA-CCC-3-1-P-1-2')
                    <x-sub-control-ccc control_id="3-1-P-1-2"
                        description="Developing and implementing procedures to ensure resilience and continuity of cybersecurity systems dedicated to the protection of Cloud Technology Stack"
                        description_ar="تطوير وتنفيذ إجراءات لضمان صمود واستمرارية أنظمة الأمن السيبراني المخصصة لحماية الأنظمة التقنية السحابية (CTS)."
                        :control="$control" theme="bg-dark" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CCC-4-1-P-1-1')
                @php
                        $status = getParentStatus($report, 'NCA-CCC-4-1-P-1-');
                    @endphp
                    <x-main-control-ccc main_domain="(Third-Party Cybersecurity)"
                        main_domain_ar="4- الأمن السيبراني المتعلق بالأطراف الخارجية " main_domain_id="4-1"
                        sub_domain="(Supply Chain and Third-Party Cybersecurity)"
                        sub_domain_ar="الأمن السيبراني المتعلق بسلسلة الإمداد والأطراف الخارجية" control_id="4-1-P-1-1"
                        description="In addition to implementing the ECC controls 4-1-2 and 4-1-3, the CSP shall cover the following additional subcontrols for third-party cybersecurity requirements, as a minimum"
                        description_ar="بالإضافة إلى تطبيق الضابطين ٤-١-٢ و ٤-١-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني المتعلق بالأطراف الخارجية لدى مقدمي الخدمات، بحد أدنى مايلي:"
                        :control="$control" :status="$status"/>
                        
                    <x-sub-control-ccc control_id="4-1-P-1-1"
                        description="Ensure that the CSP fulfills NCA's requests to remove software or services, provided by third-party providers that may be considered a cybersecurity threat to national organizations, from the marketplace provided to CSTs"
                        description_ar="ضمان تنفيذ مقدم الخدمة لطلبات الهيئة الوطنية للأمن السيبراني الخاصة بإزالة البرمجيات أو الخدمات المقدمة من أطراف خارجية التي قد تعتبر تهديدًا على الأمن السيبراني للجهات الوطنية، من السوق (Marketplace) المقدم للمشتركين."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CCC-4-1-P-1-2')
                    <x-sub-control-ccc control_id="4-1-P-1-2"
                        description="Requirement to provide security documentation for any equipment or services from suppliers and third-party providers"
                        description_ar="طلب تقديم التوثيق (Documentation) اللازم، فيما يخص الأمن السيبراني، لأي معدات أو خدمات مقدمة من الموردين ومقدمي الخدمات من الأطراف الخارجية."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CCC-4-1-P-1-3')
                    <x-sub-control-ccc control_id="4-1-P-1-3"
                        description="Third-party providers compliant with law and regulatory requirements relevant to their scope"
                        description_ar="الزام الأطراف الخارجية بالمتطلبات التنظيمية، والتشريعية ذات الصلة بنطاق عملهم."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CCC-4-1-P-1-4')
                    <x-sub-control-ccc control_id="4-1-P-1-4"
                        description="Risk management and security governance on third-party providers as part of general cybersecurity risk management and governance"
                        description_ar="يجب على الطرف الخارجي إدارة مخاطر الأمن السيبراني الخاصة به." :control="$control"
                        border_b="true" />
                @endif
            @endforeach

        </tbody>
    </table>
@endsection
