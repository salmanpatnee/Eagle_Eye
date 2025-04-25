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
    <div class="ContAssIndiTable">
        <div class="TableHeading">
            <div class="ButtonContainer">
                <a href="{{ route('control-assessments.index') }}" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                <a href="/control-assessment-finding-input" class="MoreButton">
                    <p class="ButtonArbTxt">يضيف</p>
                    <p class="ButtonEngTxt">Add</p>
                </a>
                <a href="" class="MoreButton">
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
                        <div class="MenuTxt">
                            <h3>رمز تقييم الضوابط</h3>
                            <span class="text">Control Assessment ID</span>
                        </div>
                        <p class="sh-tx">{{ $control_assessment->control_assessment_id }}</p>
                    </div>
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>اسم تقييم الضوابط</h3>
                            <span class="text">Control Assessment Name</span>
                        </div>
                        <p class="sh-tx">{{ $control_assessment->control_assessment_name }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>وصف تقييم الضوابط</h3>
                            <span class="text">Control Assessment Description</span>
                        </div>
                        <p class="bg-tx">{{ $control_assessment->control_assessment_description }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>تاريخ بدء تقييم الضوابط</h3>
                            <span class="text">Control Assessment Start Date</span>
                        </div>
                        <p class="sh-tx">{{ $control_assessment->control_assessment_start_date }}</p>
                    </div>
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>تاريخ انتهاء تقييم الضوابط</h3>
                            <span class="text">Control Assessment End Date</span>
                        </div>
                        <p class="sh-tx">{{ $control_assessment->control_assessment_end_date }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>نوع تقييم الضوابط</h3>
                            <span class="text">Control Assessment Type</span>
                        </div>
                        <p class="bg-tx">{{ $control_assessment->control_assessment_type }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>تقييم الضوابط الداخلية أو الخارجية</h3>
                            <span class="text">Control Assessment Internal or External</span>
                        </div>
                        <p class="sh-tx">{{ $control_assessment->control_assessment_internal_external }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>نهج تقييم الضوابط</h3>
                            <span class="text">Control Assessment Approach</span>
                        </div>
                        <p class="bg-tx">{{ $control_assessment->control_assessment_approach }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>أهداف تقييم الضوابط</h3>
                            <span class="text">Control Assessment Objectives</span>
                        </div>
                        <p class="bg-tx">{{ $control_assessment->control_assessment_objectives }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>نطاق تقييم الضوابط</h3>
                            <span class="text">Control Assessment Scope</span>
                        </div>
                        <p class="bg-tx">{{ $control_assessment->control_assessment_scope }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>مراجع معايير</h3>
                            <span class="text">Standard References</span>
                        </div>
                        <p class="bg-tx">{{ $control_assessment->standard_references }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>اسم أفضل الممارسات</h3>
                            <span class="text">Best Practice Name</span>
                        </div>
                        <p class="sh-tx">{{ $control_assessment->best_practices_name }}</p>
                    </div>
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>اسم الموقع</h3>
                            <span class="text">Location Name</span>
                        </div>
                        <p class="sh-tx">{{ $control_assessment->location_name }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>اسم مدقق</h3>
                            <span class="text">Auditor Name</span>
                        </div>
                        <p class="sh-tx">{{ $control_assessment->auditor_name }}</p>
                    </div>
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>اسم التصنيف</h3>
                            <span class="text">Classification Name</span>
                        </div>
                        <p class="sh-tx">{{ $control_assessment->classification_name }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>ضوابط تقييم الجهة</h3>
                            <span class="text">Control Assessing Entity</span>
                        </div>
                        <p class="bg-tx">{{ $control_assessment->control_assessing_entity }}</p>
                    </div>
                </div>
            </div>
        </table>
        <div class="ListTable">
            <table cellspacing="0">
                <tr>
                    <th style="padding-right: 0px;"></th>
                    <th style="padding-right: 0px;">
                        <p class="ListHeadArbTxt">رمز العثور على</p>
                        <p class="ListHeadEngTxt">Findings ID</p>
                    </th>
                    <th style="padding-right: 0px;">
                        <p class="ListHeadArbTxt">اسم العثور على</p>
                        <p class="ListHeadEngTxt">Findings Name</p>
                    </th>
                    <th style="padding-right: 0px;">
                        <p class="ListHeadArbTxt">حالة تنفيذ الضوابط</p>
                        <p class="ListHeadEngTxt">Control Implementation Status</p>
                    </th>
                </tr>
                @foreach ($control_assessment_details as $control_assessment_detail)
                    <tr>
                        <td><input type="checkbox" name="selecteddelete[]"
                                value="{{ $control_assessment_detail->control_finding_id }}">
                        </td>
                        <td><a
                                href="/control-assessment-finding-table/{{ $control_assessment_detail->control_finding_id }}">{{ $control_assessment_detail->control_finding_id }}</a>
                        </td>
                        <td>{{ $control_assessment_detail->control_finding_name }}</td>
                        <td>{{ $control_assessment_detail->control_implementation_status }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body
