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
                @if (request()->routeIs($routeName . '.edit'))
                    <a href="{{ route($routeName . '.create') }}" class="MoreButton">
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

                <button type="button" onclick="showDeleteModal()"
                    class="{{ auth()->user()->can('delete-data') && request()->routeIs($routeName . '.edit') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يمسح</p>
                    <p class="ButtonEngTxt">Delete</p>
                </button>


                <form method="POST" action="{{ route($routeName . '.delete') }}" id="delete_form">
                    <input type="hidden" name="record" value="{{ $data?->id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        <form id="form"
            action="{{ isset($riskmethod) ? route('riskmethod.update', $riskmethod->id) : route('riskmethod.store') }}"
            method="POST">
            @csrf
            @if (isset($riskmethod))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $riskmethod->id }}">
            @endif

            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Methodology ID</p>
                                <p class="FieldHeadArbTxt">رمز منهجية المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_methodology_id" id="risk_methodology_id" class="sh-tx"
                                    placeholder="Enter ID"
                                    value="{{ old('risk_methodology_id', $riskmethod?->risk_methodology_id) }}"
                                    {{ $riskmethod?->risk_methodology_id ? 'readonly' : '' }} required>
                                @error('risk_methodology_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Function Owner</p>
                                <p class="FieldHeadArbTxt">صاحب منهجية المخاطر</p>
                            </div>
                            <select name="owner_id" id="owner_id" class="sh-tx" required>
                                <option value="">Select Owner</option>
                                @foreach ($owners as $owner)
                                    <option value="{{ $owner->owner_role_id }}"
                                        {{ $owner->owner_role_id == old('owner_id', $riskmethod?->owner_id) ? 'selected' : '' }}>
                                        {{ $owner->owner_role_id }} - {{ $owner->owner_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('owner_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Background</p>
                                <p class="FieldHeadArbTxt">خلفية</p>
                            </div>
                            <p><input type="text" name="background" id="background" class="bg-tx"
                                    placeholder="Write Background"
                                    value="{{ old('background', $riskmethod?->background) }}">
                                @error('background')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Methodology Source</p>
                                <p class="FieldHeadArbTxt">مصدر منهجية المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_methodology_source" id="risk_methodology_source"
                                    class="bg-tx" placeholder="Write Risk Methodology Source"
                                    value="{{ old('risk_methodology_source', $riskmethod?->risk_methodology_source) }}">
                                @error('risk_methodology_source')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Identification</p>
                                <p class="FieldHeadArbTxt">تحديد الأصول</p>
                            </div>

                            <select name="asset_identification" id="ClassName" class="sh-tx" required>
                                <option value="">Select Option</option>
                                @foreach ($assets as $asset)
                                    <option value="{{ $asset->asset_id }}"
                                        {{ old('asset_identification', $riskmethod?->asset_identification) == $asset->asset_id ? 'selected' : null }}>
                                        {{ $asset->asset_id }} -
                                        {{ $asset->asset_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-error name="asset_identification" />


                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Threat Identification</p>
                                <p class="FieldHeadArbTxt">تحديد التهديد</p>
                            </div>
                            <select name="threat_identification" id="ClassName" class="sh-tx" required>
                                <option value="">Select Option</option>
                                @foreach ($threats as $threat)
                                    <option value="{{ $threat->threat_agent_id }}"
                                        {{ old('threat_identification', $riskmethod?->threat_identification) == $threat->threat_agent_id ? 'selected' : null }}>
                                        {{ $threat->threat_agent_id }} -
                                        {{ $threat->threat_agent_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-error name="threat_identification" />


                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Vulnerability Identification</p>
                                <p class="FieldHeadArbTxt">تحديد نقاط الضعف</p>
                            </div>
                            <select name="vulnerability_identification" id="ClassName" class="sh-tx" required>
                                <option value="">Select Option</option>
                                @foreach ($vulnerabilities as $vulnerability)
                                    <option value="{{ $vulnerability->va_id }}"
                                        {{ old('vulnerability_identification', $riskmethod?->vulnerability_identification) == $vulnerability->va_id ? 'selected' : null }}>
                                        {{ $vulnerability->va_id }} -
                                        {{ $vulnerability->va_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-error name="vulnerability_identification" />


                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Appetite Identification</p>
                                <p class="FieldHeadArbTxt">تحديد مخاطر الجوع</p>
                            </div>

                            <select name="risk_appetite_determination" id="risk_appetite_determination" class="sh-tx" required>
                                <option value="">Select Appetite Score</option>
                                @foreach ($appetites as $appetite)
                                    <option value="{{ $appetite->risk_appetite_id }}"
                                        {{ $appetite->risk_appetite_id == old('risk_appetite_determination', $riskmethod?->risk_appetite_determination) ? 'selected' : '' }}>
                                     {{ $appetite->risk_appetite_id }} - {{ $appetite->risk_score }}
                                    </option>
                                @endforeach
                            </select>
                            @error('risk_appetite_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment Approach</p>
                                <p class="FieldHeadArbTxt">نهج تقييم المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_assessment_approach" id="risk_assessment_approach"
                                    class="bg-tx" placeholder="Write Risk Assessment Approach"
                                    value="{{ old('risk_assessment_approach', $riskmethod?->risk_assessment_approach) }}">
                                @error('risk_assessment_approach')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Name</p>
                                <p class="FieldHeadArbTxt">اسم المخاطر</p>
                            </div>
                            <select name="risk_name" id="ClassName" class="sh-tx" required>
                                <option value="">Select Option</option>
                                @foreach ($risks as $risk)
                                    <option value="{{ $risk->risk_id }}"
                                        {{ old('risk_name', $riskmethod?->risk_name) == $risk->risk_id ? 'selected' : null }}>
                                        {{ $risk->risk_id }} -
                                        {{ $risk->risk_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-error name="risk_name" />


                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Response</p>
                                <p class="FieldHeadArbTxt">الاستجابة للمخاطر</p>
                            </div>
                            <p><input type="text" name="risk_treatment" id="risk_treatment" class="sh-tx"
                                    placeholder="Write Risk Treatment"
                                    value="{{ old('risk_treatment', $riskmethod?->risk_treatment) }}">
                                @error('risk_treatment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Residual Risk</p>
                                <p class="FieldHeadArbTxt">المخاطر المتبقية</p>
                            </div>
                            <p><input type="text" name="residual_risk" id="residual_risk" class="sh-tx"
                                    placeholder="Write Residual Risk"
                                    value="{{ old('residual_risk', $riskmethod?->residual_risk) }}">
                                @error('residual_risk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Acceptance</p>
                                <p class="FieldHeadArbTxt">قبول المخاطر</p>
                            </div>

                            <select name="risk_acceptance" id="risk_acceptance" class="sh-tx" required>
                                <option value="">Select Acceptance</option>
                                @foreach ($acceptances as $acceptance)
                                    <option value="{{ $acceptance->risk_acceptance_id }}"
                                        {{ $acceptance->risk_acceptance_id == old('risk_acceptance', $riskmethod?->risk_acceptance) ? 'selected' : '' }}>
                                        {{ $acceptance->risk_acceptance_source }}
                                    </option>
                                @endforeach
                            </select>
                            @error('risk_acceptance')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            {{-- <p><input type="text" name="risk_acceptance" id="risk_acceptance" class="sh-tx"
                                    placeholder="Write Risk Acceptance"
                                    value="{{ old('risk_acceptance', $riskmethod?->risk_acceptance) }}">
                                @error('risk_acceptance')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p> --}}
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Audit</p>
                                <p class="FieldHeadArbTxt">مراجعة المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_audit" id="risk_audit" class="bg-tx"
                                    placeholder="Write Risk Audit"
                                    value="{{ old('risk_audit', $riskmethod?->risk_audit) }}">
                                @error('risk_audit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Change Management</p>
                                <p class="FieldHeadArbTxt">إدارة تغير المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_change_management" id="risk_change_management"
                                    class="bg-tx" placeholder="Write Risk Change Management"
                                    value="{{ old('risk_change_management', $riskmethod?->risk_change_management) }}">
                                @error('risk_change_management')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
            </table>
        </form>
    </div>

    @include('components.delete-confirmation-modal')

    <script>
        function goBack() {
            window.history.back();
        }

        function showDeleteModal() {
            window.deleteConfirmationModal.show(document.getElementById('delete_form'));
        }
    </script>
</body>

</html>
