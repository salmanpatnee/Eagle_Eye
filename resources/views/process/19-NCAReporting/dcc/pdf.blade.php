@extends('pdf.partials.nca-pdf-report-layout')
@section('title', 'NCA DCC 2022 Assessment and Compliance')


@section('header')
    <h1 class="arabic-text">
        الهيئة الوطنية للأمن السيبراني - ضوابط الأمن السيبراني للبيانات
        التنظيمي
    </h1>
    <p style="margin-top: 20px">Control Assessment Regulator Reports</p>
    <p>National Cybersecurity Authority - Data Cybersecurity Controls
        (NCA-DCC)</p>
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
                        <span>Main Domain</span>
                    </p>
                </th>
                <th colspan="2">
                    <p>
                        <span>المكون الفرعي </span>
                        <br>
                        <span>Subdomain</span>
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
                @if ($control->control_id == 'NCA-DCC-1-1-1')
                    <x-main-control-alt main_domain="(Cybersecurity Governance)" main_domain_ar="١- حوكمة الأمن السيبراني "
                        main_domain_id="١-١" sub_domain="(Periodical Cybersecurity Review and Audit)"
                        sub_domain_ar="المراجعة والتدقيق الدوري للأمن السيبراني" control_id="١-١-١"
                        description="With reference to ECC control 1-8-1, the cybersecurity function in the organization must review the implementation of the Data Cybersecurity Controls periodically as specified for each data classification level."
                        description_ar="رجوعًا للضابط ١-٨-١ في الضوابط الأساسية للأمن السيبراني، فإنه يجب على الإدارة المعنية بالأمن السيبراني في الجهة مراجعة تطبيق ضوابط الأمن السيبراني للبيانات حسب المدة المحددة لكل مستوى."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-1-1-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain="" sub_domain_ar=""
                        control_id="١-١-٢"
                        description="With reference to ECC control 1-8-2, cybersecurity review and audit must be conducted periodically by independent parties outside the organization’s cybersecurity function as specified for each data classification level."
                        description_ar="رجوعًا للضابط ١-٨-٢ في الضوابط الأساسية للأمن السيبراني، فإنه يجب أن تتم مراجعة تطبيق ضوابط الأمن السيبراني للبيانات من قبل أطراف مستقلة عن الإدارة المعنية بالأمن السيبراني من داخل الجهة حسب المدة المحددة لكل مستوى."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-DCC-1-2-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-DCC-1-2-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="١-٢"
                        sub_domain="(Cybersecurity in Human Resources)"
                        sub_domain_ar="الأمن السيبراني المتعلق بالموارد البشرية " control_id="١-٢-١"
                        description="In addition to the subcontrols in the ECC control 1-9-3, cybersecurity requirements in human resources prior to employment, during employment and after termination/separation must include at least the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ١-٩-٣ في الضوابط الأساسية للأمن السيبراني يجب أن تغطي متطلبات الأمن السيبراني المتعلق بالموارد البشرية لتشمل خلال وبعد إنتهاء/إنهاء العلاقة الوظيفية في الجهة بحد أدنى ما يلي:"
                        :control="$control" :status="$status" />

                    <x-sub-control-alt control_id="١-٢-١-١"
                        description="In addition to the subcontrols in the ECC control 1-9-3, cybersecurity requirements in human resources prior to employment, during employment and after termination/separation must include at least the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ١-٩-٣ في الضوابط الأساسية للأمن السيبراني يجب أن تغطي متطلبات الأمن السيبراني المتعلق بالموارد البشرية لتشمل خلال وبعد إنتهاء/إنهاء العلاقة الوظيفية في الجهة بحد أدنى ما يلي:"
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-DCC-1-2-1-2')
                    <x-sub-control-alt control_id="١-٢-١-٢"
                        description="A signed agreement by personnel pledging to not use social media, communication applications or personal cloud storage to create, store or share the organization’s data, with the exception of secure communication applications approved by relevant authorities."
                        description_ar="تعهد العاملين في الجهة بعدم استخدام تطبيقات التراسل أو التواصل الإجتماعي أو خدمات التخزين السحابية الشخصية لإنشاء أو تخزين أو مشاركة البيانات الخاصة بالجهة، باستثناء تطبيقات التراسل الآمنة المعتمدة من الجهات ذات العلاقة."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-DCC-1-3-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-DCC-1-3-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="١-٣"
                        sub_domain="(Cybersecurity Awareness and Training Program) "
                        sub_domain_ar="برنامج التوعية والتدريب بالأمن السيبراني " control_id="١-٣-١"
                        description="In addition to the subcontrols in ECC control 1-10-3, the cybersecurity awareness program must cover topics related to data protection, including the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ١-١٠-٣ في الضوابط الأساسية للأمن السيبراني، فإنه يجب أن يغطي برنامج التوعية بالأمن السيبراني 
المحاور المتعلقة بحماية البيانات، بما في ذلك:"
                        :control="$control" :status="$status" />
                    <x-sub-control-alt control_id="١-٣-١-١"
                        description="Risks of data leakage and unauthorized access to data during its lifecycle."
                        description_ar="مخاطر التسريب والوصول غير المصرح به للبيانات خلال دورة حياتها." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-1-3-1-2')
                    <x-sub-control-alt control_id="١-٣-١-٢"
                        description="Secure handling of classified data while traveling and outside the workplace."
                        description_ar="التعامل الآمن مع البيانات المصنفة خلال السفر والتواجد خارج مكان العمل."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-1-3-1-3')
                    <x-sub-control-alt control_id="١-٣-١-٣"
                        description="Secure handling of data during meetings (virtual and in-person)."
                        description_ar="التعامل الآمن مع البيانات خلال الاجتماعات (الافتراضية والحضورية)."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-1-3-1-4')
                    <x-sub-control-alt control_id="١-٣-١-٤"
                        description="Secure use of printers, scanners and copy machines."
                        description_ar="الاستخدام الآمن للطابعات والماسحات الضوئية وآلات التصوير." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-1-3-1-5')
                    <x-sub-control-alt control_id="١-٣-١-٥" description="Procedures for secure data disposal."
                        description_ar="إجراءات الإتلاف الآمن للبيانات." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-1-3-1-6')
                    <x-sub-control-alt control_id="١-٣-١-٦"
                        description="Risks of sharing documents and information through non-secure channels."
                        description_ar="مخاطر مشاركة الوثائق والمعلومات من خلال قنوات تواصل غير مؤمنة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-1-3-1-7')
                    <x-sub-control-alt control_id="١-٣-١-٧"
                        description="Cybersecurity risks related to the use of external storage media."
                        description_ar="المخاطر السيبرانية المتعلقة باستخدام وسائط التخزين الخارجية." :control="$control"
                        border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-1-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-DCC-2-1-1-');
                    @endphp
                    <x-main-control-alt main_domain="(Cybersecurity Defense)" main_domain_ar="٢- تعزيز الأمن السيبراني "
                        main_domain_id="٢-١" sub_domain="(Identity and Access Management)"
                        sub_domain_ar="إدارة هويات الدخول والصلاحيات " control_id="٢-١-١"
                        description="In addition to the subcontrols in ECC control 2-2-3, cybersecurity requirements for identity and access management must cover at least the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٢-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني المتعلقة بإدارة هويات الدخول والصلاحيات، بحد أدنى، ما يلي"
                        :control="$control" theme="bg-teal" border_t="true" :status="$status" />

                    <x-sub-control-alt control_id="٢-١-١-١"
                        description="Strict restriction to allow only the minimum number of personnel accessing, viewing and sharing data based on lists of privileges limited to Saudi-national employees unless exempted by the Authorizing Official (the head of the organization or his/her delegate) and those lists are approved by the Authorizing Official."
                        description_ar="التقييد الحازم بالسماح للحد الأدنى من العاملين للوصول والاطلاع ومشاركة البيانات بناءً على قوائم صلاحيات مقتصرة على موظفين سعوديين إلا بموجب استثناء من قبل صاحب الصلاحية (رئيس الجهة أو من يفوضه) وعلى أن يتم إعتماد هذه القوائم من قبل صاحب الصلاحية.     
"
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-1-1-1')
                    <x-sub-control-alt control_id="٢-١-١-٢"
                        description="Prohibiting the sharing of approved lists of privileges with unauthorized persons."
                        description_ar="منع مشاركة قوائم الصلاحيات المعتمدة مع الأشخاص غير المصرح لهم." :control="$control"
                        theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-1-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain="" sub_domain_ar=""
                        control_id="٢-١-٢"
                        description="Managing identities and access rights to view data using Privileged Access Management systems."
                        description_ar="إدارة هويات الدخول وصلاحيات الاطلاع على البيانات باستخدام أنظمة إدارة الصلاحيات الهامة والحساسة (Privileged Access Management).
"
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-1-3')
                    <x-sub-control-alt control_id="٢-١-٣"
                        description="In addition to ECC subcontrol 2-2-3-5, the approved lists of privileges and privileges used to handle data must be reviewed as specified for each data classification level."
                        description_ar="بالإضافة للضابط الفرعي ٢-٢-٣-٥ في الضوابط الأساسية للأمن السيبراني، يجب مراجعة قوائم الصلاحيات المعتمدة والصلاحيات المستخدمة للتعامل مع البيانات حسب المدة المحددة لكل مستوى."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-2-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-DCC-2-2-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٢"
                        sub_domain="(Information System and Information Processing Facilities Protection)"
                        sub_domain_ar="حماية الأنظمة وأجهزة معالجة المعلومات " control_id="٢-٢-١"
                        description="In addition to the subcontrols in ECC control 2-3-3, cybersecurity requirements for Information System and Information Processing Facilities Protection must include at least the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٣-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تشمل متطلبات الأمن السيبراني لحماية الأنظمة وأجهزة معالجة المعلومات، بحد أدنى، ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="٢-٢-١-١"
                        description="Applying security patches and updates from the time of announcement on systems used to handle data as specified for each data classification level."
                        description_ar="تطبيق حزم التحديثات، والإصلاحات الأمنية من وقت إطلاقها للأنظمة المستخدمة للتعامل مع البيانات حسب المدة المحددة لكل مستوى."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-2-1-2')
                    <x-sub-control-alt control_id="٢-٢-١-٢"
                        description="Reviewing the security configuration and hardening of systems used to handle data as specified for each data classification level."
                        description_ar="مراجعة إعدادات الحماية والتحصين للأنظمة المستخدمة للتعامل مع البيانات (Security Configuration and Hardening) حسب المدة المحددة لكل مستوى."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-2-1-3')
                    <x-sub-control-alt control_id="٢-٢-١-٣"
                        description="Reviewing and hardening the default configuration (e.g., default passwords and backgrounds) of the technology assets used to handle the data. "
                        description_ar="مراجعة وتحصين الإعدادات المصنعية (مثل كلمات المرور الثابتة، والخلفية الافتراضية) للأصول التقنية المستخدمة للتعامل مع البيانات."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-2-1-4')
                    <x-sub-control-alt control_id="٢-٢-١-٤"
                        description="Disabling the Print Screen or Screen Capture features on the devices that create or process documents."
                        description_ar="تعطيل خاصية تصوير الشاشة (Print Screen or Screen Capture) للأجهزة التي تنشئ أو تعالج الوثائق."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-3-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-DCC-2-3-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٣"
                        sub_domain="(Mobile Devices Security)" sub_domain_ar="أمن الأجهزة المحمولة " control_id="٢-٣-١"
                        description="In addition to the subcontrols in ECC control 2-6-3, cybersecurity requirements for mobile devices must cover at least the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٦-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بأمن الأجهزة المحمولة، بحد أدنى، ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="٢-٣-١-١"
                        description="Centrally managing the organization’s owned mobile devices using Mobile Device Management (MDM) system and activating the remote wipe feature."
                        description_ar="إدارة الأجهزة المحمولة المملوكة للجهة مركزيًا باستخدام نظام إدارة الأجهزة المحمولة (Mobile Device Management – MDM) وتفعيل خاصية الحذف عن بعد. "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-3-1-2')
                    <x-sub-control-alt control_id="٢-٣-١-٢"
                        description="Centrally managing BYOD devices using Mobile Device Management (MDM) system and activating the remote wipe feature."
                        description_ar="إدارة أجهزة (BYOD) مركزيًا باستخدام نظام إدارة الأجهزة المحمولة (Mobile Device Management – MDM) وتفعيل خاصية الحذف عن بعد."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-4-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-DCC-2-4-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٤"
                        sub_domain="(Data and Information Protection)" sub_domain_ar="حماية البيانات والمعلومات "
                        control_id="٢-٤-١"
                        description="In addition to the subcontrols in ECC control 2-7-3, cybersecurity requirements for data and information protection must cover at least the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٧-٣  في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني الخاصة بحماية البيانات والمعلومات، بحد أدنى، ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٤-٢"
                        description="Using Watermark feature to label the whole document when creating, storing, printing, on the screen and on each copy so that the symbol can be traced to the user or device level."
                        description_ar="استخدام خاصية العلامات المائية لترميز كامل الوثيقة عند الإنشاء والتخزين والطباعة وعلى الشاشة وعلى كل نسخة بحيث يكون الرمز يمكن تتبعه على مستوى المستخدم أو الجهاز."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-4-1-2')
                    <x-sub-control-alt control_id="٢-١-٤-٢"
                        description="Using Data Leakage Prevention technologies and Rights Management technologies."
                        description_ar="استخدام تقنيات منع تسريب البيانات (Data Leakage Prevention) وتقنيات إدارة الصلاحيات (Rights Management). 
"
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-4-1-3')
                    <x-sub-control-alt control_id="٣-١-٤-٢"
                        description="Prohibiting the use of data in any environment other than the production environment, except after conducting a risk assessment and applying controls to protect that data, such as: data masking or data scrambling techniques."
                        description_ar="حظر استخدام البيانات في أي بيئة غير بيئة الإنتاج (Production Environment) إلا بعد إجراء تقييم للمخاطر وتطبيق ضوابط لحماية تلك البيانات، مثل تقنيات تعتيم البيانات (Data Masking) أو تقنيات مزج البيانات (Data Scrambling)>"
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-4-1-4')
                    <x-sub-control-alt control_id="٤-١-٤-٢"
                        description="Using brand protection service to protect the organization's identity from impersonation."
                        description_ar="استخدام خدمة حماية العلامة التجارية لحماية هوية الجهة من الانتحال(Brand Protection)"
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-5-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-DCC-2-5-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٥"
                        sub_domain="(Cryptography)" sub_domain_ar="التشفير " control_id="٢-٥-١"
                        description="In addition to the subcontrols in ECC control 2-8-3, cybersecurity requirements for cryptography must cover at least the following:"
                        description_ar="بالإضافة للضوابط الفرعية ضمن الضابط ٢-٨-٣  في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني للتشفير في الجهة، بحد أدنى، ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٥-٢"
                        description="Using secure and up-to-date cryptographic methods and algorithms when creating, storing, transmitting data, and for overall network communication medium; as per the requirements of the “advanced level” in the National Cryptographic Standards (NCS-1:2020)."
                        description_ar="استخدام طرق وخوارزميات محدثة وآمنة للتشفير عند الإنشاء والتخزين والمشاركة وعلى كامل الاتصال الشبكي المستخدم لنقل البيانات وفقًا للمستوى المتقدم (Advanced) ضمن المعايير الوطنية للتشــــــفير (NCS – 1:2020)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-5-1-2')
                    <x-sub-control-alt control_id="٢-١-٥-٢"
                        description="Using secure and up-to-date cryptographic methods and algorithms when creating, storing, transmitting data, and for overall network communication medium; as per the requirements of the “moderate level” in the National Cryptographic Standards (NCS-1:2020)."
                        description_ar="استخدام طرق وخوارزميات محدثة وآمنة للتشفير عند الإنشاء والتخزين والمشاركة وعلى كامل الاتصال الشبكي المستخدم لنقل البيانات وفقًا للمستوى المتوسط (Moderate) ضمن المعايير الوطنية للتشــــــفير (NCS – 1:2020)"
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-6-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-DCC-2-6-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٦"
                        sub_domain="(Secure Data Disposal)" sub_domain_ar="الإتلاف الآمن للبيانات " control_id="٢-٦-١"
                        description="Cybersecurity requirements for secure data disposal must cover at least the following:"
                        description_ar="يجب أن تغطي متطلبات الإتلاف الآمن للبيانات في الجهة بحد أدنى، ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٦-٢"
                        description="Identification of technologies, tools and procedures for the implementation of secure data disposal according to the data classification level."
                        description_ar="تحديد التقنيات والأدوات والإجراءات لتنفيذ عمليات الإتلاف الآمن للبيانات حسب مستوى تصنيف البيانات."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-6-1-2')
                    <x-sub-control-alt control_id="٢-١-٦-٢"
                        description="When storage media is no longer needed, it must be securely disposed by using the technologies, tools and procedures identified in subcontrol 2-6-1-1."
                        description_ar="عند انتهاء الحاجة لاستخدام وسائط التخزين بشكل نهائي، يجب أن يتم الإتلاف الآمن (Secure Disposal) لوسائط التخزين وذلك باستخدام التقنيات والأدوات وبإتباع الإجراءات التي تم تحديدها في الضابط رقم ٢-٦-١-١."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-6-1-3')
                    <x-sub-control-alt control_id="٣-١-٦-٢"
                        description="When storage media needs to be re-used, data must be securely erased (secure erasure) in a manner it cannot be recovered."
                        description_ar="عند الحاجة لإعادة استخدام وسائط التخزين، يجب أن يتم الحذف الآمن للبيانات (Secure Erasure)، بحيث لا يمكن استرجاعها."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-6-1-4')
                    <x-sub-control-alt control_id="٤-١-٦-٢"
                        description="Implementation of secure data disposal or   erasure operations referred to in sub-controls 2-6-1-2 and 2-6-1-3 must be verified."
                        description_ar="يجب أن يتم التحقق من تنفيذ عمليات الإتلاف أو الحذف الآمن للبيانات المشار إليها في الضابطين رقم ٢-٦-١-٢ و٢-٦-١-٣."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-6-1-5')
                    <x-sub-control-alt control_id="٥-١-٦-٢"
                        description="Keeping a record of all secure data disposal and erasure operations that have been conducted."
                        description_ar="الاحتفاظ بسجل لعمليات الإتلاف أو الحذف الآمن للبيانات التي تم تنفيذها."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-6-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-٦-٢"
                        description="The implementation of the secure data disposal requirements must be reviewed as specified for each data classification level. "
                        description_ar="يجب مراجعة تطبيق متطلبات الإتلاف الآمن للبيانات في الجهة حسب المدة المحددة لكل مستوى."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-6-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-٦-٢"
                        description="The implementation of the secure data disposal requirements must be reviewed as specified for each data classification level. "
                        description_ar="يجب مراجعة تطبيق متطلبات الإتلاف الآمن للبيانات في الجهة حسب المدة المحددة لكل مستوى."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-7-1')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٧"
                        sub_domain="(Cybersecurity for Printers and Scanners and Copy Machines)"
                        sub_domain_ar="الأمن السيبراني للطابعات والماسحات الضوئية وآلات التصوير " control_id="٢-٧-١"
                        description="Cybersecurity requirements for protecting printers, scanners and copy machines must be defined, documented and approved."
                        description_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لحماية الطابعات والماسحات الضوئية وآلات التصوير في الجهة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-7-1')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-٧-٢"
                        description="Cybersecurity requirements for printers, scanners and copy machines must be implemented."
                        description_ar="يجب تطبيق متطلبات الأمن السيبراني للطابعات والماسحات الضوئية وآلات التصوير في الجهة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-7-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-DCC-2-7-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-٧-٣"
                        description="Cybersecurity requirements for printers, scanners and copy machines must cover at least the following:"
                        description_ar="يجب أن تغطي متطلبات الأمن السيبراني للطابعات والماسحات الضوئية وآلات التصوير بحد أدنى، ما يلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="٢-٧-٣-١" description="Disabling the temporary storage feature."
                        description_ar="تعطيل خاصية التخزين المؤقت." :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-7-3-2')
                    <x-sub-control-alt control_id="٢-٧-٣-٢"
                        description="Enabling authentication on centralized printers, scanners and copy machines and requiring it before usage."
                        description_ar="تفعيل خاصية التحقق من الهوية في الطابعات والماسحات الضوئية والآت التصوير المركزية قبل بدء عمليات الطباعة والتصوير والمسح الضوئي."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-7-3-3')
                    <x-sub-control-alt control_id="٢-٧-٣-٣"
                        description="Securely retaining (for a period not less than 12 months) logs of printers, scanners and copy machines usage."
                        description_ar="الاحتفاظ بطريقة آمنة بسجل الكتروني للعمليات الخاصة باستخدام الطابعات والماسحات الضوئية والآت التصوير، لفترة لا تقل عن 12 شهرًا."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-7-3-4')
                    <x-sub-control-alt control_id="٢-٧-٣-٤"
                        description="Enabling and protecting CCTV logs which are used to monitor centralized printers, scanners and copy machines areas."
                        description_ar="تفعيل وحماية سجلات المراقبة لأنظمة CCTV على مواقع أجهزة الطباعة المركزية والماسحات الضوئية والآت التصوير."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-7-3-5')
                    <x-sub-control-alt control_id="٢-٧-٣-٥"
                        description="Using cross-shredding devices, to securely dispose documents when no longer needed."
                        description_ar="استخدام أجهزة تمزيق الوثائق الورقية (Cross Shredding)، لإتلاف الوثائق في حال الانتهاء من استخدامها نهائيًا."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-DCC-2-7-4')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-٧-٤"
                        description="Implementation of cybersecurity requirements for printers, scanners and copy machines must be reviewed as specified for each data classification level. "
                        description_ar="يجب مراجعة تطبيق متطلبات الأمن السيبراني للطابعات والماسحات الضوئية وآلات التصوير في الجهة حسب المدة المحددة لكل مستوى."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-DCC-3-1-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-DCC-3-1-1-');
                    @endphp
                    <x-main-control-alt main_domain="(Third-Party and Cloud Computing Cybersecurity)"
                        main_domain_ar="٤- الأمن السيبراني المتعلق بالأطراف الخارجية والحوسبة السحابية   "
                        main_domain_id="٣-١" sub_domain="(Third-Party Cybersecurity)"
                        sub_domain_ar="الأمن السيبراني المتعلق بالأطراف الخارجية " control_id="٣-١-١"
                        description="In addition to the controls in ECC subdomain 4-1, cybersecurity requirements for third-parties cybersecurity must include at least the following:"
                        description_ar="بالإضافة للضوابط ضمن المكون الفرعي ٤-١ في الضوابط الأساسية للأمن السيبراني، يجب أن تشمل متطلبات الأمن السيبراني المتعلقة بالأطراف الخارجية، بحد أدنى، ما يلي:"
                        :control="$control" border_t="true" />

                    <x-sub-control-alt control_id="١-١-١-٣"
                        description="Screening or vetting third-party employees who have access to the data."
                        description_ar="إجراء المسح الأمني (Screening and Vetting) لموظفي الأطراف الخارجية الذين لديهم صلاحيات الاطلاع على البيانات. "
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-3-1-1-2')
                    <x-sub-control-alt control_id="٢-١-١-٣"
                        description="Requiring contractual commitment by third-parties to securely dispose the organization’s data at the end of the contract or in case of contract termination, including providing evidences of such disposal to the organization."
                        description_ar="وجود ضمانات تعاقدية للقدرة على حذف بيانات الجهة بطرق آمنة لدى الطرف الخارجي عند الانتهاء/إنهاء العلاقة التعاقدية مع تقديم الأدلة على ذلك."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-3-1-1-3')
                    <x-sub-control-alt control_id="٣-١-١-٣"
                        description="Documenting all data sharing operations within third-parties, including data sharing justification."
                        description_ar="توثيق كافة عمليات مشاركة البيانات مع الأطراف الخارجية، على أن يشمل ذلك مبررات مشاركة البيانات."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-3-1-1-4')
                    <x-sub-control-alt control_id="٤-١-١-٣"
                        description="When transferring data outside the kingdom, the capability of the hosting organization abroad to safeguard data must be verified, approval of the Authorizing Official must be obtained and complying with related laws and regulations.  "
                        description_ar="عند مشاركة البيانات خارج المملكة يجب التحقق من قدرة الجهة المستضيفة على حماية تلك البيانات والحصول على موافقة صاحب الصلاحية بالإضافة إلى الالتزام بالمتطلبات التشريعية والتنظيمية ذات العلاقة.
"
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-3-1-1-5')
                    <x-sub-control-alt control_id="٥-١-١-٣"
                        description="Requiring third-parties to notify the organization immediately in case of cybersecurity incident that may affect data that has been shared or created."
                        description_ar="إلزام الأطراف الخارجية بإبلاغ الجهة مباشرةً عند حدوث حادثة أمن سيبراني قد تؤثر على البيانات التي تمت مشاركتها أو إنشائها."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-3-1-1-6')
                    <x-sub-control-alt control_id="٦-١-١-٣"
                        description="Reclassifying data to the least level to achieve the objective before sharing it with third-parties using data masking or data scrambling techniques."
                        description_ar="إعادة تصنيف البيانات إلى أقل مستوى يحقق الهدف، قبل مشاركتها مع الأطراف الخارجية وذلك باستخدام تقنيات تعتيم البيانات (Data Masking) أو تقنيات مزج البيانات (Data Scrambling). "
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-3-1-2-1')
                    @php
                        $status = getParentStatus($report, 'NCA-DCC-3-1-2-');
                    @endphp

                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٣-١-٢"
                        description="In alignment with related laws and regulations, and in addition to the applicable controls in ECC and controls within DCC domain (1), (2), and (3); cybersecurity requirements when dealing with consultancy services that works on high-sensitivity strategic projects at the national level must cover at least the following:"
                        description_ar="بما يتوافق مع المتطلبات التشريعية والتنظيمية ذات العلاقة، وبالإضافة إلى ما ينطبق من الضوابط الأساسية للأمن السيبراني والضوابط ضمن المكونات الرئيسية رقم (١) و (٢) و (٣) من هذه الوثيقة، يجب أن تغطي متطلبات الأمن السيبراني عند التعامل مع الجهات الاستشارية للمشاريع الاستراتيجية ذات الحساسية العالية على المستوى الوطني بحد أدنى، ما يلي:"
                        :control="$control" />

                    <x-sub-control-alt control_id="١-٢-١-٣"
                        description="Screening or vetting consultancy services employees who have access to the data."
                        description_ar="إجراء المسح الأمني (Screening or Vetting) لموظفي شركات الخدمات الاستشارية الذين لديهم صلاحيات الاطلاع على البيانات."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-3-1-2-2')
                    <x-sub-control-alt control_id="٢-٢-١-٣"
                        description="Requiring contractual commitment by consultancy services including employees non-disclosure agreements and secure disposal the organization’s data at the end of the contract or in case of contract termination, including providing evidences of such disposal to the organization."
                        description_ar="وجود ضمانات تعاقدية تشمل إلزام موظفي الخدمات الاستشارية بعدم إفشاء المعلومات وكذلك القدرة على حذف بيانات الجهة بطرق آمنة لدى شركات الخدمات الاستشارية عند الانتهاء/إنهاء العلاقة التعاقدية مع تقديم الأدلة على ذلك."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-3-1-2-3')
                    <x-sub-control-alt control_id="٣-٢-١-٣"
                        description="Documenting all data sharing operations within consultancy services, including data sharing justification."
                        description_ar="توثيق كافة عمليات مشاركة البيانات مع شركات الخدمات الاستشارية، على أن يشمل ذلك مبررات مشاركة البيانات."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-3-1-2-4')
                    <x-sub-control-alt control_id="٤-٢-١-٣"
                        description="Requiring consultancy services to notify the organization immediately in case of cybersecurity incident that may affect data that has been shared or created."
                        description_ar="إلزام شركات الخدمات الاستشارية بإبلاغ الجهة مباشرةً عند حدوث حادثة أمن سيبراني قد تؤثر على البيانات التي تمت مشاركتها أو إنشائها."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-3-1-2-5')
                    <x-sub-control-alt control_id="٥-٢-١-٣"
                        description="Reclassifying data to the least level to achieve the objective before sharing it with consultancy services using data masking or data scrambling techniques"
                        description_ar="إعادة تصنيف البيانات إلى أقل مستوى يحقق الهدف، قبل مشاركتها مع شركات الخدمات الاستشارية وذلك باستخدام تقنيات تعتيم البيانات (Data Masking) أو تقنيات مزج البيانات (Data Scrambling)."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-3-1-2-6')
                    <x-sub-control-alt control_id="٦-٢-١-٣"
                        description="Dedicating a closed room for the consultancy services employees to perform their work, in addition to providing dedicated organization owned devices to share and process data."
                        description_ar="تخصيص قاعة مغلقة لموظفي شركات الخدمات الاستشارية لأداء أعمالهم، مع توفير أجهزة مخصصة مملوكة للجهة يتم من خلالها مشاركة البيانات ومعالجتها."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-3-1-2-7')
                    <x-sub-control-alt control_id="٧-٢-١-٣"
                        description="Activating access control system to allow only authorized access to the closed room."
                        description_ar="تفعيل أنظمة التحكم بالدخول والخروج من القاعة المغلقة، على أن يكون للمصرح لهم فقط."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-DCC-3-1-2-8')
                    <x-sub-control-alt control_id="٨-٢-١-٣"
                        description="Preventing carrying out of devices, storage media and documents outside the closed room, as well as the entry of any other electronic devices.
"
                        description_ar="منع خروج الأجهزة ووحدات التخزين والوثائق من القاعة المغلقة، ومنع إدخال أي أجهزة إلكترونية للقاعة."
                        :control="$control" border_b="true" />
                @endif
            @endforeach

        </tbody>
    </table>
@endsection
