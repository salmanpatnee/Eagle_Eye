@extends('pdf.partials.nca-pdf-report-layout')
@section('title', 'NCA ECC 2024 Assessment and Compliance')
@section('header')
    <h1 class="arabic-text">الهيئة الوطنية للأمن السيبراني - الضوابط الأساسية للأمن السيبراني</h1>
    <p style="margin-top: 20px">Control Assessment Regulator Reports</p>
    <p>National Cybersecurity Authority - Essential Cybersecurity Controls (NCA-ECC 2024)</p>
@endsection
@section('content')

<table class="table mb-0">
    <tbody>
        <x-main-domain domain="١- حوكمة الأمن السيبراني (Cybersecurity Governance)" />
        <x-sub-domain subdomain="إستراتيجية الأمن السيبراني (Cybersecurity Strategy)" id="١-١" />
        <x-sub-domain-info
            info_ar=" التأكد من أن خطط الأمن السيبراني وأهدافه ومبادراته ومشاريعه تساهم في الامتثال للقوانين واللوائح ذات الصلة."
            info="To ensure that cybersecurity plans, goals, initiatives, and projects are contributing to compliance with related laws and regulations." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-1-1-1')
                <x-main-control id="١-١-١"
                    details="A cybersecurity strategy must be defined, documented, and approved. It must be supported by the head of the organization or his/her delegate (referred to in this document as Authorizing Official). The strategy goals must be in line with related laws and regulations."
                    details_ar="يجب تحديد استراتيجية الأمن السيبراني وتوثيقها والموافقة عليها. ويجب أن يدعمها رئيس المنظمة أو من ينوب عنه (يشار إليه في هذه الوثيقة باسم المسؤول المفوض). ويجب أن تكون أهداف الاستراتيجية متوافقة مع القوانين واللوائح ذات الصلة."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-1-2')
                <x-main-control id="١-١-٢"
                    details="A roadmap must be executed to implement the cybersecurity strategy."
                    details_ar="يجب تنفيذ خارطة طريق لتنفيذ استراتيجية الأمن السيبراني. " :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-1-3')
                <x-main-control id="١-١-٣"
                    details="The cybersecurity strategy must be reviewed periodically according to planned intervals or upon changes to related laws and regulations."
                    details_ar="يجب مراجعة استراتيجية الأمن السيبراني بشكل دوري وفقًا لفترات مخططة أو عند حدوث تغييرات في القوانين واللوائح ذات الصلة. "
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="إدارة الأمن السيبراني (Cybersecurity Management)" id="١-٢" />
        <x-sub-domain-info
            info_ar="ضمان دعم المسؤول المخول في تنفيذ وإدارة برامج الأمن السيبراني داخل المنظمة وفقًا للقوانين واللوائح ذات الصلة."
            info="To ensure Authorizing Official’s support in implementing and managing cybersecurity programs within the organization as per related laws and regulations." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-1-2-1')
                <x-main-control id="١-٢-١"
                    details="A dedicated cybersecurity function (e.g., division, department) must be established within the organization. This function must be independent from the Information Technology/Information Communication and Technology (IT/ICT) functions (as per the Royal Decree number 37140 dated 14/8/1438H). It is highly recommended that this cybersecurity function reports directly to the head of the organization or his/her delegate while ensuring that this does not result in a conflict of interest."
                    details_ar=" يجب إنشاء وظيفة مخصصة للأمن السيبراني (على سبيل المثال، قسم أو إدارة) داخل المنظمة. يجب أن تكون هذه الوظيفة مستقلة عن وظائف تكنولوجيا المعلومات/اتصالات وتكنولوجيا المعلومات (IT/ICT) (وفقًا للمرسوم الملكي رقم 37140 بتاريخ 14/8/ 1438هـ ). يوصى بشدة أن تتبع وظيفة الأمن السيبراني هذه مباشرة رئيس المنظمة أو من ينوب عنه مع التأكد من أن هذا لا يؤدي إلى تضارب في المصالح"
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-2-2')
                <x-main-control id="١-٢-٢"
                    details="All cybersecurity positions must be filled with full-time and qualified Saudi cybersecurity professionals."
                    details_ar="يجب شغل جميع وظائف الأمن السيبراني بمحترفي الأمن السيبراني السعوديين المؤهلين بدوام كامل. "
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-2-3')
                <x-main-control id="١-٢-٣"
                    details="A cybersecurity steering committee must be established by the Authorizing Official to ensure the support and implementation of the cybersecurity program and initiatives within the organization. Committee members, roles and responsibilities, and the governance framework must be defined, documented, and approved. The committee must include the head of the cybersecurity function as one of its members. It is highly recommended that the committee reports directly to the head of the organization or his/her delegate while ensuring that this does not result in a conflict of interest."
                    details_ar="يجب على المسؤول المخول إنشاء لجنة توجيهية للأمن السيبراني لضمان دعم وتنفيذ برنامج ومبادرات الأمن السيبراني داخل المنظمة. يجب تحديد وتوثيق وإقرار أعضاء اللجنة وأدوارها ومسؤولياتها وإطار الحوكمة. يجب أن تضم اللجنة رئيس وظيفة الأمن السيبراني كأحد أعضائها. يوصى بشدة بأن ترفع اللجنة تقاريرها مباشرة إلى رئيس المنظمة أو من ينوب عنه مع ضمان عدم تسبب ذلك في تضارب في المصالح."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="سياسات وإجراءات الأمن السيبراني (Cybersecurity Policies and Procedures)"
            id="١-٣" />
        <x-sub-domain-info
            info_ar="التأكد من توثيق متطلبات الأمن السيبراني وتوصيلها والامتثال لها من قبل المنظمة وفقًا للقوانين واللوائح ذات الصلة ومتطلبات المنظمة."
            info="To ensure that cybersecurity requirements are documented, communicated, and complied with by the organization as per related laws and regulations, and organizational requirements." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-1-3-1')
                <x-main-control id="١-٣-١"
                    details="Cybersecurity policies and procedures must be defined and documented by the cybersecurity function, approved by the Authorizing Official, and disseminated to relevant parties inside and outside the organization."
                    details_ar=": يجب أن تقوم وظيفة الأمن السيبراني بتحديد وتوثيق سياسات وإجراءات الأمن السيبراني، والموافقة عليها من قبل المسؤول المخول، ونشرها على الأطراف ذات الصلة داخل المنظمة وخارجها."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-3-2')
                <x-main-control id="١-٣-٢"
                    details="The cybersecurity function must ensure that the cybersecurity policies and procedures are implemented."
                    details_ar="يجب أن تضمن وظيفة الأمن السيبراني تنفيذ سياسات وإجراءات الأمن السيبراني."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-3-3')
                <x-main-control id="١-٣-٣"
                    details="The cybersecurity policies and procedures must be supported by technical security standards (e.g., operating systems, databases, and firewall technical security standards)."
                    details_ar="يجب أن تكون سياسات وإجراءات الأمن السيبراني مدعومة بمعايير الأمان الفنية (على سبيل المثال، أنظمة التشغيل، وقواعد البيانات، ومعايير الأمان الفنية لجدران الحماية)."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-3-4')
                <x-main-control id="١-٣-٤"
                    details="The cybersecurity policies and procedures must be reviewed periodically according to planned intervals or upon changes to related laws and regulations. Changes and reviews must be approved and documented."
                    details_ar="يجب مراجعة سياسات وإجراءات الأمن السيبراني بشكل دوري وفقًا لفترات زمنية مخططة أو عند حدوث تغييرات في القوانين واللوائح ذات الصلة. يجب الموافقة على التغييرات والمراجعات وتوثيقها."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain
            subdomain="أدوار ومسؤوليات الأمن السيبراني (Cybersecurity Roles and Responsibilities)"
            id="١-٤" />
        <x-sub-domain-info
            info_ar="التأكد من تحديد الأدوار والمسؤوليات لجميع الأطراف المشاركة في تنفيذ ضوابط الأمن السيبراني داخل المنظمة."
            info="To ensure that roles and responsibilities are defined for all parties participating in implementing the cybersecurity controls within the organization." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-1-4-1')
                <x-main-control id="١-٤-١"
                    details='Cybersecurity organizational structure and related roles and responsibilities must be defined, documented, approved, supported, and assigned by the Authorizing Official, while ensuring that this does not result in a conflict of interest.'
                    details_ar='يجب تحديد الهيكل التنظيمي للأمن السيبراني والأدوار والمسؤوليات ذات الصلة وتوثيقها والموافقة عليها ودعمها وتعيينها من قبل المسؤول المخول، مع ضمان عدم تسبب ذلك في تضارب في المصالح.'
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-4-2')
                <x-main-control id="١-٤-٢"
                    details="The cybersecurity roles and responsibilities must be reviewed periodically according to planned intervals or upon changes to related laws and regulations."
                    details_ar="يجب مراجعة أدوار ومسؤوليات الأمن السيبراني بشكل دوري وفقًا لفترات زمنية مخططة أو عند حدوث تغييرات في القوانين واللوائح ذات الصلة."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="إدارة مخاطر الأمن السيبراني (Cybersecurity Risk Management)" id="١-٥" />
        <x-sub-domain-info
            info_ar="ضمان إدارة مخاطر الأمن السيبراني بطريقة منهجية لحماية أصول المعلومات والتكنولوجيا الخاصة بالمنظمة وفقًا للسياسات والإجراءات التنظيمية والقوانين واللوائح ذات الصلة."
            info="To ensure managing cybersecurity risks in a methodological approach in order to protect the organization’s information and technology assets as per organizational policies and procedures, and related laws and regulations." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-1-5-1')
                <x-main-control id="١-٥-١"
                    details="Cybersecurity risk management methodology and procedures must be defined, documented, and approved as per confidentiality, integrity, and availability considerations of information and technology assets."
                    details_ar="يجب تحديد منهجية وإجراءات إدارة مخاطر الأمن السيبراني وتوثيقها والموافقة عليها وفقًا لاعتبارات السرية والنزاهة وتوافر أصول المعلومات والتكنولوجيا."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-5-2')
                <x-main-control id="١-٥-٢"
                    details="The cybersecurity risk management methodology and procedures must be implemented by the cybersecurity function."
                    details_ar="يجب على وظيفة الأمن السيبراني تنفيذ منهجية وإجراءات إدارة مخاطر الأمن السيبراني."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-5-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-1-5-3-');
                @endphp
                <x-main-control id="١-٥-٣"
                    details="The cybersecurity risk assessment procedures must be implemented at least in the following cases:"
                    details_ar="يجب تنفيذ إجراءات تقييم مخاطر الأمن السيبراني على الأقل في الحالات التالية:"
                    :status="$status" />

                <x-sub-control id="١-٥-٣-١" details="Early stages of technology projects."
                    details_ar="المراحل المبكرة من مشاريع التكنولوجيا" :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-5-3-2')
                <x-sub-control id="١-٥-٣-٢" details="Before making major changes to technology infrastructure"
                    details_ar="قبل إجراء تغييرات كبيرة على البنية التحتية للتكنولوجيا" :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-5-3-3')
                <x-sub-control id="١-٥-٣-٣" details="During the planning phase of obtaining third-party services"
                    details_ar="أثناء مرحلة التخطيط للحصول على خدمات الطرف الثالث" :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-5-3-4')
                <x-sub-control id="١-٥-٣-٤"
                    details="During the planning phase and before going live for new technology services and products"
                    details_ar="أثناء مرحلة التخطيط وقبل إطلاق الخدمات والمنتجات التكنولوجية الجديدة"
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-5-4')
                <x-main-control id="١-٥-٤"
                    details="The cybersecurity risk management methodology and procedures must be reviewed periodically according to planned intervals or upon changes to related laws and regulations. Changes and reviews must be approved and documented."
                    details_ar="يجب مراجعة منهجية وإجراءات إدارة مخاطر الأمن السيبراني بشكل دوري وفقًا لفترات زمنية مخططة أو عند حدوث تغييرات في القوانين واللوائح ذات الصلة. يجب الموافقة على التغييرات والمراجعات وتوثيقها."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain
            subdomain="الأمن السيبراني ضمن إدارة المشاريع المعلوماتية والتقنية (Cybersecurity in Information Technology Projects) "
            id="١-٦" />

        <x-sub-domain-info
            info_ar="التأكد من تضمين متطلبات الأمن السيبراني في منهجية وإجراءات إدارة المشاريع من أجل حماية سرية وسلامة وتوافر أصول المعلومات والتكنولوجيا وفقًا للسياسات والإجراءات التنظيمية والقوانين واللوائح ذات الصلة."
            info="To ensure that cybersecurity requirements are included in project management methodology and procedures in order to protect the confidentiality, integrity, and availability of information and technology assets as per organizational policies and procedures, and related laws and regulations." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-1-6-1')
                <x-main-control id="١-٦-١"
                    details="Cybersecurity requirements must be included in project and asset (information/technology) change management methodology and procedures to identify and manage cybersecurity risks as part of project management lifecycle. The cybersecurity requirements must be a key part of the overall requirements of technology projects."
                    details_ar="يجب تضمين متطلبات الأمن السيبراني في منهجية وإجراءات إدارة التغيير للمشروع والأصول (المعلومات/التكنولوجيا) لتحديد مخاطر الأمن السيبراني وإدارتها كجزء من دورة حياة إدارة المشروع. يجب أن تكون متطلبات الأمن السيبراني جزءًا أساسيًا من المتطلبات الإجمالية لمشاريع التكنولوجيا."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-6-2-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-1-6-2-');
                @endphp
                <x-main-control id="١-٦-٢"
                    details="The cybersecurity requirements in project and asset (information/technology) change management must include at least the following:"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني في إدارة التغيير للمشروع والأصول (المعلومات/التكنولوجيا) ما يلي على الأقل:"
                    :control="$control" :status="$status" />

                <x-sub-control id="١-٦-٢-١" details="Vulnerability assessment and remediation."
                    details_ar="تقييم نقاط الضعف ومعالجتها." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-6-2-2')
                <x-sub-control id="١-٦-٢-٢"
                    details="Conducting a configurations’ review, secure configuration and hardening, and patching before changes or going live for technology projects."
                    details_ar="إجراء مراجعة التكوينات وتأمين التكوين والتحصين والتصحيح قبل التغييرات أو التشغيل المباشر للمشاريع التكنولوجية."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-6-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-1-6-3-');
                @endphp
                <x-main-control id="١-٦-٣"
                    details="The cybersecurity requirements related to software and application development projects must include at least the following:"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني المتعلقة بمشاريع تطوير البرامج والتطبيقات ما يلي على الأقل:"
                    :control="$control" :status="$status" />

                <x-sub-control id="١-٦-٣-١" details="Using secure coding standards."
                    details_ar="استخدام معايير الترميز الآمنة." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-6-3-2')
                <x-sub-control id="١-٦-٣-٢"
                    details="Using trusted and licensed sources for software development tools and libraries."
                    details_ar="استخدام مصادر موثوقة ومرخصة لأدوات تطوير البرامج والمكتبات." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-6-3-3')
                <x-sub-control id="١-٦-٣-٣"
                    details="Conducting compliance tests for software against the defined organizational cybersecurity requirements."
                    details_ar="إجراء اختبارات التوافق للبرامج مع متطلبات الأمن السيبراني التنظيمية المحددة."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-6-3-4')
                <x-sub-control id="١-٦-٣-٤" details="Secure integration between software components."
                    details_ar="التكامل الآمن بين مكونات البرنامج." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-6-3-5')
                <x-sub-control id="١-٦-٣-٥"
                    details="Conducting a configurations’ review, secure configuration, and hardening and patching before going live for software products."
                    details_ar="إجراء مراجعة التكوينات، وتأمين التكوين، والتحصين والتصحيح قبل طرح المنتجات البرمجية في السوق."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-6-4')
                <x-main-control id="١-٦-٤"
                    details="The cybersecurity requirements in project management must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني في إدارة المشاريع بشكل دوري. " :control="$control" />
            @endif
        @endforeach

        <x-sub-domain
            subdomain="الالتزام بتشريعات وتنظيمات ومعايير الأمن السيبراني (Cybersecurity Regulatory Compliance)"
            id="١-٧" />

        <x-sub-domain-info
            info_ar="التأكد من أن برنامج الأمن السيبراني في المنظمة متوافق مع القوانين واللوائح ذات الصلة."
            info="To ensure that the organization’s cybersecurity program is in compliance with related laws and regulations.	" />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-1-7-1')
                <x-main-control id="١-٧-١"
                    details="The organization must comply with related national cybersecurity laws and regulations. "
                    details_ar="يجب على المنظمة الامتثال لقوانين وأنظمة الأمن السيبراني الوطنية ذات الصلة."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-7-2')
                <x-main-control id="١-٧-٢"
                    details="The organization must comply with any nationally approved international agreements and commitments related to cybersecurity."
                    details_ar="يجب على المنظمة الالتزام بأي اتفاقيات والتزامات دولية معتمدة وطنياً تتعلق بالأمن السيبراني."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain
            subdomain="المراجعة والتدقيق الدوري للأمن السيبراني (Cybersecurity Periodical Assessment and Audit)"
            id="١-٨" />

        <x-sub-domain-info
            info_ar="التأكد من تنفيذ ضوابط الأمن السيبراني وامتثالها للسياسات والإجراءات التنظيمية، فضلاً عن القوانين واللوائح والاتفاقيات الوطنية والدولية ذات الصلة. "
            info="To ensure that cybersecurity controls are implemented and in compliance with organizational policies and procedures, as well as related national and international laws, regulations, and agreements." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-1-8-1')
                <x-main-control id="١-٨-١"
                    details="Cybersecurity reviews must be conducted periodically by the cybersecurity function in the organization to assess compliance with the cybersecurity controls in the organization."
                    details_ar="يجب إجراء مراجعات الأمن السيبراني بشكل دوري من قبل وظيفة الأمن السيبراني في المنظمة لتقييم الامتثال لضوابط الأمن السيبراني في المنظمة. "
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-8-2')
                <x-main-control id="١-٨-٢"
                    details="Cybersecurity audits and reviews must be conducted by independent parties outside the cybersecurity function (e.g., Internal Audit function) to assess compliance with the cybersecurity controls in the organization. Audits and reviews must be conducted independently while ensuring that this does not result in a conflict of interest, as per the Generally Accepted Auditing Standards (GAAS) and related laws and regulations."
                    details_ar="جب توثيق نتائج عمليات التدقيق والمراجعة الخاصة بالأمن السيبراني وتقديمها إلى لجنة توجيه الأمن السيبراني والمسؤول المخول. ويجب أن تتضمن النتائج نطاق التدقيق/المراجعة والملاحظات والتوصيات وخطط الإصلاح."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-8-3')
                <x-main-control id="١-٨-٣"
                    details="Results from the cybersecurity audits and reviews must be documented and presented to the cybersecurity steering committee and Authorizing Official. Results must include the audit/review scope, observations, recommendations, and remediation plans."
                    details_ar="يجب توثيق نتائج مراجعة وتدقيق الأمن السيبراني، وعرضها على اللجنة الإشرافية للأمن السيبراني وصاحب الصلاحية. كما يجب أن تشتمل النتائج على نطاق المراجعة والتدقيق، والملاحظات المكتشفة، والتوصيات والإجراءات التصحيحية، وخطة معالجة الملاحظات."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="الأمن السيبراني المتعلق بالموارد البشرية (Cybersecurity in Human Resources) "
            id="١-٩" />

        <x-sub-domain-info
            info_ar="ضمان إدارة مخاطر الأمن السيبراني ومتطلباته المتعلقة بالموظفين (الموظفين والمقاولين) بكفاءة قبل التوظيف وأثناءه وبعد انتهاء الخدمة/الفصل وفقًا لسياسات وإجراءات المنظمة والقوانين واللوائح ذات الصلة."
            info=" To ensure that cybersecurity risks and requirements related to personnel (employees and contractors) are managed efficiently prior to employment, during employment, and after termination/separation as per organizational policies and procedures, and related laws and regulations." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-1-9-1')
                <x-main-control id="١-٩-١"
                    details="Personnel cybersecurity requirements (prior to employment, during employment, and after termination/separation) must be defined, documented, and approved."
                    details_ar="يجب تحديد متطلبات الأمن السيبراني للموظفين (قبل التوظيف، وأثناء التوظيف، وبعد إنهاء الخدمة/الفصل) وتوثيقها والموافقة عليها. "
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-1-9-2')
                <x-main-control id="١-٩-٢" details="The personnel cybersecurity requirements must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني للموظفين." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-9-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-1-9-3-');
                @endphp
                <x-main-control id="١-٩-٣"
                    details="The personnel cybersecurity requirements prior to employment must include at least the following:"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني للموظفين قبل التوظيف ما يلي على الأقل:"
                    :control="$control" :status="$status" />

                <x-sub-control id="١-٩-٣-١"
                    details="Inclusion of personnel cybersecurity responsibilities and non-disclosure clauses (covering the cybersecurity requirements during employment and after termination/separation) in employment contracts."
                    details_ar="إدراج مسؤوليات الأمن السيبراني للموظفين وبنود عدم الإفصاح (التي تغطي متطلبات الأمن السيبراني أثناء العمل وبعد الإنهاء/الفصل) في عقود العمل."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-9-3-2')
                <x-sub-control id="١-٩-٣-٢"
                    details="Screening or vetting candidates for cybersecurity and critical/privileged positions."
                    details_ar="فحص أو التحقق من المرشحين لوظائف الأمن السيبراني والمناصب الحرجة/المتميزة."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-9-4-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-1-9-4-');
                @endphp
                <x-main-control id="١-٩-٤"
                    details="The personnel cybersecurity requirements during employment must include at least the following:"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني للموظفين أثناء العمل ما يلي على الأقل: "
                    :control="$control" :status="$status" />

                <x-sub-control id="١-٩-٤-١"
                    details="Cybersecurity awareness (during onboarding and during employment)."
                    details_ar="التوعية بالأمن السيبراني (أثناء التوجيه وأثناء التوظيف)." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-9-4-2')
                <x-sub-control id="١-٩-٤-٢"
                    details="Implementation of and compliance with the cybersecurity requirements as per the organizational cybersecurity policies and procedures.
"
                    details_ar="تنفيذ متطلبات الأمن السيبراني والامتثال لها وفقًا لسياسات وإجراءات الأمن السيبراني التنظيمية."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-9-5')
                <x-main-control id="١-٩-٥"
                    details="Personnel access to information and technology assets must be reviewed and removed immediately upon termination/separation."
                    details_ar="يجب مراجعة وصول الموظفين إلى المعلومات والأصول التكنولوجية وإزالتها فورًا عند إنهاء الخدمة/الفصل."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-9-6')
                <x-main-control id="١-٩-٦"
                    details="Personnel cybersecurity requirements must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني للموظفين بشكل دوري." :control="$control" />
            @endif
        @endforeach

        <x-sub-domain
            subdomain="برنامج التوعية والتدريب بالأمن السيبراني (Cybersecurity Awareness and Training Program) "
            id="١-١٠" />

        <x-sub-domain-info
            info="To ensure that personnel are aware of their cybersecurity responsibilities and have the essential cybersecurity awareness. It is also to ensure that personnel are provided with the required cybersecurity training, skills, and credentials needed to accomplish their cybersecurity responsibilities and to protect the organization’s information and technology assets."
            info_ar="التأكد من أن الموظفين على دراية بمسؤولياتهم في مجال الأمن السيبراني وأنهم يتمتعون بالوعي الأساسي بالأمن السيبراني. كما يهدف إلى ضمان تزويد الموظفين بالتدريب والمهارات والمؤهلات اللازمة للأمن السيبراني اللازمة لإنجاز مسؤولياتهم في مجال الأمن السيبراني وحماية أصول المعلومات والتكنولوجيا في المنظمة." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-1-10-1')
                <x-main-control id="١-١٠-١"
                    details="A cybersecurity awareness program must be developed and approved. The program must be conducted periodically through multiple channels to strengthen awareness about cybersecurity, cyber threats, and risks, and to build a positive cybersecurity awareness culture."
                    details_ar="يجب تطوير برنامج للتوعية بالأمن السيبراني والموافقة عليه. ويجب تنفيذ البرنامج بشكل دوري من خلال قنوات متعددة لتعزيز الوعي بالأمن السيبراني والتهديدات والمخاطر السيبرانية، وبناء ثقافة إيجابية للتوعية بالأمن السيبراني."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-10-2')
                <x-main-control id="١-١٠-٢" details="The cybersecurity awareness program must be implemented."
                    details_ar="يجب تنفيذ برنامج التوعية بالأمن السيبراني." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-10-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-1-10-3-');
                @endphp
                <x-main-control id="١-١٠-٣"
                    details="The cybersecurity awareness program must cover the latest cyber threats and how to protect against them and must include at least the following subjects:"
                    details_ar="يجب أن يغطي برنامج التوعية بالأمن السيبراني أحدث التهديدات السيبرانية وكيفية الحماية منها ويجب أن يتضمن على الأقل الموضوعات التالية:"
                    :control="$control" :status="$status" />

                <x-sub-control id="١-١٠-٣-١" details="Secure handling of email services, especially phishing emails."
                    details_ar="التعامل الآمن مع خدمات البريد الإلكتروني، وخاصة رسائل التصيد الاحتيالي."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-10-3-2')
                <x-sub-control id="١-١٠-٣-٢" details="Secure handling of mobile devices and storage media."
                    details_ar="التعامل الآمن مع الأجهزة المحمولة ووسائط التخزين." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-10-3-3')
                <x-sub-control id="١-١٠-٣-٣" details="Secure Internet browsing.
"
                    details_ar="تصفح الإنترنت بشكل آمن." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-10-3-4')
                <x-sub-control id="١-١٠-٣-٤" details="use of social media.
"
                    details_ar="الاستخدام الآمن لوسائل التواصل الاجتماعي." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-10-4-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-1-10-4-');
                @endphp
                <x-main-control id="١-١٠-٤"
                    details="Essential and customized (i.e., tailored to job functions as it relates to cybersecurity) training and access to professional skillsets must be made available to personnel working directly on tasks related to cybersecurity, including:"
                    details_ar="يجب توفير التدريب الأساسي والمخصص (أي المصمم خصيصًا لوظائف العمل فيما يتعلق بالأمن السيبراني) والوصول إلى مجموعات المهارات المهنية للموظفين الذين يعملون مباشرة في المهام المتعلقة بالأمن السيبراني، بما في ذلك:"
                    :control="$control" :status="$status" />

                <x-sub-control id="١-١٠-٤-١" details="Cybersecurity function’s personnel."
                    details_ar="موظفو وظيفة الأمن السيبراني." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-10-4-2')
                <x-sub-control id="١-١٠-٤-٢"
                    details="Personnel working on software/application development and information and technology assets operations."
                    details_ar="الموظفون العاملون في مجال تطوير البرمجيات/التطبيقات وعمليات أصول المعلومات والتكنولوجيا"
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-10-4-3')
                <x-sub-control id="١-١٠-٤-٣" details="Executive and supervisory positions."
                    details_ar="المناصب التنفيذية والإشرافية." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-1-10-5')
                <x-main-control id="١-١٠-٥"
                    details="The implementation of the cybersecurity awareness program must be reviewed periodically."
                    details_ar="يجب مراجعة تنفيذ برنامج التوعية بالأمن السيبراني بشكل دوري." :control="$control" />
            @endif
        @endforeach

        <x-main-domain domain="٢- تعزيز الأمن السيبراني (Cybersecurity Defense)" theme="bg-teal" />

        <x-sub-domain subdomain="إدارة الأصول (Asset Management)" id="٢-١" theme="bg-teal" />

        <x-sub-domain-info
            info_ar="التأكد من أن المنظمة لديها مخزون دقيق ومفصل لأصول المعلومات والتكنولوجيا من أجل دعم متطلبات الأمن السيبراني والتشغيلية للمنظمة للحفاظ على سرية وسلامة وتوافر أصول المعلومات والتكنولوجيا."
            info="To ensure that the organization has an accurate and detailed inventory of information and technology assets in order to support the organization’s cybersecurity and operational requirements to maintain the confidentiality, integrity, and availability of information and technology assets." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-2-1-1')
                <x-main-control id="٢-١-١"
                    details="Cybersecurity requirements for managing information and technology assets must be defined, documented, and approved."
                    details_ar="يجب تحديد متطلبات الأمن السيبراني لإدارة أصول المعلومات والتكنولوجيا وتوثيقها والموافقة عليها."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-1-2')
                <x-main-control id="٢-١-٢"
                    details="The cybersecurity requirements for managing information and technology assets must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني لإدارة أصول المعلومات والتكنولوجيا. "
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-1-3')
                <x-main-control id="٢-١-٣"
                    details="Acceptable use policy of information and technology assets must be defined, documented, and approved."
                    details_ar="يجب تحديد سياسة الاستخدام المقبولة لأصول المعلومات والتكنولوجيا وتوثيقها والموافقة عليها."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-1-4')
                <x-main-control id="٢-١-٤"
                    details="Acceptable use policy of information and technology assets must be implemented."
                    details_ar="يجب تنفيذ سياسة الاستخدام المقبول لأصول المعلومات والتكنولوجيا." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-1-5')
                <x-main-control id="٢-١-٥"
                    details="Information and technology assets must be classified, labeled, and handled as per related law and regulatory requirements."
                    details_ar="يجب تصنيف أصول المعلومات والتكنولوجيا ووضع العلامات عليها والتعامل معها وفقًا للقانون والمتطلبات التنظيمية ذات الصلة."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-1-6')
                <x-main-control id="٢-١-٦"
                    details="The cybersecurity requirements for managing information and technology assets must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني لإدارة أصول المعلومات والتكنولوجيا بشكل دوري."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="إدارة هويات الدخول والصلاحيات (Identity and Access Management)" id="٢-٢"
            theme="bg-teal" />

        <x-sub-domain-info
            info_ar="ضمان الوصول المنطقي الآمن والمقيد إلى المعلومات والأصول التكنولوجية من أجل منع الوصول غير المصرح به والسماح فقط بالوصول المصرح به للمستخدمين الضروريين لإنجاز المهام المعينة."
            info="To ensure the secure and restricted logical access to information and technology assets in order to prevent unauthorized access and allow only authorized accesses for users which are necessary to accomplish assigned tasks." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-2-2-1')
                <x-main-control id="٢-٢-١"
                    details="Cybersecurity requirements for identity and access management must be defined, documented, and approved."
                    details_ar="يجب تحديد متطلبات الأمن السيبراني لإدارة الهوية والوصول وتوثيقها والموافقة عليها."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-2-2')
                <x-main-control id="٢-٢-٢"
                    details="The cybersecurity requirements for identity and access management must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني لإدارة الهوية والوصول." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-2-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-2-2-3-');
                @endphp
                <x-main-control id="٢-٢-٣"
                    details="يجب أن تتضمن متطلبات الأمن السيبراني لإدارة الهوية والوصول ما يلي على الأقل:"
                    details_ar="The cybersecurity requirements for identity and access management must include at least the following:"
                    :control="$control" :status="$status" />

                <x-sub-control id="٢-٢-٣-١" details="Single-factor authentication based on username and password.
"
                    details_ar="المصادقة أحادية العامل بناءً على اسم المستخدم وكلمة المرور" :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-2-3-2')
                <x-sub-control id="٢-٢-٣-٢"
                    details="Multi-factor authentication for remote access, defining suitable authentication factors, number of factors, and suitable techniques based on risk."
                    details_ar="المصادقة متعددة العوامل للوصول عن بعد، وتحديد عوامل المصادقة المناسبة، وعدد العوامل، والتقنيات المناسبة بناءً على المخاطر."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-2-3-3')
                <x-sub-control id="٢-٢-٣-٣"
                    details="User authorization based on identity and access control principles: Need-to-Know and Need-to-Use, Least Privilege and Segregation of Duties."
                    details_ar="الحاجة إلى المعرفة والحاجة إلى الاستخدام، والحد الأدنى من الامتيازات وفصل الواجبات."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-2-3-4')
                <x-sub-control id="٢-٢-٣-٤"
                    details="Privileged access management."
                    details_ar="إدارة الوصول المتميز"
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-2-3-5')
                <x-sub-control id="٢-٢-٣-٥"
                    details="Periodic review of users' identities and access rights."
                    details_ar="المراجعة الدورية لهويات المستخدمين وحقوق الوصول."
                    :control="$control" />
            @endif





            @if ($control->control_id == 'NCA-ECC2-2-2-4')
                <x-main-control id="٢-٢-٤"
                    details="The implementation of the cybersecurity requirements for identity and access management must be reviewed periodically."
                    details_ar="يجب مراجعة تنفيذ متطلبات الأمن السيبراني لإدارة الهوية والوصول بشكل دوري."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain
            subdomain="حماية الأنظمة وأجهزة معالجة المعلومات  (Information System and Processing Facilities Protection)"
            id="٢-٣" theme="bg-teal" />

        <x-sub-domain-info
            info_ar="ضمان حماية أنظمة المعلومات ومرافق معالجة المعلومات (بما في ذلك محطات العمل والبنية التحتية) ضد المخاطر السيبرانية."
            info="To ensure the protection of information systems and information processing facilities (including workstations and infrastructures) against cyber risks." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-2-3-1')
                <x-main-control id="٢-٣-١"
                    details="
Cybersecurity requirements for protecting information systems and information processing facilities must be defined, documented, and approved."
                    details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لحماية أنظمة المعلومات ومرافق معالجة المعلومات."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-3-2')
                <x-main-control id="٢-٣-٢"
                    details="The cybersecurity requirements for protecting information systems and information processing facilities must be implemented.
"
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني لحماية أنظمة المعلومات ومرافق معالجة المعلومات."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-3-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-2-3-3-');
                @endphp
                <x-main-control id="٢-٣-٣"
                    details="The cybersecurity requirements for protecting information systems and information processing facilities must include at least the following:"
                    details_ar="إدارة متقدمة وحديثة وآمنة لحماية البرامج الضارة والفيروسات على الخوادم ومحطات العمل"
                    :control="$control" :status="$status" />

                <x-sub-control id="٢-٣-٣-١"
                    details="Advanced, up-to-date, and secure management of malware and virus protection on servers and workstations."
                    details_ar="إدارة متقدمة وحديثة وآمنة لحماية البرامج الضارة والفيروسات على الخوادم ومحطات العمل."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-3-3-2')
                <x-sub-control id="٢-٣-٣-٢" details="Restricted use and secure handling of external storage media."
                    details_ar="الاستخدام المقيد والمعالجة الآمنة لوسائط التخزين الخارجية." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-3-3-3')
                <x-sub-control id="٢-٣-٣-٣"
                    details="Patch management for information systems, software, and devices.
"
                    details_ar="إدارة التصحيحات لأنظمة المعلومات والبرامج والأجهزة." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-3-3-4')
                <x-sub-control id="٢-٣-٣-٤"
                    details="Centralized clock synchronization with an accurate and trusted source (e.g., Saudi Standards, Metrology, and Quality Organization - SASO)."
                    details_ar="مزامنة الساعة المركزية مع مصدر دقيق وموثوق (على سبيل المثال، الهيئة السعودية للمواصفات والمقاييس والجودة"
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-3-4')
                <x-main-control id="٢-٣-٤"
                    details="The cybersecurity requirements for protecting information systems and information processing facilities must be reviewed periodically.
"
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني لحماية أنظمة المعلومات ومرافق معالجة المعلومات بشكل دوري."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="حماية البريد الإلكتروني (Email Protection)" id="٢-٤" theme="bg-teal" />
        <x-sub-domain-info info_ar="ضمان حماية خدمات البريد الإلكتروني من المخاطر السيبرانية."
            info="To ensure the protection of email services from cyber risks." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-2-4-1')
                <x-main-control id="٢-٤-١"
                    details="Cybersecurity requirements for protecting email services must be defined, documented, and approved."
                    details_ar="يجب تحديد متطلبات الأمن السيبراني لحماية خدمات البريد الإلكتروني وتوثيقها والموافقة عليها."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-4-2')
                <x-main-control id="٢-٤-٢"
                    details="The cybersecurity requirements for email services must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني لخدمات البريد الإلكتروني." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-4-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-2-4-3-');
                @endphp
                <x-main-control id="٢-٤-٣"
                    details="The cybersecurity requirements for protecting the email service must include at least the following:"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني لحماية خدمة البريد الإلكتروني ما يلي على الأقل:"
                    :control="$control" :status="$status" />

                <x-sub-control id="١-٣-٤-٢"
                    details="Analyzing and filtering email messages (specifically phishing emails and spam) using advanced and up-to-date email protection techniques.
"
                    details_ar="تحليل وتصفية رسائل البريد الإلكتروني (خاصة رسائل التصيد والبريد العشوائي) باستخدام تقنيات حماية البريد الإلكتروني المتقدمة والحديثة."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-4-3-2')
                <x-sub-control id="٢-٣-٤-٢"
                    details="Multi-factor authentication for remote and webmail access to email service, defining authentication factors, number of factors, and suitable techniques based on the result of impact assessment of authentication failure and bypass."
                    details_ar="المصادقة متعددة العوامل للوصول عن بعد وعبر البريد الإلكتروني إلى خدمة البريد الإلكتروني، وتحديد عوامل المصادقة وعدد العوامل والتقنيات المناسبة بناءً على نتيجة تقييم تأثير فشل المصادقة وتجاوزها."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-4-3-3')
                <x-sub-control id="٣-٣-٤-٢" details="Email archiving and backup."
                    details_ar="النسخ الاحتياطي والأرشفة للبريد الإلكتروني." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-4-3-4')
                <x-sub-control id="٤-٣-٤-٢"
                    details="Secure management and protection against Advanced Persistent Threats (APT), which normally utilize zero-day viruses and malware."
                    details_ar="إدارة وحماية آمنة ضد التهديدات المستمرة المتقدمة (APT)، والتي تستخدم عادةً فيروسات اليوم صفر والبرامج الضارة."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-4-3-5')
                <x-sub-control id="٥-٣-٤-٢"
                    details="Validation of the organization’s email service domains through Haseen platform by using Sender Policy Framework (SPF), Domain Keys Identified Mail (DKIM), and Domain Message Authentication Reporting and Conformance (DMARC)."
                    details_ar="التحقق من صحة نطاقات خدمة البريد الإلكتروني للمنظمة من خلال منصة Haseen باستخدام إطار سياسة المرسل (SPF) والبريد المحدد بمفاتيح المجال (DKIM) وإعداد التقارير والمصادقة على رسائل المجال (DMARC)."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-4-4')
                <x-main-control id="٢-٤-٤"
                    details="The cybersecurity requirements for email service must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني لخدمة البريد الإلكتروني بشكل دوري."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="إدارة أمن الشبكات (Networks Security Management)" id="٢-٥" theme="bg-teal" />
        <x-sub-domain-info info_ar=" To ensure the protection of the organization’s network from cyber risks."
            info="ضمان حماية شبكة المنظمة من المخاطر السيبرانية." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-2-5-1')
                <x-main-control id="٢-٥-١"
                    details="Cybersecurity requirements for network security management must be defined, documented, and approved."
                    details_ar="يجب تحديد متطلبات الأمن السيبراني لإدارة أمن الشبكة وتوثيقها والموافقة عليها."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-5-2')
                <x-main-control id="٢-٥-٢"
                    details="The cybersecurity requirements for network security management must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني لإدارة أمن الشبكات." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-5-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-2-5-3-');
                @endphp
                <x-main-control id="٢-٥-٣"
                    details="The cybersecurity requirements for network security management must include at least the following:"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني لإدارة أمن الشبكة ما يلي على الأقل:"
                    :control="$control" :status="$status" />
                <x-sub-control id="١-٣-٥-٢"
                    details="Logical or physical segregation and segmentation of network segments using firewalls and defense-in-depth principles."
                    details_ar="الفصل والتجزئة المنطقية أو المادية لأجزاء الشبكة باستخدام جدران الحماية ومبادئ الدفاع المتعمق."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-5-3-2')
                <x-sub-control id="٢-٣-٥-٢"
                    details="Network segregation between production, test, and development environments."
                    details_ar="فصل الشبكة بين بيئات الإنتاج والاختبار والتطوير." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-5-3-3')
                <x-sub-control id="٣-٣-٥-٢"
                    details="Secure browsing and Internet connectivity, including restrictions on the use of file storage/sharing and remote access websites, and protection against suspicious websites."
                    details_ar="التصفح الآمن والاتصال بالإنترنت، بما في ذلك القيود المفروضة على استخدام مواقع تخزين/مشاركة الملفات ومواقع الوصول عن بعد، والحماية من المواقع المشبوهة."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-5-3-4')
                <x-sub-control id="٤-٣-٥-٢"
                    details="Wireless network protection using strong authentication and encryption techniques. A comprehensive risk assessment and management exercise must be conducted to assess and manage the cyber risks prior to connecting any wireless networks to the organization’s internal network."
                    details_ar="حماية الشبكة اللاسلكية باستخدام تقنيات المصادقة والتشفير القوية. يجب إجراء تقييم شامل للمخاطر وإدارتها لتقييم وإدارة المخاطر السيبرانية قبل توصيل أي شبكات لاسلكية بالشبكة الداخلية للمؤسسة"
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-5-3-5')
                <x-sub-control id="٥-٣-٥-٢"
                    details="Management and restrictions on network services, protocols, and ports."
                    details_ar="إدارة القيود المفروضة على خدمات الشبكة والبروتوكولات والمنافذ." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-5-3-6')
                <x-sub-control id="٦-٣-٥-٢" details="Intrusion Prevention Systems (IPS)."
                    details_ar="أنظمة منع التطفل (IPS)." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-5-3-7')
                <x-sub-control id="٧-٣-٥-٢"
                    details="Security of Domain Name Service (DNS) through Haseen platform.
"
                    details_ar="أمن خدمة اسم النطاق (DNS) من خلال منصة Haseen ." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-5-3-8')
                <x-sub-control id="٨-٣-٥-٢"
                    details="Secure management and protection of Internet browsing channels against Advanced Persistent Threats (APT), which normally utilize zero-day viruses and malware."
                    details_ar="إدارة آمنة وحماية قنوات تصفح الإنترنت ضد التهديدات المستمرة المتقدمة (APT)، والتي تستخدم عادةً فيروسات اليوم صفر والبرامج الضارة."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-5-3-9')
                <x-sub-control id="٨-٣-٥-٢"
                    details="Protecting against Distributed Denial of Service (DDoS) attacks to limit risks arising from these attacks."
                    details_ar="الحماية من هجمات رفض الخدمة الموزعة ( DDoS ) للحد من المخاطر الناجمة عن هذه الهجمات."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-5-4')
                <x-main-control id="٢-٥-٤"
                    details="The cybersecurity requirements for network security management must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني لإدارة أمن الشبكات بشكل دوري."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="أمن الأجهزة المحمولة (Mobile Devices Security) " id="٢-٦" theme="bg-teal" />
        <x-sub-domain-info
            info_ar="ضمان حماية الأجهزة المحمولة (بما في ذلك أجهزة الكمبيوتر المحمولة والهواتف الذكية والأجهزة اللوحية) من المخاطر الإلكترونية وضمان التعامل الآمن مع معلومات المنظمة (بما في ذلك المعلومات الحساسة) أثناء استخدام سياسة إحضار جهازك الخاص (BYOD)."
            info="To ensure the protection of mobile devices (including laptops, smartphones, tablets) from cyber risks and to ensure the secure handling of the organization’s information (including sensitive information) while utilizing Bring Your Own Device (BYOD) policy." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-2-6-1')
                <x-main-control id="٢-٦-١"
                    details="Cybersecurity requirements for mobile devices security and BYOD must be defined, documented, and approved."
                    details_ar="يجب تحديد متطلبات الأمن السيبراني لأمن الأجهزة المحمولة وأجهزة BYOD وتوثيقها والموافقة عليها."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-6-2')
                <x-main-control id="٢-٦-٢"
                    details="The cybersecurity requirements for mobile devices security and BYOD must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني لأمن الأجهزة المحمولة و BYOD." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-6-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-2-6-3-');
                @endphp
                <x-main-control id="٢-٦-٣"
                    details="The cybersecurity requirements for mobile devices security and BYOD must include at least the following:"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني لأمن الأجهزة المحمولة وأجهزة BYOD ما يلي على الأقل:"
                    :control="$control" :status="$status" />
                <x-sub-control id="١-٣-٦-٢"
                    details="Separation and encryption of organization’s data and information stored on mobile devices and BYODs."
                    details_ar="فصل وتشفير بيانات المنظمة ومعلوماتها المخزنة على الأجهزة المحمولة وأجهزة BYOD."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-6-3-2')
                <x-sub-control id="٢-٣-٦-٢" details="Controlled and restricted use based on job requirements."
                    details_ar="الاستخدام الخاضع للرقابة والمقيد بناءً على متطلبات الوظيفة." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-6-3-3')
                <x-sub-control id="٣-٣-٦-٢"
                    details="Secure wiping of organization’s data and information stored on mobile devices and BYODs in cases of device loss, theft, or after termination/separation from the organization."
                    details_ar="المسح الآمن لبيانات المنظمة ومعلوماتها المخزنة على الأجهزة المحمولة وأجهزة BYOD في حالات فقدان الجهاز أو سرقته أو بعد إنهاء الخدمة/الانفصال عن المنظمة"
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-6-3-4')
                <x-sub-control id="٤-٣-٦-٢" details="Security awareness for mobile devices users."
                    details_ar="الوعي الأمني لمستخدمي الأجهزة المحمولة." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-6-4')
                <x-main-control id="٢-٦-٤"
                    details="The cybersecurity requirements for mobile devices security and BYOD must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني لأمن الأجهزة المحمولة وأجهزة BYOD بشكل دوري."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="حماية البيانات والمعلومات (Data and Information Protection)" id="٢-٧"
            theme="bg-teal" />
        <x-sub-domain-info
            info_ar="ضمان سرية وسلامة وتوافر بيانات ومعلومات المنظمة وفقًا لسياسات وإجراءات المنظمة والقوانين واللوائح ذات الصلة.."
            info="To ensure the confidentiality, integrity, and availability of the organization’s data and information as per organizational policies and procedures, and related laws and regulations.	" />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-2-7-1')
                <x-main-control id="٢-٧-١"
                    details="Cybersecurity requirements for protecting and handling data and information must be defined, documented, and approved as per the related laws and regulations."
                    details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني لحماية البيانات والمعلومات ومعالجتها وفقًا للقوانين واللوائح ذات الصلة. "
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-7-2')
                <x-main-control id="٢-٧-٢"
                    details="The cybersecurity requirements for protecting and handling data and information must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني لحماية البيانات والمعلومات ومعالجتها."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-7-3')
                <x-main-control id="٢-٧-٣"
                    details="The cybersecurity requirements for protecting and handling data and information must include at least the applicable requirements in Data Cybersecurity Controls published by NCA."
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني لحماية البيانات والمعلومات ومعالجتها على الأقل المتطلبات المعمول بها في ضوابط الأمن السيبراني للبيانات التي نشرتها NCA."
                    :control="$control" :status="$status" />
            @endif


            @if ($control->control_id == 'NCA-ECC2-2-7-4')
                <x-main-control id="٢-٧-٤"
                    details="The cybersecurity requirements for protecting and handling data and information must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني لحماية البيانات والمعلومات ومعالجتها بشكل دوري."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="التشفير (Cryptography)" id="٢-٨" theme="bg-teal" />
        <x-sub-domain-info
            info_ar="ضمان الاستخدام السليم والفعال للتشفير لحماية أصول المعلومات وفقًا للسياسات والإجراءات التنظيمية والقوانين واللوائح ذات الصلة."
            info="To ensure the proper and efficient use of cryptography to protect information assets as per organizational policies and procedures, and related laws and regulations." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-2-8-1')
                <x-main-control id="٢-٨-١"
                    details="Cybersecurity requirements for cryptography must be defined, documented, and approved."
                    details_ar="يجب تحديد متطلبات الأمن السيبراني للتشفير وتوثيقها والموافقة عليها."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-8-2')
                <x-main-control id="٢-٨-٢"
                    details="The cybersecurity requirements for cryptography must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني للتشفير." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-8-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-2-8-3-');
                @endphp

                <x-main-control id="٢-٨-٣"
                    details="The cybersecurity requirements for cryptography must include at least the requirements in the National Cryptographic Standards; published by NCA and each national entity is required to choose and implement the appropriate cryptographic standard level based on the nature and sensitivity of the data, systems and networks to be protected, and based on the risk assessment by the entity; and as per related laws and regulations; according to the following:"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني للتشفير على الأقل المتطلبات الواردة في معايير التشفير الوطنية؛ التي نشرتها NCA، ويجب على كل كيان وطني اختيار وتنفيذ مستوى معيار التشفير المناسب بناءً على طبيعة وحساسية البيانات والأنظمة والشبكات التي يجب حمايتها، وبناءً على تقييم المخاطر من قبل الكيان؛ ووفقًا للقوانين واللوائح ذات الصلة؛ وفقًا لما يلي"
                    :control="$control" :status="$status" />

                <x-sub-control id="١-٣-٨-٢"
                    details="Approved cryptographic systems and solutions standards and its technical and regulatory limitations."
                    details_ar="معايير أنظمة التشفير والحلول المعتمدة والقيود الفنية والتنظيمية الخاصة بها."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-8-3-2')
                <x-sub-control id="٢-٣-٨-٢"
                    details="Secure management of cryptographic keys during their lifecycles."
                    details_ar="الإدارة الآمنة لمفاتيح التشفير أثناء دورات حياتها." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-8-3-3')
                <x-sub-control id="٣-٣-٨-٢"
                    details="Encryption of data in-transit, at-rest, and while processing as per classification and related laws and regulations."
                    details_ar="تشفير البيانات أثناء النقل، وفي حالة السكون، وأثناء المعالجة وفقًا للتصنيف والقوانين واللوائح ذات الصلة."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-8-4')
                <x-main-control id="٢-٨-٤"
                    details="The cybersecurity requirements for cryptography must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني للتشفير بشكل دوري." :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="إدارة النسخ الاحتياطية (Backup and Recovery Management)" id="٢-٩"
            theme="bg-teal" />
        <x-sub-domain-info
            info_ar="ضمان حماية بيانات ومعلومات المنظمة بما في ذلك أنظمة المعلومات وتكوينات البرامج من المخاطر السيبرانية وفقًا لسياسات وإجراءات المنظمة والقوانين واللوائح ذات الصلة. "
            info=" To ensure the protection of organization’s data and information including information systems and software configurations from cyber risks as per organizational policies and procedures, and related laws and regulations." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-2-9-1')
                <x-main-control id="٢-٩-١"
                    details="Cybersecurity requirements for backup and recovery management must be defined, documented, and approved.
"
                    details_ar="يجب تحديد متطلبات الأمن السيبراني لإدارة النسخ الاحتياطي والاسترداد وتوثيقها والموافقة عليها.
"
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-9-2')
                <x-main-control id="٢-٩-٢"
                    details="The cybersecurity requirements for backup and recovery management must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني لإدارة النسخ الاحتياطي والاسترداد."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-9-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-2-9-3-');
                @endphp
                <x-main-control id="٢-٩-٣"
                    details="The cybersecurity requirements for backup and recovery management must include at least the following:"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني لإدارة النسخ الاحتياطي والاسترداد ما يلي على الأقل:"
                    :control="$control" :status="$status" />

                <x-sub-control id="١-٣-٩-٢"
                    details="Scope and coverage of backups to cover critical technology and information assets."
                    details_ar="نطاق وتغطية النسخ الاحتياطية لتغطية الأصول التكنولوجية والمعلوماتية الهامة."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-9-3-2')
                <x-sub-control id="٢-٣-٩-٢"
                    details="Ability to perform quick recovery of data and systems after cybersecurity incidents."
                    details_ar="القدرة على إجراء استرداد سريع للبيانات والأنظمة بعد حوادث الأمن السيبراني."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-9-3-3')
                <x-sub-control id="٣-٣-٩-٢" details="Periodic tests of backups."
                    details_ar="اختبارات دورية للنسخ الاحتياطية." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-9-4')
                <x-main-control id="٢-٩-٤"
                    details="The cybersecurity requirements for backup and recovery management must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني لإدارة النسخ الاحتياطي والاسترداد بشكل دوري."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="إدارة الثغرات (Vulnerabilities Management)" id="٢-١٠" theme="bg-teal" />
        <x-sub-domain-info
            info_ar="ضمان الكشف في الوقت المناسب والمعالجة الفعالة للثغرات التقنية لمنع أو تقليل احتمالية استغلال هذه الثغرات لشن هجمات إلكترونية ضد المنظمة."
            info="To ensure timely detection and effective remediation of technical vulnerabilities to prevent or minimize the probability of exploiting these vulnerabilities to launch cyber-attacks against the organization." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-2-10-1')
                <x-main-control id="٢-١٠-١"
                    details="Cybersecurity requirements for technical vulnerabilities management must be defined, documented, and approved."
                    details_ar="يجب تحديد متطلبات الأمن السيبراني لإدارة الثغرات التقنية وتوثيقها والموافقة عليها."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-10-2')
                <x-main-control id="٢-١٠-٢"
                    details="The cybersecurity requirements for technical vulnerabilities management must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني لإدارة الثغرات التقنية." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-10-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-2-10-3-');
                @endphp
                <x-main-control id="٢-١٠-٣"
                    details="The cybersecurity requirements for technical vulnerabilities management must include at least the following:
"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني لإدارة الثغرات التقنية ما يلي على الأقل:"
                    :control="$control" :status="$status" />

                <x-sub-control id="١-٣-١٠-٢" details="Periodic vulnerabilities assessments."
                    details_ar="تقييمات الثغرات الأمنية الدورية." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-10-3-2')
                <x-sub-control id="٢-٣-١٠-٢" details="Vulnerabilities classification based on criticality level."
                    details_ar="تصنيف الثغرات الأمنية بناءً على مستوى الخطورة." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-10-3-3')
                <x-sub-control id="٣-٣-١٠-٢"
                    details="Vulnerabilities remediation based on classification and associated risk levels."
                    details_ar="معالجة الثغرات الأمنية بناءً على التصنيف ومستويات المخاطر المرتبطة بها."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-10-3-4')
                <x-sub-control id="٤-٣-١٠-٢" details="Security patch management." details_ar="إدارة تصحيحات الأمان."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-10-3-5')
                <x-sub-control id="٥-٣-١٠-٢"
                    details="Subscription with authorized and trusted cybersecurity resources for up-to-date information and notifications on technical vulnerabilities."
                    details_ar="الاشتراك في موارد الأمن السيبراني المعتمدة والموثوقة للحصول على معلومات وإشعارات محدثة حول الثغرات الفنية."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-10-4')
                <x-main-control id="٢-١٠-٤"
                    details="The cybersecurity requirements for technical vulnerabilities management must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني لإدارة الثغرات التقنية بشكل دوري."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="اختبار الاختراق (Penetration Testing)" id="٢-١١" theme="bg-teal" />
        <x-sub-domain-info
            info_ar="تقييم وتقويم كفاءة قدرات الدفاع عن الأمن السيبراني في المنظمة من خلال محاكاة الهجمات السيبرانية لاكتشاف نقاط الضعف غير المعروفة داخل البنية التحتية التقنية والتي قد تؤدي إلى خرق سيبراني."
            info="To assess and evaluate the efficiency of the organization’s cybersecurity defense capabilities through simulated cyber-attacks to discover unknown weaknesses within the technical infrastructure that may lead to a cyber-breach." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-2-11-1')
                <x-main-control id="٢-١١-١
"
                    details="Cybersecurity requirements for penetration testing exercises must be defined, documented, and approved."
                    details_ar="يجب تحديد متطلبات الأمن السيبراني لممارسات اختبار الاختراق وتوثيقها والموافقة عليها.
"
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-11-2')
                <x-main-control id="٢-١١-٢"
                    details="The cybersecurity requirements for penetration testing processes must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني لعمليات اختبار الاختراق.

" :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-11-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-2-11-3-');
                @endphp
                <x-main-control id="٢-١١-٣"
                    details="The cybersecurity requirements for penetration testing processes must include at least the following:"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني لعمليات اختبار الاختراق ما يلي على الأقل:

"
                    :control="$control" :status="$status" />
                <x-sub-control id="١-٣-١١-٢"
                    details="Scope of penetration tests which must cover Internet-facing services and its technical components including infrastructure, websites, web applications, mobile apps, email, and remote access."
                    details_ar="نطاق اختبارات الاختراق التي يجب أن تغطي الخدمات التي تواجه الإنترنت ومكوناتها التقنية بما في ذلك البنية التحتية ومواقع الويب وتطبيقات الويب وتطبيقات الهاتف المحمول والبريد الإلكتروني والوصول عن بعد

"
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-11-3-2')
                <x-sub-control id="٢-٣-١١-٢" details="Conducting penetration tests periodically."
                    details_ar="إجراء اختبارات الاختراق بشكل دوري." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-11-4')
                <x-main-control id="٢-١١-٤"
                    details="Cybersecurity requirements for penetration testing processes must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني لعمليات اختبار الاختراق بشكل دوري."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain
            subdomain="إدارة سجلات الأحداث ومراقبة الأمن السيبراني (Cybersecurity Event Logs and Monitoring Management)"
            id="٢-١٢" theme="bg-teal" />
        <x-sub-domain-info
            info_ar="ضمان جمع وتحليل ومراقبة أحداث الأمن السيبراني في الوقت المناسب للكشف المبكر عن الهجمات السيبرانية المحتملة من أجل منع أو تقليل التأثيرات السلبية على عمليات المنظمة"
            info="To ensure timely collection, analysis, and monitoring of cybersecurity events for early detection of potential cyber-attacks in order to prevent or minimize the negative impacts on the organization’s operations." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-2-12-1')
                <x-main-control id="٢-١٢-١"
                    details="Cybersecurity requirements for event logs and monitoring management must be defined, documented, and approved."
                    details_ar="يجب تحديد متطلبات الأمن السيبراني لسجلات الأحداث وإدارة المراقبة وتوثيقها والموافقة عليها."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-12-2')
                <x-main-control id="٢-١٢-٢"
                    details="The cybersecurity requirements for event logs and monitoring management must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني لسجلات الأحداث وإدارة المراقبة."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-12-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-2-12-3-');
                @endphp
                <x-main-control id="٢-١٢-٣"
                    details="The cybersecurity requirements for event logs and monitoring management must include at least the following:"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني لسجلات الأحداث وإدارة المراقبة ما يلي على الأقل:"
                    :control="$control" :status="$status" />
                <x-sub-control id="١-٣-١٢-٢"
                    details="Activation of cybersecurity event logs on critical information assets."
                    details_ar="تنشيط سجلات أحداث الأمن السيبراني على أصول المعلومات الهامة."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-12-3-2')
                <x-sub-control id="٢-٣-١٢-٢"
                    details="Activate event logs for accounts with important and sensitive powers over information assets and remote access events at the entity."
                    details_ar="تنشيط سجلات أحداث الأمن السيبراني على حسابات الوصول عن بعد وحسابات المستخدم المميز."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-12-3-3')
                <x-sub-control id="٣-٣-١٢-٢"
                    details="Identification of required technologies (e.g., SIEM) for cybersecurity event logs collection."
                    details_ar="تحديد التقنيات المطلوبة (على سبيل المثال، SIEM) لجمع سجلات أحداث الأمن السيبراني. "
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-12-3-4')
                <x-sub-control id="٤-٣-١٢-٢" details="Continuous monitoring of cybersecurity events."
                    details_ar="المراقبة المستمرة لأحداث الأمن السيبراني." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-12-3-5')
                <x-sub-control id="٥-٣-١٢-٢"
                    details="Retention period for cybersecurity event logs (must be 12 months minimum)."
                    details_ar="فترة الاحتفاظ بسجلات أحداث الأمن السيبراني (يجب أن تكون 12 شهرًا على الأقل).
"
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-12-4')
                <x-main-control id="٢-١٢-٤"
                    details="The cybersecurity requirements for event logs and monitoring management must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني لسجلات الأحداث وإدارة المراقبة بشكل دوري."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="إدارة حوادث وتهديدات الأمن السيبراني (Cybersecurity Incident and Threat Management)"
            id="٢-١٣" theme="bg-teal" />
        <x-sub-domain-info
            info_ar="ضمان التعرف في الوقت المناسب على حوادث وتهديدات الأمن السيبراني واكتشافها وإدارتها بشكل فعال ومعالجتها لمنع أو تقليل الآثار السلبية على عمليات المنظمة، مع الأخذ في الاعتبار المرسوم الملكي رقم 37140 بتاريخ 14/8/ 1438ه"
            info="To ensure timely identification, detection, effective management, and handling of cybersecurity incidents and threats to prevent or minimize negative impacts on the organization’s operation, taking into consideration the Royal Decree number 37140 dated 14/8/1438H." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-2-13-1')
                <x-main-control id="٢-١٣-١"
                    details="Requirements for cybersecurity incidents and threat management must be defined, documented, and approved."
                    details_ar="يجب تحديد وتوثيق والموافقة على متطلبات حوادث الأمن السيبراني وإدارة التهديدات."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-13-2')
                <x-main-control id="٢-١٣-٢"
                    details="The requirements for cybersecurity incidents and threat management must be implemented."
                    details_ar="يجب تنفيذ متطلبات حوادث الأمن السيبراني وإدارة التهديدات."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-13-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-2-13-3-');
                @endphp
                <x-main-control id="٢-١٣-٣"
                    details="The requirements for cybersecurity incidents and threat management must include at least the following:"
                    details_ar="خطط الاستجابة لحوادث الأمن السيبراني وإجراءات التصعيد."
                    :control="$control" :status="$status" />
                <x-sub-control id="١-٣-١٣-٢"
                    details="Cybersecurity incident response plans and escalation procedures."
                    details_ar="تصنيف حوادث الأمن السيبراني." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-13-3-2')
                <x-sub-control id="٢-٣-١٣-٢" details="Cybersecurity incidents classification."
                    details_ar="الإبلاغ عن حوادث الأمن السيبراني إلى NCA." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-13-3-3')
                <x-sub-control id="٣-٣-١٣-٢" details="Cybersecurity incidents reporting to NCA."
                    details_ar="مشاركة إشعارات الحوادث، ومعلومات التهديد، ومؤشرات الاختراق، والتقارير مع NCA." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-13-3-4')
                <x-sub-control id="٤-٣-١٣-٢
"
                    details="Sharing incidents notifications, threat intelligence, breach indicators, and reports with NCA."
                    details_ar="جمع معلومات استخبارات التهديدات ومعالجتها."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-13-3-5')
                <x-sub-control id="٥-٣-١٣-٢"
                    details="Collecting and handling threat intelligence feeds."
                    details_ar="جمع معلومات استخبارات التهديدات ومعالجتها."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-13-4')
                <x-main-control id="٢-١٣-٤"
                    details="The requirements for cybersecurity incidents and threat management must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات حوادث الأمن السيبراني وإدارة التهديدات بشكل دوري.

"
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="الأمن المادي (Physical Security)" id="٢-١٤" theme="bg-teal" />
        <x-sub-domain-info
            info_ar="ضمان حماية المعلومات والأصول التكنولوجية من الوصول المادي غير المصرح به والخسارة والسرقة والتلف."
            info="To ensure the protection of information and technology assets from unauthorized physical access, loss, theft, and damage." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-2-14-1')
                <x-main-control id="٢-١٤-١"
                    details="Cybersecurity requirements for physical protection of information and technology assets must be defined, documented, and approved."
                    details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني للحماية المادية لأصول المعلومات والتكنولوجيا.
"
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-14-2')
                <x-main-control id="٢-١٤-٢"
                    details="The cybersecurity requirements for physical protection of information and technology assets must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني للحماية المادية لأصول المعلومات والتكنولوجيا."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-14-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-2-14-3-');
                @endphp
                <x-main-control id="٢-١٤-٣"
                    details="The cybersecurity requirements for physical protection of information and technology assets must include at least the following:
"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني للحماية المادية لأصول المعلومات والتكنولوجيا ما يلي على الأقل: 
"
                    :control="$control" :status="$status" />
                <x-sub-control id="١-٣-١٤-٢"
                    details="Authorized access to sensitive areas within the organization (e.g., data center, disaster recovery center, sensitive information processing facilities, security surveillance center, network cabinets)."
                    details_ar="الوصول المعتمد إلى المناطق الحساسة داخل المنظمة (على سبيل المثال، مركز البيانات، مركز التعافي من الكوارث، مرافق معالجة المعلومات الحساسة، مركز مراقبة الأمن، خزائن الشبكة).

"
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-14-3-2')
                <x-sub-control id="٢-٣-١٤-٢" details="Facility entry/exit records and CCTV monitoring."
                    details_ar="سجلات الدخول والخروج من المنشأة ومراقبة كاميرات المراقبة." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-14-3-3')
                <x-sub-control id="٣-٣-١٤-٢" details="Protection of facility entry/exit and surveillance records."
                    details_ar="حماية سجلات الدخول والخروج والمراقبة الخاصة بالمنشأة." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-14-3-4')
                <x-sub-control id="٤-٣-١٤-٢"
                    details="Secure destruction and re-use of physical assets that hold classified information (including documents and storage media)."
                    details_ar="التدمير الآمن وإعادة استخدام الأصول المادية التي تحتوي على معلومات سرية (بما في ذلك المستندات ووسائط التخزين).

"
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-14-3-5')
                <x-sub-control id="٥-٣-١٤-٢"
                    details="Security of devices and equipment inside and outside the organization’s facilities."
                    details_ar="أمن الأجهزة والمعدات داخل وخارج مرافق المنظمة." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-2-14-4')
                <x-main-control id="٢-١٤-٤"
                    details="The cybersecurity requirements for physical protection of information and technology assets must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني للحماية المادية لأصول المعلومات والتكنولوجيا بشكل دوري."
                    :control="$control" />
            @endif
        @endforeach

        <x-sub-domain subdomain="حماية تطبيقات الويب (Web Application Security)" id="٢-١٥" theme="bg-teal" />
        <x-sub-domain-info info_ar="ضمان حماية تطبيقات الويب الخارجية ضد المخاطر السيبرانية."
            info="To ensure the protection of external web applications against cyber risks." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-2-15-1')
                <x-main-control id="٢-١٥-١"
                    details="Cybersecurity requirements for external web applications must be defined, documented, and approved.
"
                    details_ar="يجب تحديد متطلبات الأمن السيبراني لتطبيقات الويب الخارجية وتوثيقها والموافقة عليها. 
"
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-15-2')
                <x-main-control id="٢-١٥-٢"
                    details="The cybersecurity requirements for external web applications must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني لتطبيقات الويب الخارجية."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-15-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-2-15-3-');
                @endphp
                <x-main-control id="٢-١٥-٣"
                    details="The cybersecurity requirements for external web applications must include at least the following:"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني لتطبيقات الويب الخارجية ما يلي على الأقل:"
                    :control="$control" :status="$status" />
                <x-sub-control id="١-٣-١٥-٢"
                    details="Use of web application firewall."
                    details_ar="استخدام جدار حماية تطبيقات الويب." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-15-3-2')
                <x-sub-control id="٢-٣-١٥-٢"
                    details="Adoption of the multi-tier architecture principle."
                    details_ar="اعتماد مبدأ الهندسة المعمارية متعددة الطبقات."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-15-3-3')
                <x-sub-control id="٣-٣-١٥-٢" details="Use of secure protocols (e.g., HTTPS)."
                    details_ar="استخدام البروتوكولات الآمنة (على سبيل المثال، HTTPS)." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-15-3-4')
                <x-sub-control id="٤-٣-١٥-٢" details="Clarification of the secure usage policy for users."
                    details_ar="توضيح سياسة الاستخدام الآمن للمستخدمين." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-15-3-5')
                <x-sub-control id="٥-٣-١٥-٢" details="Multi-Factor Authentication for user logins."
                    details_ar="التحقق من الهوية متعدد العناصر (Multi-Factor Authentication) لعمليات دخول المستخدمين.

"
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-2-15-4')
                <x-main-control id="٢-١٥-٤"
                    details="User authentication based on defined number and factors of authentication, as a result of impact assessment of authentication failure and bypass for users’ access."
                    details_ar="مصادقة المستخدم بناءً على عدد محدد وعوامل المصادقة، نتيجة لتقييم تأثير فشل المصادقة وتجاوز وصول المستخدمين."
                    :control="$control" />
            @endif
        @endforeach

        <x-main-domain domain="٣- صمود الأمن السيبراني (Cybersecurity Resilience)" theme="bg-dark" />
        <x-sub-domain subdomain="جوانب صمود الأمن السيبراني في إدارة استمرارية الأعمال" id="٣-١"
            theme="bg-dark" />
        <x-sub-domain-info info_ar="ضمان إدراج متطلبات مرونة الأمن السيبراني ضمن إدارة استمرارية الأعمال في المنظمة ومعالجة وتقليل التأثيرات على الأنظمة ومرافق معالجة المعلومات والخدمات الإلكترونية الهامة الناجمة عن الكوارث الناجمة عن حوادث الأمن السيبراني."
            info="To ensure the inclusion of the cybersecurity resiliency requirements within the organization’s business continuity management and to remediate and minimize the impacts on systems, information processing facilities, and critical e-services from disasters caused by cybersecurity incidents." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-3-1-1')
                <x-main-control id="٣-١-١"
                    details="Cybersecurity requirements for business continuity management must be defined, documented, and approved."
                    details_ar="يجب تحديد متطلبات الأمن السيبراني لإدارة استمرارية الأعمال وتوثيقها والموافقة عليها."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-3-1-2')
                <x-main-control id="٣-١-٢"
                    details="The cybersecurity requirements for business continuity management must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني لإدارة استمرارية الأعمال."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-3-1-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-3-1-3-');
                @endphp
                <x-main-control id="٣-١-٣" details="The cybersecurity requirements for business continuity management must include at least the following:"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني لإدارة استمرارية الأعمال ما يلي على الأقل:" :control="$control"
                    :status="$status" />

                <x-sub-control id="١-٣-١-٣"
                    details="Ensuring the continuity of cybersecurity systems and procedures."
                    details_ar="ضمان استمرارية أنظمة وإجراءات الأمن السيبراني."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-3-1-3-2')
                <x-sub-control id="٢-٣-١-٣"
                    details="Developing response plans for cybersecurity incidents that may affect business continuity."
                    details_ar="تطوير خطط الاستجابة لحوادث الأمن السيبراني التي قد تؤثر على استمرارية الأعمال."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-3-1-3-3')
                <x-sub-control id="٣-٣-١-٣" details="Developing disaster recovery plans."
                    details_ar="تطوير خطط التعافي من الكوارث." :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-3-1-4')
                <x-main-control id="٣-١-٤"
                    details="The cybersecurity requirements for business continuity management must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني لإدارة استمرارية الأعمال بشكل دوري."
                    :control="$control" />
            @endif
        @endforeach

        <x-main-domain
            domain=" (Third-Party and Cloud Computing Cybersecurity)" />
        <x-sub-domain subdomain="الأمن السيبراني المتعلق بالأطراف الخارجية (Third-Party Cybersecurity)"
            id="٤-١" />
        <x-sub-domain-info
            info="To ensure the protection of assets against the cybersecurity risks related to third-parties, including outsourcing and managed services, as per organizational policies and procedures, and related laws and regulations."
            info_ar="ضمان حماية الأصول ضد مخاطر الأمن السيبراني المتعلقة بأطراف ثالثة، بما في ذلك خدمات الاستعانة بمصادر خارجية والخدمات المدارة، وفقًا لسياسات وإجراءات المنظمة والقوانين واللوائح ذات الصلة." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-4-1-1')
                <x-main-control id="٤-١-١"
                    details="Cybersecurity requirements for contracts and agreements with third-parties must be identified, documented, and approved."
                    details_ar="يجب تحديد متطلبات الأمن السيبراني للعقود والاتفاقيات مع أطراف ثالثة وتوثيقها والموافقة عليها."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-4-1-2-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-4-1-2-');
                @endphp
                <x-main-control id="٤-١-٢"
                    details="The cybersecurity requirements for contracts and agreements with third-parties (e.g., Service Level Agreement - SLA) which may affect, if impacted, the organization’s data or services must include at least the following:"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني للعقود والاتفاقيات مع أطراف ثالثة (على سبيل المثال، اتفاقية مستوى الخدمة - SLA) التي قد تؤثر، في حالة تأثرها، على بيانات أو خدمات المنظمة ما يلي على الأقل:"
                    :control="$control" :status="$status" />

                <x-sub-control id="١-٢-١-٤"
                    details="Non-disclosure clauses and secure removal of organization’s data by third-parties upon end of service."
                    details_ar="بنود عدم الإفصاح والإزالة الآمنة لبيانات المنظمة من قبل أطراف ثالثة عند انتهاء الخدمة."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-4-1-2-2')
                <x-sub-control id="٢-٢-١-٤"
                    details="Communication procedures in the event of a cybersecurity incident."
                    details_ar="إجراءات الاتصال في حالة وقوع حوادث الأمن السيبراني." :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-4-1-2-3')
                <x-sub-control id="٣-٢-١-٤"
                    details="Requirements for third-parties to comply with related organizational policies and procedures, laws, and regulations."
                    details_ar="متطلبات امتثال الأطراف الثالثة للسياسات والإجراءات والقوانين واللوائح التنظيمية ذات الصلة."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-4-1-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-4-1-3-');
                @endphp
                <x-main-control id="٤-١-٣"
                    details="The cybersecurity requirements for contracts and agreements with IT outsourcing and managed services third-parties must include at least the following:"
                    details_ar="يجب أن تتضمن متطلبات الأمن السيبراني للعقود والاتفاقيات مع أطراف ثالثة متخصصة في الاستعانة بمصادر خارجية لتكنولوجيا المعلومات والخدمات المدارة ما يلي على الأقل:"
                    :control="$control" :status="$status" />

                <x-sub-control id="١-٣-١-٤"
                    details="Conducting a cybersecurity risk assessment to ensure the availability of risk mitigation controls before signing contracts and agreements or upon changes in related regulatory requirements."
                    details_ar="إجراء تقييم لمخاطر الأمن السيبراني لضمان توفر ضوابط التخفيف من المخاطر قبل توقيع العقود والاتفاقيات أو عند حدوث تغييرات في المتطلبات التنظيمية ذات الصلة."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-4-1-3-2')
                <x-sub-control id="٢-٣-١-٤"
                    details="Cybersecurity managed services centers for monitoring and operations must be completely present inside the Kingdom of Saudi Arabia."
                    details_ar="يجب أن تكون مراكز خدمات الأمن السيبراني المُدارة للمراقبة والعمليات موجودة بشكل كامل داخل المملكة العربية السعودية."
                    :control="$control" />
            @endif

            @if ($control->control_id == 'NCA-ECC2-4-1-4')
                <x-main-control id="٤-١-٤"
                    details="The cybersecurity requirements for contracts and agreements with third-parties must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني للعقود والاتفاقيات مع أطراف ثالثة بشكل دوري." :control="$control" />
            @endif
        @endforeach

        <x-sub-domain id="٤-٢"
            subdomain="الأمن السيبراني المتعلق بالحوسبة السحابية والاستضافة (Cloud Computing and Hosting Cybersecurity)" />
        <x-sub-domain-info
            info="To ensure the proper and efficient remediation of cyber risks and the implementation of cybersecurity requirements related to hosting and cloud computing as per organizational policies and procedures, and related laws and regulations. It is also to ensure the protection of the organization’s information and technology assets hosted on the cloud or processed/managed by third-parties."
            info_ar="ضمان المعالجة السليمة والفعالة للمخاطر السيبرانية وتنفيذ متطلبات الأمن السيبراني المتعلقة بالاستضافة والحوسبة السحابية وفقًا لسياسات وإجراءات المنظمة والقوانين واللوائح ذات الصلة. كما يهدف أيضًا إلى ضمان حماية أصول المعلومات والتكنولوجيا الخاصة بالمنظمة المستضافة على السحابة أو المعالجة/المدارة من قبل أطراف ثالثة." />

        @foreach ($report as $control)
            @if ($control->control_id == 'NCA-ECC2-4-2-1')
                <x-main-control id="٤-٢-١"
                    details="Cybersecurity requirements related to the use of hosting and cloud computing services must be defined, documented, and approved."
                    details_ar="يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني المتعلقة باستخدام خدمات الاستضافة والحوسبة السحابية."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-4-2-2')
                <x-main-control id="٤-٢-٢"
                    details="The cybersecurity requirements related to the use of hosting and cloud computing services must be implemented."
                    details_ar="يجب تنفيذ متطلبات الأمن السيبراني المتعلقة باستخدام خدمات الاستضافة والحوسبة السحابية."
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-4-2-3-1')
                @php
                    $status = getParentStatus($report, 'NCA-ECC2-4-2-3-');
                @endphp

                <x-main-control id="٤-٢-٣"
                    details="In line with related and applicable laws and regulations, and in addition to the applicable ECC controls from main domains (1), (2), (3), and subdomain (4.1), the cybersecurity requirements related to the use of hosting and cloud computing services must include at least the following:"
                    details_ar="بما يتماشى مع القوانين واللوائح ذات الصلة والقابلة للتطبيق، وبالإضافة إلى ضوابط ECC المعمول بها من المجالات الرئيسية (1)، (2)، (3)، والمجال الفرعي (4.1)، يجب أن تتضمن متطلبات الأمن السيبراني المتعلقة باستخدام خدمات الاستضافة والحوسبة السحابية ما يلي على الأقل:"
                    :control="$control" :status="$status" />

                <x-sub-control id="١-٣-٢-٤"
                    details="Classification of data prior to hosting on cloud or hosting services and returning data (in a usable format) upon service completion."
                    details_ar="تصنيف البيانات قبل الاستضافة على السحابة أو خدمات الاستضافة وإرجاع البيانات (بتنسيق قابل للاستخدام) عند اكتمال الخدمة.
"
                    :control="$control" />
            @endif
            @if ($control->control_id == 'NCA-ECC2-4-2-3-2')
                <x-sub-control id="٢-٣-٢-٤"
                    details="Separation of organization’s environments (specifically virtual servers) from other environments hosted at the cloud service provider."
                    details_ar="فصل بيئات المنظمة (الخوادم الافتراضية على وجه التحديد) عن البيئات الأخرى المستضافة لدى مزود الخدمة السحابية."
                    :control="$control" />
            @endif
            
            @if ($control->control_id == 'NCA-ECC2-4-2-4')
                <x-main-control id="٤-٢-٤"
                    details="The cybersecurity requirements related to the use of hosting and cloud computing services must be reviewed periodically."
                    details_ar="يجب مراجعة متطلبات الأمن السيبراني المتعلقة باستخدام خدمات الاستضافة والحوسبة السحابية بشكل دوري."
                    :control="$control" />
            @endif
        @endforeach
    </tbody>
</table>
@endsection
