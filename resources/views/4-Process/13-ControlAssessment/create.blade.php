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

        .ContAssIndiTable .TableHeading {

            justify-content: end;

        }

        .ContAssIndiTable .ButtonContainer {

            margin-left: 0;
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
    <form id="MasterForm" action="{{ route('control-assessments.store') }}" method="POST">
        @csrf
        <div class="ContAssIndiTable">
            <div class="TableHeading" style="margin-top: 100px;">
                <div class="ButtonContainer">
                    {{-- <div> --}}
                    <a href="{{ route('control-assessments.index') }}" class="MoreButton">
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
                    {{-- </div> --}}
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
                            <p><input type="text" name="control_assessment_id" id="control_assessment_id"
                                    class="sh-tx" placeholder="Enter ID" value="{{ old('control_assessment_id') }}"
                                    required></p>
                            <x-error name="control_assessment_id" />
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Name</p>
                                <p class="FieldHeadArbTxt">اسم تقييم الضوابط</p>
                            </div>
                            <p><input type="text" name="control_assessment_name" id="control_assessment_name"
                                    class="sh-tx" placeholder="Enter Name" value="{{ old('control_assessment_name') }}"
                                    required></p>
                            <x-error name="control_assessment_name" />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Description</p>
                                <p class="FieldHeadArbTxt">وصف تقييم الضوابط</p>
                            </div>
                            <p><input type="text" name="control_assessment_description"
                                    id="control_assessment_description" class="bg-tx" placeholder="Write Description"
                                    value="{{ old('control_assessment_description') }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Start Date</p>
                                <p class="FieldHeadArbTxt">تاريخ بدء تقييم الضوابط</p>
                            </div>
                            <p><input type="date" name="control_assessment_start_date"
                                    id="control_assessment_start_date" class="sh-tx"
                                    value="{{ old('control_assessment_start_date') }}" required></p>
                            <x-error name="control_assessment_name" />
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment End Date</p>
                                <p class="FieldHeadArbTxt">تاريخ انتهاء تقييم الضوابط</p>
                            </div>
                            <p><input type="date" name="control_assessment_end_date"
                                    id="control_assessment_end_date" class="sh-tx"
                                    value="{{ old('control_assessment_end_date') }}" required></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Type</p>
                                <p class="FieldHeadArbTxt">نوع تقييم الضوابط</p>
                            </div>
                            <p><input type="text" name="control_assessment_type" id="control_assessment_type"
                                    class="bg-tx" placeholder="Write Control Assessment Type Name"
                                    value="{{ old('control_assessment_type') }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Internal or External</p>
                                <p class="FieldHeadArbTxt">تقييم الضوابط الداخلية أو الخارجية</p>
                            </div>
                            <select class="sh-tx" name="control_assessment_internal_external"
                                id="control_assessment_internal_external">
                                <option value="Internal"
                                    {{ old('control_assessment_internal_external') == 'Internal' ? 'selected' : '' }}>
                                    Internal</option>
                                <option value="External"
                                    {{ old('control_assessment_internal_external') == 'External' ? 'selected' : '' }}>
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
                            <p><input type="text" name="control_assessment_approach"
                                    id="control_assessment_approach" class="bg-tx"
                                    placeholder="Write Control Assessment Approach"
                                    value="{{ old('control_assessment_approach') }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Objectives</p>
                                <p class="FieldHeadArbTxt">أهداف تقييم الضوابط</p>
                            </div>
                            <p><input type="text" name="control_assessment_objectives"
                                    id="control_assessment_objectives" class="bg-tx"
                                    placeholder="Write Control Assessment Objectives"
                                    value="{{ old('control_assessment_objectives') }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessment Scope</p>
                                <p class="FieldHeadArbTxt">نطاق تقييم الضوابط</p>
                            </div>
                            <p><input type="text" name="control_assessment_scope" id="control_assessment_scope"
                                    class="bg-tx" placeholder="Write Control Assessment Scope"
                                    value="{{ old('control_assessment_scope') }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Standard References</p>
                                <p class="FieldHeadArbTxt">مراجع معايير</p>
                            </div>
                            <p><input type="text" name="standard_references" id="standard_references"
                                    class="bg-tx" placeholder="Write Control Assessment Standard References"
                                    value="{{ old('standard_references') }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Best Practice Name</p>
                                <p class="FieldHeadArbTxt">اسم أفضل الممارسات</p>
                            </div>
                            <p>
                                <select name="best_practices_id" id="best_practices_id" class="sh-tx" required>
                                    <option value="">Select Option</option>
                                    @foreach ($bestPractices as $bestPractice)
                                        <option value="{{ $bestPractice->best_practices_id }}"
                                            {{ old('best_practices_id') == $bestPractice->best_practices_id ? 'selected' : null }}>
                                            {{ $bestPractice->best_practices_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                            <x-error name="best_practices_id" />
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Location Name</p>
                                <p class="FieldHeadArbTxt">اسم الموقع</p>
                            </div>
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
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditor Name</p>
                                <p class="FieldHeadArbTxt">اسم مدقق</p>
                            </div>
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
                            <x-error name="auditor_id" />
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Classification Name</p>
                                <p class="FieldHeadArbTxt">اسم التصنيف</p>
                            </div>
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
                            <x-error name="classification_id" />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Assessing Entity</p>
                                <p class="FieldHeadArbTxt">ضوابط تقييم الجهة</p>
                            </div>
                            <p><input type="text" name="control_assessing_entity" id="control_assessing_entity"
                                    class="bg-tx" placeholder="Write Control Assessment Entity Name"
                                    value="{{ old('control_assessing_entity') }}"></p>
                        </div>
                    </div>
            </table>

            <div class="ContentTableSection" style="border: none; ">
                <button type="submit" class="FindAddMoreButton" style="margin-bottom: 30px;">
                    <p class="ButtonArbTxt">حفظ وإضافة النتائج</p>
                    <p class="ButtonEngTxt">Save and add findings</p>
                </button>
            </div>

            {{-- <div class="TableHeading">
                <div class="AssmentButtonContainer">
                    <button type="submit" class="FindAddMoreButton">
                        <p class="ButtonArbTxt">حفظ وإضافة النتائج</p>
                        <p class="ButtonEngTxt">Save and add findings</p>
                    </button>
                </div>
            </div> --}}
        </div>
    </form>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#BestPractName").change(function() {
                let bestPracticeName = $(this).val();
                let controlAssessmentId = $('#control_assessment_id').val();
                $.ajax({
                    url: '/bestpractice-controlls',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        bestPracticeName,
                        controlAssessmentId
                    },
                    success: function(response) {
                        $("#control_dropdown").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Handle any errors
                    }
                });


            });

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
