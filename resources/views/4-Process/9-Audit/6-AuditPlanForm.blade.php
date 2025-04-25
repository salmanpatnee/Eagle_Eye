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
    <form action="/audit-plan-input/post" method="post">
        @csrf
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
                    <button type="submit"  class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </button>
                    <a href="" class="DisabledButton">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    <button type="" class="DisDeleteButton">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
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
                            <p><input type="text" name="audit_id" id="audit_id" class="sh-tx"
                                    value="{{ old('audit_id') }}" required></p>
                            <x-error name="audit_id" />
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Audit Name</p>
                                <p class="FieldHeadArbTxt">اسم المراجعة</p>
                            </div>
                            <p><input type="text" name="audit_name" id="audit_name" class="sh-tx" required
                                    value="{{ old('audit_name') }}"></p>
                            <x-error name="audit_name" />
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Audit Description</p>
                                <p class="FieldHeadArbTxt">وصف المراجعة</p>
                            </div>
                            <p><input type="text" name="audit_description" id="audit_description" class="bg-tx"
                                    placeholder="Enter  Description" value="{{ old('audit_description') }}"></p>
                            <x-error name="audit_description" />
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Audit Sponsor</p>
                                <p class="FieldHeadArbTxt">مراجعة الراعي</p>
                            </div>
                            <p><input type="text" name="audit_sponsor" id="audit_sponsor" class="bg-tx"
                                    value="{{ old('audit_sponsor') }}"></p>
                            <x-error name="audit_sponsor" />
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Audit Scope</p>
                                <p class="FieldHeadArbTxt">مراجعة نطاق</p>
                            </div>
                            <p><input type="text" name="audit_scope" id="audit_scope" class="bg-tx"
                                    value="{{ old('audit_scope') }}"></p>
                            <x-error name="audit_scope" />
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Audit Objectives</p>
                                <p class="FieldHeadArbTxt">أهداف المراجعة</p>
                            </div>
                            <p><input type="text" name="audit_objectives" id="audit_objectives" class="bg-tx"
                                    value="{{ old('audit_objectives') }}"></p>
                            <x-error name="audit_objectives" />
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Audit Criteria</p>
                                <p class="FieldHeadArbTxt">معايير المراجعة</p>
                            </div>
                            <p><input type="text" name="audit_criteria" id="audit_criteria" class="bg-tx"
                                    value="{{ old('audit_criteria') }}"></p>
                            <x-error name="audit_criteria" />
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Audit Methodology</p>
                                <p class="FieldHeadArbTxt">منهجية المراجعة</p>
                            </div>
                            <p><input type="text" name="audit_methodology" id="audit_methodology" class="bg-tx"
                                    value="{{ old('audit_methodology') }}"></p>
                            <x-error name="audit_methodology" />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Audit Plan Start Date</p>
                                <p class="FieldHeadArbTxt">تاريخ بدء خطة التدقيق</p>
                            </div>
                            <p><input type="date" name="audit_plan_start_date" id="audit_plan_start_date"
                                    class="sh-tx" required value="{{ old('audit_plan_start_date') }}"></p>
                            <x-error name="audit_plan_start_date" />
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Audit Plan End Date</p>
                                <p class="FieldHeadArbTxt">تاريخ انتهاء خطة التدقيق</p>
                            </div>
                            <p><input type="date" name="audit_plan_end_date" id="audit_plan_end_date"
                                    class="sh-tx" required value="{{ old('audit_plan_end_date') }}"></p>
                            <x-error name="audit_plan_end_date" />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditing Entity</p>
                                <p class="FieldHeadArbTxt">الجهة المراجعة</p>
                            </div>
                            <p><input type="text" name="auditing_entity" id="auditing_entity" class="sh-tx"
                                    value="{{ old('auditing_entity') }}"></p>
                            <x-error name="auditing_entity" />
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditee Name</p>
                                <p class="FieldHeadArbTxt">اسم مدقق</p>
                            </div>
                            <p>
                                <select name="auditee_id" id="auditee_id" class="sh-tx" required>
                                    <option value="">Select Option</option>
                                    @foreach ($AuditeeNames as $AuditeeName)
                                        <option value="{{ $AuditeeName->auditee_id }}"
                                            {{ old('auditee_id') == $AuditeeName->auditee_id ? 'selected' : null }}>
                                            {{ $AuditeeName->auditee_first_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                            <x-error name="auditee_id" />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditing Location</p>
                                <p class="FieldHeadArbTxt">موقع التدقيق</p>
                            </div>
                            <p>
                                <select name="location_id" id="location_id" class="sh-tx" required>
                                    <option value="">Select Option</option>
                                    @foreach ($AuditLocNames as $AuditLoc)
                                        <option value="{{ $AuditLoc->location_id }}"
                                            {{ old('location_id') == $AuditLoc->location_id ? 'selected' : null }}>
                                            {{ $AuditLoc->location_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                            <x-error name="location_id" />
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Audit Nature</p>
                                <p class="FieldHeadArbTxt">طبيعة التدقيق</p>
                            </div>
                            <p><input type="text" name="audit_nature" id="audit_nature" class="sh-tx"
                                    value="{{ old('audit_nature') }}"></p>
                            <x-error name="audit_nature" />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Audit Type</p>
                                <p class="FieldHeadArbTxt">نوع التدقيق</p>
                            </div>
                            <p><input type="text" name="audit_type" id="audit_type" class="sh-tx"
                                    value="{{ old('audit_type') }}"></p>
                            <x-error name="audit_type" />
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </form>



    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
