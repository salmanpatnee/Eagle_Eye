@extends('pdf.partials.layout')
@section('title', 'NCA TCC 2021 Assessment and Compliance')
@section('action-buttons')
    <a href="{{ route('tcc-regulatory-summary.show') }}?controlAssessmentId={{ $controlAssessmentId }}" class="btn-report">
        <p>تقرير ملخص</p>
        <p>Summary Report</p>
    </a>
    {{-- <a href="{{ route('regulatory-reports.create') }}?best_practice=NCA-TCC-2021" class="btn-report">
        <p>تقرير مفصل</p>
        <p>Detailed Report</p>
    </a> --}}
    <a href="{{ route('tcc-regulatory-report.excel') }}" class="btn-report">
        <p>تنزيل بصيغة إكسل</p>
        <p>Download in Excel</p>
    </a>
    <a href="{{ route('tcc-regulatory-report.show') }}?pdf=1" class="btn-report">
        <p>تنزيل بصيغة بي دي إف</p>
        <p>Download as PDF</p>
    </a>
@endsection

@section('header')
    <h1 class="arabic-text">الهيئة الوطنية للأمن السيبراني - ضوابط الأمن السيبراني للعمل عن بعد</h1>
    <p style="margin-top: 20px">Control Assessment Regulator Reports</p>
    <p> National Cybersecurity Authority - Telework Cybersecurity Controls
        (NCA-TCC)</p>
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
                @if ($control->control_id == 'NCA-TCC-1-1-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-1-1-');
                    @endphp

                    <x-main-control-alt main_domain="(Cybersecurity Governance)" main_domain_ar="١- حوكمة الأمن السيبراني"
                        main_domain_id="١-١" sub_domain="(Cybersecurity Policies and Procedures)"
                        sub_domain_ar="سياسات وإجراءات الأمن السيبراني" control_id="١-١-١"
                        description="Back to the officer 1-3-1In the basic controls of cybersecurity, cybersecurity policies and procedures must include the following:"
                        description_ar="رجوعا للضابط ١-٣-١ في الضوابط الأساسية للأمن السيبراني، يجب أن تشمل سياسات وإجراءات الأمن السيبراني ما يأتي:"
                        :control="$control" :status="$status" />
                    <x-sub-control-alt control_id="١-١-١-١"
                        description="Defining and documenting cybersecurity requirements and controls for remote work within the entity's cybersecurity policies."
                        description_ar="تحديد وتوثيق متطلبات وضوابط الأمن السيبراني للعمل عن بعد ضمن سياسات الأمن السيبراني للجهة.
"
                        :control="$control" border_b="true" />
                @endif

                @if ($control->control_id == 'NCA-TCC-1-2-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-1-2-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="١-٢"
                        sub_domain="(Cybersecurity Risk Management)" sub_domain_ar="إدارة مخاطر الأمن السيبراني "
                        control_id="١-٢-١"
                        description="In addition to the controls within the subcomponent 1-5 In basic cybersecurity controls, the cybersecurity risk management methodology should include, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط ضمن المكون الفرعي ١-٥ في الضوابط الأساسية للأمن السيبراني، يجب أن تشمل منهجية إدارة مخاطر الأمن السيبراني بحد أدنى ما يأتي:"
                        :control="$control" />

                    <x-sub-control-alt control_id="١-٢-١-١"
                        description="Assess the cybersecurity risks of remote work systems, at least once a year."
                        description_ar="تقييم مخاطر الأمن السيبراني لأنظمة العمل عن بعد، مرة واحدة سنوياً، على الأقل."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-TCC-1-2-1-2')
                    <x-sub-control-alt control_id="١-٢-١-٢"
                        description="Assess cyber security risks when planning and before allowing remote work of any service or system."
                        description_ar="تقييم مخاطر الأمن السيبراني عند التخطيط وقبل السماح بالعمل عن بعد لأي خدمة أو نظام."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-TCC-1-2-1-3')
                    <x-sub-control-alt control_id="١-٢-١-٣"
                        description="Include the cybersecurity risks related to remote work systems and the services and systems that are allowed to work remotely in the entity’s cybersecurity risk register, and follow it up once a year, at least."
                        description_ar="تضمين مخاطر الأمن السيبراني الخاصة بأنظمة العمل عن بعد والخدمات والأنظمة المسموح لها بالعمل عن بعد في سجل مخاطر الأمن السيبراني الخاص بالجهة، ومتابعته مرة واحدة سنويا، على الأقل."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-TCC-1-3-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-1-3-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="١-٣"
                        sub_domain="(Cybersecurity Awareness and Training Program)"
                        sub_domain_ar="برنامج التوعية والتدريب بالأمن السيبراني" control_id="١-٣-١"
                        description="In addition to the sub-controls within the officer1-10-3 In the basic controls of cybersecurity, the cybersecurity awareness program must cover the cyber risks and threats of remote work and the safe use of it to reduce these risks and threats, including:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ١-١٠-٣ في الضوابط الأساسية للأمن السيبراني، فإنه يجب أن يغطي برنامج التوعية بالأمن السيبراني المخاطر والتهديدات السيبرانية للعمل عن بعد والاستخدام الآمن للحد من هذه المخاطر والتهديدات، بما في ذلك:"
                        :control="$control" :status="$status" />
                    <x-sub-control-alt control_id="١-٣-١-١"
                        description="Safe use, maintenance and protection of remote work devices."
                        description_ar="الاستخدام الآمن للأجهزة المخصصة للعمل عن بعد والمحافظة عليها وحمايتها."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-TCC-1-3-1-2')
                    <x-sub-control-alt control_id="١-٣-١-٢" description="Safe handling of login identities and passwords."
                        description_ar="التعامل الآمن مع هويات الدخول وكلمات المرور." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-TCC-1-3-1-3')
                    <x-sub-control-alt control_id="١-٣-١-٣"
                        description="Protecting the data that is saved on the devices used for remote work and dealing with them according to their classification and the procedures and policies of the entity."
                        description_ar="حماية البيانات التي يتم حفظها على الأجهزة المستخدمة للعمل عن بعد والتعامل معها حسب تصنيفها وإجراءات وسياسات الجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-TCC-1-3-1-4')
                    <x-sub-control-alt control_id="١-٣-١-٤"
                        description="Safe handling of applications and solutions used for remote work such as virtual meetings, collaboration and file sharing."
                        description_ar="التعامل الآمن مع التطبيقات والحلول المستخدمة للعمل عن بعد كالاجتماعات الافتراضية، والتعاون ومشاركة الملفات."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-TCC-1-3-1-5')
                    <x-sub-control-alt control_id="١-٣-١-٥"
                        description="Safe handling of home networks and ensuring their protection settings."
                        description_ar="التعامل الآمن مع الشبكات المنزلية والتأكد من إعدادت الحماية الخاصة بها."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-TCC-1-3-1-6')
                    <x-sub-control-alt control_id="١-٣-١-٦"
                        description="Avoid working remotely using unreliable public devices or networks or while in public places."
                        description_ar="تجنب العمل عن بعد باستخدام أجهزة أو شبكات عامة غير موثوقة أو أثناء التواجد في أماكن عامة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-TCC-1-3-1-7')
                    <x-sub-control-alt control_id="١-٣-١-٧"
                        description="Unauthorized physical access, loss, theft, and vandalism of technology assets and remote working systems."
                        description_ar="الوصول المادي غير المصرح به والفقدان والسرقة والتخريب للأصول التقنية وأنظمة العمل عن بعد."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-TCC-1-3-1-8')
                    <x-sub-control-alt control_id="١-٣-١-٨"
                        description="Communicate directly with the department concerned with cybersecurity in the entity if a cybersecurity threat is suspected."
                        description_ar="التواصل مباشرة مع الإدارة المعنية بالأمن السيبراني في الجهة حال الاشتباه بتهديد أمن سيبراني."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-TCC-1-3-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain="" sub_domain_ar=""
                        control_id="١-٣-٢"
                        description="In addition to the sub-controls within the officer 1-10-4In the basic controls of cybersecurity, workers must be trained in the necessary technical skills to ensure the application of cybersecurity requirements and practices when dealing with remote work systems."
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ١-١٠-٤ في الضوابط الأساسية للأمن السيبراني، فإنه يجب تدريب العاملين على المهارات التقنية اللازمة لضمان تطبيق متطلبات وممارسات الأمن السيبراني عند التعامل مع أنظمة العمل عن بعد."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-1-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-2-1-1-');
                    @endphp
                    <x-main-control-alt main_domain="(Cybersecurity Defense)" main_domain_ar="٢- تعزيز الأمن السيبراني"
                        main_domain_id="٢-١" sub_domain="(Asset Management)" sub_domain_ar="إدارة الأصول "
                        control_id="٢-١-١"
                        description="In addition to the controls within the subcomponent 1-2In the basic controls of cyber security, the cyber security requirements for managing information and technology assets should include, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط ضمن المكون الفرعي ٢-١ في الضوابط الأساسية للأمن السيبراني، يجب أن تشمل متطلبات الأمن السيبراني لإدارة الأصول المعلوماتية والتقنية، بحد أدنى، مايلي:"
                        :control="$control" theme="bg-teal" border_t="true" :status="$status" />
                    <x-sub-control-alt control_id="٢-١-١-١"
                        description="Determine and inventory the informational and technical assets of the remote work systems, and update them once, every year; at least."
                        description_ar="تحديد وحصر الأصول المعلوماتية والتقنية لأنظمة العمل عن بعد، وتحديثها مرة واحدة، كل سنة؛ على الأقل."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-2-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-2-2-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٢"
                        sub_domain="(Identity and Access Management) " sub_domain_ar="إدارة هويات الدخول والصلاحيات"
                        control_id="٢-٢-١"
                        description="In addition to the sub-controls within the officer 2-2-3 In the basic controls of cybersecurity, the cybersecurity requirements related to managing access identities and permissions for systems used for remote work in the entity must cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٢-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني المتعلقة بإدارة هويات الدخول، والصلاحيات للأنظمة المستخدمة في العمل عن بعد في الجهة، بحد أدنى، مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="٢-٢-١-١"
                        description="Manage users' permissions to work remotely based on business needs, taking into account the sensitivity of the systems, the level of permissions, and the type of devices used by employees to work remotely."
                        description_ar="إدارة صلاحيات المستخدمين للعمل عن بعد بناءً على احتياجات العمل، مع مراعاة حساسية الأنظمة ومستوى الصلاحيات، ونوعية الأجهزة المستخدمة من قبل الموظفين للعمل عن بعد."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-2-1-2')
                    <x-sub-control-alt control_id="٢-٢-١-٢"
                        description="Restrict remote access to the same user from multiple computers at the same time (Concurrent Logins)."
                        description_ar="تقييد إمكانية الوصول عن بعد لنفس المستخدم من أجهزة حاسبات متعددة في نفس الوقت (Concurrent Logins)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-2-1-3')
                    <x-sub-control-alt control_id="٢-٢-١-٣"
                        description="Using secure standards to manage identities and passwords used in remote work systems."
                        description_ar="استخدام معايير آمنة لإدارة الهويات وكلمات المرور المستخدمة في أنظمة العمل عن بعد."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-2-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-٢-٢"
                        description="Back to the sub-officer2-2-3-5 In basic cybersecurity controls, access identities and permissions used for remote work should be reviewed, at least once a year."
                        description_ar="رجوعاً للضابط الفرعي٢-٢-٣-٥ في الضوابط الأساسية للأمن السيبراني، يجب مراجعة هويات الدخول والصلاحيات المستخدمة للعمل عن بعد، بحد أدنى مرة واحدة كل سنة."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-3-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-2-3-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٣"
                        sub_domain="(Information System and Processing Facilities Protection)"
                        sub_domain_ar="حماية الأنظمة وأجهزة معالجة المعلومات" control_id="٢-٣-١"
                        description="In addition to the sub-controls within the officer2-3-3In the basic controls of cyber security, the cyber security requirements to protect remote work systems and their information devices should cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط  ٢-٣-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لحماية أنظمة العمل عن بعد، وأجهزة المعلومات الخاصة بها، بحد أدنى، مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="٢-٣-١-١"
                        description="Apply update packages, and security fixes for remote working systems, at least once a month."
                        description_ar="تطبيق حزم التحديثات، والإصلاحات الأمنية لأنظمة العمل عن بعد، مرة واحدة شهريا على الأقل."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-3-1-2')
                    <x-sub-control-alt control_id="٢-٣-١-٢"
                        description="Review the security settings for remote work and immunization systems (Secure Configuration and Hardening), at least once a year."
                        description_ar="مراجعة إعدادات الحماية لأنظمة العمل عن بعد والتحصين (Secure Configuration and Hardening)، مرة واحدة كل سنة على الأقل."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-3-1-3')
                    <x-sub-control-alt control_id="٢-٣-١-٣"
                        description="Review and fortify the factory settings (Default Configuration) of the technical assets of remote work systems, including the presence of fixed passwords and a default background."
                        description_ar="مراجعة وتحصين الإعدادت المصنعية (Default Configuration) للأصول التقنية لأنظمة العمل عن بعد، ومنها وجود كلمات مرور ثابتة، وخلفية افتراضية."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-3-1-4')
                    <x-sub-control-alt control_id="٢-٣-١-٤"
                        description="Secure Session Management, including authenticity, lockout, and timeout."
                        description_ar="الإدارة الآمنة للجلسات (Secure Session Management)، ويشمل موثوقية الجلسات (Authenticity)، وإقفالها (Lockout)، وإنهاء مهلتها (Timeout)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-3-1-5')
                    <x-sub-control-alt control_id="٢-٣-١-٥"
                        description="Restricting the activation of features and services in remote work systems as needed, provided that potential cyber risks are analyzed in case they need to be activated."
                        description_ar="تقييد تفعيل الخصائص والخدمات في أنظمة العمل عن بعد حسب الحاجة، على أن يتم تحليل المخاطر السيبرانية المحتملة في حال الحاجة لتفعيلها."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-4-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-2-4-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٤"
                        sub_domain="(Networks Security Management)" sub_domain_ar="إدارة أمن الشبكات" control_id="٢-٤-١"
                        description="In addition to the sub-controls within the officer 2-5-3In the basic controls of cybersecurity, the cybersecurity requirements for managing the security of the entity’s networks for remote work must cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط  ٢-٥-٣  في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لإدارة أمن شبكات الجهة للعمل عن بعد، بحد أدنى، مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٤-٢"
                        description="Restricting network ports, protocols and services used for remote access operations, especially on internal systems, and opening them as needed."
                        description_ar="تقييد منافذ وبروتوكولات وخدمات الشبكة المستخدمة لعمليات الدخول عن بعد، وخصوصاً على الأنظمة الداخلية، وفتحها حسب الحاجة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-4-1-2')
                    <x-sub-control-alt control_id="٢-١-٤-٢"
                        description="Review firewall settings and lists related to remote work systems; At least once a year."
                        description_ar="مراجعة إعدادات وقوائم جدار الحماية (Firewall Rules) ذات العلاقة بأنظمة العمل عن بعد؛ مرة واحدة كل سنة على الأقل.
"
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-4-1-3')
                    <x-sub-control-alt control_id="٣-١-٤-٢"
                        description="Protection from Distributed Denial of Service Attack (DDoS) attacks on remote work systems to reduce the risks resulting from network disruption attacks."
                        description_ar="الحماية من هجمات تعطيل الشبكات Distrbuted Denial of Service Attack (DDoS) على أنظمة العمل عن بعد للحد من المخاطر الناتجة عن هجمات تعطيل الشبكات."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-4-1-4')
                    <x-sub-control-alt control_id="٤-١-٤-٢" description="Network APT for remote work systems."
                        description_ar="الحماية من التهديدات المتقدمة المستمرة على مستوى الشبكة لأنظمة العمل عن بعد (Network APT)."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-5-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-2-5-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٥"
                        sub_domain="(Mobile Devices Security)" sub_domain_ar="أمن الأجهزة المحمولة " control_id="٢-٥-١"
                        description="In addition to the sub-controls within the officer 2-6-3 In the basic controls of cybersecurity, the cybersecurity requirements related to the security of mobile devices for remote work in the entity must cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط  ٢-٦-٣  في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بأمن الأجهزة المحمولة للعمل عن بعد في الجهة، بحد أدنى، مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٥-٢"
                        description="Manage mobile devices and BYOD devices centrally using the Mobile Device Management (MDM) system."
                        description_ar="إدارة الأجهزة المحمولة وأجهزة (BYOD) مركزياً باستخدام نظام إدارة الأجهزة المحمولة (Mobile Device Management - MDM)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-5-1-2')
                    <x-sub-control-alt control_id="٢-١-٥-٢"
                        description="Apply update packages, and security fixes to mobile devices, at least once a month."
                        description_ar="تطبيق حزم التحديثات، والإصلاحات الأمنية للأجهزة المحمولة، مرة واحدة شهريا، على الأقل."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-6-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-2-6-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٦"
                        sub_domain="(Data and Information Protection)" sub_domain_ar="حماية البيانات والمعلومات "
                        control_id="٢-٦-١"
                        description="In addition to the sub-controls within the officer2-7-3 In the basic controls of cybersecurity, the cybersecurity requirements to protect data and information for remote work in the entity must cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٧-٣  في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لحماية البيانات والمعلومات للعمل عن بعد في الجهة، بحد أدنى، مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٦-٢"
                        description="Determine the classified data, according to the relevant legislation, that can be used, accessed, or dealt with through remote work systems."
                        description_ar="تحديد البيانات المصنفة، حسب التشريعات ذات العلاقة، التي يمكن استخدامها أو الوصول إليها أو التعامل معها من خلال أنظمة العمل عن بعد."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-6-1-2')
                    <x-sub-control-alt control_id="٢-١-٦-٢"
                        description="Protect classified data, which is defined in Control 2-6-1-1, using controls such as preventing the use of a type of classified data or techniques such as Data Leakage Prevention. These controls and techniques can be determined by analyzing the entity's cyber risks."
                        description_ar="حماية البيانات المصنفة، التي تم تحديدها في الضابط ٢-٦-١-١، باستخدام ضوابط مثل منع استخدام نوع من البيانات المصنفة أو تقنيات مثل منع تسريب البيانات (Data Leakage Prevention). ويمكن تحديد هذه الضوابط والتقنيات عن طريق تحليل المخاطر السيبرانية للجهة."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-7-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-2-7-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٧"
                        sub_domain="(Cryptography)" sub_domain_ar="التشفير " control_id="٢-٧-١"
                        description="In addition to the sub-controls within the officer2-8-3 In the basic controls of cyber security, the cyber security requirements for encryption in the entity should cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٨-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني للتشفير في الجهة، بحد أدنى، مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٧-٢"
                        description="The use of updated and secure encryption methods and algorithms on the entire network connection used for remote work in accordance with the advanced level within the National Cryptographic Standards (NCS – 1:2020)."
                        description_ar="استخدام طرق وخوارزميات محدثة وآمنة للتشفير على كامل الاتصال الشبكي المستخدم للعمل عن بعد وفقاً للمستوى المتقدم (Advanced) ضمن المعايير الوطنية للتشفير (NCS – 1:2020)."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-8-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-2-8-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٨"
                        sub_domain="(Backup and Recovery Management)	" sub_domain_ar="إدارة النسخ الاحتياطية "
                        control_id="٢-٨-١"
                        description="In addition to the sub-controls within the officer 2-9-3In the basic controls of cybersecurity, the cybersecurity requirements for managing backup copies of remote work systems in the entity must cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٩-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لإدارة النسخ الاحتياطية لأنظمة العمل عن بعد في الجهة، بحد أدنى، مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٨-٢"
                        description="make backups at planned intervals; Based on the entity's risk assessment of remote work systems. The authority recommends that backups be made for remote work systems once a week."
                        description_ar="عمل النسخ الاحتياطي على فترات زمنية مخطط لها؛ بناء على تقييم المخاطر للجهة، لأنظمة العمل عن بعد. وتوصي الهيئة بأن يتم عمل النسخ الاحتياطية، لأنظمة العمل عن بعد مرة واحدة كل أسبوع."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-8-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-٨-٢"
                        description="Back to the officer2-9-3-3 In the basic controls of cyber security, a periodic check is required; At least every six months, to determine the effectiveness of restoring backups of remote systems."
                        description_ar="رجوعاً للضابط ٢-٩-٣-٣  في الضوابط الأساسية للأمن السيبراني، يجب إجراء فحص دوري؛ كل
ستة أشهر على الأقل، لتحديد مدى فعالية استعادة النسخ الاحتياطية، الخاصة بأنظمة العمل
عن بعد."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-9-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-2-9-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٩"
                        sub_domain="(Vulnerabilities Management)	" sub_domain_ar="إدارة الثغرات " control_id="٢-٩-١"
                        description="In addition to the sub-controls within the officer 2-10-3 In core cybersecurity controls, the cybersecurity requirements for vulnerability management of technology assets and remote working systems should cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط  ٢-١٠-٣  في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لإدارة الثغرات للأصول التقنية وأنظمة العمل عن بعد، بحد أدنى، مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٩-٢"
                        description="Examining and discovering vulnerabilities on remote work systems and classifying them according to their severity, at least once every three months."
                        description_ar="فحص الثغرات واكتشافها على أنظمة العمل عن بعد وتصنيفها حسب خطورتها، مرة واحدة كل ثلاثة أشهر على الأقل."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-9-1-2')
                    <x-sub-control-alt control_id="٢-١-٩-٢"
                        description="Addressing vulnerabilities on remote work systems, at least once every three months."
                        description_ar="معالجة الثغرات على أنظمة العمل عن بعد، مرة واحدة كل ثلاثة أشهر على الأقل."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-10-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-2-10-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-١٠"
                        sub_domain="(Penetration Testing)" sub_domain_ar="اختبار الاختراق " control_id="٢-١٠-١"
                        description="In addition to the sub-controls within the officer 2-11-3 In Core Cybersecurity Controls, the cybersecurity requirements for penetration testing of remote working systems should cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-١١-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني لاختبار الاختراق لأنظمة العمل عن بعد، بحد أدنى، ما يلي: "
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-١٠-٢"
                        description="The scope of penetration testing work, to include all technical components of remote work systems."
                        description_ar="نطاق عمل اختبار الاختراق، ليشمل جميع المكونات التقنية لأنظمة العمل عن بعد. "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-10-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-١٠-٢"
                        description="Back to the officer2-11-3-2 In the basic controls of cyber security, penetration testing should be done on remote work systems at least once a year."
                        description_ar="رجوعاً للضابط ٢-١١-٣-٢ في الضوابط الأساسية للأمن السيبراني، يجب عمل اختبار الاختراق على أنظمة العمل عن بعد مرة واحدة كل سنة على الأقل. "
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-11-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-2-11-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-١١"
                        sub_domain="(Cybersecurity Event Logs and Monitoring Management)"
                        sub_domain_ar="إدارة سجلات الأحداث ومراقبة الأمن السيبراني " control_id="٢-١١-١"
                        description="In addition to the sub-controls within the officer2-12-3 In core cybersecurity controls, requirements for managing event logs and monitoring cybersecurity for technology assets and remote working systems should cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط  ٢-١٢-٣  في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات إدارة سجلات الأحداث، ومراقبة الأمن السيبراني للأصول التقنية وأنظمة العمل عن بعد، بحد أدنى، مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-١١-٢"
                        description="Activate event logs related to cybersecurity on technical assets and remote work systems."
                        description_ar="تفعيل سجلات الأحداث (Event Logs) الخاصة بالأمن السيبراني على الأصول التقنية وأنظمة العمل عن بعد."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-11-1-2')
                    <x-sub-control-alt control_id="٢-١-١١-٢"
                        description="Monitoring and analyzing the behavior of users of remote work systems User Behavior Analytics (UBA)."
                        description_ar="مراقبة سلوك مستخدمي أنظمة العمل عن بعد
User Behavior Analytics (UBA)
وتحليله."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-11-1-3')
                    <x-sub-control-alt control_id="٣-١-١١-٢"
                        description="Monitor event logs of technology assets and remote systems around the clock."
                        description_ar="مراقبة سجلات الأحداث، الخاصة بالأصول التقنية وأنظمة العمل عن بعد على مدار الساعة. "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-11-1-4')
                    <x-sub-control-alt control_id="٤-١-١١-٢"
                        description="Updating and applying cybersecurity monitoring procedures around the clock, to include monitoring remote entry operations, especially remote entry operations from outside the Kingdom, and verifying their validity."
                        description_ar="Updating and applying cybersecurity monitoring procedures around the clock, to include monitoring remote entry operations, especially remote entry operations from outside the Kingdom, and verifying their validity."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-11-2')
                    <x-sub-control-alt control_id="٢-١١-٢"
                        description="Back to the officer 2-12-3-5In the basic controls of cyber security, the period of keeping logs of cyber security incidents for remote working systems should not be less than 12 months; According to the relevant legislative and regulatory requirements."
                        description_ar="رجوعاً للضابط ٢-١٢-٣-٥ في الضوابط الأساسية للأمن السيبراني، يجب ألا تقل مدة الاحتفاظ بسجلات الأحداث الخاصة بالأمن السيبراني لأنظمة العمل عن بعد عن 12 شهراً؛ حسب المتطلبات التشريعية والتنظيمية ذات العلاقة."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-12-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-2-12-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-١٢"
                        sub_domain="(Cybersecurity Incident and Threat Management)	"
                        sub_domain_ar="إدارة حوادث وتهديدات الأمن السيبراني" control_id="٢-١٢-١"
                        description="In addition to the sub-controls within the officer 2-13-3In the basic controls of cybersecurity, the requirements for managing cybersecurity incidents and threats in the entity must cover, at a minimum, the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٣-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات إدارة حوادث وتهديدات الأمن السيبراني في الجهة، بحد أدنى، مايلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-١٢-٢"
                        description="Update plans for response to cybersecurity incidents and communication information within the entity in accordance with the case of remote work, and to ensure the ability to communicate and the readiness of incident response teams."
                        description_ar="تحديث خطط الاستجابة لحوادث الأمن السيبراني ومعلومات التواصل داخل الجهة بما يتوافق مع حالة العمل عن بعد، وبما يضمن القدرة على التواصل وجاهزية فرق الاستجابة للحوادث."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-12-1-2')
                    <x-sub-control-alt control_id="٢-١-١٢-٢"
                        description="Obtaining and dealing with proactive information (Threat Intelligence) related to remote work systems periodically."
                        description_ar="الحصول على المعلومات الاستباقية (Threat Intelligence) ذات العلاقة بأنظمة العمل عن بعد بشكل دوري والتعامل معها."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-TCC-2-12-1-3')
                    <x-sub-control-alt control_id="٣-١-١٢-٢"
                        description="Implement and apply the recommendations and alerts of cybersecurity incidents and threats issued by the sector supervisor or the National Cybersecurity Authority."
                        description_ar="تنفيذ وتطبيق التوصيات والتنبيهات الخاصة بحوادث وتهديدات الأمن السيبراني الصادرة من مشرف القطاع أو الهيئة الوطنية للأمن السيبراني."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif

                @if ($control->control_id == 'NCA-TCC-3-1-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-TCC-3-1-1-');
                    @endphp
                    <x-main-control-alt main_domain="(Third-Party and Cloud Computing Cybersecurity)"
                        main_domain_ar="٣- الأمن السيبراني المتعلق بالأطراف الخارجية والحوسبة السحابية
"
                        main_domain_id="٣-١" sub_domain="(Cloud Computing and Hosting Cybersecurity)	"
                        sub_domain_ar="الأمن السيبراني المتعلق بالحوسبة السحابية والاستضافة" control_id="٣-١-١"
                        description=" In addition to the sub-controls within the officer 4-2-3In basic cybersecurity controls, the cybersecurity requirements for the use of cloud computing services and hosting should cover, at a minimum, the following:
"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط  ٤-٢-٣  في الضوابط الأساسية للأمن السيراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة باستخدام خدمات الحوسبة السحابية والاستضافة، بحد أدنى، ما يلي:
"
                        :control="$control" border_t="true" border_b="true" :status="$status" />

                    <x-sub-control-alt control_id="١-١-١-٣"
                        description="The remote work systems hosting site must be inside the Kingdom."
                        description_ar="موقع استضافة أنظمة العمل عن بعد يجب أن يكون داخل المملكة." :control="$control"
                        border_b="true" />
                @endif
            @endforeach

        </tbody>
    </table>
@endsection
