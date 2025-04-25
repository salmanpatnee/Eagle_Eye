<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tag  -->
    <title>Compliance 360</title>
    <meta name="title" content="Saturn-V GRC Tool">
    <meta name="description" content="Zain Cloud GRC Tool">
    <!-- Boxicons Icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/7-Sidebar/1-Sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/2-Table/IndividualTable.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <style>
        h1 {
            font-size: 1.7em;
            margin: 0 0 0 10px;
        }

        .btn {
            color: #fff;
        }

        .btn-dark,
        .btn-dark:hover,
        .btn-dark:active {
            color: #fff;
            background-color: #000;
            border-color: #000;
        }

        .modal-header {

            background: linear-gradient(to right, #203864, #2e74b6);
        }

        .modal-title {

            color: #fff;
        }

        div#selectedCategoriesText {
            margin-top: 1em;
            color: cornflowerblue;
        }

        div#evidenve_vs_control_content {
            padding: 0 1em;
        }

        #evidenve_vs_control_content table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;

            margin: 0 auto;

        }

        #evidenve_vs_control_content table th,
        #evidenve_vs_control_content table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #evidenve_vs_control_content table th {
            background-color: #203864;
            color: #fff;
        }

        #evidenve_vs_control_content table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #evidenve_vs_control_content table tr:hover {
            background-color: #ddd;
        }

        .ContAssIndiTable .ContentTable .bg-tx {

            width: 1265px;

        }

        @media (min-width: 768px) {
            .modal-dialog {
                width: 100vh;
                margin: 200px auto;
            }
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <section>
        <header>
            <div class="Header">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i style="padding-right: 30px" class='bx bx-right-arrow-alt'></i>
                <div class="HeadingTxt">
                    <p class="ArbTxt">تقييم الضوابط</p>
                    <p class="EngTxt">Control Assessment</p>
                </div>
                <div class="RightButtonContainer">
                    <button type="button" class="RightButton" onclick="goBack()">
                        <p>للخلف</p>
                        <p>Back</p>
                    </button>
                </div>
            </div>
        </header>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <form id="MasterForm" action="/control-assessment-input/post" method="post">
        @csrf
        <div class="ContAssIndiTable">
            <div class="TableHeading" style="margin-top: 100px;">
                <div class="ButtonContainer">
                    <a href="{{ route('control-assessments.index') }}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <button id="submitBtn" type="submit" class="MoreButton">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </button>
                    <a href="" class="DisabledButton">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    <a href="" class="DisDeleteButton">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </a>
                </div>
            </div>
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <p class="AssessmentHeadings">Control Assessment Master</p>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment ID</p>
                                <p class="FieldHeadArbTxt">رمز تقييم الضوابط</p>
                            </div>
                            <p><input type="text" name="ContAsstId" id="ContAsstId" class="sh-tx"
                                    placeholder="Enter ID" value="{{ isset($data) && $data['control_assessment_id'] }}"></p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Name</p>
                                <p class="FieldHeadArbTxt">اسم تقييم الضوابط</p>
                            </div>
                            <p><input type="text" name="ContAsstName" id="ContAsstName" class="sh-tx"
                                    placeholder="Enter Name" value="{{ isset($data) && $data['control_assessment_name'] }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Description</p>
                                <p class="FieldHeadArbTxt">وصف تقييم الضوابط</p>
                            </div>
                            <p><input type="text" name="ContAsstDes" id="ContAsstDes" class="bg-tx"
                                    placeholder="Write Description"
                                    value="{{ isset($data) && $data['control_assessment_description'] }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Start Date</p>
                                <p class="FieldHeadArbTxt">تاريخ بدء تقييم الضوابط</p>
                            </div>
                            <p><input type="date" name="ContAsstStartDate" id="ContAsstStartDate" class="sh-tx"
                                    value="{{ isset($data) && $data['control_assessment_start_date'] }}"></p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment End Date</p>
                                <p class="FieldHeadArbTxt">تاريخ انتهاء تقييم الضوابط</p>
                            </div>
                            <p><input type="date" name="ContAsstEndDate" id="ContAsstEndDate" class="sh-tx"
                                    value="{{ isset($data) && $data['control_assessment_end_date'] }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Type</p>
                                <p class="FieldHeadArbTxt">نوع تقييم الضوابط</p>
                            </div>
                            <p><input type="text" name="ContAsstType" id="ContAsstType" class="bg-tx"
                                    placeholder="Write Control Assessment Type Name"
                                    value="{{ isset($data) && $data['control_assessment_type'] }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Internal or External</p>
                                <p class="FieldHeadArbTxt">تقييم الضوابط الداخلية أو الخارجية</p>
                            </div>
                            <select class="sh-tx" name="ContAsstIntExt" id="ContAsstIntExt">
                                <option value="Internal"
                                    {{ isset($data) && $data['control_assessment_internal_external'] == 'Internal' ? 'selected' : '' }}>
                                    Internal</option>
                                <option value="External"
                                    {{ isset($data) && $data['control_assessment_internal_external'] == 'External' ? 'selected' : '' }}>
                                    External</option>
                            </select>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Approach</p>
                                <p class="FieldHeadArbTxt">نهج تقييم الضوابط</p>
                            </div>
                            <p><input type="text" name="ContAsstApp" id="ContAsstApp" class="bg-tx"
                                    placeholder="Write Control Assessment Approach"
                                    value="{{ isset($data) && $data['control_assessment_approach'] }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Objectives</p>
                                <p class="FieldHeadArbTxt">أهداف تقييم الضوابط</p>
                            </div>
                            <p><input type="text" name="ContAsstObj" id="ContAsstObj" class="bg-tx"
                                    placeholder="Write Control Assessment Objectives"
                                    value="{{ isset($data) && $data['control_assessment_objectives'] }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Scope</p>
                                <p class="FieldHeadArbTxt">نطاق تقييم الضوابط</p>
                            </div>
                            <p><input type="text" name="ContAsstScope" id="ContAsstScope" class="bg-tx"
                                    placeholder="Write Control Assessment Scope"
                                    value="{{ isset($data) && $data['control_assessment_scope'] }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Standard References</p>
                                <p class="FieldHeadArbTxt">مراجع معايير</p>
                            </div>
                            <p><input type="text" name="ContAsstStandRef" id="ContAsstStandRef" class="bg-tx"
                                    placeholder="Write Control Assessment Standard References"
                                    value="{{ isset($data) && $data['standard_references'] }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Best Practice Name</p>
                                <p class="FieldHeadArbTxt">اسم أفضل الممارسات</p>
                            </div>
                            <p>
                                <select name="BestPractName" id="BestPractName" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($bestPracts as $bestPract)
                                        <option value="{{ $bestPract->best_practices_name }}"
                                            {{ isset($data) && $data['best_practices_name'] == $bestPract->best_practices_name ? 'selected' : '' }}>
                                            {{ $bestPract->best_practices_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Location Name</p>
                                <p class="FieldHeadArbTxt">اسم الموقع</p>
                            </div>
                            <p>
                                <select name="LocName" id="LocName" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($LocNames as $LocName)
                                        <option value="{{ $LocName->location_name }}"
                                            {{ isset($data) && $data['location_name'] == $LocName->location_name ? 'selected' : '' }}>
                                            {{ $LocName->location_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditor Name</p>
                                <p class="FieldHeadArbTxt">اسم مدقق</p>
                            </div>
                            <p>
                                <select name="AuditorName" id="AuditorName" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($auditorNames as $auditorName)
                                        <option value="{{ $auditorName->auditor_first_name }}"
                                            {{ isset($data) && $data['auditor_name'] == $auditorName->auditor_first_name ? 'selected' : '' }}>
                                            {{ $auditorName->auditor_first_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Classification Name</p>
                                <p class="FieldHeadArbTxt">اسم التصنيف</p>
                            </div>
                            <p>
                                <select name="className" id="className" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($classNames as $className)
                                        <option value="{{ $className->classification_name }}"
                                            {{ isset($data) && $data['classification_name'] == $className->classification_name ? 'selected' : '' }}>
                                            {{ $className->classification_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessing Entity</p>
                                <p class="FieldHeadArbTxt">ضوابط تقييم الجهة</p>
                            </div>
                            <p><input type="text" name="ContAsstEntity" id="ContAsstEntity" class="bg-tx"
                                    placeholder="Write Control Assessment Entity Name"
                                    value="{{ isset($data) && $data['control_assessing_entity'] }}"></p>
                        </div>
                    </div>
            </table>
        </div>
    </form>

    <form action="/control-assessment-finding-input/post" method="post">
        @csrf
        <div class="ContAssIndiTable">


            <div class="ContentTableSection">
                <p class="AssessmentHeadings">Control Assessment Findings</p>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Assessment Master ID</p>
                            <p class="FieldHeadArbTxt">رمز مراجعة</p>
                        </div>
                       
                        <p>
                            <select name="ContAsstId" id="control_assessment_id" class="sh-tx "
                                onchange="updateAssetRegGroupmentId()" required>
                                <option value="" disabled selected hidden>Select Option</option>
                                @foreach ($contAsstName as $contAsst)
                                    <option value="{{ $contAsst->control_assessment_id }}"
                                        {{ isset($data) && $data['control_assessment_id'] == $contAsst->control_assessment_id ? 'selected' : '' }}>
                                        {{ $contAsst->control_assessment_id }}
                                    </option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                     
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Assessment Finding ID</p>
                            <p class="FieldHeadArbTxt">رمز العثور على</p>
                        </div>
                        <p><input type="text" name="ContAsstFindId" id="ContAsstFindId" class="sh-tx"
                                placeholder="Enter ID" required></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Assessment Finding Name</p>
                            <p class="FieldHeadArbTxt">اسم العثور على</p>
                        </div>
                        <p><input type="text" name="ContAsstFindName" id="ContAsstFindName" class="sh-tx"
                                placeholder="Enter Name" required></p>
                    </div>
                   
                    <div class="column">
                        <x-label label="Categories" label_ar="اسم الفئة" />
                        <x-modal-button modal_id="categoriesModal" label="Add Category" name="categories"
                            :data="isset($controlmaster->category_id)
                                ? json_encode($controlmaster->category_id)
                                : ''" />


                    </div>
                    
                </div>
                <div class="ContentTable">
                    
                    <div class="column">

                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Controls</p>
                            <p class="FieldHeadArbTxt">اسم الضوابط</p>
                        </div>

                        <p>
                            <select name="control_id" id="control_dropdown" class="bg-tx" style="width: 480px;"
                                required>
                                <option value="">Select Control</option>
                                @foreach ($contName as $index => $controls)
                                    <option value="{{ $controls->control_id }}">
                                        {{ $controls->control_id }} - {{ $controls->control_name }}
                                    </option>
                                @endforeach

                            </select>

                        </p>
                    </div>
                </div>

                <div id="evidenve_vs_control_content"></div>


                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Assessment Finding Description</p>
                            <p class="FieldHeadArbTxt">وصف العثور على</p>
                        </div>
                        <p><input type="text" name="ContAsstFindDes" id="ContAsstFindDes" class="bg-tx"
                                placeholder="Write Description"></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Assessment Findings Implementation Status</p>
                            <p class="FieldHeadArbTxt">حالة العثور على</p>
                        </div>
                        <select name="ControlImpleStatus" id="ControlImpleStatus" class="bg-tx" required>
                            <option value="Implemented">(Implemented) مطبق كليًا</option>
                            <option value="Not Implemented">(Not Implemented) غير مطبق</option>
                            <option value="Partially Implemented">(Partially Implemented) مطبق جزئيًا</option>
                            <option value="Not Applicable">(Not Applicable) غير قابل للتطبيق</option>
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Implementation Details</p>
                            <p class="FieldHeadArbTxt">ضوابط تفاصيل التنفيذ</p>
                        </div>
                        <p><input type="text" name="ControlImpleDetail" id="ControlImpleDetail" class="bg-tx"
                                placeholder="Write Control Implementation Details">
                        </p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Maturity Level</p>
                            <p class="FieldHeadArbTxt">مستوى النضج</p>
                        </div>
                        <select name="ContMaturityLevel" id="ContMaturityLevel" class="bg-tx" required>
                            <option value="1">1 </option>
                            <option value="2">2 </option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>


                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Maturity Justification</p>
                            <p class="FieldHeadArbTxt">ضوابط تبرير النضج</p>
                        </div>
                        <p><input type="text" name="ContMaturityJustification" id="ContMaturityJustification"
                                class="bg-tx" placeholder="Write Control Maturity Justification"></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Assessment Remarks</p>
                            <p class="FieldHeadArbTxt">ملاحظات تقييم الضوابط</p>
                        </div>
                        <p><input type="text" name="ContAsstRemarks" id="ContAsstRemarks" class="bg-tx"
                                placeholder="Write Control Assessment Remarks"></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Corrective Action</p>
                            <p class="FieldHeadArbTxt">إجراءات التصحيح</p>
                        </div>
                        <p><input type="text" name="CorrectAction" id="CorrectAction" class="bg-tx"
                                placeholder="Write Corrective Action"></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Corrective Action Due Date</p>
                            <p class="FieldHeadArbTxt">تاريخ استحقاق إجراءات التصحيح</p>
                        </div>
                        <p><input type="date" name="CorrectActionDueDate" id="CorrectActionDueDate"
                                class="bg-tx"></p>
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditee Name</p>
                            <p class="FieldHeadArbTxt">الشخص الذي يتم التدقيق عليه</p>
                        </div>
                        <p><input type="text" name="AuditeeName" id="AuditeeName" class="sh-tx"
                                placeholder="Write Control Assessment Auditee Name"></p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditee Department</p>
                            <p class="FieldHeadArbTxt">القسم الذي يتم التدقيق عليه</p>
                        </div>
                        <p><input type="text" name="AuditeeDepart" id="AuditeeDepart" class="sh-tx"
                                placeholder="Write Control Assessment Auditee Department Name"></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditee System</p>
                            <p class="FieldHeadArbTxt">تم تدقيق النظام</p>
                        </div>
                        <p><input type="text" name="AuditeeSys" id="AuditeeSys" class="bg-tx"
                                placeholder="Write Control Auditee System"></p>
                    </div>
                </div>

                
            </div>

            <div class="TableHeading">
                <div class="AssmentButtonContainer">
                    <button type="submit" class="FindAddMoreButton">
                        <p class="ButtonArbTxt">احفظ وأضف المزيد</p>
                        <p class="ButtonEngTxt">Save and add more</p>
                    </button>
                    <button type="submit" class="FindAddMoreButton" style="margin-right: -220px">
                        <p class="ButtonArbTxt">حفظ والخروج</p>
                        <p class="ButtonEngTxt">Save and exit</p>
                    </button>
                </div>
            </div>
        </div>
    </form>


    <x-modal id="categoriesModal" title="Select Category" :data="$categories" :selectedvalues="isset($categoryIds) ? $categoryIds: []" checkboxClass="categoryCheckbox"
        id_key="category_id" value_key="category_name" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            
            $("#BestPractName").change(function() {
                let bestPracticeName = $(this).val();
                let controlAssessmentId = $('#control_assessment_id').val();
                $.ajax({
                    url: '/bestpractice-controlls',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        bestPracticeName, 
                        controlAssessmentId
                    },
                    success: function(response) {
                        $("#control_dropdown").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Handle any errors
                    }
                });


            });
            
            $("#control_dropdown").change(function() {
                var selectedValue = $(this).val();
                console.log("Selected value:", selectedValue);

                $.ajax({
                    url: '/evidence-conroller',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        selectedValue: selectedValue
                    },
                    success: function(response) {
                        $("#evidenve_vs_control_content").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Handle any errors
                    }
                });


            });
        });



        $('.categoryCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.categoryCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#categories').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#categoriesText').text(selectedOptionsText.length + " Category Selected.");
            } else {
                $('#categoriesText').text("Category selected.");
            }
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>


</body>
