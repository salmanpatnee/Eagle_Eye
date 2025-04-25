<!-- <!DOCTYPE html5>
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
            <div class="TableHeading">
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
                                    placeholder="Enter ID" value="{{ $data['control_assessment_id'] }}"></p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Name</p>
                                <p class="FieldHeadArbTxt">اسم تقييم الضوابط</p>
                            </div>
                            <p><input type="text" name="ContAsstName" id="ContAsstName" class="sh-tx"
                                    placeholder="Enter Name" value="{{ $data['control_assessment_name'] }}"></p>
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
                                    value="{{ $data['control_assessment_description'] }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Start Date</p>
                                <p class="FieldHeadArbTxt">تاريخ بدء تقييم الضوابط</p>
                            </div>
                            <p><input type="date" name="ContAsstStartDate" id="ContAsstStartDate" class="sh-tx"
                                    value="{{ $data['control_assessment_start_date'] }}"></p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment End Date</p>
                                <p class="FieldHeadArbTxt">تاريخ انتهاء تقييم الضوابط</p>
                            </div>
                            <p><input type="date" name="ContAsstEndDate" id="ContAsstEndDate" class="sh-tx"
                                    value="{{ $data['control_assessment_end_date'] }}"></p>
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
                                    value="{{ $data['control_assessment_type'] }}"></p>
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
                                    {{ $data['control_assessment_internal_external'] == 'Internal' ? 'selected' : '' }}>
                                    Internal</option>
                                <option value="External"
                                    {{ $data['control_assessment_internal_external'] == 'External' ? 'selected' : '' }}>
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
                                    value="{{ $data['control_assessment_approach'] }}"></p>
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
                                    value="{{ $data['control_assessment_objectives'] }}"></p>
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
                                    value="{{ $data['control_assessment_scope'] }}"></p>
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
                                    value="{{ $data['standard_references'] }}"></p>
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
                                            {{ $data['best_practices_name'] == $bestPract->best_practices_name ? 'selected' : '' }}>
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
                                            {{ $data['location_name'] == $LocName->location_name ? 'selected' : '' }}>
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
                                            {{ $data['auditor_name'] == $auditorName->auditor_first_name ? 'selected' : '' }}>
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
                                            {{ $data['classification_name'] == $className->classification_name ? 'selected' : '' }}>
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
                                    value="{{ $data['control_assessing_entity'] }}"></p>
                        </div>
                    </div>
            </table>
        </div>
    </form>

    <form action="/control-assessment-finding-input/post" method="post">
        @csrf
        <div class="ContAssIndiTable">
            <div class="TableHeading">
                <div class="AssmentButtonContainer">
                    <button type="submit" class="FindAddMoreButton">
                        <p class="ButtonArbTxt">إضافة النتائج</p>
                        <p class="ButtonEngTxt">Add Findings</p>
                    </button>
                </div>
            </div>
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <p class="AssessmentHeadings">Control Assessment Findings</p>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Master ID</p>
                                <p class="FieldHeadArbTxt">رمز مراجعة</p>
                            </div>
                            <p>
                                <select name="ContAsstId" id="ContAsstId" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($contAsstName as $contAsst)
                                        <option value="{{ $contAsst->control_assessment_id }}"
                                            {{ $data['control_assessment_id'] == $contAsst->control_assessment_id ? 'selected' : '' }}>
                                            {{ $contAsst->control_assessment_id }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Finding ID</p>
                                <p class="FieldHeadArbTxt">رمز العثور على</p>
                            </div>
                            <p><input type="text" name="ContAsstFindId" id="ContAsstFindId" class="sh-tx"
                                    placeholder="Enter ID"></p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Finding Name</p>
                                <p class="FieldHeadArbTxt">اسم العثور على</p>
                            </div>
                            <p><input type="text" name="ContAsstFindName" id="ContAsstFindName" class="sh-tx"
                                    placeholder="Enter Name"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Categories</p>
                                <p class="FieldHeadArbTxt">اسم الفئة</p>
                            </div>
                            <p>
                                <button type="button" class="sh-tx" data-toggle="modal" data-target="#myModal">Add
                                    Categories</button>
                                <input type="hidden" name="categories" id="selectedCategories">
                            <div id="selectedCategoriesText"></div>
                            </p>
                        </div>
                        <div class="column">

                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Controls</p>
                                <p class="FieldHeadArbTxt">اسم الضوابط</p>
                            </div>
                            <!-- <p>
                                <button type="button" class="sh-tx" data-toggle="modal" data-target="#myModal">Add
                                    Categories</button>
                                <input type="hidden" name="categories" id="selectedCategories">
                                <div id="selectedCategoriesText"></div>
                            </p> -->
                            <p>
                                <select name="control_id" id="control_dropdown" class="bg-tx"
                                    style="width: 480px;">
                                    <option value="">Select Control</option>
                                    @foreach ($contName as $index => $controls)
                                        <option value="{{ $controls->control_id }}">
                                            {{ $controls->control_id }} - {{ $controls->control_name }}
                                        </option>
                                    @endforeach

                                </select>
                                {{-- <button 
                                    type="button" 
                                    class="sh-tx" 
                                    data-toggle="modal"
                                    data-target="#controlModel">
                                        Add Controls
                                </button>
                                <input type="hidden" name="controlnames" id="selectedControls">
                                <div id="selectedControlNamesText"></div> --}}
                            </p>
                        </div>
                    </div>

                    <div id="evidenve_vs_control_content"></div>
                    {{-- <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Evidences</p>
                                <p class="FieldHeadArbTxt">الأدلة</p>
                            </div>
                            <p>
                                <button type="button" class="sh-tx" data-toggle="modal"
                                    data-target="#evidencemodel">Add
                                    Evidences</button>
                                <input type="hidden" name="evidencenames" id="selectedEvidences">
                            <div id="selectedEvidenceText"></div>
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Artifacts</p>
                                <p class="FieldHeadArbTxt">الأداة</p>
                            </div>
                            <p>
                                <button type="button" class="sh-tx" data-toggle="modal"
                                    data-target="#artifactsModel">Add Artifacts</button>
                                <input type="hidden" name="artifactnames" id="selectedArtifacts">
                            <div id="selectedArtifactText"></div>
                            </p>
                        </div> --}}

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
                            <select name="ControlImpleStatus" id="ControlImpleStatus" class="bg-tx">
                                <option value="Implemented">(Implemented) مطبق كليًا</option>
                                <option value="Not Implemented">(Not Implemented) غير مطبق</option>
                                <option value="Pending">(Partially Implemented) مطبق جزئيًا</option>
                            </select>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Implementation Details</p>
                                <p class="FieldHeadArbTxt">ضوابط تفاصيل التنفيذ</p>
                            </div>
                            <p><input type="text" name="ControlImpleDetail" id="ControlImpleDetail"
                                    class="bg-tx" placeholder="Write Control Implementation Details">
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Maturity Level</p>
                                <p class="FieldHeadArbTxt">مستوى النضج</p>
                            </div>
                            <p><input type="text" name="ContMaturityLevel" id="ContMaturityLevel" class="bg-tx"
                                    placeholder="Write Control Maturity Level"></p>
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
                    <!--<div class="ContentTable">-->
                    <!--    <div class="column">-->
                    <!--        <div class="FieldHead">-->
                    <!--            <p class="FieldHeadEngTxt">Preventive Action</p>-->
                    <!--            <p class="FieldHeadArbTxt">إجراءات وقائية</p>-->
                    <!--        </div>-->
                    <!--        <p><input type="text" name="PreventiveAction" id="PreventiveAction" class="bg-tx"-->
                    <!--                placeholder="Write Preventive Action"></p>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="ContentTable">-->
                    <!--    <div class="column">-->
                    <!--        <div class="FieldHead">-->
                    <!--            <p class="FieldHeadEngTxt">Preventive Action Due Date</p>-->
                    <!--            <p class="FieldHeadArbTxt">تاريخ استحقاق الإجراءات الوقائية</p>-->
                    <!--        </div>-->
                    <!--        <p><input type="date" name="PreventiveActionDueDate" id="PreventiveActionDueDate"-->
                    <!--                class="bg-tx"></p>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="ContentTable">-->
                    <!--    <div class="column">-->
                    <!--        <div class="FieldHead">-->
                    <!--            <p class="FieldHeadEngTxt">Lesson Learned</p>-->
                    <!--            <p class="FieldHeadArbTxt">تعلم الدرس</p>-->
                    <!--        </div>-->
                    <!--        <p><input type="text" name="LessonLearned" id="LessonLearned" class="bg-tx"-->
                    <!--                placeholder="Write Lesson Learned"></p>-->
                    <!--    </div>-->
                    <!--</div>-->
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
            </table>
        </div>
    </form>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Select categories</h4>
                </div>
                <div class="modal-body">
                    @foreach ($controlAssessmentCategory as $AuditCat)
                        <label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="category"
                                        name="category{{ $AuditCat->category_id }}"
                                        id="category-{{ $AuditCat->category_id }}"
                                        value="{{ $AuditCat->category_id }}">
                                    {{ $AuditCat->category_id }} - {{ $AuditCat->category_name }}
                                </label>
                            </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Select categories</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="controlModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Select Controls</h4>
                </div>
                <div class="modal-body" style="max-height: 500px; overflow-y: auto;">

                    @foreach ($contName as $index => $controls)
                        <div class="checkbox">

                            <label>
                                <input type="checkbox" class="controlsclass"
                                    name="controls{{ $controls->control_id }}"
                                    id="control-{{ $controls->control_id }}" value="{{ $controls->control_id }}">
                                <b>{{ $controls->control_id }}</b> - {{ $controls->control_name }}
                            </label>
                            <hr>
                        </div>
                    @endforeach


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Select Controls</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="evidencemodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Select Evidences</h4>
                </div>
                <div class="modal-body">
                    @foreach ($controlAssessmentEvidences as $evidences)
                        <label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="evidenceclass"
                                        name="evidences{{ $evidences->evidence_id }}"
                                        id="evidences-{{ $evidences->evidence_id }}"
                                        value="{{ $evidences->evidence_id }}">
                                    {{ $evidences->evidence_id }} - {{ $evidences->evidence_name }}
                                </label>
                            </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Select Evidences</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="artifactsModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Select Artifacts</h4>
                </div>
                <div class="modal-body">
                    @foreach ($controlAssessmentArtifacts as $attachments)
                        <label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="artifactclass"
                                        name="artifacts{{ $attachments->artifact_id }}"
                                        id="artifacts-{{ $attachments->artifact_id }}"
                                        value="{{ $attachments->artifact_id }}">
                                    {{ $attachments->artifact_id }} - {{ $attachments->artifact_name }}
                                </label>
                            </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Select Artifacts</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
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

        function updateSelectedOptions() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.category:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            // selectedOptionsText.length

            $('#selectedCategories').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#selectedCategoriesText').text(selectedOptionsText.length + " categories selected.");
            } else {
                $('#selectedCategoriesText').text("No categories selected.");

            }

        }
        // When any checkbox is clicked
        $('.category').change(function() {
            updateSelectedOptions();
        });


        function updateSelectedControls() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.controlsclass:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            // selectedOptionsText.length

            $('#selectedControls').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#selectedControlNamesText').text(selectedOptionsText.length + " Controls selected.");
            } else {
                $('#selectedControlNamesText').text("No Controls Selected.");

            }

        }
        // When any checkbox is clicked
        $('.controlsclass').change(function() {
            updateSelectedControls();
        });


        function updateSelectedEvidences() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.evidenceclass:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            // selectedOptionsText.length

            $('#selectedEvidences').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#selectedEvidenceText').text(selectedOptionsText.length + " Evidences selected.");
            } else {
                $('#selectedEvidenceText').text("No Evidences Selected.");

            }

        }
        // When any checkbox is clicked
        $('.evidenceclass').change(function() {
            updateSelectedEvidences();
        });


        function updateSelectedArtifacts() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.artifactclass:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            // selectedOptionsText.length

            $('#selectedArtifacts').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#selectedArtifactText').text(selectedOptionsText.length + " Artifacts selected.");
            } else {
                $('#selectedArtifactText').text("No Artifacts Selected.");

            }

        }
        // When any checkbox is clicked
        $('.artifactclass').change(function() {
            updateSelectedArtifacts();
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>


</body>
