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
    <form id="form" action="{{ isset($auditPlan) ? route('audit.plan.update', $auditPlan?->id) : route('audit.plan.store') }}"
                method="POST">
                @csrf
                @if (isset($auditPlan))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $auditPlan?->id }}">
                @endif

  
        <div class="IndiTable">
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">تخطيط مراجعة</p>
                    <p class="PageHeadEngTxt">Audit Plan</p>
                </div>
                <div class="ButtonContainer">
                    <a href="{{route('audit.plan.index')}}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>

                    @if (request()->routeIs('audit.plan.edit'))
                            <a href="{{ route('audit.plan.create') }}" class="MoreButton">
                                <p class="ButtonArbTxt">يضيف</p>
                                <p class="ButtonEngTxt">Add</p>
                            </a>
                            <button type="submit" form="form" class="MoreButton">
                                <p class="ButtonArbTxt">تحديث</p>
                                <p class="ButtonEngTxt">Update</p>
                            </button>
                        @else
                        <button type="submit" form="form" class="MoreButton">
                                <p class="ButtonArbTxt">يضيف</p>
                                <p class="ButtonEngTxt">Add</p>
                            </button>
                            <a href="" class="DisabledButton">
                                <p class="ButtonArbTxt">تحديث</p>
                                <p class="ButtonEngTxt">Update</p>
                            </a>
                        @endif



                            <button type="button" id="btnDelete"
                            class="{{ request()->routeIs('audit.plan.edit') ? 'MoreButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يمسح</p>
                            <p class="ButtonEngTxt">Delete</p>
                        </button>

                    
                </div>
            </div>
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <x-input label="Audit ID" label_ar="رمز المراجعة" name="audit_id"
                                placeholder="Enter Audit ID" :value="$auditPlan?->audit_id" required />

                        </div>
                        <div class="column">
                            <x-input label="Audit Name" label_ar="اسم المراجعة" name="audit_name"
                                placeholder="Enter Audit Name" :value="$auditPlan?->audit_name" required />
                        </div>
                    </div>
                    <div class="ContentTablebg">

                        <div class="column">
                            <x-input label="Audit Description" label_ar="وصف المراجعة" name="audit_description"
                                placeholder="Enter Audit Description" :value="$auditPlan?->audit_description" class="bg-tx" />
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <x-input label="Audit Sponsor" label_ar="مراجعة الراعي" name="audit_sponsor"
                                placeholder="Enter Audit Sponsor" :value="$auditPlan?->audit_sponsor" class="bg-tx" />


                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <x-input label="Audit Scope" label_ar="مراجعة نطاق" name="audit_scope"
                                placeholder="Enter Audit Scope" :value="$auditPlan?->audit_scope" class="bg-tx" />
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <x-input label="Audit Objectives" label_ar="أهداف المراجعة" name="audit_objectives"
                                placeholder="Enter Audit Objectives" :value="$auditPlan?->audit_objectives" class="bg-tx" />

                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <x-input label="Audit Criteria" label_ar="معايير المراجعة" name="audit_criteria"
                                placeholder="Enter Audit Criteria" :value="$auditPlan?->audit_criteria" class="bg-tx" />


                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <x-input label="Audit Methodology" label_ar="منهجية المراجعة" name="audit_methodology"
                                placeholder="Enter Audit Methodology" :value="$auditPlan?->audit_methodology" class="bg-tx" />


                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <x-input label="Sampling" label_ar="أخذ العينات" name="sampling"
                                placeholder="Enter Audit Sampling" :value="$auditPlan?->sampling" class="bg-tx" />
                        </div>
                    </div>
                    <div class="ContentTablebg">

                        <div class="column">
                            <x-input label="Evidence Needed" label_ar="الأدلة المطلوبة" name="evidence_needed"
                                placeholder="" :value="$auditPlan?->evidence_needed" class="bg-tx" />

                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">

                            <x-input label="Schedule" label_ar="جدول" name="schedule" placeholder=""
                                :value="$auditPlan?->schedule" class="bg-tx" />


                        </div>
                    </div>

                    <div class="ContentTablebg">
                        <div class="column">

                            <x-input label="Comment" label_ar="تعليق" name="comment" placeholder=""
                                :value="$auditPlan?->comment" class="bg-tx" />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <x-input label="Audit Plan Start Date" label_ar="تاريخ بدء خطة التدقيق"
                                name="audit_plan_start_date" placeholder="" :value="$auditPlan?->audit_plan_start_date" required
                                type="date"  />


                        </div>
                        <div class="column">
                            <x-input label="Audit Plan End Date" label_ar="تاريخ انتهاء خطة التدقيق"
                                name="audit_plan_end_date" placeholder="" :value="$auditPlan?->audit_plan_end_date" type="date" />


                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">

                            <x-input label="Auditing Entity" label_ar="الجهة المراجعة" name="auditing_entity"
                                placeholder="" :value="$auditPlan?->auditing_entity" />




                        </div>
                        <div class="column">
                            <x-input label="Audit Type" label_ar="نوع التدقيق" name="audit_type" placeholder=""
                                :value="$auditPlan?->audit_type" />
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
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->location_id }}"
                                            {{ old('location_id', $auditPlan?->location_id) == $location->location_id ? 'selected' : null }}>   
                                            {{ $location->location_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                            <x-error name="location_id" />
                        </div>
                        <div class="column">
                             <x-input label="Audit Nature" label_ar="نوع التدقيق" name="audit_nature" placeholder=""
                                :value="$auditPlan?->audit_nature" />

                          
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditor</p>
                                <p class="FieldHeadArbTxt">اسم المراجع</p>
                            </div>
                            <p>
                                <select name="auditor_id" id="auditor_id" class="sh-tx" required>
                                    <option value="">Select Option</option>
                                    @foreach ($auditors as $auditor)
                                        <option value="{{ $auditor->auditor_id }}"
                                            {{ old('auditor_id', $auditPlan?->auditor_id) == $auditor->auditor_id ? 'selected' : null }}>
                                            {{ $auditor->auditor_first_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                            <x-error name="auditor_id" />
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditee Name</p>
                                <p class="FieldHeadArbTxt">اسم مدقق</p>
                            </div>
                            <p>
                                <select name="auditee_id" id="auditee_id" class="sh-tx" required>
                                    <option value="">Select Option</option>
                                    @foreach ($auditees as $auditee)
                                        <option value="{{ $auditee->auditee_id }}"
                                            {{ old('auditee_id', $auditPlan?->auditee_id) == $auditee->auditee_id ? 'selected' : null }}>
                                            {{ $auditee->auditee_first_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                            <x-error name="auditee_id" />
                        </div>
                    </div>

                    <div class="ContentTable">
                        
                        
                        <div class="column">
                            <x-input label="Cost" label_ar="نوع التدقيق" name="cost" placeholder=""
                                    :value="$auditPlan?->cost" />
                           
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
