@extends('pdf.partials.layout')
@section('title', 'NCA-CCC-CST Report')

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
                    <p>مستوى البيانات المستضافة لدى مقدمي الخدمات</p>
                    <p>Data clasification level hosted in cloud services provided by CSPs</p>
                </th>
                <th class="bg-light-gray text-center">
                    <p style="font-weight: normal">المستوى 1</p>
                    <p style="font-weight: normal">Level 1</p>
                </th>
                <th class="bg-light-gray text-center" colspan="2">
                    <p>عدد المشتركين في الخدمة</p>
                    <p>Number of CSTs for this service</p>
                </th>
                <th class="bg-light-gray text-center"></th>
                <th class="bg-light-gray text-center" colspan="2">
                    <p>مقدمي الخدمات</p>
                    <p>Cloud providers</p>
                </th>
                <th class="" colspan="3"></th>
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

            {{-- 1-1-T-1 --}}
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
                    1-1-T-1
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضابط ١-٤-١ في الضوابط الأساسية للأمن السيبراني، يجب على صاحب الصلاحية تحديد وتوثيق
                        واعتماد ما يلي:</p>
                    <p> In addition to the ECC control 1-4-1, the Authorizing Official shall also identify, document and
                        approve</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-1' && $row->sub_domain_id == 'NCA-CCC-1-1')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 1-2-T-1 --}}
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
                    <p dir="ltr">1-2-T-1
                    </p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>يجب أن تتضمن منهجية إدارة مخاطر الأمن السيبراني المذكورة في المكون الفرعي ١-٥ في الضوابط
                        الأساسية للأمن السيبراني لدى المشتركين بحد أدنى ما يلي:
                    </p>
                    <p>
                        Cybersecurity risk management methodology mentioned in the ECC Subdomain 1-5 shall also include
                        for the CST, as a minimum
                    </p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-1' && $row->sub_domain_id == 'NCA-CCC-1-2')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 1-3-T-1 --}}
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
                    <p dir="ltr">1-3-T-1
                    </p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضابط ١-٧-١ في الضوابط الأساسية للأمن السيبراني، يجب أن يشتمل التزام المشتركين
                        بالمتطلبات التشريعية والتنظيمية بحد أدنى ما يلي:


                    </p>
                    <p dir="ltr">In addition to the ECC control 1-7-1, the CST legislative and regulatory
                        compliance should include as a minimum with the following requirements"</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-1' && $row->sub_domain_id == 'NCA-CCC-1-3')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 1-4-T-1 --}}
            <tr>
                <td class="bg-blue text-center" style="font-size:12px; vertical-align: middle; color:white" rowspan="2">
                </td>
                <td class="text-center bg-blue" style=" font-size:12px; color:white" rowspan="2">
                    <p>1-4</p>
                </td>
                <td class="text-center bg-blue " style=" font-size:12px; color:white" rowspan="2">
                    <p>الأمن السيبراني المتعلق بالموارد البشرية
                    </p>
                    <p>(Cybersecurity in Human Resources)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p dir="ltr">1-4-T-1

                    </p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ١-٩-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي
                        متطلبات الأمن السيبراني قبل بدء العلاقة المهنية بين العاملين والمشتركين، بحد أدنى ما يلي:


                    </p>
                    <p>In addition to subcontrols in the ECC control 1-9-3, the following requirements should be covered
                        prior the professional relationship of staff with the CST shall cover, at a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-1' && $row->sub_domain_id == 'NCA-CCC-1-4')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-1-T-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="2">
                    <p>2- تعزيز الأمن السيبراني </p>
                    <p>(Cybersecurity Defense)</p>
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="2">
                    <p>2-1</p>
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="2">
                    <p>إدارة الأصول
                    </p>
                    <p>(Asset Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-1-T-1
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط ضمن المكون الفرعي ٢-١ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات
                        الأمن السيبراني لإدارة الأصول المعلوماتية والتقنية لدى المشتركين، بحد أدنى ما يلي:


                    </p>
                    <p>In addition to controls in the ECC control 2-1, the CST shall cover the following additional
                        controls for cybersecurity requirements for cybersecurity event logs and monitoring management,
                        as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-1')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-1-T-2 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="4">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="4" dir="ltr">
                    2-2
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="4">
                    <p>إدارة هويات الدخول والصلاحيات

                    </p>
                    <p>(Identity and Access Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-2-T-1
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>"بالإضافة للضوابط الفرعية ضمن الضابط ٢-٢-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي
                        متطلبات الأمن السيبراني الخاصة بإدارة هويات الدخول والصلاحيات لدى المشتركين، بحد أدنى مايلي:


                    </p>
                    <p>In addition to subcontrols in the ECC control 2-2-3, the CST shall cover the following additional
                        subcontrols for cybersecurity requirements for identity and access management requirements, as a
                        minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-CCC-2' &&
                        $row->sub_domain_id == 'NCA-CCC-2-2' &&
                        ($row->control_id == 'NCA-CCC-2-2-T-1-1' ||
                            $row->control_id == 'NCA-CCC-2-2-T-1-2' ||
                            $row->control_id == 'NCA-CCC-2-2-T-1-3'))
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-1-T-2 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="3">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="3" dir="ltr">
                    2-2
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="3">
                    <p>إدارة هويات الدخول والصلاحيات

                    </p>
                    <p>(Identity and Access Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    _
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    _
                </td>
                <td class="text-center bg-light-gray">
                    _
                </td>
                <td class="text-start py-2">
                    _
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if (
                    $row->main_domain_id == 'NCA-CCC-2' &&
                        $row->sub_domain_id == 'NCA-CCC-2-2' &&
                        ($row->control_id == 'NCA-CCC-2-2-T-1-4' || $row->control_id == 'NCA-CCC-2-2-T-1-5'))
                    @include('pdf.partials.cells')
                @endif
            @endforeach




            {{-- 2-3-T-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="2">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="2" dir="ltr">
                    2-3
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="2">
                    <p>
                        حماية الأنظمة وأجهزة معالجة المعلومات

                    </p>
                    <p>(Information System and Information Processing Facilities Protection)</p>

                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-3-T-1
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-٣-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي
                        متطلبات الأمن السيبراني الخاصة بحماية الأنظمة وأجهزة معالجة المعلومات لدى المشتركين، بحد أدنى
                        مايلي:

                    </p>
                    <p>
                    <p>In addition to subcontrols in the ECC control 2-3-3, the CST shall cover the following additional
                        subcontrols for cybersecurity requirements for information system and processing facilities
                        protection requirements, as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-3')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-4-T-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="2">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="2" dir="ltr">
                    2-4
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="2">
                    <p>إدارة أمن الشبكات


                    </p>
                    <p>(Networks Security Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-4-T-1
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-٥-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي
                        متطلبات الأمن السيبراني الخاصة بإدارة أمن الشبكات لدى المشتركين، بحد أدنى مايلي:


                    </p>
                    <p>In addition to subcontrols in the ECC control 2-5-3, the CST shall cover the following additional
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

            {{-- 2-5-T-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="2">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="2" dir="ltr">
                    2-5
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="2">
                    <p>أمن الأجهزة المحمولة


                    </p>
                    <p>(Mobile Devices Security)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-5-T-1
                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-٦-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي
                        متطلبات الأمن السيبراني الخاصة بأمن الأجهزة المحمولة لدى المشتركين، بحد أدنى مايلي:


                    </p>
                    <p>In addition to subcontrols in the ECC control 2-6-3, the CST shall cover the following additional
                        subcontrols for cybersecurity requirements for mobile device security, as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-5')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-6-T-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="3">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="3" dir="ltr">
                    2-6
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="3">
                    <p>حماية البيانات والمعلومات
                    </p>
                    <p>Data and Information Protection</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-6-T-1

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-٧-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي
                        متطلبات الأمن السيبراني الخاصة بحماية بيانات و معلومات المشتركين في الحوسبة السحابية، بحد أدنى
                        مايلي:


                    </p>
                    <p>In addition to subcontrols in the ECC control 2-7-3, the CST shall cover the following additional
                        subcontrols for cybersecurity requirements for protecting CST’s data and information in cloud
                        computing , as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-6')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-7-T-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="3">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="3" dir="ltr">
                    2-7
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="3">
                    <p>التشفير
                    </p>
                    <p>(Cryptography)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-7-T-1

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-٨-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي
                        متطلبات الأمن السيبراني الخاصة بالتشفير لدى المشتركين، بحد أدنى مايلي:


                    </p>
                    <p>In addition to subcontrols in the ECC control 2-8-3, the CST shall cover the following additional
                        subcontrols for cryptography, as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-7')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-9-T-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="3">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="3" dir="ltr">
                    2-9
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
                    2-9-T-1

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٠-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي
                        متطلبات الأمن السيبراني الخاصة بإدارة الثغرات لدى المشتركين، بحد أدنى مايلي:


                    </p>
                    <p>In addition to subcontrols in the ECC control 2-10-3, the CST shall cover the following
                        additional subcontrols for cybersecurity requirements for vulnerability management requirements,
                        as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-9')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-11-T-1 --}}
            <tr>
                <td class="bg-teal text-center be-teal" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="3">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="3" dir="ltr">
                    2-11
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="3">
                    <p>إدارة سجلات الأحداث ومراقبة الأمن السيبراني


                    </p>
                    <p>(Cybersecurity Event Logs and Monitoring Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-11-T-1

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٢-١٢-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي
                        متطلبات الأمن السيبراني لإدارة سجلات الأحداث ومراقبة الأمن السيبراني لدى المشتركين، بحد أدنى
                        مايلي:

                    </p>
                    <p>In addition to subcontrols in the ECC control 2-12-3, the CST shall cover the following
                        additional subcontrols for cybersecurity requirements for cybersecurity event logs and
                        monitoring management, as a minimum</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-11')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-15-T-1 --}}
            <tr>
                <td class="bg-teal text-center " style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="4">
                </td>
                <td class="text-center bg-teal" style=" font-size:12px; color:white" rowspan="4" dir="ltr">
                    2-15
                </td>
                <td class="text-center bg-teal " style=" font-size:12px; color:white" rowspan="4">
                    <p>إدارة المفاتيح
                    </p>
                    <p>(Key Management)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-15-T-1


                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>يجب تحديد وتوثيق واعتماد متطلبات الأمن السيبراني، الخاصة بإدارة المفاتيح لدى المشتركين.


                    </p>
                    <p>Cybersecurity requirements for key management within the CST shall be identified, documented and
                        approved</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            {{-- 2-15-T-2 --}}
            <tr>

                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-15-T-2



                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>يجب تطبيق متطلبات الأمن السيبراني، الخاصة بإدارة المفاتيح لدى المشتركين.


                    </p>
                    <p>Cybersecurity requirements for key management within the CST shall applied</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>

            {{-- 2-15-T-3 --}}
            <tr>

                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-15-T-3

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضابط ٢-٨-٣-٢ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي متطلبات الأمن السيبراني،
                        الخاصة بعملية إدارة المفاتيح لدى المشتركين، بحد أدنى ما يلي:


                    </p>
                    <p>In addition to the ECC subcontrol
                        2-8-3-2
                        cybersecurity requirements for key management within the CST shall cover, at minimum, the
                        following</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>
            @foreach ($report as $row)
                @if ($row->main_domain_id == 'NCA-CCC-2' && $row->sub_domain_id == 'NCA-CCC-2-15')
                    @include('pdf.partials.cells')
                @endif
            @endforeach

            {{-- 2-15-T-4 --}}
            <tr>

                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    2-15-T-4

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>يجب مراجعة متطلبات الأمن السيبراني الخاصة بإدارة المفاتيح لدى المشتركين، ومراجعة تطبييقها،
                        دوريًا.


                    </p>
                    <p>Cybersecurity requirements for key management within the CST shall be applied and reviewed
                        periodically</p>
                </td>
                @include('pdf.partials.static-cells')
            </tr>

            {{-- 3-1 --}}
            <tr>
                <td class="bg-dark be-dark text-center" style="font-size:12px; vertical-align: middle; color:white"
                    rowspan="2">
                    <p>3- صمود الأمن السيبراني

                    </p>
                    <p>(Cybersecurity Resilience)</p>
                </td>
                <td class="text-center bg-dark" style=" font-size:12px; color:white" rowspan="2" dir="ltr">
                    3-1
                </td>
                <td class="text-center bg-dark " style=" font-size:12px; color:white" rowspan="2">
                    <p>جوانب صمود الأمن السيبراني في إدارة استمرارية الأعمال

                    </p>
                    <p> (Cybersecurity Resilience aspects of Business Continuity Management - BCM)</p>
                </td>
                <td class="text-center bg-light-gray">
                    <p>أساسي</p>
                    <p>Main Control</p>
                </td>
                <td class="text-center bg-light-gray" dir="ltr">
                    3-1-T-1

                </td>
                <td class="text-center bg-light-gray">
                    <p>يجب تطبيقه كليًا</p>
                    <p>Must be fully implemented</p>
                </td>
                <td class="text-start py-2">
                    <p>بالإضافة للضوابط الفرعية ضمن الضابط ٣-١-٣ في الضوابط الأساسية للأمن السيبراني، يجب أن تغطي
                        متطلبات الأمن السيبراني لجوانب صمود الأمن السيبراني في إدارة استمرارية الأعمال لدى المشتركين،
                        بحد أدنى مايلي:
                    </p>
                    <p>In addition to subcontrols in the ECC control 3-1-3, the CST shall cover the following additional
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
        </tbody>
    </table>
@endsection
