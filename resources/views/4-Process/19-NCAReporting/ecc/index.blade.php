@extends('pdf.partials.layout')
@section('title', 'NCA ECC 2018 Assessment and Compliance')
@section('action-buttons')
    <a href="{{ route('ecc-regulatory-summary.show') }}?controlAssessmentId={{ $controlAssessmentId }}" class="btn-report">
        <p>تقرير ملخص</p>
        <p>Summary Report</p>
    </a>
    {{-- <a href="{{ route('regulatory-reports.create') }}?best_practice=NCA-ECC-2018" class="btn-report">
        <p>تقرير مفصل</p>
        <p>Detailed Report</p>
    </a> --}}
    <a href="{{ route('ecc-regulatory-report.excel') }}" class="btn-report">
        <p>تنزيل بصيغة إكسل</p>
        <p>Download in Excel</p>
    </a>
    <a href="{{ route('ecc-regulatory-report.show') }}?pdf=1" class="btn-report">
        <p>تنزيل بصيغة بي دي إف</p>
        <p>Download as PDF</p>
    </a>
@endsection

@section('header')
    <h1 class="arabic-text">الهيئة الوطنية للأمن السيبراني - الضوابط الأساسية للأمن السيبراني</h1>
    <p style="margin-top: 20px">Control Assessment Regulator Reports</p>
    <p>National Cybersecurity Authority - Essential Cybersecurity Controls (NCA-ECC)</p>
@endsection
@section('content')

    <table class="table mb-0">
        <tbody>
            <x-main-domain domain="١- حوكمة الأمن السيبراني (Cybersecurity Governance)" />
            <x-sub-domain subdomain="إستراتيجية الأمن السيبراني (Cybersecurity Strategy)" id="١-١" />
            <x-sub-domain-info
                info_ar="ضمان إسهام خطط العمل للأمن السيبراني والأهداف والمبادرات والمشاريع داخل الجهة في تحقيق المتطلبات
                            التشريعية والتنظيمية ذات العلاقة."
                info="Ensuring the contribution of cybersecurity work plans, objectives, initiatives and projects
                            within the entity to achieving the relevant legislative and regulatory requirements." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-1-1-1')
                    <x-main-control id="١-١-١"
                        details="The entity's cybersecurity strategy must be identified, documented, and approved and supported by the entity''s president or his representative (referred to in these controls as 'the
                        authorized person'), and the entity''s cybersecurity strategic objectives are in line with the
                        relevant legislative and regulatory requirements."
                        details_ar="يجب تحديد وتوثيق واعتماد إستراتيجية الأمن السيبراني للجهة ودعمها من قبل رئيس الجهة أو من ينيبه (ويشار له في هذه الضوابط بـاسم ''صاحب الصلاحية'')، وأن تتماشى الأهداف الإستراتيجية للأمن السيبراني للجهة مع المتطلبات التشريعية والتنظيمية ذات العلاقة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-1-2')
                    <x-main-control id="١-١-٢"
                        details="An action plan must be implemented to implement the cyber security strategy by the entity."
                        details_ar="يجب العمل على تنفيذ خطة عمل لتطبيق إستراتيجية الأمن السيبراني من قبل الجهة. "
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-1-3')
                    <x-main-control id="١-١-٣"
                        details="The cyber security strategy should be reviewed at planned intervals (or in the event of changes in relevant legislative and regulatory requirements)."
                        details_ar="يجب مراجعة إستراتيجية الأمن السيبراني على فترات زمنية مخطط لها (أو في حالة حدوث تغييرات في المتطلبات التشريعية والتنظيمية ذات العلاقة). "
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="إدارة الأمن السيبراني (Cybersecurity Management)" id="١-٢" />
            <x-sub-domain-info
                info_ar="ضمان التزام ودعم صاحب الصلاحية للجهة فيما يتعلق بإدارة وتطبيق برامج الأمن السيبراني في تلك الجهة وفقًا للمتطلبات التشريعية والتنظيمية ذات العلاقة."
                info="Ensuring the commitment and support of the authority holder of the entity with regard to the management and implementation of cybersecurity programs in that entity in accordance with the relevant legislative and regulatory requirements." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-1-2-1')
                    <x-main-control id="١-٢-١"
                        details="A department concerned with cybersecurity must be established in the entity independent of the Department of Information and Communications Technology (ICT/ IT) (according to Royal Decree No. 37140 dated 8/14/1438 AH). It is preferable to be linked directly to the head of the entity or his representative, taking into consideration that there is no conflict of interests."
                        details_ar="يجب إنشاء إدارة معنية بالأمن السيبراني في الجهة مستقلة عن إدارة تقنية المعلومات والاتصالات (ICT/ IT) (وفقأً للأمر السامي الكريم رقم ٣٧١٤٠ وتاريخ ١٤ / ٨ / ١٤٣٨ هـ). ويفضل ارتباطها مباشرة برئيس الجهة أو من ينيبه، مع الأخذ بالاعتبار عدم تعارض المصالح."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-2-2')
                    <x-main-control id="١-٢-٢"
                        details="The leadership of the department concerned with cyber security and its supervisory and sensitive positions must be filled by full-time citizens with high competence in the field of cyber security."
                        details_ar="يجب أن يشغل رئاسة الإدارة المعنية بالأمن السيبراني والوظائف الإشرافية والحساسة بها مواطنون متفرغون وذو كفاءة عالية في مجال الأمن السيبراني. "
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-2-3')
                    <x-main-control id="١-٢-٣"
                        details="A supervisory committee for cybersecurity must be established under the direction of the authority holder of the entity to ensure compliance, support and follow-up on the implementation of cybersecurity programs and legislation. The members of the committee, its responsibilities and the framework of its business governance shall be identified, documented and approved, provided that the head of the department concerned with cybersecurity is one of its members. It is preferable to be linked directly to the head of the entity or his representative, taking into consideration that there is no conflict of interests."
                        details_ar="يجب إنشاء لجنة إشرافية للأمن السيبراني بتوجيه من صاحب الصلاحية للجهة لضمان التزام ودعم ومتابعة تطبيق برامج وتشريعات الأمن السيبراني، ويتم تحديد وتوثيق واعتماد أعضاء اللجنة ومسؤولياتها وإطار حوكمة أعمالها على أن يكون رئيس الإدارة المعنية بالأمن السيبراني أحد أعضائها. ويفضل ارتباطها مباشرة برئيس الجهة أو من ينيبه، مع الأخذ بالاعتبار عدم تعارض المصالح."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="سياسات وإجراءات الأمن السيبراني (Cybersecurity Policies and Procedures)"
                id="١-٣" />
            <x-sub-domain-info
                info_ar="ضمان توثيق ونشر متطلبات الأمن السيبراني والتزام الجهة بها، وذلك وفقًا لمتطلبات الأعمال التنظيمية للجهة، والمتطلبات التشريعية والتنظيمية ذات العلاقة."
                info="Ensure documentation and publication of cybersecurity requirements and the entity's commitment to them, in accordance with the entity's regulatory business requirements, and relevant legislative and regulatory requirements.	" />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-1-3-1')
                    <x-main-control id="١-٣-١"
                        details="The department concerned with cybersecurity in the entity must define the cybersecurity policies and procedures and what they include in terms of cybersecurity controls and requirements, and document and approve them by the authorized person in the entity, and they must also be published to the relevant persons working in the entity and the concerned parties."
                        details_ar="يجب على الإدارة المعنية بالأمن السيبراني في الجهة تحديد سياسات وإجراءات الأمن السيبراني وما تشمله من ضوابط ومتطلبات الأمن السيبراني، وتوثيقها واعتمادها من قبل صاحب الصلاحية في الجهة، كما يجب نشرها إلى ذوي العلاقة من العاملين في الجهة والأطراف المعنية بها."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-3-2')
                    <x-main-control id="١-٣-٢"
                        details="The department concerned with cybersecurity must ensure the application of cybersecurity policies and procedures in the entity and the controls and requirements they include."
                        details_ar="يجب على الإدارة المعنية بالأمن السيبراني ضمان تطبيق سياسات وإجراءات الأمن السيبراني في الجهة وما تشمله من ضوابط ومتطلبات."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-3-3')
                    <x-main-control id="١-٣-٣"
                        details="Cyber security policies and procedures must be supported by security technical standards (eg: security technical standards for firewall, databases, operating systems, etc.)."
                        details_ar="يجب أن تكون سياسات وإجراءات الأمن السيبراني مدعومة بمعايير تقنية أمنية (على سيبل المثال: المعايير التقنية الأمنية لجدار الحماية وقواعد البيانات، وأنظمة التشغيل، إلخ)."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-3-4')
                    <x-main-control id="١-٣-٤"
                        details="Cybersecurity policies, procedures and standards should be reviewed and updated at planned intervals (or in the event of changes in relevant legislative and regulatory requirements and standards), and changes should be documented and approved."
                        details_ar="يجب مراجعة سياسات وإجراءات ومعايير الأمن السيبراني وتحديثها على فترات زمنية مخطط لها (أو في حالة حدوث تغييرات في المتطلبات التشريعية والتنظيمية والمعايير ذات العلاقة)، كما يجب توثيق التغييرات واعتمادها."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="أدوار ومسؤوليات الأمن السيبراني (Cybersecurity Roles and Responsibilities)"
                id="١-٤" />
            <x-sub-domain-info
                info_ar="ضمان تحديد أدوار ومسؤوليات واضحة لجميع الأطراف المشاركة في تطبيق ضوابط الأمن السيبراني في الجهة."
                info="" />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-1-4-1')
                    <x-main-control id="١-٤-١"
                        details='The authority holder must define, document and approve the organizational structure of governance, roles and responsibilities related to cyber security for the entity, and assign the concerned persons, and must provide the necessary support to enforce this, taking into account the absence of conflict of interests.'
                        details_ar='يجب على صاحب الصلاحية تحديد وتوثيق واعتماد الهيكل التنظيمي للحوكمة والأدوار والمسؤوليات الخاصة بالأمن السيبراني للجهة، وتكليف الأشخاص المعنيين بها، كما يجب تقديم الدعم اللازم لإنفاذ ذلك، مع الأخذ بالاعتبار عدم تعارض المصالح.'
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-4-2')
                    <x-main-control id="١-٤-٢"
                        details="The authority holder must define, document and approve the organizational structure of governance, roles and responsibilities related to cyber security for the entity, and assign the concerned persons, and must provide the necessary support to enforce this, taking into account the absence of conflict of interests."
                        details_ar="يجب مراجعة أدوار ومسؤوليات الأمن السيبراني في الجهة وتحديثها على فترات زمنية مخطط لها (أو في حالة حدوث تغييرات في المتطلبات التشريعية والتنظيمية ذات العلاقة)."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="إدارة مخاطر الأمن السيبراني (Cybersecurity Risk Management)" id="١-٥" />
            <x-sub-domain-info
                info_ar="ضمان إدارة مخاطر الأمن السيبراني على نحو ممنهج يهدف إلى حماية الأصول المعلوماتية والتقنية للجهة، وذلك وفقًا للسياسات والإجراءات التنظيمية للجهة والمتطلبات التشريعية والتنظيمية ذات العلاقة."
                info="" />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-1-5-1')
                    <x-main-control id="١-٥-١"
                        details="The department concerned with cybersecurity in the entity must define, document and approve the methodology and procedures for managing cybersecurity risks in the entity. This is in accordance with considerations of confidentiality, availability and integrity of informational and technical assets."
                        details_ar="يجب على الإدارة المعنية بالأمن السيبراني في الجهة تحديد وتوثيق واعتماد منهجية وإجراءات إدارة مخاطر الأمن السيبراني في الجهة. وذلك وفقًا لاعتبارات السرية وتوافر وسلامة الأصول المعلوماتية والتقنية."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-5-2')
                    <x-main-control id="١-٥-٢"
                        details="The department concerned with cybersecurity must apply the methodology and procedures for managing cybersecurity risks in the entity."
                        details_ar="يجب على الإدارة المعنية بالأمن السيبراني تطبيق منهجية وإجراءات إدارة مخاطر الأمن السيبراني في الجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-5-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-1-5-3-');
                    @endphp
                    <x-main-control id="١-٥-٣"
                        details="At a minimum, cybersecurity risk assessment procedures should be implemented in the following cases:"
                        details_ar="يجب تنفيذ إجراءات تقييم مخاطر الأمن السيبراني بحد أدنى في الحالات التالية:"
                        :status="$status" />

                    <x-sub-control id="١-٥-٣-١" details="At an early stage of technical projects."
                        details_ar="في مرحلة مبكرة من المشاريع التقنية." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-5-3-2')
                    <x-sub-control id="١-٥-٣-٢"
                        details="Before making a fundamental change in the technical architecture.
"
                        details_ar="قبل إجراء تغيير جوهري في البنية التقنية." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-5-3-3')
                    <x-sub-control id="١-٥-٣-٣" details="When planning to obtain the services of a third party."
                        details_ar="عند التخطيط للحصول على خدمات طرف خارجي." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-5-3-4')
                    <x-sub-control id="١-٥-٣-٤"
                        details="When planning and before launching new technology products and services."
                        details_ar="عند التخطيط وقبل إطلاق منتجات وخدمات تقنية جديدة." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-5-4')
                    <x-main-control id="١-٥-٤"
                        details="The methodology and procedures for managing cyber security risks should be reviewed and updated at planned intervals (or in the event of changes in legislative and regulatory requirements and related standards), and the changes should be documented and approved."
                        details_ar="يجب مراجعة منهجية وإجراءات إدارة مخاطر الأمن السيبراني وتحديثها على فترات زمنية مخطط لها (أو في حالة حدوث تغييرات في المتطلبات التشريعية والتنظيمية والمعايير ذات العلاقة)، كما يجب توثيق التغييرات واعتمادها. "
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain
                subdomain="الأمن السيبراني ضمن إدارة المشاريع المعلوماتية والتقنية (Cybersecurity in Information Technology Projects) "
                id="١-٦" />

            <x-sub-domain-info
                info_ar="التأكد من أن متطلبات الأمن السيبراني مضمنة في منهجية وإجراءات إدارة مشاريع الجهة لحماية السرية وسلامة الأصول المعلوماتية والتقنية للجهة ودقتها وتوافرها، وذلك وفقًا للسياسات والإجراءات التنظيمية للجهة والمتطلبات التشريعية والتنظيمية ذات العلاقة."
                info="Ensure that cybersecurity requirements are included in the entity’s project management methodology and procedures to protect confidentiality, integrity, accuracy, and availability of the entity’s information and technical assets, in accordance with the entity’s regulatory policies and procedures and relevant legislative and regulatory requirements.	" />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-1-6-1')
                    <x-main-control id="١-٦-١"
                        details="Cybersecurity requirements must be included in the methodology and procedures of project management and in the management of change on information and technical assets in the entity to ensure that cybersecurity risks are identified and addressed as part of the life cycle of the technical project, and that cybersecurity requirements are an essential part of the requirements of technical projects."
                        details_ar="یجب تضمین متطلبات الأمن السیبراني في منھجیة وإجراءات إدارة المشاریع وفي إدارة التغییر على الأصول المعلوماتیة والتقنیة في الجھة لضمان تحدید مخاطر الأمن السیبراني ومعالجتھا كجزء من دورة حیاة المشروع التقني، وأن تكون متطلبات الأمن السیبراني جزء أساسي من متطلبات المشاریع التقنیة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-6-2-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-1-6-2-');
                    @endphp
                    <x-main-control id="١-٦-٢"
                        details="The cyber security requirements for project management and changes to the information and technical assets of the entity must cover, at a minimum, the following:
"
                        details_ar="يجب أن تغطي متطلبات الأمن السيبراني لإدارة المشاريع والتغييرات على الأصول المعلوماتية والتقنية للجهة بحد أدنى ما يلي:"
                        :control="$control" :status="$status" />

                    <x-sub-control id="١-٦-٢-١" details="Gaps assessment and remediation."
                        details_ar="تقييم الثغرات ومعالجتها." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-6-2-2')
                    <x-sub-control id="١-٦-٢-٢"
                        details="Conducting a review of the settings and immunization (Secure Configuration and Hardening)
Updates packages before launching and launching projects and changes."
                        details_ar="اجراء مراجعة للإعدادات والتحصين (Secure Configuration and Hardening) 
وحزم التحديثات قبل إطلاق وتدشين المشاريع والتغييرات."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-6-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-1-6-3-');
                    @endphp
                    <x-main-control id="١-٦-٣"
                        details="The cybersecurity requirements for the entity's application and software development projects must cover, at a minimum, the following:"
                        details_ar="يجب أن تغطي متطلبات الأمن السيبراني لمشاريع تطوير التطبيقات والبرمجيات الخاصة للجهة بحد أدنى ما يلي:"
                        :control="$control" :status="$status" />

                    <x-sub-control id="١-٦-٣-١" details="Using the Secure Coding Standards."
                        details_ar="استخدام معايير التطوير الآمن للتطبيقات (Secure Coding Standards)."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-6-3-2')
                    <x-sub-control id="١-٦-٣-٢"
                        details="Use licensed and trusted sources for application development tools and libraries."
                        details_ar="استخدام مصادر مرخصة وموثوقة لأدوات تطوير التطبيقات والمكتبات الخاصة بها (Libraries)."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-6-3-3')
                    <x-sub-control id="١-٦-٣-٣"
                        details="Conducting a test to verify the extent to which applications meet the cyber security requirements of the entity."
                        details_ar="اجراء اختبار للتحقق من مدى استيفاء التطبيقات للمتطلبات الأمنية السيبرانية للجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-6-3-4')
                    <x-sub-control id="١-٦-٣-٤" details="Integration security between applications."
                        details_ar="أمن التكامل (Integration) بين التطبيقات." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-6-3-5')
                    <x-sub-control id="١-٦-٣-٥"
                        details="Conducting a review of the settings and immunization (Secure Configuration and Hardening)
  Updates packages before launching and launching applications."
                        details_ar="اجراء مراجعة للإعدادات والتحصين (Secure Configuration and Hardening)
 وحزم التحديثات قبل إطلاق وتدشين التطبيقات."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-6-4')
                    <x-main-control id="١-٦-٤"
                        details="Cybersecurity requirements in project management in the entity must be reviewed periodically."
                        details_ar="يجب مراجعة متطلبات الأمن السيبراني في إدارة المشاريع في الجهة دوريًا. "
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain
                subdomain="الالتزام بتشريعات وتنظيمات ومعايير الأمن السيبراني (Cybersecurity Regulatory Compliance)"
                id="١-٧" />

            <x-sub-domain-info
                info_ar="ضمان التأكد من أن برنامج الأمن السيبراني لدى الجهة يتوافق مع المتطلبات التشريعية والتنظيمية ذات العلاقة."
                info="Ensure that the entity's cybersecurity program complies with the relevant legislative and regulatory requirements.	" />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-1-7-1')
                    <x-main-control id="١-٧-١"
                        details="يجب على الجهة الالتزام بالمتطلبات التشريعية والتنظيمية الوطنية المتعلقة بالأمن السيبراني.  "
                        details_ar="The entity must comply with the national legislative and regulatory requirements related to cybersecurity."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-7-2')
                    <x-main-control id="١-٧-٢"
                        details="In the event that there are international agreements or obligations approved locally that include requirements related to cybersecurity, the entity must comply with those requirements."
                        details_ar="في حال وجود اتفاقيات أو إلتزامات دولية معتمدة محلياً تتضمن متطلبات خاصة بالأمن السيبراني، فيجب على الجهة الالتزام بتلك المتطلبات. "
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain
                subdomain="المراجعة والتدقيق الدوري للأمن السيبراني (Cybersecurity Periodical Assessment and Audit)"
                id="١-٨" />

            <x-sub-domain-info
                info_ar="ضمان التأكد من أن ضوابط الأمن السيبراني لدى الجهة مطبقة وتعمل وفقًا للسياسات والإجراءات التنظيمية للجهة، والمتطلبات التشريعية والتنظيمية الوطنية ذات العلاقة، والمتطلبات الدولية المقرّة تنظيميًا على الجهة. "
                info="Ensure that the entity’s cybersecurity controls are applied and operate in accordance with the entity’s regulatory policies and procedures, relevant national legislative and regulatory requirements, and the international regulatory requirements of the entity." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-1-8-1')
                    <x-main-control id="١-٨-١"
                        details="The department concerned with cybersecurity in the entity must review the application of cybersecurity controls periodically."
                        details_ar="يجب على الإدارة المعنية بالأمن السيبراني في الجهة مراجعة تطبيق ضوابط الأمن السيبراني دوريًا. "
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-8-2')
                    <x-main-control id="١-٨-٢"
                        details="The application of cybersecurity controls in the entity must be reviewed and audited by parties independent of the department concerned with cybersecurity (such as the department concerned with auditing in the entity). Provided that the review and audit is carried out independently, taking into account the principle of non-conflict of interests, in accordance with the accepted general standards for review and audit and the relevant legislative and regulatory requirements."
                        details_ar="يجب مراجعة وتدقيق تطبيق ضوابط الأمن السيبراني في الجهة، من قبل أطراف مستقلة عن الإدارة المعنية بالأمن السيبراني (مثل الإدارة المعنية بالمراجعة في الجهة). على أن تتم المراجعة والتدقيق بشكل مستقل يراعى فيه مبدأ عدم تعارض المصالح، وذلك وفقًا للمعايير العامة المقبولة للمراجعة والتدقيق والمتطلبات التشريعية والتنظيمية ذات العلاقة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-8-3')
                    <x-main-control id="١-٨-٣"
                        details="The results of the cybersecurity review and audit must be documented and presented to the cybersecurity supervisory committee and the authorized person. The findings should also include the scope of the audit, observations found, recommendations and corrective actions, and a plan to address the observations.
"
                        details_ar="يجب توثيق نتائج مراجعة وتدقيق الأمن السيبراني، وعرضها على اللجنة الإشرافية للأمن السيبراني وصاحب الصلاحية. كما يجب أن تشتمل النتائج على نطاق المراجعة والتدقيق، والملاحظات المكتشفة، والتوصيات والإجراءات التصحيحية، وخطة معالجة الملاحظات."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="الأمن السيبراني المتعلق بالموارد البشرية (Cybersecurity in Human Resources) "
                id="١-٩" />

            <x-sub-domain-info
                info_ar="ضمان التأكد من أن مخاطر ومتطلبات الأمن السيبراني المتعلقة بالعاملين (موظفين ومتعاقدين) في الجهة تعالج بفعالية قبل وأثناء وعند انتهاء/إنهاء عملهم، وذلك وفقًا للسياسات والإجراءات التنظيمية للجهة، والمتطلبات التشريعية والتنظيمية ذات العلاقة."
                info="Ensure that cybersecurity risks and requirements related to workers (employees and contractors) in the entity are effectively addressed before, during and at the end/termination of their work, in accordance with the entity's organizational policies and procedures, and the relevant legislative and regulatory requirements.						
" />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-1-9-1')
                    <x-main-control id="١-٩-١"
                        details="Cybersecurity requirements related to employees must be defined, documented, and approved before their employment, during their work, and at the end/termination of their work in the entity."
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني المتعلقة بالعاملين قبل توظيفهم وأثناء عملهم وعند انتهاء/إنهاء عملهم في الجهة. "
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-1-9-2')
                    <x-main-control id="١-٩-٢"
                        details="Cybersecurity requirements related to the entity's employees must be applied."
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني المتعلقة بالعاملين في الجهة." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-9-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-1-9-3-');
                    @endphp
                    <x-main-control id="١-٩-٣"
                        details="The cyber security requirements before starting a professional employee relationship with the entity must cover, at a minimum, the following:"
                        details_ar="يجب أن تغطي متطلبات الأمن السيبراني قبل بدء علاقة العاملين المهنية بالجهة بحد أدنى ما يلي:"
                        :control="$control" :status="$status" />

                    <x-sub-control id="١-٩-٣-١"
                        details="The cyber security requirements before starting a professional employee relationship with the entity must cover, at a minimum, the following"
                        details_ar="تضمين مسؤوليات الأمن السيبراني وبنود المحافظة على سرية المعلومات
 (Non-Disclosure Clauses)
في عقود العاملين في الجهة (لتشمل خلال وبعد انتهاء/إنهاء العلاقة الوظيفية مع الجهة)."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-9-3-2')
                    <x-sub-control id="١-٩-٣-٢"
                        details="Conducting a security survey (Screening or Vetting) for workers in cybersecurity jobs and technical jobs with important and sensitive powers."
                        details_ar="إجراء المسح الأمني (Screening or Vetting) للعاملين في وظائف الأمن السيبراني والوظائف التقنية ذات الصلاحيات الهامة والحساسة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-9-4-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-1-9-4-');
                    @endphp
                    <x-main-control id="١-٩-٤"
                        details="The cyber security requirements during the employees' professional relationship with the entity must cover, at a minimum, the following:"
                        details_ar="يجب أن تغطي متطلبات الأمن السيبراني خلال علاقة العاملين المهنية بالجهة بحد أدنى ما يلي: "
                        :control="$control" :status="$status" />

                    <x-sub-control id="١-٩-٤-١"
                        details="Cybersecurity awareness (at the beginning and during the career)."
                        details_ar="التوعية بالأمن السيبراني (عند بداية المهنة الوظيفية وخلالها)." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-9-4-2')
                    <x-sub-control id="١-٩-٤-٢"
                        details="Apply and comply with cybersecurity requirements in accordance with the entity's cybersecurity policies, procedures and processes.
"
                        details_ar="تطبيق متطلبات الأمن السيبراني والالتزام بها وفقًا لسياسات وإجراءات وعمليات الأمن السيبراني للجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-9-5')
                    <x-main-control id="١-٩-٥"
                        details="The powers of the employees must be reviewed and revoked immediately after the end/termination of their professional service in the entity."
                        details_ar="يجب مراجعة وإلغاء الصلاحيات للعاملين مباشرة بعد انتهاء/إنهاء الخدمة المهنية لهم بالجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-9-6')
                    <x-main-control id="١-٩-٦"
                        details="The cyber security requirements related to the employees of the entity must be reviewed periodically."
                        details_ar="يجب مراجعة متطلبات الأمن السيبراني المتعلقة بالعاملين في الجهة دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain
                subdomain="برنامج التوعية والتدريب بالأمن السيبراني (Cybersecurity Awareness and Training Program) "
                id="١-١٠" />

            <x-sub-domain-info
                info_ar="Ensure that the employees of the entity have the necessary security awareness and are aware of their responsibilities in the field of cyber security. Ensure that the entity's employees are provided with the required skills, qualifications and training courses in the field of cybersecurity to protect the information and technical assets of the entity and carry out their responsibilities towards cybersecurity.	"
                info="ضمان التأكد من أن العاملين بالجهة لديهم التوعية الأمنية اللازمة وعلى دراية بمسؤولياتهم في مجال الأمن السيبراني. والتأكد من تزويد العاملين بالجهة بالمهارات والمؤهلات والدورات التدريبية المطلوبة في مجال الأمن السيبراني لحماية الأصول المعلوماتية والتقنية للجهة والقيام بمسؤولياتهم تجاه الأمن السيبراني." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-1-10-1')
                    <x-main-control id="١-١٠-١"
                        details="A cybersecurity awareness program must be developed and approved in the entity through multiple channels periodically, in order to enhance awareness of cybersecurity, its threats and risks, and build a positive culture of cybersecurity."
                        details_ar="يجب تطوير واعتماد برنامج للتوعية بالأمن السيبراني في الجهة من خلال قنوات متعددة دوريًا، وذلك لتعزيز الوعي بالأمن السيبراني وتهديداته ومخاطره، وبناء ثقافة إيجابية للأمن السيبراني."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-10-1')
                    <x-main-control id="١-١٠-٢"
                        details="The approved cybersecurity awareness program must be implemented in the entity."
                        details_ar="يجب تطبيق البرنامج المعتمد للتوعية بالأمن السيبراني في الجهة." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-10-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-1-10-3-');
                    @endphp
                    <x-main-control id="١-١٠-٣"
                        details="The cybersecurity awareness program must cover how to protect the entity from the most important cyber risks and threats and new ones, including:"
                        details_ar="يجب أن يغطي برنامج التوعية بالأمن السيبراني كيفية حماية الجهة من أهم المخاطر والتهديدات السيبرانية وما يستجد منها، بما في ذلك:"
                        :control="$control" :status="$status" />

                    <x-sub-control id="١-١٠-٣-١"
                        details="Safe dealing with e-mail services, especially with phishing e-mails."
                        details_ar="التعامل الآمن مع خدمات البريد الإلكتروني خصوصاً مع رسائل التصيد الإلكتروني."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-10-3-2')
                    <x-sub-control id="١-١٠-٣-٢" details="Safe handling of mobile devices and storage media.
"
                        details_ar="التعامل الآمن مع الأجهزة المحمولة ووسائط التخزين." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-10-3-3')
                    <x-sub-control id="١-١٠-٣-٣" details="Safe handling of Internet browsing services.
"
                        details_ar="التعامل الآمن مع خدمات تصفح الإنترنت." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-10-3-4')
                    <x-sub-control id="١-١٠-٣-٤" details="Safe handling of Internet browsing services.
"
                        details_ar="التعامل الآمن مع وسائل التواصل الاجتماعي." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-10-4-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-1-9-4-');
                    @endphp
                    <x-main-control id="١-١٠-٤"
                        details="Specialized skills and necessary training must be provided to workers in functional areas directly related to cybersecurity in the entity, and classified in line with their job responsibilities in relation to cybersecurity, including:"
                        details_ar="يجب توفير المهارات المتخصصة والتدريب اللازم للعاملين في المجالات الوظيفية ذات العلاقة المباشرة بالأمن السيبراني في الجهة، وتصنيفها بما يتماشى مع مسؤولياتهم الوظيفية فيما يتعلق بالأمن السيبراني، بما في ذلك:"
                        :control="$control" :status="$status" />

                    <x-sub-control id="١-١٠-٤-١" details="Cyber security department staff"
                        details_ar="موظفو الإدارة المعنية بالأمن السيبراني" :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-10-4-2')
                    <x-sub-control id="١-١٠-٤-٢" details="Cyber security department staff"
                        details_ar="موظفو الإدارة المعنية بالأمن السيبراني" :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-10-4-3')
                    <x-sub-control id="١-١٠-٤-٣"
                        details="Employees working in the development of programs and applications and employees operating information and technical assets of the entity."
                        details_ar="الموظفون العاملون في تطوير البرامج والتطبيقات والموظفون المشغلون للأصول المعلوماتية والتقنية للجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-1-10-5')
                    <x-main-control id="١-١٠-٥"
                        details="The implementation of the cybersecurity awareness program in the entity must be reviewed periodically."
                        details_ar="يجب مراجعة تطبيق برنامج التوعية بالأمن السيبراني في الجهة دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-main-domain domain="٢- تعزيز الأمن السيبراني (Cybersecurity Defense)" theme="bg-teal" />

            <x-sub-domain subdomain="إدارة الأصول (Asset Management)" id="٢-١" theme="bg-teal" />

            <x-sub-domain-info
                info_ar="للتأكد من أن الجهة لديها قائمة جرد دقيقة وحديثة للأصول تشمل التفاصيل ذات العلاقة لجميع الأصول المعلوماتية والتقنية المتاحة للجهة، من أجل دعم العمليات التشغيلية للجهة ومتطلبات الأمن السيبراني، لتحقيق سرية وسلامة الأصول المعلوماتية والتقنية للجهة ودقتها وتوافرها."
                info="To ensure that the entity has an accurate and up-to-date inventory of assets that includes relevant details of all informational and technical assets available to the entity, in order to support the entity’s operational processes and cybersecurity requirements, to achieve the confidentiality, integrity, accuracy, and availability of the informational and technical assets of the entity." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-2-1-1')
                    <x-main-control id="٢-١-١"
                        details="Cybersecurity requirements for the management of the entity's information and technical assets must be identified, documented and approved."
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لإدارة الأصول المعلوماتية والتقنية للجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-1-2')
                    <x-main-control id="٢-١-٢"
                        details="Cybersecurity requirements must be applied to manage the information and technical assets of the entity."
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني لإدارة الأصول المعلوماتية والتقنية للجهة. "
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-1-3')
                    <x-main-control id="٢-١-٣"
                        details="The acceptable use policy for the information and technical assets of the entity shall be defined, documented, approved and published."
                        details_ar="يجب تحديد وتوثيق واعتماد ونشر سياسة الاستخدام المقبول للأصول المعلوماتية والتقنية للجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-1-4')
                    <x-main-control id="٢-١-٤"
                        details="The policy of acceptable use of the information and technical assets of the entity must be applied."
                        details_ar="يجب تطبيق سياسة الاستخدام المقبول للأصول المعلوماتية والتقنية للجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-1-5')
                    <x-main-control id="٢-١-٥"
                        details="The information and technical assets of the entity must be classified, coded (Labeling) and dealt with in accordance with the relevant legislative and regulatory requirements."
                        details_ar="يجب تصنيف الأصول المعلوماتية والتقنية للجهة وترميزها (Labeling) والتعامل معها وفقًا للمتطلبات التشريعية والتنظيمية ذات العلاقة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-1-6')
                    <x-main-control id="٢-١-٦"
                        details="The cybersecurity requirements for the management of the entity's information and technical assets must be reviewed periodically."
                        details_ar="يجب مراجعة متطلبات الأمن السيبراني لإدارة الأصول المعلوماتية والتقنية للجهة دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="إدارة هويات الدخول والصلاحيات (Identity and Access Management)" id="٢-٢"
                theme="bg-teal" />

            <x-sub-domain-info
                info_ar="ضمان حماية الأمن السيبراني للوصول المنطقي (Logical Access) إلى الأصول المعلوماتية والتقنية للجهة من أجل منع الوصول غير المصرح به وتقييد الوصول إلى ما هو مطلوب لإنجاز الأعمال المتعلقة بالجهة."
                info="Ensure the protection of cyber security for logical access to the information and technical assets of the entity in order to prevent unauthorized access and restrict access to what is required to complete the work related to the entity." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-2-2-1')
                    <x-main-control id="٢-٢-١"
                        details="Cybersecurity requirements for the management of access identities and authorities in the entity must be identified, documented and approved."
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لإدارة هويات الدخول والصلاحيات في الجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-2-2')
                    <x-main-control id="٢-٢-٢"
                        details="Cybersecurity requirements must be applied to manage access identities and authorities in the entity."
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني لإدارة هويات الدخول والصلاحيات في الجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-2-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-2-2-3-');
                    @endphp
                    <x-main-control id="٢-٢-٣"
                        details="يجب أن تغطي متطلبات الأمن السيبراني المتعلقة بإدارة هويات الدخول والصلاحيات في الجهة بحد أدنى ما يلي:"
                        details_ar="
The cybersecurity requirements related to the management of access identities and authorities in the entity must cover, at a minimum, the following:"
                        :control="$control" :status="$status" />

                    <x-sub-control id="٢-٢-٣-١"
                        details="User authentication based on user registration management and password management.
"
                        details_ar="التحقق من هوية المستخدم (User Authentication) بناءً على إدارة تسجيل المستخدم، وإدارة كلمة المرور."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-2-3-2')
                    <x-sub-control id="٢-٢-٣-٢" details="Multi-Factor Authentication
 for remote access operations."
                        details_ar="التحقق من الهوية متعدد العناصر (Multi-Factor Authentication)
 لعمليات الدخول عن بعد."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-2-3-3')
                    <x-sub-control id="٢-٢-٣-٣"
                        details="Manage user permissions and permissions (Authorization) based on the principles of access control and permissions (the principle of need to know and use
 Need-to-know and Need-to-use, Least Privilege and Segregation of Duties)."
                        details_ar="إدارة تصاريح وصلاحيات المستخدمين (Authorization) بناءً على مبادئ التحكم بالدخول والصلاحيات (مبدأ الحاجة إلى المعرفة والاستخدام
 Need-to-know and Need-to-use، ومبدأ الحد الأدنى من الصلاحيات والامتيازات “Least Privilege، ومبدأ فصل المهام Segregation of Duties)."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-2-3-4')
                    <x-sub-control id="٢-٢-٣-٤" details="Periodic review of entry identities and powers."
                        details_ar="المراجعة الدورية لهويات الدخول والصلاحيات." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-2-3-5')
                    <x-sub-control id="٢-٢-٣-٥" details="Periodic review of entry identities and powers."
                        details_ar="المراجعة الدورية لهويات الدخول والصلاحيات.
" :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-2-4')
                    <x-main-control id="٢-٢-٤"
                        details="The application of cybersecurity requirements for the management of access identities and authorities in the entity should be reviewed periodically."
                        details_ar="يجب مراجعة تطبيق متطلبات الأمن السيبراني لإدارة هويات الدخول والصلاحيات في الجهة دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain
                subdomain="حماية الأنظمة وأجهزة معالجة المعلومات  (Information System and Processing Facilities Protection)"
                id="٢-٣" theme="bg-teal" />

            <x-sub-domain-info
                info_ar="ضمان حماية الأنظمة وأجهزة معالجة المعلومات بما في ذلك أجهزة المستخدمين والبنى التحتية للجهة من المخاطر السيبرانية."
                info="Ensuring the protection of systems and information processing devices, including user devices and infrastructure, from cyber risks." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-2-3-1')
                    <x-main-control id="٢-٣-١"
                        details="
Cybersecurity requirements must be identified, documented and approved to protect the systems and information processing devices of the entity"
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لحماية الأنظمة وأجهزة معالجة المعلومات للجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-3-2')
                    <x-main-control id="٢-٣-٢"
                        details="Cybersecurity requirements must be applied to protect the systems and information processing devices of the entity.
"
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني لحماية الأنظمة وأجهزة معالجة المعلومات للجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-3-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-2-3-3-');
                    @endphp
                    <x-main-control id="٢-٣-٣"
                        details="The cybersecurity requirements for the protection of systems and information processing devices of the entity shall cover a minimum of the following:"
                        details_ar="يجب أن تغطي متطلبات الأمن السيبراني لحماية الأنظمة وأجهزة معالجة المعلومات للجهة بحد أدنى ما يلي:"
                        :control="$control" :status="$status" />

                    <x-sub-control id="٢-٣-٣-١"
                        details="Protect against viruses, programs, suspicious activities and malware (Malware) on users' devices and servers using modern and advanced protection technologies and mechanisms, and manage them securely."
                        details_ar="الحماية من الفيروسات والبرامج والأنشطة المشبوهة والبرمجيات الضارة (Malware) على أجهزة المستخدمين والخوادم باستخدام تقنيات وآليات الحماية الحديثة والمتقدمة، وإدارتها بشكل آمن."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-3-3-2')
                    <x-sub-control id="٢-٣-٣-٢"
                        details="Strictly restrict the use of external storage media devices and related security."
                        details_ar="التقييد الحازم لاستخدام أجهزة وسائط التخزين الخارجية والأمن المتعلق بها."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-3-3-3')
                    <x-sub-control id="٢-٣-٣-٣"
                        details="Manage update and repair packages for systems, applications, and devices 
(Patch Management)
.
"
                        details_ar="إدارة حزم التحديثات والإصلاحات للأنظمة والتطبيقات والأجهزة 
(Patch Management)."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-3-3-4')
                    <x-sub-control id="٢-٣-٣-٤"
                        details="Time synchronization (Clock Synchronization) is centralized and from an accurate and reliable source, one of these sources is provided by the Saudi Standards, Metrology and Quality Organization."
                        details_ar="مزامنة التوقيت (Clock Synchronization) مركزيًا ومن مصدر دقيق وموثوق، ومن هذه المصادر ما توفره الهيئة السعودية للمواصفات والمقاييس والجودة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-3-4')
                    <x-main-control id="٢-٣-٤"
                        details="The cybersecurity requirements to protect the systems and information processing devices of the entity must be reviewed periodically.
"
                        details_ar="يجب مراجعة متطلبات الأمن السيبراني لحماية الأنظمة وأجهزة معالجة المعلومات للجهة دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="حماية البريد الإلكتروني (Email Protection)" id="٢-٤" theme="bg-teal" />
            <x-sub-domain-info info_ar="ضمان حماية البريد الإلكتروني للجهة من المخاطر السيبرانية."
                info="Ensure the protection of the entity's e-mail from cyber risks." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-2-4-1')
                    <x-main-control id="٢-٤-١"
                        details="Cybersecurity requirements to protect the entity's email must be identified, documented and approved."
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لحماية البريد الإلكتروني للجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-4-2')
                    <x-main-control id="٢-٤-٢"
                        details="Cybersecurity requirements must be applied to protect the entity's email."
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني لحماية البريد الإلكتروني للجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-4-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-2-4-3-');
                    @endphp
                    <x-main-control id="٢-٤-٣"
                        details="Cybersecurity requirements must be applied to protect the entity's email."
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني لحماية البريد الإلكتروني للجهة." :control="$control"
                        :status="$status" />

                    <x-sub-control id="١-٣-٤-٢"
                        details="Analyze and filter emails (especially Phishing Emails and Spam Emails) using modern and advanced email protection techniques and mechanisms.
"
                        details_ar="تحليل وتصفية (Filtering) رسائل البريد الإلكتروني (وخصوصًا رسائل التصيّد الإلكتروني Phishing Emails والرسائل الاقتحامية Spam Emails) باستخدام تقنيات وآليات الحماية الحديثة والمتقدمة للبريد الإلكتروني."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-4-3-2')
                    <x-sub-control id="٢-٣-٤-٢"
                        details="Multi-Factor Authentication for remote access and access via the Webmail page."
                        details_ar="التحقق من الهوية متعدد العناصر (Multi-Factor Authentication) للدخول عن بعد والدخول عن طريق صفحة موقع البريد الإلكتروني (Webmail)."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-4-3-3')
                    <x-sub-control id="٣-٣-٤-٢" details="Email backup and archiving."
                        details_ar="النسخ الاحتياطي والأرشفة للبريد الإلكتروني." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-4-3-4')
                    <x-sub-control id="٤-٣-٤-٢"
                        details="Advanced Persistent Threat Protection (apt Protection), which typically uses viruses and previously unknown malware (Zero-Day Malware), is securely managed."
                        details_ar="الحماية من التهديدات المتقدمة المستمرة (APT Protection)، التي تستخدم عادة الفيروسات والبرمجيات الضارة غير المعروفة مسبقاً (Zero-Day Malware)، وإدارتها بشكل آمن."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-4-3-5')
                    <x-sub-control id="٥-٣-٤-٢"
                        details="
Documenting the entity's email domain by technical methods, such as the Sender Policy Framework method."
                        details_ar="توثيق مجال البريد الإلكتروني للجهة بالطرق التقنية، مثل طريقة إطار سياسة المرسل (Sender Policy Framework). "
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-4-4')
                    <x-main-control id="٢-٤-٤"
                        details="The application of the cybersecurity requirements for the protection of the entity's e-mail must be reviewed periodically."
                        details_ar="يجب مراجعة تطبيق متطلبات الأمن السيبراني الخاصة بحماية البريد الإلكتروني للجهة دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="إدارة أمن الشبكات (Networks Security Management)" id="٢-٥" theme="bg-teal" />
            <x-sub-domain-info info_ar="Ensure the protection of the entity's networks from cyber risks.	"
                info="ضمان حماية شبكات الجهة من المخاطر السيبرانية." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-2-5-1')
                    <x-main-control id="٢-٥-١"
                        details="Cybersecurity requirements for managing the security of the entity's networks must be identified, documented and approved."
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لإدارة أمن شبكات الجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-5-2')
                    <x-main-control id="٢-٥-٢"
                        details="Cybersecurity requirements must be applied to manage the security of the entity's networks."
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني لإدارة أمن شبكات الجهة." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-5-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-2-5-3-');
                    @endphp
                    <x-main-control id="٢-٥-٣"
                        details="The cybersecurity requirements for managing the security of the entity's networks
        should cover, at a minimum, the following:"
                        details_ar="يجب أن تغطي متطلبات الأمن السيبراني لإدارة أمن شبكات الجهة بحد أدنى ما يلي:  "
                        :control="$control" :status="$status" />
                    <x-sub-control id="١-٣-٥-٢"
                        details="Securely isolate and physically or logically divide network parts, necessary to control related cybersecurity risks, using Firewall and Defense-in-Depth."
                        details_ar="العزل والتقسیم المادي أو المنطقي لأجزاء الشبكات بشكل آمن، واللازم للسیطرة على مخاطر الأمن السیبراني ذات العلاقة، باستخدام جدار الحماية (Firewall) ومبدأ الدفاع الأمني متعدد المراحل (Defense-in-Depth)."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-5-3-2')
                    <x-sub-control id="٢-٣-٥-٢"
                        details="Isolate the production environment network from the development and testing environments networks."
                        details_ar="عزل شبكة بيئة الإنتاج عن شبكات بيئات التطوير والاختبار." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-5-3-3')
                    <x-sub-control id="٣-٣-٥-٢"
                        details="Security of browsing and internet connection, including strict restriction of suspicious websites, file sharing and storage sites, and remote access sites."
                        details_ar="أمن التصفح والاتصال بالإنترنت، ویشمل ذلك التقیید الحازم للمواقع الالكترونیة المشبوھة، ومواقع مشاركة وتخزین الملفات، ومواقع الدخول عن بعد."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-5-3-4')
                    <x-sub-control id="٤-٣-٥-٢"
                        details="Security and protection of wireless networks using secure means to verify identity and encryption, and not to connect wireless networks to the internal network only based on an integrated study of the risks resulting therefrom and dealing with them to ensure the protection of the technical assets of the entity."
                        details_ar="أمن الشبكات اللاسلكیة وحمایتھا باستخدام وسائل آمنة للتحقق من الھویة والتشفیر، وعدم ربط الشبكات اللاسلكیة بشبكة الجھة الداخلیة إلا بناءً على دراسة متكاملة للمخاطر المترتبة على ذلك والتعامل معھا بما یضمن حمایة الأصول التقنیة للجھة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-5-3-5')
                    <x-sub-control id="٥-٣-٥-٢"
                        details="Restrictions and management of network ports, protocols and services."
                        details_ar="قيود وإدارة منافذ وبروتوكولات وخدمات الشبكة." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-5-3-6')
                    <x-sub-control id="٦-٣-٥-٢"
                        details="Advanced protection systems to detect and prevent intrusions (Intrusion Prevention Systems)."
                        details_ar="أنظمة الحماية المتقدمة لاكتشاف ومنع الاختراقات (Intrusion Prevention Systems)."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-5-3-7')
                    <x-sub-control id="٧-٣-٥-٢" details="Domain Name System (DNS) security.
"
                        details_ar="أمن نظام أسماء النطاقات (DNS). " :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-5-3-8')
                    <x-sub-control id="٨-٣-٥-٢"
                        details="Protect your Internet browsing channel from advanced persistent threats (apt Protection), which typically uses viruses and previously unknown malware (Zero-Day Malware), and manage it securely."
                        details_ar="حماية قناة تصفح الإنترنت من التهديدات المتقدمة المستمرة (APT Protection)، التي تستخدم عادة الفيروسات والبرمجيات الضارة غير المعروفة مسبقاً (Zero-Day Malware)، وإدارتها بشكل آمن."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-5-4')
                    <x-main-control id="٢-٥-٤"
                        details="The application of cybersecurity requirements to manage the security of the entity's networks must be reviewed periodically."
                        details_ar="يجب مراجعة تطبيق متطلبات الأمن السيبراني لإدارة أمن شبكات الجهة دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="أمن الأجهزة المحمولة (Mobile Devices Security) " id="٢-٦" theme="bg-teal" />
            <x-sub-domain-info
                info_ar="ضمان حماية أجهزة الجهة المحمولة (بما في ذلك أجهزة الحاسب المحمول والهواتف الذكية والأجهزة الذكية اللوحية) من المخاطر السيبرانية. وضمان التعامل بشكل آمن مع المعلومات الحساسة والمعلومات الخاصة بأعمال الجهة وحمايتها أثناء النقل والتخزين عند استخدام الأجهزة الشخصية للعاملين في الجهة (مبدأ BYOD)."
                info="Ensure the protection of the party's mobile devices (including laptops, smart phones and smart tablets) from cyber risks. Ensuring secure handling of sensitive information and information related to the entity’s business and protecting it during transportation and storage when using the personal devices of the entity’s employees (the “BYOD” principle).		" />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-2-6-1')
                    <x-main-control id="٢-٦-١"
                        details="Cybersecurity requirements for the security of mobile devices and personnel personal devices (BYOD) must be identified, documented and approved when linked to the entity's network."
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني الخاصة بأمن الأجهزة المحمولة والأجهزة الشخصية للعاملين (BYOD) عند ارتباطها بشبكة الجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-6-2')
                    <x-main-control id="٢-٦-٢"
                        details="The entity's mobile and BYOD security cybersecurity requirements must be applied."
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني الخاصة بأمن الأجهزة المحمولة وأجهزة (BYOD) للجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-6-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-2-6-3-');
                    @endphp
                    <x-main-control id="٢-٦-٣"
                        details="The entity's mobile and BYOD security cybersecurity requirements should cover, at a minimum, the following:"
                        details_ar="يجب أن تغطي متطلبات الأمن السيبراني الخاصة بأمن الأجهزة المحمولة وأجهزة (BYOD) للجهة بحد أدنى ما يلي:"
                        :control="$control" :status="$status" />
                    <x-sub-control id="١-٣-٦-٢"
                        details="Segregation and encryption of data and information (of the entity) stored on mobile devices and devices (BYOD)."
                        details_ar="فصل وتشفیر البیانات والمعلومات (الخاصة بالجھة) المخزنة على الأجھزة المحمولة وأجھزة (BYOD)."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-6-3-2')
                    <x-sub-control id="٢-٣-٦-٢"
                        details="Specific and restricted use based on what is required by the entity's business interest."
                        details_ar="الاستخدام المحدد والمقيد بناءً على ما تتطلبه مصلحة أعمال الجهة." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-6-3-3')
                    <x-sub-control id="٣-٣-٦-٢"
                        details="Delete data and information (of the entity) stored on mobile devices and devices (BYOD) when the devices are lost or after the end/termination of the functional relationship with the entity."
                        details_ar="حذف البيانات والمعلومات (الخاصة بالجهة) المخزنة على الأجهزة المحمولة وأجهزة (BYOD) عند فقدان الأجهزة أو بعد انتهاء/إنهاء العلاقة الوظيفية مع الجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-6-3-4')
                    <x-sub-control id="٤-٣-٦-٢" details="G. Users Security Awareness"
                        details_ar="التوعية الأمنية للمستخدمين." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-6-4')
                    <x-main-control id="٢-٦-٤"
                        details="The application of the entity's specific mobile and BYOD security cybersecurity requirements should be reviewed periodically."
                        details_ar="يجب مراجعة تطبيق متطلبات الأمن السيبراني الخاصة لأمن الأجهزة المحمولة وأجهزة (BYOD) للجهة دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="حماية البيانات والمعلومات (Data and Information Protection)" id="٢-٧"
                theme="bg-teal" />
            <x-sub-domain-info
                info_ar="ضمان حماية السرية وسلامة بيانات ومعلومات الجهة ودقتها وتوافرها، وذلك وفقًا للسياسات والإجراءات التنظيمية للجهة، والمتطلبات التشريعية والتنظيمية ذات العلاقة."
                info="Ensure the protection of confidentiality and the integrity, accuracy and availability of the entity's data and information, in accordance with the entity's regulatory policies and procedures, and the relevant legislative and regulatory requirements.	" />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-2-7-1')
                    <x-main-control id="٢-٧-١"
                        details="Cybersecurity requirements to protect the entity's data and information must be identified, documented and approved, and handled in accordance with relevant legislative and regulatory requirements."
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لحماية بيانات ومعلومات الجهة، والتعامل معها وفقًا للمتطلبات التشريعية والتنظيمية ذات العلاقة. "
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-7-2')
                    <x-main-control id="٢-٧-٢"
                        details="Cybersecurity requirements must be applied to protect the entity's data and information."
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني لحماية بيانات ومعلومات الجهة." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-7-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-2-7-3-');
                    @endphp

                    <x-main-control id="٢-٧-٣"
                        details="The cybersecurity requirements for data and information protection should cover at a minimum the following:"
                        details_ar="يجب أن تغطي متطلبات الأمن السيبراني لحماية البيانات والمعلومات بحد أدنى ما يلي:"
                        :control="$control" :status="$status" />

                    <x-sub-control id="١-٣-٧-٢" details="Ownership of data and information."
                        details_ar="ملكية البيانات والمعلومات." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-7-3-2')
                    <x-sub-control id="٢-٣-٧-٢" details="Classification and Labeling Mechanisms."
                        details_ar="تصنيف البيانات والمعلومات وآلية ترميزها (Classification and Labeling Mechanisms)."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-7-3-3')
                    <x-sub-control id="٣-٣-٧-٢" details="Data and information privacy."
                        details_ar="خصوصية البيانات والمعلومات." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-7-4')
                    <x-main-control id="٢-٧-٤"
                        details="The application of cybersecurity requirements to protect the entity's data and information must be reviewed periodically."
                        details_ar="يجب مراجعة تطبيق متطلبات الأمن السيبراني لحماية بيانات ومعلومات الجهة دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="التشفير (Cryptography)" id="٢-٨" theme="bg-teal" />
            <x-sub-domain-info
                info_ar="ضمان الاستخدام السليم والفعال للتشفير لحماية الأصول المعلوماتية الإلكترونية للجهة، وذلك وفقًا للسياسات والإجراءات التنظيمية للجهة، والمتطلبات التشريعية والتنظيمية ذات العلاقة."
                info="Ensuring the proper and effective use of encryption to protect the entity's electronic information assets, in accordance with the entity's regulatory policies and procedures, and the relevant legislative and regulatory requirements." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-2-8-1')
                    <x-main-control id="٢-٨-١"
                        details="Cybersecurity requirements for encryption must be identified, documented and approved in the entity.
"
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني للتشفير في الجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-8-2')
                    <x-main-control id="٢-٨-٢"
                        details="Cybersecurity requirements for encryption must be applied in the entity."
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني للتشفير في الجهة." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-8-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-2-8-3-');
                    @endphp

                    <x-main-control id="٢-٨-٣"
                        details="The cybersecurity requirements for encryption should cover at a minimum the following:"
                        details_ar="يجب أن تغطي متطلبات الأمن السيبراني للتشفير بحد أدنى ما يلي:" :control="$control"
                        :status="$status" />

                    <x-sub-control id="١-٣-٨-٢"
                        details="The standards of the approved encryption solutions and the restrictions applied to them (technically and organizationally)."
                        details_ar="معايير حلول التشفير المعتمدة والقيود المطبقة عليها (تقنيًا وتنظيميًا)."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-8-3-2')
                    <x-sub-control id="٢-٣-٨-٢"
                        details="Secure management of encryption keys during their lifecycle operations."
                        details_ar="الإدارة الآمنة لمفاتيح التشفير خلال عمليات دورة حياتها." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-8-3-3')
                    <x-sub-control id="٣-٣-٨-٢"
                        details="Encrypting data during transportation and storage based on its classification and according to the relevant legislative and regulatory requirements."
                        details_ar="تشفير البيانات أثناء النقل والتخزين بناء على تصنيفها وحسب المتطلبات التشريعية والتنظيمية ذات العلاقة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-8-4')
                    <x-main-control id="٢-٨-٤"
                        details="The application of cybersecurity requirements for encryption in the entity should be reviewed periodically."
                        details_ar="يجب مراجعة تطبيق متطلبات الأمن السيبراني للتشفير في الجهة دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="إدارة النسخ الاحتياطية (Backup and Recovery Management)" id="٢-٩"
                theme="bg-teal" />
            <x-sub-domain-info
                info_ar="ضمان حماية بيانات ومعلومات الجهة والإعدادات التقنية للأنظمة والتطبيقات الخاصة بالجهة من الأضرار الناجمة عن المخاطر السيبرانية، وذلك وفقًا للسياسات والإجراءات التنظيمية للجهة، والمتطلبات التشريعية والتنظيمية ذات العلاقة. "
                info="Ensure the protection of the entity's data and information and the technical settings of the entity's systems and applications from damages resulting from cyber risks, in accordance with the entity's regulatory policies and procedures, and the relevant legislative and regulatory requirements." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-2-9-1')
                    <x-main-control id="٢-٩-١"
                        details="Cybersecurity requirements for entity backup management must be identified, documented and approved.
"
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لإدارة النسخ الاحتياطية للجهة.
"
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-9-2')
                    <x-main-control id="٢-٩-٢"
                        details="Cybersecurity requirements must be applied to manage the entity's backups."
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني لإدارة النسخ الاحتياطية للجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-9-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-2-9-3-');
                    @endphp
                    <x-main-control id="٢-٩-٣"
                        details="The cybersecurity requirements for backup management should cover at a minimum the following:"
                        details_ar="يجب أن تغطي متطلبات الأمن السيبراني لإدارة النسخ الاحتياطية بحد أدنى ما يلي:"
                        :control="$control" :status="$status" />

                    <x-sub-control id="١-٣-٩-٢"
                        details="Scope and comprehensiveness of backups of sensitive information and technical assets."
                        details_ar="نطاق النسخ الاحتياطية وشموليتها للأصول المعلوماتية والتقنية الحساسة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-9-3-2')
                    <x-sub-control id="٢-٣-٩-٢"
                        details="Rapid ability to recover data and systems after exposure to cybersecurity incidents."
                        details_ar="القدرة السريعة على استعادة البيانات والأنظمة بعد التعرض لحوادث الأمن السيبراني."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-9-3-3')
                    <x-sub-control id="٣-٣-٩-٢"
                        details="Performing a periodic check on the effectiveness of backup recovery. "
                        details_ar="إجراء فحص دوري لمدى فعالية استعادة النسخ الاحتياطية." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-9-4')
                    <x-main-control id="٢-٩-٤"
                        details="The application of cybersecurity requirements should be reviewed to manage the entity's backups."
                        details_ar="يجب مراجعة تطبيق متطلبات الأمن السيبراني لإدارة النسخ الإحتياطية للجهة."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="إدارة الثغرات (Vulnerabilities Management)" id="٢-١٠" theme="bg-teal" />
            <x-sub-domain-info
                info_ar="ضمان اكتشاف الثغرات التقنية في الوقت المناسب ومعالجتها بشكل فعال، وذلك لمنع أو تقليل احتمالية استغلال هذه الثغرات من قبل الهجمات السيبرانية وتقليل الآثار المترتبة على أعمال الجهة."
                info="Ensure that technical vulnerabilities are discovered in a timely manner and addressed effectively, in order to prevent or reduce the possibility of exploiting these vulnerabilities by cyber attacks and reduce the effects on the entity's business.		" />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-2-10-1')
                    <x-main-control id="٢-١٠-١"
                        details="Cybersecurity requirements must be identified, documented and approved to manage the entity's technical vulnerabilities."
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لإدارة الثغرات التقنية للجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-10-2')
                    <x-main-control id="٢-١٠-٢"
                        details="Cybersecurity requirements must be applied to manage the entity's technical vulnerabilities."
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني لإدارة الثغرات التقنية للجهة." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-10-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-2-10-3-');
                    @endphp
                    <x-main-control id="٢-١٠-٣"
                        details="Cybersecurity requirements for vulnerability management should cover at a minimum the following:
"
                        details_ar="يجب أن تغطي متطلبات الأمن السيبراني لإدارة الثغرات بحد أدنى ما يلي:"
                        :control="$control" :status="$status" />

                    <x-sub-control id="١-٣-١٠-٢" details="Check and detect gaps periodically."
                        details_ar="فحص واكتشاف الثغرات دوريًا." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-10-3-2')
                    <x-sub-control id="٢-٣-١٠-٢" details="Classification of gaps according to their severity."
                        details_ar="تصنيف الثغرات حسب خطورتها." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-10-3-3')
                    <x-sub-control id="٣-٣-١٠-٢"
                        details="Address gaps based on their classification and the cyber risks involved."
                        details_ar="معالجة الثغرات بناءً على تصنيفها والمخاطر السيبرانية المترتبة عليها."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-10-3-4')
                    <x-sub-control id="٤-٣-١٠-٢"
                        details="Manage update packages and security fixes to address vulnerabilities."
                        details_ar="إدارة حزم التحديثات والإصلاحات الأمنية لمعالجة الثغرات." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-10-3-5')
                    <x-sub-control id="٥-٣-١٠-٢"
                        details="Communicate and engage with trusted sources regarding alerts regarding new and updated vulnerabilities."
                        details_ar="التواصل والاشتراك مع مصادر موثوقة فيما يتعلق بالتنبيهات المتعلقة بالثغرات الجديدة والمحدثة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-10-4')
                    <x-main-control id="٢-١٠-٤"
                        details="The application of cybersecurity requirements to manage the entity's technical vulnerabilities should be reviewed periodically."
                        details_ar="يجب مراجعة تطبيق متطلبات الأمن السيبراني لإدارة الثغرات التقنية للجهة دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="اختبار الاختراق (Penetration Testing)" id="٢-١١" theme="bg-teal" />
            <x-sub-domain-info
                info_ar="تقييم واختبار مدى فعالية قدرات تعزيز الأمن السيبراني في الجهة، وذلك من خلال عمل محاكاة لتقنيات وأساليب الهجوم السيبراني الفعلية. ولاكتشاف نقاط الضعف الأمنية غير المعروفة والتي قد تؤدي إلى الاختراق السيبراني للجهة.  وذلك وفقًا للمتطلبات التشريعية والتنظيمية ذات العلاقة."
                info="Evaluate and test the effectiveness of the entity's cyber security enhancement capabilities, by simulating actual cyber attack techniques and methods. And to discover unknown security vulnerabilities that may lead to cyber penetration of the entity. This is in accordance with the relevant legislative and regulatory requirements." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-2-11-1')
                    <x-main-control id="٢-١١-١
"
                        details="Cybersecurity requirements for the Entity's penetration testing operations shall be identified, documented and approved."
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لعمليات اختبار الاختراق في الجهة.
"
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-11-2')
                    <x-main-control id="٢-١١-٢"
                        details="Penetration testing operations shall be carried out at the entity."
                        details_ar="يجب تنفيذ عمليات اختبار الاختراق في الجهة.

" :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-11-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-2-11-3-');
                    @endphp
                    <x-main-control id="٢-١١-٣"
                        details="The cybersecurity requirements for penetration testing shall cover a minimum of the following:"
                        details_ar="يجب أن تغطي متطلبات الأمن السيبراني لاختبار الاختراق بحد أدنى ما يلي:

"
                        :control="$control" :status="$status" />
                    <x-sub-control id="١-٣-١١-٢"
                        details="The scope of work of penetration testing, to include all services provided externally (through the Internet) and its technical components, including: infrastructure, websites, web applications, smartphone and tablet applications, e-mail and remote access."
                        details_ar="نطاق عمل اختبار الاختراق، ليشمل جميع الخدمات المقدمة خارجياً (عن طريق الإنترنت) ومكوناتها التقنية، ومنها: البنية التحتية، المواقع الالكترونية، تطبيقات الويب، تطبيقات الهواتف الذكية واللوحية، البريد الاكتروني والدخول عن بعد.

"
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-11-3-2')
                    <x-sub-control id="٢-٣-١١-٢" details="Perform penetration testing periodically."
                        details_ar="عمل اختبار الاختراق دوريًا." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-11-4')
                    <x-main-control id="٢-١١-٤"
                        details="The application of cybersecurity requirements for penetration testing operations in the entity should be reviewed periodically."
                        details_ar="يجب مراجعة تطبيق متطلبات الأمن السيبراني لعمليات اختبار الاختراق في الجهة دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain
                subdomain="إدارة سجلات الأحداث ومراقبة الأمن السيبراني (Cybersecurity Event Logs and Monitoring Management)"
                id="٢-١٢" theme="bg-teal" />
            <x-sub-domain-info
                info_ar="ضمان تجميع وتحليل ومراقبة سجلات أحداث الأمن السيبراني في الوقت المناسب من أجل الاكتشاف الاستباقي للهجمات السيبرانية وإدارة مخاطرها بفعالية لمنع أو تقليل الآثار المترتبة على أعمال الجهة."
                info="Ensure the timely collection, analysis and monitoring of cyber security event logs in order to proactively detect cyber attacks and effectively manage their risks to prevent or reduce the impacts on the entity's business." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-2-12-1')
                    <x-main-control id="٢-١٢-١"
                        details="Requirements for managing event logs and monitoring the cybersecurity of the entity shall be identified, documented and approved."
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات إدارة سجلات الأحداث ومراقبة الأمن السيبراني للجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-12-2')
                    <x-main-control id="٢-١٢-٢"
                        details="The requirements for managing event logs and monitoring the cybersecurity of the entity must be applied."
                        details_ar="يجب تطبيق متطلبات إدارة سجلات الأحداث ومراقبة الأمن السيبراني للجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-12-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-2-12-3-');
                    @endphp
                    <x-main-control id="٢-١٢-٣"
                        details="Requirements for event log management and cybersecurity monitoring should cover at a minimum the following:"
                        details_ar="يجب أن تغطي متطلبات إدارة سجلات الأحداث ومراقبة الأمن السيبراني بحد أدنى ما يلي:"
                        :control="$control" :status="$status" />
                    <x-sub-control id="١-٣-١٢-٢"
                        details="Activate event logs for cybersecurity on the entity's sensitive information assets."
                        details_ar="تفعيل سجلات الأحداث (Event logs) الخاصة بالأمن السيبراني على الأصول المعلوماتية الحساسة لدى الجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-12-3-2')
                    <x-sub-control id="٢-٣-١٢-٢"
                        details="Activate event logs for accounts with important and sensitive powers over information assets and remote access events at the entity."
                        details_ar="تفعيل سجلات الأحداث الخاصة بالحسابات ذات الصلاحيات الهامة والحساسة على الأصول المعلوماتية وأحداث عمليات الدخول عن بعد لدى الجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-12-3-3')
                    <x-sub-control id="٣-٣-١٢-٢"
                        details="Identify the techniques needed (Siem) to collect cybersecurity event logs."
                        details_ar="تحديد التقنيات اللازمة (SIEM) لجمع سجلات الأحداث الخاصة بالأمن السيبراني. "
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-12-3-4')
                    <x-sub-control id="٤-٣-١٢-٢" details="Ongoing monitoring of cybersecurity event logs."
                        details_ar="المراقبة المستمرة لسجلات الأحداث الخاصة بالأمن السيبراني." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-12-3-5')
                    <x-sub-control id="٥-٣-١٢-٢"
                        details="The duration of keeping records of events related to cybersecurity (not less than 12 months)."
                        details_ar="مدة الاحتفاظ بسجلات الأحداث الخاصة بالأمن السيبراني (على ألا تقل عن 12 شهر).
"
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-12-4')
                    <x-main-control id="٢-١٢-٤"
                        details="The application of the requirements for managing event logs and monitoring cybersecurity in the entity should be reviewed periodically."
                        details_ar="يجب مراجعة تطبيق متطلبات إدارة سجلات الأحداث ومراقبة الأمن السيبراني في الجهة دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="إدارة حوادث وتهديدات الأمن السيبراني (Cybersecurity Incident and Threat Management)"
                id="٢-١٣" theme="bg-teal" />
            <x-sub-domain-info
                info_ar="ضمان تحديد واكتشاف حوادث الأمن السيبراني في الوقت المناسب وإدارتها بشكل فعّال والتعامل مع تهديدات الأمن السيبراني استباقياً من أجل منع أو تقليل الآثار المترتبة على أعمال الجهة. مع مراعاة ما ورد في الأمر السامي الكريم رقم ٣٧١٤٠ وتاريخ ١٤ / ٨ / ١٤٣٨ هـ."
                info="Ensure timely identification and detection of cyber security incidents, manage them effectively and deal with cyber security threats proactively in order to prevent or reduce the impacts on the entity's business. Taking into consideration what was stated in the Noble Royal Decree No. 37140 dated 8/14/1438 AH." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-2-13-1')
                    <x-main-control id="٢-١٣-١"
                        details="The requirements for managing cybersecurity incidents and threats in the entity must be identified, documented and approved."
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات إدارة حوادث وتهديدات الأمن السيبراني في الجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-13-2')
                    <x-main-control id="٢-١٣-٢"
                        details="Cybersecurity incident and threat management requirements must be applied in the entity."
                        details_ar="يجب تطبيق متطلبات إدارة حوادث وتهديدات الأمن السيبراني في الجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-13-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-2-13-3-');
                    @endphp
                    <x-main-control id="٢-١٣-٣"
                        details="The requirements for managing cybersecurity incidents and threats should cover at a minimum the following:"
                        details_ar="يجب أن تغطي متطلبات إدارة حوادث وتهديدات الأمن السيبراني بحد أدنى ما يلي:"
                        :control="$control" :status="$status" />
                    <x-sub-control id="١-٣-١٣-٢"
                        details="Develop response plans for security incidents and escalation mechanisms."
                        details_ar="وضع خطط الاستجابة للحوادث الأمنية وآليات التصعيد." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-13-3-2')
                    <x-sub-control id="٢-٣-١٣-٢" details="Classification of cybersecurity incidents."
                        details_ar="تصنيف حوادث الأمن السيبراني." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-13-3-3')
                    <x-sub-control id="٣-٣-١٣-٢" details="Notify the Authority when a cybersecurity incident occurs."
                        details_ar="تبليغ الهيئة عند حدوث حادثة أمن سيبراني." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-13-3-4')
                    <x-sub-control id="٤-٣-١٣-٢
"
                        details="Sharing alerts, proactive information, penetration indicators and cybersecurity incident reports with the Authority."
                        details_ar="مشاركة التنبيهات والمعلومات الاستباقية ومؤشرات الاختراق وتقارير حوادث الأمن السيبراني مع الهيئة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-13-3-5')
                    <x-sub-control id="٥-٣-١٣-٢"
                        details="Access to proactive information
 (Threat Intelligence)
and dealing with it."
                        details_ar="الحصول على المعلومات الاستباقية
 (Threat Intelligence) والتعامل معها."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-13-4')
                    <x-main-control id="٢-١٣-٤"
                        details="The application of cybersecurity incident and threat management requirements in the entity should be reviewed periodically."
                        details_ar="يجب مراجعة تطبيق متطلبات إدارة حوادث وتهديدات الأمن السيبراني في الجهة دوريًا.

"
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="الأمن المادي (Physical Security)" id="٢-١٤" theme="bg-teal" />
            <x-sub-domain-info
                info_ar="ضمان حماية الأصول المعلوماتية والتقنية للجهة من الوصول المادي غير المصرح به والفقدان والسرقة والتخريب."
                info="Ensuring the protection of the information and technical assets of the entity from unauthorized physical access, loss, theft and vandalism" />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-2-14-1')
                    <x-main-control id="٢-١٤-١"
                        details="Cybersecurity requirements must be identified, documented and approved to protect the information and technical assets of the entity from unauthorized physical access, loss, theft and sabotage."
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لحماية الأصول المعلوماتية والتقنية للجهة من الوصول المادي غير المصرح به والفقدان والسرقة والتخريب.
"
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-14-2')
                    <x-main-control id="٢-١٤-٢"
                        details="Cybersecurity requirements must be applied to protect the information and technical assets of the entity from unauthorized physical access, loss, theft and sabotage."
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني لحماية الأصول المعلوماتية والتقنية للجهة من الوصول المادي غير المصرح به والفقدان والسرقة والتخريب."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-14-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-2-14-3-');
                    @endphp
                    <x-main-control id="٢-١٤-٣"
                        details="The cybersecurity requirements to protect the information and technical assets of the entity from unauthorized physical access, loss, theft and sabotage shall cover a minimum of the following:
"
                        details_ar="يجب أن تغطي متطلبات الأمن السيبراني لحماية الأصول المعلوماتية والتقنية للجهة من الوصول المادي غير المصرح به والفقدان والسرقة والتخريب بحد أدنى ما يلي: 
"
                        :control="$control" :status="$status" />
                    <x-sub-control id="١-٣-١٤-٢"
                        details="Authorized access to sensitive areas in the entity (such as: the entity's data center, disaster recovery center, sensitive information processing areas, security control center, network communications rooms, supply areas for technical devices and equipment, etc.)."
                        details_ar="الدخول المصرح به للأماكن الحساسة في الجهة (مثل: مركز بيانات الجهة، مركز التعافي من الكوارث، أماكن معالجة المعلومات الحساسة، مركز المراقبة الأمنية، غرف اتصالات الشبكة، مناطق الإمداد الخاصة بالأجهزة والعتاد التقنية، وغيرها).

"
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-14-3-2')
                    <x-sub-control id="٢-٣-١٤-٢" details="Logs of Access and Surveillance (CCTV)."
                        details_ar="سجلات الدخول والمراقبة (CCTV)." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-14-3-3')
                    <x-sub-control id="٣-٣-١٤-٢" details="Protect access logs and monitoring information."
                        details_ar="حماية معلومات سجلات الدخول والمراقبة." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-14-3-4')
                    <x-sub-control id="٤-٣-١٤-٢"
                        details="Secure the destruction and reuse of physical assets containing classified information (including: paper documents, storage and storage media)."
                        details_ar="أمن إتلاف وإعادة استخدام الأصول المادية التي تحوي معلومات مصنفة (وتشمل: الوثائق الورقية ووسائط الحفظ والتخزين).

"
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-14-3-5')
                    <x-sub-control id="٥-٣-١٤-٢"
                        details="Security of devices and equipment inside and outside the premises of the entity."
                        details_ar="أمن الأجهزة والمعدات داخل مباني الجهة وخارجها." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-2-14-4')
                    <x-main-control id="٢-١٤-٤"
                        details="The cybersecurity requirements to protect the information and technical assets of the entity from unauthorized physical access, loss, theft and sabotage must be reviewed periodically."
                        details_ar="يجب مراجعة متطلبات الأمن السيبراني لحماية الأصول المعلوماتية والتقنية للجهة من الوصول المادي غير المصرح به والفقدان والسرقة والتخريب دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-sub-domain subdomain="حماية تطبيقات الويب (Web Application Security)" id="٢-١٥" theme="bg-teal" />
            <x-sub-domain-info info_ar="ضمان حماية تطبيقات الويب الخارجية للجهة من المخاطر السيبرانية. "
                info="Ensure the protection of external web applications of the entity from cyber risks." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-2-15-1')
                    <x-main-control id="٢-١٥-١"
                        details="Cybersecurity requirements must be identified, documented and approved to protect the entity's external web applications from cyber risks.
"
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لحماية تطبيقات الويب الخارجية للجهة من المخاطر السيبرانية. 
"
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-15-2')
                    <x-main-control id="٢-١٥-٢"
                        details="Cybersecurity requirements must be applied to protect the entity's external web applications."
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني لحماية تطبيقات الويب الخارجية للجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-15-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-2-15-3-');
                    @endphp
                    <x-main-control id="٢-١٥-٣"
                        details="The cybersecurity requirements for the protection of external web applications of the entity shall cover a minimum of the following:"
                        details_ar="يجب أن تغطي متطلبات الأمن السيبراني لحماية تطبيقات الويب الخارجية للجهة بحد أدنى ما يلي: "
                        :control="$control" :status="$status" />
                    <x-sub-control id="١-٣-١٥-٢"
                        details="Use a firewall for web applications (Web Application Firewall)."
                        details_ar="استخدام جدار الحماية لتطبيقات الويب (Web Application Firewall)." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-15-3-2')
                    <x-sub-control id="٢-٣-١٥-٢"
                        details="The use of the principle of multilevel architecture (Multi-tier Architecture)."
                        details_ar="استخدام مبدأ المعمارية متعددة المستويات (Multi-tier Architecture)."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-15-3-3')
                    <x-sub-control id="٣-٣-١٥-٢" details="Use secure protocols (such as HTTPS)."
                        details_ar="استخدام بروتوكولات آمنة (مثل بروتوكول HTTPS" :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-15-3-4')
                    <x-sub-control id="٤-٣-١٥-٢" details="Clarify the safe use policy for users"
                        details_ar="توضيح سياسة الاستخدام الآمن للمستخدمين." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-15-3-5')
                    <x-sub-control id="٥-٣-١٥-٢" details="Multi-Factor Authentication for user logins."
                        details_ar="التحقق من الهوية متعدد العناصر (Multi-Factor Authentication) لعمليات دخول المستخدمين.

"
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-2-15-4')
                    <x-main-control id="٢-١٥-٤"
                        details="Cybersecurity requirements to protect the entity's web applications from cyber risks should be reviewed periodically."
                        details_ar="يجب مراجعة متطلبات الأمن السيبراني لحماية تطبيقات الويب للجهة من المخاطر السيبرانية دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-main-domain domain="٣- صمود الأمن السيبراني (Cybersecurity Resilience)" theme="bg-dark" />
            <x-sub-domain subdomain="جوانب صمود الأمن السيبراني في إدارة استمرارية الأعمال" id="٣-١"
                theme="bg-dark" />
            <x-sub-domain-info info_ar="جوانب صمود الأمن السيبراني في إدارة استمرارية الأعمال"
                info="(Cybersecurity Resilience aspects of Business Continuity Management  - BCM)" />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-3-1-1')
                    <x-main-control id="٣-١-١"
                        details="Cybersecurity requirements must be identified, documented and approved within the entity's business continuity management."
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني ضمن إدارة استمرارية أعمال الجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-3-1-2')
                    <x-main-control id="٣-١-٢"
                        details="Cybersecurity requirements must be applied within the entity's business continuity management."
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني ضمن إدارة استمرارية أعمال الجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-3-1-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-3-1-3-');
                    @endphp
                    <x-main-control id="٣-١-٣" details="The entity's BCM should cover at a minimum the following:"
                        details_ar="يجب أن تغطي إدارة استمرارية الأعمال في الجهة بحد أدنى ما يلي: " :control="$control"
                        :status="$status" />

                    <x-sub-control id="١-٣-١-٣"
                        details="Ensuring the continuity of systems and procedures related to cybersecurity."
                        details_ar="التأكد من استمرارية الأنظمة والإجراءات المتعلقة بالأمن السيبراني."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-3-1-3-2')
                    <x-sub-control id="٢-٣-١-٣"
                        details="Develop response plans for cybersecurity incidents that may affect the continuity of the entity's business."
                        details_ar="وضع خطط الاستجابة لحوداث الأمن السيبراني التي قد تؤثر على استمرارية أعمال الجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-3-1-3-3')
                    <x-sub-control id="٣-٣-١-٣" details="Develop disaster recovery plans."
                        details_ar="وضع خطط التعافي من الكوارث (Disaster Recovery Plan)." :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-3-1-4')
                    <x-main-control id="٣-١-٤"
                        details="The cybersecurity requirements within the entity's business continuity management must be reviewed periodically."
                        details_ar="يجب مراجعة متطلبات الأمن السيبراني ضمن إدارة استمرارية أعمال الجهة دورياً."
                        :control="$control" />
                @endif
            @endforeach

            <x-main-domain
                domain="٤- الأمن السيبراني المتعلق بالأطراف الخارجية والحوسبة السحابية (Third-Party and Cloud Computing Cybersecurity)" />
            <x-sub-domain subdomain="الأمن السيبراني المتعلق بالأطراف الخارجية (Third-Party Cybersecurity)"
                id="٤-١" />
            <x-sub-domain-info
                info="Ensure the protection of the entity's assets from cybersecurity risks related to third parties (including outsourcing and managed services). In accordance with the entity's regulatory policies and procedures, and relevant legislative and regulatory requirements."
                info_ar="ضمان حماية أصول الجهة من مخاطر الأمن السيبراني المتعلقة بالأطراف الخارجية (بما في ذلك خدمات الإسناد لتقنية المعلومات Outsourcing والخدمات المدارة Managed Services). وفقًا للسياسات والإجراءات التنظيمية للجهة، والمتطلبات التشريعية والتنظيمية ذات العلاقة." />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-4-1-1')
                    <x-main-control id="٤-١-١"
                        details="Cybersecurity requirements must be identified, documented and approved within contracts and agreements with third parties of the entity."
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني ضمن العقود والاتفاقيات مع الأطراف الخارجية للجهة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-4-1-2-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-4-1-2-');
                    @endphp
                    <x-main-control id="٤-١-٢"
                        details="The cybersecurity requirements within contracts and agreements (such as the SLA) with third parties that may be affected by their injury shall cover the data of the entity or services provided to it at a minimum of the following:"
                        details_ar="يجب أن تغطي متطلبات الأمن السيبراني ضمن العقود والاتفاقيات (مثل اتفاقية مستوى الخدمة SLA) مع الأطراف الخارجية التي قد تتأثر بإصابتها بيانات الجهة أو الخدمات المقدمة لها بحد أدنى ما يلي:  "
                        :control="$control" :status="$status" />

                    <x-sub-control id="١-٢-١-٤"
                        details="Non-Disclosure Clauses and secure deletion by the third party of the entity's data at the end of the service."
                        details_ar="بنود المحافظة على سریة المعلومات (Non-Disclosure Clauses)  والحذف الآمن من قِبَل الطرف الخارجي لبیانات الجھة عند إنتھاء الخدمة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-4-1-2-2')
                    <x-sub-control id="٢-٢-١-٤"
                        details="Communication procedures in the event of a cybersecurity incident."
                        details_ar="إجراءات التواصل في حال حدوث حادثة أمن سيبراني." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-4-1-2-3')
                    <x-sub-control id="٣-٢-١-٤"
                        details="Obliging the external party to apply the cybersecurity requirements and policies of the entity and the relevant legislative and regulatory requirements."
                        details_ar="إلزام الطرف الخارجي بتطبیق متطلبات وسیاسات الأمن السیبراني للجھة والمتطلبات التشریعیة والتنظیمیة ذات العلاقة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-4-1-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-4-1-3-');
                    @endphp
                    <x-main-control id="٤-١-٣"
                        details="It should cover cybersecurity requirements with third parties that provide IT outsourcing services, or managed services with a minimum of the following:"
                        details_ar="یجب أن تغطي متطلبات الأمن السیبراني مع الأطراف الخارجیة التي تقدم خدمات إسناد لتقنیة المعلومات، أو خدمات مدارة بحد أدنى ما یلي:"
                        :control="$control" :status="$status" />

                    <x-sub-control id="١-٣-١-٤"
                        details="Conducting an assessment of cybersecurity risks, and ensuring that there is control over those risks, before signing contracts and agreements or when changing the relevant legislative and regulatory requirements."
                        details_ar="إجراء تقییم لمخاطر الأمن السیبراني، والتأكد من وجود ما یضمن السیطرة على تلك المخاطر، قبل توقیع العقود والاتفاقیات أو عند تغییر المتطلبات التشریعیة والتنظیمیة ذات العلاقة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-4-1-3-2')
                    <x-sub-control id="٢-٣-١-٤"
                        details="The operation centers of the managed cybersecurity services for operation and monitoring, which use the remote access method, are fully located within the Kingdom."
                        details_ar="أن تكون مراكز عملیات خدمات الأمن السیبراني المدارة للتشغیل والمراقبة، والتي تستخدم طریقة الوصول عن بعد، موجودة بالكامل داخل المملكة."
                        :control="$control" />
                @endif

                @if ($control->control_id == 'NCA-ECC-4-1-4')
                    <x-main-control id="٤-١-٤"
                        details="Cybersecurity requirements should be reviewed with external parties periodically."
                        details_ar="یجب مراجعة متطلبات الأمن السیبراني مع الأطراف الخارجیة دوريًا." :control="$control" />
                @endif
            @endforeach

            <x-sub-domain id="٤-٢"
                subdomain="الأمن السيبراني المتعلق بالحوسبة السحابية والاستضافة (Cloud Computing and Hosting Cybersecurity)" />
            <x-sub-domain-info
                info="Ensure that cyber risks are addressed and that cyber security requirements for cloud computing and hosting are implemented in an appropriate and effective manner, in accordance with the entity’s regulatory policies and procedures, legislative and regulatory requirements, and related orders and decisions. And ensuring the protection of the information and technical assets of the entity on cloud computing services that are hosted, processed or managed by external parties."
                info_ar="ضمان معالجة المخاطر السیبرانیة وتنفیذ متطلبات الأمن السیبراني للحوسبة السحابیة والاستضافة بشكل ملائم وفعّال، وذلك وفقاً للسیاسات والإجراءات التنظیمیة للجھة، والمتطلبات التشریعیة والتنظیمیة والأوامر والقرارات ذات العلاقة. وضمان حمایة الأصول المعلوماتیة والتقنیة للجھة على خدمات الحوسبة السحابیة التي تتم استضافتھا أو معالجتھا أو إدارتھا بواسطة أطراف خارجیة. " />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-4-2-1')
                    <x-main-control id="٤-٢-١"
                        details="Cybersecurity requirements for the use of cloud computing and hosting services must be identified, documented and approved."
                        details_ar="یجب تحدید وتوثیق واعتماد متطلبات الأمن السیبراني الخاصة باستخدام خدمات الحوسبة السحابیة والاستضافة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-4-2-2')
                    <x-main-control id="٤-٢-٢"
                        details="The cybersecurity requirements for cloud computing and hosting services must be applied to the entity."
                        details_ar="یجب تطبیق متطلبات الأمن السیبراني الخاصة بخدمات الحوسبة السحابیة والاستضافة للجھة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-4-2-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-4-2-3-');
                    @endphp

                    <x-main-control id="٤-٢-٣"
                        details="In accordance with the relevant legislative and regulatory requirements, in addition to the applicable controls within the main components No. (1), (2) and (3) and subcomponent No. (4.1) necessary to protect the data of the entity or the services provided to it, it must cover the cybersecurity requirements for the use of cloud computing and hosting services with a minimum of the following:"
                        details_ar="بما يتوافق مع المتطلبات التشريعية والتنظيمية ذات العلاقة، وبالإضافة إلى ما ينطبق من الضوابط ضمن المكونات الرئيسية رقم (١) و (٢) و (٣) والمكون الفرعي رقم (٤-١) الضرورية لحماية بيانات الجهة أو الخدمات المقدمة لها، يجب أن تغطي متطلبات الأمن السيبراني الخاصة باستخدام خدمات الحوسبة السحابية والاستضافة بحد أدنى ما يلي: "
                        :control="$control" :status="$status" />

                    <x-sub-control id="١-٣-٢-٤"
                        details="Classify data before hosting it with cloud computing and hosting providers, and return it to the entity (in a usable format) upon termination of service."
                        details_ar="تصنيف البيانات قبل استضافتها لدى مقدمي خدمات الحوسبة السحابية والاستضافة، وإعادتها للجهة (بصيغة قابلة للاستخدام) عند إنتهاء الخدمة.
"
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-4-2-3-2')
                    <x-sub-control id="٢-٣-٢-٤"
                        details="Separate the entity's environment (especially virtual servers) from other third-party environments in cloud computing services."
                        details_ar="فصل البيئة الخاصة بالجهة (وخصوصاً الخوادم الافتراضية) عن غيرها من البيئات التابعة لجهات أخرى في خدمات الحوسبة السحابية."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-4-2-3-3')
                    <x-sub-control id="٣-٣-٢-٤"
                        details="The location of hosting and storing the entity's information must be inside the Kingdom."
                        details_ar="موقع استضافة وتخزين معلومات الجهة يجب أن يكون داخل المملكة." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-4-2-4')
                    <x-main-control id="٤-٢-٤"
                        details="The cybersecurity requirements for cloud computing and hosting services should be reviewed periodically."
                        details_ar="يجب مراجعة متطلبات الأمن السيبراني الخاصة بخدمات الحوسبة السحابية والاستضافة دوريًا."
                        :control="$control" />
                @endif
            @endforeach

            <x-main-domain domain="٥- الأمن السيبراني لأنظمة التحكم الصناعي (Industrial Control Systems Cybersecurity)"
                theme="bg-teal" />
            <x-sub-domain id="٥-١" subdomain="حماية أجهزة وأنظمة التحكم الصناعي (ICS Protection) " />
            <x-sub-domain-info
                info="Ensure proper and effective cyber security management to protect the availability, integrity and confidentiality of the entity’s assets related to Industrial Control Systems (OT/ICS) against cyber attack (such as unauthorized access, sabotage, espionage, and tampering) in line with the entity’s cyber security strategy, cyber security risk management, and requirements The relevant legislative and regulatory, as well as the international requirements that are regulatory approved by the entity and related to cybersecurity."
                info_ar="ضمان إدارة الأمن السيبراني بشكل سليم وفعال لحماية توافر وسلامة وسرية أصول الجهة المتعلقة بأجهزة وأنظمة التحكم الصناعي (OT/ICS) ضد الهجوم السيبراني (مثل الوصول غير المصرح به والتخريب والتجسس والتلاعب) بما يتماشى مع إستراتيجية الأمن السيبراني للجهة، وإدارة مخاطر الأمن السيبراني، والمتطلبات التشريعية والتنظيمية ذات العلاقة، وكذلك المتطلبات الدولية المقرّة تنظيميًا على الجهة والمتعلقة بالأمن السيبراني.  " />

            @foreach ($report as $control)
                @if ($control->control_id == 'NCA-ECC-5-1-1')
                    <x-main-control id="٥-١-١"
                        details="Cybersecurity requirements for the protection of industrial control devices and systems (OT/ICS) of the entity shall be identified, documented and approved."
                        details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لحماية أجهزة وأنظمة التحكم الصناعي (OT/ICS) للجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-5-1-2')
                    <x-main-control id="٥-١-٢"
                        details="Cybersecurity requirements must be applied to protect the entity's industrial control devices and systems (OT/ICS)."
                        details_ar="يجب تطبيق متطلبات الأمن السيبراني لحماية أجهزة وأنظمة التحكم الصناعي (OT/ICS) للجهة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-5-1-3-1')
                    @php
                        $status = getParentStatus($report, 'NCA-ECC-5-1-3-');
                    @endphp
                    <x-main-control id="٥-١-٣"
                        details="In addition to the applicable controls within the main components No. (1), (2), (3) and (4) necessary to protect the entity's data and services, the cybersecurity requirements for the protection of industrial control devices and systems (OT/ICS) must cover, at a minimum, the following:"
                        details_ar="بالإضافة إلى ما يمكن تطبيقه من الضوابط ضمن المكونات الرئيسية رقم (١) و (٢) و (٣) و (٤) الضرورية لحماية بيانات الجهة وخدماتها، فإن متطلبات الأمن السيبراني  لحماية أجهزة وأنظمة التحكم الصناعي (OT/ICS) يجب أن تغطي بحد أدنى ما يلي:"
                        :control="$control" $status="$status" />

                    <x-sub-control id="١-٣-١-٥"
                        details="Strict restriction and physical and logical division when linking industrial production networks (OT/ICS) with other networks of the entity, such as the internal business network of the entity Corporate Network."
                        details_ar="التقييد الحازم والتقسيم المادي والمنطقي عند ربط شبكات الإنتاج الصناعية (OT/ICS) مع الشبكات الأخرى التابعة للجهة، مثل: شبكة الأعمال الداخلية للجهة Corporate Network."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-5-1-3-2')
                    <x-sub-control id="٢-٣-١-٥"
                        details="Strict restriction and physical and logical division when connecting industrial systems or networks with external networks, such as the Internet, remote access or wireless communication."
                        details_ar="التقييد الحازم والتقسيم المادي والمنطقي عند ربط الأنظمة أو الشبكات الصناعية مع شبكات خارجية، مثل: الإنترنت أو الدخول عن بعد أو الاتصال اللاسلكي."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-5-1-3-3')
                    <x-sub-control id="٣-٣-١-٥"
                        details="Activate the event logs of the cybersecurity of the industrial network and associated communications whenever possible, and continuously monitor them."
                        details_ar="تفعيل سجلات الأحداث (Event logs) الخاصة بالأمن السيبراني للشبكة الصناعية والاتصالات المرتبطة بها ما أمكن ذلك، والمراقبة المستمرة لها."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-5-1-3-4')
                    <x-sub-control id="٤-٣-١-٥"
                        details="Safety Equipment Systems Isolation (Safety Instrumented System (SIS))."
                        details_ar="عزل أنظمة معدات السلامة  (Safety Instrumented System “SIS”)." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-5-1-3-5')
                    <x-sub-control id="٥-٣-١-٥" details="Strictly restrict the use of external storage media."
                        details_ar="التقييد الحازم لاستخدام وسائط التخزين الخارجية." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-5-1-3-6')
                    <x-sub-control id="٦-٣-١-٥"
                        details="Strictly restrict the connection of mobile devices on the industrial production network.
"
                        details_ar="التقييد الحازم لتوصيل الأجهزة المحمولة على شبكة الإنتاج الصناعية."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-5-1-3-7')
                    <x-sub-control id="٧-٣-١-٥"
                        details="Periodically review the settings and fortification of industrial systems, support systems and industrial automated devices (Secure Configuration and Hardening)."
                        details_ar="مراجعة إعدادات وتحصين الأنظمة الصناعية، وأنظمة الدعم والأجهزة الآلية الصناعية (Secure Configuration and Hardening) دورياً."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-5-1-3-8')
                    <x-sub-control id="٨-٣-١-٥"
                        details="Industrial Systems Vulnerability Management (OT/ICS Vulnerability Management)."
                        details_ar="إدارة ثغرات الأنظمة الصناعية (OT/ICS Vulnerability Management)." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-5-1-3-9')
                    <x-sub-control id="٩-٣-١-٥"
                        details="Manage industrial systems security updates and fixes packages (OT/ICS Patch Management)."
                        details_ar="إدارة حزم التحديثات والإصلاحات الأمنية للأنظمة الصناعية (OT/ICS Patch Management)."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-5-1-3-10')
                    <x-sub-control id="١٠-٣-١-٥"
                        details="Manage software for industrial cybersecurity to protect against viruses, suspicious and malicious software."
                        details_ar="إدارة البرامج الخاصة بالأمن السيبراني الصناعي للحماية من الفيروسات والبرمجيات المشبوهة والضارة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-ECC-5-1-4')
                    <x-main-control id="٥-١-٤"
                        details="Special cybersecurity requirements for the protection of industrial control devices and systems (OT/ICS) of the entity shall be reviewed periodically."
                        details_ar="يجب مراجعة متطلبات الأمن السيبراني الخاصة لحماية أجهزة وأنظمة التحكم الصناعي (OT/ICS) للجهة دوريًا."
                        :control="$control" />
                @endif
            @endforeach

        </tbody>
    </table>
@endsection
