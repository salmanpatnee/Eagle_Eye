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
                    <p class="EngTxt">Control Assessment Findings</p>
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
            <p class="AssessmentHeadings">Control Assessment Details</p>

            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>رمز تقييم الضوابط</h3>
                        <span class="text">Control Assessment ID</span>
                    </div>
                    <p class="sh-tx">{{ $controlAssessment->control_assessment_id }}</p>
                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم تقييم الضوابط</h3>
                        <span class="text">Control Assessment Name</span>
                    </div>
                    <p class="sh-tx">{{ $controlAssessment->control_assessment_name }}</p>
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم أفضل الممارسات</h3>
                        <span class="text">Best Practice Name</span>
                    </div>
                    <p class="sh-tx">{{ $controlAssessment->bestPractice->best_practices_name }}</p>
                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم الموقع</h3>
                        <span class="text">Location Name</span>
                    </div>
                    <p class="sh-tx">{{ $controlAssessment->location->location_name }}</p>
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم مدقق</h3>
                        <span class="text">Auditor Name</span>
                    </div>
                    <p class="sh-tx">{{ $controlAssessment->auditor->auditor_first_name }}
                        {{ $controlAssessment->auditor->auditor_last_name }}</p>
                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم التصنيف</h3>
                        <span class="text">Classification Name</span>
                    </div>
                    <p class="sh-tx">{{ $controlAssessment->classification->classification_name }}</p>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('control-assessment-findings.store', $controlAssessment->control_assessment_id) }}"
        method="POST">
        @csrf
        <div class="ContAssIndiTable">
            <div class="ContentTableSection">
                <p class="AssessmentHeadings">Control Assessment Findings</p>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Assessment Finding ID</p>
                            <p class="FieldHeadArbTxt">رمز العثور على</p>
                        </div>
                        <p><input type="text" name="control_finding_id" id="control_finding_id" class="sh-tx"
                                placeholder="Enter ID" value="{{old('control_finding_id')}}" required></p>
                        <x-error name="control_finding_id" />
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Assessment Finding Name</p>
                            <p class="FieldHeadArbTxt">اسم العثور على</p>
                        </div>
                        <p><input type="text" name="control_finding_name" id="control_finding_name" class="sh-tx"
                                placeholder="Enter Name" value="{{old('control_finding_name')}}" required></p>
                        <x-error name="control_finding_name" />
                    </div>


                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Controls</p>
                            <p class="FieldHeadArbTxt">اسم الضوابط</p>
                        </div>

                        <p>
                            <select name="control_id" id="control_dropdown" class="bg-tx" style="width: 480px !important;"
                                required >
                                <option value="">Select Control</option>
                                @foreach ($controls as $control)
                                    <option value="{{ $control->control_id }}" {{old('control_id') == $control->control_id ? 'selected' : null}}>
                                        {{ $control->control_id }} - {{ $control->control_name }}
                                    </option>
                                @endforeach
                            </select>
                        </p>
                    </div>

                    <div class="column">
                        <x-label label="Categories" label_ar="اسم الفئة" />
                        <x-modal-button modal_id="categoriesModal" label="Add Category" name="categories"
                            :data="isset($controlmaster->category_id)
                                ? json_encode($controlmaster->category_id)
                                : ''" />

                    </div>

                </div>


                <div id="evidenve_vs_control_content"></div>


                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Assessment Finding Description</p>
                            <p class="FieldHeadArbTxt">وصف العثور على</p>
                        </div>
                        <p><input type="text" name="control_finding_description" id="control_finding_description"
                                class="bg-tx" placeholder="Write Description" value="{{old('control_finding_description')}}"></p>
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Implementation Status</p>
                            <p class="FieldHeadArbTxt">حالة العثور على</p>
                        </div>
                        <select name="control_implementation_status" id="control_implementation_status"
                            class="sh-tx" required>
                            <option value="Not Implemented" {{old('control_implementation_status') == "Not Implemented" ? 'selected' : null}}>(Not Implemented) غير مطبق</option>
                            <option value="Implemented" {{old('control_implementation_status') == "Implemented" ? 'selected' : null}}>(Implemented) مطبق كليًا</option>
                            <option value="Partially Implemented" {{old('control_implementation_status') == "Partially Implemented" ? 'selected' : null}}>(Partially Implemented) مطبق جزئيًا</option>
                            <option value="Not Applicable" {{old('control_implementation_status') == "Not Applicable" ? 'selected' : null}}>(Not Applicable) غير قابل للتطبيق</option>
                        </select>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Maturity Level</p>
                            <p class="FieldHeadArbTxt">مستوى النضج</p>
                        </div>
                        <select name="control_maturity_level" id="control_maturity_level" class="sh-tx" required>
                            <option value="1" {{old('control_maturity_level') == "1" ? 'selected' : null}}>1 </option>
                            <option value="2" {{old('control_maturity_level') == "2" ? 'selected' : null}}>2 </option>
                            <option value="3" {{old('control_maturity_level') == "3" ? 'selected' : null}}>3</option>
                            <option value="4" {{old('control_maturity_level') == "4" ? 'selected' : null}}>4</option>
                            <option value="5" {{old('control_maturity_level') == "5" ? 'selected' : null}}>5</option>
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Implementation Details</p>
                            <p class="FieldHeadArbTxt">ضوابط تفاصيل التنفيذ</p>
                        </div>
                        <p><input type="text" name="control_implementation_details" value="{{old('control_implementation_details')}}"
                                id="control_implementation_details" class="bg-tx"
                                placeholder="Write Control Implementation Details">
                        </p>
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Maturity Justification</p>
                            <p class="FieldHeadArbTxt">ضوابط تبرير النضج</p>
                        </div>
                        <p><input type="text" name="control_maturity_justification"
                                id="control_maturity_justification" class="bg-tx" value="{{old('control_maturity_justification')}}"
                                placeholder="Write Control Maturity Justification"></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Assessment Remarks</p>
                            <p class="FieldHeadArbTxt">ملاحظات تقييم الضوابط</p>
                        </div>
                        <p><input type="text" name="remarks" id="remarks" class="bg-tx"
                                placeholder="Write Control Assessment Remarks" value="{{old('remarks')}}"></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Corrective Action</p>
                            <p class="FieldHeadArbTxt">إجراءات التصحيح</p>
                        </div>
                        <p><input type="text" name="corrective_action" id="corrective_action" class="bg-tx"
                                placeholder="Write Corrective Action"></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Corrective Action Due Date</p>
                            <p class="FieldHeadArbTxt">تاريخ استحقاق إجراءات التصحيح</p>
                        </div>
                        <p><input type="date" name="corrective_action_due_date" id="corrective_action_due_date" value="{{old('corrective_action_due_date')}}"
                                class="bg-tx"></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Preventive Action</p>
                            {{-- <p class="FieldHeadArbTxt">إجراءات التصحيح</p> --}}
                        </div>
                        <p><input type="text" name="preventive_action" id="preventive_action" value="{{old('preventive_action')}}" class="bg-tx"
                                placeholder="Write Preventive Action"></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Preventive Action Due Date</p>
                            {{-- <p class="FieldHeadArbTxt">تاريخ استحقاق إجراءات التصحيح</p> --}}
                        </div>
                        <p><input type="date" name="preventive_action_due_date" id="preventive_action_due_date" value="{{old('preventive_action_due_date')}}"
                                class="bg-tx"></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditee Name</p>
                            <p class="FieldHeadArbTxt">الشخص الذي يتم التدقيق عليه</p>
                        </div>
                        <p><input type="text" name="control_auditee_name" id="control_auditee_name"
                                class="sh-tx" placeholder="Write Control Assessment Auditee Name" value="{{old('control_auditee_name')}}"></p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditee Department</p>
                            <p class="FieldHeadArbTxt">القسم الذي يتم التدقيق عليه</p>
                        </div>
                        <p><input type="text" name="control_auditee_department" id="control_auditee_department"
                                class="sh-tx" placeholder="Write Control Assessment Auditee Department Name" value="{{old('control_auditee_department')}}"></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditee System</p>
                            <p class="FieldHeadArbTxt">تم تدقيق النظام</p>
                        </div>
                        <p><input type="text" name="control_auditee_system" id="control_auditee_system"
                                class="bg-tx" placeholder="Write Control Auditee System" value="{{old('control_auditee_system')}}"></p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Lesson Learned</p>
                            {{-- <p class="FieldHeadArbTxt">تم تدقيق النظام</p> --}}
                        </div>
                        <p><input type="text" name="lesson_learned" id="lesson_learned"
                                class="bg-tx" placeholder="Write Control Auditee System" value="{{old('lesson_learned')}}"></p>
                    </div>
                </div>
            </div>

            <div class="TableHeading">
                <div class="AssmentButtonContainer">
                    <button type="submit" class="FindAddMoreButton" {{ auth()->user()->can('manage-asset') ? null : disabled }} name="submit" value="more">
                        <p class="ButtonArbTxt">احفظ وأضف المزيد</p>
                        <p class="ButtonEngTxt">Save and add more</p>
                    </button>
                    <button type="submit" class="FindAddMoreButton" {{ auth()->user()->can('manage-asset') ? null : disabled }} name="submit" value="exit"
                        >
                        <p class="ButtonArbTxt">حفظ والخروج</p>
                        <p class="ButtonEngTxt">Save and exit</p>
                    </button>
                </div>
            </div>
        </div>
    </form>


    <x-modal id="categoriesModal" title="Select Category" :data="$categories" :selectedvalues="isset($categoryIds) ? $categoryIds : []"
        checkboxClass="categoryCheckbox" id_key="category_id" value_key="category_name" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {

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

        function goBack() {
            window.history.back();
        }
    </script>


</body>
