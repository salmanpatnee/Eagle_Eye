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

        @media (min-width: 768px) {
            .modal-dialog {
                width: 100vh;
                margin: 200px auto;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="Header">
            <a href="/compliance">
                <i class='bx bx-home'></i>
            </a>
            <p class="bold-arbtext">العمليات</p>
            <p class="bold-text">Processes</p>
            <i style="padding-right: 30px" class='bx bx-right-arrow-alt'></i>
            <div class="HeadingTxt">
                <p class="ArbTxt">تسجيل المراجعة</p>
                <p class="EngTxt">Audit Registration</p>
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

    <main id="main-content">
        <!-- CONTENT -->
        <form action="/audit-registration-input/post" method="post">
            @csrf
            <div class="ContAssIndiTable">
                <div class="TableHeading">
                    <div class="ButtonContainer">
                        <a href="{{ route('audit-registrations.index') }}" class="MoreButton">
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
                        <p class="AssessmentHeadings">Audit Master</p>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit ID</p>
                                    <p class="FieldHeadArbTxt">رمز المراجعة</p>
                                </div>
                                <p><input type="text" name="audit_id" id="audit_id" class="sh-tx"
                                        placeholder="Enter Audit ID" value="{{ old('audit_id') }}" required></p>
                                <x-error name="audit_id" />
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Name</p>
                                    <p class="FieldHeadArbTxt">اسم المراجعة</p>
                                </div>
                                <p><input type="text" name="audit_name" id="audit_name" class="sh-tx"
                                        placeholder="Write Audit Name" value="{{ old('audit_name') }}" required></p>
                                <x-error name="audit_name" />
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Description</p>
                                    <p class="FieldHeadArbTxt">وصف المراجعة</p>
                                </div>
                                <p><input type="text" name="audit_description" id="audit_description" class="bg-tx"
                                        placeholder="Write Audit Description" value="{{ old('audit_description') }}">
                                </p>
                                <x-error name="audit_description" />
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Objectives</p>
                                    <p class="FieldHeadArbTxt">أهداف المراجعة</p>
                                </div>
                                <p><input type="text" name="audit_objectives" id="audit_objectives" class="bg-tx"
                                        placeholder="Write Audit Objectives" value="{{ old('audit_objectives') }}">
                                </p>
                                <x-error name="audit_objectives" />
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Classification Name</p>
                                    <p class="FieldHeadArbTxt">اسم التصنيف</p>
                                </div>
                                <p>
                                    <select name="classification_id" id="classification_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($classNames as $className)
                                            <option value="{{ $className->classification_id }}"
                                                {{ $className->classification_id == old('classification_id') ? 'selected' : '' }}>
                                                {{ $className->classification_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                                <x-error name="classification_id" />
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Location Name</p>
                                    <p class="FieldHeadArbTxt">اسم الموقع</p>
                                </div>
                                <p>
                                    <select name="location_id" id="location_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($locNames as $locName)
                                            <option value="{{ $locName->location_id }}"
                                                {{ $locName->location_id == old('location_id') ? 'selected' : '' }}>
                                                {{ $locName->location_name }}
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
                                    <p class="FieldHeadEngTxt">Audit Start Date</p>
                                    <p class="FieldHeadArbTxt">تاريخ بدء المراجعة</p>
                                </div>
                                <p><input type="date" name="audit_start_date" id="audit_start_date"
                                        class="sh-tx" required value="{{ old('audit_start_date') }}"></p>
                                <x-error name="audit_start_date" />
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit End Date</p>
                                    <p class="FieldHeadArbTxt">تاريخ انتهاء المراجعة</p>
                                </div>
                                <p><input type="date" name="audit_end_date" id="audit_end_date" class="sh-tx"
                                        required value="{{ old('audit_end_date') }}"></p>
                                <x-error name="audit_end_date" />
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Type</p>
                                    <p class="FieldHeadArbTxt">نوع المراجعة</p>
                                </div>
                                <p><input type="text" name="audit_type" id="audit_type" class="sh-tx"
                                        placeholder="Write Audit Type Name" value="{{ old('audit_type') }}"></p>
                                <x-error name="audit_type" />
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Internal or External?</p>
                                    <p class="FieldHeadArbTxt">المراجعة الداخلية أو الخارجية؟</p>
                                </div>
                                <select type="text" name="audit_internal_external" id="audit_internal_external"
                                    class="sh-tx">
                                    <option value="Internal"
                                        {{ old('audit_internal_external') == 'Internal' ? 'selected' : '' }}>
                                        Internal
                                    </option>
                                    <option value="External"
                                        {{ old('audit_internal_external') == 'External' ? 'selected' : '' }}>
                                        External
                                    </option>
                                </select>
                                <x-error name="audit_internal_external" />
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Auditing Entity</p>
                                    <p class="FieldHeadArbTxt">الجهة المراجعة</p>
                                </div>
                                <p><input type="text" name="auditing_entity" id="auditing_entity" class="sh-tx"
                                        placeholder="Write Auditing Entity Name"
                                        value="{{ old('auditing_entity') }}">
                                </p>
                                <x-error name="auditing_entity" />
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Auditor Name</p>
                                    <p class="FieldHeadArbTxt">اسم مدقق</p>
                                </div>
                                <p>
                                    <select name="auditor_id" id="auditor_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($auditorNames as $auditorName)
                                            <option value="{{ $auditorName->auditor_id }}"
                                                {{ old('auditor_id') == $auditorName->auditor_id ? 'selected' : '' }}>
                                                {{ $auditorName->auditor_first_name }} {{ $auditorName->auditor_last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Scope</p>
                                    <p class="FieldHeadArbTxt">نطاق المراجعة</p>
                                </div>
                                <p><input type="text" name="audit_scope" id="audit_scope" class="bg-tx"
                                        placeholder="Write Audit Scope" value="{{ old('audit_scope') }}"></p>
                                <x-error name="audit_scope" />
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Audit Approach</p>
                                    <p class="FieldHeadArbTxt">نهج المراجعة</p>
                                </div>
                                <p><input type="text" name="audit_approach" id="audit_approach" class="bg-tx"
                                        placeholder="Write Audit Approach" value="{{ old('audit_approach') }}"></p>
                                <x-error name="audit_scope" />
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Standard References</p>
                                    <p class="FieldHeadArbTxt">مراجع معايير</p>
                                </div>
                                <p><input type="text" name="standard_references" id="standard_references"
                                        class="bg-tx" placeholder="Define Standard References"
                                        value="{{ old('standard_references') }}"></p>
                                <x-error name="standard_references" />
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Best Practice</p>
                                    <p class="FieldHeadArbTxt">أفضل الممارسات</p>
                                </div>
                                <p>
                                    <select name="best_practice" id="best_practice" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($practNames as $practName)
                                            <option value="{{ $practName->best_practices_id }}"
                                                {{ old('best_practice') == $practName->best_practices_id ? 'selected' : '' }}>
                                                {{ $practName->best_practices_id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
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
    </main>


    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
