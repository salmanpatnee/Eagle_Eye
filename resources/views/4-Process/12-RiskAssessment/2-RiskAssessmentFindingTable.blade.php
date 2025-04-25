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
        <ul class="side-menu top">
            <li>
                <a href="/href="{{ route('risk-assessments.index') }}"">
                    <i class='bx bxs-dashboard'></i>
                    <div class="MenuTxt">
                        <h3>تقييم المخاطر</h3>
                        <span class="text">Risk Assessment Master</span>
                    </div>
                </a>
            </li>
            <li class="active">
                <a href="/risk-assessment-finding-list">
                    <i class='bx bxs-report'></i>
                    <div class="MenuTxt">
                        <h3>تقييم المخاطر</h3>
                        <span class="text">Risk Assessment Findings</span>
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
                <p class="PageHeadArbTxt">تقييم المخاطر</p>
                <p class="PageHeadEngTxt">Risk Assessment</p>
            </div>
            <div class="ButtonContainer">
                <a href="/risk-assessment-finding-list" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                <a href="/risk-assessment-finding-input" class="MoreButton">
                    <p class="ButtonArbTxt">يضيف</p>
                    <p class="ButtonEngTxt">Add</p>
                </a>
                <a href="#" class="MoreButton">
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
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment Finding ID</p>
                            <p class="FieldHeadArbTxt">رمز العثور على</p>
                        </div>
                        <p class="sh-tx">{{ $risk_finding_id->risk_finding_id }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment Finding Name</p>
                            <p class="FieldHeadArbTxt">اسم العثور على</p>
                        </div>
                        <p class="sh-tx">{{ $risk_finding_id->risk_finding_name }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment Name</p>
                            <p class="FieldHeadArbTxt">اسم تقييم المخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $risk_finding_id->risk_assessment_name }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Name</p>
                            <p class="FieldHeadArbTxt">اسم تقييم المخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $risk_finding_id->risk_name }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment Finding Description</p>
                            <p class="FieldHeadArbTxt">وصف العثور على</p>
                        </div>
                        <p class="bg-tx">{{ $risk_finding_id->risk_finding_description }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Status</p>
                            <p class="FieldHeadArbTxt">حالة المخاطر</p>
                        </div>
                        <p class="bg-tx">{{ $risk_finding_id->implementation_status }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Implementation Details</p>
                            <p class="FieldHeadArbTxt">تفاصيل التنفيذ</p>
                        </div>
                        <p class="bg-tx">{{ $risk_finding_id->implementation_details }}</p>
                        </p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Maturity Level</p>
                            <p class="FieldHeadArbTxt">مستوى النضج</p>
                        </div>
                        <p class="bg-tx">{{ $risk_finding_id->maturity_level }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Maturity Justification</p>
                            <p class="FieldHeadArbTxt">تبرير النضج</p>
                        </div>
                        <p class="bg-tx">{{ $risk_finding_id->maturity_justification }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Assessment Remarks</p>
                            <p class="FieldHeadArbTxt">ملاحظات تقييم</p>
                        </div>
                        <p class="bg-tx">{{ $risk_finding_id->Remarks }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Corrective Action</p>
                            <p class="FieldHeadArbTxt">إجراءات التصحيح</p>
                        </div>
                        <p class="bg-tx">{{ $risk_finding_id->corrective_action }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Corrective Action Due Date</p>
                            <p class="FieldHeadArbTxt">تاريخ استحقاق</p>
                        </div>
                        <p class="sh-tx">{{ $risk_finding_id->corrective_action_due_date }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Preventive Action</p>
                            <p class="FieldHeadArbTxt">إجراءات وقائية</p>
                        </div>
                        <p class="bg-tx">{{ $risk_finding_id->preventive_action }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Preventive Action Due Date</p>
                            <p class="FieldHeadArbTxt">تاريخ استحقاق</p>
                        </div>
                        <p class="sh-tx">{{ $risk_finding_id->preventive_action_due_date }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Lesson Learned</p>
                            <p class="FieldHeadArbTxt">تعلم الدرس</p>
                        </div>
                        <p class="bg-tx">{{ $risk_finding_id->lesson_learned }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditee Name</p>
                            <p class="FieldHeadArbTxt">الشخص الذي يتم التدقيق عليه</p>
                        </div>
                        <p class="sh-tx">{{ $risk_finding_id->risk_auditee_name }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditee Department</p>
                            <p class="FieldHeadArbTxt">القسم الذي يتم التدقيق عليه</p>
                        </div>
                        <p class="sh-tx">{{ $risk_finding_id->risk_auditee_department }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditee System</p>
                            <p class="FieldHeadArbTxt">تم تدقيق النظام</p>
                        </div>
                        <p class="bg-tx">{{ $risk_finding_id->risk_auditee_system }}</p>
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
