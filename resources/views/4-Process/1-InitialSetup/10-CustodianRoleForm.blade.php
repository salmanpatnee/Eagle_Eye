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
    <link rel="stylesheet" href="{{ asset('/css/6-Header/headertwo.css') }}">
</head>

<body>


    <!-- SIDEBAR -->
    <div class="headersec">
        <div class="headerleft">
            @include('4-Process/headerleft')
            @include('4-Process/1-InitialSetup/initialheader')
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>
    <div class="wrapper">

        @include('4-Process/1-InitialSetup/_partials/sidebar')
        <!-- SIDEBAR -->



        <!-- CONTENT -->
        <div class="IndiTable">

            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">دور الوصي</p>
                    <p class="PageHeadEngTxt">Custodian Roles</p>
                </div>
                <div class="ButtonContainer">
                    <a href="/custodian-role-list" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    @if (request()->routeIs('custodianrole.edit'))
                        <a href="{{ route('custodianrole.create') }}" class="MoreButton">
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
                        class="{{ request()->routeIs('custodianrole.edit') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                </div>
            </div>

            <form method="POST" action="{{ route('custodianrole.delete') }}" id="delete_form">
                <input type="hidden" name="record" value="{{ $custodianrole?->id }}">
                @csrf
                @method('DELETE')
            </form>

            <form id="form"
                action="{{ isset($custodianrole) ? route('custodianrole.update', $custodianrole->id) : route('custodianrole.store') }}"
                method="POST">
                @csrf
                @if (isset($custodianrole))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $custodianrole->id }}">
                @endif
                <table cellspacing="0">
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Custodian Role ID</p>
                                    <p class="FieldHeadArbTxt">رمز دور الوصي</p>
                                </div>
                                <p><input type="text" name="custodian_role_id" id="custodian_role_id" class="sh-tx"
                                        placeholder="Enter Custodian ID"
                                        value="{{ old('custodian_role_id', $custodianrole?->custodian_role_id) }}"
                                        {{ $custodianrole?->custodian_role_id ? 'readonly' : '' }} required>
                                    @error('custodian_role_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Custodian Role Title</p>
                                    <p class="FieldHeadArbTxt">عنوان دور الوصي</p>
                                </div>
                                <p><input type="text" name="custodian_role_title" id="custodian_role_title"
                                        class="sh-tx" placeholder="Enter Title"
                                        value="{{ old('custodian_role_title', $custodianrole?->custodian_role_title) }}"
                                        required>
                                    @error('custodian_role_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Custodian Role Description</p>
                                    <p class="FieldHeadArbTxt">وصف دور الوصي</p>
                                </div>
                                <p><input type="text" name="custodian_role_description"
                                        id="custodian_role_description" class="bg-tx"
                                        placeholder="Enter Custodian Department"
                                        value="{{ old('custodian_role_description', $custodianrole?->custodian_role_description) }}">
                                    @error('custodian_role_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">System/Application/Other</p>
                                    {{-- <p class="FieldHeadArbTxt">النظام / التطبيق / أخرى</p> --}}
                                    
                                </div>
                                <p> <select name="system_application_other" id="system_application_other" class="sh-tx">
                                    <option value="" disabled {{ old('system_application_other', $custodianrole?->system_application_other) ? '' : 'selected' }}>
                                        Select an option
                                    </option>
                                    <option value="System"
                                        {{ old('system_application_other', $custodianrole?->system_application_other) == 'System' ? 'selected' : '' }}>
                                        System
                                    </option>
                                    <option value="Application"
                                        {{ old('system_application_other', $custodianrole?->system_application_other) == 'Application' ? 'selected' : '' }}>
                                        Application
                                    </option>
                                    <option value="Other"
                                        {{ old('system_application_other', $custodianrole?->system_application_other) == 'Other' ? 'selected' : '' }}>
                                        Other
                                    </option>
                                </select>
                                    @error('system_application_other')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column" id="DefineOther">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Define Other</p>
                                    <p class="FieldHeadArbTxt">تعريف أخرى</p>
                                </div>
                                <p><input type="text" name="other" id="DefineOth" class="sh-tx"
                                        placeholder="Define Other"
                                        value="{{ old('other', $custodianrole?->other) }}">
                                    @error('other')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                </table>
            </form>
        </div>
    </div>
    @include('components.delete-confirmation-modal')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var relationCriticalAssetSelect = document.getElementById("system_application_other");
            var csccStandOneSection = document.getElementById("DefineOther");

            function toggleCsccStandOneSection() {
                if (relationCriticalAssetSelect.value === "Other") {
                    csccStandOneSection.style.display = "block";
                } else {
                    csccStandOneSection.style.display = "none";
                }
            }

            relationCriticalAssetSelect.addEventListener("change", toggleCsccStandOneSection);

            toggleCsccStandOneSection(); // Initialize on page load
        });
    </script>

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
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
