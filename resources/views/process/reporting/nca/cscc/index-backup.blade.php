@extends('pdf.partials.layout')
@section('title', 'NCA CSCC 2019 Assessment and Compliance')
@section('action-buttons')
    <a href="{{ route('cscc-regulatory-summary.show') }}?controlAssessmentId={{ $controlAssessmentId }}" class="btn-report">
        <p>تقرير ملخص</p>
        <p>Summary Report</p>
    </a>
    {{-- <a href="{{ route('regulatory-reports.create') }}?best_practice=NCA-CSCC-2019" class="btn-report">
        <p>تقرير مفصل</p>
        <p>Detailed Report</p>
    </a> --}}
    <a href="{{ route('cscc-regulatory-report.excel') }}" class="btn-report">
        <p>تنزيل بصيغة إكسل</p>
        <p>Download in Excel</p>
    </a>
    <a href="{{ route('cscc-regulatory-report.show') }}?pdf=1" class="btn-report">
        <p>تنزيل بصيغة بي دي إف</p>
        <p>Download as PDF</p>
    </a>
@endsection

@section('header')
    <h1 class="arabic-text">الهيئة الوطنية للأمن السيبراني - ضوابط الأمن السيبراني للأنظمة الحساسة</h1>
    <p style="margin-top: 20px">Control Assessment Regulator Reports</p>
    <p>National Cybersecurity Authority - Critical Systems Cybersecurity Controls (NCA-CSCC)</p>
@endsection
@section('content')



    <table class="table mb-0">
        <tbody>
            {{-- Heads --}}
            <tr class="bg-light-gray">
                <th>
                    <p>
                        <span>المكون الأساسي</span>
                        <br>
                        <span>Main Control</span>
                    </p>
                </th>
                <th colspan="2">
                    <p>
                        <span>المكون الفرعي </span>
                        <br>
                        <span>Sub-controls</span>
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
                        <span>Control Number</span>
                    </p>
                </th>
                <th class="description">
                    <p>
                        <span>نص الضابط</span>
                        <br>
                        <span>Control Description</span>
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
                @if ($control->control_id == 'NCA-CSCC-1-1-1')
                    <x-main-control-alt main_domain="(Cybersecurity Governance)" main_domain_ar="١- حوكمة الأمن السيبراني"
                        main_domain_id="١-١" sub_domain="(Cybersecurity Strategy)"
                        sub_domain_ar="إستراتيجية الأمن السيبراني" control_id="١-١-١"
                        description="In addition to the controls within Subcomponent 1.1 of the Cybersecurity Core Controls, the entity's cybersecurity strategy should prioritize supporting the protection of the entity's critical systems."
                        description_ar="بالإضافة للضوابط ضمن المكون الفرعي ١-١ في الضوابط الأساسية للأمن السيبراني، يجب أن تضع إستراتيجية الأمن السيبراني للجهة أولوية لدعم حماية الأنظمة الحساسة الخاصة بالجهة."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-1-2-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-1-2-1-');
                    @endphp

                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="١-٢"
                        sub_domain="(Cybersecurity Risk Management)" sub_domain_ar="إدارة مخاطر الأمن السيبراني "
                        control_id="١-٢-١"
                        description="In addition to the controls within subcomponent 1.5 of the Cybersecurity Core Controls, the cybersecurity risk management methodology should include, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط ضمن المكون الفرعي ١-٥ في الضوابط الأساسية للأمن السيبراني، يجب أن تشمل منهجية إدارة مخاطر الأمن السيبراني بحد أدنى ما يأتي:"
                        :control="$control" :status="$status" />

                    <x-sub-control-alt control_id="١-٢-١-١"
                        description="Carry out cybersecurity risk assessment on sensitive systems at least once a year."
                        description_ar="تنفيذ إجراء تقييم مخاطر الأمن السيبراني، على الأنظمة الحساسة، مرة واحدة سنوياً، على الأقل."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-1-2-1-2')
                    <x-sub-control-alt control_id="١-٢-١-٢"
                        description="Create a cybersecurity risk register for sensitive systems, and follow it at least once a month."
                        description_ar="إنشاء سجل مخاطر الأمن السيبراني الخاص بالأنظمة الحساسة، ومتابعته مرة شهرياً على الأقل."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-1-3-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-1-3-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="١-٣"
                        sub_domain="(Cybersecurity in Information Technology Projects)"
                        sub_domain_ar="الأمن السيبراني ضمن إدارة المشاريع المعلوماتية والتقنية" control_id="١-٣-١"
                        description="In addition to the sub-regulations within control 1.6.2 in the basic controls of cybersecurity, they must cover the requirements of cybersecurity, for project management and changes to the information and technical assets of sensitive systems in one hand, at a minimum; the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ١-٦-٢ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني، لإدارة المشاريع والتغييرات على الأصول المعلوماتية والتقنية للأنظمة الحساسة في جهة، بحد أدنى؛ ما يلي:"
                        :control="$control" :status="$status" />

                    <x-sub-control-alt control_id="١-٣-١-١"
                        description="Perform a Stress Testing to check the capacity of the various components."
                        description_ar="إجراء اختبار التحمل (Stress Testing) للتأكد من سعة المكونات المختلفة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-1-3-1-2')
                    <x-sub-control-alt control_id="١-٣-١-٢"
                        description="Ensure that business continuity requirements are applied."
                        description_ar="التأكد من تطبيق متطلبات استمرارية الأعمال." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-1-3-2-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-1-3-2-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain="" sub_domain_ar=""
                        control_id="١-٣-٢"
                        description="In addition to the sub-regulations within Control 1.6.3 in the basic controls for cybersecurity, they must cover the cybersecurity requirements, for application development projects, and software for sensitive systems of the entity, at a minimum; the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ١-٦-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني، لمشاريع تطوير التطبيقات، والبرمجيات الخاصة بالأنظمة الحساسة للجهة، بحد أدنى؛ ما يلي:"
                        :control="$control" :status="$status" />

                    <x-sub-control-alt control_id="١-٣-٢-١"
                        description="Conduct a security review of the source code, prior to its release (Security Source Code Review)."
                        description_ar="إجراء مراجعة أمنية للشفرة المصدرية، قبل إطلاقها (Security Source Code Review)."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-1-3-2-2')
                    <x-sub-control-alt control_id="١-٣-٢-٢"
                        description="Secure access, storage, and authentication of the source code and its versions."
                        description_ar="تأمين الوصول، والتخزين، والتوثيق للشفرة المصدرية (Source Code) وإصداراتها."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-1-3-2-3')
                    <x-sub-control-alt control_id="١-٣-٢-٣"
                        description="Secure the application programming interface (Authenticated API)."
                        description_ar="تأمين واجهة برمجة التطبيقات (Authenticated API)." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-1-3-2-4')
                    <x-sub-control-alt control_id="١-٣-٢-٤"
                        description="Secure and reliable transfer of applications from Testing Environment to Production Environment with the deletion of any data, identities or passwords related to Testing Environment prior to transfer."
                        description_ar="النقل الآمن والموثوق للتطبيقات من بيئات الاختبار (Testing Environment) إلى بيئات الإنتاج (Production Environment ) مع حذف أي بيانات، أو هويات، أو كلمات مرور، متعلقة ببيئات الاختبار، قبل النقل."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-1-4-1')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="١-٤"
                        sub_domain="(Cybersecurity Periodical Assessment and Audit)"
                        sub_domain_ar="المراجعة والتدقيق الدوري للأمن السيبراني" control_id="١-٤-١"
                        description="Referring to the officer 1.8.1 in the basic controls of cybersecurity, the department concerned with cybersecurity must review the application of cybersecurity controls for sensitive systems, at least once a year."
                        description_ar="رجوعاً للضابط ١-٨-١ في الضوابط الأساسية للأمن السيبراني، فإنه يجب على الإدارة المعنية بالأمن السيبراني؛ مراجعة تطبيق ضوابط الأمن السيبراني للأنظمة الحساسة، مرة واحدة سنوياً؛ على الأقل. "
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-1-4-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain="" sub_domain_ar=""
                        control_id="١-٤-٢"
                        description="Referring to Officer 1.8.2 in the basic cybersecurity controls, the application of cybersecurity controls for sensitive systems must be reviewed by parties independent of the cybersecurity department from within the entity, at least once every three years."
                        description_ar="رجوعاً للضابط ١-٨-٢ في الضوابط الأساسية للأمن السيبراني، يجب أن تتم مراجعة تطبيق ضوابط الأمن السيبراني للأنظمة الحساسة؛ من قبل أطراف مستقلة عن الإدارة المعنية بالأمن السيبراني من داخل الجهة، مرة واحدة؛ كل ثلاث سنوات على الأقل."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-1-5-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-1-5-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="١-٥"
                        sub_domain="(Cybersecurity in Human Resources)"
                        sub_domain_ar="الأمن السيبراني المتعلق بالموارد البشرية " control_id="١-٥-١"
                        description="In addition to the sub-regulations within the control 1-9-3 in the basic controls for cybersecurity, the cybersecurity requirements must cover, before the start of the employees' professional relationship with the entity, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ١-٩-٣ في الضوابط الأساسية للأمن السيبراني، فإنه يجب أن تغطي متطلبات الأمن السيبراني، قبل بدء علاقة العاملين المهنية بالجهة، بحد أدنى؛ ما يلي:"
                        :control="$control" :status="$status" />

                    <x-sub-control-alt control_id="١-٥-١-١"
                        description="Conducting security scanning (Screening or Vetting) for workers on sensitive systems."
                        description_ar="إجراء المسح الأمني (Screening or Vetting) للعاملين على الأنظمة الحساسة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-1-5-1-2')
                    <x-sub-control-alt control_id="١-٥-١-٢"
                        description="Holds support functions, technical development, for sensitive systems; highly qualified citizens."
                        description_ar="أن يشغل وظائف الدعم، والتطوير التقني، للأنظمة الحساسة؛ مواطنون ذوو كفاءة عالية."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-1-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-2-1-1-');
                    @endphp
                    <x-main-control-alt main_domain="(Cybersecurity Defense)" main_domain_ar="٢- تعزيز الأمن السيبراني"
                        main_domain_id="٢-١" sub_domain="(Asset Management)" sub_domain_ar="إدارة الأصول "
                        control_id="٢-١-١"
                        description="In addition to the controls within subcomponent 2.1 of the Cybersecurity Core Controls, the cybersecurity requirements for IT asset management should include, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط ضمن المكون الفرعي ٢-١ في الضوابط الأساسية للأمن السيبراني، يجب أن تشمل متطلبات الأمن السيبراني لإدارة الأصول المعلوماتية والتقنية، بحد أدنى؛ مايلي:"
                        :control="$control" border_t="true" theme="bg-teal" :status="$status" />
                    <x-sub-control-alt control_id="٢-١-١-١"
                        description="Maintain an annually updated list of all assets belonging to sensitive systems."
                        description_ar="الاحتفاظ بقائمة محدثة سنوياً، لجميع الأصول التابعة للأنظمة الحساسة. "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-1-1-2')
                    <x-sub-control-alt control_id="٢-١-١-٢"
                        description="Identify asset owners and involve them in the asset management lifecycle of critical systems."
                        description_ar="تحديد ملاك الأصول (Assets Owner) وإشراكهم في دورة حياة إدارة الأصول، التابعة للأنظمة الحساسة."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-2-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-2-2-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٢"
                        sub_domain="(Identity and Access Management)" sub_domain_ar="إدارة هويات الدخول والصلاحيات "
                        control_id="٢-٢-١"
                        description="In addition to the sub-regulations within the control 2.2.3 in the basic controls for cybersecurity, they must cover the cybersecurity requirements related to the management of access identities and authorities for sensitive systems in the entity, at a minimum; the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٢-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني المتعلقة بإدارة هويات الدخول، والصلاحيات للأنظمة الحساسة في الجهة، بحد أدنى؛ ما يلي: "
                        :control="$control" theme="bg-teal" :status="$status" />
                    <x-sub-control-alt control_id="٢-٢-١-١"
                        description="Preventing remote entry from outside the Kingdom."
                        description_ar="منع الدخول عن بعد من خارج المملكة." :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-2-1-2')
                    <x-sub-control-alt control_id="٢-٢-١-٢"
                        description="Restrict remote access from within the Kingdom; to be verified by the security operations center of the entity, at each entry; and to monitor the activities related to remote access continuously."
                        description_ar="تقييد الدخول عن بعد من داخل المملكة؛ على أن يتم التأكد عن طريق مركز العمليات الأمنية الخاص بالجهة، عند كل عملية دخول؛ ومراقبة الأنشطة المتعلقة بالدخول عن بعد باستمرار. "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-2-1-3')
                    <x-sub-control-alt control_id="٢-٢-١-٣"
                        description="Multi-Factor Authentication (MFA) for all beneficiaries."
                        description_ar="التحقق من الهوية متعدد العناصر (Multi-Factor Authentication MFA) لجميع المستفيدين."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-2-1-4')
                    <x-sub-control-alt control_id="٢-٢-١-٤"
                        description="Multi-Factor Authentication (MFA) for critical and sensitive users; and on systems used to manage and track sensitive systems described in 2.3.1.4."
                        description_ar="التحقق من الهوية متعدد العناصر (Multi-Factor Authentication MFA) للمستخدمين ذوي الصلاحيات الهامة، والحساسة؛ وعلى الأنظمة المستخدمة لإدارة الأنظمة الحساسة المذكورة في الضابط ٢-٣-١-٤ ومتابعتها."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-2-1-5')
                    <x-sub-control-alt control_id="٢-٢-١-٥"
                        description="Develop and enforce a secure password policy with high standards."
                        description_ar="وضع سياسة آمنة لكلمة المرور ذات معايير عالية، وتطبيقها." :control="$control"
                        theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-2-1-6')
                    <x-sub-control-alt control_id="٢-٢-١-٦"
                        description="Use secure methods and algorithms to save and process passwords, such as using Hashing Functions."
                        description_ar="استخدام الطرق والخوارزميات الآمنة لحفظ ومعالجة كلمات المرور مثل: استخدام دوال الاختزال (Hashing Functions)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-2-1-7')
                    <x-sub-control-alt control_id="٢-٢-١-٧"
                        description="Secure management of service accounts between applications and systems; disabling interactive human login through them."
                        description_ar="الإدارة الآمنة لحسابات الخدمات ((Service Account مابين التطبيقات والأنظمة؛ وتعطيل الدخول البشري التفاعلي (Interactive login) من خلالها. "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-2-1-8')
                    <x-sub-control-alt control_id="٢-٢-١-٨"
                        description="With the exception of database administrators, it is prohibited to access or deal directly with any user with databases; this is done through applications only, and based on the powers authorized; taking into account the application of security solutions that limit, or prevent the access of database administrators to classified data (Classified Data)."
                        description_ar="فيما عدا مشرفي قواعد البيانات (Database Administrators)، يمنع الوصول أو التعامل المباشر لأي مستخدم مع قواعد البيانات؛ ويتم ذلك من خلال التطبيقات فقط، وبناءً على الصلاحيات المخوّل بها؛ مع مراعاة تطبيق حلول أمنية تحد، أو تمنع من اطلاع مشرفي قواعد البيانات على البيانات المصنفة (Classified Data)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-2-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-٢-٢"
                        description="Back to the 2.2.3.5 cybersecurity baseline controls, access IDs on sensitive systems should be reviewed, at least once, every three months."
                        description_ar="رجوعاً للضابط ٢-٢-٣-٥ في الضوابط الأساسية للأمن السيبراني، يجب مراجعة هويات الدخول على الأنظمة الحساسة، مرة واحدة، كل ثلاثة أشهر، على الأقل."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif

                @if ($control->control_id == 'NCA-CSCC-2-3-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-2-3-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٣"
                        sub_domain="(Information System and Processing Facilities Protection)"
                        sub_domain_ar="حماية الأنظمة وأجهزة معالجة المعلومات" control_id="٢-٣-١"
                        description="In addition to the sub-regulations within Control 2.3.3 in the Basic Cybersecurity Controls, the cybersecurity requirements for the protection of sensitive systems, and their information processing devices, shall cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٣-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لحماية الأنظمة الحساسة، وأجهزة معالجة المعلومات الخاصة بها، بحد أدنى؛ ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="٢-٣-١-١"
                        description="Allow only a specific list of operating files (Whitelisting) for applications and programs to work on servers for sensitive systems."
                        description_ar="السماح فقط بقائمة محددة من ملفات التشغيل (Whitelisting) للتطبيقات والبرامج؛ للعمل على الخوادم الخاصة بالأنظمة الحساسة."
                        :control="$control" theme="bg-teal" />
                @endif

                @if ($control->control_id == 'NCA-CSCC-2-3-1-2')
                    <x-sub-control-alt control_id="٢-٣-١-٢"
                        description="حماية الخوادم الخاصة بالأنظمة الحساسة بتقنيات حماية الأجهزة الطرفية(End-point Protection) المعتمدة لدى الجهة."
                        description_ar="Protecting servers for sensitive systems with end-point protection technologies approved by the entity."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-3-1-3')
                    <x-sub-control-alt control_id="٢-٣-١-٣"
                        description="Implementing packages of updates and security fixes at least once a month for external sensitive systems and those connected to the Internet; and at least every three months for internal sensitive systems, while following the change mechanisms adopted by the entity."
                        description_ar="تطبيق حزم التحديثات، والإصلاحات الأمنية، مرة واحدة شهرياً على الأقل، للأنظمة الحساسة الخارجية، والمتصلة بالإنترنت؛ وكل ثلاثة أشهر على الأقل، للأنظمة الحساسة الداخلية؛ مع اتباع آليات التغيير المعتمدة لدى الجهة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-3-1-4')
                    <x-sub-control-alt control_id="٢-٣-١-٤"
                        description="Allocate computers (Workstations) for workers in technical functions, with important and sensitive powers; to be isolated in a private network, to manage systems (Management Network) and not linked to any network, or other service (such as: e-mail service, Internet)."
                        description_ar="تخصيص أجهزة حاسب (Workstations) للعاملين في الوظائف التقنية، ذات الصلاحيات الهامة والحساسة؛ على أن تكون معزولة في شبكة خاصة، لإدارة الأنظمة (Management Network) وعلى أن لا ترتبط بأي شبكة، أو خدمة أخرى (مثل: خدمة البريد الإلكتروني، الإنترنت)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-3-1-5')
                    <x-sub-control-alt control_id="٢-٣-١-٥"
                        description="Encrypt any non-console administrative access to any of the technical components of sensitive systems, using secure encryption algorithms and protocols."
                        description_ar="تشفير أي وصول إشرافي عبر الشبكة (Non-console Administrative Access) لأي من المكونات التقنية للأنظمة الحساسة، باستخدام خوارزميات، وبروتوكولات التشفير الآمنة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-3-1-6')
                    <x-sub-control-alt control_id="٢-٣-١-٦"
                        description="Review the settings of sensitive systems (Secure Configuration and Hardening) at least every six months."
                        description_ar="مراجعة إعدادات الأنظمة الحساسة وتحصيناتها (Secure Configuration and Hardening) كل ستة أشهر على الأقل."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-3-1-7')
                    <x-sub-control-alt control_id="٢-٣-١-٧"
                        description="Review and modify the default configuration and make sure that there are no hard-coded, backdoor, and default passwords as far as possible."
                        description_ar="مراجعة الإعدادات المصنعية (Default Configuration) وتعديلها والتأكد من عدم وجود كلمات مرور ثابتة، وخلفية، وإفتراضية (Hard-Coded, Backdoor and Default Passwords) ما أمكن تطبيقه."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-3-1-8')
                    <x-sub-control-alt control_id="٢-٣-١-٨"
                        description="Protect logs, and system-sensitive files, from unauthorized access, tampering, alteration, or illegal deletion."
                        description_ar="حماية السجلات، والملفات الحساسة للأنظمة، من الوصول غير المصرح به، أو العبث، أو التغيير، أو الحذف غير المشروع."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif

                @if ($control->control_id == 'NCA-CSCC-2-4-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-2-4-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٤"
                        sub_domain="(Networks Security Management)" sub_domain_ar="إدارة أمن الشبكات" control_id="٢-٤-١"
                        description="In addition to the sub-regulations within the control 2.5.3 in the basic controls for cybersecurity, the cybersecurity requirements for managing the security of sensitive systems networks of the entity shall cover at a minimum the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٥-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لإدارة أمن شبكات الأنظمة الحساسة للجهة بحد أدنى ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٤-٢"
                        description="Isolation and physical, or logical, partitioning of critical systems networks."
                        description_ar="العزل والتقسيم المادي، أو المنطقي، لشبكات الأنظمة الحساسة." :control="$control"
                        theme="bg-teal" />
                @endif

                @if ($control->control_id == 'NCA-CSCC-2-4-1-2')
                    <x-sub-control-alt control_id="٢-١-٤-٢"
                        description="Review firewall rules and menu settings at least every six months."
                        description_ar="مراجعة إعدادات جدار الحماية (Firewall rules) وقوائمه؛ كل ستة أشهر، على الأقل."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-4-1-3')
                    <x-sub-control-alt control_id="٣-١-٤-٢"
                        description="Prevent the direct connection of any device to the local network of sensitive systems; except after examination, and to ensure the availability of the achieved protection elements, to the acceptable levels of sensitive systems."
                        description_ar="منع التوصيل المباشر، لأي جهاز بالشبكة المحلية للأنظمة الحساسة؛ إلا بعد الفحص، والتأكد من توافر عناصر الحماية المحققة، للمستويات المقبولة للأنظمة الحساسة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-4-1-4')
                    <x-sub-control-alt control_id="٤-١-٤-٢"
                        description="Prevent sensitive systems from connecting to the wireless network."
                        description_ar="منع الأنظمة الحساسة من الاتصال بالشبكة اللاسلكية." :control="$control"
                        theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-4-1-5')
                    <x-sub-control-alt control_id="٥-١-٤-٢"
                        description="Protection against advanced persistent threats at the network level (Network apt)."
                        description_ar="الحماية من التهديدات المتقدمة المستمرة على مستوى الشبكة (Network APT)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-4-1-6')
                    <x-sub-control-alt control_id="٦-١-٤-٢"
                        description="Prevent sensitive systems from connecting to the Internet if they provide an internal service to the entity; there is no need to access the service from outside the entity."
                        description_ar="منع الأنظمة الحساسة من الاتصال بالإنترنت في حال أن كانت تقدم خدمة داخلية للجهة؛ ولا توجد هناك حاجة ضرورية جداً، للدخول على الخدمة من خارج الجهة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-4-1-7')
                    <x-sub-control-alt control_id="٧-١-٤-٢"
                        description="Providing the services of sensitive systems, through networks independent of the Internet, in the event that the services of those systems, directed to limited parties; not to individuals."
                        description_ar="تقديم خدمات الأنظمة الحساسة، من خلال شبكات مستقلة عن الإنترنت، في حال أن كانت خدمات تلك الأنظمة، موجهة لجهات محدودة؛ وليست للأفراد. "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-4-1-8')
                    <x-sub-control-alt control_id="٨-١-٤-٢"
                        description="Network Disruption Protection (DistrbutedDenial of Service Attack DDoS) to reduce the risk of network disruption attacks."
                        description_ar="الحماية من هجمات تعطيل الشبكات (Distrbuted Denial of Service Attack DDoS) للحد من المخاطر الناتجة عن هجمات تعطيل الشبكات."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-4-1-9')
                    <x-sub-control-alt control_id="٩-١-٤-٢"
                        description="Allow only a specific list (Whitelisting), for firewall lists, for sensitive systems."
                        description_ar="السماح بقائمة محددة (Whitelisting) فقط، لقوائم جدار الحماية، الخاصة بالأنظمة الحساسة."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif

                @if ($control->control_id == 'NCA-CSCC-2-5-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-2-5-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٥"
                        sub_domain="(Mobile Devices Security)" sub_domain_ar="أمن الأجهزة المحمولة " control_id="٢-٥-١"
                        description="In addition to the sub-regulations within the control 2.6.3 in the basic controls for cybersecurity, they must cover the cybersecurity requirements, specific to the security of mobile devices, and devices (BYOD) of the entity, at a minimum; the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٦-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني، الخاصة بأمن الأجهزة المحمولة، وأجهزة (BYOD) للجهة، بحد أدنى؛ ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٥-٢"
                        description="Preventing access from mobile devices to sensitive systems, except for a temporary period only, after conducting a risk assessment and taking the necessary approvals from the cybersecurity department in the entity."
                        description_ar="منع الوصول من الأجهزة المحمولة للأنظمة الحساسة، إلا لفترة مؤقتة فقط؛ وذلك بعد إجراء تقييم المخاطر، وأخذ الموافقات اللازمة من الإدارة المعنية بالأمن السيبراني في الجهة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-5-1-2')
                    <x-sub-control-alt control_id="٢-١-٥-٢"
                        description="Mobile device disk encryption, with access to sensitive systems, is fully encrypted (Full Disk Encryption)."
                        description_ar="تشفير أقراص الأجهزة المحمولة، ذات صلاحية الوصول للأنظمة الحساسة، تشفيراً كاملاً (Full Disk Encryption)."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-6-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-2-6-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٦"
                        sub_domain="(Data and Information Protection)" sub_domain_ar="حماية البيانات والمعلومات "
                        control_id="٢-٦-١"
                        description="In addition to the sub-regulations within Control 2.7.3 in the Cybersecurity Fundamental Controls, they shall cover the cybersecurity requirements for data and information protection; at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٧-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لحماية البيانات والمعلومات؛ بحد أدنى، ما يلي:"
                        :control="$control" theme="bg-teal" :Status="$status" />

                    <x-sub-control-alt control_id="١-١-٦-٢"
                        description="Not to use sensitive systems data in other than the production environment (Production Environment) only after the use of strict controls to protect that data, such as: data dimming techniques (Data Masking) or data mixing techniques (Data Scrambling)."
                        description_ar="عدم استخدام بيانات الأنظمة الحساسة في غير بيئة الإنتاج (Production Environment) إلا بعد استخدام ضوابط مشددة لحماية تلك البيانات مثل: تقنيات تعتيم البيانات (Data Masking) أو تقنيات مزج البيانات (Data Scrambling)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-6-1-2')
                    <x-sub-control-alt control_id="٢-١-٦-٢" description="Classification of all sensitive systems data."
                        description_ar="تصنيف جميع بيانات الأنظمة الحساسة." :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-6-1-3')
                    <x-sub-control-alt control_id="٣-١-٦-٢"
                        description="Protection of classified data for sensitive systems through data leakage prevention techniques."
                        description_ar="حماية البيانات المصنفة الخاصة بالأنظمة الحساسة من خلال تقنيات، منع تسريب البيانات (Data Leakage Prevention)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-6-1-4')
                    <x-sub-control-alt control_id="٤-١-٦-٢"
                        description="Determine the required retention period (Retention Period) for business data related to sensitive systems; according to the relevant legislation, only the required data is retained, in production environments for sensitive systems."
                        description_ar="تحديد مدة الاحتفاظ المطلوبة (Retention Period) لبيانات الأعمال المتعلقة بالأنظمة الحساسة؛ حسب التشريعات ذات العلاقة، ويتم الاحتفاظ بالبيانات المطلوبة فقط، في بيئات الإنتاج للأنظمة الحساسة. "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-6-1-5')
                    <x-sub-control-alt control_id="٥-١-٦-٢"
                        description="Prevent the transfer of any of the production environment data of sensitive systems to any other environment."
                        description_ar=" منع نقل أي من بيانات بيئة الإنتاج الخاصة بالأنظمة الحساسة إلى أي بيئة أخرى."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-7-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-2-7-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٧"
                        sub_domain="(Cryptography)" sub_domain_ar="التشفير" control_id="٢-٧-١"
                        description="In addition to the sub-regulations within Control 2.8.3 in the Cybersecurity Core Controls, the cybersecurity requirements for encryption shall cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٨-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني للتشفير، بحد أدنى، ما يلي: "
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٧-٢"
                        description="Encrypt all sensitive systems data; during transfer (Data-In-Transit)."
                        description_ar="تشفير جميع بيانات الأنظمة الحساسة؛ أثناء النقل (Data-In-Transit)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-7-1-2')
                    <x-sub-control-alt control_id="٢-١-٧-٢"
                        description="Encrypt all sensitive system data; during storage (Data-At-Rest) at the file, database, or column-specific level, within the database."
                        description_ar="تشفير جميع بيانات الأنظمة الحساسة؛ أثناء التخزين (Data-At-Rest) على مستوى الملفات، أو قاعدة البيانات، أو على مستوى أعمدة محددة، داخل قاعدة البيانات."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-7-1-3')
                    <x-sub-control-alt control_id="٣-١-٧-٢"
                        description="Using up-to-date and secure methods, algorithms, keys and encryption devices in accordance with what the Authority issues in this regard."
                        description_ar="استخدام طرق وخوارزميات ومفاتيح وأجهزة تشفير محدثة وآمنة وفقاً لما تصدره الهيئة بهذا الشأن."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-8-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-2-8-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٨"
                        sub_domain="(Backup and Recovery Management)" sub_domain_ar="إدارة النسخ الاحتياطية "
                        control_id="٢-٨-١"
                        description="In addition to the subsidiary controls within Control 2-9-3 in the basic controls for cybersecurity, the cybersecurity requirements for backup management must cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٩-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لإدارة النسخ الاحتياطية، بحد أدنى؛ ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٨-٢"
                        description="The scope of work of online and offline backup to include all sensitive systems."
                        description_ar="نطاق عمل النسخ الاحتياطي المتصل، وغير المتصل (Online and Offline backup) ليشمل جميع الأنظمة الحساسة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-8-1-2')
                    <x-sub-control-alt control_id="٢-١-٨-٢"
                        description="Backup at planned intervals; based on the Entity's risk assessment. The Panel recommends that critical systems be backed up on a daily basis."
                        description_ar="عمل النسخ الاحتياطي على فترات زمنية مخطط لها؛ بناءً على تقييم المخاطر للجهة. وتوصي الهيئة بأن يتم عمل النسخ الاحتياطي، للأنظمة الحساسة، بشكل يومي. "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-8-1-3')
                    <x-sub-control-alt control_id="٣-١-٨-٢"
                        description="Secure the access, storage, and transfer of the content of backups of sensitive systems and their media, and protect them from damage, modification, or unauthorized access."
                        description_ar="تأمين الوصول، والتخزين، والنقل لمحتوى النسخ الاحتياطية للأنظمة الحساسة ووسائطها، وحمايتها من الإتلاف، أو التعديل، أو الاطلاع غير المصرح به."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-8-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-٨-٢"
                        description="Back to Officer 2-9-3-3 in the basic controls of cybersecurity, a periodic check must be conducted; at least every three months, to determine the effectiveness of the restoration of backups, for sensitive systems."
                        description_ar="رجوعاً للضابط ٢-٩-٣-٣ في الضوابط الأساسية للأمن السيبراني، يجب إجراء فحص دوري؛ كل ثلاثة أشهر على الأقل، لتحديد مدى فعالية استعادة النسخ الاحتياطية، الخاصة بالأنظمة الحساسة."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif

                @if ($control->control_id == 'NCA-CSCC-2-9-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-2-9-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٩"
                        sub_domain="(Vulnerabilities Management)" sub_domain_ar="إدارة الثغرات " control_id="١-٩-٢"
                        description="In addition to the sub-regulations within Control 2-10-3 in the Cybersecurity Core Controls, the cybersecurity requirements for vulnerability management for critical systems should cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٠-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لإدارة الثغرات للأنظمة الحساسة، بحد أدنى، ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٩-٢" description="Use reliable tools and tools to detect gaps."
                        description_ar="استخدام وسائل وأدوات موثوقة لإكتشاف الثغرات." :control="$control"
                        theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-9-1-2')
                    <x-sub-control-alt control_id="٢-١-٩-٢"
                        description="Evaluate and address vulnerabilities (by installing patches and fixes) on the technical components of sensitive systems, at least once a month, for external sensitive systems, connected to the Internet; and at least every three months, for internal sensitive systems."
                        description_ar="تقييم الثغرات ومعالجتها (بتنصيب حزم التحديثات والإصلاحات) على المكونات التقنية للأنظمة الحساسة، مرة واحدة شهرياً، على الأقل، للأنظمة الحساسة الخارجية، والمتصلة بالإنترنت؛ وكل ثلاثة أشهر على الأقل، للأنظمة الحساسة الداخلية."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-9-1-3')
                    <x-sub-control-alt control_id="٣-١-٩-٢"
                        description="Immediately address the newly discovered critical vulnerabilities, while following the change management mechanisms adopted by the entity."
                        description_ar="معالجة فورية للثغرات الحرجة (Critical Vulnerabilities) المكتشفة حديثاً؛ مع اتباع آليات إدارة التغيير، المعتمدة لدى الجهة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-9-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-٩-٢"
                        description="According to Officer 2-10-3-1 in the Basic Controls for Cybersecurity, vulnerabilities must be checked and detected on the technical components, for sensitive systems, at least once a month."
                        description_ar="رجوعاً للضابط ٢-١٠-٣-١ في الضوابط الأساسية للأمن السيبراني، يجب فحص الثغرات واكتشافها على المكونات التقنية، للأنظمة الحساسة، مرة واحدة شهرياً؛ على الأقل."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-10-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-2-10-1-');
                    @endphp

                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-١٠"
                        sub_domain="(Penetration Testing)" sub_domain_ar="اختبار الاختراق" control_id="٢-١٠-١"
                        description="In addition to the sub-regulations within Control 2-11-3 in the Cybersecurity Fundamental Controls, the cybersecurity requirements for penetration testing of sensitive systems shall cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-١١-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لاختبار الاختراق للأنظمة الحساسة، بحد أدنى؛ ما يلي: "
                        :control="$control" theme="bg-teal" :status="$status" />
                    <x-sub-control-alt control_id="١-١-١٠-٢"
                        description="Penetration testing scope of work, to include all technical components of sensitive systems, and all services provided internally and externally."
                        description_ar="نطاق عمل اختبار الاختراق، ليشمل جميع المكونات التقنية للأنظمة الحساسة، وجميع الخدمات المقدمة داخلياً وخارجياً."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-10-1-2')
                    <x-sub-control-alt control_id="٢-١-١٠-٢" description="Penetration testing done by a qualified team."
                        description_ar="عمل اختبار الاختراق من قبل فريق مؤهل. " :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-10-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-١٠-٢"
                        description="Referring to the 2-11-3-2 in the basic controls of cybersecurity, penetration testing must be performed on sensitive systems, at least every six months."
                        description_ar="رجوعاً للضابط ٢-١١-٣-٢ في الضوابط الأساسية للأمن السيبراني، يجب عمل اختبار الاختراق على الأنظمة الحساسة، كل ستة أشهر؛ على الأقل."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-11-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-2-11-1-');
                    @endphp

                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-١١"
                        sub_domain="(Cybersecurity Event Logs and Monitoring Management)"
                        sub_domain_ar="إدارة سجلات الأحداث ومراقبة الأمن السيبراني" control_id="٢-١١-١"
                        description="In addition to the sub-regulations within Control 2.12.3 in the Cybersecurity Fundamental Controls, the requirements for event log management and cybersecurity monitoring of sensitive systems shall cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٢-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات إدارة سجلات الأحداث، ومراقبة الأمن السيبراني للأنظمة الحساسة، بحد أدنى؛ ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-١١-٢"
                        description="Activate cybersecurity event logs on all technical components of critical systems."
                        description_ar="تفعيل سجلات الأحداث (Event logs) الخاصة بالأمن السيبراني؛ على جميع المكونات التقنية للأنظمة الحساسة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-11-1-2')
                    <x-sub-control-alt control_id="٢-١-١١-٢"
                        description="Enable and monitor alerts and event logs related to File Integrity Management."
                        description_ar="تفعيل التنبيهات وسجلات الأحداث المتعلقة بإدارة تغييرات الملفات (File Integrity Management) ومراقبتها. "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-11-1-3')
                    <x-sub-control-alt control_id="٣-١-١١-٢"
                        description="Monitor and analyze user behavior (User Behavior Analytics UBA)."
                        description_ar="مراقبة سلوك المستخدم (User Behavior Analytics UBA) وتحليله." :control="$control"
                        theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-11-1-4')
                    <x-sub-control-alt control_id="٤-١-١١-٢"
                        description="Monitor event logs of sensitive systems around the clock."
                        description_ar="مراقبة سجلات الأحداث، الخاصة بالأنظمة الحساسة على مدار الساعة." :control="$control"
                        theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-11-1-5')
                    <x-sub-control-alt control_id="٥-١-١١-٢"
                        description="Maintain and protect event logs related to sensitive systems, including full details (e.g., time, date, identity, affected system)."
                        description_ar="الاحتفاظ بسجلات الأحداث، الخاصة بالأمن السيبراني، المتعلقة بالأنظمة الحساسة وحمايتها؛ على أن تكون شاملة، ومتضمنة للتفاصيل كاملة (مثل: الوقت، التاريخ، الهوية، النظام المتأثر)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-11-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-١١-٢"
                        description="According to the Cybersecurity Core Controls Officer 2.12.3.5, the retention period of cybersecurity event logs on sensitive systems shall not be less than 18 months, depending on the relevant legislative and regulatory requirements."
                        description_ar="رجوعاً للضابط ٢-١٢-٣-٥ في الضوابط الأساسية للأمن السيبراني، يجب أن لا تقل مدة الاحتفاظ بسجلات الأحداث الخاصة بالأمن السيبراني، على الأنظمة الحساسة عن ١٨ شهراً؛ حسب المتطلبات التشريعية، والتنظيمية، ذات العلاقة."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif

                @if ($control->control_id == 'NCA-CSCC-2-12-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-2-12-1-');
                    @endphp

                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-١٢"
                        sub_domain="(Web Application Security)" sub_domain_ar="حماية تطبيقات الويب " control_id="٢-١٢-١"
                        description="In addition to the sub-regulations within Control 2.15.3 in the Basic Cybersecurity Controls, they must cover the cybersecurity requirements, to protect external web applications of the entity's sensitive systems, at a minimum; the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٥-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني، لحماية تطبيقات الويب الخارجية للأنظمة الحساسة للجهة، بحد أدنى؛ ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-١٢-٢"
                        description="Secure session management, which includes authenticity, lockout, and timeout ."
                        description_ar="الإدارة الآمنة للجلسات (Secure Session Management)، ويشمل موثوقية الجلسات (Authenticity)، وإقفالها (Lockout)، وإنهاء مهلتها (Timeout )."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-12-1-2')
                    <x-sub-control-alt control_id="٢-١-١٢-٢"
                        description="Application security and protection standards (OWASP Top Ten) are minimal."
                        description_ar="تطبيق معايير أمن التطبيقات وحمايتها (OWASP Top Ten) في حدها الأدنى."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-12-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-١٢-٢"
                        description="Referring to the 2-15-3-2 in the basic controls of cybersecurity, the principle of multi-tier architecture should be used, provided that the number of levels is not less than 3 (3-Tier Architecture)."
                        description_ar="رجوعاً للضابط ٢-١٥-٣-٢ في الضوابط الأساسية للأمن السيبراني، يجب استخدام مبدأ المعمارية ذات المستويات المتعددة (Multi-tier Architecture) على أن لا يقل عدد المستويات عن ٣ (3-Tier Architecture)."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-13-1')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-١٣"
                        sub_domain="(Application Security)" sub_domain_ar="حماية التطبيقات " control_id="٢-١٣-١"
                        description="Cybersecurity requirements must be identified, documented and approved to protect the internal applications of the entity's sensitive systems from cyber risks."
                        description_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لحماية التطبيقات الداخلية الخاصة بالأنظمة الحساسة للجهة من المخاطر السيبرانية."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-13-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-١٣-٢"
                        description="Cybersecurity requirements must be applied to protect internal applications of sensitive systems."
                        description_ar="يجب تطبيق متطلبات الأمن السيبراني؛ لحماية التطبيقات الداخلية، الخاصة بالأنظمة الحساسة للجهة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-13-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-2-13-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-١٣-٣"
                        description="Cybersecurity requirements to protect internal applications for entity-sensitive systems should cover, at a minimum, the following:"
                        description_ar="يجب أن تغطي متطلبات الأمن السيبراني؛ لحماية التطبيقات الداخلية، الخاصة بالأنظمة الحساسة للجهة، بحد أدنى، ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status" />
                    <x-sub-control-alt control_id="١-٣-١٣-٢"
                        description="Use the principle of multi-tier architecture, provided that the number of levels is not less than 3 (Tier Architecture)."
                        description_ar="استخدام مبدأ المعمارية ذات المستويات المتعددة (Multi-tier Architecture) على أن لا يقل عدد المستويات عن ٣ (3-Tier Architecture). "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-13-3-2')
                    <x-sub-control-alt control_id="٢-٣-١٣-٢" description="Use secure protocols (such as HTTPS)."
                        description_ar="استخدام بروتوكولات آمنة (مثل بروتوكول HTTPS)." :control="$control"
                        theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-13-3-3')
                    <x-sub-control-alt control_id="٣-٣-١٣-٢" description="Clarify the safe use policy for users."
                        description_ar="توضيح سياسة الاستخدام الآمن للمستخدمين." :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-13-3-4')
                    <x-sub-control-alt control_id="٤-٣-١٣-٢"
                        description="Secure session management, which includes authenticity, lockout, and timeout."
                        description_ar="الإدارة الآمنة للجلسات (Secure Session Management)، ويشمل موثوقية الجلسات (Authenticity)، وإقفالها (Lockout)، وإنهاء مهلتها (Timeout)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-2-13-4')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-١٣-٤"
                        description="Review cybersecurity requirements to protect internal applications of sensitive systems periodically."
                        description_ar="مراجعة متطلبات الأمن السيبراني لحماية التطبيقات الداخلية الخاصة بالأنظمة الحساسة للجهة دورياً."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-3-1-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-3-1-1-');
                    @endphp
                    <x-main-control-alt main_domain="(Cybersecurity Resilience)" main_domain_ar="٣- صمود الأمن السيبراني"
                        main_domain_id="٣-١"
                        sub_domain="(Cybersecurity Resilience aspects of Business Continuity Management  - BCM)"
                        sub_domain_ar="جوانب صمود الأمن السيبراني في إدارة استمرارية الأعمال" control_id="٣-١-١"
                        description="In addition to the sub-regulations within Control 3.1.3 in the basic controls for cybersecurity, the business continuity management in the entity must cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٣-١-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي إدارة استمرارية الأعمال في الجهة، بحد أدنى؛ ما يلي:"
                        :control="$control" theme="bg-dark" :status="$status" />

                    <x-sub-control-alt control_id="١-١-١-٣"
                        description="Establish a disaster recovery center for critical systems."
                        description_ar="وضع مركز للتعافي من الكوارث للأنظمة الحساسة." :control="$control"
                        theme="bg-dark" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-3-1-1-2')
                    <x-sub-control-alt control_id="٢-١-١-٣"
                        description="Incorporate sensitivesystems into disaster recovery plans."
                        description_ar="إدراج الأنظمة الحساسة؛ ضمن خطط التعافي من الكوارث." :control="$control"
                        theme="bg-dark" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-3-1-1-3')
                    <x-sub-control-alt control_id="٣-١-١-٣"
                        description="Conduct periodic tests to ensure the effectiveness of disaster recovery plans for sensitive systems at least once a year."
                        description_ar="إجراء اختبارات دورية؛ للتأكد من فعالية خطط التعافي، من الكوارث للأنظمة الحساسة، مرة واحدة سنوياً؛ على الأقل."
                        :control="$control" theme="bg-dark" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-3-1-1-4')
                    <x-sub-control-alt control_id="٤-١-١-٣"
                        description="The Commission recommends a live periodic disaster recovery test (Live DR Test) for sensitive systems."
                        description_ar="توصي الهيئة بإجراء اختبار دوري حي؛ للتعافي من الكوارث (Live DR Test) للأنظمة الحساسة."
                        :control="$control" theme="bg-dark" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-4-1-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-CSCC-4-1-1-');
                    @endphp
                    <x-main-control-alt main_domain="(Third-Party and Cloud Computing Cybersecurity)"
                        main_domain_ar="٤- الأمن السيبراني المتعلق بالأطراف الخارجية والحوسبة السحابية"
                        main_domain_id="٤-١" sub_domain="(Third-Party Cybersecurity)"
                        sub_domain_ar="الأمن السيبراني المتعلق بالأطراف الخارجية " control_id="٤-١-١"
                        description="In addition to the controls within subcomponent 4.1 of the Cybersecurity Core Controls, the cybersecurity requirements, relating to third parties, shall cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط ضمن المكون الفرعي ٤-١ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني، المتعلقة بالأطراف الخارجية، بحد أدنى؛ ما يلي: "
                        :control="$control" theme="bg-blue" border_t="true" :status="$status" />

                    <x-sub-control-alt control_id="١-١-١-٤"
                        description="Conducting security scanning (Screening or Vetting) for support service companies, support service employees, and managed services working on sensitive systems."
                        description_ar="إجراء المسح الأمني (Screening or Vetting) لشركات خدمات الإسناد، ولموظفي خدمات الإسناد، والخدمات المدارة العاملين على الأنظمة الحساسة."
                        :control="$control" theme="bg-blue" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-4-1-1-2')
                    <x-sub-control-alt control_id="٢-١-١-٤"
                        description="Support services, and services managed on sensitive systems; by national companies and entities; in accordance with the relevant legislative and regulatory requirements."
                        description_ar="أن تكون خدمات الإسناد، والخدمات المدارة على الأنظمة الحساسة؛ عن طريق شركات، وجهات وطنية؛ وفقًا للمتطلبات التشريعية، والتنظيمية ذات العلاقة."
                        :control="$control" theme="bg-blue" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-CSCC-4-2-1-1')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٤-٢"
                        sub_domain="(Cloud Computing and Hosting Cybersecurity)	"
                        sub_domain_ar="الأمن السيبراني المتعلق بالحوسبة السحابية والاستضافة" control_id="٤-٢-١"
                        description="In addition to the sub-regulations within Control 4.2.3 in the Basic Cybersecurity Controls, the cybersecurity requirements for the use of cloud computing and hosting services shall cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٤-٢-٣ في الضوابط الأساسية للأمن السيراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة باستخدام خدمات الحوسبة السحابية والاستضافة، بحد أدنى؛ ما يلي: "
                        :control="$control" theme="bg-blue" border_b="true" />

                    <x-sub-control-alt control_id="١-١-٢-٤"
                        description="The location of hosting sensitive systems, or any part of their technical components, shall be within the entity, or in cloud computing services, provided by government agencies, or national companies verifying the cloud computing controls issued by the Authority, taking into account the classification of the hosted data."
                        description_ar="أن يكون موقع استضافة الأنظمة الحساسة، أو أي جزء من مكوناتها التقنية، داخل الجهة، أو في خدمات الحوسبة السحابية، المقدمة من قبل جهات حكومية، أو شركات وطنية محققة لضوابط الحوسبة السحابية الصادرة من الهيئة مع مراعاة تصنيف البيانات المستضافة. "
                        :control="$control" theme="bg-blue" border_b="true" />
                @endif
            @endforeach

        </tbody>
    </table>
@endsection
