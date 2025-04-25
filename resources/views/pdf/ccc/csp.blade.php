@extends('pdf.partials.layout')
@section('title', 'NCA-CCC-CSP Report')

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
                    <p>مستوى البيانات المستضافة في الخدمة</p>
                    <p>Data Clasification Level Hosted in Cloud</p>
                </th>
                <th class="bg-light-gray text-center">
                    <p style="font-weight: normal">المستوى 1</p>
                    <p style="font-weight: normal">Level 1</p>
                </th>
                <th class="bg-light-gray text-center" colspan="2">
                    <p>عدد المشتركين في الخدمة</p>
                    <p>Number of CSTs for this service</p>
                </th>
                <th class="bg-light-gray text-center" colspan="7"></th>

            </tr>

            <tr>
                <th class="bg-light-gray text-center">
                    <p>المكون الأساسي</p>
                    <p>Main Domain</p>
                </th>

                <th class="bg-light-gray text-center" colspan="2">
                    <p>المكون الفرعي </p>
                    <p>Subdomain</p>
                </th>

                <th class="bg-light-gray text-center">
                    <p>نوع الضابط</p>
                    <p>Control Type</p>
                </th>
                <th class="bg-light-gray text-center">
                    <p>رقم الضابط</p>
                    <p>Control Reference Number</p>
                </th>

                <th class="bg-light-gray text-center">
                    <p>إلزامية التطبيق</p>
                    <p>Implementation Mandatoriness</p>
                </th>

                <th class="bg-light-gray text-center">
                    <p>نص الضابط</p>
                    <p>Control Clauses</p>
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

            {{-- 1-1-P-1 --}}
            <tr>
                <td class="bg-blue text-center"
                    style="border-width: 1px; border-style: solid; border-bottom-color: #2C3A83; font-size:12px; vertical-align: middle; color:white"
                    rowspan="2">
                    <p>1- حوكمة الأمن السيبراني</p>
                    <p>Cybersecurity Governance</p>
                </td>
                <td class="text-center bg-blue" style=" font-size:12px; color:white" rowspan="2">
                    1-1
                </td>
                <td class="text-center bg-blue " style=" font-size:12px; color:white" rowspan="2">
                    <p>أدوار ومسؤوليات الأمن السيبراني</p>
                    <p>(Cybersecurity Roles and Responsibilities)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    1-1-P-1
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضابط ١-٤-١ في الضوابط الأساسية للأمن السيبراني، يجب على صاحب الصلاحية تحديد وتوثيق واعتماد
                        ما يلي:


                    </p>
                    <p>In addition to the ECC control 1-4-1 the Authorizing Official shall also identify, document and
                        approve</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-1' && $row->sub_domain_id == 'NCA-CCC-1-1')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 1-2-P-1 --}}
            <tr>
                <td class="bg-blue text-center "
                    style="border-bottom-color: #2C3A83; font-size:12px; vertical-align: middle; color:white"
                    rowspan="4">

                </td>
                <td class="text-center bg-blue" style=" font-size:12px; color:white" rowspan="4">
                    <p>1-2</p>
                </td>
                <td class="text-center bg-blue " style=" font-size:12px; color:white" rowspan="4">
                    <p>إدارة مخاطر الأمن السيبراني</p>
                    <p>(Cybersecurity Risk Management) </p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p dir="ltr">1-2-P-1
                    </p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>يجب أن تتضمن منهجية إدارة مخاطر الأمن السيبراني المذكورة في المكون الفرعي ١-٥ في الضوابط الأساسية
                        للأمن السيبراني لدى مقدمي الخدمات، بحد أدنى ما يلي:

                    </p>
                    <p>Cybersecurity risk management methodology mentioned in the ECC Subdomain 1-5, shall also include for
                        the CSP, as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-1' && $row->sub_domain_id == 'NCA-CCC-1-2')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 1-3-P-1 --}}
            <tr>
                <td class="bg-blue text-center "
                    style=" border-bottom-color: #2C3A83; font-size:12px; vertical-align: middle; color:white"
                    rowspan="2">
                </td>
                <td class="text-center bg-blue" style=" font-size:12px; color:white" rowspan="2">
                    <p>1-3</p>
                </td>
                <td class="text-center bg-blue " style=" font-size:12px; color:white" rowspan="2">
                    <p>الالتزام بتشريعات وتنظيمات ومعايير الأمن السيبراني

                    </p>
                    <p>(Compliance with Cybersecurity Standards, Laws and Regulations)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p dir="ltr">1-3-P-1
                    </p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضابط ١-٧-١ في الضوابط الأساسية للأمن السيبراني، يجب أن يشتمل التزام مقدمي الخدمات
                        بالمتطلبات التشريعية والتنظيمية بحد أدنى ما يلي:

                    </p>
                    <p> In addition to the ECC control 1-7-1 the CSP legislative and regulatory compliance should include as
                        a minimum with the following requirements</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-1' && $row->sub_domain_id == 'NCA-CCC-1-3')
                    @include('pdf.partials.cells')
                @endif
            @endforeach


            {{-- </thead> --}}
            {{-- 1-4-P-1 --}}
            <tr>
                <td class="bg-blue text-center" style="font-size:12px; vertical-align: middle; color:white" rowspan="4">
                </td>
                <td class="text-center bg-blue" style=" font-size:12px; color:white" rowspan="4">
                    <p>1-4</p>
                </td>
                <td class="text-center bg-blue " style=" font-size:12px; color:white" rowspan="4">
                    <p>الأمن السيبراني المتعلق بالموارد البشرية
                    </p>
                    <p>(Cybersecurity in Human Resources)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p dir="ltr">1-4-P-1

                    </p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابطين ١-٩-٣ و ١-٩-٤ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي
                        متطلبات الأمن السيبراني قبل بدء وخلال العلاقة المهنية بين العاملين ومقدمي الخدمة بحد أدنى ما يلي:

                    </p>
                    <p>In addition to subcontrols in the ECC controls 1-9-3 and 1-9-4, the following requirements should be
                        covered prior and during the professional relationship of personnel with the CSP as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-CCC-1' &&
                        $row->sub_domain_id == 'NCA-CCC-1-4' &&
                        ($row->control_id == 'NCA-CCC-1-4-P-1-1' ||
                            $row->control_id == 'NCA-CCC-1-4-P-1-2' ||
                            $row->control_id == 'NCA-CCC-1-4-P-1-3'))
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-CCC-1' &&
                        $row->sub_domain_id == 'NCA-CCC-1-4' &&
                        $row->control_id == 'NCA-CCC-1-4-P-2-1')
                    <tr>
                        <td class="bg-blue text-center be-blue" style="font-size:12px; vertical-align: middle; color:white"
                            rowspan="1">

                        </td>
                        <td class="text-center bg-blue" style=" font-size:12px; color:white" rowspan="1">
                            1-4

                        </td>
                        <td class="text-center bg-blue " style=" font-size:12px; color:white" rowspan="1">
                            <p>أمن وسائط التخزين

                            </p>
                            <p>(Storage Media Security)</p>
                        </td>
                        <td class="text-center bg-light-gray">
                            <p>أساسي</p>
                            <p>Main Control</p>
                        </td>
                        <td class="text-center bg-light-gray" dir="ltr">
                            {{ $row->control_id }}

                        </td>
                        <td class="text-center bg-light-gray">
                            <p>يجب تطبيقه كليًا</p>
                            <p>Must be fully implemented</p>
                        </td>
                        <td class="text-start py-2">
                            <p>{{ $row->control_description_ar }}</p>
                            <p>{{ $row->control_description }}</p>
                        </td>
                        @include('pdf.partials.static-cells')
                    </tr>
                @endif
            @endforeach


            {{-- 1-5-P-1 --}}
            <tr>
                <td class="bg-blue text-center" style="font-size:12px; vertical-align: middle; color:white" rowspan="3">
                </td>
                <td class="text-center bg-blue" style=" font-size:12px; color:white" rowspan="3">
                    <p>1-5</p>
                </td>
                <td class="text-center bg-blue " style=" font-size:12px; color:white" rowspan="3">
                    <p>الأمن السيبراني ضمن إدارة التغيير
                    </p>
                    <p>(Cybersecurity in Change Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p dir="ltr">1-5-P-1
                    </p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>يجب تحديد متطلبات الأمن السيبراني لإدارة التغيير لدى مقدمي الخدمات، وتوثيقها، واعتمادها.
                    </p>
                    <p>Cybersecurity requirements for change management within the CSP shall be identified, documented and
                        approved</p>
                    </p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-CCC-1' &&
                        $row->sub_domain_id == 'NCA-CCC-1-5' &&
                        ($row->control_id == 'NCA-CCC-1-5-P-1' || $row->control_id == 'NCA-CCC-1-5-P-2'))
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 1-5-P-3 --}}
            <tr>
                <td class="bg-blue text-center" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="3">
                </td>
                <td class="text-center bg-blue" style=" font-size:12px; color:white" rowspan="3">
                    <p></p>
                </td>
                <td class="text-center bg-blue " style=" font-size:12px; color:white" rowspan="3">
                    <p>الأمن السيبراني ضمن إدارة التغيير
                    </p>
                    <p>(Cybersecurity in Change Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p dir="ltr">1-5-P-3
                    </p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>يجب أن يغطي الأمن السيبراني لإدارة التغيير لدى مقدمي الخدمات بحد أدنى ما يلي:
                    </p>
                    <p>Cybersecurity for change management in the CSP shall cover, as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-CCC-1' &&
                        $row->sub_domain_id == 'NCA-CCC-1-5' &&
                        ($row->control_id == 'NCA-CCC-1-5-P-3-1' || $row->control_id == 'NCA-CCC-1-5-P-3-2'))
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 1-5-P-4 --}}
            <tr>
                <td class="bg-blue text-center" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="1">
                </td>
                <td class="text-center bg-blue" style=" font-size:12px; color:white" rowspan="1">
                    <p></p>
                </td>
                <td class="text-center bg-blue " style=" font-size:12px; color:white" rowspan="1">
                    <p>الأمن السيبراني ضمن إدارة التغيير
                    </p>
                    <p>(Cybersecurity in Change Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p dir="ltr">1-5-P-4

                    </p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>يجب مراجعة متطلبات الأمن السيبراني لإدارة التغيير لدى مقدمي الخدمات، ومراجعة تطبيقها، دوريًا.


                    </p>
                    <p>Cybersecurity requirements for change management within the CSP shall be applied and reviewed
                        periodically</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>

            {{-- 2-1-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="3">
                    <p>
                        2- تعزيز الأمن السيبراني

                    </p>
                    <p>(Cybersecurity Defense)</p>
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="3">
                    <p>2-1</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="3">
                    <p>إدارة الأصول
                    </p>
                    <p>(Asset Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-1-P-1
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط ضمن المكون الفرعي ٢-١ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات
                        الأمن السيبراني لإدارة الأصول المعلوماتية والتقنية لدى مقدمي الخدمات، بحد أدنى ما يلي:
                    </p>
                    <p>In addition to controls in the ECC control 2-1, the CSP shall cover the following additional controls
                        for cybersecurity requirements for cybersecurity event logs and monitoring management, as a minimum
                    </p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-1')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-1-P-2 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="13">

                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="13">
                    <p>2-2</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="13">
                    <p>إدارة هويات الدخول والصلاحيات

                    </p>
                    <p> (Identity and Access Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-2-P-1
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-٢-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات
                        الأمن السيبراني الخاصة بإدارة هويات الدخول والصلاحيات لدى مقدمي الخدمات، بحد أدنى مايلي:
                    </p>
                    <p>In addition to subcontrols in the ECC control 2-2-3, the CSP shall cover the following additional
                        subcontrols for cybersecurity requirements for identity and access management requirements, as a
                        minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-2')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-3-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="13">

                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="13">
                    <p>2-3</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="13">
                    <p>حماية الأنظمة وأجهزة معالجة المعلومات

                    </p>
                    <p>(Information System and Information Processing Facilities Protection)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-3-P-1-1

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>التحقق من مدى التزام الإعدادات التقنية لمعايير الأمن السيبراني المعتمدة لدى مقدم الخدمة.


                    </p>
                    <p>Ensuring that all configurations are applied in accordance to CSP’s cybersecurity standards</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-3')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-4-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="7">

                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="7">
                    <p>2-4</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="7">
                    <p>إدارة أمن الشبكات

                    </p>
                    <p>(Networks Security Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-4-P-1

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-٥-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات
                        الأمن السيبراني الخاصة بإدارة أمن الشبكات لدى مقدمي الخدمات، بحد أدنى مايلي:


                    </p>
                    <p>In addition to subcontrols in the ECC control 2-5-3, the CSP shall cover the following additional
                        subcontrols for cybersecurity requirements for networks security management requirements, as a
                        minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-4')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-5-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="5">

                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="5">
                    <p>2-5</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="5">
                    <p>أمن الأجهزة المحمولة

                    </p>
                    <p>(Mobile Devices Security)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-5-P-1


                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-٦-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات
                        الأمن السيبراني الخاصة بأمن الأجهزة المحمولة لدى مقدمي الخدمات، بحد أدنى مايلي:


                    </p>
                    <p>In addition to subcontrols in the ECC control 2-6-3, the CSP shall cover the following additional
                        subcontrols for cybersecurity requirements for mobile device security, as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-5')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-6-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="6">

                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="6">
                    <p>2-6</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="6">
                    <p>حماية البيانات والمعلومات
                    </p>
                    <p>(Data and Information Protection)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-6-P-1



                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-٧-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات
                        الأمن السيبراني الخاصة بحماية البيانات والمعلومات لدى مقدمي الخدمة، بحد أدنى مايلي:


                    </p>
                    <p>In addition to subcontrols in the ECC control 2-7-3, the CSP shall cover the following additional
                        subcontrols for cybersecurity requirements for data and information protection requirements, as a
                        minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-6')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-7-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="3">

                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="3">
                    <p>2-7</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="3">
                    <p>التشفير

                    </p>
                    <p> (Cryptography)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-7-P-1
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-٨-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات
                        الأمن السيبراني الخاصة بالتشفير لدى مقدمي الخدمات، بحد أدنى مايلي:


                    </p>
                    <p>In addition to subcontrols in the ECC control 2-8-3, the CSP shall cover the following additional
                        subcontrols for cryptography, as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-7')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-8-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="3">

                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="3">
                    <p>2-8</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="3">
                    <p>إدارة النسخ الاحتياطية



                    </p>
                    <p> (Backup and Recovery Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-8-P-1

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-٩-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات
                        الأمن السيبراني الخاصة بإدارة النسخ الاحتياطية لدى مقدمي الخدمات، بحد أدنى مايلي:


                    </p>
                    <p>In addition to subcontrols in the ECC control 2-9-3, the CSP shall cover the following additional
                        subcontrols for cybersecurity requirements for backup and recovery management, as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-8')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-9-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="3">

                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="3">
                    <p>2-9</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="3">
                    <p>إدارة الثغرات

                    </p>
                    <p>(Vulnerabilities Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-9-P-1

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٠-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات
                        الأمن السيبراني الخاصة بإدارة الثغرات لدى مقدمي الخدمات، بحد أدنى مايلي:


                    </p>
                    <p> In addition to subcontrols in the ECC control 2-10-3, the CSP shall cover the following additional
                        subcontrols for cybersecurity requirements for vulnerability management requirements, as a minimum
                    </p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-9')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-10-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="2">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="2">
                    <p>2-10</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="2">
                    <p>اختبار الاختراق
                    </p>
                    <p> (Penetration Testing)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-10-P-1
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-١١-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات
                        الأمن السيبراني الخاصة باختبار الاختراق لدى مقدمي الخدمات، بحد أدنى مايلي:
                    </p>
                    <p>In addition to subcontrols in the ECC control 2-11-3, the CSP shall cover the following additional
                        subcontrols for cybersecurity requirements for penetration testing, as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-10')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-11-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="9">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="9">
                    <p>2-11</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="9">
                    <p>إدارة سجلات الأحداث ومراقبة الأمن السيبراني

                    </p>
                    <p>(Cybersecurity Event Logs and Monitoring Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-11-P-1

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٢-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات
                        الأمن السيبراني لإدارة سجلات الأحداث ومراقبة الأمن السيبراني لدى مقدمي الخدمات، بحد أدنى مايلي:

                    <p>In addition to subcontrols in the ECC control 2-12-3, the CSP shall cover the following additional
                        subcontrols for cybersecurity requirements for cybersecurity event logs and monitoring management,
                        as a minimum</p>
                    </p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-11')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-12-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="9">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="9">
                    <p>2-12</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="9">
                    <p>إدارة حوادث وتهديدات الأمن السيبراني

                    </p>
                    <p>(Cybersecurity Incident and Threat Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-12-P-1

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٣-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات
                        الأمن السيبراني لإدارة حوادث وتهديدات الأمن السيبراني لدى مقدمي الخدمات، بحد أدنى مايلي:


                    </p>
                    <p>In addition to subcontrols in the ECC control 2-13-3, the CSP shall cover the following additional
                        subcontrols for cybersecurity requirements for cybersecurity incident and threat management, as a
                        minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-12')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-13-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="4">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="4">
                    <p>2-13</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="4">
                    <p>الأمن المادي

                    </p>
                    <p> (Physical Security)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-13-P-1

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>"بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٤-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات
                        الأمن السيبراني الخاصة بالأمن المادي لدى مقدمي الخدمات، بحد أدنى مايلي:


                    </p>
                    <p>In addition to subcontrols in the ECC control 2-14-3, the CSP shall cover the following additional
                        subcontrols for cybersecurity requirements for physical security, as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-13')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-14-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="2">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="2">
                    <p>2-14</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="2">
                    <p>حماية تطبيقات الويب


                    </p>
                    <p>(Web Application Security) </p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-14-P-1

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>حماية المعلومات المستخدمة في إجراء المعاملات عن طريق تطبيقات الويب من المخاطر المحتملة، مثل: انقطاع
                        الاتصال (Incomplete Transmission) ، التوجيه الخاطئ (Mis-routing)، التعديل غير المصرح به، الاطلاع غير
                        المصرح به.



                    </p>
                    <p>Protecting information involved in application service transactions against possible risks (e.g:
                        incomplete transmission, mis-routing, unauthorized message alteration, unauthorized disclosure….)
                    </p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-14')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-15-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="1">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="1">
                    <p>2-15</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="1">
                    <p>إدارة المفاتيح

                    </p>
                    <p>(Key Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-15-P-1


                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني، الخاصة بعملية إدارة المفاتيح لدى مقدمي الخدمات.


                    </p>
                    <p>Cybersecurity requirements for key management process within the CSP shall be identified, documented
                        and approved</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>


            {{-- 2-15-P-2 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="1">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="1">

                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="1">

                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-15-P-2


                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>"يجب تطبيق متطلبات الأمن السيبراني، الخاصة بعملية إدارة المفاتيح لدى مقدمي الخدمات.

                    </p>
                    <p>Cybersecurity requirements for key management process within the CSP shall be applied</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>



            {{-- 2-15-P-3 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="1">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="1">

                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="1">

                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-15-P-3



                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>"بالإضافة للضابط ٢-٨-٣-٢ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني
                        الخاصة بعملية إدارة المفاتيح لدى مقدمي الخدمات بحد أدنى ما يلي:

                    </p>
                    <p>In addition to the ECC subcontrol
                        2-8-3-2
                        cybersecurity requirements for key management within the CSP shall cover, at minimum, the following
                    </p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-15')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-16-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="1">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="1">
                    2-16
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="1">
                    <p>أمن تطوير الأنظمة

                    </p>
                    <p>(System Development Security)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-16-P-1

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>يجب تحديد متطلبات الأمن السيبراني لتطوير الأنظمة لدى مقدمي الخدمات، وتوثيقها واعتمادها.

                    </p>
                    <p>Cybersecurity requirements for system development within the CSP shall be identified, documented and
                        approved</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>

            {{-- 2-16-P-2 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="1">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="1">
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="1">
                    {{-- <p>أمن تطوير الأنظمة

                    </p>
                    <p>(System Development Security)</p> --}}
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-16-P-2

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>يجب تطبيق متطلبات الأمن السيبراني لتطوير الأنظمة لدى مقدمي الخدمات.


                    </p>
                    <p>Cybersecurity requirements for system development within the CSP shall be applied</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>

            {{-- 2-16-P-3 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="4">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="4">
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="4">
                    {{-- <p>أمن تطوير الأنظمة

                    </p>
                    <p>(System Development Security)</p> --}}
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-16-P-3


                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>يجب أن تغطي متطلبات الأمن السيبراني لتطوير الأنظمة لدى مقدمي الخدمات بحد أدنى الضوابط التالية خلال
                        دورة حياة التطوير:


                    </p>
                    <p>Cybersecurity requirements for system development within the CSP shall include as a minimum the
                        following controls along the development lifecycle</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-CCC-2' &&
                        $row->sub_domain_id == 'NCA-CCC-2-16' &&
                        ($row->control_id == 'NCA-CCC-2-16-P-3-1' ||
                            $row->control_id == 'NCA-CCC-2-16-P-3-2' ||
                            $row->control_id == 'NCA-CCC-2-16-P-4'))
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-17-P-1 --}}
            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-CCC-2' &&
                        $row->sub_domain_id == 'NCA-CCC-2-17' &&
                        ($row->control_id == 'NCA-CCC-2-17-P-1' || $row->control_id == 'NCA-CCC-2-17-P-2'))
                    <tr>
                        <td class="bg-teal text-center be-teal"
                            style="font-size:12px; vertical-align: middle; color:white" rowspan="1">

                        </td>
                        <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="1">
                            2-17

                        </td>
                        <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="1">
                            <p>أمن وسائط التخزين

                            </p>
                            <p>(Storage Media Security)</p>
                        </td>
                        <td class="text-center bg-light-gray">
                            <p>أساسي</p>
                            <p>Main Control</p>
                        </td>
                        <td class="text-center bg-light-gray" dir="ltr">
                            {{ $row->control_id }}

                        </td>
                        <td class="text-center bg-light-gray">
                            <p>يجب تطبيقه كليًا</p>
                            <p>Must be fully implemented</p>
                        </td>
                        <td class="text-start py-2">
                            <p>{{ $row->control_description_ar }}</p>
                            <p>{{ $row->control_description }}</p>
                        </td>
                        @include('pdf.partials.static-cells')
                    </tr>
                @endif
            @endforeach

            {{-- 2-17-P-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="7">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="7">
                    2-17
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="7">
                    <p>أمن وسائط التخزين

                    </p>
                    <p>(Storage Media Security)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-17-P-3


                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>متطلبات الأمن السيبراني لاستخدام وسائط المعلومات والبيانات المادية لدى مقدمي الخدمات يجب أن تغطي بحد
                        أدنى ما يلي:


                    </p>
                    <p>Cybersecurity requirements for usage of information and data media within the CSP shall cover, at
                        minimum, the following</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-CCC-2' &&
                        $row->sub_domain_id == 'NCA-CCC-2-17' &&
                        ($row->control_id == 'NCA-CCC-2-16-P-3-1' ||
                            $row->control_id == 'NCA-CCC-2-17-P-3-1' ||
                            $row->control_id == 'NCA-CCC-2-17-P-3-2' ||
                            $row->control_id == 'NCA-CCC-2-17-P-3-3' ||
                            $row->control_id == 'NCA-CCC-2-17-P-3-4' ||
                            $row->control_id == 'NCA-CCC-2-17-P-3-5' ||
                            $row->control_id == 'NCA-CCC-2-17-P-3-6'))
                    @include('pdf.partials.cells')
                @endif
            @endforeach



            {{-- 2-17-P-1 --}}
            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-CCC-2' &&
                        $row->sub_domain_id == 'NCA-CCC-2-17' &&
                        $row->control_id == 'NCA-CCC-2-17-P-4')
                    <tr>
                        <td class="bg-teal text-center be-teal"
                            style="font-size:12px; vertical-align: middle; color:white" rowspan="1">

                        </td>
                        <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="1">
                            2-17

                        </td>
                        <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="1">
                            <p>أمن وسائط التخزين

                            </p>
                            <p>(Storage Media Security)</p>
                        </td>
                        <td class="text-center bg-light-gray">
                            <p>أساسي</p>
                            <p>Main Control</p>
                        </td>
                        <td class="text-center bg-light-gray" dir="ltr">
                            {{ $row->control_id }}

                        </td>
                        <td class="text-center bg-light-gray">
                            <p>يجب تطبيقه كليًا</p>
                            <p>Must be fully implemented</p>
                        </td>
                        <td class="text-start py-2">
                            <p>{{ $row->control_description_ar }}</p>
                            <p>{{ $row->control_description }}</p>
                        </td>
                        @include('pdf.partials.static-cells')
                    </tr>
                @endif
            @endforeach



            {{-- 3-1 --}}
            <tr>
                <td class="bg-dark be-dark text-center" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="3">
                    <p>3- صمود الأمن السيبراني

                    </p>
                    <p>(Cybersecurity Resilience)</p>
                </td>
                <td class="text-center bg-dark" style=" font-size:12px; color:white" rowspan="3" dir="ltr">
                    3-1
                </td>
                <td class="text-center bg-dark " style=" font-size:12px; color:white" rowspan="3">
                    <p>جوانب صمود الأمن السيبراني في إدارة استمرارية الأعمال

                    </p>
                    <p>(Cybersecurity Resilience aspects of Business Continuity Management - BCM)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    3-1-P-1

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٣-١-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات
                        الأمن السيبراني لجوانب صمود الأمن السيبراني في إدارة استمرارية الأعمال لدى مقدمي الخدمات، بحد أدنى
                        مايلي:
                    </p>
                    <p>In addition to subcontrols in the ECC control 3-1-3, the CSP shall cover the following additional
                        subcontrols for cybersecurity requirements for cybersecurity resilience aspects of business
                        continuity management, as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
                @foreach ($report as $row)
                    @if ($row->main_domain_id == 'NCA-CCC-3' && $row->sub_domain_id == 'NCA-CCC-3-1')
                        @include('pdf.partials.cells')
                    @endif
                @endforeach
            </tr>

            {{-- 4-1 --}}
            <tr>
                <td class="bg-blue be-blue text-center" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="5">
                    <p>4- الأمن السيبراني المتعلق بالأطراف الخارجية

                    </p>
                    <p>(Third-Party Cybersecurity)</p>
                </td>
                <td class="text-center bg-blue" style=" font-size:12px; color:white" rowspan="5" dir="ltr">
                    4-1
                </td>
                <td class="text-center bg-blue " style=" font-size:12px; color:white" rowspan="5">
                    <p>الأمن السيبراني المتعلق بسلسلة الإمداد والأطراف الخارجية

                    </p>
                    <p>(Supply Chain and Third-Party Cybersecurity)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    4-1-P-1


                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة إلى تطبيق الضابطين ٤-١-٢ و ٤-١-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات
                        الأمن السيبراني المتعلق بالأطراف الخارجية لدى مقدمي الخدمات، بحد أدنى مايلي:
                    </p>
                    <p>In addition to implementing the ECC controls 4-1-2 and 4-1-3, the CSP shall cover the following
                        additional subcontrols for third-party cybersecurity requirements, as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
                @foreach ($report as $row)
                    @if ($row->main_domain_id == 'NCA-CCC-4' && $row->sub_domain_id == 'NCA-CCC-4-1')
                        @include('pdf.partials.cells')
                    @endif
                @endforeach
            </tr>
        </tbody>
    </table>
@endsection
