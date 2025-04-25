@extends('pdf.partials.layout')
@section('title', 'NCA OSMACC 2021 Assessment and Compliance')
@section('action-buttons')
    <a href="{{ route('osmacc-regulatory-summary.show') }}?controlAssessmentId={{ $controlAssessmentId }}" class="btn-report">
        <p>تقرير ملخص</p>
        <p>Summary Report</p>
    </a>
    {{-- <a href="{{ route('regulatory-reports.create') }}?best_practice=NCA-OSMACC-2021" class="btn-report">
        <p>تقرير مفصل</p>
        <p>Detailed Report</p>
    </a> --}}
    {{-- <a href="{{ url()->full() }}&download=pdf" class="btn-report">
        <p>تحميل بصيغة </p>
        <p>Download PDF</p>
    </a> --}}
    <a href="{{ route('osmacc-regulatory-report.excel') }}" class="btn-report">
        <p>تنزيل بصيغة إكسل</p>
        <p>Download in Excel</p>
    </a>
    <a href="{{ route('osmacc-regulatory-report.show') }}?pdf=1" class="btn-report">
        <p>تنزيل بصيغة بي دي إف</p>
        <p>Download as PDF</p>
    </a>
@endsection

@section('header')
    <h1 class="arabic-text">
        الهيئة الوطنية للأمن السيبراني - ضوابط الأمن السيبراني لحساب وسائل
        التواصل الاجتماعي التنظيمي
    </h1>
    <p style="margin-top: 20px">Control Assessment Regulator Reports</p>
    <p>National Cybersecurity Authority - Organizational Social Media Account
        Cybersecurity Controls (NCA-OSMACC)</p>
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
                        <span>Sub-control</span>
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
                @if ($control->control_id == 'NCA-OSMACC-1-1-1-1')
                    <x-main-control-alt main_domain="(Cybersecurity Governance)" main_domain_ar="١- حوكمة الأمن السيبراني "
                        main_domain_id="١-١" sub_domain="(Cybersecurity Policies and Procedures)	"
                        sub_domain_ar="سياسات وإجراءات الأمن السيبراني" control_id="١-١-١"
                        description="Referring to officer 1-3-1 in the basic controls of cybersecurity, cybersecurity policies and procedures must include the following: 1-1-1-1 Determine and document the cybersecurity requirements and controls for social networking accounts within the cybersecurity policies of the home Eh."
                        description_ar="رجوعــاً للضابــط ١-٣-١ في الضوابــط الأساســية للأمــن الســيبراني، يجــب أن تشــمل سياســات وإجــراءات الأمــن الســيبراني مــا يــأتي:
 ١-١-١-١ تحديــد وتوثيــق متطلبــات وضوابــط الأمــن الســيبراني لحســابات التواصــل الاجتماعــي ضمــن سياســات الأمــن الســيبراني للجهــة."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-1-2-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-OSMACC-1-2-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="١-٢"
                        sub_domain="(Cybersecurity Risk Management)	" sub_domain_ar="إدارة مخاطر الأمن السيبراني "
                        control_id="١-٢-١"
                        description="In addition to the controls within sub-component 5-1 of the basic controls for cybersecurity, the methodology for managing cybersecurity risks should include, at a minimum, the following:"
                        description_ar="بالإضافـة للضوابـط ضمـن المكـون الفرعـي ١-٥ في الضوابـط الأساسـية للأمـن السـيبراني، يجـب أن تشـمل منهجيـة إدارة مخاطـر الأمـن الســيبراني بحـد أدنى مـا يـأتي:
"
                        :control="$control" :status="$status" />

                    <x-sub-control-alt control_id="١-٢-١-١"
                        description="Evaluate the cybersecurity risks of social networking accounts, at least once a year."
                        description_ar="تقييــم مخاطــر الأمــن الســيبراني لحســابات التواصــل الاجتماعــي، مــرة واحــدة ســنوياً، عــلى الأقــل."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-1-2-1-2')
                    <x-sub-control-alt control_id="١-٢-١-٢"
                        description="Assessment of cybersecurity risks when planning and before allowing the use of social networks."
                        description_ar="تقييـم مخاطـر الأمـن السـيبراني عنـد التخطيـط وقبـل السـماح باسـتخدام شـبكات التواصــل الاجتماعي.
"
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-1-2-1-3')
                    <x-sub-control-alt control_id="١-٢-١-٣"
                        description="Include cybersecurity risks related to social networking accounts, services and systems used in that in the entity's cybersecurity risk register, and follow-up at least once a year."
                        description_ar="تضميــن مخاطــر الأمــن الســيبراني الخاصــة بحســابات التواصــل الاجتماعــي والخدمــات والأنظمــة المســتخدمة في ذلــك في ســجل مخاطــر الأمــن الســيبراني الخــاص بالجهــة، ومتابعتــه مــرة واحــدة ســنوياً، علــى الأقــل."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-1-3-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-OSMACC-1-3-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="١-٣"
                        sub_domain="(Cybersecurity in Human Resources)	"
                        sub_domain_ar="الأمن السيبراني المتعلق بالموارد البشرية" control_id="١-٣-١"
                        description="In addition to the sub-controls under Control 4-9-1 in the basic controls of cybersecurity, the cybersecurity requirements related to the workers responsible for managing the social media accounts of the entity must include, at a minimum, the following:"
                        description_ar="بالإضافـة للضوابـط الفرعيــة ضمــن الضابــط  ١–٩– ٤ في الضوابـط الأساسـية للأمـن السـيبراني، يجـب أن تشـمل متطلبـات الأمـن السـيبراني المتعلقـة بالعاملـين المسـؤولين عـن إدارة حسـابات التواصـل الاجتماعـي للجهـة بحـد أدنى مـا يـأتي:"
                        :control="$control" :status="$status" />

                    <x-sub-control-alt control_id="١-٣-١-١" description="Cybersecurity awareness of social media accounts."
                        description_ar="التوعية بالأمن السيبراني لحسابات التواصل الاجتماعي." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-1-3-1-2')
                    <x-sub-control-alt control_id="١-٣-١-٢"
                        description="Applying and adhering to cybersecurity requirements in accordance with cybersecurity policies, procedures and processes for social media accounts."
                        description_ar="تطبيـق متطلبـات الأمــن السـيبراني والالـتــزام بهـا وفقـاً لسياسـات وإجــــراءات وعمليــات الأمــن الســيبراني لحســابات التواصــل الاجتماعــي."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-1-4-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-OSMACC-1-4-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="١-٤"
                        sub_domain="(Cybersecurity Awareness and Training)	"
                        sub_domain_ar="برنامج التوعية والتدريب بالأمن السيبراني" control_id="١-٤-١"
                        description="In addition to the sub-controls within Control 3-10-1 in the basic controls of cybersecurity, the cybersecurity awareness program must cover the cyber risks and threats of social networking accounts and the safe use to reduce these risks and threats, including:"
                        description_ar="بالإضافـة للضوابـط الفرعيـة ضمـن الضابـط  ١-١٠-٣ في الضوابـط الأساسـية للأمـن السـيبراني، فإنه يجـب أن يغطـي برنامـج التوعيـة بالأمـن السـيبراني المخاطـر والتهديـدات السـيبرانية لحسـابات التواصـل الاجتماعـي والاسـتخدام الآمـن للحـد مـن هـذه المخاطـر والتهديـدات، بمـا في ذلـك: "
                        :control="$control" :status="$status" />

                    <x-sub-control-alt control_id="١-٤-١-١"
                        description="The safe use, maintenance and protection of devices designated for social networking accounts. It does not contain classified data or use it for personal purposes."
                        description_ar="الاسـتخدام الآمـن للأجهـزة المخصصـة لحسـابات التواصـل الاجتماعـي والمحافظـة عليهـا وحمايتهـا. وعـدم احتوائهـا عـلى بيانـات مصنفـة أو اسـتخدامها لأغـراض شـخصية.
"
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-1-4-1-2')
                    <x-sub-control-alt control_id="١-٤-١-٢"
                        description="Safe handling of login identities, passwords and security questions."
                        description_ar="التعامل الآمن مع هويات الدخول وكلمات المرور والأسئلة الأمنية." :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-1-4-1-3')
                    <x-sub-control-alt control_id="١-٤-١-٣"
                        description="Plan to restore social media accounts and deal with cyber incidents."
                        description_ar="خطة استعادة حسابات التواصل الاجتماعي والتعامل مع الحوادث السيبرانية."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-1-4-1-4')
                    <x-sub-control-alt control_id="١-٤-١-٤"
                        description="Safe dealing with applications and solutions used for social media accounts."
                        description_ar="التعامــل الآمــن مــع التطبيقــات والحلــول المســتخدمة لحســابات التواصــل الاجتماعــي."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-1-4-1-5')
                    <x-sub-control-alt control_id="١-٤-١-٥"
                        description="Not using official social media accounts for personal purposes such as browsing."
                        description_ar="عـدم اسـتخدام حسـابات التواصـل الاجتماعـي الرسـمية لأغـراض شـخصية مثـل التصفـح."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-1-4-1-6')
                    <x-sub-control-alt control_id="١-٤-١-٦"
                        description="Avoid logging into social media accounts using untrusted public devices or networks."
                        description_ar="تجنــب الدخــول لحســابات التواصــل الاجتماعــي باســتخدام أجهــزة أو شــبكات عامـة غيـر موثوقـة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-1-4-1-7')
                    <x-sub-control-alt control_id="١-٤-١-٧"
                        description="Communicate directly with the department concerned with cyber security in the entity if a cyber security threat is suspected."
                        description_ar="التواصــل مبــاشرة مــع الإدارة المعنيــة بالأمــن الســيبراني في الجهــة حــال الاشــتباه بتهديـد أمـن سـيبراني.

"
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-1-4-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain="" sub_domain_ar=""
                        control_id="١-٤-٢"
                        description="In addition to the sub-controls within Control 4-10-1 in the basic controls of cybersecurity, the workers responsible for managing the social media accounts of the entity must be trained on the technical skills, plans and procedures necessary to ensure the application of security requirements and practices. He sees me when using social media accounts."
                        description_ar="بالإضافـة للضوابـط الفرعيـة ضمـن الضابـط  ١-١٠-٤ في الضوابـط الأساسـية للأمـن السـيبراني، فإنـه يجـب تدريـب العاملـين المسـؤولين عـن إدارة حسـابات التواصـل الاجتماعـي للجهـة عـلى المهــارات التقنيــة والخطــط والإجــراءات اللازمــة لضــمان تطبيــق متطلبــات وممارســات الأمــن الســيبراني عنــد اســتخدام حســابات التواصــل الاجتماعــي."
                        :control="$control" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-1-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-OSMACC-2-2-1-');
                    @endphp
                    <x-main-control-alt main_domain="(Cybersecurity Defense)" main_domain_ar="٢- تعزيز الأمن السيبراني "
                        main_domain_id="٢-١" sub_domain="(Asset Management)	" sub_domain_ar="إدارة الأصول "
                        control_id="٢-١-١"
                        description="In addition to the controls within subdomain 2-1 in the ECC, cybersecurity requirements for managing infromation and technology assets must include at least the following:"
                        description_ar="باإلضافـة للضوابـط ضمـن املكـون الفرعـي 1-2 يف الضوابـط األساسـية لألمـن السـيرباين، يجـب أن تشـمل متطلبـات األمـن السـيرباين إلدارة األصـول املعلوماتيـة والتقنيـة، بحـد أدىن، مايـي:"
                        :control="$control" theme="bg-teal" border_t="true" :status="$status" />

                    <x-sub-control-alt control_id="٢-١-١-١"
                        description="Identifying and inventorying organization’s social media accounts, and
information and technology assets related to them, and updating them at
least once, every year."
                        description_ar=" يجــب تحديــد وحــر حســابات التواصــل االجتامعــي واألصــول املعلوماتيــة
والتقنيــة املتعلقــة بهــا، وتحديثهــا مــرة واحــدة، كل ســنة؛ عــى األقــل."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-2-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-OSMACC-2-2-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٢"
                        sub_domain="(Identity and Access Management)" sub_domain_ar="إدارة هويات الدخول والصلاحيات "
                        control_id="٢-٢-١"
                        description="In addition to the sub-controls within Control 3-2-2 in the basic controls of cybersecurity, the cybersecurity requirements related to managing login identities and permissions for social networking accounts of the entity must cover, at a minimum, the following:"
                        description_ar="بالإضافـة للضوابـط الفرعيـة ضمـن الضابـط  ٢-٢-٣ في الضوابـط الأساسـية للأمـن السـيبراني، يجـب أن تغطـي متطلبـات الأمـن السـيبراني المتعلقـة بـإدارة هويـات الدخـول، والصلاحيـات لحسـابات
التواصـل الاجتماعـي للجهـة، بحـد أدنى، مايـلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="٢-٢-١-١"
                        description="Use social media accounts for entities, not individuals."
                        description_ar="استخدام حسابات التواصل الاجتماعي المخصصة للجهات، وليس الأفراد.
" :control="$control"
                        theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-2-1-2')
                    <x-sub-control-alt control_id="٢-٢-١-٢"
                        description="Register using official information (an official e-mail for social media and an official mobile number), and not using personal information."
                        description_ar="التسـجيل باسـتخدام معلومـات رسـمية (بريـد إلكتـروني رسـمي خـاص لوسـائل
التواصـل الاجتماعـي ورقـم جـوال رسـمي)، وعـدم اسـتخدام معلومات شـخصية.
"
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-2-1-3')
                    <x-sub-control-alt control_id="٢-٢-١-٣"
                        description="Document social media accounts and maintain a consistent identity across all social media accounts used; To facilitate the identification of official accounts, and the discovery of fraudulent accounts."
                        description_ar="توثيــق حســابات التواصــل الاجتماعــي والمحافظــة عــلى هويــة متســقة في
جميـع حسـابات التواصـل الاجتماعـي المسـتخدمة؛ لتسـهيل معرفـة الحسـابات
الرســمية، واكتشــاف حســابات الاحتيــال."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-2-1-4')
                    <x-sub-control-alt control_id="٢-٢-١-٤"
                        description="Use a secure and private password for all social media accounts. And change the password periodically, and not to re-use a password that was used before."
                        description_ar="اســتخدام كلمــة مــرور آمنــة وخاصــة لــكل حســابات التواصــل الاجتماعــي. وتغييــر كلمــة المــرور بشــكل دوري، وعــدم إعــادة اســتخدام كلمــة مــرور تــم اســتخدامها مــن قبــل."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-2-1-5')
                    <x-sub-control-alt control_id="٢-٢-١-٥"
                        description="Using multi-factor authentication for logins to social media accounts."
                        description_ar="اســتخدام التحقــق مــن الهويــة متعــدد العنــاصر (Multi-Factor Authentication) لعمليــات الدخــول لحســابات التواصــل الاجتماعــي."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-2-1-6')
                    <x-sub-control-alt control_id="٢-٢-١-٦"
                        description="Activate and update security questions and document them in a safe place."
                        description_ar="تفعيل وتحديث الأسئلة الأمنية وتوثيقها في مكان آمن." :control="$control"
                        theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-2-1-7')
                    <x-sub-control-alt control_id="٢-٢-١-٧"
                        description="Manage users' permissions for social media accounts based on business needs, taking into account the sensitivity of the accounts, the level of permissions, and the type of devices and systems used."
                        description_ar="إدارة صلاحيــات المســتخدمين لحســابات التواصــل الاجتماعــي بنــاءً علــى
احتياجــات العمــل، مــع مراعــاة حساســية الحســابات ومســتوى الصلاحيــات،
ونوعيــة الأجهــزة والأنظمــة المســتخدمة.
"
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-2-1-8')
                    <x-sub-control-alt control_id="٢-٢-١-٨"
                        description="Restricting the powers of service providers to manage social media accounts, automatic monitoring of social media accounts, or protecting the identity of the entity from impersonation."
                        description_ar="حـصر صلاحيـات مقدمـي خدمـة إدارة حسـابات التواصـل الاجتماعـي أو المراقبة
الآليـة لحسـابات التواصـل الاجتماعـي أو حمايـة هويـة الجهـة مـن الانتحال."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-2-1-9')
                    <x-sub-control-alt control_id="٢-٢-١-٩"
                        description="Restricting access to the entity's social media accounts from specific devices."
                        description_ar="حــصر إمكانيــة الدخــول لحســابات التواصــل الاجتماعــي للجهــة مــن أجهــزة محــددة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-2-2')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٢-٢-٢"
                        description="Referring to sub-control 2-2-3-5 in the basic controls of cybersecurity, the login identities and permissions used for the social networking accounts of the entity must be reviewed, at a minimum once a year."
                        description_ar="رجوعـاً للضابـط الفرعـي  ٢-٢-٣-٥ في الضوابـط الأساسـية للأمـن السـيبراني، يجـب مراجعـة هويات الدخـول والصلاحيـات المسـتخدمة لحسـابات التواصـل الاجتماعـي للجهـة، بحـد أدنى مـرة واحـدة كل سـنة."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-3-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-OSMACC-2-3-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٣"
                        sub_domain="(Information System and Processing Facilities Protection)	"
                        sub_domain_ar="حماية الأنظمة وأجهزة معالجة المعلومات" control_id="٢-٣-١"
                        description="In addition to the sub-controls within Control 3-3-2 in the basic controls of cybersecurity, the cybersecurity requirements to protect the social networking accounts of the entity and its technical assets must cover, at a minimum, the following:"
                        description_ar="بالإضافـة للضوابـط الفرعيـة ضمـن الضابـط  ٢-٣-٣ في الضوابـط الأساسـية للأمـن السـيبراني، يجـب أن تغطـي متطلبـات الأمـن السـيبراني لحمايـة حسـابات التواصـل الاجتماعـي للجهـة، والأصـول التقنيـة الخاصـة بهـا، بحـد أدنى، مايـلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="٢-٣-١-١"
                        description="Apply update packages and security fixes for social networking applications, at least once a month."
                        description_ar="تطبيـق حـزم التحديثـات، والإصلاحـات الأمنيـة لتطبيقـات التواصـل الاجتماعـي، مـرة واحـدة شـهرياً عــلى الأقـل."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-3-1-2')
                    <x-sub-control-alt control_id="٢-٣-١-٢"
                        description="Review the protection and immunization settings of the entity's social networking accounts and their technical assets (Secure Configuration and Hardening), at least once a year."
                        description_ar="مراجعـة إعـدادات الحمايـة والتحصـين لحسـابات التواصـل الاجتماعـي للجهـة
والأصــول التقنيــة الخاصــة بهــا (Secure Configuration and Hardening)، مـرة واحـدة كل سـنة علـى الأقـل."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-3-1-3')
                    <x-sub-control-alt control_id="٢-٣-١-٣"
                        description="Review and fortify the factory settings (Default Configuration) for social media accounts and technical assets, including the presence of fixed passwords or pre-login, and lockout."
                        description_ar="مراجعـة وتحصيـن الإعـدادات المصنعيـة (Default Configuration) لحسـابات
التواصــل الاجتماعــي والأصــول التقنيــة، ومنهــا وجــود كلــمات مــرور ثابتــة أو
تسـجيل الدخـول المسـبق، وإقفـال الأجهـزة (Lockout)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-3-1-4')
                    <x-sub-control-alt control_id="٢-٣-١-٤"
                        description="Restricting the activation of features and services in social networking accounts as needed, provided that potential cyber risks are analyzed in case they need to be activated."
                        description_ar="تقييـد تفعيـل الخصائـص والخدمـات في حسـابات التواصـل الاجتماعـي حسـب
الحاجــة، عـلـى أن يتــم تحليــل المخاطــر الســيبرانية المحتملــة في حــال الحاجــة
لتفعيلهـا."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-4-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-OSMACC-2-4-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٤"
                        sub_domain="(Mobile Devices Security)" sub_domain_ar="أمن الأجهزة المحمولة " control_id="٢-٤-١"
                        description="In addition to the sub-controls within Control 3-6-2 in the basic controls of cybersecurity, the cybersecurity requirements related to the security of mobile devices for the social networking accounts of the entity must cover, at a minimum, the following:"
                        description_ar="بالإضافـة للضوابـط الفرعيـة ضمـن الضابـط  ٢-٦-٣ في الضوابـط الأساسـية للأمـن السـيبراني، يجـب أن تغطــي متطلبــات الأمــن الســيبراني الخاصــة بأمــن الأجهــزة المحمولــة لحســابات التواصــل
الاجتماعـي للجهـة، بحـد أدنى، مايـلي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٤-٢"
                        description="Manage mobile devices centrally using the Mobile Device Management (MDM) system."
                        description_ar="إدارة الأجهــزة المحمولــة مركزيــاً باســتخدام نظــام إدارة الأجهــزة المحمولــة (Mobile Device Management - MDM)."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-4-1-2')
                    <x-sub-control-alt control_id="٢-١-٤-٢"
                        description="Apply update packages and security fixes for mobile devices, at least once a month."
                        description_ar="تطبيـق حـزم التحديثـات، والإصلاحـات الأمنيـة للأجهـزة المحمولـة، مـرة واحـدة
شـهرياً، علـى الأقـل.
"
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-5-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-OSMACC-2-5-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٥"
                        sub_domain="(Data and Information Protection)" sub_domain_ar="حماية البيانات والمعلومات "
                        control_id="٢-٥-١"
                        description="In addition to the subcontrols in ECC control 2-7-3, cybersecurity requirements for protecting and handling data and information for organization’s social media accounts must
include at least the following: "
                        description_ar="باإلضافــة للضوابــط الفرعيــة ضمــن الضابــط 3-7-2 يف الضوابــط األساســية لألمــن الســيرباين،
يجـب أن تغطـي متطلبـات األمـن السـيرباين لحاميـة البيانـات واملعلومـات لحسـابات التواصـل
االجتامعــي للجهــة، بحــد أدىن، مايــي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="٢-١٥-١"
                        description="Technology assets for management of organization’s social media accounts must not contain classified data, per relevant regulations"
                        description_ar="يجــب أن ال تحتــوي األصــول التقنيــة الخاصــة بحســابات التواصــل االجتامعــي
للجهــة عــى بيانــات مصنفــة، حســب الترشيعــات ذات العالقــة."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-6-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-OSMACC-2-6-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٦"
                        sub_domain="(Cybersecurity Event Logs and Monitoring Management)"
                        sub_domain_ar="إدارة سجلات الأحداث ومراقبة الأمن السيبراني" control_id="٢-٦-١"
                        description="In addition to the sub-controls within Control 3-12-2 in the basic controls of cybersecurity, the requirements for managing event logs and monitoring the cybersecurity of the social networking accounts of the entity and its technical assets must cover, at a minimum, the following:"
                        description_ar="بالإضافــة للضوابــط الفرعيــة ضمــن الضابــط  ٢-١٢-٣ في الضوابــط الأساســية للأمــن الســيبراني، يجـب أن تغطـي متطلبـات إدارة سـجلات الأحـداث، ومراقبـة الأمـن السـيبراني لحسـابات التواصـل الاجتماعـي للجهـة والأصـول التقنيـة التابعـة لهـا، بحـد أدنى، مايلـي:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="١-١-٦-٢"
                        description="Activate all cybersecurity notices and alerts of social media accounts and event logs of cybersecurity on the technical assets of social media accounts."
                        description_ar="تفعيـل جميـع الإشـعارات وتنبيهـات الأمـن السـيبراني الخاصة بحسـابات التواصل
الاجتماعـي وسـجلات الأحـداث (Event Logs) الخاصـة بالأمـن السـيبراني عـلى
الأصـول التقنيـة الخاصـة بحسـابات التواصـل الاجتماعـي."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-6-1-2')
                    <x-sub-control-alt control_id="١-١-٦-٢"
                        description="Follow-up and monitor social media accounts to ensure that no unauthorized content is published, or any unauthorized entry is logged."
                        description_ar="متابعــة حســابات التواصــل الاجتماعــي ومراقبتهــا للتأكــد مــن عــدم نــشر أي
محتــوى غيــر مــصرح، أو تســجيل أي دخــول غــر مصــرح. "
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-6-1-3')
                    <x-sub-control-alt control_id="٢-١-٦-٢"
                        description="Follow up and monitor social networks to ensure that the identity of the entity is not impersonated."
                        description_ar="متابعـة شـبكات التواصـل الاجتماعـي ومراقبتهـا للتأكـد مـن عـدم انتحـال هويـة الجهة."
                        :control="$control" theme="bg-teal" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-6-1-4')
                    <x-sub-control-alt control_id="٤-١-٦-٢"
                        description="Automatic monitoring of any change in the pattern of accounts or indicators of penetration or the publication of any unauthorized content or impersonation of the identity of the entity."
                        description_ar="المراقبــة الآليــة لأي تغيــر في نمــط الحســابات أو مــؤشرات اخـتـراق أو نــشر أي
محتـوى غـير مصـرح أو انتحـال هويـة الجهـة.
"
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-2-7-1-1')
                    @php
                        $status = getParentStatus($report, 'NCA-OSMACC-2-7-1-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٢-٧"
                        sub_domain="(Cybersecurity Incident and Threat Management)"
                        sub_domain_ar="إدارة حوادث وتهديدات الأمن السيبراني " control_id="٢-٧-١"
                        description="In addition to the subcontrols within control 2-13-3 in ECC, cybersecurity requirements
for incident and threat management in the organization must include at least the following:"
                        description_ar="باإلضافـة للضوابـط الفرعيـة ضمـن الضابـط 3-13-2 يف الضوابـط األساسـية لألمـن السـيرباين، يجب
أن تغطـي متطلبـات إدارة حـوادث وتهديـدات األمـن السـيرباين يف الجهـة، بحـد أدىن، ماييل:"
                        :control="$control" theme="bg-teal" :status="$status" />

                    <x-sub-control-alt control_id="٢-٧-١-١"
                        description="Developing a plan to recover the organization’s social media accounts and
to deal with cyber incidents"
                        description_ar="وضــع خطــة اســتعادة حســابات التواصــل االجتامعــي والتعامــل مــع الحــوادث
الســيربانية."
                        :control="$control" theme="bg-teal" border_b="true" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-3-1-1')
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="٣-١"
                        sub_domain="(Third-Party and Cloud Computing Cybersecurity)"
                        sub_domain_ar="3- الأمن السيبراني المتعلق بالأطراف الخارجية والحوسبة السحابية" control_id="٣-١-١"
                        description="The need to use social media management services and automatic monitoring of social media accounts or to protect the entity's identity from impersonation (brand protection) and the related cybersecurity risks must be evaluated."
                        description_ar="يجــب تقييــم مــدى الحاجــة لاســتخدام خدمــات إدارة حســابات التواصــل الاجتماعــي (social media management) والمراقبـة الآليـة لحسـابات التواصـل الاجتماعـي أو لحمايـة هويـة الجهـة
مـن الانتحـال (brand protection) ومخاطـر الأمـن السـيبراني المتعلقـة بهـا.
"
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-3-1-2-1')
                    @php
                        $status = getParentStatus($report, 'NCA-OSMACC-3-1-2-');
                    @endphp
                    <x-main-control-alt main_domain="" main_domain_ar="" main_domain_id="" sub_domain=""
                        sub_domain_ar="" control_id="٣-١-٢"
                        description="In addition to the sub-controls under Control 2-1-4 in the basic controls of cybersecurity, it must cover the cybersecurity requirements related to the use of social media management services and the automatic monitoring of social media accounts or to protect the identity of the entity. n plagiarism (brand protection), At a minimum, the following:"
                        description_ar="بالإضافــة للضوابــط الفرعيــة ضمــن الضابــط  ٤-١-٢ في الضوابــط الأساســية للأمــن الســيبراني، يجـب أن تغطـي متطلبـات الأمـن السـيبراني الخاصـة باسـتخدام خدمـات إدارة حسـابات التواصـل الاجتماعـي (social media management) والمراقبــة الآليـة لحسـابات التواصـل الاجتماعـي أو لحمايـة هويـة الجهـة مـن الانتحـال (brand protection)، بحـد أدنى، مـا يـلي:  
"
                        :control="$control" :status="$status" />
                    <x-sub-control-alt control_id="١-٢-١-٣"
                        description="Non-Disclosure Clauses and secure deletion by the third party of the entity's data upon service termination."
                        description_ar="بنــود المحافظــة عــلى سريــة المعلومــات (Non-Disclosure Clauses) والحــذف
الآمـن مـن قبـل الطـرف الخارجـي لبيانـات الجهـة عنـد انتهـاء الخدمـة."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-3-1-2-2')
                    <x-sub-control-alt control_id="٢-٢-١-٣"
                        description="Communication procedures for reporting vulnerabilities and in the event of a cyber security incident being discovered.
"
                        description_ar="إجراءات التواصل للإبلاغ عن الثغرات وفي حال اكتشاف حادثة أمن سيبراني."
                        :control="$control" />
                @endif
                @if ($control->control_id == 'NCA-OSMACC-3-1-2-3')
                    <x-sub-control-alt control_id="٣-٢-١-٣"
                        description="Obligate the third party to apply cybersecurity requirements and policies to protect the entity's social media accounts and the relevant legislative and regulatory requirements.
"
                        description_ar="إلــزام الطــرف الخارجــي بتطبيــق متطلبــات وسياســات الأمــن الســيبراني لحمايــة
حســابات التواصــل الاجتماعــي للجهــة والمتطلبــات التشريعيــة والتنظيميــة ذات
العلاقــة."
                        :control="$control" />
                @endif
            @endforeach

        </tbody>
    </table>
@endsection
