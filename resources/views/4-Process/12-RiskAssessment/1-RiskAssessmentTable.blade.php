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
    <style>
        .btn-link {
            background-color: transparent;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-white">


    <!-- SIDEBAR -->
    <section>
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
                @include('partials.roles')
                <div class="RightButtonContainer">
                    <button type="button" class="RightButton" onclick="window.history.back();">
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
                <a href="{{ route('risk-assessments.index') }}" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>

                <a href="{{ route('risk.riskAss') }}"
                    class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يضيف</p>
                    <p class="ButtonEngTxt">Add</p>
                </a>
                <a href="{{ route($routeName . '.edit', $data->$primaryKey) }}"
                    class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">تحديث</p>
                    <p class="ButtonEngTxt">Update</p>
                </a>
                <form method="POST" action="{{ route($routeName . '.destroy') }}" id="deleteForm">
                    <input type="hidden" name="record" value="{{ $data->id }}">
                    <button type="button" id="btnDelete"
                        class="{{ auth()->user()->can('delete-data') && auth()->user()->can('manage-asset') ? 'DeleteButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                    @csrf
                    @method('DELETE')
                </form>

     
            </div>
        </div>
        <div class="ContentTableSection">
            <p class="AssessmentHeadings">Risk Assessment Master</p>
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
                        <h3>وصف تقييم المخاطر</h3>
                        <span class="text">Risk Assessment Description</span>
                    </div>
                    <p class="bg-tx">{{ $riskAssessment->risk_assessment_description }}</p>
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>تاريخ بدء تقييم المخاطر</h3>
                        <span class="text">Risk Assessment Start Date</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessment->risk_assessment_start_date }}</p>
                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3>تاريخ انتهاء تقييم المخاطر</h3>
                        <span class="text">Risk Assessment End Date</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessment->risk_assessment_end_date }}</p>
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>نوع تقييم المخاطر</h3>
                        <span class="text">Risk Assessment Type</span>
                    </div>
                    <p class="bg-tx">{{ $riskAssessment->risk_assessment_type }}</p>
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>تقييم المخاطر الداخلية أو الخارجية</h3>
                        <span class="text">Risk Assessment Internal or External</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessment->risk_assessment_internal_external }}</p>
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>نهج تقييم المخاطر</h3>
                        <span class="text">Risk Assessment Approach</span>
                    </div>
                    <p class="bg-tx">{{ $riskAssessment->risk_assessment_approach }}</p>
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>أهداف تقييم المخاطر</h3>
                        <span class="text">Risk Assessment Objectives</span>
                    </div>
                    <p class="bg-tx">{{ $riskAssessment->risk_assessment_objectives }}</p>
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>نطاق تقييم المخاطر</h3>
                        <span class="text">Risk Assessment Scope</span>
                    </div>
                    <p class="bg-tx">{{ $riskAssessment->risk_assessment_scope }}</p>
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>مراجع معايير</h3>
                        <span class="text">Standard References</span>
                    </div>
                    <p class="bg-tx">{{ $riskAssessment->standard_references }}</p>
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>المخاطر تقييم الجهة</h3>
                        <span class="text">Risk Assessment Against</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessment->risk_assessment_against }}</p>
                </div>
                <div class="column">
                    <div class="MenuTxt">
                        <h3>اسم الموقع</h3>
                        <span class="text">Location Name</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessment->location?->location_name }}</p>
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
                        <h3>اسم التصنيف</h3>
                        <span class="text">Classification Name</span>
                    </div>
                    <p class="sh-tx">{{ $riskAssessment->classification->classification_name }}</p>
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="MenuTxt">
                        <h3>المخاطر تقييم الجهة</h3>
                        <span class="text">Risk Assessing Entity</span>
                    </div>
                    <p class="bg-tx">{{ $riskAssessment->risk_assessing_entity }}</p>
                </div>
            </div>
        </div>


        <div class="ListTable">
            <table cellspacing="0">
                <tr>
                    {{-- <th style="padding-right: 0px;"></th> --}}
                    <th style="padding-right: 0px;">
                        <p class="ListHeadArbTxt">رمز العثور على</p>
                        <p class="ListHeadEngTxt">Findings ID</p>
                    </th>
                    <th style="padding-right: 0px;">
                        <p class="ListHeadArbTxt">اسم العثور على</p>
                        <p class="ListHeadEngTxt">Findings Name</p>
                    </th>
                    <th style="padding-right: 0px;">
                        <p class="ListHeadArbTxt">حالة تنفيذ </p>
                        <p class="ListHeadEngTxt"> Implementation Status</p>
                    </th>
                    <th></th>
                </tr>
                @foreach ($riskAssessment->findings as $finding)
                    <tr>
                        {{-- <td><input type="checkbox" name="selecteddelete[]"
                                value="{{ $finding->control_finding_id }}">
                        </td> --}}
                        <td>
                            <a href="{{ route('risk-assessment-findings.show', $finding->risk_finding_id) }}">
                                {{ $finding->risk_finding_id }}
                            </a>
                        </td>
                        <td>{{ $finding->risk_assessment_name }}</td>
                        <td>{{ $finding->implementation_status }}</td>
                        <td style="display: flex; gap: 20px;">
                            @if (auth()->user()->can('manage-asset'))
                                <a
                                    href="{{ route('risk-assessment-findings.edit', $finding->risk_finding_id) }}">Edit</a>
                            @endif

                            @if (auth()->user()->can('delete-data'))
                                <form
                                    action="{{ route('risk-assessment-findings.destroy', $finding->risk_finding_id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-link">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{--         
        <table cellspacing="0">
            <div class="ContentTableSection">
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment ID</p>
                            <p class="FieldHeadArbTxt">رمز تقييم المخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $riskAssessment->risk_assessment_id }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment Name</p>
                            <p class="FieldHeadArbTxt">اسم تقييم المخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $riskAssessment->risk_assessment_name }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment Description</p>
                            <p class="FieldHeadArbTxt">وصف تقييم المخاطر</p>
                        </div>
                        <p class="bg-tx">{{ $riskAssessment->risk_assessment_description }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment Start Date</p>
                            <p class="FieldHeadArbTxt">تاريخ بدء تقييم المخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $riskAssessment->risk_assessment_start_date }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment End Date</p>
                            <p class="FieldHeadArbTxt">تاريخ انتهاء تقييم المخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $riskAssessment->risk_assessment_end_date }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment Type</p>
                            <p class="FieldHeadArbTxt">نوع تقييم المخاطر</p>
                        </div>
                        <p class="bg-tx">{{ $riskAssessment->risk_assessment_type }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment Internal or External</p>
                            <p class="FieldHeadArbTxt">تقييم المخاطر الداخلية أو الخارجية</p>
                        </div>
                        <p class="sh-tx">{{ $riskAssessment->risk_assessment_internal_external }}</p>
                    </div>
                </div>
            </div>
            <div class="ContentTableSection">
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment Approach</p>
                            <p class="FieldHeadArbTxt">نهج تقييم المخاطر</p>
                        </div>
                        <p class="bg-tx">{{ $riskAssessment->risk_assessment_approach }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment Objectives</p>
                            <p class="FieldHeadArbTxt">أهداف تقييم المخاطر</p>
                        </div>
                        <p class="bg-tx">{{ $riskAssessment->risk_assessment_objectives }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment Scope</p>
                            <p class="FieldHeadArbTxt">نطاق تقييم المخاطر</p>
                        </div>
                        <p class="bg-tx">{{ $riskAssessment->risk_assessment_scope }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Standard References</p>
                            <p class="FieldHeadArbTxt">مراجع المخاطر</p>
                        </div>
                        <p class="bg-tx">{{ $riskAssessment->standard_references }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment Against</p>
                            <p class="FieldHeadArbTxt">المخاطر تقييم الجهة</p>
                        </div>
                        <p class="bg-tx">{{ $riskAssessment->risk_assessment_against }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Location Name</p>
                            <p class="FieldHeadArbTxt">اسم الموقع</p>
                        </div>
                        <p class="sh-tx">{{ $riskAssessment->location_name }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditor Name</p>
                            <p class="FieldHeadArbTxt">الشخص الذي يتم التدقيق عليه</p>
                        </div>
                        <p class="sh-tx">{{ $riskAssessment->auditor_first_name }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Classification Name</p>
                            <p class="FieldHeadArbTxt">اسم التصنيف</p>
                        </div>
                        <p class="sh-tx">{{ $riskAssessment->classification_name }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessing Entity</p>
                            <p class="FieldHeadArbTxt">المخاطر تقييم الجهة</p>
                        </div>
                        <p class="bg-tx">{{ $riskAssessment->risk_assessing_entity }}</p>
                    </div>
                </div>
        </table> --}}

    </div>
    @include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
        document.getElementById('btnDelete').addEventListener('click', function(event) {
    event.preventDefault();
    window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
});
    </script>
</body>

</html>
