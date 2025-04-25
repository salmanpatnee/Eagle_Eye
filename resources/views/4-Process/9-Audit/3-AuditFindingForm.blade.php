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
                    <p class="EngTxt">Audit Findings</p>
                </div>
                @include('partials.roles')
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

    <div class="ContAssIndiTable">
        <div class="ContentTableSection">
            <p class="AssessmentHeadings">Audit Details</p>

            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>رمز تقييم الضوابط</h3>
                        <span class="text">Audit ID</span>
                    </div>
                    <p class="sh-tx">{{ $audit->audit_id }}</p>
                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم تقييم الضوابط</h3>
                        <span class="text">Audit Name</span>
                    </div>
                    <p class="sh-tx">{{ $audit->audit_name }}</p>
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم أفضل الممارسات</h3>
                        <span class="text">Best Practice Name</span>
                    </div>
                    <p class="sh-tx">{{ $audit->bestPractice->best_practices_name }}</p>
                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم الموقع</h3>
                        <span class="text">Location Name</span>
                    </div>
                    <p class="sh-tx">{{ $audit->location->location_name }}</p>
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم مدقق</h3>
                        <span class="text">Auditor Name</span>
                    </div>
                    <p class="sh-tx">{{ $audit->auditor->auditor_first_name }}
                        {{ $audit->auditor->auditor_last_name }}</p>
                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم التصنيف</h3>
                        <span class="text">Classification Name</span>
                    </div>
                    <p class="sh-tx">{{ $audit->classification->classification_name }}</p>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('audit-findings.store', $audit->audit_id) }}" method="POST">
        @csrf
        <div class="ContAssIndiTable">
            <div class="ContentTableSection">
                <p class="AssessmentHeadings">Audit Findings</p>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Finding ID</p>
                            <p class="FieldHeadArbTxt">رمز العثور على</p>
                        </div>
                        <p><input type="text" name="audit_finding_id" id="audit_finding_id" class="sh-tx"
                                placeholder="Enter ID" value="{{ old('audit_finding_id') }}" required></p>
                        <x-error name="audit_finding_id" />
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Finding Name</p>
                            <p class="FieldHeadArbTxt">اسم العثور على</p>
                        </div>
                        <p><input type="text" name="audit_finding_name" id="audit_finding_name" class="sh-tx"
                                placeholder="Enter Name" value="{{ old('audit_finding_name') }}" required></p>
                        <x-error name="audit_finding_name" />
                    </div>


                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Finding Description</p>
                            <p class="FieldHeadArbTxt">وصف العثور على</p>
                        </div>
                        <p><input type="text" name="audit_finding_description" id="audit_finding_description"
                                class="bg-tx" placeholder="Write Description"
                                value="{{ old('audit_finding_description') }}"></p>
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditee Name</p>
                            <p class="FieldHeadArbTxt">الشخص الذي يتم التدقيق عليه</p>
                        </div>
                        <select name="auditee_id" id="auditee_id" class="sh-tx" required>
                            <option value="">Select Auditee</option>
                            @foreach ($auditees as $auditee)
                                <option value="{{ $auditee->auditee_id }}"
                                    {{ old('auditee_id') == $auditee->auditee_id ? 'selected' : null }}>
                                    {{ $auditee->auditee_first_name }} {{ $auditee->auditee_last_name }}</option>
                            @endforeach
                        </select>


                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditee Department</p>
                            <p class="FieldHeadArbTxt">القسم الذي يتم التدقيق عليه</p>
                        </div>
                        <select name="department_id" id="department_id" class="sh-tx" required>
                            <option value="">Select department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->department_id }}"
                                    {{ old('department_id') == $department->department_id ? 'selected' : null }}>
                                    {{ $department->department_id }} - {{ $department->department_name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Domain</p>
                            <p class="FieldHeadArbTxt">مراجعة المكون</p>
                        </div>
                        <select name="domain_id" id="domain_id" class="sh-tx" required>
                            <option value="">Select domain</option>
                            @foreach ($domains as $domain)
                                <option value="{{ $domain->main_domain_id }}"
                                    {{ old('domain_id') == $domain->main_domain_id ? 'selected' : null }}>
                                    {{ $domain->main_domain_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Nature</p>
                            <p class="FieldHeadArbTxt">مراجعة الطبيعة</p>
                        </div>
                        <p><input type="text" name="audit_nature" id="audit_nature" class="sh-tx"
                                placeholder="Write Audit Nature" value="{{ old('audit_nature') }}"></p>
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <x-label label="Asset" label_ar="الأصل" />
                        <x-modal-button modal_id="assetsModal" label="Add Asset" name="assets" :data="isset($audit->asset_id) ? json_encode($audit->asset_id) : ''" />
                    </div>
                    <div class="column">
                        <x-label label="Asset Group" label_ar="مجموعة   الأصل" />
                        <x-modal-button modal_id="assetsGroupsModal" label="Add Asset Group" name="assetsGroups"
                            :data="isset($audit->asset_group_id) ? json_encode($audit->asset_group_id) : ''" />
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Owner Name</p>
                            <p class="FieldHeadArbTxt">اسم صاحب</p>
                        </div>
                        <select name="owner_id" id="owner_id" class="sh-tx" required>
                            <option value="">Select Owner</option>
                            @foreach ($owners as $owner)
                                <option value="{{ $owner->owner_role_id }}"
                                    {{ old('owner_id') == $owner->owner_role_id ? 'selected' : null }}>
                                    {{ $owner->owner_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="column">
                        <x-label label="Custodian Name" label_ar="اسم الوصي" />
                        <x-modal-button modal_id="custodianModal" label="Add Custodian" name="custodians"
                            :data="isset($custodianRoleIds) ? json_encode($custodianRoleIds) : ''" />
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <x-label label="Controls" label_ar="اسم الفئة" />
                        <x-modal-button modal_id="controlsModal" label="Add Control" name="controls"
                            :data="isset($audit->control_id) ? json_encode($audit->control_id) : ''" />
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
                            <p class="FieldHeadEngTxt">Compliance Level</p>
                            <p class="FieldHeadArbTxt">مستوى الالتزام</p>
                        </div>
                        <p><input type="text" name="compliance_level" value="{{ old('compliance_level') }}"
                                id="compliance_level" class="bg-tx"
                                placeholder="Write Control Implementation Details">
                        </p>
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">NCA Remarks</p>
                            <p class="FieldHeadArbTxt">الملاحظات</p>
                        </div>
                        <p><input type="text" name="nca_remarks" id="nca_remarks" class="bg-tx"
                                value="{{ old('nca_remarks') }}" placeholder="Write NCA Remarks"></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Root Cause Analysis</p>
                            <p class="FieldHeadArbTxt">تحليل السبب الجذري</p>
                        </div>
                        <p><input type="text" name="root_cause_analysis" id="root_cause_analysis" class="bg-tx"
                                placeholder="Write Root Cause Analysis" value="{{ old('root_cause_analysis') }}"></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Corrective Action</p>
                            <p class="FieldHeadArbTxt">إجراءات التصحيح</p>
                        </div>
                        <p><input type="text" name="corrective_action" id="corrective_action" class="sh-tx"
                                placeholder="Write Corrective Action"></p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Corrective Action Due Date</p>
                            <p class="FieldHeadArbTxt">تاريخ استحقاق إجراءات التصحيح</p>
                        </div>
                        <p><input type="date" name="corrective_action_due_date" id="corrective_action_due_date"
                                value="{{ old('corrective_action_due_date') }}" class="sh-tx"></p>
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Preventive Action</p>
                            <p class="FieldHeadArbTxt">إجراءات وقائية

                            </p>
                        </div>
                        <p><input type="text" name="preventive_action" id="preventive_action"
                                value="{{ old('preventive_action') }}" class="sh-tx"
                                placeholder="Write Preventive Action"></p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt"> Preventive Action Due Date

                            </p>
                            <p class="FieldHeadArbTxt">تاريخ استحقاق الإجراءات الوقائية

                            </p>
                        </div>
                        <p><input type="date" name="preventive_action_due_date" id="preventive_action_due_date"
                                value="{{ old('preventive_action_due_date') }}" class="sh-tx"></p>
                    </div>
                </div>


                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Finding Status</p>
                            <p class="FieldHeadArbTxt">العثور على الحالة</p>
                        </div>
                        <select name="audit_finding_status" id="audit_finding_status" class="sh-tx" required>
                            <option value="">Select Status</option>
                            @foreach ($statues as $status)
                                <option value="{{ $status }}"
                                    {{ old('audit_finding_status') == $status ? 'selected' : null }}>
                                    {{ $status }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Closure Expected Date</p>
                            <p class="FieldHeadArbTxt">تاريخ الإغلاق المتوقع</p>
                        </div>
                        <p><input type="date" name="closure_expected_date" id="closure_expected_date"
                                class="sh-tx" placeholder="Write Lesson Learned"
                                value="{{ old('closure_expected_date') }}"></p>
                    </div>
                </div>




                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Lesson Learned</p>
                            <p class="FieldHeadArbTxt">تعلم الدرس</p>
                        </div>
                        <p><input type="text" name="lesson_learned" id="lesson_learned" class="bg-tx"
                                placeholder="Write Lesson Learned" value="{{ old('lesson_learned') }}"></p>
                    </div>
                </div>


            </div>

            <div class="TableHeading">
                <div class="AssmentButtonContainer">
                    <button type="submit" class="FindAddMoreButton" name="submit" value="more">
                        <p class="ButtonArbTxt">احفظ وأضف المزيد</p>
                        <p class="ButtonEngTxt">Save and add more</p>
                    </button>
                    <button type="submit" class="FindAddMoreButton" name="submit" value="exit">
                        <p class="ButtonArbTxt">حفظ والخروج</p>
                        <p class="ButtonEngTxt">Save and exit</p>
                    </button>
                </div>
            </div>
        </div>
    </form>

    <x-modal id="assetsModal" title="Select Asset" :data="$assets" :selectedvalues="isset($assetIds) ? $assetIds : []" checkboxClass="assetCheckbox"
        id_key="asset_id" value_key="asset_name" />

    <x-modal id="assetsGroupsModal" title="Select Asset Group" :data="$assetGroups" :selectedvalues="isset($assetGroupIds) ? $assetGroupIds : []"
        checkboxClass="assetGroupCheckbox" id_key="asset_group_id" value_key="asset_group_name" />

    <x-modal id="controlsModal" title="Select Control" :data="$controls" :selectedvalues="isset($controlIds) ? $controlIds : []"
        checkboxClass="controlCheckbox" id_key="control_id" value_key="control_name" />

    <x-modal id="categoriesModal" title="Select Category" :data="$categories" :selectedvalues="isset($categoryIds) ? $categoryIds : []"
        checkboxClass="categoryCheckbox" id_key="category_id" value_key="category_name" />

    <x-modal id="custodianModal" title="Select Custodian" :data="$custodians" :selectedvalues="isset($custodianRoleIds) ? $custodianRoleIds : []"
        checkboxClass="custodianCheckbox" id_key="custodian_role_id" value_key="custodian_role_title" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script>
        $('.assetCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.assetCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#assets').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#assetsText').text(selectedOptionsText.length + " Asset Selected.");
            } else {
                $('#assetsText').text("Asset selected.");
            }
        });


        $('.assetGroupCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.assetGroupCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#assetsGroups').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#assetsGroupsText').text(selectedOptionsText.length + " Asset Group Selected.");
            } else {
                $('#assetsGroupsText').text("Asset Group  selected.");
            }
        });

        $('.custodianCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.custodianCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#custodians').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#custodiansText').text(selectedOptionsText.length + " Custodian Selected.");
            } else {
                $('#custodiansText').text("Custodian selected.");
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

        function goBack() {
            window.history.back();
        }
    </script>


</body>
