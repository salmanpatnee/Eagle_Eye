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
                    <p class="ArbTxt">تقييم المخاطر</p>
                    <p class="EngTxt">Risk Assessment Findings</p>
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
        <div class="TableHeading">
            <div class="ButtonContainer">
                <a href="/risk-assessments" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                <a href="/risk-assessment-findings/create/{{$riskAssessmentDetail->risk_assessment_id}}" class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يضيف</p>
                    <p class="ButtonEngTxt">Add</p>
                </a>
                <a href="/risk-assessment-findings/edit/{{$riskAssessmentDetail->risk_finding_id}}" class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">تحديث</p>
                    <p class="ButtonEngTxt">Update</p>
                </a>
                <form method="POST" action="{{ route('delete.riskAssfind') }}">
                    <input type="hidden" name="record" value="{{ $riskAssessmentDetail->id }}">
                    <button type="submit"
                        class="{{ auth()->user()->can('delete-data') && auth()->user()->can('manage-asset') ? 'DeleteButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                    @csrf
                    @method('DELETE')
                </form>


                {{-- <a href="" class="DisDeleteButton">
                    <p class="ButtonArbTxt">يمسح</p>
                    <p class="ButtonEngTxt">Delete</p>
                </a> --}}
            </div>
        </div>
        <div class="ContentTableSection">
            <p class="AssessmentHeadings">Risk Assessment Findings</p>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>رمز العثور على</h3>
                        <span class="text">Risk Assessment Finding ID</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessmentDetail->risk_finding_id }}</p>
                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم العثور على</h3>
                        <span class="text">Risk Assessment Finding Name</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessmentDetail->risk_finding_name }}</p>
                </div>
            </div>

            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>وصف العثور على</h3>
                        <span class="text">Risk Assessment Finding Description</span>
                    </div>
                    <p class="bg-tx">{{ $riskAssessmentDetail->risk_finding_description }}</p>


                </div>
            </div>


            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم المخاطر</h3>
                        <span class="text">Risks</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessmentDetail->risk?->risk_id }} -
                        {{ $riskAssessmentDetail->risk?->risk_name }}</p>


                </div>


                <div class="column">
                    <div class="MenuTxt">
                        <h3>حالة المخاطر</h3>
                        <span class="text">Risks Status</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessmentDetail->implementation_status }}</p>

                </div>
            </div>

            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>احتمالات المخاطرة</h3>
                        <span class="text">Risk Likelihood</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessmentDetail->risk_likelihood }}</p>


                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3>تأثير المخاطرة</h3>
                        <span class="text">Risk Impact</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessmentDetail->risk_impact }}</p>
                </div>
            </div>

            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>درجة المخاطرة</h3>
                        <span class="text">Risk Score</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessmentDetail->risk_score }}</p>
                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3>لون الجوع للمخاطرة</h3>
                        <span class="text">Risk Appetite Color</span>
                    </div>
                    <p class="sh-tx" style="background-color: {{$riskAssessmentDetail->risk_appetite}}">{{ $riskAssessmentDetail->risk_appetite }}</p>
                    </p>
                </div>
            </div>

            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>ضوابط تفاصيل التنفيذ</h3>
                        <span class="text">Risk Implementation Details</span>
                    </div>
                    <p class="bg-tx">{{ $riskAssessmentDetail->implementation_details }}</p>


                </div>
            </div>

            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>ضوابط تفاصيل التنفيذ</h3>
                        <span class="text">Risk Maturity Justification</span>
                    </div>
                    <p class="bg-tx">{{ $riskAssessmentDetail->maturity_justification }}</p>
                </div>
            </div>

            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>ملاحظات تقييم المخاطر</h3>
                        <span class="text">Risk Assessment Remarks</span>
                    </div>
                    <p class="bg-tx">{{ $riskAssessmentDetail->Remarks }}</p>

                </div>
            </div>
            
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم المدقق</h3>
                        <span class="text">Auditee Name</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessmentDetail->risk_auditee_name }}</p>

                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3>قسم المراجعين</h3>
                        <span class="text">Auditee Department</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessmentDetail->risk_auditee_department }}</p>

                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>تم تدقيق النظام</h3>
                        <span class="text">Auditee System</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessmentDetail->risk_auditee_system }}</p>

                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3> اسم خيارات علاج المخاطر</h3>
                        <span class="text"> Risk Treatment</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessmentDetail->treatment?->risk_treatment_name }}</p>

                </div>
            </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>الإجراء التصحيحي</h3>
                            <span class="text">Corrective Action</span>
                        </div>
                        <p class="sh-tx">{{ $riskAssessmentDetail->corrective_action }}</p>


                    </div>
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>تاريخ استحقاق الإجراء التصحيحي</h3>
                            <span class="text">Corrective Action Due Date</span>
                        </div>
                        <p class="sh-tx">{{ $riskAssessmentDetail->corrective_action_due_date }}</p>
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>العمل الوقائي</h3>
                            <span class="text">Preventive Action</span>
                        </div>
                        <p class="sh-tx">{{ $riskAssessmentDetail->preventive_action }}</p>

                    </div>
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>موعد استحقاق الإجراءات الوقائية</h3>
                            <span class="text">Preventive Action due date</span>
                        </div>
                        <p class="sh-tx">{{ $riskAssessmentDetail->preventive_action_due_date }}</p>
                    </div>
                </div>


                

                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>الدرس المستفاد</h3>
                            <span class="text">Lesson Learned</span>
                        </div>
                        <p class="bg-tx">{{ $riskAssessmentDetail->lesson_learned }}</p>


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


        function goBack() {
            window.history.back();
        }
    </script>


</body>
