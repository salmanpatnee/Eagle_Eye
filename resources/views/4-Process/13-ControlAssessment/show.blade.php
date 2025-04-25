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
    <div class="ContAssIndiTable">
        <div class="TableHeading">
            <div class="ButtonContainer">
                <a href="{{ route('control-assessments.index') }}" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>

                <a href="{{ route($routeName . '.create') }}"
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

                {{-- <a href="{{ route('control-assessments.create') }}" class="MoreButton">
                    <p class="ButtonArbTxt">يضيف</p>
                    <p class="ButtonEngTxt">Add</p>
                </a>
                <a href="{{ route('control-assessments.edit', $controlAssessment->control_assessment_id) }}"
                    class="MoreButton">
                    <p class="ButtonArbTxt">تحديث</p>
                    <p class="ButtonEngTxt">Update</p>
                </a>
                <a href="" class="DisDeleteButton">
                    <p class="ButtonArbTxt">يمسح</p>
                    <p class="ButtonEngTxt">Delete</p>
                </a> --}}
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
                            <h3>وصف تقييم الضوابط</h3>
                            <span class="text">Control Assessment Description</span>
                        </div>
                        <p class="bg-tx">{{ $controlAssessment->control_assessment_description }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>تاريخ بدء تقييم الضوابط</h3>
                            <span class="text">Control Assessment Start Date</span>
                        </div>
                        <p class="sh-tx">{{ $controlAssessment->control_assessment_start_date }}</p>
                    </div>
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>تاريخ انتهاء تقييم الضوابط</h3>
                            <span class="text">Control Assessment End Date</span>
                        </div>
                        <p class="sh-tx">{{ $controlAssessment->control_assessment_end_date }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>نوع تقييم الضوابط</h3>
                            <span class="text">Control Assessment Type</span>
                        </div>
                        <p class="bg-tx">{{ $controlAssessment->control_assessment_type }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>تقييم الضوابط الداخلية أو الخارجية</h3>
                            <span class="text">Control Assessment Internal or External</span>
                        </div>
                        <p class="sh-tx">{{ $controlAssessment->control_assessment_internal_external }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>نهج تقييم الضوابط</h3>
                            <span class="text">Control Assessment Approach</span>
                        </div>
                        <p class="bg-tx">{{ $controlAssessment->control_assessment_approach }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>أهداف تقييم الضوابط</h3>
                            <span class="text">Control Assessment Objectives</span>
                        </div>
                        <p class="bg-tx">{{ $controlAssessment->control_assessment_objectives }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>نطاق تقييم الضوابط</h3>
                            <span class="text">Control Assessment Scope</span>
                        </div>
                        <p class="bg-tx">{{ $controlAssessment->control_assessment_scope }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>مراجع معايير</h3>
                            <span class="text">Standard References</span>
                        </div>
                        <p class="bg-tx">{{ $controlAssessment->standard_references }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>اسم أفضل الممارسات</h3>
                            <span class="text">Best Practice Name</span>
                        </div>
                        <p class="sh-tx">{{ $controlAssessment->bestPractice?->best_practices_name }}</p>
                    </div>
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>اسم الموقع</h3>
                            <span class="text">Location Name</span>
                        </div>
                        <p class="sh-tx">{{ $controlAssessment->location?->location_name }}</p>
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
                <div class="ContentTable">
                    <div class="column">
                        <div class="MenuTxt">
                            <h3>ضوابط تقييم الجهة</h3>
                            <span class="text">Control Assessing Entity</span>
                        </div>
                        <p class="bg-tx">{{ $controlAssessment->control_assessing_entity }}</p>
                    </div>
                </div>
            </div>
        </table>
        <div class="ListTable">
            <table cellspacing="0">
                <tr>
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
                    <th></th>
                </tr>
                @foreach ($controlAssessment->findings as $finding)
                    <tr>

                        <td>
                            <a href="{{ route('control-assessment-findings.show', $finding->control_finding_id) }}">
                                {{ $finding->control_finding_id }}
                            </a>
                        </td>
                        <td>{{ $finding->control_finding_name }}</td>
                        <td>{{ $finding->control_implementation_status }}</td>
                        <td style="display: flex; gap:10px;">
                            @if (auth()->user()->can('manage-asset'))    
                            <a
                                href="{{ route('control-assessment-findings.edit', $finding->control_finding_id) }}">Edit</a>
                        @endif

                                @if (auth()->user()->can('delete-data'))    
                                    <form
                                        action="{{ route('control-assessment-findings.destroy', $finding->control_finding_id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-link">Delete</button>
                                    </form>
                                @endif
                            {{-- <a href="">Delete</a> --}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
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
