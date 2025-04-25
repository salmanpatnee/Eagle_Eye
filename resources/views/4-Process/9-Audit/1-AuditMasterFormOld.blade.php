<!DOCTYPE html>
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

        @media (min-width: 768px) {
            .modal-dialog {
                width: 100vh;
                margin: 200px auto;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="Header">
            <a href="/compliance">
                <i class='bx bx-home'></i>
            </a>
            <p class="bold-arbtext">العمليات</p>
            <p class="bold-text">Processes</p>
            <i style="padding-right: 30px" class='bx bx-right-arrow-alt'></i>
            <div class="HeadingTxt">
                <p class="ArbTxt">تسجيل المراجعة</p>
                <p class="EngTxt">Audit Registration</p>
            </div>
            <div class="RightButtonContainer">
                <button type="button" class="RightButton" onclick="goBack()">
                    <p>للخلف</p>
                    <p>Back</p>
                </button>
            </div>
        </div>
    </header>

    <main id="main-content">
        <!-- CONTENT -->
        <form action="/audit-registration-input/post" method="post">
            @csrf
            <div class="ContAssIndiTable">
                <div class="TableHeading">
                    <div class="ButtonContainer">
                        <a href="{{ route('audit-registrations.index') }}" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>
                        <button type="submit" class="MoreButton">
                            <p class="ButtonArbTxt">يضيف</p>
                            <p class="ButtonEngTxt">Add</p>
                        </button>
                        <a href="/asset-group-input" class="DisabledButton">
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
                        <p class="AssessmentHeadings">Audit Master</p>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit ID</p>
                                    <p class="FieldHeadArbTxt">رمز المراجعة</p>
                                </div>
                                <p><input type="text" name="AuditId" id="AuditId" class="sh-tx"
                                        placeholder="Enter Audit ID" value="{{ $data['audit_id'] }}"></p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Name</p>
                                    <p class="FieldHeadArbTxt">اسم المراجعة</p>
                                </div>
                                <p><input type="text" name="AuditName" id="AuditName" class="sh-tx"
                                        placeholder="Write Audit Name" value="{{ $data['audit_name'] }}"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Description</p>
                                    <p class="FieldHeadArbTxt">وصف المراجعة</p>
                                </div>
                                <p><input type="text" name="AuditDes" id="AuditDes" class="bg-tx"
                                        placeholder="Write Audit Description" value="{{ $data['audit_description'] }}">
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Objectives</p>
                                    <p class="FieldHeadArbTxt">أهداف المراجعة</p>
                                </div>
                                <p><input type="text" name="AuditObj" id="AuditObj" class="bg-tx"
                                        placeholder="Write Audit Objectives" value="{{ $data['audit_objectives'] }}">
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
                                    <select name="ClassName" id="ClassName" class="sh-tx"
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
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Location Name</p>
                                    <p class="FieldHeadArbTxt">اسم الموقع</p>
                                </div>
                                <p>
                                    <select name="LocName" id="LocName" class="sh-tx"
                                        onchange="updateAssetRegGroupmentId()">
                                        <option value="" disabled selected hidden>Select Option</option>
                                        @foreach ($locNames as $locName)
                                            <option value="{{ $locName->location_name }}"
                                                {{ $data['location_name'] == $locName->location_name ? 'selected' : '' }}>
                                                {{ $locName->location_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Start Date</p>
                                    <p class="FieldHeadArbTxt">تاريخ بدء المراجعة</p>
                                </div>
                                <p><input type="date" name="AuditStartDate" id="AuditStartDate" class="sh-tx"
                                        value="{{ $data['audit_start_date'] }}"></p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit End Date</p>
                                    <p class="FieldHeadArbTxt">تاريخ انتهاء المراجعة</p>
                                </div>
                                <p><input type="date" name="AuditEndDate" id="AuditEndDate" class="sh-tx"
                                        value="{{ $data['audit_end_date'] }}"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Type</p>
                                    <p class="FieldHeadArbTxt">نوع المراجعة</p>
                                </div>
                                <p><input type="text" name="AuditType" id="AuditAuditTypeObj" class="sh-tx"
                                        placeholder="Write Audit Type Name" value="{{ $data['audit_type'] }}"></p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Internal or External?</p>
                                    <p class="FieldHeadArbTxt">المراجعة الداخلية أو الخارجية؟</p>
                                </div>
                                <select type="text" name="IntorExt" id="IntorExt" class="sh-tx">
                                    <option value="Internal"
                                        {{ $data['audit_internal_external'] == 'Internal' ? 'selected' : '' }}>Internal
                                    </option>
                                    <option value="External"
                                        {{ $data['audit_internal_external'] == 'External' ? 'selected' : '' }}>External
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Auditing Entity</p>
                                    <p class="FieldHeadArbTxt">الجهة المراجعة</p>
                                </div>
                                <p><input type="text" name="AuditingEntity" id="AuditingEntity" class="sh-tx"
                                        placeholder="Write Auditing Entity Name"
                                        value="{{ $data['auditing_entity'] }}">
                                </p>
                            </div>
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
                                    <p class="FieldHeadEngTxt">Audit Scope</p>
                                    <p class="FieldHeadArbTxt">نطاق المراجعة</p>
                                </div>
                                <p><input type="text" name="AuditScope" id="AuditScope" class="bg-tx"
                                        placeholder="Write Audit Scope" value="{{ $data['audit_scope'] }}"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Approach</p>
                                    <p class="FieldHeadArbTxt">نهج المراجعة</p>
                                </div>
                                <p><input type="text" name="AuditApproach" id="AuditApproach" class="bg-tx"
                                        placeholder="Write Audit Approach" value="{{ $data['audit_approach'] }}"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Standard References</p>
                                    <p class="FieldHeadArbTxt">مراجع معايير</p>
                                </div>
                                <p><input type="text" name="StandRef" id="StandRef" class="bg-tx"
                                        placeholder="Define Standard References"
                                        value="{{ $data['standard_references'] }}"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Best Practice</p>
                                    <p class="FieldHeadArbTxt">أفضل الممارسات</p>
                                </div>
                                <p>
                                    <select name="BestPract" id="BestPract" class="sh-tx"
                                        onchange="updateAssetRegGroupmentId()">
                                        <option value="" disabled selected hidden>Select Option</option>
                                        @foreach ($practNames as $practName)
                                            <option value="{{ $practName->best_practices_name }}"
                                                {{ $data['best_practice'] == $practName->best_practices_name ? 'selected' : '' }}>
                                                {{ $practName->best_practices_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                        </div>

                    </div>
                </table>
            </div>
        </form>
        <form action="/audit-finding-input/post" method="post">
            @csrf
            <div class="ContAssIndiTable">
                <div class="TableHeading">
                    <div class="ButtonContainer">
                        <a href="{{ route('audit-registrations.index') }}" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>
                        <button type="submit" class="MoreButton">
                            <p class="ButtonArbTxt">يضيف</p>
                            <p class="ButtonEngTxt">Add</p>
                        </button>
                        <a href="/asset-group-input" class="DisabledButton">
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
                        <p class="AssessmentHeadings">Audit Findings</p>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit ID</p>
                                    <p class="FieldHeadArbTxt">رمز مراجعة</p>
                                </div>
                                <p>
                                    <select name="AuditName" id="AuditName" class="sh-tx"
                                        onchange="updateAssetRegGroupmentId()">
                                        <option value="" disabled selected hidden>Select Option</option>
                                        @foreach ($AuditNames as $AuditName)
                                            <option value="{{ $AuditName->audit_id }}"
                                                {{ $data['audit_id'] == $AuditName->audit_id ? 'selected' : '' }}>
                                                {{ $AuditName->audit_id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Findings ID</p>
                                    <p class="FieldHeadArbTxt">رمز العثور على</p>
                                </div>
                                <p><input type="text" name="AuditFindingId" id="AuditFindingId" class="sh-tx"
                                        placeholder="Enter Audit Finding ID"></p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Findings Name</p>
                                    <p class="FieldHeadArbTxt">اسم العثور على</p>
                                </div>
                                <p><input type="text" name="AuditFindingName" id="AuditFindingName"
                                        class="sh-tx" placeholder="Write Audit Finding Name"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Findings Description</p>
                                    <p class="FieldHeadArbTxt">وصف العثور على</p>
                                </div>
                                <p><input type="text" name="AuditFindingDes" id="AuditFindingDes" class="bg-tx"
                                        placeholder="Write Audit Finding Description"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column" style="flex: 1">

                                <x-label label="Categories" label_ar="اسم الفئة" />
                                <x-modal-button modal_id="categoriesModal" label="Add Category" name="categories"
                                    :data="isset($categoryIds) ? json_encode($categoryIds) : ''" />
                            </div>
                            <div class="column" style="flex: 1">
                                <x-label label="Controls" label_ar=" الضوابط" />
                                <x-modal-button modal_id="controlsModal" label="Add Control" name="controls"
                                    :data="isset($controlIds) ? json_encode($controlIds) : ''" />


                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Nature</p>
                                    <p class="FieldHeadArbTxt">مراجعة الطبيعة</p>
                                </div>
                                <p><input type="text" name="AuditNature" id="AuditNature" class="bg-tx"
                                        placeholder="Write Audit Nature"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Domain</p>
                                    <p class="FieldHeadArbTxt">مراجعة المكون</p>
                                </div>
                                <p>
                                    <select name="DomainName" id="DomainName" class="sh-tx"
                                        onchange="updateAssetRegGroupmentId()">
                                        <option value="" disabled selected hidden>Select Option</option>
                                        @foreach ($DomainNames as $DomainName)
                                            <option value="{{ $DomainName->main_domain_id }}">
                                                {{ $DomainName->main_domain_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Compliance Level</p>
                                    <p class="FieldHeadArbTxt">مستوى الالتزام</p>
                                </div>
                                <p><input type="text" name="ComplianceLevel" id="ComplianceLevel" class="bg-tx"
                                        placeholder="Write Compliance Level"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">NCA Remarks</p>
                                    <p class="FieldHeadArbTxt">الملاحظات</p>
                                </div>
                                <p><input type="text" name="NCARemarks" id="NCARemarks" class="bg-tx"
                                        placeholder="Write NCA Remarks"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Root Cause Analysis</p>
                                    <p class="FieldHeadArbTxt">تحليل السبب الجذري</p>
                                </div>
                                <p><input type="text" name="RootCause" id="RootCause" class="bg-tx"
                                        placeholder="Write Root Cause Analysis"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Corrective Action</p>
                                    <p class="FieldHeadArbTxt">إجراءات التصحيح
                                    </p>
                                </div>
                                <p><input type="text" name="CorrAct" id="CorrAct" class="bg-tx"
                                        placeholder="Write Corrective Action"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Corrective Action Due Date</p>
                                    <p class="FieldHeadArbTxt">تاريخ الالتزام المتوقع</p>
                                </div>
                                <p><input type="date" name="CorrActDate" id="CorrActDate" class="sh-tx"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Preventive Action</p>
                                    <p class="FieldHeadArbTxt">إجراءات وقائية</p>
                                </div>
                                <p><input type="text" name="PreAct" id="PreAct" class="bg-tx"
                                        placeholder="Write Preventive Action"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Preventive Action Due Date</p>
                                    <p class="FieldHeadArbTxt">تاريخ استحقاق الإجراءات الوقائية</p>
                                </div>
                                <p><input type="date" name="PreActDate" id="PreActDate" class="sh-tx"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Lesson Learned</p>
                                    <p class="FieldHeadArbTxt">تعلم الدرس</p>
                                </div>
                                <p><input type="text" name="Lesson" id="Lesson" class="bg-tx"
                                        placeholder="Write Lesson Learned from Audit Findings"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Finding Status</p>
                                    <p class="FieldHeadArbTxt">العثور على الحالة</p>
                                </div>
                                <p><input type="text" name="AuditStatus" id="AuditStatus" class="bg-tx"
                                        placeholder="Write Audit Finding Status"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Closure Expected Date</p>
                                    <p class="FieldHeadArbTxt">تاريخ الإغلاق المتوقع</p>
                                </div>
                                <h4></h4>
                                <p><input type="date" name="CloseDate" id="CloseDate" class="bg-tx"></p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Auditee Name</p>
                                    <p class="FieldHeadArbTxt">الشخص الذي يتم التدقيق عليه</p>
                                </div>
                                <p>
                                    <select name="AuditeeName" id="AuditeeName" class="sh-tx"
                                        onchange="updateAssetRegGroupmentId()">
                                        <option value="" disabled selected hidden>Select Option</option>
                                        @foreach ($AuditeeNames as $AuditeeName)
                                            <option value="{{ $AuditeeName->auditee_id }}">
                                                {{ $AuditeeName->auditee_first_name }}
                                                {{ $AuditeeName->auditee_last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Auditee Department</p>
                                    <p class="FieldHeadArbTxt">القسم الذي يتم التدقيق عليه</p>
                                </div>
                                <p>
                                    <select name="AuditeeDepart" id="AuditeeDepart" class="sh-tx"
                                        onchange="updateAssetRegGroupmentId()">
                                        <option value="" disabled selected hidden>Select Option</option>
                                        @foreach ($AuditeeDepartNames as $AuditeeDepart)
                                            <option value="{{ $AuditeeDepart->department_id }}">
                                                {{ $AuditeeDepart->department_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
        </form>
    </main>

    <x-modal id="categoriesModal" title="Select Category" :data="$categories" :selectedvalues="isset($categoryIds) ? $categoryIds : []"
        checkboxClass="categoryCheckbox" id_key="category_id" value_key="category_name" />

    <x-modal id="controlsModal" title="Select Control" :data="$controls" :selectedvalues="isset($controlIds) ? $controlIds : []"
        checkboxClass="controlCheckbox" id_key="control_id" value_key="control_name" />



    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script>
        $('.controlCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.controlCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#controls').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#controlsText').text(selectedOptionsText.length + " Control Selected.");
            } else {
                $('#controlsText').text("Control selected.");
            }
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
