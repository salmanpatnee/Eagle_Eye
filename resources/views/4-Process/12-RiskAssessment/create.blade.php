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

        /* .FindAddMoreButton {
            margin-right: -483px;

        } */

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
    <form action="/risk-assessment-input/post" method="post" id="control-assessmsnt">
        @csrf
        <div class="ContAssIndiTable">
            <div class="TableHeading">
                <div class="ButtonContainer">
                    <a href="{{ route('risk-assessments.index') }}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>

                    <button type="submit"
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
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
                    <p class="AssessmentHeadings">Risk Assessment Master</p>
                    <div class="ContentTable">
                        <div class="column">
                            <x-input label="Risk Assessment ID" label_ar="رمز تقييم المخاطر" name="risk_assessment_id"
                                placeholder="Enter ID" required />

                        </div>
                        <div class="column">
                            <x-input label="Risk Assessment Name" label_ar="اسم تقييم المخاطر"
                                name="risk_assessment_name" placeholder="Enter Name" required />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <x-input label="Risk Assessment Description" label_ar="وصف تقييم المخاطر"
                                name="risk_assessment_description" placeholder="Enter Description" class="bg-tx" />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <x-input label="Risk Assessment Start Date" label_ar="تاريخ بدء تقييم المخاطر"
                                name="risk_assessment_start_date" placeholder="" type="date" required />

                        </div>
                        <div class="column">
                            <x-input label="Risk Assessment End Date" label_ar="تاريخ انتهاء تقييم المخاطر"
                                name="risk_assessment_end_date" placeholder="" type="date" />

                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <x-input label="Risk Assessment Type" label_ar="نوع تقييم المخاطر"
                                name="risk_assessment_type" placeholder="" class="bg-tx" />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <x-label label="Risk Assessment Internal or External"
                                label_ar="تقييم المخاطر الداخلية أو الخارجية" />
                            <select class="sh-tx" name="risk_assessment_internal_external"
                                id="risk_assessment_internal_external">
                                <option value="Internal"
                                    {{ old('risk_assessment_internal_external') == 'Internal' ? 'selected' : null }}>
                                    Internal</option>
                                <option value="External"
                                    {{ old('risk_assessment_internal_external') == 'External' ? 'selected' : null }}>
                                    External</option>
                            </select>
                            <x-error name="risk_assessment_internal_external" />

                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <x-input label="Risk Assessment Approach" label_ar="نهج تقييم المخاطر"
                                name="risk_assessment_approach" placeholder="Write Risk Assessment Approach"
                                class="bg-tx" />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <x-input label="Risk Assessment Objectives" label_ar="أهداف تقييم المخاطر"
                                name="risk_assessment_approach" placeholder="Write Risk Assessment Approach"
                                class="bg-tx" />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <x-input label="Risk Assessment Scope" label_ar="نطاق تقييم المخاطر"
                                name="risk_assessment_scope" placeholder="Write Risk Assessment Scope"
                                class="bg-tx" />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <x-input label="Standard References" label_ar="مراجع المخاطر" name="standard_references"
                                placeholder="Write Risk Assessment Standard References" class="bg-tx" />


                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <x-input label="Risk Assessment Against" label_ar="المخاطر تقييم الجهة"
                                name="risk_assessment_against" class="bg-tx" />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <x-label label="Location Name" label_ar="ااسم الموقع" />
                            <p>
                                <select name="location_id" id="location_id" class="sh-tx" required>
                                    <option value="">Select Option</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->location_id }}"
                                            {{ old('location_id') == $location->location_id ? 'selected' : null }}>
                                            {{ $location->location_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                            <x-error name="location_id" />
                        </div>
                        <div class="column">
                            <x-label label="Auditor Name" label_ar="الشخص الذي يتم التدقيق عليه" />
                            <p>
                                <select name="auditor_id" id="auditor_id" class="sh-tx" required>
                                    <option value="">Select Option</option>
                                    @foreach ($auditors as $auditor)
                                        <option value="{{ $auditor->auditor_id }}"
                                            {{ old('auditor_id') == $auditor->auditor_id ? 'selected' : null }}>
                                            {{ $auditor->auditor_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <x-label label="Classification Name" label_ar="اسم التصنيف" />

                            <p>
                                <select name="classification_id" id="classification_id" class="sh-tx" required>
                                    <option value="">Select Option</option>
                                    @foreach ($classifications as $classification)
                                        <option value="{{ $classification->classification_id }}"
                                            {{ old('classification_id') == $classification->classification_id ? 'selected' : null }}>
                                            {{ $classification->classification_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <x-input label="Risk Assessing Entity" label_ar="المخاطر تقييم الجهة"
                                name="risk_assessing_entity" class="bg-tx" />
                        </div>
                    </div>
                </div>
            </table>
            <div class="ContentTableSection" style="border: none; ">
                <button type="submit" class="FindAddMoreButton" style="margin-bottom: 30px;">
                    <p class="ButtonArbTxt">حفظ وإضافة النتائج</p>
                    <p class="ButtonEngTxt">Save and add findings</p>
                </button>
            </div>
        </div>
    </form>

    {{-- <div class="TableHeading">
        <div class="AssmentButtonContainer">
            <button type="submit" class="FindAddMoreButton" form="control-assessmsnt">
                <p class="ButtonArbTxt">إضافة النتائج</p>
                <p class="ButtonEngTxt">Save and add findings</p>
            </button>
        </div>
    </div> --}}



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        function goBack() {
            window.history.back();
        }
    </script>


</body>
