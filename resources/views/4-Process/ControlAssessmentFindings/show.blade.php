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

<body cz-shortcut-listen="true" style="background-color: white">
    <!-- SIDEBAR -->
    <section>
        <header>
            <div class="Header">
                <a href="/compliance" class="text-white">
                    <i class="bx bx-home"></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i style="padding-right: 30px" class="bx bx-right-arrow-alt"></i>
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
        <div class="TableHeading">
            <div class="ButtonContainer">
                <a href="/control-assessments" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                <a href="/control-assessment-findings/create/{{$controlAssessmentFinding->control_assessment_id}}" class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يضيف</p>
                    <p class="ButtonEngTxt">Add</p>
                </a>
                
                <a href="/control-assessment-findings/edit/{{$controlAssessmentFinding->control_finding_id}}" class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">تحديث</p>
                    <p class="ButtonEngTxt">Update</p>
                </a>

                <form method="POST" action="{{ route($routeName.'.destroy', $controlAssessmentFinding->control_finding_id) }}">
                    <input type="hidden" name="record" value="{{ $data->id }}">
                    <button type="submit" style="cursor: pointer"
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
            <p class="AssessmentHeadings">Control Assessment Findings</p>

            <div class="ContentTable">
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Control Assessment Finding ID</p>
                        <p class="FieldHeadArbTxt">رمز العثور على</p>
                    </div>
                    <p class="sh-tx">{{$controlAssessmentFinding->control_finding_id}}</p>
                  
                </div>
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Control Assessment Finding Name</p>
                        <p class="FieldHeadArbTxt">اسم العثور على</p>
                    </div>
                    <p class="sh-tx">{{$controlAssessmentFinding->control_finding_name}}</p>
                </div>


            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Controls</p>
                        <p class="FieldHeadArbTxt">اسم الضوابط</p>
                    </div>

                    <p class="sh-tx">{{$controlAssessmentFinding->control->control_name}}</p>
                </div>

                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Categories</p>
                        <p class="FieldHeadArbTxt">اسم الفئة</p>
                    </div>
                    <ol class="resource-list">
                        @foreach ($controlAssessmentFinding->categories as $category)
                            <li>{{$category->category_name}}</li>
                        @endforeach
                    </ol>


                </div>

            </div>


            <div id="evidenve_vs_control_content"></div>


            <div class="ContentTable">
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Control Assessment Finding Description</p>
                        <p class="FieldHeadArbTxt">وصف العثور على</p>
                    </div>
                    <p class="bg-tx">{{$controlAssessmentFinding->control_finding_description}}</p>
                </div>
            </div>

            <div class="ContentTable">
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Implementation Status</p>
                        <p class="FieldHeadArbTxt">حالة العثور على</p>
                    </div>
                    <p class="sh-tx">{{$controlAssessmentFinding->control_implementation_status}}</p>

                  
                </div>
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Maturity Level</p>
                        <p class="FieldHeadArbTxt">مستوى النضج</p>
                    </div>
                    <p class="sh-tx">{{$controlAssessmentFinding->control_maturity_level}}</p>

                    
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Control Implementation Details</p>
                        <p class="FieldHeadArbTxt">ضوابط تفاصيل التنفيذ</p>
                    </div>
                    <p class="bg-tx">{{$controlAssessmentFinding->control_implementation_details}}</p>

                   
                </div>
            </div>

            <div class="ContentTable">
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Control Maturity Justification</p>
                        <p class="FieldHeadArbTxt">ضوابط تبرير النضج</p>
                    </div>
                    <p class="bg-tx">{{$controlAssessmentFinding->control_maturity_justification}}</p>

                    
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Control Assessment Remarks</p>
                        <p class="FieldHeadArbTxt">ملاحظات تقييم الضوابط</p>
                    </div>
                    <p class="bg-tx">{{$controlAssessmentFinding->remarks}}</p>

                   
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Corrective Action</p>
                        <p class="FieldHeadArbTxt">إجراءات التصحيح</p>
                    </div>
                    <p class="sh-tx">{{$controlAssessmentFinding->corrective_action}}</p>

            
                </div>
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Corrective Action Due Date</p>
                        <p class="FieldHeadArbTxt">تاريخ استحقاق إجراءات التصحيح</p>
                    </div>
                    <p class="sh-tx">{{$controlAssessmentFinding->corrective_action_due_date}}</p>


            
                </div>
            </div>
         
            <div class="ContentTable">
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Preventive Action</p>

                    </div>
                    <p class="sh-tx">{{$controlAssessmentFinding->preventive_action}}</p>


                   
                </div>
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Preventive Action Due Date</p>

                    </div>
                    <p class="sh-tx">{{$controlAssessmentFinding->preventive_action_due_date}}</p>

                   
                </div>

            </div>
            <div class="ContentTable">
                
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Auditee Name</p>
                        <p class="FieldHeadArbTxt">الشخص الذي يتم التدقيق عليه</p>
                    </div>
                    <p class="sh-tx">{{$controlAssessmentFinding->control_auditee_name}}</p>

                  
                </div>
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Auditee Department</p>
                        <p class="FieldHeadArbTxt">القسم الذي يتم التدقيق عليه</p>
                    </div>
                    <p class="sh-tx">{{$controlAssessmentFinding->control_auditee_department}}</p>

                 
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Auditee System</p>
                        <p class="FieldHeadArbTxt">تم تدقيق النظام</p>
                    </div>
                    <p class="sh-tx">{{$controlAssessmentFinding->control_auditee_system}}</p>

                  
                </div>
            </div>
            <div class="ContentTable">
                <div class="column">
                    <div class="FieldHead">
                        <p class="FieldHeadEngTxt">Lesson Learned</p>

                    </div>
                    <p class="bg-tx">{{$controlAssessmentFinding->lesson_learned}}</p>


                   
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>


</body>

</html>
