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

        div#risk_vs_control_content {
            padding: 0 1em;
            width: 100%;
        }

        #risk_vs_control_content table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
        }

        #risk_vs_control_content table th {
            background-color: #203864;
            color: #fff;
        }

        #risk_vs_control_content table th,
        #risk_vs_control_content table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        p.status-para {
            display: flex;
            width: 480px;
            justify-content: space-between;
            font-size: 16px;
            font-weight: 600;
        }

        .status {
            color: white;
            padding: .2em .5em;
            display: inline;
            text-transform: capitalize;
            opacity: 1;
        }

        .status.Open {
            background-color: red;
        }

        .status.Close {
            background-color: green;
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
                    <p class="ArbTxt">تقييم المخاطر</p>
                    <p class="EngTxt">Risk Assessment</p>
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
    <form action="/risk-assessment-input/post" method="post">
        @csrf
        <div class="ContAssIndiTable">
            <div class="TableHeading">
                <div class="ButtonContainer">
                    <a href="{{ route('risk-assessments.index') }}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <button type="submit" class="MoreButton">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </button>
                    <a href="" class="DisabledButton">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    <button type="" class="DisDeleteButton">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                </div>
            </div>
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <p class="AssessmentHeadings">Risk Assessment Master</p>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment ID</p>
                                <p class="FieldHeadArbTxt">رمز تقييم المخاطر</p>
                            </div>
                            <p><input type="text" name="RiskAsstId" id="RiskAsstId" class="sh-tx"
                                    placeholder="Enter ID" value="{{ $data['risk_assessment_id'] }}"></p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment Name</p>
                                <p class="FieldHeadArbTxt">اسم تقييم المخاطر</p>
                            </div>
                            <p><input type="text" name="RiskAsstName" id="RiskAsstName" class="sh-tx"
                                    placeholder="Enter Name" value="{{ $data['risk_assessment_name'] }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment Description</p>
                                <p class="FieldHeadArbTxt">وصف تقييم المخاطر</p>
                            </div>
                            <p><input type="text" name="RiskAsstDes" id="RiskAsstDes" class="bg-tx"
                                    placeholder="Write Description" value="{{ $data['risk_assessment_description'] }}">
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment Start Date</p>
                                <p class="FieldHeadArbTxt">تاريخ بدء تقييم المخاطر</p>
                            </div>
                            <p><input type="date" name="RiskAsstStartDate" id="RiskAsstStartDate" class="sh-tx"
                                    value="{{ $data['risk_assessment_start_date'] }}">
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment End Date</p>
                                <p class="FieldHeadArbTxt">تاريخ انتهاء تقييم المخاطر</p>
                            </div>
                            <p><input type="date" name="RiskAsstEndDate" id="RiskAsstEndDate" class="sh-tx"
                                    value="{{ $data['risk_assessment_end_date'] }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment Type</p>
                                <p class="FieldHeadArbTxt">نوع تقييم المخاطر</p>
                            </div>
                            <p><input type="text" name="RiskAsstType" id="RiskAsstType" class="bg-tx"
                                    placeholder="Write Risk Assessment Type Name"
                                    value="{{ $data['risk_assessment_type'] }}">
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment Internal or External</p>
                                <p class="FieldHeadArbTxt">تقييم المخاطر الداخلية أو الخارجية</p>
                            </div>
                            <select class="sh-tx" name="RiskAsstIntExt" id="RiskAsstIntExt">
                                <option value="Internal"
                                    {{ $data['risk_assessment_internal_external'] == 'Internal' ? 'selected' : '' }}>
                                    Internal</option>
                                <option value="External"
                                    {{ $data['risk_assessment_internal_external'] == 'External' ? 'selected' : '' }}>
                                    External</option>
                            </select>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment Approach</p>
                                <p class="FieldHeadArbTxt">نهج تقييم المخاطر</p>
                            </div>
                            <p><input type="text" name="RiskAsstApp" id="RiskAsstApp" class="bg-tx"
                                    placeholder="Write Risk Assessment Approach"
                                    value="{{ $data['risk_assessment_approach'] }}">
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment Objectives</p>
                                <p class="FieldHeadArbTxt">أهداف تقييم المخاطر</p>
                            </div>
                            <p><input type="text" name="RiskAsstObj" id="RiskAsstObj" class="bg-tx"
                                    placeholder="Write Risk Assessment Objectives"
                                    value="{{ $data['risk_assessment_objectives'] }}">
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment Scope</p>
                                <p class="FieldHeadArbTxt">نطاق تقييم المخاطر</p>
                            </div>
                            <p><input type="text" name="RiskAsstScope" id="RiskAsstScope" class="bg-tx"
                                    placeholder="Write Risk Assessment Scope"
                                    value="{{ $data['risk_assessment_scope'] }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Standard References</p>
                                <p class="FieldHeadArbTxt">مراجع المخاطر</p>
                            </div>
                            <p><input type="text" name="RiskAsstStandRef" id="RiskAsstStandRef" class="bg-tx"
                                    placeholder="Write Risk Assessment Standard References"
                                    value="{{ $data['standard_references'] }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment Against</p>
                                <p class="FieldHeadArbTxt">المخاطر تقييم الجهة</p>
                            </div>
                            <p><input type="text" name="RiskAsstAgainst" id="RiskAsstAgainst" class="bg-tx"
                                    placeholder="Write Risk Assessment Standard References"
                                    value="{{ $data['risk_assessment_against'] }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
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
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditor Name</p>
                                <p class="FieldHeadArbTxt">الشخص الذي يتم التدقيق عليه</p>
                            </div>
                            <p>
                                <select name="AuditorName" id="AuditorName" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($auditorNames as $auditorName)
                                        <option value="{{ $auditorName->auditor_first_name }}"
                                            {{ $data['auditor_first_name'] == $auditorName->auditor_first_name ? 'selected' : '' }}>
                                            {{ $auditorName->auditor_first_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
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
                                <p class="FieldHeadEngTxt">Risk Assessing Entity</p>
                                <p class="FieldHeadArbTxt">المخاطر تقييم الجهة</p>
                            </div>
                            <p><input type="text" name="RiskAsstEntity" id="RiskAsstEntity" class="bg-tx"
                                    placeholder="Write Risk Assessment Entity Name"
                                    value="{{ $data['risk_assessing_entity'] }}"></p>
                        </div>
                    </div>
            </table>
        </div>
    </form>
    <form action="/risk-assessment-finding-input/post" method="post">
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
                    <p class="AssessmentHeadings">Risk Assessment Findings</p>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment ID</p>
                                <p class="FieldHeadArbTxt">رمز مراجعة</p>
                            </div>
                            <p>
                                <select name="RiskAssetName" id="RiskAssetName" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($contAsstName as $riskassetmaster)
                                        <option value="{{ $riskassetmaster->risk_assessment_id }}"
                                            {{ $data['risk_assessment_id'] == $riskassetmaster->risk_assessment_id ? 'selected' : '' }}>
                                            {{ $riskassetmaster->risk_assessment_id }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment Finding ID</p>
                                <p class="FieldHeadArbTxt">رمز العثور على</p>
                            </div>
                            <p><input type="text" name="ContAsstFindId" id="ContAsstFindId" class="sh-tx"
                                    placeholder="Enter ID"></p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment Finding Name</p>
                                <p class="FieldHeadArbTxt">اسم العثور على</p>
                            </div>
                            <p><input type="text" name="ContAsstFindName" id="ContAsstFindName" class="sh-tx"
                                    placeholder="Enter Name"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment Name</p>
                                <p class="FieldHeadArbTxt">اسم تقييم المخاطر</p>
                            </div>
                            <p><select type="text" name="ContAsstName" id="ContAsstName" class="sh-tx"
                                    onchange="updateDepartmentId()">
                                    <option value="" disabled selected>Select Option</option>
                                    @foreach ($contAsstName as $row)
                                        <option value="{{ $row->risk_assessment_name }}">
                                            {{ $row->risk_assessment_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div> --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Name</p>
                                <p class="FieldHeadArbTxt">اسم المخاطر</p>
                            </div>
                            <p><select type="text" name="RiskName" id="RiskName" class="sh-tx">
                                    <option value="" disabled selected>Select Option</option>
                                    @foreach ($riskName as $row)
                                        <option value="{{ $row->risk_id }}">
                                            {{ $row->risk_id }} - {{ $row->risk_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    {{-- <div class="ContentTable"> --}}
                    <div id="risk_vs_control_content"></div>

                    {{-- </div> --}}
                    <div class="ContentTable">
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Likelihood</p>
                                <p class="FieldHeadArbTxt">احتمالات المخاطرة</p>
                            </div>
                            <select name="riskLikelihood" id="riskLikelihood" class="sh-tx">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Impact</p>
                                <p class="FieldHeadArbTxt">تأثير المخاطر</p>
                            </div>
                            <select name="riskImpact" id="riskImpact" class="sh-tx">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Score</p>
                                <p class="FieldHeadArbTxt">درجة المخاطرة</p>
                            </div>
                            <p><input type="text" name="riskScore" id="riskScore" class="sh-tx"></p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Appetite Color</p>
                                <p class="FieldHeadArbTxt">لون الجوع للمخاطرة</p>
                            </div>
                            <p><input type="text" name="appetiteColor" id="appetiteColor" class="sh-tx"
                                    readonly>
                            </p>
                        </div>
                    </div>
                    {{-- <div class="ContentTable">
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
                            <p>
                                <button type="button" class="sh-tx" data-toggle="modal"
                                    data-target="#controlModel">Add Controls</button>
                                <input type="hidden" name="controlnames" id="selectedControls">
                            <div id="selectedControlNamesText"></div>
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
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
                        </div>
                    </div> --}}
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment Finding Description</p>
                                <p class="FieldHeadArbTxt">وصف العثور على</p>
                            </div>
                            <p><input type="text" name="ContAsstFindDes" id="ContAsstFindDes" class="bg-tx"
                                    placeholder="Write Description"></p>
                        </div>
                    </div>

                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Implementation Details</p>
                                <p class="FieldHeadArbTxt">تفاصيل التنفيذ</p>
                            </div>
                            <p><input type="text" name="RiskImpleDetail" id="RiskImpleDetail" class="bg-tx"
                                    placeholder="Write Risk Implementation Details">
                            </p>
                        </div>
                    </div>
                    {{-- <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Maturity Level</p>
                                <p class="FieldHeadArbTxt">مستوى النضج</p>
                            </div>
                            <p><input type="text" name="ContMaturityLevel" id="ContMaturityLevel" class="bg-tx"
                                    placeholder="Write Risk Maturity Level"></p>
                        </div>
                    </div> --}}
                    {{-- <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Maturity Justification</p>
                                <p class="FieldHeadArbTxt">تبرير النضج</p>
                            </div>
                            <p><input type="text" name="ContMaturityJustification" id="ContMaturityJustification"
                                    class="bg-tx" placeholder="Write Risk Maturity Justification"></p>
                        </div>
                    </div> --}}
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Assessment Remarks</p>
                                <p class="FieldHeadArbTxt">ملاحظات تقييم</p>
                            </div>
                            <p><input type="text" name="ContAsstRemarks" id="ContAsstRemarks" class="bg-tx"
                                    placeholder="Write Risk Assessment Remarks"></p>
                        </div>
                    </div>
                    {{-- <div class="ContentTable">
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
                                <p class="FieldHeadArbTxt">تاريخ استحقاق</p>
                            </div>
                            <p><input type="date" name="CorrectActionDueDate" id="CorrectActionDueDate"
                                    class="bg-tx"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Preventive Action</p>
                                <p class="FieldHeadArbTxt">إجراءات وقائية</p>
                            </div>
                            <p><input type="text" name="PreventiveAction" id="PreventiveAction" class="bg-tx"
                                    placeholder="Write Preventive Action"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Preventive Action Due Date</p>
                                <p class="FieldHeadArbTxt">تاريخ استحقاق</p>
                            </div>
                            <p><input type="date" name="PreventiveActionDueDate" id="PreventiveActionDueDate"
                                    class="bg-tx"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Lesson Learned</p>
                                <p class="FieldHeadArbTxt">تعلم الدرس</p>
                            </div>
                            <p><input type="text" name="LessonLearned" id="LessonLearned" class="bg-tx"
                                    placeholder="Write Lesson Learned"></p>
                        </div>
                    </div> --}}
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditee Name</p>
                                <p class="FieldHeadArbTxt">الشخص الذي يتم التدقيق عليه</p>
                            </div>
                            <p><input type="text" name="AuditeeName" id="AuditeeName" class="bg-tx"
                                    placeholder="Write Risk Assessment Auditee Name"></p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditee Department</p>
                                <p class="FieldHeadArbTxt">القسم الذي يتم التدقيق عليه</p>
                            </div>
                            <p><input type="text" name="AuditeeDepart" id="AuditeeDepart" class="bg-tx"
                                    placeholder="Write Risk Assessment Auditee Department Name"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditee System</p>
                                <p class="FieldHeadArbTxt">تم تدقيق النظام</p>
                            </div>
                            <p><input type="text" name="AuditeeSys" id="AuditeeSys" class="bg-tx"
                                    placeholder="Write Risk Auditee System"></p>
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
                <div class="modal-body" style="height:300px; overflow-x:auto;">

                    @foreach ($contName as $controls)
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
            $("#RiskName").change(function() {
                var selectedValue = $(this).val();
                console.log("Selected value:", selectedValue);

                $.ajax({
                    url: '/risk-control',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        selectedValue: selectedValue
                    },
                    success: function(response) {
                        $("#risk_vs_control_content").html(response);
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

        document.addEventListener("DOMContentLoaded", function() {
            const riskLikelihoodSelect = document.getElementById("riskLikelihood");
            const riskImpactSelect = document.getElementById("riskImpact");
            const riskScoreInput = document.getElementById("riskScore");
            const appetiteColorInput = document.getElementById("appetiteColor");

            riskLikelihoodSelect.addEventListener("change", updateRiskScore);
            riskImpactSelect.addEventListener("change", updateRiskScore);

            function updateRiskScore() {
                const likelihood = parseInt(riskLikelihoodSelect.value);
                const impact = parseInt(riskImpactSelect.value);
                const score = likelihood * impact;
                riskScoreInput.value = score;

                // Determine appetite color based on the score and set the background color
                if (score <= 3) {
                    appetiteColorInput.value = "Very Low";
                    appetiteColorInput.style.backgroundColor = "#00850A"; // Green for Low
                } else if (score <= 4) {
                    appetiteColorInput.value = "Low";
                    appetiteColorInput.style.backgroundColor = "#00FF78"; // Yellow for Moderate
                } else if (score <= 9) {
                    appetiteColorInput.value = "Medium";
                    appetiteColorInput.style.backgroundColor = "#ECFF00"; // Orange for High
                } else if (score <= 15) {
                    appetiteColorInput.value = "High";
                    appetiteColorInput.style.backgroundColor = "#FFB600"; // Orange for High
                } else {
                    appetiteColorInput.value = "Very High";
                    appetiteColorInput.style.backgroundColor = "#FF0000"; // Red for Very High
                }
            }
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>


</body>
