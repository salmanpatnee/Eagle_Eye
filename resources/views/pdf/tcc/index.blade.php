@extends('pdf.partials.layout')
@section('title', 'NCA-TCC Report')

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
                {{-- @if ($row->main_domain_id == 'NCA-TCC-1' && $row->sub_domain_id == 'NCA-TCC-1-1' && $row->control_id == 'NCA-TCC-1-1-1') --}}
                <tr>
                    <td class="bg-blue text-center be-blue" style="font-size:12px; vertical-align: middle; color:white"
                        rowspan="1">
                        <p>١- حوكمة الأمن السيبراني </p>
                        <p>(Cybersecurity Governance)</p>
                    </td>
                    <td class="text-center bg-blue be-blue" style="width: 30px; font-size:12px; color:white" rowspan="1">
                        1-1
                    </td>
                    <td class="text-center bg-blue be-blue " style=" font-size:12px; color:white" rowspan="1">
                        <p>سياسات وإجراءات الأمن السيبراني</p>
                        <p>( Cybersecurity Policies and Procedures)</p>
                    </td>
                    <td class="text-center bg-light-gray bordered">
                        <p>أساسي</p>
                    </td>
                    <td class="text-center bg-light-gray bordered" dir="ltr">
                        1-1-1
                    </td>
                    <td class="text-start py-2 description bordered">
                        <p>رجوعا للضابط ١-٣-١ في الضوابط الأساسية للأمن السيبراني، يجب أن تشمل سياسات وإجراءات الأمن
                            السيبراني ما يأتي:</p>
                        <p>Back to the officer 1-3-1In the basic controls of cybersecurity, cybersecurity policies and
                            procedures must include the following:</p>
                    </td>
                    @include('pdf.partials.static-cells')
                </tr>
                {{-- @endif --}}
            @endforeach



        </tbody>
    </table>
@endsection
