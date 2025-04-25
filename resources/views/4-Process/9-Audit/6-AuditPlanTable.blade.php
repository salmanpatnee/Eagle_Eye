<!DOCTYPE html>
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
                    <p class="ArbTxt">تخطيط مراجعة والتسجيل</p>
                    <p class="EngTxt">Audit Planning and Registration</p>
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
        @include('4-Process/9-Audit/Sidebar')
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <div class="IndiTable">
        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">تخطيط مراجعة</p>
                <p class="PageHeadEngTxt">Audit Plan</p>
            </div>
            <div class="ButtonContainer">
                <a href="/audit-plan-list" class="MoreButton">
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
                <form method="POST" action="{{ route($routeName . '.delete') }}" id="deleteForm">
                    <input type="hidden" name="record" value="{{ $auditData?->audit_id }}">
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
        <table cellspacing="0">
            <div class="ContentTableSection">
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit ID</p>
                            <p class="FieldHeadArbTxt">رمز المراجعة</p>
                        </div>
                        <p class="sh-tx">{{ $auditData->audit_id }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Name</p>
                            <p class="FieldHeadArbTxt">اسم المراجعة</p>
                        </div>
                        <p class="sh-tx">{{ $auditData->audit_name }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Description</p>
                            <p class="FieldHeadArbTxt">وصف المراجعة</p>
                        </div>
                        <p class="bg-tx">{{ $auditData->audit_description }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Sponsor</p>
                            <p class="FieldHeadArbTxt">مراجعة الراعي</p>
                        </div>
                        <p class="bg-tx">{{ $auditData->audit_sponsor }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Scope</p>
                            <p class="FieldHeadArbTxt">مراجعة نطاق</p>
                        </div>
                        <p class="bg-tx">{{ $auditData->audit_scope }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Objectives</p>
                            <p class="FieldHeadArbTxt">أهداف المراجعة</p>
                        </div>
                        <p class="bg-tx">{{ $auditData->audit_objectives }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Criteria</p>
                            <p class="FieldHeadArbTxt">معايير المراجعة</p>
                        </div>
                        <p class="bg-tx">{{ $auditData->audit_criteria }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Methodology</p>
                            <p class="FieldHeadArbTxt">منهجية المراجعة</p>
                        </div>
                        <p class="bg-tx">{{ $auditData->audit_methodology }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Plan Start Date</p>
                            <p class="FieldHeadArbTxt">تاريخ بدء خطة التدقيق</p>
                        </div>
                        <p class="sh-tx">{{ $auditData->audit_plan_start_date }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Plan End Date</p>
                            <p class="FieldHeadArbTxt">تاريخ انتهاء خطة التدقيق</p>
                        </div>
                        <p class="sh-tx">{{ $auditData->audit_plan_end_date }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditing Entity</p>
                            <p class="FieldHeadArbTxt">الجهة المراجعة</p>
                        </div>
                        <p class="sh-tx">{{ $auditData->auditing_entity }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditee Name</p>
                            <p class="FieldHeadArbTxt">اسم مدقق</p>
                        </div>
                        <p class="sh-tx">{{ $auditData->auditee_first_name }} {{ $auditData->auditee_last_name }}
                        </p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Auditing Location</p>
                            <p class="FieldHeadArbTxt">موقع التدقيق</p>
                        </div>
                        <p class="sh-tx">{{ $auditData->location_name }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Nature</p>
                            <p class="FieldHeadArbTxt">طبيعة التدقيق</p>
                        </div>
                        <p class="sh-tx">{{ $auditData->audit_nature }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Audit Type</p>
                            <p class="FieldHeadArbTxt">نوع التدقيق</p>
                        </div>
                        <p class="sh-tx">{{ $auditData->audit_type }}</p>
                    </div>
                </div>
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
