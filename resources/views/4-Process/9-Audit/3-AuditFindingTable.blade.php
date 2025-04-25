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
        ol.resource-list {
            width: 480px;
        }

        ol.resource-list li {

            margin-left: 0;

            padding-left: 0.5em;
            padding-block: .5em;
        }
    </style>
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
                    <p class="EngTxt">Audit Findings</p>
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
                <a href="{{ route('audit-registrations.index') }}" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>

                <a href="/audit-findings/create/{{ $auditFinding->audit_id }}"
                    class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يضيف</p>
                    <p class="ButtonEngTxt">Add</p>
                </a>

                <a href="/audit-findings/{{ $auditFinding->audit_finding_id }}/edit"
                    class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">تحديث</p>
                    <p class="ButtonEngTxt">Update</p>
                </a>

                <form method="POST" action="{{ route($routeName . '.destroy', $auditFinding->id) }}" id="deleteForm">
                    <input type="hidden" name="record" value="{{ $auditFinding->id }}">
                    <button type="button" id="btnDelete" style="cursor: pointer"
                        class="{{ auth()->user()->can('delete-data') && auth()->user()->can('manage-asset') ? 'DeleteButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                    @csrf
                    @method('DELETE')
                </form>


            </div>
        </div>


        <div class="">
            <div class="ContentTableSection">
                <p class="AssessmentHeadings">Audit Findings</p>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Finding ID</p>
                            <p class="FieldHeadArbTxt">رمز العثور على</p>
                        </div>
                        <p class="sh-tx">{{ $auditFinding->audit_finding_id }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Finding Name</p>
                            <p class="FieldHeadArbTxt">اسم العثور على</p>
                        </div>
                        <p class="sh-tx">{{ $auditFinding->audit_finding_name }}</p>
                    </div>


                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Finding Description</p>
                            <p class="FieldHeadArbTxt">وصف العثور على</p>
                        </div>
                        <p class="bg-tx">{{ $auditFinding->audit_finding_description }}</p>
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditee Name</p>
                            <p class="FieldHeadArbTxt">الشخص الذي يتم التدقيق عليه</p>
                        </div>
                        <p class="sh-tx">{{ $auditFinding->auditee->auditee_first_name }}</p>


                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditee Department</p>
                            <p class="FieldHeadArbTxt">القسم الذي يتم التدقيق عليه</p>
                        </div>
                        <p class="sh-tx">{{ $auditFinding->department?->department_name }}</p>


                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Domain</p>
                            <p class="FieldHeadArbTxt">مراجعة المكون</p>
                        </div>
                        <p class="sh-tx">{{ $auditFinding->domain->main_domain_name }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Nature</p>
                            <p class="FieldHeadArbTxt">مراجعة الطبيعة</p>
                        </div>
                        <p class="sh-tx">{{ $auditFinding->audit_nature }}</p>
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Asset</p>
                            <p class="FieldHeadArbTxt">الأصول</p>
                        </div>
                        <ol class="resource-list">
                            @forelse ($auditFinding->assets as $asset)
                                <li>{{ $asset->asset_name }}</li>
                            @empty
                                <p class="sh-tx">No assets found</p>
                            @endforelse
                        </ol>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Asset Group</p>
                            <p class="FieldHeadArbTxt">مجموعة الأصول</p>
                        </div>
                        <ol class="resource-list">
                            @forelse ($auditFinding->assetsGroups as $assetGroup)
                                <li>{{ $assetGroup->asset_group_name }}</li>
                            @empty
                                <p class="sh-tx">No asset groups found</p>
                            @endforelse
                        </ol>
                    </div>
                </div>


                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Owner Name</p>
                            <p class="FieldHeadArbTxt">اسم صاحب</p>
                        </div>
                        <p class="sh-tx">{{ $auditFinding->owner?->owner_name }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Custodian Name</p>
                            <p class="FieldHeadArbTxt">اسم الوصي</p>
                        </div>
                        <ol class="resource-list">
                            @forelse ($auditFinding->custodians as $custodian)
                                <li>{{ $custodian->custodian_role_title }}</li>
                            @empty
                                <p class="sh-tx">No custodians found</p>
                            @endforelse
                        </ol>
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Controls</p>
                            <p class="FieldHeadArbTxt">اسم الفئة</p>
                        </div>

                        <ol class="resource-list">
                            @foreach ($auditFinding->controls as $control)
                                <li>{{ $control->control_id }} - {{ $control->control_name }}</li>
                            @endforeach
                        </ol>

                    </div>

                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Categories</p>
                            <p class="FieldHeadArbTxt">اسم الفئة</p>
                        </div>

                        <ol class="resource-list">
                            @foreach ($auditFinding->categories as $category)
                                <li>{{ $category->category_id }} - {{ $category->category_name }}</li>
                            @endforeach
                        </ol>



                    </div>

                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Compliance Level</p>
                            <p class="FieldHeadArbTxt">مستوى الالتزام</p>
                        </div>
                        <p class="bg-tx">{{ $auditFinding->compliance_level }}</p>


                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">NCA Remarks</p>
                            <p class="FieldHeadArbTxt">الملاحظات</p>
                        </div>
                        <p class="bg-tx">{{ $auditFinding->nca_remarks }}</p>


                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Root Cause Analysis</p>
                            <p class="FieldHeadArbTxt">تحليل السبب الجذري</p>
                        </div>
                        <p class="bg-tx">{{ $auditFinding->root_cause_analysis }}</p>

                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Corrective Action</p>
                            <p class="FieldHeadArbTxt">إجراءات التصحيح</p>
                        </div>
                        <p class="sh-tx">{{ $auditFinding->corrective_action }}</p>


                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Corrective Action Due Date</p>
                            <p class="FieldHeadArbTxt">تاريخ استحقاق إجراءات التصحيح</p>
                        </div>
                        <p class="sh-tx">{{ $auditFinding->corrective_action_due_date }}</p>


                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Preventive Action</p>
                            <p class="FieldHeadArbTxt">إجراءات وقائية

                            </p>
                        </div>
                        <p class="sh-tx">{{ $auditFinding->preventive_action }}</p>



                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt"> Preventive Action Due Date

                            </p>
                            <p class="FieldHeadArbTxt">تاريخ استحقاق الإجراءات الوقائية

                            </p>
                        </div>
                        <p class="sh-tx">{{ $auditFinding->preventive_action_due_date }}</p>

                    </div>
                </div>



                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Finding Status</p>
                            <p class="FieldHeadArbTxt">العثور على الحالة</p>
                        </div>
                        <p class="sh-tx">{{ $auditFinding->audit_finding_status }}</p>



                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Closure Expected Date</p>
                            <p class="FieldHeadArbTxt">تاريخ الإغلاق المتوقع</p>
                        </div>
                        <p class="sh-tx">{{ $auditFinding->closure_expected_date }}</p>


                    </div>
                </div>




                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Lesson Learned</p>
                            <p class="FieldHeadArbTxt">تعلم الدرس</p>
                        </div>
                        <p class="bg-tx">{{ $auditFinding->lesson_learned }}</p>


                    </div>
                </div>

            </div>


        </div>
    </div>
    @include('components.delete-confirmation-modal')
    <script>
        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>


</body>

</html>
