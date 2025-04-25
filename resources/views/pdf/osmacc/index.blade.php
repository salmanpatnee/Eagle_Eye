@extends('pdf.partials.layout')
@section('title', 'NCA-OSMACC Report')

@section('content')
    <div class="text-center bg-gradient mb-1 py-1" style="border-radius: 0.375rem">
        <p class="mb-0 mt-0 " style="color: white;">حالة الالتزام بالضوابط</p>
        <p class="mb-0 mt-0 " style="color: white;">Compliance with Controls Status</p>
    </div>

    <table class="table mb-0">
        <tbody class="text-center">
            {{-- <thead> --}}
            <tr>
                <th class="bg-light-gray text-center">
                    <p>المكون الأساسي</p>
                    <p>Main Control</p>
                </th>
                <th class="bg-light-gray text-center" colspan="2">
                    <p>المكون الفرعي </p>
                    <p>Sub-control</p>
                </th>
                <th class="bg-light-gray text-center">
                    <p>نوع الضابط</p>
                    <p>Control Type</p>
                </th>
                <th class="bg-light-gray text-center">
                    <p>رقم الضابط</p>
                    <p>Control Number</p>
                </th>
                <th class="bg-light-gray text-center">
                    <p>نص الضابط</p>
                    <p>Control Description</p>
                </th>
                <th class="bg-light-gray text-center">
                    <p>مستوى الالتزام</p>
                    <p>Compliance Level</p>
                </th>
                <th class="bg-light-gray text-center">
                    <p>الملاحظات</p>
                    <p>Remarks</p>
                </th>
                <th class="bg-light-gray text-center">
                    <p>إجراءات التصحيح</p>
                    <p>Corrective Procedures</p>
                </th>
                <th class="bg-light-gray text-center">
                    <p>تاريخ الالتزام المتوقع (يوم/شهر/ سنة)</p>
                    <p>Expected Compliance Date (DD/MM/YYYY)</p>
                </th>
            </tr>
            {{-- </thead> --}}

            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-OSMACC-1' &&
                        $row->sub_domain_id == 'NCA-OSMACC-1-1' &&
                        $row->control_id == 'NCA-OSMACC-1-1-1-1')
                    <tr>
                        <td class="bg-blue text-center be-blue" style="font-size:12px; vertical-align: middle; color:white"
                            rowspan="1">
                            <p>١- حوكمة الأمن السيبراني </p>
                            <p>(Cybersecurity Governance)</p>
                        </td>
                        <td class="text-center bg-blue" style="width: 30px; font-size:12px; color:white" rowspan="1">
                            1-1
                        </td>
                        <td class="text-center bg-blue " style=" font-size:12px; color:white" rowspan="1">
                            <p>سياسات وإجراءات الأمن السيبراني</p>
                            <p>( Cybersecurity Policies and Procedures)</p>
                        </td>
                        <td class="text-center bg-light-gray">
                            <p>أساسي</p>
                        </td>
                        <td class="text-center bg-light-gray" dir="ltr">
                            {{ $row->control_id }}
                        </td>
                        <td class="text-start py-2 description">
                            <p>{{ $row->control_description_ar }}</p>
                            <p>{{ $row->control_description }}</p>
                        </td>
                        @include('pdf.partials.static-cells')
                    </tr>
                @endif
            @endforeach

            <tr>
                <td class="bg-blue text-center be-blue" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="4">
                    <p>١- حوكمة الأمن السيبراني </p>
                    <p>(Cybersecurity Governance)</p>
                </td>
                <td class="text-center bg-blue" style="width: 30px; font-size:12px; color:white" rowspan="4">
                    1-2
                </td>
                <td class="text-center bg-blue " style=" font-size:12px; color:white" rowspan="4">
                    <p>إدارة مخاطر الأمن السيبراني</p>
                    <p>(Cybersecurity Risk Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    1-2-1
                </td>
                <td class="text-start py-2 description">
                    <p>بالإضافـة للضوابـط ضمـن المكـون الفرعـي ١-٥ في الضوابـط الأساسـية للأمـن السـيبراني، يجـب أن تشـمل
                        منهجيـة إدارة مخاطـر الأمـن الســيبراني بحـد أدنى مـا يـأتي:
                    </p>
                    <p>In addition to the controls within sub-component 5-1 of the basic controls for cybersecurity, the
                        methodology for managing cybersecurity risks should include, at a minimum, the following:</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-OSMACC-1' && $row->sub_domain_id == 'NCA-OSMACC-1-2')
                    @include('pdf.osmacc.cells')
                @endif
            @endforeach

            <tr>
                <td class="bg-blue text-center be-blue" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="3">

                </td>
                <td class="text-center bg-blue" style="width: 30px; font-size:12px; color:white" rowspan="3">
                    1-3
                </td>
                <td class="text-center bg-blue " style=" font-size:12px; color:white" rowspan="3">
                    <p>الأمن السيبراني المتعلق بالموارد البشرية</p>
                    <p>(Cybersecurity in Human Resources)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    1-3-1
                </td>
                <td class="text-start py-2 description">
                    <p>بالإضافـة للضوابـط الفرعيــة ضمــن الضابــط ١–٩– ٤ في الضوابـط الأساسـية للأمـن السـيبراني، يجـب أن
                        تشـمل متطلبـات الأمـن السـيبراني المتعلقـة بالعاملـين المسـؤولين عـن إدارة حسـابات التواصـل
                        الاجتماعـي للجهـة بحـد أدنى مـا يـأتي:</p>
                    <p>
                        In addition to the sub-controls under Control 4-9-1 in the basic controls of cybersecurity, the
                        cybersecurity requirements related to the workers responsible for managing the social media accounts
                        of the entity must include, at a minimum, the following:
                    </p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-OSMACC-1' && $row->sub_domain_id == 'NCA-OSMACC-1-3')
                    @include('pdf.osmacc.cells')
                @endif
            @endforeach

            <tr>
                <td class="bg-blue text-center be-blue" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="8">

                </td>
                <td class="text-center bg-blue" style="width: 30px; font-size:12px; color:white" rowspan="8">
                    1-4
                </td>
                <td class="text-center bg-blue " style=" font-size:12px; color:white" rowspan="8">
                    <p>برنامج التوعية والتدريب بالأمن السيبراني</p>
                    <p>(Cybersecurity Awareness and Training)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    1-4-1
                </td>
                <td class="text-start py-2 description">
                    <p>بالإضافـة للضوابـط الفرعيـة ضمـن الضابـط ١-١٠-٣ في الضوابـط الأساسـية للأمـن السـيبراني، فإنه يجـب أن
                        يغطـي برنامـج التوعيـة بالأمـن السـيبراني المخاطـر والتهديـدات السـيبرانية لحسـابات التواصـل
                        الاجتماعـي والاسـتخدام الآمـن للحـد مـن هـذه المخاطـر والتهديـدات، بمـا في ذلـك:

                    </p>
                    <p>In addition to the sub-controls within Control 3-10-1 in the basic controls of cybersecurity, the
                        cybersecurity awareness program must cover the cyber risks and threats of social networking accounts
                        and the safe use to reduce these risks and threats, including:</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-OSMACC-1' &&
                        $row->sub_domain_id == 'NCA-OSMACC-1-4' &&
                        $row->control_id != 'NCA-OSMACC-1-4-2')
                    @include('pdf.osmacc.cells')
                @endif
            @endforeach

            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-OSMACC-1' &&
                        $row->sub_domain_id == 'NCA-OSMACC-1-4' &&
                        $row->control_id == 'NCA-OSMACC-1-4-2')
                    <tr>
                        <td class="bg-blue text-center be-blue" style="font-size:12px; vertical-align: middle; color:white"
                            rowspan="1">

                        </td>
                        <td class="text-center bg-blue" style="width: 30px; font-size:12px; color:white" rowspan="1">

                        </td>
                        <td class="text-center bg-blue " style=" font-size:12px; color:white" rowspan="1">
                            {{-- <p>سياسات وإجراءات الأمن السيبراني</p>
                            <p>( Cybersecurity Policies and Procedures)</p> --}}
                        </td>
                        <td class="text-center bg-light-gray">
                            <p>أساسي</p>
                        </td>
                        <td class="text-center bg-light-gray" dir="ltr">
                            1-4-2
                        </td>
                        <td class="text-start py-2 description">
                            <p>{{ $row->control_description_ar }}</p>
                            <p>{{ $row->control_description }}</p>
                        </td>
                        @include('pdf.partials.static-cells')
                    </tr>
                @endif
            @endforeach

            {{-- 2-1-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="1">
                    <p>٢- تعزيز الأمن السيبراني
                    </p>
                    <p>(Cybersecurity Defense)</p>
                </td>
                <td class="text-center bg-teal" style="width: 30px; font-size:12px; color:white" rowspan="1">
                    2-1
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="1">
                    <p>إدارة الأصول </p>
                    <p>(Asset Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-1-1
                </td>
                <td class="text-start py-2 description">
                    <p>بالإضافـة للضوابـط ضمـن المكـون الفرعـي ٢-١ في الضوابـط الأساسـية للأمـن السـيبراني، يجـب أن تشـمل
                        متطلبـات الأمـن السـيبراني لإدارة الأصـول المعلوماتيـة والتقنيـة، بحـد أدنى، مايلـي:
                        ٢-١-١-١ يجــب تحديــد وحصــر حســابات التواصــل الاجتماعــي والأصــول المعلوماتيــة والتقنيــة
                        المتعلقــة بهــا، وتحديثهــا مــرة واحــدة، كل ســنة؛ عــلى الأقــل.</p>
                    <p>In addition to the controls within sub-component 1-2 of the basic controls of cybersecurity, the
                        cybersecurity requirements for the management of informational and technical assets should include,
                        at a minimum, the following: 1-1-2-1 social media accounts, informational and technical assets must
                        be identified related to it, and update it once, every year; At least.</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>

            {{-- @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-OSMACC-2' && $row->sub_domain_id == 'NCA-OSMACC-2-1')
                    @include('pdf.osmacc.cells')
                @endif
            @endforeach --}}

            {{-- 2-2-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="10">

                </td>
                <td class="text-center bg-teal" style="width: 30px; font-size:12px; color:white" rowspan="10">
                    2-2
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="10">
                    <p>إدارة هويات الدخول والصلاحيات
                    </p>
                    <p>(Identity and Access Management) </p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-2-1
                </td>
                <td class="text-start py-2 description">
                    <p>بالإضافـة للضوابـط الفرعيـة ضمـن الضابـط ٢-٢-٣ في الضوابـط الأساسـية للأمـن السـيبراني، يجـب أن تغطـي
                        متطلبـات الأمـن السـيبراني المتعلقـة بـإدارة هويـات الدخـول، والصلاحيـات لحسـابات
                        التواصـل الاجتماعـي للجهـة، بحـد أدنى، مايـلي:

                    </p>
                    <p>In addition to the sub-controls within Control 3-2-2 in the basic controls of cybersecurity, the
                        cybersecurity requirements related to managing login identities and permissions for social
                        networking accounts of the entity must cover, at a minimum, the following:</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-OSMACC-2' &&
                        $row->sub_domain_id == 'NCA-OSMACC-2-2' &&
                        $row->control_id != 'NCA-OSMACC-2-2-2')
                    @include('pdf.osmacc.cells')
                @endif
            @endforeach

            {{-- 2-2-2 --}}
            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-OSMACC-2' &&
                        $row->sub_domain_id == 'NCA-OSMACC-2-2' &&
                        $row->control_id == 'NCA-OSMACC-2-2-2')
                    <tr>
                        <td class="bg-teal text-center be-teal"
                            style="font-size:12px; vertical-align: middle; color:white" rowspan="1">
                            <p>١- حوكمة الأمن السيبراني </p>
                            <p>(Cybersecurity Governance)</p>
                        </td>
                        <td class="text-center bg-teal be-teal" style="width: 30px; font-size:12px; color:white"
                            rowspan="1">
                            {{-- 2-2-2 --}}
                        </td>
                        <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="1">
                            {{-- <p>سياسات وإجراءات الأمن السيبراني</p>
                            <p>( Cybersecurity Policies and Procedures)</p> --}}
                        </td>
                        <td class="text-center bg-light-gray">
                            <p>أساسي</p>
                        </td>
                        <td class="text-center bg-light-gray" dir="ltr">
                            {{ str_replace('NCA-OSMACC-', '', $row->control_id) }}
                        </td>
                        <td class="text-start py-2 description">
                            <p>{{ $row->control_description_ar }}</p>
                            <p>{{ $row->control_description }}</p>
                        </td>
                        @include('pdf.partials.static-cells')
                    </tr>
                @endif
            @endforeach

            {{-- 2-3-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="5">

                </td>
                <td class="text-center bg-teal" style="width: 30px; font-size:12px; color:white" rowspan="5">
                    2-3
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="5">
                    <p>حماية الأنظمة وأجهزة معالجة المعلومات
                    </p>
                    <p>(Information System and Processing Facilities Protection)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-3-1
                </td>
                <td class="text-start py-2 description">
                    <p>بالإضافـة للضوابـط الفرعيـة ضمـن الضابـط ٢-٣-٣ في الضوابـط الأساسـية للأمـن السـيبراني، يجـب أن تغطـي
                        متطلبـات الأمـن السـيبراني لحمايـة حسـابات التواصـل الاجتماعـي للجهـة، والأصـول التقنيـة الخاصـة
                        بهـا، بحـد أدنى، مايـلي:

                    </p>
                    <p>In addition to the sub-controls within Control 3-3-2 in the basic controls of cybersecurity, the
                        cybersecurity requirements to protect the social networking accounts of the entity and its technical
                        assets must cover, at a minimum, the following:</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-OSMACC-2' && $row->sub_domain_id == 'NCA-OSMACC-2-3')
                    @include('pdf.osmacc.cells')
                @endif
            @endforeach

            {{-- 2-4-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="3">

                </td>
                <td class="text-center bg-teal" style="width: 30px; font-size:12px; color:white" rowspan="3">
                    2-4
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="3">
                    <p>أمن الأجهزة المحمولة </p>
                    <p>(Mobile Devices Security)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-4-1
                </td>
                <td class="text-start py-2 description">
                    <p>بالإضافـة للضوابـط الفرعيـة ضمـن الضابـط ٢-٦-٣ في الضوابـط الأساسـية للأمـن السـيبراني، يجـب أن
                        تغطــي متطلبــات الأمــن الســيبراني الخاصــة بأمــن الأجهــزة المحمولــة لحســابات التواصــل
                        الاجتماعـي للجهـة، بحـد أدنى، مايـلي:

                    </p>
                    <p>In addition to the sub-controls within Control 3-6-2 in the basic controls of cybersecurity, the
                        cybersecurity requirements related to the security of mobile devices for the social networking
                        accounts of the entity must cover, at a minimum, the following:</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-OSMACC-2' && $row->sub_domain_id == 'NCA-OSMACC-2-4')
                    @include('pdf.osmacc.cells')
                @endif
            @endforeach

            {{-- 2-5-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="2">

                </td>
                <td class="text-center bg-teal" style="width: 30px; font-size:12px; color:white" rowspan="2">
                    2-5
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="2">
                    <p>حماية البيانات والمعلومات </p>
                    <p>(Data and Information Protection)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-5-1
                </td>
                <td class="text-start py-2 description">
                    <p>بالإضافــة للضوابــط الفرعيــة ضمــن الضابــط ٢-٧-٣ في الضوابــط الأساســية للأمــن الســيبراني، يجـب
                        أن تغطـي متطلبـات الأمـن السـيبراني لحمايـة البيانـات والمعلومـات لحسـابات التواصـل
                        الاجتماعــي للجهــة، بحــد أدنى، مايــلي:
                        ٢-٥-١-١ يجــب أن لا تحتــوي الأصــول التقنيــة الخاصــة بحســابات التواصــل الاجتماعــي للجهــة
                        عــلى بيانــات مصنفــة، حســب التشريعــات ذات العلاقــة.
                    </p>
                    <p>In addition to the sub-controls within Control 3-7-2 in the basic controls of cybersecurity, the
                        cybersecurity requirements to protect the data and information of the entity's social networking
                        accounts must cover, at a minimum, the following: 1-1-5-2 The private technical assets must not
                        contain Accounts The entity's social communication contains classified data, according to the
                        relevant legislation."</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-OSMACC-2' && $row->sub_domain_id == 'NCA-OSMACC-2-5')
                    @include('pdf.osmacc.cells')
                @endif
            @endforeach

            {{-- 2-6-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="5">

                </td>
                <td class="text-center bg-teal" style="width: 30px; font-size:12px; color:white" rowspan="5">
                    2-6
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="5">
                    <p>إدارة سجلات الأحداث ومراقبة الأمن السيبراني

                    </p>
                    <p>(Cybersecurity Event Logs and Monitoring Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-6-1
                </td>
                <td class="text-start py-2 description">
                    <p>بالإضافــة للضوابــط الفرعيــة ضمــن الضابــط ٢-١٢-٣ في الضوابــط الأساســية للأمــن الســيبراني،
                        يجـب أن تغطـي متطلبـات إدارة سـجلات الأحـداث، ومراقبـة الأمـن السـيبراني لحسـابات التواصـل
                        الاجتماعـي للجهـة والأصـول التقنيـة التابعـة لهـا، بحـد أدنى، مايلـي:

                    </p>
                    <p>In addition to the sub-controls within Control 3-12-2 in the basic controls of cybersecurity, the
                        requirements for managing event logs and monitoring the cybersecurity of the social networking
                        accounts of the entity and its technical assets must cover, at a minimum, the following:</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-OSMACC-2' && $row->sub_domain_id == 'NCA-OSMACC-2-6')
                    @include('pdf.osmacc.cells')
                @endif
            @endforeach

            {{-- 2-7-1 --}}
            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-OSMACC-2' &&
                        $row->sub_domain_id == 'NCA-OSMACC-2-7' &&
                        $row->control_id === 'NCA-OSMACC-2-7-1-1')
                    <tr>
                        <td class="bg-teal text-center be-teal"
                            style="font-size:12px; vertical-align: middle; color:white" rowspan="1">

                        </td>
                        <td class="text-center bg-teal" style="width: 30px; font-size:12px; color:white" rowspan="1">
                            2-7
                        </td>
                        <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="1">
                            <p>إدارة حوادث وتهديدات الأمن السيبراني </p>
                            <p>(Cybersecurity Incident and Threat Management)</p>
                        </td>
                        <td class="text-center bg-light-gray">
                            <p>أساسي</p>
                        </td>
                        <td class="text-center bg-light-gray" dir="ltr">
                            2-7-1
                        </td>
                        <td class="text-start py-2 description">
                            <p>{{ $row->control_description_ar }}</p>
                            <p>{{ $row->control_description }}</p>
                        </td>
                        @include('pdf.partials.static-cells')
                    </tr>
                @endif
            @endforeach



        </tbody>
    </table>
@endsection
