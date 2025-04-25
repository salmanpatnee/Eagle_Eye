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
                {{-- <div class="d-flex align-items-center gap-3"> --}}
                @include('partials.roles')
                <div class="RightButtonContainer">
                    <button type="button" class="RightButton" onclick="goBack()">
                        <p>للخلف</p>
                        <p>Back</p>
                    </button>
                </div>
                {{-- </div> --}}
            </div>
        </header>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->

    <div class="ContAssIndiTable">
        <div class="ContentTableSection">
            <p class="AssessmentHeadings">Risk Assessment Details</p>

            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>رمز تقييم المخاطر</h3>
                        <span class="text">Risk Assessment ID</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessment->risk_assessment_id }}</p>
                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم تقييم المخاطر</h3>
                        <span class="text">Risk Assessment Name</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessment->risk_assessment_name }}</p>
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم الموقع</h3>
                        <span class="text">Location Name</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessment->location->location_name }}</p>
                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم التصنيف</h3>
                        <span class="text">Classification Name</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessment->classification->classification_name }}</p>
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم مدقق</h3>
                        <span class="text">Auditor Name</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessment->auditor->auditor_first_name }}
                        {{ $riskAssessment->auditor->auditor_last_name }}</p>
                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم مدقق</h3>
                        <span class="text">Risk Assessment Date</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessment->risk_assessment_start_date }} -
                        {{ $riskAssessment->risk_assessment_end_date }}</p>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('risk-assessment-findings.store', $riskAssessment->risk_assessment_id) }}" method="POST">
        @csrf
        <div class="ContAssIndiTable">
            <div class="ContentTableSection">
                <p class="AssessmentHeadings">Risk Assessment Findings</p>
                <div class="ContentTable">
                    <div class="column">
                        <x-input label="Risk Assessment Finding ID" label_ar="رمز العثور على" name="risk_finding_id"
                            placeholder="Enter ID" required />
                    </div>
                    <div class="column">
                        <x-input label="Risk Assessment Finding Name" label_ar="اسم العثور على" name="risk_finding_name"
                            placeholder="Enter Name" required />
                    </div>
                </div>
                <div class="ContentTable">

                    <div class="column">
                        <x-input label="Risk Assessment Finding Description" label_ar="وصف العثور على"
                            name="risk_finding_description" placeholder="Write Description" class="bg-tx" />

                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <x-label label="Risks" label_ar="اسم المخاطر" />
                        <p>
                            <select name="risk_id" id="risk_dropdown" class="sh-tx" style="width: 480px;" required>
                                <option value="">Select Risk</option>
                                @foreach ($risks as $risk)
                                    <option value="{{ $risk->risk_id }}"
                                        {{ old('risk_id') == $risk->risk_id ? 'selected' : null }}>
                                        {{ $risk->risk_id }} - {{ $risk->risk_name }}
                                    </option>
                                @endforeach
                            </select>
                        </p>
                        <x-error name="risk_id" />
                    </div>


                    <div class="column">
                        <x-label label="Risk Status" label_ar="حالة المخاطر" />
                        <select name="implementation_status" id="implementation_status" class="sh-tx" required>
                            <option value="Open" {{ old('implementation_status') == 'Open' ? 'selected' : null }}>
                                Open</option>
                            <option value="Close" {{ old('implementation_status') == 'Close' ? 'selected' : null }}>
                                Close</option>
                        </select>
                        <x-error name="implementation_status" />
                    </div>
                </div>
                <div id="evidenve_vs_control_content"></div>



                <div class="ContentTable">
                    <div class="column">
                        <x-label label="Risk Likelihood" label_ar="احتمالات المخاطرة" />

                        <select name="risk_likelihood" id="riskLikelihood" class="sh-tx" required>
                            <option value="1" {{ old('risk_likelihood') == '1' ? 'selected' : null }}>1</option>
                            <option value="2" {{ old('risk_likelihood') == '2' ? 'selected' : null }}>2</option>
                            <option value="3" {{ old('risk_likelihood') == '3' ? 'selected' : null }}>3</option>
                            <option value="4" {{ old('risk_likelihood') == '4' ? 'selected' : null }}>4</option>
                            <option value="5" {{ old('risk_likelihood') == '5' ? 'selected' : null }}>5</option>
                        </select>
                        <x-error name="risk_likelihood" />
                    </div>
                    <div class="column">
                        <x-label label="Risk Impact" label_ar="تأثير المخاطرة" />
                        <select name="risk_impact" id="riskImpact" class="sh-tx" required>
                            <option value="1" {{ old('risk_impact') == '1' ? 'selected' : null }}>1</option>
                            <option value="2" {{ old('risk_impact') == '2' ? 'selected' : null }}>2</option>
                            <option value="3" {{ old('risk_impact') == '3' ? 'selected' : null }}>3</option>
                            <option value="4" {{ old('risk_impact') == '4' ? 'selected' : null }}>4</option>
                            <option value="5" {{ old('risk_impact') == '5' ? 'selected' : null }}>5</option>
                        </select>
                        <x-error name="risk_impact" />
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Score</p>
                            <p class="FieldHeadArbTxt">درجة المخاطرة</p>
                        </div>
                        <p><input type="text" name="risk_score" id="riskScore" class="sh-tx" required></p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Appetite Color</p>
                            <p class="FieldHeadArbTxt">لون الجوع للمخاطرة</p>
                        </div>
                        <p>
                            <input type="text" id="appetiteColor" class="sh-tx" readonly="">
                            <input type="hidden" name="risk_appetite" id="appetite" class="sh-tx">
                            <input type="hidden" name="risk_appetite_color" id="riskAppetiteColor" class="sh-tx">
                        </p>
                    </div>
                </div>


                <div class="ContentTable">
                    <div class="column">
                        <x-input label="Risk Implementation Details" label_ar="ضوابط تفاصيل التنفيذ"
                            name="implementation_details" class="bg-tx" />
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <x-input label="Risk Maturity Justification" label_ar="ضوابط تفاصيل التنفيذ"
                            name="maturity_justification" class="bg-tx" />
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <x-input label="Risk Assessment Remarks" label_ar="ملاحظات تقييم المخاطر" name="Remarks"
                            class="bg-tx" />
                    </div>
                </div>

                
                <div class="ContentTable">
                    <div class="column">
                        <x-input label="Auditee Name" label_ar="" name="risk_auditee_name" />
                    </div>
                    <div class="column">
                        <x-input label="Auditee Department" label_ar="" name="risk_auditee_department" />
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <x-input label="Auditee System" label_ar="تم تدقيق النظام" name="risk_auditee_system" />
                    </div>
                    <div class="column">

                        <x-label label="Risk Treatment" label_ar="اسم خيارات علاج المخاطر" />
                        <select name="risk_treatment_id" id="risk_treatment_id" class="sh-tx" required>
                            <option value="">Select an option</option>
                            @foreach ($treatments as $treatment)
                                <option value="{{ $treatment->risk_treatment_id }}"
                                    {{ old('risk_treatment_id') == $treatment->risk_treatment_id ? 'selected' : null }}>
                                    {{ $treatment->risk_treatment_id }} - {{ $treatment->risk_treatment_name }}
                                </option>
                            @endforeach

                        </select>
                        <x-error name="risk_treatment_id" />
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <x-input label="Correctice Action" label_ar="" name="corrective_action" />

                    </div>
                    <div class="column">
                        <x-input label="Correctice Action Due Date" label_ar="" name="corrective_action_due_date"
                            type="date" />
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <x-input label="Preventive Ation" label_ar="" name="preventive_action" />
                    </div>
                    <div class="column">
                        <x-input label="Preventive Ation due date" label_ar="" name="preventive_action_due_date"
                            type="date" />
                    </div>
                </div>


                

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Lesson Learned</p>
                            <p class="FieldHeadArbTxt">تم تدقيق النظام</p>
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
                    <button type="submit" class="FindAddMoreButton" name="submit" value="exit"
                        >
                        <p class="ButtonArbTxt">حفظ والخروج</p>
                        <p class="ButtonEngTxt">Save and exit</p>
                    </button>
                </div>
            </div>
        </div>
    </form>


    {{-- <x-modal id="categoriesModal" title="Select Category" :data="$categories" :selectedvalues="isset($categoryIds) ? $categoryIds : []"
        checkboxClass="categoryCheckbox" id_key="category_id" value_key="category_name" /> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#risk_dropdown").change(function() {
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
                        $("#evidenve_vs_control_content").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Handle any errors
                    }
                });


            });
        });


        document.addEventListener("DOMContentLoaded", function() {
            const riskLikelihoodSelect = document.getElementById("riskLikelihood");
            const riskImpactSelect = document.getElementById("riskImpact");
            const riskScoreInput = document.getElementById("riskScore");
            const appetiteColorInput = document.getElementById("appetiteColor");
            const appetiteInput = document.getElementById("appetite");
            const appetiteColor = document.getElementById("riskAppetiteColor");



            riskLikelihoodSelect.addEventListener("change", updateRiskScore);
            riskImpactSelect.addEventListener("change", updateRiskScore);

            function updateRiskScore() {
                const likelihood = parseInt(riskLikelihoodSelect.value);
                const impact = parseInt(riskImpactSelect.value);
                const score = likelihood * impact;
                riskScoreInput.value = score;

                // Determine appetite color based on the score and set the background color
                if (score <= 3) {

                    appetite.value = appetiteColorInput.value = "Very Low";
                    appetiteColor.value = appetiteColorInput.style.backgroundColor = "#00850A"; // Green for Low
                } else if (score <= 4) {
                    appetite.value = appetiteColorInput.value = "Low";
                    appetiteColor.value = appetiteColorInput.style.backgroundColor =
                    "#00FF78"; // Yellow for Moderate
                } else if (score <= 9) {
                    appetite.value = appetiteColorInput.value = "Medium";
                    appetiteColor.value = appetiteColorInput.style.backgroundColor = "#ECFF00"; // Orange for High
                } else if (score <= 15) {
                    appetite.value = appetiteColorInput.value = "High";
                    appetiteColor.value = appetiteColorInput.style.backgroundColor = "#FFB600"; // Orange for High
                } else {
                    appetite.value = appetiteColorInput.value = "Very High";
                    appetiteColor.value = appetiteColorInput.style.backgroundColor = "#FF0000"; // Red for Very High
                }
            }
        });


        function goBack() {
            window.history.back();
        }
    </script>


</body>
