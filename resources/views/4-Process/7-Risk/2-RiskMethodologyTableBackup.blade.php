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
                <a href="/compliance">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i class='bx bx-right-arrow-alt'></i>
                <div class="HeadingTxt">
                    <p class="ArbTxt">تحديد المخاطر</p>
                    <p class="EngTxt">Risk Identification</p>
                </div>
                <div class="text-center d-flex gap-3" style="margin-left: auto">
                    @include('partials.roles')
                    <div class="RightButtonContainer">
                        <button type="button" class="RightButton" onclick="goBack()">
                            <p>للخلف</p>
                            <p>Back</p>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        @include('4-Process/7-Risk/risksidebar')
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <div class="IndiTable">
        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">منهجية المخاطر</p>
                <p class="PageHeadEngTxt">Risk Methodology</p>
            </div>
            <div class="ButtonContainer">
                <a href="/risk-methodology-list" class="MoreButton">
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
        <table cellspacing="0">
            <div class="ContentTableSection">
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Methodology ID</p>
                            <p class="FieldHeadArbTxt">رمز منهجية المخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $risk_methodology_id->risk_methodology_id }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Function Owner</p>
                            <p class="FieldHeadArbTxt">صاحب منهجية المخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $risk_methodology_id->risk_function_owner }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Background</p>
                            <p class="FieldHeadArbTxt">خلفية</p>
                        </div>
                        <p class="bg-tx">{{ $risk_methodology_id->background }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Methodology Source</p>
                            <p class="FieldHeadArbTxt">مصدر منهجية المخاطر</p>
                        </div>
                        <p class="bg-tx">{{ $risk_methodology_id->risk_methodology_source }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Asset Identification</p>
                            <p class="FieldHeadArbTxt">تحديد الأصول</p>
                        </div>
                        <p class="sh-tx">{{ $risk_methodology_id->asset_identification }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Threat Identification</p>
                            <p class="FieldHeadArbTxt">تحديد التهديد</p>
                        </div>
                        <p class="sh-tx">{{ $risk_methodology_id->threat_identification }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Vulnerability Identification</p>
                            <p class="FieldHeadArbTxt">تحديد نقاط الضعف</p>
                        </div>
                        <p class="sh-tx">{{ $risk_methodology_id->vulnerability_identification }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Appetite Identification</p>
                            <p class="FieldHeadArbTxt">تحديد مخاطر الجوع</p>
                        </div>
                        <p class="sh-tx">{{ $risk_methodology_id->risk_appetite_determination }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Assessment Approach</p>
                            <p class="FieldHeadArbTxt">نهج تقييم المخاطر</p>
                        </div>
                        <p class="bg-tx">{{ $risk_methodology_id->risk_assessment_approach }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Name</p>
                            <p class="FieldHeadArbTxt">اسم المخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $risk_methodology_id->risk_name }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Response</p>
                            <p class="FieldHeadArbTxt">الاستجابة للمخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $risk_methodology_id->risk_treatment }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Residual Risk</p>
                            <p class="FieldHeadArbTxt">المخاطر المتبقية</p>
                        </div>
                        <p class="sh-tx">{{ $risk_methodology_id->residual_risk }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Acceptance</p>
                            <p class="FieldHeadArbTxt">قبول المخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $risk_methodology_id->risk_acceptance }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Audit</p>
                            <p class="FieldHeadArbTxt">مراجعة المخاطر</p>
                        </div>
                        <p class="bg-tx">{{ $risk_methodology_id->risk_audit }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Change Management</p>
                            <p class="FieldHeadArbTxt">إدارة تغير المخاطر</p>
                        </div>
                        <p class="bg-tx">{{ $risk_methodology_id->risk_change_management }}</p>
                    </div>
                </div>
            </div>
        </table>
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
