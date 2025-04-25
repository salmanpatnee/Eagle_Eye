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
    <section id="sidebar">
        <header>
            <div class="Header">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i class='bx bx-right-arrow-alt'></i>
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
        <ul class="side-menu top">
            <li>
                <a href="{{ route('control-assessments.index') }}">
                    <i class='bx bxs-dashboard'></i>
                    <div class="MenuTxt">
                        <h3>تقييم الضوابط</h3>
                        <span class="text">Control Assessment Master</span>
                    </div>
                </a>
            </li>
            <li class="active">
                <a href="/control-assessment-finding-list">
                    <i class='bx bxs-report'></i>
                    <div class="MenuTxt">
                        <h3>تقييم الضوابط</h3>
                        <span class="text">Control Assessment Findings</span>
                    </div>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <div class="IndiTable">
        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">تقييم الضوابط</p>
                <p class="PageHeadEngTxt">Control Assessment</p>
            </div>
            <div class="ButtonContainer">
                <a href="/control-assessment-finding-list" class="MoreButton">
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
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>رمز العثور على</h3>
                            <span class="text">Control Assessment Finding ID</span>
                        </div>
                        <p class="sh-tx">{{ $control_finding_id->control_finding_id }}</p>
                    </div>
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>اسم العثور على</h3>
                            <span class="text">Control Assessment Finding Name</span>
                        </div>
                        <p class="sh-tx">{{ $control_finding_id->control_finding_name }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>اسم الضوابط</h3>
                            <span class="text">Control Name</span>
                        </div>
                        <p class="sh-tx">{{ $control_finding_id->control_name }}</p>
                    </div>
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>اسم تقييم الضوابط</h3>
                            <span class="text">Control Assessment ID</span>
                        </div>
                        <p class="sh-tx">{{ $control_finding_id->control_assessment_name }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>وصف العثور على</h3>
                            <span class="text">Control Assessment Finding Description</span>
                        </div>
                        <p class="bg-tx">{{ $control_finding_id->control_finding_description }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>حالة العثور على</h3>
                            <span class="text">Control Assessment Findings Implementation Status</span>
                        </div>
                        <p class="bg-tx">{{ $control_finding_id->control_implementation_status }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>ضوابط تفاصيل التنفيذ</h3>
                            <span class="text">Control Implementation Details</span>
                        </div>
                        <p class="bg-tx">{{ $control_finding_id->control_implementation_details }}</p>
                        </p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>مستوى النضج</h3>
                            <span class="text">Control Maturity Level</span>
                        </div>
                        <p class="bg-tx">{{ $control_finding_id->control_maturity_level }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>ضوابط تبرير النضج</h3>
                            <span class="text">Control Maturity Justification</span>
                        </div>
                        <p class="bg-tx">{{ $control_finding_id->control_maturity_justification }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>ملاحظات تقييم الضوابط</h3>
                            <span class="text">Control Assessment Remarks</span>
                        </div>
                        <p class="bg-tx">{{ $control_finding_id->remarks }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>إجراءات التصحيح</h3>
                            <span class="text">Corrective Action</span>
                        </div>
                        <p class="bg-tx">{{ $control_finding_id->corrective_action }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>تاريخ استحقاق إجراءات التصحيح</h3>
                            <span class="text">Corrective Action Due Date</span>
                        </div>
                        <p class="sh-tx">{{ $control_finding_id->corrective_action_due_date }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>إجراءات وقائية</h3>
                            <span class="text">Preventive Action</span>
                        </div>
                        <p class="bg-tx">{{ $control_finding_id->preventive_action }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>تاريخ استحقاق الإجراءات الوقائية</h3>
                            <span class="text">Preventive Action Due Date</span>
                        </div>
                        <p class="sh-tx">{{ $control_finding_id->preventive_action_due_date }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>تعلم الدرس</h3>
                            <span class="text">Lesson Learned</span>
                        </div>
                        <p class="bg-tx">{{ $control_finding_id->lesson_learned }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>الشخص الذي يتم التدقيق عليه</h3>
                            <span class="text">Auditee Name</span>
                        </div>
                        <p class="sh-tx">{{ $control_finding_id->control_auditee_name }}</p>
                    </div>
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>القسم الذي يتم التدقيق عليه</h3>
                            <span class="text">Auditee Department</span>
                        </div>
                        <p class="sh-tx">{{ $control_finding_id->control_auditee_department }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>تم تدقيق النظام</h3>
                            <span class="text">Auditee System</span>
                        </div>
                        <p class="bg-tx">{{ $control_finding_id->control_auditee_system }}</p>
                    </div>
                </div>
            </div>
        </table>
    </div>
    </form>


    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body
